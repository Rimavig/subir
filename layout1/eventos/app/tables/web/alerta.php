<?php
include ("../../conect.php");
include ("../../autenticacion.php");
include ("../../directorio.php");
$band=true;
$band2=false;
$resultado="";
$tipoR="";
$tipo="";
$id="";
if (isset($_POST["tipo"])) {
    $tipo=$_POST["tipo"];
    if ( $tipo=="guardarQuienes"){
        $id = "1";
        $Descripcion = $_POST["sinopsis"];
        $tipo = "teatro";
        $re = $client->updateInformacionWeb($id,$Descripcion,$tipo ,$_SESSION["usuario"]);
        $resultado = "".$re;
        $image = $_POST['Himagen'];
        if ($resultado=="true"  && $image!=null){
            $img = str_replace('data:image/png;base64,', '', $image);
            $img = str_replace(' ', '+', $img);
            $path = $path_1.$quienes_somosI;
            $status = file_put_contents($path,base64_decode( $img));
        }
    }else if ( $tipo=="guardarMisionT"){
        $id = "2";
        $Descripcion = $_POST["sinopsis"];
        $tipo = "teatro";
        $re = $client->updateInformacionWeb($id,$Descripcion,$tipo ,$_SESSION["usuario"]);
        $resultado = "".$re;
        $image = $_POST['Himagen'];
        if ($resultado=="true"  && $image!=null){
            $img = str_replace('data:image/png;base64,', '', $image);
            $img = str_replace(' ', '+', $img);
            $path = $path_1.$misionI;
            $status = file_put_contents($path,base64_decode( $img));
        }
    }else if ( $tipo=="guardarVisionT"){
        $id = "3";
        $Descripcion = $_POST["sinopsis"];
        $tipo = "teatro";
        $re = $client->updateInformacionWeb($id,$Descripcion,$tipo ,$_SESSION["usuario"]);
        $resultado = "".$re;
        $image = $_POST['Himagen'];
        if ($resultado=="true"  && $image!=null){
            $img = str_replace('data:image/png;base64,', '', $image);
            $img = str_replace(' ', '+', $img);
            $path = $path_1.$visionI;
            $status = file_put_contents($path,base64_decode( $img));
        }
    }else if ( $tipo=="guardarQuienesF"){
        $id = "4";
        $Descripcion = $_POST["sinopsis"];
        $tipo = "fundacion";
        $re = $client->updateInformacionWeb($id,$Descripcion,$tipo ,$_SESSION["usuario"]);
        $resultado = "".$re;
    }else if ( $tipo=="guardarAmigos"){
        $id = "8";
        $Descripcion = $_POST["sinopsis"];
        $tipo = "amigos";
        $re = $client->updateInformacionWeb($id,$Descripcion,$tipo ,$_SESSION["usuario"]);
        $resultado = "".$re;
    }else if ( $tipo=="guardarMisionF"){
        $id = "5";
        $Descripcion = $_POST["sinopsis"];
        $tipo = "fundacion";
        $re = $client->updateInformacionWeb($id,$Descripcion,$tipo ,$_SESSION["usuario"]);
        $resultado = "".$re;
        $image = $_POST['Himagen'];
        if ($resultado=="true"  && $image!=null){
            $img = str_replace('data:image/png;base64,', '', $image);
            $img = str_replace(' ', '+', $img);
            $path = $path_1.$misionF;
            $status = file_put_contents($path,base64_decode( $img));
        }
    }else if ( $tipo=="guardarVisionF"){
        $id = "6";
        $Descripcion = $_POST["sinopsis"];
        $tipo = "fundacion";
        $re = $client->updateInformacionWeb($id,$Descripcion,$tipo ,$_SESSION["usuario"]);
        $resultado = "".$re;
        $image = $_POST['Himagen'];
        if ($resultado=="true"  && $image!=null){
            $img = str_replace('data:image/png;base64,', '', $image);
            $img = str_replace(' ', '+', $img);
            $path = $path_1.$visionF;
            $status = file_put_contents($path,base64_decode( $img));
        }
    }else if ( $tipo=="guardarNosotrosT"){
        $image = $_POST['Himagen'];
        $img = str_replace('data:image/png;base64,', '', $image);
        $img = str_replace(' ', '+', $img);
        $path = $path_1.$sobre_nosotrosI;
        $status = file_put_contents($path,base64_decode( $img));
        $resultado="true";
    }else if ( $tipo=="crear_objetivo"){
        $titulo = "Objetivos";
        $tipo = "objetivos";
        $objetivo = $_POST['objetivo'];
        $orden = $_POST['orden'];
        $re = $client->insertInformacionTabla($titulo,$objetivo,$orden ,$tipo ,$_SESSION["usuario"]);
        $resultado = "".$re;
        if ($resultado!="false"){
            $resultado="true";
        }
    }else if ( $tipo=="editar_objetivo"){
        $id =  $_POST['id'];
        $titulo = "Objetivos";
        $tipo = "objetivos";
        $objetivo = $_POST['objetivo'];
        $orden = $_POST['orden'];
        $re = $client->updateInformacionTabla($id,$titulo,$objetivo,$orden ,$_SESSION["usuario"]);
        $resultado = "".$re;
    }else if ( $tipo=="eliminarTabla"){
        $id =  $_POST['id'];
        $re = $client->deleteInformacionTabla($id,$_SESSION["usuario"]);
        $resultado = "".$re;
    }else if ( $tipo=="crear_tabla"){
        $tipo = $_POST['tipo2'];
        $titulo = $_POST['nombre'];
        $objetivo = $_POST['descripcion'];
        $orden = $_POST['orden'];
        $re = $client->insertInformacionTabla($titulo,$objetivo,$orden ,$_SESSION["usuario"]);
        $resultado = "".$re;
        $image = $_POST['Himagen'];
        if ($resultado!="false" && $image!=null){
            $img = str_replace('data:image/png;base64,', '', $image);
            $img = str_replace(' ', '+', $img);
            $path = $path_1.$intalacionesI.$resultado.".png";
            $status = file_put_contents($path,base64_decode( $img));
            $resultado="true";
        }
    }else if ( $tipo=="editar_tabla"){
        $id =  $_POST['id'];
        $tipo = $_POST['tipo2'];
        $titulo = $_POST['nombre'];
        $objetivo = $_POST['descripcion'];
        $orden = $_POST['orden'];
        $re = $client->updateInformacionTabla($id,$titulo,$objetivo,$orden  ,$_SESSION["usuario"]);
        $resultado = "".$re;
        $image = $_POST['Himagen'];
        if ($resultado=="true" && $image!=null){
            $img = str_replace('data:image/png;base64,', '', $image);
            $img = str_replace(' ', '+', $img);
            $path = $path_1.$intalacionesI.$id.".png";
            $status = file_put_contents($path,base64_decode( $img));
        }
    }else if ( $tipo=="editar_cafe"){
        $id =  $_POST['id'];
        $titulo = $_POST['nombre'];
        $objetivo = $_POST['descripcion'];
        $orden = "1";
        $re = $client->updateInformacionTabla($id,$titulo,$objetivo,$orden  ,$_SESSION["usuario"]);
        $resultado = "".$re;
    }else if ( $tipo=="crear_pregunta"){
        $tipo = $_POST['tipo2'];
        $titulo = $_POST['nombre'];
        $objetivo = $_POST['descripcion'];
        $orden = $_POST['orden'];
        $re = $client->insertInformacionTabla($titulo,$objetivo,$orden ,$tipo ,$_SESSION["usuario"]);
        $resultado = "".$re;
        if ($resultado!="false"){
            $resultado="true";
        }
    }else if ( $tipo=="editar_pregunta"){
        $id =  $_POST['id'];
        $tipo = $_POST['tipo2'];
        $titulo = $_POST['nombre'];
        $objetivo = $_POST['descripcion'];
        $orden = $_POST['orden'];
        $re = $client->updateInformacionTabla($id,$titulo,$objetivo,$orden ,$_SESSION["usuario"]);
        $resultado = "".$re;
    }else if ( $tipo=="editar_galeria"){
        $id =  $_POST['id'];
        $orden = $_POST['orden'];
        $re = $client->updateInformacionGaleria($id,$orden,$_SESSION["usuario"]);
        $resultado = "".$re;
        $image = $_POST['Himagen'];
        if ($resultado=="true" && $image!=null ){
            $img = str_replace('data:image/png;base64,', '', $image);
            $img = str_replace(' ', '+', $img);
            $path = $path_1.$galeriaI.$id.".png";
            $status = file_put_contents($path,base64_decode( $img));
        }
    }else if ( $tipo=="crear_galeria"){
        $id =  $_POST['id'];
        $orden = $_POST['orden'];
        $re = $client->insertInformacionGaleria($id,$orden,$_SESSION["usuario"]);
        $resultado = "".$re;
        $image = $_POST['Himagen'];
        if ($resultado!="false"){
            $img = str_replace('data:image/png;base64,', '', $image);
            $img = str_replace(' ', '+', $img);
            $path = $path_1.$galeriaI.$resultado.".png";
            $status = file_put_contents($path,base64_decode( $img));
            $resultado="true";
        }
    }else if ( $tipo=="eliminarGaleria"){
        $id =  $_POST['id'];
        $re = $client->deleteInformacionGaleria($id,$_SESSION["usuario"]);
        $resultado = "".$re;
    }else if ( $tipo=="crear_descarga"){
        $id =  $_POST['id'];
        $orden = $_POST['orden'];
        $nombre = $_POST['nombre'];
        $re = $client->insertInformacionDescargable($id, $nombre,$orden,$_SESSION["usuario"]);
        $resultado = "".$re;
        if ($resultado!="false"){
            $informacionDelArchivo = $_FILES["file"];
            # La ubicación en donde PHP lo puso
            $ubicacionTemporal = $informacionDelArchivo["tmp_name"];
            #Nota: aquí tomamos el nombre que trae, pero recomiendo renombrarlo a otra cosa usando, por ejemplo, uniqid
            $nombreArchivo = $informacionDelArchivo["name"];
            $nuevaUbicacion = $path_1.$archivos . "/" . $resultado.".pdf";
            # Mover
            $resultado = move_uploaded_file($ubicacionTemporal, $nuevaUbicacion);
            $resultado="true";
        }
    }else if ( $tipo=="editar_descarga"){
        $id =  $_POST['id'];
        $orden = $_POST['orden'];
        $nombre = $_POST['nombre'];
        $re = $client->updateInformacionDescargable($id, $nombre,$orden,$_SESSION["usuario"]);
        $resultado = "".$re;
        if ($resultado=="true" &&   isset($_FILES["file"])){
            $informacionDelArchivo = $_FILES["file"];
            # La ubicación en donde PHP lo puso
            $ubicacionTemporal = $informacionDelArchivo["tmp_name"];
            #Nota: aquí tomamos el nombre que trae, pero recomiendo renombrarlo a otra cosa usando, por ejemplo, uniqid
            $nombreArchivo = $informacionDelArchivo["name"];
            $nuevaUbicacion = $path_1.$archivos . "/" . $id.".pdf";
            # Mover
            $resultado = move_uploaded_file($ubicacionTemporal, $nuevaUbicacion);
            $resultado="true";
        }
    }else if ( $tipo=="eliminarDescarga"){
        $id =  $_POST['id'];
        $re = $client->deleteInformacionDescargable($id,$_SESSION["usuario"]);
        $resultado = "".$re;
    }else if ( $tipo=="guardarProyectosT"){
        $id = "7";
        $Descripcion = $_POST["sinopsis"];
        $tipo = "proyectos";
        $re = $client->updateInformacionWeb($id,$Descripcion,$tipo ,$_SESSION["usuario"]);
        $resultado = "".$re;
    }else if ( $tipo=="guardarImagen"){
        $image = $_POST['Himagen'];
        $tipo2 = $_POST['tipo2'];
        $pat="";
        if  ( $tipo2=="Balquiler"){
            $pat=$Balquiler;
        }else if  ( $tipo2=="Bambiental"){
            $pat=$Bambiental;
        }else if  ( $tipo2=="Bamigos"){
            $pat=$Bamigos;
        }else if  ( $tipo2=="Bcontacto"){
            $pat=$Bcontacto;
        }else if  ( $tipo2=="Bfundacion"){
            $pat=$Bfundacion;
        }else if  ( $tipo2=="Bpreguntas"){
            $pat=$Bpreguntas;
        }else if  ( $tipo2=="Bnoticias"){
            $pat=$Bnoticias;
        }else if  ( $tipo2=="Bteatro"){
            $pat=$Bteatro;
        }else if  ( $tipo2=="Bpromociones"){
            $pat=$Bpromociones;
        }else if  ( $tipo2=="BannerW"){
            $pat=$bannerWlogo;
        }else if  ( $tipo2=="BannerM"){
            $pat=$bannerAlogo;
        }else if  ( $tipo2=="Bcafe"){
            $pat=$Bcafe;
        }else if  ( $tipo2=="imagenP"){
            $pat=$imagenP;
        }
        if ( $image!=null){
            $img = str_replace('data:image/png;base64,', '', $image);
            $img = str_replace(' ', '+', $img);
            $path = $path_1.$pat;
            $status = file_put_contents($path,base64_decode( $img));
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
                    if  ( "<?php echo $tipo2; ?>"=="Balquiler"){
                        $('#imagenAlquiler').load('./tables/web/imagenes/alquiler.php', function() {    
                        });
                    }else if  ( "<?php echo $tipo2; ?>"=="Bambiental"){
                        $('#imagenAmbiental').load('./tables/web/imagenes/ambiental.php', function() {    
                        });
                    }else if  ( "<?php echo $tipo2; ?>"=="Bamigos"){
                        $('#imagenAmigos').load('./tables/web/imagenes/amigos.php', function() {    
                        });
                    }else if  ( "<?php echo $tipo2; ?>"=="Bcontacto"){
                        $('#imagenContacto').load('./tables/web/imagenes/contacto.php', function() {    
                        });
                    }else if  ( "<?php echo $tipo2; ?>"=="Bfundacion"){
                        $('#imagenFundacion').load('./tables/web/imagenes/fundacion.php', function() {    
                        });
                    }else if  ( "<?php echo $tipo2; ?>"=="Bpreguntas"){
                        $('#imagenPreguntas').load('./tables/web/imagenes/preguntas.php', function() {    
                        });
                    }else if  ( "<?php echo $tipo2; ?>"=="Bnoticias"){
                        $('#imagenNoticias').load('./tables/web/imagenes/noticias.php', function() {    
                        });
                    }else if  ( "<?php echo $tipo2; ?>"=="Bcafe"){
                        $('#imagenCafe').load('./tables/web/imagenes/cafe.php', function() {    
                    });
                    }else if  ( "<?php echo $tipo2; ?>"=="Bteatro"){
                        $('#imagenTeatro').load('./tables/web/imagenes/teatro.php', function() {    
                    });
                    }else if  ( "<?php echo $tipo2; ?>"=="Bpromociones"){
                        $('#imagenPromocion').load('./tables/web/imagenes/promociones.php', function() {    
                        });
                    }else if  ( "<?php echo $tipo2; ?>"=="BannerW"){
                        $('#imagenBannerW').load('./tables/web/imagenes/bannerW.php', function() {    
                        });
                    }else if  ( "<?php echo $tipo2; ?>"=="BannerM"){
                        $('#imagenBannerM').load('./tables/web/imagenes/bannerM.php', function() {    
                        });
                    }else if  ( "<?php echo $tipo2; ?>"=="imagenP"){
                        $('#imagenInicio').load('./tables/web/imagenes/imagenP.php', function() {    
                        });
                    }
            </script>
            <?php
        }
    }else if ( $tipo=="crear_InformacionA"){
        $objetivo = $_POST['descripcion'];
        $orden = $_POST['orden'];
        $re = $client->insertInformacionAdicional($objetivo,$orden,$_SESSION["usuario"]);
        $resultado = "".$re;
        if ($resultado!="false"){
            $resultado="true";
        }
    }else if ( $tipo=="editar_informacionA"){
        $id = $_POST['id'];
        $objetivo = $_POST['descripcion'];
        $orden = $_POST['orden'];
        $re = $client->updateInformacionAdicional( $id,$objetivo,$orden,$_SESSION["usuario"]);
        $resultado = "".$re;
    }else if ( $tipo=="eliminarInformacionA"){
        $id = $_POST['id'];
        $re = $client->deleteInformacionAdicional( $id,$_SESSION["usuario"]);
        $resultado = "".$re;
    }else if ( $tipo=="eliminarBannerP"){
        $id = $_POST['id'];
        $re = $client->deleteBanner( $id,$_SESSION["usuario"]);
        $resultado = "".$re;
    }else if ( $tipo=="eliminarPublicidad"){
        $id = $_POST['id'];
        $re = $client->deletePublicidad( $id,$_SESSION["usuario"]);
        $resultado = "".$re;
    }else if ( $tipo=="crear_publicidad"){
        $titulo = $_POST['nombre'];
        $tipo2 = $_POST['tipo2'];
        $link = $_POST['link'];
        $orden = $_POST['orden'];
        $re = $client->insertPublicidad($titulo,$tipo2,$orden ,$link ,$_SESSION["usuario"]);
        $resultado = "".$re;
        $image = $_POST['Himagen'];
        if ($resultado!="false" && $image!=null){
            $img = str_replace('data:image/png;base64,', '', $image);
            $img = str_replace(' ', '+', $img);
            $path = $path_1.$publicidadI.$resultado.".png";
            $status = file_put_contents($path,base64_decode( $img));
            $resultado="true";
        }
    }else if ( $tipo=="editar_publicidad"){
        $id = $_POST['id'];
        $titulo = $_POST['nombre'];
        $tipo2 = $_POST['tipo2'];
        $link = $_POST['link'];
        $orden = $_POST['orden'];
        $re = $client->updatePublicidad($id,$titulo,$tipo2,$orden ,$link ,$_SESSION["usuario"]);
        $resultado = "".$re;
        $image = $_POST['Himagen'];
        if ($resultado=="true" && $image!=null){
            $img = str_replace('data:image/png;base64,', '', $image);
            $img = str_replace(' ', '+', $img);
            $path = $path_1.$publicidadI.$id.".png";
            $status = file_put_contents($path,base64_decode( $img));
        }
    }else if ( $tipo=="crear_bannerP"){
        $titulo = $_POST['nombre'];
        $nombre_boton = $_POST['nombre_boton'];
        $descripcion = $_POST['descripcion'];
        $link = $_POST['link'];
        $orden = $_POST['orden'];
        $re = $client->insertBanner($titulo,$descripcion,$nombre_boton ,$orden ,$link ,$_SESSION["usuario"]);
        $resultado = "".$re;
        $image = $_POST['Himagen'];
        if ($resultado!="false" && $image!=null){
            $img = str_replace('data:image/png;base64,', '', $image);
            $img = str_replace(' ', '+', $img);
            $path = $path_1.$bannerI.$resultado.".png";
            $status = file_put_contents($path,base64_decode( $img));
            $resultado="true";
        }
    }else if ( $tipo=="editar_bannerP"){
        $id = $_POST['id'];
        $titulo = $_POST['nombre'];
        $nombre_boton = $_POST['nombre_boton'];
        $descripcion = $_POST['descripcion'];
        $link = $_POST['link'];
        $orden = $_POST['orden'];
        $re = $client->updateBanner( $id,$titulo,$descripcion,$nombre_boton ,$orden ,$link ,$_SESSION["usuario"]);
        $resultado = "".$re;
        $image = $_POST['Himagen'];
        if ($resultado=="true" && $image!=null){
            $img = str_replace('data:image/png;base64,', '', $image);
            $img = str_replace(' ', '+', $img);
            $path = $path_1.$bannerI.$id.".png";
            $status = file_put_contents($path,base64_decode( $img));
        }
    }else if ( $tipo=="estadoIP"){
        $estado = $_POST['estado'];
        $re = $client->updateEstadoImagen("10","banner",$estado,$_SESSION["usuario"]);
        $resultado = "".$re;
    }else if ( $tipo=="estadoInstalacion"){
        $estado = $_POST['estado'];
        $id = $_POST['id'];
        $re = $client->updateEstadoImagen($id,"informacion",$estado,$_SESSION["usuario"]);
        $resultado = "".$re;
    }else if ( $tipo=="estadoBannerP"){
        $estado = $_POST['estado'];
        $id = $_POST['id'];
        $re = $client->updateEstadoImagen($id,"bannerWeb",$estado,$_SESSION["usuario"]);
        $resultado = "".$re;
    }else if ( $tipo=="estadoPublicidad"){
        $estado = $_POST['estado'];
        $id = $_POST['id'];
        $re = $client->updateEstadoImagen($id,"publicidad",$estado,$_SESSION["usuario"]);
        $resultado = "".$re;
    }else if ( $tipo=="estadoDescarga"){
        $estado = $_POST['estado'];
        $id = $_POST['id'];
        $re = $client->updateEstadoImagen($id,"descargable",$estado,$_SESSION["usuario"]);
        $resultado = "".$re;
    }else if ( $tipo=="estadoGaleria"){
        $estado = $_POST['estado'];
        $id = $_POST['id'];
        $re = $client->updateEstadoImagen($id,"galeria",$estado,$_SESSION["usuario"]);
        $resultado = "".$re;
    }else if ( $tipo=="estadoG"){
        $estado = $_POST['estado'];
        $id = $_POST['id'];
        $re = $client->updateEstadoImagen($id,"estadoG",$estado,$_SESSION["usuario"]);
        $resultado = "".$re;
    }else if ( $tipo=="estadoA"){
        $estado = $_POST['estado'];
        $id = $_POST['id'];
        $re = $client->updateEstadoImagen($id,"estadoA",$estado,$_SESSION["usuario"]);
        $resultado = "".$re;
    }
}
if($resultado=="true"){
    if(isset($_POST["tipo"])){
        $tipo=$_POST["tipo"];
        if ( $tipo=="guardarQuienes" | $tipo=="guardarMisionT" | $tipo=="guardarVisionT" | $tipo=="guardarNosotrosT"){
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
                $('#teatroQuienes').load('./tables/web/quienes_somos.php', function() {    
                    $("#table-objetivos").dataTable({ "language": {
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
                        "order": [[ 3, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                                },
                            { "sWidth": "5%", "className": "text-center", "aTargets": [ 0,2]},
                            { "sWidth": "40%", "className": "text-justify", "aTargets": [1]},
                            { "sWidth": "10%", "className": "text-center", "aTargets":[3,4]}
                    ]}); 
                    $('#Mteatro').modal('hide');
                });
            </script>
            <?php
        }else if ( $tipo=="guardarQuienesF" | $tipo=="guardarMisionF" | $tipo=="guardarVisionF" ){
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
                $('#fundacionQuienes').load('./tables/web/quienes_somos_fundacion.php', function() {    
                    $("#table-lineas").dataTable({ "language": {
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
                        "order": [[ 2, "asc" ]],
                        "aoColumnDefs": [
                            { "sWidth": "5%", "className": "text-center", "aTargets": [ 0,2]},
                            { "sWidth": "40%", "className": "text-justify", "aTargets": [4]},
                            { "sWidth": "10%", "className": "text-center", "aTargets": [ 1,3,5]}
                    ]}); 
                    $('#Mteatro').modal('hide');
                });
            </script>
            <?php
        }else if ( $tipo=="guardarAmigos" ){
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
                $('#otrasAmigos').load('./tables/web/amigos_teatro.php', function() {    
                    $("#table-preguntasA").dataTable({ "language": {
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
                        "order": [[ 1, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                                },
                            { "sWidth": "3%", "className": "text-center", "aTargets": [ 1]},
                            { "sWidth": "40%", "className": "text-justify", "aTargets": [3]},
                            { "sWidth": "10%", "className": "text-center", "aTargets": [4,5]},
                            { "sWidth": "20%", "className": "text-justify", "aTargets": [2]}
                    ]}); 
                    $("#table-beneficios").dataTable({ "language": {
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
                        "order": [[ 2, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                                },
                            { "sWidth": "5%", "className": "text-center", "aTargets": [ 2]},
                            { "sWidth": "15%", "className": "text-center", "aTargets": [1]},
                            { "sWidth": "10%", "className": "text-center", "aTargets": [5,3,6]},
                            { "sWidth": "30%", "className": "text-justify", "aTargets": 4}
                    ]});
                    $('#Mteatro').modal('hide');
                });
            </script>
            <?php
        }else if ( $tipo=="crear_objetivo"){
            ?>
            <script type="text/javascript"> 
            var n = noty({
                text        : '<div class="alert alert-success "><p><strong>Se creó correctamente</p></div>',
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
                $('#teatroQuienes').load('./tables/web/quienes_somos.php', function() {    
                    $("#table-objetivos").dataTable({ "language": {
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
                        "order": [[ 3, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                                },
                            { "sWidth": "5%", "className": "text-center", "aTargets": [ 0,2]},
                            { "sWidth": "40%", "className": "text-justify", "aTargets": [1]},
                            { "sWidth": "10%", "className": "text-center", "aTargets":[3,4]}
                    ]}); 
                    $('#Mteatro').modal('hide');
                });
            </script>
            <?php
        }else if ( $tipo=="editar_objetivo"){
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
                $('#teatroQuienes').load('./tables/web/quienes_somos.php', function() {    
                    $("#table-objetivos").dataTable({ "language": {
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
                        "order": [[ 3, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                                },
                            { "sWidth": "5%", "className": "text-center", "aTargets": [ 0,2]},
                            { "sWidth": "40%", "className": "text-justify", "aTargets": [1]},
                            { "sWidth": "10%", "className": "text-center", "aTargets":[3,4]}
                    ]}); 
                    $('#Mteatro').modal('hide');
                });
            </script>
            <?php
        }else if ( $tipo=="eliminarTabla"){
            ?>
            <script type="text/javascript"> 
            var n = noty({
                text        : '<div class="alert alert-success "><p><strong>Se eliminó correctamente</p></div>',
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
                $('#teatroQuienes').load('./tables/web/quienes_somos.php', function() {    
                    $("#table-objetivos").dataTable({ "language": {
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
                        "order": [[ 3, "asc" ]],
                        "aoColumnDefs": [
                            { "sWidth": "5%", "className": "text-center", "aTargets": [ 0,2]},
                            { "sWidth": "40%", "className": "text-justify", "aTargets": [1]},
                            { "sWidth": "10%", "className": "text-center", "aTargets": 3}
                    ]}); 
                    $('#Mteatro').modal('hide');
                });
                $('#teatroInstalaciones').load('./tables/web/instalaciones.php', function() {    
                    $("#table-instalaciones").dataTable({ "language": {
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
                        "order": [[ 2, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                                },
                            { "sWidth": "5%", "className": "text-center", "aTargets": [ 2]},
                            { "sWidth": "15%", "className": "text-center", "aTargets": [1]},
                            { "sWidth": "10%", "className": "text-center", "aTargets": [5,3,6]},
                            { "sWidth": "30%", "className": "text-justify", "aTargets": 4}
                    ]});
                    $('#Mteatro').modal('hide');
                });
                $('#teatroNoticias').load('./tables/web/noticias.php', function() {    
                    $("#table-noticias").dataTable({ "language": {
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
                        "order": [[ 2, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                                },
                            { "sWidth": "5%", "className": "text-center", "aTargets": [ 2]},
                            { "sWidth": "15%", "className": "text-center", "aTargets": [1]},
                            { "sWidth": "10%", "className": "text-center", "aTargets": [5,3,6]},
                            { "sWidth": "30%", "className": "text-justify", "aTargets": 4}
                    ]});
                    $('#Mteatro').modal('hide');
                    
                });
                $('#teatroEspacios').load('./tables/web/espacios.php', function() {    
                    $("#table-noticias").dataTable({ "language": {
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
                        "order": [[ 2, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                                },
                            { "sWidth": "5%", "className": "text-center", "aTargets": [ 2]},
                            { "sWidth": "15%", "className": "text-center", "aTargets": [1]},
                            { "sWidth": "10%", "className": "text-center", "aTargets": [5,3,6]},
                            { "sWidth": "30%", "className": "text-justify", "aTargets": 4}
                    ]});
                    $('#Mteatro').modal('hide');
                });
                $('#teatroRealizados').load('./tables/web/realizados.php', function() {    
                    $("#table-realizados").dataTable({ "language": {
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
                        "order": [[ 2, "asc" ]],
                        "aoColumnDefs": [
                            {
                            "targets": [ 0 ],
                                "className": "hide_column"
                            },
                            { "sWidth": "5%", "className": "text-center", "aTargets": [ 2]},
                            { "sWidth": "15%", "className": "text-center", "aTargets": [1]},
                            { "sWidth": "10%", "className": "text-center", "aTargets": [5,3,6]},
                            { "sWidth": "30%", "className": "text-justify", "aTargets": 4}
                    ]});
                    $('#Mteatro').modal('hide');
                });
                $('#fundacionQuienes').load('./tables/web/quienes_somos_fundacion.php', function() {    
                    $("#table-lineas").dataTable({ "language": {
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
                        "order": [[ 2, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                                },
                            { "sWidth": "5%", "className": "text-center", "aTargets": [ 0,2]},
                            { "sWidth": "40%", "className": "text-justify", "aTargets": [4]},
                            { "sWidth": "10%", "className": "text-center", "aTargets": [ 1,3,5,6]}
                    ]}); 
                    $('#Mteatro').modal('hide');
                });
                $('#fundacionProyectos').load('./tables/web/proyectos.php', function() {    
                    $("#table-noticias").dataTable({ "language": {
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
                        "order": [[ 2, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                                },
                            { "sWidth": "5%", "className": "text-center", "aTargets": [ 2]},
                            { "sWidth": "15%", "className": "text-center", "aTargets": [1]},
                            { "sWidth": "10%", "className": "text-center", "aTargets": [5,3,6]},
                            { "sWidth": "30%", "className": "text-justify", "aTargets": 4}
                    ]});
                });
                $('#otrasPreguntas').load('./tables/web/preguntas.php', function() {    
                    $("#table-preguntas").dataTable({ "language": {
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
                        "order": [[ 1, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                                },
                            { "sWidth": "3%", "className": "text-center", "aTargets": [ 1]},
                            { "sWidth": "40%", "className": "text-justify", "aTargets": [3]},
                            { "sWidth": "10%", "className": "text-center", "aTargets": [4,5]},
                            { "sWidth": "20%", "className": "text-justify", "aTargets": [2]}
                    ]}); 
                    $('#Mteatro').modal('hide');
                });
                $('#otrasResponsabilidad').load('./tables/web/ambiental.php', function() {    
                    $("#table-ambiental").dataTable({ "language": {
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
                        "order": [[ 2, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                                },
                            { "sWidth": "5%", "className": "text-center", "aTargets": [ 2]},
                            { "sWidth": "15%", "className": "text-center", "aTargets": [1]},
                            { "sWidth": "10%", "className": "text-center", "aTargets": [5,3,6]},
                            { "sWidth": "30%", "className": "text-justify", "aTargets": 4}
                    ]});
                    $('#Mteatro').modal('hide');
                });
                $('#otrasAmigos').load('./tables/web/amigos_teatro.php', function() {    
                    $("#table-preguntasA").dataTable({ "language": {
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
                        "order": [[ 1, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                                },
                            { "sWidth": "3%", "className": "text-center", "aTargets": [ 1]},
                            { "sWidth": "40%", "className": "text-justify", "aTargets": [3]},
                            { "sWidth": "10%", "className": "text-center", "aTargets": [4,5]},
                            { "sWidth": "20%", "className": "text-justify", "aTargets": [2]}
                    ]}); 
                    $("#table-beneficios").dataTable({ "language": {
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
                        "order": [[ 2, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                                },
                            { "sWidth": "5%", "className": "text-center", "aTargets": [ 2]},
                            { "sWidth": "15%", "className": "text-center", "aTargets": [1]},
                            { "sWidth": "10%", "className": "text-center", "aTargets": [5,3,6]},
                            { "sWidth": "30%", "className": "text-justify", "aTargets": 4}
                    ]});
                    $('#Mteatro').modal('hide');
                });
                $('#otrasContacto').load('./tables/web/contacto.php', function() {    
                    $("#table-boleteria").dataTable({ "language": {
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
                        "order": [[ 1, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                                },
                            { "sWidth": "5%", "className": "text-center", "aTargets": [ 1]},
                            { "sWidth": "30%", "className": "text-justify", "aTargets": [2]},
                            { "sWidth": "40%", "className": "text-justify", "aTargets": [3]},
                            { "sWidth": "10%", "className": "text-center", "aTargets": [4]}
                    ]}); 
                    $("#table-cafe").dataTable({ "language": {
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
                        "order": [[ 1, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                                },
                            { "sWidth": "5%", "className": "text-center", "aTargets": [ 1]},
                            { "sWidth": "30%", "className": "text-justify", "aTargets": [2]},
                            { "sWidth": "40%", "className": "text-justify", "aTargets": [3]},
                            { "sWidth": "10%", "className": "text-center", "aTargets": [4]}
                    ]}); 
                    $("#table-whatsapp").dataTable({ "language": {
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
                        "order": [[ 1, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                                },
                            { "sWidth": "5%", "className": "text-center", "aTargets": [ 1]},
                            { "sWidth": "30%", "className": "text-justify", "aTargets": [2]},
                            { "sWidth": "40%", "className": "text-justify", "aTargets": [3]},
                            { "sWidth": "10%", "className": "text-center", "aTargets": [4]}
                    ]}); 
                    $('#Mteatro').modal('hide');
                });
            </script>
            <?php
        }else if ( $tipo=="crear_tabla"){
            ?>
            <script type="text/javascript"> 
            var n = noty({
                text        : '<div class="alert alert-success "><p><strong>Se créo correctamente</p></div>',
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
                $('#teatroInstalaciones').load('./tables/web/instalaciones.php', function() {    
                    $("#table-instalaciones").dataTable({ "language": {
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
                        "order": [[ 2, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                                },
                            { "sWidth": "5%", "className": "text-center", "aTargets": [ 2]},
                            { "sWidth": "15%", "className": "text-center", "aTargets": [1]},
                            { "sWidth": "10%", "className": "text-center", "aTargets": [5,3,6]},
                            { "sWidth": "30%", "className": "text-justify", "aTargets": 4}
                    ]});
                    $('#Mteatro').modal('hide');
                });
                $('#teatroNoticias').load('./tables/web/noticias.php', function() {    
                    $("#table-noticias").dataTable({ "language": {
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
                        "order": [[ 2, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                                },
                            { "sWidth": "5%", "className": "text-center", "aTargets": [ 2]},
                            { "sWidth": "15%", "className": "text-center", "aTargets": [1]},
                            { "sWidth": "10%", "className": "text-center", "aTargets": [5,3,6]},
                            { "sWidth": "30%", "className": "text-justify", "aTargets": 4}
                    ]});
                    $('#Mteatro').modal('hide');
                    
                });
                $('#teatroEspacios').load('./tables/web/espacios.php', function() {    
                    $("#table-noticias").dataTable({ "language": {
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
                        "order": [[ 2, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                                },
                            { "sWidth": "5%", "className": "text-center", "aTargets": [ 2]},
                            { "sWidth": "15%", "className": "text-center", "aTargets": [1]},
                            { "sWidth": "10%", "className": "text-center", "aTargets": [5,3,6]},
                            { "sWidth": "30%", "className": "text-justify", "aTargets": 4}
                    ]});
                    $('#Mteatro').modal('hide');
                });
                $('#teatroRealizados').load('./tables/web/realizados.php', function() {    
                    $("#table-realizados").dataTable({ "language": {
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
                        "order": [[ 2, "asc" ]],
                        "aoColumnDefs": [
                            {
                            "targets": [ 0 ],
                                "className": "hide_column"
                            },
                            { "sWidth": "5%", "className": "text-center", "aTargets": [ 2]},
                            { "sWidth": "15%", "className": "text-center", "aTargets": [1]},
                            { "sWidth": "10%", "className": "text-center", "aTargets": [5,3,6]},
                            { "sWidth": "30%", "className": "text-justify", "aTargets": 4}
                    ]});
                    $('#Mteatro').modal('hide');
                });
                $('#fundacionQuienes').load('./tables/web/quienes_somos_fundacion.php', function() {    
                    $("#table-lineas").dataTable({ "language": {
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
                        "order": [[ 2, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                                },
                            { "sWidth": "5%", "className": "text-center", "aTargets": [ 0,2]},
                            { "sWidth": "40%", "className": "text-justify", "aTargets": [4]},
                            { "sWidth": "10%", "className": "text-center", "aTargets": [ 1,3,5,6]}
                    ]}); 
                    $('#Mteatro').modal('hide');
                });
                $('#fundacionProyectos').load('./tables/web/proyectos.php', function() {    
                    $("#table-noticias").dataTable({ "language": {
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
                        "order": [[ 2, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                                },
                            { "sWidth": "5%", "className": "text-center", "aTargets": [ 2]},
                            { "sWidth": "15%", "className": "text-center", "aTargets": [1]},
                            { "sWidth": "10%", "className": "text-center", "aTargets": [5,3,6]},
                            { "sWidth": "30%", "className": "text-justify", "aTargets": 4}
                    ]});
                    $('#Mteatro').modal('hide');
                });
                $('#otrasResponsabilidad').load('./tables/web/ambiental.php', function() {    
                    $("#table-ambiental").dataTable({ "language": {
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
                        "order": [[ 2, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                                },
                            { "sWidth": "5%", "className": "text-center", "aTargets": [ 2]},
                            { "sWidth": "15%", "className": "text-center", "aTargets": [1]},
                            { "sWidth": "10%", "className": "text-center", "aTargets": [5,3,6]},
                            { "sWidth": "30%", "className": "text-justify", "aTargets": 4}
                    ]});
                    $('#Mteatro').modal('hide');
                });
                $('#otrasAmigos').load('./tables/web/amigos_teatro.php', function() {    
                    $("#table-preguntasA").dataTable({ "language": {
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
                        "order": [[ 1, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                                },
                            { "sWidth": "3%", "className": "text-center", "aTargets": [ 1]},
                            { "sWidth": "40%", "className": "text-justify", "aTargets": [3]},
                            { "sWidth": "10%", "className": "text-center", "aTargets": [4,5]},
                            { "sWidth": "20%", "className": "text-justify", "aTargets": [2]}
                    ]}); 
                    $("#table-beneficios").dataTable({ "language": {
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
                        "order": [[ 2, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                                },
                            { "sWidth": "5%", "className": "text-center", "aTargets": [ 2]},
                            { "sWidth": "15%", "className": "text-center", "aTargets": [1]},
                            { "sWidth": "10%", "className": "text-center", "aTargets": [5,3,6]},
                            { "sWidth": "30%", "className": "text-justify", "aTargets": 4}
                    ]});
                    $('#Mteatro').modal('hide');
                });
                $('.alquilerP').removeClass('hide');
                $('.alquilerS').addClass('hide');
                $(".editar_tabla").prop("disabled",false);
            </script>
            <?php
        }else if ( $tipo=="crear_pregunta"){
            ?>
            <script type="text/javascript"> 
            var n = noty({
                text        : '<div class="alert alert-success "><p><strong>Se créo correctamente</p></div>',
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
                $(".crear_pregunta").prop("disabled",false);
                $('#otrasPreguntas').load('./tables/web/preguntas.php', function() {    
                    $("#table-preguntas").dataTable({ "language": {
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
                        "order": [[ 1, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                                },
                            { "sWidth": "3%", "className": "text-center", "aTargets": [ 1]},
                            { "sWidth": "40%", "className": "text-justify", "aTargets": [3]},
                            { "sWidth": "10%", "className": "text-center", "aTargets": [4,5]},
                            { "sWidth": "20%", "className": "text-justify", "aTargets": [2]}
                    ]}); 
                    $('#Mteatro').modal('hide');
                });
                $('#otrasAmigos').load('./tables/web/amigos_teatro.php', function() {    
                    $("#table-preguntasA").dataTable({ "language": {
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
                        "order": [[ 1, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                                },
                            { "sWidth": "3%", "className": "text-center", "aTargets": [ 1]},
                            { "sWidth": "40%", "className": "text-justify", "aTargets": [3]},
                            { "sWidth": "10%", "className": "text-center", "aTargets": [4,5]},
                            { "sWidth": "20%", "className": "text-justify", "aTargets": [2]}
                    ]}); 
                    $("#table-beneficios").dataTable({ "language": {
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
                        "order": [[ 2, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                                },
                            { "sWidth": "5%", "className": "text-center", "aTargets": [ 2]},
                            { "sWidth": "15%", "className": "text-center", "aTargets": [1]},
                            { "sWidth": "10%", "className": "text-center", "aTargets": [5,3,6]},
                            { "sWidth": "30%", "className": "text-justify", "aTargets": 4}
                    ]});
                    $('#Mteatro').modal('hide');
                });
                $('#otrasContacto').load('./tables/web/contacto.php', function() {    
                    $("#table-boleteria").dataTable({ "language": {
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
                        "order": [[ 1, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                                },
                            { "sWidth": "5%", "className": "text-center", "aTargets": [ 1]},
                            { "sWidth": "30%", "className": "text-justify", "aTargets": [2]},
                            { "sWidth": "40%", "className": "text-justify", "aTargets": [3]},
                            { "sWidth": "10%", "className": "text-center", "aTargets": [4]}
                    ]}); 
                    $("#table-cafe").dataTable({ "language": {
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
                        "order": [[ 1, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                                },
                            { "sWidth": "5%", "className": "text-center", "aTargets": [ 1]},
                            { "sWidth": "30%", "className": "text-justify", "aTargets": [2]},
                            { "sWidth": "40%", "className": "text-justify", "aTargets": [3]},
                            { "sWidth": "10%", "className": "text-center", "aTargets": [4]}
                    ]}); 
                    $("#table-whatsapp").dataTable({ "language": {
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
                        "order": [[ 1, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                                },
                            { "sWidth": "5%", "className": "text-center", "aTargets": [ 1]},
                            { "sWidth": "30%", "className": "text-justify", "aTargets": [2]},
                            { "sWidth": "40%", "className": "text-justify", "aTargets": [3]},
                            { "sWidth": "10%", "className": "text-center", "aTargets": [4]}
                    ]}); 
                    $('#Mteatro').modal('hide');
                });
            </script>
            <?php
        }else if ( $tipo=="editar_pregunta"){
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
                $(".editar_pregunta").prop("disabled",false);
                $('#otrasPreguntas').load('./tables/web/preguntas.php', function() {    
                    $("#table-preguntas").dataTable({ "language": {
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
                        "order": [[ 1, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                                },
                            { "sWidth": "3%", "className": "text-center", "aTargets": [ 1]},
                            { "sWidth": "40%", "className": "text-justify", "aTargets": [3]},
                            { "sWidth": "10%", "className": "text-center", "aTargets": [4,5]},
                            { "sWidth": "20%", "className": "text-justify", "aTargets": [2]}
                    ]}); 
                    $('#Mteatro').modal('hide');
                });
                $('#otrasAmigos').load('./tables/web/amigos_teatro.php', function() {    
                    $("#table-preguntasA").dataTable({ "language": {
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
                        "order": [[ 1, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                                },
                            { "sWidth": "3%", "className": "text-center", "aTargets": [ 1]},
                            { "sWidth": "40%", "className": "text-justify", "aTargets": [3]},
                            { "sWidth": "10%", "className": "text-center", "aTargets": [4,5]},
                            { "sWidth": "20%", "className": "text-justify", "aTargets": [2]}
                    ]}); 
                    $("#table-beneficios").dataTable({ "language": {
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
                        "order": [[ 2, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                                },
                            { "sWidth": "5%", "className": "text-center", "aTargets": [ 2]},
                            { "sWidth": "15%", "className": "text-center", "aTargets": [1]},
                            { "sWidth": "10%", "className": "text-center", "aTargets": [5,3,6]},
                            { "sWidth": "30%", "className": "text-justify", "aTargets": 4}
                    ]});
                });
                $('#otrasContacto').load('./tables/web/contacto.php', function() {    
                    $("#table-boleteria").dataTable({ "language": {
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
                        "order": [[ 1, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                                },
                            { "sWidth": "5%", "className": "text-center", "aTargets": [ 1]},
                            { "sWidth": "30%", "className": "text-justify", "aTargets": [2]},
                            { "sWidth": "40%", "className": "text-justify", "aTargets": [3]},
                            { "sWidth": "10%", "className": "text-center", "aTargets": [4]}
                    ]}); 
                    $("#table-cafe").dataTable({ "language": {
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
                        "order": [[ 1, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                                },
                            { "sWidth": "5%", "className": "text-center", "aTargets": [ 1]},
                            { "sWidth": "30%", "className": "text-justify", "aTargets": [2]},
                            { "sWidth": "40%", "className": "text-justify", "aTargets": [3]},
                            { "sWidth": "10%", "className": "text-center", "aTargets": [4]}
                    ]}); 
                    $("#table-whatsapp").dataTable({ "language": {
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
                        "order": [[ 1, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                                },
                            { "sWidth": "5%", "className": "text-center", "aTargets": [ 1]},
                            { "sWidth": "30%", "className": "text-justify", "aTargets": [2]},
                            { "sWidth": "40%", "className": "text-justify", "aTargets": [3]},
                            { "sWidth": "10%", "className": "text-center", "aTargets": [4]}
                    ]}); 
                    $('#Mteatro').modal('hide');
                });
            </script>
            <?php
        }else if ( $tipo=="guardarProyectosT"){
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
                $('#fundacionProyectos').load('./tables/web/proyectos.php', function() {    
                    $("#table-noticias").dataTable({ "language": {
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
                        "order": [[ 2, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                                },
                            { "sWidth": "5%", "className": "text-center", "aTargets": [ 2]},
                            { "sWidth": "15%", "className": "text-center", "aTargets": [1]},
                            { "sWidth": "10%", "className": "text-center", "aTargets": [5,3,6]},
                            { "sWidth": "30%", "className": "text-justify", "aTargets": 4}
                    ]});
                    $('#Mteatro').modal('hide');
                });
                $('.alquilerP').removeClass('hide');
                $('.alquilerS').addClass('hide');
                $(".guardarProyectosT").prop("disabled",false);
            </script>
            <?php
        }else if ( $tipo=="editar_tabla"){
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
                $('#teatroInstalaciones').load('./tables/web/instalaciones.php', function() {    
                    $("#table-instalaciones").dataTable({ "language": {
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
                        "order": [[ 2, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                                },
                            { "sWidth": "5%", "className": "text-center", "aTargets": [ 2]},
                            { "sWidth": "15%", "className": "text-center", "aTargets": [1]},
                            { "sWidth": "10%", "className": "text-center", "aTargets": [5,3,6]},
                            { "sWidth": "30%", "className": "text-justify", "aTargets": 4}
                    ]});
                    $('#Mteatro').modal('hide');
                });
                $('#teatroNoticias').load('./tables/web/noticias.php', function() {    
                    $("#table-noticias").dataTable({ "language": {
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
                        "order": [[ 2, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                                },
                            { "sWidth": "5%", "className": "text-center", "aTargets": [ 2]},
                            { "sWidth": "15%", "className": "text-center", "aTargets": [1]},
                            { "sWidth": "10%", "className": "text-center", "aTargets": [5,3,6]},
                            { "sWidth": "30%", "className": "text-justify", "aTargets": 4}
                    ]});
                    $('#Mteatro').modal('hide');
                    
                });
                $('#teatroEspacios').load('./tables/web/espacios.php', function() {    
                    $("#table-noticias").dataTable({ "language": {
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
                        "order": [[ 2, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                                },
                            { "sWidth": "5%", "className": "text-center", "aTargets": [ 2]},
                            { "sWidth": "15%", "className": "text-center", "aTargets": [1]},
                            { "sWidth": "10%", "className": "text-center", "aTargets": [5,3,6]},
                            { "sWidth": "30%", "className": "text-justify", "aTargets": 4}
                    ]});
                    $('#Mteatro').modal('hide');
                });
                $('#teatroRealizados').load('./tables/web/realizados.php', function() {    
                    $("#table-realizados").dataTable({ "language": {
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
                        "order": [[ 2, "asc" ]],
                        "aoColumnDefs": [
                            {
                            "targets": [ 0 ],
                                "className": "hide_column"
                            },
                            { "sWidth": "5%", "className": "text-center", "aTargets": [ 2]},
                            { "sWidth": "15%", "className": "text-center", "aTargets": [1]},
                            { "sWidth": "10%", "className": "text-center", "aTargets": [5,3,6]},
                            { "sWidth": "30%", "className": "text-justify", "aTargets": 4}
                    ]});
                    $('#Mteatro').modal('hide');
                });
                $('#fundacionQuienes').load('./tables/web/quienes_somos_fundacion.php', function() {    
                    $("#table-lineas").dataTable({ "language": {
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
                        "order": [[ 2, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                                },
                            { "sWidth": "5%", "className": "text-center", "aTargets": [ 0,2]},
                            { "sWidth": "40%", "className": "text-justify", "aTargets": [4]},
                            { "sWidth": "10%", "className": "text-center", "aTargets": [ 1,3,5,6]}
                    ]}); 
                    $('#Mteatro').modal('hide');
                });
                $('#fundacionProyectos').load('./tables/web/proyectos.php', function() {    
                    $("#table-noticias").dataTable({ "language": {
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
                        "order": [[ 2, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                                },
                            { "sWidth": "5%", "className": "text-center", "aTargets": [ 2]},
                            { "sWidth": "15%", "className": "text-center", "aTargets": [1]},
                            { "sWidth": "10%", "className": "text-center", "aTargets": [5,3,6]},
                            { "sWidth": "30%", "className": "text-justify", "aTargets": 4}
                    ]});
                    $('#Mteatro').modal('hide');
                });
                $('#otrasResponsabilidad').load('./tables/web/ambiental.php', function() {    
                    $("#table-ambiental").dataTable({ "language": {
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
                        "order": [[ 2, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                                },
                            { "sWidth": "5%", "className": "text-center", "aTargets": [ 2]},
                            { "sWidth": "15%", "className": "text-center", "aTargets": [1]},
                            { "sWidth": "10%", "className": "text-center", "aTargets": [5,3,6]},
                            { "sWidth": "30%", "className": "text-justify", "aTargets": 4}
                    ]});
                    $('#Mteatro').modal('hide');
                });
                $('#otrasAmigos').load('./tables/web/amigos_teatro.php', function() {    
                    $("#table-preguntasA").dataTable({ "language": {
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
                        "order": [[ 1, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                                },
                            { "sWidth": "3%", "className": "text-center", "aTargets": [ 1]},
                            { "sWidth": "40%", "className": "text-justify", "aTargets": [3]},
                            { "sWidth": "10%", "className": "text-center", "aTargets": [4,5]},
                            { "sWidth": "20%", "className": "text-justify", "aTargets": [2]}
                    ]}); 
                    $("#table-beneficios").dataTable({ "language": {
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
                        "order": [[ 2, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                                },
                            { "sWidth": "5%", "className": "text-center", "aTargets": [ 2]},
                            { "sWidth": "15%", "className": "text-center", "aTargets": [1]},
                            { "sWidth": "10%", "className": "text-center", "aTargets": [5,3,6]},
                            { "sWidth": "30%", "className": "text-justify", "aTargets": 4}
                    ]});
                });
                
                $('.alquilerP').removeClass('hide');
                $('.alquilerS').addClass('hide');
                $(".editar_tabla").prop("disabled",false);
            </script>
            <?php
        }else if ( $tipo=="editar_cafe"){
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
                $('#cafeInformacion').load('./tables/web/tab_informacion.php', function() {   
                    CKEDITOR.replace( 'cke-editor', {
                        toolbar :
                            [
                                { name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','Scayt' ] },
                                { name: 'basicstyles', items : [ 'Bold','Italic','Strike','-','RemoveFormat' ] },
                                { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent' ] },
                                { name: 'links', items : [ 'Link','Unlink' ] }
                            ]
                        
                    }); 
                });
                $(".editar_cafe").prop("disabled",false);
            </script>
            <?php
        }else if ( $tipo=="editar_galeria"){
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
                if("<?php echo $_POST['id1']; ?>"=="127"){
                    $('#cafeGaleria').load('./tables/web/tab_galeria.php', function() {  
                        $('.page-spinner-loader').addClass('hide');
                        $('#Mteatro').modal('hide');
                    });
                }else{
                    $('#teatroGaleria').load('./tables/web/galeria.php',{var1:<?php echo $_POST['id1']; ?>,tipo:"espacios"}, function() {  
                        $('.page-spinner-loader').addClass('hide');
                        $('#Mteatro').modal('hide');
                    });
                }
                
                $(".editar_galeria").prop("disabled",false);
            </script>
            <?php
        }else if ( $tipo=="crear_galeria"){
            ?>
            <script type="text/javascript"> 
            var n = noty({
                text        : '<div class="alert alert-success "><p><strong>Se creó correctamente</p></div>',
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
                if("<?php echo $_POST['id1']; ?>"=="127"){
                    $('#cafeGaleria').load('./tables/web/tab_galeria.php', function() {  
                        $('.page-spinner-loader').addClass('hide');
                        $('#Mteatro').modal('hide');
                    });
                }else{
                    $('#teatroGaleria').load('./tables/web/galeria.php',{var1:<?php echo $id; ?>}, function() {  
                        $('.page-spinner-loader').addClass('hide');
                        $('#Mteatro').modal('hide');
                    });
                }
                
                $(".crear_galeria").prop("disabled",false);
            </script>
            <?php
        }else if ( $tipo=="eliminarGaleria"){
            ?>
            <script type="text/javascript"> 
            var n = noty({
                text        : '<div class="alert alert-success "><p><strong>Se eliminó correctamente</p></div>',
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
                if("<?php echo $_POST['id1']; ?>"=="127"){
                    $('#cafeGaleria').load('./tables/web/tab_galeria.php', function() {  
                        $('.page-spinner-loader').addClass('hide');
                        $('#Mteatro').modal('hide');
                    });
                }else{
                    $('#teatroGaleria').load('./tables/web/galeria.php',{var1:<?php echo $_POST['id1']; ?>}, function() {  
                        $('.page-spinner-loader').addClass('hide');
                        $('#Mteatro').modal('hide');
                    });
                }
                
                $(".eliminarGaleria").prop("disabled",false);
            </script>
            <?php
        }else if ( $tipo=="crear_descarga"){
            echo "true";
        }else if ( $tipo=="editar_descarga"){
            echo "true";
        }else if ( $tipo=="eliminarDescarga"){
            ?>
            <script type="text/javascript"> 
            var n = noty({
                text        : '<div class="alert alert-success "><p><strong>Se eliminó correctamente</p></div>',
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
                $('#teatroDescargable').load('./tables/web/descargable.php',{var1:<?php echo $_POST['id1']; ?>}, function() {  
                    $('.page-spinner-loader').addClass('hide');
                    $('#Mteatro').modal('hide');
                });
                $(".eliminarDescarga").prop("disabled",false);
            </script>
            <?php
        }else if ( $tipo=="crear_InformacionA"){
            ?>
            <script type="text/javascript"> 
            var n = noty({
                text        : '<div class="alert alert-success "><p><strong>Se creó correctamente</p></div>',
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
                $('#informacionSweb').load('./tables/web/informacion_carga.php', function() {    
                    $("#table-informacion").dataTable({ "language": {
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
                        "order": [[ 1, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                                },
                            { "sWidth": "5%", "className": "text-center", "aTargets": [ 1,3]},
                            { "sWidth": "30%", "className": "text-justify", "aTargets": [2]}
                    ]}); 
                    $('#Mteatro').modal('hide');
                });
                $(".crear_InformacionA").prop("disabled",false);
            </script>
            <?php
        }else if ( $tipo=="editar_informacionA"){
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
                $('#informacionSweb').load('./tables/web/informacion_carga.php', function() {    
                    $("#table-informacion").dataTable({ "language": {
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
                        "order": [[ 1, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                                },
                            { "sWidth": "5%", "className": "text-center", "aTargets": [ 1,3]},
                            { "sWidth": "30%", "className": "text-justify", "aTargets": [2]}
                    ]}); 
                    $('#Mteatro').modal('hide');
                });
                $(".editar_informacionA").prop("disabled",false);
            </script>
            <?php
        }else if ( $tipo=="eliminarInformacionA"){
            ?>
            <script type="text/javascript"> 
            var n = noty({
                text        : '<div class="alert alert-success "><p><strong>Se eliminó correctamente</p></div>',
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
                $('#informacionSweb').load('./tables/web/informacion_carga.php', function() {    
                    $("#table-informacion").dataTable({ "language": {
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
                        "order": [[ 1, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                                },
                            { "sWidth": "5%", "className": "text-center", "aTargets": [ 1,3]},
                            { "sWidth": "30%", "className": "text-justify", "aTargets": [2]}
                    ]}); 
                    $('#Mteatro').modal('hide');
                });
                $(".editar_informacionA").prop("disabled",false);
            </script>
            <?php
        }else if ( $tipo=="eliminarBannerP"){
            ?>
            <script type="text/javascript"> 
            var n = noty({
                text        : '<div class="alert alert-success "><p><strong>Se eliminó correctamente</p></div>',
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
                $('#principalSweb').load('./tables/web/principal_carga.php', function() {   
                    $("#table-principalesB").dataTable({ "language": {
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
                        "order": [[ 2, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                                },
                            { "sWidth": "20%", "className": "text-center", "aTargets": [ 1,4,6]},
                            { "sWidth": "5%", "className": "text-center", "aTargets": [2,7]},
                            { "sWidth": "10%", "className": "text-center", "aTargets": [3,5]},
                    ]});  
                });
                $(".editar_informacionA").prop("disabled",false);
            </script>
            <?php
        }else if ( $tipo=="eliminarPublicidad"){
            ?>
            <script type="text/javascript"> 
            var n = noty({
                text        : '<div class="alert alert-success "><p><strong>Se eliminó correctamente</p></div>',
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
                $('#publicidadSweb').load('./tables/web/publicidad_carga.php', function() {    
                    $("#table-publicidad").dataTable({ "language": {
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
                        "order": [[ 2, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                                },
                            { "sWidth": "5%", "className": "text-center", "aTargets": [ 2]},
                            { "sWidth": "20%", "className": "text-justify", "aTargets": [1,5]},
                            { "sWidth": "10%", "className": "text-center", "aTargets": [3,4,6]}
                    ]}); 
                });
                $(".editar_informacionA").prop("disabled",false);
            </script>
            <?php
        }else if ( $tipo=="crear_publicidad"){
            ?>
            <script type="text/javascript"> 
            var n = noty({
                text        : '<div class="alert alert-success "><p><strong>Se creó correctamente</p></div>',
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
                $('#publicidadSweb').load('./tables/web/publicidad_carga.php', function() {    
                    $("#table-publicidad").dataTable({ "language": {
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
                        "order": [[ 2, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                                },
                            { "sWidth": "5%", "className": "text-center", "aTargets": [ 2]},
                            { "sWidth": "20%", "className": "text-justify", "aTargets": [1,5]},
                            { "sWidth": "10%", "className": "text-center", "aTargets": [3,4,6]}
                    ]}); 
                    $('#Mteatro').modal('hide');
                });
                
                $(".crear_publicidad").prop("disabled",false);
            </script>
            <?php
        }else if ( $tipo=="editar_publicidad"){
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
                $('#publicidadSweb').load('./tables/web/publicidad_carga.php', function() {    
                    $("#table-publicidad").dataTable({ "language": {
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
                        "order": [[ 2, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                                },
                            { "sWidth": "5%", "className": "text-center", "aTargets": [ 2]},
                            { "sWidth": "20%", "className": "text-justify", "aTargets": [1,5]},
                            { "sWidth": "10%", "className": "text-center", "aTargets": [3,4,6]}
                    ]}); 
                    $('#Mteatro').modal('hide');
                });
                $(".editar_publicidad").prop("disabled",false);
            </script>
            <?php
        }else if ( $tipo=="crear_bannerP"){
            ?>
            <script type="text/javascript"> 
            var n = noty({
                text        : '<div class="alert alert-success "><p><strong>Se creó correctamente</p></div>',
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
                $('#principalSweb').load('./tables/web/principal_carga.php', function() {   
                    $("#table-principalesB").dataTable({ "language": {
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
                        "order": [[ 2, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                                },
                            { "sWidth": "20%", "className": "text-center", "aTargets": [ 1,4,6]},
                            { "sWidth": "5%", "className": "text-center", "aTargets": [2,7]},
                            { "sWidth": "10%", "className": "text-center", "aTargets": [3,5]},
                    ]});  
                    $('#Mteatro').modal('hide');
                });
                
                $(".crear_bannerP").prop("disabled",false);
            </script>
            <?php
        }else if ( $tipo=="editar_bannerP"){
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
                $('#principalSweb').load('./tables/web/principal_carga.php', function() {   
                    $("#table-principalesB").dataTable({ "language": {
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
                        "order": [[ 2, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                                },
                            { "sWidth": "20%", "className": "text-center", "aTargets": [ 1,4,6]},
                            { "sWidth": "5%", "className": "text-center", "aTargets": [2,7]},
                            { "sWidth": "10%", "className": "text-center", "aTargets": [3,5]},
                    ]});  
                    $('#Mteatro').modal('hide');
                });
                $(".editar_bannerP").prop("disabled",false);
            </script>
            <?php
        }else if ( $tipo=="estadoIP"){
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
                $('#imagenInicio').load('./tables/web/imagenes/imagenP.php', function() { });
                $(".estadoIP").prop("disabled",false);
            </script>
            <?php
        }else if ( $tipo=="estadoInstalacion"){
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
                $('#teatroInstalaciones').load('./tables/web/instalaciones.php', function() {    
                    $("#table-instalaciones").dataTable({ "language": {
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
                        "order": [[ 2, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                                },
                            { "sWidth": "5%", "className": "text-center", "aTargets": [ 2]},
                            { "sWidth": "15%", "className": "text-center", "aTargets": [1]},
                            { "sWidth": "10%", "className": "text-center", "aTargets": [5,3,6]},
                            { "sWidth": "30%", "className": "text-justify", "aTargets": 4}
                    ]});
                    $('#Mteatro').modal('hide');
                });
                $('#teatroNoticias').load('./tables/web/noticias.php', function() {    
                    $("#table-noticias").dataTable({ "language": {
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
                        "order": [[ 2, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                                },
                            { "sWidth": "5%", "className": "text-center", "aTargets": [ 2]},
                            { "sWidth": "15%", "className": "text-center", "aTargets": [1]},
                            { "sWidth": "10%", "className": "text-center", "aTargets": [5,3,6]},
                            { "sWidth": "30%", "className": "text-justify", "aTargets": 4}
                    ]});
                    $('#Mteatro').modal('hide');
                    
                });
                $('#teatroEspacios').load('./tables/web/espacios.php', function() {    
                    $("#table-noticias").dataTable({ "language": {
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
                        "order": [[ 2, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                                },
                            { "sWidth": "5%", "className": "text-center", "aTargets": [ 2]},
                            { "sWidth": "15%", "className": "text-center", "aTargets": [1]},
                            { "sWidth": "10%", "className": "text-center", "aTargets": [5,3,6]},
                            { "sWidth": "30%", "className": "text-justify", "aTargets": 4}
                    ]});
                    $('#Mteatro').modal('hide');
                });

                $('#teatroRealizados').load('./tables/web/realizados.php', function() {    
                    $("#table-realizados").dataTable({ "language": {
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
                        "order": [[ 2, "asc" ]],
                        "aoColumnDefs": [
                            {
                            "targets": [ 0 ],
                                "className": "hide_column"
                            },
                            { "sWidth": "5%", "className": "text-center", "aTargets": [ 2]},
                            { "sWidth": "15%", "className": "text-center", "aTargets": [1]},
                            { "sWidth": "10%", "className": "text-center", "aTargets": [5,3,6]},
                            { "sWidth": "30%", "className": "text-justify", "aTargets": 4}
                    ]});
                    $('#Mteatro').modal('hide');
                });
                $('#fundacionQuienes').load('./tables/web/quienes_somos_fundacion.php', function() {    
                    $("#table-lineas").dataTable({ "language": {
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
                        "order": [[ 2, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                                },
                            { "sWidth": "5%", "className": "text-center", "aTargets": [ 0,2]},
                            { "sWidth": "40%", "className": "text-justify", "aTargets": [4]},
                            { "sWidth": "10%", "className": "text-center", "aTargets": [ 1,3,5,6]}
                    ]}); 
                    $('#Mteatro').modal('hide');
                });
                $('#fundacionProyectos').load('./tables/web/proyectos.php', function() {    
                    $("#table-noticias").dataTable({ "language": {
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
                        "order": [[ 2, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                                },
                            { "sWidth": "5%", "className": "text-center", "aTargets": [ 2]},
                            { "sWidth": "15%", "className": "text-center", "aTargets": [1]},
                            { "sWidth": "10%", "className": "text-center", "aTargets": [5,3,6]},
                            { "sWidth": "30%", "className": "text-justify", "aTargets": 4}
                    ]});
                });
                $('#otrasResponsabilidad').load('./tables/web/ambiental.php', function() {    
                    $("#table-ambiental").dataTable({ "language": {
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
                        "order": [[ 2, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                                },
                            { "sWidth": "5%", "className": "text-center", "aTargets": [ 2]},
                            { "sWidth": "15%", "className": "text-center", "aTargets": [1]},
                            { "sWidth": "10%", "className": "text-center", "aTargets": [5,3,6]},
                            { "sWidth": "30%", "className": "text-justify", "aTargets": 4}
                    ]});
                    $('#Mteatro').modal('hide');
                });
                $('#otrasPreguntas').load('./tables/web/preguntas.php', function() {    
                    $("#table-preguntas").dataTable({ "language": {
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
                        "order": [[ 1, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                                },
                            { "sWidth": "3%", "className": "text-center", "aTargets": [ 1]},
                            { "sWidth": "40%", "className": "text-justify", "aTargets": [3]},
                            { "sWidth": "10%", "className": "text-center", "aTargets": [4,5]},
                            { "sWidth": "20%", "className": "text-justify", "aTargets": [2]}
                    ]}); 
                    $('#Mteatro').modal('hide');
                });
                
                $('#otrasAmigos').load('./tables/web/amigos_teatro.php', function() {    
                    $("#table-preguntasA").dataTable({ "language": {
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
                        "order": [[ 1, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                                },
                            { "sWidth": "3%", "className": "text-center", "aTargets": [ 1]},
                            { "sWidth": "40%", "className": "text-justify", "aTargets": [3]},
                            { "sWidth": "10%", "className": "text-center", "aTargets": [4,5]},
                            { "sWidth": "20%", "className": "text-justify", "aTargets": [2]}
                    ]}); 
                    $("#table-beneficios").dataTable({ "language": {
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
                        "order": [[ 2, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                                },
                            { "sWidth": "5%", "className": "text-center", "aTargets": [ 2]},
                            { "sWidth": "15%", "className": "text-center", "aTargets": [1]},
                            { "sWidth": "10%", "className": "text-center", "aTargets": [5,3,6]},
                            { "sWidth": "30%", "className": "text-justify", "aTargets": 4}
                    ]});
                });
                $('#teatroQuienes').load('./tables/web/quienes_somos.php', function() {    
                    $("#table-objetivos").dataTable({ "language": {
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
                        "order": [[ 3, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                                },
                            { "sWidth": "5%", "className": "text-center", "aTargets": [ 0,2]},
                            { "sWidth": "40%", "className": "text-justify", "aTargets": [1]},
                            { "sWidth": "10%", "className": "text-center", "aTargets":[3,4]}
                    ]}); 
                    $('#Mteatro').modal('hide');
                });
                $(".estadoInstalacion").prop("disabled",false);
            </script>
            <?php
        }else if ( $tipo=="estadoBannerP"){
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
                $('#principalSweb').load('./tables/web/principal_carga.php', function() {   
                    $("#table-principalesB").dataTable({ "language": {
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
                        "order": [[ 2, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                                },
                            { "sWidth": "20%", "className": "text-center", "aTargets": [ 1,4,6]},
                            { "sWidth": "5%", "className": "text-center", "aTargets": [2,7,8]},
                            { "sWidth": "10%", "className": "text-center", "aTargets": [3,5]},
                    ]});  
                });
                $(".estadoBannerP").prop("disabled",false);
            </script>
            <?php
        }else if ( $tipo=="estadoPublicidad"){
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
                $('#publicidadSweb').load('./tables/web/publicidad_carga.php', function() {    
                    $("#table-publicidad").dataTable({ "language": {
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
                        "order": [[ 2, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                                },
                            { "sWidth": "5%", "className": "text-center", "aTargets": [ 2,6]},
                            { "sWidth": "20%", "className": "text-justify", "aTargets": [1,5]},
                            { "sWidth": "10%", "className": "text-center", "aTargets": [3,4,7]}
                    ]}); 
                });
                $(".estadoPublicidad").prop("disabled",false);
            </script>
            <?php
        }else if ( $tipo=="estadoDescarga"){
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
                $('#teatroDescargable').load('./tables/web/descargable.php',{var1:<?php echo $_POST['id1']; ?>}, function() {  
                    $('.page-spinner-loader').addClass('hide');
                    $('#Mteatro').modal('hide');
                });
                $(".estadoDescarga").prop("disabled",false);
            </script>
            <?php
        }else if ( $tipo=="estadoGaleria"){
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
                if("<?php echo $_POST['id1']; ?>"=="127"){
                    $('#cafeGaleria').load('./tables/web/tab_galeria.php', function() {  
                        $('.page-spinner-loader').addClass('hide');
                        $('#Mteatro').modal('hide');
                    });
                }else{
                    $('#teatroGaleria').load('./tables/web/galeria.php',{var1:<?php echo $_POST['id1']; ?>,tipo:"espacios"}, function() {  
                        $('.page-spinner-loader').addClass('hide');
                        $('#Mteatro').modal('hide');
                    });
                }
                
                $(".estadoGaleria").prop("disabled",false);
            </script>
            <?php
        }else if ( $tipo=="estadoG"){
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
                $('#contactoG').load('./tables/web/contactoG.php', function() {    
                    $("#table-general").dataTable({ "language": {
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
                        "order": [[ 5, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                                },
                            { "sWidth": "10%", "className": "text-center", "aTargets": [ 1,2]},
                            { "sWidth": "20%", "className": "text-center", "aTargets": [ 3,4]},
                            { "sWidth": "5%", "className": "text-center", "aTargets": [5,6,7]},
                    ]});  
                });
                $(".contactoG").prop("disabled",false);
            </script>
            <?php
        }else if ( $tipo=="estadoA"){
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
                $('#contactoA').load('./tables/web/contactoA.php', function() {    
                    $("#table-alquilerC").dataTable({ "language": {
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
                        "order": [[ 10, "asc" ]],
                        "aoColumnDefs": [
                            {
                                "targets": [ 0 ],
                                    "className": "hide_column"
                                },
                            { "sWidth": "5%", "className": "text-center", "aTargets": [ 1,2,3,4]},
                            { "sWidth": "10%", "className": "text-center", "aTargets": [5]},
                            { "sWidth": "20%", "className": "text-center", "aTargets": [9]},
                            { "sWidth": "5%", "className": "text-center", "aTargets": [6,7,10]},
                            { "sWidth": "3%", "className": "text-center", "aTargets": [11,12,8]},
                    ]});  
                });
                $(".estadoA").prop("disabled",false);
            </script>
            <?php
        }
    }
}else{
    if (isset($_POST["tipo"])){
        $tipo=$_POST["tipo"];
        if (  $tipo=="guardarQuienes" | $tipo=="guardarMisionT" | $tipo=="guardarVisionT" ){
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
                $(".guardarQuienes").prop("disabled",false);
                $(".guardarMisionT").prop("disabled",false);
                $(".guardarVisionT").prop("disabled",false);
                $(".guardarNosotrosT").prop("disabled",false);
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
        }else  if (  $tipo=="guardarProyectosT" | $tipo=="guardarAmigos"){
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
                $(".guardarProyectosT").prop("disabled",false);
                $(".guardarAmigos").prop("disabled",false);
            </script>
            <?php
        }else if ( $tipo=="crear_objetivo"){
            ?>
            <script type="text/javascript"> 
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Error el objetivo no se pudo crear</p></div>',
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
                $(".crear_objetivo").prop("disabled",false);
            </script>
            <?php
        }else if ( $tipo=="editar_objetivo"){
            ?>
            <script type="text/javascript"> 
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Error el objetivo no se pudo editar</p></div>',
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
                $(".editar_objetivo").prop("disabled",false);
            </script>
            <?php
        }else if ( $tipo=="eliminarTabla"){
            ?>
            <script type="text/javascript"> 
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Error no se pudo eliminar</p></div>',
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
                $(".eliminarTabla").prop("disabled",false);
            </script>
            <?php
        }else if ( $tipo=="crear_tabla"){
            ?>
            <script type="text/javascript"> 
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Error no se pudo crear</p></div>',
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
                $(".crear_tabla").prop("disabled",false);
            </script>
            <?php
        }else if ( $tipo=="editar_tabla" | $tipo=="editar_cafe" ){
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
                $(".editar_tabla").prop("disabled",false);
                $(".editar_cafe").prop("disabled",false);
            </script>
            <?php
        }else if ( $tipo=="crear_pregunta"){
            ?>
            <script type="text/javascript"> 
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Error no se pudo crear</p></div>',
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
                $(".crear_pregunta").prop("disabled",false);
            </script>
            <?php
        }else if ( $tipo=="editar_pregunta"){
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
                $(".editar_pregunta").prop("disabled",false);
            </script>
            <?php
        }else if ( $tipo=="editar_galeria"){
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
                $(".editar_galeria").prop("disabled",false);
            </script>
            <?php
        }else if ( $tipo=="crear_galeria"){
            ?>
            <script type="text/javascript"> 
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Error no se pudo crear</p></div>',
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
                $(".crear_galeria").prop("disabled",false);
            </script>
            <?php
        }else if ( $tipo=="eliminarGaleria"){
            ?>
            <script type="text/javascript"> 
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Error no se pudo eliminar</p></div>',
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
                $(".eliminarGaleria").prop("disabled",false);
            </script>
            <?php
        }else if ( $tipo=="crear_descarga"){
            echo "false";
        }else if ( $tipo=="eliminarDescarga" | $tipo=="eliminarInformacionA" | $tipo=="eliminarBannerP" |$tipo=="eliminarPublicidad" ){
            ?>
            <script type="text/javascript"> 
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Error no se pudo eliminar</p></div>',
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
                $(".eliminarDescarga").prop("disabled",false);
                $(".eliminarInformacionA").prop("disabled",false);
                $(".eliminarBannerP").prop("disabled",false);
                $(".eliminarPublicidad").prop("disabled",false);
            </script>
            <?php
        }else if ( $tipo=="editar_descarga"){
            echo "false";
        }else if ( $tipo=="editar_informacionA" |  $tipo=="editar_publicidad"  |  $tipo=="editar_bannerP"){
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
                $(".editar_informacionA").prop("disabled",false);
                $(".editar_publicidad").prop("disabled",false);
                $(".editar_bannerP").prop("disabled",false);
            </script>
            <?php
        }else if ( $tipo=="crear_InformacionA"|  $tipo=="crear_publicidad"  |  $tipo=="crear_bannerP"){
            ?>
            <script type="text/javascript"> 
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Error no se pudo crear</p></div>',
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
                $(".crear_InformacionA").prop("disabled",false);
                $(".crear_publicidad").prop("disabled",false);
                $(".crear_bannerP").prop("disabled",false);
            </script>
            <?php
        }else if ( $tipo=="estadoIP"){
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
                $(".estadoIP").prop("disabled",false);
            </script>
            <?php
        }else if ( $tipo=="estadoInstalacion"){
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
                $(".estadoInstalacion").prop("disabled",false);
            </script>
            <?php
        }else if ( $tipo=="estadoBannerP"){
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
                $(".estadoBannerP").prop("disabled",false);
            </script>
            <?php
        }else if ( $tipo=="estadoPublicidad"){
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
                $(".estadoPublicidad").prop("disabled",false);
            </script>
            <?php
        }else if ( $tipo=="estadoDescarga"){
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
                $(".estadoDescarga").prop("disabled",false);
            </script>
            <?php
        }else if ( $tipo=="estadoGaleria"){
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
                $(".estadoGaleria").prop("disabled",false);
            </script>
            <?php
        }else if ( $tipo=="estadoG" | $tipo=="estadoA"){
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
                $(".estadoG").prop("disabled",false);
                $(".estadoA").prop("disabled",false);
            </script>
            <?php
        }
    }
}
?>