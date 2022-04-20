<?php
include ("../../conect.php");
include ("../../autenticacion.php");
$re = $client->getAllUsuario();
$resultado= "".$re;
$usuarios =explode(';',$resultado);

?>

<div>
    <div class="row esconder">
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
                    <table class="table filter-footer table-dynamic perfil " data-table-name="Perfiles" style="table-layout: fixed;">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Tipo</th>
                                <th>Descripcion</th>
                                <th>Estado</th>    
                                <th class="text-right">Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach($usuarios as $llave => $valores) {
                                $usuario =explode(',,,',$valores);
                                $estado="";
                                $estadoT="OFF";
                                if (isset($usuario[2])) {
                            ?>
                            <tr>
                                <td id="fila0"> <?php if (isset($usuario[0])) {echo $usuario[0]; }  ?> </td>
                                <td> <?php if (isset($usuario[1])) {echo $usuario[1]; }  ?> </td>
                                <td> <?php if (isset($usuario[2])) {echo $usuario[2]; }  ?> </td>
                                <td> <?php if (isset($usuario[3])) {echo $usuario[3]; }  ?> </td>
                                <th>
                                    <?php 
                                        if ($usuario[12]==="A" ) {
                                            $estado="checked";
                                            $estadoT="ON";
                                        } 
                                    ?> 
                                    <div class="form-group">
                                        <label class="switch switch-green">
                                            <input type="checkbox" class="switch-input" id="box" <?php echo $estado; ?> disabled>
                                            <span class="switch-label" data-on="On" data-off="Off"></span>
                                            <span class="switch-handle"></span>
                                            <span id="estado" class="esconder"><?php echo $estadoT; ?></span>
                                        </label>
                                    </div>
                                </th>
                                <td class="text-right">
                                    <a class="editarPerfil btn btn-sm btn-dark" style="margin: 0px;  "  href="javascript:;"><i class="icon-note"></i></a>
                                    <a class="deletePerfil  btn btn-sm btn-danger" style="margin: 0px;  " href="javascript:;"><i class="icons-office-52"></i></a>
                                    <a class="estadoPerfil  btn btn-sm btn-warning" style="margin: 0px;" href="javascript:;"><i class="icon-lock"></i></a>
                                </td>
                            </tr>
                            <?php
                             }
                            }
                            $transport->close();
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Tipo</th>
                                <th>Descripcion</th>
                                <th>Estado</th>   
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="Cperfiles" id="Cperfiles" >
        <div class="row">
            <div class="col-lg-12 portlets">
                <div class="panel">
                    <div class="panel-header panel-controls">
                        <h3><i class="fa fa-table"></i> Tabla de <strong>Perfiles (Permisos de Administrador)</strong> </h3>
                    </div>
                    <div class="panel-content pagination2 table-responsive">
                        <accordion class="panel-group panel-accordion" close-others="true">
                            <accordion-group is-open="open">
                                <accordion-heading>
                                    Módulo <strong>Permisos</strong><i class="pull-right glyphicon" ng-class="{'glyphicon-chevron-down': open, 'glyphicon-chevron-right': !open}"> </i>
                                </accordion-heading>
                                <div class="panel-body">
                                    <div class="row" >
                                        <div class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                            <div class="form-group">
                                                <p><label><input type="checkbox" class="Tperfiles" id="Tperfiles" data-checkbox="icheckbox_minimal-red"><strong>PERFILES</strong></label></p>
                                                
                                                <div class="input-group">
                                                    <div class="icheck-list">
                                                        <label><input type="checkbox" id="exportarP" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                                        <label><input type="checkbox" id="crearP" data-checkbox="icheckbox_flat-blue"> Crear</label>
                                                        <label><input type="checkbox" id="editarP" data-checkbox="icheckbox_flat-blue"> Editar</label>
                                                        <label> <input type="checkbox" id="eliminarP" data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                                                        <label> <input type="checkbox" id="estadoP" data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                                                    </div>
                                                </div>
                                            </div>       
                                        </div>
                                        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                            <div class="form-group">
                                                <p><label><input type="checkbox"  class="usuariosUAD" id="usuariosUAD" data-checkbox="icheckbox_minimal-red"><strong>USUARIOS ADMINISTRADORES</strong></p>
                                                <div class="input-group">
                                                    <div class="icheck-list">
                                                        <label><input type="checkbox" id="exportarUAD" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                                        <label><input type="checkbox" id="crearUAD" data-checkbox="icheckbox_flat-blue"> Crear</label>
                                                        <label><input type="checkbox" id="editarUAD" data-checkbox="icheckbox_flat-blue"> Editar</label>
                                                        <label> <input type="checkbox" id="eliminarUAD" data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                                                        <label> <input type="checkbox" id="resetUAD" data-checkbox="icheckbox_flat-blue"> Resetear Clave</label>
                                                        <label> <input type="checkbox" id="estadoUAD" data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                                                    </div>
                                                </div>
                                            </div>       
                                        </div>
                                        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                            <div class="form-group">
                                                <p><label><input type="checkbox" class="usuariosUCL" id="usuariosUCL" data-checkbox="icheckbox_minimal-red"><strong>USUARIOS CLIENTES</strong></p>
                                                <div class="input-group">
                                                    <div class="icheck-list">
                                                        <label><input type="checkbox" id="exportarUCL" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                                        <label><input type="checkbox" id="crearUCL" data-checkbox="icheckbox_flat-blue"> Crear</label>
                                                        <label><input type="checkbox" id="editarUCL" data-checkbox="icheckbox_flat-blue"> Editar</label>
                                                        <label> <input type="checkbox" id="eliminarUCL" data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                                                        <label> <input type="checkbox" id="resetUCL" data-checkbox="icheckbox_flat-blue"> Resetear Clave</label>
                                                        <label> <input type="checkbox" id="estadoUCL" data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                                                    </div>
                                                </div>
                                            </div>       
                                        </div>
                                        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                            <div class="form-group">
                                                <p><label><input type="checkbox" class="usuariosUEV" id="usuariosUEV" data-checkbox="icheckbox_minimal-red"><strong>USUARIOS EVENTOS</strong></p>
                                                <div class="input-group">
                                                    <div class="icheck-list">
                                                        <label><input type="checkbox" id="exportarUEV" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                                        <label><input type="checkbox" id="crearUEV" data-checkbox="icheckbox_flat-blue"> Crear</label>
                                                        <label><input type="checkbox" id="editarUEV" data-checkbox="icheckbox_flat-blue"> Editar</label>
                                                        <label> <input type="checkbox" id="eliminarUEV" data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                                                        <label> <input type="checkbox" id="resetUEV" data-checkbox="icheckbox_flat-blue"> Resetear Clave</label>
                                                        <label> <input type="checkbox" id="estadoUEV" data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                                                    </div>
                                                </div>
                                            </div>       
                                        </div>
                                    </div>
                                </div>
                            </accordion-group>
                            <accordion-group is-open="open2">
                                <accordion-heading>
                                    Módulo <strong>Mantenimiento</strong><i class="pull-right glyphicon" ng-class="{'glyphicon-chevron-down': open2, 'glyphicon-chevron-right': !open2}"> </i>
                                </accordion-heading>
                                <div class="panel-body">
                                    <div class="row">  
                                        <div class="col-md-2 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                            <div class="form-group">
                                                <p><label><input type="checkbox" class="Tcategoria" id="Tcategoria" data-checkbox="icheckbox_minimal-red"><strong>CATEGORIA</strong></p>
                                                <div class="input-group">
                                                    <div class="icheck-list">
                                                        <label><input type="checkbox" id="exportarMC" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                                        <label><input type="checkbox" id="crearMC" data-checkbox="icheckbox_flat-blue"> Crear</label>
                                                        <label><input type="checkbox" id="editarMC" data-checkbox="icheckbox_flat-blue"> Editar</label>
                                                        <label> <input type="checkbox" id="eliminarMC" data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                                                        <label> <input type="checkbox" id="estadoMC" data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                                                    </div>
                                                </div>
                                            </div>       
                                        </div>
                                        <div class="col-md-2 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                            <div class="form-group">
                                                <p><label><input type="checkbox" class="Tclasificacion" id="Tclasificacion" data-checkbox="icheckbox_minimal-red"><strong>CLASIFICACIÓN</strong></p>
                                                <div class="input-group">
                                                    <div class="icheck-list">
                                                        <label><input type="checkbox" id="exportarMCL" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                                        <label><input type="checkbox" id="crearMCL" data-checkbox="icheckbox_flat-blue"> Crear</label>
                                                        <label><input type="checkbox" id="editarMCL" data-checkbox="icheckbox_flat-blue"> Editar</label>
                                                        <label> <input type="checkbox" id="eliminarMCL" data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                                                        <label> <input type="checkbox" id="estadoMCL" data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                                                    </div>
                                                </div>
                                            </div>       
                                        </div>
                                        <div class="col-md-2 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                            <div class="form-group">
                                                <p><label><input type="checkbox" class="Tespectaculo" id="Tespectaculo" data-checkbox="icheckbox_minimal-red"><strong>ESPECTÁCULO</strong></p>
                                                <div class="input-group">
                                                    <div class="icheck-list">
                                                        <label><input type="checkbox" id="exportarME" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                                        <label><input type="checkbox" id="crearME" data-checkbox="icheckbox_flat-blue"> Crear</label>
                                                        <label><input type="checkbox" id="editarME" data-checkbox="icheckbox_flat-blue"> Editar</label>
                                                        <label> <input type="checkbox" id="eliminarME" data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                                                        <label> <input type="checkbox" id="estadoME" data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                                                    </div>
                                                </div>
                                            </div>       
                                        </div>
                                        <div class="col-md-2 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                            <div class="form-group">
                                                <p><label><input type="checkbox" class="Tprocedencia" id="Tprocedencia" data-checkbox="icheckbox_minimal-red"><strong>PROCEDENCIA</strong></p>
                                                <div class="input-group">
                                                    <div class="icheck-list">
                                                        <label><input type="checkbox" id="exportarMP" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                                        <label><input type="checkbox" id="crearMP" data-checkbox="icheckbox_flat-blue"> Crear</label>
                                                        <label><input type="checkbox" id="editarMP" data-checkbox="icheckbox_flat-blue"> Editar</label>
                                                        <label> <input type="checkbox" id="eliminarMP" data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                                                        <label> <input type="checkbox" id="estadoMP" data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                                                    </div>
                                                </div>
                                            </div>       
                                        </div>
                                        <div class="col-md-2 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                            <div class="form-group">
                                                <p><label><input type="checkbox" class="TtipoEvento" id="TtipoEvento" data-checkbox="icheckbox_minimal-red"><strong>TIPO DE EVENTO</strong></p>
                                                <div class="input-group">
                                                    <div class="icheck-list">
                                                        <label><input type="checkbox" id="exportarMTE" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                                        <label><input type="checkbox" id="crearMTE" data-checkbox="icheckbox_flat-blue"> Crear</label>
                                                        <label><input type="checkbox" id="editarMTE" data-checkbox="icheckbox_flat-blue"> Editar</label>
                                                        <label> <input type="checkbox" id="eliminarMTE" data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                                                        <label> <input type="checkbox" id="estadoMTE" data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                                                    </div>
                                                </div>
                                            </div>       
                                        </div>
                                        <div class="col-md-2 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                            <div class="form-group">
                                                <p><label><input type="checkbox" class="Tproductora" id="Tproductora" data-checkbox="icheckbox_minimal-red"><strong>PRODUCTORA</strong></p>
                                                <div class="input-group">
                                                    <div class="icheck-list">
                                                    <label><input type="checkbox" id="exportarMPR" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                                        <label><input type="checkbox" id="crearMPR" data-checkbox="icheckbox_flat-blue"> Crear</label>
                                                        <label><input type="checkbox" id="editarMPR" data-checkbox="icheckbox_flat-blue"> Editar</label>
                                                        <label> <input type="checkbox" id="eliminarMPR" data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                                                        <label> <input type="checkbox" id="estadoMPR" data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                                                    </div>
                                                </div>
                                            </div>       
                                        </div>
                                        <div class="col-md-2 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                            <div class="form-group">
                                                <p><label><input type="checkbox" class="Tpromocion" id="Tpromocion" data-checkbox="icheckbox_minimal-red"><strong>PROMOCIÓN</strong></p>
                                                <div class="input-group">
                                                    <div class="icheck-list">
                                                        <label><input type="checkbox" id="exportarMPM" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                                        <label><input type="checkbox" id="crearMPM" data-checkbox="icheckbox_flat-blue"> Crear</label>
                                                        <label><input type="checkbox" id="editarMPM" data-checkbox="icheckbox_flat-blue"> Editar</label>
                                                        <label> <input type="checkbox" id="eliminarMPM" data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                                                        <label> <input type="checkbox" id="estadoMPM" data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                                                    </div>
                                                </div>
                                            </div>       
                                        </div>
                                        <div class="col-md-2 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                            <div class="form-group">
                                                <p><label><input type="checkbox" class="TdistribucionP" id="TdistribucionP" data-checkbox="icheckbox_minimal-red"><strong>DISTRIBUCIÓN PRINCIPAL</strong></p>
                                                <div class="input-group">
                                                    <div class="icheck-list">
                                                    <label><input type="checkbox" id="exportarMDP" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                                        <label><input type="checkbox" id="crearMDP" data-checkbox="icheckbox_flat-blue"> Crear</label>
                                                        <label><input type="checkbox" id="editarMDP" data-checkbox="icheckbox_flat-blue"> Editar</label>
                                                        <label> <input type="checkbox" id="eliminarMDP" data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                                                        <label> <input type="checkbox" id="estadoMDP" data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                                                    </div>
                                                </div>
                                            </div>       
                                        </div>
                                        <div class="col-md-2 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                            <div class="form-group">
                                                <p><label><input type="checkbox" class="TdistribucionE" id="TdistribucionE" data-checkbox="icheckbox_minimal-red"><strong>DISTRIBUCIÓN EXTERIOR</strong></p>
                                                <div class="input-group">
                                                    <div class="icheck-list">
                                                        <label><input type="checkbox" id="exportarMDE" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                                        <label><input type="checkbox" id="crearMDE" data-checkbox="icheckbox_flat-blue"> Crear</label>
                                                        <label><input type="checkbox" id="editarMDE" data-checkbox="icheckbox_flat-blue"> Editar</label>
                                                        <label> <input type="checkbox" id="eliminarMDE" data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                                                        <label> <input type="checkbox" id="estadoMDE" data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                                                    </div>
                                                </div>
                                            </div>       
                                        </div>
                                        <div class="col-md-2 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                            <div class="form-group">
                                                <p><label><input type="checkbox" class="Tsala" id="Tsala" data-checkbox="icheckbox_minimal-red"><strong>SALA</strong></p>
                                                <div class="input-group">
                                                    <div class="icheck-list">
                                                        <label><input type="checkbox" id="exportarMSL" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                                        <label><input type="checkbox" id="editarMSL" data-checkbox="icheckbox_flat-blue"> Editar</label>
                                                        <label> <input type="checkbox" id="estadoMSL" data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                                                    </div>
                                                </div>
                                            </div>       
                                        </div>
                                    </div>
                                </div>
                            </accordion-group>
                            <accordion-group is-open="open3">
                                <accordion-heading>
                                    Módulo <strong>Imágenes</strong><i class="pull-right glyphicon" ng-class="{'glyphicon-chevron-down': open3, 'glyphicon-chevron-right': !open3}"> </i>
                                </accordion-heading>
                                <div class="panel-body">
                                    <div class="row">  
                                        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                            <div class="form-group">
                                                <p><label><input type="checkbox" class="TimagenSala" id="TimagenSala" data-checkbox="icheckbox_minimal-red"><strong>SALA</strong></p>
                                                <div class="input-group">
                                                    <div class="icheck-list">
                                                        <label><input type="checkbox" id="exportarIS" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                                        <label><input type="checkbox" id="crearIS" data-checkbox="icheckbox_flat-blue"> Crear</label>
                                                        <label><input type="checkbox" id="editarIS" data-checkbox="icheckbox_flat-blue"> Editar</label>
                                                        <label> <input type="checkbox" id="eliminarIS" data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                                                        <label> <input type="checkbox" id="estadoIS" data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                                                    </div>
                                                </div>
                                            </div>       
                                        </div>
                                        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                            <div class="form-group">
                                                <p><label><input type="checkbox" class="TimagenDistribucion" id="TimagenDistribucion" data-checkbox="icheckbox_minimal-red"><strong>DISTRIBUCION</strong></p>
                                                <div class="input-group">
                                                    <div class="icheck-list">
                                                        <label><input type="checkbox" id="exportarID" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                                        <label><input type="checkbox" id="crearID" data-checkbox="icheckbox_flat-blue"> Crear</label>
                                                        <label><input type="checkbox" id="editarID" data-checkbox="icheckbox_flat-blue"> Editar</label>
                                                        <label> <input type="checkbox" id="eliminarID" data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                                                        <label> <input type="checkbox" id="estadoID" data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                                                    </div>
                                                </div>
                                            </div>       
                                        </div>
                                        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                            <div class="form-group">
                                                <p><label><input type="checkbox" class="TimagenBanner" id="TimagenBanner" data-checkbox="icheckbox_minimal-red"><strong>BANNER</strong></p>
                                                <div class="input-group">
                                                    <div class="icheck-list">
                                                        <label><input type="checkbox" id="exportarIB" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                                        <label><input type="checkbox" id="crearIB" data-checkbox="icheckbox_flat-blue"> Crear</label>
                                                        <label><input type="checkbox" id="editarIB" data-checkbox="icheckbox_flat-blue"> Editar</label>
                                                        <label> <input type="checkbox" id="eliminarIB" data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                                                        <label> <input type="checkbox" id="estadoIB" data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                                                    </div>
                                                </div>
                                            </div>       
                                        </div>
                                        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                            <div class="form-group">
                                                <p><label><input type="checkbox" class="Tlogo" id="Tlogo" data-checkbox="icheckbox_minimal-red"><strong>LOGO</strong></p>
                                                <div class="input-group">
                                                    <div class="icheck-list">
                                                        <label><input type="checkbox" id="exportarIL" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                                        <label><input type="checkbox" id="crearIL" data-checkbox="icheckbox_flat-blue"> Crear</label>
                                                        <label><input type="checkbox" id="editarIL" data-checkbox="icheckbox_flat-blue"> Editar</label>
                                                        <label> <input type="checkbox" id="eliminarIL" data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                                                        <label> <input type="checkbox" id="estadoIL" data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                                                    </div>
                                                </div>
                                            </div>       
                                        </div>
                                    </div>
                                </div>
                            </accordion-group>
                            <accordion-group is-open="open4">
                                <accordion-heading>
                                    Módulo <strong>Eventos</strong><i class="pull-right glyphicon" ng-class="{'glyphicon-chevron-down': open4, 'glyphicon-chevron-right': !open4}"> </i>
                                </accordion-heading>
                                <div class="panel-body">
                                    <div class="row"> 
                                        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                            <div class="form-group">
                                                <p><label><input type="checkbox" class="Tventa" id="Tventa" data-checkbox="icheckbox_minimal-red"><strong>VENTA</strong></p>
                                                <div class="input-group">
                                                    <div class="icheck-list">
                                                        <label><input type="checkbox" id="exportarEV" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                                        <label><input type="checkbox" id="crearEV" data-checkbox="icheckbox_flat-blue"> Crear</label>
                                                        <label><input type="checkbox" id="editarEV" data-checkbox="icheckbox_flat-blue"> Editar</label>
                                                        <label class="esconderEV hide"><input type="checkbox" id="informacionEV" data-checkbox="icheckbox_minimal-blue"> Información</label>
                                                        <label class="esconderEV hide"><input type="checkbox" id="descripcionEV" data-checkbox="icheckbox_minimal-blue"> Descripción</label>
                                                        <label class="esconderEV hide"><input type="checkbox" id="multimediaEV" data-checkbox="icheckbox_minimal-blue"> Multimedia</label>
                                                        <label class="esconderEV hide"><input type="checkbox" id="funcionesEV" data-checkbox="icheckbox_minimal-blue"> Funciones</label>
                                                        <label class="esconderEV hide"><input type="checkbox" id="preciosEV" data-checkbox="icheckbox_minimal-blue"> Precios</label>
                                                        <label> <input type="checkbox" id="eliminarEV" data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                                                        <label> <input type="checkbox" id="estadoEV" data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                                                    </div>
                                                </div>
                                            </div>       
                                        </div>
                                        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                            <div class="form-group">
                                                <p><label><input type="checkbox" class="Tgratuito" id="Tgratuito" data-checkbox="icheckbox_minimal-red"><strong>GRATUITO</strong></p>
                                                <div class="input-group">
                                                    <div class="icheck-list">
                                                        <label><input type="checkbox" id="exportarEG" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                                        <label><input type="checkbox" id="crearEG" data-checkbox="icheckbox_flat-blue"> Crear</label>
                                                        <label><input type="checkbox" id="editarEG" data-checkbox="icheckbox_flat-blue"> Editar</label>
                                                        <label class="esconderEG hide"><input type="checkbox" id="informacionEG" data-checkbox="icheckbox_minimal-blue"> Información</label>
                                                        <label class="esconderEG hide"><input type="checkbox" id="descripcionEG" data-checkbox="icheckbox_minimal-blue"> Descripción</label>
                                                        <label class="esconderEG hide"><input type="checkbox" id="multimediaEG" data-checkbox="icheckbox_minimal-blue"> Multimedia</label>
                                                        <label class="esconderEG hide"><input type="checkbox" id="funcionesEG" data-checkbox="icheckbox_minimal-blue"> Funciones</label>
                                                        <label> <input type="checkbox" id="eliminarEG" data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                                                        <label> <input type="checkbox" id="estadoEG" data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                                                    </div>
                                                </div>
                                            </div>       
                                        </div>
                                        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                            <div class="form-group">
                                                <p><label><input type="checkbox" class="Tinformativo" id="Tinformativo" data-checkbox="icheckbox_minimal-red"><strong>INFORMATIVO</strong></p>
                                                <div class="input-group">
                                                    <div class="icheck-list">
                                                        <label><input type="checkbox" id="exportarEI" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                                        <label><input type="checkbox" id="crearEI" data-checkbox="icheckbox_flat-blue"> Crear</label>
                                                        <label><input type="checkbox" id="editarEI" data-checkbox="icheckbox_flat-blue"> Editar</label>
                                                        <label class="esconderEI hide"><input type="checkbox" id="informacionEI" data-checkbox="icheckbox_minimal-blue"> Información</label>
                                                        <label class="esconderEI hide"><input type="checkbox" id="descripcionEI" data-checkbox="icheckbox_minimal-blue"> Descripción</label>
                                                        <label class="esconderEI hide"><input type="checkbox" id="multimediaEI" data-checkbox="icheckbox_minimal-blue"> Multimedia</label>
                                                        <label> <input type="checkbox" id="eliminarEI" data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                                                        <label> <input type="checkbox" id="estadoEI" data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                                                    </div>
                                                </div>
                                            </div>       
                                        </div>
                                        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                            <div class="form-group">
                                                <p><label><input type="checkbox" class="Tbloqueos" id="Tbloqueos" data-checkbox="icheckbox_minimal-red"><strong>BLOQUEADOS</strong></p>
                                                <div class="input-group">
                                                    <div class="icheck-list">
                                                        <label><input type="checkbox" id="exportarEB" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                                        <label> <input type="checkbox" id="estadoEB" data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                                                    </div>
                                                </div>
                                            </div>       
                                        </div>
                                    </div>
                                </div>
                            </accordion-group>
                            <accordion-group is-open="open5">
                                <accordion-heading>
                                    Módulo <strong>Procesos</strong><i class="pull-right glyphicon" ng-class="{'glyphicon-chevron-down': open5, 'glyphicon-chevron-right': !open5}"> </i>
                                </accordion-heading>
                                <div class="panel-body">
                                    <div class="row">  
                                        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                            <div class="form-group">
                                                <p><label><input type="checkbox" class="TditribucionSala" id="TditribucionSala" data-checkbox="icheckbox_minimal-red"><strong>DISTRIBUCIÓN SALA</strong></p>
                                                <div class="input-group">
                                                    <div class="icheck-list">
                                                        <label><input type="checkbox" id="bloquearPS" data-checkbox="icheckbox_flat-blue"> Bloquear/Desbloquear</label>
                                                        <label><input type="checkbox" id="cortesiaPS" data-checkbox="icheckbox_flat-blue"> Cortesia</label>
                                                    </div>
                                                </div>
                                            </div>       
                                        </div>
                                        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                            <div class="form-group">
                                                <p><label><input type="checkbox" class="TeliminarCortesia" id="TeliminarCortesia" data-checkbox="icheckbox_minimal-red"><strong>ELIMINAR CORTESIA</strong></p>
                                                <div class="input-group">
                                                    <div class="icheck-list">
                                                        <label><input type="checkbox" id="exportarCT" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                                        <label> <input type="checkbox" id="eliminarCT" data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                                                    </div>
                                                </div>
                                            </div>       
                                        </div>
                                        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                            <div class="form-group">
                                                <p><label><input type="checkbox" class="TprocesosPromocion" id="TprocesosPromocion" data-checkbox="icheckbox_minimal-red"><strong>PROMOCIÓN</strong></p>
                                                <div class="input-group">
                                                    <div class="icheck-list">
                                                        <label><input type="checkbox" id="exportarPP" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                                        <label><input type="checkbox" id="crearPP" data-checkbox="icheckbox_flat-blue"> Crear</label>
                                                        <label><input type="checkbox" id="editarPP" data-checkbox="icheckbox_flat-blue"> Editar</label>
                                                        <label> <input type="checkbox" id="eliminarPP" data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                                                        <label> <input type="checkbox" id="estadoPP" data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                                                    </div>
                                                </div>
                                            </div>       
                                        </div>
                                        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                            <div class="form-group">
                                                <p><label><input type="checkbox" class="TprocesosPromocionG" id="TprocesosPromocionG" data-checkbox="icheckbox_minimal-red"><strong>PROMOCION GENERAL</strong></p>
                                                <div class="input-group">
                                                    <div class="icheck-list">
                                                        <label><input type="checkbox" id="exportarPPG" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                                        <label><input type="checkbox" id="crearPPG" data-checkbox="icheckbox_flat-blue"> Crear</label>
                                                        <label><input type="checkbox" id="editarPPG" data-checkbox="icheckbox_flat-blue"> Editar</label>
                                                        <label> <input type="checkbox" id="eliminarPPG" data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                                                        <label> <input type="checkbox" id="estadoPPG" data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                                                    </div>
                                                </div>
                                            </div>       
                                        </div>
                                    </div>      
                                </div>
                            </accordion-group>
                        </accordion>
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