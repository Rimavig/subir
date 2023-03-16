
<?php
include ("../../conect.php");
include ("../../autenticacion.php");
include ("../../directorio.php");

$re = $client->getAllPerfilRol($_SESSION["id"]);
$resultado = "".$re;
$usuarios= explode(',',$resultado);

$TwebOtrasImagen="hide";
$TwebOtrasBanner="hide";
$modulo5=true;
$band=true;
$txt='active="isActive" ng-init="isActive = true"';
$txt1='';
$txt2='';
foreach($usuarios as $llave => $valores1) { 
    if($valores1==="32"){
        $TwebOtrasImagen="";
        $modulo5=false;
        if($band){
            $txt1=$txt;
            $band=false;
        }
    }
    if($valores1==="44"){
        $TwebOtrasBanner="";
        $modulo5=false;
        if($band){
            $txt2=$txt;
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
                    <h3><i class="fa fa-table"></i> Otras Imágenes</strong> </h3>
                </div>
                <div class="panel-content pagination2 table-responsive">
                    <tabset class="tab-fade-in" >
                        <tab class="<?php echo $TwebOtrasImagen; ?>"  <?php echo $txt1; ?>> 
                            <tab-heading>
                               Imagen inicio (512x768)
                            </tab-heading>
                            <div class="imagenInicio" id="imagenInicio">

                            </div>
                        </tab>
                        <tab class="<?php echo $TwebOtrasBanner; ?>"  <?php echo $txt2; ?>>
                            <tab-heading>
                               Banner
                            </tab-heading>
                            <div class="imagenBannerW" id="imagenBannerW">
                            </div>
                            <div class="imagenBannerM" id="imagenBannerM">
                            </div>
                    </tabset>
                </div>
            </div>
        </div>
    
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