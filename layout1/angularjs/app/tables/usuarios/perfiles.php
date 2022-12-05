<?php
include ("../../conect.php");
include ("../../autenticacion.php");
$re = $client->getPerfilRol($_SESSION["id"],"4");
$resultado = "".$re;
$usuarios= explode(',',$resultado);
$crear="hide";
$exportar="no-descargar";
if($resultado==""){
    ?>
    <a ng-click="reload()">
    <?php
}
foreach($usuarios as $llave => $valores1) {
    if($valores1==="1"){
        $crear="";
    }
    if($valores1==="6"){
        $exportar="";
    }
}
?>

<div>
    <div class="row perfiles">
        <div class="col-lg-12 portlets">
            <div class="panel">
                <div class="panel-header panel-controls">
                    <h3><i class="fa fa-table"></i> Tabla de <strong>Perfiles (Permisos de Administrador)</strong> </h3>
                </div>
                <div class="panel-content pagination2 table-responsive">
                    <div class="m-b-20 <?php echo $crear; ?>">
                        <div class="btn-group">
                            <button class="crearPerfil btn btn-sm btn-dark" ><i class="fa fa-plus"></i> Agregar Perfil</button>
                        </div>
                    </div>
                    <table class="table filter-footer perfil_data <?php echo $exportar; ?> table-dynamic perfil " data-table-name="Perfiles" id="table-editable" style="table-layout: fixed;">
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
                            <accordion-group is-open="open6">
                                <accordion-heading>
                                    Módulo <strong>Correos</strong><i class="pull-right glyphicon" ng-class="{'glyphicon-chevron-down': open6, 'glyphicon-chevron-right': !open6}"> </i>
                                </accordion-heading>
                                <div class="panel-body correos">
                                    
                                </div>
                            </accordion-group>
                            <accordion-group is-open="open7">
                                <accordion-heading>
                                    Módulo <strong>Reportes</strong><i class="pull-right glyphicon" ng-class="{'glyphicon-chevron-down': open7, 'glyphicon-chevron-right': !open7}"> </i>
                                </accordion-heading>
                                <div class="panel-body reportes">
                                    
                                </div>
                            </accordion-group>
                            <accordion-group is-open="open8">
                                <accordion-heading>
                                    Módulo <strong>Web</strong><i class="pull-right glyphicon" ng-class="{'glyphicon-chevron-down': open8, 'glyphicon-chevron-right': !open8}"> </i>
                                </accordion-heading>
                                <div class="panel-body web">
                                    
                                </div>
                            </accordion-group>
                            <accordion-group is-open="open9">
                                <accordion-heading>
                                    Módulo <strong>Facturación</strong><i class="pull-right glyphicon" ng-class="{'glyphicon-chevron-down': open9, 'glyphicon-chevron-right': !open9}"> </i>
                                </accordion-heading>
                                <div class="panel-body facturacion">
                                    
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
        <p class="copyright">
                <span>Copyright © 2022 </span><span> Teatro Sanchez Aguilar </span><span>- Powered by Vion IoT Solutions. All rights reserved.</span>
            </p>
    </div>
</div>