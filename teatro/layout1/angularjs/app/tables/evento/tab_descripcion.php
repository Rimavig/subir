<?php
include ("../../conect.php");
include ("../../autenticacion.php");
if (isset($_POST["var1"])) {
    $var1 = $_POST['var1'];
    $re = $client->getEvento_sinopsis($var1,"V");
    $resultado = "".$re;
    $historial= explode(';;',$resultado);
    $re = $client->getAllFichaArtistica($var1,"V");
    $resultado= "".$re;
    $fichas =explode(';;',$resultado);
}
$descripcion="hide";
$FnombreT="la ficha artística";
if ($_POST["tipo"]==="venta") {
    $nombreT="el evento venta";
    $tipo2="Eventa";
    $re = $client->getPerfilRol($_SESSION["id"],"19");
    $resultado = "".$re;
    $usuarios= explode(',',$resultado);
    foreach($usuarios as $llave => $valores1) {
        if($valores1==="8"){
            $descripcion="";
        }
    }
}else if ($_POST["tipo"]==="gratuito") {
    $tipo2="Egratuito";
    $nombreT="el evento gratuito";
    $re = $client->getPerfilRol($_SESSION["id"],"20");
    $resultado = "".$re;
    $usuarios= explode(',',$resultado);
    foreach($usuarios as $llave => $valores1) {
        if($valores1==="8"){
            $descripcion="";
        }
    }
}else if ($_POST["tipo"]==="informativo") {
    $tipo2="Einformativo";
    $nombreT="el evento informativo";
    $re = $client->getPerfilRol($_SESSION["id"],"21");
    $resultado = "".$re;
    $usuarios= explode(',',$resultado);
    foreach($usuarios as $llave => $valores1) {
        if($valores1==="8"){
            $descripcion="";
        }
    }
}
foreach($historial as $llave => $valores) {
    $datos =explode(',,,',$valores);
    if (isset($datos[1])) {
        $id=$datos[0];
        $sinopsis=$datos[1];
        $descripcion2=$datos[2];
        if($descripcion2==""){
            $descripcion2="Para recibir el descuento de 3ra edad y/o discapacitados comunícate al 0991234567.";
        }
    }
} 

?>
<form role="form" class=" form-validation">
    <input type="text" name="Eid" id="Eid" class="esconder"  value="<?php echo $var1; ?>" disabled>
    <input type="text" name="tipo" id="Etipo" class="esconder"  value="<?php echo $tipo2; ?>" disabled> 
    <input type="text" name="nombreT" id="nombreT" class="esconder"  value="<?php echo $nombreT; ?>" disabled>
    <input type="text" name="nombreT" id="FnombreT" class="esconder"  value="<?php echo $FnombreT; ?>" disabled>
    <div class="page-editors">
        <div class="row">
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel-header panel-controls">
                            <h3 class><i class="fa fa-text-width"></i> <strong>Sinopsis</strong> </h3>
                        </div>
                        <textarea class="form-control" id="sinopsis" rows="18"><?php echo $sinopsis; ?></textarea>
                    </div>
                    <div class="col-md-12">
                        <div class="panel-header panel-controls">
                            <h3 class><i class="fa fa-text-width"></i> <strong>Información Adicional</strong> </h3>
                        </div>
                        <textarea class="form-control" id="descripcion2" rows="4"><?php echo $descripcion2; ?></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="btn-group">
                    <button class="crearFicha btn btn-sm btn-dark <?php echo $descripcion; ?>"  href="javascript:;"><i class="fa fa-plus"></i> Agregar Ficha Artística</button>
                </div>
                <div class="panel-header panel-controls">
                    <h3><i class="fa fa-text-width"></i> <strong>Ficha Artística</strong> </h3>     
                </div>
                <table class="table" data-table-name="Eventos Venta" id="table-editable3" >
                        <thead>
                            <tr>
                                <th class="esconder">Id</th>
                                <th>Titulo</th>
                                <th>Descripción</th>  
                                <th class="text-right">Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            foreach($fichas as $llave => $valores) {
                                $ficha =explode(',,,',$valores);
                                $estado="";
                                $estadoT="OFF";
                                if (isset($ficha[2])) {
                            ?>
                            <tr>
                                <td class="esconder" id="fila0ficha"> <?php if (isset($ficha[0])) {echo $ficha[0]; }  ?> </td>
                                <td> <?php if (isset($ficha[2])) {echo $ficha[2]; }  ?> </td>
                                <td> <?php if (isset($ficha[3])) {echo $ficha[3]; }  ?> </td>
                                <td class="text-right <?php echo $descripcion; ?>">
                                    <a class="editarFicha btn btn-sm btn-dark" style="margin: 5px;  "  href="javascript:;"><i class="icon-note"></i></a>
                                    <a class="deleteFicha btn btn-sm btn-danger" style="margin: 5px;  "  href="javascript:;"><i class="icon-trash"></i></a>
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
            <button type="submit" class="btn btn-embossed btn-danger editar_sinopsis <?php echo $descripcion; ?>" ><i class="fa fa-save"></i> Guardar</button>
            <button type="button" class="btn btn-embossed btn-default cancelar " data-dismiss="modal" aria-hidden="true">Salir</button>

        </div>     
    </div>
</form>