
<?php
include ("../../conect.php");
include ("../../autenticacion.php");
include ("../../directorio.php");

?>
<div>
    <div class="row " >
        <div class="col-lg-12 portlets">
            <div class="panel">
                <div class="panel-header panel-controls">
                    <h3><i class="fa fa-table"></i>Banner Principal</strong> </h3>
                </div>
                <div class="panel-content pagination2 table-responsive">
                    <div class="principalSweb" id="principalSweb">
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
<?php
$transport->close();
?>