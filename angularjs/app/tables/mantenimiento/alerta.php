<?php
include ("../../conect.php");
include ("../../autenticacion.php");
$band=true;
$band2=false;
$resultado="";
if (isset($_POST["nombres"])) {
    $nombre=$_POST["nombres"];
    if ($_POST["tipo"]==="categoria") {
        $orden=$_POST["orden"];
    }   
}


if (isset($_POST["estado"])) {

    $id=$_POST["id"];
    $estado=$_POST["estado"];
}
if ($band) {
//MANTENIMIENTO
    //CREAR 
     if ($_POST["tipo"]==="categoria") {
        $orden=$_POST["orden"];
        $re = $client->insertCategoria($nombre,$orden,"A",$_SESSION["usuario"]);
        $resultado = "".$re;
        $band2=true;
    } else if ($_POST["tipo"]==="clasificacion") {
        $re = $client->insertClasificacion($nombre,"","A",$_SESSION["usuario"]);
        $resultado = "".$re;
        $band2=true;
    } else if ($_POST["tipo"]==="espectaculo") {
        $re = $client->insertTipoEspectaculo($nombre,"","A",$_SESSION["usuario"]);
        $resultado = "".$re;
        $band2=true;
    } else if ($_POST["tipo"]==="procedencia") {
        $re = $client->insertProcedencia($nombre,"","A",$_SESSION["usuario"]);
        $resultado = "".$re;
        $band2=true;
    } else if ($_POST["tipo"]==="evento") {
        $re = $client->insertTipoEvento($nombre,"","A",$_SESSION["usuario"]);
        $resultado = "".$re;
        $band2=true;
    } else if ($_POST["tipo"]==="sala") {
        $re = $client->insertSala($nombre,"","A",$_SESSION["usuario"]);
        $resultado = "".$re;
        $band2=true;
    } else if ($_POST["tipo"]==="productora") {
        $re = $client->insertProductora($nombre,"","A",$_SESSION["usuario"]);
        $resultado = "".$re;
        $band2=true;
    } else if ($_POST["tipo"]==="promocion") {
        $re = $client->insertNombrePromocion($nombre,"","A",$_SESSION["usuario"]);
        $resultado = "".$re;
        $band2=true;
    } else if ($_POST["tipo"]==="distribucionP") {
        $asientos=$_POST["asientos"];
        $re = $client->insertSalaMapa("1",$nombre, $asientos,"A",$_SESSION["usuario"]);
        $resultado = "".$re;
        $band2=true;
    } else if ($_POST["tipo"]==="distribucionS") {
        $idsala=$_POST["idsala"];
        $imagen=$_POST["imagen"];
        $re = $client->insertSalaMapa($idsala,$nombre, $imagen,"A",$_SESSION["usuario"]);
        $resultado = "".$re;
        $band2=true;
    //EDITAR
    } else if ($_POST["tipo"]==="Ecategoria") {
        $id=$_POST["id"];
        $orden=$_POST["orden"];
        $re = $client->updateCategoria($nombre, $orden,"A",$id,$_SESSION["usuario"]);
        $resultado = "".$re;
        $band2=true;
    } else if ($_POST["tipo"]==="Eclasificacion") {
        $id=$_POST["id"];
        $re = $client->updateClasificacion($nombre,"","A",$id,$_SESSION["usuario"]);
        $resultado = "".$re;
        $band2=true;
    } else if ($_POST["tipo"]==="Eespectaculo") {
        $id=$_POST["id"];
        $re = $client->updateTipoEspectaculo($nombre,"","A",$id,$_SESSION["usuario"]);
        $resultado = "".$re;
        $band2=true;
    } else if ($_POST["tipo"]==="Eprocedencia") {
        $id=$_POST["id"];
        $re = $client->updateProcedencia($nombre,"","A",$id,$_SESSION["usuario"]);
        $resultado = "".$re;
        $band2=true;
    } else if ($_POST["tipo"]==="Eevento") {
        $id=$_POST["id"];
        $re = $client->updateTipoEvento($nombre,"","A",$id,$_SESSION["usuario"]);
        $resultado = "".$re;
        $band2=true;
    } else if ($_POST["tipo"]==="Esala") {
        $image=$_POST["imagen"];
        $id=$_POST["id"];
        $re = $client->updateSala($nombre,"",100,$image,"A",$id,$_SESSION["usuario"]);
        $resultado = "".$re;
        $band2=true;
    } else if ($_POST["tipo"]==="Eproductora") {
        $id=$_POST["id"];
        $re = $client->updateProductora($nombre,"","A",$id,$_SESSION["usuario"]);
        $resultado = "".$re;
        $band2=true;
    } else if ($_POST["tipo"]==="Epromocion") {
        $id=$_POST["id"];
        $re = $client->updateNombrePromocion($nombre,"","A",$id,$_SESSION["usuario"]);
        $resultado = "".$re;
        $band2=true;
    } else if ($_POST["tipo"]==="EdistribucionP") {
        $id=$_POST["id"];
        $idMapa=$_POST["idMapa"];
        if (isset($_POST["asientos"]) ){
            $asientos=$_POST["asientos"];
            $re = $client->updateSalaMapa($id,$idMapa,$nombre,$asientos,"A",$_SESSION["usuario"]);
        }else{
            $re = $client->updateSalaMapa($id,$idMapa,$nombre,"none","A",$_SESSION["usuario"]);
        }
        $resultado = "".$re;
        $band2=true;
    } else if ($_POST["tipo"]==="EdistribucionS") {
        $id=$_POST["id"];
        $idMapa=$_POST["idMapa"];
        $imagen=$_POST["imagen"];
        $re = $client->updateSalaMapa($id,$idMapa,$nombre,$imagen,"A",$_SESSION["usuario"]);
        $resultado = "".$re;
        $band2=true;
    //ESTAD0
    } else if ($_POST["tipo"]==="EScategoria") {
        $re = $client->updateEstadoCategoria($id,$estado,$_SESSION["usuario"]);
        $resultado = "".$re;
        $band2=true;
    } else if ($_POST["tipo"]==="ESclasificacion") {
        $re = $client->updateEstadoClasificacion($id,$estado,$_SESSION["usuario"]);
        $resultado = "".$re;
        $band2=true;
    } else if ($_POST["tipo"]==="ESespectaculo") {
        $re = $client->updateEstadoTipoEspectaculo($id,$estado,$_SESSION["usuario"]);
        $resultado = "".$re;
        $band2=true;
    } else if ($_POST["tipo"]==="ESprocedencia") {
        $re = $client->updateEstadoProcedencia($id,$estado,$_SESSION["usuario"]);
        $resultado = "".$re;
        $band2=true;
    } else if ($_POST["tipo"]==="ESevento") {
        $re = $client->updateEstadoTipoEvento($id,$estado,$_SESSION["usuario"]);
        $resultado = "".$re;
        $band2=true;
    } else if ($_POST["tipo"]==="ESsala") {
        $re = $client->updateEstadoSala($id,$estado,$_SESSION["usuario"]);
        $resultado = "".$re;
        $band2=true;
    } else if ($_POST["tipo"]==="ESproductora") {
        $re = $client->updateEstadoProductora($id,$estado,$_SESSION["usuario"]);
        $resultado = "".$re;
        $band2=true;
    } else if ($_POST["tipo"]==="ESpromocion") {
        $re = $client->updateEstadoNombrePromocion($id,$estado,$_SESSION["usuario"]);
        $resultado = "".$re;
        $band2=true;
    } else if ($_POST["tipo"]==="ESdistribucionP") {
        $re = $client->updateEstadoSalaMapa($id,$estado,$_SESSION["usuario"],"");
        $resultado = "".$re;
        $band2=true;
    } else if ($_POST["tipo"]==="ESdistribucionS") {
        $re = $client->updateEstadoSalaMapa($id,$estado,$_SESSION["usuario"],"");
        $resultado = "".$re;
        $band2=true;
    } 
    //TIPO DE ALERTA 
    if ($band2) {
        if ($_POST["tipo2"]==="crear") {
            if($resultado=="true"){
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
                    $(".crear_categoria").prop("disabled",false);
                    $(".crear_distribucionS").prop("disabled",false);
                    $('#crearMapaS').modal('hide'); 
                    $('#categoria').modal('hide'); // abrir
                    var table = $('#table-editable').DataTable();
                    table.ajax.reload();
                </script>
                <?php
            }else{
                ?>
                 <script type="text/javascript"> 
                     var n = noty({
                    text        : '<div class="alert alert-warning  "><p><strong>Error <?php echo $_POST["nombreT"];?> no se pudo crear</p></div>',
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
                    $(".crear_categoria").prop("disabled",false);
                    $(".editar_categoria").prop("disabled",false);
                    $(".crear_distribucionS").prop("disabled",false);
                    $('#categoria').modal('hide'); // abrir
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
                    $(".editar_categoria").prop("disabled",false);
                    $(".editar_distribucionS").prop("disabled",false);
                    $('#crearMapaS').modal('hide'); 
                    $('#categoria').modal('hide'); // abrir
                    var table = $('#table-editable').DataTable();
                    table.ajax.reload();
                </script>
                <?php
            }else{
                ?>
                <script type="text/javascript"> 
                     var n = noty({
                    text        : '<div class="alert alert-warning  "><p><strong>Error <?php echo $_POST["nombreT"];?> no se pudo editar</p></div>',
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
                    $(".editar_categoria").prop("disabled",false);
                    $(".editar_distribucionS").prop("disabled",false);
                    $('#categoria').modal('hide'); // abrir
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
                        $(".delete").prop("disabled",false);
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
                        text        : '<div class="alert alert-warning  "><p><strong>Error <?php echo $_POST["nombreT"];?> no se pudo Eliminar</p></div>',
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
                        $(".delete").prop("disabled",false);
                        console.log(<?php echo $resultado;?>);
                    </script>
                    <?php
                }else{
                    ?>
                     <script type="text/javascript"> 
                        var n = noty({
                        text        : '<div class="alert alert-warning  "><p><strong>Error <?php echo $_POST["nombreT"];?> no se pudo editar</p></div>',
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
        } else if ($_POST["tipo2"]==="crearBP") {
            if($resultado=="true"){
                ?>´
                <script type="text/javascript"> 
                    var n = noty({
                    text        : '<div class="alert alert-success  "><p><strong>Se creó la distribución correctamente</p></div>',
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
                    $("#guardarD").prop("disabled",false);
                    $("#crearBP").prop("disabled",false);
                    $('.principalG').removeClass('hide');
                    $('#editarMapa').load('./tables/mantenimiento/vacio.php',function() {    
                    }); 
                    var table = $('#table-editable').DataTable();
                    table.ajax.reload();
                </script>
                <?php
                
            }else{
                ?>
                <script type="text/javascript"> 
                    var n = noty({
                    text        : '<div class="alert alert-warning  "><p><strong>Error la distribución no se pudo crear</p></div>',
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
                    $("#guardarD").prop("disabled",false);
                    console.log(<?php echo $resultado;?>);
                </script>
                <?php
            }
        } else if ($_POST["tipo2"]==="editarBP") {
            if($resultado=="true"){
                ?>
                <script type="text/javascript"> 
                    var n = noty({
                    text        : '<div class="alert alert-success  "><p><strong>Se editó la distribución correctamente</p></div>',
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
                    $("#editarD").prop("disabled",false);
                    $("#editarNombre").prop("disabled",false);
                    $('.principalG').removeClass('hide');
                    $('#editarMapa').load('./tables/mantenimiento/vacio.php',function() {    
                    }); 
                    var table = $('#table-editable').DataTable();
                    table.ajax.reload();
                </script>
                <?php
                
            }else{
                ?>
                 <script type="text/javascript"> 
                    var n = noty({
                    text        : '<div class="alert alert-warning  "><p><strong>Error la distribución no se pudo editar</p></div>',
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
                    $("#editarD").prop("disabled",false);
                    $("#editarNombre").prop("disabled",false);
                    console.log(<?php echo $resultado;?>);
                </script>
                <?php
            }
        }
    }
}else{
    ?>
    <script type="text/javascript"> 
        var n = noty({
        text        : '<div class="alert alert-warning  "><p><strong>'+mensaje+'</p></div>',
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
        $(".crear_categoria").prop("disabled",false);
        $(".editar_categoria").prop("disabled",false);
        $(".crear_distribucionS").prop("disabled",false);
        $(".editar_distribucionS").prop("disabled",false);
        $("#editarD").prop("disabled",false);
        $("#editarNombre").prop("disabled",false);
        $("#guardarD").prop("disabled",false);
    </script>
    <?php 
}

?>
<div class="alsaaerta" id="alertasaa" >
    </div>
    <?php
$transport->close();
?>