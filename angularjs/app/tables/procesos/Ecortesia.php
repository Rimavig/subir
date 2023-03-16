<?php
include ("../../conect.php");
include ("../../autenticacion.php");
if (isset($_POST["var1"])) {
    $var1 = $_POST['var1'];
    $re = $client->getCortesia($var1);
    $resultado= "".$re;
    $usuarios =explode(';;',$resultado);
}
?>
<div class="row">
    <div class="col-lg-12 portlets">
        <div class="panel">
            <div class="panel-header panel-controls">
                <h3><i class="fa fa-table"></i> Tabla Tickets de Cortesias</strong> </h3>
            </div>
            <input type="text" name="tipo" id="Eid" class="esconder"  value="<?php echo $var1; ?>" disabled> 
            <div class="panel-content pagination2 table-responsive">
                <table class="table" data-table-name="Tabla Tickets de Cortesias" id="table-editable" style="table-layout: fixed;">
                    <thead>
                        <tr>
                            <th>Id ticket Asiento</th>
                            <th>Asiento</th>
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
                                if (isset($usuario[1]) ) {  
                            ?>
                            <tr>
                                <td id="fila0"> <?php if (isset($usuario[0])) {echo $usuario[0]; }  ?> </td>
                                <td> <?php if (isset($usuario[2])) {echo $usuario[1]; }  ?> </td>
                                <td>
                                    <?php 
                                        if ($usuario[2]==="A" ) {
                                            $estado="checked";
                                            $estadoT="ON";
                                        } 
                                    ?> 
                                    <div class="form-group">
                                        <label class="switch switch-green">
                                            <input type="checkbox" class="switch-input"  id="Ebox" <?php echo $estado; ?> disabled>
                                            <span class="switch-label" data-on="On" data-off="Off"></span>
                                            <span class="switch-handle"></span>
                                            <span id="Eestado" class="esconder"><?php echo $estadoT; ?></span>
                                        </label>
                                    </div>
                                </td>
                                <td class="text-right">
                                    <a class="deleteE btn btn-sm btn-danger" style="margin: 5px;"  href="javascript:;"><i class="icon-trash"></i></a>
                                </td>
                            </tr>
                            <?php
                             }
                            }
                            $transport->close();
                            ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer text-center">
                <button type="button" class="btn btn-embossed btn-default cancelarE " aria-hidden="true">Salir</button>
            </div>
        </div>
    </div>
</div>
<?php
$transport->close();
?>