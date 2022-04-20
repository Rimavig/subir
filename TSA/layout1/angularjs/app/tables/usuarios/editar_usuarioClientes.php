<?php
include ("../../conect.php");
include ("../../autenticacion.php");

$tipo="";     
if ($_POST["tipo"]==="cliente") {
    $tipo="Cliente";
    if (isset($_POST["var1"])) {
        $var1 = $_POST['var1'];
        $re = $client->getUsuarioCliente($var1);
        $resultado = "".$re;
        $historial= explode(';',$resultado);
    }
}  
$M="";
$F="";
foreach($historial as $llave => $valores) {
    $datos =explode(',,,',$valores);
    if (isset($datos[1])) {
        $nombre=$datos[1];
        $apellido=$datos[2];
        $usuario=$datos[3];
        $cedula=$datos[4];
        if($datos[5]=="M"){
            $M="selected";
            $F="";
        }else{
            $F="selected";
            $M="";
        }
        $correo=$datos[6];
        $celular=$datos[7];
        $contrasena=$datos[8];
        $fechaNacimiento=$datos[9];
        $direccion=$datos[10];
        $amigos=$datos[11];
        $estado="";
        $estadoT="OFF";
        if ($amigos=="S" ) {
            $estado="checked";
            $estadoT="ON";
        } 
?>
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
            <h4 class="modal-title">Editar <strong>Usuario</strong> </h4>
        </div>
        <div class="modal-body">
            <p>Editar Usuario <?php echo $tipo; ?></p>
                <div class="row">
                    <input type="text" name="id" id="id" class="esconder"  value="<?php echo $var1; ?>" disabled>     
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Nombres</label>
                            <div class="form-group prepend-icon">
                                <input type="text" name="nombres" id="nombres" class="form-control"  value="<?php echo $nombre; ?>" placeholder="Teatro Sanchez Aguilar" minlength="5" id="nombres" required>
                                <i class="icon-user"></i>
                            </div>
                        </div>
                    </div>
                     <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label"> Apellidos </label>
                            <div class="form-group prepend-icon">
                                <input type="text" name="apellidos" id="apellidos" class="form-control" value="<?php echo $apellido; ?>" placeholder="Sanchez Aguilar" minlength="4" id="apellidos" required>
                                <i class="icon-user"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Usuario</label>
                            <div class="form-group prepend-icon">
                                <input type="text" name="usuario" id="usuario"  class="form-control"  value="<?php echo $usuario; ?>" placeholder="TSA" minlength="3" id="usuario" required>
                                <i class="icon-user"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-3" class="control-label">Cédula</label>
                            <input type="text" name="cedula" class="form-control" id="cedula"  value="<?php echo $cedula; ?>" placeholder="0911111111" minlength="10" id="cedula" required>
                        </div>
                    </div>
                   
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Correo</label>
                            <div class="form-group prepend-icon">
                                <input type="email" name="correo" class="form-control" id="correo"   value="<?php echo $correo; ?>" placeholder="tsa@hotmail.com" minlength="3" id="correo" disabled required>
                                <i class="icon-envelope"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Celular</label>
                            <div class="form-group prepend-icon">
                                <input type="text" name="celular" class="form-control" id="celular"  value="<?php echo $celular; ?>" placeholder="0911111111" minlength="10" id="celular" required>
                                <i class="icon-screen-smartphone"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Sexo</label>
                            <select name ="sexo" class="form-control" style="width:100%;" id="sexo">
                                <option value="M" <?php echo $M; ?> >Masculino</option>
                                <option value="F" <?php echo $F; ?>>Femenino</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Fecha Nacimiento</label>
                            <div class="form-group prepend-icon">
                                <input type="date" name="fecha" id="fecha"  class="form-control" style="padding: 0px 30px;"  value="<?php echo $fechaNacimiento; ?>" placeholder="07/08/1995" id="nacimiento" required>
                                <i class="icon-calendar"></i>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Dirección</label>
                            <div class="form-group prepend-icon">
                                <input type="text" name="direccion" id="direccion"  class="form-control"  value="<?php echo $direccion; ?>" placeholder="Samborondom" minlength="5" id="direccion" required>
                                <i class="icon-map"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Amigos del Teatro</label>
                            <div class="form-group ">
                                <label class="switch switch-green">
                                    <input  type="checkbox" class="switch-input amigos"  id="boxA" <?php echo $estado; ?> >
                                    <span class="switch-label" data-on="On" data-off="Off"></span>
                                    <span class="switch-handle"></span>
                                    <span id="estadoA" class="esconder"><?php echo $estadoT; ?></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                <div class="modal-footer text-center">
                    <button class="btn btn-primary btn-embossed bnt-square editar_usuarioC"  ><i class="fa fa-check"></i> Editar</button>
                    <button type="button" class="btn btn-embossed btn-default " data-dismiss="modal" aria-hidden="true">Cancelar</button>
                </div>
        </div>
        
    </div>
</div>
<?php
}}
$transport->close();
?>