<div>
    <div class="row">
        <div class="col-lg-12 portlets">
            <div class="panel">
                <div class="panel-header panel-controls">
                    <h3><i class="fa fa-table"></i> Editar <strong>Promoción</strong> </h3>
                </div>
                <div class="panel-content pagination2 ">
                    <form role="form" class=" form-validation">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Nombre de Promoción</label>
                                    <select class="form-control" style="width:100%;">
                                        <option value="United States">Masculino</option>
                                        <option value="United Kingdom">Femenino</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Fecha Inicio</label>
                                    <div class="form-group prepend-icon">
                                        <input type="text" name="datetimepicker" class="form-control  datepicker1" placeholder="Escoger Fecha Inicio" id ="fechaI" required>
                                        <i class="icon-clock"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Fecha Término</label>
                                    <div class="form-group prepend-icon">
                                        <input type="text" name="datetimepicker" class="form-control  datepicker1" placeholder="Escoger Fecha Término"  id ="fechaF"  required>
                                        <i class="icon-clock"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Descripción</label>
                                    <div class="form-group prepend-icon">
                                        <input type="text" name="name" class="form-control" placeholder="Cine" minlength="2" required>
                                        <i class="icon-user"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Amigos del Teatro</label>
                                    <div class="form-group">
                                        <label class="switch switch-green">
                                            <input type="checkbox" class="switch-input"  id="box">
                                            <span class="switch-label" data-on="On" data-off="Off"></span>
                                            <span class="switch-handle"></span>
                                            <span id="estado" class="esconder">Off</span>
                                        </label>
                                    </div>
                                </div>
                            </div>     
                            
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="field-1" class="control-label"> Evento</label>
                                    <select class="form-control" style="width:100%;">
                                        <option value="United States">Masculino</option>
                                        <option value="United Kingdom">Femenino</option>
                                    
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Platea</label>
                                    <select class="form-control" style="width:100%;">
                                        <option value="United States">Masculino</option>
                                        <option value="United Kingdom">Femenino</option>
                                    
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <p>
                                        <strong>Localidad</strong>
                                    </p>
                                    <div class="input-group">
                                        <div class="icheck-inline">
                                            <label>
                                                <input class="todos localidad" id="todos" type="checkbox"> Todos
                                            </label>
                                            <label>
                                                <input class="web localidad" id="web" type="checkbox"> Web
                                            </label>
                                            <label>
                                                <input class="app1 localidad" id="app1" type="checkbox" > App
                                 
                                            <label>
                                                <input class="taquilla localidad"  id="taquilla" type="checkbox"> Taquilla
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Tipo de Promoción</label>
                                    <select class="form-control evento" style="width:100%;" >
                                        <option value="none">Seleccione Tipo</option>
                                        <option value="Fcompra">Factor de Compra</option>
                                        <option value="Fpago">Factor de Pago</option>
                                        <option value="FormaPago">Forma de Pago</option>
                                        <option value="Cpromocional">Código Promocional</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row esconder" id="fcompra">
                            <div class="col-lg-12 portlets">
                                <div class="panel">
                                    <div class="panel-header bg-aero">
                                        <h3><i class="fa fa-table"></i> Descuento <strong>por Factor de Compra</strong> </h3>
                                    </div>
                                    <div class="panel-content pagination2">
                                        <div class="m-b-20">
                                            <div class="btn-group">
                                                <button class="crear btn btn-sm btn-dark" > <i class="fa fa-plus"></i> Agregar Descuento</button>
                                            </div>
                                        </div>
                                        <table class="table" id="table-editable1">
                                            <thead>
                                                <tr>
                                                    <th>id</th>
                                                    <th>Boletos Desde</th>
                                                    <th>Boletos Hasta</th>
                                                    <th>Descuento(%)</th>
                                                    <th class="text-right">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>
                                                        <div class="form-group prepend-icon">
                                                            <input class="form-control input-sm" type="number" name="duracionE" placeholder="" min="0" required>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group prepend-icon">
                                                            <input class="form-control input-sm" type="number" name="duracionE" placeholder="" min="0" required>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group prepend-icon">
                                                            <input class="form-control input-sm" type="number" name="duracionE" placeholder=""  min="0" required>
                                                        </div>
                                                    </td>
                                                    <td class="text-right">
                                                        <a class="delete btn btn-sm btn-danger" href="javascript:;"><i class="icons-office-52"></i></a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>  
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row esconder" id="fpago">
                            <div class="col-lg-12 portlets">
                                <div class="panel">
                                    <div class="panel-header bg-aero">
                                        <h3><i class="fa fa-table"></i> Descuento <strong>por Factor de Pago</strong> </h3>
                                    </div>
                                    <div class="panel-content pagination2">
                                        <div class="m-b-20">
                                            <div class="btn-group">
                                                <button class="crear1 btn btn-sm btn-dark" > <i class="fa fa-plus"></i> Agregar Descuento</button>
                                            </div>
                                        </div>
                                        <table class="table" id="table-editable2">
                                            <thead>
                                                <tr>
                                                    <th>id</th>
                                                    <th>Factor de Compra</th>
                                                    <th>Factor de Pago</th>
                                                    <th class="text-right">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>
                                                        <div class="form-group prepend-icon">
                                                            <input class="form-control input-sm" type="number" name="duracionE" placeholder="" min="0" required>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group prepend-icon">
                                                            <input class="form-control input-sm" type="number" name="duracionE" placeholder="" min="0" required>
                                                        </div>
                                                    </td>
                                                    <td class="text-right">
                                                        <a class="delete1 btn btn-sm btn-danger" href="javascript:;"><i class="icons-office-52"></i></a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>  
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row esconder" id="formaPago">
                            <div class="col-lg-12 portlets">
                                <div class="panel">
                                    <div class="panel-header bg-aero">
                                        <h3><i class="fa fa-table"></i> Descuento <strong>por Forma de Pago</strong> </h3>
                                    </div>
                                    <div class="panel-content pagination2">
                                        <div class="m-b-20">
                                            <div class="btn-group">
                                                <button class="crear2 btn btn-sm btn-dark" > <i class="fa fa-plus"></i> Agregar Descuento</button>
                                            </div>
                                        </div>
                                        <table class="table" id="table-editable3">
                                            <thead>
                                                <tr>
                                                    <th>id</th>
                                                    <th>Tarjeta de Crédito</th>
                                                    <th>Banco</th>
                                                    <th>Descuento (%)</th>
                                                    <th class="text-right">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>
                                                        <select class="form-control" style="width:100%;">
                                                            <option value="United States">Masculino</option>
                                                            <option value="United Kingdom">Femenino</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select class="form-control" style="width:100%;">
                                                            <option value="United States">Masculino</option>
                                                            <option value="United Kingdom">Femenino</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <div class="form-group prepend-icon">
                                                            <input class="form-control input-sm" type="number" name="duracionE" placeholder="" min="0" required>
                                                        </div>
                                                    </td>
                                                    <td class="text-right">
                                                        <a class="delete2 btn btn-sm btn-danger" href="javascript:;"><i class="icons-office-52"></i></a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>  
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row esconder" id="Cpromocional">
                            <div class="col-lg-12 portlets">
                                <div class="panel">
                                    <div class="panel-header bg-aero">
                                        <h3><i class="fa fa-table"></i> Descuento <strong>por Código Promocional</strong> </h3>
                                    </div>
                                    <div class="panel-content pagination2">
                                        <div class="m-b-20">
                                            <div class="btn-group">
                                                <button class="crear3 btn btn-sm btn-dark" > <i class="fa fa-plus"></i> Agregar Descuento</button>
                                            </div>
                                        </div>
                                        <table class="table" id="table-editable4">
                                            <thead>
                                                <tr>
                                                    <th>id</th>
                                                    <th>Código Promocional</th>
                                                    <th>Descuento (%)</th>
                                                    <th class="text-right">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>
                                                        <input type="text" name="lastname" class="form-control" placeholder="TSA" minlength="3" required>
                                                    </td>
                                                    <td>
                                                        <div class="form-group prepend-icon">
                                                            <input class="form-control input-sm" type="number" name="duracionE" placeholder="" min="0" required>
                                                        </div>
                                                    </td>
                                                    <td class="text-right">
                                                        <a class="delete3 btn btn-sm btn-danger" href="javascript:;"><i class="icons-office-52"></i></a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>  
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer text-center">
                            <button type="submit" class="btn btn-primary btn-embossed bnt-square" ><i class="fa fa-check"></i> Crear</button>
                            <button type="reset" class="btn btn-embossed btn-default">Limpiar</button>
                        </div>
                </div> 
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