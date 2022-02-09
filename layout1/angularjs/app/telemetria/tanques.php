<?php
include ("../conect.php");
include ("../autenticacion.php");
$var="../../../assets/global/images/equipos/";
$var1="";
$var2="";
$nombre="";
$combustible="";
$cantidad_actual="";
$cantidad_por="";
$capacidad="";
$altura="";
$volumen="";
$cantidad_minima="";
$cantidad_maxima="";
$id="";
$tipo = $_SESSION["tipo"];
$esconder = "esconder";
if($tipo=="Administrador"){
     $esconder = "";
}
if (isset($_POST["var1"])) {
    $var1 = $_POST['var1'];
    $_SESSION["var1"]=$var1;
    $re = $client->login("tanques_all", $tipo.",".$var1);
    $resultado = "".$re;
    $historial= explode('-',$resultado);
}else if (isset($_POST["var2"]) && isset($_POST["var3"]) && isset($_POST["id"]) && isset($_POST["comb"])) {
    $var2 = $_POST['id'].",".$_POST['var2'].",".$_POST['var3'].",".$_POST['comb'];
    $var1 = $_SESSION["var1"];
    $re = $client->login("tanques_set", $tipo.",".$var1.",".$var2);
    $resultado = "".$re;
    $historial= explode('-',$resultado);
}else{
    if (!isset($_SESSION['var1'])) {
      
    }else{
        $var1 = $_SESSION["var1"];
        $re = $client->login("tanques_all", $tipo.",".$var1);
        $resultado = "".$re;
        $historial= explode('-',$resultado);
    }
 
}
if (isset($historial[0])) {
foreach($historial as $llave => $valores) {
    $datos =explode(',',$valores);
    if (isset($datos[1])) {
        $combustible=$datos[0];
        $nombre=$datos[1];
        $cantidad_actual=$datos[2];
        $cantidad_por=$datos[3];
        $capacidad=$datos[4];
        $altura=$datos[5];
        $volumen=$datos[6];
        $cantidad_maxima=$datos[7];
        $cantidad_minima=$datos[8];
        $id=$datos[9];

?><div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 portlets"><?php
    if($combustible=="ECO"){
?>
    <div class="panel" style="height:300px;" >
        <div class="panel-header panel-controls">
            <h3><i class="fa fa-table"></i> <strong><?php echo $nombre; ?>-<?php echo $combustible; ?></strong></h3>
        </div>
        <div class="row rejilla">    
            <div class="col-md-6 col-sm-6 col-xs-6"  >
                <div class="progress progress-bar-vertical  progress-bar-large "  style="background-color: #a8a8a8; border-radius: 0px;">
                    <div class="progress-bar <?php echo $combustible; ?> ?>" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="height: <?php echo $cantidad_por; ?>%;  ">
                        <span class="sr-only"><?php echo $cantidad_por; ?>% Complete</span>
                    </div>
                    <h3 class="tanque1"><strong><?php echo $cantidad_actual; ?> GL</strong></h3>

                </div>
            </div> 
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="row rejilla" >  
                    <div class="col-md-12 col-sm-12 col-xs-12 esconder" style="padding:0px;">
                        <div class="row rejilla" >   
                            <div class="col-md-6 col-sm-6 col-xs-6" style="padding:0px;">
                                <label >id</label>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6" style="padding:0px;">
                               <input class="valid<?php echo str_replace(' ', '',$nombre);?>" type="text" value="<?php echo $id; ?>" id="valid<?php echo str_replace(' ', '',$nombre);?>" disabled >
                            </div>
                        </div>
                    </div>  
                    <div class="col-md-12 col-sm-12 col-xs-12 esconder" style="padding:0px;">
                        <div class="row rejilla" >   
                            <div class="col-md-6 col-sm-6 col-xs-6" style="padding:0px;">
                                <label >tanque</label>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6" style="padding:0px;">
                               <input class="valtipo<?php echo str_replace(' ', '',$nombre);?>" type="text" value="<?php echo $combustible; ?>" id="valtipo<?php echo str_replace(' ', '',$nombre);?>" disabled >
                            </div>
                        </div>
                    </div>  
                    <div class="col-md-12 col-sm-12 col-xs-12" style="padding:0px;">
                        <div class="row rejilla" >   
                            <div class="col-md-6 col-sm-6 col-xs-6" style="padding:0px;">
                                <label >Capacidad</label>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6" style="padding:0px;">
                                <label ><?php echo $capacidad; ?></label>
                            </div>
                        </div>
                    </div> 
                    <div class="col-md-12 col-sm-12 col-xs-12" style="padding:0px;">
                        <div class="row rejilla" >   
                            <div class="col-md-6 col-sm-6 col-xs-6" style="padding:0px;">
                                <label >Volumen</label>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6" style="padding:0px;">
                                <label ><?php echo $volumen; ?></label>
                            </div>
                        </div>
                    </div> 
                    <div class="col-md-12 col-sm-12 col-xs-12" style="padding:0px;">
                        <div class="row rejilla" >   
                            <div class="col-md-6 col-sm-6 col-xs-6" style="padding:0px;">
                                <label >Altura</label>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6" style="padding:0px;">
                                <label ><?php echo $altura; ?></label>
                            </div>
                        </div>
                    </div> 
                    <div class="col-md-12 col-sm-12 col-xs-12" style="padding:0px;">
                        <div class="row rejilla" >   
                            <div class="col-md-6 col-sm-6 col-xs-6" style="padding:0px;">
                                <label >Cap Min</label>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6" style="padding:0px;">
                                <label ><?php echo $cantidad_minima; ?></label>
                            </div>
                        </div>
                    </div> 
                    <div class="col-md-12 col-sm-12 col-xs-12" style="padding:0px;">
                        <div class="row rejilla" >   
                            <div class="col-md-6 col-sm-6 col-xs-6" style="padding:0px;">
                                <label >Cap Max</label>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6" style="padding:0px;">
                                <label ><?php echo $cantidad_maxima; ?></label>
                            </div>
                        </div>
                    </div> 
                    <div class="col-md-12 col-sm-12 col-xs-12 <?php echo $esconder; ?>" style="padding:0px;">
                        <div class="row rejilla" >   
                            <div class="col-md-6 col-sm-6 col-xs-6" style="padding:0px;">
                                <label >Set Min</label>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6" style="padding:0px;">
                                <input class="form-control input-sm valmin<?php echo  str_replace(' ', '',$nombre); ?>" type="number" value="<?php echo $cantidad_minima; ?>" placeholder="Type a number" id="valmin<?php echo str_replace(' ', '',$nombre);; ?>">
                            </div>
                        </div>
                    </div> 
                    <div class="col-md-12 col-sm-12 col-xs-12 <?php echo $esconder; ?>" style="padding:0px;">
                        <div class="row rejilla" >   
                            <div class="col-md-6 col-sm-6 col-xs-6" style="padding:0px;">
                                <label >Set Max</label>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6" style="padding:0px;">
                                <input class="form-control input-sm valmax<?php echo str_replace(' ', '',$nombre);?>" type="number" value="<?php echo $cantidad_maxima; ?>" placeholder="Type a number" id="valmax<?php echo str_replace(' ', '',$nombre);; ?>">
                            </div>
                        </div> 
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 <?php echo $esconder; ?>" style="padding:0px;">
                        <div class="text-center  m-t-20">
                            <button class="btn btn-embossed btn-primary cambiar" id="<?php echo str_replace(' ', '',$nombre); ?>">CAMBIAR</button>
                        </div> 
                    </div>     
                </div>    
            </div> 
        </div>   
        </div>    
    </div>
<?php 
    }else if($combustible=="SUPER"){
        
?>
    <div class="panel" style="height:300px;" >
        <div class="panel-header panel-controls">
            <h3><i class="fa fa-table"></i> <strong><?php echo $nombre; ?>-<?php echo $combustible; ?></strong></h3>
        </div>
        <div class="row rejilla">    
            <div class="col-md-6 col-sm-6 col-xs-6"  >
                <div class="progress progress-bar-vertical  progress-bar-large "  style="background-color: #a8a8a8; border-radius: 0px;">
                    <div class="progress-bar <?php echo $combustible; ?> ?>" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="height: <?php echo $cantidad_por; ?>%;  ">
                        <span class="sr-only"><?php echo $cantidad_por; ?>% Complete</span>
                    </div>
                    <h3 class="tanque1"><strong><?php echo $cantidad_actual; ?> GL</strong></h3>

                </div>
            </div> 
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="row rejilla" >  
                    <div class="col-md-12 col-sm-12 col-xs-12 esconder" style="padding:0px;">
                        <div class="row rejilla" >   
                            <div class="col-md-6 col-sm-6 col-xs-6" style="padding:0px;">
                                <label >id</label>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6" style="padding:0px;">
                               <input class="valid<?php echo str_replace(' ', '',$nombre);?>" type="text" value="<?php echo $id; ?>" id="valid<?php echo str_replace(' ', '',$nombre);?>" disabled >
                            </div>
                        </div>
                    </div>  
                    <div class="col-md-12 col-sm-12 col-xs-12 esconder" style="padding:0px;">
                        <div class="row rejilla" >   
                            <div class="col-md-6 col-sm-6 col-xs-6" style="padding:0px;">
                                <label >tanque</label>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6" style="padding:0px;">
                               <input class="valtipo<?php echo str_replace(' ', '',$nombre);?>" type="text" value="<?php echo $combustible; ?>" id="valtipo<?php echo str_replace(' ', '',$nombre);?>" disabled >
                            </div>
                        </div>
                    </div>  
                    <div class="col-md-12 col-sm-12 col-xs-12" style="padding:0px;">
                        <div class="row rejilla" >   
                            <div class="col-md-6 col-sm-6 col-xs-6" style="padding:0px;">
                                <label >Capacidad</label>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6" style="padding:0px;">
                                <label ><?php echo $capacidad; ?></label>
                            </div>
                        </div>
                    </div> 
                    <div class="col-md-12 col-sm-12 col-xs-12" style="padding:0px;">
                        <div class="row rejilla" >   
                            <div class="col-md-6 col-sm-6 col-xs-6" style="padding:0px;">
                                <label >Volumen</label>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6" style="padding:0px;">
                                <label ><?php echo $volumen; ?></label>
                            </div>
                        </div>
                    </div> 
                    <div class="col-md-12 col-sm-12 col-xs-12" style="padding:0px;">
                        <div class="row rejilla" >   
                            <div class="col-md-6 col-sm-6 col-xs-6" style="padding:0px;">
                                <label >Altura</label>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6" style="padding:0px;">
                                <label ><?php echo $altura; ?></label>
                            </div>
                        </div>
                    </div> 
                    <div class="col-md-12 col-sm-12 col-xs-12" style="padding:0px;">
                        <div class="row rejilla" >   
                            <div class="col-md-6 col-sm-6 col-xs-6" style="padding:0px;">
                                <label >Cap Min</label>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6" style="padding:0px;">
                                <label ><?php echo $cantidad_minima; ?></label>
                            </div>
                        </div>
                    </div> 
                    <div class="col-md-12 col-sm-12 col-xs-12" style="padding:0px;">
                        <div class="row rejilla" >   
                            <div class="col-md-6 col-sm-6 col-xs-6" style="padding:0px;">
                                <label >Cap Max</label>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6" style="padding:0px;">
                                <label ><?php echo $cantidad_maxima; ?></label>
                            </div>
                        </div>
                    </div> 
                    <div class="col-md-12 col-sm-12 col-xs-12 <?php echo $esconder; ?>" style="padding:0px;">
                        <div class="row rejilla" >   
                            <div class="col-md-6 col-sm-6 col-xs-6" style="padding:0px;">
                                <label >Set Min</label>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6" style="padding:0px;">
                                <input class="form-control input-sm valmin<?php echo  str_replace(' ', '',$nombre); ?>" type="number" value="<?php echo $cantidad_minima; ?>" placeholder="Type a number" id="valmin<?php echo str_replace(' ', '',$nombre);; ?>">
                            </div>
                        </div>
                    </div> 
                    <div class="col-md-12 col-sm-12 col-xs-12 <?php echo $esconder; ?>" style="padding:0px;">
                        <div class="row rejilla" >   
                            <div class="col-md-6 col-sm-6 col-xs-6" style="padding:0px;">
                                <label >Set Max</label>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6" style="padding:0px;">
                                <input class="form-control input-sm valmax<?php echo str_replace(' ', '',$nombre);?>" type="number" value="<?php echo $cantidad_maxima; ?>" placeholder="Type a number" id="valmax<?php echo str_replace(' ', '',$nombre);; ?>">
                            </div>
                        </div> 
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 <?php echo $esconder; ?>" style="padding:0px;">
                        <div class="text-center  m-t-20">
                            <button class="btn btn-embossed btn-primary cambiar" id="<?php echo str_replace(' ', '',$nombre); ?>">CAMBIAR</button>
                        </div> 
                    </div>     
                </div>    
            </div> 
        </div>   
        </div>    
    </div>
<?php 
    }else if($combustible=="DIESEL"){
     
?>
    <div class="panel" style="height:300px;" >
        <div class="panel-header panel-controls">
            <h3><i class="fa fa-table"></i> <strong><?php echo $nombre; ?>-<?php echo $combustible; ?></strong></h3>
        </div>
        <div class="row rejilla">    
            <div class="col-md-6 col-sm-6 col-xs-6"  >
                <div class="progress progress-bar-vertical  progress-bar-large "  style="background-color: #a8a8a8; border-radius: 0px;">
                    <div class="progress-bar <?php echo $combustible; ?> ?>" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="height: <?php echo $cantidad_por; ?>%;  ">
                        <span class="sr-only"><?php echo $cantidad_por; ?>% Complete</span>
                    </div>
                    <h3 class="tanque1"><strong><?php echo $cantidad_actual; ?> GL</strong></h3>

                </div>
            </div> 
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="row rejilla" >  
                    <div class="col-md-12 col-sm-12 col-xs-12 esconder" style="padding:0px;">
                        <div class="row rejilla" >   
                            <div class="col-md-6 col-sm-6 col-xs-6" style="padding:0px;">
                                <label >id</label>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6" style="padding:0px;">
                               <input class="valid<?php echo str_replace(' ', '',$nombre);?>" type="text" value="<?php echo $id; ?>" id="valid<?php echo str_replace(' ', '',$nombre);?>" disabled >
                            </div>
                        </div>
                    </div>  
                    <div class="col-md-12 col-sm-12 col-xs-12 esconder" style="padding:0px;">
                        <div class="row rejilla" >   
                            <div class="col-md-6 col-sm-6 col-xs-6" style="padding:0px;">
                                <label >tanque</label>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6" style="padding:0px;">
                               <input class="valtipo<?php echo str_replace(' ', '',$nombre);?>" type="text" value="<?php echo $combustible; ?>" id="valtipo<?php echo str_replace(' ', '',$nombre);?>" disabled >
                            </div>
                        </div>
                    </div>  
                    <div class="col-md-12 col-sm-12 col-xs-12" style="padding:0px;">
                        <div class="row rejilla" >   
                            <div class="col-md-6 col-sm-6 col-xs-6" style="padding:0px;">
                                <label >Capacidad</label>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6" style="padding:0px;">
                                <label ><?php echo $capacidad; ?></label>
                            </div>
                        </div>
                    </div> 
                    <div class="col-md-12 col-sm-12 col-xs-12" style="padding:0px;">
                        <div class="row rejilla" >   
                            <div class="col-md-6 col-sm-6 col-xs-6" style="padding:0px;">
                                <label >Volumen</label>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6" style="padding:0px;">
                                <label ><?php echo $volumen; ?></label>
                            </div>
                        </div>
                    </div> 
                    <div class="col-md-12 col-sm-12 col-xs-12" style="padding:0px;">
                        <div class="row rejilla" >   
                            <div class="col-md-6 col-sm-6 col-xs-6" style="padding:0px;">
                                <label >Altura</label>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6" style="padding:0px;">
                                <label ><?php echo $altura; ?></label>
                            </div>
                        </div>
                    </div> 
                    <div class="col-md-12 col-sm-12 col-xs-12" style="padding:0px;">
                        <div class="row rejilla" >   
                            <div class="col-md-6 col-sm-6 col-xs-6" style="padding:0px;">
                                <label >Cap Min</label>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6" style="padding:0px;">
                                <label ><?php echo $cantidad_minima; ?></label>
                            </div>
                        </div>
                    </div> 
                    <div class="col-md-12 col-sm-12 col-xs-12" style="padding:0px;">
                        <div class="row rejilla" >   
                            <div class="col-md-6 col-sm-6 col-xs-6" style="padding:0px;">
                                <label >Cap Max</label>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6" style="padding:0px;">
                                <label ><?php echo $cantidad_maxima; ?></label>
                            </div>
                        </div>
                    </div> 
                    <div class="col-md-12 col-sm-12 col-xs-12 <?php echo $esconder; ?>" style="padding:0px;">
                        <div class="row rejilla" >   
                            <div class="col-md-6 col-sm-6 col-xs-6" style="padding:0px;">
                                <label >Set Min</label>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6" style="padding:0px;">
                                <input class="form-control input-sm valmin<?php echo  str_replace(' ', '',$nombre); ?>" type="number" value="<?php echo $cantidad_minima; ?>" placeholder="Type a number" id="valmin<?php echo str_replace(' ', '',$nombre);; ?>">
                            </div>
                        </div>
                    </div> 
                    <div class="col-md-12 col-sm-12 col-xs-12 <?php echo $esconder; ?>" style="padding:0px;">
                        <div class="row rejilla" >   
                            <div class="col-md-6 col-sm-6 col-xs-6" style="padding:0px;">
                                <label >Set Max</label>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6" style="padding:0px;">
                                <input class="form-control input-sm valmax<?php echo str_replace(' ', '',$nombre);?>" type="number" value="<?php echo $cantidad_maxima; ?>" placeholder="Type a number" id="valmax<?php echo str_replace(' ', '',$nombre);; ?>">
                            </div>
                        </div> 
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 <?php echo $esconder; ?>" style="padding:0px;">
                        <div class="text-center  m-t-20">
                            <button class="btn btn-embossed btn-primary cambiar" id="<?php echo str_replace(' ', '',$nombre); ?>">CAMBIAR</button>
                        </div> 
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
}}}
$transport->close();
?>

<!--script>
  setInterval(function() {
    $('#cont3').load('./dashboard/equipos_total.php',function() {    
        $('.page-spinner-loader').addClass('hide');
    });
  },120000);
</script-->