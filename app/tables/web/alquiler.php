
<?php
include ("../../conect.php");
include ("../../autenticacion.php");
include ("../../directorio.php");

$re = $client->getAllPerfilRol($_SESSION["id"]);
$resultado = "".$re;
$usuarios= explode(',',$resultado);

$TwebAlquilerEspacios="hide";
$TwebAlquilerEventos="hide";

$modulo5=true;
$band=true;
$txt='active="isActive" ng-init="isActive = true"';
$txt1='';
$txt2='';

foreach($usuarios as $llave => $valores1) { 
    if($valores1==="34"){
        $TwebAlquilerEspacios="";
        $modulo5=false;
        if($band){
            $txt1=$txt;
            $band=false;
        }
    }
    if($valores1==="47"){
        $TwebAlquilerEventos="";
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
                    <h3><i class="fa fa-table"></i> Alquiler</strong> </h3>
                </div>
                <div class="panel-content pagination2 table-responsive">
                    <tabset class="tab-fade-in alquilerP" >
                        <tab class="<?php echo $TwebAlquilerEspacios; ?>"  <?php echo $txt1; ?>>
                            <tab-heading>
                               Espacios
                            </tab-heading>
                            <div class="teatroEspacios" id="teatroEspacios">
                            </div>
                        </tab>
                        <tab class="<?php echo $TwebAlquilerEventos; ?>"  <?php echo $txt2; ?>> 
                            <tab-heading>
                               Eventos Realizados
                            </tab-heading>
                            <div class="teatroRealizados" id="teatroRealizados">

                            </div>
                        </tab>
                    </tabset>
                    <div class="infoG hide">

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
