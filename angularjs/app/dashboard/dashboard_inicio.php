<?php
include ("../conect_dashboard.php");
include ("../autenticacion.php");
?>
<div>
<div class="row " >
    <div style="text-align:center;" class="col-md-12 "> 
        <img style="max-width: 80%;!important;" data-src="" src="https://teatrosanchezaguilar.org/imagenes/logo/inicio.svg" alt="NO IMAGEN"> 
    </div>
    <div class="footer">
        <p class="copyright">
            <span>Copyright © 2022 </span><span> Teatro Sanchez Aguilar </span><span>- Powered by Vion IoT Solutions. All rights reserved.</span>
        </p>
    </div>
</div>
<?php
$transport2->close();
?>