<?php
include ("../../conect.php");
include ("../../autenticacion.php");
$re = $client->getAllUsuarioEvento();
$resultado= "".$re;
$usuarios =explode(';',$resultado);

?>

<div>
    <div class="row">
        <div class="col-lg-12 portlets">
            <div class="panel">
                <div class="panel-header panel-controls">
                    <h3><i class="fa fa-table"></i> Tabla de <strong>Usuarios Eventos</strong> </h3>
                </div>
                <div class="panel-content pagination2 table-responsive">
                    <div class="m-b-20">
                        <div class="btn-group">
                            <button class="crearE btn btn-sm btn-dark"  href="javascript:;"><i class="fa fa-plus"></i> Agregar Usuario</button>
                        </div>
                    </div>
                    <table class="table filter-footer table-dynamic table-tools1 " data-table-name="Usuarios" id="table-editable" style="table-layout: fixed;">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Usuario</th>
                                <th>Cedula</th>
                                <th>Correo</th>
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
                                if (isset($usuario[2])) {
                            ?>
                            <tr>
                                <td id="fila0"> <?php if (isset($usuario[0])) {echo $usuario[0]; }  ?> </td>
                                <td> <?php if (isset($usuario[1])) {echo $usuario[1]; }  ?> </td>
                                <td> <?php if (isset($usuario[2])) {echo $usuario[2]; }  ?> </td>
                                <td> <?php if (isset($usuario[3])) {echo $usuario[3]; }  ?> </td>
                                <td> <?php if (isset($usuario[4])) {echo $usuario[4]; }  ?> </td>
                                <td> <?php if (isset($usuario[6])) {echo $usuario[6]; }  ?> </td>
                                <td> <?php if (isset($usuario[7])) {echo $usuario[7]; }  ?> </td>
                                <th>
                                    <?php 
                                        if ($usuario[12]==="A" ) {
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
                                </th>
                                <td class="text-right">
                                    <a class="editarE btn btn-sm btn-dark" style="margin: 0px;  "  href="javascript:;"><i class="icon-note"></i></a>
                                    <a class="deleteE btn btn-sm btn-danger" style="margin: 0px;  " href="javascript:;"><i class="icons-office-52"></i></a>
                                    <a class="estadoE btn btn-sm btn-warning" style="margin: 0px;" href="javascript:;"><i class="icon-lock"></i></a>
                                    <a class="claveE btn btn-sm btn-blue" style="margin: 0px;" href="javascript:;"><i class="icon-key"></i></a>
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
                                <th >Id</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Usuario</th>
                                <th>Cedula</th>
                                <th>Correo</th>
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