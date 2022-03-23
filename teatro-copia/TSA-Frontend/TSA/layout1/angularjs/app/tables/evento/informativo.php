<div>
    <div class="row">
        <div class="col-lg-12 portlets">
            <div class="panel">
                <div class="panel-header panel-controls">
                    <h3><i class="fa fa-table"></i> Tabla de <strong>Eventos Informativos</strong> </h3>
                </div>
                <div class="panel-content pagination2 table-responsive">
                    <div class="m-b-20">
                        <div class="btn-group">
                            <div data-toggle="modal" data-target="#modal-responsive">
                                <button class="btn btn-sm btn-dark"><i class="fa fa-plus"></i> Agregar Eventos Informativos</button>
                            </div>
                            
                        </div>
                    </div>
                    <table class="table filter-footer table-dynamic table-tools2  " data-table-name="Eventos Informativos" id="table-editable"  style="table-layout: fixed;">
                    <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombres</th>
                                <th>Fecha Inicial</th>
                                <th>Fecha Final</th>
                                <th>Categoria</th>
                                <th>Sala</th>  
                                <th>Estado</th>    
                                <th class="text-right">Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <th>Id</th>
                                <th>Nombres</th>
                                <th>Fecha Inicial</th>
                                <th>Fecha Final</th>
                                <th>Categoria</th>
                                <th>Sala</th> 
                                <th>
                                    <div class="form-group">
                                        <label class="switch switch-green">
                                            <input type="checkbox" class="switch-input"  id="box" disabled>
                                            <span class="switch-label" data-on="On" data-off="Off"></span>
                                            <span class="switch-handle"></span>
                                            <span id="estado" class="esconder">Off</span>
                                        </label>
                                    </div>
                                </th>
                                <td class="text-right">
                                    <a class="editar btn btn-sm btn-dark" style="margin: 5px;"  href="#evento-informativo-editar"><i class="icon-note"></i></a>
                                    <a class="delete btn btn-sm btn-danger" style="margin: 5px;" href="javascript:;"><i class="icons-office-52"></i></a>
                                    <a class="estado btn btn-sm btn-blue" style="margin: 5px;" href="javascript:;"><i class="icon-key"></i></a>
                                </td>
                            </tr>
                         
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Nombres</th>
                                <th>Fecha Inicial</th>
                                <th>Fecha Final</th>
                                <th>Categoria</th>
                                <th>Sala</th>  
                                <th>Estado</th>    
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade  " id="modal-responsive" aria-hidden="true">
        <div class="modal-dialog modal-lg ">
            <div class="modal-content  ">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
                    <h4 class="modal-title">Crear <strong>Eventos Informativos</strong> </h4>
                </div>
                <div class="modal-body">
                    <form role="form" class=" form-validation">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Nombre Evento</label>
                                    <input type="text" name="nombreE" class="form-control" placeholder="Teatro Sanchez Aguilar" minlength="5" required>
                                </div>
                            </div>
                        
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="field-3" class="control-label">Duración</label>
                                    <input class="form-control input-sm" type="number" name="duracionE" placeholder="Type a number" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Fecha Inicial</label>
                                    <div class="form-group prepend-icon">
                                        <input type="date" name="fechaI" class="form-control" style="padding: 0px 30px;" placeholder="07/08/1995"  required>
                                        <i class="icon-calendar"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Fecha Final</label>
                                    <div class="form-group prepend-icon">
                                        <input type="date" name="fechaF" class="form-control" style="padding: 0px 30px;" placeholder="07/08/1995"  required>
                                        <i class="icon-calendar"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">    
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Tipo Evento</label>
                                    <select class="form-control" style="width:100%;">
                                        <option value="United States">Masculino</option>
                                        <option value="United Kingdom">Femenino</option>
                                    
                                </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Productora</label>
                                    <select class="form-control" style="width:100%;">
                                        <option value="United States">Masculino</option>
                                        <option value="United Kingdom">Femenino</option>
                                    
                                </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Categoria</label>
                                    <select class="form-control" style="width:100%;">
                                        <option value="United States">Masculino</option>
                                        <option value="United Kingdom">Femenino</option>
                                    
                                </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">   
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Clasificación</label>
                                    <select class="form-control" style="width:100%;">
                                        <option value="United States">Masculino</option>
                                        <option value="United Kingdom">Femenino</option>
                                    
                                </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Tipo Espectáculo</label>
                                    <select class="form-control" style="width:100%;">
                                        <option value="United States">Masculino</option>
                                        <option value="United Kingdom">Femenino</option>
                                    
                                </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Procedencia</label>
                                    <select class="form-control" style="width:100%;">
                                        <option value="United States">Masculino</option>
                                        <option value="United Kingdom">Femenino</option>
                                    
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">   
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Sala</label>
                                    <select class="form-control" style="width:100%;">
                                        <option value="United States">Masculino</option>
                                        <option value="United Kingdom">Femenino</option>
                                    
                                </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Distribución</label>
                                    <select class="form-control" style="width:100%;">
                                        <option value="United States">Masculino</option>
                                        <option value="United Kingdom">Femenino</option>
                                    
                                </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Mapa</label>
                                    <div data-toggle="modal" data-target="#modal-responsive3">
                                        <button class="btn btn-sm btn-dark"><i class="fa fa-plus"></i> Ver Sala</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">  
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Tipo de Precio</label>
                                    <select class="form-control" style="width:100%;">
                                        <option value="United States">Localidad</option>
                                        <option value="United Kingdom">General</option>
                                        <option value="United Kingdom">Plateas</option>
                                    </select>
                                </div>
                            </div> 
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="field-3" class="control-label">Aforo</label>
                                    <input class="form-control input-sm" type="number" name="duracionE" placeholder="Type a number" required>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="modal-footer text-center">
                            <button type="submit" class="btn btn-primary btn-embossed bnt-square" ><i class="fa fa-check"></i> Crear</button>
                            <button type="reset" class="btn btn-embossed btn-default">Limpiar</button>
                        </div>
                    </form>
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