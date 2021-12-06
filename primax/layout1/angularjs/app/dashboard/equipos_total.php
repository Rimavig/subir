<?php
include ("../conect.php");
include ("../autenticacion.php");
$var="../../../assets/global/images/equipos/";
$var1="";
$nombre="";
$semaforo="";
$estado="";
$manual="";
$guardamotor="";
$nivel_cisterna="";
$preostato="";
$tipo = $_SESSION["tipo"];
if (isset($_POST["var1"])) {
    $var1 = $_POST['var1'];
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
        if($datos[2]=="0"){
            $estado=$var."off.png";
        }else if($datos[2]=="1"){
            $estado=$var."on.png";
        }
        if($datos[3]=="0"){
            $manual=$var."manual.png";
        }else if($datos[3]=="1"){
            $manual=$var."automatico.png";
        }
        
?><div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 portlets"><?php
    if($datos[0]=="BOMBA"){
        if($datos[4]=="0"){
            $guardamotor=$var."alarma_off.png";
        }else if($datos[4]=="1"){
            $guardamotor=$var."alarma_on.png";
        }
        if($datos[5]=="0"){
            $nivel_cisterna=$var."alarma_off.png";
        }else if($datos[5]=="1"){
            $nivel_cisterna=$var."alarma_on.png";
        }
        if($datos[6]=="0"){
            $preostato=$var."alarma_off.png";
        }else if($datos[6]=="1"){
            $preostato=$var."alarma_on.png";
        }
        if($datos[7]=="0"){
            $semaforo=$var."verde.png";
        }else if($datos[7]=="1"){
            $semaforo=$var."amarillo.png";
        }else if($datos[7]=="2"){
            $semaforo=$var."rojo.png";
        }      
?>
    <div class="panel" style="height:320px;" >
        <div class="panel-header panel-controls">
            <h3><i class="fa fa-table"></i> <strong>Bomba de Agua</strong></h3>
        </div>
        <div class="row">   
            <div class="col-md-6 col-sm-6 col-xs-6" style="margin-top:50px;" >
                    <img data-src="" src="../../../assets/global/images/equipos/bomba.png" class="img-responsive" alt="gallery 3">
            </div> 
            <div class="col-md-3 col-sm-3 col-xs-3">
                <div class="row" style="text-align:center;" >   
                    <h2><strong>Status</strong></h2>
                    <div class="col-md-6 col-sm-6 col-xs-6" style="text-align:center;">
                            <h2><img data-src="" src=<?php echo $estado;?>  alt="gallery 3"></h2>
                    </div> 
                    <div class="col-md-6 col-sm-6 col-xs-6" style="text-align:center;">
                        <h2>  <img data-src="" src=<?php echo $semaforo;?>  alt="gallery 3"></h2>
                    </div> 
                    <div class="col-md-12 col-sm-12 col-xs-12" style="text-align:center;">
                        <h2>  <img data-src="" src=<?php echo $manual;?>  alt="gallery 3"></h2>
                    </div> 
                </div>    
            </div> 
            <div class="col-md-3 col-sm-3 col-xs-3">
                <div class="row" style="text-align:center; margin-top:20px;" >   
                    
                    <div class="col-md-12 col-sm-12 col-xs-12" style="text-align:center;">
                        <h3 style="margin:2px;"><strong>Guardamotor</strong></h3>
                        <h2 style="margin:2px;"><img data-src="" src=<?php echo $guardamotor;?>  alt="gallery 3"></h2>
                    </div> 
                    <div class="col-md-12 col-sm-12 col-xs-12" style="text-align:center;">
                        <h3 style="margin:2px;"><strong>Nivel Bajo Cisterna</strong></h3>
                        <h2 style="margin:2px;">  <img data-src=""  src=<?php echo $nivel_cisterna;?>  alt="gallery 3"></h2>
                    </div> 
                    <div class="col-md-12 col-sm-12 col-xs-12" style="text-align:center;">
                        <h3 style="margin:2px;"><strong>Preostato</strong></h3>
                        <h2 style="margin:2px;">  <img data-src=""  src=<?php echo $preostato;?>  alt="gallery 3"></h2>
                    </div> 
                </div>    
            </div> 
        </div>    
    </div>
<?php 
    }else if($datos[0]=="COMPRESOR"){
        if($datos[4]=="0"){
            $guardamotor=$var."alarma_off.png";
        }else if($datos[4]=="1"){
            $guardamotor=$var."alarma_on.png";
        }

        if($datos[5]=="0"){
            $preostato=$var."alarma_off.png";
        }else if($datos[5]=="1"){
            $preostato=$var."alarma_on.png";
        }
        if($datos[6]=="0"){
            $semaforo=$var."verde.png";
        }else if($datos[6]=="1"){
            $semaforo=$var."amarillo.png";
        }else if($datos[6]=="2"){
            $semaforo=$var."rojo.png";
        }      
?>
    <div class="panel" style="height:320px;" >
        <div class="panel-header panel-controls">
            <h3><i class="fa fa-table"></i> <strong>Compresor</strong></h3>
        </div>
        <div class="row">   
            <div class="col-md-6 col-sm-6 col-xs-6" style="margin-top:50px;" >
                    <img data-src="" src="../../../assets/global/images/equipos/compresor.png" class="img-responsive" alt="gallery 3">
            </div> 
            <div class="col-md-3 col-sm-3 col-xs-3">
                <div class="row" style="text-align:center;" >   
                    <h2><strong>Status</strong></h2>
                    <div class="col-md-6 col-sm-6 col-xs-6" style="text-align:center;">
                            <h2><img data-src="" src=<?php echo $estado;?>  alt="gallery 3"></h2>
                    </div> 
                    <div class="col-md-6 col-sm-6 col-xs-6" style="text-align:center;">
                        <h2>  <img data-src="" src=<?php echo $semaforo;?>  alt="gallery 3"></h2>
                    </div> 
                    <div class="col-md-12 col-sm-12 col-xs-12" style="text-align:center;">
                        <h2>  <img data-src="" src=<?php echo $manual;?>  alt="gallery 3"></h2>
                    </div> 
                </div>    
            </div> 
            <div class="col-md-3 col-sm-3 col-xs-3">
                <div class="row" style="text-align:center; margin-top:20px;" >   
                    
                    <div class="col-md-12 col-sm-12 col-xs-12" style="text-align:center;">
                        <h3 style="margin:2px;"><strong>Guardamotor</strong></h3>
                        <h2 style="margin:2px;"><img data-src="" src=<?php echo $guardamotor;?>  alt="gallery 3"></h2>
                    </div> 
                    <div class="col-md-12 col-sm-12 col-xs-12" style="text-align:center;">
                        <h3 style="margin:2px;"><strong>Preostato</strong></h3>
                        <h2 style="margin:2px;">  <img data-src=""  src=<?php echo $preostato;?>  alt="gallery 3"></h2>
                    </div> 
                </div>    
            </div> 
        </div>    
    </div>
<?php 
    }else if($datos[0]=="RCI"){
        if($datos[4]=="0"){
            $guardamotor=$var."alarma_off.png";
        }else if($datos[4]=="1"){
            $guardamotor=$var."alarma_on.png";
        }
        if($datos[5]=="0"){
            $preostato=$var."alarma_off.png";
        }else if($datos[5]=="1"){
            $preostato=$var."alarma_on.png";
        }
        if($datos[6]=="0"){
            $semaforo=$var."verde.png";
        }else if($datos[6]=="1"){
            $semaforo=$var."amarillo.png";
        }else if($datos[6]=="2"){
            $semaforo=$var."rojo.png";
        }    
        $estado1="";
        if($datos[7]=="0"){
            $estado1=$var."off.png";
        }else if($datos[7]=="1"){
            $estado1=$var."on.png";
        }
        $manual1="";
        if($datos[8]=="0"){
            $manual1=$var."manual.png";
        }else if($datos[8]=="1"){
            $manual1=$var."automatico.png";
        }
        
        $guardamotor1="";
        if($datos[9]=="0"){
            $guardamotor1=$var."alarma_off.png";
        }else if($datos[9]=="1"){
            $guardamotor1=$var."alarma_on.png";
        }
        $preostato1="";
        if($datos[10]=="0"){
            $preostato1=$var."alarma_off.png";
        }else if($datos[10]=="1"){
            $preostato1=$var."alarma_on.png";
        }

        $semaforo1="";
        if($datos[11]=="0"){
            $semaforo1=$var."verde.png";
        }else if($datos[11]=="1"){
            $semaforo1=$var."amarillo.png";
        }else if($datos[11]=="2"){
            $semaforo1=$var."rojo.png";
        }    
?>
    <div class="panel" style="height:380px;" >
        <div class="panel-header panel-controls">
            <h3><i class="fa fa-table"></i> <strong>SCI</strong></h3>
        </div>
        <div class="row" >   
            <div class="col-md-3 col-sm-3 col-xs-6" style="margin-top:50px;" >
                <img data-src="" src="../../../assets/global/images/equipos/rci.png" style="width:-moz-available;" alt="gallery 3">
            </div> 
            <div class="col-md-3 col-sm-3 col-xs-3">
                <div class="row" style="text-align:center;" >   
                    <h2><strong>Status BJ </strong></h2>
                    <div class="col-md-6 col-sm-6 col-xs-6" style="text-align:center;">
                            <h2><img data-src="" src=<?php echo $estado;?>  alt="gallery 3"></h2>
                    </div> 
                    <div class="col-md-6 col-sm-6 col-xs-6" style="text-align:center;">
                        <h2>  <img data-src="" src=<?php echo $semaforo;?>  alt="gallery 3"></h2>
                    </div> 
                    <div class="col-md-12 col-sm-12 col-xs-12" style="text-align:center;">
                        <h2>  <img data-src="" src=<?php echo $manual;?>  alt="gallery 3"></h2>
                    </div> 
                </div>    
            </div> 
            <div class="col-md-3 col-sm-3 col-xs-3">
                <div class="row" style="text-align:center;" >   
                    <h2><strong>Status BP </strong></h2>
                    <div class="col-md-6 col-sm-6 col-xs-6" style="text-align:center;">
                            <h2><img data-src="" src=<?php echo $estado1;?>  alt="gallery 3"></h2>
                    </div> 
                    <div class="col-md-6 col-sm-6 col-xs-6" style="text-align:center;">
                        <h2>  <img data-src="" src=<?php echo $semaforo1;?>  alt="gallery 3"></h2>
                    </div> 
                    <div class="col-md-12 col-sm-12 col-xs-12" style="text-align:center;">
                        <h2>  <img data-src="" src=<?php echo $manual1;?>  alt="gallery 3"></h2>
                    </div> 
                </div>    
            </div> 
            <div class="col-md-3 col-sm-3 col-xs-3">
                <div class="row" style="text-align:center;" >   
                    <div class="col-md-12 col-sm-12 col-xs-12" style="text-align:center;">
                        <h3 style="margin:2px;"><strong>GuardaM BJ</strong></h3>
                        <h2 style="margin:2px;"><img data-src="" src=<?php echo $guardamotor;?>  alt="gallery 3"></h2>
                    </div> 
                    <div class="col-md-12 col-sm-12 col-xs-12" style="text-align:center;">
                        <h3 style="margin:2px;"><strong>Preostato BJ</strong></h3>
                        <h2 style="margin:2px;">  <img data-src=""  src=<?php echo $preostato;?>  alt="gallery 3"></h2>
                    </div> 
                    <div class="col-md-12 col-sm-12 col-xs-12" style="text-align:center;">
                        <h3 style="margin:2px;"><strong>GuardaM BP</strong></h3>
                        <h2 style="margin:2px;"><img data-src="" src=<?php echo $guardamotor1;?>  alt="gallery 3"></h2>
                    </div> 
                    <div class="col-md-12 col-sm-12 col-xs-12" style="text-align:center;">
                        <h3 style="margin:2px;"><strong>Preostato BP</strong></h3>
                        <h2 style="margin:2px;">  <img data-src=""  src=<?php echo $preostato1;?>  alt="gallery 3"></h2>
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
        if($datos[4]=="0"){
            $bajo_presion=$var."alarma_off.png";
        }else if($datos[4]=="1"){
            $bajo_presion=$var."alarma_on.png";
        }

        if($datos[5]=="0"){
            $bajo_nivel=$var."alarma_off.png";
        }else if($datos[5]=="1"){
            $bajo_nivel=$var."alarma_on.png";
        }
        if($datos[6]=="0"){
            $alta_temp=$var."alarma_off.png";
        }else if($datos[6]=="1"){
            $alta_temp=$var."alarma_on.png";
        }
        if($datos[7]=="0"){
            $nivel_bateria=$var."alarma_off.png";
        }else if($datos[7]=="1"){
            $nivel_bateria=$var."alarma_on.png";
        }
        if($datos[8]=="0"){
            $semaforo=$var."verde.png";
        }else if($datos[8]=="1"){
            $semaforo=$var."amarillo.png";
        }else if($datos[8]=="2"){
            $semaforo=$var."rojo.png";
        }      
?>
    <div class="panel" style="height:380px;" >
        <div class="panel-header panel-controls">
            <h3><i class="fa fa-table"></i> <strong>Generador</strong></h3>
        </div>
        <div class="row">   
            <div class="col-md-6 col-sm-6 col-xs-6" style="margin-top:50px;" >
                    <img data-src="" src="../../../assets/global/images/equipos/generador.png" class="img-responsive" alt="gallery 3">
            </div> 
            <div class="col-md-3 col-sm-3 col-xs-3">
                <div class="row" style="text-align:center;" >   
                    <h2><strong>Status</strong></h2>
                    <div class="col-md-6 col-sm-6 col-xs-6" style="text-align:center;">
                            <h2><img data-src="" src=<?php echo $estado;?>  alt="gallery 3"></h2>
                    </div> 
                    <div class="col-md-6 col-sm-6 col-xs-6" style="text-align:center;">
                        <h2>  <img data-src="" src=<?php echo $semaforo;?>  alt="gallery 3"></h2>
                    </div> 
                    <div class="col-md-12 col-sm-12 col-xs-12" style="text-align:center;">
                        <h2>  <img data-src="" src=<?php echo $manual;?>  alt="gallery 3"></h2>
                    </div> 
                </div>    
            </div> 
            <div class="col-md-3 col-sm-3 col-xs-3">
                <div class="row" style="text-align:center;" >   
                    
                    <div class="col-md-12 col-sm-12 col-xs-12" style="text-align:center;">
                        <h3 style="margin:2px;"><strong>Baja Presión Aceite</strong></h3>
                        <h2 style="margin:2px;"><img data-src="" src=<?php echo $bajo_presion;?>  alt="gallery 3"></h2>
                    </div> 
                    <div class="col-md-12 col-sm-12 col-xs-12" style="text-align:center;">
                        <h3 style="margin:2px;"><strong>Bajo Nivel Agua</strong></h3>
                        <h2 style="margin:2px;">  <img data-src=""  src=<?php echo $bajo_nivel;?>  alt="gallery 3"></h2>
                    </div> 
                    <div class="col-md-12 col-sm-12 col-xs-12" style="text-align:center;">
                        <h3 style="margin:2px;"><strong>Alta Temp</strong></h3>
                        <h2 style="margin:2px;">  <img data-src=""  src=<?php echo $alta_temp;?>  alt="gallery 3"></h2>
                    </div> 
                    <div class="col-md-12 col-sm-12 col-xs-12" style="text-align:center;">
                        <h3 style="margin:2px;"><strong>Nivel Bateria</strong></h3>
                        <h2 style="margin:2px;">  <img data-src=""  src=<?php echo $nivel_bateria;?>  alt="gallery 3"></h2>
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
    $('#esconder1').load('./dashboard/equipos.php',function() {    
        $('.page-spinner-loader').addClass('hide');
        $('#esconder1').removeClass('esconder');
    });
  },60000);
</script>