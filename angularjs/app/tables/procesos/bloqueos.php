<?php
include ("../../conect.php");
include ("../../autenticacion.php");
$re = $client->getPerfilRol($_SESSION["id"],"23");
$resultado = "".$re;
$usuarios= explode(',',$resultado);
$bloquear="hide";
$cortesia="hide";
if($resultado==""){
    ?>
    <a ng-click="reload()">
    <?php
}
foreach($usuarios as $llave => $valores1) {

    if($valores1==="12" | $valores1==="13"){
        $bloquear="";
    }
    if($valores1==="14"){
        $cortesia="";
    }
}
$re = $client->getAllEvento("T");
$resultado= "".$re;
$usuarios =explode(';;',$resultado);

?>

<div>
    <div class="row">
        <div class="col-lg-12 portlets">
            <div class="panel">
                <div class="panel-header panel-controls">
                    <h3><i class="fa fa-table"></i> Bloqueo de  <strong> Distribución de Sala</strong> </h3>
                </div>
                <div class="panel-content pagination2 ">
                    <form role="form" class=" form-validation">
                        <div class="row">   
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Evento</label>
                                    <select class="form-control evento" id="evento" style="width:100%;">
                                        <option value="none">Seleccione Evento</option>
                                        <?php
                                        foreach($usuarios as $llave => $valores) {
                                            $usuario =explode(',,,',$valores);
                                            if (isset($usuario[2])) {
                                        ?>
                                        <option value="<?php echo $usuario[0]; ?>"><?php echo $usuario[6].": ".$usuario[1]; ?></option>
                                        <?php
                                        }
                                        }
                                        ?> 
                                    
                                    </select>
                                </div>
                            </div>
                            <div class="esconder" id="funciones"> 
                                
                            </div>
                            
                            <div class="esconder" id="mapa"> 
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="row">  
                                            <div class="col-md-12">
                                                <label for="field-1" class="control-label">Mapa</label>
                                            </div>
                                        </div>
                                        <button class="mapa btn btn-sm btn-dark" value="1.png" id="mapa"><i class="fa fa-plus"></i> Ver Sala</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">   
                            <div class="esconder" id="datos"> 
                                
                            </div>
                        </div>
                        <div class="esconder" id="tipo"> 
                            <div class="row">   
                                <div class="col-md-3 esconder"  id="tipoB">
                                    <div class="form-group">
                                        <label for="field-1" class="control-label">Tipo de Bloqueo</label>
                                        <select class="form-control tipo" id="tipoP" style="width:100%;">
                                            <option value="none" selected>Seleccione Tipo</option>
                                            <option value="fila">Fila</option>
                                            <option value="laterales">Laterales</option>
                                            <option value="individual">Individual</option>
                                            <option value="asiento">Asiento</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-9 esconder" id="mensaje2">
                                    <div class="form-group" >
                                        <label for="field-3" class="control-label" >Asientos Seleccionados</label>
                                        <input class="select-tags form-control" id="mensaje3" >
                                        <div class="esconder" >
                                            <input class="select-tags form-control" id="mensaje4" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 esconder" id="laterales">
                                    <div class="form-group">
                                        <label for="field-1" class="control-label">Laterales</label>
                                        <select class="form-control laterales" style="width:100%;">
                                            <option value="none" selected>Seleccione Tipo</option>
                                            <option value="T">Ambos Lados</option>
                                            <option value="I">Lado Izquierdo</option>
                                            <option value="D">Lado Derecho</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 esconder" id="fila">
                                    <div class="form-group">
                                        <label for="field-1" class="control-label">Fila</label>
                                        <select class="form-control fila" style="width:100%;">
                                            <option value="none" selected>Seleccione Fila</option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="D">D</option>
                                            <option value="E">E</option>
                                            <option value="F">F</option>
                                            <option value="G">G</option>
                                            <option value="H">H</option>
                                            <option value="J">J</option>
                                            <option value="K">K</option>
                                            <option value="L">L</option>
                                            <option value="M">M</option>
                                            <option value="N">N</option>
                                            <option value="O">O</option>
                                            <option value="P">P</option>
                                            <option value="Q">Q</option>
                                            <option value="R">R</option>
                                            <option value="S">S</option>
                                            <option value="T">T</option>
                                            <option value="U">U</option>
                                            <option value="V">V</option>
                                            <option value="W">W</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="esconder" id="cantidad">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="field-1" class="control-label">Cantidad</label>
                                            <input class="form-control input-sm cantidad" type="number" min="1"  value ="1" name="duracionE" placeholder="" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 esconder" id="filaF1">
                                    <div class="form-group">
                                        <label for="field-1" class="control-label">Desde</label>
                                        <select class="form-control asientoF1" id="AsientoF1"  style="width:100%;">
                                            <option value="none">Seleccione Asiento</option>
                                            <option value="United States">1</option>
                                            <option value="United States">2</option>
                                            <option value="United States">3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 esconder" id="filaF2">
                                    <div class="form-group">
                                        <label for="field-1" class="control-label">Hasta</label>
                                        <select class="form-control asientoF2" id="AsientoF2" style="width:100%;">
                                            <option value="none">Seleccione Asiento</option>
                                            <option value="United States">1</option>
                                            <option value="United States">2</option>
                                            <option value="United States">3</option>
                                        </select>
                                    </div>
                                </div>
                 
                                <div class="col-md-3 esconder" id="individual">
                                    <div class="form-group">
                                        <label for="field-1" class="control-label">Fila</label>
                                        <select class="form-control filaI" id="FilaI"  style="width:100%;">
                                            <option value="none" selected>Seleccione Fila</option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="D">D</option>
                                            <option value="E">E</option>
                                            <option value="F">F</option>
                                            <option value="G">G</option>
                                            <option value="H">H</option>
                                            <option value="J">J</option>
                                            <option value="K">K</option>
                                            <option value="L">L</option>
                                            <option value="M">M</option>
                                            <option value="N">N</option>
                                            <option value="O">O</option>
                                            <option value="P">P</option>
                                            <option value="Q">Q</option>
                                            <option value="R">R</option>
                                            <option value="S">S</option>
                                            <option value="T">T</option>
                                            <option value="U">U</option>
                                            <option value="V">V</option>
                                            <option value="W">W</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 esconder" id="individual1">
                                    <div class="form-group">
                                        <label for="field-1" class="control-label">Asiento</label>
                                        <select class="form-control asiento" id="AsientoI" style="width:100%;">
                                            <option value="none">Seleccione Asiento</option>
                                            <option value="United States">1</option>
                                            <option value="United States">2</option>
                                            <option value="United States">3</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 esconder" id="reserva">
                                    <div class="form-group">
                                        <label for="field-1" class="control-label">Tipo de Reserva</label>
                                        <select class="form-control js-example-basic-single reserva" style="width:100%;">
                                            <option value="none" selected>Seleccione Tipo</option>
                                            <option class="<?php echo $bloquear; ?>" value="B">Bloqueo</option>
                                            <option class="<?php echo $cortesia; ?>" value="C">Cortesía</option>
                                            <option class="<?php echo $bloquear; ?>" value="D">Desbloqueo</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 esconder" id="nombreG">
                                    <div class="form-group">
                                        <label for="field-1" class="control-label">Nombre</label>
                                        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Teatro Sanchez Aguilar" minlength="5" required>
                                    </div>
                                </div>
                                <div class="col-md-4 esconder" id="correoG">
                                    <div class="form-group">
                                        <label for="field-1" class="control-label">Correo</label>
                                        <div class="form-group prepend-icon">
                                            <input type="email" name="correo" class="form-control" id="correo"   placeholder="tsa@hotmail.com" minlength="3" id="correo" required>
                                            <i class="icon-envelope"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5 esconder" id="mensaje1">
                                    <div class="form-group" >
                                        <label for="field-3" class="control-label" >Mensaje de Error</label>
                                        <input class="form-control input-sm" type="text" id="mensaje" style="color:red;" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer text-center esconder" id="botones">
                                <button type="submit" class="bloquear_asiento btn btn-primary btn-embossed bnt-square" ><i class="fa fa-check"></i> Crear</button>
                            </div>
                        </div>
                        
                    </form>
            
            
                </div>
            </div>
        </div>
    </div>
    <div class="alerta" id="alerta" >
    </div>
    <div class="modal fade verSala" id="verSala" aria-hidden="true">    
    </div>
    <div class="verSala1" id="verSala1" aria-hidden="true">    
    </div>
    <div class="footer">
        <p class="copyright">
                <span>Copyright © 2022 </span><span> Teatro Sanchez Aguilar </span><span>- Powered by Vion IoT Solutions. All rights reserved.</span>
            </p>
    </div>
</div>