
<?php
include ("../../conect.php");
include ("../../autenticacion.php");
include ("../../directorio.php");

$re = $client->getAllInformacionWeb('amigos');
$resultado= "".$re;
$informacion =explode(';;',$resultado);
$quienesT="";
$quienes="";
$misionT="";
$mision="";
$visionT="";
$vision="";
foreach($informacion as $llave => $valores) {
    $datos =explode(',,,',$valores);
    if (isset($datos[1])) {
        if($datos[0]==="8"){
            $quienesT=$datos[1];
            $quienes=$datos[2];
        }
    }   
}
$re = $client->getAllInformacionTabla('amigos');
$resultado= "".$re;
$beneficios =explode(';;',$resultado);
$re = $client->getAllInformacionTabla('amigos_preguntas');
$resultado= "".$re;
$instalaciones =explode(';;',$resultado);

$re = $client->getPerfilRol($_SESSION["id"],"50");
$resultado = "".$re;
$usuarios= explode(',',$resultado);
$crear="hide";
$editar="hide";
$eliminar="hide";
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
    if($valores1==="2"){
        $editar="";
    }
    if($valores1==="3"){
        $eliminar="";
    }
}
?>

<div class="row " >
    <div class="col-md-12"> 
        <div class="panel-header panel-controls">
            <div class="col-md-12">
                <textarea class="form-control" id="amigosInfo" rows="10"><?php echo $quienes; ?></textarea>
                <div class="modal-footer text-center">
                    <button type="submit" class="btn btn-embossed btn-danger guardarAmigos <?php echo $editar; ?>" ><i class="fa fa-save"></i> Guardar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12"> 
        <div class="panel">
            <div class="panel-content pagination2 table-responsive">
                <div class="btn-group <?php echo $crear; ?>">
                    <button class="crearBeneficio btn btn-sm btn-dark "  href="javascript:;"><i class="fa fa-plus"></i> Beneficios</button>
                </div>
                <table class="table" data-table-name=" RBeneficios" id="table-beneficios" style="table-layout: fixed;">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Imagen (324x160)</th>
                            <th>Orden </th>
                            <th>Título </th>
                            <th>Descripción</th>
                            <th class="text-right">Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach($beneficios as $llave => $valores) {
                            $pregunt =explode(',,,',$valores);
                            if (isset($pregunt[2])) {
                            ?>
                            <tr>
                                <td id="idObjetivo"><?php if (isset($pregunt[0])) {echo $pregunt[0]; }  ?></td>
                                <td> <img src='<?php echo $intalacionesI.$pregunt[0].".png?nocache=".time();?>' class="img-responsive" alt="gallery 3"></td>
                                <td> <?php if (isset($pregunt[3])) {echo $pregunt[3]; }  ?> </td>
                                <td> <?php if (isset($pregunt[1])) {echo $pregunt[1]; }  ?> </td>
                                <td> <?php if (isset($pregunt[2])) {echo $pregunt[2]; }  ?> </td>
                                <td class="text-right">
                                    <a class="editarBeneficio btn btn-sm btn-dark <?php echo $editar; ?>" style="margin: 5px;  "  href="javascript:;"><i class="icon-note"></i></a>
                                    <a class="eliminarTabla btn btn-sm btn-danger  <?php echo $eliminar; ?>" style="margin: 5px;  "  href="javascript:;"><i class="icon-trash"></i></a>
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
    </div>
    <div class="col-md-12"> 
        <div class="panel">
            <div class="panel-content pagination2 table-responsive">
                <div class="btn-group <?php echo $crear; ?>">
                    <button class="crearPreguntaA btn btn-sm btn-dark "  href="javascript:;"><i class="fa fa-plus"></i> Preguntas Frecuentes</button>
                </div>
                <table class="table" data-table-name="Preguntas Frecuentes" id="table-preguntasA" style="table-layout: fixed;">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Orden </th>
                            <th>Título </th>
                            <th>Descripción</th>
                            <th class="text-right">Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach($instalaciones as $llave => $valores) {
                            $pregunt =explode(',,,',$valores);
                            if (isset($pregunt[2])) {
                            ?>
                            <tr>
                                <td id="idObjetivo"><?php if (isset($pregunt[0])) {echo $pregunt[0]; }  ?></td>
                                <td> <?php if (isset($pregunt[3])) {echo $pregunt[3]; }  ?> </td>
                                <td> <?php if (isset($pregunt[1])) {echo $pregunt[1]; }  ?> </td>
                                <td> <?php if (isset($pregunt[2])) {echo $pregunt[2]; }  ?> </td>
                                <td class="text-right">
                                    <a class="editarPreguntaA btn btn-sm btn-dark <?php echo $editar; ?>" style="margin: 5px;  "  href="javascript:;"><i class="icon-note"></i></a>
                                    <a class="eliminarTabla btn btn-sm btn-danger  <?php echo $eliminar; ?>" style="margin: 5px;  "  href="javascript:;"><i class="icon-trash"></i></a>
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
    </div>
</div>