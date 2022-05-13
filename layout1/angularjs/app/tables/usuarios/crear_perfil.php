<?php
include ("../../conect.php");
include ("../../autenticacion.php");
?>
<div class="row">
    <div class="col-lg-12 portlets">
        <div class="panel">
            <div class="panel-header panel-controls">
                <h3><i class="fa fa-table"></i> Tabla de <strong>Perfiles (Permisos de Administrador)</strong> </h3>
            </div>
            
            <div class="panel-content pagination2 table-responsive">
                <div class="row">  
                    <div class="col-md-8 col-sm-8 col-xs-6">
                        <div class="form-group">
                            <label for="field-1" class="control-label"> Nombre Perfil </label>
                            <div class="form-group prepend-icon">
                                <input type="text" name="nombres"  id="nombres" class="form-control" placeholder="Teatro Sanchez Aguilar" minlength="4"  required>
                                <i class="icon-user"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Administrador</label>
                            <div class="form-group ">
                                <label class="switch switch-green">
                                    <input type="checkbox" class="switch-input"  id="admin" >
                                    <span class="switch-label" data-on="On" data-off="Off"></span>
                                    <span class="switch-handle"></span>
                                    <span id="estado" class="esconder">ON</span>
                                </label>
                            </div>
                        </div>  
                    </div>
                </div>
                <accordion class="panel-group panel-accordion" close-others="true">
                    <accordion-group is-open="open">
                        <accordion-heading>
                            Módulo <strong>Permisos</strong><i class="pull-right glyphicon" ng-class="{'glyphicon-chevron-down': open, 'glyphicon-chevron-right': !open}"> </i>
                        </accordion-heading>
                        <div class="panel-body permisos">
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
                    <button class="btn btn-primary btn-embossed bnt-square crear_perfil"  ><i class="fa fa-check"></i> Crear</button>
                    <button type="button" class="btn btn-embossed btn-default " data-dismiss="modal" aria-hidden="true">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</div>                     
   