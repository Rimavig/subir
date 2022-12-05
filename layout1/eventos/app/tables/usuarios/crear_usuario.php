<?php
include ("../../conect.php");
include ("../../autenticacion.php");

$re1 = $client->getAllPerfil();
$resultado1 = "".$re1;
$perfil= explode(';;',$resultado1);
$var1="";
$editar="";
$tipo="";
if ($_POST["tipo"]==="admin") {
    $tipo="Administrador";
    $editar="crear_usuario";
}else if ($_POST["tipo"]==="evento") {
    $tipo="Evento";
    $editar="crear_usuarioE";
}  
$M="";
$F="";

?>
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
            <h4 class="modal-title">Crear <strong>Usuario</strong> </h4>
        </div>
        <div class="modal-body">
            <p>Crear Usuario <?php echo $tipo; ?> al Sistema</p>
           
                <div class="row">  
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="field-1" class="control-label"> Nombres </label>
                            <div class="form-group prepend-icon">
                                <input type="text" name="nombres" ng-model="usuario.nombres" id="nombres" class="form-control" placeholder="Teatro Sanchez Aguilar" minlength="4"  required>
                                <i class="icon-user"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="field-1" class="control-label"> Apellidos </label>
                            <div class="form-group prepend-icon">
                                <input type="text" name="apellidos" ng-model="usuario.apellidos" id="apellidos" class="form-control" placeholder="Sanchez Aguilar" minlength="4"  required>
                                <i class="icon-user"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Usuario</label>
                            <div class="form-group prepend-icon">
                                <input type="text" name="usuario" ng-model="usuario.usuario" id="usuario"  class="form-control"   placeholder="TSA" minlength="3"  required>
                                <i class="icon-user"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-3" class="control-label">Cédula</label>
                            <input type="text" name="cedula" class="form-control" ng-model="usuario.cedula" id="cedula"   placeholder="0911111111" minlength="10" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Celular</label>
                            <div class="form-group prepend-icon">
                                <input type="text" name="celular" class="form-control" ng-model="usuario.celular" id="celular"   placeholder="0911111111" minlength="10"  required>
                                <i class="icon-screen-smartphone"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Correo</label>
                            <div class="form-group prepend-icon">
                                <input type="email" name="correo" class="form-control" ng-model="usuario.correo" id="correo"   placeholder="tsa@hotmail.com" minlength="3" required>
                                <i class="icon-envelope"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Sexo</label>
                            <select name ="sexo" ng-model="usuario.sexo" class="form-control" style="width:100%;" id="sexo">
                                <option value="M" >Masculino</option>
                                <option value="F" >Femenino</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Dirección</label>
                            <div class="form-group prepend-icon">
                                <input type="text" name="direccion" ng-model="usuario.direccion" id="direccion"  class="form-control"   placeholder="Samborondom" minlength="5"  required>
                                <i class="icon-map"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Fecha Nacimiento</label>
                            <div class="form-group prepend-icon">
                                <input type="date" name="fecha" id="fecha" ng-model="usuario.fecha" class="form-control" style="padding: 0px 30px;"   placeholder="07/08/1995" id="nacimiento" required>
                                <i class="icon-calendar"></i>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-4" class="control-label">Perfil</label>
                            <select name ="perfil" class="form-control" ng-model="usuario.perfil" style="width:100%;" id="perfil">
                                <?php
                                foreach($perfil as $llave => $valores1) {
                                    $datos1 =explode(',,,',$valores1);
                                    $valor="";
                                    if (isset($datos1[1]) && $datos1[4]=="A") {
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
                
                
                <div class="modal-footer text-center">
                    <button class="crear_usuario btn btn-primary btn-embossed bnt-square "  ><i class="fa fa-check"></i> Crear</button>
                    <button type="button" class="btn btn-embossed btn-default " data-dismiss="modal" aria-hidden="true">Cancelar</button>
                </div>
        
        </div>
        
    </div>
</div>
<?php
$transport->close();
?>