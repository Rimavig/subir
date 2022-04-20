<?php
include ("../../conect.php");
include ("../../autenticacion.php");
$re = $client->getAllUsuario();
$resultado= "".$re;
$usuarios =explode(';',$resultado);

?>

<div>
    <div class="row">
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
                        <div class="row" >
                            <div class="col-md-12">
                                <h3 class="permisos"><i class="fa-li fa fa-spinner fa-plus-square-o"></i> Módulo <strong>Permisos</strong> </h3>
                            </div>  
                            <div class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                <div class="form-group">
                                    <p><strong>PERFILES</strong></p>
                                    <div class="input-group">
                                        <div class="icheck-list">
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Crear</label>
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Editar</label>
                                            <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                                            <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                                        </div>
                                    </div>
                                </div>       
                            </div>
                            <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                <div class="form-group">
                                    <p><strong>USUARIOS ADMINISTRADORES</strong></p>
                                    <div class="input-group">
                                        <div class="icheck-list">
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Crear</label>
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Editar</label>
                                            <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                                            <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Resetear Clave</label>
                                            <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                                        </div>
                                    </div>
                                </div>       
                            </div>
                            <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                <div class="form-group">
                                    <p><strong>USUARIOS CLIENTES</strong></p>
                                    <div class="input-group">
                                        <div class="icheck-list">
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Crear</label>
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Editar</label>
                                            <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                                            <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Resetear Clave</label>
                                            <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                                        </div>
                                    </div>
                                </div>       
                            </div>
                            <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                <div class="form-group">
                                    <p><strong>USUARIOS EVENTOS</strong></p>
                                    <div class="input-group">
                                        <div class="icheck-list">
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Crear</label>
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Editar</label>
                                            <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                                            <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Resetear Clave</label>
                                            <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                                        </div>
                                    </div>
                                </div>       
                            </div>
                        </div>
                        <div class="row">  
                            <div class="col-md-12">
                                <h3 class="permisos"><i class="fa-li fa fa-spinner fa-plus-square-o"></i> Módulo <strong>Permisos</strong> </h3>
                            </div> 
                            <div class="col-md-2 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                <div class="form-group">
                                    <p><strong>CATEGORIA</strong></p>
                                    <div class="input-group">
                                        <div class="icheck-list">
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Crear</label>
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Editar</label>
                                            <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                                            <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                                        </div>
                                    </div>
                                </div>       
                            </div>
                            <div class="col-md-2 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                <div class="form-group">
                                    <p><strong>CLASIFICACIÓN</strong></p>
                                    <div class="input-group">
                                        <div class="icheck-list">
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Crear</label>
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Editar</label>
                                            <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                                            <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                                        </div>
                                    </div>
                                </div>       
                            </div>
                            <div class="col-md-2 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                <div class="form-group">
                                    <p><strong>TIPO DE ESPECTACULO</strong></p>
                                    <div class="input-group">
                                        <div class="icheck-list">
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Crear</label>
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Editar</label>
                                            <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                                            <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                                        </div>
                                    </div>
                                </div>       
                            </div>
                            <div class="col-md-2 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                <div class="form-group">
                                    <p><strong>PROCEDENCIA</strong></p>
                                    <div class="input-group">
                                        <div class="icheck-list">
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Crear</label>
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Editar</label>
                                            <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                                            <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                                        </div>
                                    </div>
                                </div>       
                            </div>
                            <div class="col-md-2 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                <div class="form-group">
                                    <p><strong>TIPO DE EVENTO</strong></p>
                                    <div class="input-group">
                                        <div class="icheck-list">
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Crear</label>
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Editar</label>
                                            <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                                            <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                                        </div>
                                    </div>
                                </div>       
                            </div>
                            <div class="col-md-2 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                <div class="form-group">
                                    <p><strong>PRODUCTORA</strong></p>
                                    <div class="input-group">
                                        <div class="icheck-list">
                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Crear</label>
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Editar</label>
                                            <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                                            <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                                        </div>
                                    </div>
                                </div>       
                            </div>
                            <div class="col-md-2 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                <div class="form-group">
                                    <p><strong>PROMOCIÓN</strong></p>
                                    <div class="input-group">
                                        <div class="icheck-list">
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Crear</label>
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Editar</label>
                                            <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                                            <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                                        </div>
                                    </div>
                                </div>       
                            </div>
                            <div class="col-md-2 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                <div class="form-group">
                                    <p><strong>DISTRIBUCION PRINCIPAL</strong></p>
                                    <div class="input-group">
                                        <div class="icheck-list">
                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Crear</label>
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Editar</label>
                                            <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                                            <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                                        </div>
                                    </div>
                                </div>       
                            </div>
                            <div class="col-md-2 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                <div class="form-group">
                                    <p><strong>DISTRIBUCION EXTERIOR</strong></p>
                                    <div class="input-group">
                                        <div class="icheck-list">
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Crear</label>
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Editar</label>
                                            <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                                            <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                                        </div>
                                    </div>
                                </div>       
                            </div>
                            <div class="col-md-2 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                <div class="form-group">
                                    <p><strong>SALA</strong></p>
                                    <div class="input-group">
                                        <div class="icheck-list">
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Editar</label>
                                            <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                                        </div>
                                    </div>
                                </div>       
                            </div>
                        </div>
                        <div class="row">  
                            <div class="col-md-12">
                                <h3 class="permisos"><i class="fa-li fa fa-spinner fa-plus-square-o"></i> Módulo <strong>Permisos</strong> </h3>
                            </div> 
                             <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                <div class="form-group">
                                    <p><strong>SALA</strong></p>
                                    <div class="input-group">
                                        <div class="icheck-list">
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Crear</label>
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Editar</label>
                                            <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                                            <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                                        </div>
                                    </div>
                                </div>       
                            </div>
                             <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                <div class="form-group">
                                    <p><strong>DISTRIBUCION</strong></p>
                                    <div class="input-group">
                                        <div class="icheck-list">
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Crear</label>
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Editar</label>
                                            <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                                            <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                                        </div>
                                    </div>
                                </div>       
                            </div>
                             <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                <div class="form-group">
                                    <p><strong>BANNER</strong></p>
                                    <div class="input-group">
                                        <div class="icheck-list">
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Crear</label>
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Editar</label>
                                            <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                                            <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                                        </div>
                                    </div>
                                </div>       
                            </div>
                             <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                <div class="form-group">
                                    <p><strong>LOGO</strong></p>
                                    <div class="input-group">
                                        <div class="icheck-list">
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Crear</label>
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Editar</label>
                                            <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                                            <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                                        </div>
                                    </div>
                                </div>       
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-md-12">
                                <h3 class="permisos"><i class="fa-li fa fa-spinner fa-plus-square-o"></i> Módulo <strong>Permisos</strong> </h3>
                            </div>  
                             <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                <div class="form-group">
                                    <p><strong>VENTA</strong></p>
                                    <div class="input-group">
                                        <div class="icheck-list">
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Crear</label>
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Editar</label>
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_minimal-blue"> Información</label>
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_minimal-blue"> Descripción</label>
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_minimal-blue"> Multimedia</label>
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_minimal-blue"> Funciones</label>
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_minimal-blue"> Precios</label>
                                            <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                                            <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                                        </div>
                                    </div>
                                </div>       
                            </div>
                             <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                <div class="form-group">
                                    <p><strong>GRATUITO</strong></p>
                                    <div class="input-group">
                                        <div class="icheck-list">
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Crear</label>
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Editar</label>
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_minimal-blue"> Información</label>
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_minimal-blue"> Descripción</label>
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_minimal-blue"> Multimedia</label>
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_minimal-blue"> Funciones</label>
                                            <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                                            <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                                        </div>
                                    </div>
                                </div>       
                            </div>
                             <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                <div class="form-group">
                                    <p><strong>INFORMATIVO</strong></p>
                                    <div class="input-group">
                                        <div class="icheck-list">
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Crear</label>
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Editar</label>
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_minimal-blue"> Información</label>
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_minimal-blue"> Descripción</label>
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_minimal-blue"> Multimedia</label>
                                            <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                                            <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                                        </div>
                                    </div>
                                </div>       
                            </div>
                             <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                <div class="form-group">
                                    <p><strong>BLOQUEADOS</strong></p>
                                    <div class="input-group">
                                        <div class="icheck-list">
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                            <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                                        </div>
                                    </div>
                                </div>       
                            </div>
                        </div>
                        <div class="row">  
                            <div class="col-md-12">
                                <h3 class="permisos"><i class="fa-li fa fa-spinner fa-plus-square-o"></i> Módulo <strong>Permisos</strong> </h3>
                            </div> 
                             <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                <div class="form-group">
                                    <p><strong>DISTRIBUCIÓN SALA</strong></p>
                                    <div class="input-group">
                                        <div class="icheck-list">
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Bloquear/Desbloquear</label>
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Cortesia</label>
                                        </div>
                                    </div>
                                </div>       
                            </div>
                             <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                <div class="form-group">
                                    <p><strong>ELIMINAR CORTESIA</strong></p>
                                    <div class="input-group">
                                        <div class="icheck-list">
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                            <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                                        </div>
                                    </div>
                                </div>       
                            </div>
                             <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                <div class="form-group">
                                    <p><strong>PROMOCION</strong></p>
                                    <div class="input-group">
                                        <div class="icheck-list">
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Crear</label>
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Editar</label>
                                            <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                                            <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                                        </div>
                                    </div>
                                </div>       
                            </div>
                             <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                <div class="form-group">
                                    <p><strong>PROMOCION GENERAL</strong></p>
                                    <div class="input-group">
                                        <div class="icheck-list">
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Crear</label>
                                            <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Editar</label>
                                            <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                                            <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                                        </div>
                                    </div>
                                </div>       
                            </div>
                        </div>
                        <accordion class="panel-group panel-accordion" close-others="true">
                            <accordion-group is-open="open">
                                <accordion-heading>
                                    Módulo <strong>Permisos</strong><i class="pull-right glyphicon" ng-class="{'glyphicon-chevron-down': open, 'glyphicon-chevron-right': !open}"> </i>
                                </accordion-heading>
                                <div class="panel-body">
                                    <div class="row" >
                                        <div class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                            <div class="form-group">
                                                <p><strong>PERFILES</strong></p>
                                                <div class="input-group">
                                                    <div class="icheck-list">
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Crear</label>
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Editar</label>
                                                        <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                                                        <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                                                    </div>
                                                </div>
                                            </div>       
                                        </div>
                                        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                            <div class="form-group">
                                                <p><strong>USUARIOS ADMINISTRADORES</strong></p>
                                                <div class="input-group">
                                                    <div class="icheck-list">
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Crear</label>
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Editar</label>
                                                        <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                                                        <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Resetear Clave</label>
                                                        <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                                                    </div>
                                                </div>
                                            </div>       
                                        </div>
                                        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                            <div class="form-group">
                                                <p><strong>USUARIOS CLIENTES</strong></p>
                                                <div class="input-group">
                                                    <div class="icheck-list">
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Crear</label>
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Editar</label>
                                                        <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                                                        <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Resetear Clave</label>
                                                        <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                                                    </div>
                                                </div>
                                            </div>       
                                        </div>
                                        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                            <div class="form-group">
                                                <p><strong>USUARIOS EVENTOS</strong></p>
                                                <div class="input-group">
                                                    <div class="icheck-list">
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Crear</label>
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Editar</label>
                                                        <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                                                        <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Resetear Clave</label>
                                                        <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                                                    </div>
                                                </div>
                                            </div>       
                                        </div>
                                    </div>
                                </div>
                            </accordion-group>
                            <accordion-group is-open="open2">
                                <accordion-heading>
                                    Módulo <strong>Permisos</strong><i class="pull-right glyphicon" ng-class="{'glyphicon-chevron-down': open2, 'glyphicon-chevron-right': !open2}"> </i>
                                </accordion-heading>
                                <div class="panel-body">
                                    <div class="row">  
                                        <div class="col-md-2 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                            <div class="form-group">
                                                <p><strong>CATEGORIA</strong></p>
                                                <div class="input-group">
                                                    <div class="icheck-list">
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Crear</label>
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Editar</label>
                                                        <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                                                        <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                                                    </div>
                                                </div>
                                            </div>       
                                        </div>
                                        <div class="col-md-2 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                            <div class="form-group">
                                                <p><strong>CLASIFICACIÓN</strong></p>
                                                <div class="input-group">
                                                    <div class="icheck-list">
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Crear</label>
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Editar</label>
                                                        <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                                                        <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                                                    </div>
                                                </div>
                                            </div>       
                                        </div>
                                        <div class="col-md-2 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                            <div class="form-group">
                                                <p><strong>TIPO DE ESPECTACULO</strong></p>
                                                <div class="input-group">
                                                    <div class="icheck-list">
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Crear</label>
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Editar</label>
                                                        <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                                                        <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                                                    </div>
                                                </div>
                                            </div>       
                                        </div>
                                        <div class="col-md-2 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                            <div class="form-group">
                                                <p><strong>PROCEDENCIA</strong></p>
                                                <div class="input-group">
                                                    <div class="icheck-list">
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Crear</label>
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Editar</label>
                                                        <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                                                        <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                                                    </div>
                                                </div>
                                            </div>       
                                        </div>
                                        <div class="col-md-2 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                            <div class="form-group">
                                                <p><strong>TIPO DE EVENTO</strong></p>
                                                <div class="input-group">
                                                    <div class="icheck-list">
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Crear</label>
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Editar</label>
                                                        <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                                                        <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                                                    </div>
                                                </div>
                                            </div>       
                                        </div>
                                        <div class="col-md-2 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                            <div class="form-group">
                                                <p><strong>PRODUCTORA</strong></p>
                                                <div class="input-group">
                                                    <div class="icheck-list">
                                                    <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Crear</label>
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Editar</label>
                                                        <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                                                        <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                                                    </div>
                                                </div>
                                            </div>       
                                        </div>
                                        <div class="col-md-2 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                            <div class="form-group">
                                                <p><strong>PROMOCIÓN</strong></p>
                                                <div class="input-group">
                                                    <div class="icheck-list">
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Crear</label>
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Editar</label>
                                                        <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                                                        <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                                                    </div>
                                                </div>
                                            </div>       
                                        </div>
                                        <div class="col-md-2 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                            <div class="form-group">
                                                <p><strong>DISTRIBUCION PRINCIPAL</strong></p>
                                                <div class="input-group">
                                                    <div class="icheck-list">
                                                    <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Crear</label>
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Editar</label>
                                                        <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                                                        <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                                                    </div>
                                                </div>
                                            </div>       
                                        </div>
                                        <div class="col-md-2 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                            <div class="form-group">
                                                <p><strong>DISTRIBUCION EXTERIOR</strong></p>
                                                <div class="input-group">
                                                    <div class="icheck-list">
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Crear</label>
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Editar</label>
                                                        <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                                                        <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                                                    </div>
                                                </div>
                                            </div>       
                                        </div>
                                        <div class="col-md-2 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                            <div class="form-group">
                                                <p><strong>SALA</strong></p>
                                                <div class="input-group">
                                                    <div class="icheck-list">
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Editar</label>
                                                        <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                                                    </div>
                                                </div>
                                            </div>       
                                        </div>
                                    </div>
                                </div>
                            </accordion-group>
                            <accordion-group is-open="open3">
                                <accordion-heading>
                                    Módulo <strong>Permisos</strong><i class="pull-right glyphicon" ng-class="{'glyphicon-chevron-down': open3, 'glyphicon-chevron-right': !open3}"> </i>
                                </accordion-heading>
                                <div class="panel-body">
                                    <div class="row">  
                                        <div class="col-md-12">
                                            <h3 class="permisos"><i class="fa-li fa fa-spinner fa-plus-square-o"></i> Módulo <strong>Permisos</strong> </h3>
                                        </div> 
                                        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                            <div class="form-group">
                                                <p><strong>SALA</strong></p>
                                                <div class="input-group">
                                                    <div class="icheck-list">
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Crear</label>
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Editar</label>
                                                        <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                                                        <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                                                    </div>
                                                </div>
                                            </div>       
                                        </div>
                                        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                            <div class="form-group">
                                                <p><strong>DISTRIBUCION</strong></p>
                                                <div class="input-group">
                                                    <div class="icheck-list">
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Crear</label>
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Editar</label>
                                                        <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                                                        <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                                                    </div>
                                                </div>
                                            </div>       
                                        </div>
                                        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                            <div class="form-group">
                                                <p><strong>BANNER</strong></p>
                                                <div class="input-group">
                                                    <div class="icheck-list">
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Crear</label>
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Editar</label>
                                                        <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                                                        <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                                                    </div>
                                                </div>
                                            </div>       
                                        </div>
                                        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                            <div class="form-group">
                                                <p><strong>LOGO</strong></p>
                                                <div class="input-group">
                                                    <div class="icheck-list">
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Crear</label>
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Editar</label>
                                                        <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                                                        <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                                                    </div>
                                                </div>
                                            </div>       
                                        </div>
                                    </div>
                                </div>
                            </accordion-group>
                            <accordion-group is-open="open4">
                                <accordion-heading>
                                    Módulo <strong>Permisos</strong><i class="pull-right glyphicon" ng-class="{'glyphicon-chevron-down': open4, 'glyphicon-chevron-right': !open4}"> </i>
                                </accordion-heading>
                                <div class="panel-body">
                                    <div class="row"> 
                                        <div class="col-md-12">
                                            <h3 class="permisos"><i class="fa-li fa fa-spinner fa-plus-square-o"></i> Módulo <strong>Permisos</strong> </h3>
                                        </div>  
                                        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                            <div class="form-group">
                                                <p><strong>VENTA</strong></p>
                                                <div class="input-group">
                                                    <div class="icheck-list">
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Crear</label>
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Editar</label>
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_minimal-blue"> Información</label>
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_minimal-blue"> Descripción</label>
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_minimal-blue"> Multimedia</label>
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_minimal-blue"> Funciones</label>
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_minimal-blue"> Precios</label>
                                                        <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                                                        <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                                                    </div>
                                                </div>
                                            </div>       
                                        </div>
                                        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                            <div class="form-group">
                                                <p><strong>GRATUITO</strong></p>
                                                <div class="input-group">
                                                    <div class="icheck-list">
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Crear</label>
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Editar</label>
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_minimal-blue"> Información</label>
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_minimal-blue"> Descripción</label>
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_minimal-blue"> Multimedia</label>
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_minimal-blue"> Funciones</label>
                                                        <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                                                        <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                                                    </div>
                                                </div>
                                            </div>       
                                        </div>
                                        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                            <div class="form-group">
                                                <p><strong>INFORMATIVO</strong></p>
                                                <div class="input-group">
                                                    <div class="icheck-list">
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Crear</label>
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Editar</label>
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_minimal-blue"> Información</label>
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_minimal-blue"> Descripción</label>
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_minimal-blue"> Multimedia</label>
                                                        <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                                                        <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                                                    </div>
                                                </div>
                                            </div>       
                                        </div>
                                        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                            <div class="form-group">
                                                <p><strong>BLOQUEADOS</strong></p>
                                                <div class="input-group">
                                                    <div class="icheck-list">
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                                        <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                                                    </div>
                                                </div>
                                            </div>       
                                        </div>
                                    </div>
                                </div>
                            </accordion-group>
                            <accordion-group is-open="open5">
                                <accordion-heading>
                                    Módulo <strong>Permisos</strong><i class="pull-right glyphicon" ng-class="{'glyphicon-chevron-down': open5, 'glyphicon-chevron-right': !open5}"> </i>
                                </accordion-heading>
                                <div class="panel-body">
                                    <div class="row">  
                                        <div class="col-md-12">
                                            <h3 class="permisos"><i class="fa-li fa fa-spinner fa-plus-square-o"></i> Módulo <strong>Permisos</strong> </h3>
                                        </div> 
                                        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                            <div class="form-group">
                                                <p><strong>DISTRIBUCIÓN SALA</strong></p>
                                                <div class="input-group">
                                                    <div class="icheck-list">
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Bloquear/Desbloquear</label>
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Cortesia</label>
                                                    </div>
                                                </div>
                                            </div>       
                                        </div>
                                        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                            <div class="form-group">
                                                <p><strong>ELIMINAR CORTESIA</strong></p>
                                                <div class="input-group">
                                                    <div class="icheck-list">
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                                        <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                                                    </div>
                                                </div>
                                            </div>       
                                        </div>
                                        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                            <div class="form-group">
                                                <p><strong>PROMOCION</strong></p>
                                                <div class="input-group">
                                                    <div class="icheck-list">
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Crear</label>
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Editar</label>
                                                        <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                                                        <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                                                    </div>
                                                </div>
                                            </div>       
                                        </div>
                                        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
                                            <div class="form-group">
                                                <p><strong>PROMOCION GENERAL</strong></p>
                                                <div class="input-group">
                                                    <div class="icheck-list">
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Exportar</label>
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Crear</label>
                                                        <label><input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Editar</label>
                                                        <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                                                        <label> <input type="checkbox" id="crear" data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
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