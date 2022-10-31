<?php
include ("../../conect.php");
include ("../../autenticacion.php");
$lista=array("EV","EG","EI","EB","EVD");
foreach($lista as $llave => $valores) {
    ${"crear".$valores}="";
    ${"editar".$valores}="";
    ${"eliminar".$valores}="";
    ${"estado".$valores}="";
    ${"exportar".$valores}="";
    ${"bloquear".$valores}="";
    ${"cortesia".$valores}="";
    ${"informacion".$valores}="";
    ${"descripcion".$valores}="";
    ${"multimedia".$valores}="";
    ${"funciones".$valores}="";
    ${"precios".$valores}="";
}
$escon="";
if (isset($_POST["var1"])) {
    $var1 = $_POST['var1'];
    $re = $client->getPerfil($var1);
    $resultado = "".$re;
    $usuarios= explode(';;',$resultado);
    foreach($usuarios as $llave => $valores) {
        $usuario =explode(':',$valores);
        $tipo=""; 
        if (isset($usuario[1])) {
            if($usuario[0]==="19"){
                $tipo="EV";
            }
            if($usuario[0]==="20"){
                $tipo="EG";
            }
            if($usuario[0]==="21"){
                $tipo="EI";
            }
            if($usuario[0]==="22"){
                $tipo="EB";
            }
            if($usuario[0]==="27"){
                $tipo="EVD";
            }
            if($tipo!=""){
                $accion =explode(',',$usuario[1]);
                foreach($accion as $llave => $valores1) {
                    if($valores1==="1"){
                        ${"crear".$tipo}="checked";
                    }
                    if($valores1==="2"){
                        ${"editar".$tipo}="checked";
                    }
                    if($valores1==="3"){
                        ${"eliminar".$tipo}="checked";
                    }
                    if($valores1==="4"){
                        ${"reset".$tipo}="checked";
                    }
                    if($valores1==="5"){
                        ${"estado".$tipo}="checked";
                    }
                    if($valores1==="6"){
                        ${"exportar".$tipo}="checked";
                    }
                    if($valores1==="7"){
                        ${"informacion".$tipo}="checked";
                    }
                    if($valores1==="8"){
                        ${"descripcion".$tipo}="checked";
                    }
                    if($valores1==="9"){
                        ${"multimedia".$tipo}="checked";
                    }
                    if($valores1==="10"){
                        ${"funciones".$tipo}="checked";
                    }
                    if($valores1==="11"){
                        ${"precios".$tipo}="checked";
                    }
                    if($valores1==="12"){
                        ${"bloquear".$tipo}="checked";
                    }
                    if($valores1==="13"){
                        ${"bloquear".$tipo}="checked";
                    }
                    if($valores1==="14"){
                        ${"cortesia".$tipo}="checked";
                    }
                    if($valores1==="15"){
                        ${"facturacion".$tipo}="checked";
                    }
                    
                }  
            }
               
        }   
    } 
}else{
    $escon="hide";
}
?>
<div class="panel-body">
    <div class="row"> 
        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
            <div class="form-group">
                <p><label><input type="checkbox" class="Tventa" id="Tventa" data-checkbox="icheckbox_minimal-red"><strong>VENTA</strong></p>
                <div class="input-group">
                    <div class="icheck-list">
                        <label><input type="checkbox" id="exportarEV"  <?php echo $exportarEV; ?>  data-checkbox="icheckbox_flat-blue"> Exportar</label>
                        <label><input type="checkbox" id="crearEV"  <?php echo $crearEV; ?>  data-checkbox="icheckbox_flat-blue"> Crear</label>
                        <label><input type="checkbox" id="editarEV"  <?php echo $editarEV; ?>  data-checkbox="icheckbox_flat-blue"> Editar</label>
                        <label class="esconderEV <?php echo $escon; ?>"><input type="checkbox" id="informacionEV"  <?php echo $informacionEV; ?>  data-checkbox="icheckbox_minimal-blue"> Información</label>
                        <label class="esconderEV <?php echo $escon; ?>"><input type="checkbox" id="descripcionEV"  <?php echo $descripcionEV; ?>  data-checkbox="icheckbox_minimal-blue"> Descripción</label>
                        <label class="esconderEV <?php echo $escon; ?>"><input type="checkbox" id="multimediaEV"  <?php echo $multimediaEV; ?>  data-checkbox="icheckbox_minimal-blue"> Multimedia</label>
                        <label class="esconderEV <?php echo $escon; ?>"><input type="checkbox" id="funcionesEV"  <?php echo $funcionesEV; ?>  data-checkbox="icheckbox_minimal-blue"> Funciones</label>
                        <label class="esconderEV <?php echo $escon; ?>"><input type="checkbox" id="preciosEV"  <?php echo $preciosEV; ?>  data-checkbox="icheckbox_minimal-blue"> Precios</label>
                        <label> <input type="checkbox" id="eliminarEV"  <?php echo $eliminarEV; ?>  data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                        <label> <input type="checkbox" id="estadoEV"  <?php echo $estadoEV; ?>  data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                    </div>
                </div>
            </div>       
        </div>
        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
            <div class="form-group">
                <p><label><input type="checkbox" class="Tgratuito" id="Tgratuito" data-checkbox="icheckbox_minimal-red"><strong>GRATUITO</strong></p>
                <div class="input-group">
                    <div class="icheck-list">
                        <label><input type="checkbox" id="exportarEG" <?php echo $exportarEG; ?> data-checkbox="icheckbox_flat-blue"> Exportar</label>
                        <label><input type="checkbox" id="crearEG" <?php echo $crearEG; ?> data-checkbox="icheckbox_flat-blue"> Crear</label>
                        <label><input type="checkbox" id="editarEG" <?php echo $editarEG; ?> data-checkbox="icheckbox_flat-blue"> Editar</label>
                        <label class="esconderEG <?php echo $escon; ?>"><input type="checkbox" id="informacionEG" <?php echo $informacionEG; ?> data-checkbox="icheckbox_minimal-blue"> Información</label>
                        <label class="esconderEG <?php echo $escon; ?>"><input type="checkbox" id="descripcionEG" <?php echo $descripcionEG; ?> data-checkbox="icheckbox_minimal-blue"> Descripción</label>
                        <label class="esconderEG <?php echo $escon; ?>"><input type="checkbox" id="multimediaEG" <?php echo $multimediaEG; ?> data-checkbox="icheckbox_minimal-blue"> Multimedia</label>
                        <label class="esconderEG <?php echo $escon; ?>"><input type="checkbox" id="funcionesEG" <?php echo $funcionesEG; ?> data-checkbox="icheckbox_minimal-blue"> Funciones</label>
                        <label> <input type="checkbox" id="eliminarEG" <?php echo $eliminarEG; ?> data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                        <label> <input type="checkbox" id="estadoEG" <?php echo $estadoEG; ?> data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                    </div>
                </div>
            </div>       
        </div>
        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
            <div class="form-group">
                <p><label><input type="checkbox" class="Tinformativo" id="Tinformativo" data-checkbox="icheckbox_minimal-red"><strong>INFORMATIVO</strong></p>
                <div class="input-group">
                    <div class="icheck-list">
                        <label><input type="checkbox" id="exportarEI" <?php echo $exportarEI; ?> data-checkbox="icheckbox_flat-blue"> Exportar</label>
                        <label><input type="checkbox" id="crearEI" <?php echo $crearEI; ?> data-checkbox="icheckbox_flat-blue"> Crear</label>
                        <label><input type="checkbox" id="editarEI" <?php echo $editarEI; ?> data-checkbox="icheckbox_flat-blue"> Editar</label>
                        <label class="esconderEI <?php echo $escon; ?>"><input type="checkbox" id="informacionEI" <?php echo $informacionEI; ?> data-checkbox="icheckbox_minimal-blue"> Información</label>
                        <label class="esconderEI <?php echo $escon; ?>"><input type="checkbox" id="descripcionEI" <?php echo $descripcionEI; ?> data-checkbox="icheckbox_minimal-blue"> Descripción</label>
                        <label class="esconderEI <?php echo $escon; ?>"><input type="checkbox" id="multimediaEI" <?php echo $multimediaEI; ?> data-checkbox="icheckbox_minimal-blue"> Multimedia</label>
                        <label> <input type="checkbox" id="eliminarEI" <?php echo $eliminarEI; ?> data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                        <label> <input type="checkbox" id="estadoEI" <?php echo $estadoEI; ?> data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                    </div>
                </div>
            </div>       
        </div>
        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
            <div class="form-group">
                <p><label><input type="checkbox" class="Tbloqueos" id="Tbloqueos" data-checkbox="icheckbox_minimal-red"><strong>BLOQUEADOS</strong></p>
                <div class="input-group">
                    <div class="icheck-list">
                        <label><input type="checkbox" id="exportarEB" <?php echo $exportarEB; ?> data-checkbox="icheckbox_flat-blue"> Exportar</label>
                        <label> <input type="checkbox" id="estadoEB" <?php echo $estadoEB; ?> data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                    </div>
                </div>
            </div>       
        </div>
        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
            <div class="form-group">
                <p><label><input type="checkbox" class="TventaDestacado" id="TventaDestacado" data-checkbox="icheckbox_minimal-red"><strong>EVENTO DESTACADO</strong></p>
                <div class="input-group">
                    <div class="icheck-list">
                        <label><input type="checkbox" id="editarEVD" <?php echo $editarEVD; ?> data-checkbox="icheckbox_flat-blue"> Editar</label>
                    </div>
                </div>
            </div>       
        </div>
    </div>
</div>