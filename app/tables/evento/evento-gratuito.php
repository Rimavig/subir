<?php
include ("../../conect.php");
include ("../../autenticacion.php");
$re = $client->getAllEvento("G");
$resultado= "".$re;
$usuarios =explode(';;',$resultado);
$tipo="Evento Gratuito";
$tipo2="gratuito";
$nombreT="el evento gratuito";
if($resultado==""){
    ?>
    <a ng-click="reload()">
    <?php
}
$re = $client->getPerfilRol($_SESSION["id"],"20");
$resultado = "".$re;
$usuarios= explode(',',$resultado);
$crear="hide";
$exportar="no-descargar";
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
                        <div class="btn-group">
                            <button class="crear btn btn-sm btn-dark"  href="javascript:;"><i class="fa fa-plus"></i> <?php echo $tipo; ?></button>
                        </div>
                        <input type="text" name="tipo" id="tipo" class="esconder"  value="<?php echo $tipo2; ?>" disabled>  
                        <input type="text" name="nombreT" id="nombreT" class="esconder"  value="<?php echo $nombreT; ?>" disabled>    
                    </div>
                    <table class="table filter-footer gratuito_data table-dynamic table-tools2  " data-table-name="Eventos Gratuitos" id="table-editable" style="table-layout: fixed;">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombres</th>
                                <th>Categoria</th>
                                <th>Aforo</th>
                                <th>Sala</th>  
                                <th>Registrados</th>
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
    <div class="row tabEventos hide" id="tabEventos" >
        <div class="col-lg-12 portlets">
            <div class="panel">
                <div class="panel-header panel-controls">
                    <h3><i class="fa fa-table"></i> Tabla de <strong><?php echo $tipo; ?></strong> </h3>
                </div>
                <div class="panel-content pagination2 ">
                    <tabset class="tab-fade-in" >
                        <tab>
                            <tab-heading>
                                Información
                            </tab-heading>
                            <div class="informacion" id="informacion">
                            </div>
                        </tab>
                        <tab>
                            <tab-heading>
                                Descripción
                            </tab-heading>
                            <div class="descripcion" id="descripcion">
                            </div>
                        </tab>
                        <tab>
                            <tab-heading>
                                Multimedia
                            </tab-heading>
                            <div class="multimedia" id="multimedia">
                               
                            </div>
                        </tab>
                        <tab>
                            <tab-heading>
                                Funciones
                            </tab-heading>
                            <div class="funciones" id="funciones">
                            </div>
                        </tab>
                    </tabset>
                </div> 
            </div>
        </div>
    </div>
    <div class="modal fade  Cevento" id="Cevento"  data-keyboard="false" data-backdrop="static" aria-hidden="true">
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
        <p class="copyright">
                <span>Copyright © 2022 </span><span> Teatro Sanchez Aguilar </span><span>- Powered by Vion IoT Solutions. All rights reserved.</span>
            </p>
    </div>
</div>