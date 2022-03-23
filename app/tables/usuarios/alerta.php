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

    ?><script type="text/javascript"> var mensaje = "";</script> <?php 

    if (empty($nombre) || strlen($nombre)<4) {
        $band=false;
        ?><script type="text/javascript"> 
            mensaje = "Ingrese nombres validos";
        </script> <?php 
    }
    if (empty($apellido) || strlen($apellido)<4) {
        $band=false;
        ?><script type="text/javascript"> 
            mensaje = "Ingrese apellidos validos";
        </script> <?php 
    }
    if (empty($usuario) || strlen($usuario)<4) {
        $band=false;
        ?><script type="text/javascript"> 
            mensaje = "Ingrese usuario valido";
        </script> <?php 
    }
    if (empty($cedula) || strlen($cedula)<4) {
        $band=false;
        ?><script type="text/javascript"> 
            mensaje = "Ingrese cedula valida";
        </script> <?php 
    }
    if (empty($celular) || strlen($celular)==9) {
        $band=false;
        ?><script type="text/javascript"> 
            mensaje = "Ingrese celular valido";
        </script> <?php 
    }
    if(!filter_var( $correo, FILTER_VALIDATE_EMAIL )){
        $band=false;
        ?><script type="text/javascript"> 
            mensaje = "Ingrese un email valido";
        </script> <?php 
    }
    if(empty($fecha) ){
        $band=false;
        ?><script type="text/javascript"> 
            mensaje = "Ingrese una fecha valida";
        </script> <?php 
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
                alert("Se Creo el usuario correctamente");
                $(".crear_usuario").prop("disabled",false);
                location.reload();
            </script>
            <?php
        }else{
            ?>
            <script type="text/javascript"> 
                alert("Error el usuario no se pudo crear");
                $(".crear_usuario").prop("disabled",false);
                console.log(<?php $resultado;?>);
            </script>
            <?php
        }
    } else if ($_POST["tipo"]==="crearC") {
        $re = $client->insertUsuarioCliente($nombre,$apellido,$usuario,$cedula,$sexo,$correo,$celular,"nuevo",$fecha,$direccion,$amigos,"A",$_SESSION["usuario"]);
        $resultado = "".$re;
        if($resultado=="true"){
            ?>
            <script type="text/javascript"> 
                alert("Se Creo el usuario correctamente");
                $(".crear_usuarioC").prop("disabled",false);
                location.reload();
            </script>
            <?php
        }else{
            ?>
            <script type="text/javascript"> 
                alert("Error el usuario no se pudo crear");
                $(".crear_usuarioC").prop("disabled",false);
                console.log(<?php $resultado;?>);
            </script>
            <?php
        }
    } else if ($_POST["tipo"]==="crearE") {
        $re = $client->insertUsuarioEvento($nombre,$apellido,$usuario,$cedula,$sexo,$correo,$celular,"nuevo",$idPerfil,$fecha,$direccion,"A",$_SESSION["usuario"]);
        $resultado = "".$re;
        if($resultado=="true"){
            ?>
            <script type="text/javascript"> 
                alert("Se Creo el usuario correctamente");
                $(".crear_usuarioE").prop("disabled",false);
                location.reload();
            </script>
            <?php
        }else{
            ?>
            <script type="text/javascript"> 
                alert("Error el usuario no se pudo crear");
                $(".crear_usuarioE").prop("disabled",false);
                console.log(<?php $resultado;?>);
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
                    alert("Se Edito el usuario correctamente");
                    $(".editar_usuario").prop("disabled",false);
                    location.reload();
                </script>
                <?php
            }else{
                ?>
                <script type="text/javascript"> 
                alert("Error el usuario no se pudo editar");
                $(".editar_usuario").prop("disabled",false);
                console.log(<?php $resultado;?>);
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
            alert("Se Edito el usuario correctamente");
                $(".editar_usuarioE").prop("disabled",false);
                location.reload();
            </script>
            <?php
        }else{
            ?>
            <script type="text/javascript"> 
                alert("Error el usuario no se pudo editar");
                $(".editar_usuarioE").prop("disabled",false);
                console.log(<?php $resultado;?>);
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
                alert("Se Edito el usuario correctamente");
                $(".editar_usuarioC").prop("disabled",false);
                location.reload();
            </script>
            <?php
        }else{
            ?>
            <script type="text/javascript"> 
                alert("Error el usuario no se pudo editar");
                $(".editar_usuarioE").prop("disabled",false);
                console.log(<?php $resultado;?>);
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
                    alert("Se Elimino el usuario correctamente");
                    $(".eliminar").prop("disabled",false);
                    location.reload();
                </script>
                <?php
            }else{
                ?>
                <script type="text/javascript"> 
                    alert("Se Edito el usuario correctamente");
                    $(".estado").prop("disabled",false);
                    location.reload();
                </script>
                <?php
            }
        }else{
            if($estado=="B"){
                ?>
                <script type="text/javascript"> 
                    alert("Error el usuario no se pudo Eliminar");
                    $(".eliminar").prop("disabled",false);
                    console.log(<?php $resultado;?>);
                </script>
                <?php
            }else{
                ?>
                <script type="text/javascript"> 
                    alert("Error el usuario no se pudo editar");
                    $(".estado").prop("disabled",false);
                    console.log(<?php $resultado;?>);
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
                    alert("Se Elimino el usuario correctamente");
                    $(".eliminarE").prop("disabled",false);
                    location.reload();
                </script>
                <?php
            }else{
                ?>
                <script type="text/javascript"> 
                    alert("Se Edito el usuario correctamente");
                    $(".estadoE").prop("disabled",false);
                    location.reload();
                </script>
                <?php
            }
        }else{
            if($estado=="B"){
                ?>
                <script type="text/javascript"> 
                    alert("Error el usuario no se pudo Eliminar");
                    $(".eliminarE").prop("disabled",false);
                    console.log(<?php $resultado;?>);
                </script>
                <?php
            }else{
                ?>
                <script type="text/javascript"> 
                    alert("Error el usuario no se pudo editar");
                    $(".estadoE").prop("disabled",false);
                    console.log(<?php $resultado;?>);
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
                    alert("Se Elimino el usuario correctamente");
                    $(".eliminarC").prop("disabled",false);
                    location.reload();
                </script>
                <?php
            }else{
                ?>
                <script type="text/javascript"> 
                    alert("Se Edito el usuario correctamente");
                    $(".estadoC").prop("disabled",false);
                    location.reload();
                </script>
                <?php
            }
        }else{
            if($estado=="B"){
                ?>
                <script type="text/javascript"> 
                    alert("Error el usuario no se pudo Eliminar");
                    $(".eliminarC").prop("disabled",false);
                    console.log(<?php $resultado;?>);
                </script>
                <?php
            }else{
                ?>
                <script type="text/javascript"> 
                    alert("Error el usuario no se pudo editar");
                    $(".estadoC").prop("disabled",false);
                    console.log(<?php $resultado;?>);
                </script>
                <?php
            }
        }
    }

}else{
    ?><script type="text/javascript"> 
        alert(mensaje);
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