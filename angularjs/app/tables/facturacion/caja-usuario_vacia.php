<?php
include ("../../conect_taquilla.php");
include ("../../autenticacion.php");

?>
<div class="row">
    <input type="text" id="idFacturacionG" class="esconder"  disabled>   
    <div class="col-md-3">
        <div class="form-group">
            <label for="field-1" class="control-label">Tipo</label>
            <select name ="tipoG" class="form-control" style="width:100%;" id="tipo">
            
            </select>
        </div>
    </div>  
    <div class="col-md-6">
        <div class="form-group">
            <label for="field-1" class="control-label">Nombres</label>
            <div class="form-group prepend-icon">
                <input type="text" name="nombres" id="nombresG" class="form-control"  placeholder="Teatro Sanchez Aguilar"  disabled>
                <i class="icon-user"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3 ">
        <div class="form-group">
            <label for="field-3" class="control-label">Identificación</label>
            <input type="text" name="cedula" class="form-control" id="cedulaG"placeholder="0911111111" disabled>
        </div>
    </div>
</div>
<div class="row">               
    <div class="col-md-6">
        <div class="form-group">
            <label for="field-1" class="control-label">Correo Fáctura</label>
            <div class="form-group prepend-icon">
                <input type="email" name="correo"  id="correoG"  class="form-control" placeholder="tsa@hotmail.com" minlength="5"  disabled>
                <i class="icon-map"></i>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="field-1" class="control-label">Dirección</label>
            <div class="form-group prepend-icon">
                <input type="text" name="direccion"  id="direccionG"  class="form-control"   placeholder="Samborondom" minlength="5"  disabled>
                <i class="icon-map"></i>
            </div>
        </div>
    </div>
</div>
<?php
$transport3->close();
?>