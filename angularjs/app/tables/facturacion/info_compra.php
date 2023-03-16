<?php
include ("../../conect_taquilla.php");
include ("../../autenticacion.php");
$var1="";
$var2="disabled";
$var3="";
$var4="hide";
$re = $client3->getPerfilRol($_SESSION["id"],"55");
$resultado = "".$re;
$usuarios1= explode(',',$resultado);
$editar="hide";
$actualizarF="hide";
$eliminarF="hide";
$devolucion="hide";
$anularC="hide";
$notaC="hide";
$ticket="hide";
foreach($usuarios1 as $llave => $valores1) {
    if($valores1==="2"){
        $editar="";
    }
    if($valores1==="22"){
        $actualizarF="";
    }
    if($valores1==="23"){
        $eliminarF="";
    }
    if($valores1==="24"){
        $devolucion="";
    }
    if($valores1==="25"){
        $anularC="";
    }
    if($valores1==="26"){
        $notaC="";
    }
    if($valores1==="21"){
        $ticket="";
    }
}
if (isset($_POST["var2"])) {
    $var3="hide";
    $var4="";
}
if (isset($_POST["var1"])) {
    $var1 = $_POST['var1'];
    if($var1==1){
        $var2="";
    }
    $re = $client3->getCompraT($var1);
    $resultado = "".$re;
    $historial= explode(';;;',$resultado);
    $datos =explode(',,,',$historial[0]);
    $datos1 =explode(';;',$historial[1]);
    $datos2 =explode(';;',$historial[2]);
    $idFacturacion="";
    $datos3 =explode(';;',$historial[3]);
    if (isset($datos[6])) {
        $tipo=$datos[0];
        $nombre=$datos[1];
        $identificacion=$datos[2];
        $direccion=$datos[3];
        $factura=$datos[4];
        $fecha=$datos[5];
        $correo=$datos[6];
        $subtotal=$datos[7];
        $donacion=$datos[8];
        $dolares_canjeados=$datos[9];
        $descuento=$datos[10];
        $total=$datos[11];
        $idFacturacion=$datos[12];
    }

}

?>

<div class="col-lg-12 portlets">
    <div class="panel">
        <div class="panel-header panel-controls text-center">
            <h3> Detalle de <strong>Compra</strong> </h3>
        </div>
        <input type="text" name="idCompra" id="idCompra" class="esconder"  value="<?php echo $var1; ?>" disabled>
        <input type="text" name="idFacturacion" id="idFacturacion" class="esconder"  value="<?php echo $idFacturacion; ?>" disabled>
        <div class="panel-content pagination2 table-responsive " >
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="field-1" class="control-label">Tipo</label>
                        <select name ="tipoG" class="form-control" style="width:100%;" id="tipo">
                            <?php
                            if($tipo=="C"){
                            ?>
                                <option value="cedula" selected> Cédula</option>                                     
                            <?php
                            }else if($tipo=="R"){
                                ?>
                                <option value="ruc" selected> Ruc</option>                                
                            <?php
                            }else{
                            ?>
                                <option value="pasaporte" selected> Pasaporte</option>                                
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>  
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="field-1" class="control-label">Nombres</label>
                        <div class="form-group prepend-icon">
                            <input type="text" name="nombres" id="nombresG" class="form-control"  value="<?php echo $nombre; ?>" placeholder="Teatro Sanchez Aguilar"  disabled>
                            <i class="icon-user"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 ">
                    <div class="form-group">
                        <label for="field-3" class="control-label">Identificación</label>
                        <input type="text" name="cedula" class="form-control" id="cedulaG"  value="<?php echo $identificacion; ?>" placeholder="0911111111" disabled>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="field-1" class="control-label">Dirección</label>
                        <div class="form-group prepend-icon">
                            <input type="text" name="direccion"  id="direccionG"  class="form-control"   value="<?php echo $direccion; ?>" placeholder="Samborondom" minlength="5"  disabled>
                            <i class="icon-map"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">  
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="field-1" class="control-label">Fáctura</label>
                        <div class="form-group prepend-icon">
                            <input type="email" name="correo"  id="correoG"  class="form-control"  value="<?php echo $factura; ?>"  placeholder="tsa@hotmail.com" minlength="5" <?php echo $var2; ?>>
                            <i class="icon-map"></i>
                        </div>
                    </div>
                </div>         
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="field-1" class="control-label">Fecha Fáctura</label>
                        <div class="form-group prepend-icon">
                            <input type="email" name="correo"  id="correoG"  class="form-control"  value="<?php echo $fecha; ?>"  placeholder="tsa@hotmail.com" minlength="5" <?php echo $var2; ?>>
                            <i class="icon-map"></i>
                        </div>
                    </div>
                </div>             
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="field-1" class="control-label">Correo Fáctura</label>
                        <div class="form-group prepend-icon">
                            <input type="email" name="correo"  id="correoG"  class="form-control"  value="<?php echo $correo; ?>"  placeholder="tsa@hotmail.com" minlength="5" <?php echo $var2; ?>>
                            <i class="icon-map"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="field-3" class="control-label">SubTotal</label>
                        <input type="text" id="subtotal" value="<?php echo  $subtotal; ?>" class="form-control" placeholder="0.0" minlength="5" disabled>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="field-3" class="control-label">Donación</label>
                        <input type="text" id="donacionG" value="<?php echo  $donacion; ?>"  class="form-control" placeholder="0.0" minlength="5" disabled>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="field-3" class="control-label">Dolares Canjeados</label>
                        <input type="text" id="dolaresG" value="<?php echo  $dolares_canjeados; ?>"  class="form-control" placeholder="0.0" minlength="5" disabled>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="field-3" class="control-label">Descuento Total</label>
                        <input type="text"  id="descuentoT" value="<?php echo  $descuento; ?>"  class="form-control" placeholder="0.0" minlength="5" disabled>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="field-3" class="control-label">Total</label>
                        <input type="text"  id="totalG"  value="<?php echo  $total; ?>" class="form-control" placeholder="0.0" minlength="5" disabled>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <a class="editarFCP btn btn-sm btn-dark <?php echo  $var4." ".$editar;?>" style="margin: 5px;  "  href="javascript:;"><i class="icon-note"></i></a>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
<div class="col-lg-12 portlets">
    <div class="panel">
        <div class="panel-header panel-controls text-center">
            <h3> Detalle de <strong>tickets</strong> </h3>
        </div>
        <div class="panel-content pagination2 table-responsive  " >
            <table class="table" style="width: 100%;" data-table-name="Tabla de Reservas">
                <thead>
                    <tr>
                        <th>id_ticket</th>
                        <th>Evento</th>
                        <th>Fecha Función</th>
                        <th>Sala</th>
                        <th>Platea</th>
                        <th>Asientos</th>
                        <th>Precio</th>
                        <th>Ver Ticket</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach($datos1 as $llave => $valores) {
                        $precio =explode(',,,',$valores);
                        if (isset($precio[2])) {
                    ?>
                    <tr>
                        <td> <?php if (isset($precio[0])) {echo $precio[0]; }  ?> </td>
                        <td> <?php if (isset($precio[1])) {echo $precio[1]; }  ?> </td>
                        <td> <?php if (isset($precio[2])) {echo $precio[2]; }  ?> </td>
                        <td> <?php if (isset($precio[3])) {echo $precio[3]; }  ?> </td>
                        <td> <?php if (isset($precio[4])) {echo $precio[4]; }  ?> </td>
                        <td> <?php if (isset($precio[5])) {echo $precio[5]; }  ?> </td>
                        <td> <?php if (isset($precio[6])) {echo $precio[6]; }  ?> </td>
                        <td> <a class="btn btn-sm btn-blue  <?php echo  $ticket; ?>" style="margin: 0px;" href="https://teatrosanchezaguilar.org/plantilla/pdf/ticket<?php echo $precio[0];?>.pdf" target="_blank"><i class="fa fa-check-square"></i></a> </td>
                    </tr>
                    <?php
                        }
                    }
                    ?> 
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="col-lg-12 portlets">
    <div class="panel">
        <div class="panel-header panel-controls text-center">
            <h3> Detalle de <strong>Promociones</strong> </h3>
        </div>
        <div class="panel-content pagination2 table-responsive"  >
            <table class="table" style="width: 100%;" data-table-name="Tabla de Promoción Reservas" >
                <thead>
                <tr>
                        <th>id_ticket</th>
                        <th>id_promo</th>
                        <th>id_evento</th>
                        <th>Evento</th>
                        <th>Promoción</th>
                        <th>Tipo</th>
                        <th>SubTotal($)</th>
                        <th>Descuento total($)</th>
                        <th>Total($)</th>
                        <th>Ver Promo</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach($datos2 as $llave => $valores) {
                        $precio =explode(',,,',$valores);
                        if (isset($precio[2])) {
                    ?>
                    <tr>
                        <td> <?php if (isset($precio[0])) {echo $precio[0]; }  ?> </td>
                        <td> <?php if (isset($precio[0])) {echo $precio[1]; }  ?> </td>
                        <td> <?php if (isset($precio[0])) {echo $precio[2]; }  ?> </td>
                        <td> <?php if (isset($precio[1])) {echo $precio[3]; }  ?> </td>
                        <td> <?php if (isset($precio[2])) {echo $precio[4]; }  ?> </td>
                        <td> <?php if (isset($precio[3])) {echo $precio[5]; }  ?> </td>
                        <td> <?php if (isset($precio[4])) {echo $precio[6]; }  ?> </td>
                        <td> <?php if (isset($precio[5])) {echo $precio[7]; }  ?> </td>
                        <td> <?php if (isset($precio[6])) {echo $precio[8]; }  ?> </td>
                        <td class="text-center">
                            <a class="verPromo btn btn-sm btn-blue"  href="javascript:;"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>
                    <?php
                        }
                    }
                    ?> 
                </tbody>
            </table>
        </div>
    </div>
</div> 
<div class="col-lg-12 portlets">
    <div class="panel">
        <div class="panel-header panel-controls text-center">
            <h3> Detalle de <strong>Pago</strong> </h3>
        </div>
        <div class="panel-content pagination2 table-responsive " >
            <table class="table pago_data" style="width: 100%;" data-table-name="Tabla de PAgos">
                <thead>
                <tr>
                        <th>Forma de Pago</th>
                        <th>Tipo de tarjeta</th>
                        <th>Banco</th>
                        <th>Tarjeta</th>
                        <th>Lote</th>
                        <th>Monto</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach($datos3 as $llave => $valores) {
                        $precio =explode(',,,',$valores);
                        if (isset($precio[2])) {
                    ?>
                    <tr>
                        <td> <?php if (isset($precio[0])) {echo $precio[0]; }  ?> </td>
                        <td> <?php if (isset($precio[1])) {echo $precio[1]; }  ?> </td>
                        <td> <?php if (isset($precio[2])) {echo $precio[2]; }  ?> </td>
                        <td> <?php if (isset($precio[3])) {echo $precio[3]; }  ?> </td>
                        <td> <?php if (isset($precio[4])) {echo $precio[4]; }  ?> </td>
                        <td> <?php if (isset($precio[5])) {echo $precio[5]; }  ?> </td>
                    </tr>
                    <?php
                        }
                    }
                    ?> 
                </tbody>
            </table>
        </div>
    </div>
</div>    
<div class="modal-footer text-center">
    <button type="reset" class="atrasRCompra btn btn-embossed btn-default <?php echo  $var3; ?>" >Atras</button>
    <button type="reset" title="Actualizá factura" class="facturar btn btn-embossed btn-warning <?php echo  $var4." ".$actualizarF; ?>" >Actualizar Factura</button>
    <button type="reset" title="Elimina compra pero no la factura" class="deleteCompra btn btn-embossed btn-danger <?php echo  $var4." ".$eliminarF; ?>" >Eliminar Compra</button>
    <button type="reset" title="Devolver pago Paymentez" class="devolucion btn btn-embossed btn-blue <?php echo  $var4." ".$devolucion; ?>" >Devolución Paymentez</button>
    <button type="reset" title="Anula toda la compra si la factura no se generó" class="anularFacura btn btn-embossed btn-blue <?php echo  $var4." ".$anularC; ?>" >Anular Compra</button>
    <button type="reset" title="Crear nota credito total" class="notaCreditoMotivo btn btn-embossed btn-success <?php echo  $var4." ".$notaC; ?>" >Crear Nota Crédito Total</button>
    <button type="reset" title="Crear nota credito parcial" class="notaCreditoParcialMotivo btn btn-embossed btn-success <?php echo  $var4." ".$notaC; ?>" >Crear Nota Crédito Parcial</button>
    <button type="reset" title="Salir" class="salirRCompra btn btn-embossed btn-danger">Salir</button>
</div>
<div class="modal fade  Cpromocion" data-keyboard="false" data-backdrop="static" id="Cpromocion" aria-hidden="true">
</div>
<?php
$transport3->close();
?>