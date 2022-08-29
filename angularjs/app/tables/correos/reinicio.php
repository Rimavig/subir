<?php
include ("../../conect.php");
include ("../../conect_correo.php");
include ("../../autenticacion.php");
include ("../../directorio.php");
$re = $client1->getTemplate("1");
$resultado= "".$re;
$texto =explode(';;;',$resultado);
foreach($texto as $llave => $valores) {
    $datos =explode(',,,',$valores);
    if (isset($datos[1])) {
        $asunto=$datos[0];
        $descripcion1=$datos[1];
        $descripcion2=$datos[2];
        $imagen=$datos[3];
        $redes=$datos[4];
        $datos1 =explode(';',$redes);
        $telefono=$datos[5];
        $direccion=$datos[6];
        $pagina=$datos1[3];
        $facebook=$datos1[0];
        $twitter=$datos1[2];
        $instagram=$datos1[1];
    }
} 
?>

<div>
    <div class="row">
        <div class="col-lg-12 portlets">
            <div class="panel">
                <div class="panel-header panel-controls">
                    <h3><i class="fa fa-table"></i> Reinicio de  <strong>Contraseña</strong> </h3>
                </div>
                <input type="text"  id="idCorreo" class="esconder"  value="1" disabled> 
                <input type="text"  id="imagenP" class="esconder"  value="<?php echo $imagen; ?>" disabled> 
                <div class="panel-content pagination2 ">
                    <div class="row">   
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Asunto</label>
                                <input type="text" name="asunto" id="asunto" class="form-control" value="<?php echo $asunto; ?>" placeholder="Reinicio Contraseña" minlength="4" required>
                            </div>
                        </div>
                        <div class="col-md-12"> 
                            <div style="margin-top: 5px!important; margin-left: 35%!important; text-align:center; max-width: 300px;" class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail">
                                    <img id="imagenCorreo" data-src="" src='<?php  echo $imagenCorreo.$imagen.".png?nocache=".time(); ?>' class="img-responsive" alt="NO IMAGEN">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail imagenCorreo"></div>
                                <div  style="margin-top: 5px!important; text-align:center;">
                                    <span class="btn btn-default btn-file">
                                    <span class="fileinput-new">Editar Imagen</span>
                                    <span class="fileinput-exists">Cambiar</span>
                                        <input type="file" id="archivoC" accept="image/png" name="...">
                                    </span>
                                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Eliminar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">   
                        <div class="col-md-6">
                            <label for="field-1" class="control-label">Descripción 1</label>
                            <div class="form-group">
                                <textarea class="form-control" rows="2" id="cke-editor1" data-sample-short><?php echo $descripcion1; ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="field-1" class="control-label">Descripción 2</label>
                            <div class="form-group">
                                <textarea class="form-control" rows="2" id="cke-editor2" data-sample-short><?php echo $descripcion2; ?></textarea>
                            </div>
                        </div>
                    </div> 
                    <div class="row">  
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Telefono</label>
                                <div class="form-group prepend-icon">
                                    <input type="text" name="telefono" class="form-control" id="telefono" value="<?php echo $telefono; ?>"  placeholder="+(593)4 209-7447" minlength="10" required>
                                    <i class="fa fa-phone"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Dirección</label>
                                <div class="form-group prepend-icon">
                                    <input type="text" name="direccion" id="direccion"  class="form-control" value="<?php echo $direccion; ?>"    placeholder="Samborondom" minlength="5"  required>
                                    <i class="icon-map"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Página Web</label>
                                <div class="form-group prepend-icon">
                                    <input type="text" name="pagina" class="form-control" id="pagina"  value="<?php echo $pagina; ?>"   placeholder="www.teatrosanchezaguilar.org" minlength="3"  required>
                                    <i class="fa fa-link"></i>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="row">      
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Facebook</label>
                                <div class="form-group prepend-icon">
                                    <input type="text" name="facebook" class="form-control" id="facebook" value="<?php echo $facebook; ?>"    placeholder="https://www.facebook.com/" minlength="3"  required>
                                    <i class="fa fa-facebook-square"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Instagram</label>
                                <div class="form-group prepend-icon">
                                    <input type="text" name="instagram" class="form-control"  id="instagram" value="<?php echo $instagram; ?>"    placeholder="https://www.instagram.com/?hl=es" minlength="3" required>
                                    <i class=" fa fa-instagram"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Twitter</label>
                                <div class="form-group prepend-icon">
                                    <input type="text" name="twitter" class="form-control" id="twitter" value="<?php echo $twitter; ?>"   placeholder="https://twitter.com/?lang=es" minlength="3"  required>
                                    <i class="fa fa-twitter"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer text-center">
                        <button type="submit" class="btn btn-embossed btn-danger guardarCorreo <?php echo $editar; ?>" ><i class="fa fa-save"></i> Guardar</button>
                        <button type="submit" class="btn btn-embossed btn-default correoPrueba <?php echo $editar; ?>" ><i class="fa fa-mail-forward"></i> Correo De Prueba</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="alerta" id="alerta" >
    </div>
    <div class="modal fade verSala" id="verSala" aria-hidden="true">    
    </div>
    <div class="verSala1" id="verSala1" aria-hidden="true">    
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