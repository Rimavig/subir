<?php
include ("../conect.php");
include ("../autenticacion.php");
$var="../../../assets/global/images/equipos/";
$var1="";
$nombre="";
$semaforo="";
$estado="";
$historial="";
$tipo = $_SESSION["tipo"];
if (isset($_POST["var1"])) {
    $var1 = $_POST['var1'];
    $re = $client->login("Equipos", $tipo.",".$var1);
    $resultado = "".$re;
    $historial= explode(';',$resultado);
}else{
    if (!isset($_SESSION['var1'])) {
      
    }else{
        $var1 = $_SESSION["var1"];
        $re = $client->login("Equipos", $tipo.",".$var1);
        $resultado = "".$re;
        $historial= explode(';',$resultado);
    }
 
}
if (isset($historial[0])) {
foreach($historial as $llave => $valores) {
    $datos =explode(',',$valores);
    if (isset($datos[1])) {
        $nombre=$datos[1];
        if($datos[2]=="0"){
            $estado=$var."off.png";
        }else if($datos[2]=="1"){
            $estado=$var."on.png";
        }
        if($datos[3]=="1"){
            $semaforo=$var."alarma_off.png";
        }else if($datos[3]=="0"){
            $semaforo=$var."alarma_on.png";
        }
?><div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 portlets"><?php
        if($datos[0]=="BOMBA"){
?>
    <div class="panel" style="height:290px;" >
        <div class="panel-header panel-controls">
            <h3><i class="fa fa-table"></i> <strong>Bomba de Agua</strong></h3>
        </div>
        <div class="row">   
            <div class="col-md-8 col-sm-8 col-xs-8" style="margin-top:0px;" >
                <button class="bomba1" style="background: none; border: none;"> <img data-src="" src="../../../assets/global/images/equipos/bomba.png" class="img-responsive" alt="gallery 3"></button> 
            </div> 
            <div class="col-md-4 col-sm-4 col-xs-4" style="margin-top:20px;">
                <div class="row" style="text-align:center;" >   
                    <h2><strong>Status</strong></h2>
                    <div class="col-md-12 col-sm-12 col-xs-12" style="text-align:center;">
                        <h2>  <img data-src="" src=<?php echo $semaforo;?>  alt="gallery 3"></h2>
                    </div> 
                </div>    
            </div> 
        </div>    
    </div>
<?php 
    }else if($datos[0]=="COMPRESOR"){
?>
    <div class="panel" style="height:290px;" >
        <div class="panel-header panel-controls">
            <h3><i class="fa fa-table"></i> <strong>Compresor</strong></h3>
        </div>
        <div class="row">   
            <div class="col-md-8 col-sm-8 col-xs-8" style="margin-top:0px;" >
                <button class="compresor1" style="background: none; border: none;"> <img data-src="" src="../../../assets/global/images/equipos/compresor.png" class="img-responsive" alt="gallery 3"></button> 
            </div> 
             <div class="col-md-4 col-sm-4 col-xs-4" style="margin-top:20px;">
                <div class="row" style="text-align:center;" >   
                    <h2><strong>Status</strong></h2>
                    <div class="col-md-12 col-sm-12 col-xs-12" style="text-align:center;">
                        <h2>  <img data-src="" src=<?php echo $semaforo;?>  alt="gallery 3"></h2>
                    </div> 
                </div>    
            </div> 
        </div>    
    </div>
<?php 
    }else if($datos[0]=="RCI"){
        if($datos[2]=="0"){
            $estado=$var."off.png";
        }else if($datos[2]=="1"){
            $estado=$var."on.png";
        }
        $estado1="";
        if($datos[3]=="0"){
            $estado1=$var."off.png";
        }else if($datos[3]=="1"){
            $estado1=$var."on.png";
        }
        if($datos[4]=="1"){
            $semaforo=$var."alarma_off.png";
        }else if($datos[4]=="0"){
            $semaforo=$var."alarma_on.png";
        }
        $semaforo1="";
        if($datos[5]=="1"){
            $semaforo1=$var."alarma_off.png";
        }else if($datos[5]=="0"){
            $semaforo1=$var."alarma_on.png";
        }
?>
    <div class="panel" style="height:290px;" >
        <div class="panel-header panel-controls">
            <h3><i class="fa fa-table"></i> <strong>SCI</strong></h3>
        </div>
        <div class="row" >   
            <div class="col-md-7 col-sm-7 col-xs-7" style="margin-top:0px;" >
                <button class="rci1" style="background: none; border: none;"> <img data-src="" src="../../../assets/global/images/equipos/rci.png" style="width:-moz-available;" alt="gallery 3"></button> 
            </div> 
            <div class="col-md-5 col-sm-5 col-xs-5" style="margin-top:0px;">
                <div class="row" style="text-align:center;" >   
                    <h2 style="margin:2px;"><strong>Status</strong></h2>
                    <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top:0px;">
                        <div class="row" style="text-align:center;" >   
                            <h4 ><strong>BP</strong></h4>
                            <div class="col-md-12 col-sm-12 col-xs-12" style="text-align:center; margin-top:5px;">
                                <h2 style="margin:2px;">  <img data-src="" src=<?php echo $semaforo;?> alt="gallery 3"></h2>
                            </div> 
                        </div>    
                    </div> 
                    <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top:0px;">
                        <div class="row" style="text-align:center;" >   
                            <h4><strong>BJ</strong></h4>
                            <div class="col-md-12 col-sm-12 col-xs-12" style="text-align:center;">
                                <h2 style="margin:2px;">  <img data-src="" src=<?php echo $semaforo1;?> alt="gallery 3"></h2>
                            </div> 
                        </div>    
                    </div> 
                </div> 
            </div> 
        </div>    
    </div>
<?php 
    }else if($datos[0]=="GENERADOR"){
?>
    <div class="panel" style="height:290px;" >
        <div class="panel-header panel-controls">
            <h3><i class="fa fa-table"></i> <strong>Generador</strong></h3>
        </div>
        <div class="row">   
            <div class="col-md-8 col-sm-8 col-xs-8" style="margin-top:0px;" >
                <button class="generador1" style="background: none; border: none;"> <img data-src="" src="../../../assets/global/images/equipos/generador.png" class="img-responsive" alt="gallery 3"></button> 
                   
            </div> 
             <div class="col-md-4 col-sm-4 col-xs-4" style="margin-top:20px;">
                <div class="row" style="text-align:center;" >   
                    <h2><strong>Status</strong></h2>
                    <div class="col-md-12 col-sm-12 col-xs-12" style="text-align:center;">
                        <h2>  <img data-src="" src=<?php echo $semaforo;?> alt="gallery 3"></h2>
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
    }}}
?>
<?php

$transport->close();
?>

<!--script>
  setInterval(function() {
    $('#esconder1').load('./dashboard/equipos.php',function() {    
        $('.page-spinner-loader').addClass('hide');
        $('#esconder1').removeClass('esconder');
    });
  },120000);
</script-->