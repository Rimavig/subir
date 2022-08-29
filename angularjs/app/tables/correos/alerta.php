<?php
include ("../../conect.php");
include ("../../autenticacion.php");
include ("../../directorio.php");
include ("../../conect_correo.php");
$band=true;
$band2=false;
$resultado="";
$tipoR="";
$tipo="";
$id="";
if (isset($_POST["tipo"])) {
    $tipo=$_POST["tipo"];
    if ( $tipo=="guardarCorreo"){
        $id = $_POST["id"];
        $asunto=$_POST["asunto"];
        $telefono=$_POST["telefono"];
        $enlaceRedesSociales=$_POST["enlaceRedesSociales"];
        $descripcion1=$_POST["descripcion1"];
        $descripcion2=$_POST["descripcion2"];
        $direccion=$_POST["direccion"];
        $re = $client1->updateTemplate($id,"",$asunto,$descripcion1,"",$descripcion2,"",$enlaceRedesSociales,$telefono, $direccion, $_SESSION["usuario"]);
        $resultado = "".$re;
        $image = $_POST['Himagen'];
        $imagen = $_POST['imagen'];
        if ($resultado=="true"  && $image!=null){
            $img = str_replace('data:image/png;base64,', '', $image);
            $img = str_replace(' ', '+', $img);
            $path = $path_1.$imagenCorreo.$imagen.".png";
            $status = file_put_contents($path,base64_decode( $img));
        }
    }else if ( $tipo=="correoPrueba"){
        $id = $_POST["id"];
        $re = $client1->sendMail($id,"rvivanco@espol.edu.ec","1" ,"Correo de Prueba","12345");
        $resultado = "".$re;
    }
    
}
if($resultado=="true"){
    if(isset($_POST["tipo"])){
        $tipo=$_POST["tipo"];
        if ( $tipo=="guardarCorreo" ){
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
                $(".guardarCorreo").prop("disabled",false);
            </script>
            <?php
        }else if ( $tipo=="correoPrueba" ){
            ?>
            <script type="text/javascript"> 
            var n = noty({
                text        : '<div class="alert alert-success "><p><strong>Se envío correo correctamente</p></div>',
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
                $(".correoPrueba").prop("disabled",false);
            </script>
            <?php

        }
    }
}else{
    if (isset($_POST["tipo"])){
        $tipo=$_POST["tipo"];
        if (  $tipo=="guardarCorreo" | $tipo=="correoPrueba" ){
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
                $(".guardarCorreo").prop("disabled",false);
                $(".correoPrueba").prop("disabled",false);
            </script>
            <?php
        }else  if (  $tipo=="guardarQuienesF" | $tipo=="guardarMisionF" | $tipo=="guardarVisionF" ){
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
                $(".guardarQuienesF").prop("disabled",false);
                $(".guardarMisionF").prop("disabled",false);
                $(".guardarVisionF").prop("disabled",false);
            </script>
            <?php
        }
    }
}
?>