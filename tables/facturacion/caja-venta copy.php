<?php
include ("../../conect.php");
include ("../../autenticacion.php");
include ("../../directorio.php");

$re = $client->getAllEvento("AV");
$resultado= "".$re;
$usuarios =explode(';;',$resultado);
?>
<div class="row">
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="field-4" class="control-label">Evento Nuevo</label>
            <select name ="eventoN" class="form-control" style="width:100%;" id="eventoN">
                <option value="0">Seleccione Evento</option>
                <?php
                foreach($usuarios as $llave => $valores) {
                    $usuario =explode(',,,',$valores);
                    if (isset($usuario[2])) {
                ?>
                <option value="<?php echo $usuario[0]; ?>"><?php echo $usuario[6].": ".$usuario[1]; ?></option>
                <?php
                }
                }
                ?> 
            </select>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="field-1" class="control-label">Funciones</label>
            <select class="form-control" style="width:100%;">
                <option value="United States">Masculino</option>
                <option value="United Kingdom">Femenino</option>
            
            </select>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="field-1" class="control-label">Localidad</label>
            <select class="form-control" style="width:100%;">
                <option value="United States">Masculino</option>
                <option value="United Kingdom">Femenino</option>
            
            </select>
        </div>
    </div>
    <div class="col-md-1">
        <div class="form-group">
            <label for="field-1" class="control-label">Disponible</label>
            <input class="form-control input-sm" type="number" name="duracionE" placeholder="" disabled>
        </div>
    </div>
    <div class="col-md-1">
        <div class="form-group">
            <label for="field-1" class="control-label">Cantidad</label>
            <input class="form-control input-sm" type="number" name="duracionE" placeholder="" required>
        </div>
    </div>
    <div class="col-md-1">
        <div class="form-group">
            <label for="field-1" class="control-label"></label>
            <a type="submit" class="abrir btn btn-primary btn-embossed bnt-square" href="#caja-venta" ><i class="fa fa-check"></i> Agregar</a>
        </div>
        
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="field-1" class="control-label">Promoción</label>
            <select class="form-control" style="width:100%;">
                <option value="United States">Masculino</option>
                <option value="United Kingdom">Femenino</option>
            
            </select>
        </div>
    </div>
    <div class="col-md-1">
        <div class="form-group">
            <label for="field-1" class="control-label"></label>
            <a type="submit" class="abrir btn btn-primary btn-embossed bnt-square" href="#caja-venta" ><i class="fa fa-check"></i> Agregar</a>
        </div>
    </div>
</div>
</div> 

<div class="col-lg-12 portlets">
    <div class="panel">
        <div class="panel-content pagination2 ">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="field-3" class="control-label">Total a Pagar</label>
                        <input type="text" name="nombreE" class="form-control" placeholder="Teatro Sanchez Aguilar" minlength="5" disabled>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="field-1" class="control-label">Total Pagado</label>
                        <input type="text" name="nombreE" class="form-control" placeholder="Teatro Sanchez Aguilar" minlength="5" disabled>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="field-1" class="control-label">Saldo</label>
                        <input type="text" name="nombreE" class="form-control" placeholder="Teatro Sanchez Aguilar" minlength="5" disabled>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="field-1" class="control-label">Cambio</label>
                        <input type="text" name="nombreE" class="form-control" placeholder="Teatro Sanchez Aguilar" minlength="5" disabled>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="field-1" class="control-label">Forma de Pago</label>
                        <select class="form-control" style="width:100%;">
                            <option value="United States">Efectivo</option>
                            <option value="United Kingdom">Tarjeta Credito/Debito</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="field-1" class="control-label">Tipo de Tarjeta</label>
                        <select class="form-control" style="width:100%;">
                            <option value="United States">Efectivo</option>
                            <option value="United Kingdom">Tarjeta Credito/Debito</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="field-1" class="control-label">Banco</label>
                        <select class="form-control" style="width:100%;">
                            <option value="United States">Efectivo</option>
                            <option value="United Kingdom">Tarjeta Credito/Debito</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="field-1" class="control-label">Lote</label>
                        <input type="text" name="nombreE" class="form-control" placeholder="Teatro Sanchez Aguilar" minlength="5" >
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="field-1" class="control-label">Monto</label>
                        <input class="form-control input-sm" type="number" name="duracionE" placeholder="" >
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-group">
                        <label for="field-1" class="control-label"></label>
                        <a type="submit" class="abrir btn btn-primary btn-embossed bnt-square" href="#caja-venta" ><i class="fa fa-check"></i> Agregar</a>
                    </div>
                </div>
            </div>
            <table class="table"  data-turbolinks = "false"  data-table-name="Usuarios" id="table-editableV" >
                <thead>
                    <tr>
                        <th>Forma de Pago</th>
                        <th>Banco</th>
                        <th>Tarjeta</th>
                        <th>Lote</th>
                        <th>Monto</th>
                        <th class="text-right">Editar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>Forma de Pago</th>
                        <th>Banco</th>
                        <th>Tarjeta</th>
                        <th>Lote</th>
                        <th>Monto</th>
                        <td class="text-right">
                            <a class="delete btn btn-sm btn-danger" href="javascript:;"><i class="icon-trash"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <th>Forma de Pago</th>
                        <th>Banco</th>
                        <th>Tarjeta</th>
                        <th>Lote</th>
                        <th>Monto</th>
                        <td class="text-right">
                            <a class="delete btn btn-sm btn-danger" href="javascript:;"><i class="icon-trash"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div> 
    </div>
    <div class="modal-footer text-center">
        <button type="submit" class="btn btn-red btn-embossed" ><i class="fa fa-check"></i> Grabar</button>
        <button type="reset" class="btn btn-embossed btn-default">Cancelar</button>
    </div>
</div>