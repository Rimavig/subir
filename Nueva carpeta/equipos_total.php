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
    $re = $client->login("Equipos_all", $tipo.",".$var1);
    $resultado = "".$re;
    $historial= explode(';',$resultado);
}else{
    $var1 = $_SESSION["var1"];
    $re = $client->login("Equipos_all", $tipo.",".$var1);
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
        
?><div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 portlets"><?php
    if($datos[0]=="BOMBA"){
        if($datos[8]=="0"){
            $guardamotor=$var."alarma.png";
        }else if($datos[8]=="1"){
            $guardamotor=$var."alarma_on.png";
        }
        if($datos[9]=="0"){
            $nivel_cisterna=$var."alarma.png";
        }else if($datos[9]=="1"){
            $nivel_cisterna=$var."alarma_on.png";
        }
        if($datos[10]=="0"){
            $preostato=$var."alarma.png";
        }else if($datos[10]=="1"){
            $preostato=$var."alarma_on.png";
        }
        if($datos[11]=="0"){
            $semaforo=$var."alarma_off.png";
        }else if($datos[11]=="1"){
            $semaforo=$var."alarma_on.png";
        }
        if($datos[12]=="0"){
            $fuga=$var."alarma.png";
        }else if($datos[12]=="1"){
            $fuga=$var."alarma_on.png";
        }
?>
    <div class="panel" style="height:380px;" >
        <div class="panel-header panel-controls">
            <h3><i class="fa fa-table"></i> <strong>Bomba de Agua</strong></h3>
        </div>
        <div class="row">   
            <div class="col-md-6 col-sm-6 col-xs-6" style="margin-top:10px;" >
                <div class="col-md-12 col-sm-12 col-xs-12" style="text-align:center;">
                    <img data-src="" src="../../../assets/global/images/equipos/Imagen1.jpg"  alt="gallery 3">    
                </div> 
                <div class="col-md-12 col-sm-12 col-xs-12" style="text-align:center;">
                    <h3 style="margin:2px; color: <?php echo $manual;?>;"><strong>SISTEMA EN <?php echo $manual1;?></strong></h3>
                </div>    
            </div> 
            <div class="col-md-6 col-sm-6 col-xs-6" style="margin-top:20px;" >
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
                            <h2 style="margin:2px;"><img data-src="" src=<?php echo $nivel_cisterna;?>  alt="gallery 3"></h2>
                        </div>
                        <div class="col-md-8 col-sm-8 col-xs-8">
                            <h3 style="margin-top:20px;"><strong>Nivel Bajo CIsterna</strong></h3>
                        </div> 
                    </div> 
                    <div class="col-md-6 col-sm-6 col-xs-6" style="text-align:center;">
                        <div class="col-md-4 col-sm-4 col-xs-4" style="text-align:center;">
                            <h2 style="margin:2px;"><img data-src="" src=<?php echo $semaforo;?>  alt="gallery 3"></h2>
                        </div>
                        <div class="col-md-8 col-sm-8 col-xs-8">
                            <h3 style="margin-top:20px;"><strong>Bomba operativa</strong></h3>
                        </div> 
                    </div> 
                    <div class="col-md-6 col-sm-6 col-xs-6" style="text-align:center;">
                        <div class="col-md-4 col-sm-4 col-xs-4" style="text-align:center;">
                            <h2 style="margin:2px;"><img data-src="" src=<?php echo $fuga;?>  alt="gallery 3"></h2>
                        </div>
                        <div class="col-md-8 col-sm-8 col-xs-8">
                            <h3 style="margin-top:20px;"><strong>Fuga de agua</strong></h3>
                        </div> 
                    </div> 
                </div>    
            </div> 
        </div>    
    </div>
<?php 
    }else if($datos[0]=="COMPRESOR"){
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
        if($datos[10]=="0"){
            $semaforo=$var."alarma_off.png";
        }else if($datos[10]=="1"){
            $semaforo=$var."alarma_on.png";
        }
        if($datos[11]=="0"){
            $fuga=$var."alarma.png";
        }else if($datos[11]=="1"){
            $fuga=$var."alarma_on.png";
        }
?>
    <div class="panel" style="height:380px;" >
        <div class="panel-header panel-controls">
            <h3><i class="fa fa-table"></i> <strong>Compresor</strong></h3>
        </div>
        <div class="row">   
            <div class="col-md-6 col-sm-6 col-xs-6" style="margin-top:10px;" >
            
                <div class="col-md-12 col-sm-12 col-xs-12" style="text-align:center;">
                    <img data-src="" src="../../../assets/global/images/equipos/Imagen4.png"  alt="gallery 3">    
                </div> 
                <div class="col-md-12 col-sm-12 col-xs-12" style="text-align:center;">
                    <h3 style="margin:2px; color: <?php echo $manual;?>;"><strong>SISTEMA EN <?php echo $manual1;?></strong></h3>
                </div>    
            </div> 
            <div class="col-md-6 col-sm-6 col-xs-6" style="margin-top:20px;" >
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
<?php 
    }else if($datos[0]=="RCI"){
        $marca2=$datos[6];
        $potencia2=$datos[7];
        $voltaje2=$datos[8];
        $corriente2=$datos[9];
        if($datos[12]=="0"){
            $guardamotor=$var."alarma.png";
        }else if($datos[12]=="1"){
            $guardamotor=$var."alarma_on.png";
        }
        if($datos[13]=="0"){
            $preostato=$var."alarma.png";
        }else if($datos[13]=="1"){
            $preostato=$var."alarma_on.png";
        }
        if($datos[14]=="0"){
            $semaforo=$var."alarma_off.png";
        }else if($datos[14]=="1"){
            $semaforo=$var."alarma_on.png";
        }

        $estado1="";
        if($datos[15]=="0"){
            $estado1=$var."off.png";
        }else if($datos[15]=="1"){
            $estado1=$var."on.png";
        }
        $manualj="";
        $manualj1="";
        if($datos[16]=="0"){
            $manualj="red";
            $manualj1="MANUAL";
        }else if($datos[16]=="1"){
            $manualj="#14b51e";
            $manualj1="AUTOMATICO";
        }
        
        $guardamotor1="";
        if($datos[17]=="0"){
            $guardamotor1=$var."alarma.png";
        }else if($datos[17]=="1"){
            $guardamotor1=$var."alarma_on.png";
        }
        $preostato1="";
        if($datos[18]=="0"){
            $preostato1=$var."alarma.png";
        }else if($datos[8]=="1"){
            $preostato1=$var."alarma_on.png";
        }

        $semaforo1="";
        if($datos[19]=="0"){
            $semaforo1=$var."alarma_off.png";
        }else if($datos[19]=="1"){
            $semaforo1=$var."alarma_on.png";
        }
        if($datos[20]=="0"){
            $fuga=$var."alarma.png";
        }else if($datos[19]=="1"){
            $fuga=$var."alarma_on.png";
        }   
?>
    <div class="panel" style="height:380px;" >
        <div class="panel-header panel-controls">
            <h3><i class="fa fa-table"></i> <strong>SCI</strong></h3>
        </div>
        <div class="row" >   
            <div class="col-md-3 col-sm-3 col-xs-3" style="margin-top:10px; text-align:center;" >
                 <div class="col-md-12 col-sm-12 col-xs-12" style="text-align:center;">
                    <img data-src="" src="../../../assets/global/images/equipos/Imagen4.jpg"  alt="gallery 3">    
                </div> 
                <div class="col-md-12 col-sm-12 col-xs-12" style="margin:22px; text-align:center;">
                    <div class="row" >  
                        <div class="col-md-12 col-sm-12 col-xs-12" style="text-align:center; padding:0px;">
                            <h2 style="margin:2px;"><img data-src="" src=<?php echo $fuga;?>  alt="gallery 3"></h2>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12" style="padding:0px; text-align:center;" >
                            <h3 style="margin-top:2px;"><strong>Nivel Bajo reserva cisterna</strong></h3>
                        </div> 
                    </div> 
                </div>  
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4" style="margin-top:0px; padding:0px;" >
                <div class="col-md-12 col-sm-12 col-xs-12" style="text-align:center; padding:0px;">
                    <h3 style="margin:2px;"><strong>BOMBA PRINCIPAL</strong></h3>
                    <h3 style="margin-top:2px; color: <?php echo $manual;?>;"><strong>SISTEMA EN <?php echo $manual1;?></strong></h3>
                </div>   
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
                <div class="col-md-12 col-sm-12 col-xs-12" style="margin:5px; text-align:center; padding:0px;">
                    <div class="col-md-4 col-sm-4 col-xs-4" style="text-align:center; padding:0px;">
                        <h2 style="margin:2px;"><img data-src="" src=<?php echo $guardamotor;?>  alt="gallery 3"></h2>
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8" style="padding:0px;" >
                        <h3 style="margin-top:20px;"><strong>Falla térmica</strong></h3>
                    </div> 
                </div> 
                <div class="col-md-12 col-sm-12 col-xs-12" style="margin:5px; text-align:center; padding:0px;">
                    <div class="col-md-4 col-sm-4 col-xs-4" style="text-align:center; padding:0px;">
                        <h2 style="margin:2px;"><img data-src="" src=<?php echo $semaforo;?>  alt="gallery 3"></h2>
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8" style="padding:0px;" >
                        <h3 style="margin-top:20px;"><strong>Bomba operativo</strong></h3>
                    </div> 
                </div> 
            </div> 
            <div class="col-md-5 col-sm-5 col-xs-5" style="margin-top:0px; padding:0px;" >
                <div class="col-md-12 col-sm-12 col-xs-12" style="text-align:center; padding:0px;">
                    <h3 style="margin:2px;"><strong>BOMBA JOCKEY</strong></h3>
                    <h3 style="margin-top:2px; color: <?php echo $manualj;?>;"><strong>SISTEMA EN <?php echo $manualj1;?></strong></h3>
                </div>   
                <div class="col-md-12 col-sm-12 col-xs-12" style="text-align:center;font-weight: 800;">
                    <h3 style="margin:2px;"><strong>Datos técnicos</strong></h3>
                </div> 
                <div class="col-md-4 col-sm-4 col-xs-4" style="">
                    <h3 style="margin:2px;font-weight: 800;"><strong>Marca:</strong></h3>
                </div> 
                <div class="col-md-8 col-sm-8 col-xs-8" style="text-align:center;">
                    <h3 style="margin:2px;"><?php echo $marca2;?></h3>
                </div> 
                <div class="col-md-4 col-sm-4 col-xs-4" style="font-weight: 800;">
                    <h3 style="margin:2px;"><strong>Potencia:</strong></h3>
                </div> 
                <div class="col-md-8 col-sm-8 col-xs-8" style="text-align:center;">
                    <h3 style="margin:2px;"><?php echo $potencia2;?></h3>
                </div> 
                <div class="col-md-4 col-sm-4 col-xs-4" style="font-weight: 800;">
                    <h3 style="margin:2px;"><strong>Voltaje:</strong></h3>
                </div> 
                <div class="col-md-8 col-sm-8 col-xs-8" style="text-align:center;">
                    <h3 style="margin:2px;"><?php echo $voltaje2;?></h3>
                </div> 
                <div class="col-md-4 col-sm-4 col-xs-4" style="font-weight: 800;">
                    <h3 style="margin:2px;"><strong>Corriente:</strong></h3>
                </div> 
                <div class="col-md-8 col-sm-8 col-xs-8" style="text-align:center;">
                    <h3 style="margin:2px;"><?php echo $corriente2;?></h3>
                </div>  
                <div class="col-md-12 col-sm-12 col-xs-12" style="margin:5px; text-align:center; padding:0px;">
                    <div class="col-md-4 col-sm-4 col-xs-4" style="text-align:center; padding:0px;">
                        <h2 style="margin:2px;"><img data-src="" src=<?php echo $guardamotor1;?>  alt="gallery 3"></h2>
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8" style="padding:0px;" >
                        <h3 style="margin-top:20px;"><strong>Falla térmica</strong></h3>
                    </div> 
                </div> 
                <div class="col-md-12 col-sm-12 col-xs-12" style="margin:5px; text-align:center; padding:0px;">
                    <div class="col-md-4 col-sm-4 col-xs-4" style="text-align:center; padding:0px;">
                        <h2 style="margin:2px;"><img data-src="" src=<?php echo $semaforo1;?>  alt="gallery 3"></h2>
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8" style="padding:0px;" >
                        <h3 style="margin-top:20px;"><strong>Bomba operativo</strong></h3>
                    </div> 
                </div> 
            </div> 
        </div>    
    </div>
<?php 
    }else if($datos[0]=="GENERADOR"){
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
        $VoltajeG=$datos[11];
        $nivel_bateria=$datos[12];

        if($datos[13]=="0"){
            $semaforo=$var."alarma_off.png";
        }else if($datos[13]=="1"){
            $semaforo=$var."alarma_on.png";
        }     
?>
    <div class="panel" style="height:380px;" >
        <div class="panel-header panel-controls">
            <h3><i class="fa fa-table"></i> <strong>Generador</strong></h3>
        </div>
        <div class="row">   
            <div class="col-md-6 col-sm-6 col-xs-6" style="margin-top:20px;" >
                <div class="col-md-12 col-sm-12 col-xs-12" style="text-align:center;">
                    <img data-src="" src="../../../assets/global/images/equipos/Imagen2.png"  alt="gallery 3">    
                </div> 
                <div class="col-md-12 col-sm-12 col-xs-12" style="text-align:center;">
                    <h3 style="margin:2px; color: <?php echo $manual;?>;"><strong>SISTEMA EN <?php echo $manual1;?></strong></h3>
                </div>    
            </div> 
            <div class="col-md-6 col-sm-6 col-xs-6" style="margin-top:10px;" >
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
                    
                    <div class="col-md-6 col-sm-6 col-xs-6" style="text-align:center;">
                        <div class="col-md-4 col-sm-4 col-xs-4" style="text-align:center;">
                            <h2 style="margin:2px;"><img data-src="" src=<?php echo $alta_temp;?>  alt="gallery 3"></h2>
                        </div>
                        <div class="col-md-8 col-sm-8 col-xs-8">
                            <h3 style="margin-top:20px;"><strong>Falla térmica</strong></h3>
                        </div> 
                    </div> 
                    <div class="col-md-6 col-sm-6 col-xs-6" style="text-align:center;">
                        <div class="col-md-4 col-sm-4 col-xs-4" style="text-align:center;">
                            <h2 style="margin:2px;"><img data-src="" src=<?php echo $bajo_presion;?>  alt="gallery 3"></h2>
                        </div>
                        <div class="col-md-8 col-sm-8 col-xs-8">
                            <h3 style="margin-top:20px;"><strong>Presión de aceite</strong></h3>
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
                    <div class="col-md-6 col-sm-6 col-xs-6" style="text-align:center;">
                        <div class="col-md-4 col-sm-4 col-xs-4" style="text-align:center;">
                            <h2 style="margin:2px;"><img data-src="" src=<?php echo $bajo_nivel;?>  alt="gallery 3"></h2>
                        </div>
                        <div class="col-md-8 col-sm-8 col-xs-8">
                            <h3 style="margin-top:20px;"><strong>Bajo Nivel Agua</strong></h3>
                        </div> 
                    </div> 
                    
                </div>    
            </div>   
        </div>    
    </div>
<?php 
    }
?>
</div>
<?php
}}
$transport->close();
?>

<script>
  setInterval(function() {
    $('#cont3').load('./dashboard/equipos_total.php',function() {    
        $('.page-spinner-loader').addClass('hide');
    });
  },1200000);
</script>