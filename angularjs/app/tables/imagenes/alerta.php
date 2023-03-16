<?php
include ("../../conect.php");
include ("../../autenticacion.php");
include ("../../directorio.php");
$band=true;
$band2=false;
$resultado="";
if (isset($_POST["nombres"])) {
    $nombre=$_POST["nombres"];
    $descripcion=$_POST["descripcion"];
    $tipo = $_POST['tipo'];
    ?><script type="text/javascript"> var mensaje = "";</script> <?php 

    if (empty($nombre) || strlen($nombre)<4) {
        $band=false;
        ?><script type="text/javascript"> 
            mensaje = "Ingrese nombre válido";
        </script> <?php 
    }
}

if (isset($_POST["estado"])) {

    $id=$_POST["id"];
    $estado=$_POST["estado"];
}
$status="false";
if ($band) {
//MANTENIMIENTO
    //CREAR 
     if ($_POST["tipo2"]==="crear") {
        $image = $_POST['imagen'];
        $re = $client->insertImagen($nombre,$descripcion,$tipo,"A",$_SESSION["usuario"]);
        $resultado = "".$re;
        if ($resultado=="false"){
            $band2=false;
        }else{
            $img = str_replace('data:image/png;base64,', '', $image);
            $img = str_replace(' ', '+', $img);
            $path = $path_imagen1.$tipo."/".$resultado.".png";
            $status = file_put_contents($path,base64_decode( $img));
            $band2=true;
        }
    //EDITAR
    } else if ($_POST["tipo2"]==="editar") {
        $Etipo=substr($_POST["tipo"], 1);     
        $id=$_POST["id"];
        $re = $client->updateImagen($nombre,$descripcion,$Etipo,"A",$id,$_SESSION["usuario"]);
        $resultado = "".$re;
        if (isset($_POST["imagen"])) {
            $image = $_POST['imagen'];
            $img = str_replace('data:image/png;base64,', '', $image);
            $img = str_replace(' ', '+', $img);
            $path = $path_imagen1.$Etipo."/".trim($id).".png";
            $status = file_put_contents($path,base64_decode( $img));
        }
        $band2=true;
    //ESTAD0
    } else if ($_POST["tipo2"]==="estado") {
        $EStipo=substr($_POST["tipo"], 2);  ;       
        $re = $client->updateEstadoImagen($id,$EStipo,$estado,$_SESSION["usuario"]);
        $resultado = "".$re;
        $band2=true;
    }
    //TIPO DE ALERTA 
    if ($band2) {
        if ($_POST["tipo2"]==="crear") {
            if($status !="false"){
                ?>
                <script type="text/javascript"> 
                    var n = noty({
                    text        : '<div class="alert alert-success  "><p><strong>Se creó <?php echo $_POST["nombreT"];?> correctamente</p></div>',
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
                    $(".crear_imagen").prop("disabled",false);
                    $('#crear-imagen').modal('hide');
                    var table = $('#table-editable').DataTable();
                    table.ajax.reload();
                </script>
                <?php
            }else{
                ?>
                <script type="text/javascript"> 
                    var n = noty({
                    text        : '<div class="alert alert-success  "><p><strong>Error <?php echo $_POST["nombreT"];?> no se pudo crear</p></div>',
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
                    $(".crear_imagen").prop("disabled",false);
                    console.log(<?php echo $resultado;?>);
                </script>
                <?php
            }
        } else if ($_POST["tipo2"]==="editar") {
            if($resultado=="true"){
                ?>
                <script type="text/javascript"> 
                    var n = noty({
                    text        : '<div class="alert alert-success  "><p><strong>Se editó <?php echo $_POST["nombreT"];?> correctamente</p></div>',
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
                    $(".editar_imagen").prop("disabled",false);
                    $('#editar-imagen').modal('hide');
                    var table = $('#table-editable').DataTable();
                    table.ajax.reload();
                </script>
                <?php
            }else{
                ?>
                <script type="text/javascript"> 
                    var n = noty({
                    text        : '<div class="alert alert-success  "><p><strong>Error <?php echo $_POST["nombreT"];?> no se pudo editar</p></div>',
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
                    $(".editar_imagen").prop("disabled",false);
                    console.log(<?php echo $resultado;?>);
                </script>
                <?php
            }
        } else if ($_POST["tipo2"]==="estado") {
            if($resultado=="true"){
                if($estado=="B"){
                    ?>
                    <script type="text/javascript"> 
                        var n = noty({
                        text        : '<div class="alert alert-success  "><p><strong>Se eliminó <?php echo $_POST["nombreT"];?> correctamente</p></div>',
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
                        $(".eliminar").prop("disabled",false);
                        var table = $('#table-editable').DataTable();
                        table.ajax.reload();
                    </script>
                    <?php
                }else{
                    ?>
                    <script type="text/javascript"> 
                        var n = noty({
                        text        : '<div class="alert alert-success  "><p><strong>Se editó <?php echo $_POST["nombreT"];?> correctamente</p></div>',
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
                        text        : '<div class="alert alert-success  "><p><strong>Error <?php echo $_POST["nombreT"];?> no se pudo Eliminar</p></div>',
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
                        $(".eliminar").prop("disabled",false);
                        console.log(<?php echo $resultado;?>);
                    </script>
                    <?php
                }else{
                    ?>
                    <script type="text/javascript"> 
                        var n = noty({
                        text        : '<div class="alert alert-success  "><p><strong>Error <?php echo $_POST["nombreT"];?> no se pudo editar</p></div>',
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
                        $(".estado").prop("disabled",false);
                        console.log(<?php echo $resultado;?>);
                    </script>
                    <?php
                }
            }
        } 
    }
}else{
    ?><script type="text/javascript"> 
        alert(mensaje);
    </script> <?php 
}

?>
<div class="alsaaerta" id="alertasaa" >
    </div>
    <?php
$transport->close();
?>