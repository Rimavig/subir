<?php
include ("../../conect.php");
include ("../../autenticacion.php");
$tipo="Eventos Bloqueados";
$tipo2="venta";
$nombreT="el evento bloqueado";
$re = $client->getPerfilRol($_SESSION["id"],"22");
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
    <div class="row editarEvento" id="editarEvento" >
        <div class="col-lg-12 portlets">
            <div class="panel">
                <div class="panel-header panel-controls">
                    <h3><i class="fa fa-table"></i> Tabla de <strong><?php echo $tipo; ?></strong> </h3>
                </div>
                <div class="panel-content pagination2 table-responsive">
                    <div class="m-b-20">

                        <input type="text" name="tipo" id="tipo" class="esconder"  value="<?php echo $tipo2; ?>" disabled>  
                        <input type="text" name="nombreT" id="nombreT" class="esconder"  value="<?php echo $nombreT; ?>" disabled>    
                    </div>
                    <table class="table filter-footer bloqueados_data <?php echo $exportar; ?> table-dynamic table-tools2  " data-table-name="Eventos Venta" id="table-editable" style="table-layout: fixed;">
                        <thead>
                            <tr>
                                 <th>Id</th>
                                <th>Nombres</th>
                                <th>Categoria</th>
                                <th>Aforo Disponible</th>
                                <th>Sala</th>  
                                <th>Tickets Vendidos</th>
                                <th>Estado</th>    
                                <th class="text-right">Editar</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Nombres</th>
                                <th>Categoria</th>
                                <th>Aforo Disponible</th>
                                <th>Sala</th>    
                                <th>Tickets Vendidos</th>
                                <th>Estado</th>    
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    
    </div>
    <div class="modal fade  Cevento" id="Cevento" aria-hidden="true">
    </div>
    <div class="modal fade verSala" id="verSala" aria-hidden="true">    
    </div>
    <div class="alerta" id="alerta" >
    </div>
    <div class="modal fade" id="modal-responsive3" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="panel panel-transparent">
                <figure class="effect-honey sala">
                    <button data-dismiss="modal" aria-hidden="true">
                        <img src="../../../assets/global/images/principal/2.jpg" alt="img01" />
                    </button>
                </figure>
            </div>
        </div>
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