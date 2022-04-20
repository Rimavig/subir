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
if (isset($_POST["localidadG"])) {
    $categoria=$_POST["categoria"];
    $nombre=$_POST["nombre"];
    $descripcion=$_POST["descripcion"];
    $fechaI=$_POST["fechaI"];
    $fechaT=$_POST["fechaT"];
    $localidadG=$_POST["localidadG"];
    $localidadW=$_POST["localidadW"];
    $localidadA=$_POST["localidadA"];
    $localidadT=$_POST["localidadT"];
    $tipo=$_POST["tipo"];
    $id_evento=$_POST["id_evento"];
    $id_platea=$_POST["id_platea"];
    $estado=$_POST["amigos"];
    if ( $tipo=="boletos"){
        $desde=$_POST["desde"];
        $hasta=$_POST["hasta"];
        $descuento=$_POST["descuento"];
        if ( isset($_POST["editar"])){
            $idPromocion=$_POST["idPromocion"];
            $idPromocion2=$_POST["idPromocion2"];
            $re = $client->updatePromocion($idPromocion,$idPromocion2,$nombre,$descripcion,$estado,$id_evento,$id_platea,$localidadG,$localidadW,$localidadA,$localidadT,$categoria,$fechaI,$fechaT,$tipo,$desde,$hasta,$descuento,$_SESSION["usuario"]); 
        }else{
            $re = $client->insertPromocion($nombre,$descripcion,$estado,$id_evento,$id_platea,$localidadG,$localidadW,$localidadA,$localidadT,$categoria,$fechaI,$fechaT,$tipo,$desde,$hasta,$descuento,$_SESSION["usuario"]); 
        }
        $resultado = "".$re;
    }else if ( $tipo=="Fpago"){
        $compra=$_POST["compra"];
        $pago=$_POST["pago"];
        if ( isset($_POST["editar"])){
            $idPromocion=$_POST["idPromocion"];
            $idPromocion2=$_POST["idPromocion2"];
            $re = $client->updatePromocion($idPromocion,$idPromocion2,$nombre,$descripcion,$estado,$id_evento,$id_platea,$localidadG,$localidadW,$localidadA,$localidadT,$categoria,$fechaI,$fechaT,$tipo,$compra,$pago,"",$_SESSION["usuario"]);
        }else{
            $re = $client->insertPromocion($nombre,$descripcion,$estado,$id_evento,$id_platea,$localidadG,$localidadW,$localidadA,$localidadT,$categoria,$fechaI,$fechaT,$tipo,$compra,$pago,"",$_SESSION["usuario"]);
        }
        $resultado = "".$re;
    }else if (  $tipo=="FormaPago"){
        $tarjeta=$_POST["tarjeta"];
        $banco=$_POST["banco"];
        $descuento=$_POST["descuento"];
        if ( isset($_POST["editar"])){
            $idPromocion=$_POST["idPromocion"];
            $idPromocion2=$_POST["idPromocion2"];
            $re = $client->updatePromocion($idPromocion,$idPromocion2,$nombre,$descripcion,$estado,$id_evento,$id_platea,$localidadG,$localidadW,$localidadA,$localidadT,$categoria,$fechaI,$fechaT,$tipo,$tarjeta,$banco,$descuento,$_SESSION["usuario"]); 
        }else{
            $re = $client->insertPromocion($nombre,$descripcion,$estado,$id_evento,$id_platea,$localidadG,$localidadW,$localidadA,$localidadT,$categoria,$fechaI,$fechaT,$tipo,$tarjeta,$banco,$descuento,$_SESSION["usuario"]); 
        }
        $resultado = "".$re;
    }else if ( $tipo=="Cpromocional"){
        $codigo=$_POST["codigo"];
        $descuento=$_POST["descuento"];
        if ( isset($_POST["editar"])){
            $idPromocion=$_POST["idPromocion"];
            $idPromocion2=$_POST["idPromocion2"];
            $re = $client->updatePromocion($idPromocion,$idPromocion2,$nombre,$descripcion,$estado,$id_evento,$id_platea,$localidadG,$localidadW,$localidadA,$localidadT,$categoria,$fechaI,$fechaT,$tipo,$codigo,"",$descuento,$_SESSION["usuario"]);
        }else{
            $re = $client->insertPromocion($nombre,$descripcion,$estado,$id_evento,$id_platea,$localidadG,$localidadW,$localidadA,$localidadT,$categoria,$fechaI,$fechaT,$tipo,$codigo,"",$descuento,$_SESSION["usuario"]);
        }        
        $resultado = "".$re;
    }else if ( $tipo=="cruzados"){
        $id_evento2=$_POST["id_evento2"];
        $cantidad1=$_POST["cantidad1"];
        $cantidad2=$_POST["cantidad2"];
        if ( isset($_POST["editar"])){
            $idPromocion=$_POST["idPromocion"];
            $idPromocion2=$_POST["idPromocion2"];
            $re = $client->updatePromocion($idPromocion,$idPromocion2,$nombre,$descripcion,$estado,$id_evento,$id_platea,$localidadG,$localidadW,$localidadA,$localidadT,$categoria,$fechaI,$fechaT,$tipo,$id_evento2,$cantidad1,$cantidad2,$_SESSION["usuario"]);
        }else{
            $re = $client->insertPromocion($nombre,$descripcion,$estado,$id_evento,$id_platea,$localidadG,$localidadW,$localidadA,$localidadT,$categoria,$fechaI,$fechaT,$tipo,$id_evento2,$cantidad1,$cantidad2,$_SESSION["usuario"]);
        }        
        $resultado = "".$re;
    }

}else{
    if (isset($_POST["id1"])) {
        $id=$_POST["id"];
        $id1=$_POST["id1"];
        $re = $client->deleteCortesia($id,$id1,$_SESSION["usuario"]);
        $resultado = "".$re;
        
    } 
    if (isset($_POST["funcion"])) {
        $funcion=$_POST["funcion"];
        $platea=$_POST["platea"];
        $tipo=$_POST["tipo"];
        $tipoR=$_POST["tipoR"];
        $nombre=$_POST["nombre"];
        $correo=$_POST["correo"];
        $descripcion=$_POST["descripcion"];
        
    } 
    if (isset($_POST["hasta"])) {
        $fila=$_POST["fila"];
        $desde=$_POST["desde"];
        $hasta=$_POST["hasta"];
        $re = $client->bloqueo($funcion,$platea,$tipo,$fila,$desde,$hasta,$nombre,$correo,$descripcion,$tipoR,$_SESSION["usuario"]);
        $resultado = "".$re;
        
    }
    if (isset($_POST["lateral"])) {
        $lateral=$_POST["lateral"];
        $re = $client->bloqueo($funcion,$platea,$tipo,$lateral,"","",$nombre,$correo,$descripcion,$tipoR,$_SESSION["usuario"]);
        $resultado = "".$re;
    }
    if (isset($_POST["cantidad"])) {
        $cantidad=$_POST["cantidad"];
        $re = $client->bloqueo($funcion,$platea,$tipo,"",$cantidad,"",$nombre,$correo,$descripcion,$tipoR,$_SESSION["usuario"]);
        $resultado = "".$re;
    }
    if (isset($_POST["asiento"])) {
        $fila=$_POST["fila"];
        $desde=$_POST["asiento"];
        $re = $client->bloqueo($funcion,$platea,$tipo,$fila,$desde,"",$nombre,$correo,$descripcion,$tipoR,$_SESSION["usuario"]);
        $resultado = "".$re;
    }
}
if (isset($_POST["estado"])) {
    $estado=$_POST["estado"];
    $id_tipoPromo=$_POST["id_tipoPromo"];
    $tipo=$_POST["tipo"];
    $re = $client->updateEstadoPromocion($id_tipoPromo,$estado,$tipo,$tipoR,$_SESSION["usuario"]);
    $resultado = "".$re;
}

if($resultado=="true"){
    if(isset($_POST["promo"])){
        if ( isset($_POST["id"])){
            $id=$_POST["id"];
        }
        if ( isset($_POST["id_evento"])){
            $id=$_POST["id_evento"];
        }
        if ( isset($_POST["editar"])){
            ?>
            <script type="text/javascript"> 
                var n = noty({
                text        : '<div class="alert alert-warning "><p><strong>Se edito la promoción correctamente</p></div>',
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
                $('#Cpromocion').modal('hide'); 
            </script>
            
            <?php
        } else if (isset($_POST["estado"])) {
            if($tipo=="B"){
                ?>
                <script type="text/javascript"> 
                    var n = noty({
                        text        : '<div class="alert alert-warning "><p><strong>Se eliminó correctamente</p></div>',
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
            }else {
                ?>
                <script type="text/javascript"> 
                    var n = noty({
                        text        : '<div class="alert alert-warning "><p><strong>Se edito correctamente</p></div>',
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
            } 
        }else{
            ?>
            <script type="text/javascript"> 
                var n = noty({
                text        : '<div class="alert alert-warning "><p><strong>Se creo la promoción correctamente</p></div>',
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
                $('#Cpromocion').modal('hide'); 
            </script>
            <?php
        }
        if ( $tipo=="boletos"){
            ?> 
            <script type="text/javascript"> 
                $('#pago').load('./tables/procesos/tab_pago.php', {var1:<?php echo $id; ?>},function() {    
                });
            </script>
            <?php
        }else if ( $tipo=="Fpago"){
            ?> 
            <script type="text/javascript"> 
                $('#compra').load('./tables/procesos/tab_compra.php', {var1:<?php echo $id; ?>},function() {    
                });
            </script>
            <?php
        }else if (  $tipo=="FormaPago"){
            ?> 
            <script type="text/javascript"> 
                $('#tarjeta').load('./tables/procesos/tab_tarjeta.php', {var1:<?php echo $id; ?>},function() {    
                });
            </script>
            <?php
        }else if ( $tipo=="Cpromocional"){
            ?> 
            <script type="text/javascript"> 
                $('#codigo').load('./tables/procesos/tab_codigo.php', {var1:<?php echo $id; ?>},function() { 
                    $('.page-spinner-loader').addClass('hide');
                });
            </script>
            <?php
        }else if ( $tipo=="cruzados"){
            ?> 
            <script type="text/javascript"> 
                $('#cruzados').load('./tables/procesos/tab_cruzados.php', {var1:<?php echo $id; ?>},function() { 
                    $('.page-spinner-loader').addClass('hide');
                });
            </script>
            <?php
        }   
    }else{
        if (isset($_POST["localidadG"])) {
            if ( isset($_POST["editar"])){
                ?>
                <script type="text/javascript"> 
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Se edito la promoción correctamente</p></div>',
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
                     location.reload();
                </script>
                <?php
            }else{
                ?>
                <script type="text/javascript"> 
                   var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Se creo la promoción correctamente</p></div>',
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
                     location.reload();
                </script>
                <?php
            }  
        }  
        if (isset($_POST["estado"])) {
            if($tipo=="B"){
                ?>
                <script type="text/javascript"> 
                    var n = noty({
                        text        : '<div class="alert alert-warning "><p><strong>Se eliminó correctamente</p></div>',
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
                     location.reload();
                </script>
                <?php
            }else {
                ?>
                <script type="text/javascript"> 
                    var n = noty({
                        text        : '<div class="alert alert-warning "><p><strong>Se edito correctamente</p></div>',
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
                     location.reload();
                </script>
                <?php
            } 
        }
        if (isset($_POST["id1"])) {
            ?>
            <script type="text/javascript"> 
               var n = noty({
                text        : '<div class="alert alert-warning "><p><strong>Se eliminó correctamente</p></div>',
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
                 location.reload();
            </script>
            <?php
            
        } else{
            if($tipoR=="B"){
                ?>
                <script type="text/javascript"> 
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Se bloqueo correctamente</p></div>',
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
                     location.reload();
                </script>
                <?php
            }else if($tipoR=="D"){
                ?>
                <script type="text/javascript"> 
                    var n = noty({
                        text        : '<div class="alert alert-warning "><p><strong>Se desbloqueo correctamente</p></div>',
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
                     location.reload();
                </script>
                <?php
            }else if($tipoR=="C"){
                ?>
                <script type="text/javascript"> 
                    alert("Se creo cortesia correctamente");
                     location.reload();
                </script>
                <?php
            } 
        }
    }
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
    </script>
    <?php
}
?>
<div class="alsaaerta" id="alertasaa" >
    </div>
    <script type="text/javascript"> 
    $(".crear_promocion_general").prop("disabled",false);
    $(".editar_promocion_general").prop("disabled",false);
</script>