<?php
include ("../../conect.php");
include ("../../autenticacion.php");
include ("../../directorio.php");
$var1="";
$disabled="";
$editar="";
$esconder="hide";
$informacion="hide";
$preventaG="hide";
$cantidadG="hide";
$categoria= explode(';;',"".$client->getAllCategoria());
$clasificacion=explode(';;',"".$client->getAllClasificacion());
$espectaculo= explode(';;',"".$client->getAllTipoEspectaculo());
$procedencia= explode(';;',"".$client->getAllProcedencia());
$tipoE= explode(';;',"".$client->getAllTipoEvento());
if (isset($_POST["var1"])) {
    $var1 = $_POST['var1'];
    $re = $client->getEvento($var1,"venta");
    $resultado = "".$re;
    $historial= explode(';;',$resultado);
}
if ($_POST["tipo"]==="venta") {
    $nombreT="el evento venta";
    $tipo2="Eventa";
    $preventaG="";
    $re = $client->getPerfilRol($_SESSION["id"],"19");
    $resultado = "".$re;
    $usuarios= explode(',',$resultado);
    foreach($usuarios as $llave => $valores1) {
        if($valores1==="7"){
            $informacion="";
            
        }
    }
}else if ($_POST["tipo"]==="gratuito") {
    $tipo2="Egratuito";
    $cantidadG="";
    $nombreT="el evento gratuito";
    $re = $client->getPerfilRol($_SESSION["id"],"20");
    $resultado = "".$re;
    $usuarios= explode(',',$resultado);
    foreach($usuarios as $llave => $valores1) {
        if($valores1==="7"){
            $informacion="";
        }
    }
}else if ($_POST["tipo"]==="informativo") {
    $tipo2="Einformativo";
    $nombreT="el evento informativo";
    $esconder="";
    $re = $client->getPerfilRol($_SESSION["id"],"21");
    $resultado = "".$re;
    $usuarios= explode(',',$resultado);
    foreach($usuarios as $llave => $valores1) {
        if($valores1==="7"){
            $informacion="";
        }
    }
}
foreach($historial as $llave => $valores) {
    $datos =explode(',,,',$valores);
    if (isset($datos[1])) {
        $id_evento=$datos[0];
        $nombre=$datos[1];
        $duracion=$datos[2];
        $fechaI=$datos[3];
        $fechaF=$datos[4];
        $id_productora=$datos[5];
        $id_Sala=$datos[6];
        $id_Mapa=$datos[7];
        $idTipoEvento=$datos[8];
        $idTipoEspectaculo=$datos[9];
        $idCategoria=$datos[10];
        $idClasificacion=$datos[11];
        $idProcedencia=$datos[12];
        $aforo=$datos[13];
        $vendidos=$datos[14];
        $preventa=$datos[18];
        $cantidad=$datos[19];
        $estadoPV="";
        $estadoPVT="OFF";
    
        if ($preventa=="S" ) {
            $estadoPV="checked";
            $estadoPVT="ON";
        } 

        $sala=  explode(';;',"".$client->getAllSala());
        $distribucion=  explode(';;',"".$client->getAllSalaMapa($id_Sala));
        if ($id_Sala=="1"){
            $disabled="disabled";
        }else{
            $disabled="";
        }
    }
}    
?>
<form role="form" class=" form-validation">
    <input type="text" name="Eid" id="Eid" class="esconder"  value="<?php echo $var1; ?>" disabled>
    <input type="text" name="tipo" id="Etipo" class="esconder"  value="<?php echo $tipo2; ?>" disabled> 
    <input type="text" name="nombreT" id="nombreT" class="esconder"  value="<?php echo $nombreT; ?>" disabled>  
    <input type="text" name="MapaS" id="MapaS" class="esconder"  value="<?php echo $id_Mapa; ?>" disabled>  
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="field-1" class="control-label">Nombre Evento</label>
                <input type="text" name="nombreE" id="Enombre" class="form-control" value="<?php echo $nombre; ?>" placeholder="Teatro Sanchez Aguilar" minlength="5" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="field-1" class="control-label">Productora</label>
                <input type="text" name="nombreE" id="Eproductora" class="form-control" value="<?php echo $id_productora; ?>" placeholder="Teatro Sanchez Aguilar" minlength="5" required>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="field-3" class="control-label">Duración</label>
                <input class="form-control input-sm" type="number" id="Eduracion" name="duracionE" value="<?php echo $duracion; ?>" placeholder="" required>
            </div>
        </div>
    </div>
        <div class="row">
            <div class="col-md-4 <?php echo $esconder; ?>">
                <div class="form-group">
                    <label for="field-1" class="control-label">Fecha Inicial</label>
                    <div class="form-group prepend-icon">
                        <input type="date" name="fechaF" class="form-control"  id="EfechaI" style="padding: 0px 30px;" value="<?php echo $fechaI; ?>" placeholder="07/08/1995"  required>
                        <i class="icon-calendar"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-4 <?php echo $esconder; ?>">
                <div class="form-group">
                    <label for="field-1" class="control-label">Fecha Final</label>
                    <div class="form-group prepend-icon">
                        <input type="date" name="fechaF" class="form-control" id="EfechaF" style="padding: 0px 30px;" value ="<?php echo $fechaF; ?>" placeholder="07/08/1995"  required>
                        <i class="icon-calendar"></i>
                    </div>
                </div>
            </div>
        </div>    
    </div>
    <div class="row">    
        <div class="col-md-4">
            <div class="form-group">
                <label for="field-1" class="control-label">Tipo Evento</label>
                <select class="form-control" id="EtipoE" style="width:100%;">
                    <?php
                    foreach($tipoE as $llave => $valores) {
                        $evento =explode(',,,',$valores);
                        $estado="";
                        $estadoT="OFF";
                        if (isset($evento[1])) {
                            if ($evento[3]==="A" ) {
                                if ($evento[0]==$idTipoEvento ) {?>
                                    <option value="<?php echo $evento[0]; ?>" selected><?php echo $evento[1];; ?></option>
                                <?php
                                }else{?>
                                    <option value="<?php echo $evento[0]; ?>"><?php echo $evento[1];; ?></option>
                                <?php
                                }
                            }
                        }
                    }
                    ?>                  
                </select>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="form-group">
                <label for="field-1" class="control-label">Categoria</label>
                <select class="form-control" id="Ecategoria" style="width:100%;">
                <?php
                    foreach($categoria as $llave => $valores) {
                        $categoria =explode(',,,',$valores);
                        $estado="";
                        $estadoT="OFF";
                        if (isset($categoria[1])) {
                            if ($categoria[3]==="A" ) {
                                if ($categoria[0]==$idCategoria ) {?>
                                    <option value="<?php echo $categoria[0]; ?>" selected><?php echo $categoria[1];; ?></option>
                            <?php
                            }else{?>
                                    <option value="<?php echo $categoria[0]; ?>"><?php echo $categoria[1];; ?></option>
                            <?php
                            }
                            }
                        }
                    }
                ?>   
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="field-1" class="control-label">Clasificación</label>
                <select class="form-control" id="Eclasificacion" style="width:100%;">
                    <?php
                        foreach($clasificacion as $llave => $valores) {
                            $clasificacion =explode(',,,',$valores);
                            $estado="";
                            $estadoT="OFF";
                            if (isset($clasificacion[1])) {
                                if ($clasificacion[3]==="A" ) {
                                    if ($clasificacion[0]==$idClasificacion) {?>
                                        <option value="<?php echo $clasificacion[0]; ?>" selected><?php echo $clasificacion[1];; ?></option>
                                    <?php
                                    }else{?>
                                            <option value="<?php echo $clasificacion[0]; ?>"><?php echo $clasificacion[1];; ?></option>
                                    <?php
                                    }
                                }
                            }
                        }
                    ?>   
                    
                    </select>
            </div>
        </div>
    </div>
    <div class="row">   
        
        <div class="col-md-4">
            <div class="form-group">
                <label for="field-1" class="control-label">Tipo Espectáculo</label>
                <select class="form-control" id="Eespectaculo" style="width:100%;">
                    <?php
                        foreach($espectaculo as $llave => $valores) {
                            $espectaculo =explode(',,,',$valores);
                            if (isset($espectaculo[1])) {
                                if ($espectaculo[3]==="A" ) {
                                    if ($espectaculo[0]==$idTipoEspectaculo ) {?>
                                        <option value="<?php echo $espectaculo[0]; ?>" selected><?php echo $espectaculo[1];; ?></option>
                                    <?php
                                    }else{?>
                                        <option value="<?php echo $espectaculo[0]; ?>"><?php echo $espectaculo[1];; ?></option>
                                    <?php
                                    }
                                }
                            }
                        }
                    ?>   
                    
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="field-1" class="control-label">Procedencia</label>
                <select class="form-control" id="Eprocedencia" style="width:100%;">
                <?php
                    foreach($procedencia as $llave => $valores) {
                        $procedencia  =explode(',,,',$valores);
                        if (isset($procedencia[1])) {
                            if ($procedencia[3]==="A" ) {
                                if ($procedencia[0]==$idProcedencia ) {?>
                                    <option value="<?php echo $procedencia[0]; ?>" selected><?php echo $procedencia[1];; ?></option>
                                <?php
                                }else{?>
                                    <option value="<?php echo $procedencia[0]; ?>"><?php echo $procedencia[1];; ?></option>
                                <?php
                                }
                            }
                        }
                    }
                ?> 
                </select>
            </div>
        </div>
    </div>
    <div class="row">   
        <div class="col-md-4">
            <div class="form-group">
                <label for="field-1" class="control-label">Sala</label>
                <select class="form-control" id="Esala" style="width:100%;">
                <?php
                    foreach($sala as $llave => $valores) {
                        $sala  =explode(',,,',$valores);
                        if (isset($sala[1])) {
                            if ($sala[5]==="A" ) {
                                if ($id_Sala == "1") {
                                    if ($sala[0]==$id_Sala) {
                                        ?>
                                        <option value="<?php echo $sala[0]; ?>"><?php echo $sala[1];; ?></option>
                                    <?php
                                    }
                                }else{
                                    if ($sala[0]==$id_Sala) {
                                        ?>
                                        <option value="<?php echo $sala[0]; ?>" selected><?php echo $sala[1];; ?></option>
                                    <?php
                                     }else{
                                        if ($sala[0] != "1") { 
                                            ?>
                                            <option value="<?php echo $sala[0]; ?>" ><?php echo $sala[1];; ?></option>
                                            <?php
                                        }
                                     }
                                }   

                            }
                        }
                    }
                ?> 
                </select>
            </div>
        </div>
        <div class="col-md-4 distribucion_sala" id="distribucion_sala">
            <div class="form-group">
                <label for="field-1" class="control-label">Distribución</label>
                <select class="form-control" id="Edistribucion" style="width:100%;">
                <?php
                    foreach($distribucion as $llave => $valores) {
                        $distribucion  =explode(',,,',$valores);
                        if (isset($distribucion[1])) {
                            if ($distribucion[6]==="A" ) {
                                if ($distribucion[2]==$id_Mapa) {?>
                                    <option value="<?php echo $distribucion[0]; ?>" selected><?php echo $distribucion[4];; ?></option>
                                <?php
                                }else {
                                    if ($id_Sala != "1") { 
                                        ?>
                                        <option value="<?php echo $distribucion[0]; ?>"><?php echo $distribucion[4];; ?></option>
                                        <?php
                                    }
                                    
                                }    
                            }
                        }
                    }
                ?> 
                </select>
            </div>  
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="row">  
                    <div class="col-md-12">
                        <label for="field-1" class="control-label">Mapa</label>
                    </div>
                </div>
                <button class="Emapa btn btn-sm btn-dark" value="1.png" id="Emapa"><i class="fa fa-plus"></i> Ver Sala</button>
            </div>
        </div>
    </div>
    <div class="row">  
        <div class="col-md-2">
            <div class="form-group">
                <label for="field-3" class="control-label">Tickets Vendidos</label>
                <input class="form-control input-sm" type="number"   value="<?php echo $vendidos; ?>"  <?php echo $disabled; ?> name="duracionE" placeholder="" disabled >
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="field-3" class="control-label">Aforo</label>
                <input class="form-control input-sm" type="number" id="Eaforo"  value="<?php echo $aforo; ?>"  <?php echo $disabled; ?> name="duracionE" placeholder="" required>
            </div>
        </div>
        <div class="col-md-2 <?php echo $cantidadG; ?>" >
            <div class="form-group">
                <label for="field-3" class="control-label">Cantidad Maxima</label>
                <input class="form-control input-sm" type="number" id="cantidad"  value="<?php echo $cantidad; ?>"  name="duracionE" placeholder="" required>
            </div>
        </div>
        <div class="col-md-3 <?php echo $preventaG; ?>">
            <div class="form-group">
                <label for="field-1" class="control-label">Preventa</label>
                <div class="form-group ">
                    <label class="switch switch-green">
                        <input  type="checkbox" class="switch-input"  id="boxP" <?php echo $estadoPV; ?> >
                        <span class="switch-label" data-on="On" data-off="Off"></span>
                        <span class="switch-handle"></span>
                        <span id="estadoPV" class="esconder"><?php echo $estadoPVT; ?></span>
                    </label>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="form-group esconder" id="Emensaje1">
                <label for="field-3" class="control-label" >Mensaje de Error</label>
                <input class="form-control input-sm" type="text" id="Emensaje" style="color:red;" disabled>
            </div>
        </div>
    </div>
    <div class="modal-footer text-center">
        <button type="submit" class="btn btn-embossed btn-danger editar_venta <?php echo $informacion; ?>" ><i class="fa fa-save"></i> Guardar</button>
        <button type="button" class="btn btn-embossed btn-default cancelar " data-dismiss="modal" aria-hidden="true">Salir</button>
    </div>
</form>
<?php
$transport->close();
?>               
        