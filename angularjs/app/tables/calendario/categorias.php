
<?php
include ("../../conect.php");
include ("../../conect_dashboard.php");
include ("../../autenticacion.php");

$re = $client->getPerfilRol($_SESSION["id"],"74");
$resultado = "".$re;
$usuarios= explode(',',$resultado);
$crear="hide";
$exportar="no-descargar";
if($resultado==""){
    ?>
    <a ng-click="reload()">
    <?php
}
foreach($usuarios as $llave => $valores1) {
    if($valores1==="1"){
        $crear="";
    }
    if($valores1==="6"){
        $exportar="";
    }
}

$re = $client2->getGeneral("CalendarioC");
$resultado= "".$re;
$usuarios =explode(';;',$resultado);
?>
<br>
<p>Arrastra y suelta tu categoría o haz clic en el calendario</p>
<br>
<div data-toggle="modal" data-target="#modal-responsive">
    <a class="crear_categoria <?php echo $crear; ?>"><i class="icon-plus"></i> Crear Categoría</a>
</div>
<div style="overflow: scroll; max-height: 500px;">
<?php
    foreach($usuarios as $llave => $valores) {
        $usuario =explode(',,,',$valores);
        if (isset($usuario[1])) {
            if ($usuario[0]==="1") {
        ?>
            <div class="external-event <?php echo $usuario[2];?>" data-class="<?php echo $usuario[2];?>" style="position: relative; ">
                <i class="fa fa-move"></i><?php echo $usuario[1];?>
            </div>
        <?php 
            }else{
                ?>
                <div class="external-event <?php echo $usuario[2];?>" data-class="<?php echo $usuario[2];?>" style="position: relative; ">
                    <i class="fa fa-move"></i><a class="editar_categoria" id="<?php echo $usuario[0];?>" style="position: relative; color: white;" href="javascript:;"><?php echo $usuario[1];?></a>
                </div>
                <?php 
            }
        } 
    }     
?>
</div>
<?php
$transport->close();
$transport2->close();
?>