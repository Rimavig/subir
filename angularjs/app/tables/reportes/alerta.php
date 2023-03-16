<?php
include ("../../conect.php");
include ("../../autenticacion.php");
include ("../../directorio.php");
$band=true;
$band2=false;
$resultado="";
if (isset($_POST["tipo"])) {
    $tipo=$_POST["tipo"];
    if ( $tipo=="correoR"){
        $id = $_POST['id'];
        $re = $client->getGeneral("correoR",$id);
        $resultado = "".$re;
    }
    if ( $tipo=="editar_correoR"){
        $id = $_POST['id'];
        $correo = $_POST['correo'];
        $re = $client->updateGeneral("editar_correoR",$id,$correo,"",$_SESSION["usuario"]);
        $resultado = "".$re;
    }
    if ( $tipo=="cortesia"){
        $id = $_POST['id'];
        $re = $client->getGeneral("cortesia",$id);
        $resultado = "".$re;
    }
    if ( $tipo=="UclienteV"){
        $id = $_POST['id'];
        $re = $client->getGeneral("UclienteV",$id);
        $resultado = "".$re;
    }
}
if (isset($_POST["estado"])) {
    $id=$_POST["id"];
    $estado=$_POST["estado"];
}
$status="false";
if($resultado=="true"){
    if(isset($_POST["tipo"])){
        $tipo=$_POST["tipo"];
        if ( $tipo=="correoR" | $tipo=="cortesia"  | $tipo=="UclienteV" ){
            ?>
            <script type="text/javascript"> 
            var n = noty({
                text        : '<div class="alert alert-success "><p><strong>Se envió correctamente</p></div>',
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
                var table = $('#table-editable2').DataTable();
                table.ajax.reload();
                $(".correoR").prop("disabled",false);
            </script>
            <?php
        }
        if ( $tipo=="editar_correoR" ){
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
                var table = $('#table-editable2').DataTable();
                table.ajax.reload();
                $(".editar_correoR").prop("disabled",false);
                $('#Cevento').modal('hide');
            </script>
            <?php
        }
    }
}else{
    if (isset($_POST["tipo"])){
        $tipo=$_POST["tipo"];
        if ( $tipo=="correoR" | $tipo=="cortesia"  | $tipo=="UclienteV")  {
            ?>
            <script type="text/javascript"> 
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Error no se pudo enviar</p></div>',
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
                $(".correoR").prop("disabled",false);
            </script>
            <?php
        }
        if ( $tipo=="editar_correoR" )  {
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
                $(".editar_correoR").prop("disabled",false);
            </script>
            <?php
        }
    }
}
if ($band) {
//MANTENIMIENTO
    if ($_POST["tipo"]==="estado") {
        $re = $client->updateEstadoRegistro($id,$estado,$_SESSION["usuario"]);
        $resultado = "".$re;
        $band2=true;
    }
    //TIPO DE ALERTA 
    if ($band2) {
        if ($_POST["tipo"]==="estado") {
            if($resultado=="true"){
                if($estado=="B"){
                    ?>
                    <script type="text/javascript"> 
                        var n = noty({
                        text        : '<div class="alert alert-success  "><p><strong>Se eliminó correctamente</p></div>',
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
                        $(".deleteR").prop("disabled",false);
                        var table = $('#table-editable2').DataTable();
                        table.ajax.reload();
                    </script>
                    <?php
                }else{
                    ?>
                    <script type="text/javascript"> 
                        var n = noty({
                        text        : '<div class="alert alert-success  "><p><strong>Se editó  correctamente</p></div>',
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
                        $(".estadoR").prop("disabled",false);
                        var table = $('#table-editable2').DataTable();
                        table.ajax.reload();
                    </script>
                    <?php
                }
            }else{
                if($estado=="B"){
                    ?>
                    <script type="text/javascript">
                        var n = noty({
                        text        : '<div class="alert alert-success  "><p><strong>Error  no se pudo Eliminar</p></div>',
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
                        $(".deleteR").prop("disabled",false);
                        console.log(<?php echo $resultado;?>);
                    </script>
                    <?php
                }else{
                    ?>
                    <script type="text/javascript"> 
                        var n = noty({
                        text        : '<div class="alert alert-success  "><p><strong>Error  no se pudo editar</p></div>',
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
                        $(".estadoR").prop("disabled",false);
                        console.log(<?php echo $resultado;?>);
                    </script>
                    <?php
                }
            }
        } 
    }
}
?>
<div class="alsaaerta" id="alertasaa" >
    </div>
    <?php
$transport->close();
?>