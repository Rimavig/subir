<?php
include ("../../conect.php");
include ("../../autenticacion.php");
$lista=array("PS","CT","PP","PPG","PAB","PAP","PAI","PC","PF","PPF");
foreach($lista as $llave => $valores) {
    ${"crear".$valores}="";
    ${"editar".$valores}="";
    ${"eliminar".$valores}="";
    ${"estado".$valores}="";
    ${"exportar".$valores}="";
    ${"bloquear".$valores}="";
    ${"cortesia".$valores}="";
    ${"correo".$valores}="";
    ${"ticket".$valores}="";
    ${"puntos".$valores}="";
    ${"regalo".$valores}="";
    ${"cumpleanos".$valores}="";
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
            if($usuario[0]==="23"){
                $tipo="PS";
            }
            if($usuario[0]==="24"){
                $tipo="CT";
            }
            if($usuario[0]==="25"){
                $tipo="PP";
            }
            if($usuario[0]==="26"){
                $tipo="PPG";
            }
            if($usuario[0]==="28"){
                $tipo="PAB";
            }
            if($usuario[0]==="42"){
                $tipo="PAP";
            }
            if($usuario[0]==="43"){
                $tipo="PAI";
            }
            if($usuario[0]==="29"){
                $tipo="PC";
            }
            if($usuario[0]==="30"){
                $tipo="PF";
            }
            if($usuario[0]==="52"){
                $tipo="PPF";
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
                    if($valores1==="12"){
                        ${"bloquear".$tipo}="checked";
                    }
                    if($valores1==="13"){
                        ${"bloquear".$tipo}="checked";
                    }
                    if($valores1==="14"){
                        ${"cortesia".$tipo}="checked";
                    }
                    if($valores1==="15"){
                        ${"facturacion".$tipo}="checked";
                    }
                    if($valores1==="20"){
                        ${"correo".$tipo}="checked";
                    }
                    if($valores1==="21"){
                        ${"ticket".$tipo}="checked";
                    }
                    if($valores1==="28"){
                        ${"puntos".$tipo}="checked";
                    }
                    if($valores1==="29"){
                        ${"cumpleanos".$tipo}="checked";
                    }
                    if($valores1==="30"){
                        ${"regalo".$tipo}="checked";
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
                <p><label><input type="checkbox" class="TditribucionSala" id="TditribucionSala" data-checkbox="icheckbox_minimal-red"><strong>DISTRIBUCIÓN SALA</strong></p>
                <div class="input-group">
                    <div class="icheck-list">
                        <label><input type="checkbox" id="bloquearPS" <?php echo $bloquearPS; ?>  data-checkbox="icheckbox_flat-blue"> Bloquear/ Desbloquear</label>
                        <label><input type="checkbox" id="cortesiaPS" <?php echo $cortesiaPS; ?>  data-checkbox="icheckbox_flat-blue"> Cortesia</label>
                    </div>
                </div>
            </div>       
        </div>
        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
            <div class="form-group">
                <p><label><input type="checkbox" class="TeliminarCortesia" id="TeliminarCortesia" data-checkbox="icheckbox_minimal-red"><strong>ELIMINAR CORTESIA</strong></p>
                <div class="input-group">
                    <div class="icheck-list">
                        <label><input type="checkbox" id="exportarCT" <?php echo $exportarCT; ?>  data-checkbox="icheckbox_flat-blue"> Exportar</label>
                        <label><input type="checkbox" id="editarCT" <?php echo $editarCT; ?>  data-checkbox="icheckbox_flat-blue"> Editar</label>
                        <label> <input type="checkbox" id="eliminarCT" <?php echo $eliminarCT; ?>  data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                        <label> <input type="checkbox" id="correoCT" <?php echo $correoCT; ?>  data-checkbox="icheckbox_flat-blue"> Reenviar Correo</label>
                        <label> <input type="checkbox" id="ticketCT" <?php echo $ticketCT; ?>  data-checkbox="icheckbox_flat-blue"> Ver Ticket</label>
                    </div>
                </div>
            </div>       
        </div>
        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
            <div class="form-group">
                <p><label><input type="checkbox" class="TprocesosPromocion" id="TprocesosPromocion" data-checkbox="icheckbox_minimal-red"><strong>PROMOCIÓN</strong></p>
                <div class="input-group">
                    <div class="icheck-list">
                        <label><input type="checkbox" id="exportarPP" <?php echo $exportarPP; ?>  data-checkbox="icheckbox_flat-blue"> Exportar</label>
                        <label><input type="checkbox" id="crearPP" <?php echo $crearPP; ?>  data-checkbox="icheckbox_flat-blue"> Crear</label>
                        <label><input type="checkbox" id="editarPP" <?php echo $editarPP; ?>  data-checkbox="icheckbox_flat-blue"> Editar</label>
                        <label> <input type="checkbox" id="eliminarPP" <?php echo $eliminarPP; ?>  data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                        <label> <input type="checkbox" id="estadoPP" <?php echo $estadoPP; ?>  data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                    </div>
                </div>
            </div>       
        </div>
        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
            <div class="form-group">
                <p><label><input type="checkbox" class="TprocesosPromocionG" id="TprocesosPromocionG" data-checkbox="icheckbox_minimal-red"><strong>PROMOCION GENERAL</strong></p>
                <div class="input-group">
                    <div class="icheck-list">
                        <label><input type="checkbox" id="exportarPPG" <?php echo $exportarPPG; ?>  data-checkbox="icheckbox_flat-blue"> Exportar</label>
                        <label><input type="checkbox" id="crearPPG" <?php echo $crearPPG; ?> data-checkbox="icheckbox_flat-blue"> Crear</label>
                        <label><input type="checkbox" id="editarPPG" <?php echo $editarPPG; ?>  data-checkbox="icheckbox_flat-blue"> Editar</label>
                        <label> <input type="checkbox" id="eliminarPPG" <?php echo $eliminarPPG; ?>  data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                        <label> <input type="checkbox" id="estadoPPG" <?php echo $estadoPPG; ?>  data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                    </div>
                </div>
            </div>       
        </div>
        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
            <div class="form-group">
                <p><label><input type="checkbox" class="TprocesosAmigosB" id="TprocesosAmigosB" data-checkbox="icheckbox_minimal-red"><strong>AMIGOS-BENEFICIOS</strong></p>
                <div class="input-group">
                    <div class="icheck-list">
                        <label><input type="checkbox" id="crearPAB" <?php echo $crearPAB; ?> data-checkbox="icheckbox_flat-blue"> Crear</label>
                        <label><input type="checkbox" id="editarPAB" <?php echo $editarPAB; ?>  data-checkbox="icheckbox_flat-blue"> Editar</label>
                        <label> <input type="checkbox" id="eliminarPAB" <?php echo $eliminarPAB; ?>  data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                    </div>
                </div>
            </div>       
        </div>
        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
            <div class="form-group">
                <p><label><input type="checkbox" class="TprocesosAmigosP" id="TprocesosAmigosP" data-checkbox="icheckbox_minimal-red"><strong>AMIGOS-PREGUNTAS F</strong></p>
                <div class="input-group">
                    <div class="icheck-list">
                        <label><input type="checkbox" id="crearPAP" <?php echo $crearPAP; ?> data-checkbox="icheckbox_flat-blue"> Crear</label>
                        <label><input type="checkbox" id="editarPAP" <?php echo $editarPAP; ?>  data-checkbox="icheckbox_flat-blue"> Editar</label>
                        <label> <input type="checkbox" id="eliminarPAP" <?php echo $eliminarPAP; ?>  data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                    </div>
                </div>
            </div>       
        </div>
        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
            <div class="form-group">
                <p><label><input type="checkbox" class="TprocesosPromocionF" id="TprocesosPromocionF" data-checkbox="icheckbox_minimal-red"><strong>PROMOCIÓN FIDELIDAD</strong></p>
                <div class="input-group">
                    <div class="icheck-list">
                        <label><input type="checkbox" id="puntosPPF" <?php echo $puntosPPF; ?>  data-checkbox="icheckbox_flat-blue"> Editar Puntos</label>
                        <label><input type="checkbox" id="cumpleanosPPF" <?php echo $cumpleanosPPF; ?>  data-checkbox="icheckbox_flat-blue"> Editar Descuento Cumpleaños</label>
                        <label><input type="checkbox" id="regaloPPF" <?php echo $regaloPPF; ?>  data-checkbox="icheckbox_flat-blue"> Editar Descuento Regalo </label>
                    </div>
                </div>
            </div>       
        </div>
        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
            <div class="form-group">
                <p><label><input type="checkbox" class="TprocesosAmigosI" id="TprocesosAmigosI" data-checkbox="icheckbox_minimal-red"><strong>AMIGOS-INFORMACIÓN</strong></p>
                <div class="input-group">
                    <div class="icheck-list">
                        <label><input type="checkbox" id="editarPAI" <?php echo $editarPAI; ?>  data-checkbox="icheckbox_flat-blue"> Editar</label>
                    </div>
                </div>
            </div>       
        </div>
        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
            <div class="form-group">
                <p><label><input type="checkbox" class="TprocesosContactos" id="TprocesosContactos" data-checkbox="icheckbox_minimal-red"><strong>CONTACTOS</strong></p>
                <div class="input-group">
                    <div class="icheck-list">
                        <label><input type="checkbox" id="editarPC" <?php echo $editarPC; ?>  data-checkbox="icheckbox_flat-blue"> Editar</label>
                    </div>
                </div>
            </div>       
        </div>
        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
            <div class="form-group">
                <p><label><input type="checkbox" class="TprocesosFundacion" id="TprocesosFundacion" data-checkbox="icheckbox_minimal-red"><strong>FUNDACIÓN</strong></p>
                <div class="input-group">
                    <div class="icheck-list">
                        <label><input type="checkbox" id="editarPF" <?php echo $editarPF; ?>  data-checkbox="icheckbox_flat-blue"> Editar</label>
                    </div>
                </div>
            </div>       
        </div>
        
    </div>      
</div>