<?php
include ("../../conect.php");
include ("../../autenticacion.php");
header("Content-type: application/json");

$re = $client->getAllGeneral("paymentez","","");
$resultado= "".$re;
$usuarios =explode(';;',$resultado);
$datat=NULL;
$mensaje="";
$tarjeta="";
$data=[];     
foreach($usuarios as $llave => $valores) {
    $usuario =explode(',,,',$valores);
    $estado="";
    $estadoT="OFF";
    $estado2="Off";
    if (isset($usuario[2])) {
        if ($usuario[8]==="1" ) {
            $estado="checked";
            $estadoT="ON";
        } 
        if ($usuario[5]==="vi" ) {
            $tarjeta="Visa";
        }
        if ($usuario[5]==="mc" ) {
            $tarjeta="Mastercard";
        }
        if ($usuario[5]==="ax" ) {
            $tarjeta="American Express";
        }
        if ($usuario[5]==="di" ) {
            $tarjeta="Diners";
        }
        if ($usuario[5]==="dc" ) {
            $tarjeta="Discover";
        }
        if ($usuario[5]==="ms" ) {
            $tarjeta="Maestro";
        }

        if ($usuario[7]==="0" ) {
            $mensaje="A la espera del pago.";
        }
        if ($usuario[7]==="1" ) {
            $mensaje="Se requiere verificación, consulte la sección Verificación.";
        }
        if ($usuario[7]==="2" ) {
            $mensaje="Pagado parcialmente";
        }
        if ($usuario[7]==="3" ) {
            $mensaje="Pagado.";
        }
        if ($usuario[7]==="4" ) {
            $mensaje="En disputa.";
        }
        if ($usuario[7]==="5" ) {
            $mensaje="Pagado en exceso.";
        }
        if ($usuario[7]==="6" ) {
            $mensaje="Fraude.";
        }
        if ($usuario[7]==="7" ) {
            $mensaje="Reembolso.";
        }
        if ($usuario[7]==="8" ) {
            $mensaje="Contracargo";
        }
        if ($usuario[7]==="9" ) {
            $mensaje="Rechazado por el transportista.";
        }
        if ($usuario[7]==="10" ) {
            $mensaje="Error del sistema.";
        }
        if ($usuario[7]==="11" ) {
            $mensaje="Fraude de pago.";
        }
        if ($usuario[7]==="12" ) {
            $mensaje="Lista negra de Paymentez.";
        }
        if ($usuario[7]==="13" ) {
            $mensaje="Tolerancia de tiempo.";
        }
        if ($usuario[7]==="14" ) {
            $mensaje="Caducado por Paymentez";
        }
        if ($usuario[7]==="15" ) {
            $mensaje="Caducado por el transportista.";
        } 
        if ($usuario[7]==="16" ) {
            $mensaje="Rechazado por Paymentez";
        }
        if ($usuario[7]==="17" ) {
            $mensaje="Abandonado por Paymentez";
        }
        if ($usuario[7]==="18" ) {
            $mensaje="Abandonado por el cliente";
        }
        if ($usuario[7]==="19" ) {
            $mensaje="Código de autorización no válido.";
        }
        if ($usuario[7]==="20" ) {
            $mensaje="Código de autorización caducado.";
        }
        if ($usuario[7]==="21" ) {
            $mensaje="Fraude de Paymentez - Reembolso pendiente.";
        }
        if ($usuario[7]==="22" ) {
            $mensaje="AuthCode no válido - Reembolso pendiente.";
        }
        if ($usuario[7]==="23" ) {
            $mensaje="AuthCode caducó - Reembolso pendiente.";
        }
        if ($usuario[7]==="24" ) {
            $mensaje="Fraude de Paymentez - Reembolso solicitado.";
        }
        if ($usuario[7]==="25" ) {
            $mensaje="AuthCode no válido - Reembolso solicitado.";
        }
        if ($usuario[7]==="26" ) {
            $mensaje="AuthCode caducó - Reembolso solicitado.";
        }
        if ($usuario[7]==="27" ) {
            $mensaje="Comerciante - Reembolso pendiente.";
        }
        if ($usuario[7]==="28" ) {
            $mensaje="Comerciante - Reembolso solicitado.";
        }
        if ($usuario[7]==="29" ) {
            $mensaje="Anulado.";
        }
        if ($usuario[7]==="30" ) {
            $mensaje="Transacción asentada (solo Ecuador).";
        }
        if ($usuario[7]==="31" ) {
            $mensaje="Esperando OTP.";
        }
        if ($usuario[7]==="32" ) {
            $mensaje="OTP validado con éxito.";
        }
        if ($usuario[7]==="33" ) {
            $mensaje="OTP no validado.";
        }
        if ($usuario[7]==="34" ) {
            $mensaje="Reembolso parcial.";
        }
        if ($usuario[7]==="35" ) {
            $mensaje="Método 3DS solicitado, esperando para continuar.";
        }
        if ($usuario[7]==="36" ) {
            $mensaje="Desafío 3DS solicitado, esperando CRES.";
        }
        if ($usuario[7]==="37" ) {
            $mensaje="Rechazado por 3DS.";
        }
        $est1='<div class="form-group">
                <label class="switch switch-green">
                    <input type="checkbox" class="switch-input" id="box"  value="'.$usuario[8].'" '.$estado.' disabled>
                    <span class="switch-label" data-on="On" data-off='.$estado2.'></span>
                    <span class="switch-handle"></span>
                    <span id="estado" class="esconder"> '.$estadoT.' </span>
                </label>
            </div>';
        $data[]=array($usuario[0],$usuario[1],$usuario[2],$usuario[3],$usuario[4],$tarjeta,$usuario[6],$mensaje,$est1);
    } 
} 
$dataT['data']=$data;   
echo json_encode($dataT,JSON_PRETTY_PRINT); 
?>