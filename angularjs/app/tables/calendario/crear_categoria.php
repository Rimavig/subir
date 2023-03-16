<?php
include ("../../conect.php");
include ("../../conect_dashboard.php");
include ("../../autenticacion.php");
$re = $client->getPerfilRol($_SESSION["id"],"74");
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
}

?>
<div class="modal-dialog modal-mantenimiento ">
    <div class="modal-content  ">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
            <h4 class="modal-title"><strong>Crear</strong> categoría</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <label class="control-label">Nombre</label>
                    <input class="form-control form-white" id="nombreC" placeholder="Ingrese categoría" type="text" name="category-name" />
                </div>
                <div class="col-md-6">
                    <label class="control-label">Color</label>
                    <select class="form-control form-white" id="colorC" data-placeholder="Escoger un color..." name="category-color">
                        <option value="bg-verde" >Verde</option>
                        <option value="bg-rojo" >Rojo</option>
                        <option value="bg-azul" >Azul</option>
                        <option value="bg-amarillo" >Amarillo</option>
                        <option value="bg-naranja" >Naranja</option>
                        <option value="bg-rosado" >Rosado</option>
                        <option value="bg-morado" >Morado</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="modal-footer text-center">
            <button type="button" class="btn btn-default btn-embossed" data-dismiss="modal">Salir</button>
            <button type="button" class="btn btn-danger btn-embossed crear_category <?php echo $crear; ?>">Guardar</button>
        </div>
    </div>
</div>
<?php
$transport->close();
$transport2->close();
?>