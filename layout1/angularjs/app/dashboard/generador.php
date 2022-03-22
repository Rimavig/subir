<?php
include ("../conect.php");
include ("../autenticacion.php");
$var="../../../assets/global/images/equipos/";
$var1="";
$nombre="";
$semaforo="";
$estado="";
$manual="";
$manual1="";
$manual1="";
$marca="";
$potencia="";
$voltaje="";
$corriente="";
$guardamotor="";
$nivel_cisterna="";
$fuga="";
$preostato="";
$tipo = $_SESSION["tipo"];
if (isset($_POST["var1"])) {
    $var1 = $_POST['var1'];
    $_SESSION["var1"]=$var1;
    $re = $client->login("generador", $tipo.",".$var1);
    $resultado = "".$re;
    $historial= explode(';',$resultado);
}else{
    $var1 = $_SESSION["var1"];
    $re = $client->login("generador", $tipo.",".$var1);
    $resultado = "".$re;
    $historial= explode(';',$resultado);
}


foreach($historial as $llave => $valores) {
    $datos =explode(',',$valores);
    if (isset($datos[1])) {
        $nombre=$datos[1];
        $marca=$datos[2];
        $potencia=$datos[3];
        $voltaje=$datos[4];
        $corriente=$datos[5];
        if($datos[6]=="0"){
            $estado=$var."off.png";
        }else if($datos[2]=="1"){
            $estado=$var."on.png";
        }
        if($datos[7]=="0"){
            $manual="red";
            $manual1="MANUAL";
        }else if($datos[7]=="1"){
            $manual="#14b51e";
            $manual1="AUTOMATICO";
        }
        if($datos[0]=="GENERADOR"){
            $bajo_presion="";
            $bajo_nivel="";
            $alta_temp="";
            $nivel_bateria="";
            if($datos[8]=="0"){
                $bajo_presion=$var."alarma.png";
            }else if($datos[8]=="1"){
                $bajo_presion=$var."alarma_on.png";
            }

            if($datos[9]=="0"){
                $bajo_nivel=$var."alarma.png";
            }else if($datos[9]=="1"){
                $bajo_nivel=$var."alarma_on.png";
            }
            if($datos[10]=="0"){
                $alta_temp=$var."alarma.png";
            }else if($datos[10]=="1"){
                $alta_temp=$var."alarma_on.png";
            }
            $VoltajeG=$datos[12];
            $nivel_bateria=$datos[11];

            if($datos[13]=="1"){
                $semaforo=$var."alarma_off.png";
            }else if($datos[13]=="0"){
                $semaforo=$var."alarma_on.png";
            }     
?>

<div class="modal-dialog modal-lg modal-mantenimiento">
    <div class="modal-content ">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
        </div>
        <div class="modal-body">
            <div class="row">   
                <div class="col-md-6 col-sm-6 col-xs-6" style="margin-top:0px;" >
                    <div class="col-md-12 col-sm-12 col-xs-12" style="text-align:center;">
                        <img data-src="" src="../../../assets/global/images/equipos/Imagen2.png"  alt="gallery 3">    
                    </div> 
                    <div class="col-md-12 col-sm-12 col-xs-12" style="text-align:center;">
                        <h3 style="margin:2px; color: <?php echo $manual;?>;"><strong>SISTEMA EN <?php echo $manual1;?></strong></h3>
                    </div>    
                </div> 
                <div class="col-md-6 col-sm-6 col-xs-6" style="margin-top:0px;" >
                    <div class="col-md-12 col-sm-12 col-xs-12" style="text-align:center;font-weight: 800;">
                        <h3 style="margin:2px;"><strong>Datos técnicos</strong></h3>
                    </div> 
                    <div class="col-md-4 col-sm-4 col-xs-4" style="">
                        <h3 style="margin:2px;font-weight: 800;"><strong>Marca:</strong></h3>
                    </div> 
                    <div class="col-md-8 col-sm-8 col-xs-8" style="text-align:center;">
                        <h3 style="margin:2px;"><?php echo $marca;?></h3>
                    </div> 
                    <div class="col-md-4 col-sm-4 col-xs-4" style="font-weight: 800;">
                        <h3 style="margin:2px;"><strong>Potencia:</strong></h3>
                    </div> 
                    <div class="col-md-8 col-sm-8 col-xs-8" style="text-align:center;">
                        <h3 style="margin:2px;"><?php echo $potencia;?></h3>
                    </div> 
                    <div class="col-md-4 col-sm-4 col-xs-4" style="font-weight: 800;">
                        <h3 style="margin:2px;"><strong>Voltaje:</strong></h3>
                    </div> 
                    <div class="col-md-8 col-sm-8 col-xs-8" style="text-align:center;">
                        <h3 style="margin:2px;"><?php echo $voltaje;?></h3>
                    </div> 
                    <div class="col-md-4 col-sm-4 col-xs-4" style="font-weight: 800;">
                        <h3 style="margin:2px;"><strong>Corriente:</strong></h3>
                    </div> 
                    <div class="col-md-8 col-sm-8 col-xs-8" style="text-align:center;">
                        <h3 style="margin:2px;"><?php echo $corriente;?></h3>
                    </div>   
                    <div class="col-md-7 col-sm-7 col-xs-7" style="text-align:center; margin-top:10px; padding:0px;">
                        <div class="col-md-12 col-sm-12 col-xs-12"style="text-align:center; padding:0px;">
                            <h3 style="margin:2px;"><strong>Voltaje Generador</strong></h3>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12" style="text-align:center;">
                            <h2 style="margin:2px;"><input class="form-control input-sm" style="width:120px;"type="text" value="<?php echo $VoltajeG;?> V" placeholder="Voltaje del Generador" disabled></h2>
                        </div>
                    </div> 
                    <div class="col-md-5 col-sm-5 col-xs-5" style="text-align:center; margin-top:10px; padding:0px;">
                        <div class="col-md-12 col-sm-12 col-xs-12" style="text-align:center; padding:0px;">
                            <h3 style="margin:2px;"><strong>Nivel Bateria</strong></h3>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12" style="text-align:center;">
                            <h2 style="margin:2px;"><input class="form-control input-sm" style="width:80px;"type="text" value="<?php echo $nivel_bateria;?> %" placeholder="Voltaje del Generador" disabled></h2>
                        </div>
                    </div> 
                </div> 
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="row" style="text-align:center; margin-top:20px;" >   
                        <div class="col-md-4 col-sm-4 col-xs-4" style="text-align:center;">
                            <div class="col-md-4 col-sm-4 col-xs-4" style="text-align:center;">
                                <h2 style="margin:2px;"><img data-src="" src=<?php echo $semaforo;?>  alt="gallery 3"></h2>
                            </div>
                            <div class="col-md-8 col-sm-8 col-xs-8" >
                                <h3 style="margin-top:10px; margin-bottom:0px;"><strong>Generador operativo</strong></h3>
                            </div> 
                        </div> 
                        <div class="col-md-4 col-sm-4 col-xs-4" style="text-align:center;">
                            <div class="col-md-4 col-sm-4 col-xs-4" style="text-align:center;">
                                <h2 style="margin:2px;"><img data-src="" src=<?php echo $estado;?>  alt="gallery 3"></h2>
                            </div>
                            <div class="col-md-8 col-sm-8 col-xs-8">
                                <h3 style="margin-top:20px;"><strong>Estado</strong></h3>
                            </div> 
                        </div> 
                        <div class="col-md-4 col-sm-4 col-xs-4" style="text-align:center;">
                            <div class="col-md-4 col-sm-4 col-xs-4" style="text-align:center;">
                                <h2 style="margin:2px;"><img data-src="" src=<?php echo $bajo_presion;?>  alt="gallery 3"></h2>
                            </div>
                            <div class="col-md-8 col-sm-8 col-xs-8">
                                <h3 style="margin-top:20px;"><strong>Presión de aceite</strong></h3>
                            </div> 
                        </div> 
                    </div> 
                    <div class="row" style="text-align:center; margin-top:20px;" >   
                        <div class="col-md-4 col-sm-4 col-xs-4" style="text-align:center;">
                            <div class="col-md-4 col-sm-4 col-xs-4" style="text-align:center;">
                                <h2 style="margin:2px;"><img data-src="" src=<?php echo $alta_temp;?>  alt="gallery 3"></h2>
                            </div>
                            <div class="col-md-8 col-sm-8 col-xs-8">
                                <h3 style="margin-top:20px;"><strong>Alta temperatura</strong></h3>
                            </div> 
                        </div> 
                        <div class="col-md-4 col-sm-4 col-xs-4" style="text-align:center;">
                            <div class="col-md-4 col-sm-4 col-xs-4" style="text-align:center;">
                                <h2 style="margin:2px;"><img data-src="" src=<?php echo $bajo_nivel;?>  alt="gallery 3"></h2>
                            </div>
                            <div class="col-md-8 col-sm-8 col-xs-8">
                                <h3 style="margin-top:20px;"><strong>Bajo Nivel combustible</strong></h3>
                            </div> 
                        </div> 
                        <div class="col-md-4 col-sm-4 col-xs-4" style="text-align:center;">
                            <div class="col-md-4 col-sm-4 col-xs-4" style="text-align:center;">
                                <h2 style="margin:2px;"><img data-src="" src=<?php echo $bajo_nivel;?>  alt="gallery 3"></h2>
                            </div>
                            <div class="col-md-8 col-sm-8 col-xs-8">
                                <h3 style="margin-top:20px;"><strong>Bajo Nivel Bateria</strong></h3>
                            </div> 
                        </div> 
                        
                    </div>    
                </div>   
            </div>   
        </div>
    </div>
</div>
<?php
}}}
$transport->close();
?>

<!--script>
  setInterval(function() {
    $('#cont3').load('./dashboard/equipos_total.php',function() {    
        $('.page-spinner-loader').addClass('hide');
    });
  },1200000);
</script-->