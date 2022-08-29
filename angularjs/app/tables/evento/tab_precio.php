<?php
include ("../../conect.php");
include ("../../autenticacion.php");

$principal="";
$esconder="";

if (isset($_POST["var1"])) {
    $var1 = $_POST['var1'];
    $re = $client->getAllPlatea($var1);
    $resultado= "".$re;
    $Precios =explode(';;',$resultado);
    $re1 = $client->isPrincipal($var1);
    $resultado1= "".$re1;
    if($resultado1=="true"){
        $principal="true";
        $esconder="esconder";
    }else{
        $principal="false";
        $esconder="";
    }
}
$precios="hide";
if ($_POST["tipo"]==="venta") {
    $nombreT="el evento venta";
    $tipo2="Eventa";
    $re = $client->getPerfilRol($_SESSION["id"],"19");
    $resultado = "".$re;
    $usuarios= explode(',',$resultado);
    foreach($usuarios as $llave => $valores1) {
        if($valores1==="11"){
            $precios="";
        }
    }
}else if ($_POST["tipo"]==="gratuito") {
    $tipo2="Egratuito";
    $nombreT="el evento gratuito";
    $re = $client->getPerfilRol($_SESSION["id"],"20");
    $resultado = "".$re;
    $usuarios= explode(',',$resultado);
    foreach($usuarios as $llave => $valores1) {
        if($valores1==="11"){
            $precios="";
        }
    }
}else if ($_POST["tipo"]==="informativo") {
    $tipo2="Einformativo";
    $nombreT="el evento informativo";
    $esconder="";
    $re = $client->getPerfilRol($_SESSION["id"],"21");
    $resultado = "".$re;
    $usuarios= explode(',',$resultado);
    foreach($usuarios as $llave => $valores1) {
        if($valores1==="11"){
            $precios="";
        }
    }
}
//f-ficha
//fc-funcion
//P-PRECIO

$PnombreT="el precio";
?>
<div class="panel-content pagination2 table-responsive">
    <input type="text" name="Pid" id="Pid" class="esconder"  value="<?php echo $var1; ?>" disabled>
    <input type="text" name="nombreT" id="PnombreT" class="esconder"  value="<?php echo $PnombreT; ?>" disabled>
    <input type="text"  id="principal" class="esconder"  value="<?php echo $principal; ?>" disabled>
    <div class="m-b-20 <?php echo $precios; ?>">
        <div class="btn-group">
            <button class="crearPrecio <?php echo $esconder; ?>  btn btn-sm btn-dark "  href="javascript:;"><i class="fa fa-plus"></i> Agregar Precio</button>
        </div>
    </div>
    <table class="table" data-table-name="Precios" id="table-editable3" >
        <thead>
            <tr>
                <th class="esconder">id</th>
                <th>Nombre Platea</th>
                <th>Precio ($)</th>
                <th>Aforo </th>
                <th>Ticket/Vendidos</th>
                <th>Estado</th>
                <th class="text-right">Editar</th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach($Precios as $llave => $valores) {
                $precio =explode(',,,',$valores);
                $estado="";
                $estadoT="OFF";
                if (isset($precio[2])) {
            ?>
            <tr>
                <td class="esconder" id="fila0Precio"> <?php if (isset($precio[0])) {echo $precio[0]; }  ?> </td>
                <td> <?php if (isset($precio[1])) {echo $precio[1]; }  ?> </td>
                <td> <?php if (isset($precio[2])) {echo $precio[2]; }  ?> </td>
                <td> <?php if (isset($precio[3])) {echo $precio[3]; }  ?> </td>
                <td> <?php if (isset($precio[4])) {echo $precio[4]; }  ?> </td>
                <th>
                    <?php 
                        if ($precio[6]==="A" ) {
                            $estado="checked";
                            $estadoT="ON";
                        } 
                    ?> 
                    <div class="form-group">
                        <label class="switch switch-green">
                            <input type="checkbox" class="switch-input"  id="Pbox" <?php echo $estado; ?> disabled>
                            <span class="switch-label" data-on="On" data-off="Off"></span>
                            <span class="switch-handle"></span>
                            <span id="Pestado" class="esconder"><?php echo $estadoT; ?></span>
                        </label>
                    </div>
                </th>
                <td class="text-right <?php echo $precios; ?>">
                    <a class="editarPrecio btn btn-sm btn-dark" style="margin: 5px;"  href="javascript:;"><i class="icon-note"></i></a>
                    <a class="deletePrecio  btn btn-sm btn-danger" style="margin: 5px;"  href="javascript:;"><i class="icon-trash"></i></a>
                    <a class="estadoPrecio  btn btn-sm btn-blue" style="margin: 5px;"  style="margin: 0px;" href="javascript:;"><i class="icon-key"></i></a>
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