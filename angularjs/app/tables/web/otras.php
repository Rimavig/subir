
<?php
include ("../../conect.php");
include ("../../autenticacion.php");
include ("../../directorio.php");
$re = $client->getAllPerfilRol($_SESSION["id"]);
$resultado = "".$re;
$usuarios= explode(',',$resultado);

$TwebOtrasP="hide";
$TwebOtrasR="hide";
$TwebOtrasA="hide";
$TwebOtrasC="hide";
$modulo5=true;
$band=true;
$txt='active="isActive" ng-init="isActive = true"';
$txt1='';
$txt2='';
$txt3='';
$txt4='';
foreach($usuarios as $llave => $valores1) { 
    if($valores1==="39"){
        $TwebOtrasP="";
        $modulo5=false;
        if($band){
            $txt1=$txt;
            $band=false;
        }
    }
    if($valores1==="49"){
        $TwebOtrasR="";
        $modulo5=false;
        if($band){
            $txt2=$txt;
            $band=false;
        }
    }
    
    if($valores1==="50"){
        $TwebOtrasA="";
        $modulo5=false;
        if($band){
            $txt3=$txt;
            $band=false;
        }
    }
    if($valores1==="51"){
        $TwebOtrasC="";
        $modulo5=false;
        if($band){
            $txt4=$txt;
            $band=false;
        }
    }
}   
if($modulo5){
    ?>
    <a ng-click="reload()">
    <?php
}
?>
<div>
    <div class="row " >
        <div class="col-lg-12 portlets">
            <div class="panel">
                <div class="panel-header panel-controls">
                    <h3><i class="fa fa-table"></i> El Teatro</strong> </h3>
                </div>
                <div class="panel-content pagination2 table-responsive">
                <tabset class="tab-fade-in" >
                        <tab class="<?php echo $TwebOtrasP; ?>"  <?php echo $txt1; ?>>
                            <tab-heading>
                                Preguntas Frecuentes
                            </tab-heading>
                            <div class="otrasPreguntas" id="otrasPreguntas">

                            </div>
                        </tab>
                        <tab class="<?php echo $TwebOtrasR; ?>"  <?php echo $txt2; ?>>
                            <tab-heading>
                                Responsabilidad Ambiental
                            </tab-heading>
                            <div class="otrasResponsabilidad" id="otrasResponsabilidad">

                            </div>
                        </tab>
                        <tab class="<?php echo $TwebOtrasA; ?>"  <?php echo $txt3; ?>>
                            <tab-heading>
                                Amigos del Teatro
                            </tab-heading>
                            <div class="otrasAmigos" id="otrasAmigos">
                            </div>
                        </tab>
                        <tab class="<?php echo $TwebOtrasC; ?>"  <?php echo $txt4; ?>>
                            <tab-heading>
                                Contacto
                            </tab-heading>
                            <div class="otrasContacto" id="otrasContacto">
                            </div>
                        </tab>
                    </tabset>
                </div>
                
                
            </div>
        </div>
    
    </div>
    <div class="infoG hide">

    </div> 
    <div class="modal fade  Mteatro" data-keyboard="false" data-backdrop="static" id="Mteatro" aria-hidden="true">
    </div>                                        
    <div class="alerta" id="alerta" >
    </div>
    <div class="footer">
        <div class="copyright">
            <p class="pull-left sm-pull-reset">
                <span>Copyright <span class="copyright">&copy;</span> 2016 </span>
                <span>THEMES LAB</span>.
                <span>All rights reserved. </span>
            </p>
            <p class="pull-right sm-pull-reset">
                <span><a href="#" class="m-r-10">Support</a> | <a href="#" class="m-l-10 m-r-10">Terms of use</a> | <a href="#" class="m-l-10">Privacy Policy</a></span>
            </p>
        </div>
    </div>
</div>
