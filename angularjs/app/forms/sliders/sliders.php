<?php
include ("../../conect.php");
include ("../../autenticacion.php");
$tipo = $_SESSION["tipo"];
$sucursal = $_SESSION["sucursal"];
$re = $client->login("Indicadores", $tipo.",".$sucursal);
$resultado = "";
$resultado = "".$re;
$historial =explode(';;',$resultado);
?>
<div class="row m-t-10">
    <div class="row">
        <div class="col-lg-12 portlets">
            <div class="panel">
                <div class="panel-header panel-controls">
                    <h3><i class="fa fa-table"></i> <strong>INDICADORES</strong></h3>
                </div>
                <div class="panel-content  pagination2 ">
                    <div class="filter-left ">
                        <table class="table filter-footer table-dynamic table-tools " data-table-name="Historial de Bomba de Agua" id="tciudadela">
                            
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Provincia</th>
                                    <th>Sucursal</th>
                                    <th class='hidden-350'>Stock Max-Eco</th>
                                    <th class='hidden-1024'>Stock Act-Eco</th>
                                    <th class='hidden-350'>Stock Max-Super</th>
                                    <th class='hidden-1024'>Stock Act-Super</th>
                                    <th class='hidden-350'>Stock Max-Diesel</th>
                                    <th class='hidden-1024'>Stock Act-Diesel</th>
                                </tr>
                            </thead>
                            <?php
                                foreach($historial as $llave => $valores) {
                                    $datos =explode(',',$valores);
                                ?>
                                <tr>
                                    <td class='id'> <?php if (isset($datos[0])) {echo $datos[0]; }  ?> </td>
                                    <td class='hidden-350'> <?php if (isset($datos[1])) {echo $datos[1]; }  ?> </td>
                                    <td class='hidden-350'> <?php if (isset($datos[2])) {echo $datos[2]; }  ?> </td>
                                    <td class='hidden-350'> <?php if (isset($datos[6])) {echo $datos[6]; }  ?> </td>
                                    <td class='hidden-350'> <?php if (isset($datos[9])) {echo $datos[9]; }  ?> </td>
                                    <td class='hidden-350'> <?php if (isset($datos[7])) {echo $datos[7]; }  ?> </td>
                                    <td class='hidden-350'> <?php if (isset($datos[10])) {echo $datos[10]; }  ?> </td>
                                    <td class='hidden-350'> <?php if (isset($datos[8])) {echo $datos[8]; }  ?> </td>
                                    <td class='hidden-350'> <?php if (isset($datos[11])) {echo $datos[11]; }  ?> </td>
                                </tr>
                                <?php
                                }
                                $transport->close();
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>id</th>
                                    <th>Provincia</th>
                                    <th>Sucursal</th>
                                    <th class='hidden-350'>Stock Max-Eco</th>
                                    <th class='hidden-1024'>Stock Act-Eco</th>
                                    <th class='hidden-350'>Stock Max-Super</th>
                                    <th class='hidden-1024'>Stock Act-Super</th>
                                    <th class='hidden-350'>Stock Max-Diesel</th>
                                    <th class='hidden-1024'>Stock Act-Diesel</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="cont1 portlets">
    </div>
</div>
<div class="footer">
    <p class="copyright">
                <span>Copyright © 2022 </span><span> Teatro Sanchez Aguilar </span><span>- Powered by Vion IoT Solutions. All rights reserved.</span>
            </p>
</div>