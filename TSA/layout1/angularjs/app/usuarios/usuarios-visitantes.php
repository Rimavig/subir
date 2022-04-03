<?php
include ("../conect.php");
include ("../autenticacion.php");
$re = $client->getAllVisitantes($_SESSION["usuario"]);
$resultado= "".$re;
$usuarios =explode(';',$resultado);

?>

<div>
    <div class="row">
        <div class="col-lg-12 portlets">
            <div class="panel">
                <div class="panel-header panel-controls">
                    <h3><i class="fa fa-table"></i> Tabla de <strong>Usuarios Visitantes</strong> </h3>
                </div>
                <div class="panel-content pagination2 table-responsive">
                    <div class="m-b-20">
                        <div class="btn-group">
                            <button class="crearV btn btn-sm btn-dark" ><i class="fa fa-plus"></i> Agregar Usuario</button>
                        </div>
                    </div>
                    <table class="table filter-footer table-dynamic table-tools " data-table-name="Usuarios Visitantes" id="table-editable" style="table-layout: fixed;">
                        <thead>
                            <tr>
                                <th class="esconder">Id</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Celular</th>
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
                                $estado1="";
                                $estadoT1="OFF";
                                if (isset($usuario[2])) {
                            ?>
                            <tr>
                                <td class="esconder" id="fila0"> <?php if (isset($usuario[0])) {echo $usuario[0]; }  ?> </td>
                                <td> <?php if (isset($usuario[2])) {echo $usuario[2]; }  ?> </td>
                                <td> <?php if (isset($usuario[3])) {echo $usuario[3]; }  ?> </td>
                                <td> <?php if (isset($usuario[1])) {echo $usuario[1]; }  ?> </td>
                                <th>
                                    <?php 
                                        if ($usuario[4]==="A" ) {
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
                                <td class="text-right">
                                    <a class="deleteV btn btn-sm btn-danger" href="javascript:;"><i class="icons-office-52"></i></a>
                                    <a class="editarV btn btn-sm btn-dark" style="margin: 0px;  "  href="javascript:;"><i class="icon-note"></i></a>
                                    <a class="estadoV btn btn-sm btn-blue" style="margin: 0px;" href="javascript:;"><i class="icon-key"></i></a>
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