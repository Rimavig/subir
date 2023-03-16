<?php
include ("../../conect.php");
include ("../../autenticacion.php");
$pregunta="";
$respuesta="";
$boton="";
$Tboton="";
$var1="";
if (isset($_POST["id"])) {
    $var1 = $_POST['id'];
    $re = $client->getPregunta($var1);
    $resultado = "".$re;
    $historial= explode(';;',$resultado);
    foreach($historial as $llave => $valores) {
        $benefici =explode(',,,',$valores);
        if (isset($benefici[1])) {
            $pregunta=$benefici[1];
            $respuesta=$benefici[2];
        }
    }
    $boton="editar_pregunta";
    $Tboton="Editar";
}else{
    $boton="crear_pregunta";
    $Tboton="Crear";
}
?>
<div class="modal-dialog modal-mantenimiento ">
    <div class="modal-content  ">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
            <h4 class="modal-title"><?php echo $Tboton; ?> <strong>Pregunta Frecuente</strong> </h4>
            <input type="text" id="id" class="esconder"  value="<?php echo $var1; ?>" disabled>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="field-1" class="control-label">Pregunta</label>
                        <input type="text"  id="Cpregunta" value="<?php echo $pregunta; ?>" class="form-control" required>
                    </div>
                </div>
            
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="field-1" class="control-label">Respuesta</label>
                        <textarea class="form-control" id="Crespuesta" rows="5"><?php echo $respuesta; ?></textarea>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer text-center">
            <button type="submit" class="btn btn-primary btn-embossed bnt-square <?php echo $boton; ?>" ><i class="fa fa-check"></i> <?php echo $Tboton; ?></button>
                <button type="button" class="btn btn-embossed btn-default " data-dismiss="modal" aria-hidden="true">Cancelar</button>
            </div>
        </div>
    </div>
</div>
<?php
$transport->close();
?>