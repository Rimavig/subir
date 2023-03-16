<?php
include ("../../conect.php");
include ("../../autenticacion.php");
$re = $client->getAllCategoria();
$resultado= "".$re;
$usuarios =explode(';;',$resultado);
$tipo="Categoria";
$nombreT="la categoría";
$tipo2="categoria";
?>
<thead>
    <tr>
        <th>Id</th>
        <th>Nombres</th>
        <th>Orden</th>
        <th>Estado</th>
        <th class="text-right">Editar</th>
    </tr>
</thead>
<tbody >
<?php
    foreach($usuarios as $llave => $valores) {
        $usuario =explode(',,,',$valores);
        $estado="";
        $estadoT="OFF";
        if (isset($usuario[1]) ) {
            if (trim($usuario[1]) !="No aplica" ) {
    ?>
    <tr>
        <td id="fila0"> <?php if (isset($usuario[0])) {echo $usuario[0]; }  ?> </td>
        <td> <?php if (isset($usuario[1])) {echo $usuario[1]; }  ?> </td>
        <td> <?php if (isset($usuario[2])) {echo $usuario[2]; }  ?> </td>
        <th>
            <?php 
                if ($usuario[3]==="A" ) {
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
        </th>
        <td class="text-right">
            <a class="editar btn btn-sm btn-dark" style="margin: 5px;"  href="javascript:;"><i class="icon-note"></i></a>
            <a class="delete btn btn-sm btn-danger" style="margin: 5px;"  href="javascript:;"><i class="icon-trash"></i></a>
            <a class="estado btn btn-sm btn-blue" style="margin: 5px;" href="javascript:;"><i class="icon-key"></i></a>
        </td>
    </tr>
    <?php
        }}
    }
    $transport->close();
    ?>
</tbody>
<?php
$transport->close();
?>