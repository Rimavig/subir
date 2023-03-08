
<?php
include ("../../conect.php");
include ("../../autenticacion.php");
include ("../../directorio.php");
$var1="";
$editar="";
$tipo="Distribución-Mapa";
$tipo2="distribucionS";
$nombreT="la distribución";
$re = $client->getAllSala();
$resultado = "".$re;
$historial= explode(';;',$resultado);

?>
<div class="modal-dialog modal-lg modal-mantenimiento">
    <div class="modal-content ">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
            <h4 class="modal-title">Crear <strong> <?php echo $tipo; ?></strong> </h4>
            <input type="text" name="nombreT" id="nombreT" class="esconder"  value="<?php echo $nombreT; ?>" disabled>  
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="field-1" class="control-label">Sala</label>
                        <select class="form-control" id ="sala" style="width:100%;">
                        <?php
                        $acum=0;
                        $imagen="";
                        foreach($historial as $llave => $valores) {
                            $datos =explode(',,,',$valores);
                            if (isset($datos[1]) && $datos[0]!=1) {
                                $nombre=$datos[1];
                                if($acum==0){
                                    $imagen=$datos[0];
                                    $acum++;
                                }
                        ?>
                            <option value="<?php echo $datos[0]; ?>"><?php echo $nombre; ?></option>
                        <?php
                            }
                        }
                        ?>  
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="field-1" class="control-label">Nombre De <?php echo $tipo; ?></label>
                        <div class="form-group prepend-icon">
                            <input type="text" name="name" id="nombres" class="form-control" placeholder="Cine" minlength="3" required>
                            <i class="icon-user"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="field-1" class="control-label">Imagen</label>
                        <select class="form-control" id ="imagen_distribucion" style="width:100%;">
                        <option value="none" selected>Seleccióne una distribución</option>
                    <?php 
                        $re1 = $client->getAllImagen("distribucion");
                        $resultado1 = "".$re1;
                        $historial1= explode(';;',$resultado1);
                        foreach($historial1 as $llave => $valores1) {
                            $datos1 =explode(',,,',$valores1);
                            if (isset($datos1[1])) {  ?>
                            <option value="<?php echo  $datos1[3]; ?>"><?php echo $datos1[1]; ?></option>
                    <?php 
                            }   
                        } 
                    ?>
                        </select>
                    </div>
                </div>    
                <div class="col-md-12">
                    <img id="imagen" data-src="" src='<?php  echo $path_imagen."sala/".$imagen.".png"; ?>' class="img-responsive" alt="gallery 3">
                </div>
            </div>
            
            
            <div class="modal-footer text-center">
                <button type="submit" class="btn btn-primary btn-embossed bnt-square crear_distribucionS" ><i class="fa fa-check"></i> Crear</button>
                <button type="button" class="btn btn-embossed btn-default " data-dismiss="modal" aria-hidden="true">Cancelar</button>
            </div>
        </div>
        
    </div>
</div>
<?php
$transport->close();
?>    