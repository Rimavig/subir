<?php
include ("../../conect.php");
include ("../../autenticacion.php");

$re = $client->getAllGeneral("destinatarios","","");
$resultado= "".$re;
$preguntas =explode(';;',$resultado);

$re = $client->getPerfilRol($_SESSION["id"],"65");
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
<div class="btn-group  <?php echo $crear; ?>">
    <button class="crearDestino btn btn-sm btn-dark "  href="javascript:;"><i class="fa fa-plus"></i> Destinatario</button>
</div>
<table class="table" data-table-name="Error de Correo" id="table-editable1" >
    <thead>
        <tr>
            <th>Id</th>
            <th>Correo</th>
            <th>Tipo</th>
            <th class="text-right">Editar</th>
        </tr>
    </thead>
    <tbody>
    <?php
        foreach($preguntas as $llave => $valores) {
            $pregunt =explode(',,,',$valores);
            if (isset($pregunt[1])) {
        ?>
        <tr>
            <td ><?php if (isset($pregunt[0])) {echo $pregunt[0]; }  ?> </td>
            <td> <?php if (isset($pregunt[1])) {echo $pregunt[1]; }  ?> </td>
            <td> <?php if (isset($pregunt[2])) {echo $pregunt[2]; }  ?> </td>
            <td class="text-right">
                <a class="editarD btn btn-sm btn-dark <?php echo $editar; ?>" style="margin: 5px;  "  href="javascript:;"><i class="icon-note"></i></a>
                <a class="eliminarD btn btn-sm btn-danger <?php echo $eliminar; ?>" style="margin: 5px;  "  href="javascript:;"><i class="icon-trash"></i></a>
            </td>
        </tr>
        <?php
        }
        }
        ?> 
    
    </tbody>
</table>
