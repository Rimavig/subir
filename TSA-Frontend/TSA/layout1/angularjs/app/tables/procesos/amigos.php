
<?php
include ("../../conect.php");
include ("../../autenticacion.php");
include ("../../directorio.php");

$re = $client->getInformacion();
$informacion= "".$re;

$re = $client->getAllBeneficios();
$resultado= "".$re;
$beneficios =explode(';',$resultado);
$re = $client->getAllPreguntas();
$resultado= "".$re;
$preguntas =explode(';',$resultado);
?>
<div>
    <div class="row " >
        <div class="col-lg-12 portlets">
            <div class="panel">
                <div class="panel-header panel-controls">
                    <h3><i class="fa fa-table"></i> Amigos del Teatro</strong> </h3>
                </div>
                <div class="panel-content pagination2 table-responsive">
                <tabset class="tab-fade-in" >
                        <tab>
                            <tab-heading>
                               Beneficios
                            </tab-heading>
                            <div class="beneficio" id="beneficio">
                                <div class="btn-group">
                                    <button class="crearBeneficio btn btn-sm btn-dark "  href="javascript:;"><i class="fa fa-plus"></i> Beneficios</button>
                                </div>
                                <table class="table" data-table-name="Beneficios" id="table-editable3" >
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Beneficio</th>
                                            <th class="text-right">Editar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        foreach($beneficios as $llave => $valores) {
                                            $benefici =explode(',,,',$valores);
                                            if (isset($benefici[1])) {
                                        ?>
                                        <tr>
                                            <td id="idBeneficio"> <?php if (isset($benefici[0])) {echo $benefici[0]; }  ?> </td>
                                            <td> <?php if (isset($benefici[1])) {echo $benefici[1]; }  ?> </td>
                                            <td class="text-right">
                                                <a class="editarBeneficio btn btn-sm btn-dark" style="margin: 5px;  "  href="javascript:;"><i class="icon-note"></i></a>
                                                <a class="eliminarBeneficio btn btn-sm btn-danger" style="margin: 5px;  "  href="javascript:;"><i class="icon-trash"></i></a>
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
                                Preguntas Frecuentes
                            </tab-heading>
                            <div class="preguntas" id="preguntas">
                                <div class="btn-group">
                                    <button class="crearPregunta btn btn-sm btn-dark "  href="javascript:;"><i class="fa fa-plus"></i> Preguntas Frecuentes</button>
                                </div>
                                <table class="table" data-table-name="Preguntas Frecuentes" id="table-editable4" >
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Pregunta</th>
                                            <th>Respuesta</th>
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
                                            <td> <?php if (isset($pregunt[1])) {echo $pregunt[1]; }  ?> </td>
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
                                Información
                            </tab-heading>
                            <div class="informacion" id="informacion">
                                <div class="panel-header panel-controls">
                                    <textarea class="form-control" id="informacionT" rows="18"><?php echo $informacion; ?></textarea>
                                </div>
                                <div class="modal-footer text-center">
                                    <button type="submit" class="btn btn-primary btn-embossed bnt-square editar_informacion" ><i class="fa fa-check"></i> Guardar</button>
                                </div>
                            </div>
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
