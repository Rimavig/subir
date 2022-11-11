
<?php
include ("../../conect.php");
include ("../../autenticacion.php");
include ("../../directorio.php");

$re = $client->getAllInformacionAdicional();
$resultado= "".$re;
$instalaciones =explode(';;',$resultado);

$re = $client->getPerfilRol($_SESSION["id"],"36");
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
    <button class="crearInformacionA btn-sm btn-dark "  href="javascript:;"><i class="fa fa-plus"></i> Información adicional</button>
</div>
<table class="table" data-table-name="Información adicional" id="table-informacion" style="table-layout: fixed;">
    <thead>
        <tr>
            <th>Id</th>
            <th>Orden </th>
            <th>Descripción </th>
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
            <td> <?php if (isset($pregunt[2])) {echo $pregunt[2]; }  ?> </td>
            <td> <?php if (isset($pregunt[1])) {echo $pregunt[1]; }  ?> </td>
            <td class="text-right">
                <a class="editarInformacionA btn btn-sm btn-dark <?php echo $editar; ?>" style="margin: 5px;  "  href="javascript:;"><i class="icon-note"></i></a>
                <a class="eliminarInformacionA btn btn-sm btn-danger <?php echo $eliminar; ?>" style="margin: 5px;  "  href="javascript:;"><i class="icon-trash"></i></a>
            </td>
        </tr>
        <?php
        }
        }
        ?> 
    
    </tbody>
</table>
