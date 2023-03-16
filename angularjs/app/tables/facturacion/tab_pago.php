<?php
include ("../../conect_taquilla.php");
include ("../../autenticacion.php");

$localidad="";
$esconder="";
$tipo="FPT";
$var1 = trim($_POST['var1']);
$re = $client3->getAllPromocion($_SESSION["id"].",".$var1,$tipo);
$resultado= "".$re;
$Promocion =explode(';;',$resultado);
$re = $client3->getPerfilRol($_SESSION["id"],"25");
$resultado = "".$re;
$usuarios1= explode(',',$resultado);
$editar="hide";
$eliminar="hide";
$estad="hide";
$reset="hide";

foreach($usuarios1 as $llave => $valores1) {
    if($valores1==="2"){
        $editar='';
    }
    if($valores1==="3"){
        $eliminar='';
    }
    if($valores1==="5"){
        $estad='';
    }
}
?>
<table class="table" data-table-name="Promoción Factor de Pago" id="table-editable3" >
    <thead>
        <tr>
            <th class="esconder">tipo</th>
            <th class="esconder">id</th>
            <th class="esconder">id_promocion</th>
            <th>Nombre</th>
            <th>Evento</th>
            <th>Desde/Hasta</th>
            <th>Descuento</th>
            <th>Funcion </th>
            <th>Platea </th>
            <th>Fecha Inicio</th>
            <th>Fecha Final</th>
            <th>Estado</th>
            <th class="text-right">Editar</th>
        </tr>
    </thead>
    <tbody>
    <?php
        foreach($Promocion as $llave => $valores) {
            $prom =explode(',,,',$valores);
            $estado="";
            $estadoT="OFF";
            if (isset($prom[2])) {
        ?>
        <tr>
            <td class="esconder" id="tipoPromo"> boletos </td>
            <td class="esconder" id="fila0P"> <?php if (isset($prom[0])) {echo $prom[0]; }  ?> </td>
            <td class="esconder" id="fila0PromocionP"> <?php if (isset($prom[1])) {echo $prom[1]; }  ?> </td>
            <td> <?php if (isset($prom[2])) {echo $prom[2]; }  ?> </td>
            <td> <?php if (isset($prom[3])) {echo $prom[3]; }  ?> </td>
            <td> <?php if (isset($prom[4])) {echo $prom[4]; }  ?> </td>
            <td> <?php if (isset($prom[5])) {echo $prom[5]; }  ?> </td>
            <td> <?php if (isset($prom[9])) {echo $prom[9]; }  ?> </td>
            <td> <?php if (isset($prom[10])) {echo $prom[10]; }  ?> </td>
            <td> <?php if (isset($prom[6])) {echo $prom[6]; }  ?> </td>
            <td> <?php if (isset($prom[7])) {echo $prom[7]; }  ?> </td>
            <th>
                <?php 
                    if ($prom[8]==="A" ) {
                        $estado="checked";
                        $estadoT="ON";
                    } 
                ?> 
                <div class="form-group">
                    <label class="switch switch-green">
                        <input type="checkbox" class="switch-input"  id="Bbox" <?php echo $estado; ?> disabled>
                        <span class="switch-label" data-on="On" data-off="Off"></span>
                        <span class="switch-handle"></span>
                        <span id="Bestado" class="esconder"><?php echo $estadoT; ?></span>
                    </label>
                </div>
            </th>
            <td class="text-right">
                <a class="seleccionarF btn btn-sm btn-blue" style="margin: 0px;" href="javascript:;"><i class="fa fa-check-square"></i></a>
            </td>
        </tr>
        <?php
            }
        }
        ?> 
        
    </tbody>
</table>
<?php
$transport3->close();
?>