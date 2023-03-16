<?php
include ("../../conect.php");
include ("../../autenticacion.php");

$re = $client->getAllGeneral("error","","");
$resultado= "".$re;
$preguntas =explode(';;',$resultado);

$re = $client->getPerfilRol($_SESSION["id"],"66");
$resultado = "".$re;
$usuarios= explode(',',$resultado);
$correo="hide";
$editar="hide";
$eliminar="hide";
$exportar="no-descargar";
if($resultado==""){
    ?>
    <a ng-click="reload()">
    <?php
}
foreach($usuarios as $llave => $valores1) {
    if($valores1==="20"){
        $correo="";
    }
    if($valores1==="2"){
        $editar="";
    }
    if($valores1==="3"){
        $eliminar="";
    }
}
?>
<div class="btn-group  <?php echo $correo; ?>">
    <button class="enviarT btn btn-sm btn-dark " title="Enviar Todos los correos" href="javascript:;"> Enviar Todos</button>
</div>
<table class="table" data-table-name="Error de Correo" id="table-editable" >
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
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
            <td> <?php if (isset($pregunt[3])) {echo $pregunt[3]; }  ?> </td>
            <td class="text-right">
                <a title="Enviar correo" class="correoE btn btn-sm btn-blue <?php echo $correo; ?>" style="margin: 5px;  "  href="javascript:;"><i class="icon-envelope"></i></a>
                <a title="Eliminar correo" class="eliminarE btn btn-sm btn-danger <?php echo $eliminar; ?>" style="margin: 5px;  "  href="javascript:;"><i class="icon-trash"></i></a>
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