
<?php
include ("../../conect.php");
include ("../../autenticacion.php");
include ("../../directorio.php");

if (isset($_POST["var1"])) {
    $var1 = $_POST['var1'];
    $re = $client->getAllInformacionGaleria($var1);
    $resultado= "".$re;
    $galeria =explode(';;',$resultado);
}  
?>
<div class="row">
    <div class="col-md-12"> 
        <div class="btn-group"> 
            <button class="crearGaleria btn btn-sm btn-dark "  href="javascript:;"><i class="fa fa-plus"></i> Galería</button>
        </div>
        <table class="table" data-table-name="Galería" id="table-galeria" >
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Imagen (499x304)</th>
                    <th>Orden </th>
                    <th>Estado </th>
                    <th class="text-right">Editar</th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach($galeria as $llave => $valores) {
                    $pregunt =explode(',,,',$valores);
                    if (isset($pregunt[1])) {
                ?>
                <tr>
                    <td id="idGaleria"><?php if (isset($pregunt[0])) {echo $pregunt[0]; }  ?></td>
                    <td> <img src="<?php echo $galeriaI.$pregunt[0].".png?nocache=".time();?>" class="img-responsive" alt="gallery 3"></td>
                    <td> <?php if (isset($pregunt[1])) {echo $pregunt[1]; }  ?> </td>
                    <td>
                        <?php 
                            $estado="";
                            $estadoT="OFF";
                            if ($pregunt[2]==="A" ) {
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
                        <a class="editarGaleria btn btn-sm btn-dark" style="margin: 5px;  "  href="javascript:;"><i class="icon-note"></i></a>
                        <a class="estadoGaleria btn btn-sm btn-warning" style="margin: 5px 0px;" href="javascript:;"><i class="icon-lock"></i></a>
                        <a class="eliminarGaleria btn btn-sm btn-danger" style="margin: 5px;  "  href="javascript:;"><i class="icon-trash"></i></a>
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