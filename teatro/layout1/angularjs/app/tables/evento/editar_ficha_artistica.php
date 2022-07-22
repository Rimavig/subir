<?php
include ("../../conect.php");
include ("../../autenticacion.php");

$tipo="Venta";
$nombreT="la ficha artística";
$tipo2="venta";

if ($_POST["tipo"]==="venta") {
    $tipo="Venta";
    $nombreT="la ficha artística";
    $tipo2="venta";
    if (isset($_POST["id_ficha"])) {
        $var1 = $_POST['id_ficha'];
        $re = $client->getFichaArtistica($var1);
        $resultado = "".$re;
        $historial= explode(';;',$resultado);
    }
}
$idFichaArtistica="";
$idEvento="";
$titulo="";
$descripcion="";
foreach($historial as $llave => $valores) {
    $datos =explode(',,,',$valores);
    if (isset($datos[1])) {
        $idFichaArtistica=$datos[0];
        $idEvento=$datos[1];
        $titulo=$datos[2];
        $descripcion=$datos[3];
    }
}  
?>
<div class="modal-dialog modal-lg ">
    <div class="modal-content  ">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
            <h4 class="modal-title">Crear <strong>Ficha Artística</strong> </h4>
            <input type="text" name="tipo" id="tipo" class="esconder"  value="<?php echo $tipo2; ?>" disabled> 
            <input type="text" id="id_ficha_artistica" class="esconder"  value="<?php echo $idFichaArtistica; ?>" disabled>  
            <input type="text" id="id_evento" class="esconder"  value="<?php echo $idEvento; ?>" disabled>  
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="field-1" class="control-label">Título</label>
                        <input type="text"  id="Etitulo" class="form-control" value="<?php echo $titulo; ?>" placeholder="Teatro Sanchez Aguilar" minlength="5" required>
                    </div>
                </div>
            
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="field-1" class="control-label">Descripción</label>
                        <textarea class="form-control" id="EdescripcionFicha"><?php echo $descripcion; ?></textarea>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer text-center">
                <button type="submit" class="btn btn-primary btn-embossed bnt-square editar_ficha_artistica" ><i class="fa fa-check"></i> Guardar</button>
                <button type="button" class="btn btn-embossed btn-default " data-dismiss="modal" aria-hidden="true">Cancelar</button>
            </div>
        </div>
    </div>
</div>
