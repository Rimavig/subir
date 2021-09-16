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
    $tipo = $_SESSION["tipo"];
    $sucursal = $_SESSION["sucursal"];
    $re = $client->login("Principal", $tipo.",".$sucursal.",".$var1);
    $resultado = "".$re;
    $historial= explode(';',$resultado);
}
?>  



<div class="col-lg-6 portlets">
    <div class="panel">
        <div class="panel-header panel-controls">
            <h3><i class="fa fa-table"></i> <strong>Sucursales</strong></h3>
        </div>
        <div class="panel-content  pagination2 ">
            <div class="filter-left ">
                <table class="table filter-footer table-dynamic table-tools ">
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
