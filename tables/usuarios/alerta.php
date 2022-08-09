<?php
include ("../../conect.php");
include ("../../autenticacion.php");
$band=true;

if (isset($_POST["nombres"])) {
    if ($_POST["tipo"]==="crearF" | $_POST["tipo"]==="editarF" ) {
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
    }else{
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
                    text        : '<div class="alert alert-success "><p><strong>Se creó el usuario correctamente</p></div>',
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
                $('#Cusuarios').modal('hide'); 
                var table = $('#table-editable').DataTable();
                table.ajax.reload();
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
                    text        : '<div class="alert alert-success  "><p><strong>Se creó el usuario correctamente</p></div>',
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
                $('#Cusuarios').modal('hide'); 
                var table = $('#table-editable').DataTable();
                table.ajax.reload();
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
                    text        : '<div class="alert alert-success  "><p><strong>Se creó el usuario correctamente</p></div>',
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
                $('#Cusuarios').modal('hide'); 
                var table = $('#table-editable').DataTable();
                table.ajax.reload();
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
    
    } else if ($_POST["tipo"]==="crearF") {
        $re = $client->insertFacturacion($nombre,$apellido,$tipoF,$cedula,$razon,$direccion, $correo,"A",$usuario, $_SESSION["usuario"]);
        $resultado = "".$re;
        if($resultado=="true"){
            ?>
            <script type="text/javascript"> 
                 var n = noty({
                    text        : '<div class="alert alert-success  "><p><strong>Se creó facturación correctamente</p></div>',
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
                $(".crear_facturacion").prop("disabled",false);
                $('#Cusuarios').modal('hide'); 
                var table = $('#table-editable1').DataTable();
                table.ajax.reload();
            </script>
            <?php
        }else{
            ?>
            <script type="text/javascript"> 
                 var n = noty({
                    text        : '<div class="alert alert-warning  "><p><strong>Error la facturación no se pudo crear</p></div>',
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
                $(".crear_facturacion").prop("disabled",false);
                 console.log(<?php echo $resultado;?>);
            </script>
            <?php
        }
    } else if ($_POST["tipo"]==="permisos") {
        $perfil=$_POST["perfil"];
        $permisos=$_POST["permisos"];
        $tipo=$_POST["tipoA"];
        $re = $client->insertPerfil($perfil,$permisos,$tipo, $_SESSION["usuario"]);
        $resultado = "".$re;
        if($resultado=="true"){
            ?>
            <script type="text/javascript"> 
                 var n = noty({
                    text        : '<div class="alert alert-success  "><p><strong>Se creó perfil correctamente</p></div>',
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
                $(".crear_perfil").prop("disabled",false);
                $(".crearperfil").prop("disabled",false);
                var table = $('#table-editable').DataTable();
                table.ajax.reload();
                $('.perfiles').removeClass('hide');   
                $('.Cperfiles').addClass('hide');
            </script>
            <?php
        }else{
            ?>
            <script type="text/javascript"> 
                 var n = noty({
                    text        : '<div class="alert alert-warning  "><p><strong>Error el perfil no se pudo crear</p></div>',
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
                 $(".crear_perfil").prop("disabled",false);
                 $(".crearperfil").prop("disabled",false);
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
                        text        : '<div class="alert alert-success  "><p><strong>Se editó el usuario correctamente</p></div>',
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
                    $('#Cusuarios').modal('hide'); 
                    var table = $('#table-editable').DataTable();
                    table.ajax.reload();
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
                        text        : '<div class="alert alert-success  "><p><strong>Se editó el usuario correctamente</p></div>',
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
                $('#Cusuarios').modal('hide'); 
                var table = $('#table-editable').DataTable();
                table.ajax.reload();
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
                        text        : '<div class="alert alert-success  "><p><strong>Se editó el usuario correctamente</p></div>',
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
                $('#Cusuarios').modal('hide'); 
                var table = $('#table-editable').DataTable();
                table.ajax.reload();
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
    } else if ($_POST["tipo"]==="editarF") {
        $id=$_POST["id"];
        $re = $client->updateFacturacion($nombre,$apellido,$tipoF,$cedula,$razon,$direccion, $correo,"A",$usuario,$id, $_SESSION["usuario"]);
        $resultado = "".$re;
        if($resultado=="true"){
            ?>
            <script type="text/javascript"> 
                 var n = noty({
                    text        : '<div class="alert alert-success  "><p><strong>Se editó la facturación correctamente</p></div>',
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
                $('#Cusuarios').modal('hide'); 
                var table = $('#table-editable1').DataTable();
                table.ajax.reload();
            </script>
            <?php
        }else{
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
                 console.log(<?php echo $resultado;?>);
            </script>
            <?php
        }
    
    } else if ($_POST["tipo"]==="permisosE") {
        $perfil=$_POST["perfil"];
        $id=$_POST["id"];
        $permisos=$_POST["permisos"];
        $tipo=$_POST["tipoA"];
        $re = $client->updatePerfil($perfil,$permisos,$tipo,$id, $_SESSION["usuario"]);
        $resultado = "".$re;
        if($resultado=="true"){
            ?>
            <script type="text/javascript"> 
                 var n = noty({
                    text        : '<div class="alert alert-success  "><p><strong>Se editó perfil correctamente</p></div>',
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
                $(".editar_perfil").prop("disabled",false);
                $(".editarperfil").prop("disabled",false);
                var table = $('#table-editable').DataTable();
                table.ajax.reload();
                $('.perfiles').removeClass('hide');   
                $('.Cperfiles').addClass('hide');
            </script>
            <?php
        }else{
            ?>
            <script type="text/javascript"> 
                 var n = noty({
                    text        : '<div class="alert alert-warning  "><p><strong>Error el perfil no se pudo editó</p></div>',
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
                 $(".editar_perfil").prop("disabled",false);
                 $(".editarperfil").prop("disabled",false);
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
                    text        : '<div class="alert alert-success  "><p><strong>Se eliminó el usuario correctamente</p></div>',
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
                    var table = $('#table-editable').DataTable();
                    table.ajax.reload();
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
                        text        : '<div class="alert alert-success "><p><strong>Se editó el usuario correctamente</p></div>',
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
                    var table = $('#table-editable').DataTable();
                    table.ajax.reload();
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
                    text        : '<div class="alert alert-success "><p><strong>Se eliminó el usuario correctamente</p></div>',
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
                    var table = $('#table-editable').DataTable();
                    table.ajax.reload();
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
                   $(".claveE").prop("disabled",false);
                </script>
                <?php
            }else{
                ?>
                <script type="text/javascript"> 
                     var n = noty({
                    text        : '<div class="alert alert-success  "><p><strong>Se editó el usuario correctamente</p></div>',
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
                    var table = $('#table-editable').DataTable();
                    table.ajax.reload();
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
                    text        : '<div class="alert alert-success  "><p><strong>Se eliminó el usuario correctamente</p></div>',
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
                    var table = $('#table-editable').DataTable();
                    table.ajax.reload();
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
                    text        : '<div class="alert alert-success "><p><strong>Se editó el usuario correctamente</p></div>',
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
                    var table = $('#table-editable').DataTable();
                    table.ajax.reload();
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
    } else if ($_POST["tipo"]==="estadoF") {
        $re = $client->updateEstadoFacturacion($id,$estado,$_SESSION["usuario"]);
        $resultado = "".$re;
        if($resultado=="true"){
            if($estado=="B"){
                ?>
                <script type="text/javascript"> 
                     var n = noty({
                    text        : '<div class="alert alert-success  "><p><strong>Se eliminó la facturación correctamente</p></div>',
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
                    $(".deleteF").prop("disabled",false);
                    var table = $('#table-editable1').DataTable();
                    table.ajax.reload();
                </script>
                <?php
            }else{
                ?>
                <script type="text/javascript"> 
                     var n = noty({
                    text        : '<div class="alert alert-success "><p><strong>Se editó estado correctamente</p></div>',
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
                    $(".estadoF").prop("disabled",false);
                    var table = $('#table-editable1').DataTable();
                    table.ajax.reload();
                </script>
                <?php
            }
        }else{
            if($estado=="B"){
                ?>
                <script type="text/javascript"> 
                     var n = noty({
                    text        : '<div class="alert alert-warning  "><p><strong>Error la facturación no se pudo Eliminar</p></div>',
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
                    $(".deleteF").prop("disabled",false);
                     console.log(<?php echo $resultado;?>);
                </script>
                <?php
           
            }else{
                ?>
                <script type="text/javascript"> 
                     var n = noty({
                    text        : '<div class="alert alert-warning  "><p><strong>Error el estado no se pudo editar</p></div>',
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
                    $(".estadoF").prop("disabled",false);
                     console.log(<?php echo $resultado;?>);
                </script>
                <?php
            }
        }
    } else if ($_POST["tipo"]==="estadoP") {
        $re = $client->updateEstadoPerfil($id,$estado,$_SESSION["usuario"]);
        $resultado = "".$re;
        if($resultado=="true"){
            if($estado=="B"){
                ?>
                <script type="text/javascript"> 
                     var n = noty({
                    text        : '<div class="alert alert-success  "><p><strong>Se eliminó el perfil correctamente</p></div>',
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
                    $(".deleteP").prop("disabled",false);
                    var table = $('#table-editable').DataTable();
                    table.ajax.reload();
                </script>
                <?php
            }else{
                ?>
                <script type="text/javascript"> 
                     var n = noty({
                    text        : '<div class="alert alert-success "><p><strong>Se editó el perfil correctamente</p></div>',
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
                    $(".estadoP").prop("disabled",false);
                    var table = $('#table-editable').DataTable();
                    table.ajax.reload();
                </script>
                <?php
            }
        }else{
            if($estado=="B"){
                ?>
                <script type="text/javascript"> 
                     var n = noty({
                    text        : '<div class="alert alert-warning  "><p><strong>Error el perfil no se pudo Eliminar</p></div>',
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
                    $(".deleteP").prop("disabled",false);
                     console.log(<?php echo $resultado;?>);
                </script>
                <?php
           
            }else{
                ?>
                <script type="text/javascript"> 
                     var n = noty({
                    text        : '<div class="alert alert-warning  "><p><strong>Error el perfil no se pudo editar</p></div>',
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
                    $(".estadoP").prop("disabled",false);
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