<?php
include ("../../conect.php");
include ("../../autenticacion.php");
$beneficio="";
$boton="";
$Tboton="";
$var1="";
if (isset($_POST["id"])) {
    $var1 = $_POST['id'];
    $re = $client->getBeneficio($var1);
    $resultado = "".$re;
    $historial= explode(';;',$resultado);
    foreach($historial as $llave => $valores) {
        $benefici =explode(',,,',$valores);
        if (isset($benefici[1])) {
            $beneficio=$benefici[1];
        }
    }
    $boton="editar_beneficio";
    $Tboton="Editar";
}else{
    $boton="crear_beneficio";
    $Tboton="Crear";
}

?>
<div class="modal-dialog modal-mantenimiento ">
    <div class="modal-content  ">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
            <h4 class="modal-title"><?php echo $Tboton; ?> <strong>Beneficio</strong> </h4>
            <input type="text" id="id" class="esconder"  value="<?php echo $var1; ?>" disabled>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <textarea class="form-control" id="Cbeneficio" rows="5"><?php echo $beneficio; ?></textarea>
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
