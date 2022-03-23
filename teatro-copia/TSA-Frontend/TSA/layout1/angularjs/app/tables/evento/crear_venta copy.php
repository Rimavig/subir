<?php
include ("../../conect.php");
include ("../../autenticacion.php");

$categoria= explode(';',"".$client->getAllCategoria());
$clasificacion=explode(';',"".$client->getAllClasificacion());
$espectaculo= explode(';',"".$client->getAllTipoEspectaculo());
$procedencia= explode(';',"".$client->getAllProcedencia());
$productora= explode(';',"".$client->getAllProductora());
$tipoE= explode(';',"".$client->getAllTipoEvento());
$sala=  explode(';',"".$client->getAllSala());
$distribucion=  explode(';',"".$client->getAllSalaMapa("1"));
$precio=  explode(';',"".$client->getAllTipoPrecio());
$var1="";
$editar="";
$tipo="";
$tipo="Venta";
$nombreT="el evento venta";
$tipo2="venta";
if ($_POST["tipo"]==="admin") {
    $tipo="Administrador";
    $editar="crear_usuario";
}else if ($_POST["tipo"]==="evento") {
    $tipo="Evento";
    $editar="crear_usuarioE";
}  
$M="";
$F="";

?>
<div class="modal-dialog modal-lg ">
    <div class="modal-content  ">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
            <h4 class="modal-title">Crear <strong>Eventos Venta</strong> </h4>
            <input type="text" name="tipo" id="tipo" class="esconder"  value="<?php echo $tipo2; ?>" disabled> 
            <input type="text" name="nombreT" id="nombreT" class="esconder"  value="<?php echo $nombreT; ?>" disabled>  
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="field-1" class="control-label">Nombre Evento</label>
                        <input type="text" name="nombreE" id="nombre" class="form-control" placeholder="Teatro Sanchez Aguilar" minlength="5" required>
                    </div>
                </div>
            
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="field-3" class="control-label">Duración</label>
                        <input class="form-control input-sm" type="number" id="duracion" name="duracionE" placeholder="Type a number" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="field-1" class="control-label">Fecha Inicial</label>
                        <div class="form-group prepend-icon">
                            <input type="date" name="fechaI" class="form-control" id="fechaI" style="padding: 0px 30px;" placeholder="07/08/1995"  required>
                            <i class="icon-calendar"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="field-1" class="control-label">Fecha Final</label>
                        <div class="form-group prepend-icon">
                            <input type="date" name="fechaF" class="form-control" id="fechaF" style="padding: 0px 30px;" placeholder="07/08/1995"  required>
                            <i class="icon-calendar"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">    
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="field-1" class="control-label">Tipo Evento</label>
                        <select class="form-control" id="tipoE" style="width:100%;">
                            <?php
                            foreach($tipoE as $llave => $valores) {
                                $evento =explode(',,,',$valores);
                                $estado="";
                                $estadoT="OFF";
                                if (isset($evento[1])) {
                                    if ($evento[3]==="A" ) {
                            ?>
                            <option value="<?php echo $evento[0]; ?>"><?php echo $evento[1];; ?></option>
                            <?php
                                     }
                                }
                            }
                            ?>                  
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="field-1" class="control-label">Productora</label>
                        <select class="form-control" id="productora" style="width:100%;">
                        <?php
                            foreach($productora as $llave => $valores) {
                                $productora =explode(',,,',$valores);
                                $estado="";
                                $estadoT="OFF";
                                if (isset($productora[1])) {
                                    if ($productora[3]==="A" ) {
                            ?>
                            <option value="<?php echo $productora[0]; ?>"><?php echo $productora[1];; ?></option>
                            <?php
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
                        <select class="form-control" id="categoria" style="width:100%;">
                        <?php
                            foreach($categoria as $llave => $valores) {
                                $categoria =explode(',,,',$valores);
                                $estado="";
                                $estadoT="OFF";
                                if (isset($categoria[1])) {
                                    if ($categoria[3]==="A" ) {
                            ?>
                            <option value="<?php echo $categoria[0]; ?>"><?php echo $categoria[1];; ?></option>
                            <?php
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
                        <label for="field-1" class="control-label">Clasificación</label>
                        <select class="form-control" id="clasificacion" style="width:100%;">
                        <?php
                            foreach($clasificacion as $llave => $valores) {
                                $clasificacion =explode(',,,',$valores);
                                $estado="";
                                $estadoT="OFF";
                                if (isset($clasificacion[1])) {
                                    if ($clasificacion[3]==="A" ) {
                            ?>
                            <option value="<?php echo $clasificacion[0]; ?>"><?php echo $clasificacion[1];; ?></option>
                            <?php
                                    }
                                }
                            }
                        ?>   
                        
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="field-1" class="control-label">Tipo Espectáculo</label>
                        <select class="form-control" id="espectaculo" style="width:100%;">
                        <?php
                            foreach($espectaculo as $llave => $valores) {
                                $espectaculo =explode(',,,',$valores);
                                if (isset($espectaculo[1])) {
                                    if ($espectaculo[3]==="A" ) {
                            ?>
                            <option value="<?php echo $espectaculo[0]; ?>"><?php echo $espectaculo[1];; ?></option>
                            <?php
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
                        <select class="form-control" id="procedencia" style="width:100%;">
                        <?php
                            foreach($procedencia as $llave => $valores) {
                                $procedencia  =explode(',,,',$valores);
                                if (isset($procedencia[1])) {
                                    if ($procedencia[3]==="A" ) {
                            ?>
                            <option value="<?php echo $procedencia[0]; ?>"><?php echo $procedencia[1];; ?></option>
                            <?php
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
                        <select class="form-control" id="sala" style="width:100%;">
                            <option value="none">Seleccione Sala</option>
                        <?php
                            foreach($sala as $llave => $valores) {
                                $sala  =explode(',,,',$valores);
                                if (isset($sala[1])) {
                                    if ($sala[5]==="A" ) {
                            ?>
                            <option value="<?php echo $sala[0]; ?>"><?php echo $sala[1];; ?></option>
                            <?php
                                    }
                                }
                            }
                        ?> 
                        </select>
                    </div>
                </div>
                <div class="col-md-8 distribucion_sala" id="distribucion_sala">
                </div>
            </div>
            <div class="row">  
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="field-1" class="control-label">Tipo de Precio</label>
                        <select class="form-control" id="precio" style="width:100%;">
                        <?php
                            foreach($precio as $llave => $valores) {
                                $precio =explode(',,,',$valores);
                                if (isset($precio[1])) {
                                    if ($precio[3]==="A" ) {
                            ?>
                            <option value="<?php echo $precio[0]; ?>"><?php echo $precio[1];; ?></option>
                            <?php
                                    }
                                }
                            }
                        ?>   
                        </select>
                    </div>
                </div> 
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="field-3" class="control-label">Aforo</label>
                        <input class="form-control input-sm" type="number" id="aforo" name="duracionE" placeholder="Type a number" required>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group esconder" id="mensaje1">
                        <label for="field-3" class="control-label" >Mensaje de Error</label>
                        <input class="form-control input-sm" type="text" id="mensaje" style="color:red;" disabled>
                    </div>
                </div>
            </div>
            
            
            <div class="modal-footer text-center">
                <button type="button" class="btn btn-primary btn-embossed bnt-square crear_venta" ><i class="fa fa-check"></i> Crear</button>
                <button type="button" class="btn btn-embossed btn-default " data-dismiss="modal" aria-hidden="true">Cancelar</button>
            </div>
        </div>
    </div>
</div>
