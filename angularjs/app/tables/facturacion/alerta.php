<?php
include ("../../conect.php");
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
        $re = $client->abrirCaja($_SESSION["id"],$_SESSION["usuario"]); 
        $resultado = "".$re;
    }else if ( $tipo=="editar"){
        $id=$_POST["var1"];
        $re = $client->editarCaja($_SESSION["id"],$id); 
        $resultado = "".$re;
    }else if ( $tipo=="estado"){
        $estado=$_POST["estado"];
        $id=$_POST["id"];
        $re = $client->updateEstadoCaja($id,$estado,$_SESSION["usuario"]);
        $resultado = "".$re;
    }else if ( $tipo=="reserva"){
        $id_evento=$_POST["id_evento"];
        $id_funcion=$_POST["id_funcion"];
        $principal=$_POST["principal"];
        $cantidad=$_POST["cantidad"];
        $asiento=$_POST["asiento"];
        $re = $client->insertReserva($id_funcion,$id_evento,$_SESSION["id"],$asiento,$principal,$_SESSION["usuario"]);
        $resultado = "".$re;
    }else if ( $tipo=="deleteReserva"){
        $id_reserva=$_POST["id"];
        $re = $client->deleteReserva($id_reserva,$_SESSION["id"]);
        $resultado = "".$re;
    }else if ( $tipo=="aumentarT"){
        $re = $client->actualizarReserva($_SESSION["id"]);
        $resultado = "".$re;
    }else if ( $tipo=="eliminarT"){
        $re = $client->deleteReserva("T",$_SESSION["id"]);
        $resultado = "".$re;
    }else if ( $tipo=="agregarPago"){
        $FpagoG=$_POST["FpagoG"];
        $Ttarjeta=$_POST["Ttarjeta"];
        $Tbanco=$_POST["Tbanco"];
        $lote=$_POST["lote"];
        $monto=$_POST["monto"];
        $re = $client->insertEsperaPago($_SESSION["id"], $FpagoG, $Ttarjeta, $Tbanco, $lote, $monto, $_SESSION["usuario"]);
        $resultado = "".$re;
    }else if ( $tipo=="deletePago"){
        $id_reserva=$_POST["id"];
        $re = $client->deleteEsperaPago($_SESSION["id"],$id_reserva);
        $resultado = "".$re;
    }else if ( $tipo=="puntosAD"){
        $donacionT=$_POST["donacionT"];
        $puntos_acumulados=$_POST["puntos_acumulados"];
        $idUsuario=$_POST["idUsuario"];
        $re = $client->insertDonacion($_SESSION["id"],$idUsuario,$donacionT,$puntos_acumulados);
        $resultado = "".$re;
    }else if ( $tipo=="aplicar_promo"){
        $promo=$_POST["promo"];
        $tipoP=$_POST["tipoP"];
        $eventos=$_POST["comando"];
        $idFacturacionG=$_POST["idFacturacionG"];
        $re = $client->insertPromoCaja($_SESSION["id"],$idFacturacionG,$promo,$tipoP,$eventos);
        $resultado = "".$re;
    }else if ( $tipo=="deleteReservaP"){
        $id_promo=$_POST["id"];
        $re = $client->deletePromoCaja($_SESSION["id"], $id_promo,"",$_SESSION["id"]);
        $resultado = "".$re;
    }else if ( $tipo=="insertCompra"){
        $idUsuario=$_POST["idUsuario"];
        $idFacturacionG=$_POST["idFacturacionG"];
        $CajaN=$_POST["CajaN"];
        $correo=$_POST["correo"];
        $re = $client->insertCompraTaquilla($_SESSION["id"], $idUsuario,$idFacturacionG,$correo,$CajaN, $_SESSION["usuario"]);
        $resultado = "".$re;
    }else if ( $tipo=="facturar"){
        $id=$_POST["id"];
        $re = $client->Facturacion($id, $_SESSION["usuario"]);
        $resultado = "".$re;
    }else if ( $tipo=="notaCredito"){
        $id=$_POST["id"];
        $re = $client->Facturacion($id, "NC");
        $resultado = "".$re;
    }
    
}
if($tipo=="insertCompra"){
    if (strpos($resultado, ';;') !== false) {
        $usuarios= explode(';;',$resultado);
        $text="";
        foreach($usuarios as $llave => $valores) {
            if($valores !=""){
                $text=$text."window.open('http://104.198.222.134/plantilla/pdf/ticket".$valores.".pdf','_blank');";   
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
                var table = $('#table-cajas').DataTable();
                table.ajax.reload();
            </script>
            <?php
        }else if ( $tipo=="editar"){
            $id=$_POST["var1"];    
            ?>
            <script type="text/javascript"> 

                $('.page-spinner-loader').removeClass('hide');
                $('#tablaTaquilla').load('./tables/facturacion/caja-venta.php', {var1:<?php echo $id;?>},function() { 
                    $('.tablaCajas').addClass('hide');   
                    $('.page-spinner-loader').addClass('hide');
                    $('.UsuarioCaja').removeClass('hide');
                    $('.CompraT').removeClass('hide');
                    $('.tablaTaquilla').removeClass('hide');
                    $('.tablaReserva').removeClass('hide');
                    $('.tablaReservaP').removeClass('hide');
                    $('.tablePagos').removeClass('hide');
                    $('.clientes').addClass('hide');
                    setTimeout(function(){
                        inputSelect();
                    },200);
                    var table = $('#table-reservas').DataTable();
                    table.ajax.reload(); 
                    var tableP = $('#table-reservasP').DataTable();
                    tableP.ajax.reload();  
                    var table1 = $('#table-pagos').DataTable();
                    table1.ajax.reload();   
                    $('#totalCaja').load('./tables/facturacion/total.php',function() {   
                    }); 
                    $('#CajaId').load('./tables/facturacion/CajaId.php',{var1:<?php echo $id;?>}, function() {   
                    }); 
                });
                
            </script>
            <?php
        }else if ( $tipo=="estado"){
            ?>
            <script type="text/javascript"> 
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
                var table = $('#table-cajas').DataTable();
                table.ajax.reload();
            </script>
            <?php
        }else if ( $tipo=="reserva"){
            ?>
            <script type="text/javascript"> 
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
                });
                CounterInit(600);
                $('#totalCaja').load('./tables/facturacion/total.php',function() {   
                    
                });
            </script>
            <?php
        }else if ( $tipo=="deleteReserva"){
            ?>
            <script type="text/javascript"> 
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
                var table = $('#table-reservas').DataTable();
                table.ajax.reload();  
                var tableP = $('#table-reservasP').DataTable();
                tableP.ajax.reload();    
                CounterInit(600);
                $('#totalCaja').load('./tables/facturacion/total.php',function() {    
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
                $('#totalCaja').load('./tables/facturacion/total.php',function() {   
                });
                var table1 = $('#table-pagos').DataTable();
                table1.ajax.reload();    
            </script>
            <?php
        }else if ( $tipo=="deletePago"){
            ?>
            <script type="text/javascript"> 
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
                $('#totalCaja').load('./tables/facturacion/total.php',function() {   
                    
                });
                var table1 = $('#table-pagos').DataTable();
                table1.ajax.reload();    
            </script>
            <?php
        }else if ( $tipo=="puntosAD"){
            ?>
            <script type="text/javascript"> 
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
                $('#totalCaja').load('./tables/facturacion/total.php',function() {   
                    
                });
                var table1 = $('#table-pagos').DataTable();
                table1.ajax.reload();    
                $('#Cusuarios').modal('hide'); // abrir
            </script>
            <?php
        }else if ( $tipo=="aplicar_promo"){
            ?>
            <script type="text/javascript"> 
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
                var tableP = $('#table-reservasP').DataTable();
                tableP.ajax.reload();    
                CounterInit(600);
                $('#totalCaja').load('./tables/facturacion/total.php',function() {    
                });
                $('#Cusuarios').modal('hide'); // abrir
            </script>
            <?php
        }else if ( $tipo=="deleteReservaP"){
            ?>
            <script type="text/javascript"> 
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
                var table = $('#table-reservas').DataTable();
                table.ajax.reload();  
                var tableP = $('#table-reservasP').DataTable();
                tableP.ajax.reload();    
                CounterInit(600);
                $('#totalCaja').load('./tables/facturacion/total.php',function() {    
                });
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
        }else if ( $tipo=="facturar" | $tipo=="notaCredito"){
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
                $(".facturar").prop("disabled",false);
                $(".notaCredito").prop("disabled",false);
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