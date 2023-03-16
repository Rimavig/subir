
<?php
include ("../../conect.php");
include ("../../autenticacion.php");
include ("../../directorio.php");
$tipo="Café Vino Bar- Plazoleta";
$tipo2="CafeVino";
$nombreT="Café Vino Bar- Plazoleta";
$var1="127";
?>
<div>
    <div class="row " >
        <div class="col-lg-12 portlets">
            <div class="panel">
                <div class="panel-header panel-controls">
                    <h3><i class="fa fa-table"></i> Café Vino Bar</strong> </h3>
                </div>
                <div class="panel-content pagination2 table-responsive">
                    <div class="alquilerS">
                        <tabset class="tab-fade-in " >
                            <tab>
                                <tab-heading>
                                Información Principal
                                </tab-heading>
                                <div class="cafeInformacion" id="cafeInformacion">
                                    
                                </div>
                            </tab>
                            <tab>
                                <tab-heading>
                                Galería
                                </tab-heading>
                                <div class="cafeGaleria" id="cafeGaleria">
                                    
                                </div>
                            </tab>
                        </tabset>  
                    </div>
                </div> 
            </div>
        </div>
    
    </div>
    <input type="text" name="nombreT" id="nombreT" class="esconder"  value="<?php echo $nombreT; ?>" disabled>  
    <input type="text" name="nombreT" id="tipo2" class="esconder"  value="<?php echo $tipo2; ?>" disabled>  
    <input type="text"  id="EidObjetivo" class="esconder"  value="<?php echo $var1; ?>" disabled> 
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