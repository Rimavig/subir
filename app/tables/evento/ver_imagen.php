<?php
include ("../../conect.php");
include ("../../autenticacion.php");

$var1="";
$editar="";
$nombre="";
$A="";
$B="";
$C="";
$D="";
$E="";
$F="";

$idSala = $_POST['var1'];
$distribucion=  explode(';',"".$client->getAllSalaMapa("total"));

?>
<div class="modal-dialog modal-lg modal-mantenimiento">
    <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <button data-dismiss="modal" aria-hidden="true">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-new thumbnail">
                        <?php
                            foreach($distribucion as $llave => $valores) {
                                $distribucion  =explode(',,,',$valores);
                                if (isset($distribucion[5])) {
                                    if ($distribucion[0]===$idSala ) {
                            ?>
                            <img id="imagen1" data-src="" src="../../../assets/global/images/mapa/<?php echo $distribucion[5]; ?>" class="img-responsive" alt="gallery 3">
                            <?php
                                    }
                                }
                            }
                        ?> 
                        </div>
                    </div>
                </button>
            </div>
        </div>
    </div>
</div>