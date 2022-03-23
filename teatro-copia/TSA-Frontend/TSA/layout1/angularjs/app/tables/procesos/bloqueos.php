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
                                        <option value="Principal">Principal</option>
                                        <option value="United Kingdom">Femenino</option>
                                    
                                </select>
                                </div>
                            </div>
                            <div class="esconder" id="funciones"> 
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="field-1" class="control-label">Funciones</label>
                                        <select class="form-control funciones" style="width:100%;">
                                            <option value="none">Seleccione Función</option>
                                            <option value="United States">Masculino</option>
                                            <option value="United Kingdom">Femenino</option>
                                        
                                    </select>
                                    </div>
                                </div>
                            </div>
                            <div class="esconder" id="mapa"> 
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="field-1" class="control-label">Mapa</label>
                                        <div data-toggle="modal" data-target="#modal-responsive3">
                                            <button class="btn btn-sm btn-dark"><i class="fa fa-plus"></i> Ver Sala</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="esconder" id="tipo"> 
                            <div class="row">   
                                <div class="col-md-3 esconder"  id="tipoB">
                                    <div class="form-group">
                                        <label for="field-1" class="control-label">Tipo de Bloqueo</label>
                                        <select class="form-control tipo" id="tipoP" style="width:100%;">
                                            <option value="none">Seleccione Tipo</option>
                                            <option value="fila">Fila</option>
                                            <option value="laterales">Laterales</option>
                                            <option value="individual">Individual</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 esconder" id="laterales">
                                    <div class="form-group">
                                        <label for="field-1" class="control-label">Laterales</label>
                                        <select class="form-control laterales" style="width:100%;">
                                            <option value="none">Seleccione Tipo</option>
                                            <option value="United States">Ambos Lados</option>
                                            <option value="United Kingdom">Lado Izquierdo</option>
                                            <option value="United Kingdom">Lado Derecho</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 esconder" id="fila">
                                    <div class="form-group">
                                        <label for="field-1" class="control-label">Fila</label>
                                        <select class="form-control fila" style="width:100%;">
                                            <option value="none">Seleccione Fila</option>
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
                                <div class="esconder" id="fila1">
                                    <div class="col-md-3 ">
                                        <div class="form-group">
                                            <label for="field-1" class="control-label">Desde</label>
                                            <input type="text" name="nombreE" class="form-control" placeholder="Teatro Sanchez Aguilar" minlength="5" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="field-1" class="control-label">Hasta</label>
                                            <input type="text" name="nombreE" class="form-control" placeholder="Teatro Sanchez Aguilar" minlength="5" required>
                                        </div>
                                    </div>
                                </div>
                 
                                <div class="col-md-3 esconder" id="individual">
                                    <div class="form-group">
                                        <label for="field-1" class="control-label">Fila</label>
                                        <select class="form-control filaI" id="FilaI"  style="width:100%;">
                                            <option value="none">Seleccione Fila</option>
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
                                        <select class="form-control reserva" style="width:100%;">
                                            <option value="none">Seleccione Tipo</option>
                                            <option value="bloqueo">Bloqueo</option>
                                            <option value="cortesia">Cortesía</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 esconder" id="usuario">
                                    <div class="form-group">
                                        <label for="field-1" class="control-label">Usuario</label>
                                        <select class="form-control usuario" style="width:100%;">
                                            <option value="none">Seleccione Acción</option>
                                            <option value="United States">Masculino</option>
                                            <option value="United Kingdom">Femenino</option>s
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 esconder" id="bloquear">
                                    <div class="form-group">
                                        <label for="field-1" class="control-label">Acción</label>
                                        <select class="form-control bloquear" style="width:100%;">
                                            <option value="none">Seleccione Acción</option>
                                            <option value="bloquear">Bloquear</option>
                                            <option value="desbloquear">Desbloquear</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer text-center esconder" id="botones">
                                <button type="submit" class="btn btn-primary btn-embossed bnt-square" ><i class="fa fa-check"></i> Crear</button>
                                <button type="reset" class="btn btn-embossed btn-default">Limpiar</button>
                            </div>
                        </div>
                        
                    </form>
            
            
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade  " id="modal-responsive" aria-hidden="true">
        <div class="modal-dialog modal-lg ">
            <div class="modal-content  ">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
                    <h4 class="modal-title">Crear <strong>Eventos Venta</strong> </h4>
                </div>
                <div class="modal-body">
                    <form role="form" class=" form-validation">
                        <div class="row">    
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Tipo Evento</label>
                                    <select class="form-control" style="width:100%;">
                                        <option value="United States">Masculino</option>
                                        <option value="United Kingdom">Femenino</option>
                                    
                                </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Productora</label>
                                    <select class="form-control" style="width:100%;">
                                        <option value="United States">Masculino</option>
                                        <option value="United Kingdom">Femenino</option>
                                    
                                </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Categoria</label>
                                    <select class="form-control" style="width:100%;">
                                        <option value="United States">Masculino</option>
                                        <option value="United Kingdom">Femenino</option>
                                    
                                </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">   
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Clasificación</label>
                                    <select class="form-control" style="width:100%;">
                                        <option value="United States">Masculino</option>
                                        <option value="United Kingdom">Femenino</option>
                                    
                                </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Tipo Espectáculo</label>
                                    <select class="form-control" style="width:100%;">
                                        <option value="United States">Masculino</option>
                                        <option value="United Kingdom">Femenino</option>
                                    
                                </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Procedencia</label>
                                    <select class="form-control" style="width:100%;">
                                        <option value="United States">Masculino</option>
                                        <option value="United Kingdom">Femenino</option>
                                    
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">   
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Sala</label>
                                    <select class="form-control" style="width:100%;">
                                        <option value="United States">Masculino</option>
                                        <option value="United Kingdom">Femenino</option>
                                    
                                </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Distribución</label>
                                    <select class="form-control" style="width:100%;">
                                        <option value="United States">Masculino</option>
                                        <option value="United Kingdom">Femenino</option>
                                    
                                </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Mapa</label>
                                    <div data-toggle="modal" data-target="#modal-responsive3">
                                        <button class="btn btn-sm btn-dark"><i class="fa fa-plus"></i> Ver Sala</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">  
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Tipo de Precio</label>
                                    <select class="form-control" style="width:100%;">
                                        <option value="United States">Localidad</option>
                                        <option value="United Kingdom">General</option>
                                        <option value="United Kingdom">Plateas</option>
                                    </select>
                                </div>
                            </div> 
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="field-3" class="control-label">Aforo</label>
                                    <input class="form-control input-sm" type="number" name="duracionE" placeholder="Type a number" required>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="modal-footer text-center">
                            <button type="submit" class="btn btn-primary btn-embossed bnt-square" ><i class="fa fa-check"></i> Crear</button>
                            <button type="reset" class="btn btn-embossed btn-default">Limpiar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
   
    <div class="modal fade" id="modal-responsive3" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="panel">
                <div class="seat-plan-section"> 
                    <div  id="imagen1" class="screen-area">
                        <div class="screen-thumb">
                            <img src="../../../assets/boleto/images /movie/screen-thumb.png" alt="movie">
                        </div>
                        <div class="screen-wrapper">
                            <ul class="seat-area">
                                <li class="seat-line">
                                    <span>A</span>
                                    <ul class="seat--area">
                                        <li class="front-seat">
                                            <ul>
                                                <li class="single-seat">
                                                    <img id="A9" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">9</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="A7" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">7</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="A5" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">5</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="A3" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">3</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="A1" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">1</span>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="front-seat">
                                            <ul>
                                                <li class="single-seat">
                                                    <img src="../../../assets/boleto/images /movie/seat01-booked.png" alt="seat">
                                                    <span class="sit-num1">A</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="A116" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">116</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="A115" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">115</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="A114" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">114</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="A113" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">113</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="A112" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">112</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="A111" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">111</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="A110" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">110</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="A109" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">109</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="A108" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">108</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="A107" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">107</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="A106" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">106</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="A105" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">105</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="A104" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">104</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="A103" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">103</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="A102" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">102</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="A101" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">101</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img  src="../../../assets/boleto/images /movie/seat01-booked.png" alt="seat">
                                                    <span class="sit-num1">A</span>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="front-seat">
                                            <ul>
                                                <li class="single-seat">
                                                    <img id="A2" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">2</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="A4" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">4</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="A6" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">6</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="A8" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">8</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="A10" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">10</span>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <span>A</span>
                                </li>
                                <li class="seat-line">
                                    <span>B</span>
                                    <ul class="seat--area">
                                        <li class="front-seat">
                                            <ul>
                                                <li class="single-seat">
                                                    <img id="B9" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">9</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="B7" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">7</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="B5" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">5</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="B3" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">3</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="B1" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">1</span>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="front-seat">
                                            <ul>
                                                <li class="single-seat">
                                                    <img  src="../../../assets/boleto/images /movie/seat01-booked.png" alt="seat">
                                                    <span class="sit-num1">B</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="B117" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">117</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="B116" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">116</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="B115" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">115</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="B114" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">114</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="B113" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">113</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="B112" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">112</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="B111" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">111</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="B110" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">110</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="B109" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">109</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="B108" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">108</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="B107" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">107</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="B106" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">106</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="B105" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">105</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="B104" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">104</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="B103" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">103</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="B102" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">102</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="B101" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">101</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img  src="../../../assets/boleto/images /movie/seat01-booked.png" alt="seat">
                                                    <span class="sit-num1">B</span>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="front-seat">
                                            <ul>
                                                <li class="single-seat">
                                                    <img id="B2" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">2</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="B4" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">4</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="B6" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">6</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="B8" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">8</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="B10" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">10</span>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <span>B</span>
                                </li>
                                <li class="seat-line">
                                    <span>C</span>
                                    <ul class="seat--area">
                                        <li class="front-seat">
                                            <ul>
                                                <li class="single-seat">
                                                    <img id="C19" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">19</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="C17" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">17</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="C15" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">15</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="C13" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">13</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="C11" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">11</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="C9" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">9</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="C7" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">7</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="C5" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">5</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="C3" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">3</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="C1" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">1</span>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="front-seat">
                                            <ul>
                                                <li class="single-seat">
                                                    <img  src="../../../assets/boleto/images /movie/seat01-booked.png" alt="seat">
                                                    <span class="sit-num1">C</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="C118" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">118</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="C117" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">117</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="C116" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">116</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="C115" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">115</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="C114" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">114</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="C113" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">113</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="C112" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">112</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="C111" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">111</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="C110" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">110</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="C109" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">109</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="C108" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">108</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="C107" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">107</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="C106" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">106</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="C105" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">105</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="C104" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">104</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="C103" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">103</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="C102" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">102</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="C101" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">101</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img  src="../../../assets/boleto/images /movie/seat01-booked.png" alt="seat">
                                                    <span class="sit-num1">C</span>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="front-seat">
                                            <ul>
                                                <li class="single-seat">
                                                    <img id="C2" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">2</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="C4" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">4</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="C6" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">6</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="C8" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">8</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="C10" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">10</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="C12" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">12</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="C14" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">14</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="C16" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">16</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="C18" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">18</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="C20" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">20</span>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <span>C</span>
                                </li>
                                <li class="seat-line">
                                    <span>D</span>
                                    <ul class="seat--area">
                                        <li class="front-seat">
                                            <ul>
                                                <li class="single-seat">
                                                    <img id="D19" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">19</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="D17" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">17</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="D15" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">15</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="D13" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">13</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="D11" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">11</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="D9" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">9</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="D7" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">7</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="D5" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">5</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="D3" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">3</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="D1" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">1</span>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="front-seat">
                                            <ul>
                                                <li class="single-seat">
                                                    <img  src="../../../assets/boleto/images /movie/seat01-booked.png" alt="seat">
                                                    <span class="sit-num1">D</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="D119" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">119</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="D118" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">118</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="D117" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">117</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="D116" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">116</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="D115" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">115</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="D114" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">114</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="D113" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">113</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="D112" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">112</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="D111" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">111</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="D110" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">110</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="D109" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">109</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="D108" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">108</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="D107" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">107</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="D106" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">106</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="D105" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">105</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="D104" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">104</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="D103" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">103</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="D102" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">102</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="D101" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">101</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img  src="../../../assets/boleto/images /movie/seat01-booked.png" alt="seat">
                                                    <span class="sit-num1">D</span>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="front-seat">
                                            <ul>
                                                <li class="single-seat">
                                                    <img id="D2" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">2</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="D4" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">4</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="D6" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">6</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="D8" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">8</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="D10" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">10</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="D12" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">12</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="D14" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">14</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="D16" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">16</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="D18" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">18</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="D20" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">20</span>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <span>D</span>
                                </li>
                                <li class="seat-line">
                                    <span>E</span>
                                    <ul class="seat--area">
                                        <li class="front-seat">
                                            <ul>
                                                <li class="single-seat">
                                                    <img id="E19" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">19</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="E17" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">17</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="E15" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">15</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="E13" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">13</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="E11" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">11</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="E9" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">9</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="E7" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">7</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="E5" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">5</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="E3" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">3</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="E1" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">1</span>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="front-seat">
                                            <ul>
                                                <li class="single-seat">
                                                    <img src="../../../assets/boleto/images /movie/seat01-booked.png" alt="seat">
                                                    <span class="sit-num1">E</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="E120" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">120</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="E119" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">119</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="E118" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">118</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="E117" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">117</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="E116" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">116</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="E115" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">115</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="E114" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">114</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="E113" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">113</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="E112" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">112</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="E111" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">111</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="E110" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">110</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="E109" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">109</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="E108" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">108</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="E107" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">107</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="E106" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">106</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="E105" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">105</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="E104" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">104</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="E103" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">103</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="E102" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">102</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="E101" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">101</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img  src="../../../assets/boleto/images /movie/seat01-booked.png" alt="seat">
                                                    <span class="sit-num1">E</span>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="front-seat">
                                            <ul>
                                                <li class="single-seat">
                                                    <img id="E2" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">2</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="E4" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">4</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="E6" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">6</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="E8" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">8</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="E10" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">10</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="E12" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">12</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="E14" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">14</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="E16" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">16</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="E18" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">18</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="E20" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">20</span>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <span>D</span>
                                </li>
                                <li class="seat-line">
                                    <span>F</span>
                                    <ul class="seat--area">
                                        <li class="front-seat">
                                            <ul>
                                                <li class="single-seat">
                                                    <img id="F19" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">19</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="F17" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">17</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="F15" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">15</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="F13" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">13</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="F11" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">11</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="F9" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">9</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="F7" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">7</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="F5" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">5</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="F3" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">3</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="F1" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">1</span>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="front-seat">
                                            <ul>
                                                <li class="single-seat">
                                                    <img  src="../../../assets/boleto/images /movie/seat01-booked.png" alt="seat">
                                                    <span class="sit-num1">F</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="F121" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">121</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="F120" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">120</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="F119" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">119</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="F118" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">118</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="F117" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">117</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="F116" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">116</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="F115" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">115</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="F114" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">114</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="F113" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">113</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="F112" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">112</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="F111" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">111</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="F110" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">110</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="F109" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">109</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="F108" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">108</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="F107" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">107</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="F106" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">106</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="F105" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">105</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="F104" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">104</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="F103" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">103</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="F102" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">102</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="F101" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">101</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img  src="../../../assets/boleto/images /movie/seat01-booked.png" alt="seat">
                                                    <span class="sit-num1">F</span>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="front-seat">
                                            <ul>
                                                <li class="single-seat">
                                                    <img id="F2" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">2</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="F4" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">4</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="F6" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">6</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="F8" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">8</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="F10" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">10</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="F12" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">12</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="F14" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">14</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="F16" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">16</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="F18" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">18</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="F20" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">20</span>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <span>F</span>
                                </li>
                                <li class="seat-line">
                                    <span>G</span>
                                    <ul class="seat--area">
                                        <li class="front-seat">
                                            <ul>
                                                <li class="single-seat">
                                                    <img id="G19" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">19</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="G17" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">17</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="G15" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">15</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="G13" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">13</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="G11" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">11</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="G9" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">9</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="G7" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">7</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="G5" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">5</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="G3" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">3</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="G1" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">1</span>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="front-seat">
                                            <ul>
                                                <li class="single-seat">
                                                    <img  src="../../../assets/boleto/images /movie/seat01-booked.png" alt="seat">
                                                    <span class="sit-num1">G</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="G122" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">122</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="G121" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">121</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="G120" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">120</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="G119" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">119</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="G118" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">118</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="G117" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">117</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="G116" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">116</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="G115" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">115</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="G114" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">114</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="G113" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">113</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="G112" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">112</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="G111" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">111</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="G110" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">110</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="G109" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">109</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="G108" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">108</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="G107" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">107</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="G106" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">106</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="G105" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">105</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="G104" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">104</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="G103" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">103</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="G102" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">102</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="G101" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">101</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img  src="../../../assets/boleto/images /movie/seat01-booked.png" alt="seat">
                                                    <span class="sit-num1">G</span>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="front-seat">
                                            <ul>
                                                <li class="single-seat">
                                                    <img id="G2" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">2</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="G4" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">4</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="G6" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">6</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="G8" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">8</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="G10" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">10</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="G12" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">12</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="G14" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">14</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="G16" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">16</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="G18" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">18</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="G20" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">20</span>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <span>G</span>
                                </li>
                                <li class="seat-line">
                                    <span>H</span>
                                    <ul class="seat--area">
                                        <li class="front-seat">
                                            <ul>
                                                <li class="single-seat">
                                                    <img id="H17" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">17</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="H15" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">15</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="H13" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">13</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="H11" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">11</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="H9" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">9</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="H7" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">7</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="H5" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">5</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="H3" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">3</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="H1" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">1</span>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="front-seat">
                                            <ul>
                                                <li class="single-seat">
                                                    <img id="" src="../../../assets/boleto/images /movie/seat01-booked.png" alt="seat">
                                                    <span class="sit-num1">H</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="H123" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">123</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="H122" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">122</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="H121" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">121</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="H120" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">120</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="H119" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">119</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="H118" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">118</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="H117" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">117</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="H116" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">116</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="H115" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">115</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="H114" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">114</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="H113" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">113</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="H112" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">112</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="H111" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">111</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="H110" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">110</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="H109" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">109</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="H108" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">108</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="H107" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">107</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="H106" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">106</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="H105" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">105</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="H104" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">104</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="H103" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">103</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="H102" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">102</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="H101" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">101</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="" src="../../../assets/boleto/images /movie/seat01-booked.png" alt="seat">
                                                    <span class="sit-num1">H</span>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="front-seat">
                                            <ul>
                                                <li class="single-seat">
                                                    <img id="H2" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">2</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="H4" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">4</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="H6" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">6</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="H8" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">8</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="H10" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">10</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="H12" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">12</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="H14" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">14</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="H16" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">16</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="H18" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">18</span>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <span>H</span>
                                </li>
                                <li class="seat-line">
                                    <span>J</span>
                                    <ul class="seat--area">
                                        <li class="front-seat">
                                            <ul>
                                                <li class="single-seat">
                                                    <img id="J17" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">17</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="J15" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">15</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="J13" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">13</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="J11" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">11</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="J9" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">9</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="J7" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">7</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="J5" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">5</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="J3" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">3</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="J1" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">1</span>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="front-seat">
                                            <ul>
                                                <li class="single-seat">
                                                    <img id="" src="../../../assets/boleto/images /movie/seat01-booked.png" alt="seat">
                                                    <span class="sit-num1">J</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="J124" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">124</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="J123" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">123</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="J122" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">122</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="J121" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">121</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="J120" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">120</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="J119" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">119</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="J118" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">118</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="J117" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">117</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="J116" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">116</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="J115" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">115</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="J114" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">114</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="J113" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">113</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="J112" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">112</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="J111" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">111</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="J110" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">110</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="J109" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">109</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="J108" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">108</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="J107" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">107</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="J106" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">106</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="J105" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">105</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="J104" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">104</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="J103" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">103</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="J102" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">102</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="J101" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">101</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="" src="../../../assets/boleto/images /movie/seat01-booked.png" alt="seat">
                                                    <span class="sit-num1">J</span>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="front-seat">
                                            <ul>
                                                <li class="single-seat">
                                                    <img id="J2" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">2</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="J4" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">4</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="J6" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">6</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="J8" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">8</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="J10" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">10</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="J12" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">12</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="J14" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">14</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="J16" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">16</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="J18" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">18</span>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <span>J</span>
                                </li>
                                <li class="seat-line">
                                    <span>K</span>
                                    <ul class="seat--area">
                                        <li class="front-seat">
                                            <ul>
                                                <li class="single-seat">
                                                    <img id="K17" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">17</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="K15" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">15</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="K13" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">13</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="K11" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">11</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="K9" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">9</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="K7" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">7</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="K5" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">5</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="K3" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">3</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="K1" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">1</span>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="front-seat">
                                            <ul>
                                                <li class="single-seat">
                                                    <img id="" src="../../../assets/boleto/images /movie/seat01-booked.png" alt="seat">
                                                    <span class="sit-num1">K</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="K125" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">125</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="K124" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">124</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="K123" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">123</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="K122" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">122</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="K121" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">121</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="K120" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">120</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="K119" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">119</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="K118" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">118</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="K117" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">117</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="K116" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">116</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="K115" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">115</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="K114" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">114</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="K113" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">113</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="K112" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">112</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="K111" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">111</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="K110" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">110</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="K109" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">109</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="K108" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">108</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="K107" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">107</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="K106" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">106</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="K105" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">105</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="K104" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">104</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="K103" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">103</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="K102" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">102</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="K101" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">101</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="" src="../../../assets/boleto/images /movie/seat01-booked.png" alt="seat">
                                                    <span class="sit-num1">K</span>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="front-seat">
                                            <ul>
                                                <li class="single-seat">
                                                    <img id="K2" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">2</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="K4" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">4</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="K6" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">6</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="K8" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">8</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="K10" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">10</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="K12" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">12</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="K14" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">14</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="K16" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">16</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="K18" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">18</span>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <span>K</span>
                                </li>
                                <li class="seat-line">
                                    <span>L</span>
                                    <ul class="seat--area">
                                        <li class="front-seat">
                                            <ul>
                                                <li class="single-seat">
                                                    <img id="L17" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">17</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="L15" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">15</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="L13" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">13</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="L11" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">11</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="L9" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">9</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="L7" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">7</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="L5" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">5</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="L3" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">3</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="L1" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">1</span>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="front-seat">
                                            <ul>
                                                <li class="single-seat">
                                                    <img id="" src="../../../assets/boleto/images /movie/seat01-booked.png" alt="seat">
                                                    <span class="sit-num1">L</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="L126" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">126</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="L125" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">125</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="L124" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">124</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="L123" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">123</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="L122" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">122</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="L121" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">121</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="L120" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">120</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="L119" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">119</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="L118" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">118</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="L117" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">117</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="L116" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">116</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="L115" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">115</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="L114" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">114</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="L113" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">113</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="L112" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">112</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="L111" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">111</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="L110" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">110</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="L109" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">109</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="L108" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">108</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="L107" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">107</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="L106" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">106</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="L105" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">105</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="L104" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">104</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="L103" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">103</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="L102" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">102</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="L101" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">101</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="" src="../../../assets/boleto/images /movie/seat01-booked.png" alt="seat">
                                                    <span class="sit-num1">L</span>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="front-seat">
                                            <ul>
                                                <li class="single-seat">
                                                    <img id="L2" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">2</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="L4" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">4</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="L6" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">6</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="L8" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">8</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="L10" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">10</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="L12" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">12</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="L14" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">14</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="L16" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">16</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="L18" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">18</span>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <span>L</span>
                                </li>
                                <li class="seat-line">
                                    <span>M</span>
                                    <ul class="seat--area">
                                        <li class="front-seat">
                                            <ul>
                                                <li class="single-seat">
                                                    <img id="M17" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">17</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="M15" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">15</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="M13" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">13</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="M11" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">11</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="M9" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">9</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="M7" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">7</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="M5" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">5</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="M3" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">3</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="M1" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">1</span>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="front-seat">
                                            <ul>
                                                <li class="single-seat">
                                                    <img id="" src="../../../assets/boleto/images /movie/seat01-booked.png" alt="seat">
                                                    <span class="sit-num1">M</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="M128" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">128</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="M127" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">127</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="M126" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">126</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="M125" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">125</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="M124" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">124</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="M123" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">123</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="M122" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">122</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="M121" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">121</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="M120" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">120</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="M119" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">119</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="M118" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">118</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="M117" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">117</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="M116" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">116</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="M115" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">115</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="M114" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">114</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="M113" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">113</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="M112" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">112</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="M111" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">111</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="M110" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">110</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="M109" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">109</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="M108" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">108</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="M107" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">107</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="M106" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">106</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="M105" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">105</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="M104" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">104</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="M103" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">103</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="M102" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">102</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="M101" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">101</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="" src="../../../assets/boleto/images /movie/seat01-booked.png" alt="seat">
                                                    <span class="sit-num1">M</span>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="front-seat">
                                            <ul>
                                                <li class="single-seat">
                                                    <img id="M2" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">2</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="M4" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">4</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="M6" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">6</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="M8" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">8</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="M10" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">10</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="M12" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">12</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="M14" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">14</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="M16" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">16</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="M18" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">18</span>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <span>M</span>
                                </li>
                                <li class="seat-line">
                                    <span>N</span>
                                    <ul class="seat--area">
                                        <li class="front-seat">
                                            <ul>
                                                <li class="single-seat">
                                                    <img id="N17" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">17</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="N15" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">15</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="N13" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">13</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="N11" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">11</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="N9" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">9</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="N7" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">7</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="N5" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">5</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="N3" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">3</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="N1" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">1</span>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="front-seat">
                                            <ul>
                                                <li class="single-seat">
                                                    <img id="" src="../../../assets/boleto/images /movie/seat01-booked.png" alt="seat">
                                                    <span class="sit-num1">N</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="N129" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">129</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="N128" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">128</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="N127" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">127</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="N126" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">126</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="N125" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">125</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="N124" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">124</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="N123" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">123</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="N122" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">122</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="N121" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">121</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="N120" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">120</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="N119" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">119</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="N118" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">118</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="N117" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">117</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="N116" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">116</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="N115" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">115</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="N114" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">114</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="N113" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">113</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="N112" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">112</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="N111" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">111</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="N110" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">110</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="N109" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">109</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="N108" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">108</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="N107" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">107</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="N106" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">106</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="N105" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">105</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="N104" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">104</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="N103" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">103</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="N102" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">102</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="N101" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">101</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="" src="../../../assets/boleto/images /movie/seat01-booked.png" alt="seat">
                                                    <span class="sit-num1">N</span>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="front-seat">
                                            <ul>
                                                <li class="single-seat">
                                                    <img id="N2" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">2</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="N4" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">4</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="N6" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">6</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="N8" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">8</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="N10" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">10</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="N12" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">12</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="N14" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">14</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="N16" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">16</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="N18" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">18</span>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <span>N</span>
                                </li>
                                <li class="seat-line">
                                    <span>O</span>
                                    <ul class="seat--area">
                                        <li class="front-seat">
                                            <ul>
                                                <li class="single-seat">
                                                    <img id="O17" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">17</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="O15" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">15</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="O13" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">13</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="O11" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">11</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="O9" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">9</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="O7" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">7</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="O5" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">5</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="O3" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">3</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="O1" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">1</span>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="front-seat">
                                            <ul>
                                                <li class="single-seat">
                                                    <img id="" src="../../../assets/boleto/images /movie/seat01-booked.png" alt="seat">
                                                    <span class="sit-num1">O</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="O130" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">130</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="O129" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">129</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="O128" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">128</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="O127" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">127</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="O126" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">126</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="O125" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">125</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="O124" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">124</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="O123" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">123</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="O122" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">122</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="O121" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">121</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="O120" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">120</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="O119" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">119</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="O118" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">118</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="O117" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">117</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="O116" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">116</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="O115" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">115</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="O114" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">114</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="O113" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">113</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="O112" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">112</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="O111" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">111</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="O110" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">110</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="O109" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">109</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="O108" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">108</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="O107" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">107</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="O106" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">106</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="O105" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">105</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="O104" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">104</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="O103" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">103</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="O102" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">102</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="O101" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">101</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="" src="../../../assets/boleto/images /movie/seat01-booked.png" alt="seat">
                                                    <span class="sit-num1">O</span>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="front-seat">
                                            <ul>
                                                <li class="single-seat">
                                                    <img id="O2" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">2</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="O4" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">4</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="O6" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">6</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="O8" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">8</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="O10" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">10</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="O12" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">12</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="O14" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">14</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="O16" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">16</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="O18" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">18</span>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <span>O</span>
                                </li>
                                <li class="seat-line">
                                    <span>P</span>
                                    <ul class="seat--area">
                                        <li class="front-seat">
                                            <ul>
                                                <li class="single-seat">
                                                    <img id="P17" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">17</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="P15" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">15</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="P13" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">13</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="P11" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">11</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="P9" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">9</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="P7" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">7</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="P5" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">5</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="P3" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">3</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="P1" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">1</span>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="front-seat">
                                            <ul>
                                                <li class="single-seat">
                                                    <img id="" src="../../../assets/boleto/images /movie/seat01-booked.png" alt="seat">
                                                    <span class="sit-num1">P</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="P131" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">131</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="P130" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">130</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="P129" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">129</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="P128" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">128</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="P127" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">127</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="P126" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">126</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="P125" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">125</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="P124" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">124</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="P123" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">123</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="P122" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">122</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="P121" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">121</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="P120" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">120</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="P119" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">119</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="P118" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">118</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="P117" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">117</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="P116" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">116</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="P115" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">115</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="P114" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">114</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="P113" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">113</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="P112" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">112</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="P111" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">111</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="P110" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">110</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="P109" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">109</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="P108" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">108</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="P107" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">107</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="P106" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">106</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="P105" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">105</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="P104" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">104</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="P103" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">103</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="P102" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">102</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="P101" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">101</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="" src="../../../assets/boleto/images /movie/seat01-booked.png" alt="seat">
                                                    <span class="sit-num1">P</span>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="front-seat">
                                            <ul>
                                                <li class="single-seat">
                                                    <img id="P2" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">2</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="P4" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">4</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="P6" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">6</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="P8" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">8</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="P10" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">10</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="P12" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">12</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="P14" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">14</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="P16" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">16</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="P18" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">18</span>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <span>P</span>
                                </li>
                                <li class="seat-line">
                                    <span>Q</span>
                                    <ul class="seat--area">
                                        <li class="front-seat">
                                            <ul>
                                                <li class="single-seat">
                                                    <img id="Q15" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">15</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="Q13" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">13</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="Q11" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">11</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="Q9" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">9</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="Q7" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">7</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="Q5" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">5</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="Q3" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">3</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="Q1" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">1</span>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="front-seat">
                                            <ul>
                                                <li class="single-seat">
                                                    <img id="" src="../../../assets/boleto/images /movie/seat01-booked.png" alt="seat">
                                                    <span class="sit-num1">Q</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="Q132" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">132</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="Q131" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">131</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="Q130" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">130</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="Q129" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">129</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="Q128" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">128</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="Q127" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">127</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="Q126" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">126</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="Q125" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">125</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="Q124" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">124</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="Q123" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">123</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="Q122" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">122</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="Q121" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">121</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="Q120" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">120</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="Q119" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">119</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="Q118" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">118</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="Q117" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">117</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="Q116" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">116</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="Q115" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">115</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="Q114" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">114</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="Q113" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">113</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="Q112" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">112</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="Q111" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">111</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="Q110" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">110</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="Q109" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">109</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="Q108" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">108</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="Q107" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">107</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="Q106" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">106</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="Q105" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">105</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="Q104" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">104</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="Q103" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">103</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="Q102" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">102</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="Q101" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">101</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="" src="../../../assets/boleto/images /movie/seat01-booked.png" alt="seat">
                                                    <span class="sit-num1">Q</span>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="front-seat">
                                            <ul>
                                                <li class="single-seat">
                                                    <img id="Q2" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">2</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="Q4" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">4</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="Q6" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">6</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="Q8" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">8</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="Q10" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">10</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="Q12" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">12</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="Q14" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">14</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="Q16" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">16</span>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <span>Q</span>
                                </li>
                                <li class="seat-line">
                                    <span>R</span>
                                    <ul class="seat--area">
                                        <li class="front-seat">
                                            <ul>
                                                <li class="single-seat">
                                                    <img id="R15" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">15</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="R13" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">13</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="R11" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">11</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="R9" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">9</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="R7" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">7</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="R5" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">5</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="R3" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">3</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="R1" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">1</span>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="front-seat">
                                            <ul>
                                                <li class="single-seat">
                                                    <img id="" src="../../../assets/boleto/images /movie/seat01-booked.png" alt="seat">
                                                    <span class="sit-num1">R</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="R133" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">133</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="R132" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">132</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="R131" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">131</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="R130" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">130</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="R129" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">129</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="R128" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">128</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="R127" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">127</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="R126" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">126</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="R125" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">125</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="R124" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">124</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="R123" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">123</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="R122" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">122</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="R121" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">121</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="R120" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">120</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="R119" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">119</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="R118" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">118</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="R117" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">117</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="R116" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">116</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="R115" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">115</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="R114" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">114</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="R113" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">113</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="R112" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">112</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="R111" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">111</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="R110" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">110</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="R109" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">109</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="R108" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">108</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="R107" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">107</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="R106" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">106</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="R105" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">105</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="R104" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">104</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="R103" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">103</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="R102" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">102</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="R101" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">101</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="" src="../../../assets/boleto/images /movie/seat01-booked.png" alt="seat">
                                                    <span class="sit-num1">R</span>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="front-seat">
                                            <ul>
                                                <li class="single-seat">
                                                    <img id="R2" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">2</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="R4" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">4</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="R6" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">6</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="R8" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">8</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="R10" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">10</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="R12" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">12</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="R14" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">14</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="R16" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">16</span>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <span>R</span>
                                </li>
                                <li class="seat-line">
                                    <span>S</span>
                                    <ul class="seat--area">
                                        <li class="front-seat">
                                            <ul>
                                                <li class="single-seat">
                                                    <img id="S15" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">15</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="S13" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">13</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="S11" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">11</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="S9" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">9</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="S7" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">7</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="S5" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">5</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="S3" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">3</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="S1" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">1</span>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="front-seat">
                                            <ul>
                                                <li class="single-seat">
                                                    <img id="" src="../../../assets/boleto/images /movie/seat01-booked.png" alt="seat">
                                                    <span class="sit-num1">S</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="S134" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">134</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="S133" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">133</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="S132" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">132</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="S131" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">131</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="S130" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">130</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="S129" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">129</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="S128" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">128</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="S127" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">127</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="S126" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">126</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="S125" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">125</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="S124" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">124</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="S123" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">123</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="S122" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">122</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="S121" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">121</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="S120" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">120</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="S119" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">119</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="S118" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">118</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="S117" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">117</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="S116" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">116</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="S115" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">115</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="S114" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">114</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="S113" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">113</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="S112" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">112</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="S111" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">111</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="S110" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">110</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="S109" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">109</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="S108" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">108</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="S107" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">107</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="S106" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">106</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="S105" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">105</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="S104" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">104</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="S103" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">103</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="S102" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">102</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="S101" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">101</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="" src="../../../assets/boleto/images /movie/seat01-booked.png" alt="seat">
                                                    <span class="sit-num1">S</span>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="front-seat">
                                            <ul>
                                                <li class="single-seat">
                                                    <img id="S2" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">2</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="S4" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">4</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="S6" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">6</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="S8" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">8</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="S10" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">10</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="S12" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">12</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="S14" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">14</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="S16" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">16</span>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <span>S</span>
                                </li>
                                <li class="seat-line">
                                    <span>T</span>
                                    <ul class="seat--area">
                                        <li class="front-seat">
                                            <ul>
                                                <li class="single-seat">
                                                    <img id="T15" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">15</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="T13" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">13</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="T11" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">11</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="T9" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">9</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="T7" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">7</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="T5" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">5</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="T3" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">3</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="T1" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">1</span>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="front-seat">
                                            <ul>
                                                <li class="single-seat">
                                                    <img id="" src="../../../assets/boleto/images /movie/seat01-booked.png" alt="seat">
                                                    <span class="sit-num1">T</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="T135" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">135</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="T134" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">134</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="T133" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">133</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="T132" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">132</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="T131" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">131</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="T130" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">130</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="T129" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">129</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="T128" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">128</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="T127" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">127</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="T126" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">126</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="T125" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">125</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="T124" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">124</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="T123" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">123</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="T122" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">122</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="T121" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">121</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="T120" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">120</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="T119" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">119</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="T118" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">118</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="T117" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">117</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="T116" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">116</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="T115" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">115</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="T114" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">114</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="T113" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">113</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="T112" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">112</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="T111" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">111</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="T110" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">110</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="T109" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">109</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="T108" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">108</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="T107" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">107</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="T106" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">106</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="T105" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">105</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="T104" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">104</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="T103" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">103</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="T102" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">102</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="T101" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">101</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="" src="../../../assets/boleto/images /movie/seat01-booked.png" alt="seat">
                                                    <span class="sit-num1">T</span>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="front-seat">
                                            <ul>
                                                <li class="single-seat">
                                                    <img id="T2" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">2</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="T4" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">4</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="T6" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">6</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="T8" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">8</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="T10" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">10</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="T12" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">12</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="T14" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">14</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="T16" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">16</span>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <span>T</span>
                                </li>
                                <li class="seat-line">
                                    <span>U</span>
                                    <ul class="seat--area">
                                        <li class="front-seat">
                                            <ul>
                                                <li class="single-seat">
                                                    <img id="U15" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">15</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="U13" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">13</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="U11" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">11</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="U9" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">9</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="U7" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">7</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="U5" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">5</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="U3" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">3</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="U1" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">1</span>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="front-seat">
                                            <ul>
                                                <li class="single-seat">
                                                    <img id="" src="../../../assets/boleto/images /movie/seat01-booked.png" alt="seat">
                                                    <span class="sit-num1">U</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="U136" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">136</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="U135" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">135</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="U134" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">134</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="U133" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">133</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="U132" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">132</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="U131" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">131</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="U130" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">130</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="U129" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">129</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="U128" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">128</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="U127" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">127</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="U126" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">126</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="U125" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">125</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="U124" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">124</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="U123" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">123</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="U122" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">122</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="U121" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">121</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="U120" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">120</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="U119" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">119</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="U118" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">118</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="U117" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">117</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="U116" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">116</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="U115" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">115</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="U114" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">114</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="U113" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">113</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="U112" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">112</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="U111" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">111</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="U110" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">110</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="U109" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">109</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="U108" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">108</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="U107" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">107</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="U106" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">106</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="U105" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">105</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="U104" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">104</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="U103" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">103</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="U102" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">102</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="U101" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">101</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="" src="../../../assets/boleto/images /movie/seat01-booked.png" alt="seat">
                                                    <span class="sit-num1">U</span>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="front-seat">
                                            <ul>
                                                <li class="single-seat">
                                                    <img id="U2" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">2</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="U4" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">4</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="U6" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">6</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="U8" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">8</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="U10" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">10</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="U12" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">12</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="U14" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">14</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="U16" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">16</span>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <span>T</span>
                                </li>
                                <li class="seat-line">
                                    <span>V</span>
                                    <ul class="seat--area">
                                        <li class="front-seat">
                                            <ul>
                                                <li class="single-seat">
                                                    <img id="V15" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">15</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="V13" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">13</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="V11" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">11</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="V9" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">9</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="V7" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">7</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="V5" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">5</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="V3" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">3</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="V1" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">1</span>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="front-seat">
                                            <ul>
                                                <li class="single-seat">
                                                    <img id="" src="../../../assets/boleto/images /movie/seat01-booked.png" alt="seat">
                                                    <span class="sit-num1">V</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="V136" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">136</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="V135" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">135</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="V134" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">134</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="V133" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">133</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="V132" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">132</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="V131" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">131</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="V130" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">130</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="V129" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">129</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="V128" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">128</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="V127" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">127</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="V126" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">126</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="V125" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">125</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="V124" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">124</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="V123" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">123</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="V122" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">122</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="V121" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">121</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="V120" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">120</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="V119" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">119</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="V118" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">118</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="V117" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">117</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="V116" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">116</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="V115" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">115</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="V114" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">114</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="V113" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">113</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="V112" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">112</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="V111" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">111</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="V110" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">110</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="V109" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">109</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="V108" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">108</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="V107" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">107</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="V106" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">106</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="V105" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">105</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="V104" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">104</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="V103" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">103</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="V102" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">102</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="V101" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">101</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="" src="../../../assets/boleto/images /movie/seat01-booked.png" alt="seat">
                                                    <span class="sit-num1">V</span>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="front-seat">
                                            <ul>
                                                <li class="single-seat">
                                                    <img id="V2" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">2</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="V4" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">4</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="V6" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">6</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="V8" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">8</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="V10" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">10</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="V12" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">12</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="V14" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">14</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="V16" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">16</span>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <span>T</span>
                                </li>
                                <li class="seat-line">
                                    <span>W</span>
                                    <ul class="seat--area">
                                        <li class="front-seat">
                                            <ul>
                                                <li class="single-seat">
                                                    <img id="" src="../../../assets/boleto/images /movie/seat01-booked.png" alt="seat">
                                                    <span class="sit-num1">W</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="W137" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">137</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="W136" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">136</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="W135" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">135</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="W134" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">134</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="W133" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">133</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="W132" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">132</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="W131" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">131</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="W130" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">130</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="W129" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">129</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="W128" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">128</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="W127" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">127</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="W126" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">126</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="W125" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">125</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="W124" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">124</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="W123" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">123</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="W122" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">122</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="W121" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">121</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="W120" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">120</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="W119" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">119</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="W118" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">118</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="W117" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">117</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="W116" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">116</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="W115" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">115</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="W114" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">114</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="W113" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">113</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="W112" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">112</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="W111" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">111</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="W110" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">110</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="W109" src="../../../assets/boleto/images /movie/image (3).png" alt="seat">
                                                    <span class="sit-num">109</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="W108" src="../../../assets/boleto/images /movie/image (3).png" alt="seat">
                                                    <span class="sit-num">108</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="W107" src="../../../assets/boleto/images /movie/seat01.png" alt="seat">
                                                    <span class="sit-num">107</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="W106" src="../../../assets/boleto/images /movie/image (2).png" alt="seat">
                                                    <span class="sit-num">106</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="W105" src="../../../assets/boleto/images /movie/image (2).png" alt="seat">
                                                    <span class="sit-num">105</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="W104" src="../../../assets/boleto/images /movie/image (1).png" alt="seat">
                                                    <span class="sit-num">104</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="W103" src="../../../assets/boleto/images /movie/image (1).png" alt="seat">
                                                    <span class="sit-num">103</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="W102" src="../../../assets/boleto/images /movie/image (1).png" alt="seat">
                                                    <span class="sit-num">102</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="W101" src="../../../assets/boleto/images/movie/image (1).png" alt="seat">
                                                    <span class="sit-num">101</span>
                                                </li>
                                                <li class="single-seat">
                                                    <img id="" src="../../../assets/boleto/images /movie/seat01-booked.png" alt="seat">
                                                    <span class="sit-num1">W</span>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <span>W</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="copyright">
            <p class="pull-left sm-pull-reset">
                <span>Copyright <span class="copyright">&copy;</span> 2016 </span>
                <span>THEMES LAB</span>.
                <span>All rights reserved. </span>
            </p>
            <p class="pull-right sm-pull-reset">
                <span><a href="#" class="m-r-10">Support</a> | <a href="#" class="m-l-10 m-r-10">Terms of use</a> | <a href="#" class="m-l-10">Privacy Policy</a></span>
            </p>
        </div>
    </div>
</div>