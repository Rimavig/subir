<?php
include ("../../conect.php");
include ("../../autenticacion.php");
$tipo="Mapas de Sala Principal";
$tipo2="distribucionP";
$nombreT="la distribución principal";
echo $_POST["tipo"];
?>
<div>
    <div class="row">
        <div class="col-lg-12 portlets">
            <div class="panel">
                <div class="panel-header panel-controls">
                    <h3><i class="fa fa-table"></i> Tabla de <strong>Eventos Ventas</strong> </h3>
                </div>
                <div class="panel-content pagination2 ">
                    <tabset class="tab-fade-in">
                        <tab>
                            <tab-heading>
                                Información
                            </tab-heading>
                            
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
                                            <input class="form-control input-sm" type="number" name="duracionE" placeholder="" required>
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
                                                <button id="myBtn" class="btn btn-sm btn-dark"><i class="fa fa-plus"></i> Ver Sala</button>
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
                                            <input class="form-control input-sm" type="number" name="duracionE" placeholder="" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="field-1" class="control-label">Estado</label>
                                            <div class="form-group">
                                                <label class="switch switch-green">
                                                    <input type="checkbox" class="switch-input">
                                                    <span class="switch-label" data-on="On" data-off="Off"></span>
                                                    <span class="switch-handle"></span>
                                                </label>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <div class="modal-footer text-center">
                                    <button type="submit" class="btn btn-primary btn-embossed bnt-square" ><i class="fa fa-check"></i> Crear</button>
                                    <button type="reset" class="btn btn-embossed btn-default">Limpiar</button>
                                </div>
                            </form>
                        </tab>
                        <tab >
                            <tab-heading>
                                Descripción
                            </tab-heading>
                            <form role="form" class=" form-validation">
                                <div class="page-editors">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h3><strong>Sipnosis</strong></h3>
                                            <div class="summernote" data-airmode="false">
                                                <h2>This is an Air-mode editable area.</h2>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <h3><strong>Productora</strong></h3>
                                            <div class="summernote" data-airmode="false">
                                                <h2>This is an Air-mode editable area.</h2>
                                                <p class="f-16">With one click, you can modify text content.</p>
                                                <p class="f-16">Double click on text to reveal the toolbar.</p>
                                                <p class="f-16">Edit rich document on-the-fly, so elastic!</p>
                                                <p>End of air-mode area</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <h3><strong>Elenco</strong></h3>
                                            <div class="summernote" data-airmode="false">
                                                <h2>This is an Air-mode editable area.</h2>
                                                <p class="f-16">With one click, you can modify text content.</p>
                                                <p class="f-16">Double click on text to reveal the toolbar.</p>
                                                <p class="f-16">Edit rich document on-the-fly, so elastic!</p>
                                                <p>End of air-mode area</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer text-center">
                                        <button type="submit" class="btn btn-primary btn-embossed bnt-square" ><i class="fa fa-check"></i> Crear</button>
                                        <button type="reset" class="btn btn-embossed btn-default">Limpiar</button>

                                    </div>     
                                </div>
                            </form>
                        </tab>
                        <tab>
                            <tab-heading>
                              Multimedia
                            </tab-heading>
                            <form role="form" class=" form-validation">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="field-1" class="control-label">Link del Video</label>
                                            <input type="text" name="nombreE" class="form-control" placeholder="Teatro Sanchez Aguilar" minlength="5" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <p><strong>Imagen</strong></p>
                                            <div class="fileinput-new thumbnail">
                                                <img data-src="" src="../../../assets/global/images/gallery/3.jpg" class="img-responsive" alt="gallery 3">
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                            <div>
                                                <span class="btn btn-default btn-file">
                                                <span class="fileinput-new">Select image...</span>
                                                <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="...">
                                                </span>
                                                <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <p><strong>Video</strong></p>
                                        <div class="embed-responsive embed-responsive-16by9">
                                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer text-center">
                                        <button type="submit" class="btn btn-primary btn-embossed bnt-square" ><i class="fa fa-check"></i> Crear</button>
                                        <button type="reset" class="btn btn-embossed btn-default">Limpiar</button>
                                </div>
                            </form>
                        </tab>
                        <tab>
                            <tab-heading>
                              Funciones
                            </tab-heading>
                            <div class="panel-content pagination2 table-responsive">
                                <div class="m-b-20">
                                    <div class="btn-group">
                                        <button class="crear btn btn-sm btn-dark" > <i class="fa fa-plus"></i> Agregar Función</button>
                                    </div>
                                </div>
                                <form role="form" class=" form-validation">
                                    <table class="table table-hover table-dynamic" id="table-editable1">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>Fecha</th>
                                                <th>Estado</th>
                                                <th class="text-right">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>
                                                    <input type="text" name="datetimepicker" class="form-control input-sm datepicker" placeholder="Choose a date..." required>
                                                </td>
                                                <td><label class="switch switch-green">
                                                        <input type="checkbox" class="switch-input">
                                                        <span class="switch-label" data-on="On" data-off="Off"></span>
                                                        <span class="switch-handle"></span>
                                                    </label>
                                                </td>
                                                <td class="text-right">
                                                    <a class="guardar btn btn-sm btn-blue"  href="javascript:;" ><i class="fa fa-save"></i></a> 
                                                    <a class="delete btn btn-sm btn-danger" href="javascript:;"><i class="icons-office-52"></i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>  
                                    <div class="modal-footer text-center">
                                            <button type="submit" class="btn btn-primary btn-embossed bnt-square" ><i class="fa fa-check"></i> Crear</button>
                                            <button type="reset" class="btn btn-embossed btn-default">Limpiar</button>
                                    </div>
                                </form>
                            </div>
                        </tab>
                        <tab>
                            <tab-heading>
                              Precios
                            </tab-heading>
                            <div class="panel-content pagination2 table-responsive">
                                <div class="row">  
                                    <div class="col-md-3">
                                        <div class="btn-group">
                                            <button class="crear1 btn btn-sm btn-dark" > <i class="fa fa-plus"></i> Agregar Precio</button>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                            <label for="field-3" >Aforo</label>
                                            <input class=" input-sm" type="number" name="duracionE" placeholder="" >
                                    </div>
                                </div>
                                <form role="form" class=" form-validation">

                                <div >
                                    <table class="table prueba" id="table-editable2"  data-turbolinks = "false"  style="table-layout: fixed;">

                                        <thead>
                                            <tr>
                                                <th>Nombre Platea</th>
                                                <th>Precio</th>
                                                <th>Aforo Inicial</th>
                                                <th>Venta x Platea</th>
                                                <th>Estado</th>
                                                <th class="text-right">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                                                        
                                            <tr>
                                                <td>
                                                    <input type="text" name="nombrePlatea" id="nombrePlatea" class="form-control prueba" placeholder="Nombre Platea" minlength="3" required>
                                                </td>
                                                <td>
                                                    <input class="form-control input-sm prueba" type="number" min="0" name="precio" id="precio" placeholder="" required>
                                                </td>
                                                <td>
                                                    <input class="form-control input-sm prueba" type="number" name="aforo" id="aforo"  min="0"  placeholder="" required>
                                                </td>
                                                <td>
                                                    <input class="form-control input-sm prueba" type="text" name="venta" id="venta" min="0"  placeholder="" disabled >
                                                </td>
                                                <td><label class="switch switch-green">
                                                        <input type="checkbox" class="switch-input prueba" id="estado" >
                                                        <span class="switch-label" data-on="On" data-off="Off"></span>
                                                        <span class="switch-handle"></span>
                                                    </label>
                                                </td>
                                                <td class="text-right">
                                                    <a class="guardar1 btn btn-sm btn-blue"  href="javascript:;" ><i class="fa fa-save"></i></a> 
                                                    <a class="delete1 btn btn-sm btn-danger" href="javascript:;"><i class="icons-office-52"></i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>  
                                    <div class="modal-footer text-center">
                                            <button type="submit" class="btn btn-primary btn-embossed bnt-square" ><i class="fa fa-check"></i> Crear</button>
                                            <button type="reset" class="btn btn-embossed btn-default">Limpiar</button>
                                    </div>
                                    </div>
                                </form>
                            </div>
                        </tab>
                        
                </tabset>
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