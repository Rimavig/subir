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
    $re = $client->login("compresor", $tipo.",".$var1);
    $resultado = "".$re;
    $historial= explode(';',$resultado);
}else{
    $var1 = $_SESSION["var1"];
    $re = $client->login("compresor", $tipo.",".$var1);
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
        if($datos[0]=="COMPRESOR"){
            if($datos[8]=="0"){
                $guardamotor=$var."alarma.png";
            }else if($datos[8]=="1"){
                $guardamotor=$var."alarma_on.png";
            }
            if($datos[9]=="0"){
                $preostato=$var."alarma.png";
            }else if($datos[9]=="1"){
                $preostato=$var."alarma_on.png";
            }
            if($datos[10]=="1"){
                $semaforo=$var."alarma_off.png";
            }else if($datos[10]=="0"){
                $semaforo=$var."alarma_on.png";
            }
            if($datos[11]=="0"){
                $fuga=$var."alarma.png";
            }else if($datos[11]=="1"){
                $fuga=$var."alarma_on.png";
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
                        <img data-src="" src="../../../assets/global/images/equipos/Imagen4.png"  alt="gallery 3">    
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
                
                </div> 
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="row" style="text-align:center; margin-top:20px;" >   
                        
                        <div class="col-md-6 col-sm-6 col-xs-6" style="text-align:center;">
                            <div class="col-md-4 col-sm-4 col-xs-4" style="text-align:center;">
                                <h2 style="margin:2px;"><img data-src="" src=<?php echo $guardamotor;?>  alt="gallery 3"></h2>
                            </div>
                            <div class="col-md-8 col-sm-8 col-xs-8">
                                <h3 style="margin-top:20px;"><strong>Falla térmica</strong></h3>
                            </div> 
                        </div> 
                        <div class="col-md-6 col-sm-6 col-xs-6" style="text-align:center;">
                            <div class="col-md-4 col-sm-4 col-xs-4" style="text-align:center;">
                                <h2 style="margin:2px;"><img data-src="" src=<?php echo $fuga;?>  alt="gallery 3"></h2>
                            </div>
                            <div class="col-md-8 col-sm-8 col-xs-8">
                                <h3 style="margin-top:20px;"><strong>Fuga de aire</strong></h3>
                            </div> 
                        </div> 
                        <div class="col-md-6 col-sm-6 col-xs-6" style="text-align:center;">
                            <div class="col-md-4 col-sm-4 col-xs-4" style="text-align:center;">
                                <h2 style="margin:2px;"><img data-src="" src=<?php echo $semaforo;?>  alt="gallery 3"></h2>
                            </div>
                            <div class="col-md-8 col-sm-8 col-xs-8">
                                <h3 style="margin-top:20px;"><strong>Compresor operativo</strong></h3>
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