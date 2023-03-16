<?php
include ("../../conect.php");
include ("../../conect_dashboard.php");
include ("../../autenticacion.php");
include ("../../directorio.php");
$band=true;
$band2=false;
$resultado="";
$tipoR="";
$tipo="";
$id="";
$tipo2="";
if (isset($_POST["tipo"])) {
    $tipo=$_POST["tipo"];
    if ( $tipo=="crear_category"){
        $nombre=$_POST["nombre"];
        $color=$_POST["color"];
        $re = $client2->getGeneral4("crear_category",$nombre,$color,$_SESSION["usuario"]);
        $resultado = "".$re;
    }else if ( $tipo=="editar_category"){
        $id=$_POST["id"];
        $nombre=$_POST["nombre"];
        $color=$_POST["color"];
        $re = $client2->getGeneral5("editar_category",$id,$nombre,$color,$_SESSION["usuario"]);
        $resultado = "".$re;
    }else if ( $tipo=="crear_evento"){
        $fechaI=$_POST["fechaI"];
        $fechaF=$_POST["fechaF"];
        $nombre=$_POST["nombre"];
        $categoria=$_POST["categoria"];
        $re = $client2->getGeneral6("crear_evento",$nombre,$categoria,$fechaI,$fechaF,$_SESSION["usuario"]);
        $resultado = "".$re;
    }else if ( $tipo=="editar_evento"){
        $id=$_POST["id"];
        $fechaI=$_POST["fechaI"];
        $fechaF=$_POST["fechaF"];
        $nombre=$_POST["nombre"];
        $categoria=$_POST["categoria"];
        $re = $client2->getGeneral6($id,$nombre,$categoria,$fechaI,$fechaF,$_SESSION["usuario"]);
        $resultado = "".$re;
    }else if ( $tipo=="eliminar_evento"){
        $id=$_POST["id"];
        $re = $client2->getGeneral2("eliminar_evento",$id);
        $resultado = "".$re;
    }
    
}
if($resultado=="true"){
    $tipo=$_POST["tipo"];
    if($tipo=="crear_category"){
        ?>
        <script type="text/javascript"> 
            var n = noty({
            text        : '<div class="alert alert-success "><p><strong>Se creó correctamente</p></div>',
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
            $('.page-spinner-loader').removeClass('hide');
            $(".crear_category").prop("disabled",false);
            $('#external-events').load('./tables/calendario/categorias.php',function() {    
                $('#categoria').modal('hide');  
            });
           
            
        </script>
        
        <?php
    
    }else if($tipo=="editar_category"){
        ?>
        <script type="text/javascript"> 
            var n = noty({
            text        : '<div class="alert alert-success "><p><strong>Se editó correctamente</p></div>',
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
            $('.page-spinner-loader').removeClass('hide');
            $(".editar_category").prop("disabled",false); 
            $('#external-events').load('./tables/calendario/categorias.php',function() {    
                $('#categoria').modal('hide');  
            });
        </script>
        <?php
    }else if($tipo=="crear_evento"){
        ?>
        <script type="text/javascript"> 
            var n = noty({
            text        : '<div class="alert alert-success "><p><strong>Se creò correctamente</p></div>',
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
            $('.page-spinner-loader').removeClass('hide');
            $(".crear_evento").prop("disabled",false); 
            $('#calendar').fullCalendar( 'refetchEvents' );
            $('#categoria').modal('hide');  
        </script>
        <?php
    }else if($tipo=="editar_evento"){
        ?>
        <script type="text/javascript"> 
            var n = noty({
            text        : '<div class="alert alert-success "><p><strong>Se editò correctamente</p></div>',
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
            $('.page-spinner-loader').removeClass('hide');
            $(".editar_evento").prop("disabled",false); 
            $('#calendar').fullCalendar( 'refetchEvents' );
            $('#categoria').modal('hide');  
        </script>
        <?php
    }else if($tipo=="eliminar_evento"){
        ?>
        <script type="text/javascript"> 
            var n = noty({
            text        : '<div class="alert alert-success "><p><strong>Se eliminò correctamente</p></div>',
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
            $('.page-spinner-loader').removeClass('hide');
            $(".eliminar_evento").prop("disabled",false); 
            $('#calendar').fullCalendar( 'refetchEvents' );
            $('#categoria').modal('hide');  
        </script>
        <?php
    }
    
}else{
    $tipo=$_POST["tipo"];
    if($tipo=="crear_category"){
        ?>
        <script type="text/javascript"> 
            var n = noty({
                text        : '<div class="alert alert-warning "><p><strong>Error no se pudo crear</p></div>',
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
            $('.page-spinner-loader').removeClass('hide');
            $(".crear_category").prop("disabled",false);
        </script>
        <?php
    
    }else if($tipo=="editar_category"){
        ?>
        <script type="text/javascript"> 
            var n = noty({
                text        : '<div class="alert alert-warning "><p><strong>Error no se pudo editar</p></div>',
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
            $('.page-spinner-loader').removeClass('hide');
            $(".editar_category").prop("disabled",false);
        </script>
        <?php
    }else if($tipo=="crear_evento"){
        ?>
        <script type="text/javascript"> 
            var n = noty({
                text        : '<div class="alert alert-warning "><p><strong>Error no se pudo crear</p></div>',
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
            $('.page-spinner-loader').removeClass('hide');
            $(".crear_evento").prop("disabled",false);
        </script>
        <?php
    }else if($tipo=="editar_evento"){
        ?>
        <script type="text/javascript"> 
            var n = noty({
                text        : '<div class="alert alert-warning "><p><strong>Error no se pudo editar</p></div>',
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
            $('.page-spinner-loader').removeClass('hide');
            $(".editar_evento").prop("disabled",false);
        </script>
        <?php
    }else if($tipo=="eliminar_evento"){
        ?>
        <script type="text/javascript"> 
            var n = noty({
                text        : '<div class="alert alert-warning "><p><strong>Error no se pudo eliminar</p></div>',
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
            $('.page-spinner-loader').removeClass('hide');
            $(".eliminar_evento").prop("disabled",false);
        </script>
        <?php
    }
}
?>
<div class="alsaaerta" id="alertasaa" >
    </div>
<?php
$transport->close();
$transport2->close();
?>