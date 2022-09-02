<?php
include ("../../conect.php");
include ("../../autenticacion.php");
if (isset($_POST["var1"])) {
    $var1 = $_POST['var1'];
    $re = $client->getAllFuncion($var1,"G");
    $resultado= "".$re;
    $funciones =explode(';;',$resultado);
}
$funcione="hide";
if ($_POST["tipo"]==="venta") {
    $nombreT="el evento venta";
    $tipo2="Eventa";
    $re = $client->getPerfilRol($_SESSION["id"],"19");
    $resultado = "".$re;
    $usuarios= explode(',',$resultado);
    foreach($usuarios as $llave => $valores1) {
        if($valores1==="10"){
            $funcione="";
        }
    }
}else if ($_POST["tipo"]==="gratuito") {
    $tipo2="Egratuito";
    $nombreT="el evento gratuito";
    $re = $client->getPerfilRol($_SESSION["id"],"20");
    $resultado = "".$re;
    $usuarios= explode(',',$resultado);
    foreach($usuarios as $llave => $valores1) {
        if($valores1==="10"){
            $funcione="";
        }
    }
}else if ($_POST["tipo"]==="informativo") {
    $tipo2="Einformativo";
    $nombreT="el evento informativo";
    $esconder="";
    $re = $client->getPerfilRol($_SESSION["id"],"19");
    $resultado = "".$re;
    $usuarios= explode(',',$resultado);
    foreach($usuarios as $llave => $valores1) {
        if($valores1==="10"){
            $funcione="";
        }
    }
}
//f-ficha
//fc-funcion
$FCnombreT="la función";
?>
<div class="panel-content pagination2 table-responsive">
    <input type="text" name="FCid" id="FCid" class="esconder"  value="<?php echo $var1; ?>" disabled>
    <input type="text" name="nombreT" id="FCnombreT" class="esconder"  value="<?php echo $FCnombreT; ?>" disabled>
    <div class="m-b-20 <?php echo $funcione; ?>">
        <div class="btn-group">
            <button class="crearFuncion  btn btn-sm btn-dark "  href="javascript:;"><i class="fa fa-plus"></i> Agregar Función</button>
        </div>
    </div>
    <table class="table" data-table-name="Funciones" id="table-editable3" >
        <thead>
            <tr>
                <th class="esconder">id</th>
                <th>Fecha</th>
                <th>Aforo</th>
                <th>Ticket/Vendidos</th>
                <th>Estado</th>
                <th class="text-right">Editar</th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach($funciones as $llave => $valores) {
                $funcion =explode(',,,',$valores);
                $estado="";
                $estadoT="OFF";
                if (isset($funcion[2])) {
            ?>
            <tr>
                <td class="esconder" id="fila0funcion"> <?php if (isset($funcion[0])) {echo $funcion[0]; }  ?> </td>
                <td> <?php if (isset($funcion[1])) {echo $funcion[1]; }  ?> </td>
                <td> <?php if (isset($funcion[2])) {echo $funcion[2]; }  ?> </td>
                <td> <?php if (isset($funcion[3])) {echo $funcion[3]; }  ?> </td>
                <th>
                    <?php 
                        if ($funcion[6]==="A" ) {
                            $estado="checked";
                            $estadoT="ON";
                        } 
                    ?> 
                    <div class="form-group">
                        <label class="switch switch-green">
                            <input type="checkbox" class="switch-input"  id="Fbox" <?php echo $estado; ?> disabled>
                            <span class="switch-label" data-on="On" data-off="Off"></span>
                            <span class="switch-handle"></span>
                            <span id="Festado" class="esconder"><?php echo $estadoT; ?></span>
                        </label>
                    </div>
                </th>
                <td class="text-right <?php echo $funcione; ?>">
                    <a class="editarFuncion btn btn-sm btn-dark" style="margin: 5px;"  href="javascript:;"><i class="icon-note"></i></a>
                    <a class="deleteFuncion btn btn-sm btn-danger" style="margin: 5px;"  href="javascript:;"><i class="icon-trash"></i></a>
                    <a class="estadoFuncion btn btn-sm btn-blue" style="margin: 5px;"  style="margin: 0px;" href="javascript:;"><i class="icon-key"></i></a>
                </td>
            </tr>
            <?php
                }
            }
            ?> 
            
        </tbody>
    </table>
    <div class="modal-footer text-center">
        <button type="button" class="btn btn-embossed btn-default cancelar " data-dismiss="modal" aria-hidden="true">Salir</button>
    </div> 
</div>