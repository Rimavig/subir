<?php
include ("../../conect.php");
include ("../../autenticacion.php");
include ("../../directorio.php");
$var1="";
$editar="";
$tipo="";
if ($_POST["tipo"]==="categoria") {
    $tipo="Categoria";
    $tipo2="Ecategoria";
    $nombreT="la categoría";
    if (isset($_POST["var1"])) {
        $var1 = $_POST['var1'];
        $re = $client->getCategoria($var1);
        $resultado = "".$re;
        $historial= explode(';;',$resultado);
    }
}else if ($_POST["tipo"]==="clasificacion") {
    $tipo="Clasificación";
    $tipo2="Eclasificacion";
    $nombreT="la clasificación";
    if (isset($_POST["var1"])) {
        $var1 = $_POST['var1'];
        $re = $client->getClasificacion($var1);
        $resultado = "".$re;
        $historial= explode(';;',$resultado);
    }
}else if ($_POST["tipo"]==="espectaculo") {
    $tipo="Espectaculo";
    $tipo2="Eespectaculo";
    $nombreT="el espectáculo";
    if (isset($_POST["var1"])) {
        $var1 = $_POST['var1'];
        $re = $client->getTipoEspectaculo($var1);
        $resultado = "".$re;
        $historial= explode(';;',$resultado);
    }
}else if ($_POST["tipo"]==="procedencia") {
    $tipo="Procedencia";
    $tipo2="Eprocedencia";
    $nombreT="la procedencia";
    if (isset($_POST["var1"])) {
        $var1 = $_POST['var1'];
        $re = $client->getProcedencia($var1);
        $resultado = "".$re;
        $historial= explode(';;',$resultado);
    }
} else if ($_POST["tipo"]==="evento") {
    $tipo="Tipo de Evento";
    $tipo2="Eevento";
    $nombreT="el tipo de evento";
    if (isset($_POST["var1"])) {
        $var1 = $_POST['var1'];
        $re = $client->getTipoEvento($var1);
        $resultado = "".$re;
        $historial= explode(';;',$resultado);
    }
} else if ($_POST["tipo"]==="sala") {
    $tipo="Sala";
    $tipo2="Esala"; 
    $nombreT="la sala";
    if (isset($_POST["var1"])) {
        $var1 = $_POST['var1'];
        $re = $client->getSala($var1);
        $resultado = "".$re;
        $historial= explode(';;',$resultado);
    }
} else if ($_POST["tipo"]==="productora") {
    $tipo="Productora";
    $tipo2="Eproductora";
    $nombreT="la productora";
    if (isset($_POST["var1"])) {
        $var1 = $_POST['var1'];
        $re = $client->getProductora($var1);
        $resultado = "".$re;
        $historial= explode(';;',$resultado);
    }
} else if ($_POST["tipo"]==="promocion") {
    $tipo="Promoción";
    $tipo2="Epromocion";
    $nombreT="la promoción";
    if (isset($_POST["var1"])) {
        $var1 = $_POST['var1'];
        $re = $client->getNombrePromocion($var1);
        $resultado = "".$re;
        $historial= explode(';;',$resultado);
    }     
}      
foreach($historial as $llave => $valores) {
    $datos =explode(',,,',$valores);
    if (isset($datos[1])) {
        if ($_POST["tipo"]==="promocion") {
            $nombre=$datos[2];  
        } else{
            $nombre=$datos[1];
            $orden=$datos[2];
        }
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
                <input type="text" name="nombreT" id="nombreT" class="esconder"  value="<?php echo $nombreT; ?>" disabled>  
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="field-1" class="control-label">Nombre De <?php echo $tipo; ?></label>
                        <div class="form-group prepend-icon">
                            <input type="text" name="Ename" id="Enombres" class="form-control" value="<?php echo $nombre; ?>" placeholder="Cine" minlength="3" required>
                            <i class="icon-user"></i>
                        </div>
                    </div>
                </div>
                <?php
                if ($_POST["tipo"]==="categoria") {
                    
                ?>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="field-1" class="control-label">Orden</label>
                        <div class="form-group prepend-icon">
                            <input class="form-control input-sm" type="number" id="Eorden"  min="1" pattern="^[0-9]+"  value="<?php echo $orden; ?>"  name="duracionE" placeholder="Type a number" required>
                        </div>
                    </div>
                </div>
                <?php
               } 
                ?>
                <?php 
                    if ($_POST["tipo"]==="sala") {
                        $imagen=$datos[4];
                        $re1 = $client->getAllImagen("sala");
                        $resultado1 = "".$re1;
                        $historial1= explode(';;',$resultado1);
                        ?>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Imagen</label>
                            <select class="form-control" id ="imagen_sala" style="width:100%;">
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
                    <img id="imagen" data-src="" src='<?php  echo $path_imagen."sala/".$imagen; ?>' class="img-responsive" alt="gallery 3">
                </div>
                <?php 
                    } 
                ?>
            </div>
            <div class="modal-footer text-center">
                <button type="submit" class="btn btn-primary btn-embossed bnt-square editar_categoria" ><i class="fa fa-check"></i> Guardar</button>
                <button type="button" class="btn btn-embossed btn-default " data-dismiss="modal" aria-hidden="true">Cancelar</button>
            </div>
        </div>
        
    </div>
</div>
<?php
}}
$transport->close();
?>    