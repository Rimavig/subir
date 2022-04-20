<?php
include ("../../conect.php");
include ("../../autenticacion.php");
$re = $client->getAllSala();
$resultado= "".$re;
$usuarios =explode(';',$resultado);
$tipo="Sala";
$tipo2="sala";
$nombreT="la sala";
?>
<div>
    <div class="row">
        <div class="col-lg-12 portlets">
            <div class="panel">
                <div class="panel-header panel-controls">
                    <h3><i class="fa fa-table"></i> Tabla de <strong><?php echo $tipo; ?></strong> </h3>
                </div>
                <div class="panel-content pagination2 table-responsive">
                    <input type="text" name="tipo" id="tipo" class="esconder"  value="<?php echo $tipo2; ?>" disabled>
                    <input type="text" name="nombreT" id="nombreT" class="esconder"  value="<?php echo $nombreT; ?>" disabled> 
                    <table class="table filter-footer table-dynamic table-tools " data-table-name="<?php echo $tipo; ?>" id="table-editable1">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombres</th>
                                <th>Sala</th>
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
                                    if (trim($usuario[1]) !="No aplica" ) {
                            ?>
                            <tr>
                                <td id="fila0"> <?php if (isset($usuario[0])) {echo $usuario[0]; }  ?> </td>
                                <td> <?php if (isset($usuario[1])) {echo $usuario[1]; }  ?> </td>
                                <td>
                                    <button class="Smapa btn btn-sm btn-dark" value="<?php echo $usuario[4];; ?>" id="Smapa"><i class="fa fa-plus"></i> Ver Mapa</button>
                                </td>
                                <td>
                                    <?php 
                                        if ($usuario[5]==="A" ) {
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
                                    <a class="editar btn btn-sm btn-dark" style="margin: 5px;"  href="javascript:;"><i class="icon-note"></i></a>
                                    <a class="estado btn btn-sm btn-blue" style="margin: 5px;" href="javascript:;"><i class="icon-key"></i></a>
                                </td>
                            </tr>
                            <?php
                             }}
                            }
                            $transport->close();
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade categoria" id="categoria" aria-hidden="true">
    </div>
    <div class="modal fade Ecategoria" id="Ecategoria" aria-hidden="true">
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
        <div class="copyright">
            <p class="pull-left sm-pull-reset">
                <span >Copyright <span class="copyright">&copy;</span> 2016 </span>
                <span>THEMES LAB</span>.
                <span>All rights reserved. </span>
            </p>
            <p class="pull-right sm-pull-reset">
                <span><a href="#" class="m-r-10">Support</a> | <a href="#" class="m-l-10 m-r-10">Terms of use</a> | <a href="#" class="m-l-10">Privacy Policy</a></span>
            </p>
        </div>
    </div>
</div>