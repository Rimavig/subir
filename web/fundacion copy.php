
<?php
include ("../../conect.php");
include ("../../autenticacion.php");
include ("../../directorio.php");

$re = $client->getInformacion();
$informacion= "".$re;

$re = $client->getAllBeneficios();
$resultado= "".$re;
$beneficios =explode(';;',$resultado);
$re = $client->getAllPreguntas();
$resultado= "".$re;
$preguntas =explode(';;',$resultado);
?>
<div>
    <div class="row " >
        <div class="col-lg-12 portlets">
            <div class="panel">
                <div class="panel-header panel-controls">
                    <h3><i class="fa fa-table"></i> El Teatro</strong> </h3>
                </div>
                <div class="panel-content pagination2 table-responsive">
                <tabset class="tab-fade-in" >
                        <tab>
                            <tab-heading>
                               Quiénes Somos
                            </tab-heading>
                            <div class="beneficio" id="beneficio">
                                <div class="row " >
                                    <div class="col-md-12"> 
                                        <div class="panel-header panel-controls">
                                            <div class="col-md-12">
                                                <textarea class="form-control" id="informacionT" rows="20"><?php echo $informacion; ?></textarea>
                                                <div class="modal-footer text-center">
                                                    <button type="submit" class="btn btn-embossed btn-danger editar_informacion" ><i class="fa fa-save"></i> Guardar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6"> 
                                        <div class="panel-header panel-controls">
                                            <div class="col-md-12"> 
                                                <div style="margin-top: 5px!important; text-align:center;" class="fileinput fileinput-new" data-provides="fileinput">
                                                    <p  style="margin-top: 5px!important; text-align:center;"><strong>Nuestra Misión (Imagen 482 x 288)</strong></p>

                                                    <div class="fileinput-new thumbnail">
                                                        <img id="imagenC" data-src="" src='<?php  echo $misionI; ?>' class="img-responsive" alt="NO IMAGEN">
                                                    </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail EimagenCA"></div>
                                                    <textarea class="form-control" id="informacionT" rows="18"><?php echo $informacion; ?></textarea>
                                                    <div  style="margin-top: 5px!important; text-align:center;" class="<?php echo $multimedia; ?>">
                                                    <button type="submit" class="btn btn-embossed btn-danger editar_informacion" ><i class="fa fa-save"></i> Guardar</button>
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
                                    </div>
                                    <div class="col-md-6"> 
                                        <div class="panel-header panel-controls">
                                            <div class="col-md-12"> 
                                                <div style="margin-top: 5px!important; text-align:center;" class="fileinput fileinput-new" data-provides="fileinput">
                                                    <p  style="margin-top: 5px!important; text-align:center;"><strong>Nuestra Visión (Imagen 482 x 288)</strong></p>

                                                    <div class="fileinput-new thumbnail">
                                                        <img id="imagenC" data-src="" src='<?php  echo $misionI; ?>' class="img-responsive" alt="NO IMAGEN">
                                                    </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail EimagenCA"></div>
                                                    <textarea class="form-control" id="informacionT" rows="18"><?php echo $informacion; ?></textarea>
                                                    <div  style="margin-top: 5px!important; text-align:center;" class="<?php echo $multimedia; ?>">
                                                    <button type="submit" class="btn btn-embossed btn-danger editar_informacion" ><i class="fa fa-save"></i> Guardar</button>
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
                                    </div>
                                    <div class="col-md-12"> 
                                        <div class="btn-group">
                                            <button class="crearPregunta btn btn-sm btn-dark "  href="javascript:;"><i class="fa fa-plus"></i> Líneas de acción</button>
                                        </div>
                                        <table class="table" data-table-name="Preguntas Frecuentes" id="table-editable4" >
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Imagen (324x160)</th>
                                                    <th>Orden </th>
                                                    <th>Título </th>
                                                    <th>Descripción </th>
                                                    <th class="text-right">Editar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                foreach($preguntas as $llave => $valores) {
                                                    $pregunt =explode(',,,',$valores);
                                                    if (isset($pregunt[1])) {
                                                ?>
                                                <tr>
                                                    <td id="idPregunta"> <?php if (isset($pregunt[0])) {echo $pregunt[0]; }  ?> </td>
                                                    <td> <img src="<?php echo $intalacionesI; ?>23.png" class="img-responsive" alt="gallery 3"></td>
                                                    <td id="idPregunta"> <?php if (isset($pregunt[0])) {echo $pregunt[0]; }  ?> </td>
                                                    <td> <?php if (isset($pregunt[2])) {echo $pregunt[2]; }  ?> </td>
                                                    <td> <?php if (isset($pregunt[2])) {echo $pregunt[2]; }  ?> </td>
                                                    <td class="text-right">
                                                        <a class="editarPregunta btn btn-sm btn-dark" style="margin: 5px;  "  href="javascript:;"><i class="icon-note"></i></a>
                                                        <a class="eliminarPregunta btn btn-sm btn-danger" style="margin: 5px;  "  href="javascript:;"><i class="icon-trash"></i></a>
                                                    </td>
                                                </tr>
                                                <?php
                                                }
                                                }
                                                ?> 
                                            
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </tab>
                        <tab>
                            <tab-heading>
                                Proyectos con el Teatro
                            </tab-heading>
                            <div class="preguntas" id="preguntas">
                                <div class="col-md-12"> 
                                    <div class="panel-header panel-controls">
                                        <div class="col-md-12">
                                            <textarea class="form-control" id="informacionT" rows="4"><?php echo $informacion; ?></textarea>
                                            <div class="modal-footer text-center">
                                                <button type="submit" class="btn btn-embossed btn-danger editar_informacion" ><i class="fa fa-save"></i> Guardar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="btn-group">
                                    <button class="crearPregunta btn btn-sm btn-dark "  href="javascript:;"><i class="fa fa-plus"></i> Evento</button>
                                </div>
                                <table class="table" data-table-name="Preguntas Frecuentes" id="table-editable4" >
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Imagen (324x160)</th>
                                            <th>Orden </th>
                                            <th>Título </th>
                                            <th class="text-right">Editar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        foreach($preguntas as $llave => $valores) {
                                            $pregunt =explode(',,,',$valores);
                                            if (isset($pregunt[1])) {
                                        ?>
                                        <tr>
                                            <td id="idPregunta"> <?php if (isset($pregunt[0])) {echo $pregunt[0]; }  ?> </td>
                                            <td> <img src="<?php echo $intalacionesI; ?>13.png" class="img-responsive" alt="gallery 3"></td>
                                            <td id="idPregunta"> <?php if (isset($pregunt[0])) {echo $pregunt[0]; }  ?> </td>
                                            <td> <?php if (isset($pregunt[2])) {echo $pregunt[2]; }  ?> </td>
                                            <td class="text-right">
                                                <a class="editarPregunta btn btn-sm btn-dark" style="margin: 5px;  "  href="javascript:;"><i class="icon-note"></i></a>
                                                <a class="eliminarPregunta btn btn-sm btn-danger" style="margin: 5px;  "  href="javascript:;"><i class="icon-trash"></i></a>
                                            </td>
                                        </tr>
                                        <?php
                                        }
                                        }
                                        ?> 
                                    
                                    </tbody>
                                </table>
                        
                            </div>
                        </tab>
                        <tab>
                            <tab-heading>
                               Eventos Realizados
                            </tab-heading>
                            <tabset class="tab-fade-in" >
                                <tab>
                                    <tab-heading>
                                    Eventos Realizados1
                                    </tab-heading>
                                    <div class="col-md-12"> 
                                        <div class="panel-header panel-controls">
                                            <div class="col-md-3"> 
                                                <div style="margin-top: 5px!important; text-align:center;" class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail">
                                                        <img id="imagenC" data-src="" src='<?php  echo $intalacionesI; ?>13.png' class="img-responsive" alt="NO IMAGEN">
                                                    </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail EimagenCA"></div>
                                                    <div  style="margin-top: 5px!important; text-align:center;" class="<?php echo $multimedia; ?>">
                                                        <span class="btn btn-default btn-file">
                                                        <span class="fileinput-new">Editar Imagen</span>
                                                        <span class="fileinput-exists">Cambiar</span>
                                                            <input type="file" id="archivoC" accept="image/png" name="...">
                                                        </span>
                                                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Eliminar</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="row " >
                                                    <div class="col-md-12">
                                                        <label for="field-1" class="control-label">Nombre</label>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                                    <input type="text" name="nombreE" class="form-control" id="video" value="" placeholder=" email@outlook.com " minlength="5" required> 
                                                                </div>
                                                                <div class="col-md-3 col-sm-3">
                                                                    <button type="submit" class="btn btn-embossed btn-danger editarMultimedia <?php echo $multimedia; ?>" ><i class="fa fa-save"></i> Guardar</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <textarea class="form-control" id="informacionT" rows="5"><?php echo $informacion; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tab>
                                <tab>
                                    <tab-heading>
                                    Eventos Realizados
                                    </tab-heading>
                                    <div class="col-md-12"> 
                                        <div class="btn-group">
                                            <button class="crearPregunta btn btn-sm btn-dark "  href="javascript:;"><i class="fa fa-plus"></i> Información Técnica</button>
                                        </div>
                                        <table class="table" data-table-name="Preguntas Frecuentes" id="table-editable4" >
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Nombre</th>
                                                    <th>Orden </th>
                                                    <th class="text-right">Editar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                foreach($preguntas as $llave => $valores) {
                                                    $pregunt =explode(',,,',$valores);
                                                    if (isset($pregunt[1])) {
                                                ?>
                                                <tr>
                                                    <td id="idPregunta"> <?php if (isset($pregunt[0])) {echo $pregunt[0]; }  ?> </td>
                                                    <td id="idPregunta"> <?php if (isset($pregunt[0])) {echo $pregunt[0]; }  ?> </td>
                                                    <td> <?php if (isset($pregunt[2])) {echo $pregunt[2]; }  ?> </td>
                                                    <td class="text-right">
                                                        <a class="editarPregunta btn btn-sm btn-dark" style="margin: 5px;  "  href="javascript:;"><i class="icon-note"></i></a>
                                                        <a class="eliminarPregunta btn btn-sm btn-danger" style="margin: 5px;  "  href="javascript:;"><i class="icon-trash"></i></a>
                                                    </td>
                                                </tr>
                                                <?php
                                                }
                                                }
                                                ?> 
                                            
                                            </tbody>
                                        </table>
                                    </div>
                                </tab>
                                <tab>
                                    <tab-heading>
                                    Eventos Realizados
                                    </tab-heading>
                                    <div class="col-md-12"> 
                                        <div class="btn-group">
                                            <button class="crearPregunta btn btn-sm btn-dark "  href="javascript:;"><i class="fa fa-plus"></i> Evento</button>
                                        </div>
                                        <table class="table" data-table-name="Preguntas Frecuentes" id="table-editable4" >
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Imagen (324x160)</th>
                                                    <th>Orden </th>
                                                    <th class="text-right">Editar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                foreach($preguntas as $llave => $valores) {
                                                    $pregunt =explode(',,,',$valores);
                                                    if (isset($pregunt[1])) {
                                                ?>
                                                <tr>
                                                    <td id="idPregunta"> <?php if (isset($pregunt[0])) {echo $pregunt[0]; }  ?> </td>
                                                    <td> <img src="<?php echo $galeriaI; ?>13.png" class="img-responsive" alt="gallery 3"></td>
                                                    <td id="idPregunta"> <?php if (isset($pregunt[0])) {echo $pregunt[0]; }  ?> </td>
                                                    <td class="text-right">
                                                        <a class="editarPregunta btn btn-sm btn-dark" style="margin: 5px;  "  href="javascript:;"><i class="icon-note"></i></a>
                                                        <a class="eliminarPregunta btn btn-sm btn-danger" style="margin: 5px;  "  href="javascript:;"><i class="icon-trash"></i></a>
                                                    </td>
                                                </tr>
                                                <?php
                                                }
                                                }
                                                ?> 
                                            
                                            </tbody>
                                        </table>
                                    </div>  
                                </tab>
                            </tabset>                
                        </tab>
                    </tabset>
                </div>
                
                
            </div>
        </div>
    
    </div>
    <div class="modal fade  Camigos" data-keyboard="false" data-backdrop="static" id="Camigos" aria-hidden="true">
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
