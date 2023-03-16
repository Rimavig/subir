<?php
include ("../../conect.php");
include ("../../autenticacion.php");

?>
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
            <h4 class="modal-title">Crear <strong>Usuario</strong> </h4>
        </div>
        <div class="modal-body">
            <p>Crear Usuario Cliente al Sistema</p>
                <div class="row">  
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label"> Nombres </label>
                            <div class="form-group prepend-icon">
                                <input type="text" name="nombres" id="nombres" class="form-control" placeholder="Teatro Sanchez Aguilar" minlength="4" required>
                                <i class="icon-user"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label"> Apellidos </label>
                            <div class="form-group prepend-icon">
                                <input type="text" name="apellidos" id="apellidos" class="form-control" placeholder="Sanchez Aguilar" minlength="4"  required>
                                <i class="icon-user"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Usuario</label>
                            <div class="form-group prepend-icon">
                                <input type="text" name="usuario" id="usuario"  class="form-control"   placeholder="TSA" minlength="3" required>
                                <i class="icon-user"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-3" class="control-label">Cédula</label>
                            <input type="text" name="cedula" class="form-control" id="cedula"   placeholder="0911111111" minlength="10" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Correo</label>
                            <div class="form-group prepend-icon">
                                <input type="email" name="correo" class="form-control" id="correo"   placeholder="tsa@hotmail.com" minlength="3" required>
                                <i class="icon-envelope"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Celular</label>
                            <div class="form-group prepend-icon">
                                <input type="text" name="celular" class="form-control" id="celular"   placeholder="0911111111" minlength="10"  required>
                                <i class="icon-screen-smartphone"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Sexo</label>
                            <select name ="sexo" class="form-control" style="width:100%;" id="sexo">
                                <option value="M" >Masculino</option>
                                <option value="F" >Femenino</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Fecha Nacimiento</label>
                            <div class="form-group prepend-icon">
                                <input type="date" name="fecha" id="fecha"  class="form-control" style="padding: 0px 30px;"   placeholder="07/08/1995"  required>
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
                                <input type="text" name="direccion" id="direccion"  class="form-control"   placeholder="Samborondom" minlength="5"  required>
                                <i class="icon-map"></i>
                            </div>
                        </div>
                    </div>
                   
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Amigos del Teatro</label>
                            <div class="form-group ">
                                <label class="switch switch-green">
                                    <input type="checkbox" class="switch-input"  id="box" checked>
                                    <span class="switch-label" data-on="On" data-off="Off"></span>
                                    <span class="switch-handle"></span>
                                    <span id="estado" class="esconder">ON</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                <div class="modal-footer text-center">
                    <button class="btn btn-primary btn-embossed bnt-square crear_usuarioC"  ><i class="fa fa-check"></i> Crear</button>
                    <button type="button" class="btn btn-embossed btn-default " data-dismiss="modal" aria-hidden="true">Cancelar</button>
                </div>
        </div>
        
    </div>
</div>
<?php
$transport->close();
?>