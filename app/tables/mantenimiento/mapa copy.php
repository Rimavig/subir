<?php
include ("../../conect.php");
include ("../../autenticacion.php");
$re = $client->getAllSalaMapa("total");
$resultado= "".$re;
$usuarios =explode(';;',$resultado);
$tipo="Mapa";
$tipo2="distribucionS";
$nombreT="la distribución";
?>
<div>
    <div class="row editarMapa" id="editarMapa">
        <div class="col-lg-12 portlets">
            <div class="panel">
                <div class="panel-header panel-controls">
                    <h3><i class="fa fa-table"></i> Tabla de <strong><?php echo $tipo; ?></strong> </h3>
                </div>
                <div class="panel-content pagination2 table-responsive">
                    <div class="m-b-20">
                        <div class="btn-group">
                            <div data-toggle="modal" data-target="#modal-responsive">
                                <button class="crearMS btn btn-sm btn-dark"><i class="fa fa-plus"></i> Agregar <?php echo $tipo; ?></button>
                            </div>
                            <input type="text" name="tipo" id="tipo" class="esconder"  value="<?php echo $tipo2; ?>" disabled>  
                            <input type="text" name="nombreT" id="nombreT" class="esconder"  value="<?php echo $nombreT; ?>" disabled>    
                        </div>
                    </div>
                    <table class="table filter-footer table-dynamic table-distribucion " data-table-name="<?php echo $tipo; ?>" id="table-editable">
                    <thead>
                            <tr>
                                <th>Id</th>
                                <th>Id Sala</th>
                                <th>Id Mapa</th>
                                <th>Sala</th>
                                <th>Distribución</th>
                                <th>Mapa</th>
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
                                if (isset($usuario[1])) {
                                    if ($usuario[1] != "1") {
                                        if (trim($usuario[2]) !="1" ) {
                            ?>
                            <tr>
                                <td id="fila0"> <?php if (isset($usuario[0])) {echo $usuario[0]; }  ?> </td>
                                <td id="idSala"> <?php if (isset($usuario[1])) {echo $usuario[1]; }  ?> </td>
                                <td id="idMapa"> <?php if (isset($usuario[2])) {echo $usuario[2]; }  ?> </td>
                                <td id="nombreSala"> <?php if (isset($usuario[3])) {echo $usuario[3]; }  ?> </td>
                                <td id="nombre"> <?php if (isset($usuario[4])) {echo $usuario[4]; }  ?> </td>
                                <td>
                                    <button class="mapa btn btn-sm btn-dark" value="<?php echo $usuario[5];; ?>" id="mapa"><i class="fa fa-plus"></i> Ver Mapa</button>
                                </td>
                                <td>
                                    <?php 
                                        if ($usuario[6]==="A" ) {
                                            $estado="checked";
                                            $estadoT="ON";
                                        } 
                                    ?> 
                                    <div class="form-group">
                                        <label class="switch switch-green">
                                            <input type="checkbox" class="switch-input"  id="box" <?php echo $estado; ?> disabled>
                                            <span class="switch-label" data-on="On" data-off="Off"></span>
                                            <span class="switch-handle"></span>
                                            <span id="estado" class="esconder"><?php echo $estadoT; ?></span>
                                        </label>
                                    </div>
                                </td>
                                <td class="text-right">
                                    <a class="editarMS btn btn-sm btn-dark" style="margin: 0px;  "  href="javascript:;"><i class="icon-note"></i></a>
                                    <a class="delete btn btn-sm btn-danger" href="javascript:;"><i class="icon-trash"></i></a>
                                    <a class="estado btn btn-sm btn-blue" style="margin: 0px;" href="javascript:;"><i class="icon-key"></i></a>
                                </td>
                            </tr>
                            <?php
                                }  } 
                             }
                            }
                            $transport->close();
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade crearMapaS" id="crearMapaS" aria-hidden="true">
    </div>
    <div class="modal fade EcrearMapaS" id="EcrearMapaS" aria-hidden="true">
    </div>
    <div class="modal fade verMapa" id="verMapa" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-mantenimiento">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <button data-dismiss="modal" aria-hidden="true">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail">
                                    <img id="imagen1" data-src="" src="../../../assets/global/images/mapa/<?php echo $imagen; ?>" class="img-responsive" alt="gallery 3">
                                </div>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="alerta" id="alerta" >
    </div>
    <div class="footer">
        <p class="copyright">
            <span>Copyright © 2022 </span><span> VION IoT Solutions</span>.<span>Todos los derechos reservados.</span>
        </p>
    </div>
</div>