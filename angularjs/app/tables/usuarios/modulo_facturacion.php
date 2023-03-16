<?php
include ("../../conect.php");
include ("../../autenticacion.php");
$lista=array("FC","FR","FVR","EFT","EPG","ECP","RNC","RVE");
foreach($lista as $llave => $valores) {
    ${"crear".$valores}="";
    ${"editar".$valores}="";
    ${"eliminar".$valores}="";
    ${"estado".$valores}="";
    ${"exportar".$valores}="";
    ${"bloquear".$valores}="";
    ${"cortesia".$valores}="";
    ${"moviles".$valores}="";
    ${"B1".$valores}="";
    ${"B2".$valores}="";
    ${"recepcion".$valores}="";
    ${"correo".$valores}="";
    ${"ticket".$valores}="";
    ${"actualizarF".$valores}="";
    ${"eliminarC".$valores}="";
    ${"devolucion".$valores}="";
    ${"anularC".$valores}="";
    ${"notaCredito".$valores}="";
    ${"adminG".$valores}="";
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
            if($usuario[0]==="40"){
                $tipo="FC";
            }
            if($usuario[0]==="41"){
                $tipo="FR";
            }
            if($usuario[0]==="55"){
                $tipo="FVR";
            }
            if($usuario[0]==="71"){
                $tipo="EFT";
            }
            if($usuario[0]==="72"){
                $tipo="EPG";
            }
            if($usuario[0]==="82"){
                $tipo="ECP";
            }
            if($usuario[0]==="85"){
                $tipo="RNC";
            }
            if($usuario[0]==="84"){
                $tipo="RVE";
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
                    if($valores1==="16"){
                        ${"moviles".$tipo}="checked";
                    }
                    if($valores1==="17"){
                        ${"B1".$tipo}="checked";
                    }
                    if($valores1==="18"){
                        ${"B2".$tipo}="checked";
                    }
                    if($valores1==="19"){
                        ${"recepcion".$tipo}="checked";
                    }
                    if($valores1==="20"){
                        ${"correo".$tipo}="checked";
                    }
                    if($valores1==="21"){
                        ${"ticket".$tipo}="checked";
                    }
                    if($valores1==="22"){
                        ${"actualizarF".$tipo}="checked";
                    }
                    if($valores1==="23"){
                        ${"eliminarC".$tipo}="checked";
                    }
                    if($valores1==="24"){
                        ${"devolucion".$tipo}="checked";
                    }
                    if($valores1==="25"){
                        ${"anularC".$tipo}="checked";
                    }
                    if($valores1==="26"){
                        ${"notaCredito".$tipo}="checked";
                    }
                    if($valores1==="27"){
                        ${"adminG".$tipo}="checked";
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
                <p><label><input type="checkbox" class="TfacturacionCaja" id="TfacturacionCaja" data-checkbox="icheckbox_minimal-red"><strong>CAJA</strong></p>
                <div class="input-group">
                    <div class="icheck-list">
                        
                        <!--label><input type="checkbox" id="movilesFC" <?php echo $movilesFC; ?>  data-checkbox="icheckbox_flat-blue"> Boletería Moviles</label-->
                        <label><input type="checkbox" id="B1FC" <?php echo $B1FC; ?>  data-checkbox="icheckbox_flat-blue"> Boletería 1</label>
                        <label><input type="checkbox" id="B2FC" <?php echo $B2FC; ?>  data-checkbox="icheckbox_flat-blue"> Boletería 2</label>
                        <label><input type="checkbox" id="recepcionFC" <?php echo $recepcionFC; ?>  data-checkbox="icheckbox_flat-blue"> Recepción</label>
                        <label><input type="checkbox" id="estadoFC" <?php echo $estadoFC; ?>  data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                        <label><input type="checkbox" id="exportarFC" <?php echo $exportarFC; ?>  data-checkbox="icheckbox_flat-blue"> Exportar</label>
                    </div>
                </div>
            </div>       
        </div>
        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
            <div class="form-group">
                <p><label><input type="checkbox" class="TfacturacionReporte" id="TfacturacionReporte" data-checkbox="icheckbox_minimal-red"><strong>REPORTE CAJA</strong></p>
                <div class="input-group">
                    <div class="icheck-list">
                        <label><input type="checkbox" id="exportarFR" <?php echo $exportarFR; ?>  data-checkbox="icheckbox_flat-blue"> Exportar</label>
                        <label><input type="checkbox" id="editarFR" <?php echo $editarFR; ?>  data-checkbox="icheckbox_flat-blue"> Detalles</label>
                        <label><input type="checkbox" id="correoFR" <?php echo $correoFR; ?>  data-checkbox="icheckbox_flat-blue"> Reenviar Correo</label>
                        <label><input type="checkbox" id="adminGFR" <?php echo $adminGFR; ?>  data-checkbox="icheckbox_flat-blue"> Detalle General Usuarios</label>
                    </div>
                </div>
            </div>       
        </div>
        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
            <div class="form-group">
                <p><label><input type="checkbox" class="TVentasReporte" id="TVentasReporte" data-checkbox="icheckbox_minimal-red"><strong>REPORTE VENTAS FACTURADAS</strong></p>
                <div class="input-group">
                    <div class="icheck-list">
                        <label><input type="checkbox" id="exportarFVR" <?php echo $exportarFVR; ?>  data-checkbox="icheckbox_flat-blue"> Exportar</label>
                        <label><input type="checkbox" id="editarFVR" <?php echo $editarFVR; ?>  data-checkbox="icheckbox_flat-blue"> Editar Facturación</label>
                        <label><input type="checkbox" id="correoFVR" <?php echo $correoFVR; ?>  data-checkbox="icheckbox_flat-blue"> Reenviar Correo</label>
                        <label><input type="checkbox" id="ticketFVR" <?php echo $ticketFVR; ?>  data-checkbox="icheckbox_flat-blue"> Ver Ticket</label>
                        <label><input type="checkbox" id="actualizarFFVR" <?php echo $actualizarFFVR; ?>  data-checkbox="icheckbox_flat-blue"> Actualizar Factura</label>
                        <label><input type="checkbox" id="eliminarCFVR" <?php echo $eliminarCFVR; ?>  data-checkbox="icheckbox_flat-blue"> Eliminar Compra</label>
                        <label><input type="checkbox" id="devolucionFVR" <?php echo $devolucionFVR; ?>  data-checkbox="icheckbox_flat-blue"> Devolución Paymentez</label>
                        <label><input type="checkbox" id="anularCFVR" <?php echo $anularCFVR; ?>  data-checkbox="icheckbox_flat-blue"> Anular Compra</label>
                        <label><input type="checkbox" id="notaCreditoFVR" <?php echo $notaCreditoFVR; ?>  data-checkbox="icheckbox_flat-blue"> Nota Crédito</label>
                    </div>
                </div>
            </div>       
        </div>
        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
            <div class="form-group">
                <p><label><input type="checkbox" class="RVentasEliminadas" id="RVentasEliminadas" data-checkbox="icheckbox_minimal-red"><strong>REPORTE VENTAS ELIMINADAS</strong></p>
                <div class="input-group">
                    <div class="icheck-list">
                        <label><input type="checkbox" id="exportarRVE" <?php echo $exportarRVE; ?>  data-checkbox="icheckbox_flat-blue"> Exportar</label>
                    </div>
                </div>
            </div>       
        </div>
        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
            <div class="form-group">
                <p><label><input type="checkbox" class="RNotasCredito" id="RNotasCredito" data-checkbox="icheckbox_minimal-red"><strong>REPORTE NOTAS CREDITO</strong></p>
                <div class="input-group">
                    <div class="icheck-list">
                        <label><input type="checkbox" id="exportarRNC" <?php echo $exportarRNC; ?>  data-checkbox="icheckbox_flat-blue"> Exportar</label>
                        <label><input type="checkbox" id="editarRNC" <?php echo $editarRNC; ?>  data-checkbox="icheckbox_flat-blue"> Actualizar </label>
                    </div>
                </div>
            </div>       
        </div>
        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
            <div class="form-group">
                <p><label><input type="checkbox" class="ErrorFacturacion" id="ErrorFacturacion" data-checkbox="icheckbox_minimal-red"><strong>ERROR DE FACTURACIÓN</strong></p>
                <div class="input-group">
                    <div class="icheck-list">
                        <label><input type="checkbox" id="exportarEFT" <?php echo $exportarEFT; ?>  data-checkbox="icheckbox_flat-blue"> Exportar</label>
                        <label><input type="checkbox" id="editarEFT" <?php echo $editarEFT; ?>  data-checkbox="icheckbox_flat-blue"> Editar Facturación</label>
                    </div>
                </div>
            </div>       
        </div>
        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
            <div class="form-group">
                <p><label><input type="checkbox" class="ErrorPagos" id="ErrorPagos" data-checkbox="icheckbox_minimal-red"><strong>ERROR DE PAGOS</strong></p>
                <div class="input-group">
                    <div class="icheck-list">
                        <label><input type="checkbox" id="exportarEPG" <?php echo $exportarEPG; ?>  data-checkbox="icheckbox_flat-blue"> Exportar</label>
                    </div>
                </div>
            </div>       
        </div>
        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
            <div class="form-group">
                <p><label><input type="checkbox" class="ErrorCompras" id="ErrorCompras" data-checkbox="icheckbox_minimal-red"><strong>ERROR COMPRAS</strong></p>
                <div class="input-group">
                    <div class="icheck-list">
                        <label><input type="checkbox" id="exportarECP" <?php echo $exportarECP; ?>  data-checkbox="icheckbox_flat-blue"> Exportar</label>
                    </div>
                </div>
            </div>       
        </div>
    </div>      
</div>
<?php
$transport->close();
?>