<?php
include ("../../conect.php");
include ("../../autenticacion.php");
$re = $client->getAllPromociones();
$resultado= "".$re;
$Promocion =explode(';',$resultado);

?>
<div>
    <div class="row">
        <div class="col-lg-12 portlets">
            <div class="panel">
                <div class="panel-header panel-controls">
                    <h3><i class="fa fa-table"></i> Tabla de <strong>Promociónes</strong> </h3>
                </div>
                <div class="panel-content pagination2 table-responsive">
                    <div class="m-b-20">
                        <div class="btn-group">
                            <button class="crear btn btn-sm btn-dark" ng-click="crear_general()"  href="javascript:;"><i class="fa fa-plus"></i> Agregar Promoción General</button>
                        </div>
                    </div>
                    <table class="table filter-footer table-dynamic table-tools1 " data-table-name="Promociones" id="table-editable" style="table-layout: fixed;">
                        <thead>
                            <tr>
                                <th class="esconder">id</th>
                                <th class="esconder">id_promocion</th>
                                <th>Nombre Promoción</th>
                                <th>Localidad</th>
                                <th>Tipo</th>
                                <th>Inicio</th>
                                <th>Término</th>
                                <th>Estado</th>
                                <th class="text-right">Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            foreach($Promocion as $llave => $valores) {
                                $prom =explode(',,,',$valores);
                                $estado="";
                                $estadoT="OFF";
                                if (isset($prom[2])) {
                            ?>
                            <tr>
                                <td class="esconder" id="fila0"> <?php if (isset($prom[0])) {echo $prom[0]; }  ?> </td>
                                <td class="esconder" id="fila0Promocion"> <?php if (isset($prom[1])) {echo $prom[1]; }  ?> </td>
                                <td> <?php if (isset($prom[2])) {echo $prom[2]; }  ?> </td>
                                <?php
                                    if ($prom[4]=="T") {
                                        $localidad="TODAS";
                                    }else if ($prom[4]=="W") {
                                        $localidad="WEB";
                                    }else if ($prom[4]=="A") {
                                        $localidad="APP";
                                    }else if ($prom[4]=="V") {
                                        $localidad="TAQUILLA";
                                    }else if ($prom[4]=="WA") {
                                        $localidad="WEB/APP";
                                    }else if ($prom[4]=="WV") {
                                        $localidad="WEB/TAQUILLA";
                                    }else if ($prom[4]=="AV") {
                                        $localidad="APP/TAQUILLA";
                                    }           
                                ?>
                                <td> <?php if (isset($prom[4])) {echo $localidad; }?> </td>
                                <td> <?php if (isset($prom[5])) {echo $prom[5]; }  ?> </td>
                                <td> <?php if (isset($prom[6])) {echo $prom[6]; }  ?> </td>
                                <td> <?php if (isset($prom[7])) {echo $prom[7]; }  ?> </td>
                                <th>
                                    <?php 
                                        if ($prom[8]==="A" ) {
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
                                    <a class="btn btn-sm btn-dark" ng-click="editar_general('<?php echo $prom[0]?>','<?php echo $prom[1]?>','<?php echo $prom[5]?>')" style="margin: 5px;"  href="javascript:;"><i class="icon-note"></i></a>
                                    <a class="btn btn-sm btn-danger" ng-click="delete_general('<?php echo $prom[0]?>','<?php echo $prom[1]?>','<?php echo $prom[5]?>','<?php echo $estado?>')" style="margin: 5px;"  href="javascript:;"><i class="icons-office-52"></i></a>
                                    <a class="btn btn-sm btn-blue" ng-click="estado_general('<?php echo $prom[0]?>','<?php echo $prom[1]?>','<?php echo $prom[5]?>','<?php echo $estado?>')" style="margin: 5px;"  style="margin: 0px;" href="javascript:;"><i class="icon-key"></i></a>
                                </td>
                            </tr>
                            <?php
                                }
                            }
                            ?> 
                         
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="esconder">id</th>
                                <th class="esconder">id_promocion</th>
                                <th>Nombre Promoción</th>
                                <th>Localidad</th>
                                <th>Tipo</th>
                                <th>Inicio</th>
                                <th>Término</th>
                                <th>Estado</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade  Cpromocion" id="Cpromocion" aria-hidden="true">
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