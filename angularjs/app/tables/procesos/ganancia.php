
<?php
include ("../../conect.php");
include ("../../autenticacion.php");
include ("../../directorio.php");

$re = $client->getPerfilRol($_SESSION["id"],"52");
$resultado = "".$re;
$usuarios= explode(',',$resultado);
$puntos="hide";
$regalo="hide";
$cumpleanos="hide";
if($resultado==""){
    ?>
    <a ng-click="reload()">
    <?php
}
$txt='active="isActive" ng-init="isActive = true"';
$txt1='';
$txt2='';
$txt3='';
$band=true;
foreach($usuarios as $llave => $valores1) {
    if($valores1==="28"){
        $puntos="";
        if($band){
            $txt1=$txt;
            $band=false;
        }
    }
    if($valores1==="30"){
        $regalo="";
        if($band){
            $txt2=$txt;
            $band=false;
        }
    }
    if($valores1==="29"){
        $cumpleanos="";
        if($band){
            $txt3=$txt;
            $band=false;
        }
    }
}
?>
<div>
    <div class="row " >
        <div class="col-lg-12 portlets">
            <div class="panel">
                <div class="panel-header panel-controls">
                    <h3><i class="fa fa-table"></i> Administración descuentos automatizados </strong> </h3>
                </div>
                <div class="panel-content pagination2 table-responsive">
                <tabset class="tab-fade-in" >
                        <tab class="<?php echo $puntos; ?>"  <?php echo $txt1; ?>> 
                            <tab-heading>
                               Amigos del Teatro
                            </tab-heading>
                            <div class="adminAmigos <?php echo $TprocesosAmigosB; ?>" id="adminAmigos">
                               
                            </div>
                        </tab>
                        <tab class="<?php echo $cumpleanos; ?>"  <?php echo $txt2; ?>>
                            <tab-heading>
                               Cumpleaños 
                            </tab-heading>
                            <div class="adminCumple " id="adminCumple">
                            </div>
                        </tab>
                        <tab class="<?php echo $regalo; ?>"  <?php echo $txt3; ?>>
                            <tab-heading>
                                Regalo para ti
                            </tab-heading>
                            <div class="adminRegalo" id="adminRegalo">
                            </div>
                        </tab>
                    </tabset>
                </div>
                
                
            </div>
        </div>
    
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
