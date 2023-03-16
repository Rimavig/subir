<?php
include ("../../../conect.php");
include ("../../../conect_dashboard.php");
include ("../../../autenticacion.php");
include ("../../../directorio.php");

$re = $client->getPerfilRol($_SESSION["id"],"73");
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
$imagen="";
$re = $client2->getGeneral("usuariosG");
$resultado= "".$re;
$usuarios =explode(';;',$resultado);
$re = $client->getAllEvento("activosV");
$resultado= "".$re;
$eventosV =explode(';;',$resultado);
$re = $client->getAllEvento("activos");
$resultado= "".$re;
$eventos =explode(';;',$resultado);
?>

<div>
    <div class="row">
        <div class="col-lg-12 portlets">
            <div class="panel">
                <div class="panel-header panel-controls">
                    <h3><i class="fa fa-table"></i> <strong>Notificaciones</strong> </h3>
                </div>
                <input type="text"  id="idCorreo" class="esconder"  value="4" disabled> 
                <input type="text"  id="imagenP" class="esconder"  value="<?php echo $imagen; ?>" disabled> 
                <div class="panel-content pagination2 ">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Tipo Notificaciòn</label>
                            <select name ="tipo" class="form-control" style="width:100%;" id="tipo">
                                <option value="general" >General</option>
                                <option value="promocion" >Promociòn</option>
                                <option value="evento" >Evento</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Destinatarios</label>
                            <select name ="destinatario" class="form-control" style="width:100%;" id="destinatario">
                                <option value="general" >Todos</option>
                                <option value="amigos" >Amigos del Teatro</option>
                                <option value="personal" >Personal</option>
                                <option value="evento" >Evento</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 fecha esconder">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Fecha</label>
                            <input type="text" name="datetimepicker" id="fecha" class="form-control input-sm datepicker" placeholder="Ingrese una fecha" value ="<?php echo date("d/m/Y H:i:s"); ?>" required>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Programada</label>
                            <div class="form-group ">
                                <label class="switch switch-green">
                                    <input  type="checkbox" class="switch-input"  id="box">
                                    <span class="switch-label" data-on="On" data-off="Off"></span>
                                    <span class="switch-handle"></span>
                                    <span id="estado" class="esconder">ON</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-md-3 evento esconder">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Evento</label>
                            <select name ="evento" class="form-control" style="width:100%;" id="evento">
                                <?php
                                    foreach($eventos as $llave => $valores) {
                                        $usuario =explode(',,,',$valores);
                                        if (isset($usuario[1])) {
                                            ?>
                                            <option value="<?php echo $usuario[0];?>"><?php echo $usuario[1];?></option>
                                            <?php 
                                        } 
                                    }   
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 eventoV esconder">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Evento Vendido</label>
                            <select name ="eventoV" class="form-control" style="width:100%;" id="eventoV">
                                <?php
                                    foreach($eventosV as $llave => $valores) {
                                        $usuario =explode(',,,',$valores);
                                        if (isset($usuario[1])) {
                                            ?>
                                            <option value="<?php echo $usuario[0];?>"><?php echo $usuario[1];?></option>
                                            <?php 
                                        } 
                                    }   
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 promocion esconder">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Promociòn</label>
                            <select name ="promocion" class="form-control" style="width:100%;" id="promocion">
                                <option value="T" >Todos</option>
                                <option value="A" >Amigos del Teatro</option>
                                <option value="P" >Personal</option>
                                
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row clientes esconder">
                    <div class="col-md-5">
                        <div>
                            <div>
                                <input type="text" class="principal-fila" style="width:100%;" id="txtRight" value="CLIENTES CON TOKEN" />
                            </div>
                            <select class="principal-select" style="width:100%;" id="clientesT" size="10">
                                <?php
                                    foreach($usuarios as $llave => $valores) {
                                        $usuario =explode(',,,',$valores);
                                        if (isset($usuario[1]) && $usuario[0] !=1 ) {
                                            ?>
                                            <option value="<?php echo $usuario[0];?>"><?php echo $usuario[1];?></option>
                                            <?php 
                                        } 
                                    }   
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2 text-center">
                        <a class="agregar btn btn-sm btn-dark" href="javascript:;"><i class="glyphicon glyphicon-plus"></i></a>
                        <a class="eliminar btn btn-sm btn-danger" href="javascript:;"><i class="icon-trash"></i></a>
                    </div>
                    
                    <div class="col-md-5">
                        <div>
                            <div>
                                <input type="text" class="principal-fila" style="width:100%;" id="txtRight" value="CLIENTES SELECCIONADOS" />
                            </div>
                            <select class="principal-select valA" id="clientesS" style="width:100%;" size="20">
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">   
                        <div class="col-md-6">
                            <label for="field-1" class="control-label">Tìtulo</label>
                            <div class="form-group">
                                <textarea class="form-control" rows="3" id="titulo" data-sample-short></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="field-1" class="control-label">Descripción</label>
                            <div class="form-group">
                                <textarea class="form-control" rows="3" id="descripcion" data-sample-short></textarea>
                            </div>
                        </div>
                </div> 
                    <div class="modal-footer text-center">
                        <button type="submit" class="btn btn-embossed btn-danger enviar <?php echo $crear; ?>" title="Enviar Notificaciòn" ><i class="fa fa-save"></i> Enviar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 portlets">
            <div class="panel">
                <div class="panel-header panel-controls">
                    <h3><i class="fa fa-table"></i> Tabla de Notificaciones</strong> </h3>
                </div>
                <div class="panel-content pagination2 table-responsive">
                    <table class="table filter-footer notificacion_data <?php echo $exportar; ?>  table-dynamic  notificacion " data-table-name="Tabla de Notificaciones" id="table-editable" style="table-layout: fixed;">
                        <thead>
                            <tr>
                                <th>Id Notificaciòn</th>
                                <th>Tipo</th>
                                <th>Destinatarios</th>
                                <th>Evento </th>
                                <th>Evento Vendido</th>
                                <th>Título</th>
                                <th>Descripción</th>
                                <th>Fecha</th>
                                <th>Estado</th>
                                <th class="text-right">Editar</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id Notificaciòn</th>
                                <th>Tipo</th>
                                <th>Destinatarios</th>
                                <th>Evento </th>
                                <th>Evento Vendido</th>
                                <th>Título</th>
                                <th>Descripción</th>
                                <th>Fecha</th>
                                <th>Estado</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="alerta" id="alerta" >
    </div>
    <div class="modal fade verSala" id="verSala" aria-hidden="true">    
    </div>
    <div class="footer">
        <p class="copyright">
                <span>Copyright © 2022 </span><span> Teatro Sanchez Aguilar </span><span>- Powered by Vion IoT Solutions. All rights reserved.</span>
            </p>
    </div>
</div>
<?php
$transport->close();
$transport2->close();
?>