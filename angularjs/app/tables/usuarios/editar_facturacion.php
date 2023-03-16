<?php
include ("../../conect.php");
include ("../../autenticacion.php");

$var1="";
$var2="";
$var3="";
$var4="";
$var5="";
$editar="";
if (isset($_POST["var1"])) {
    $var1 = $_POST['var1'];
    $re = $client->getFacturacion($var1);
    $resultado = "".$re;
    $historial= explode(';;',$resultado);
}
$idUsuario="";
foreach($historial as $llave => $valores) {
    $nombre="";
    $apellido=""; 
    $cedula="";      
    $pasaporte=""; 
    $razon=""; 
    $ruc=""; 
    $datos =explode(',,,',$valores);
    if (isset($datos[6])) {
        $tipo=$datos[5];
        if($tipo=="C"){
            $nombre=$datos[1];
            $apellido=$datos[2];
            $cedula=$datos[3];
            $ruc=$datos[3]."001";
            $pasaporte=$datos[3];
            $var2="";
            $var3="";
            $var4="hide";
            $var5="hide";
        }else if($tipo=="P"){
            $nombre=$datos[1];
            $apellido=$datos[2];
            $cedula=$datos[3];
            $pasaporte=$datos[3];
            $var2="";
            $var3="hide";
            $var4="";
            $var5="hide";
        }else{
            $razon=$datos[4];
            $ruc=$datos[9];
            
            $var2="hide";
            $var3="hide";
            $var4="hide";
            $var5="";
        }
        $idUsuario=$datos[10];
        $direccion=$datos[6];
        $correo=$datos[7];
        $estado=$datos[8];
?>
<div class="modal-dialog modal-mantenimiento">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
            <h4 class="modal-title">Editar <strong>Facturación</strong> </h4>
        </div>
        <div class="modal-body">
                <div class="row">
                    <input type="text" name="id" id="id" class="esconder"  value="<?php echo $var1; ?>" disabled> 
                    <input type="text" name="idUsuario" id="idUsuario" class="esconder"  value="<?php echo $idUsuario; ?>" disabled>     
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Tipo</label>
                            <select name ="tipo" class="form-control" style="width:100%;" id="tipo">
                                <?php
                                if($tipo=="C"){
                                ?>
                                    <option value="cedula" selected> Cédula</option> 
                                    <option value="ruc" > Ruc</option> 
                                    <option value="pasaporte"> Pasaporte</option>                                        
                                <?php
                                }else if($tipo=="R"){
                                    ?>
                                    <option value="cedula" > Cédula</option> 
                                    <option value="ruc" selected> Ruc</option>
                                    <option value="pasaporte" > Pasaporte</option>                                    
                                <?php
                                }else{
                                ?>
                                    <option value="cedula"> Cédula</option> 
                                    <option value="ruc" > Ruc</option> 
                                    <option value="pasaporte" selected> Pasaporte</option>                                
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>  
                    <div class="col-md-12 nombres <?php echo $var2; ?>">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Nombres</label>
                            <div class="form-group prepend-icon">
                                <input type="text" name="nombres" id="nombres" class="form-control"  value="<?php echo $nombre; ?>" placeholder="Teatro Sanchez Aguilar" minlength="5" id="nombres" required>
                                <i class="icon-user"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 nombres <?php echo $var2; ?>">
                        <div class="form-group">
                            <label for="field-1" class="control-label"> Apellidos </label>
                            <div class="form-group prepend-icon">
                                <input type="text" name="apellidos" id="apellidos" class="form-control" value="<?php echo $apellido; ?>" placeholder="Sanchez Aguilar" minlength="4" id="apellidos" required>
                                <i class="icon-user"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-12 cedula <?php echo $var3; ?>">
                        <div class="form-group">
                            <label for="field-3" class="control-label">Cédula</label>
                            <input type="text" name="cedula" class="form-control" id="cedula"  value="<?php echo $cedula; ?>" placeholder="0911111111" minlength="10" required>
                        </div>
                    </div>
                    <div class="col-md-12  ruc <?php echo $var5; ?>">
                        <div class="form-group">
                            <label for="field-3" class="control-label">Razón Social</label>
                            <input type="text" name="razon" class="form-control" id="razon"  value="<?php echo $razon; ?>" placeholder="Teatro Sanchez Aguilar" minlength="10" required>
                        </div>
                    </div>
                    <div class="col-md-12 ruc <?php echo $var5; ?>">
                        <div class="form-group">
                            <label for="field-3" class="control-label">Ruc</label>
                            <input type="text" name="ruc" class="form-control" id="ruc"  value="<?php echo $ruc; ?>" placeholder="0911111111001" minlength="10" required>
                        </div>
                    </div>
                    <div class="col-md-12 pasaporte <?php echo $var4; ?> ">
                        <div class="form-group">
                            <label for="field-3" class="control-label">Pasaporte</label>
                            <input type="text" name="pasaporte" class="form-control" id="pasaporte"  value="<?php echo $pasaporte; ?>" placeholder="0911111111001" minlength="10" required>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Correo Fáctura</label>
                            <div class="form-group prepend-icon">
                                <input type="email" name="correo"  id="correoF"  class="form-control"  value="<?php echo $correo; ?>"  placeholder="tsa@hotmail.com"" minlength="5"  required>
                                <i class="icon-map"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Dirección</label>
                            <div class="form-group prepend-icon">
                                <input type="text" name="direccion"  id="direccionF"  class="form-control"   value="<?php echo $direccion; ?>" placeholder="Samborondom" minlength="5"  required>
                                <i class="icon-map"></i>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="modal-footer text-center">
                    <button class="btn btn-primary btn-embossed bnt-square editar_facturacion"  ><i class="fa fa-check"></i> Editar</button>
                    <button type="button" class="btn btn-embossed btn-default " data-dismiss="modal" aria-hidden="true">Cancelar</button>
                </div>
        </div>
        
    </div>
</div>
<?php
}}
$transport->close();
?>