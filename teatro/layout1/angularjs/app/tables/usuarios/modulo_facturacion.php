<?php
include ("../../conect.php");
include ("../../autenticacion.php");
$lista=array("FC","FR");
foreach($lista as $llave => $valores) {
    ${"crear".$valores}="";
    ${"editar".$valores}="";
    ${"eliminar".$valores}="";
    ${"estado".$valores}="";
    ${"exportar".$valores}="";
    ${"bloquear".$valores}="";
    ${"cortesia".$valores}="";
    ${"moviles".$valores}="";
    ${"B1".$valores}="";
    ${"B2".$valores}="";
    ${"recepcion".$valores}="";
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
            if($usuario[0]==="40"){
                $tipo="FC";
            }
            if($usuario[0]==="41"){
                $tipo="FR";
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
                    if($valores1==="16"){
                        ${"moviles".$tipo}="checked";
                    }
                    if($valores1==="17"){
                        ${"B1".$tipo}="checked";
                    }
                    if($valores1==="18"){
                        ${"B2".$tipo}="checked";
                    }
                    if($valores1==="19"){
                        ${"recepcion".$tipo}="checked";
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
                <p><label><input type="checkbox" class="TfacturacionCaja" id="TfacturacionCaja" data-checkbox="icheckbox_minimal-red"><strong>CAJA</strong></p>
                <div class="input-group">
                    <div class="icheck-list">
                        
                        <label><input type="checkbox" id="movilesFC" <?php echo $movilesFC; ?>  data-checkbox="icheckbox_flat-blue"> Boletería Moviles</label>
                        <label><input type="checkbox" id="B1FC" <?php echo $B1FC; ?>  data-checkbox="icheckbox_flat-blue"> Boletería 1</label>
                        <label><input type="checkbox" id="B2FC" <?php echo $B2FC; ?>  data-checkbox="icheckbox_flat-blue"> Boletería 2</label>
                        <label><input type="checkbox" id="recepcionFC" <?php echo $recepcionFC; ?>  data-checkbox="icheckbox_flat-blue"> Recepción</label>
                        <label><input type="checkbox" id="estadoFC" <?php echo $estadoFC; ?>  data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                        <label><input type="checkbox" id="exportarFC" <?php echo $exportarFC; ?>  data-checkbox="icheckbox_flat-blue"> Exportar</label>
                    </div>
                </div>
            </div>       
        </div>
        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
            <div class="form-group">
                <p><label><input type="checkbox" class="TfacturacionReporte" id="TfacturacionReporte" data-checkbox="icheckbox_minimal-red"><strong>REPORTE CAJA</strong></p>
                <div class="input-group">
                    <div class="icheck-list">
                        <label><input type="checkbox" id="exportarFR" <?php echo $exportarFR; ?>  data-checkbox="icheckbox_flat-blue"> Exportar</label>
                        <label><input type="checkbox" id="editarFR" <?php echo $editarFR; ?>  data-checkbox="icheckbox_flat-blue"> Detalles</label>
                    </div>
                </div>
            </div>       
        </div>
    </div>      
</div>