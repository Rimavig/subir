
<?php
include ("../../conect.php");
include ("../../autenticacion.php");
include ("../../directorio.php");

$re = $client->getAllPerfilRol($_SESSION["id"]);
$resultado = "".$re;
$usuarios= explode(',',$resultado);
$TwebTeatroQuienes="hide";
$TwebTeatroInstalaciones="hide";
$TwebTeatroNoticias="hide";
$modulo5=true;
$band=true;
$txt='active="isActive" ng-init="isActive = true"';
$txt1='';
$txt2='';
$txt3='';
foreach($usuarios as $llave => $valores1) { 
    if($valores1==="33"){
        $TwebTeatroQuienes="";
        $modulo5=false;
        if($band){
            $txt1=$txt;
            $band=false;
        }
    }
    if($valores1==="45"){
        $TwebTeatroInstalaciones="";
        $modulo5=false;
        if($band){
            $txt2=$txt;
            $band=false;
        }
    }
    
    if($valores1==="46"){
        $TwebTeatroNoticias="";
        $modulo5=false;
        if($band){
            $txt3=$txt;
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
                        <tab class="<?php echo $TwebTeatroQuienes; ?>"  <?php echo $txt1; ?>>
                            <tab-heading>
                               Quiénes Somos
                            </tab-heading>
                            <div class="teatroQuienes" id="teatroQuienes">

                            </div>
                        </tab>
                        <tab class="<?php echo $TwebTeatroInstalaciones; ?>"  <?php echo $txt2; ?>> 
                            <tab-heading>
                                Instalaciones
                            </tab-heading>
                            <div class="teatroInstalaciones" id="teatroInstalaciones">

                            </div>
                        </tab>
                        <tab class="<?php echo $TwebTeatroNoticias; ?>"  <?php echo $txt3; ?>>
                            <tab-heading>
                                Noticias del Teatro
                            </tab-heading>
                            <div class="teatroNoticias" id="teatroNoticias">

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
