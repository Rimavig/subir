<?php
include ("../../conect.php");
include ("../../autenticacion.php");
$lista=array("WI","WOI","WOB","WTQ","WTI","WTN","WAE","WAEV","WFQ","WFP","WIF","WPB","WB","WOP","WOR","WOA","WOC","WCC","WCA");
foreach($lista as $llave => $valores) {
    ${"crear".$valores}="";
    ${"editar".$valores}="";
    ${"eliminar".$valores}="";
    ${"estado".$valores}="";
    ${"exportar".$valores}="";
    ${"bloquear".$valores}="";
    ${"cortesia".$valores}="";
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
            if($usuario[0]==="31"){
                $tipo="WI";
            }
            if($usuario[0]==="32"){
                $tipo="WOI";
            }
            if($usuario[0]==="44"){
                $tipo="WOB";
            }
            if($usuario[0]==="33"){
                $tipo="WTQ";
            }
            if($usuario[0]==="45"){
                $tipo="WTI";
            }
            if($usuario[0]==="46"){
                $tipo="WTN";
            }
            if($usuario[0]==="34"){
                $tipo="WAE";
            }
            if($usuario[0]==="47"){
                $tipo="WAEV";
            }
            if($usuario[0]==="35"){
                $tipo="WFQ";
            }
            if($usuario[0]==="48"){
                $tipo="WFP";
            }
            if($usuario[0]==="36"){
                $tipo="WIF";
            }
            if($usuario[0]==="37"){
                $tipo="WPB";
            }
            if($usuario[0]==="38"){
                $tipo="WB";
            }
            if($usuario[0]==="39"){
                $tipo="WOP";
            }
            if($usuario[0]==="49"){
                $tipo="WOR";
            }
            if($usuario[0]==="50"){
                $tipo="WOA";
            }
            if($usuario[0]==="51"){
                $tipo="WOC";
            }
            if($usuario[0]==="53"){
                $tipo="WCC";
            }
            if($usuario[0]==="54"){
                $tipo="WCA";
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
                <p><label><input type="checkbox" class="TwebImagen" id="TwebImagen" data-checkbox="icheckbox_minimal-red"><strong>IMÁGENES PRINCIPALES</strong></p>
                <div class="input-group">
                    <div class="icheck-list">
                        <label><input type="checkbox" id="editarWI" <?php echo $editarWI; ?>  data-checkbox="icheckbox_flat-blue"> Editar</label>
                    </div>
                </div>
            </div>       
        </div>
        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
            <div class="form-group">
                <p><label><input type="checkbox" class="TwebOtrasImagen" id="TwebOtrasImagen" data-checkbox="icheckbox_minimal-red"><strong>OTRAS-IMAGEN</strong></p>
                <div class="input-group">
                    <div class="icheck-list">
                        <label><input type="checkbox" id="editarWOI" <?php echo $editarWOI; ?>  data-checkbox="icheckbox_flat-blue"> Editar</label>
                    </div>
                </div>
            </div>       
        </div>
        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
            <div class="form-group">
                <p><label><input type="checkbox" class="TwebOtrasBanner" id="TwebOtrasBanner" data-checkbox="icheckbox_minimal-red"><strong>OTRAS-BANNER</strong></p>
                <div class="input-group">
                    <div class="icheck-list">
                        <label> <input type="checkbox" id="editarWOB" <?php echo $editarWOB; ?>  data-checkbox="icheckbox_flat-blue"> Editar</label>
                    </div>
                </div>
            </div>       
        </div>
        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
            <div class="form-group">
                <p><label><input type="checkbox" class="TwebTeatroQuienes" id="TwebTeatroQuienes" data-checkbox="icheckbox_minimal-red"><strong>TEATRO-QUIÉNES S</strong></p>
                <div class="input-group">
                    <div class="icheck-list">
                        <label><input type="checkbox" id="crearWTQ" <?php echo $crearWTQ; ?>  data-checkbox="icheckbox_flat-blue"> Crear</label>
                        <label><input type="checkbox" id="editarWTQ" <?php echo $editarWTQ; ?>  data-checkbox="icheckbox_flat-blue"> Editar</label>
                        <label> <input type="checkbox" id="eliminarWTQ" <?php echo $eliminarWTQ; ?>  data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                    </div>
                </div>
            </div>       
        </div>
        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
            <div class="form-group">
                <p><label><input type="checkbox" class="TwebTeatroInstalaciones" id="TwebTeatroInstalaciones" data-checkbox="icheckbox_minimal-red"><strong>TEATRO-INSTALACIONES</strong></p>
                <div class="input-group">
                    <div class="icheck-list">
                        <label><input type="checkbox" id="crearWTI" <?php echo $crearWTI; ?> data-checkbox="icheckbox_flat-blue"> Crear</label>
                        <label><input type="checkbox" id="editarWTI" <?php echo $editarWTI; ?>  data-checkbox="icheckbox_flat-blue"> Editar</label>
                        <label> <input type="checkbox" id="eliminarWTI" <?php echo $eliminarWTI; ?>  data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                    </div>
                </div>
            </div>       
        </div>
        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
            <div class="form-group">
                <p><label><input type="checkbox" class="TwebTeatroNoticias" id="TwebTeatroNoticias" data-checkbox="icheckbox_minimal-red"><strong>TEATRO-NOTÍCIAS</strong></p>
                <div class="input-group">
                    <div class="icheck-list">
                        <label><input type="checkbox" id="crearWTN" <?php echo $crearWTN; ?> data-checkbox="icheckbox_flat-blue"> Crear</label>
                        <label><input type="checkbox" id="editarWTN" <?php echo $editarWTN; ?>  data-checkbox="icheckbox_flat-blue"> Editar</label>
                        <label> <input type="checkbox" id="eliminarWTN" <?php echo $eliminarWTN; ?>  data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                    </div>
                </div>
            </div>       
        </div>
        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
            <div class="form-group">
                <p><label><input type="checkbox" class="TwebAlquilerEspacios" id="TwebAlquilerEspacios" data-checkbox="icheckbox_minimal-red"><strong>ALQUILER-ESPACIOS</strong></p>
                <div class="input-group">
                    <div class="icheck-list">
                        <label><input type="checkbox" id="crearWAE" <?php echo $crearWAE; ?> data-checkbox="icheckbox_flat-blue"> Crear</label>
                        <label><input type="checkbox" id="editarWAE" <?php echo $editarWAE; ?>  data-checkbox="icheckbox_flat-blue"> Editar</label>
                        <label> <input type="checkbox" id="eliminarWAE" <?php echo $eliminarWAE; ?>  data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                    </div>
                </div>
            </div>       
        </div>
        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
            <div class="form-group">
                <p><label><input type="checkbox" class="TwebAlquilerEventos" id="TwebAlquilerEventos" data-checkbox="icheckbox_minimal-red"><strong>ALQUILER-EVENTOS R</strong></p>
                <div class="input-group">
                    <div class="icheck-list">
                        <label><input type="checkbox" id="crearWAEV" <?php echo $crearWAEV; ?> data-checkbox="icheckbox_flat-blue"> Crear</label>
                        <label><input type="checkbox" id="editarWAEV" <?php echo $editarWAEV; ?>  data-checkbox="icheckbox_flat-blue"> Editar</label>
                        <label> <input type="checkbox" id="eliminarWAEV" <?php echo $eliminarWAEV; ?>  data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                    </div>
                </div>
            </div>       
        </div>
        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
            <div class="form-group">
                <p><label><input type="checkbox" class="TwebFundacionQ" id="TwebFundacionQ" data-checkbox="icheckbox_minimal-red"><strong>FUNDACIÓN-QUIENES S</strong></p>
                <div class="input-group">
                    <div class="icheck-list">
                        <label><input type="checkbox" id="crearWFQ" <?php echo $crearWFQ; ?> data-checkbox="icheckbox_flat-blue"> Crear</label>
                        <label><input type="checkbox" id="editarWFQ" <?php echo $editarWFQ; ?>  data-checkbox="icheckbox_flat-blue"> Editar</label>
                        <label> <input type="checkbox" id="eliminarWFQ" <?php echo $eliminarWFQ; ?>  data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                    </div>
                </div>
            </div>       
        </div>
        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
            <div class="form-group">
                <p><label><input type="checkbox" class="TwebFundacionP" id="TwebFundacionP" data-checkbox="icheckbox_minimal-red"><strong>FUNDACIÓN-PROYECTOS</strong></p>
                <div class="input-group">
                    <div class="icheck-list">
                        <label><input type="checkbox" id="crearWFP" <?php echo $crearWFP; ?> data-checkbox="icheckbox_flat-blue"> Crear</label>
                        <label><input type="checkbox" id="editarWFP" <?php echo $editarWFP; ?>  data-checkbox="icheckbox_flat-blue"> Editar</label>
                        <label> <input type="checkbox" id="eliminarWFP" <?php echo $eliminarWFP; ?>  data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                    </div>
                </div>
            </div>       
        </div>
        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
            <div class="form-group">
                <p><label><input type="checkbox" class="TwebInformacion" id="TwebInformacion" data-checkbox="icheckbox_minimal-red"><strong>INFORMACIÓN ADICIONAL</strong></p>
                <div class="input-group">
                    <div class="icheck-list">
                        <label><input type="checkbox" id="crearWIF" <?php echo $crearWIF; ?> data-checkbox="icheckbox_flat-blue"> Crear</label>
                        <label><input type="checkbox" id="editarWIF" <?php echo $editarWIF; ?>  data-checkbox="icheckbox_flat-blue"> Editar</label>
                        <label> <input type="checkbox" id="eliminarWIF" <?php echo $eliminarWIF; ?>  data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                    </div>
                </div>
            </div>       
        </div>
        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
            <div class="form-group">
                <p><label><input type="checkbox" class="TwebPublicidad" id="TwebPublicidad" data-checkbox="icheckbox_minimal-red"><strong>PUBLICIDAD </strong></p>
                <div class="input-group">
                    <div class="icheck-list">
                        <label><input type="checkbox" id="crearWPB" <?php echo $crearWPB; ?> data-checkbox="icheckbox_flat-blue"> Crear</label>
                        <label><input type="checkbox" id="editarWPB" <?php echo $editarWPB; ?>  data-checkbox="icheckbox_flat-blue"> Editar</label>
                        <label> <input type="checkbox" id="eliminarWPB" <?php echo $eliminarWPB; ?>  data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                    </div>
                </div>
            </div>       
        </div>
        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
            <div class="form-group">
                <p><label><input type="checkbox" class="TwebBanner" id="TwebBanner" data-checkbox="icheckbox_minimal-red"><strong>BANNER PRINCIPALES </strong></p>
                <div class="input-group">
                    <div class="icheck-list">
                        <label><input type="checkbox" id="crearWB" <?php echo $crearWB; ?> data-checkbox="icheckbox_flat-blue"> Crear</label>
                        <label><input type="checkbox" id="editarWB" <?php echo $editarWB; ?>  data-checkbox="icheckbox_flat-blue"> Editar</label>
                        <label> <input type="checkbox" id="eliminarWB" <?php echo $eliminarWB; ?>  data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                    </div>
                </div>
            </div>       
        </div>
        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
            <div class="form-group">
                <p><label><input type="checkbox" class="TwebOtrasP" id="TwebOtrasP" data-checkbox="icheckbox_minimal-red"><strong>OTRAS-PREGUNTAS FRECUENTES  </strong></p>
                <div class="input-group">
                    <div class="icheck-list">
                        <label><input type="checkbox" id="crearWOP" <?php echo $crearWOP; ?> data-checkbox="icheckbox_flat-blue"> Crear</label>
                        <label><input type="checkbox" id="editarWOP" <?php echo $editarWOP; ?>  data-checkbox="icheckbox_flat-blue"> Editar</label>
                        <label> <input type="checkbox" id="eliminarWOP" <?php echo $eliminarWOP; ?>  data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                    </div>
                </div>
            </div>       
        </div>
        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
            <div class="form-group">
                <p><label><input type="checkbox" class="TwebOtrasR" id="TwebOtrasR" data-checkbox="icheckbox_minimal-red"><strong>OTRAS-RESPONSABILIDAD AMBIENTAL</strong></p>
                <div class="input-group">
                    <div class="icheck-list">
                        <label><input type="checkbox" id="crearWOR" <?php echo $crearWOR; ?> data-checkbox="icheckbox_flat-blue"> Crear</label>
                        <label><input type="checkbox" id="editarWOR" <?php echo $editarWOR; ?>  data-checkbox="icheckbox_flat-blue"> Editar</label>
                        <label> <input type="checkbox" id="eliminarWOR" <?php echo $eliminarWOR; ?>  data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                    </div>
                </div>
            </div>       
        </div>
        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
            <div class="form-group">
                <p><label><input type="checkbox" class="TwebOtrasA" id="TwebOtrasA" data-checkbox="icheckbox_minimal-red"><strong> OTRAS-AMIGOS DEL TEATRO</strong></p>
                <div class="input-group">
                    <div class="icheck-list">
                        <label><input type="checkbox" id="crearWOA" <?php echo $crearWOA; ?> data-checkbox="icheckbox_flat-blue"> Crear</label>
                        <label><input type="checkbox" id="editarWOA" <?php echo $editarWOA; ?>  data-checkbox="icheckbox_flat-blue"> Editar</label>
                        <label> <input type="checkbox" id="eliminarWOA" <?php echo $eliminarWOA; ?>  data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                    </div>
                </div>
            </div>       
        </div>
        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
            <div class="form-group">
                <p><label><input type="checkbox" class="TwebOtrasC" id="TwebOtrasC" data-checkbox="icheckbox_minimal-red"><strong>OTRAS-CONTACTO</strong></p>
                <div class="input-group">
                    <div class="icheck-list">
                        <label><input type="checkbox" id="crearWOC" <?php echo $crearWOC; ?> data-checkbox="icheckbox_flat-blue"> Crear</label>
                        <label><input type="checkbox" id="editarWOC" <?php echo $editarWOC; ?>  data-checkbox="icheckbox_flat-blue"> Editar</label>
                        <label> <input type="checkbox" id="eliminarWOC" <?php echo $eliminarWOC; ?>  data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                    </div>
                </div>
            </div>       
        </div>
        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
            <div class="form-group">
                <p><label><input type="checkbox" class="TwebContacto" id="TwebContacto" data-checkbox="icheckbox_minimal-red"><strong>CONTÁCTANOS-CONTACTO</strong></p>
                <div class="input-group">
                    <div class="icheck-list">
                        <label><input type="checkbox" id="editarWCC" <?php echo $editarWCC; ?>  data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                        <label> <input type="checkbox" id="eliminarWCC" <?php echo $eliminarWCC; ?>  data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                    </div>
                </div>
            </div>       
        </div>
        <div  class="col-md-3 col-sm-3 col-xs-6" style ="margin-bottom: 30px!important;">
            <div class="form-group">
                <p><label><input type="checkbox" class="TwebAlquiler" id="TwebAlquiler" data-checkbox="icheckbox_minimal-red"><strong>CONTÁCTANOS-ALQUILER</strong></p>
                <div class="input-group">
                    <div class="icheck-list">
                        <label><input type="checkbox" id="editarWCA" <?php echo $editarWCA; ?>  data-checkbox="icheckbox_flat-blue"> Estado (ON/OFF)</label>
                        <label> <input type="checkbox" id="eliminarWCA" <?php echo $eliminarWCA; ?>  data-checkbox="icheckbox_flat-blue"> Eliminar</label>
                    </div>
                </div>
            </div>       
        </div>
    </div>      
</div>
<?php
$transport->close();
?>