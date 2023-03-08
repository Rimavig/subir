
<?php
include ("../../conect.php");
include ("../../autenticacion.php");
include ("../../directorio.php");

$informacionDelArchivo = $_FILES["file"];
# La ubicación en donde PHP lo puso
$ubicacionTemporal = $informacionDelArchivo["tmp_name"];
#Nota: aquí tomamos el nombre que trae, pero recomiendo renombrarlo a otra cosa usando, por ejemplo, uniqid
$nombreArchivo = $informacionDelArchivo["name"];
$nuevaUbicacion = $path_1.$archivos . "/" . $nombreArchivo;
# Mover
$resultado = move_uploaded_file($ubicacionTemporal, $nuevaUbicacion);
if ($resultado) {
    echo "Subido con éxito";
} else {
    echo "Error al subir archivo";
}
?>
<div ></div>