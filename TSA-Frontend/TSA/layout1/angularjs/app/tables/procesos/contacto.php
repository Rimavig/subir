
<?php
include ("../../conect.php");
include ("../../autenticacion.php");
include ("../../directorio.php");

$re = $client->getContacto();
$resultado= "".$re;
$texto =explode(';',$resultado);
foreach($texto as $llave => $valores) {
    $datos =explode(',,,',$valores);
    if (isset($datos[1])) {
        $nombre=$datos[0];
        $celular=$datos[1];
        $telefono=$datos[2];
        $direccion=$datos[3];
        $correo=$datos[4];
        $pagina=$datos[5];
        $facebook=$datos[6];
        $instagram=$datos[7];
        $twitter=$datos[8];
    }
} 
?>
<div>
    <div class="row " >
        <div class="col-lg-12 portlets">
            <div class="panel">
                <div class="panel-header panel-controls">
                    <h3><i class="fa fa-table"></i> Contacto</strong> </h3>
                </div>
                <div class="panel-content pagination2 table-responsive">
                    <div class="row">  
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="field-1" class="control-label"> Nombres </label>
                                <div class="form-group prepend-icon">
                                    <input type="text" name="nombres" id="nombres" value="<?php echo $nombre; ?>" class="form-control" placeholder="Teatro Sanchez Aguilar" minlength="4" required>
                                    <i class="icon-user"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Celular</label>
                                <div class="form-group prepend-icon">
                                    <input type="text" name="celular" class="form-control"  id="celular"  value="<?php echo $telefono; ?>" placeholder="0989679545" minlength="10" equired>
                                    <i class="icon-screen-smartphone"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Telefono</label>
                                <div class="form-group prepend-icon">
                                    <input type="text" name="telefono" class="form-control" id="telefono" value="<?php echo $telefono; ?>"  placeholder="+(593)4 209-7447" minlength="10" required>
                                    <i class="fa fa-phone"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Correo</label>
                                <div class="form-group prepend-icon">
                                    <input type="email" name="correo" class="form-control" id="correo"  value="<?php echo $correo; ?>"    placeholder="consultas@teatrosanchezaguilar.org" minlength="3" required>
                                    <i class="icon-envelope"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Página Web</label>
                                <div class="form-group prepend-icon">
                                    <input type="text" name="pagina" class="form-control" id="pagina"  value="<?php echo $pagina; ?>"   placeholder="www.teatrosanchezaguilar.org" minlength="3"  required>
                                    <i class="fa fa-link"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Facebook</label>
                                <div class="form-group prepend-icon">
                                    <input type="text" name="facebook" class="form-control" id="facebook" value="<?php echo $facebook; ?>"    placeholder="https://www.facebook.com/" minlength="3"  required>
                                    <i class="fa fa-facebook-square"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Instagram</label>
                                <div class="form-group prepend-icon">
                                    <input type="text" name="instagram" class="form-control"  id="instagram" value="<?php echo $instagram; ?>"    placeholder="https://www.instagram.com/?hl=es" minlength="3" required>
                                    <i class=" fa fa-instagram"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Twitter</label>
                                <div class="form-group prepend-icon">
                                    <input type="text" name="twitter" class="form-control" id="twitter" value="<?php echo $twitter; ?>"   placeholder="https://twitter.com/?lang=es" minlength="3"  required>
                                    <i class="fa fa-twitter"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Dirección</label>
                                <div class="form-group prepend-icon">
                                    <input type="text" name="direccion" id="direccion"  class="form-control" value="<?php echo $direccion; ?>"    placeholder="Samborondom" minlength="5"  required>
                                    <i class="icon-map"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="modal-footer text-center">
                    <button type="submit" class="btn btn-primary btn-embossed bnt-square editar_contacto" ><i class="fa fa-check"></i> Guardar</button>
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
