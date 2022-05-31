<?php
include ("../../conect.php");
include ("../../autenticacion.php");

?>

<div>
    <div class="row perfiles">
        <div class="col-lg-12 portlets">
            <div class="panel">
                <div class="panel-header panel-controls">
                    <h3><i class="fa fa-table"></i> Tabla de <strong>Perfiles (Permisos de Administrador)</strong> </h3>
                </div>
                <div class="panel-content pagination2 table-responsive">
                    <div class="m-b-20">
                        <div class="btn-group">
                            <button class="crearPerfil btn btn-sm btn-dark" ><i class="fa fa-plus"></i> Agregar Perfil</button>
                        </div>
                    </div>
                    <table class="table filter-footer perfil_data table-dynamic perfil " data-table-name="Perfiles" id="table-editable" style="table-layout: fixed;">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Tipo</th>
                                <th>Estado</th>    
                                <th class="text-right">Editar</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Tipo</th>
                                <th>Estado</th>   
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="Cperfiles hide" id="Cperfiles" >
        <div class="row">
            <div class="col-lg-12 portlets">
                <div class="panel">
                    <div class="panel-header panel-controls">
                        <h3><i class="fa fa-table"></i> Tabla de <strong>Perfiles (Permisos de Administrador)</strong> </h3>
                    </div>  
                    <div class="panel-content pagination2 table-responsive">
                        <div class="row general">  
                            
                        </div>
                        <accordion class="panel-group panel-accordion" close-others="true">
                            <accordion-group is-open="open">
                                <accordion-heading>
                                    Módulo <strong>Permisos</strong><i class="pull-right glyphicon" ng-class="{'glyphicon-chevron-down': open, 'glyphicon-chevron-right': !open}"> </i>
                                </accordion-heading>
                                <div class="panel-body perfilG">
                                </div>
                            </accordion-group>
                            <accordion-group is-open="open2">
                                <accordion-heading>
                                    Módulo <strong>Mantenimiento</strong><i class="pull-right glyphicon" ng-class="{'glyphicon-chevron-down': open2, 'glyphicon-chevron-right': !open2}"> </i>
                                </accordion-heading>
                                <div class="panel-body mantenimiento">
                                </div>
                            </accordion-group>
                            <accordion-group is-open="open3">
                                <accordion-heading>
                                    Módulo <strong>Imágenes</strong><i class="pull-right glyphicon" ng-class="{'glyphicon-chevron-down': open3, 'glyphicon-chevron-right': !open3}"> </i>
                                </accordion-heading>
                                <div class="panel-body imagenes">
                                    
                                </div>
                            </accordion-group>
                            <accordion-group is-open="open4">
                                <accordion-heading>
                                    Módulo <strong>Eventos</strong><i class="pull-right glyphicon" ng-class="{'glyphicon-chevron-down': open4, 'glyphicon-chevron-right': !open4}"> </i>
                                </accordion-heading>
                                <div class="panel-body eventos">
                                    
                                </div>
                            </accordion-group>
                            <accordion-group is-open="open5">
                                <accordion-heading>
                                    Módulo <strong>Procesos</strong><i class="pull-right glyphicon" ng-class="{'glyphicon-chevron-down': open5, 'glyphicon-chevron-right': !open5}"> </i>
                                </accordion-heading>
                                <div class="panel-body procesos">
                                    
                                </div>
                            </accordion-group>
                        </accordion>
                        <div class="modal-footer text-center">
                            <button class="btn btn-primary btn-embossed bnt-square crear_perfil hide"  ><i class="fa fa-check"></i> Crear</button>
                            <button class="btn btn-primary btn-embossed bnt-square editar_perfil hide"  ><i class="fa fa-check"></i> Guardar</button>
                            <button type="button" class="btn btn-embossed btn-default cancelar" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>                       
    </div>                        
    <div class="alerta" id="alerta" >
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