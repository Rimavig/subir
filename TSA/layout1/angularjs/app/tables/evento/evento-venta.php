<?php
include ("../../conect.php");
include ("../../autenticacion.php");
$re = $client->getAllEvento("V");
$resultado= "".$re;
$usuarios =explode(';',$resultado);
$tipo="Evento Venta";
$tipo2="venta";
$nombreT="el evento venta";
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
                            <button class="crear btn btn-sm btn-dark"  href="javascript:;"><i class="fa fa-plus"></i> Agregar <?php echo $tipo; ?></button>
                        </div>
                        <input type="text" name="tipo" id="tipo" class="esconder"  value="<?php echo $tipo2; ?>" disabled>  
                        <input type="text" name="nombreT" id="nombreT" class="esconder"  value="<?php echo $nombreT; ?>" disabled>    
                    </div>
                    <table class="table filter-footer table-dynamic table-tools2  " data-table-name="Eventos Venta" id="table-editable" style="table-layout: fixed;">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombres</th>
                                <th>Fecha Inicial</th>
                                <th>Fecha Final</th>
                                <th>Sala</th>  
                                <th>Tickets Vendidos</th>
                                <th>Estado</th>    
                                <th class="text-right">Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            foreach($usuarios as $llave => $valores) {
                                $usuario =explode(',,,',$valores);
                                $estado="";
                                $estadoT="OFF";
                                $estado2="Off";
                                if (isset($usuario[2])) {
                            ?>
                            <tr>
                                <td id="fila0"> <?php if (isset($usuario[0])) {echo $usuario[0]; }  ?> </td>
                                <td> <?php if (isset($usuario[1])) {echo $usuario[1]; }  ?> </td>
                                <td> <?php if (isset($usuario[3])) {echo $usuario[3]; }  ?> </td>
                                <td> <?php if (isset($usuario[4])) {echo $usuario[4]; }  ?> </td>
                                <td> <?php if (isset($usuario[6])) {echo $usuario[6]; }  ?> </td>
                                <td> <?php if (isset($usuario[14])) {echo $usuario[14]; }  ?> </td>
                                <th>
                                    <?php 
                                        if ($usuario[16]==="A" ) {
                                            $estado="checked";
                                            $estadoT="ON";
                                        } 
                                        if ($usuario[16]==="P" ) {
                                            $estadoT="PA";
                                            $estado2="PA";
                                        } 
                                    ?> 
                                    <div class="form-group">
                                        <label class="switch switch-green">
                                            <input type="checkbox" class="switch-input"  id="box" value="<?php echo $usuario[16]; ?>" <?php echo $estado; ?> disabled>
                                            <span class="switch-label" data-on="On" data-off=<?php echo $estado2; ?>></span>
                                            <span class="switch-handle"></span>
                                            <span id="estado" class="esconder"><?php echo $estadoT; ?></span>
                                        </label>
                                    </div>
                                </th>
                                <td class="text-right">
                                    <a class="editar btn btn-sm btn-dark" style="margin: 5px;"  href="javascript:;"><i class="icon-note"></i></a>
                                    <a class="delete btn btn-sm btn-danger" style="margin: 5px;"  href="javascript:;"><i class="icons-office-52"></i></a>
                                    <a class="estado btn btn-sm btn-blue" style="margin: 5px;"  style="margin: 0px;" href="javascript:;"><i class="icon-key"></i></a>
                                </td>
                            </tr>
                            <?php
                             }
                            }
                            ?> 
                         
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Nombres</th>
                                <th>Fecha Inicial</th>
                                <th>Fecha Final</th>
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
    <div class="row tabEventos" id="tabEventos" >
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
                        <tab>
                            <tab-heading>
                                Precios
                            </tab-heading>
                            <div class="precios" id="precios">
                            </div>
                        </tab>
                    </tabset>
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