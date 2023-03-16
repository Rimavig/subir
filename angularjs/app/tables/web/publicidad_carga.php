
<?php
include ("../../conect.php");
include ("../../autenticacion.php");
include ("../../directorio.php");

$re = $client->getAllPublicidad();
$resultado= "".$re;
$instalaciones =explode(';;',$resultado);

$re = $client->getPerfilRol($_SESSION["id"],"37");
$resultado = "".$re;
$usuarios= explode(',',$resultado);
$crear="hide";
$editar="hide";
$eliminar="hide";
$exportar="no-descargar";
if($resultado==""){
    ?>
    <a ng-click="reload()">
    <?php
}
foreach($usuarios as $llave => $valores1) {
    if($valores1==="1"){
        $crear="";
    }
    if($valores1==="2"){
        $editar="";
    }
    if($valores1==="3"){
        $eliminar="";
    }
}
?>
<div class="btn-group <?php echo $crear; ?>">
    <button class="crearPublicidad btn-sm btn-dark "  href="javascript:;"><i class="fa fa-plus"></i> Publicidad</button>
</div>
<table class="table" data-table-name="Publicidad" id="table-publicidad" style="table-layout: fixed;">
    <thead>
        <tr>
            <th>Id</th>
            <th>Imagen P( 204x348 ) - S( 204x230 )</th>
            <th>Orden </th>
            <th>Nombre </th>
            <th>Tipo </th>
            <th>Link </th>
            <th>Estado </th>
            <th class="text-right">Editar</th>
        </tr>
    </thead>
    <tbody>
    <?php
        foreach($instalaciones as $llave => $valores) {
            $pregunt =explode(',,,',$valores);
            if (isset($pregunt[1])) {
        ?>
        <tr>
            <td id="idObjetivo"><?php if (isset($pregunt[0])) {echo $pregunt[0]; }  ?></td>
            <td> <img src='<?php echo $publicidadI.$pregunt[0].".png?nocache=".time();?>' class="img-responsive" alt="gallery 3"></td>
            <td> <?php if (isset($pregunt[4])) {echo $pregunt[4]; }  ?> </td>
            <td> <?php if (isset($pregunt[1])) {echo $pregunt[1]; }  ?> </td>
            <?php
                if ($pregunt[2]== "P") {
                    ?>
                      <td> Principal </td>
                    <?php
                }else{
                    ?>
                     <td> Secundario </td>
                    <?php
                }
            ?>
            <td> <a href="<?php echo $pregunt[3]; ?>" target="_blank"><?php if (isset($pregunt[2])) {echo $pregunt[3]; }  ?></a> </td>
            <td>
                <?php 
                    $estado="";
                    $estadoT="OFF";
                    if ($pregunt[5]==="A" ) {
                        $estado="checked";
                        $estadoT="ON";
                    } 
                ?> 
                <div class="form-group">
                    <label class="switch switch-green">
                        <input type="checkbox" class="switch-input"  id="box" <?php echo $estado; ?> disabled>
                        <span class="switch-label" data-on="On" data-off="Off"></span>
                        <span class="switch-handle"></span>
                        <span id="estado" class="esconder"><?php echo $estadoT; ?></span>
                    </label>
                </div>
            </td>
            <td class="text-right">
                <a class="editarPublicidad btn btn-sm btn-dark <?php echo $editar; ?>" style="margin: 5px;  "  href="javascript:;"><i class="icon-note"></i></a>
                <a class="estadoPublicidad btn btn-sm btn-warning  <?php echo $editar; ?>" style="margin: 5px 0px;" href="javascript:;"><i class="icon-lock"></i></a>
                <a class="eliminarPublicidad btn btn-sm btn-danger <?php echo $eliminar; ?>" style="margin: 5px;  "  href="javascript:;"><i class="icon-trash"></i></a>
            </td>
        </tr>
        <?php
        }
        }
        ?> 
    
    </tbody>
</table>
<?php
$transport->close();
?>