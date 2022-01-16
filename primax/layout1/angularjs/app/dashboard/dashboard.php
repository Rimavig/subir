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
                        <tbody id="cont1">
                        <?php
                            foreach($historial as $llave => $valores) {
                                $datos =explode(',',$valores);
                                if (isset($datos[1])) {
                            ?>
                            <tr>
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
                            <th>Disponibilidad(dias)</th>

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
    <div class="row c esconder cont3" id="esconder1">
        <div class="col-lg-3 portlets">
            <div class="panel" style="height:320px;" >
                <div class="panel-header panel-controls">
                    <h3><i class="fa fa-table"></i> <strong>Bomba de Agua</strong></h3>
                </div>
                <div class="row">   
                    <div class="col-md-8" style="margin-top:50px;" >
                            <img data-src="" src="../../../assets/global/images/equipos/bomba.png" class="img-responsive" alt="gallery 3">
                    </div> 
                    <div class="col-md-4">
                        <div class="row" style="text-align:center;" >   
                            <h2><strong>Status</strong></h2>
                            <div class="col-md-12" style="text-align:center;">
                                <div class="panel-content  pagination2 ">
                                    <img data-src="" src="../../../assets/global/images/equipos/on.png"  alt="gallery 3">
                                </div> 
                            </div> 
                            <div class="col-md-12" style="text-align:center;">
                                <h2>  <img data-src="" src="../../../assets/global/images/equipos/amarillo.png" alt="gallery 3"></h2>
                            </div> 
                        </div>    
                    </div> 
                </div>    
            </div>
            
        </div>
        <div class="col-lg-3 portlets">
            <div class="panel" style="height:320px;" >
                <div class="panel-header panel-controls">
                    <h3><i class="fa fa-table"></i> <strong>Compresor</strong></h3>
                </div>
                <div class="row">   
                    <div class="col-md-8" style="margin-top:50px;" >
                            <img data-src="" src="../../../assets/global/images/equipos/compresor.png" class="img-responsive" alt="gallery 3">
                    </div> 
                    <div class="col-md-4">
                        <div class="row" style="text-align:center;" >   
                            <h2><strong>Status</strong></h2>
                            <div class="col-md-12" style="text-align:center;">
                                <div class="panel-content  pagination2 ">
                                    <img data-src="" src="../../../assets/global/images/equipos/on.png"  alt="gallery 3">
                                </div> 
                            </div> 
                            <div class="col-md-12" style="text-align:center;">
                                <h2>  <img data-src="" src="../../../assets/global/images/equipos/amarillo.png" alt="gallery 3"></h2>
                            </div> 
                        </div>    
                    </div> 
                </div>    
            </div>
        </div>
        <div class="col-lg-3 portlets">
            <div class="panel" style="height:320px;" >
                <div class="panel-header panel-controls">
                    <h3><i class="fa fa-table"></i> <strong>SCI</strong></h3>
                </div>
                <div class="row" >   
                    <div class="col-md-7" style="margin-top:50px;" >
                        <img data-src="" src="../../../assets/global/images/equipos/rci.png" style="width:-moz-available;" alt="gallery 3">
                    </div> 
                    <div class="col-md-5">
                        <div class="row" style="text-align:center;" >   
                            <h2><strong>Status</strong></h2>
                            <div class="col-md-6">
                                <div class="row" style="text-align:center;" >   
                                    <h4><strong>BP</strong></h4>
                                    <div class="col-md-12" style="text-align:center;">
                                        <h2> <img data-src="" src="../../../assets/global/images/equipos/on.png"  alt="gallery 3"></h2>
                                    </div> 
                                    <div class="col-md-12" style="text-align:center;">
                                        <h2>  <img data-src="" src="../../../assets/global/images/equipos/amarillo.png" alt="gallery 3"></h2>
                                    </div> 
                                </div>    
                            </div> 
                            <div class="col-md-6">
                                <div class="row" style="text-align:center;" >   
                                    <h4><strong>BJ</strong></h4>
                                    <div class="col-md-12" style="text-align:center;">
                                        <h2> <img data-src="" src="../../../assets/global/images/equipos/on.png"  alt="gallery 3"></h2>
                                    </div> 
                                    <div class="col-md-12" style="text-align:center;">
                                        <h2>  <img data-src="" src="../../../assets/global/images/equipos/amarillo.png" alt="gallery 3"></h2>
                                    </div> 
                                </div>    
                            </div> 
                        </div> 
                    </div> 
                </div>    
            </div>
        </div>
        <div class="col-lg-3 portlets">
            <div class="panel" style="height:320px;" >
                <div class="panel-header panel-controls">
                    <h3><i class="fa fa-table"></i> <strong>Generador</strong></h3>
                </div>
                <div class="row">   
                    <div class="col-md-8" style="margin-top:50px;" >
                            <img data-src="" src="../../../assets/global/images/equipos/generador.png" class="img-responsive" alt="gallery 3">
                    </div> 
                    <div class="col-md-4">
                        <div class="row" style="text-align:center;" >   
                            <h2><strong>Status</strong></h2>
                            <div class="col-md-12" style="text-align:center;">
                                <div class="panel-content  pagination2 ">
                                    <img data-src="" src="../../../assets/global/images/equipos/on.png"  alt="gallery 3">
                                </div> 
                            </div> 
                            <div class="col-md-12" style="text-align:center;">
                                <h2>  <img data-src="" src="../../../assets/global/images/equipos/amarillo.png" alt="gallery 3"></h2>
                            </div> 
                        </div>    
                    </div> 
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