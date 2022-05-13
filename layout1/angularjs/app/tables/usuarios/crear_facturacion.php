<?php
include ("../../conect.php");
include ("../../autenticacion.php");

$var1="";
$editar="";
if (isset($_POST["var1"])) {
    $var1 = $_POST['var1'];
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
                                <input type="text" name="nombres" id="nombres" class="form-control"  placeholder="Teatro Sanchez Aguilar" minlength="5" id="nombres" required>
                                <i class="icon-user"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 nombres">
                        <div class="form-group">
                            <label for="field-1" class="control-label"> Apellidos </label>
                            <div class="form-group prepend-icon">
                                <input type="text" name="apellidos" id="apellidos" class="form-control"  placeholder="Sanchez Aguilar" minlength="4" id="apellidos" required>
                                <i class="icon-user"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-12 cedula">
                        <div class="form-group">
                            <label for="field-3" class="control-label">Cédula</label>
                            <input type="text" name="cedula" class="form-control" id="cedula"  placeholder="0911111111" minlength="10" required>
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
                            <input type="text" name="ruc" class="form-control" id="ruc"  placeholder="0911111111001" minlength="10" required>
                        </div>
                    </div>
                    <div class="col-md-12 pasaporte hide">
                        <div class="form-group">
                            <label for="field-3" class="control-label">Pasaporte</label>
                            <input type="text" name="pasaporte" class="form-control" id="pasaporte" placeholder="0911111111" minlength="10" required>
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