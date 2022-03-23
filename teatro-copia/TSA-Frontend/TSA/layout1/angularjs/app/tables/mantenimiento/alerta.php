<?php
include ("../../conect.php");
include ("../../autenticacion.php");
$band=true;
$band2=false;
$resultado="";
if (isset($_POST["nombres"])) {
    $nombre=$_POST["nombres"];
    ?><script type="text/javascript"> var mensaje = "";</script> <?php 

    if (empty($nombre) || strlen($nombre)<4) {
        $band=false;
        ?><script type="text/javascript"> 
            mensaje = "Ingrese nombre válido";
        </script> <?php 
    }
    if (isset($_POST["orden"])) {
        $orden=$_POST["orden"];
        if (!is_numeric($orden)) {
            $band=false;
            ?><script type="text/javascript"> 
                mensaje = "Ingrese orden válido";
            </script> <?php 
        }else{
            if ( $orden<1) {
                $band=false;
                ?><script type="text/javascript"> 
                    mensaje = "Ingrese orden válido";
                </script> <?php 
            }
        }
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
        echo $_POST["imagen"];
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
                    alert("Se Creo <?php echo $_POST["nombreT"];?> correctamente");
                    $(".crear_categoria").prop("disabled",false);
                    $(".crear_distribucionS").prop("disabled",false);
                    location.reload();
                </script>
                <?php
            }else{
                ?>
                <script type="text/javascript"> 
                    alert("Error <?php echo $_POST["nombreT"];?> no se pudo crear");
                    $(".crear_categoria").prop("disabled",false);
                    $(".crear_distribucionS").prop("disabled",false);
                    console.log(<?php $resultado;?>);
                </script>
                <?php
            }
        } else if ($_POST["tipo2"]==="editar") {
            if($resultado=="true"){
                ?>
                <script type="text/javascript"> 
                    alert("Se Edito <?php echo $_POST["nombreT"];?> correctamente");
                    $(".editar_categoria").prop("disabled",false);
                    $(".editar_distribucionS").prop("disabled",false);
                    location.reload();
                </script>
                <?php
            }else{
                ?>
                <script type="text/javascript"> 
                    alert("Error <?php echo $_POST["nombreT"];?> no se pudo editar");
                    $(".editar_categoria").prop("disabled",false);
                    $(".editar_distribucionS").prop("disabled",false);
                    console.log(<?php $resultado;?>);
                </script>
                <?php
            }
        } else if ($_POST["tipo2"]==="estado") {
            if($resultado=="true"){
                if($estado=="B"){
                    ?>
                    <script type="text/javascript"> 
                        alert("Se Elimino <?php echo $_POST["nombreT"];?> correctamente");
                        $(".delete").prop("disabled",false);
                        location.reload();
                    </script>
                    <?php
                }else{
                    ?>
                    <script type="text/javascript"> 
                        alert("Se Edito <?php echo $_POST["nombreT"];?> correctamente");
                        $(".estado").prop("disabled",false);
                        location.reload();
                    </script>
                    <?php
                }
            }else{
                if($estado=="B"){
                    ?>
                    <script type="text/javascript"> 
                        alert("Error <?php echo $_POST["nombreT"];?> no se pudo Eliminar");
                        $(".delete").prop("disabled",false);
                        console.log(<?php $resultado;?>);
                    </script>
                    <?php
                }else{
                    ?>
                    <script type="text/javascript"> 
                        alert("Error <?php echo $_POST["nombreT"];?> no se pudo editar");
                        $(".estado").prop("disabled",false);
                        console.log(<?php $resultado;?>);
                    </script>
                    <?php
                }
            }
        } else if ($_POST["tipo2"]==="crearBP") {
            if($resultado=="true"){
                ?>
                <script type="text/javascript">
                    location.hash = "/distribucion-principal"; 
                    alert("Se Creo la distribución correctamente");
                    $("#guardarD").prop("disabled",false);
                    location.reload();

                </script>
                <?php
                
            }else{
                ?>
                <script type="text/javascript"> 
                    alert("Error la distribución no se pudo crear");
                    $("#guardarD").prop("disabled",false);
                    console.log(<?php $resultado;?>);
                </script>
                <?php
            }
        } else if ($_POST["tipo2"]==="editarBP") {
            if($resultado=="true"){
                ?>
                <script type="text/javascript">
                    location.hash = "/distribucion-principal"; 
                    alert("Se edito la distribución correctamente");
                    $("#editarD").prop("disabled",false);
                    $("#editarNombre").prop("disabled",false);
                    location.reload();

                </script>
                <?php
                
            }else{
                ?>
                <script type="text/javascript"> 
                    alert("Error la distribución no se pudo editar");
                    $("#editarD").prop("disabled",false);
                    $("#editarNombre").prop("disabled",false);
                    console.log(<?php $resultado;?>);
                </script>
                <?php
            }
        }
    }
}else{
    ?><script type="text/javascript"> 
        alert(mensaje);
        $(".crear_categoria").prop("disabled",false);
        $(".editar_categoria").prop("disabled",false);
        $(".crear_distribucionS").prop("disabled",false);
        $(".editar_distribucionS").prop("disabled",false);
        $("#editarD").prop("disabled",false);
        $("#editarNombre").prop("disabled",false);
        $("#guardarD").prop("disabled",false);
    </script> <?php 
}

?>
<div class="alsaaerta" id="alertasaa" >
    </div>