<?php
include ("../conect.php");
include ("../autenticacion.php");
$var="";
$var1="";
$var2="";
$var3="";
$var4="";
if (isset($_POST["var1"])) {
    $var1 = $_POST['var1'];
    $re = $client->login("principal",$var1);
    $resultado = "".$re;
    $historial= explode(';;',$resultado);
}

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
              <div class="panel-content">
                  <table class="table table-tools dataTable" id="table-editable">
                      <thead>
                          <tr>
                              <th>Sucursal</th>
                              <th>Tanques</th>
                              <th>Nivel Actual</th>
                              <th>Disponibilidad</th>
                              <th class="text-right">Action</th>
                          </tr>
                      </thead>
                      <tbody >
                          <tr>
                              <td>Smith</td>
                              <td>John</td>
                              <td>435</td>
                              <td>super Admin</td>
                              <td class="text-right">
                                  <a class="edit btn btn-sm btn-default" href="javascript:;"><i class="icon-note"></i></a>  
                              </td>
                          </tr>
                          <tr>
                              <td>Johnson</td>
                              <td>Alexa</td>
                              <td>220</td>
                              <td>super Admin</td>
                              <td class="text-right">
                                  <a class="edit btn btn-sm btn-default" href="javascript:;"><i class="icon-note"></i></a>  
                              </td>
                          </tr>
                          <tr>
                              <td>Brown</td>
                              <td>Bobby</td>
                              <td>545</td>
                              <td>super Admin</td>
                              <td class="text-right">
                                  <a class="edit btn btn-sm btn-default" href="javascript:;"><i class="icon-note"></i></a>  
                              </td>
                          </tr>
                          <tr>
                              <td>Miller</td>
                              <td>James</td>
                              <td>525</td>
                              <td>ipsume dolor</td>
                              <td class="text-right">
                                  <a class="edit btn btn-sm btn-default" href="javascript:;"><i class="icon-note"></i></a>  
                              </td>
                          </tr>
                          <tr>
                              <td>Harris</td>
                              <td>Samantha</td>
                              <td>567</td>
                              <td class="center">nothing</td>
                              <td class="text-right">
                                  <a class="edit btn btn-sm btn-default" href="javascript:;"><i class="icon-note"></i></a>  
                              </td>
                          </tr>
                          <tr>
                              <td>Thomson</td>
                              <td>Scott</td>
                              <td>435</td>
                              <td>super Admin</td>
                              <td class="text-right">
                                  <a class="edit btn btn-sm btn-default" href="javascript:;"><i class="icon-note"></i></a>  
                              </td>
                          </tr>
                          <tr>
                              <td>Aishmen</td>
                              <td>Samuel</td>
                              <td>435</td>
                              <td>super Admin</td>
                              <td class="text-right">
                                  <a class="edit btn btn-sm btn-default" href="javascript:;"><i class="icon-note"></i></a>  
                              </td>
                          </tr>
                          <tr>
                              <td>Addams</td>
                              <td>Kim</td>
                              <td>435</td>
                              <td>super Admin</td>
                              <td class="text-right">
                                  <a class="edit btn btn-sm btn-default" href="javascript:;"><i class="icon-note"></i></a>  
                              </td>
                          </tr>
                          <tr>
                              <td>Morris</td>
                              <td>Heather</td>
                              <td>987</td>
                              <td>ipsume dolor</td>
                              <td class="text-right">
                                  <a class="edit btn btn-sm btn-default" href="javascript:;"><i class="icon-note"></i></a>  
                              </td>
                          </tr>
                          <tr>
                              <td>Aster</td>
                              <td>Fred</td>
                              <td>567</td>
                              <td class="center">nothing</td>
                              <td class="text-right">
                                  <a class="edit btn btn-sm btn-default" href="javascript:;"><i class="icon-note"></i></a>  
                              </td>
                          </tr>
                          <tr>
                              <td>Carry</td>
                              <td>John</td>
                              <td>987</td>
                              <td>ipsume dolor</td>
                              <td class="text-right">
                                  <a class="edit btn btn-sm btn-default" href="javascript:;"><i class="icon-note"></i></a> 
                              </td>
                          </tr>
                          <tr>
                              <td>Paul</td>
                              <td>Billy</td>
                              <td>567</td>
                              <td class="center">nothing</td>
                              <td class="text-right">
                                  <a class="edit btn btn-sm btn-default" href="javascript:;"><i class="icon-note"></i></a>  
                              </td>
                          </tr>
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
    </div>
    <div class="col-lg-6 portlets">
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
    </div>
</div>
<div class="footer">
    <p class="copyright">
                <span>Copyright © 2022 </span><span> Teatro Sanchez Aguilar </span><span>- Powered by Vion IoT Solutions. All rights reserved.</span>
            </p>
</div>