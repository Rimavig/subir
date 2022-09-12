<?php
include ("../../conect.php");
include ("../../autenticacion.php");
$lista=array("CRC","CB","CCB","CD","CC","CR","CBC","CEC","CRG","CAD","CDE");
foreach($lista as $llave => $valores) {
    ${"crear".$valores}="";
    ${"editar".$valores}="";
    ${"eliminar".$valores}="";
    ${"correo".$valores}="";
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
            if($usuario[0]==="56"){
                $tipo="CRC";
            }
            if($usuario[0]==="57"){
                $tipo="CB";
            }
            if($usuario[0]==="58"){
                $tipo="CCB";
            }
            if($usuario[0]==="59"){
                $tipo="CD";
            }
            if($usuario[0]==="60"){
                $tipo="CC";
            }
            if($usuario[0]==="61"){
                $tipo="CR";
            }
            if($usuario[0]==="62"){
                $tipo="CBC";
            }
            if($usuario[0]==="63"){
                $tipo="CEC";
            }
            if($usuario[0]==="64"){
                $tipo="CRG";
            }
            if($usuario[0]==="65"){
                $tipo="CAD";
            }
            if($usuario[0]==="66"){
                $tipo="CDE";
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
                    if($valores1==="20"){
                        ${"correo".$tipo}="checked";
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
                <p><label><input type="checkbox" class="CReinicioCorreo" id="CReinicioCorreo" data-checkbox="icheckbox_minimal-red"><strong>REINICIO CONTRASEÑA</strong></p>
                <div class="input-group">
                    <div class="icheck-list">
                        <label><input type="checkbox" id="editarCRC" <?php echo $editarCRC; ?>  data-checkbox="icheckbox_flat-blue"> Editar</label>
                        <label><input type="checkbox" id="correoCRC" <?php echo $correoCRC; ?>  data-checkbox="icheckbox_flat-blue"> Probar Correo</label>
                    </div>
                </div>
            </div>       
        </div>
        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
            <div class="form-group">
                <p><label><input type="checkbox" class="CBienvenido" id="CBienvenido" data-checkbox="icheckbox_minimal-red"><strong>BIENVENIDO</strong></p>
                <div class="input-group">
                    <div class="icheck-list">
                        <label><input type="checkbox" id="editarCB" <?php echo $editarCB; ?>  data-checkbox="icheckbox_flat-blue"> Editar</label>
                        <label><input type="checkbox" id="correoCB" <?php echo $correoCB; ?>  data-checkbox="icheckbox_flat-blue"> Probar Correo</label>
                    </div>
                </div>
            </div>       
        </div>
        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
            <div class="form-group">
                <p><label><input type="checkbox" class="CCompraBoleto" id="CCompraBoleto" data-checkbox="icheckbox_minimal-red"><strong>COMPRA DE BOLETO</strong></p>
                <div class="input-group">
                    <div class="icheck-list">
                        <label><input type="checkbox" id="editarCCB" <?php echo $editarCCB; ?>  data-checkbox="icheckbox_flat-blue"> Editar</label>
                        <label><input type="checkbox" id="correoCCB" <?php echo $correoCCB; ?>  data-checkbox="icheckbox_flat-blue"> Probar Correo</label>
                    </div>
                </div>
            </div>       
        </div>
        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
            <div class="form-group">
                <p><label><input type="checkbox" class="CDonacion" id="CDonacion" data-checkbox="icheckbox_minimal-red"><strong>DONACIÓN</strong></p>
                <div class="input-group">
                    <div class="icheck-list">
                        <label><input type="checkbox" id="editarCD" <?php echo $editarCD; ?>  data-checkbox="icheckbox_flat-blue"> Editar</label>
                        <label><input type="checkbox" id="correoCD" <?php echo $correoCD; ?>  data-checkbox="icheckbox_flat-blue"> Probar Correo</label>
                    </div>
                </div>
            </div>       
        </div>
        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
            <div class="form-group">
                <p><label><input type="checkbox" class="CCumpleanos" id="CCumpleanos" data-checkbox="icheckbox_minimal-red"><strong>CUMPLEAÑOS</strong></p>
                <div class="input-group">
                    <div class="icheck-list">
                        <label><input type="checkbox" id="editarCC" <?php echo $editarCC; ?>  data-checkbox="icheckbox_flat-blue"> Editar</label>
                        <label><input type="checkbox" id="correoCC" <?php echo $correoCC; ?>  data-checkbox="icheckbox_flat-blue"> Probar Correo</label>
                    </div>
                </div>
            </div>       
        </div>
        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
            <div class="form-group">
                <p><label><input type="checkbox" class="CRegalo" id="CRegalo" data-checkbox="icheckbox_minimal-red"><strong>REGALO PARA TÍ</strong></p>
                <div class="input-group">
                    <div class="icheck-list">
                        <label><input type="checkbox" id="editarCR" <?php echo $editarCR; ?>  data-checkbox="icheckbox_flat-blue"> Editar</label>
                        <label><input type="checkbox" id="correoCR" <?php echo $correoCR; ?>  data-checkbox="icheckbox_flat-blue"> Probar Correo</label>
                    </div>
                </div>
            </div>       
        </div>
        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
            <div class="form-group">
                <p><label><input type="checkbox" class="CBoletoC" id="CBoletoC" data-checkbox="icheckbox_minimal-red"><strong>BOLETO CORTESÍA</strong></p>
                <div class="input-group">
                    <div class="icheck-list">
                        <label><input type="checkbox" id="editarCBC" <?php echo $editarCBC; ?>  data-checkbox="icheckbox_flat-blue"> Editar</label>
                        <label><input type="checkbox" id="correoCBC" <?php echo $correoCBC; ?>  data-checkbox="icheckbox_flat-blue"> Probar Correo</label>
                    </div>
                </div>
            </div>       
        </div>
        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
            <div class="form-group">
                <p><label><input type="checkbox" class="CEliminarC" id="CEliminarC" data-checkbox="icheckbox_minimal-red"><strong>ELIMINAR CUENTA</strong></p>
                <div class="input-group">
                    <div class="icheck-list">
                        <label><input type="checkbox" id="editarCEC" <?php echo $editarCEC; ?>  data-checkbox="icheckbox_flat-blue"> Editar</label>
                        <label><input type="checkbox" id="correoCEC" <?php echo $correoCEC; ?>  data-checkbox="icheckbox_flat-blue"> Probar Correo</label>
                    </div>
                </div>
            </div>       
        </div>
        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
            <div class="form-group">
                <p><label><input type="checkbox" class="CRegistroG" id="CRegistroG" data-checkbox="icheckbox_minimal-red"><strong>REGISTRO GRATUITO</strong></p>
                <div class="input-group">
                    <div class="icheck-list">
                        <label><input type="checkbox" id="editarCRG" <?php echo $editarCRG; ?>  data-checkbox="icheckbox_flat-blue"> Editar</label>
                        <label><input type="checkbox" id="correoCRG" <?php echo $correoCRG; ?>  data-checkbox="icheckbox_flat-blue"> Probar Correo</label>
                    </div>
                </div>
            </div>       
        </div>
        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
            <div class="form-group">
                <p><label><input type="checkbox" class="CAdministracionD" id="CAdministracionD" data-checkbox="icheckbox_minimal-red"><strong>DESTINATARIOS</strong></p>
                <div class="input-group">
                    <div class="icheck-list">
                        <label><input type="checkbox" id="editarCAD" <?php echo $editarCAD; ?>  data-checkbox="icheckbox_flat-blue"> Editar</label>
                        <label><input type="checkbox" id="crearCAD" <?php echo $crearCAD; ?>  data-checkbox="icheckbox_flat-blue"> Crear</label>
                        <label><input type="checkbox" id="eliminarCAD" <?php echo $eliminarCAD; ?>  data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                    </div>
                </div>
            </div>       
        </div>
        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
            <div class="form-group">
                <p><label><input type="checkbox" class="CAdministracionE" id="CAdministracionE" data-checkbox="icheckbox_minimal-red"><strong>REENVIAR CORREOS</strong></p>
                <div class="input-group">
                    <div class="icheck-list">
                        <label><input type="checkbox" id="editarCDE" <?php echo $editarCDE; ?>  data-checkbox="icheckbox_flat-blue"> Editar</label>
                        <label><input type="checkbox" id="eliminarCDE" <?php echo $eliminarCDE; ?>  data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                        <label><input type="checkbox" id="correoCDE" <?php echo $correoCDE; ?>  data-checkbox="icheckbox_flat-blue"> Reenviar Correo</label>
                    </div>
                </div>
            </div>       
        </div>
    </div>      
</div>