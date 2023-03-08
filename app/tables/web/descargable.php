
<?php
include ("../../conect.php");
include ("../../autenticacion.php");
include ("../../directorio.php");

if (isset($_POST["var1"])) {
    $var1 = $_POST['var1'];
    $re = $client->getAllInformacionDescargable($var1);
    $resultado= "".$re;
    $descargable =explode(';;',$resultado);
}  
?>
<div class="row">
    <div class="col-md-12"> 
        <div class="btn-group">
            <button class="crearDescarga btn btn-sm btn-dark "  href="javascript:;"><i class="fa fa-plus"></i> Información Técnica</button>
        </div>
        <table class="table" data-table-name="Información Técnica" id="table-descarga" >
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Orden </th>
                    <th>Descarga </th>
                    <th class="text-right">Editar</th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach($descargable as $llave => $valores) {
                    $pregunt =explode(',,,',$valores);
                    if (isset($pregunt[1])) {
                ?>
                <tr>
                    <td id="idDescarga"><?php if (isset($pregunt[0])) {echo $pregunt[0]; }  ?></td>
                    <td><a href="<?php echo  $archivos.$pregunt[0];?>.pdf" target="blank"><?php if (isset($pregunt[1])) {echo $pregunt[1]; }  ?></a>  </td>
                    <td> <?php if (isset($pregunt[2])) {echo $pregunt[2]; }  ?> </td>
                    <td>
                        <?php 
                            $estado="";
                            $estadoT="OFF";
                            if ($pregunt[3]==="A" ) {
                                $estado="checked";
                                $estadoT="ON";
                            } 
                        ?> 
                        <div class="form-group">
                            <label class="switch switch-green">
                                <input type="checkbox" class="switch-input"  id="box" <?php echo $estado; ?> disabled>
                                <span class="switch-label" data-on="On" data-off="Off"></span>
                                <span class="switch-handle"></span>
                                <span id="estado" class="esconder"><?php echo $estadoT; ?></span>
                            </label>
                        </div>
                    </td>
                    <td class="text-right">
                        <a class="editarDescarga btn btn-sm btn-dark" style="margin: 5px;  "  href="javascript:;"><i class="icon-note"></i></a>
                        <a class="estadoDescarga btn btn-sm btn-warning" style="margin: 5px 0px;" href="javascript:;"><i class="icon-lock"></i></a>
                        <a class="eliminarDescarga btn btn-sm btn-danger" style="margin: 5px;  "  href="javascript:;"><i class="icon-trash"></i></a>
                    </td>
                </tr>
                <?php
                }
                }
                ?> 
            
            </tbody>
        </table>
    </div>
</div>
<div class="modal-footer text-center">
    <button type="button" class="btn btn-embossed btn-default cancelar " data-dismiss="modal" aria-hidden="true">Cancelar</button>
</div>
<?php
$transport->close();
?>    