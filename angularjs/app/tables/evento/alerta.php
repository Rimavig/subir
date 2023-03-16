<?php
include ("../../conect.php");
include ("../../autenticacion.php");
include ("../../directorio.php");
$band=true;
$band2=false;
$resultado="";
$imagen="";
if (isset($_POST["estado"])) {
    $id=$_POST["id"];
    $estado=$_POST["estado"];
}
if (isset($_POST["salamapa"])) {
    $nombreT=$_POST["nombreT"];
    $tipo=$_POST["tipo"];
    $nombre=$_POST["nombre"];
    $duracion=$_POST["duracion"];
    $fechaI=$_POST["fechaI"];
    $fechaf=$_POST["fechaf"];
    $tipoE=$_POST["tipoE"];
    $productora=$_POST["productora"];
    $categoria=$_POST["categoria"];
    $clasificacion=$_POST["clasificacion"];
    $espectaculo=$_POST["espectaculo"];
    $procedencia=$_POST["procedencia"];
    $salamapa=$_POST["salamapa"];
    $aforo=$_POST["aforo"];
}
if ($band) {
//MANTENIMIENTO
    //CREAR 
    if ($_POST["tipo"]==="venta") {
        $re = $client->insertEvento($nombre,$duracion,$fechaI,$fechaf,$productora,$salamapa,$tipoE,$espectaculo,$categoria,$clasificacion,$procedencia,$aforo,"","V","I",$_SESSION["usuario"]);
        $resultado = "".$re;
        $band2=true;
    } else if ($_POST["tipo"]==="gratuito") {
        $re = $client->insertEvento($nombre,$duracion,$fechaI,$fechaf,$productora,$salamapa,$tipoE,$espectaculo,$categoria,$clasificacion,$procedencia,$aforo,"","G","I",$_SESSION["usuario"]);
        $resultado = "".$re;
        $band2=true;
    } else if ($_POST["tipo"]==="informativo") {
        $re = $client->insertEvento($nombre,$duracion,$fechaI,$fechaf,$productora,$salamapa,$tipoE,$espectaculo,$categoria,$clasificacion,$procedencia,$aforo,"","I","I",$_SESSION["usuario"]);
        $resultado = "".$re;
        $band2=true;
    //EDITAR
    } else if ($_POST["tipo"]==="Eventa") {
        $id=$_POST["id_evento"];
        $preventa=$_POST["preventa"];
        $re = $client->updateEvento_informacion($nombre,$duracion,$fechaI,$fechaf,$productora,$salamapa,$tipoE,$espectaculo,$categoria,$clasificacion,$procedencia,$aforo,"V","A",$id,  $preventa,$_SESSION["usuario"]);
        $resultado = "".$re;
        $band2=true;
    } else if ($_POST["tipo"]==="Egratuito") {
        $id=$_POST["id_evento"];
        $cantidad=$_POST["cantidad"];
        $re = $client->updateEvento_informacion($nombre,$duracion,$fechaI,$fechaf,$productora,$salamapa,$tipoE,$espectaculo,$categoria,$clasificacion,$procedencia,$aforo,"G","A",$id, $cantidad, $_SESSION["usuario"]);
        $resultado = "".$re;
        $band2=true;   
    } else if ($_POST["tipo"]==="Einformativo") {
        $id=$_POST["id_evento"];
        $preventa=$_POST["preventa"];
        $re = $client->updateEvento_informacion($nombre,$duracion,$fechaI,$fechaf,$productora,$salamapa,$tipoE,$espectaculo,$categoria,$clasificacion,$procedencia,$aforo,"I","A",$id, "N",$_SESSION["usuario"]);
        $resultado = "".$re;
        $band2=true;  
    } else if ($_POST["tipo"]==="Esinopsis") {
        $id=$_POST["id_evento"];
        $sinopsis=$_POST["sinopsis"];
        $descripcion2=$_POST["descripcion2"];
        $re = $client->updateEvento_sinopsis($sinopsis,$descripcion2,$id,$_SESSION["usuario"]);
        $resultado = "".$re;
        $band2=true;
    //ESTAD0
    }else if ($_POST["tipo"]==="ESventa" | $_POST["tipo"]==="ESgratuito" | $_POST["tipo"]==="ESinformativo") {
        if($estado=="P"){
            $imagen=$path_imagen1."evento"."/".trim($id)."H.png";
            $imagen1=$path_imagen1."evento"."/".trim($id)."V.png";
            $imagen2=$path_imagen1."evento"."/".trim($id)."C.png";
            if(file_exists($imagen) | file_exists($imagen1) | file_exists($imagen2)){
                $re = $client->updateEstadoEvento($id,$estado,$_SESSION["usuario"]);
                $resultado = "".$re;
                $band2=true;
            }else{
                ?>
                 <script type="text/javascript"> 
                     var n = noty({
                    text        : '<div class="alert alert-warning  "><p><strong>El evento no tiene todas las imagenes</p></div>',
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
                </script>
                <?php
            }
        }else{
            $re = $client->updateEstadoEvento($id,$estado,$_SESSION["usuario"]);
            $resultado = "".$re;
            $band2=true;
        }
        
    //ficha artistica
    } else if ($_POST["tipo"]==="eliminarFicha") {
        $id=$_POST["id"];
        $re = $client->deleteFichaArtistica($id);
        $resultado = "".$re;
        $band2=true;
        
    } else if ($_POST["tipo"]==="crearFicha") {
        $id=$_POST["id_evento"];
        $titulo=$_POST["titulo"];
        $descripcion=$_POST["descripcion"];
        $re = $client->insertFichaArtistica($id,$titulo,$descripcion,$_SESSION["usuario"]);
        $resultado = "".$re;
        $band2=true;  
    } else if ($_POST["tipo"]==="editarFicha") {
        $id=$_POST["id_ficha"];
        $titulo=$_POST["titulo"];
        $descripcion=$_POST["descripcion"];
        $re = $client->updateFichaArtistica($titulo,$descripcion,$id,$_SESSION["usuario"]);
        $resultado = "".$re;
        $band2=true;
    //FUNCION    
    } else if ($_POST["tipo"]==="editarFuncion") {
        $id=$_POST["id_funcion"];
        $fecha=$_POST["fecha"];
        $aforo="0";
        $re = $client->updateFuncion($fecha,$aforo,"",$id,$_SESSION["usuario"]);
        $resultado = "".$re;
        $band2=true;
    }else if ($_POST["tipo"]==="crearFuncion") {
        $id=$_POST["id_evento"];
        $aforo="0";
        $fecha=$_POST["fecha"];
        $re = $client->insertFuncion($fecha,$aforo,$id,"A",$_SESSION["usuario"]);
        $resultado = "".$re;
        $band2=true;
    } else if ($_POST["tipo"]==="eliminarFuncion") {
        $id=$_POST["id"];
        $re = $client->updateEstadoFuncion($id,"E",$_SESSION["usuario"]);
        $resultado = "".$re;
        $band2=true;
    } else if ($_POST["tipo"]==="estadoFuncion") {
        $id=$_POST["id"];
        $estado=$_POST["estado"];
        $re = $client->updateEstadoFuncion($id,$estado,$_SESSION["usuario"]);
        $resultado = "".$re;
        $band2=true;
    //PRECIO    
    } else if ($_POST["tipo"]==="editarPrecio") {
        $id=$_POST["id_funcion"];
        $nombre=$_POST["nombre"];
        $precio=$_POST["precio"];
        $aforo=$_POST["aforo"];
        $re = $client->updatePlatea($nombre,$precio,$aforo,"",$id,$_SESSION["usuario"]);
        $resultado = "".$re;
        $band2=true;
    }else if ($_POST["tipo"]==="crearPrecio") {
        $id=$_POST["id_evento"];
        $nombre=$_POST["nombre"];
        $precio=$_POST["precio"];
        $aforo=$_POST["aforo"];
        $re = $client->insertPlatea($nombre,$precio,$aforo,$id,"A",$_SESSION["usuario"]);
        $resultado = "".$re;
        $band2=true;
    } else if ($_POST["tipo"]==="eliminarPrecio") {
        $id=$_POST["id"];
        $re = $client->updateEstadoPlatea($id,"E",$_SESSION["usuario"]);
        $resultado = "".$re;
        $band2=true;
    } else if ($_POST["tipo"]==="estadoPrecio") {
        $id=$_POST["id"];
        $estado=$_POST["estado"];
        $re = $client->updateEstadoPlatea($id,$estado,$_SESSION["usuario"]);
        $resultado = "".$re;
        $band2=true;
    //IMAGEN
    } else if ($_POST["tipo"]==="imagenH") {
        $id=$_POST["id_evento"];
        $Etipo="evento";
        if (isset($_POST["Himagen"])) {
            if($_POST["Himagen"]!=""){
                $image = $_POST['Himagen'];
                $img = str_replace('data:image/png;base64,', '', $image);
                $img = str_replace(' ', '+', $img);
                $path = $path_imagen1.$Etipo."/".trim($id)."H.png";
                $status = file_put_contents($path,base64_decode( $img));
            }
        }
        if (isset($_POST["Vimagen"])) {
            if($_POST["Vimagen"]!=""){
                $image = $_POST['Vimagen'];
                $img = str_replace('data:image/png;base64,', '', $image);
                $img = str_replace(' ', '+', $img);
                $path = $path_imagen1.$Etipo."/".trim($id)."V.png";
                $status = file_put_contents($path,base64_decode( $img));
            }
        }
        if (isset($_POST["Cimagen"])) {
            if($_POST["Cimagen"]!=""){
                $image = $_POST['Cimagen'];
                $img = str_replace('data:image/png;base64,', '', $image);
                $img = str_replace(' ', '+', $img);
                $path = $path_imagen1.$Etipo."/".trim($id)."C.png";
                $status = file_put_contents($path,base64_decode( $img));
            }
        }
        $band2=false;    
    } else if ($_POST["tipo"]==="imagenV") {

        $id=$_POST["id_evento"];
        $Etipo="evento";
        if (isset($_POST["imagen"])) {
            $image = $_POST['imagen'];
            $img = str_replace('data:image/png;base64,', '', $image);
            $img = str_replace(' ', '+', $img);
            $path = $path_imagen1.$Etipo."/".trim($id)."V.png";
            $status = file_put_contents($path,base64_decode( $img));
        }
        $band2=false;    
    } else if ($_POST["tipo"]==="imagenC") {
        $id=$_POST["id_evento"];
        $Etipo="evento";
        if (isset($_POST["imagen"])) {
            $image = $_POST['imagen'];
            $img = str_replace('data:image/png;base64,', '', $image);
            $img = str_replace(' ', '+', $img);
            $path = $path_imagen1.$Etipo."/".trim($id)."C.png";
            $status = file_put_contents($path,base64_decode( $img));
        }
        $band2=false;   
    } else if ($_POST["tipo"]==="editarMultimedia") {
        $id=$_POST["id_evento"];
        $video=$_POST["video"];
        $re = $client->updateEvento_multimedia($video,"venta",$id,$_SESSION["usuario"]);
        $resultado = "".$re;
        $band2=true; 
    } else if ($_POST["tipo"]==="editarDestacado") {
        $id=$_POST["id_evento"];
        $re = $client->updateEventoDestacado($id,$_SESSION["usuario"]);
        $resultado = "".$re;
        $band2=true; 
    }    
    //TIPO DE ALERTA 
    if ($band2) {
        if ($_POST["tipo2"]==="crear") {
            if($resultado=="true"){
                if ($_POST["tipo"]==="venta" | $_POST["tipo"]==="gratuito" | $_POST["tipo"]==="informativo"){
                    ?>
                    <script type="text/javascript"> 
                        alert("Se creó <?php echo $_POST["nombreT"];?> correctamente");
                        $(".crear_evento").prop("disabled",false);
                        $('#Cevento').modal('hide'); // abrir
                        var table = $('#table-editable').DataTable();
                        table.ajax.reload();
                    </script>
                    <?php
                }else  if ($_POST["tipo"]==="crearFicha"){
                    ?>
                    <script type="text/javascript"> 
                        alert("Se creó la <?php echo $_POST["nombreT"];?> correctamente");
                        $('.page-spinner-loader').removeClass('hide');
                        $('#Cevento').modal('hide'); // cerrar
                        $('#descripcion').load('./tables/evento/tab_descripcion.php', {var1:<?php echo $_POST["id_evento"];?>,tipo:"venta"},function() { 
                            $('.page-spinner-loader').addClass('hide');
                            $(".crear_ficha_artistica").prop("disabled",false);
                        });
                    </script>
                    <?php
                }else  if ($_POST["tipo"]==="crearFuncion"){
                    ?>
                    <script type="text/javascript"> 
                        alert("Se creó la <?php echo $_POST["nombreT"];?> correctamente");
                        $('.page-spinner-loader').removeClass('hide');
                        $('#Cevento').modal('hide'); // cerrar
                        $('#funciones').load('./tables/evento/tab_funciones.php', {var1:<?php echo $_POST["id_evento"];?>,tipo:"venta"},function() { 
                            $('.page-spinner-loader').addClass('hide');
                            $(".crear_funcion").prop("disabled",false);
                        });
                    </script>
                    <?php
                }else  if ($_POST["tipo"]==="crearPrecio"){
                    ?>
                    <script type="text/javascript"> 
                        alert("Se creó <?php echo $_POST["nombreT"];?> correctamente");
                        $('.page-spinner-loader').removeClass('hide');
                        $('#Cevento').modal('hide'); // cerrar
                        $('#precios').load('./tables/evento/tab_precio.php', {var1:<?php echo $_POST["id_evento"];?>,tipo:"venta"},function() { 
                            $('.page-spinner-loader').addClass('hide');
                            $(".crear_precio").prop("disabled",false);
                        });
                    </script>
                    <?php
                }
            }else{
                ?>
                <script type="text/javascript"> 
                    alert("Error <?php echo $_POST["nombreT"];?> no se pudo crear");
                    $(".crear_ficha_artistica").prop("disabled",false);
                    $(".crear_evento").prop("disabled",false);
                    $(".crear_funcion").prop("disabled",false);
                    $(".crear_precio").prop("disabled",false);
                    console.log("<?php echo $resultado;?>");
                </script>
                <?php
            }
        } else if ($_POST["tipo2"]==="editar") {
            if($resultado=="true"){
                if ($_POST["tipo"]==="Eventa"){
                    ?>
                    <script type="text/javascript"> 
                    alert("Se editó <?php echo $_POST["nombreT"];?> correctamente");
                        //location.reload();
                        $('.page-spinner-loader').removeClass('hide');
                        $('#informacion').load('./tables/evento/tab_informacion.php', {var1:<?php echo $_POST["id_evento"];?>,tipo:"venta"},function() { 
                            $(".editar_venta").prop("disabled",false);
                            $('.page-spinner-loader').addClass('hide');
                        });
                        $('#funciones').load('./tables/evento/tab_funciones.php', {var1:<?php echo $_POST["id_evento"];?>,tipo:"venta"},function() { 
                            $('.page-spinner-loader').addClass('hide');
                            $(".editar_funcion").prop("disabled",false);
                        });
                    </script>
                    <?php
                }else if ($_POST["tipo"]==="Egratuito"){
                        ?>
                        <script type="text/javascript"> 
                        alert("Se editó <?php echo $_POST["nombreT"];?> correctamente");
                            //location.reload();
                            $('.page-spinner-loader').removeClass('hide');
                            $('#informacion').load('./tables/evento/tab_informacion.php', {var1:<?php echo $_POST["id_evento"];?>,tipo:"gratuito"},function() { 
                                $(".editar_venta").prop("disabled",false);
                                $('.page-spinner-loader').addClass('hide');
                            });
                            $('#funciones').load('./tables/evento/tab_funciones.php', {var1:<?php echo $_POST["id_evento"];?>,tipo:"gratuito"},function() { 
                                $('.page-spinner-loader').addClass('hide');
                                $(".editar_funcion").prop("disabled",false);
                            });
                        </script>
                        <?php
                }else if ($_POST["tipo"]==="Einformativo"){
                    ?>
                    <script type="text/javascript"> 
                    alert("Se editó <?php echo $_POST["nombreT"];?> correctamente");
                        //location.reload();
                        $('.page-spinner-loader').removeClass('hide');
                        $('#informacion').load('./tables/evento/tab_informacion.php', {var1:<?php echo $_POST["id_evento"];?>,tipo:"informativo"},function() { 
                            $(".editar_venta").prop("disabled",false);
                            $('.page-spinner-loader').addClass('hide');
                        });
                    </script>
                    <?php
                }else  if ($_POST["tipo"]==="Esinopsis" || $_POST["tipo"]==="editarFicha"){
                    ?>
                    <script type="text/javascript"> 
                        alert("Se editó <?php echo $_POST["nombreT"];?> correctamente");
                        $('#Cevento').modal('hide'); // cerrar
                        $('.page-spinner-loader').removeClass('hide');
                        
                        $('#descripcion').load('./tables/evento/tab_descripcion.php', {var1:<?php echo $_POST["id_evento"];?>,tipo:"venta"},function() { 
                            $(".editar_sinopsis").prop("disabled",false);
                            $(".editar_ficha_artistica").prop("disabled",false);
                            $('.page-spinner-loader').addClass('hide');
                        });
                    </script>
                    <?php
                }else  if ($_POST["tipo"]==="editarFuncion"){
                    ?>
                    <script type="text/javascript"> 
                        alert("Se editó <?php echo $_POST["nombreT"];?> correctamente");
                        $('#Cevento').modal('hide'); // cerrar
                        $('.page-spinner-loader').removeClass('hide');
                        $('#funciones').load('./tables/evento/tab_funciones.php', {var1:<?php echo $_POST["id_evento"];?>,tipo:"venta"},function() { 
                            $('.page-spinner-loader').addClass('hide');
                            $(".editar_funcion").prop("disabled",false);
                        });
                    </script>
                    <?php
                }else  if ($_POST["tipo"]==="editarPrecio"){
                    ?>
                    <script type="text/javascript"> 
                         alert("Se editó <?php echo $_POST["nombreT"];?> correctamente");
                        $('.page-spinner-loader').removeClass('hide');
                        $('#Cevento').modal('hide'); // cerrar
                        $('#precios').load('./tables/evento/tab_precio.php', {var1:<?php echo $_POST["id_evento"];?>,tipo:"venta"},function() { 
                            $('.page-spinner-loader').addClass('hide');
                            $(".editar_precio").prop("disabled",false);
                        });
                    </script>
                    <?php
                }else  if ($_POST["tipo"]==="editarMultimedia"){
                    ?>
                    <script type="text/javascript"> 
                         alert("Se editó el video correctamente");
                        $('.page-spinner-loader').removeClass('hide');
                        $('#multimedia').load('./tables/evento/tab_multimedia.php', {var1:<?php echo $_POST["id_evento"];?>,tipo:"venta"},function() { 
                            $('.page-spinner-loader').addClass('hide');
                            $(".editarMultimedia").prop("disabled",false);
                        });
                    </script>
                    <?php
                }else  if ($_POST["tipo"]==="editarDestacado"){
                    ?>
                    <script type="text/javascript"> 
                        alert("Se editó el evento destacado correctamente");
                        $(".editar_destacado").prop("disabled",false);
                    </script>
                    <?php
                }
            }else{
                ?>
                <script type="text/javascript"> 
                    console.log("<?php echo $resultado;?>");
                    alert("Error <?php echo $_POST["nombreT"];?> no se pudo editar");
                    $(".editar_sinopsis").prop("disabled",false);
                    $(".editar_ficha_artistica").prop("disabled",false);
                    $(".editar_venta").prop("disabled",false);
                    $(".editar_funcion").prop("disabled",false);
                    $(".editar_precio").prop("disabled",false);
                    $(".editar_destacado").prop("disabled",false);
                </script>
                <?php
            }
        } else if ($_POST["tipo2"]==="estado") {
            if($resultado=="true"){
                if($estado=="B"){
                    if ($_POST["tipo"]==="ESventa" | $_POST["tipo"]==="ESgratuito" | $_POST["tipo"]==="ESinformativo"){
                        ?>
                        <script type="text/javascript"> 
                            alert("Se Eliminó <?php echo $_POST["nombreT"];?> correctamente");
                            $(".delete").prop("disabled",false);
                            var table = $('#table-editable').DataTable();
                            table.ajax.reload();
                        </script>
                        <?php
                    }else  if ($_POST["tipo"]==="eliminarFicha"){
                        ?>
                        <script type="text/javascript"> 
                            alert("Se Eliminó <?php echo $_POST["nombreT"];?> correctamente");
                            $('.page-spinner-loader').removeClass('hide');
                            $('#descripcion').load('./tables/evento/tab_descripcion.php', {var1:<?php echo $_POST["id_evento"];?>,tipo:"venta"},function() { 
                                $('.page-spinner-loader').addClass('hide');
                                $(".deleteFicha").prop("disabled",false);
                            });
                        </script>
                        <?php
                    }else  if ($_POST["tipo"]==="eliminarFuncion"){
                        ?>
                        <script type="text/javascript"> 
                            alert("Se Eliminó <?php echo $_POST["nombreT"];?> correctamente");
                            $('.page-spinner-loader').removeClass('hide');
                            $('#funciones').load('./tables/evento/tab_funciones.php', {var1:<?php echo $_POST["id_evento"];?>,tipo:"venta"},function() { 
                                $('.page-spinner-loader').addClass('hide');
                                $(".deleteFuncion").prop("disabled",false);
                            });
                        </script>
                        <?php
                    }else  if ($_POST["tipo"]==="eliminarPrecio"){
                        ?>
                        <script type="text/javascript"> 
                            alert("Se Eliminó <?php echo $_POST["nombreT"];?> correctamente");
                            $('.page-spinner-loader').removeClass('hide');
                            $('#precios').load('./tables/evento/tab_precio.php', {var1:<?php echo $_POST["id_evento"];?>,tipo:"venta"},function() { 
                                $('.page-spinner-loader').addClass('hide');
                                $(".deletePrecio").prop("disabled",false);
                            });
                        </script>
                        <?php
                    }
                }else{
                    if ($_POST["tipo"]==="estadoFuncion"){
                        ?>
                        <script type="text/javascript"> 
                            alert("Se editó <?php echo $_POST["nombreT"];?> correctamente");
                            $('.page-spinner-loader').removeClass('hide');
                            $('#funciones').load('./tables/evento/tab_funciones.php', {var1:<?php echo $_POST["id_evento"];?>,tipo:"venta"},function() { 
                                $('.page-spinner-loader').addClass('hide');
                                $(".estadoFuncion").prop("disabled",false);
                            });
                        </script>
                        <?php
                    }else  if ($_POST["tipo"]==="estadoPrecio"){
                        ?>
                        <script type="text/javascript"> 
                            alert("Se editó <?php echo $_POST["nombreT"];?> correctamente");
                            $('.page-spinner-loader').removeClass('hide');
                            $('#precios').load('./tables/evento/tab_precio.php', {var1:<?php echo $_POST["id_evento"];?>,tipo:"venta"},function() { 
                                $('.page-spinner-loader').addClass('hide');
                                $(".estadoPrecio").prop("disabled",false);
                            });
                        </script>
                        <?php    
                    }else {
                        ?>
                        <script type="text/javascript"> 
                            alert("Se editó <?php echo $_POST["nombreT"];?> correctamente");
                            $(".estado").prop("disabled",false);
                            var table = $('#table-editable').DataTable();
                            table.ajax.reload();
                        </script>
                        <?php
                    }  
                }
            }else{
                if($estado=="B"){
                    if ($_POST["tipo"]==="ESventa" | $_POST["tipo"]==="ESgratuito" | $_POST["tipo"]==="ESinformativo") {
                        ?>
                        <script type="text/javascript"> 
                            alert("<?php echo $resultado;?>");
                            $(".delete").prop("disabled",false);
                            var table = $('#table-editable').DataTable();
                            table.ajax.reload();
                        </script>
                        <?php
                    }else{
                        ?>
                        <script type="text/javascript"> 
                            alert("Error <?php echo $_POST["nombreT"];?> no se pudo eliminar");
                            $(".delete").prop("disabled",false);
                            $(".deleteFicha").prop("disabled",false);
                            $(".deleteFuncion").prop("disabled",false);
                            $(".deletePrecio").prop("disabled",false);
                            console.log("<?php echo $resultado;?>");
                        </script>
                        <?php
                    }

                }else{
                    if ($_POST["tipo"]==="ESventa" | $_POST["tipo"]==="ESgratuito" | $_POST["tipo"]==="ESinformativo") {
                        ?>
                        <script type="text/javascript"> 
                            alert("<?php echo $resultado;?>");
                            $(".estado").prop("disabled",false);
                            var table = $('#table-editable').DataTable();
                            table.ajax.reload();
                        </script>
                        <?php
                    }else{
                        ?>
                        <script type="text/javascript"> 
                            alert("Error <?php echo $_POST["nombreT"];?> no se pudo editar");
                            $(".estado").prop("disabled",false);
                            $(".estadoFuncion").prop("disabled",false);
                            $(".estadoPrecio").prop("disabled",false);
                            console.log("<?php echo $resultado;?>");
                        </script>
                        <?php
                    }
                }
            }
        } 
    }else{
        if($_POST["tipo"]==="imagenC" | $_POST["tipo"]==="imagenV" | $_POST["tipo"]==="imagenH"){
            ?>
            <script type="text/javascript"> 
                alert("Se editó correctamente la imagen");
                $('.page-spinner-loader').removeClass('hide');
                $('#multimedia').load('./tables/evento/tab_multimedia.php', {var1:<?php echo $_POST["id_evento"];?>,tipo:"venta"},function() { 
                    $('.page-spinner-loader').addClass('hide');
                    $(".editar_imagenH").prop("disabled",false);
                    $(".editar_imagenV").prop("disabled",false);
                    $(".editar_imagenC").prop("disabled",false);
                });
            </script>
            <?php
        }
        ?><script type="text/javascript"> 

        $(".crear_evento").prop("disabled",false);
        $(".editar_venta").prop("disabled",false);
        $(".editar_sinopsis").prop("disabled",false);
        $(".estado").prop("disabled",false);
        $(".delete").prop("disabled",false);

        $(".crear_ficha_artistica").prop("disabled",false);
        $(".editar_ficha_artistica").prop("disabled",false);
        $(".deleteFicha").prop("disabled",false);

        $(".crear_funcion").prop("disabled",false);
        $(".editar_funcion").prop("disabled",false);
        $(".deleteFuncion").prop("disabled",false);
        $(".estadoFuncion").prop("disabled",false);

        $(".crear_precio").prop("disabled",false);
        $(".editar_precio").prop("disabled",false);
        $(".deletePrecio").prop("disabled",false);
        $(".editar_destacado").prop("disabled",false);
    </script> <?php 
    }
}else{
    ?><script type="text/javascript"> 

        $(".crear_evento").prop("disabled",false);
        $(".editar_venta").prop("disabled",false);
        $(".editar_sinopsis").prop("disabled",false);
        $(".estado").prop("disabled",false);
        $(".delete").prop("disabled",false);

        $(".crear_ficha_artistica").prop("disabled",false);
        $(".editar_ficha_artistica").prop("disabled",false);
        $(".deleteFicha").prop("disabled",false);

        $(".crear_funcion").prop("disabled",false);
        $(".editar_funcion").prop("disabled",false);
        $(".deleteFuncion").prop("disabled",false);
        $(".estadoFuncion").prop("disabled",false);

        $(".crear_precio").prop("disabled",false);
        $(".editar_precio").prop("disabled",false);
        $(".deletePrecio").prop("disabled",false);
        $(".editar_destacado").prop("disabled",false);
    </script> <?php 
}

?>
<div class="alsaaerta" id="alertasaa" >
    </div>
    <?php
$transport->close();
?>