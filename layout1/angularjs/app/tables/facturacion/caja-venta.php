<div>
    <div class="row">
        <div class="col-lg-12 portlets">
            <div class="panel">
                <div class="panel-header panel-controls">
                    <h3><i class="fa fa-table"></i> Registro de <strong>Factura</strong> </h3>
                </div>
                <div class="panel-content pagination2 ">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-3" class="control-label">Caja Actual</label>
                                <input type="text" name="nombreE" class="form-control" placeholder="Teatro Sanchez Aguilar" minlength="5" disabled>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Factura</label>
                                <input type="text" name="nombreE" class="form-control" placeholder="Teatro Sanchez Aguilar" minlength="5" disabled>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Fecha Emisión</label>
                                <div class="form-group prepend-icon">
                                    <input type="date" name="fechaF" class="form-control" style="padding: 0px 30px;" placeholder="07/08/1995"  disabled>
                                    <i class="icon-calendar"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="field-3" class="control-label" style="width:100%;">Cliente</label>
                                <input type="text" name="nombreE" class="form-control" placeholder="Teatro Sanchez Aguilar" minlength="5" style="width:78%;" disabled>
                                <a class="guardar1 btn btn-sm btn-blue" style="margin:4px;" href="javascript:;" ><i class="fa fa-edit"></i></a> 
                                <a class="delete1 btn btn-sm btn-danger"style="margin:4px;" href="javascript:;"><i class="fa fa-plus"></i></a>
                            </div>
                            
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Telefono</label>
                                <div class="form-group prepend-icon">
                                    <input type="text" name="nombreE" class="form-control" placeholder="Teatro Sanchez Aguilar" minlength="5" disabled>
                                    <i class="fa fa-phone"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Dirección</label>
                                <div class="form-group prepend-icon">
                                    <input type="text" name="nombreE" class="form-control" placeholder="Teatro Sanchez Aguilar" minlength="5" disabled>
                                    <i class="fa fa-street-view"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Evento</label>
                                <select class="form-control" style="width:100%;">
                                    <option value="United States">Masculino</option>
                                    <option value="United Kingdom">Femenino</option>
                                
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Funciones</label>
                                <select class="form-control" style="width:100%;">
                                    <option value="United States">Masculino</option>
                                    <option value="United Kingdom">Femenino</option>
                                
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Localidad</label>
                                <select class="form-control" style="width:100%;">
                                    <option value="United States">Masculino</option>
                                    <option value="United Kingdom">Femenino</option>
                                
                                </select>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Disponible</label>
                                <input class="form-control input-sm" type="number" name="duracionE" placeholder="" disabled>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Cantidad</label>
                                <input class="form-control input-sm" type="number" name="duracionE" placeholder="" required>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <label for="field-1" class="control-label"></label>
                                <a type="submit" class="abrir btn btn-primary btn-embossed bnt-square" href="#caja-venta" ><i class="fa fa-check"></i> Agregar</a>
                            </div>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Promoción</label>
                                <select class="form-control" style="width:100%;">
                                    <option value="United States">Masculino</option>
                                    <option value="United Kingdom">Femenino</option>
                                
                                </select>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <label for="field-1" class="control-label"></label>
                                <a type="submit" class="abrir btn btn-primary btn-embossed bnt-square" href="#caja-venta" ><i class="fa fa-check"></i> Agregar</a>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
        <div class="col-lg-12 portlets">
            <div class="panel">
                <div class="panel-content pagination2 ">
                    <table class="table"  data-turbolinks = "false"  data-table-name="Usuarios" id="table-editable" >
                        <thead>
                            <tr>
                                <th>SKU</th>
                                <th>Descripción</th>
                                <th>Cantidad</th>
                                <th>Asientos</th>
                                <th>Precio c/u</th>
                                <th>Descuento (%)</th>
                                <th>Descuento ($)</th>
                                <th>Precio Final</th>
                                <th>Subtotal</th>
                                <th>Iva</th>
                                <th>Total</th>
                                <th class="text-right">Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>SKUd</th>
                                <th>TERCERA SALA: LA ABUELA DE LA SOMBRILLA 2021-10-24 15:00 - Adultosasdsadsadsadsadasdsadasdas	</th>
                                <th>Cantidad</th>
                                <th>Asientos</th>
                                <th>Precio c/u</th>
                                <th>Descuento(%)</th>
                                <th>Descuento($)</th>
                                <th>Precio Final</th>
                                <th>Subtotal</th>
                                <th>Iva</th>
                                <th>Total</th>
                                <td class="text-right">
                                    <a class="delete btn btn-sm btn-danger" href="javascript:;"><i class="icon-trash"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <th>SKU</th>
                                <th>Descripción</th>
                                <th>Cantidad</th>
                                <th>Asientos</th>
                                <th>Precio c/u</th>
                                <th>Descuento(%)</th>
                                <th>Descuento($)</th>
                                <th>Precio Final</th>
                                <th>Subtotal</th>
                                <th>Iva</th>
                                <th>Total</th>
                                <td class="text-right">
                                    <a class="delete btn btn-sm btn-danger" href="javascript:;"><i class="icon-trash"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div> 
            </div>
        </div>
        <div class="col-lg-12 portlets">
            <div class="panel">
                <div class="panel-content pagination2 ">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="field-3" class="control-label">Total a Pagar</label>
                                <input type="text" name="nombreE" class="form-control" placeholder="Teatro Sanchez Aguilar" minlength="5" disabled>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Total Pagado</label>
                                <input type="text" name="nombreE" class="form-control" placeholder="Teatro Sanchez Aguilar" minlength="5" disabled>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Saldo</label>
                                <input type="text" name="nombreE" class="form-control" placeholder="Teatro Sanchez Aguilar" minlength="5" disabled>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Cambio</label>
                                <input type="text" name="nombreE" class="form-control" placeholder="Teatro Sanchez Aguilar" minlength="5" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Forma de Pago</label>
                                <select class="form-control" style="width:100%;">
                                    <option value="United States">Efectivo</option>
                                    <option value="United Kingdom">Tarjeta Credito/Debito</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Tipo de Tarjeta</label>
                                <select class="form-control" style="width:100%;">
                                    <option value="United States">Efectivo</option>
                                    <option value="United Kingdom">Tarjeta Credito/Debito</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Banco</label>
                                <select class="form-control" style="width:100%;">
                                    <option value="United States">Efectivo</option>
                                    <option value="United Kingdom">Tarjeta Credito/Debito</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Lote</label>
                                <input type="text" name="nombreE" class="form-control" placeholder="Teatro Sanchez Aguilar" minlength="5" >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Monto</label>
                                <input class="form-control input-sm" type="number" name="duracionE" placeholder="" >
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <label for="field-1" class="control-label"></label>
                                <a type="submit" class="abrir btn btn-primary btn-embossed bnt-square" href="#caja-venta" ><i class="fa fa-check"></i> Agregar</a>
                            </div>
                        </div>
                    </div>
                    <table class="table"  data-turbolinks = "false"  data-table-name="Usuarios" id="table-editable" >
                        <thead>
                            <tr>
                                <th>Forma de Pago</th>
                                <th>Banco</th>
                                <th>Tarjeta</th>
                                <th>Lote</th>
                                <th>Monto</th>
                                <th class="text-right">Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>Forma de Pago</th>
                                <th>Banco</th>
                                <th>Tarjeta</th>
                                <th>Lote</th>
                                <th>Monto</th>
                                <td class="text-right">
                                    <a class="delete btn btn-sm btn-danger" href="javascript:;"><i class="icon-trash"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <th>Forma de Pago</th>
                                <th>Banco</th>
                                <th>Tarjeta</th>
                                <th>Lote</th>
                                <th>Monto</th>
                                <td class="text-right">
                                    <a class="delete btn btn-sm btn-danger" href="javascript:;"><i class="icon-trash"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div> 
            </div>
            <div class="modal-footer text-center">
                <button type="submit" class="btn btn-red btn-embossed" ><i class="fa fa-check"></i> Grabar</button>
                <button type="reset" class="btn btn-embossed btn-default">Cancelar</button>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-responsive3" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="panel panel-transparent">
                <figure class="effect-honey sala">
                    <button data-dismiss="modal" aria-hidden="true">
                        <img src="../../../assets/global/images/principal/2.jpg" alt="img01" />
                    </button>
                </figure>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="copyright">
            <p class="pull-left sm-pull-reset">
                <span>Copyright <span class="copyright">&copy;</span> 2016 </span>
                <span>THEMES LAB</span>.
                <span>All rights reserved. </span>
            </p>
            <p class="pull-right sm-pull-reset">
                <span><a href="#" class="m-r-10">Support</a> | <a href="#" class="m-l-10 m-r-10">Terms of use</a> | <a href="#" class="m-l-10">Privacy Policy</a></span>
            </p>
        </div>
    </div>
</div>