<?php
include ("../conect.php");
include ("../autenticacion.php");
$var="";
$var1="";
$var2="";
$var3="";
$var4="";
$historial="";
$var1 = "Guayas";
$tipo = $_SESSION["tipo"];
$sucursal = $_SESSION["sucursal"];
$re = $client->login("Estaciones", $tipo.",".$sucursal.",".$var1);
//$re = $client->login("Principal", $tipo.",".$sucursal.",".$var1);
$resultado = "".$re;
$historial= explode(';',$resultado);
if (!isset($_SESSION['var1'])) {
      
}else{
    $var1 = $_SESSION["var1"];
}
?>  


<div class="row m-t-10">
    <div class="col-lg-6 portlets">
        <div class="panel">
            <div class="panel-header  panel-controls">
            <h3><i class="icon-globe-alt"></i>Mapa de <strong>Ecuador</strong></h3>
            </div>
            <div class="panel-content">
                <div id="usa-map"></div>
            </div>
        </div>
    </div>
    <div class="row c" >
        <div class="col-lg-6 portlets">
            <div class="panel">
                <div class="panel-header panel-controls">
                    <h3><i class="fa fa-table"></i> <strong>Estación de Servicio</strong></h3>
                </div>
                <div class="panel-content  pagination2 ">
                    <div class="filter-left ">
                        <table class="table table-hover table-dynamic" id="table-editable1">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Estación de Servicio</th>
                            </tr>
                        </thead>
                        <tbody id="cont1" style="cursor: default">
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
                                <td > <?php if (isset($datos[0])) {echo $datos[0]; }  ?> </td>
                                <td > <?php if (isset($datos[1])) {echo $datos[1]; }  ?> </td>
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
        <div class="col-lg-6 portlets esconder"  id="esconder">
            <div class="panel">
                <table class="table table-hover ">
                    <thead>
                        <tr>
                            <th>Tanques</th>
                            <th>Productos</th>
                            <th>Nivel Actual(galones)</th>
                            <th>Altura(cm)</th>
                            <th class="esconder">Disponibilidad(dias)</th>

                        </tr>
                    </thead>
                    <tbody id="cont2">
                    <?php
                        foreach($historial as $llave => $valores) {
                            $datos =explode(',',$valores);
                        ?>
                        <tr>
                            <td > <?php if (isset($datos[2])) {echo $datos[2]; }  ?> </td>
                            <td> <?php if (isset($datos[3])) {echo $datos[3]; }  ?> </td>
                            <td> <?php if (isset($datos[4])) {echo $datos[4]; }  ?> </td>
                            <td class="esconder"> <?php if (isset($datos[4])) {echo $datos[4]; }  ?> </td>
                        </tr>
                        <?php
                        }
                        $transport->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row c esconder cont3" id="esconder1">
        
    </div>
    <div class="modal fade bomba" id="bomba" aria-hidden="true">
    </div>
    <div class="modal fade compresor" id="compresor" aria-hidden="true">
    </div>
    <div class="modal fade generador" id="generador" aria-hidden="true">
    </div>
    <div class="modal fade rci" id="rci" aria-hidden="true">
    </div>
</div>
<div class="footer">
    <div class="copyright">
        <p class="pull-left sm-pull-reset">
            <span>Copyright © 2021 </span><span> VION IoT Solutions</span>.<span>Todos los derechos reservados.</span>
        </p>
    </div>
</div>