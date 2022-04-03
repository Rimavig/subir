<?php
include ("../conect.php");
include ("../autenticacion.php");

$var1="";
$editar="";
$tipo="";
?>
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
            <h4 class="modal-title">Crear <strong>Usuario Recurrente</strong> </h4>
        </div>
        <div class="modal-body">
            <p>Crear Usuario Recurrente</p>
            <form role="form" class=" form-validation">
                <div class="row">
                    <input type="text" name="id" id="id" class="esconder"  value="<?php echo $var1; ?>" disabled>     
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Nombres</label>
                            <div class="form-group prepend-icon">
                                <input type="text" name="nombres" id="nombres" class="form-control"  placeholder="Manrique" minlength="5" required>
                                <i class="icon-user"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field-1" class="control-label"> Apellidos </label>
                            <div class="form-group prepend-icon">
                                <input type="text" name="apellidos" id="apellidos" class="form-control"  placeholder="Manrique" minlength="4"  required>
                                <i class="icon-user"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Celular</label>
                            <div class="form-group prepend-icon">
                                <input type="text" name="celular" class="form-control" id="celular"   placeholder="0911111111" minlength="10"   required>
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
                                <input type="password" name="Econtrasena" class="form-control" id="contrasena"  placeholder="0911111111" minlength="10"  required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-center">
                    <button class="btn btn-primary btn-embossed bnt-square crear_visitante"  ><i class="fa fa-check"></i>Crear</button>
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