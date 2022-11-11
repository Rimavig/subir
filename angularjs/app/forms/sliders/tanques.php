<?php
include ("../../conect.php");
include ("../../autenticacion.php");
if (isset($_POST["var1"])) {
    $var1 = $_POST['var1'];
    $re = $client->login("Tanque",$var1);
    $resultado = "".$re;
    $valor_array = explode(':',$resultado);
    if (isset($valor_array[1])) {
        $tanques=explode('-',$valor_array[0]);
        $compresor=explode(';;',$valor_array[1]);
        $bombas=explode(';;',$valor_array[2]);
        $generador=explode(';;',$valor_array[3]);
        $rci=explode(';;',$valor_array[4]);
    }
}

?>
 <div class="col-lg-6 portlets ">  
    <div class="panel">
        <div class="panel-header panel-controls">
            <h3><i class="icon-bulb"></i> <strong>TANQUES</strong> COMBUSTIBLE</h3>
        </div>
        <div class="panel-content" style="padding-top: 0px;">
            <div class="row">
                <?php
                    foreach($tanques as $llave => $valores) {
                        $datos =explode(',',$valores);
                        if (isset($datos[2])) {
                        $tipo=$datos[0];
                        $nombre=$datos[1];
                        $cantidad=$datos[2];
                        $porcentaje=$datos[3]; 
                        $var1="";
                        $var2="";
                        $var3="";
                        $var4="";   
                        if ($tipo=="ECO") {
                            $var1="eco"; 
                        } 
                        if ($tipo=="SUPER") {
                            $var1="super"; 
                        } 
                        if ($tipo=="DIESEL") {
                            $var1="diesel"; 
                        } 
                    ?>
                    <div class="col-lg-4 ">
                        <div class="progress progress-bar-vertical  progress-bar-large ">
                            <div class="progress-bar <?php echo $var1; ?>" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="height: <?php echo $porcentaje; ?>%;">
                                <span class="sr-only"><?php echo $porcentaje; ?>% Complete</span><?php echo $cantidad ?> GL
                                <p style="text-align: center;"><strong><?php echo $nombre; ?></strong></p>
                                <p style="text-align: center;"><strong><?php echo $tipo; ?></strong></p>
                            </div>
                        </div>
                    </div>
                     <?php
                    }}
                    ?>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-3 col-xs-6 col-sm-3 portlets ">
    <div class="panel">
        <div class="panel-header panel-controls">
            <h3><i class="icons-arrows-17"></i> <strong></strong> COMPRESOR AIRE</h3>
        </div>
        <div class="panel-content" style="padding-top: 0px;">
            <div class="row">   
                <div >
                    <?php
                        foreach($compresor as $llave => $valores) {
                            $datos =explode(',',$valores);
                            if (isset($datos[3])) {
                            $var=$datos[0];
                            $var1="";
                            $var2="";
                            $var3="";
                            $var4="";

                                if ($datos[1]=="1") {
                                    $var1="checked"; 
                                } 
                                if ($datos[2]=="1") {
                                    $var2="checked"; 
                                } 
                                if ($datos[3]=="1") {
                                    $var3="checked"; 
                                } 

                    ?>
                    <h3 class="indicador"> <strong><?php echo $var; ?></strong></h3>
                    <div class="onoffswitch">
                        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox"  id="5" <?php echo $var1; ?> disabled>
                        <label class="onoffswitch-label" for="5">
                        <span class="onoffswitch-inner">
                        <span class="onoffswitch-active"><span class="onoffswitch-switch">ON</span></span>
                        <span class="onoffswitch-inactive"><span class="onoffswitch-switch">OFF</span></span>
                        </span>
                        </label>
                    </div>
                    <h3><strong>ESTADO</strong></h3>
                    <div class="onoffswitch">
                        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox"  id="6" <?php echo $var2; ?> disabled>
                        <label class="onoffswitch-label" for="6">
                        <span class="onoffswitch-inner">
                        <span class="onoffswitch-active"><span class="onoffswitch-switch">ON</span></span>
                        <span class="onoffswitch-inactive"><span class="onoffswitch-switch">OFF</span></span>
                        </span>
                        </label>
                    </div>
                    <h3><strong>GUARDAMOTOR</strong></h3>
                        <div class="onoffswitch">
                        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox"  id="7" <?php echo $var3; ?> disabled>
                        <label class="onoffswitch-label" for="7">
                        <span class="onoffswitch-inner">
                        <span class="onoffswitch-active"><span class="onoffswitch-switch">ON</span></span>
                        <span class="onoffswitch-inactive"><span class="onoffswitch-switch">OFF</span></span>
                        </span>
                        </label>
                    </div>
                    <h3><strong>PREOSTATO</strong></h3>
                    <?php
                    }}
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-3 col-xs-6 col-sm-3 portlets ">
    <div class="panel">
        <div class="panel-header panel-controls">
            <h3><i class="icons-arrows-17"></i> <strong></strong> BOMBAS AGUA</h3>
        </div>
        <div class="panel-content" style="padding-top: 0px;">
            <div class="row">   
                <div>
                    <?php
                    foreach($bombas as $llave => $valores) {
                        $datos =explode(',',$valores);
                        if (isset($datos[3])) {
                        $var=$datos[0];
                        $var1="";
                        $var2="";
                        $var3="";
                        $var4="";
                            if ($datos[1]=="1") {
                                $var1="checked"; 
                            } 
                            if ($datos[2]=="1") {
                                $var2="checked"; 
                            } 
                            if ($datos[3]=="1") {
                                $var3="checked"; 
                            } 
                            if ($datos[4]=="1") {
                                $var4="checked"; 
                            } 
                    
                        
                    ?>
                    <h3 class="indicador"><strong><?php echo $var; ?></strong></h3>
                    <div class="onoffswitch">
                        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox"  id="1" <?php echo $var1; ?> disabled>
                        <label class="onoffswitch-label" for="1">
                        <span class="onoffswitch-inner">
                        <span class="onoffswitch-active"><span class="onoffswitch-switch">ON</span></span>
                        <span class="onoffswitch-inactive"><span class="onoffswitch-switch">OFF</span></span>
                        </span>
                        </label>
                    </div>
                    
                    <h3><strong>ESTADO</strong></h3>
                    <div class="onoffswitch">
                        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox"  id="2" <?php echo $var2; ?>  disabled>
                        <label class="onoffswitch-label" for="2">
                        <span class="onoffswitch-inner">
                        <span class="onoffswitch-active"><span class="onoffswitch-switch">ON</span></span>
                        <span class="onoffswitch-inactive"><span class="onoffswitch-switch">OFF</span></span>
                        </span>
                        </label>
                    </div>
                    <h3><strong>GUARDAMOTOR</strong></h3>
                    <div class="onoffswitch">
                        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox"  id="3" <?php echo $var3; ?>  disabled>
                        <label class="onoffswitch-label" for="3">
                        <span class="onoffswitch-inner">
                        <span class="onoffswitch-active"><span class="onoffswitch-switch">ON</span></span>
                        <span class="onoffswitch-inactive"><span class="onoffswitch-switch">OFF</span></span>
                        </span>
                        </label>
                    </div>
                    <h3><strong>NIVEL BAJO CISTERNA</strong></h3>
                        <div class="onoffswitch">
                        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox"  id="4" <?php echo $var4; ?>  disabled>
                        <label class="onoffswitch-label" for="4">
                        <span class="onoffswitch-inner">
                        <span class="onoffswitch-active"><span class="onoffswitch-switch">ON</span></span>
                        <span class="onoffswitch-inactive"><span class="onoffswitch-switch">OFF</span></span>
                        </span>
                        </label>
                    </div>
                    <h3><strong>PREOSTATO</strong></h3>
                    <?php
                    }}
                    ?>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-3 col-xs-6 col-sm-3 portlets ">
    <div class="panel">
        <div class="panel-header panel-controls">
            <h3><i class="icons-arrows-17"></i> <strong></strong> RCI</h3>
        </div>
        <div class="panel-content" style="padding-top: 0px;">
            <div class="row">   
                <div >
                <?php
                    foreach($rci as $llave => $valores) {
                        $datos =explode(',',$valores);
                        if (isset($datos[3])) {
                        $var=$datos[0];
                        $var1="";
                        $var2="";
                        $var3="";
                        $var4="";
                        $var5="";
                        $var6="";
                        $var7="";
                            if ($datos[1]=="1") {
                                $var1="checked"; 
                            } 
                            if ($datos[2]=="1") {
                                $var2="checked"; 
                            } 
                            if ($datos[3]=="1") {
                                $var3="checked"; 
                            } 
                            if ($datos[4]=="1") {
                                $var4="checked"; 
                            } 
                            if ($datos[5]=="1") {
                                $var5="checked"; 
                            } 
                            if ($datos[6]=="1") {
                                $var6="checked"; 
                            } 
                            if ($datos[7]=="1") {
                                $var7="checked"; 
                            } 
                    
                        
                    ?>
                    <h3 class="indicador"><strong><?php echo $var; ?></strong></h3>
                    <div class="onoffswitch">
                        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox"  id="13" <?php echo $var1; ?> disabled>
                        <label class="onoffswitch-label" for="13">
                        <span class="onoffswitch-inner">
                        <span class="onoffswitch-active"><span class="onoffswitch-switch">ON</span></span>
                        <span class="onoffswitch-inactive"><span class="onoffswitch-switch">OFF</span></span>
                        </span>
                        </label>
                    </div>
                    <h3><strong>BOMBA JOCKEY</strong></h3>
                    <div class="onoffswitch">
                        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox"  id="14" <?php echo $var2; ?>disabled>
                        <label class="onoffswitch-label" for="14">
                        <span class="onoffswitch-inner">
                        <span class="onoffswitch-active"><span class="onoffswitch-switch">MAN</span></span>
                        <span class="onoffswitch-inactive"><span class="onoffswitch-switch">AUTO</span></span>
                        </span>
                        </label>
                    </div>
                    <h3><strong>ENCENDIDO BJ</strong></h3>
                    <div class="onoffswitch">
                        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox"  id="15" <?php echo $var3; ?> disabled>
                        <label class="onoffswitch-label" for="15">
                        <span class="onoffswitch-inner">
                        <span class="onoffswitch-active"><span class="onoffswitch-switch">ON</span></span>
                        <span class="onoffswitch-inactive"><span class="onoffswitch-switch">OFF</span></span>
                        </span>
                        </label>
                    </div>
                    <h3><strong>GUARDAMOTOR BJ</strong></h3>
                    <div class="onoffswitch">
                        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox"  id="16" <?php echo $var4; ?> disabled>
                        <label class="onoffswitch-label" for="17">
                        <span class="onoffswitch-inner">
                        <span class="onoffswitch-active"><span class="onoffswitch-switch">ON</span></span>
                        <span class="onoffswitch-inactive"><span class="onoffswitch-switch">OFF</span></span>
                        </span>
                        </label>
                    </div>
                    <h3><strong>PREOSTATO BJ</strong></h3>
                    <div class="onoffswitch">
                        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox"  id="18" <?php echo $var5; ?> disabled>
                        <label class="onoffswitch-label" for="18">
                        <span class="onoffswitch-inner">
                        <span class="onoffswitch-active"><span class="onoffswitch-switch">ON</span></span>
                        <span class="onoffswitch-inactive"><span class="onoffswitch-switch">OFF</span></span>
                        </span>
                        </label>
                    </div>
                    <h3><strong>BOMBA PRINCIPAL</strong></h3>
                    <div class="onoffswitch">
                        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox"  id="19" <?php echo $var6; ?> disabled>
                        <label class="onoffswitch-label" for="19">
                        <span class="onoffswitch-inner">
                        <span class="onoffswitch-active"><span class="onoffswitch-switch">MAN</span></span>
                        <span class="onoffswitch-inactive"><span class="onoffswitch-switch">AUTOMA</span></span>
                        </span>
                        </label>
                    </div>
                    <h3><strong>ENCENDIDO BP</strong></h3>
                    <div class="onoffswitch">
                        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox"  id="20" <?php echo $var7; ?> disabled>
                        <label class="onoffswitch-label" for="20">
                        <span class="onoffswitch-inner">
                        <span class="onoffswitch-active"><span class="onoffswitch-switch">ON</span></span>
                        <span class="onoffswitch-inactive"><span class="onoffswitch-switch">OFF</span></span>
                        </span>
                        </label>
                    </div>
                    <h3><strong>PREOSTATO BP</strong></h3>
                    <?php
                    }}
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-3 col-xs-6 col-sm-3 portlets ">
    <div class="panel">
        <div class="panel-header panel-controls">
            <h3><i class="icons-arrows-17"></i> <strong> </strong>GENERADOR</h3>
        </div>
        <div class="panel-content" style="padding-top: 0px;">
            <div class="row">   
                <div >
                <?php
                    foreach($generador as $llave => $valores) {
                        $datos =explode(',',$valores);
                        if (isset($datos[3])) {
                        $var=$datos[0];
                        $var1="";
                        $var2="";
                        $var3="";
                        $var4="";
                        $var5="";
                            if ($datos[1]=="1") {
                                $var1="checked"; 
                            } 
                            if ($datos[2]=="1") {
                                $var2="checked"; 
                            } 
                            if ($datos[3]=="1") {
                                $var3="checked"; 
                            } 
                            if ($datos[4]=="1") {
                                $var4="checked"; 
                            } 
                            if ($datos[5]=="1") {
                                $var5="checked"; 
                            } 
                    ?>
                    <h3 class="indicador"><strong><?php echo $var; ?></strong></h3>
                    <div class="onoffswitch">
                        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" <?php echo $var1; ?> id="8" disable >
                        <label class="onoffswitch-label" for="8">
                        <span class="onoffswitch-inner">
                        <span class="onoffswitch-active"><span class="onoffswitch-switch">ON</span></span>
                        <span class="onoffswitch-inactive"><span class="onoffswitch-switch">OFF</span></span>
                        </span>
                        </label>
                    </div>
                    <h3><strong>ESTADO</strong></h3>
                    <div class="onoffswitch">
                        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox"  id="9" <?php echo $var2; ?> disable>
                        <label class="onoffswitch-label" for="9">
                        <span class="onoffswitch-inner">
                        <span class="onoffswitch-active"><span class="onoffswitch-switch">MAN</span></span>
                        <span class="onoffswitch-inactive"><span class="onoffswitch-switch">AUTO</span></span>
                        </span>
                        </label>
                    </div>
                    <h3><strong>ENCENDIDO</strong></h3>
                    <div class="onoffswitch">
                        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox"  id="10" <?php echo $var3; ?> disabled>
                        <label class="onoffswitch-label" for="10">
                        <span class="onoffswitch-inner">
                        <span class="onoffswitch-active"><span class="onoffswitch-switch">ON</span></span>
                        <span class="onoffswitch-inactive"><span class="onoffswitch-switch">OFF</span></span>
                        </span>
                        </label>
                    </div>
                    <h3><strong>BAJO PRESIÓN ACEITE</strong></h3>
                    <div class="onoffswitch">
                        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox"  id="11" <?php echo $var4; ?>disabled>
                        <label class="onoffswitch-label" for="11">
                        <span class="onoffswitch-inner">
                        <span class="onoffswitch-active"><span class="onoffswitch-switch">ON</span></span>
                        <span class="onoffswitch-inactive"><span class="onoffswitch-switch">OFF</span></span>
                        </span>
                        </label>
                    </div>
                    <h3><strong>BAJO NIVEL AGUA</strong></h3>
                    <div class="onoffswitch">
                        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox"  id="12" <?php echo $var5; ?> disabled>
                        <label class="onoffswitch-label" for="12">
                        <span class="onoffswitch-inner">
                        <span class="onoffswitch-active"><span class="onoffswitch-switch">ON</span></span>
                        <span class="onoffswitch-inactive"><span class="onoffswitch-switch">OFF</span></span>
                        </span>
                        </label>
                    </div>
                    <h3><strong>ALTA TEMPERATURA</strong></h3>
                    <?php
                    }}
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
        
