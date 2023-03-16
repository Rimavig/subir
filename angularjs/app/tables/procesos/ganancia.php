
<?php
include ("../../conect.php");
include ("../../autenticacion.php");
include ("../../directorio.php");

$re = $client->getPerfilRol($_SESSION["id"],"52");
$resultado = "".$re;
$usuarios= explode(',',$resultado);
$TprocesosAmigosB="";
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
                        <!--tab class="<?php echo $cumpleanos; ?>"  <?php echo $txt2; ?>>
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
                        </tab-->
                    </tabset>
                </div>
                
                
            </div>
        </div>
    
    </div>                             
    <div class="alerta" id="alerta" >
    </div>
    <div class="footer">
        <p class="copyright">
                <span>Copyright © 2022 </span><span> Teatro Sanchez Aguilar </span><span>- Powered by Vion IoT Solutions. All rights reserved.</span>
            </p>
    </div>
</div>
<?php
$transport->close();
?>