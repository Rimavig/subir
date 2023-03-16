<?php
include ("../../conect.php");
include ("../../autenticacion.php");
include ("../../directorio.php");
$var1="";
$editar="";
$nombre="";

if(isset($_POST["tipo"])){
    $var1 = $_POST['var1'];
    $re = $client->getSalaMapa($var1,"Mapa");
    $distribucion=  explode(';;',$re);
    
}else{
    $idSala = $_POST['var1'];
    $distribucion=  explode(';;',"".$client->getAllSalaMapa("total"));
}

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
                                    if(isset($_POST["tipo"])){
                                        ?>
                                        <img id="imagen1" data-src="" src="<?php echo $path_imagen."distribucion"."/".$distribucion[5]; ?>" class="img-responsive" alt="gallery 3">
                                        <?php
                                    }else{
                                        if ($distribucion[0]===$idSala ) {
                                        ?>
                                        <img id="imagen1" data-src="" src="<?php echo $path_imagen."distribucion"."/".$distribucion[5]; ?>" class="img-responsive" alt="gallery 3">
                                        <?php
                                        }
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
<?php
$transport->close();
?>