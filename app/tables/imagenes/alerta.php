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
                    alert("Se Creo <?php echo $_POST["nombreT"];?> correctamente");
                    $(".crear_imagen").prop("disabled",false);
                    location.reload();
                </script>
                <?php
            }else{
                ?>
                <script type="text/javascript"> 
                    alert("Error <?php echo $_POST["nombreT"];?> no se pudo crear");
                    $(".crear_imagen").prop("disabled",false);
                    console.log(<?php $resultado;?>);
                </script>
                <?php
            }
        } else if ($_POST["tipo2"]==="editar") {
            if($resultado=="true"){
                ?>
                <script type="text/javascript"> 
                    alert("Se Edito <?php echo $_POST["nombreT"];?> correctamente");
                    $(".editar_imagen").prop("disabled",false);
                    location.reload();
                </script>
                <?php
            }else{
                ?>
                <script type="text/javascript"> 
                    alert("Error <?php echo $_POST["nombreT"];?> no se pudo editar");
                    $(".editar_imagen").prop("disabled",false);
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
                        $(".eliminar").prop("disabled",false);
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
                        $(".eliminar").prop("disabled",false);
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