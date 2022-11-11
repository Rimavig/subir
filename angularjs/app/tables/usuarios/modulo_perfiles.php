<?php
include ("../../conect.php");
include ("../../autenticacion.php");



$lista=array("P","UAD","UCL","UEV");
foreach($lista as $llave => $valores) {
    ${"crear".$valores}="";
    ${"editar".$valores}="";
    ${"eliminar".$valores}="";
    ${"estado".$valores}="";
    ${"exportar".$valores}="";
    ${"reset".$valores}="";
    ${"facturacion".$valores}="";
    ${"correo".$valores}="";
}

if (isset($_POST["var1"])) {
    $var1 = $_POST['var1'];
    $re = $client->getPerfil($var1);
    $resultado = "".$re;
    $usuarios= explode(';;',$resultado);
    foreach($usuarios as $llave => $valores) {
        $usuario =explode(':',$valores);
        $tipo=""; 
        if (isset($usuario[1])) {
            if($usuario[0]==="4"){
                $tipo="P";
            }
            if($usuario[0]==="1"){
                $tipo="UAD";
            }
            if($usuario[0]==="2"){
                $tipo="UCL";
            }
            if($usuario[0]==="3"){
                $tipo="UEV";
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
                    if($valores1==="15"){
                        ${"facturacion".$tipo}="checked";
                    }
                    if($valores1==="20"){
                        ${"correo".$tipo}="checked";
                    }
                }    
            }
            
        }   
    } 
}
?>
 <div class="panel-body">                          
    <div class="row" >
        <div class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
            <div class="form-group">
                <p><label><input type="checkbox" class="Tperfiles" id="Tperfiles" data-checkbox="icheckbox_minimal-red"><strong>PERFILES</strong></label></p>
                
                <div class="input-group">
                    <div class="icheck-list">
                        <label><input type="checkbox" id="exportarP" <?php echo $exportarP; ?> data-checkbox="icheckbox_flat-blue"> Exportar</label>
                        <label><input type="checkbox" id="crearP" <?php echo $crearP; ?> data-checkbox="icheckbox_flat-blue"> Crear</label>
                        <label><input type="checkbox" id="editarP" <?php echo $editarP; ?> data-checkbox="icheckbox_flat-blue"> Editar</label>
                        <label> <input type="checkbox" id="eliminarP" <?php echo $eliminarP; ?> data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                        <label> <input type="checkbox" id="estadoP" <?php echo $estadoP; ?> data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                    </div>
                </div>
            </div>       
        </div>
        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
            <div class="form-group">
                <p><label><input type="checkbox"  class="usuariosUAD" id="usuariosUAD" data-checkbox="icheckbox_minimal-red"><strong>USUARIOS ADMINISTRADORES</strong></p>
                <div class="input-group">
                    <div class="icheck-list">
                        <label><input type="checkbox" id="exportarUAD" <?php echo $exportarUAD; ?> data-checkbox="icheckbox_flat-blue"> Exportar</label>
                        <label><input type="checkbox" id="crearUAD" <?php echo $crearUAD; ?> data-checkbox="icheckbox_flat-blue"> Crear</label>
                        <label><input type="checkbox" id="editarUAD" <?php echo $editarUAD; ?> data-checkbox="icheckbox_flat-blue"> Editar</label>
                        <label> <input type="checkbox" id="eliminarUAD" <?php echo $eliminarUAD; ?> data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                        <label> <input type="checkbox" id="resetUAD" <?php echo $resetUAD; ?> data-checkbox="icheckbox_flat-blue"> Resetear Clave</label>
                        <label> <input type="checkbox" id="estadoUAD" <?php echo $estadoUAD; ?> data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                    </div>
                </div>
            </div>       
        </div>
        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
            <div class="form-group">
                <p><label><input type="checkbox" class="usuariosUCL" id="usuariosUCL" data-checkbox="icheckbox_minimal-red"><strong>USUARIOS CLIENTES</strong></p>
                <div class="input-group">
                    <div class="icheck-list">
                        <label><input type="checkbox" id="exportarUCL" <?php echo $exportarUCL; ?>  data-checkbox="icheckbox_flat-blue"> Exportar</label>
                        <label><input type="checkbox" id="crearUCL" <?php echo $crearUCL; ?>  data-checkbox="icheckbox_flat-blue"> Crear</label>
                        <label><input type="checkbox" id="editarUCL" <?php echo $editarUCL; ?>  data-checkbox="icheckbox_flat-blue"> Editar</label>
                        <label> <input type="checkbox" id="eliminarUCL" <?php echo $eliminarUCL; ?>  data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                        <label> <input type="checkbox" id="resetUCL" <?php echo $resetUCL; ?>  data-checkbox="icheckbox_flat-blue"> Resetear Clave</label>
                        <label> <input type="checkbox" id="estadoUCL" <?php echo $estadoUCL; ?>  data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                        <label> <input type="checkbox" id="correoUCL" <?php echo $correoUCL; ?>  data-checkbox="icheckbox_flat-blue">Reenviar Verificación</label>
                        <label> <input type="checkbox" id="facturacionUCL" <?php echo $facturacionUCL; ?>  data-checkbox="icheckbox_flat-blue"> Facturación</label>
                    </div>
                </div>
            </div>       
        </div>
        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
            <div class="form-group">
                <p><label><input type="checkbox" class="usuariosUEV" id="usuariosUEV" data-checkbox="icheckbox_minimal-red"><strong>USUARIOS EVENTOS</strong></p>
                <div class="input-group">
                    <div class="icheck-list">
                        <label><input type="checkbox" id="exportarUEV" <?php echo $exportarUEV; ?> data-checkbox="icheckbox_flat-blue"> Exportar</label>
                        <label><input type="checkbox" id="crearUEV" <?php echo $crearUEV; ?> data-checkbox="icheckbox_flat-blue"> Crear</label>
                        <label><input type="checkbox" id="editarUEV" <?php echo $editarUEV; ?> data-checkbox="icheckbox_flat-blue"> Editar</label>
                        <label> <input type="checkbox" id="eliminarUEV" <?php echo $eliminarUEV; ?> data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                        <label> <input type="checkbox" id="resetUEV" <?php echo $resetUEV; ?> data-checkbox="icheckbox_flat-blue"> Resetear Clave</label>
                        <label> <input type="checkbox" id="estadoUEV" <?php echo $estadoUEV; ?> data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                    </div>
                </div>
            </div>       
        </div>
    </div>
</div>