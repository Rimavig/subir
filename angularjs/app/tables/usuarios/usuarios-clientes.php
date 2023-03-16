<?php
include ("../../conect.php");
include ("../../autenticacion.php");
$re = $client->getPerfilRol($_SESSION["id"],"2");
$resultado = "".$re;
$usuarios= explode(',',$resultado);
$crear="hide";
$exportar="no-descargar";
if($resultado==""){
    ?>
    <a ng-click="reload()">
    <?php
}
foreach($usuarios as $llave => $valores1) {
    if($valores1==="1"){
        $crear="";
    }
    if($valores1==="6"){
        $exportar="";
    }
}
?>
<div>
    <div class="row clientes">
        <div class="col-lg-12 portlets">
            <div class="panel">
                <div class="panel-header panel-controls">
                    <h3><i class="fa fa-table"></i> Tabla de <strong>Usuarios Clientes</strong> </h3>
                </div>
                <div class="panel-content pagination2 table-responsive">
                    <div class="m-b-20 <?php echo $crear; ?>">
                        <div class="btn-group">
                            <button class="crearC btn btn-sm btn-dark"  href="javascript:;"><i class="fa fa-plus"></i> Agregar Usuario</button>
                        </div>
                    </div>
                    <table class="table filter-footer clientes_data <?php echo $exportar; ?> table-dynamic table-tools1C " data-table-name="Usuarios" id="table-editable" style="table-layout: fixed;">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Usuario</th>
                                <th>Cedula</th>
                                <th>Correo</th>
                                <th>Sexo</th>
                                <th>Puntos acum</th>
                                <th>Celular</th>
                                <th>Fecha Nacimiento</th>
                                <th>Dirección</th>
                                <th>Amigo teatro</th>
                                <th>Fecha Creación</th>
                                <th>Estado</th>    
                                <th class="text-right">Editar</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th >Id</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Usuario</th>
                                <th>Cedula</th>
                                <th>Correo</th>
                                <th>Sexo</th>
                                <th>Puntos acumulados</th>
                                <th>Celular</th>
                                <th>Fecha Nacimiento</th>
                                <th>Dirección</th>
                                <th>Amigo teatro</th>
                                <th>Fecha Creación</th>
                                <th>Estado</th>    
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade Cusuarios"  data-keyboard="false" data-backdrop="static" id="Cusuarios" aria-hidden="true">
    </div>
    <div class="factura hide" id="factura">
        
    </div>
    <div class="alerta" id="alerta" >
    </div>
    <div class="footer">
        <p class="copyright">
                <span>Copyright © 2022 </span><span> Teatro Sanchez Aguilar </span><span>- Powered by Vion IoT Solutions. All rights reserved.</span>
            </p>
    </div>
</div>
<?php
$transport->close();
?>