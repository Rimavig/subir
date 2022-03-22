<?php
include ("../conect.php");
include ("../autenticacion.php");
$var="";
$var1="";
$var2="";
$var3="";
$var4="";
$tipo = $_SESSION["tipo"];
$sucursal = $_SESSION["sucursal"];
$re = $client->login("Estaciones1", $tipo.",".$sucursal);
$resultado = "".$re;
$historial= explode(';',$resultado);
if (!isset($_SESSION['var1'])) {
      
}else{
    $var1 = $_SESSION["var1"];
}
?>  
<div class="row ">
    <div class="row">
        <div class="col-lg-12 portlets">
            <div class="panel">
                <div class="panel-header panel-controls">
                    <h3><i class="fa fa-table"></i> Estado de <strong>Tanques</strong></h3>
                </div>
                <div class="panel-content  pagination2 ">
                    <div class="filter-left ">
                        <table class="table filter-footer table-dynamic " data-table-name="Estaciones de Servicio" id="tanques">
                            <thead>
                                <tr>
                                    <th class="esconder">id</th>
                                    <th>Provincia</th>
                                    <th>Sucursal</th>
                                </tr>
                            </thead>
                            <?php
                                foreach($historial as $llave => $valores) {
                                    $datos =explode(',',$valores);
                                    if (isset($datos[1])) {
                                        if (trim($datos[0])==trim($var1)) {
                                ?>
                                <tr class="selected"><?php
                                }else{
                                    ?>
                                <tr><?php } ?>

                                    <td class='id esconder'> <?php if (isset($datos[0])) {echo $datos[0]; }  ?> </td>
                                    <td > <?php if (isset($datos[2])) {echo $datos[2]; }  ?> </td>
                                    <td> <?php if (isset($datos[1])) {echo $datos[1]; }  ?> </td>
                                </tr>
                                <?php
                                }}
                                $transport->close();
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row c cont4" id="cont4">
    </div>
    <div class="esconder" id="esconder">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 portlets ">
            <div class="panel">
                <div class="panel-header  panel-controls">
                <h3><i class="icon-globe-alt"></i>Consumo de <strong>ECO</strong></h3>
                </div>
                <div class="panel-content">
                    <div id="eco1" style="height:320px"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 portlets ">
            <div class="panel">
                <div class="panel-header  panel-controls">
                <h3><i class="icon-globe-alt"></i>Consumo de <strong>ECO</strong></h3>
                </div>
                <div class="panel-content">
                    <div id="eco2" style="height:320px"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 portlets ">
            <div class="panel">
                <div class="panel-header  panel-controls">
                <h3><i class="icon-globe-alt"></i>Consumo de <strong>SUPER</strong></h3>
                </div>
                <div class="panel-content">
                    <div id="super" style="height:320px"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 portlets " >
            <div class="panel">
                <div class="panel-header  panel-controls">
                <h3><i class="icon-globe-alt"></i>Consumo de <strong>DIESEL</strong></h3>
                </div>
                <div class="panel-content">
                    <div id="diesel" style="height:320px"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="footer">
    <div class="copyright">
        <p class="pull-left sm-pull-reset">
            <span>Copyright © 2021 </span><span> VION IoT Solutions</span>.<span>Todos los derechos reservados.</span>
        </p>
    </div>
</div>