<?php
include ("../../conect.php");
include ("../../autenticacion.php");
$re = $client->getPerfilRol($_SESSION["id"],"81");
$resultado = "".$re;
$usuarios= explode(',',$resultado);

$exportar="no-descargar";
if($resultado==""){
    ?>
    <a ng-click="reload()">
    <?php
}
foreach($usuarios as $llave => $valores1) {

    if($valores1==="6"){
        $exportar="";
    }
}
?>
<div>
    <div class="row editarEvento">
        <div class="col-lg-12 portlets">
            <div class="panel">
                <div class="panel-header panel-controls">
                    <h3><i class="fa fa-table"></i> Reporte <strong>General</strong> </h3>
                </div>
                <div class="panel-content pagination2 table-responsive">
                    <div class="row text-center" style="padding-bottom: 40px;">
                        <div class="col-lg-3 col-md-4 col-xs-6 text-center">
                            <label for="field-1" class="control-label">Fecha Inicial</label>
                            <input type="date" name="fechaI" class="form-control " id="fechaI" style="padding: 0px 10px; width:150px;" value ="<?php echo date("Y-m-d", strtotime(date('Y-m-d')."- 1 month")); ?>" placeholder="07/08/1995"  required>
                        </div>
                        <div class="col-lg-3 col-md-4  col-xs-6 text-center">
                            <label for="field-1" class="control-label">Fecha Final</label>
                            <input type="date" name="fechaF" class="form-control" id="fechaF" style="padding: 0px 10px; width:150px;" value ="<?php echo date("Y-m-d", strtotime("+1 day")); ?>" placeholder="07/08/1995"  required>
                        </div>
                        <div class="col-md-2  col-xs-12 ">
                            <button type="button" class="btn btn-primary btn-embossed bnt-square buscarCP" style="padding: 0px 10px;" > Buscar</button>
                        </div> 
                    </div>
                    <table class="table filter-footer  completo_data <?php echo $exportar; ?> table-dynamic table-completo" 
                    data-table-fechaf="<?php echo date("Y-m-d", strtotime("+1 day")); ?>"  data-table-fechai="<?php echo date("Y-m-d", strtotime(date('Y-m-d')."- 1 month")); ?>" data-table-name="Reporte Completo" id="table-editable">
                        <thead>
                            <tr>
                                <th>Id_usuario_cliente</th>
                                <th>Nombres_cliente</th>
                                <th>Apellidos_cliente</th>
                                <th>Cedula_cliente</th>
                                <th>Correo_cliente</th>
                                <th>Celular_cliente</th>
                                <th>Sexo_cliente</th>
                                <th>Fecha_nacimiento_cliente</th>
                                <th>Dirección_cliente</th>
                                <th>Amigo_teatro</th>
                                <th>Puntos_acumulados</th>
                                <th>Fecha_caducidad</th>

                                <th>Id_evento</th>
                                <th>Nombre_evento</th>
                                <th>Tipo_evento</th>
                                <th>Aforo_Evento</th>
                                <th>Total_TicketVendido_evento</th>
                                <th>Total_vendido_evento($)</th>
                                <th>Descuento_vendido_evento</th>
                                <th>PuntosCanjeados_vendido_evento</th>
                                <th>Estado_evento</th>

                                <th>Id_ticket</th>
                                <th>Sala</th>
                                <th>Precio_ticket</th>
                                <th>Descuento_ticket</th>   
                                <th>PuntosCanjeados_ticket</th>
                                <th>Tipo_ticket</th>
                                <th>TipoPromo_ticket</th>
                                <th>NombrePromo</th>
                                <th>DesuentoPromo</th>
                                <th>Estado_ticket</th>

                                <th>Id_platea</th>
                                <th>Platea</th>
                                <th>Precio_platea</th>
                                <th>Aforo_platea</th>

                                <th>Id_función</th>
                                <th>Fecha_funcion</th>
                                <th>Id_ticket_asiento</th>
                                <th>Asiento</th>
                                <th>Precio</th>
                                <th>Cantidad_ingreso</th>
                                <th>Fecha_ingreso</th>
                                <th>Estado_Asiento</th>

                                <th>Id_compra</th>
                                <th>Sub_total_factura</th>
                                <th>Donación_factura</th>
                                <th>DolaresCanjeados_factura</th>
                                <th>Descuento_factura</th>
                                <th>Total_factura</th>
                                <th>Factura</th>
                                <th>Id_transacción</th>
                                <th>Localidad_compra</th>
                                <th>Fecha_compra</th>


                                <th>Id_facturación</th>
                                <th>Nombre_Facturación</th>
                                <th>Apellido_Facturación</th>
                                <th>Cedula_Facturación</th>
                                <th>Tipo_facturación</th>
                                <th>Dirección_facturación</th>
                                <th>Correo_facturación</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                            <th>Id_usuario_cliente</th>
                                <th>Nombres_cliente</th>
                                <th>Apellidos_cliente</th>
                                <th>Cedula_cliente</th>
                                <th>Correo_cliente</th>
                                <th>Celular_cliente</th>
                                <th>Sexo_cliente</th>
                                <th>Fecha_nacimiento_cliente</th>
                                <th>Dirección_cliente</th>
                                <th>Amigo_teatro</th>
                                <th>Puntos_acumulados</th>
                                <th>Fecha_caducidad</th>

                                <th>Id_evento</th>
                                <th>Nombre_evento</th>
                                <th>Tipo_evento</th>
                                <th>Aforo_Evento</th>
                                <th>Total_TicketVendido_evento</th>
                                <th>Total_vendido_evento($)</th>
                                <th>Descuento_vendido_evento</th>
                                <th>PuntosCanjeados_vendido_evento</th>
                                <th>Estado_evento</th>

                                <th>Id_ticket</th>
                                <th>Sala</th>
                                <th>Precio_ticket</th>
                                <th>Descuento_ticket</th>   
                                <th>PuntosCanjeados_ticket</th>
                                <th>Tipo_ticket</th>
                                <th>TipoPromo_ticket</th>
                                <th>NombrePromo</th>
                                <th>DesuentoPromo</th>
                                <th>Estado_ticket</th>

                                <th>Id_platea</th>
                                <th>Platea</th>
                                <th>Precio_platea</th>
                                <th>Aforo_platea</th>

                                <th>Id_función</th>
                                <th>Fecha_funcion</th>
                                <th>Id_ticket_asiento</th>
                                <th>Asiento</th>
                                <th>Precio</th>
                                <th>Cantidad_ingreso</th>
                                <th>Fecha_ingreso</th>
                                <th>Estado_Asiento</th>

                                <th>Id_compra</th>
                                <th>Sub_total_factura</th>
                                <th>Donación_factura</th>
                                <th>DolaresCanjeados_factura</th>
                                <th>Descuento_factura</th>
                                <th>Total_factura</th>
                                <th>Factura</th>
                                <th>Id_transacción</th>
                                <th>Localidad_compra</th>
                                <th>Fecha_compra</th>


                                <th>Id_facturación</th>
                                <th>Nombre_Facturación</th>
                                <th>Apellido_Facturación</th>
                                <th>Cedula_Facturación</th>
                                <th>Tipo_facturación</th>
                                <th>Dirección_facturación</th>
                                <th>Correo_facturación</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="funcionesR" id="funcionesR" >
    </div>
    <div class="ticketsR" id="ticketsR" >
    </div>
    <div class="row taquillaMV hide">
        
    </div>
    <div class="row infoCompraMV hide">
        
    </div>
    <div class="modal fade  Cevento" id="Cevento"  data-keyboard="false" data-backdrop="static" aria-hidden="true">
    </div>
    <div class="alerta" id="alerta" >
    </div>
    <div class="footer">
        <p class="copyright">
                <span>Copyright © 2022 </span><span> Teatro Sanchez Aguilar </span><span>- Powered by Vion IoT Solutions. All rights reserved.</span>
            </p>
    </div>
</div>
<?php
$transport->close();
?>