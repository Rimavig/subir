
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
