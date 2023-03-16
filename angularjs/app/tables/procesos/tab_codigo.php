<?php
include ("../../conect.php");
include ("../../autenticacion.php");

$localidad="";
$esconder="";
$tipo="CP";
if (isset($_POST["var1"])) {
    $var1 = $_POST['var1'];
    $re = $client->getAllPromocion($var1,$tipo);
    $resultado= "".$re;
    $Promocion =explode(';;',$resultado);
}
$re = $client->getPerfilRol($_SESSION["id"],"25");
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
<table class="table" data-table-name="Promoción código promocional" id="table-editable3" >
    <thead>
        <tr>
            <th class="esconder">id</th>
            <th class="esconder">id_promocion</th>
            <th>Nombre</th>
            <th>Localidad</th>
            <th>Código</th>
            <th>Descuento </th>
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
            <td class="esconder" id="fila0CP"> <?php if (isset($prom[0])) {echo $prom[0]; }  ?> </td>
            <td class="esconder" id="fila0PromocionCP"> <?php if (isset($prom[1])) {echo $prom[1]; }  ?> </td>
            <?php
                if ($prom[3]=="T") {
                    $localidad="TODAS";
                }else if ($prom[3]=="W") {
                    $localidad="WEB";
                }else if ($prom[3]=="A") {
                    $localidad="APP";
                }else if ($prom[3]=="V") {
                    $localidad="TAQUILLA";
                }else if ($prom[3]=="WA") {
                    $localidad="WEB/APP";
                }else if ($prom[3]=="WV") {
                    $localidad="WEB/TAQUILLA";
                }else if ($prom[3]=="AV") {
                    $localidad="APP/TAQUILLA";
                }           
            ?>
            <td> <?php if (isset($prom[2])) {echo $prom[2]; }  ?> </td>
            <td> <?php if (isset($prom[3])) {echo $localidad; }?> </td>
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
                        <input type="checkbox" class="switch-input"  id="CPbox" <?php echo $estado; ?> disabled>
                        <span class="switch-label" data-on="On" data-off="Off"></span>
                        <span class="switch-handle"></span>
                        <span id="CPestado" class="esconder"><?php echo $estadoT; ?></span>
                    </label>
                </div>
            </th>
            <td class="text-right">
                <a class="editarPromoCP btn btn-sm btn-dark <?php echo $editar; ?> " style="margin: 5px;"  href="javascript:;"><i class="icon-note"></i></a>
                <a class="deleteCP btn btn-sm btn-danger <?php echo $eliminar; ?> " style="margin: 5px;"  href="javascript:;"><i class="icon-trash"></i></a>
                <a class="estadoCP  btn btn-sm btn-blue <?php echo $estad; ?> " style="margin: 5px;"  style="margin: 0px;" href="javascript:;"><i class="icon-key"></i></a>
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