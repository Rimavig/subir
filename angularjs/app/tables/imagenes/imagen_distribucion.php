<?php
include ("../../conect.php");
include ("../../autenticacion.php");
include ("../../directorio.php");
$tipo="Distribución";
$nombreT="la imagen";
$tipo2="distribucion";
$re = $client->getPerfilRol($_SESSION["id"],"16");
$resultado = "".$re;
$usuarios= explode(',',$resultado);
$crear="hide";
$exportar="no-descargar";
if($resultado==""){
    ?>
    <a ng-click="reload()">
    <?php
}
foreach($usuarios as $llave => $valores1) {
    if($valores1==="1"){
        $crear="";
    }
    if($valores1==="6"){
        $exportar="";
    }
}
?>

<div>
    <div class="row">
        <div class="col-lg-12 portlets">
            <div class="panel">
                <div class="panel-header panel-controls">
                    <h3><i class="fa fa-table"></i> Catálago de <strong>imágenes de <?php echo $tipo; ?></strong> </h3>
                </div>
                <div class="panel-content pagination2 table-responsive">
                    <div class="m-b-20 <?php echo $crear; ?>">
                        <div class="btn-group">
                            <div data-toggle="modal" data-target="#modal-responsive">
                                <button class="crear btn btn-sm btn-dark"><i class="fa fa-plus"></i> Imágen de <?php echo $tipo; ?></button>
                            </div>
                            <input type="text" name="tipo" id="tipo" class="esconder"  value="<?php echo $tipo2; ?>" disabled> 
                            <input type="text" name="nombreT" id="nombreT" class="esconder"  value="<?php echo $nombreT; ?>" disabled>    
                        </div>
                    </div>
                    <table class="table distribucion_data table-dynamic <?php echo $exportar; ?> table-imagen " data-table-name="<?php echo $tipo; ?>" id="table-editable" >
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>imagen</th>
                                <th>Estado</th>    
                                <th class="text-right">Editar</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade crear-imagen"  data-keyboard="false" data-backdrop="static" id="crear-imagen" aria-hidden="true">
    </div>
    <div class="modal fade editar-imagen"  data-keyboard="false" data-backdrop="static" id="editar-imagen" aria-hidden="true">
    </div>
    <div class="modal fade verImagen" id="verImagen" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-mantenimiento">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <button data-dismiss="modal" aria-hidden="true">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail">
                                    <img id="ver_imagen" data-src="" src='' class="img-responsive" alt="gallery 3">
                                </div>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
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