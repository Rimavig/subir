<?php
include ("../../conect.php");
include ("../../autenticacion.php");

$var1="";
$editar="";
$tipo="";
$tipo="Venta";
$nombreT="la ficha artística";
$tipo2="venta";
if ($_POST["tipo"]==="admin") {
    $tipo="Administrador";
    $editar="crear_usuario";
}else if ($_POST["tipo"]==="evento") {
    $tipo="Evento";
    $editar="crear_usuarioE";
}  
$id_evento=$_POST["id_evento"];
$M="";
$F="";

?>
<div class="modal-dialog modal-lg ">
    <div class="modal-content  ">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
            <h4 class="modal-title">Crear <strong>Ficha Artistica</strong> </h4>
            <input type="text" name="tipo" id="tipo" class="esconder"  value="<?php echo $tipo2; ?>" disabled> 
            <input type="text" id="id_evento" class="esconder"  value="<?php echo $id_evento; ?>" disabled>  
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="field-1" class="control-label">Título</label>
                        <input type="text"  id="titulo" class="form-control" placeholder="Teatro Sanchez Aguilar" minlength="5" required>
                    </div>
                </div>
            
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="field-1" class="control-label">Descripción</label>
                        <textarea class="form-control" id="descripcionFicha" rows="10"></textarea>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer text-center">
                <button type="submit" class="btn btn-primary btn-embossed bnt-square crear_ficha_artistica" ><i class="fa fa-check"></i> Crear</button>
                <button type="button" class="btn btn-embossed btn-default " data-dismiss="modal" aria-hidden="true">Cancelar</button>
            </div>
        </div>
    </div>
</div>
