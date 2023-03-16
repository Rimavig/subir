<?php
include ("../../conect_taquilla.php");
include ("../../autenticacion.php");
include ("../../directorio.php");
$band=true;
$band2=false;
$resultado="";
$tipoR="";
$tipo="";
$id="";
if (isset($_POST["tipo"])) {
    $tipo=$_POST["tipo"];
    if ( $tipo=="abrirCaja"){
        $re = $client3->abrirCaja($_SESSION["id"],$_SESSION["usuario"]); 
        $resultado = "".$re;
    }else if ( $tipo=="editar"){
        $id=$_POST["var1"];
        $re = $client3->editarCaja($_SESSION["id"],$id); 
        $resultado = "".$re;
    }else if ( $tipo=="estado"){
        $estado=$_POST["estado"];
        $id=$_POST["id"];
        $re = $client3->updateEstadoCaja($id,$estado,$_SESSION["usuario"]);
        $resultado = "".$re;
    }else if ( $tipo=="reserva"){
        $id_evento=$_POST["id_evento"];
        $id_funcion=$_POST["id_funcion"];
        $principal=$_POST["principal"];
        $cantidad=$_POST["cantidad"];
        $asiento=$_POST["asiento"];
        $re = $client3->insertReserva($id_funcion,$id_evento,$_SESSION["id"],$asiento,$principal,$_SESSION["usuario"]);
        $resultado = "".$re;
    }else if ( $tipo=="deleteReserva"){
        $id_reserva=$_POST["id"];
        $re = $client3->deleteReserva($id_reserva,$_SESSION["id"]);
        $resultado = "".$re;
    }else if ( $tipo=="aumentarT"){
        $re = $client3->actualizarReserva($_SESSION["id"]);
        $resultado = "".$re;
    }else if ( $tipo=="eliminarT"){
        $re = $client3->deleteReserva("T",$_SESSION["id"]);
        $resultado = "".$re;
    }else if ( $tipo=="agregarPago"){
        $FpagoG=$_POST["FpagoG"];
        $Ttarjeta=$_POST["Ttarjeta"];
        $Tbanco=$_POST["Tbanco"];
        $lote=$_POST["lote"];
        $monto=$_POST["monto"];
        $re = $client3->insertEsperaPago($_SESSION["id"], $FpagoG, $Ttarjeta, $Tbanco, $lote, $monto, $_SESSION["usuario"]);
        $resultado = "".$re;
    }else if ( $tipo=="deletePago"){
        $id_reserva=$_POST["id"];
        $re = $client3->deleteEsperaPago($_SESSION["id"],$id_reserva);
        $resultado = "".$re;
    }else if ( $tipo=="puntosAD"){
        $donacionT=$_POST["donacionT"];
        $puntos_acumulados=$_POST["puntos_acumulados"];
        $idUsuario=$_POST["idUsuario"];
        $re = $client3->insertDonacion($_SESSION["id"],$idUsuario,$donacionT,$puntos_acumulados);
        $resultado = "".$re;
    }else if ( $tipo=="aplicar_promo"){
        $promo=$_POST["promo"];
        $tipoP=$_POST["tipoP"];
        $eventos=$_POST["comando"];
        $idFacturacionG=$_POST["idFacturacionG"];
        $re = $client3->insertPromoCaja($_SESSION["id"],$idFacturacionG,$promo,$tipoP,$eventos);
        $resultado = "".$re;
    }else if ( $tipo=="deleteReservaP"){
        $id_promo=$_POST["id"];
        $re = $client3->deletePromoCaja($_SESSION["id"], $id_promo,"",$_SESSION["id"]);
        $resultado = "".$re;
    }else if ( $tipo=="insertCompra"){
        $idUsuario=$_POST["idUsuario"];
        $idFacturacionG=$_POST["idFacturacionG"];
        $CajaN=$_POST["CajaN"];
        $correo=$_POST["correo"];
        $re = $client3->insertCompraTaquilla($_SESSION["id"], $idUsuario,$idFacturacionG,$correo,$CajaN, $_SESSION["usuario"]);
        $resultado = "".$re;
    }else if ( $tipo=="facturar"){
        $id=$_POST["id"];
        $re = $client3->Facturacion($id,"", "",$_SESSION["usuario"]);
        $resultado = "".$re;
    }else if ( $tipo=="updateNotaCredito"){
        $id=$_POST["id"];
        $re = $client3->Facturacion($id, "NCA","", $_SESSION["usuario"]);
        $resultado = "".$re;
    }else if ( $tipo=="notaCredito"){
        $id=$_POST["id"];
        $motivo=$_POST["motivo"];
        $re = $client3->Facturacion($id, "NC",$motivo, $_SESSION["usuario"]);
        $resultado = "".$re;
    }else if ( $tipo=="notaCreditoParcial"){
        $id=$_POST["id"];
        $motivo=$_POST["motivo"];
        $comando=$_POST["comando"];
        $re = $client3->updateGeneral("NCP",$id, $motivo,$comando,  $_SESSION["usuario"]);
        $resultado = "".$re;
    }else if ( $tipo=="deleteCompra"){
        $id=$_POST["id"];
        $re = $client3->updateGeneral("deleteCompra",$id,"B","",$_SESSION["usuario"]);
        $resultado = "".$re;
    }else if ( $tipo=="devolucion"){
        $id=$_POST["id"];
        $re = $client3->updateGeneral("devolucion",$id,"B","",$_SESSION["usuario"]);
        $resultado = "".$re;
    }else if ( $tipo=="anularFacura"){
        $id=$_POST["id"];
        $re = $client3->updateGeneral("anularFacura",$id,"B","",$_SESSION["usuario"]);
        $resultado = "".$re;
    }else if ($_POST["tipo"]==="editarF") {
        $nombre=$_POST["nombres"];
        $apellido=$_POST["apellidos"];
        $razon=$_POST["razon"];
        $tipoF=$_POST["tipoF"];
        $usuario=$_POST["usuario"];
        if($tipoF==="cedula"){
            $cedula=$_POST["cedula"];
        }else if($tipoF==="ruc"){
            $cedula=$_POST["ruc"];
        }else{
            $cedula=$_POST["pasaporte"];
        }
        $direccion=$_POST["direccion"];
        $correo=$_POST["correo"];
        $id=$_POST["id"];

        $re = $client3->updateFacturacion($nombre,$apellido,$tipoF,$cedula,$razon,$direccion, $correo,"A",$usuario,$id, $_SESSION["usuario"]);
        $resultado = "".$re;
    }else if ($_POST["tipo"]==="editarF2") {
        
        $correo=$_POST["correo"];
        $id=$_POST["idCompra"];
        $re = $client3->updateGeneral("factura_correo",$_POST["idCompra"],$_POST["correo"],"",$_SESSION["usuario"]);
        $resultado = "".$re;
    } else if ( $tipo=="correoR"){
        $id = $_POST['id'];
        $re = $client3->getGeneral("correoRF",$id);
        $resultado = "".$re;
    }else if ( $tipo=="correoR1"){
        $id = $_POST['id'];
        $re = $client3->getGeneral("correoRF",$id);
        $resultado = "".$re;
    }
}
if($tipo=="insertCompra"){
    if (strpos($resultado, ';;') !== false) {
        $usuarios= explode(';;',$resultado);
        $text="";
        foreach($usuarios as $llave => $valores) {
            if($valores !=""){
                $text=$text."window.open('https://teatrosanchezaguilar.org/plantilla/pdf/ticket".$valores.".pdf','_blank');";   
            }
        }   
        ?>
        <script type="text/javascript"> 
        var n = noty({
            text        : '<div class="alert alert-success "><p><strong>Se creó compra correctamente</p></div>',
            layout      : 'topCenter', //or left, right, bottom-right...
            theme       : 'made',
            type        : 'error',
            maxVisible  : 5,
            animation   : {
                open  : 'animated bounceIn',
                close : 'animated bounceOut'
            },
            timeout: 8000,
            buttons: [{
                            addClass: 'btn btn-primary', text: 'Ver Ticket', onClick: function ($noty) {
                                <?php echo $text;?>
                                $noty.close();
                            }
                        },{
                            addClass: 'btn btn-danger', text: 'Cancelar', onClick: function ($noty) {
                                $noty.close();
                            }
                        }
                    ],
            });
            var table = $('#table-reservas').DataTable();
            table.ajax.reload();  
            var tableP = $('#table-reservasP').DataTable();
            tableP.ajax.reload();    
            $('#totalCaja').load('./tables/facturacion/total.php',function() {    
            });
            $('.tablaCajas').removeClass('hide');   
            $('.page-spinner-loader').addClass('hide');
            $('.UsuarioCaja').addClass('hide');
            $('.CompraT').addClass('hide');
            $('.tablaTaquilla').addClass('hide');
            $('.tablaReserva').addClass('hide');
            $('.tablaReservaP').addClass('hide');
            $('.tablePagos').addClass('hide');
            $('.clientes').addClass('hide'); 
            var table = $('#table-cajas').DataTable();
            table.ajax.reload();
            $(".insertCompra").prop("disabled",false);
            $('#Cusuarios').load('./tables/facturacion/impresion.php',{promocion:promocion, tipo:tipo}, function() {    
            $('.page-spinner-loader').addClass('hide');
            $('.seleccionarF').prop("disabled",false); 
            $('#Cusuarios').modal('show'); // abrir
            
        });
        </script>
        <?php
    }else{
        ?>
            <script type="text/javascript"> 
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong><?php echo $resultado;?></p></div>',
                    layout      : 'topCenter', //or left, right, bottom-right...
                    theme       : 'made',
                    type        : 'error',
                    maxVisible  : 5,
                    animation   : {
                        open  : 'animated bounceIn',
                        close : 'animated bounceOut'
                    },
                    timeout: 3000,
                });
                $(".insertCompra").prop("disabled",false);
            </script>
            <?php
    }
}else if($resultado=="true"){
    if(isset($_POST["tipo"])){
        $tipo=$_POST["tipo"];
        if ( $tipo=="abrirCaja"){
            ?>
            <script type="text/javascript"> 
            var table = $('#table-cajas').DataTable();
            table.ajax.reload();
            var n = noty({
                text        : '<div class="alert alert-success "><p><strong>Se abrio la caja correctamente</p></div>',
                layout      : 'topCenter', //or left, right, bottom-right...
                theme       : 'made',
                type        : 'error',
                maxVisible  : 5,
                animation   : {
                    open  : 'animated bounceIn',
                    close : 'animated bounceOut'
                },
                timeout: 3000,
                });
                
            </script>
            <?php
        }else if ( $tipo=="editar"){
            $id=$_POST["var1"];    
            ?>
            <script type="text/javascript"> 
                $('.page-spinner-loader').removeClass('hide');
                $('#tablaTaquilla').load('./tables/facturacion/caja-venta.php', {var1:<?php echo $id;?>},function() { 
                    
                    setTimeout(function(){
                        inputSelect();
                    },200);
                    var table = $('#table-reservas').DataTable();
                    table.ajax.reload(); 
                    var tableP = $('#table-reservasP').DataTable();
                    tableP.ajax.reload();  
                    var table1 = $('#table-pagos').DataTable();
                    table1.ajax.reload();   
                    $('#UsuarioCaja').load('./tables/facturacion/caja-usuario_vacia.php',function() {    
                        $('.UsuarioCaja').removeClass('hide');
                    }); 
                    $('#totalCaja').load('./tables/facturacion/total.php',function() {   
                        $('.tablePagos').removeClass('hide');
                        $('.tablaCajas').addClass('hide');   
                        $('.CompraT').removeClass('hide');
                        $('.tablaTaquilla').removeClass('hide');
                        $('.tablaReserva').removeClass('hide');
                        $('.tablaReservaP').removeClass('hide');
                        $('.clientes').addClass('hide');
                        $('.page-spinner-loader').addClass('hide');
                    }); 
                    $('#CajaId').load('./tables/facturacion/CajaId.php',{var1:<?php echo $id;?>}, function() {   
                    }); 
                });
                
            </script>
            <?php
        }else if ( $tipo=="estado"){
            ?>
            <script type="text/javascript"> 
            var table = $('#table-cajas').DataTable();
            table.ajax.reload();
            var n = noty({
                text        : '<div class="alert alert-success "><p><strong>Se editó la caja correctamente</p></div>',
                layout      : 'topCenter', //or left, right, bottom-right...
                theme       : 'made',
                type        : 'error',
                maxVisible  : 5,
                animation   : {
                    open  : 'animated bounceIn',
                    close : 'animated bounceOut'
                },
                timeout: 8000,
                });
            </script>
            <?php
        }else if ( $tipo=="reserva"){
            ?>
            <script type="text/javascript"> 
                $('.page-spinner-loader').removeClass('hide');
                $('#totalCaja').load('./tables/facturacion/total.php',function() {   
                    
                });
                $('#tablaTaquilla').load('./tables/facturacion/caja-venta.php', {var1:<?php echo $id_evento;?>},function() { 
                    $('.tablaCajas').addClass('hide');   
                    $('.page-spinner-loader').addClass('hide');
                    $('.UsuarioCaja').removeClass('hide');
                    $('.CompraT').removeClass('hide');
                    $('.tablaTaquilla').removeClass('hide');
                    $('.tablaReserva').removeClass('hide');
                    $('.tablaReservaP').removeClass('hide');
                    $('.clientes').addClass('hide');
                    setTimeout(function(){
                        inputSelect();
                    },200);
                    var table = $('#table-reservas').DataTable();
                    table.ajax.reload();  
                    var table = $('#table-reservasP').DataTable();
                    table.ajax.reload();  
                    var n = noty({
                        text        : '<div class="alert alert-success "><p><strong>Se agregó con éxito</p></div>',
                        layout      : 'topCenter', //or left, right, bottom-right...
                        theme       : 'made',
                        type        : 'error',
                        maxVisible  : 5,
                        animation   : {
                            open  : 'animated bounceIn',
                            close : 'animated bounceOut'
                        },
                        timeout: 3000,
                    });
                });
                CounterInit(600);

            </script>
            <?php
        }else if ( $tipo=="deleteReserva"){
            ?>
            <script type="text/javascript"> 
                var table = $('#table-reservas').DataTable();
                table.ajax.reload();  
                var tableP = $('#table-reservasP').DataTable();
                tableP.ajax.reload();    
                CounterInit(600);
                $('#totalCaja').load('./tables/facturacion/total.php',function() {    
                });
                var n = noty({
                text        : '<div class="alert alert-success "><p><strong>Se eliminó con éxito</p></div>',
                layout      : 'topCenter', //or left, right, bottom-right...
                theme       : 'made',
                type        : 'error',
                maxVisible  : 5,
                animation   : {
                    open  : 'animated bounceIn',
                    close : 'animated bounceOut'
                },
                timeout: 3000,
                });
            </script>
            <?php
        }else if ( $tipo=="aumentarT"){
            ?>
            <script type="text/javascript"> 
            var n = noty({
                text        : '<div class="alert alert-success "><p><strong>Se aumento el tiempo de reserva con éxito</p></div>',
                layout      : 'topCenter', //or left, right, bottom-right...
                theme       : 'made',
                type        : 'error',
                maxVisible  : 5,
                animation   : {
                    open  : 'animated bounceIn',
                    close : 'animated bounceOut'
                },
                timeout: 3000,
                });
                $(".aumentarT").prop("disabled",false);
                var table = $('#table-reservas').DataTable();
                table.ajax.reload();  
                var tableP = $('#table-reservasP').DataTable();
                tableP.ajax.reload();  
                $('#totalCaja').load('./tables/facturacion/total.php',function() {    
                });
            </script>
            <?php
        }else if ( $tipo=="eliminarT"){
            ?>
            <script type="text/javascript"> 
                var table = $('#table-reservas').DataTable();
                table.ajax.reload();  
                var tableP = $('#table-reservasP').DataTable();
                tableP.ajax.reload();   
                $('#totalCaja').load('./tables/facturacion/total.php',function() {   
                    
                });
                var table1 = $('#table-pagos').DataTable();
                table1.ajax.reload();   
            </script>
            <?php
        }else if ( $tipo=="agregarPago"){
            ?>
            <script type="text/javascript"> 
                $('.page-spinner-loader').removeClass('hide');
                $('#totalCaja').load('./tables/facturacion/total.php',function() {   
                    $('.page-spinner-loader').addClass('hide');
                    var table1 = $('#table-pagos').DataTable();
                    table1.ajax.reload();    
                    var n = noty({
                    text        : '<div class="alert alert-success "><p><strong>Se ingreso pago con éxito</p></div>',
                    layout      : 'topCenter', //or left, right, bottom-right...
                    theme       : 'made',
                    type        : 'error',
                    maxVisible  : 5,
                    animation   : {
                        open  : 'animated bounceIn',
                        close : 'animated bounceOut'
                    },
                    timeout: 3000,
                    });

                });
               
            </script>
            <?php
        }else if ( $tipo=="deletePago"){
            ?>
            <script type="text/javascript"> 
                 $('.page-spinner-loader').removeClass('hide');
                $('#totalCaja').load('./tables/facturacion/total.php',function() {    
                    var table1 = $('#table-pagos').DataTable();
                    $('.page-spinner-loader').addClass('hide');
                    table1.ajax.reload(); 
                    var n = noty({
                    text        : '<div class="alert alert-success "><p><strong>Se eliminó con éxito</p></div>',
                    layout      : 'topCenter', //or left, right, bottom-right...
                    theme       : 'made',
                    type        : 'error',
                    maxVisible  : 5,
                    animation   : {
                        open  : 'animated bounceIn',
                        close : 'animated bounceOut'
                    },
                    timeout: 3000,
                    }); 
                });
   
            </script>
            <?php
        }else if ( $tipo=="puntosAD"){
            ?>
            <script type="text/javascript"> 
            
                var table1 = $('#table-pagos').DataTable();
                table1.ajax.reload();    
                $('.page-spinner-loader').removeClass('hide');
                $('#totalCaja').load('./tables/facturacion/total.php',function() {   
                    $('.page-spinner-loader').addClass('hide');
                    $('#Cusuarios').modal('hide'); // abrir
                    var n = noty({
                    text        : '<div class="alert alert-success "><p><strong>Se ingreso con éxito</p></div>',
                    layout      : 'topCenter', //or left, right, bottom-right...
                    theme       : 'made',
                    type        : 'error',
                    maxVisible  : 5,
                    animation   : {
                        open  : 'animated bounceIn',
                        close : 'animated bounceOut'
                    },
                    timeout: 3000,
                    });
                });
            </script>
            <?php
        }else if ( $tipo=="aplicar_promo"){
            ?>
            <script type="text/javascript"> 
            
                var tableP = $('#table-reservasP').DataTable();
                tableP.ajax.reload();    
                CounterInit(600);
                $('.page-spinner-loader').removeClass('hide');
                $('#totalCaja').load('./tables/facturacion/total.php',function() {
                    $('.page-spinner-loader').addClass('hide');    
                    $('#Cusuarios').modal('hide'); // abrir
                    var n = noty({
                    text        : '<div class="alert alert-success "><p><strong>Se ingreso promoción con éxito</p></div>',
                    layout      : 'topCenter', //or left, right, bottom-right...
                    theme       : 'made',
                    type        : 'error',
                    maxVisible  : 5,
                    animation   : {
                        open  : 'animated bounceIn',
                        close : 'animated bounceOut'
                    },
                    timeout: 3000,
                    });
                });
                
            </script>
            <?php
        }else if ( $tipo=="deleteReservaP"){
            ?>
            <script type="text/javascript"> 
            
                var table = $('#table-reservas').DataTable();
                table.ajax.reload();  
                var tableP = $('#table-reservasP').DataTable();
                tableP.ajax.reload();    
                CounterInit(600);
                $('.page-spinner-loader').removeClass('hide');
                $('#totalCaja').load('./tables/facturacion/total.php',function() {    
                    $('.page-spinner-loader').addClass('hide');
                    var n = noty({
                    text        : '<div class="alert alert-success "><p><strong>Se eliminó con éxito</p></div>',
                    layout      : 'topCenter', //or left, right, bottom-right...
                    theme       : 'made',
                    type        : 'error',
                    maxVisible  : 5,
                    animation   : {
                        open  : 'animated bounceIn',
                        close : 'animated bounceOut'
                    },
                    timeout: 3000,
                    });
                });
                
            </script>
            <?php
        }else if ( $tipo=="deleteCompra"){
            ?>
            <script type="text/javascript"> 
                var table = $('#table-ventas').DataTable();
                table.ajax.reload();
                $('.infoCompraMV').addClass('hide');   
                $('.taquillaMV').addClass('hide');
                $('.taquillaG').removeClass('hide');
                var n = noty({
                text        : '<div class="alert alert-success "><p><strong>Se eliminó con éxito</p></div>',
                layout      : 'topCenter', //or left, right, bottom-right...
                theme       : 'made',
                type        : 'error',
                maxVisible  : 5,
                animation   : {
                    open  : 'animated bounceIn',
                    close : 'animated bounceOut'
                },
                timeout: 3000,
                });
            </script>
            <?php
        }else if ( $tipo=="editarF"){
            if($_POST["idCompra"]!="0"){
                $correo=$_POST["correo"];
                $client3->updateGeneral("factura_correo",$_POST["idCompra"],$_POST["correo"],"",$_SESSION["usuario"]);
                ?>
                <script type="text/javascript"> 
                    $('.page-spinner-loader').removeClass('hide');
                    var table = $('#table-ventas').DataTable();
                    table.ajax.reload();
                    var idCompra=<?php echo $_POST["idCompra"];?> ;
                    $('.infoCompraMV').load('./tables/facturacion/info_compra.php', {var1:idCompra, var2:"editarVC"},function() {    
                        $('.page-spinner-loader').addClass('hide');
                        $('.infoCompraMV').removeClass('hide');   
                        $('.taquillaMV').addClass('hide');
                        $('.taquillaG').addClass('hide');
                        var n = noty({
                            text        : '<div class="alert alert-success "><p><strong>Se editó con éxito</p></div>',
                            layout      : 'topCenter', //or left, right, bottom-right...
                            theme       : 'made',
                            type        : 'error',
                            maxVisible  : 5,
                            animation   : {
                                open  : 'animated bounceIn',
                                close : 'animated bounceOut'
                            },
                            timeout: 3000,
                            });
                            $('#Cusuarios').modal('hide'); 
                    });
                

                    
                </script>
            <?php
            }else{
                ?>
                <script type="text/javascript"> 
                    $('.page-spinner-loader').removeClass('hide');
                    var table = $('#table-editable1').DataTable();
                    table.ajax.reload();
                    var n = noty({
                            text        : '<div class="alert alert-success "><p><strong>Se editó con éxito</p></div>',
                            layout      : 'topCenter', //or left, right, bottom-right...
                            theme       : 'made',
                            type        : 'error',
                            maxVisible  : 5,
                            animation   : {
                                open  : 'animated bounceIn',
                                close : 'animated bounceOut'
                            },
                            timeout: 3000,
                    });
                    $('#Cusuarios').modal('hide'); 
                </script>
                  <?php
            }
            
        }else if ( $tipo=="editarF2"){
            ?>
            <script type="text/javascript"> 
                 $('.page-spinner-loader').removeClass('hide');
                var idCompra=<?php echo $_POST["idCompra"];?> ;
                var table = $('#table-ventas').DataTable();
                table.ajax.reload();
                $('.infoCompraMV').load('./tables/facturacion/info_compra.php', {var1:idCompra, var2:"editarVC"},function() {    
                    $('.page-spinner-loader').addClass('hide');
                    $('.infoCompraMV').removeClass('hide');   
                    $('.taquillaMV').addClass('hide');
                    $('.taquillaG').addClass('hide');
                    var n = noty({
                    text        : '<div class="alert alert-success "><p><strong>Se editó con éxito</p></div>',
                    layout      : 'topCenter', //or left, right, bottom-right...
                    theme       : 'made',
                    type        : 'error',
                    maxVisible  : 5,
                    animation   : {
                        open  : 'animated bounceIn',
                        close : 'animated bounceOut'
                    },
                    timeout: 3000,
                    });
                    $('#Cusuarios').modal('hide'); 
                });
               
            </script>
            <?php
        }else if ( $tipo=="correoR"){
            ?>
            <script type="text/javascript"> 
                var table = $('#table-ventas').DataTable();
                table.ajax.reload();
                var n = noty({
                    text        : '<div class="alert alert-success "><p><strong>Se envió correo correctamente</p></div>',
                    layout      : 'topCenter', //or left, right, bottom-right...
                    theme       : 'made',
                    type        : 'error',
                    maxVisible  : 5,
                    animation   : {
                        open  : 'animated bounceIn',
                        close : 'animated bounceOut'
                    },
                    timeout: 3000,
                });
            </script>
            <?php
        }else if ( $tipo=="correoR1"){
            ?>
            <script type="text/javascript"> 
                var n = noty({
                    text        : '<div class="alert alert-success "><p><strong>Se envió correo correctamente</p></div>',
                    layout      : 'topCenter', //or left, right, bottom-right...
                    theme       : 'made',
                    type        : 'error',
                    maxVisible  : 5,
                    animation   : {
                        open  : 'animated bounceIn',
                        close : 'animated bounceOut'
                    },
                    timeout: 3000,
                });
                $(".correoR1").prop("disabled",false);
            </script>
            <?php
        }
    }
}else{
    if (isset($_POST["tipo"])){
        $tipo=$_POST["tipo"];
        if ( $tipo=="abrirCaja"){
            ?>
            <script type="text/javascript"> 
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong><?php echo $resultado;?></p></div>',
                    layout      : 'topCenter', //or left, right, bottom-right...
                    theme       : 'made',
                    type        : 'error',
                    maxVisible  : 5,
                    animation   : {
                        open  : 'animated bounceIn',
                        close : 'animated bounceOut'
                    },
                    timeout: 3000,
                });
                $(".abrirCaja").prop("disabled",false);
            </script>
            <?php
        }else if ( $tipo=="editar"){
            ?>
            <script type="text/javascript"> 
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong><?php echo $resultado;?></p></div>',
                    layout      : 'topCenter', //or left, right, bottom-right...
                    theme       : 'made',
                    type        : 'error',
                    maxVisible  : 5,
                    animation   : {
                        open  : 'animated bounceIn',
                        close : 'animated bounceOut'
                    },
                    timeout: 3000,
                });
                $(".editar").prop("disabled",false);
            </script>
            <?php
        }else if ( $tipo=="estado"){
            ?>
            <script type="text/javascript"> 
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong><?php echo $resultado;?></p></div>',
                    layout      : 'topCenter', //or left, right, bottom-right...
                    theme       : 'made',
                    type        : 'error',
                    maxVisible  : 5,
                    animation   : {
                        open  : 'animated bounceIn',
                        close : 'animated bounceOut'
                    },
                    timeout: 3000,
                });
                $(".editar").prop("disabled",false);
            </script>
            <?php
        }else if ( $tipo=="reserva"){
            ?>
            <script type="text/javascript"> 
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong><?php echo $resultado;?></p></div>',
                    layout      : 'topCenter', //or left, right, bottom-right...
                    theme       : 'made',
                    type        : 'error',
                    maxVisible  : 5,
                    animation   : {
                        open  : 'animated bounceIn',
                        close : 'animated bounceOut'
                    },
                    timeout: 3000,
                });
                $(".reserva").prop("disabled",false);
            </script>
            <?php
        }else if ( $tipo=="deleteReserva"){
            ?>
            <script type="text/javascript"> 
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong><?php echo $resultado;?></p></div>',
                    layout      : 'topCenter', //or left, right, bottom-right...
                    theme       : 'made',
                    type        : 'error',
                    maxVisible  : 5,
                    animation   : {
                        open  : 'animated bounceIn',
                        close : 'animated bounceOut'
                    },
                    timeout: 3000,
                });
                $(".deleteReserva").prop("disabled",false);
            </script>
            <?php
        }else if ( $tipo=="aumentarT"){
            ?>
            <script type="text/javascript"> 
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong><?php echo $resultado;?></p></div>',
                    layout      : 'topCenter', //or left, right, bottom-right...
                    theme       : 'made',
                    type        : 'error',
                    maxVisible  : 5,
                    animation   : {
                        open  : 'animated bounceIn',
                        close : 'animated bounceOut'
                    },
                    timeout: 3000,
                });
                $(".aumentarT").prop("disabled",false);
                var table = $('#table-reservas').DataTable();
                table.ajax.reload();  
                var tableP = $('#table-reservasP').DataTable();
                tableP.ajax.reload();  
            </script>
            <?php
        }else if ( $tipo=="eliminarT"){
            ?>
            <script type="text/javascript"> 
                var table = $('#table-reservas').DataTable();
                table.ajax.reload();  
                var tableP = $('#table-reservasP').DataTable();
                tableP.ajax.reload();  
                $('#totalCaja').load('./tables/facturacion/total.php',function() {    
                });
            </script>
            <?php
        }else if ( $tipo=="agregarPago"){
            ?>
            <script type="text/javascript"> 
                 var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong><?php echo $resultado;?></p></div>',
                    layout      : 'topCenter', //or left, right, bottom-right...
                    theme       : 'made',
                    type        : 'error',
                    maxVisible  : 5,
                    animation   : {
                        open  : 'animated bounceIn',
                        close : 'animated bounceOut'
                    },
                    timeout: 3000,
                });
                $(".agregarPago").prop("disabled",false);
                var table1 = $('#table-pagos').DataTable();
                table1.ajax.reload();    
            </script>
            <?php
        }else if ( $tipo=="deletePago"){
            ?>
            <script type="text/javascript"> 
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong><?php echo $resultado;?></p></div>',
                    layout      : 'topCenter', //or left, right, bottom-right...
                    theme       : 'made',
                    type        : 'error',
                    maxVisible  : 5,
                    animation   : {
                        open  : 'animated bounceIn',
                        close : 'animated bounceOut'
                    },
                    timeout: 3000,
                });
                $(".deletePago").prop("disabled",false);
                var table1 = $('#table-pagos').DataTable();
                table1.ajax.reload();    
            </script>
            <?php
        }else if ( $tipo=="puntosAD"){
            ?>
            <script type="text/javascript"> 
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong><?php echo $resultado;?></p></div>',
                    layout      : 'topCenter', //or left, right, bottom-right...
                    theme       : 'made',
                    type        : 'error',
                    maxVisible  : 5,
                    animation   : {
                        open  : 'animated bounceIn',
                        close : 'animated bounceOut'
                    },
                    timeout: 3000,
                });
                $(".puntosAD").prop("disabled",false);
            </script>
            <?php
        }else if ( $tipo=="aplicar_promo"){
            ?>
            <script type="text/javascript"> 
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong><?php echo $resultado;?></p></div>',
                    layout      : 'topCenter', //or left, right, bottom-right...
                    theme       : 'made',
                    type        : 'error',
                    maxVisible  : 5,
                    animation   : {
                        open  : 'animated bounceIn',
                        close : 'animated bounceOut'
                    },
                    timeout: 3000,
                });
                $(".aplicar_promo").prop("disabled",false);
            </script>
            <?php
        }else if ( $tipo=="deleteReservaP"){
            ?>
            <script type="text/javascript"> 
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong><?php echo $resultado;?></p></div>',
                    layout      : 'topCenter', //or left, right, bottom-right...
                    theme       : 'made',
                    type        : 'error',
                    maxVisible  : 5,
                    animation   : {
                        open  : 'animated bounceIn',
                        close : 'animated bounceOut'
                    },
                    timeout: 3000,
                });
                $(".deleteReservaP").prop("disabled",false);
            </script>
            <?php
        }else if ( $tipo=="facturar" | $tipo=="notaCredito" | $tipo=="updateNotaCredito"){
            ?>
            <script type="text/javascript"> 
                var table = $('#table-ventas').DataTable();
                table.ajax.reload();
                $('.infoCompraMV').addClass('hide');   
                $('.taquillaMV').addClass('hide');
                $('.taquillaG').removeClass('hide');
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong><?php echo $resultado;?></p></div>',
                    layout      : 'topCenter', //or left, right, bottom-right...
                    theme       : 'made',
                    type        : 'error',
                    maxVisible  : 5,
                    animation   : {
                        open  : 'animated bounceIn',
                        close : 'animated bounceOut'
                    },
                    timeout: 10000,
                });
                
                $(".facturar").prop("disablehided",false);
                $(".notaCredito").prop("disabled",false);
                $(".updateNotaCredito").prop("disabled",false);
                $('#Cusuarios').modal('hide'); // abrir
            </script>
            <?php
        }else if ( $tipo=="deleteCompra"){
            ?>
            <script type="text/javascript"> 
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong> No se puede Eliminar Compra</p></div>',
                    layout      : 'topCenter', //or left, right, bottom-right...
                    theme       : 'made',
                    type        : 'error',
                    maxVisible  : 5,
                    animation   : {
                        open  : 'animated bounceIn',
                        close : 'animated bounceOut'
                    },
                    timeout: 10000,
                });
                var table = $('#table-ventas').DataTable();
                table.ajax.reload();  
                $(".deleteCompra").prop("disabled",false);
            </script>
            <?php
        }else if ( $tipo=="devolucion"){
            ?>
            <script type="text/javascript"> 
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong><?php echo $resultado;?></p></div>',
                    layout      : 'topCenter', //or left, right, bottom-right...
                    theme       : 'made',
                    type        : 'error',
                    maxVisible  : 5,
                    animation   : {
                        open  : 'animated bounceIn',
                        close : 'animated bounceOut'
                    },
                    timeout: 10000,
                });
                var table = $('#table-ventas').DataTable();
                table.ajax.reload();  
                $(".devolucion").prop("disabled",false);
            </script>
            <?php
        }else if ( $tipo=="anularFacura"){
            ?>
            <script type="text/javascript"> 
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong><?php echo $resultado;?></p></div>',
                    layout      : 'topCenter', //or left, right, bottom-right...
                    theme       : 'made',
                    type        : 'error',
                    maxVisible  : 5,
                    animation   : {
                        open  : 'animated bounceIn',
                        close : 'animated bounceOut'
                    },
                    timeout: 10000,
                });
                var table = $('#table-ventas').DataTable();
                table.ajax.reload();  
                $(".anularFacura").prop("disabled",false);
            </script>
            <?php
        }else if ( $tipo=="editarF" |  $tipo=="editarF2" ){
            ?>
            <script type="text/javascript"> 
                 var n = noty({
                    text        : '<div class="alert alert-warning  "><p><strong>Error la facturación no se pudo editar</p></div>',
                    layout      : 'topRight', //or left, right, bottom-right...
                    theme       : 'made',
                    type        : 'error',
                    maxVisible  : 5,
                    animation   : {
                        open  : 'animated bounceIn',
                        close : 'animated bounceOut'
                    },
                    timeout: 3000,
                 });
                $(".editar_facturacion").prop("disabled",false);
                $(".editar_facturacion2").prop("disabled",false);
                 console.log(<?php echo $resultado;?>);
            </script>
            <?php
        }else if ( $tipo=="correoR" | $tipo=="correoR1"){
            ?>
            <script type="text/javascript"> 
                 var n = noty({
                    text        : '<div class="alert alert-warning  "><p><strong>Error no se envío  correo</p></div>',
                    layout      : 'topRight', //or left, right, bottom-right...
                    theme       : 'made',
                    type        : 'error',
                    maxVisible  : 5,
                    animation   : {
                        open  : 'animated bounceIn',
                        close : 'animated bounceOut'
                    },
                    timeout: 3000,
                 });
                $(".correoR").prop("disabled",false);
                $(".correoR1").prop("disabled",false);
                 console.log(<?php echo $resultado;?>);
            </script>
            <?php
        }
    }
    
}
?>
<div class="alsaaerta" id="alertasaa" >
    </div>
    <script type="text/javascript"> 
    $(".abrirCaja").prop("disabled",false);
    $(".editar").prop("disabled",false);
    $(".editar").prop("disabled",false);
    $(".reserva").prop("disabled",false);
    $(".deleteReserva").prop("disabled",false);
    $(".aumentarT").prop("disabled",false);
    $(".agregarPago").prop("disabled",false);
    $(".deletePago").prop("disabled",false);
    $(".aplicar_promo").prop("disabled",false);
    $(".puntosAD").prop("disabled",false);
    $(".deleteReservaP").prop("disabled",false);
    $(".insertCompra").prop("disabled",false);
</script>
<?php
$transport3->close();
?>