<?php
include ("../../conect.php");
include ("../../autenticacion.php");
$var1="";
if (isset($_POST["var1"])) {
    $var1 = $_POST['var1'];
}

?>
<input type="text" id="idUsuario" class="esconder"  value="<?php echo $var1; ?>" disabled>
<table class="table " data-table-name="Datos de Factura"  id="table-editable1" style="table-layout: fixed;">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombres</th>
            <th>Tipo</th>
            <th>Identificación</th>
            <th>Estado</th>    
            <th class="text-right">Editar</th>
        </tr>
    </thead>
</table>
    