
<?php
include ("../../conect.php");
include ("../../autenticacion.php");
include ("../../directorio.php");

if ($_POST["tipo"]==="preguntas") {
    $tipo="Preguntas Frecuentes";
    $tipo2="preguntas";
    $nombreT="Preguntas Frecuentes";
} else if ($_POST["tipo"]==="amigos_preguntas") {
    $tipo="Preguntas Frecuentes";
    $tipo2="amigos_preguntas";
    $nombreT="Preguntas Frecuentes";
} else if ($_POST["tipo"]==="boleteria") {
    $tipo="BOLETERÍA";
    $tipo2="boleteria";
    $nombreT="BOLETERÍA";
}  else if ($_POST["tipo"]==="cafe") {
    $tipo="CAFÉ VINO BAR";
    $tipo2="cafe";
    $nombreT="CAFÉ VINO BAR";
}   else if ($_POST["tipo"]==="whatsapp") {
    $tipo="WHATSAPP";
    $tipo2="whatsapp";
    $nombreT="WHATSAPP";
}  
if (isset($_POST["var1"])) {
    $var1 = $_POST['var1'];
    $re = $client->getInformacionTabla($var1);
    $resultado = "".$re;
    $historial= explode(';;',$resultado);
    $preguntI =explode(',,,',$historial[0]);
    $id = $preguntI[0];
    $titulo = $preguntI[1];
    $objetivo = $preguntI[2];
    $orden =$preguntI[3];
}  
?>

<div class="modal-dialog modal-lg ">
    <div class="modal-content ">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
            <h4 class="modal-title">Editar </strong><?php echo $tipo; ?> </h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-8">
                    <label for="field-1" class="control-label">Nombre</label>
                    <div class="form-group">
                        <input type="text" name="name" id="Inombre"  value="<?php echo $titulo; ?>"  class="form-control"  minlength="3" required>
                    </div>
                </div>
                <div class="col-md-2">
                    <label for="field-1" class="control-label">Orden</label>
                    <div class="form-group">
                        <input class="form-control input-sm" type="number" id="Iorden"  value="<?php echo $orden; ?>"   min="1" pattern="^[0-9]+" name="duracionE" placeholder="Type a number" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="field-1" class="control-label">Descripción</label>
                    <div class="form-group">
                        <textarea class="form-control" rows="15" id="cke-editor" data-sample-short><?php echo $objetivo; ?></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer text-center">
                <button type="submit" class="btn btn-primary btn-embossed bnt-square editar_pregunta" ><i class="fa fa-check"></i> Editar</button>
                <button type="button" class="btn btn-embossed btn-default " data-dismiss="modal" aria-hidden="true">Cancelar</button>
            </div>
        </div>
        
    </div>
</div>
<?php
$transport->close();
?>    