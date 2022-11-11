
<?php
include ("../../conect.php");
include ("../../autenticacion.php");
include ("../../directorio.php");

$re = $client->getContacto("A");
$resultado= "".$re;
$instalaciones =explode(';;;',$resultado);

$re = $client->getPerfilRol($_SESSION["id"],"54");
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
    if($valores1==="2"){
        $editar="";
    }
    if($valores1==="3"){
        $eliminar="";
    }
}
?>
<table class="table" data-table-name=" Contactanos Alquiler" id="table-alquilerC" style="table-layout: fixed;">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombres</th>
            <th>Apellidos </th>
            <th>CelUlar </th>
            <th>Tipo Evento</th>
            <th>Correo </th>
            <th>Fecha Inicío </th>
            <th>Fecha Termíno</th>
            <th>Total Personas</th>
            <th>Mensaje</th>
            <th>Fecha creación</th>
            <th>Estado</th>
            <th class="text-right">Editar</th>
        </tr>
    </thead>
    <tbody>
    <?php
        foreach($instalaciones as $llave => $valores) {
            $pregunt =explode(',,,',$valores);
            if (isset($pregunt[2])) {
        ?>
        <tr>
            <td> <?php if (isset($pregunt[0])) {echo $pregunt[0]; }  ?></td>
            <td> <?php if (isset($pregunt[1])) {echo $pregunt[1]; }  ?> </td>
            <td> <?php if (isset($pregunt[2])) {echo $pregunt[2]; }  ?> </td>
            <td> <?php if (isset($pregunt[3])) {echo $pregunt[3]; }  ?> </td>
            <td> <?php if (isset($pregunt[4])) {echo $pregunt[4]; }  ?> </td>
            <td> <?php if (isset($pregunt[5])) {echo $pregunt[5]; }  ?> </td>
            <td> <?php if (isset($pregunt[6])) {echo $pregunt[6]; }  ?> </td>
            <td> <?php if (isset($pregunt[7])) {echo $pregunt[7]; }  ?> </td>
            <td> <?php if (isset($pregunt[8])) {echo $pregunt[8]; }  ?> </td>
            <td> <?php if (isset($pregunt[9])) {echo $pregunt[9]; }  ?> </td>
            <td> <?php if (isset($pregunt[10])) {echo $pregunt[10]; }  ?> </td>
            <td>
                <?php 
                    $estado="";
                    $estadoT="OFF";
                    if ($pregunt[11]==="A" ) {
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
                <a class="estadoA btn btn-sm btn-warning <?php echo $editar; ?>" style="margin: 5px 0px;" href="javascript:;"><i class="icon-lock"></i></a>
                <a class="eliminarA btn btn-sm btn-danger <?php echo $eliminar; ?>" style="margin: 5px;  "  href="javascript:;"><i class="icon-trash"></i></a>
            </td>
        </tr>
        <?php
        }
        }
        ?> 
    </tbody>
</table>
