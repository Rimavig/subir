
<?php
include ("../../conect.php");
include ("../../autenticacion.php");
include ("../../directorio.php");
$re = $client->getAllPerfilRol($_SESSION["id"]);
$resultado = "".$re;
$usuarios= explode(',',$resultado);

$TwebContacto="hide";
$TwebAlquiler="hide";
$modulo5=true;
$band=true;
$txt='active="isActive" ng-init="isActive = true"';
$txt1='';
$txt2='';
$txt3='';
$txt4='';
foreach($usuarios as $llave => $valores1) { 

    
    if($valores1==="53"){
        $TwebContacto="";
        $modulo5=false;
        if($band){
            $txt3=$txt;
            $band=false;
        }
    }
    if($valores1==="54"){
        $TwebAlquiler="";
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
                    <h3><i class="fa fa-table"></i> Contáctanos</strong> </h3>
                </div>
                <div class="panel-content pagination2 table-responsive">
                <tabset class="tab-fade-in" >
                        <tab class="<?php echo $TwebContacto; ?>"  <?php echo $txt1; ?>>
                            <tab-heading>
                               Contacto
                            </tab-heading>
                            <div class="contactoG" id="contactoG">

                            </div>
                        </tab>
                        <tab class="<?php echo $TwebAlquiler; ?>"  <?php echo $txt2; ?>>
                            <tab-heading>
                                Alquiler
                            </tab-heading>
                            <div class="contactoA" id="contactoA">

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
        <p class="copyright">
                <span>Copyright © 2022 </span><span> Teatro Sanchez Aguilar </span><span>- Powered by Vion IoT Solutions. All rights reserved.</span>
            </p>
    </div>
</div>
<?php
$transport->close();
?>