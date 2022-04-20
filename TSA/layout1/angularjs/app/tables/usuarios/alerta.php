<?php
include ("../../conect.php");
include ("../../autenticacion.php");
$band=true;

if (isset($_POST["nombres"])) {
    $nombre=$_POST["nombres"];
    $apellido=$_POST["apellidos"];
    $usuario=$_POST["usuario"];
    $cedula=$_POST["cedula"];
    $sexo=$_POST["sexo"];
    $correo=$_POST["correo"];
    $celular=$_POST["celular"];
    $fecha=$_POST["fecha"];
    $direccion=$_POST["direccion"];
}
//usuarios administradores
if (isset($_POST["perfil"])) {
    $idPerfil=$_POST["perfil"];
}
//usuarios Clientes
if (isset($_POST["amigos"])) {
    $amigos=$_POST["amigos"];
}

if (isset($_POST["estado"])) {

    $id=$_POST["id"];
    $estado=$_POST["estado"];
}
if ($band) {
//USUARIOS 
    //CREAR
    if ($_POST["tipo"]==="crear") {
        $re = $client->insertUsuario($nombre,$apellido,$usuario,$cedula,$sexo,$correo,$celular,"nuevo",$idPerfil,$fecha,$direccion,"A",$_SESSION["usuario"]);
        $resultado = "".$re;
        if($resultado=="true"){
            ?>
            <script type="text/javascript"> 
                var n = noty({
                    text        : '<div class="alert alert-success "><p><strong>Se Creo el usuario correctamente</p></div>',
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
                $(".crear_usuario").prop("disabled",false);
                 location.reload();
            </script>
            <?php
        }else{
            ?>
            <script type="text/javascript"> 
                var n = noty({
                    text        : '<div class="alert alert-warning  "><p><strong>Error el usuario no se pudo crear</p></div>',
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
                $(".crear_usuario").prop("disabled",false);
                console.log(<?php echo $resultado;?>);
            </script>
            <?php
        }
    } else if ($_POST["tipo"]==="crearC") {
        $re = $client->insertUsuarioCliente($nombre,$apellido,$usuario,$cedula,$sexo,$correo,$celular,"nuevo",$fecha,$direccion,$amigos,"A",$_SESSION["usuario"]);
        $resultado = "".$re;
        if($resultado=="true"){
            ?>
            <script type="text/javascript"> 
                 var n = noty({
                    text        : '<div class="alert alert-success  "><p><strong>Se Creo el usuario correctamente</p></div>',
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
                $(".crear_usuarioC").prop("disabled",false);
                location.reload();
            </script>
            <?php
        }else{
            ?>
            <script type="text/javascript"> 
                 var n = noty({
                    text        : '<div class="alert alert-warning  "><p><strong>Error el usuario no se pudo crear</p></div>',
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
                $(".crear_usuarioC").prop("disabled",false);
                 console.log(<?php echo $resultado;?>);
            </script>
            <?php
        }
    } else if ($_POST["tipo"]==="crearE") {
        $re = $client->insertUsuarioEvento($nombre,$apellido,$usuario,$cedula,$sexo,$correo,$celular,"nuevo",$idPerfil,$fecha,$direccion,"A",$_SESSION["usuario"]);
        $resultado = "".$re;
        if($resultado=="true"){
            ?>
            <script type="text/javascript">
                 var n = noty({
                    text        : '<div class="alert alert-success  "><p><strong>Se Creo el usuario correctamente</p></div>',
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
                $(".crear_usuarioE").prop("disabled",false);
                location.reload();
            </script>
            <?php
        }else{
            ?>
            <script type="text/javascript"> 
                 var n = noty({
                    text        : '<div class="alert alert-warning  "><p><strong>Error el usuario no se pudo crear</p></div>',
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
                $(".crear_usuarioE").prop("disabled",false);
                 console.log(<?php echo $resultado;?>);
            </script>
            <?php
        }
    //EDITAR
    } else if ($_POST["tipo"]==="editar") {
            $id=$_POST["id"];
            $re = $client->updateUsuario($nombre,$apellido,$usuario,$cedula,$sexo,$correo,$celular,"",$idPerfil,$fecha,$direccion,"",$id,$_SESSION["usuario"]);
            $resultado = "".$re;
            if($resultado=="true"){
                ?>
                <script type="text/javascript"> 
                     var n = noty({
                        text        : '<div class="alert alert-success  "><p><strong>Se Edito el usuario correctamente</p></div>',
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
                    $(".editar_usuario").prop("disabled",false);
                     location.reload();
                </script>
                <?php
            }else{
                ?>
                <script type="text/javascript"> 
                 var n = noty({
                    text        : '<div class="alert alert-warning  "><p><strong>Error el usuario no se pudo editar</p></div>',
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
                $(".editar_usuario").prop("disabled",false);
                 console.log(<?php echo $resultado;?>);
                </script>
                <?php
            }
    } else if ($_POST["tipo"]==="editarE") {
        $id=$_POST["id"];
        $re = $client->updateUsuarioEvento($nombre,$apellido,$usuario,$cedula,$sexo,$correo,$celular,"",$idPerfil,$fecha,$direccion,"",$id,$_SESSION["usuario"]);
        $resultado = "".$re;
        if($resultado=="true"){
            ?>
            <script type="text/javascript"> 
                 var n = noty({
                        text        : '<div class="alert alert-success  "><p><strong>Se Edito el usuario correctamente</p></div>',
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
                $(".editar_usuarioE").prop("disabled",false);
                location.reload();
            </script>
            <?php
        }else{
            ?>
            <script type="text/javascript"> 
                var n = noty({
                    text        : '<div class="alert alert-warning  "><p><strong>Error el usuario no se pudo editar</p></div>',
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
                $(".editar_usuarioE").prop("disabled",false);
                 console.log(<?php echo $resultado;?>);
            </script>
            <?php
        }           
    } else if ($_POST["tipo"]==="editarC") {
        $id=$_POST["id"];
        $re = $client->updateUsuarioCliente($nombre,$apellido,$usuario,$cedula,$sexo,$correo,$celular,"",$fecha,$direccion,$amigos,"",$id,$_SESSION["usuario"]);
        $resultado = "".$re;
        if($resultado=="true"){
            ?>
            <script type="text/javascript"> 
                 var n = noty({
                        text        : '<div class="alert alert-success  "><p><strong>Se Edito el usuario correctamente</p></div>',
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
                $(".editar_usuarioC").prop("disabled",false);
                location.reload();
            </script>
            <?php
        }else{
            ?>
            <script type="text/javascript"> 
                 var n = noty({
                    text        : '<div class="alert alert-warning  "><p><strong>Error el usuario no se pudo editar</p></div>',
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
                $(".editar_usuarioC").prop("disabled",false);
                 console.log(<?php echo $resultado;?>);
            </script>
            <?php
        }
    //ESTAD0
    } else if ($_POST["tipo"]==="estado") {

        $re = $client->updateEstadoUsuario($id,$estado,$_SESSION["usuario"]);
        $resultado = "".$re;
        if($resultado=="true"){
            if($estado=="B"){
                ?>
                <script type="text/javascript"> 
                     var n = noty({
                    text        : '<div class="alert alert-success  "><p><strong>Se Elimino el usuario correctamente</p></div>',
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
                    $(".eliminar").prop("disabled",false);
                     location.reload();
                </script>
                <?php
            }else if($estado=="C"){
                ?>
                <script type="text/javascript"> 
                     var n = noty({
                    text        : '<div class="alert alert-success  "><p><strong>Se envío correctamente el correo de seteo de clave</p></div>',
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
                    $(".clave").prop("disabled",false);
                </script>
                <?php
            }else{
                ?>
                <script type="text/javascript"> 
                    noty({
                        text        : '<div class="alert alert-success "><p><strong>Se Edito el usuario correctamente</p></div>',
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
                    $(".estado").prop("disabled",false);
                    location.reload();
                </script>
                <?php
            }
        }else{
            if($estado=="B"){
                ?>
                <script type="text/javascript"> 
                    var n = noty({
                    text        : '<div class="alert alert-warning  "><p><strong>Error el usuario no se pudo eliminar</p></div>',
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
                    $(".eliminar").prop("disabled",false);
                     console.log(<?php echo $resultado;?>);
                </script>
                <?php
            }else if($estado=="C"){
                ?>
                <script type="text/javascript"> 
                        var n = noty({
                    text        : '<div class="alert alert-success  "><p><strong>Error no se envío correctamente el correo de seteo de clave</p></div>',
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
                    $(".clave").prop("disabled",false);
                </script>
                <?php
            }else{
                ?>
                <script type="text/javascript"> 
                     var n = noty({
                    text        : '<div class="alert alert-warning  "><p><strong>Error el usuario no se pudo editar</p></div>',
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
                    $(".estado").prop("disabled",false);
                     console.log(<?php echo $resultado;?>);
                </script>
                <?php
            }
        }
    } else if ($_POST["tipo"]==="estadoE") {

        $re = $client->updateEstadoUsuarioEvento($id,$estado,$_SESSION["usuario"]);
        $resultado = "".$re;
        if($resultado=="true"){
            if($estado=="B"){
                ?>
                <script type="text/javascript"> 
                     var n = noty({
                    text        : '<div class="alert alert-success "><p><strong>Se Elimino el usuario correctamente</p></div>',
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
                    $(".eliminarE").prop("disabled",false);
                    location.reload();
                </script>
                <?php
            }else if($estado=="C"){
                ?>
                <script type="text/javascript"> 
                     var n = noty({
                    text        : '<div class="alert alert-success  "><p><strong>Se envío correctamente el correo de seteo de clave</p></div>',
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
                   $(".claveC").prop("disabled",false);
                </script>
                <?php
            }else{
                ?>
                <script type="text/javascript"> 
                     var n = noty({
                    text        : '<div class="alert alert-success  "><p><strong>Se Edito el usuario correctamente</p></div>',
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
                    $(".estadoE").prop("disabled",false);
                    location.reload();
                </script>
                <?php
            }
        }else{
            if($estado=="B"){
                ?>
                <script type="text/javascript"> 
                     var n = noty({
                    text        : '<div class="alert alert-warning  "><p><strong>Error el usuario no se pudo Eliminar</p></div>',
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
                    $(".eliminarE").prop("disabled",false);
                     console.log(<?php echo $resultado;?>);
                </script>
                <?php
            }else if($estado=="C"){
                ?>
                <script type="text/javascript"> 
                        var n = noty({
                    text        : '<div class="alert alert-success  "><p><strong>Error no se envío correctamente el correo de seteo de clave</p></div>',
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
                    $(".claveE").prop("disabled",false);
                </script>
                <?php
            }else{
                ?>
                <script type="text/javascript"> 
                     var n = noty({
                    text        : '<div class="alert alert-warning  "><p><strong>Error el usuario no se pudo editar</p></div>',
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
                    $(".estadoE").prop("disabled",false);
                     console.log(<?php echo $resultado;?>);
                </script>
                <?php
            }
        }
    } else if ($_POST["tipo"]==="estadoC") {
        $re = $client->updateEstadoUsuarioCliente($id,$estado,$_SESSION["usuario"]);
        $resultado = "".$re;
        if($resultado=="true"){
            if($estado=="B"){
                ?>
                <script type="text/javascript"> 
                     var n = noty({
                    text        : '<div class="alert alert-success  "><p><strong>Se Elimino el usuario correctamente</p></div>',
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
                    $(".eliminarC").prop("disabled",false);
                    location.reload();
                </script>
                <?php
            }else if($estado=="C"){
                ?>
                <script type="text/javascript"> 
                     var n = noty({
                    text        : '<div class="alert alert-success  "><p><strong>Se envío correctamente el correo de seteo de clave</p></div>',
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
                    $(".claveC").prop("disabled",false);
                </script>
                <?php
            }else{
                ?>
                <script type="text/javascript"> 
                     var n = noty({
                    text        : '<div class="alert alert-success "><p><strong>Se Edito el usuario correctamente</p></div>',
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
                    $(".estadoC").prop("disabled",false);
                    location.reload();
                </script>
                <?php
            }
        }else{
            if($estado=="B"){
                ?>
                <script type="text/javascript"> 
                     var n = noty({
                    text        : '<div class="alert alert-warning  "><p><strong>Error el usuario no se pudo Eliminar</p></div>',
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
                    $(".eliminarC").prop("disabled",false);
                     console.log(<?php echo $resultado;?>);
                </script>
                <?php
            }else if($estado=="C"){
                ?>
                <script type="text/javascript"> 
                        var n = noty({
                    text        : '<div class="alert alert-success  "><p><strong>Error no se envío correctamente el correo de seteo de clave</p></div>',
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
                    $(".claveC").prop("disabled",false);
                </script>
                <?php
            }else{
                ?>
                <script type="text/javascript"> 
                     var n = noty({
                    text        : '<div class="alert alert-warning  "><p><strong>Error el usuario no se pudo editar</p></div>',
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
                    $(".estadoC").prop("disabled",false);
                     console.log(<?php echo $resultado;?>);
                </script>
                <?php
            }
        }
    }

}else{
    ?><script type="text/javascript"> 
        $(".crear_usuario").prop("disabled",false);
        $(".editar_usuario").prop("disabled",false);
        $(".crear_usuarioC").prop("disabled",false);
        $(".editar_usuarioC").prop("disabled",false);
        $(".crear_usuarioE").prop("disabled",false);
        $(".editar_usuarioE").prop("disabled",false);
    </script> <?php 
}

?>
<div class="alsaaerta" id="alertasaa" >
    </div>