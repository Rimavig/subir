<?php
include ("../../conect_taquilla.php");
include ("../../autenticacion.php");
$var1="";
$var2="disabled";
if (isset($_POST["var1"])) {
    $var1 = $_POST['var1'];
    if($var1==1){
        $var2="";
    }
    $re = $client3->actualizarUsuario($var1, $_SESSION["id"]);
    $re = $client3->getFacturacion($var1);
    $resultado = "".$re;
    $historial= explode(';;',$resultado);
    foreach($historial as $llave => $valores) {
        $datos =explode(',,,',$valores);
        if (isset($datos[6])) {
            $tipo=$datos[5];
            if($tipo=="C"){
                $nombres=$datos[1]." ".$datos[2];
                $identificacion=$datos[3];
            }else if($tipo=="P"){
                $nombres=$datos[1]." ".$datos[2];
                $identificacion=$datos[3];

            }else{
                $nombres=$datos[4];
                $identificacion=$datos[9];
            }
            $direccion=$datos[6];
            $correo=$datos[7];
            $idUsuario=$datos[10];
        }
    }
}
?>
<div class="row">
    <input type="text" id="idFacturacionG" class="esconder"  value="<?php echo $var1; ?>" disabled>   
    <div class="col-md-3">
        <div class="form-group">
            <label for="field-1" class="control-label">Tipo</label>
            <select name ="tipoG" class="form-control" style="width:100%;" id="tipo">
                <?php
                if($tipo=="C"){
                ?>
                    <option value="cedula" selected> Cédula</option>                                     
                <?php
                }else if($tipo=="R"){
                    ?>
                    <option value="ruc" selected> Ruc</option>                                
                <?php
                }else{
                ?>
                    <option value="pasaporte" selected> Pasaporte</option>                                
                <?php
                }
                ?>
            </select>
        </div>
    </div>  
    <?php
    if($var1==1){
        ?> 
        <input type="text" id="idUsuario" class="esconder"  value="<?php echo $var1; ?>" disabled>
        <?php
    }else{
        ?> 
        <input type="text" id="idUsuario" class="esconder"  value="<?php echo $idUsuario; ?>" disabled>
        <?php
    }
    ?>
    <div class="col-md-6">
        <div class="form-group">
            <label for="field-1" class="control-label">Nombres</label>
            <div class="form-group prepend-icon">
                <input type="text" name="nombres" id="nombresG" class="form-control"  value="<?php echo $nombres; ?>" placeholder="Teatro Sanchez Aguilar"  disabled>
                <i class="icon-user"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3 ">
        <div class="form-group">
            <label for="field-3" class="control-label">Identificación</label>
            <input type="text" name="cedula" class="form-control" id="cedulaG"  value="<?php echo $identificacion; ?>" placeholder="0911111111" disabled>
        </div>
    </div>
</div>
<div class="row">               
    <div class="col-md-6">
        <div class="form-group">
            <label for="field-1" class="control-label">Correo Fáctura</label>
            <div class="form-group prepend-icon">
                <input type="email" name="correo"  id="correoG"  class="form-control"  value="<?php echo $correo; ?>"  placeholder="tsa@hotmail.com" minlength="5" <?php echo $var2; ?>>
                <i class="icon-map"></i>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="field-1" class="control-label">Dirección</label>
            <div class="form-group prepend-icon">
                <input type="text" name="direccion"  id="direccionG"  class="form-control"   value="<?php echo $direccion; ?>" placeholder="Samborondom" minlength="5"  disabled>
                <i class="icon-map"></i>
            </div>
        </div>
    </div>
</div>
       
<?php
$transport3->close();
?>