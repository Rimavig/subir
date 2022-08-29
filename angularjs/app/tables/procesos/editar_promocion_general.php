<?php
include ("../../conect.php");
include ("../../autenticacion.php");
if (isset($_POST["id_promo"])) {
    $id_promo=$_POST["id_promo"];
    $id_tipoPromo=$_POST["id_tipoPromo"];
    $tipo=$_POST["tipo"];
    $re = $client->getPromocion($id_promo,$id_tipoPromo,$tipo);
    $resultado = "".$re;
    $Promo =explode(';;',$resultado);
    $band2=true;
    
} 
$re = $client->getAllNombrePromocion();
$resultado= "".$re;
$promociones =explode(';;',$resultado);
$re1 = $client->getAllBanco("T");
$resultado1= "".$re1;
$bancot =explode(';;',$resultado1);
$re2 = $client->getAllTarjeta("T");
$resultado2= "".$re2;
$tarjetat =explode(';;',$resultado2);
foreach($Promo as $llave => $valores) {
    $prom =explode(',,,',$valores);
    $estado="";
    $estadoT="OFF";
    if (isset($prom[16])) {
    $idPromocion=$prom[0];
    $idPromocion2=$prom[1];
    $tipoPromo=$prom[2];
    $nombre=$prom[3];
    $categoria=$prom[4];
    $descripcion=$prom[5];
    $amigoTeatro=$prom[6];
    $tipoAcceso=$prom[7];
    $idTipoPromocion=$prom[8];
    $fechaInicio=$prom[9];
    $fechaFin=$prom[10];
    $desde=$prom[11];
    $hasta=$prom[12];
    $descuento=$prom[13];
    $codigo=$prom[14];
    $banco=$prom[15];
    $tarjeta=$prom[16];
    $Cmaximo=$prom[19];
    $estado="";
    $estadoT="OFF";
    $T="";
    $A="";
    $W="";
    $V="";
    if ($amigoTeatro==="S" ) {
        $estado="checked";
        $estadoT="ON";
    } 
    if (strpos($tipoAcceso, 'T') !== false ) {
        $T="checked";
    }
    if (strpos($tipoAcceso, 'A') !== false) {
        $A="checked";
    }
    if (strpos($tipoAcceso, 'W') !== false) {
        $W="checked";
    }
    if (strpos($tipoAcceso, 'V') !== false) {
        $V="checked";
    }
?>
<div class="modal-dialog modal-lg">
    <div class="modal-content ">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
            <h4 class="modal-title">Editar Promoción</strong> </h4> 
            <input type="text" name="idPromocion" id="idPromocion" class="esconder"  value="<?php echo $id_promo; ?>" disabled>
            <input type="text" name="idPromocion2" id="idPromocion2" class="esconder"  value="<?php echo $id_tipoPromo; ?>" disabled>
        </div>
        <div class="modal-body">
            <form role="form" class=" form-validation">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Categoría de Promoción</label>
                            <select  class="form-control" style="width:100%;"  id="Ccategoria">
                                <?php
                                foreach($promociones as $llave => $valores1) {
                                    $datos1 =explode(',,,',$valores1);
                                    $valor="";
                                    if (isset($datos1[1])) {
                                        if ($datos1[0]==$categoria) {
                                        ?>
                                        <option value="<?php echo $datos1[0]; ?>" selected><?php echo $datos1[2]; ?></option>
                                        <?php
                                        }else{
                                        ?>
                                        <option value="<?php echo $datos1[0]; ?>"><?php echo $datos1[2]; ?></option>
                                        <?php        
                                        }
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Nombre Promoción</label>
                            <div class="form-group">
                                <input type="text" name="name" id="Cnombre" class="form-control" value="<?php echo $nombre; ?>" placeholder="" minlength="2" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Descripción</label>
                            <div class="form-group ">
                                <input type="text" name="name" id="Cdescripcion" class="form-control" value="<?php echo $descripcion; ?>"  placeholder="" minlength="2" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row"> 
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Fecha Inicio</label>
                            <div class="form-group prepend-icon">
                            <input type="date" name="fecha" id="CfechaI"  class="form-control" style="padding: 0px 30px;" value="<?php echo $fechaInicio; ?>"  placeholder="07/08/1995" id="nacimiento" required>
                                <i class="icon-clock"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Fecha Término</label>
                            <div class="form-group prepend-icon">
                            <input type="date" name="fecha" id="CfechaT"  class="form-control" style="padding: 0px 30px;" value="<?php echo $fechaFin; ?>"  placeholder="07/08/1995" id="nacimiento" required>
                                <i class="icon-clock"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Amigos del Teatro</label>
                            <div class="form-group">
                                <label class="switch switch-green">
                                    <input type="checkbox" class="switch-input"  id="Cbox" <?php echo $estado; ?>>
                                    <span class="switch-label" data-on="On" data-off="Off"></span>
                                    <span class="switch-handle"></span>
                                    <span id="estado" class="esconder"><?php echo $estadoT; ?></span>
                                </label>
                            </div>
                        </div>
                    </div>   
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Cantidad Máxima/ Usuario</label>
                            <div class="form-group ">
                                <input class="form-control input-sm" id="Cmaxima" type="number" value="<?php echo $Cmaximo; ?>" min="0" required>
                            </div>
                        </div>
                    </div> 
                </div>
                <div class="row esconder">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="field-1" class="control-label"> Evento</label>
                            <select class="form-control" style="width:100%;">
                                <option value="United States">Masculino</option>
                                <option value="United Kingdom">Femenino</option>
                            
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Platea</label>
                            <select class="form-control" style="width:100%;">
                                <option value="United States">Masculino</option>
                                <option value="United Kingdom">Femenino</option>
                            
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Localidad</label>
                            <div class="input-group">
                                <div class="icheck-inline">
                                    <label>
                                        <input class="Ctodos localidad" id="Ctodos" type="checkbox" <?php echo $T; ?>> Todos
                                    </label>
                                    <label>
                                        <input class="Cweb localidad" id="Cweb" type="checkbox"  <?php echo $W; ?>> Web
                                    </label>
                                    <label>
                                        <input class="Capp localidad" id="Capp" type="checkbox"  <?php echo $A; ?>> App
                            
                                    <label>
                                        <input class="Ctaquilla localidad"  id="Ctaquilla" type="checkbox"  <?php echo $V; ?>> Taquilla
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Tipo de Promoción</label>
                            <select class="form-control tipo" id="Ctipo" style="width:100%;" >
                                 <?php 
                                    if ($tipoPromo==="boletos" ) {
                                        ?> 
                                       <option value="boletos">Boletos</option>
                                        <?php 
                                    } else if ($tipoPromo==="Fpago" ) {
                                        ?> 
                                       <option value="Fpago">Factor de Compra/Pago</option>
                                        <?php 
                                    } else if ($tipoPromo==="FormaPago" ) {
                                        ?> 
                                       <option value="FormaPago">Forma de Pago</option>
                                        <?php 
                                    } else if ($tipoPromo==="Cpromocional" ) {
                                        ?> 
                                       <option value="Cpromocional">Código Promocional</option>
                                        <?php 
                                    }
                                ?> 
                            </select>
                        </div>
                    </div>
                </div>
                <?php 
                    if ($tipoPromo==="boletos" ) {
                        ?> 
                        <div class="row" id="boletos">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Desde</label>
                                    <div class="form-group ">
                                        <input class="form-control input-sm" id="Cdesde" type="number" value="<?php echo $desde; ?>" name="duracionE" placeholder="" min="0" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Hasta</label>
                                    <div class="form-group ">
                                        <input class="form-control input-sm" type="number" ng-model="message" value="<?php echo $hasta; ?>" id="Chasta"  name="duracionE" placeholder="" min="0" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Descuento (%)</label>
                                    <div class="form-group ">
                                        <input class="form-control input-sm" type="number" id="CFCdescuento"  value="<?php echo $descuento; ?>"  name="duracionE" placeholder="" min="0" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php 
                    } else if ($tipoPromo==="Fpago" ) {
                        ?> 
                        <div class="row" id="fpago">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Compra</label>
                                    <div class="form-group">
                                        <input class="form-control input-sm" type="number" id="Ccompra" value="<?php echo $desde; ?>" name="duracionE" placeholder="" min="0" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Pago</label>
                                    <div class="form-group">
                                        <input class="form-control input-sm" type="number" id="Cpago"  value="<?php echo $hasta; ?>" name="duracionE" placeholder="" min="0" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php 
                    } else if ($tipoPromo==="FormaPago" ) {
                        ?> 
                       <div class="row" id="formaPago">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="field-1" class="control-label"> Tarjeta</label>
                                    <select class="form-control Ctarjeta" id="Ctarjeta" style="width:100%;">
                                        <?php
                                        foreach($tarjetat as $llave => $valores1) {
                                            $datos1 =explode(',,,',$valores1);
                                            $valor="";
                                            if (isset($datos1[1])) {
                                                if ($datos1[0]==$tarjeta) {
                                                    ?>
                                                    <option value="<?php echo $datos1[0]; ?>" selected><?php echo $datos1[1]; ?></option>
                                                    <?php
                                                }else{
                                                    ?>
                                                    <option value="<?php echo $datos1[0]; ?>"><?php echo $datos1[1]; ?></option>
                                                    <?php        
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 esconder">
                                <div class="form-group">
                                    <label for="field-1" class="control-label"> Banco</label>
                                    <select  class="form-control Cbanco" style="width:100%;" id="Cbanco">
                                        <?php
                                        foreach($bancot as $llave => $valores1) {
                                            $datos1 =explode(',,,',$valores1);
                                            $valor="";
                                            if (isset($datos1[1])) {
                                                if ($datos1[0]==$banco) {
                                                    ?>
                                                    <option value="<?php echo $datos1[0]; ?>" selected><?php echo $datos1[1]; ?></option>
                                                    <?php
                                                }else{
                                                    ?>
                                                    <option value="<?php echo $datos1[0]; ?>"><?php echo $datos1[1]; ?></option>
                                                    <?php        
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Descuento (%)</label>
                                    <div class="form-group">
                                        <input class="form-control input-sm"  id="CTBdescuento" value="<?php echo $descuento; ?>" type="number" name="duracionE" placeholder="" min="0" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php 
                    } else if ($tipoPromo==="Cpromocional" ) {
                        ?> 
                        <div class="row" id="Cpromocional">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Código</label>
                                    <div class="form-group">
                                        <input type="text" name="name" id="Ccodigo" class="form-control" value="<?php echo $codigo; ?>" placeholder="Cine" minlength="2" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Descuento (%)</label>
                                    <div class="form-group">
                                        <input class="form-control input-sm" id="CCPdescuento" value="<?php echo $descuento; ?>" type="number" name="duracionE" placeholder="" min="0" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php 
                    }
                ?> 
                <div class="modal-footer text-center">
                    <button type="submit" class="btn btn-primary btn-embossed bnt-square editar_promocion_general" ><i class="fa fa-check"></i> Guardar</button>
                    <button type="button" class="btn btn-embossed btn-default " data-dismiss="modal" aria-hidden="true">Cancelar</button>
                </div>
            </form>    
        </div>
    </div>
</div>
<?php 
    }}
?> 