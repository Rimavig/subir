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
                    <h3><i class="fa fa-table"></i> Estado de <strong>Equipos</strong></h3>
                </div>
                <div class="panel-content  pagination2 ">
                    <div class="filter-left ">
                        <table class="table filter-footer table-dynamic  " data-table-name="Estaciones de Servicio" id="estaciones">
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
    <div class="row c cont3" id="cont3">
    </div>
</div>
<div class="footer">
    <div class="copyright">
        <p class="pull-left sm-pull-reset">
            <span>Copyright © 2021 </span><span> VION IoT Solutions</span>.<span>Todos los derechos reservados.</span>
        </p>
    </div>
</div>