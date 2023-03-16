<?php
include ("../../conect_taquilla.php");
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
if(isset($_POST["tipo"])){
    if (isset($_POST["var1"])) {
        $var1 = $_POST['var1'];
        $re = $client3->getSalaMapa($var1,"bloqueo");
        $resultado = "".$re;
        $var2 = $_POST['var2'];
        $re = $client3->getSalaMapa($var1,"bloqueo");
        $resultado = "".$re;
        $re1 = $client3->getAllPlatea($var2);
        $resultado2= "".$re1;
        $plateas =explode(';;',$resultado2);
        $numero_plateas = sizeof($plateas)+4;
        if($numero_plateas<= 4){
            $cant=3;
        }else if($numero_plateas<= 10){
            $cant=2;
        }else{
            $cant=1;
        }
    }
}else{
    if (isset($_POST["var1"])) {
        $var1 = $_POST['var1'];
        $re = $client3->getSalaMapa($var1,"Principal1");
        $resultado = "".$re;
    }
}


?>
<div class="modal-dialog modal-lg modal-principal">
    <div class="panel">
        <div class="seat-plan-section"> 
            <div  id="imagen1" class="screen-area">
                <br>
                <br>
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
                                    $estado =$asiento[4];
                            
                                    if($estado=="B" ){
                                        $imagen = "../../../assets/boleto/images/movie/bloqueo.png";
                                    }else if($estado=="V"){
                                        $imagen = "../../../assets/boleto/images/movie/bloqueo.png";
                                    }else if($estado=="C"){
                                        $imagen = "../../../assets/boleto/images/movie/bloqueo.png";
                                    }else if($estado=="E"){
                                        $imagen = "../../../assets/boleto/images/movie/bloqueo.png";
                                    } else{
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
                                    }
                                    
                                    if ($lateral1==$lateral) {
                                        ?>
                                                <li class="single-seat seat-free">
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
                                                <li class="single-seat seat-free">
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
                                                <li class="single-seat seat-free">
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
                        <br>
                        <div class="screen-thumb">
                            <img src="../../../assets/boleto/images/movie/screen-thumb.png" alt="movie">
                        </div>
                        <div class="row">

                            <div class="col-md-<?php echo $cant; ?>">
                                <div class="form-group" style ="text-align: center;">
                                    <img style="max-width: 40px;"  src="../../../assets/boleto/images/movie/bloqueo.png" alt="seat">
                                    <br>
                                    <label for="field-4" class="control-label">OCUPADO</label>
                                </div>
                            </div>
                            <?php
                            $va= 0;
                            foreach($plateas as $llave => $valores) {
                                $usuario =explode(',,,',$valores);
                                if (isset($usuario[3])) {
                                    $total= $usuario[3];
                                    $id= $usuario[0];
                                    $nombre= $usuario[1];
                                    $costo= $usuario[2];
                                    $text=$nombre." - $".$costo;
                                    if($va==0){
                                        $img="area1.png";
                                    }else if($va==1){
                                        $img="area2.png";
                                    }else if($va==2){
                                        $img="area3.png";
                                    }else if($va==3){
                                        $img="area4.png";
                                    }else if($va==4){
                                        $img="area5.png";
                                    }else if($va==5){
                                        $img="area6.png";
                                    }else if($va==6){
                                        $img="area7.png";
                                    }
                                    $va=$va+1;
                                    ?>
                                        <div class="col-md-<?php echo $cant; ?>">
                                            <div class="form-group" style ="text-align: center;">
                                                <img style="max-width: 35px;"  src="../../../assets/boleto/images/movie/<?php echo $img; ?>" alt="seat">
                                                <br>
                                                <label for="field-4" class="control-label"><?php echo $text; ?></label>
                                            </div>
                                        </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </ul>
                </div>
                
            </div>
        </div>
    </div>
</div>
<?php
$transport3->close();
?>