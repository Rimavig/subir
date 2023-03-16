<?php
include ("../../conect.php");
include ("../../conect_dashboard.php");
include ("../../autenticacion.php");

$re = $client->getPerfilRol($_SESSION["id"],"74");
$resultado = "".$re;
$usuarios= explode(',',$resultado);
$crear="hide";
$exportar="no-descargar";
if($resultado==""){
    ?>
    <a ng-click="reload()">
    <?php
}
foreach($usuarios as $llave => $valores1) {
    if($valores1==="1"){
        $crear="";
    }
}
$re = $client2->getGeneral("CalendarioC");
$resultado= "".$re;
$usuarios =explode(';;',$resultado);
$fechaI=str_replace("T"," ",$_POST['start']);
$fechaF=str_replace("T"," ",$_POST['end']);
?>
<div class="modal-dialog modal-mantenimiento ">
    <div class="modal-content  ">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
            <h4 class="modal-title"><strong>Crear</strong> Evento</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Nombre</label>
                        <input class="form-control form-white" id="nombreC" placeholder="Ingrese nombre" type="text" name="category-name" />
                
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
                                ?>
                                    <option value="<?php echo $usuario[0];?>"><?php echo $usuario[1];?></option>
                                <?php 
                                } 
                            }   
                        ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 ">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Fecha Inicial</label>
                            <input type="text" name="datetimepicker" id="fechaI" class="form-control input-sm datepicker" placeholder="Ingrese una fecha" value ="<?php  echo date("d/m/Y H:i", strtotime(date($fechaI))); ?>" required>
                        </div>
                </div>
                <div class="col-md-6 ">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Fecha Final</label>
                            <input type="text" name="datetimepicker" id="fechaF" class="form-control input-sm datepicker" placeholder="Ingrese una fecha" value ="<?php echo date("d/m/Y H:i", strtotime(date($fechaF))); ?>" required>
                        </div>
                </div>
            </div>
        </div>
        <div class="modal-footer text-center">
            <button type="button" class="btn btn-default btn-embossed" data-dismiss="modal">Salir</button>
            <button type="button" class="btn btn-danger btn-embossed crear_evento  <?php echo $crear; ?>">Guardar</button>
        </div>
    </div>
</div>
<?php
$transport->close();
$transport2->close();
?>