
<?php
include ("../../conect.php");
include ("../../autenticacion.php");
$tipo = $_SESSION["tipo"];
$sucursal = $_SESSION["sucursal"];
$re = $client->login("Historial Fallas", $tipo.",".$sucursal);
$resultado = "";
$resultado = "".$re;
$historial =explode(';',$resultado);
?>
<div>
    <div class="row">
        <div class="col-lg-12 portlets">
            <div class="panel">
                <div class="panel-header panel-controls">
                    <h3><i class="fa fa-table"></i> <strong>Historial de Fallas</strong></h3>
                    </div>
                <div class="panel-content  pagination2 ">
                    <div class="filter-left ">
                        <table class="table filter-footer table-dynamic table-tools " data-table-name="Historial de alertas">
                            
                            <thead>
                                <tr>
                                    <th>Provincia</th>
                                    <th>Sucursal</th>
                                    <th class='hidden-350'>Equipo</th>
                                    <th class='hidden-1024'>Descripción</th>
                                    <th class='hidden-480'>Fecha inicio</th>
                                    <th class='hidden-480'>Fecha termino</th>
                                    <th class='hidden-480'>Estado</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                foreach($historial as $llave => $valores) {
                                    $datos =explode(',',$valores);
                                ?>
                                <tr>
                                    <td class='hidden-350'> <?php if (isset($datos[1])) {echo $datos[1]; }  ?> </td>
                                    <td class='hidden-350'> <?php if (isset($datos[2])) {echo $datos[2]; }  ?> </td>
                                    <td class='hidden-350'> <?php if (isset($datos[3])) {echo $datos[3]; }  ?> </td>
                                    <td class='hidden-350'> <?php if (isset($datos[4])) {echo $datos[4]; }  ?> </td>
                                    <td class='hidden-350'> <?php if (isset($datos[5])) {echo $datos[5]; }  ?> </td>
                                    <td class='hidden-350'> <?php if (isset($datos[6])) {echo $datos[6]; }  ?> </td>
                                    <td> <?php if (isset($datos[7])) {
                                        if ($datos[7]=="1") {
                                            echo "ON"; 
                                        } else{
                                            echo "OFF"; 
                                        } 
                                        }  ?> </td>
                                </tr>
                                <?php
                                }
                                $transport->close();
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Provincia</th>
                                    <th>Sucursal</th>
                                    <th class='hidden-350'>Equipo</th>
                                    <th class='hidden-1024'>Tipo de Señal</th>
                                    <th class='hidden-480'>Estado</th>
                                    <th class='hidden-480'>Fecha</th>
                                </tr>
                            </tfoot>
                        </table>
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
</div>