<?php
include ("../../conect.php");
include ("../../autenticacion.php");

if (isset($_POST["var1"])) {
    $var1 = $_POST['var1'];
}
$re = $client->getPerfilRol($_SESSION["id"],"68");
$resultado = "".$re;
$usuarios= explode(',',$resultado);
$exportar="no-descargar";
if($resultado==""){
    ?>
    <a ng-click="reload()">
    <?php
}
foreach($usuarios as $llave => $valores1) {
    if($valores1==="6"){
        $exportar="";
    }
}
?>
<div class="col-lg-12 portlets">
    <div class="panel">
        <div class="panel-header panel-controls">
            <h3><i class="fa fa-table"></i> Reporte de <strong>Tickets Gratuitos</strong> </h3>
        </div>
        <div class="panel-content pagination2 table-responsive">
            <input type="text" name="FCid" id="FCid" class="esconder"  value="<?php echo $var1; ?>" disabled>
            <table class="table <?php echo $exportar; ?>" data-table-name="Funciones" id="table-editable2" >
                <thead>
                    <tr>
                        <th>id_registro</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Cédula</th>
                        <th>Correo</th>
                        <th>Celular</th>
                        <th>Fecha Nacimiento</th>
                        <th>Localidad</th>
                        <th>Cantidad</th>
                        <th>Fecha Registro</th>
                        <th>Fecha Ingreso</th>
                        <th>Estado</th>
                        <th class="text-right">Editar</th>
                    </tr>
                </thead>
                
            </table>
            <div class="modal-footer text-center">
                <button type="reset" class="btn btn-embossed btn-default cancelarTicket" >Atras</button>
                <button type="reset" class="salirRCompra btn btn-embossed btn-danger">Salir</button>
            </div> 
        </div>
    </div>
</div>
<div class="modal fade verMapa" id="verMapa" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-mantenimiento">
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <button data-dismiss="modal" aria-hidden="true">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail">
                                <img id="imagen1" style="width: 500px;" data-src="" src="../../../assets/global/images/mapa/<?php echo $imagen; ?>" class="img-responsive" alt="gallery 3">
                            </div>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>