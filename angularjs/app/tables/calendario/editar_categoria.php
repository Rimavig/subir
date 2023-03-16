<?php
include ("../../conect.php");
include ("../../conect_dashboard.php");
include ("../../autenticacion.php");

$re = $client->getPerfilRol($_SESSION["id"],"74");
$resultado = "".$re;
$usuarios1= explode(',',$resultado);
$editar="hide";
foreach($usuarios1 as $llave => $valores1) {
    if($valores1==="2"){
        $editar='';
    }
}
$re = $client2->getGeneral2("CalendarioC",$_POST["var1"]);
$resultado= "".$re;
$usuario =explode(',,,',$resultado);
$var1="";
$var2="";
$var3="";
$var4="";
$var5="";
if ($usuario[2]=="bg-success") {
    $var1="selected";
} 
if ($usuario[2]=="bg-red") {
    $var2="selected";
}  
if ($usuario[2]=="bg-blue") {
    $var3="selected";
}  
if ($usuario[2]=="bg-warning") {
    $var4="selected";
}  
if ($usuario[2]=="bg-dark") {
    $var5="selected";
}  
?>
<div class="modal-dialog modal-mantenimiento ">
    <div class="modal-content  ">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
            <h4 class="modal-title"><strong>Editar</strong> categoría</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <label class="control-label">Nombre</label>
                    <input class="esconder" id="idCategoriaE" value="<?php echo $usuario[0];?>" />
                    <input class="form-control form-white" id="nombreC" placeholder="Ingrese categoría" value="<?php echo $usuario[1];?>" type="text" name="category-name" />
                </div>
                <div class="col-md-6">
                    <label class="control-label">Color</label>
                    <select class="form-control form-white" id="colorC" data-placeholder="Escoger un color..." name="category-color">
                        <option value="bg-verde" <?php echo $var1;?>>Verde</option>
                        <option value="bg-rojo" <?php echo $var2;?>>Rojo</option>
                        <option value="bg-azul" <?php echo $var3;?>>Azul</option>
                        <option value="bg-amarillo" <?php echo $var4;?>>Amarillo</option>
                        <option value="bg-naranja" <?php echo $var4;?>>Naranja</option>
                        <option value="bg-rosado" <?php echo $var4;?>>Rosado</option>
                        <option value="bg-morado" <?php echo $var4;?>>Morado</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="modal-footer text-center">
            <button type="button" class="btn btn-default btn-embossed" data-dismiss="modal">Salir</button>
            <button type="button" class="btn btn-danger btn-embossed editar_category <?php echo $editar; ?>" data-dismiss="modal">Guardar</button>
        </div>
    </div>
</div>
<?php
$transport->close();
$transport2->close();
?>