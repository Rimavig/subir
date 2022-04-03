<?php
include ("../conect.php");
include ("../autenticacion.php");
$re = $client->getAllInvitacionV($_SESSION["usuario"]);
$resultado= "".$re;
$usuarios =explode(';',$resultado);

?>
<div>
    <div class="row">
        <div class="col-lg-12 portlets">
            <div class="panel">
                <div class="panel-header panel-controls">
                    <h3><i class="fa fa-table"></i> Tabla de <strong>Ingreso de Visitantes Recurrentes</strong> </h3>
                </div>
                <div class="panel-content pagination2 table-responsive">
                    <table class="table filter-footer table-dynamic table-tools " data-table-name="Ingreso de Visitantes Recurrentes" id="table-editable" style="table-layout: fixed;">
                        <thead>
                            <tr>
                                <th>Nombre Residente</th>
                                <th>Celular Residente</th>
                                <th>Cedula Residente</th>
                                <th>Nombre Visitante</th>
                                <th>Celular Visitante</th>
                                <th>Ciudadela</th>
                                <th>Fecha</th>
                                <th>Puerta</th>    
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach($usuarios as $llave => $valores) {
                                $usuario =explode(',,,',$valores);
                                $estado="";
                                $estadoT="OFF";
                                if (isset($usuario[2])) {
                            ?>
                            <tr>
                                <td> <?php if (isset($usuario[2])) {echo $usuario[2]; }  ?> </td>
                                <td> <?php if (isset($usuario[3])) {echo $usuario[1]; }  ?> </td>
                                <td> <?php if (isset($usuario[1])) {echo $usuario[3]; }  ?> </td>
                                <td> <?php if (isset($usuario[5])) {echo $usuario[4]; }  ?> </td>
                                <td> <?php if (isset($usuario[7])) {echo $usuario[5]; }  ?> </td>
                                <td> <?php if (isset($usuario[7])) {echo $usuario[6]; }  ?> </td>
                                <td> <?php if (isset($usuario[7])) {echo $usuario[7]; }  ?> </td>
                                <td> <?php if (isset($usuario[7])) {echo $usuario[8]; }  ?> </td>
                            </tr>
                            <?php
                             }
                            }
                            $transport->close();
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nombre Residente</th>
                                <th>Celular Residente</th>
                                <th>Cedula Residente</th>
                                <th>Nombre Visitante</th>
                                <th>Celular Visitante</th>
                                <th>Ciudadela</th>
                                <th>Fecha</th>
                                <th>Puerta</th>  
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="copyright">
            <p class="pull-left sm-pull-reset">
                <span>Copyright © 2021 </span><span> VION IoT Solutions</span>.<span>Todos los derechos reservados.</span>
            </p>
            <p class="pull-right sm-pull-reset">
                <span><a href="https://qr-ticket.app/" target="_blank" class="m-r-10">Support</a>  | <a href="https://qr-ticket.app/privacy.html" target="_blank" class="m-l-10">Privacy Policy</a></span>
            </p>
        </div>
    </div>
</div>