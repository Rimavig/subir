
<?php
include ("../../conect.php");
include ("../../autenticacion.php");
include ("../../directorio.php");

$re = $client->getFundacion();
$resultado= "".$re;
$texto =explode(';;',$resultado);
foreach($texto as $llave => $valores) {
    $datos =explode(',,,',$valores);
    if (isset($datos[1])) {
        $nombre=$datos[0];
        $descripcion1=$datos[1];
        $descripcion2=$datos[2];
        $precio1=$datos[3];
        $precio2=$datos[4];
        $precio3=$datos[5];
        $precio4=$datos[6];
        $precio5=$datos[7];
        $precio6=$datos[8];
    }
} 
?>
<div>
    <div class="row " >
        <div class="col-lg-12 portlets">
            <div class="panel">
                <div class="panel-header panel-controls">
                    <h3><i class="fa fa-table"></i> Fundación</strong> </h3>
                </div>
                <div class="panel-content pagination2 table-responsive">
                    <div class="row">  
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="field-1" class="control-label"> Nombre  </label>
                                <div class="form-group prepend-icon">
                                    <input type="text" name="nombres" id="nombres" value="<?php echo $nombre; ?>" class="form-control" placeholder="Teatro Sanchez Aguilar" minlength="4" required>
                                    <i class="icon-user"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Descripción 1</label>
                                <div class="form-group prepend-icon">
                                    <input type="text" name="descripcion1" class="form-control"  id="descripcion1"  value="<?php echo $descripcion1; ?>" placeholder="¿Quieres donar?" minlength="10" equired>
                                    <i class="icon-screen-smartphone"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Descripción 2</label>
                                <div class="form-group prepend-icon">
                                    <input type="text" name="descripcion2" class="form-control" id="descripcion2" value="<?php echo $descripcion2; ?>"  placeholder="Ayuda a impulsar el desarrollo de la sociedad a través de la educación, acceso al arte y la cultura." minlength="10" required>
                                    <i class="fa fa-phone"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">  
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Precio 1</label>
                                <div class="form-group prepend-icon">
                                    <input type="number" name="precio1" class="form-control" id="precio1"  value="<?php echo $precio1; ?>"   placeholder="1" minlength="3"  required>
                                    <i class="fa fa-dollar"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Precio 2</label>
                                <div class="form-group prepend-icon">
                                    <input type="number" name="precio2" class="form-control" id="precio2"  value="<?php echo $precio2; ?>"   placeholder="1" minlength="3"  required>
                                    <i class="fa fa-dollar"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Precio 3</label>
                                <div class="form-group prepend-icon">
                                    <input type="number" name="precio3" class="form-control" id="precio3"  value="<?php echo $precio3; ?>"   placeholder="1" minlength="3"  required>
                                    <i class="fa fa-dollar"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Precio 4</label>
                                <div class="form-group prepend-icon">
                                    <input type="number" name="precio4" class="form-control" id="precio4"  value="<?php echo $precio4; ?>"   placeholder="1" minlength="3"  required>
                                    <i class="fa fa-dollar"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Precio 5</label>
                                <div class="form-group prepend-icon">
                                    <input type="number" name="precio5" class="form-control" id="precio5"  value="<?php echo $precio5; ?>"   placeholder="1" minlength="3"  required>
                                    <i class="fa fa-dollar"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Precio 6</label>
                                <div class="form-group prepend-icon">
                                    <input type="number" name="precio6" class="form-control" id="precio6"  value="<?php echo $precio6; ?>"   placeholder="1" minlength="3"  required>
                                    <i class="fa fa-dollar"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="modal-footer text-center">
                    <button type="submit" class="btn btn-primary btn-embossed bnt-square editar_fundacion" ><i class="fa fa-check"></i> Guardar</button>
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
<?php
$transport->close();
?>