
<?php
include ("../../conect.php");
include ("../../autenticacion.php");
include ("../../directorio.php");

$re = $client->getAllInformacionWeb('teatro');
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
        if($datos[0]==="1"){
            $quienesT=$datos[1];
            $quienes=$datos[2];
        }
        if($datos[0]==="2"){
            $misionT=$datos[1];
            $mision=$datos[2];
        }
        if($datos[0]==="3"){
            $visionT=$datos[1];
            $vision=$datos[2];
        }
    }   
}
$re = $client->getAllInformacionTabla('objetivos');
$resultado= "".$re;
$objetivos =explode(';;;',$resultado);

$re = $client->getPerfilRol($_SESSION["id"],"33");
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
                <div class="col-md-3"> 
                    <div style="margin-top: 5px!important; text-align:center;" class="fileinput fileinput-new" data-provides="fileinput">
                        <p  style="margin-top: 5px!important; text-align:center;"><strong>Imagen (307 x 365)</strong></p>
                        <div class="fileinput-new thumbnail">
                            <img id="quienes_somosI" data-src="" src='<?php  echo $quienes_somosI."?nocache=".time();?>' class="img-responsive" alt="NO IMAGEN">
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail Equienes_somosI"></div>
                        <div   class="<?php echo $editar; ?>" style="margin-top: 5px!important; text-align:center;">
                            <span class="btn btn-default btn-file">
                            <span class="fileinput-new">Editar Imagen</span>
                            <span class="fileinput-exists">Cambiar</span>
                                <input type="file" id="archivoC" accept="image/png" name="...">
                            </span>
                            <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Eliminar</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <p  style="margin-top: 5px!important; text-align:center;"><strong>Quiénes Somos</strong></p>
                    <textarea class="form-control" id="quienesInfo" rows="20"><?php echo $quienes; ?></textarea>
                    <div class="modal-footer text-center">
                        <button type="submit" class="btn btn-embossed btn-danger guardarQuienes <?php echo $editar; ?>" ><i class="fa fa-save"></i> Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6"> 
        <div class="panel-content pagination2 table-responsive">
            <div class="col-md-12"> 
                <div style="margin-top: 5px!important; text-align:center;" class="fileinput fileinput-new" data-provides="fileinput">
                    <p  style="margin-top: 5px!important; text-align:center;"><strong><?php echo $misionT; ?> (Imagen 482 x 288)</strong></p>

                    <div class="fileinput-new thumbnail">
                        <img id="misionI" data-src="" src='<?php  echo $misionI."?nocache=".time();; ?>' class="img-responsive" alt="NO IMAGEN">
                    </div>
                    <div class="fileinput-preview fileinput-exists thumbnail EmisionI"></div>
                    <textarea class="form-control" id="misionInfo" rows="10"><?php echo $mision; ?></textarea>
                    <div  class="<?php echo $editar; ?>" style="margin-top: 5px!important; text-align:center;" >
                        <button type="submit" class="btn btn-embossed btn-danger guardarMisionT <?php echo $editar; ?>" ><i class="fa fa-save"></i> Guardar</button>
                        <span class="btn btn-default btn-file">
                        <span class="fileinput-new">Editar Imagen</span>
                        <span class="fileinput-exists">Cambiar</span>
                            <input type="file" id="archivoC" accept="image/png" name="...">
                        </span>
                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Eliminar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6"> 
        <div class="panel-content pagination2 table-responsive">
            <div class="col-md-12"> 
                <div style="margin-top: 5px!important; text-align:center;" class="fileinput fileinput-new" data-provides="fileinput">
                    <p  style="margin-top: 5px!important; text-align:center;"><strong><?php echo $visionT; ?> (Imagen 482 x 288)</strong></p>

                    <div class="fileinput-new thumbnail">
                        <img id="visionI" data-src="" src='<?php  echo $visionI."?nocache=".time();; ?>' class="img-responsive" alt="NO IMAGEN">
                    </div>
                    <div class="fileinput-preview fileinput-exists thumbnail EvisionI"></div>
                    <textarea class="form-control" id="visionInfo" rows="10"><?php echo $vision; ?></textarea>
                    <div  class="<?php echo $editar; ?>" style="margin-top: 5px!important; text-align:center;" >
                        <button type="submit" class="btn btn-embossed btn-danger guardarVisionT <?php echo $editar; ?>" ><i class="fa fa-save"></i> Guardar</button>
                        <span class="btn btn-default btn-file">
                        <span class="fileinput-new <?php echo $editar; ?>">Editar Imagen</span>
                        <span class="fileinput-exists">Cambiar</span>
                            <input type="file" id="archivoC" accept="image/png" name="...">
                        </span>
                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Eliminar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12"> 
        <div class="panel">
            <div class="panel-content pagination2 table-responsive">
                <div class="btn-group  <?php echo $crear; ?>">
                    <button class="crearObjetivo btn btn-sm btn-dark "  href="javascript:;"><i class="fa fa-plus"></i> Objetivos</button>
                </div>
                <table class="table" data-table-name="Objetivos" id="table-objetivos" style="table-layout: fixed;">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Objetivos</th>
                            <th>Orden </th>
                            <th>Estado </th>
                            <th class="text-right">Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach($objetivos as $llave => $valores) {
                            $pregunt =explode(',,,',$valores);
                            if (isset($pregunt[1])) {
                        ?>
                        <tr>
                            <td id="idObjetivo"> <?php if (isset($pregunt[0])) {echo $pregunt[0]; }  ?> </td>
                            <td> <?php if (isset($pregunt[2])) {echo $pregunt[2]; }  ?> </td>
                            <td> <?php if (isset($pregunt[3])) {echo $pregunt[3]; }  ?> </td>
                            <td>
                                <?php 
                                    $estado="";
                                    $estadoT="OFF";
                                    if ($pregunt[4]==="A" ) {
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
                                <a class="editarObjetivo btn btn-sm btn-dark <?php echo $editar; ?>" style="margin: 5px;  "  href="javascript:;"><i class="icon-note"></i></a>
                                <a class="estadoInstalacion btn btn-sm btn-warning  <?php echo $editar; ?>" style="margin: 5px 0px;" href="javascript:;"><i class="icon-lock"></i></a>
                                <a class="eliminarTabla btn btn-sm btn-danger <?php echo $eliminar; ?>" style="margin: 5px;  "  href="javascript:;"><i class="icon-trash"></i></a>
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
        <div class="panel-header panel-controls">
            <div class="col-md-12"> 
                <div style="margin-top: 5px!important; text-align:center;" class="fileinput fileinput-new" data-provides="fileinput">
                    <p  style="margin-top: 5px!important; text-align:center;"><strong>(Imagen 1366 x 230)</strong></p>
                    <div class="fileinput-new thumbnail">
                        <img id="sobre_nosotrosI" data-src="" src='<?php  echo $sobre_nosotrosI."?nocache=".time();; ?>' class="img-responsive" alt="NO IMAGEN">
                    </div>
                    <div class="fileinput-preview fileinput-exists thumbnail Esobre_nosotrosI"></div>
                    <div class="<?php echo $editar; ?>" style="margin-top: 5px!important; text-align:center;">
                        <button type="submit" class="btn btn-embossed btn-danger guardarNosotrosT <?php echo $editar; ?>" ><i class="fa fa-save"></i> Guardar</button>
                        <span class="btn btn-default btn-file">
                        <span class="fileinput-new <?php echo $editar; ?>">Editar Imagen</span>
                        <span class="fileinput-exists">Cambiar</span>
                            <input type="file" id="archivoC" accept="image/png" name="...">
                        </span>
                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Eliminar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$transport->close();
?>