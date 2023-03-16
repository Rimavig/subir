<?php
include ("../../conect.php");
include ("../../autenticacion.php");
$var1="";
if (isset($_POST["var1"])) {
    $var1 = $_POST['var1'];
}

?>
<div class="col-lg-12 portlets">
    <div class="panel">
        <div class="panel-header panel-controls">
            <h3><i class="fa fa-table"></i> Tabla de <strong>Facturación de Usuarios Clientes</strong> </h3>
        </div>
        <div class="panel-content pagination2 table-responsive">
            <div class="m-b-20">
                <div class="btn-group">
                    <button class="crearF btn btn-sm btn-dark"  href="javascript:;"><i class="fa fa-plus"></i> Facturación</button>
                </div>
            </div>
            <input type="text" id="idUsuario" class="esconder"  value="<?php echo $var1; ?>" disabled>
            <table class="table " data-table-name="Datos de Factura"  id="table-editable1" style="table-layout: fixed;">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombres</th>
                        <th>Tipo</th>
                        <th>Identificación</th>
                        <th>Correo</th>
                        <th>Direccion</th>
                        <th>Estado</th>    
                        <th class="text-right">Editar</th>
                    </tr>
                </thead>
            </table>
            <div class="modal-footer text-center">
                <button type="button"  class="btn btn-embossed btn-default cancelar ">Cancelar</button>
            </div> 
        </div>
    </div>
</div>

<?php
$transport->close();
?>