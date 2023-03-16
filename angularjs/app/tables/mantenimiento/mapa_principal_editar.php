<?php
include ("../../conect.php");
include ("../../autenticacion.php");

$var1="";
$editar="";
$nombre="";
$A="";
$B="";
$C="";
$D="";
$E="";
$F="";
$tipo="Mapa de Sala Principal";
$tipo2="EdistribucionP";
$nombreT="la distribución principal";
if (isset($_POST["var1"])) {
    $var1 = $_POST['var1'];
    $idMapa = $_POST['idMapa'];
    $nombre=$_POST['nombre'];
    $re = $client->getSalaMapa($var1,"Principal");
    $resultado = "".$re;
    $historial= explode('&',$resultado);
    if (isset($historial[1])) {
        $values=explode(';;',$historial[0]);;
        $dibujar=$historial[1];
        foreach($values as $llave => $valores) {
            $datos =explode(':',$valores);
            if (isset($datos[1])) {
                if ($datos[0]=="A") {
                    $A=$datos[1];
                }
                if ($datos[0]=="B") {
                    $B=$datos[1];
                }
                if ($datos[0]=="C") {
                    $C=$datos[1];
                }
                if ($datos[0]=="D") {
                    $D=$datos[1];
                }
                if ($datos[0]=="E") {
                    $E=$datos[1];
                }
                if ($datos[0]=="F") {
                    $F=$datos[1];
                }
            }
        }
    }
}

?>

<div>
    <div class="row principal">
        <div class="col-lg-12 portlets">
            <div class="panel">
                <div class="panel-header panel-controls">
                    <h3><i class="fa fa-table"></i>Editar Distribución de <strong>Sala Principal</strong> </h3>
                </div>
                <div class="panel-content pagination2 table-responsive">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Sala</label>
                                <select class="form-control" style="width:100%;">
                                    <option value="1">Sala Principal</option>
                                </select>  
                                <input type="text" name="Etipo" id="Etipo" class="esconder"  value="<?php echo $tipo2; ?>" disabled>    
                                <input type="text" name="Eid" id="Eid" class="esconder"  value="<?php echo $var1; ?>" disabled> 
                                <input type="text" name="Emapa" id="Emapa" class="esconder"  value="<?php echo $idMapa; ?>" disabled>
                                <input type="text" name="nombreT" id="nombreT" class="esconder"  value="<?php echo $nombreT; ?>" disabled>  
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Nombre Distribución</label>
                                <div class="form-group prepend-icon">
                                    <input type="text" name="name" id="Enombres" class="form-control" placeholder="Cine" value="<?php echo $nombre; ?>" minlength="3" required>
                                    <i class="icon-user"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row principal">
                        <div class="col-md-2">
                            <div>
                                <div>
                                    <input type="text" class="principal-fila" id="txtRight" value="FILA A" />
                                </div>
                                <select class="principal-select" id="filaA" size="5" multiple>
                                
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div>
                                <div>
                                    <input type="text" class="principal-fila" id="txtRight" value="FILA B" />
                                </div>
                                <select class="principal-select" id="filaB" size="5" multiple>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div>
                                <div>
                                    <input type="text" class="principal-fila" id="txtRight" value="FILA C" />
                                </div>
                                <select class="principal-select" id="filaC" size="5" multiple>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div>
                                <div>
                                    <input type="text" class="principal-fila" id="txtRight" value="FILA D" />
                                </div>
                                <select class="principal-select" id="filaD" size="5" multiple>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div>
                                <div>
                                    <input type="text" class="principal-fila" id="txtRight" value="FILA E" />
                                </div>
                                <select class="principal-select" id="filaE" size="5" multiple>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div>
                                <div>
                                    <input type="text" class="principal-fila" id="txtRight" value="FILA F" />
                                </div>
                                <select class="principal-select" id="filaF" size="5" multiple>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row principal">
                        <div class="col-md-2">
                            <div>
                                <div>
                                    <input type="text" class="principal-fila" id="txtRight" value="FILA G" />
                                </div>
                                <select class="principal-select" id="filaG" size="5" multiple>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div>
                                <div>
                                    <input type="text" class="principal-fila" id="txtRight" value="FILA H" />
                                </div>
                                <select class="principal-select" id="filaH" size="5" multiple>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div>
                                <div>
                                    <input type="text" class="principal-fila" id="txtRight" value="FILA J" />
                                </div>
                                <select class="principal-select" id="filaJ" size="5" multiple>
                                   
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div>
                                <div>
                                    <input type="text" class="principal-fila" id="txtRight" value="FILA K" />
                                </div>
                                <select class="principal-select" id="filaK" size="5" multiple>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div>
                                <div>
                                    <input type="text" class="principal-fila" id="txtRight" value="FILA L" />
                                </div>
                                <select class="principal-select" id="filaL" size="5" multiple>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div>
                                <div>
                                    <input type="text" class="principal-fila" id="txtRight" value="FILA M" />
                                </div>
                                <select class="principal-select" id="filaM" size="5" multiple>
                                    
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row principal">
                        <div class="col-md-2">
                            <div>
                                <div>
                                    <input type="text" class="principal-fila" id="txtRight" value="FILA N" />
                                </div>
                                <select class="principal-select" id="filaN" size="5" multiple>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div>
                                <div>
                                    <input type="text" class="principal-fila" id="txtRight" value="FILA O" />
                                </div>
                                <select class="principal-select" id="filaO" size="5" multiple>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div>
                                <div>
                                    <input type="text" class="principal-fila" id="txtRight" value="FILA P" />
                                </div>
                                <select class="principal-select" id="filaP" size="5" multiple>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div>
                                <div>
                                    <input type="text" class="principal-fila" id="txtRight" value="FILA Q" />
                                </div>
                                <select class="principal-select" id="filaQ" size="5" multiple>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div>
                                <div>
                                    <input type="text" class="principal-fila" id="txtRight" value="FILA R" />
                                </div>
                                <select class="principal-select" id="filaR" size="5" multiple>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div>
                                <div>
                                    <input type="text" class="principal-fila" id="txtRight" value="FILA S" />
                                </div>
                                <select class="principal-select" id="filaS" size="5" multiple>
                                    
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row principal">
                        <div class="col-md-2">
                            <div>
                                <div>
                                    <input type="text" class="principal-fila" id="txtRight" value="FILA T" />
                                </div>
                                <select class="principal-select" id="filaT" size="5" multiple>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div>
                                <div>
                                    <input type="text" class="principal-fila" id="txtRight" value="FILA U" />
                                </div>
                                <select class="principal-select" id="filaU" size="5" multiple>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div>
                                <div>
                                    <input type="text" class="principal-fila" id="txtRight" value="FILA V" />
                                </div>
                                <select class="principal-select" id="filaV" size="5" multiple>
                                   
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div>
                                <div>
                                    <input type="text" class="principal-fila" id="txtRight" value="FILA W" />
                                </div>
                                <select class="principal-select" id="filaW" size="5" multiple>
                                    
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer text-center">
                        <input class="btn btn-sm valA" type="button" id="btnA" value="A" />
                        <input class="btn btn-sm valB"  type="button" id="btnB" value="B" />
                        <input class="btn btn-sm valC"  type="button" id="btnC" value="C" />
                        <input class="btn btn-sm valD"  type="button" id="btnD" value="D" />
                        <input class="btn btn-sm valE"  type="button" id="btnE" value="E" />
                        <input class="btn btn-sm valF"  type="button" id="btnF" value="F" />
                        <input class="btn btn-sm todos"  type="button" id="btnAll" value="TODOS" />
                        <input class="btn btn-sm escoger"  type="button" id="btnReturn" value="REGRESAR" />
                        <input class="btn btn-sm limpio"  type="button" id="btnReturnAll" value="LIMPIAR" />
                    </div>
                    <div  class="modal-footer text-center" data-toggle="modal" data-target="#modal-responsive3">
                            <button class="mapa btn btn-sm btn-dark" value="2.jpg"><i class="fa fa-plus"></i> Ver Sala</button>
                    </div>
                    <div class="row principal">
                        <div class="col-md-2">
                            <div>
                                <div>
                                    <input type="text" class="principal-fila" id="txtRight" value="PLATEA A" />
                                </div>
                                <select class="principal-select valA" id="ValuesA" size="20" multiple>
                                <?php
                                   
                                $datos =explode(',',$A);
                                foreach($datos as $llave => $valores) {
                                    if ($valores!="") {
                                        ?>
                                        <option><?php echo $valores; ?></option>
                                        <?php
                                    }
                               }
                                
                                ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div>
                                <div>
                                    <input type="text" class="principal-fila" id="txtRight" value="PLATEA B" />
                                </div>
                                <select class="principal-select valB" id="ValuesB" size="20" multiple>
                                <?php
                                   
                                   $datos =explode(',',$B);
                                   foreach($datos as $llave => $valores) {
                                        if ($valores!="") {
                                           ?>
                                           <option><?php echo $valores; ?></option>
                                           <?php
                                       }
                                   }
                                   
                                   ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div>
                                <div>
                                    <input type="text" class="principal-fila" id="txtRight" value="PLATEA C" />
                                </div>
                                <select class="principal-select valC" id="ValuesC" size="20" multiple>
                                <?php
                                   
                                   $datos =explode(',',$C);
                                   foreach($datos as $llave => $valores) {
                                        if ($valores!="") {
                                            ?>
                                            <option><?php echo $valores; ?></option>
                                            <?php
                                        }
                                    }
                                   
                                   ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div>
                                <div>
                                    <input type="text" class="principal-fila" id="txtRight" value="PLATEA D" />
                                </div>
                                <select class="principal-select valD" id="ValuesD" size="20" multiple>
                                <?php
                                   
                                   $datos =explode(',',$D);
                                   foreach($datos as $llave => $valores) {
                                        if ($valores!="") {
                                            ?>
                                            <option><?php echo $valores; ?></option>
                                            <?php
                                        }
                                    }
                                   
                                   ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div>
                                <div>
                                    <input type="text" class="principal-fila" id="txtRight" value="PLATEA E" />
                                </div>
                                <select class="principal-select valE" id="ValuesE" size="20" multiple>
                                <?php
                                   
                                   $datos =explode(',',$E);
                                   foreach($datos as $llave => $valores) {
                                        if ($valores!="") {
                                            ?>
                                            <option><?php echo $valores; ?></option>
                                            <?php
                                        }
                                    }
                                   
                                   ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div>
                                <div>
                                    <input type="text" class="principal-fila" id="txtRight" value="PLATEA F" />
                                </div>
                                <select class="principal-select valF" id="ValuesF" size="20" multiple>
                                <?php
                                   
                                   $datos =explode(',',$F);
                                   foreach($datos as $llave => $valores) {
                                        if ($valores!="") {
                                            ?>
                                            <option><?php echo $valores; ?></option>
                                            <?php
                                        }
                                   }
                                   
                                   ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer text-center">
                        <!--button class="btn btn-primary btn-embossed bnt-square" type="button" id="editarNombre" ><i class="fa fa-check"></i> Editar Nombre</button-->
                        <button class="btn btn-danger btn-embossed bnt-square" type="button" id="editarD" ><i class="fa fa-check"></i> Guardar </button>
                        <button class="btn btn-embossed btn-default" type="button" id="cancelar" >Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-responsive3" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-principal">
            <div class="panel">
                <div class="seat-plan-section"> 
                    <div  id="imagen1" class="screen-area">
                        <div class="screen-thumb">
                            <img src="../../../assets/boleto/images/movie/screen-thumb.png" alt="movie">
                        </div>
                        <div class="screen-wrapper">
                            <ul class="seat-area">
                            <?php
                                $datos =explode(';;',$dibujar);
                                foreach($datos as $llave => $valores) {
                                    if (isset($datos[1])) {
                                        $tipo =explode(':',$valores);
                                        $letra =$tipo[0];
                                        $asientos =explode(',',$tipo[1]);
                                        ?>
                                        <li class="seat-line">
                                            <span></span>
                                            <ul class="seat--area">
                                                <li class="front-seat">
                                                    <ul>
                                        <?php
                                        $lateral1 ="I";
                                        $fila ="";
                                        foreach($asientos as $llave => $valores1) {
                                            $asiento =explode('-',$valores1);
                                            $fila =$asiento[0];
                                            $numero =$asiento[1];
                                            $lateral =$asiento[2];
                                            $platea =$asiento[3];
                                            $imagen="../../../assets/boleto/images/movie/seat01.png";
                                            if($platea=="A"){
                                                $imagen = "../../../assets/boleto/images/movie/area1.png";
                                            }else if($platea=="B"){
                                                $imagen = "../../../assets/boleto/images/movie/area2.png";
                                            }else if($platea=="C"){
                                                $imagen = "../../../assets/boleto/images/movie/area3.png";
                                            }else if($platea=="D"){
                                                $imagen = "../../../assets/boleto/images/movie/area4.png";
                                            }else if($platea=="E"){
                                                $imagen = "../../../assets/boleto/images/movie/area5.png";
                                            }else if($platea=="F"){
                                                $imagen = "../../../assets/boleto/images/movie/area6.png";
                                            }
                                            if ($lateral1==$lateral) {
                                                ?>
                                                        <li class="single-seat">
                                                            <img id="<?php echo $letra.$numero; ?>" src="<?php echo $imagen; ?>" alt="seat">
                                                            <span class="sit-num"><?php echo $numero; ?></span>
                                                        </li>
                                                <?php
                                            }else{
                                                $lateral1=$lateral;
                                                    if ($lateral=="C") { ?>
                                                    </ul>
                                                </li>
                                                <li class="front-seat">
                                                    <ul>
                                                        <li class="single-seat">
                                                            <img src="../../../assets/boleto/images/movie/seat01-booked.png" alt="seat">
                                                            <span class="sit-num1"><?php echo $letra; ?></span>
                                                        </li>
                                                        <li class="single-seat">
                                                            <img id="<?php echo $letra.$numero; ?>" src="<?php echo $imagen; ?>" alt="seat">
                                                            <span class="sit-num"><?php echo $numero; ?></span>
                                                        </li>
                                                    <?php 
                                                     }else{ ?>
                                                        <li class="single-seat">
                                                            <img  src="../../../assets/boleto/images/movie/seat01-booked.png" alt="seat">
                                                            <span class="sit-num1"><?php echo $letra; ?></span>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="front-seat">
                                                    <ul>
                                                        <li class="single-seat">
                                                            <img id="<?php echo $letra.$numero; ?>" src="<?php echo $imagen; ?>" alt="seat">
                                                            <span class="sit-num"><?php echo $numero; ?></span>
                                                        </li>
                                                    <?php 
                                                     }
                                            }
                                        }
                                        if ($fila=="W") { ?>
                                                        <li class="single-seat">
                                                            <img  src="../../../assets/boleto/images/movie/seat01-booked.png" alt="seat">
                                                            <span class="sit-num1"><?php echo $letra; ?></span>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                            <span></span>
                                        </li><?php 
                                        }else{?>
                                                    </ul>
                                                </li>
                                            </ul>
                                            <span></span>
                                        </li><?php 
                                        }
                                    }
                                }
                                
                            ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="alerta" id="alerta" >
    </div>
</div>
<?php
$transport->close();
?>