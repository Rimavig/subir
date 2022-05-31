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
    }
    
}
if($resultado=="true"){
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
                    $('.tablePagos').removeClass('hide');
                    $('.clientes').addClass('hide');
                    setTimeout(function(){
                        inputSelect();
                    },200);
                    var table = $('#table-reservas').DataTable();
                    table.ajax.reload(); 
                    var table1 = $('#table-pagos').DataTable();
                    table1.ajax.reload();    
                });
                $('#totalCaja').load('./tables/facturacion/total.php',function() {   
                });
            </script>
            <?php
        }else if ( $tipo=="estado"){
            ?>
            <script type="text/javascript"> 
            var n = noty({
                text        : '<div class="alert alert-success "><p><strong>Se edito la caja correctamente</p></div>',
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
                    $('.clientes').addClass('hide');
                    setTimeout(function(){
                        inputSelect();
                    },200);
                    var table = $('#table-reservas').DataTable();
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
            
            </script>
            <?php
        }else if ( $tipo=="eliminarT"){
            ?>
            <script type="text/javascript"> 
                var table = $('#table-reservas').DataTable();
                table.ajax.reload();  
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
                var table = $('#table-reservas').DataTable();
                table.ajax.reload();  
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
            </script>
            <?php
        }else if ( $tipo=="eliminarT"){
            ?>
            <script type="text/javascript"> 
                var table = $('#table-reservas').DataTable();
                table.ajax.reload();  
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
        }
    }
}
?>
<div class="alsaaerta" id="alertasaa" >
    </div>
    <script type="text/javascript"> 
    $(".abrirCaja").prop("disabled",false);
</script>