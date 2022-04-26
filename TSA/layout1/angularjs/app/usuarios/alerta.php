<?php
include ("../conect.php");
include ("../autenticacion.php");
$band=true;

if (isset($_POST["contrasena"])) {
    $nombre=$_POST["nombres"];
    $apellido=$_POST["apellidos"];
    $celular=$_POST["celular"];
    $contrasena=password_hash($_POST["contrasena"], PASSWORD_DEFAULT);
}else{
    if (isset($_POST["nombres"])) {
        $nombre=$_POST["nombres"];
        $apellido=$_POST["apellidos"];
        $cedula=$_POST["cedula"];
        $correo=$_POST["correo"];
        if (isset($_POST["ciudadela"])) {
            $ciudadela=$_POST["ciudadela"];
        }
        
        $celular=$_POST["celular"];
        $ingreso=$_POST["ingreso"];
        $invitacion=$_POST["invitacion"];
    }
}
//USUARIOS 
    //CREAR
    if ($_POST["tipo"]==="crear") {
        $re = $client->insertResidente($nombre,$apellido,$celular,$cedula,$correo,$ingreso,$invitacion,$ciudadela);
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
                var table = $('#table-editable').DataTable();
                table.ajax.reload();
                $('#usuarios').modal('hide'); // abrir
                $('#Cusuarios').modal('hide'); // abrir
            </script>
            <?php
        }else{
            ?>
            <script type="text/javascript"> 
                var n = noty({
                    text        : '<div class="alert alert-warning  "><p><strong> ERROR USUARIO YA EXISTE EN LA CIUDADELA SELECCIONADA </p></div>',
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
                console.log('<?php echo $resultado;?>');
            </script>
            <?php
        }
    //EDITAR
    } else if ($_POST["tipo"]==="editar") {
            $id=$_POST["id"];
            $re = $client->updateResidente($id,$nombre,$apellido,$celular,$cedula,$correo,$ingreso,$invitacion);
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
                    var table = $('#table-editable').DataTable();
                    table.ajax.reload();
                    $('#usuarios').modal('hide'); // abrir
                    $('#Cusuarios').modal('hide'); // abrir
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
                console.log('<?php echo $resultado;?>');
                </script>
                <?php
            }
    
    //ESTAD0
    } else if ($_POST["tipo"]==="estado") {
        $id=$_POST["id"];
        $re = $client->updateEstadoResidente($id);
        $resultado = "".$re;
        if($resultado=="true"){
            ?>
            <script type="text/javascript"> 
                 var n = noty({
                text        : '<div class="alert alert-success  "><p><strong>Se reseteo clave correctamente</p></div>',
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
                $('#usuarios').modal('hide'); // abrir
                $('#Cusuarios').modal('hide'); // abrir
            </script>
            <?php
        }else{
            ?>
            <script type="text/javascript"> 
                var n = noty({
                text        : '<div class="alert alert-warning  "><p><strong>Error no se puede resetear clave,<?php echo $resultado;?> </p></div>',
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
                console.log('<?php echo $resultado;?>');
            </script>
            <?php
        }
    } else if ($_POST["tipo"]==="eliminar") {
        $id=$_POST["id"];
        $re = $client->deleteResidente($id);
        $resultado = "".$re;
        if($resultado=="true"){
            ?>
            <script type="text/javascript"> 
                 var n = noty({
                text        : '<div class="alert alert-success  "><p><strong>Se eliminó correctamente</p></div>',
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
                $(".delete").prop("disabled",false);
                var table = $('#table-editable').DataTable();
                table.ajax.reload();
                $('#usuarios').modal('hide'); // abrir
                $('#Cusuarios').modal('hide'); // abrir
            </script>
            <?php
        }else{
            ?>
            <script type="text/javascript"> 
                var n = noty({
                text        : '<div class="alert alert-warning  "><p><strong>Error no se puede eliminar</p></div>',
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
                $(".delete").prop("disabled",false);
                console.log('<?php echo $resultado;?>');
            </script>
            <?php
        }
    } else if ($_POST["tipo"]==="crearV") {
        $re = $client->insertVisitante($nombre,$apellido,$celular,$contrasena);
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
                $(".crear_visitante").prop("disabled",false);
                var table = $('#table-editable').DataTable();
                table.ajax.reload();
                $('#usuarios').modal('hide'); // abrir
                $('#Cusuarios').modal('hide'); // abrir
            </script>
            <?php
        }else{
            ?>
            <script type="text/javascript"> 
                var n = noty({
                    text        : '<div class="alert alert-warning  "><p><strong> ERROR USUARIO YA EXISTE </p></div>',
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
                $(".crear_visitante").prop("disabled",false);
                console.log('<?php echo $resultado;?>');
            </script>
            <?php
        }
    //EDITAR
    } else if ($_POST["tipo"]==="editarV") {
            $id=$_POST["id"];
            $re = $client->updateVisitante($id,$nombre,$apellido,$contrasena);
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
                    $(".editar_visitante").prop("disabled",false);
                    var table = $('#table-editable').DataTable();
                    table.ajax.reload();
                    $('#usuarios').modal('hide'); // abrir
                    $('#Cusuarios').modal('hide'); // abrir
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
                $(".editar_visitante").prop("disabled",false);
                console.log('<?php echo $resultado;?>');
                </script>
                <?php
            }
    
    //ESTAD0
    } else if ($_POST["tipo"]==="estadoV") {
        $id=$_POST["id"];
        $estado=$_POST["estado"];
        $re = $client->updateEstadoVisitante($id,$estado );
        $resultado = "".$re;
        if($resultado=="true"){
            ?>
            <script type="text/javascript"> 
                 var n = noty({
                text        : '<div class="alert alert-success  "><p><strong>Se reseteo clave correctamente</p></div>',
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
                $(".estadoV").prop("disabled",false);
                var table = $('#table-editable').DataTable();
                table.ajax.reload();
                $('#usuarios').modal('hide'); // abrir
                $('#Cusuarios').modal('hide'); // abrir
            </script>
            <?php
        }else{
            ?>
            <script type="text/javascript"> 
                var n = noty({
                text        : '<div class="alert alert-warning  "><p><strong>Error no se puede resetear clave</p></div>',
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
                $(".estadoV").prop("disabled",false);
                console.log('<?php echo $resultado;?>');
            </script>
            <?php
        }
    } else if ($_POST["tipo"]==="eliminarV") {
        $id=$_POST["id"];
        $re = $client->deleteVisitante($id);
        $resultado = "".$re;
        if($resultado=="true"){
            ?>
            <script type="text/javascript"> 
                 var n = noty({
                text        : '<div class="alert alert-success  "><p><strong>Se eliminó correctamente</p></div>',
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
                $(".deleteV").prop("disabled",false);
                var table = $('#table-editable').DataTable();
                table.ajax.reload();
                $('#usuarios').modal('hide'); // abrir
                $('#Cusuarios').modal('hide'); // abrir
            </script>
            <?php
        }else{
            ?>
            <script type="text/javascript"> 
                var n = noty({
                text        : '<div class="alert alert-warning  "><p><strong>Error no se puede eliminar</p></div>',
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
                $(".deleteV").prop("disabled",false);
                console.log('<?php echo $resultado;?>');
            </script>
            <?php
        }
    }

?>
<div class="alsaaerta" id="alertasaa" >
    </div>