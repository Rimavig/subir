<?php
include ("../../conect.php");
include ("../../autenticacion.php");

$var1="";
$editar="";
if (isset($_POST["var1"])) {
    $var1 = $_POST['var1'];
    $re = $client->getUsuarioCliente($var1);
    $resultado = "".$re;
    $historial= explode(';;',$resultado);
    foreach($historial as $llave => $valores) {
        $datos =explode(',,,',$valores);
        if (isset($datos[1])) {
            $nombre=$datos[1];
            $apellido=$datos[2];
            $cedula=$datos[4];
            $correo=$datos[6];
            $direccion=$datos[10];
        }
    }
}
?>
<div class="modal-dialog modal-mantenimiento">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
            <h4 class="modal-title">Crear <strong>Facturación</strong> </h4>
        </div>
        <div class="modal-body">
                <div class="row">
                    <input type="text" name="id" id="id" class="esconder"  value="<?php echo $var1; ?>" disabled>   
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Tipo</label>
                            <select name ="tipo" class="form-control" style="width:100%;" id="tipo">
                                    <option value="cedula" > Cédula</option>                                
                                    <option value="ruc" > Ruc</option>                                
                                    <option value="pasaporte" > Pasaporte</option>                                
                            </select>
                        </div>
                    </div>  
                    <div class="col-md-12 nombres">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Nombres</label>
                            <div class="form-group prepend-icon">
                                <input type="text" name="nombres" id="nombres" class="form-control"  value="<?php echo $nombre; ?>" placeholder="Teatro Sanchez Aguilar" minlength="5" id="nombres" required>
                                <i class="icon-user"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 nombres">
                        <div class="form-group">
                            <label for="field-1" class="control-label"> Apellidos </label>
                            <div class="form-group prepend-icon">
                                <input type="text" name="apellidos" id="apellidos" class="form-control"  value="<?php echo $apellido; ?>" placeholder="Sanchez Aguilar" minlength="4" id="apellidos" required>
                                <i class="icon-user"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-12 cedula">
                        <div class="form-group">
                            <label for="field-3" class="control-label">Cédula</label>
                            <input type="text" name="cedula" class="form-control" id="cedula"  placeholder="0911111111"  value="<?php echo $cedula; ?>" minlength="10" required>
                        </div>
                    </div>
                    <div class="col-md-12  ruc hide">
                        <div class="form-group">
                            <label for="field-3" class="control-label">Razón Social</label>
                            <input type="text" name="razon" class="form-control" id="razon"   placeholder="Teatro Sanchez Aguilar" minlength="10" required>
                        </div>
                    </div>
                    <div class="col-md-12 ruc hide">
                        <div class="form-group">
                            <label for="field-3" class="control-label">Ruc</label>
                            <input type="text" name="ruc" class="form-control" id="ruc"   value="<?php echo $cedula."001"; ?>" placeholder="0911111111001" minlength="10" required>
                        </div>
                    </div>
                    <div class="col-md-12 pasaporte hide">
                        <div class="form-group">
                            <label for="field-3" class="control-label">Pasaporte</label>
                            <input type="text" name="pasaporte" class="form-control" id="pasaporte"  value="<?php echo $cedula; ?>"  placeholder="0911111111" minlength="10" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Correo Fáctura</label>
                            <div class="form-group prepend-icon">
                                <input type="email" name="correo"  id="correoF"  class="form-control"   value="<?php echo $correo; ?>" placeholder="tsa@hotmail.com"" minlength="5"  required>
                                <i class="icon-map"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Dirección</label>
                            <div class="form-group prepend-icon">
                                <input type="text" name="direccion"  id="direccionF"  class="form-control"  value="<?php echo $direccion; ?>"  placeholder="Samborondom" minlength="5"  required>
                                <i class="icon-map"></i>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="modal-footer text-center">
                    <button class="btn btn-primary btn-embossed bnt-square crear_facturacion"  ><i class="fa fa-check"></i> Crear</button>
                    <button type="button" class="btn btn-embossed btn-default " data-dismiss="modal" aria-hidden="true">Cancelar</button>
                </div>
        </div>
        
    </div>
</div>
<?php
$transport->close();
?>