<?php
include ("../../conect.php");
include ("../../autenticacion.php");
$re = $client->getPerfilRol($_SESSION["id"],"1");
$resultado = "".$re;
$usuarios= explode(',',$resultado);
$crear="hide";
$exportar="no-descargar";
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
    <div class="row">
        <div class="col-lg-12 portlets">
            <div class="panel">
                <div class="panel-header panel-controls">
                    <h3><i class="fa fa-table"></i> Tabla de <strong>Usuarios Administradores</strong> </h3>
                </div>
                <div class="panel-content pagination2 table-responsive">
                    <div class="m-b-20  <?php echo $crear; ?>">
                        <div class="btn-group">
                            <button class="crear btn btn-sm btn-dark" ><i class="fa fa-plus"></i> Agregar Usuario</button>
                        </div>
                    </div>
                    <table class="table filter-footer usuarios_data <?php echo $exportar; ?> table-dynamic table-tools1 " data-table-name="Usuarios" id="table-editable" style="table-layout: fixed;">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Usuario</th>
                                <th>Cedula</th>
                                <th>Correo</th>
                                <th>Celular</th>
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
                                <th>Celular</th>
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
    <div class="alerta" id="alerta" >
    </div>
    <div class="footer">
        <p class="copyright">
                <span>Copyright © 2022 </span><span> Teatro Sanchez Aguilar </span><span>- Powered by Vion IoT Solutions. All rights reserved.</span>
            </p>
    </div>
</div>