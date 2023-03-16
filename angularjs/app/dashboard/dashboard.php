<?php
include ("../conect_dashboard.php");
include ("../autenticacion.php");
$re = $client2->getGeneral("usuarios");
$resultado= "".$re;
$texto =explode(';;;',$resultado);
$totalG =explode(',,,',$texto[0]);
$total =explode(',,,',$texto[1]);
$activos =explode(',,,',$texto[2]);
$pendientes =explode(',,,',$texto[3]);
$re = $client2->getGeneral("diario");
$resultado= "".$re;
$texto =explode(';;;',$resultado);
$generalD =explode(',,,',$texto[0]);
$dolaresD =explode(',,,',$texto[1]);
$ticketD =explode(',,,',$texto[2]);
$re = $client2->getGeneral("mensual");
$resultado= "".$re;
$texto =explode(';;;',$resultado);
$generalM =explode(',,,',$texto[0]);
$dolaresM =explode(',,,',$texto[1]);
$ticketM =explode(',,,',$texto[2]);
$re = $client2->getGeneral("ventasE");
$resultado= "".$re;
$resultado= "".$re;
$eventos =explode(';;;',$resultado);

date_default_timezone_set('UTC');
function obtenerFechaEnLetra($fecha){
    $dia= conocerDiaSemanaFecha($fecha);
    $num = date("j", strtotime($fecha));
    $anno = date("Y", strtotime($fecha));
    $mes = array('enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre');
    $mes = $mes[(date('m', strtotime($fecha))*1)-1];
    return $mes;
}
function conocerDiaSemanaFecha($fecha) {
    $dias = array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado');
    $dia = $dias[date('w', strtotime($fecha))];
    return $dia;
}
?>
<div>
    <div class="col-xlg-3  col-lg-3 col-md-6 col-xs-6  col-visitors portlets">
        <div class="row">
            <div class="col-md-12">
                <div class="panel no-bd bd-3 panel-stat">
                    <div class="panel-header">
                        <h3><i class="icon-graph"></i> <strong>USUARIOS</strong> CLIENTES</h3>
                        <div class="control-btn">
                            <a href="#" class="panel-reload hidden"></a>
                        </div>
                    </div>
                    <div class="panel-body p-15 p-b-0">
                        <div class="row m-b-10">
                            <div class="col-xs-3 big-icon">
                                <i class="icon-users"></i>
                            </div>
                            <div class="col-xs-9">
                                <div class="live-tile" data-mode="carousel" data-direction="vertical" data-delay="8000" data-height="60">
                                    <div>
                                        <small class="stat-title">TOTAL</small>
                                        <h1 class="f-40 m-0 w-300"><?php echo $totalG[0]; ?></h1>
                                    </div>
                                    <div>
                                        <small class="stat-title">APROBADOS</small>
                                        <h1 class="f-40 m-0 w-300"><?php echo $totalG[1]; ?></h1>
                                    </div>
                                    <div>
                                        <small class="stat-title">PENDIENTES</small>
                                        <h1 class="f-40 m-0 w-300"><?php echo $totalG[2]; ?></h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-3">
                                <small class="stat-title">NUEVOS</small>
                                <div class="live-tile" data-mode="carousel" data-direction="vertical" data-delay="8000" data-height="23">
                                    <div>
                                        <h3 class="f-20 t-left m-0 w-500"><?php echo $total[0]; ?></h3>
                                    </div>
                                    <div>
                                        <h3 class="f-20 t-left m-0 w-500"><?php echo $activos[0]; ?></h3>
                                    </div>
                                    <div>
                                        <h3 class="f-20 t-left m-0 w-500"><?php echo $pendientes[0]; ?></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <small class="stat-title">MUJERES</small>
                                <div class="live-tile " data-mode="carousel" data-direction="vertical" data-delay="8000" data-height="23">
                                    <div>
                                        <h3 class="f-20 t-left m-0 w-500"><?php echo $total[1]; ?></h3>
                                    </div>
                                    <div>
                                        <h3 class="f-20 t-left m-0 w-500"><?php echo $activos[1]; ?></h3>
                                    </div>
                                    <div>
                                        <h3 class="f-20 t-left m-0 w-500"><?php echo $pendientes[1]; ?></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <small class="stat-title">HOMBRES</small>
                                <div class="live-tile" data-mode="carousel" data-direction="vertical" data-delay="8000" data-height="23">
                                    <div>
                                        <h3 class="f-20 t-left m-0 w-500"><?php echo $total[2]; ?></h3>
                                    </div>
                                    <div>
                                        <h3 class="f-20 t-left m-0 w-500"><?php echo $activos[2]; ?></h3>
                                    </div>
                                    <div>
                                        <h3 class="f-20 t-left m-0 w-500"><?php echo $pendientes[2]; ?></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <small class="stat-title">AMIGOS</small>
                                <div class="live-tile" data-mode="carousel" data-direction="vertical" data-delay="8000" data-height="23">
                                    <div>
                                        <h3 class="f-20 t-left m-0 w-500"><?php echo $total[3]; ?></h3>
                                    </div>
                                    <div>
                                        <h3 class="f-20 t-left m-0 w-500"><?php echo $activos[3]; ?></h3>
                                    </div>
                                    <div>
                                        <h3 class="f-20 t-left m-0 w-500"><?php echo $pendientes[3]; ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="panel no-bd bd-3 panel-stat">
                    <div class="panel-header">
                        <h3><i class="icon-graph"></i> <strong> VENTAS</strong> (<?php echo conocerDiaSemanaFecha(date("d-m-Y")); ?>)</h3>
                        <div class="control-btn">
                            <a href="#" class="panel-reload hidden"></a>
                        </div>
                    </div>
                    <div class="panel-body p-15 p-b-0">
                        <div class="row m-b-10">
                            <div class="col-xs-3 big-icon">
                                <i class="fa fa-line-chart"></i>
                            </div>
                            <div class="col-xs-9">
                                <div class="live-tile" data-mode="carousel" data-direction="vertical" data-delay="8000" data-height="60">
                                    <div>
                                        <small class="stat-title">CANTIDAD TICKETS</small>
                                        <h1 class="f-40 m-0 w-300"><?php echo $generalD[1]; ?></h1>
                                    </div>
                                    <div>
                                        <small class="stat-title">CANTIDAD DOLARES</small>
                                        <h1 class="f-40 m-0 w-300"><?php echo $generalD[0]; ?></h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-4">
                                <small class="stat-title">APP</small>
                                <div class="live-tile" data-mode="carousel" data-direction="vertical" data-delay="8000" data-height="23">
                                    <div>
                                        <h3 class="f-20 t-left m-0 w-500"><?php echo $ticketD[1]; ?></h3>
                                    </div>
                                    <div>
                                        <h3 class="f-20 t-left m-0 w-500"><?php echo $dolaresD[1]; ?></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <small class="stat-title">WEB</small>
                                <div class="live-tile " data-mode="carousel" data-direction="vertical" data-delay="8000" data-height="23">
                                    <div>
                                        <h3 class="f-20 t-left m-0 w-500"><?php echo $ticketD[2]; ?></h3>
                                    </div>
                                    <div>
                                        <h3 class="f-20 t-left m-0 w-500"><?php echo $dolaresD[2]; ?></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <small class="stat-title">TAQUILLA</small>
                                <div class="live-tile" data-mode="carousel" data-direction="vertical" data-delay="8000" data-height="23">
                                    <div>
                                        <h3 class="f-20 t-left m-0 w-500"><?php echo $ticketD[0]; ?></h3>
                                    </div>
                                    <div>
                                        <h3 class="f-20 t-left m-0 w-500"><?php echo $dolaresD[0]; ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="panel no-bd bd-3 panel-stat">
                    <div class="panel-header">
                        <h3><i class="icon-graph"></i> <strong> VENTAS</strong> (<?php echo obtenerFechaEnLetra(date("d-m-Y")); ?>)</h3>
                        <div class="control-btn">
                            <a href="#" class="panel-reload hidden"></i></a>
                        </div>
                    </div>
                    <div class="panel-body p-15 p-b-0">
                        <div class="row m-b-10">
                            <div class="col-xs-3 big-icon">
                                <i class="fa fa-bar-chart"></i>
                            </div>
                            <div class="col-xs-9">
                                <div class="live-tile" data-mode="carousel" data-direction="vertical" data-delay="8000" data-height="60">
                                    <div>
                                        <small class="stat-title">CANTIDAD TICKETS</small>
                                        <h1 class="f-40 m-0 w-300"><?php echo $generalM[1]; ?></h1>
                                    </div>
                                    <div>
                                        <small class="stat-title">CANTIDAD DOLARES</small>
                                        <h1 class="f-40 m-0 w-300"><?php echo $generalM[0]; ?></h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-4">
                                <small class="stat-title">APP</small>
                                <div class="live-tile" data-mode="carousel" data-direction="vertical" data-delay="8000" data-height="23">
                                    <div>
                                        <h3 class="f-20 t-left m-0 w-500"><?php echo $ticketM[1]; ?></h3>
                                    </div>
                                    <div>
                                        <h3 class="f-20 t-left m-0 w-500"><?php echo $dolaresM[1]; ?></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <small class="stat-title">WEB</small>
                                <div class="live-tile " data-mode="carousel" data-direction="vertical" data-delay="8000" data-height="23">
                                    <div>
                                        <h3 class="f-20 t-left m-0 w-500"><?php echo $ticketM[2]; ?></h3>
                                    </div>
                                    <div>
                                        <h3 class="f-20 t-left m-0 w-500"><?php echo $dolaresM[2]; ?></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <small class="stat-title">TAQUILLA</small>
                                <div class="live-tile" data-mode="carousel" data-direction="vertical" data-delay="8000" data-height="23">
                                    <div>
                                        <h3 class="f-20 t-left m-0 w-500"><?php echo $ticketM[0]; ?></h3>
                                    </div>
                                    <div>
                                        <h3 class="f-20 t-left m-0 w-500"><?php echo $dolaresM[0]; ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xlg-3 col-lg-3 col-md-6 col-xs-6 portlets">
        <div class="row">
            <div class="col-md-12">
                <div class="panel widget-progress-bar" style="height: 651px; margin-bottom: 0px; overflow: auto;">
                    <div class="panel-header">
                        <h3><i class="icon-graph"></i> <strong>CANTIDAD </strong> VENTAS</h3>
                    </div>
                    <div class="panel-body">
                <?php
                    foreach($eventos as $llave => $valores) {
                        $datos =explode('::',$valores);
                        if (isset($datos[1])) {
                            $datos2 =explode(';;',$datos[1]);
                            ?>
                            <div>
                                <label for="field-1"><?php echo $datos[0]; ?></label>
                            <?php
                            foreach($datos2 as $llave => $valores2) { 
                                $datos3 =explode(',,,',$valores2);  
                                ?>
                                <div class="progress visible" style="margin-top:30px" >
                                <?php
                                if ($datos3[3]=="A") {
                                ?>
                                    <progress class="progress-bar-primary stat1" style="margin-top:30px; width:<?php echo $datos3[4]; ?>%" value="2" max="100" data-animation-delay="60"></progress>
                                <?php
                                } else {
                                ?>
                                    <progress class="progress-bar-primary stat1" style="margin-top:30px; background-color: red !important;  width:<?php echo $datos3[4]; ?>%" value="2" max="100" data-animation-delay="60"></progress>
                                <?php
                                }
                                ?> 
                                    <div class="progress-info">
                                        <span class="progress-name"><?php echo $datos3[0]; ?></span>
                                        <span class="progress-value"><?php echo $datos3[2]; ?></span>
                                    </div>
                                </div>
                                <?php
                            } 
                            ?>
                            </div>
                            <?php
                        }
                    } 
                ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xlg-6  col-lg-6 col-md-12 col-xs-12 col-financial-stocks portlets">
        <div class="panel">
            <div class="panel-header panel-controls">
                <h3><i class="icon-graph"></i> <strong>VENTAS</strong></h3>
            </div>
            <div class="panel-content widget-full widget-stock stock1">
                <tabset class="tabs tabs-linetriangle ">
                    <tab active="activeTab">
                        <tab-heading>
                            <span class="title">Principal</span>
                        </tab-heading>
                        <div id="stock-salaP"></div>
                    </tab>
                    <tab >
                        <tab-heading>
                            <span class="title">Tercera</span>
                        </tab-heading>
                        <div id="stock-terceraS"></div>
                    </tab>
                    <tab >
                        <tab-heading>
                            <span class="title">Exteriores</span>
                        </tab-heading>
                        <div id="stock-exteriores"></div>
                    </tab>
                    <tab >
                        <tab-heading>
                            <span class="title">Zaruma</span>
                        </tab-heading>
                        <div id="stock-zaruma"></div>
                    </tab>
                    <tab>
                        <tab-heading>
                            <span class="title">Lobby</span>
                        </tab-heading>
                        <div id="stock-lobby"></div>
                    </tab>
                    
                    <tab >
                        <tab-heading>
                            <span class="title">Digital</span>
                        </tab-heading>
                        <div id="stock-digital"></div>
                    </tab>
                    
                </tabset>
            </div>
        </div>
    </div>
    <div class="col-xlg-6 col-lg-6 col-md-12 col-xs-12  portlets">
        <div class="panel m-t-0">
            <div class="panel-content p-t-0 p-b-0">
                <div id="bar-chart"></div>
            </div>
        </div>
    </div>

    <div class="footer">
        <p class="copyright">
            <span>Copyright © 2022 </span><span> Teatro Sanchez Aguilar </span><span>- Powered by Vion IoT Solutions. All rights reserved.</span>
        </p>
    </div>
</div><?php
$transport2->close();
?>