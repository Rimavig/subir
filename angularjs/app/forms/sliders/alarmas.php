<?php
include ("../../conect.php");
include ("../../autenticacion.php");
$var="";
$var1="";
$var2="";
$var3="";
$var4="";
if (isset($_POST["var1"])) {
    $var1 = $_POST['var1'];
    $re = $client->login("Alarmas",$var1);
    $resultado = "".$re;
    $historial= explode(';;',$resultado);
}

?>  
      <div class="panel">
            <div class="panel-header panel-controls">
                <h3><i class="icons-arrows-17"></i> <strong> INDICADORES</strong> EQUIPOS</h3>
            </div>
            <div class="panel-content">
                <div class="row">   
                    <div class="col-lg-6 col-md-6 col-sm-6 ">
                        <h3><strong>COMPRESOR</strong> AIRE</h3>
                        <div class="onoffswitch">
                       
                            <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox"  id="5" checked disabled>
                            <label class="onoffswitch-label" for="5">
                            <span class="onoffswitch-inner">
                            <span class="onoffswitch-active"><span class="onoffswitch-switch">ON</span></span>
                            <span class="onoffswitch-inactive"><span class="onoffswitch-switch">OFF</span></span>
                            </span>
                            </label>
                        </div>
                        <h3><strong>ESTADO</strong></h3>
                        <div class="onoffswitch">
                            <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox"  id="6" checked disabled>
                            <label class="onoffswitch-label" for="6">
                            <span class="onoffswitch-inner">
                            <span class="onoffswitch-active"><span class="onoffswitch-switch">ON</span></span>
                            <span class="onoffswitch-inactive"><span class="onoffswitch-switch">OFF</span></span>
                            </span>
                            </label>
                        </div>
                        <h3><strong>GUARDAMOTOR</strong></h3>
                            <div class="onoffswitch">
                            <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox"  id="7" checked disabled>
                            <label class="onoffswitch-label" for="7">
                            <span class="onoffswitch-inner">
                            <span class="onoffswitch-active"><span class="onoffswitch-switch">ON</span></span>
                            <span class="onoffswitch-inactive"><span class="onoffswitch-switch">OFF</span></span>
                            </span>
                            </label>
                        </div>
                        <h3><strong>PREOSTATO</strong></h3>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                    <?php
                        foreach($historial as $llave => $valores) {
                            $datos =explode(',',$valores);
                           if (isset($datos[3])) {
                            $var="";
                            $var1="";
                            $var2="";
                            $var3="";
                            $var4="";
                                if ($datos[0]=="1") {
                                    $var="checked"; 
                                } 
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
                        <h3><strong>BOMBA</strong> AGUA</h3>
                        <div class="onoffswitch">
                            <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox"  id="1" <?php echo $var; ?> disabled>
                            <label class="onoffswitch-label" for="1">
                            <span class="onoffswitch-inner">
                            <span class="onoffswitch-active"><span class="onoffswitch-switch">ON</span></span>
                            <span class="onoffswitch-inactive"><span class="onoffswitch-switch">OFF</span></span>
                            </span>
                            </label>
                        </div>
                        <h3><strong>ESTADO</strong></h3>
                        <div class="onoffswitch">
                            <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox"  id="2" <?php echo $var1; ?>  disabled>
                            <label class="onoffswitch-label" for="2">
                            <span class="onoffswitch-inner">
                            <span class="onoffswitch-active"><span class="onoffswitch-switch">ON</span></span>
                            <span class="onoffswitch-inactive"><span class="onoffswitch-switch">OFF</span></span>
                            </span>
                            </label>
                        </div>
                        <h3><strong>GUARDAMOTOR</strong></h3>
                        <div class="onoffswitch">
                            <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox"  id="3" <?php echo $var2; ?>  disabled>
                            <label class="onoffswitch-label" for="3">
                            <span class="onoffswitch-inner">
                            <span class="onoffswitch-active"><span class="onoffswitch-switch">ON</span></span>
                            <span class="onoffswitch-inactive"><span class="onoffswitch-switch">OFF</span></span>
                            </span>
                            </label>
                        </div>
                        <h3><strong>NIVEL BAJO CISTERNA</strong></h3>
                            <div class="onoffswitch">
                            <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox"  id="4" <?php echo $var3; ?>  disabled>
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
                        $transport->close();
                        ?>
                        
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 ">
                        <h3><strong>GENERADOR</strong></h3>
                        <div class="onoffswitch">
                            <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox"  id="8" >
                            <label class="onoffswitch-label" for="8">
                            <span class="onoffswitch-inner">
                            <span class="onoffswitch-active"><span class="onoffswitch-switch">ON</span></span>
                            <span class="onoffswitch-inactive"><span class="onoffswitch-switch">OFF</span></span>
                            </span>
                            </label>
                        </div>
                        <h3><strong>ESTADO</strong></h3>
                        <div class="onoffswitch">
                            <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox"  id="9">
                            <label class="onoffswitch-label" for="9">
                            <span class="onoffswitch-inner">
                            <span class="onoffswitch-active"><span class="onoffswitch-switch">MAN</span></span>
                            <span class="onoffswitch-inactive"><span class="onoffswitch-switch">AUTO</span></span>
                            </span>
                            </label>
                        </div>
                        <h3><strong>ENCENDIDO</strong></h3>
                        <div class="onoffswitch">
                            <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox"  id="10" checked disabled>
                            <label class="onoffswitch-label" for="10">
                            <span class="onoffswitch-inner">
                            <span class="onoffswitch-active"><span class="onoffswitch-switch">ON</span></span>
                            <span class="onoffswitch-inactive"><span class="onoffswitch-switch">OFF</span></span>
                            </span>
                            </label>
                        </div>
                        <h3><strong>BAJO PRESIÓN ACEITE</strong></h3>
                        <div class="onoffswitch">
                            <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox"  id="11" checked disabled>
                            <label class="onoffswitch-label" for="11">
                            <span class="onoffswitch-inner">
                            <span class="onoffswitch-active"><span class="onoffswitch-switch">ON</span></span>
                            <span class="onoffswitch-inactive"><span class="onoffswitch-switch">OFF</span></span>
                            </span>
                            </label>
                        </div>
                        <h3><strong>BAJO NIVEL AGUA</strong></h3>
                        <div class="onoffswitch">
                            <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox"  id="12" checked disabled>
                            <label class="onoffswitch-label" for="12">
                            <span class="onoffswitch-inner">
                            <span class="onoffswitch-active"><span class="onoffswitch-switch">ON</span></span>
                            <span class="onoffswitch-inactive"><span class="onoffswitch-switch">OFF</span></span>
                            </span>
                            </label>
                        </div>
                        <h3><strong>ALTA TEMPERATURA</strong></h3>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 ">
                        <h3><strong>RCI</strong></h3>
                        <div class="onoffswitch">
                            <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox"  id="13" checked disabled>
                            <label class="onoffswitch-label" for="13">
                            <span class="onoffswitch-inner">
                            <span class="onoffswitch-active"><span class="onoffswitch-switch">ON</span></span>
                            <span class="onoffswitch-inactive"><span class="onoffswitch-switch">OFF</span></span>
                            </span>
                            </label>
                        </div>
                        <h3><strong>BOMBA JOCKEY</strong></h3>
                        <div class="onoffswitch">
                            <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox"  id="14" checked disabled>
                            <label class="onoffswitch-label" for="14">
                            <span class="onoffswitch-inner">
                            <span class="onoffswitch-active"><span class="onoffswitch-switch">MAN</span></span>
                            <span class="onoffswitch-inactive"><span class="onoffswitch-switch">AUTO</span></span>
                            </span>
                            </label>
                        </div>
                        <h3><strong>ENCENDIDO BJ</strong></h3>
                        <div class="onoffswitch">
                            <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox"  id="15" checked disabled>
                            <label class="onoffswitch-label" for="15">
                            <span class="onoffswitch-inner">
                            <span class="onoffswitch-active"><span class="onoffswitch-switch">ON</span></span>
                            <span class="onoffswitch-inactive"><span class="onoffswitch-switch">OFF</span></span>
                            </span>
                            </label>
                        </div>
                        <h3><strong>GUARDAMOTOR BJ</strong></h3>
                        <div class="onoffswitch">
                            <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox"  id="16" checked disabled>
                            <label class="onoffswitch-label" for="17">
                            <span class="onoffswitch-inner">
                            <span class="onoffswitch-active"><span class="onoffswitch-switch">ON</span></span>
                            <span class="onoffswitch-inactive"><span class="onoffswitch-switch">OFF</span></span>
                            </span>
                            </label>
                        </div>
                        <h3><strong>PREOSTATO BJ</strong></h3>
                        <div class="onoffswitch">
                            <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox"  id="18" checked disabled>
                            <label class="onoffswitch-label" for="18">
                            <span class="onoffswitch-inner">
                            <span class="onoffswitch-active"><span class="onoffswitch-switch">ON</span></span>
                            <span class="onoffswitch-inactive"><span class="onoffswitch-switch">OFF</span></span>
                            </span>
                            </label>
                        </div>
                        <h3><strong>BOMBA PRINCIPAL</strong></h3>
                        <div class="onoffswitch">
                            <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox"  id="19" checked disabled>
                            <label class="onoffswitch-label" for="19">
                            <span class="onoffswitch-inner">
                            <span class="onoffswitch-active"><span class="onoffswitch-switch">MAN</span></span>
                            <span class="onoffswitch-inactive"><span class="onoffswitch-switch">AUTOMA</span></span>
                            </span>
                            </label>
                        </div>
                        <h3><strong>ENCENDIDO BP</strong></h3>
                        <div class="onoffswitch">
                            <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox"  id="20" checked disabled>
                            <label class="onoffswitch-label" for="20">
                            <span class="onoffswitch-inner">
                            <span class="onoffswitch-active"><span class="onoffswitch-switch">ON</span></span>
                            <span class="onoffswitch-inactive"><span class="onoffswitch-switch">OFF</span></span>
                            </span>
                            </label>
                        </div>
                        <h3><strong>PREOSTATO BP</strong></h3>
                    </div>
                </div>
            </div>
        </div>