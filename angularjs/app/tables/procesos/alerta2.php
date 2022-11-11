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
$tipo2="";
if (isset($_POST["tipo2"])) {
    $tipo2=$_POST["tipo2"];
    if($tipo2=="editar_contacto"){
        $nombres=$_POST["nombres"];
        $celular=$_POST["celular"];
        $telefono=$_POST["telefono"];
        $correo=$_POST["correo"];
        $pagina=$_POST["pagina"];
        $facebook=$_POST["facebook"];
        $instagram=$_POST["instagram"];
        $direccion=$_POST["direccion"];
        $twitter=$_POST["twitter"];
        $Whatsapp=$_POST["Whatsapp"];
        $Youtube=$_POST["Youtube"];
        $Linkedin=$_POST["Linkedin"];
        $re = $client->updateContacto($nombres,$celular,$telefono,$direccion, $correo,$pagina,$facebook,$instagram,$twitter,$Whatsapp, $Youtube, $Linkedin, $_SESSION["usuario"]);
        $resultado = "".$re;
    } else if($tipo2=="editar_fundacion"){
        $nombres=$_POST["nombres"];
        $descripcion1=$_POST["descripcion1"];
        $descripcion2=$_POST["descripcion2"];
        $precio1=$_POST["precio1"];
        $precio2=$_POST["precio2"];
        $precio3=$_POST["precio3"];
        $precio4=$_POST["precio4"];
        $precio5=$_POST["precio5"];
        $precio6=$_POST["precio6"];
        $re = $client->updateFundacion($nombres,$descripcion1,$descripcion2,$precio1, $precio2,$precio3,$precio4,$precio5,$precio6,$_SESSION["usuario"]);
        $resultado = "".$re;
    }else if($tipo2=="editar_informacion"){
        $informacionT=$_POST["informacionT"];
        $re = $client->updateInformacion($informacionT,$_SESSION["usuario"]);
        $resultado = "".$re;
    }else if($tipo2=="crear_pregunta"){
        $Cpregunta=$_POST["Cpregunta"];
        $Crespuesta=$_POST["Crespuesta"];
        $re = $client->insertPregunta($Cpregunta,$Crespuesta,$_SESSION["usuario"]);
        $resultado = "".$re;
    }else if($tipo2=="editar_pregunta"){
        $id=$_POST["id"];
        $Cpregunta=$_POST["Cpregunta"];
        $Crespuesta=$_POST["Crespuesta"];
        $re = $client->updatePregunta($id,$Cpregunta,$Crespuesta,$_SESSION["usuario"]);
        $resultado = "".$re;
    }else if($tipo2=="crear_beneficio"){
        $beneficio=$_POST["beneficio"];
        $re = $client->insertBeneficio($beneficio,$_SESSION["usuario"]);
        $resultado = "".$re;
    }else if($tipo2=="editar_beneficio"){
        $id=$_POST["id"];
        $beneficio=$_POST["beneficio"];
        $re = $client->updateBeneficio($id,$beneficio,$_SESSION["usuario"]);
        $resultado = "".$re;
    }else if($tipo2=="eliminarBeneficio"){
        $id=$_POST["id"];
        $re = $client->updateEstadoBeneficio($id,"B",$_SESSION["usuario"]);
        $resultado = "".$re;
    }else if($tipo2=="eliminarPregunta"){
        $id=$_POST["id"];
        $re = $client->updateEstadoPregunta($id,"B",$_SESSION["usuario"]);
        $resultado = "".$re;
    }

}
if (isset($_POST["tipo"])) {
    $tipo=$_POST["tipo"];
    if ( $tipo=="adminAmigosB"){
        $id=$_POST["id"];
        $factor=$_POST["factor"];
        $descuento=$_POST["descuento"];
        $re = $client->updateFactorAmigos($id,$factor,$descuento,$_SESSION["usuario"]);
        $resultado = "".$re;
    }
}
if($resultado=="true"){
    $tipo=$_POST["tipo"];
    $tipo2=$_POST["tipo2"];
    if($tipo=="editar"){
        ?>
        <script type="text/javascript"> 
            var n = noty({
            text        : '<div class="alert alert-success "><p><strong>Se edito correctamente</p></div>',
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
            $(".editar_contacto").prop("disabled",false);
            $(".editar_fundacion").prop("disabled",false);
            $(".editar_informacion").prop("disabled",false);
            $(".editar_pregunta").prop("disabled",false);
            $(".editar_beneficio").prop("disabled",false);
            $message="<?php echo $tipo2; ?>" ;
            if($message=="editar_informacion"){
                $('#informacion').load('./tables/procesos/tab_informacion.php',function() {  
                    $('#Camigos').modal('hide');   
                });
            }
            if($message=="editar_pregunta"){
                $('#preguntas').load('./tables/procesos/tab_preguntas.php',function() {  
                    $('#Camigos').modal('hide');   
                });
            }
            if($message=="editar_beneficio"){
                $('#beneficio').load('./tables/procesos/tab_beneficio.php',function() {  
                    $('#Camigos').modal('hide');   
                });
            }
        </script>
        
        <?php
    
    }else if($tipo=="crear"){
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
            $(".crear_pregunta").prop("disabled",false);
            $(".crear_beneficio").prop("disabled",false);
            $message="<?php echo $tipo2; ?>" ;
            if($message=="crear_pregunta"){
                $('#preguntas').load('./tables/procesos/tab_preguntas.php',function() {  
                    $('#Camigos').modal('hide');   
                });
            }
            if($message=="crear_beneficio"){
                $('#beneficio').load('./tables/procesos/tab_beneficio.php',function() {  
                    $('#Camigos').modal('hide');   
                });
            }
        </script>
        
        <?php
    
    }else if($tipo=="eliminar"){
        ?>
        <script type="text/javascript"> 
            var n = noty({
            text        : '<div class="alert alert-success "><p><strong>Se elimino correctamente</p></div>',
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
            $(".eliminarPregunta").prop("disabled",false);
            $(".eliminarBeneficio").prop("disabled",false);
            $message="<?php echo $tipo2; ?>" ;
            if($message=="eliminarPregunta"){
                $('#preguntas').load('./tables/procesos/tab_preguntas.php',function() {  
                    $('#Camigos').modal('hide');   
                });
            }
            if($message=="eliminarBeneficio"){
                $('#beneficio').load('./tables/procesos/tab_beneficio.php',function() {  
                    $('#Camigos').modal('hide');   
                });
            }
        </script>
        
        <?php
    
    }else if($tipo=="adminAmigosB"){
        ?>
        <script type="text/javascript"> 
            var n = noty({
            text        : '<div class="alert alert-success "><p><strong>Se edito correctamente</p></div>',
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
            $(".adminAmigosB").prop("disabled",false);
            $(".adminCumpleB").prop("disabled",false);
            $(".adminRegaloB").prop("disabled",false);
        </script>
        
        <?php
    
    }
}else{
    $tipo=$_POST["tipo"];
    if($tipo=="editar"){
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
            $(".editar_contacto").prop("disabled",false);
            $(".editar_fundacion").prop("disabled",false);
            $(".editar_informacion").prop("disabled",false);
            $(".editar_pregunta").prop("disabled",false);
            $(".editar_beneficio").prop("disabled",false);
        </script>
        <?php
    
    }else if($tipo=="crear"){
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
            $(".crear_pregunta").prop("disabled",false);
            $(".crear_beneficio").prop("disabled",false);

        </script>
        
        <?php
    
    }else if($tipo=="eliminar"){
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
            $(".eliminarPregunta").prop("disabled",false);
            $(".eliminarBeneficio").prop("disabled",false);

        </script>
        
        <?php
    
    }else if($tipo=="adminAmigosB"){
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
            $(".adminAmigosB").prop("disabled",false);
            $(".adminCumpleB").prop("disabled",false);
            $(".adminRegaloB").prop("disabled",false);
        </script>
        
        <?php
    
    }
}
?>
<div class="alsaaerta" id="alertasaa" >
    </div>