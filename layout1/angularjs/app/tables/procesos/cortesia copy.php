<?php
include ("../../conect.php");
include ("../../autenticacion.php");
?>
<div>
    <div class="row">
        <div class="col-lg-12 portlets">
            <div class="panel">
                <div class="panel-header panel-controls">
                    <h3><i class="fa fa-table"></i> Tabla de Cortesias</strong> </h3>
                </div>
                <div class="panel-content pagination2 table-responsive">
                    <table class="table filter-footer cortesia_data table-dynamic no-descargar cortesia " data-table-name="Tabla de Cortesias" id="table-editable" style="table-layout: fixed;">
                        <thead>
                            <tr>
                                <th>Id ticket Asiento</th>
                                <th>Id ticket</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Asiento</th>
                                <th>Evento</th>
                                <th>Platea</th>
                                <th>Fecha Función</th>
                                <th class="text-right">Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            foreach($usuarios as $llave => $valores) {
                                $usuario =explode(',,,',$valores);
                                if (isset($usuario[1]) ) {  
                            ?>
                            <tr>
                                <td class="esconder" id="fila0"> <?php if (isset($usuario[0])) {echo $usuario[0]; }  ?> </td>
                                <td class="esconder" id="fila1"> <?php if (isset($usuario[1])) {echo $usuario[1]; }  ?> </td>
                                <td> <?php if (isset($usuario[2])) {echo $usuario[2]; }  ?> </td>
                                <td> <?php if (isset($usuario[3])) {echo $usuario[3]; }  ?> </td>
                                <td> <?php if (isset($usuario[4])) {echo $usuario[4]; }  ?> </td>
                                <td> <?php if (isset($usuario[7])) {echo $usuario[7]; }  ?> </td>
                                <td> <?php if (isset($usuario[5])) {echo $usuario[5]; }  ?> </td>
                                <td> <?php if (isset($usuario[6])) {echo $usuario[6]; }  ?> </td>
                                <td class="text-right">
                                    <a class="delete btn btn-sm btn-danger" style="margin: 5px;"  href="javascript:;"><i class="icon-trash"></i></a>
                                </td>
                            </tr>
                            <?php
                             }
                            }
                            $transport->close();
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="esconder">Id ticket Asiento</th>
                                <th class="esconder">Id ticket</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Asiento</th>
                                <th>Evento</th>
                                <th>Platea</th>
                                <th>Fecha Función</th> 
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="alerta" id="alerta" >
    </div>
    <div class="footer">
        <div class="copyright">
            <p class="pull-left sm-pull-reset">
                <span >Copyright <span class="copyright">&copy;</span> 2016 </span>
                <span>THEMES LAB</span>.
                <span>All rights reserved. </span>
            </p>
            <p class="pull-right sm-pull-reset">
                <span><a href="#" class="m-r-10">Support</a> | <a href="#" class="m-l-10 m-r-10">Terms of use</a> | <a href="#" class="m-l-10">Privacy Policy</a></span>
            </p>
        </div>
    </div>
</div>