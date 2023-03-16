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
if (isset($_POST["var1"])) {
    $var1 = $_POST['var1'];
    $nombre=$_POST['nombre'];
    $re = $client->getSalaMapa($var1,"Principal1");
    $resultado = "".$re;
}

?>

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
                        $datos =explode(';;',$resultado);
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
<?php
$transport->close();
?>
