<?php
include ("../../conect.php");
include ("../../autenticacion.php");
$id_usuario="";
$nombre="";
$tipo="";
$tipoG="";
$escon="";
$var1="";
if (isset($_POST["var1"])) {
    $var1 = $_POST['var1'];
    $re = $client->getRol($var1);
    $resultado = "".$re;
    $usuarios= explode(';;',$resultado);
    foreach($usuarios as $llave => $valores) {
        $usuario =explode(',,,',$valores);
        $tipo=""; 
        if (isset($usuario[1])) {
            $id_usuario=$usuario[0];
            $nombre=$usuario[1];
            $tipo=$usuario[2];
            if($tipo=="Administrador"){
                $tipoG="checked";
            }
        }
            
    }   
}else{
    $escon="hide";
}
?>
<div class="col-md-8 col-sm-8 col-xs-6">
    <div class="form-group">
        <label for="field-1" class="control-label"> Nombre Perfil </label>
        <div class="form-group prepend-icon">
            <input type="text" id="idPerfil" value="<?php echo $var1; ?>" class="esconder">
            <input type="text" name="nombres"  id="nombres" value="<?php echo $nombre; ?>" class="form-control" placeholder="Teatro Sanchez Aguilar" minlength="4"  required>
            <i class="icon-user"></i>
        </div>
    </div>
</div>
<div class="col-md-4 col-sm-4 col-xs-6">
    <div class="form-group">
        <label for="field-1" class="control-label">Administrador</label>
        <div class="form-group ">
            <label class="switch switch-green">
                <input type="checkbox" class="switch-input"  id="admin" <?php echo $tipoG; ?> >
                <span class="switch-label" data-on="On" data-off="Off"></span>
                <span class="switch-handle"></span>
                <span id="estado" class="esconder">ON</span>
            </label>
        </div>
    </div>  
</div>
<?php
$transport->close();
?>