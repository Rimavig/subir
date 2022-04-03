<?php
include ("../conect.php");
include ("../autenticacion.php");
$re = $client->getAllResidentes($_SESSION["usuario"]);
$resultado= "".$re;
$usuarios =explode(';',$resultado);

?>

<div>
    <div class="row">
        <div class="col-lg-12 portlets">
            <div class="panel">
                <div class="panel-header panel-controls">
                    <h3><i class="fa fa-table"></i> Tabla de <strong>Usuarios Residentes</strong> </h3>
                </div>
                <div class="panel-content pagination2 table-responsive">
                    <table class="table filter-footer table-dynamic table-tools " data-table-name="Usuarios Residentes" id="table-editable" style="table-layout: fixed;">
                        <thead>
                            <tr>
                                <th class="esconder">Id</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Celular</th>
                                <th>Cédula</th>
                                <th>Ciudadela</th>
                                <th>Ingreso</th>
                                <th>invitación</th>    
                                <th class="text-right">Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach($usuarios as $llave => $valores) {
                                $usuario =explode(',,,',$valores);
                                $estado="";
                                $estadoT="OFF";
                                $estado1="";
                                $estadoT1="OFF";
                                if (isset($usuario[2])) {
                            ?>
                            <tr>
                                <td class="esconder" id="fila0"> <?php if (isset($usuario[0])) {echo $usuario[0]; }  ?> </td>
                                <td> <?php if (isset($usuario[2])) {echo $usuario[2]; }  ?> </td>
                                <td> <?php if (isset($usuario[3])) {echo $usuario[3]; }  ?> </td>
                                <td> <?php if (isset($usuario[1])) {echo $usuario[1]; }  ?> </td>
                                <td> <?php if (isset($usuario[5])) {echo $usuario[5]; }  ?> </td>
                                <td> <?php if (isset($usuario[7])) {echo $usuario[7]; }  ?> </td>
                                <th>
                                    <?php 
                                        if ($usuario[8]==="A" ) {
                                            $estado="checked";
                                            $estadoT="ON";
                                        } 
                                    ?> 
                                    <div class="form-group">
                                        <label class="switch switch-green">
                                            <input type="checkbox" class="switch-input" id="box" <?php echo $estado; ?> disabled>
                                            <span class="switch-label" data-on="On" data-off="Off"></span>
                                            <span class="switch-handle"></span>
                                            <span id="estado" class="esconder"><?php echo $estadoT; ?></span>
                                        </label>
                                    </div>
                                </th>
                                <th>
                                    <?php 
                                        if ($usuario[9]==="S" ) {
                                            $estado1="checked";
                                            $estadoT1="ON";
                                        } 
                                    ?> 
                                    <div class="form-group">
                                        <label class="switch switch-green">
                                            <input type="checkbox" class="switch-input" id="box1" <?php echo $estado1; ?> disabled>
                                            <span class="switch-label" data-on="On" data-off="Off"></span>
                                            <span class="switch-handle"></span>
                                            <span id="estado1" class="esconder"><?php echo $estadoT1; ?></span>
                                        </label>
                                    </div>
                                </th>
                                <td class="text-right">
                                    <a class="editar btn btn-sm btn-dark" style="margin: 0px;  "  href="javascript:;"><i class="icon-note"></i></a>
                                    <a class="estado btn btn-sm btn-blue" style="margin: 0px;" href="javascript:;"><i class="icon-key"></i></a>
                                </td>
                            </tr>
                            <?php
                             }
                            }
                            $transport->close();
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="esconder" >Id</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Celular</th>
                                <th>Cédula</th>
                                <th>Ciudadela</th>
                                <th>Ingreso</th>
                                <th>invitación</th> 
                                <th>Estado</th>   
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade Cusuarios" id="Cusuarios" aria-hidden="true">
    </div>
    <div class="modal fade usuarios" id="usuarios" aria-hidden="true">
    </div>
    <div class="alerta" id="alerta" >
    </div>
    <div class="footer">
        <div class="copyright">
            <p class="pull-left sm-pull-reset">
                <span>Copyright © 2021 </span><span> VION IoT Solutions</span>.<span>Todos los derechos reservados.</span>
            </p>
            <p class="pull-right sm-pull-reset">
                <span><a href="https://qr-ticket.app/" target="_blank" class="m-r-10">Support</a>  | <a href="https://qr-ticket.app/privacy.html" target="_blank" class="m-l-10">Privacy Policy</a></span>
            </p>
        </div>
    </div>
</div>