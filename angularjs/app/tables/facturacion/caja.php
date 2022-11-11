<?php
include ("../../conect.php");
include ("../../autenticacion.php");
$re = $client->getPerfilRol($_SESSION["id"],"40");
$resultado = "".$re;
$usuarios= explode(',',$resultado);
$exportar="no-descargar";

foreach($usuarios as $llave => $valores1) {
    if($valores1==="6"){
        $exportar="";
    }
}
$re = $client->getPerfilRol($_SESSION["id"],"2");
$resultado = "".$re;
$usuarios1= explode(',',$resultado);
$crear1="hide";
$exportar1="no-descargar";
foreach($usuarios1 as $llave => $valores1) {
    if($valores1==="1"){
        $crear1="";
    }
    if($valores1==="6"){
        $exportar1="";
    }
}
?>

<div>
    <div class="row tablaCajas">
        <div class="col-lg-12 portlets">
            <div class="panel">
                <div class="panel-header panel-controls">
                    <h3><i class="fa fa-table"></i> Tabla de <strong>Cajas</strong> </h3>
                </div>
                <div class="panel-content pagination2 table-responsive">
                    <div class="m-b-20 <?php echo $crear; ?>">
                        <div class="btn-group">
                            <button class="abrirCaja btn btn-sm btn-dark"  href="javascript:;"><i class="fa fa-plus"></i> Abrir Cajas</button>
                        </div>
                    </div>
                    <table class="table caja_data <?php echo $exportar; ?> table-dynamic1 table-caja " data-table-name="Cajas" id="table-cajas" style="table-layout: fixed;">
                        <thead>
                        <tr>
                                <th>Id</th>
                                <th>Id_caja</th>
                                <th>Nombres</th>
                                <th>Fecha Apertura</th>
                                <th>Efectivo</th>
                                <th>Serie Sucursal</th>
                                <th>Serie Caja</th>
                                <th>Secuencia</th>
                                <th>Estado</th>    
                                <th class="text-right">Editar</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade Cusuarios"  data-keyboard="false" data-backdrop="static" id="Cusuarios" aria-hidden="true">
    </div>
     <div class="CompraT hide " id="CompraT" >
        <div class="col-lg-12 portlets">
            <div class="panel">
                <div class="panel-header panel-controls">
                    <h3><i class="fa fa-table"></i> Compra <strong>Taquilla</strong> </h3>
                </div>
                <div class="panel-content pagination2 ">
                    <div class="col-md-10">
                        <div class="btn-group">
                            <button class="seleccionarG btn btn-sm btn-dark"  href="javascript:;"><i class="fa fa-plus"></i> Seleccionar Cliente</button>
                        </div>
                        <div class="btn-group">
                            <button class="donacion btn btn-sm btn-blue"  href="javascript:;"><i class="fa fa-plus"></i> Donación/Amigos Teatro</button>
                        </div>
                        <div class="btn-group">
                            <button class="aumentarT btn btn-sm btn-danger"  href="javascript:;" onclick="CounterInit(600); return false;"><i class="fa fa-plus"></i> Aumentar Tiempo</button>
                        </div>
                        <div class="btn-group">
                            <button class="promociones btn btn-sm btn-primary"  href="javascript:;"><i class="fa fa-plus"></i> Promociones</button>
                        </div>
                        <div class="btn-group">
                            <button class="seleccionarCF btn btn-sm btn-dark"  href="javascript:;"><i class="fa fa-plus"></i> Consumidor Final</button>
                        </div>
                    </div>
                    <div class="col-md-2">
                            <div id="counter">
                                <div id="counter_item1" class="counter_item">
                                <div class="front"></div>
                                <div class="digit digit0"></div>
                                </div>
                                <div id="counter_item2" class="counter_item">
                                <div class="front"></div>
                                <div class="digit digit0"></div>
                                </div>
                                <div id="counter_item3" class="counter_item">
                                <div class="front"></div>
                                <div class="digit digit_colon"></div>
                                </div>
                                <div id="counter_item4" class="counter_item">
                                <div class="front"></div>
                                <div class="digit digit0"></div>
                                </div>
                                <div id="counter_item5" class="counter_item">
                                <div class="front"></div>
                                <div class="digit digit0"></div>
                                </div>
                            </div>
                           
                            <div id="log"> </div>
                            <div id="log2"> </div>
                            <script type="text/javascript">
                            CounterInit();
                            </script>
                        </div>
                    <div class="UsuarioCaja hide" id="UsuarioCaja" >
                        <div class="row">
                            <input type="text" id="idFacturacionG" class="esconder"  disabled>   
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Tipo</label>
                                    <select name ="tipoG" class="form-control" style="width:100%;" id="tipo">
                                    
                                    </select>
                                </div>
                            </div>  
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Nombres</label>
                                    <div class="form-group prepend-icon">
                                        <input type="text" name="nombres" id="nombresG" class="form-control"  placeholder="Teatro Sanchez Aguilar"  disabled>
                                        <i class="icon-user"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 ">
                                <div class="form-group">
                                    <label for="field-3" class="control-label">Identificación</label>
                                    <input type="text" name="cedula" class="form-control" id="cedulaG"placeholder="0911111111" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">               
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Correo Fáctura</label>
                                    <div class="form-group prepend-icon">
                                        <input type="email" name="correo"  id="correoG"  class="form-control" placeholder="tsa@hotmail.com" minlength="5"  disabled>
                                        <i class="icon-map"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Dirección</label>
                                    <div class="form-group prepend-icon">
                                        <input type="text" name="direccion"  id="direccionG"  class="form-control"   placeholder="Samborondom" minlength="5"  disabled>
                                        <i class="icon-map"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
        <div class="col-lg-12 portlets">
            <div class="panel">
                <div class="panel-content pagination2 table-responsive">
                    <div class="tablaTaquilla hide" id="tablaTaquilla" >
                    </div>
                </div>
                <div class="panel-content pagination2 table-responsive tablaReserva hide" id="tablaReserva" >
                    <table class="table reserva_data" style="width: 100%;" data-table-name="Tabla de Reservas" id="table-reservas" >
                        <thead>
                        <tr>
                                <th>Id_reserva</th>
                                <th>Id_reserva_asientos</th>
                                <th>Evento</th>
                                <th>Fecha Función</th>
                                <th>Platea</th>
                                <th>Asientos</th>
                                <th>Precio Unitario</th>
                                <th>Descuento</th>
                                <th>Total</th>
                                <th class="text-right">Editar</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-12 portlets">
            <div class="panel">
                <div class="panel-content pagination2 table-responsive tablaReservaP hide" id="tablaReservaP" >
                    <table class="table reserva_dataP" style="width: 100%;" data-table-name="Tabla de Promoción Reservas" id="table-reservasP" >
                        <thead>
                        <tr>
                                <th>Id_reserva_promo</th>
                                <th>Id_reserva</th>
                                <th>Evento</th>
                                <th>Promoción</th>
                                <th>Tipo</th>
                                <th>SubTotal($)</th>
                                <th>Descuento (%)</th>
                                <th>Descuento total($)</th>
                                <th>Total($)</th>
                                <th class="text-right">Editar</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>  
        <div class="col-lg-12  portlets hide tabEventos" id="tabEventos">
            <div class="panel">
                <div class="panel-content pagination2 ">
                    <tabset class="tab-fade-in" >
                        <tab>
                            <tab-heading>
                                Descuento promocional
                            </tab-heading>
                            <div class="codigo" id="codigo">
                            </div>
                        </tab>
                        <tab>
                            <tab-heading>
                                Factor de Compra/Pago
                            </tab-heading>
                            <div class="compra" id="compra">
                            </div>
                        </tab>
                        <tab>
                            <tab-heading>
                                Boletos
                            </tab-heading>
                            <div class="pago" id="pago">
                               
                            </div>
                        </tab>
                        <tab>
                            <tab-heading>
                                Forma de Pago
                            </tab-heading>
                            <div class="tarjeta" id="tarjeta">
                            </div>
                        </tab>
                        <tab>
                            <tab-heading>
                                Eventos Cruzados
                            </tab-heading>
                            <div class="cruzados" id="cruzados">
                            </div>
                        </tab>
                    </tabset>
                    <div class="modal-footer text-center">
                        <button type="button"  class="btn btn-embossed btn-default cancelarP " data-dismiss="modal" aria-hidden="true">Cancelar Promoción</button>
                    </div> 
                </div> 
            </div>
        </div>
        <div class="col-lg-12 portlets">
            <div class="panel">
                <div class="panel-content pagination2 totalCaja " id="totalCaja">

                </div> 
                <div class="panel-content pagination2 table-responsive tablePagos hide" id="tablePagos" >
                    <table class="table pago_data" style="width: 100%;" data-table-name="Tabla de PAgos" id="table-pagos" >
                        <thead>
                        <tr>
                                <th>id_espera_pago</th>
                                <th>Forma de Pago</th>
                                <th>Banco</th>
                                <th>Tarjeta</th>
                                <th>Lote</th>
                                <th>Monto</th>
                                <th class="text-right">Editar</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <div class="modal-footer text-center">
                <button type="submit" class="insertCompra btn btn-embossed btn-danger" ><i class="fa fa-save"></i> Guardar</button>
                <button type="reset" class="cancelarC btn btn-embossed btn-default">Cancelar Compra</button>
            </div>
        </div>            
                        
    </div>
    <div class="CajaId hide " id="CajaId" >
        <input type="text" id="CajaN" class="esconder"  value="" disabled>
    </div>
    <div class="row clientes hide">
        <div class="col-lg-12 portlets">
            <div class="panel">
                <div class="panel-header panel-controls">
                    <h3><i class="fa fa-table"></i> Tabla de <strong>Usuarios Clientes</strong> </h3>
                </div>
                <div class="panel-content pagination2 table-responsive">
                    <div class="m-b-20 ">
                        <div class="btn-group">
                            <button class="crearC btn btn-sm btn-dark <?php echo $crear1; ?>"  href="javascript:;"><i class="fa fa-plus"></i> Agregar Usuario</button>
                        </div>
                        <div class="btn-group">
                            <button class="salir btn btn-sm btn-danger"  href="javascript:;"><i class="fa fa-remove"></i> Cancelar</button>
                        </div>
                    </div>
                    <table class="table filter-footer clientes_data  <?php echo $exportar1; ?> table-dynamic table-tools1 " data-table-name="Usuarios" id="table-editable" style="table-layout: fixed;">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Usuario</th>
                                <th>Cedula</th>
                                <th>Correo</th>
                                <th>Celular</th>
                                <th>Estado</th>    
                                <th class="text-right">Editar</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th >Id</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Usuario</th>
                                <th>Cedula</th>
                                <th>Correo</th>
                                <th>Celular</th>
                                <th>Estado</th>   
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="factura hide" id="factura">
    </div>
    <div class="modal fade verSala" id="verSala" aria-hidden="true">    
    </div>
    <div class="alerta" id="alerta" >
    </div>
    <div class="footer">
        <p class="copyright">
                <span>Copyright © 2022 </span><span> Teatro Sanchez Aguilar </span><span>- Powered by Vion IoT Solutions. All rights reserved.</span>
            </p>
    </div>
</div>
