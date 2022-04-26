<?php
include ("../conect.php");
include ("../autenticacion.php");
$tipo="";     
$var1="";
$editar="";
if (isset($_POST["var1"])) {
    $var1 = $_POST['var1'];
    $re = $client->getVisitante($var1);
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
        $ingreso=$datos[4];
        $contrasena=$datos[5];
        $estado="";
        $estadoT="OFF";
        if ($ingreso=="A" ) {
            $estado="checked";
            $estadoT="ON";
        } 
?>
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
            <h4 class="modal-title">Editar <strong>Usuario Visitante</strong> </h4>
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
                            <label for="field-1" class="control-label">Celular</label>
                            <div class="form-group prepend-icon">
                                <input type="text" name="Ecelular" class="form-control" id="Ecelular"  value="<?php echo $celular; ?>" placeholder="0911111111" minlength="10" disabled  required>
                                <i class="icon-screen-smartphone"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Contraseña</label>
                            <div class="form-group">
                                <input type="password" name="Econtrasena" class="form-control" id="Econtrasena"  value="<?php echo $contrasena; ?>" placeholder="0911111111" minlength="10"   required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-center">
                    <button class="btn btn-primary btn-embossed bnt-square editar_visitante"  ><i class="fa fa-check"></i> Editar</button>
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