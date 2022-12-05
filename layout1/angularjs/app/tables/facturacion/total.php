<?php
include ("../../conect.php");
include ("../../autenticacion.php");
$var1="";
$subtotal="0";
$donacionG="0";
$dolaresG="0";
$descuentoT="0";
$totalG="0";
$totalPG="0";
$saldo="0";
$cambio="0";
$re1 = $client->getAllBanco("taquilla");
$resultado1= "".$re1;
$banco =explode(';;',$resultado1);
$re2 = $client->getAllTarjeta("taquilla");
$resultado= "".$re2;
$tarjeta= explode(';;',$resultado);
$re = $client->getCompraReserva($_SESSION["id"]);
$resultado= "".$re;
$compras= explode(',',$resultado);
if (isset($compras[5])) {
    $subtotal=$compras[0];
    $donacionG=$compras[1];
    $dolaresG=$compras[2];
    $descuentoT=$compras[3];
    $totalG=$compras[4];
    $totalPG=$compras[5];
    if($totalG>$totalPG){
        $saldo=$totalG-$totalPG;
        $cambio="0";
    }else if($totalG==$totalPG){
        $saldo="0";
        $cambio="0";
    }else{
        $saldo="0";
        $cambio=$totalPG-$totalG;;
    }
}
?>
<div class="row">
    
    <div class="col-md-3">
        <div class="form-group">
            <label for="field-3" class="control-label">SubTotal</label>
            <input type="text" id="subtotal" value="<?php echo  $subtotal; ?>" class="form-control" placeholder="0.0" minlength="5" disabled>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="field-3" class="control-label">Donación</label>
            <input type="text" id="donacionG" value="<?php echo  $donacionG; ?>"  class="form-control" placeholder="0.0" minlength="5" disabled>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="field-3" class="control-label">Dolares Canjeados</label>
            <input type="text" id="dolaresG" value="<?php echo  $dolaresG; ?>"  class="form-control" placeholder="0.0" minlength="5" disabled>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="field-3" class="control-label">Descuento Total</label>
            <input type="text"  id="descuentoT" value="<?php echo  $descuentoT; ?>"  class="form-control" placeholder="0.0" minlength="5" disabled>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="field-3" class="control-label">Total a Pagar</label>
            <input type="text"  id="totalG"  value="<?php echo  $totalG; ?>" class="form-control" placeholder="0.0" minlength="5" disabled>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="field-1" class="control-label">Total Pagado</label>
            <input type="text"  id="totalPG" value="<?php echo  $totalPG; ?>" class="form-control" placeholder="0.0" minlength="5" disabled>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="field-1" class="control-label">Saldo</label>
            <input type="text" id="saldo" value="<?php echo  $saldo; ?>"  class="form-control" placeholder="0.0" minlength="5" disabled>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="field-1" class="control-label">Cambio</label>
            <input type="text" id="cambio" value="<?php echo  $cambio; ?>"  class="form-control" placeholder="0.0" minlength="5" disabled>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label for="field-1" class="control-label">Forma de Pago</label>
            <select class="form-control"  id="FpagoG" style="width:100%;">
                <option value="efectivo" selectec>Efectivo</option>
                <option value="tarjetaD">Tarjeta Débito</option>
                <option value="tarjetaC">Tarjeta Crédito</option>
            </select>
            
        </div>
    </div>
    <div class="col-md-3 Ttarjeta hide">
        <div class="form-group">
            <label for="field-1" class="control-label">Tipo de Tarjeta</label>
            <select class="form-control" style="width:100%;" id="Ttarjeta">
                <?php
                foreach($tarjeta as $llave => $valores1) {
                    $datos1 =explode(',,,',$valores1);
                    $valor="";
                    if (isset($datos1[1])) {
                ?>
                <option value="<?php echo $datos1[0]; ?>"><?php echo $datos1[1]; ?></option>
                <?php
                    }
                }
                ?>
            </select>
        </div>
    </div>
    <div class="col-md-3 Tbanco hide">
        <div class="form-group">
            <label for="field-1" class="control-label">Banco</label>
            <select class="form-control" style="width:100%;" id="Tbanco">
                <?php
                foreach($banco as $llave => $valores1) {
                    $datos1 =explode(',,,',$valores1);
                    $valor="";
                    if (isset($datos1[1])) {
                        if($datos1[0]!="1"){
                        ?>
                        <option value="<?php echo $datos1[0]; ?>"><?php echo $datos1[1]; ?></option>
                        <?php
                        }
                    }

                }
                ?>
            </select>
        </div>
    </div>
    <div class="col-md-3 lote hide">
        <div class="form-group">
            <label for="field-1" class="control-label">Lote</label>
            <input type="text" name="" id="lote" class="form-control" placeholder="" minlength="5" >
        </div>
    </div>
    <div class="col-md-3 ">
        <div class="form-group">
            <label for="field-1" class="control-label">Monto</label>
            <input class="form-control input-sm" id="monto" type="number" value="0" name="duracionE" placeholder="" >
        </div>
    </div>
    <div class="col-md-1">
        <div class="form-group">
            <label for="field-1" class="control-label"></label>
            <a type="submit" class="agregarPago btn btn-primary btn-embossed bnt-square" ><i class="fa fa-plus"></i> Agregar Pago</a>
        </div>
    </div>
</div>


