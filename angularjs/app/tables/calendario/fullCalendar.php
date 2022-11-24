<?php
include ("../../conect.php");
include ("../../conect_dashboard.php");
include ("../../autenticacion.php");

$re = $client2->getGeneral("CalendarioC");
$resultado= "".$re;
$usuarios =explode(';;',$resultado);
?>
<div class="page-calendar">
    <div class="row">
        <div class="col-lg-12">
            <div class="row panel">
                <div class="panel-header panel-controls">
                    <h3><i class="fa fa-table"></i><strong>Calendario</strong> </h3>
                </div>
                <div class="panel-content table-responsive" style="padding-top: 0px;">
                    <div class="col-md-3 col-xlg-2 p-0">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div id="external-events">
                                    <br>
                                    <p>Hacer click en calendarìo para crear eventos</p>
                                    <br>
                                    <div data-toggle="modal" data-target="#modal-responsive">
                                        <a class="crear_categoria"><i class="icon-plus"></i> Crear Categoría</a>
                                    </div>
                                    <div style="overflow: scroll; max-height: 500px;">
                                    <?php
                                        foreach($usuarios as $llave => $valores) {
                                            $usuario =explode(',,,',$valores);
                                            if (isset($usuario[1])) {
                                                if ($usuario[0]==="1") {
                                            ?>
                                                <div class="external-event <?php echo $usuario[2];?>" data-class="<?php echo $usuario[2];?>" style="position: relative; ">
                                                    <i class="fa fa-move"></i><?php echo $usuario[1];?>
                                                </div>
                                            <?php 
                                                }else{
                                                    ?>
                                                    <div class="external-event <?php echo $usuario[2];?>" data-class="<?php echo $usuario[2];?>" style="position: relative; ">
                                                        <i class="fa fa-move"></i><a class="editar_categoria" id="<?php echo $usuario[0];?>" style="position: relative; color: white;" href="javascript:;"><?php echo $usuario[1];?></a>
                                                    </div>
                                                    <?php 
                                                }
                                            } 
                                        }  
                                    ?>
                                    </div> 
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 col-xlg-10 p-0 no-bd">
                        <div class="widget">
                            <div class="widget-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div id="calendar"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
        <div class="modal fade categoria" data-keyboard="false" data-backdrop="static" id="categoria" aria-hidden="true">
        </div>
        <div class="alerta" id="alerta" >
        </div>
    </div>
    <div class="footer">
        <p class="copyright">
            <span>Copyright © 2022 </span><span> Teatro Sanchez Aguilar </span><span>- Powered by Vion IoT Solutions. All rights reserved.</span>
        </p>
    </div>
</div>