<?php
include ("../../conect.php");
include ("../../autenticacion.php");
$lista=array("IS","ID","IB","IL");
foreach($lista as $llave => $valores) {
    ${"crear".$valores}="";
    ${"editar".$valores}="";
    ${"eliminar".$valores}="";
    ${"estado".$valores}="";
    ${"exportar".$valores}="";
}
$escon="";
if (isset($_POST["var1"])) {
    $var1 = $_POST['var1'];
    $re = $client->getPerfil($var1);
    $resultado = "".$re;
    $usuarios= explode(';;',$resultado);
    foreach($usuarios as $llave => $valores) {
        $usuario =explode(':',$valores);
        $tipo=""; 
        if (isset($usuario[1])) {
            if($usuario[0]==="15"){
                $tipo="IS";
            }
            if($usuario[0]==="16"){
                $tipo="ID";
            }
            if($usuario[0]==="17"){
                $tipo="IB";
            }
            if($usuario[0]==="18"){
                $tipo="IL";
            }
            if($tipo!=""){
                $accion =explode(',',$usuario[1]);
                foreach($accion as $llave => $valores1) {
                    if($valores1==="1"){
                        ${"crear".$tipo}="checked";
                    }
                    if($valores1==="2"){
                        ${"editar".$tipo}="checked";
                    }
                    if($valores1==="3"){
                        ${"eliminar".$tipo}="checked";
                    }
                    if($valores1==="4"){
                        ${"reset".$tipo}="checked";
                    }
                    if($valores1==="5"){
                        ${"estado".$tipo}="checked";
                    }
                    if($valores1==="6"){
                        ${"exportar".$tipo}="checked";
                    }
                } 
            }
               
        }   
    } 
}else{
    $escon="hide";
}
?>
<div class="panel-body">
<div class="row">  
    <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
        <div class="form-group">
            <p><label><input type="checkbox" class="TimagenSala" id="TimagenSala" data-checkbox="icheckbox_minimal-red"><strong>SALA</strong></p>
            <div class="input-group">
                <div class="icheck-list">
                    <label><input type="checkbox" id="exportarIS" <?php echo $exportarIS; ?> data-checkbox="icheckbox_flat-blue"> Exportar</label>
                    <label><input type="checkbox" id="crearIS" <?php echo $crearIS; ?> data-checkbox="icheckbox_flat-blue"> Crear</label>
                    <label><input type="checkbox" id="editarIS" <?php echo $editarIS; ?> data-checkbox="icheckbox_flat-blue"> Editar</label>
                    <label> <input type="checkbox" id="eliminarIS" <?php echo $eliminarIS; ?> data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                    <label> <input type="checkbox" id="estadoIS" <?php echo $estadoIS; ?> data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                </div>
            </div>
        </div>       
    </div>
    <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
        <div class="form-group">
            <p><label><input type="checkbox" class="TimagenDistribucion" id="TimagenDistribucion" data-checkbox="icheckbox_minimal-red"><strong>DISTRIBUCION</strong></p>
            <div class="input-group">
                <div class="icheck-list">
                    <label><input type="checkbox" id="exportarID" <?php echo $exportarID; ?> data-checkbox="icheckbox_flat-blue"> Exportar</label>
                    <label><input type="checkbox" id="crearID" <?php echo $crearID; ?> data-checkbox="icheckbox_flat-blue"> Crear</label>
                    <label><input type="checkbox" id="editarID" <?php echo $editarID; ?> data-checkbox="icheckbox_flat-blue"> Editar</label>
                    <label> <input type="checkbox" id="eliminarID" <?php echo $eliminarID; ?> data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                    <label> <input type="checkbox" id="estadoID" <?php echo $estadoID; ?> data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                </div>
            </div>
        </div>       
    </div>
    <div  class="col-md-3 col-sm-3 col-xs-6 hide" style ="margin-bottom: 30px!important;">
        <div class="form-group">
            <p><label><input type="checkbox" class="TimagenBanner" id="TimagenBanner" data-checkbox="icheckbox_minimal-red"><strong>BANNER</strong></p>
            <div class="input-group">
                <div class="icheck-list">
                    <label><input type="checkbox" id="exportarIB" <?php echo $exportarIB; ?> data-checkbox="icheckbox_flat-blue"> Exportar</label>
                    <label><input type="checkbox" id="crearIB" <?php echo $crearIB; ?> data-checkbox="icheckbox_flat-blue"> Crear</label>
                    <label><input type="checkbox" id="editarIB" <?php echo $editarIB; ?> data-checkbox="icheckbox_flat-blue"> Editar</label>
                    <label> <input type="checkbox" id="eliminarIB" <?php echo $eliminarIB; ?> data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                    <label> <input type="checkbox" id="estadoIB" <?php echo $estadoIB; ?> data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                </div>
            </div>
        </div>       
    </div>
    <div  class="col-md-3 col-sm-3 col-xs-6 hide" style ="margin-bottom: 30px!important;">
        <div class="form-group">
            <p><label><input type="checkbox" class="Tlogo" id="Tlogo" data-checkbox="icheckbox_minimal-red"><strong>LOGO</strong></p>
            <div class="input-group">
                <div class="icheck-list">
                    <label><input type="checkbox" id="exportarIL" <?php echo $exportarIL; ?> data-checkbox="icheckbox_flat-blue"> Exportar</label>
                    <label><input type="checkbox" id="crearIL" <?php echo $crearIL; ?> data-checkbox="icheckbox_flat-blue"> Crear</label>
                    <label><input type="checkbox" id="editarIL" <?php echo $editarIL; ?> data-checkbox="icheckbox_flat-blue"> Editar</label>
                    <label> <input type="checkbox" id="eliminarIL" <?php echo $eliminarIL; ?> data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                    <label> <input type="checkbox" id="estadoIL" <?php echo $estadoIL; ?> data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                </div>
            </div>
        </div>       
    </div>
</div>
</div>
<?php
$transport->close();
?>