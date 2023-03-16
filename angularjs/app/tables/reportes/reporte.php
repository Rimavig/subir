<?php
include ("../../conect.php");
include ("../../autenticacion.php");

?>

<div>
    <div class="row">
        <div class="col-lg-12 portlets">
            <div class="panel">
                <div class="panel-header panel-controls">
                    <h3><i class="fa fa-table"></i> Reporte  <strong>General</strong> </h3>
                </div>
                <div class="panel-content pagination2 ">
                    <form role="form" class=" form-validation">
                        <div class="row">   
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Tipos de evento</label>
                                    <select class="form-control Tevento" id="Tevento" style="width:100%;">
                                        <option value="venta" selected>Venta</option>
                                        <option value="gratuito" selected>Gratuito</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Evento</label>
                                    <select class="form-control evento" id="evento" style="width:100%;">
                                        <option value="todos" selected>Todos</option>
                                        <option value="evento1" selected>evento1</option>
                                        <option value="United States">United States</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="Afghanistan">Afghanistan</option>
                                    <option value="Albania">Albania</option>
                                    <option value="Algeria">Algeria</option>
                                    <option value="American Samoa">American Samoa</option>
                                    <option value="Andorra">Andorra</option>
                                    <option value="Angola">Angola</option>
                                    <option value="Anguilla">Anguilla</option>
                                    <option value="Antarctica">Antarctica</option>
                                    <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                    <option value="Argentina">Argentina</option>
                                    <option value="Armenia">Armenia</option>
                                    <option value="Aruba">Aruba</option>
                                    <option value="Australia">Australia</option>
                                    <option value="Austria">Austria</option>
                                    <option value="Azerbaijan">Azerbaijan</option>
                                    <option value="Bahamas">Bahamas</option>
                                    <option value="Bahrain">Bahrain</option>
                                    <option value="Bangladesh">Bangladesh</option>
                                    <option value="Barbados">Barbados</option>
                                    <option value="Belarus">Belarus</option>
                                    <option value="Belgium">Belgium</option>
                                    <option value="Belize">Belize</option>
                                    <option value="Benin">Benin</option>
                                    <option value="Bermuda">Bermuda</option>
                                    <option value="Bhutan">Bhutan</option>
                                    <option value="Bolivia">Bolivia</option>
                                    <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                    <option value="Botswana">Botswana</option>
                                    <option value="Bouvet Island">Bouvet Island</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Amigos del teatro</label>
                                    <select class="form-control amigos" id="amigos" style="width:100%;">
                                        <option value="todos" selected>Todos</option>
                                        <option value="on" selected>SI</option>
                                        <option value="off" selected>NO</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Lugar de compra</label>
                                    <select class="form-control Lcompra" id="Lcompra" style="width:100%;">
                                        <option value="todos" selected>Todos</option>
                                        <option value="web" selected>WEB</option>
                                        <option value="app" selected>APP</option>
                                        <option value="taquilla" selected>TAQUILLA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Tipos de Promocion</label>
                                    <select class="form-control evento" id="Tpromo" style="width:100%;">
                                        <option value="todos" selected>Todos</option>
                                        <option value="boletos" selected>Boletos</option>
                                        <option value="Fpago" selected>Factor de Compra/Pago</option>
                                        <option value="FormaPago" selected>Forma de Pago</option>
                                        <option value="Cpromocional" selected>Código Promocional</option>
                                        <option value="cruzados" selected>Cruzados</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Fecha Inicial</label>
                                    <div class="form-group prepend-icon">
                                        <input type="date" name="fechaI" class="form-control " id="fechaI" style="padding: 0px 30px;" value ="2017-06-01" placeholder="07/08/1995"  required>
                                        <i class="icon-calendar"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Fecha Final</label>
                                    <div class="form-group prepend-icon">
                                        <input type="date" name="fechaF" class="form-control" id="fechaF" style="padding: 0px 30px;" value ="2018-06-01" placeholder="07/08/1995"  required>
                                        <i class="icon-calendar"></i>
                                    </div>
                                </div>
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
<?php
$transport->close();
?>