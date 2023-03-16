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
        $re = $client1->sendMail($id,"teatrosanchezaguilar@gmail.com","1" ,"Correo de Prueba","12345");
        $resultado = "".$re;
    }else if ( $tipo=="eliminarE"){
        $id = $_POST["id"];
        $re = $client->updateGeneral("eliminarE",$id,"B","",$_SESSION["usuario"]);
        $resultado = "".$re;
    }else if ( $tipo=="correoE"){
        $id = $_POST["id"];
        $re = $client->updateGeneral("correoE",$id,"E","",$_SESSION["usuario"]);
        $resultado = "".$re;
    }else if ( $tipo=="enviarT"){
        $re = $client->updateGeneral("enviarT","","","",$_SESSION["usuario"]);
        $resultado = "".$re;
    }else if ( $tipo=="crear_destinatario"){
        $idPlantilla = $_POST["idPlantilla"];
        $correo = $_POST["correo"];
        $re = $client->updateGeneral("crear_destinatario","",$correo, $idPlantilla,$_SESSION["usuario"]);
        $resultado = "".$re;
    }else if ( $tipo=="eliminarD"){
        $id = $_POST["id"];
        $re = $client->updateGeneral("eliminarD",$id,"","",$_SESSION["usuario"]);
        $resultado = "".$re;
    }else if ( $tipo=="editar_destinatario"){
        $id = $_POST["id"];
        $idPlantilla = $_POST["idPlantilla"];
        $correo = $_POST["correo"];
        $re = $client->updateGeneral("editar_destinatario",$id,$correo, $idPlantilla,$_SESSION["usuario"]);
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

        }else if ( $tipo=="eliminarE" | $tipo=="correoE"| $tipo=="enviarT" ){
            ?>
            <script type="text/javascript"> 
            var n = noty({
                text        : '<div class="alert alert-success "><p><strong>Se realizó  correctamente</p></div>',
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
                $('#correosE').load('./tables/correos/tab_error.php', function() {    
                    $("#table-editable").dataTable({ "language": {
                        "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                        }, 
                        "bPaginate" : false,
                        "destroy":true,
                        "searching": false,
                        "autoWidth": false,
                        "select":false,
                        "paging": false,
                        "bFilter": false,
                        "scrollX": false,
                        "bInfo": false, 
                        "order": [[ 0, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                            }
                    ]});  
                });
            </script>
            <?php

        }else if ( $tipo=="eliminarD" | $tipo=="editar_destinatario"| $tipo=="crear_destinatario" ){
            ?>
            <script type="text/javascript"> 
            var n = noty({
                text        : '<div class="alert alert-success "><p><strong>Se realizó  correctamente</p></div>',
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
                $('#correoD').load('./tables/correos/tab_destinatarios.php', function() {    
                    $("#table-editable1").dataTable({ "language": {
                        "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                        }, 
                        "bPaginate" : false,
                        "destroy":true,
                        "searching": false,
                        "autoWidth": false,
                        "select":false,
                        "paging": false,
                        "bFilter": false,
                        "scrollX": false,
                        "bInfo": false, 
                        "order": [[ 0, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                            }
                    ]});  
                });
                $('#Cusuarios').modal('hide'); 
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
        }else if ( $tipo=="eliminarE" | $tipo=="correoE"| $tipo=="enviarT" ){
            ?>
            <script type="text/javascript"> 
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Error no se pudo realizar</p></div>',
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
                $('#correosE').load('./tables/correos/tab_error.php', function() {    
                    $("#table-editable").dataTable({ "language": {
                        "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                        }, 
                        "bPaginate" : false,
                        "destroy":true,
                        "searching": false,
                        "autoWidth": false,
                        "select":false,
                        "paging": false,
                        "bFilter": false,
                        "scrollX": false,
                        "bInfo": false, 
                        "order": [[ 0, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                            }
                    ]});  
                });
            </script>
            <?php
        }else if ( $tipo=="eliminarD" | $tipo=="editar_destinatario"| $tipo=="crear_destinatario" ){
            ?>
            <script type="text/javascript"> 
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Error no se pudo realizar</p></div>',
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
                $('#correoD').load('./tables/correos/tab_destinatarios.php', function() {    
                    $("#table-editable1").dataTable({ "language": {
                        "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                        }, 
                        "bPaginate" : false,
                        "destroy":true,
                        "searching": false,
                        "autoWidth": false,
                        "select":false,
                        "paging": false,
                        "bFilter": false,
                        "scrollX": false,
                        "bInfo": false, 
                        "order": [[ 0, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                            }
                    ]});  
                });
            </script>
            <?php
        }
    }
}
?>
<?php
$transport->close();
$transport1->close();
?>