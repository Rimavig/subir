
<?php
include ("../../conect.php");
include ("../../autenticacion.php");
include ("../../directorio.php");

$re = $client->getAllInformacionTabla('boleteria');
$resultado= "".$re;
$boleteria =explode(';;;',$resultado);
$re = $client->getAllInformacionTabla('cafe');
$resultado= "".$re;
$cafe =explode(';;;',$resultado);
$re = $client->getAllInformacionTabla('whatsapp');
$resultado= "".$re;
$whatsapp =explode(';;;',$resultado);

$re = $client->getPerfilRol($_SESSION["id"],"51");
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
        <div class="panel">
            <div class="panel-content pagination2 table-responsive">
                <div class="btn-group  <?php echo $crear; ?>">
                    <button class="crearBoleteria btn btn-sm btn-dark "  href="javascript:;"><i class="fa fa-plus"></i> BOLETERÍA</button>
                </div>
                <table class="table" data-table-name="BOLETERÍA" id="table-boleteria" style="table-layout: fixed;">
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
                        foreach($boleteria as $llave => $valores) {
                            $pregunt =explode(',,,',$valores);
                            if (isset($pregunt[2])) {
                        ?>
                        <tr>
                            <td id="idObjetivo"><?php if (isset($pregunt[0])) {echo $pregunt[0]; }  ?></td>
                            <td> <?php if (isset($pregunt[3])) {echo $pregunt[3]; }  ?> </td>
                            <td> <?php if (isset($pregunt[1])) {echo $pregunt[1]; }  ?> </td>
                            <td> <?php if (isset($pregunt[2])) {echo $pregunt[2]; }  ?> </td>
                            <td class="text-right">
                                <a class="editarBoleteria btn btn-sm btn-dark <?php echo $editar; ?>" style="margin: 5px;  "  href="javascript:;"><i class="icon-note"></i></a>
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
                <div class="btn-group  <?php echo $crear; ?>">
                    <button class="crearCafe btn btn-sm btn-dark "  href="javascript:;"><i class="fa fa-plus"></i> CAFÉ VINO BAR</button>
                </div>
                <table class="table" data-table-name="CAFÉ VINO BAR" id="table-cafe" style="table-layout: fixed;">
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
                        foreach($cafe as $llave => $valores) {
                            $pregunt =explode(',,,',$valores);
                            if (isset($pregunt[2])) {
                        ?>
                        <tr>
                            <td id="idObjetivo"><?php if (isset($pregunt[0])) {echo $pregunt[0]; }  ?></td>
                            <td> <?php if (isset($pregunt[3])) {echo $pregunt[3]; }  ?> </td>
                            <td> <?php if (isset($pregunt[1])) {echo $pregunt[1]; }  ?> </td>
                            <td> <?php if (isset($pregunt[2])) {echo $pregunt[2]; }  ?> </td>
                            <td class="text-right">
                                <a class="editarCafe btn btn-sm btn-dark <?php echo $editar; ?>" style="margin: 5px;  "  href="javascript:;"><i class="icon-note"></i></a>
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
                <div class="btn-group  <?php echo $crear; ?>">
                    <button class="crearWhatsapp btn btn-sm btn-dark "  href="javascript:;"><i class="fa fa-plus"></i> WHATSAPP</button>
                </div>
                <table class="table" data-table-name="WHATSAPP" id="table-whatsapp" style="table-layout: fixed;">
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
                        foreach($whatsapp as $llave => $valores) {
                            $pregunt =explode(',,,',$valores);
                            if (isset($pregunt[2])) {
                        ?>
                        <tr>
                            <td id="idObjetivo"><?php if (isset($pregunt[0])) {echo $pregunt[0]; }  ?></td>
                            <td> <?php if (isset($pregunt[3])) {echo $pregunt[3]; }  ?> </td>
                            <td> <?php if (isset($pregunt[1])) {echo $pregunt[1]; }  ?> </td>
                            <td> <?php if (isset($pregunt[2])) {echo $pregunt[2]; }  ?> </td>
                            <td class="text-right">
                                <a class="editarWhatsapp btn btn-sm btn-dark <?php echo $editar; ?>" style="margin: 5px;  "  href="javascript:;"><i class="icon-note"></i></a>
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
<?php
$transport->close();
?>