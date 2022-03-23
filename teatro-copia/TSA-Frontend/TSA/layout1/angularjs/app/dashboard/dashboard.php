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
$re = $client->login("Principal", $tipo.",".$sucursal.",".$var1);
$resultado = "".$re;
$historial= explode(';',$resultado);

?>  


<div class="row m-t-10">
    <div class="col-lg-6 portlets">
      <div class="panel">
        <div class="panel-header  panel-controls">
            
          <h3><i class="icon-globe-alt"></i>Mapa de <strong>Ecuador</strong></h3>
        </div>
        <div class="panel-content">
            <div >
              <div id="usa-map"></div>
            </div>
        </div>
      </div>
    </div>
    <div class="row c" id="cont1">
        <div class="col-lg-6 portlets">
        <div class="panel">
            <div class="panel-header panel-controls">
                <h3><i class="fa fa-table"></i> <strong>Sucursales</strong></h3>
            </div>
            <div class="panel-content  pagination2 ">
                <div class="filter-left ">
                    <table class="table  ">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Sucursal</th>
                            <th>Tanques</th>
                            <th>Nivel Actual</th>
                            <th>Disponibilidad</th>

                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach($historial as $llave => $valores) {
                            $datos =explode(',',$valores);
                        ?>
                        <tr>
                            <td > <?php if (isset($datos[0])) {echo $datos[0]; }  ?> </td>
                            <td > <?php if (isset($datos[1])) {echo $datos[1]; }  ?> </td>
                            <td > <?php if (isset($datos[2])) {echo $datos[2]; }  ?> </td>
                            <td> <?php if (isset($datos[3])) {echo $datos[3]; }  ?> </td>
                            <td > <?php if (isset($datos[4])) {echo $datos[4]; }  ?> </td>
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
    </div>
    </div>
    <!--div class="col-lg-6 portlets">
        <div class="panel">
            <div class="panel-header  panel-controls">
            <h3><i class="icon-globe-alt"></i>Consumo de <strong>Sucursal</strong></h3>
            </div>
            <div class="panel-content">
                <div id="realtime-chart" style="height:320px"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 portlets">
        <div class="panel">
            <div class="panel-header  panel-controls">
            <h3><i class="icon-globe-alt"></i>Capacidad de <strong>Sucursal</strong></h3>
            </div>
            <div class="panel-content">
            <div id="realtime-chart1" style="height:320px"></div>
            </div>
        </div>
    </div-->
</div>
<div class="footer">
    <div class="copyright">
        <p class="pull-left sm-pull-reset">
            <span>Copyright © 2021 </span><span> VION IoT Solutions</span>.<span>Todos los derechos reservados.</span>
        </p>
    </div>
</div>