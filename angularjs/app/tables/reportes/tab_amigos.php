<?php
include ("../../conect.php");
include ("../../autenticacion.php");
if (isset($_POST["var1"])) {
    $var1 = $_POST['var1'];
}
$re = $client->getPerfilRol($_SESSION["id"],"69");
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
            <h3><i class="fa fa-table"></i> Reporte de <strong>Puntos Ganados</strong> </h3>
        </div>
        <div class="panel-content pagination2 table-responsive">
            <input type="text" name="FCid" id="FCid" class="esconder"  value="<?php echo $var1; ?>" disabled>
            <table class="table <?php echo $exportar; ?>" data-table-name="Funciones" id="table-editable3" >
                <thead>
                    <tr>
                        <th>id_amigos_puntos</th>
                        <th>Eventos</th>
                        <th>Cantidad Tickets Comprados</th>
                        <th>Puntos gastados</th>
                        <th>Puntos ganados</th>
                        <th>Fecha consumo</th>
                    </tr>
                </thead>
                
            </table>
            <div class="modal-footer text-center">
                <button type="reset" class="btn btn-embossed btn-default cancelarFuncion" >Atras</button>
                <button type="reset" class="salirRCompra btn btn-embossed btn-danger">Salir</button>
            </div> 
        </div>
    </div>
</div>