
<?php
include ("../../conect.php");
include ("../../autenticacion.php");


$var1="";
$editar="";
$tipo="";      
$FCnombreT="la función";
$id_evento = $_POST['id_evento'];
?>

<div class="modal-dialog modal-lg modal-mantenimiento">
    <div class="modal-content ">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
            <h4 class="modal-title">Crear Función</strong> </h4>
            <input type="text" name="FCnombreT" id="FCnombreT" class="esconder"  value="<?php echo $FCnombreT; ?>" disabled>  
            <input type="text" id="id_evento" class="esconder"  value="<?php echo $id_evento; ?>" disabled>  
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="field-1" class="control-label">Fecha de Función</label>
                        <input type="text" name="datetimepicker" id="fechaFuncion" class="form-control input-sm datepicker" placeholder="Choose a date..." required>
                    </div>
                </div>
            </div>
            
            
            <div class="modal-footer text-center">
                <button type="submit" class="btn btn-primary btn-embossed bnt-square crear_funcion" ><i class="fa fa-check"></i> Crear</button>
                <button type="button" class="btn btn-embossed btn-default " data-dismiss="modal" aria-hidden="true">Cancelar</button>
            </div>
        </div>
        
    </div>
</div>
<?php
$transport->close();
?>    