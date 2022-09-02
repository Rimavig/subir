<?php
include ("../../conect.php");
include ("../../autenticacion.php");

$re = $client->getAllGeneral("error");
$resultado= "".$re;
$preguntas =explode(';;',$resultado);

$re = $client->getPerfilRol($_SESSION["id"],"42");
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
    <button class="enviarT btn btn-sm btn-dark "  href="javascript:;"> Enviar Todos</button>
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
                <a class="editarE btn btn-sm btn-dark <?php echo $editar; ?>" style="margin: 5px;  "  href="javascript:;"><i class="icon-key"></i></a>
                <a class="eliminarE btn btn-sm btn-danger <?php echo $eliminar; ?>" style="margin: 5px;  "  href="javascript:;"><i class="icon-trash"></i></a>
            </td>
        </tr>
        <?php
        }
        }
        ?> 
    
    </tbody>
</table>
