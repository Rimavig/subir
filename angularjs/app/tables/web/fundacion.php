
<?php
include ("../../conect.php");
include ("../../autenticacion.php");
include ("../../directorio.php");
$re = $client->getAllPerfilRol($_SESSION["id"]);
$resultado = "".$re;
$usuarios= explode(',',$resultado);

$TwebFundacionQ="hide";
$TwebFundacionP="hide";

$modulo5=true;
$band=true;
$txt='active="isActive" ng-init="isActive = true"';
$txt1='';
$txt2='';

foreach($usuarios as $llave => $valores1) { 
    if($valores1==="35"){
        $TwebFundacionQ="";
        $modulo5=false;
        if($band){
            $txt1=$txt;
            $band=false;
        }
    }
    if($valores1==="48"){
        $TwebFundacionP="";
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
                    <h3><i class="fa fa-table"></i> Fundación Sánchez Aguilar</strong> </h3>
                </div>
                <div class="panel-content pagination2 table-responsive">
                <tabset class="tab-fade-in alquilerP" >
                        <tab class="<?php echo $TwebFundacionQ; ?>"  <?php echo $txt1; ?>>
                            <tab-heading>
                               Quiénes Somos
                            </tab-heading>
                            <div class="fundacionQuienes" id="fundacionQuienes">

                            </div>
                        </tab>
                        <tab class="<?php echo $TwebFundacionP; ?>"  <?php echo $txt2; ?>>
                            <tab-heading>
                                Proyectos con el Teatro
                            </tab-heading>
                            <div class="fundacionProyectos" id="fundacionProyectos">

                            </div>
                        </tab>
                    </tabset>
                </div>
                <div class="alquilerS hide">
                    <tabset class="tab-fade-in " >
                        <tab>
                            <tab-heading>
                            Información Principal
                            </tab-heading>
                            <div class="teatroInformacion" id="teatroInformacion">
                            </div>
                        </tab>
                        <tab>
                            <tab-heading>
                            Información Técnica
                            </tab-heading>
                            <div class="teatroDescargable" id="teatroDescargable">
                            </div>
                        </tab>
                        <tab>
                            <tab-heading>
                            Galería
                            </tab-heading>
                            <div class="teatroGaleria" id="teatroGaleria">
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