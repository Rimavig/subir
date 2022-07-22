<?php
include ("../../conect.php");
include ("../../autenticacion.php");
include ("../../directorio.php");
$var1="";
$editar="";
$tipo="Mapa";
$tipo2="EdistribucionS";
$nombreT="la distribución";
if (isset($_POST["var1"])) {
    $var1 = $_POST['var1'];
    $id = $_POST['id'];
    $sala = $_POST['nombre'];
    $re = $client->getMapa($id);
    $resultado = "".$re;
    $historial= explode(';;',$resultado);
}
?>
<?php
foreach($historial as $llave => $valores) {
    $datos =explode(',,,',$valores);
    if (isset($datos[1])) {
        $nombre=$datos[1];
        $imagen=$datos[2];
        $re1 = $client->getAllImagen("distribucion");
        $resultado1 = "".$re1;
        $historial1= explode(';;',$resultado1);
?>

<div class="modal-dialog modal-lg modal-mantenimiento">
    <div class="modal-content ">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
            <h4 class="modal-title">Editar <strong> <?php echo $tipo; ?></strong> </h4>
            
        </div>
        <div class="modal-body">
            <div class="row">
                <input type="text" name="Etipo" id="Etipo" class="esconder"  value="<?php echo $tipo2; ?>" disabled>    
                <input type="text" name="Eid" id="Eid" class="esconder"  value="<?php echo $var1; ?>" disabled>
                <input type="text" name="Emapa" id="Emapa" class="esconder"  value="<?php echo $id; ?>" disabled>
                <input type="text" name="nombreT" id="nombreT" class="esconder"  value="<?php echo $nombreT; ?>" disabled>  
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="field-1" class="control-label">Sala</label>
                        <select class="form-control" id ="sala" style="width:100%;">
                            <option value="<?php echo $sala; ?>"><?php echo $sala; ?></option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="field-1" class="control-label">Nombre De <?php echo $tipo; ?></label>
                        <div class="form-group prepend-icon">
                            <input type="text" name="Ename" id="Enombres" class="form-control" value="<?php echo $nombre; ?>" placeholder="Cine" minlength="3" required>
                            <i class="icon-user"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="field-1" class="control-label">Imagen</label>
                        <select class="form-control" id ="imagen_distribucion" style="width:100%;">
                        <?php 
                            foreach($historial1 as $llave => $valores1) {
                                $datos1 =explode(',,,',$valores1);
                                if (isset($datos1[1])) {  
                                    if ($datos1[3]==$imagen) { 
                                        ?>
                                    <option value="<?php echo  $datos1[3]; ?>" selected><?php echo $datos1[1]; ?></option>
                                <?php 
                                    }else{?>
                                    <option value="<?php echo  $datos1[3]; ?>"><?php echo $datos1[1]; ?></option>
                                <?php 
                                    }
                                }   
                            } 
                        ?>
                        </select>
                    </div>
                </div>    
                <div class="col-md-12">
                    <img id="imagen" data-src="" src='<?php  echo $path_imagen."distribucion/".$imagen; ?>' class="img-responsive" alt="gallery 3">
                </div>
            </div>
            <div class="modal-footer text-center">
                <button type="submit" class="btn btn-primary btn-embossed bnt-square editar_distribucionS" ><i class="fa fa-check"></i> Guardar</button>
                <button type="button" class="btn btn-embossed btn-default " data-dismiss="modal" aria-hidden="true">Cancelar</button>
            </div>
        </div>
        
    </div>
</div>
<?php
}}
$transport->close();
?>    