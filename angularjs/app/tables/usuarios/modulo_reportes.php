<?php
include ("../../conect.php");
include ("../../autenticacion.php");
$lista=array("REV","REG","RAT","RPM","RPG","RTC","RVS","RCP","RRG","RCG");
foreach($lista as $llave => $valores) {
    ${"crear".$valores}="";
    ${"editar".$valores}="";
    ${"eliminar".$valores}="";
    ${"estado".$valores}="";
    ${"exportar".$valores}="";
    ${"correo".$valores}="";
    ${"ticket".$valores}="";
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
            if($usuario[0]==="67"){
                $tipo="REV";
            }
            if($usuario[0]==="68"){
                $tipo="REG";
            }
            if($usuario[0]==="69"){
                $tipo="RAT";
            }
            if($usuario[0]==="75"){
                $tipo="RPM";
            }
            if($usuario[0]==="76"){
                $tipo="RPG";
            }
            if($usuario[0]==="77"){
                $tipo="RTC";
            }
            if($usuario[0]==="78"){
                $tipo="RVS";
            }
            if($usuario[0]==="79"){
                $tipo="RCP";
            }
            if($usuario[0]==="80"){
                $tipo="RRG";
            }
            if($usuario[0]==="81"){
                $tipo="RCG";
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
                    if($valores1==="5"){
                        ${"estado".$tipo}="checked";
                    }
                    if($valores1==="6"){
                        ${"exportar".$tipo}="checked";
                    }
                    if($valores1==="20"){
                        ${"correo".$tipo}="checked";
                    }
                    if($valores1==="21"){
                        ${"ticket".$tipo}="checked";
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
                <p><label><input type="checkbox" class="REventoVentas" id="REventoVentas" data-checkbox="icheckbox_minimal-red"><strong>REPORTE EVENTO VENTAS</strong></p>
                <div class="input-group">
                    <div class="icheck-list">
                        <label><input type="checkbox" id="exportarREV" <?php echo $exportarREV; ?>  data-checkbox="icheckbox_flat-blue"> Exportar</label>
                        <label><input type="checkbox" id="editarREV" <?php echo $editarREV; ?>  data-checkbox="icheckbox_flat-blue"> Ver Información</label>
                    </div>
                </div>
            </div>       
        </div>
        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
            <div class="form-group">
                <p><label><input type="checkbox" class="REventoGratuito" id="REventoGratuito" data-checkbox="icheckbox_minimal-red"><strong>REPORTE EVENTO GRATUITO</strong></p>
                <div class="input-group">
                    <div class="icheck-list">
                        <label><input type="checkbox" id="exportarREG" <?php echo $exportarREG; ?>  data-checkbox="icheckbox_flat-blue"> Exportar</label>
                        <label><input type="checkbox" id="editarREG" <?php echo $editarREG; ?>  data-checkbox="icheckbox_flat-blue"> Ver Información</label>
                        <label> <input type="checkbox" id="eliminarREG" <?php echo $eliminarREG; ?>  data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                        <label> <input type="checkbox" id="estadoREG" <?php echo $estadoREG; ?>  data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                        <label><input type="checkbox" id="ticketREG" <?php echo $ticketREG; ?>  data-checkbox="icheckbox_flat-blue"> Ver Ticket</label>
                        <label><input type="checkbox" id="correoREG" <?php echo $correoREG; ?>  data-checkbox="icheckbox_flat-blue"> Reenviar Correo</label>
                    </div>
                </div>
            </div>       
        </div>
        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
            <div class="form-group">
                <p><label><input type="checkbox" class="RAmigosTeatro" id="RAmigosTeatro" data-checkbox="icheckbox_minimal-red"><strong>REPORTE AMIGOS TEATRO</strong></p>
                <div class="input-group">
                    <div class="icheck-list">
                        <label><input type="checkbox" id="exportarRAT" <?php echo $exportarRAT; ?>  data-checkbox="icheckbox_flat-blue"> Exportar</label>
                        <label><input type="checkbox" id="editarRAT" <?php echo $editarRAT; ?>  data-checkbox="icheckbox_flat-blue"> Ver Información</label>
                    </div>
                </div>
            </div>       
        </div>
        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
            <div class="form-group">
                <p><label><input type="checkbox" class="RPaymentez" id="RPaymentez" data-checkbox="icheckbox_minimal-red"><strong>REPORTE PAYMENTEZ</strong></p>
                <div class="input-group">
                    <div class="icheck-list">
                        <label><input type="checkbox" id="exportarRPM" <?php echo $exportarRPM; ?>  data-checkbox="icheckbox_flat-blue"> Exportar</label>
                        <label><input type="checkbox" id="editarRPM" <?php echo $editarRPM; ?>  data-checkbox="icheckbox_flat-blue"> Ver Información</label>
                    </div>
                </div>
            </div>       
        </div>
        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
            <div class="form-group">
                <p><label><input type="checkbox" class="RPagos" id="RPagos" data-checkbox="icheckbox_minimal-red"><strong>REPORTE PAGOS</strong></p>
                <div class="input-group">
                    <div class="icheck-list">
                        <label><input type="checkbox" id="exportarRPG" <?php echo $exportarRPG; ?>  data-checkbox="icheckbox_flat-blue"> Exportar</label>
                        <label><input type="checkbox" id="editarRPG" <?php echo $editarRPG; ?>  data-checkbox="icheckbox_flat-blue"> Ver Información</label>
                    </div>
                </div>
            </div>       
        </div>
        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
            <div class="form-group">
                <p><label><input type="checkbox" class="RTickets" id="RTickets" data-checkbox="icheckbox_minimal-red"><strong>REPORTE TICKETS</strong></p>
                <div class="input-group">
                    <div class="icheck-list">
                        <label><input type="checkbox" id="exportarRTC" <?php echo $exportarRTC; ?>  data-checkbox="icheckbox_flat-blue"> Exportar</label>
                        <label><input type="checkbox" id="editarRTC" <?php echo $editarRTC; ?>  data-checkbox="icheckbox_flat-blue"> Ver Información</label>
                    </div>
                </div>
            </div>       
        </div>
        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
            <div class="form-group">
                <p><label><input type="checkbox" class="RVendidosSala" id="RVendidosSala" data-checkbox="icheckbox_minimal-red"><strong>REPORTE VENDIDOS SALA</strong></p>
                <div class="input-group">
                    <div class="icheck-list">
                        <label><input type="checkbox" id="exportarRVS" <?php echo $exportarRVS; ?>  data-checkbox="icheckbox_flat-blue"> Exportar</label>
                        <label><input type="checkbox" id="editarRVS" <?php echo $editarRVS; ?>  data-checkbox="icheckbox_flat-blue"> Ver Información</label>
                    </div>
                </div>
            </div>       
        </div>
        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
            <div class="form-group">
                <p><label><input type="checkbox" class="RCumpleanos" id="RCumpleanos" data-checkbox="icheckbox_minimal-red"><strong>REPORTE CUMPLEAÑOS</strong></p>
                <div class="input-group">
                    <div class="icheck-list">
                        <label><input type="checkbox" id="exportarRCP" <?php echo $exportarRCP; ?>  data-checkbox="icheckbox_flat-blue"> Exportar</label>
                        <label><input type="checkbox" id="editarRCP" <?php echo $editarRCP; ?>  data-checkbox="icheckbox_flat-blue"> Ver Información</label>
                    </div>
                </div>
            </div>       
        </div>
        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
            <div class="form-group">
                <p><label><input type="checkbox" class="RRegalo" id="RRegalo" data-checkbox="icheckbox_minimal-red"><strong>REPORTE REGALO</strong></p>
                <div class="input-group">
                    <div class="icheck-list">
                        <label><input type="checkbox" id="exportarRRG" <?php echo $exportarRRG; ?>  data-checkbox="icheckbox_flat-blue"> Exportar</label>
                        <label><input type="checkbox" id="editarRRG" <?php echo $editarRRG; ?>  data-checkbox="icheckbox_flat-blue"> Ver Información</label>
                    </div>
                </div>
            </div>       
        </div>
        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
            <div class="form-group">
                <p><label><input type="checkbox" class="RCompleto" id="RCompleto" data-checkbox="icheckbox_minimal-red"><strong>REPORTE COMPLETO</strong></p>
                <div class="input-group">
                    <div class="icheck-list">
                        <label><input type="checkbox" id="exportarRCG" <?php echo $exportarRCG; ?>  data-checkbox="icheckbox_flat-blue"> Exportar</label>
                        <label><input type="checkbox" id="editarRCG" <?php echo $editarRCG; ?>  data-checkbox="icheckbox_flat-blue"> Ver Información</label>
                    </div>
                </div>
            </div>       
        </div>
    </div>      
</div>
<?php
$transport->close();
?>