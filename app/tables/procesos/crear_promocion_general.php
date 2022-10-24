<?php
include ("../../conect.php");
include ("../../autenticacion.php");

$re = $client->getAllNombrePromocion();
$resultado= "".$re;
$promociones =explode(';;',$resultado);
$re1 = $client->getAllBanco("T");
$resultado1= "".$re1;
$banco =explode(';;',$resultado1);
$re2 = $client->getAllTarjeta("T");
$resultado2= "".$re2;
$tarjeta =explode(';;',$resultado2);
?>
<div class="modal-dialog modal-lg">
    <div class="modal-content ">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
            <h4 class="modal-title">Crear Promoción</strong> </h4> 
        </div>
        <div class="modal-body">
            <form role="form" class=" form-validation">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Categoría de Promoción</label>
                            <select  class="form-control" style="width:100%;"  id="Ccategoria">
                                <?php
                                foreach($promociones as $llave => $valores1) {
                                    $datos1 =explode(',,,',$valores1);
                                    $valor="";
                                    if (isset($datos1[1])) {
                                ?>
                                <option value="<?php echo $datos1[0]; ?>"><?php echo $datos1[2]; ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Nombre Promoción</label>
                            <div class="form-group">
                                <input type="text" name="name" id="Cnombre" class="form-control" placeholder="" minlength="2" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Descripción</label>
                            <div class="form-group ">
                                <input type="text" name="name" id="Cdescripcion" class="form-control" placeholder="" minlength="2" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row"> 
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Fecha Inicio</label>
                            <div class="form-group prepend-icon">
                            <input type="date" name="fecha" id="CfechaI"  class="form-control" style="padding: 0px 30px;"   placeholder="07/08/1995" id="nacimiento" required>
                                <i class="icon-clock"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Fecha Término</label>
                            <div class="form-group prepend-icon">
                            <input type="date" name="fecha" id="CfechaT"  class="form-control" style="padding: 0px 30px;"   placeholder="07/08/1995" id="nacimiento" required>
                                <i class="icon-clock"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Amigos del Teatro</label>
                            <div class="form-group">
                                <label class="switch switch-green">
                                    <input type="checkbox" class="switch-input"  id="CboxA">
                                    <span class="switch-label" data-on="On" data-off="Off"></span>
                                    <span class="switch-handle"></span>
                                    <span id="estado" class="esconder">Off</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Cantidad Máxima/ Usuario</label>
                            <div class="form-group ">
                                <input class="form-control input-sm" id="Cmaxima" type="number" value="1" min="0" required>
                            </div>
                        </div>
                    </div>          
                </div>
                <div class="row esconder">
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
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Localidad</label>
                            <div class="input-group">
                                <div class="icheck-inline">
                                    <label>
                                        <input class="Ctodos localidad" id="Ctodos" type="checkbox"> Todos
                                    </label>
                                    <label>
                                        <input class="Cweb localidad" id="Cweb" type="checkbox"> Web
                                    </label>
                                    <label>
                                        <input class="Capp localidad" id="Capp" type="checkbox" > App
                            
                                    <label>
                                        <input class="Ctaquilla localidad"  id="Ctaquilla" type="checkbox"> Taquilla
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Tipo de Promoción</label>
                            <select class="form-control tipo" id="Ctipo" style="width:100%;" >
                                <option value="none">Seleccione Tipo</option>
                                <option value="boletos">Boletos</option>
                                <option value="Fpago">Factor de Compra/Pago</option>
                                <option value="FormaPago">Forma de Pago</option>
                                <option value="Cpromocional">Código Promocional</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row esconder" id="boletos">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Desde</label>
                            <div class="form-group ">
                                <input class="form-control input-sm" id="Cdesde" type="number" name="duracionE" placeholder="" min="0" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Hasta</label>
                            <div class="form-group ">
                                <input class="form-control input-sm" type="number" ng-model="message" id="Chasta"  name="duracionE" placeholder="" min="0" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Descuento (%)</label>
                            <div class="form-group ">
                                <input class="form-control input-sm" type="number" id="CFCdescuento"  name="duracionE" placeholder="" min="0" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row esconder" id="fpago">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Compra</label>
                            <div class="form-group">
                                <input class="form-control input-sm" type="number" id="Ccompra" name="duracionE" placeholder="" min="0" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Pago</label>
                            <div class="form-group">
                                <input class="form-control input-sm" type="number" id="Cpago"  name="duracionE" placeholder="" min="0" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row esconder" id="formaPago">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label"> Tarjeta</label>
                            <select class="form-control Ctarjeta" id="Ctarjeta" style="width:100%;">
                                <?php
                                foreach($tarjeta as $llave => $valores1) {
                                    $datos1 =explode(',,,',$valores1);
                                    $valor="";
                                    if (isset($datos1[1])) {
                                ?>
                                <option value="<?php echo $datos1[0]; ?>"><?php echo $datos1[1]; ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 esconder">
                        <div class="form-group">
                            <label for="field-1" class="control-label"> Banco</label>
                            <select  class="form-control Cbanco" style="width:100%;" id="Cbanco">
                                <?php
                                foreach($banco as $llave => $valores1) {
                                    $datos1 =explode(',,,',$valores1);
                                    $valor="";
                                    if (isset($datos1[1])) {
                                ?>
                                <option value="<?php echo $datos1[0]; ?>"><?php echo $datos1[1]; ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Descuento (%)</label>
                            <div class="form-group">
                                <input class="form-control input-sm"  id="CTBdescuento" type="number" name="duracionE" placeholder="" min="0" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row esconder" id="Cpromocional">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Código</label>
                            <div class="form-group">
                                <input type="text" name="name" id="Ccodigo" class="form-control" placeholder="Cine" minlength="2" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Descuento (%)</label>
                            <div class="form-group">
                                <input class="form-control input-sm" id="CCPdescuento" type="number" name="duracionE" placeholder="" min="0" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-center">
                    <button type="submit" class="btn btn-primary btn-embossed bnt-square crear_promocion_general" ><i class="fa fa-check"></i> Crear</button>
                    <button type="button" class="btn btn-embossed btn-default " data-dismiss="modal" aria-hidden="true">Cancelar</button>
                </div>
            </form>    
        </div>
    </div>
</div>
