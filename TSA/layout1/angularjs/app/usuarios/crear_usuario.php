<?php
include ("../conect.php");
include ("../autenticacion.php");

$re1 = $client->getAllCiudadelas($_SESSION["usuario"]);
$resultado1 = "".$re1;
$ciudadelas= explode(';',$resultado1);
$var1="";
$editar="";
$tipo="";
?>
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
            <h4 class="modal-title">Crear <strong>Usuario</strong> </h4>
        </div>
        <div class="modal-body">
            <p>Crear Usuario Residente</p>
            <form role="form" class=" form-validation">
                <div class="row">  
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Nombres</label>
                            <div class="form-group prepend-icon">
                                <input type="text" name="nombres" id="nombres" class="form-control"   placeholder="Manrique S.A" minlength="5" required>
                                <i class="icon-user"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field-1" class="control-label"> Apellidos </label>
                            <div class="form-group prepend-icon">
                                <input type="text" name="apellidos" id="apellidos" class="form-control"  placeholder="Sanchez Aguilar" minlength="4"  required>
                                <i class="icon-user"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Ciudadela</label>
                            <select name ="ciudadela" class="form-control" style="width:100%;" id="ciudadela">
                                <?php
                                foreach($ciudadelas as $llave => $valores1) {
                                    $datos1 =explode(',,,',$valores1);
                                    $valor="";
                                    if (isset($datos1[1])) {
                                ?>
                                <option value="<?php echo $datos1[0]; ?>"><?php echo $datos1[1]; ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field-3" class="control-label">Cédula</label>
                            <input type="text" name="cedula" class="form-control" id="cedula"   placeholder="0911111111" minlength="10" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Celular</label>
                            <div class="form-group prepend-icon">
                                <input type="text" name="celular" class="form-control" id="celular"   placeholder="0911111111" minlength="10"  required>
                                <i class="icon-screen-smartphone"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Correo</label>
                            <div class="form-group prepend-icon">
                                <input type="email" name="correo" class="form-control" id="correo"   placeholder="manrique@hotmail.com" minlength="3"  required>
                                <i class="icon-envelope"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Ingreso</label>
                            <div class="form-group ">
                                <label class="switch switch-green">
                                    <input  type="checkbox" class="switch-input amigos"  id="boxI"  >
                                    <span class="switch-label" data-on="On" data-off="Off"></span>
                                    <span class="switch-handle"></span>
                                    <span id="estadoI" class="esconder">OFF</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Invitación</label>
                            <div class="form-group ">
                                <label class="switch switch-green">
                                    <input  type="checkbox" class="switch-input amigos"  id="boxV" >
                                    <span class="switch-label" data-on="On" data-off="Off"></span>
                                    <span class="switch-handle"></span>
                                    <span id="estadoV" class="esconder">OFF</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-center">
                    <button class="btn btn-primary btn-embossed bnt-square crear_usuario"  ><i class="fa fa-check"></i> Crear</button>
                    <button type="button" class="btn btn-embossed btn-default " data-dismiss="modal" aria-hidden="true">Cancelar</button>
                    <button type="reset" class="btn btn-embossed btn-default">Limpiar</button>
                </div>
            </form>    
        </div>
        
    </div>
</div>
<?php
$transport->close();
?>