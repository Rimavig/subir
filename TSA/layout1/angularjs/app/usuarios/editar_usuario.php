<?php
include ("../conect.php");
include ("../autenticacion.php");
$tipo="";     
$var1="";
$editar="";
if (isset($_POST["var1"])) {
    $var1 = $_POST['var1'];
    $re = $client->getResidente($var1);
    $resultado = "".$re;
    $historial= explode(';',$resultado);
}
$M="";
$F="";
foreach($historial as $llave => $valores) {
    $datos =explode(',,,',$valores);
    if (isset($datos[1])) {
        $celular=$datos[1];
        $nombre=$datos[2];
        $apellido=$datos[3];
        $correo=$datos[4];
        $cedula=$datos[5];
        $ciudadela=$datos[7];
        $ingreso=$datos[8];
        $invitacion=$datos[9];
        $fechaR=$datos[11];
        $fechaA=$datos[12];
        $estado="";
        $estadoT="OFF";
        if ($ingreso=="A" ) {
            $estado="checked";
            $estadoT="ON";
        } 
        $estado1="";
        $estadoT1="OFF";
        if ($invitacion=="S" ) {
            $estado1="checked";
            $estadoT1="ON";
        } 
?>
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
            <h4 class="modal-title">Editar <strong>Usuario</strong> </h4>
        </div>
        <div class="modal-body">
            <p>Editar Usuario Residente</p>
            <form role="form" class=" form-validation">
                <div class="row">
                    <input type="text" name="id" id="id" class="esconder"  value="<?php echo $var1; ?>" disabled>     
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Nombres</label>
                            <div class="form-group prepend-icon">
                                <input type="text" name="nombres" id="Enombres" class="form-control"  value="<?php echo $nombre; ?>" placeholder="Teatro Sanchez Aguilar" minlength="5" required>
                                <i class="icon-user"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field-1" class="control-label"> Apellidos </label>
                            <div class="form-group prepend-icon">
                                <input type="text" name="apellidos" id="Eapellidos" class="form-control" value="<?php echo $apellido; ?>" placeholder="Sanchez Aguilar" minlength="4"  required>
                                <i class="icon-user"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field-1" class="control-label"> Ciudadela</label>
                            <div class="form-group">
                                <input type="text"  id="Eciudadela" class="form-control" value="<?php echo $ciudadela; ?>" minlength="4"  disabled required>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field-3" class="control-label">Cédula</label>
                            <input type="text" name="Ecedula" class="form-control" id="Ecedula"  value="<?php echo $cedula; ?>" placeholder="0911111111" minlength="10" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Celular</label>
                            <div class="form-group prepend-icon">
                                <input type="text" name="Ecelular" class="form-control" id="Ecelular"  value="<?php echo $celular; ?>" placeholder="0911111111" minlength="10" disabled  required>
                                <i class="icon-screen-smartphone"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Correo</label>
                            <div class="form-group prepend-icon">
                                <input type="email" name="Ecorreo" class="form-control" id="Ecorreo"   value="<?php echo $correo; ?>" placeholder="tsa@hotmail.com" minlength="3"  required>
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
                                    <input  type="checkbox" class="switch-input amigos"  id="EboxI" <?php echo $estado; ?> >
                                    <span class="switch-label" data-on="On" data-off="Off"></span>
                                    <span class="switch-handle"></span>
                                    <span id="EestadoI" class="esconder"><?php echo $estadoT; ?></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Invitación</label>
                            <div class="form-group ">
                                <label class="switch switch-green">
                                    <input  type="checkbox" class="switch-input amigos"  id="EboxV" <?php echo $estado1; ?> >
                                    <span class="switch-label" data-on="On" data-off="Off"></span>
                                    <span class="switch-handle"></span>
                                    <span id="EestadoV" class="esconder"><?php echo $estadoT1; ?></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-center">
                    <button class="btn btn-primary btn-embossed bnt-square editar_usuario"  ><i class="fa fa-check"></i> Editar</button>
                    <button type="button" class="btn btn-embossed btn-default " data-dismiss="modal" aria-hidden="true">Cancelar</button>
                    <button type="reset" class="btn btn-embossed btn-default">Limpiar</button>
                </div>
            </form>    
        </div>
        
    </div>
</div>
<?php
}}
$transport->close();
?>