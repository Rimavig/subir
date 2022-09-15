
<?php
include ("../../conect.php");
include ("../../autenticacion.php");
include ("../../directorio.php");

$re = $client->getAllPerfilRol($_SESSION["id"]);
$resultado = "".$re;
$usuarios= explode(',',$resultado);
$exportar="";
$TprocesosAmigosB="hide";
$TprocesosAmigosP="hide";
$TprocesosAmigosI="hide";
$modulo5=true;
$band=true;
$txt='active="isActive" ng-init="isActive = true"';
$txt1='';
$txt2='';
$txt3='';
foreach($usuarios as $llave => $valores1) { 
    if($valores1==="65"){
        $TprocesosAmigosB="";
        $modulo5=false;
        if($band){
            $txt1=$txt;
            $band=false;
        }
    }
    if($valores1==="66"){
        $TprocesosAmigosP="";
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
                    <h3><i class="fa fa-table"></i> Administración de correos </strong> </h3>
                </div>
                <div class="panel-content pagination2 table-responsive">
                   
                <tabset class="tab-fade-in" >
                        <tab class="<?php echo $TprocesosAmigosB; ?>"  <?php echo $txt1; ?>> 
                            <tab-heading>
                               Destinatarios
                            </tab-heading>
                            <div class="correoD " id="correoD">
                            </div>
                            
                        </tab>
                        <tab class="<?php echo $TprocesosAmigosP; ?>"  <?php echo $txt2; ?>>
                            <tab-heading>
                               Error de Correo 
                            </tab-heading>
                            <div class="correosE " id="correosE">
                            </div>
                            
                        </tab>
                    </tabset>
                </div>
                
                
            </div>
        </div>
    
    </div>
    <div class="modal fade  Cusuarios" data-keyboard="false" data-backdrop="static" id="Cusuarios" aria-hidden="true">
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
