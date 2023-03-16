<?php
include ("../../conect.php");
include ("../../conect_dashboard.php");
include ("../../autenticacion.php");

$re = $client->getPerfilRol($_SESSION["id"],"74");
$resultado = "".$re;
$usuarios1= explode(',',$resultado);
$editar="hide";
foreach($usuarios1 as $llave => $valores1) {
    if($valores1==="2"){
        $editar='';
    }
}
$re = $client2->getGeneral("CalendarioC");
$resultado= "".$re;
$usuarios =explode(';;',$resultado);
$re = $client2->getGeneral2("eventosG",$_POST['id']);
$resultado= "".$re;
$usuarios1 =explode(';;',$resultado);
$usuario1 =explode(',,,',$usuarios1[0]);
?>
<div class="modal-dialog modal-mantenimiento ">
    <div class="modal-content  ">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
            <h4 class="modal-title"><strong>Editar</strong> Evento</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Nombre</label>
                        <input class="esconder" id="eventoE" value="<?php echo $_POST['id'];?>" type="text" />
                        <input class="form-control form-white" id="nombreC"  value="<?php echo $usuario1[1];?>" placeholder="Ingrese nombre" type="text" name="category-name" />
                
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">categoria</label>
                        <select class="form-control form-white" id="colorC" data-placeholder="Escoger un color..." name="category-color">
                        <?php
                            foreach($usuarios as $llave => $valores) {
                                $usuario =explode(',,,',$valores);
                                if (isset($usuario[1])) {
                                    if ($usuario[0]==$usuario1[2]) {
                                ?>
                                    <option value="<?php echo $usuario[0];?>" selected><?php echo $usuario[1];?></option>
                                <?php
                                    } else{
                                        ?>
                                        <option value="<?php echo $usuario[0];?>"><?php echo $usuario[1];?></option>
                                    <?php
                                    } 
                                } 
                            }   
                        ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 ">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Fecha Inicial</label>
                            <input type="text" name="datetimepicker" id="fechaI" class="form-control input-sm datepicker" placeholder="Ingrese una fecha" value="<?php echo $usuario1[3];?>" required>
                        </div>
                </div>
                <div class="col-md-6 ">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Fecha Final</label>
                            <input type="text" name="datetimepicker" id="fechaF" class="form-control input-sm datepicker" placeholder="Ingrese una fecha" value="<?php echo $usuario1[4];?>" required>
                        </div>
                </div>
            </div>
        </div>
        <div class="modal-footer text-center">
            <button type="button" class="btn btn-default btn-embossed" data-dismiss="modal">Salir</button>
            <button type="button" class="btn btn-danger btn-embossed editar_evento <?php echo $editar; ?>">Guardar</button>
            <button type="button" class="btn btn-dark btn-embossed eliminar_evento <?php echo $editar; ?>">Eliminar</button>
        </div>
    </div>
</div>
<?php
$transport->close();
$transport2->close();
?>