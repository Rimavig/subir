<?php
include ("../../conect.php");
include ("../../autenticacion.php");
$lista=array("MC","MCL","ME","MP","MTE","MSL","MPR","MPM","MDP","MDE");
foreach($lista as $llave => $valores) {
    ${"crear".$valores}="";
    ${"editar".$valores}="";
    ${"eliminar".$valores}="";
    ${"estado".$valores}="";
    ${"exportar".$valores}="";
    ${"reset".$valores}="";
    ${"facturacion".$valores}="";
}

if (isset($_POST["var1"])) {
    $var1 = $_POST['var1'];
    $re = $client->getPerfil($var1);
    $resultado = "".$re;
    $usuarios= explode(';;',$resultado);
    foreach($usuarios as $llave => $valores) {
        $usuario =explode(':',$valores);
        $tipo=""; 
        if (isset($usuario[1])) {
            if($usuario[0]==="5"){
                $tipo="MC";
            }
            if($usuario[0]==="6"){
                $tipo="MCL";
            }
            if($usuario[0]==="7"){
                $tipo="ME";
            }
            if($usuario[0]==="8"){
                $tipo="MP";
            }
            if($usuario[0]==="9"){
                $tipo="MTE";
            }
            if($usuario[0]==="10"){
                $tipo="MSL";
            }
            if($usuario[0]==="11"){
                $tipo="MPR";
            }
            if($usuario[0]==="12"){
                $tipo="MPM";
            }
            if($usuario[0]==="13"){
                $tipo="MDP";
            }
            if($usuario[0]==="14"){
                $tipo="MDE";
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
                    if($valores1==="15"){
                        ${"facturacion".$tipo}="checked";
                    }
                }   
            }
             
        }   
    } 
}
?>
<div class="panel-body">
<div class="row">  
    <div class="col-md-2 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
        <div class="form-group">
            <p><label><input type="checkbox" class="Tcategoria" id="Tcategoria" data-checkbox="icheckbox_minimal-red"><strong>CATEGORIA</strong></p>
            <div class="input-group">
                <div class="icheck-list">
                    <label><input type="checkbox" id="exportarMC" <?php echo $exportarMC; ?> data-checkbox="icheckbox_flat-blue"> Exportar</label>
                    <label><input type="checkbox" id="crearMC" <?php echo $crearMC; ?> data-checkbox="icheckbox_flat-blue"> Crear</label>
                    <label><input type="checkbox" id="editarMC" <?php echo $editarMC; ?> data-checkbox="icheckbox_flat-blue"> Editar</label>
                    <label> <input type="checkbox" id="eliminarMC" <?php echo $eliminarMC; ?> data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                    <label> <input type="checkbox" id="estadoMC" <?php echo $estadoMC; ?> data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                </div>
            </div>
        </div>       
    </div>
    <div class="col-md-2 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
        <div class="form-group">
            <p><label><input type="checkbox" class="Tclasificacion" id="Tclasificacion" data-checkbox="icheckbox_minimal-red"><strong>CLASIFICACIÓN</strong></p>
            <div class="input-group">
                <div class="icheck-list">
                    <label><input type="checkbox" id="exportarMCL" <?php echo $exportarMCL; ?> data-checkbox="icheckbox_flat-blue"> Exportar</label>
                    <label><input type="checkbox" id="crearMCL" <?php echo $crearMCL; ?> data-checkbox="icheckbox_flat-blue"> Crear</label>
                    <label><input type="checkbox" id="editarMCL" <?php echo $editarMCL; ?> data-checkbox="icheckbox_flat-blue"> Editar</label>
                    <label> <input type="checkbox" id="eliminarMCL" <?php echo $eliminarMCL; ?> data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                    <label> <input type="checkbox" id="estadoMCL" <?php echo $estadoMCL; ?> data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                </div>
            </div>
        </div>       
    </div>
    <div class="col-md-2 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
        <div class="form-group">
            <p><label><input type="checkbox" class="Tespectaculo" id="Tespectaculo" data-checkbox="icheckbox_minimal-red"><strong>ESPECTÁCULO</strong></p>
            <div class="input-group">
                <div class="icheck-list">
                    <label><input type="checkbox" id="exportarME" <?php echo $exportarME; ?> data-checkbox="icheckbox_flat-blue"> Exportar</label>
                    <label><input type="checkbox" id="crearME" <?php echo $crearME; ?> data-checkbox="icheckbox_flat-blue"> Crear</label>
                    <label><input type="checkbox" id="editarME" <?php echo $editarME; ?> data-checkbox="icheckbox_flat-blue"> Editar</label>
                    <label> <input type="checkbox" id="eliminarME" <?php echo $eliminarME; ?> data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                    <label> <input type="checkbox" id="estadoME" <?php echo $estadoME; ?> data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                </div>
            </div>
        </div>       
    </div>
    <div class="col-md-2 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
        <div class="form-group">
            <p><label><input type="checkbox" class="Tprocedencia" id="Tprocedencia" data-checkbox="icheckbox_minimal-red"><strong>PROCEDENCIA</strong></p>
            <div class="input-group">
                <div class="icheck-list">
                    <label><input type="checkbox" id="exportarMP" <?php echo $exportarMP; ?> data-checkbox="icheckbox_flat-blue"> Exportar</label>
                    <label><input type="checkbox" id="crearMP" <?php echo $crearMP; ?> data-checkbox="icheckbox_flat-blue"> Crear</label>
                    <label><input type="checkbox" id="editarMP" <?php echo $editarMP; ?> data-checkbox="icheckbox_flat-blue"> Editar</label>
                    <label> <input type="checkbox" id="eliminarMP" <?php echo $eliminarMP; ?> data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                    <label> <input type="checkbox" id="estadoMP" <?php echo $estadoMP; ?> data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                </div>
            </div>
        </div>       
    </div>
    <div class="col-md-2 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
        <div class="form-group">
            <p><label><input type="checkbox" class="TtipoEvento" id="TtipoEvento" data-checkbox="icheckbox_minimal-red"><strong>TIPO DE EVENTO</strong></p>
            <div class="input-group">
                <div class="icheck-list">
                    <label><input type="checkbox" id="exportarMTE" <?php echo $exportarMTE; ?> data-checkbox="icheckbox_flat-blue"> Exportar</label>
                    <label><input type="checkbox" id="crearMTE" <?php echo $crearMTE; ?> data-checkbox="icheckbox_flat-blue"> Crear</label>
                    <label><input type="checkbox" id="editarMTE" <?php echo $editarMTE; ?> data-checkbox="icheckbox_flat-blue"> Editar</label>
                    <label> <input type="checkbox" id="eliminarMTE" <?php echo $eliminarMTE; ?> data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                    <label> <input type="checkbox" id="estadoMTE" <?php echo $estadoMTE; ?> data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                </div>
            </div>
        </div>       
    </div>
    
    <div class="col-md-2 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
        <div class="form-group">
            <p><label><input type="checkbox" class="Tpromocion" id="Tpromocion" data-checkbox="icheckbox_minimal-red"><strong>PROMOCIÓN</strong></p>
            <div class="input-group">
                <div class="icheck-list">
                    <label><input type="checkbox" id="exportarMPM" <?php echo $exportarMPM; ?> data-checkbox="icheckbox_flat-blue"> Exportar</label>
                    <label><input type="checkbox" id="crearMPM" <?php echo $crearMPM; ?> data-checkbox="icheckbox_flat-blue"> Crear</label>
                    <label><input type="checkbox" id="editarMPM" <?php echo $editarMPM; ?> data-checkbox="icheckbox_flat-blue"> Editar</label>
                    <label> <input type="checkbox" id="eliminarMPM" <?php echo $eliminarMPM; ?> data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                    <label> <input type="checkbox" id="estadoMPM" <?php echo $estadoMPM; ?> data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                </div>
            </div>
        </div>       
    </div>
</div>
<div class="row">  
    <div class="col-md-2 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
        <div class="form-group">
            <p><label><input type="checkbox" class="TdistribucionP" id="TdistribucionP" data-checkbox="icheckbox_minimal-red"><strong>DISTRIBUCIÓN PRINCIPAL</strong></p>
            <div class="input-group">
                <div class="icheck-list">
                <label><input type="checkbox" id="exportarMDP" <?php echo $exportarMDP; ?>  data-checkbox="icheckbox_flat-blue"> Exportar</label>
                    <label><input type="checkbox" id="crearMDP" <?php echo $crearMDP; ?>  data-checkbox="icheckbox_flat-blue"> Crear</label>
                    <label><input type="checkbox" id="editarMDP" <?php echo $editarMDP; ?>  data-checkbox="icheckbox_flat-blue"> Editar</label>
                    <label> <input type="checkbox" id="eliminarMDP" <?php echo $eliminarMDP; ?>  data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                    <label> <input type="checkbox" id="estadoMDP" <?php echo $estadoMDP; ?>  data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                </div>
            </div>
        </div>       
    </div>
    <div class="col-md-2 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
        <div class="form-group">
            <p><label><input type="checkbox" class="TdistribucionE" id="TdistribucionE" data-checkbox="icheckbox_minimal-red"><strong>DISTRIBUCIÓN (OTRAS)</strong></p>
            <div class="input-group">
                <div class="icheck-list">
                    <label><input type="checkbox" id="exportarMDE" <?php echo $exportarMDE; ?> data-checkbox="icheckbox_flat-blue"> Exportar</label>
                    <label><input type="checkbox" id="crearMDE" <?php echo $crearMDE; ?> data-checkbox="icheckbox_flat-blue"> Crear</label>
                    <label><input type="checkbox" id="editarMDE" <?php echo $editarMDE; ?> data-checkbox="icheckbox_flat-blue"> Editar</label>
                    <label> <input type="checkbox" id="eliminarMDE" <?php echo $eliminarMDE; ?> data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                    <label> <input type="checkbox" id="estadoMDE" <?php echo $estadoMDE; ?> data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                </div>
            </div>
        </div>       
    </div>
    <div class="col-md-2 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
        <div class="form-group">
            <p><label><input type="checkbox" class="Tsala" id="Tsala" data-checkbox="icheckbox_minimal-red"><strong>SALA</strong></p>
            <div class="input-group">
                <div class="icheck-list">
                    <label><input type="checkbox" id="exportarMSL" <?php echo $exportarMSL; ?> data-checkbox="icheckbox_flat-blue"> Exportar</label>
                    <label><input type="checkbox" id="editarMSL" <?php echo $editarMSL; ?> data-checkbox="icheckbox_flat-blue"> Editar</label>
                    <label> <input type="checkbox" id="estadoMSL" <?php echo $estadoMSL; ?> data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                </div>
            </div>
        </div>       
    </div>
</div>
</div>
<?php
$transport->close();
?>