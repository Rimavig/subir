<div>
    <div class="row">
        <div class="col-lg-12 portlets">
            <div class="panel">
                <div class="panel-header panel-controls">
                    <h3><i class="fa fa-table"></i> Tabla de <strong>Usuarios Clientes</strong> </h3>
                </div>
                <div class="panel-content pagination2 table-responsive">
                    <div class="m-b-20">
                        <div class="btn-group">
                            <div data-toggle="modal" data-target="#modal-responsive">
                                <button class="btn btn-sm btn-dark"><i class="fa fa-plus"></i> Agregar Usuario</button>
                            </div>
                            
                        </div>
                    </div>
                    <table class="table filter-footer table-dynamic table-tools1 " data-table-name="Usuarios Clientes" id="table-editable" style="table-layout: fixed;">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombres</th>
                                <th>Cedula</th>
                                <th>Correo</th>
                                <th>Celular</th>
                                <th>Estado</th>    
                                <th class="text-right">Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>Id</th>
                                <th>Nombres</th>
                                <th>Cedula</th>
                                <th>Correo</th>
                                <th>Celular</th>
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
                                    <div class="btn btn-sm " style="margin: 0px; padding: 5px 0px !important; "  data-toggle="modal" data-target="#modal-responsive1">
                                        <a class="editar btn btn-sm btn-dark" style="margin: 0px;  "  href="javascript:;"><i class="icon-note"></i></a>
                                    </div>
                                    <a class="delete btn btn-sm btn-danger" href="javascript:;"><i class="icons-office-52"></i></a>
                                    <a class="estado btn btn-sm btn-blue" style="margin: 0px;" href="javascript:;"><i class="icon-key"></i></a>
                                </td>
                            </tr>
                         
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Nombres</th>
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
    <div class="modal fade" id="modal-responsive" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
                    <h4 class="modal-title">Crear <strong>Usuario</strong> </h4>
                </div>
                <div class="modal-body">
                    <p>Agregar Usuario Administrador al Sistema</p>
                    <form role="form" class=" form-validation">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Nombres</label>
                                    <div class="form-group prepend-icon">
                                        <input type="text" name="name" class="form-control" placeholder="Teatro Sanchez Aguilar" minlength="5" required>
                                        <i class="icon-user"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Usuario</label>
                                    <div class="form-group prepend-icon">
                                        <input type="text" name="lastname" class="form-control" placeholder="TSA" minlength="3" required>
                                        <i class="icon-user"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="field-3" class="control-label">Cédula</label>
                                    <input type="text" name="cedula" class="form-control" placeholder="0911111111" minlength="10" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Celular</label>
                                    <div class="form-group prepend-icon">
                                        <input type="text" name="mobile" class="form-control" placeholder="0911111111" minlength="10" required>
                                        <i class="icon-screen-smartphone"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Correo</label>
                                    <div class="form-group prepend-icon">
                                        <input type="email" name="email" class="form-control" placeholder="tsa@hotmail.com" minlength="3" required>
                                        <i class="icon-user"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Sexo</label>
                                    <select class="form-control" style="width:100%;">
                                        <option value="United States">Masculino</option>
                                        <option value="United Kingdom">Femenino</option>
                                       
                                  </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Dirección</label>
                                    <div class="form-group prepend-icon">
                                        <input type="text" name="direccion" class="form-control" placeholder="Samborondom" minlength="5" required>
                                        <i class="icon-user"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Fecha Nacimiento</label>
                                    <div class="form-group prepend-icon">
                                        <input type="date" name="date" class="form-control" style="padding: 0px 30px;" placeholder="07/08/1995"  required>
                                        <i class="icon-calendar"></i>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-4" class="control-label">Perfil</label>
                                    <select class="form-control" style="width:100%;">
                                        <option value="United States">United States</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="Afghanistan">Afghanistan</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="American Samoa">American Samoa</option>
                                        <option value="Andorra">Andorra</option>
                                        <option value="Angola">Angola</option>
                                        <option value="Anguilla">Anguilla</option>
                                        <option value="Antarctica">Antarctica</option>
                                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                        <option value="Vanuatu">Vanuatu</option>
                                        <option value="Venezuela">Venezuela</option>
                                        <option value="Viet Nam">Viet Nam</option>
                                        <option value="Virgin Islands, British">Virgin Islands, British</option>
                                        <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                        <option value="Wallis and Futuna">Wallis and Futuna</option>
                                        <option value="Western Sahara">Western Sahara</option>
                                        <option value="Yemen">Yemen</option>
                                        <option value="Zambia">Zambia</option>
                                        <option value="Zimbabwe">Zimbabwe</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-md-4">
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
                </div>
                
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-responsive1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
                    <h4 class="modal-title">Editar <strong>Usuario</strong> </h4>
                </div>
                <div class="modal-body">
                    <p>Editar Usuario Administrador al Sistema</p>
                    <form role="form" class=" form-validation">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Nombres</label>
                                    <div class="form-group prepend-icon">
                                        <input type="text" name="name" class="form-control" placeholder="Teatro Sanchez Aguilar" minlength="5" required>
                                        <i class="icon-user"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Usuario</label>
                                    <div class="form-group prepend-icon">
                                        <input type="text" name="lastname" class="form-control" placeholder="TSA" minlength="3" required>
                                        <i class="icon-user"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="field-3" class="control-label">Cédula</label>
                                    <input type="text" name="cedula" class="form-control" placeholder="0911111111" minlength="10" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Celular</label>
                                    <div class="form-group prepend-icon">
                                        <input type="text" name="mobile" class="form-control" placeholder="0911111111" minlength="10" required>
                                        <i class="icon-screen-smartphone"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Correo</label>
                                    <div class="form-group prepend-icon">
                                        <input type="email" name="email" class="form-control" placeholder="tsa@hotmail.com" minlength="3" required>
                                        <i class="icon-user"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Sexo</label>
                                    <select class="form-control" style="width:100%;">
                                        <option value="United States">Masculino</option>
                                        <option value="United Kingdom">Femenino</option>
                                       
                                  </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Dirección</label>
                                    <div class="form-group prepend-icon">
                                        <input type="text" name="direccion" class="form-control" placeholder="Samborondom" minlength="5" required>
                                        <i class="icon-user"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Fecha Nacimiento</label>
                                    <div class="form-group prepend-icon">
                                        <input type="date" name="date" class="form-control" style="padding: 0px 30px;" placeholder="07/08/1995"  required>
                                        <i class="icon-calendar"></i>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-4" class="control-label">Perfil</label>
                                    <select class="form-control" style="width:100%;">
                                        <option value="United States">United States</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="Afghanistan">Afghanistan</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="American Samoa">American Samoa</option>
                                        <option value="Andorra">Andorra</option>
                                        <option value="Angola">Angola</option>
                                        <option value="Anguilla">Anguilla</option>
                                        <option value="Antarctica">Antarctica</option>
                                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                        <option value="Vanuatu">Vanuatu</option>
                                        <option value="Venezuela">Venezuela</option>
                                        <option value="Viet Nam">Viet Nam</option>
                                        <option value="Virgin Islands, British">Virgin Islands, British</option>
                                        <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                        <option value="Wallis and Futuna">Wallis and Futuna</option>
                                        <option value="Western Sahara">Western Sahara</option>
                                        <option value="Yemen">Yemen</option>
                                        <option value="Zambia">Zambia</option>
                                        <option value="Zimbabwe">Zimbabwe</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-md-4">
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
                            <button type="submit" class="btn btn-primary btn-embossed bnt-square" ><i class="fa fa-check"></i> Editar</button>
                            <button type="reset" class="btn btn-embossed btn-default">Limpiar</button>
                        </div>
                    </form>
                </div>
                
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