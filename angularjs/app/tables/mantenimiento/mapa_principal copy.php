<?php
include ("../../conect.php");
include ("../../autenticacion.php");
$tipo="Mapas de Sala Principal";
$tipo2="distribucionP";
$nombreT="la distribución principal";
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
                                <a class=" btn btn-sm btn-dark" style="margin: 0px;  "  href="#distribucion-crear"><i class="fa fa-plus"></i> Agregar <?php echo $tipo; ?></a>
                            </div>
                            <input type="text" name="tipo" id="tipo" class="esconder"  value="<?php echo $tipo2; ?>" disabled>  
                            <input type="text" name="nombreT" id="nombreT" class="esconder"  value="<?php echo $nombreT; ?>" disabled>    
                        </div>
                    </div>
                    <table class="table filter-footer table-dynamic table-distribucion " data-table-name="<?php echo $tipo; ?>" id="table-editable1">
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
                                    if ($usuario[1] === "1") {
                                        if (trim($usuario[2]) !="1" ) {
                            ?>
                            <tr>
                                <td id="fila0"> <?php if (isset($usuario[0])) {echo $usuario[0]; }  ?> </td>
                                <td id="idSala"> <?php if (isset($usuario[1])) {echo $usuario[1]; }  ?> </td>
                                <td id="idMapa"> <?php if (isset($usuario[2])) {echo $usuario[2]; }  ?> </td>
                                <td > <?php if (isset($usuario[2])) {echo $usuario[3]; }  ?> </td>
                                <td id="nombre"> <?php if (isset($usuario[3])) {echo $usuario[4]; }  ?> </td>
                                <th>
                                    <button class="mapaP btn btn-sm btn-dark" value="1.png" id="mapaP"><i class="fa fa-plus"></i> Ver Sala</button>
                                </th>
                                <th>
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
                                </th>
                                <td class="text-right">
                                    <a class="editarMP btn btn-sm btn-dark" style="margin: 0px;  "  href="javascript:;"><i class="icon-note"></i></a>
                                    <a class="delete btn btn-sm btn-danger" href="javascript:;"><i class="icon-trash"></i></a>
                                    <a class="estado btn btn-sm btn-blue" style="margin: 0px;" href="javascript:;"><i class="icon-key"></i></a>
                                </td>
                            </tr>
                            <?php
                                 }}
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
    <div class="crearMapa" id="crearMapa" aria-hidden="true">
    </div>
    <div class="modal fade verSala" id="verSala" aria-hidden="true">    
    </div>
    <div class="alerta" id="alerta" >
    </div>
    <div class="footer">
        <p class="copyright">
            <span>Copyright © 2022 </span><span> VION IoT Solutions</span>.<span>Todos los derechos reservados.</span>
        </p>
    </div>
</div>