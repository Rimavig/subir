
<?php
include ("../../conect.php");
include ("../../autenticacion.php");
include ("../../directorio.php");

if ($_POST["tipo"]==="realizados") {
    $tipo="Eventos Realizados";
    $tipo2="realizados";
    $nombreT="la noticia";
}else if ($_POST["tipo"]==="espacios") {
    $tipo="Espacios";
    $tipo2="espacios";
    $nombreT="la noticia";
} else if ($_POST["tipo"]==="lineas") {
    $tipo="Líneas de acción";
    $tipo2="lineas";
    $nombreT="Líneas de acción";
} else if ($_POST["tipo"]==="proyectos") {
    $tipo="Proyectos con el Teatro";
    $tipo2="proyectos";
    $nombreT="Proyectos con el Teatro";
}else if ($_POST["tipo"]==="preguntas") {
    $tipo="Preguntas Frecuentes";
    $tipo2="preguntas";
    $nombreT="Proyectos con el Teatro";
}  else if ($_POST["tipo"]==="ambiental") {
    $tipo="Responsabilidad Ambiental";
    $tipo2="ambiental";
    $nombreT="Responsabilidad Ambiental";
}  else if ($_POST["tipo"]==="amigos") {
    $tipo="Beneficios";
    $tipo2="amigos";
    $nombreT="Beneficios";
}  else if ($_POST["tipo"]==="amigos_preguntas") {
    $tipo="Preguntas Frecuentes";
    $tipo2="amigos_preguntas";
    $nombreT="Preguntas Frecuentes";
} else if ($_POST["tipo"]==="boleteria") {
    $tipo="BOLETERÍA";
    $tipo2="boleteria";
    $nombreT="BOLETERÍA";
}  else if ($_POST["tipo"]==="cafe") {
    $tipo="CAFÉ VINO BAR";
    $tipo2="cafe";
    $nombreT="CAFÉ VINO BAR";
}  else if ($_POST["tipo"]==="whatsapp") {
    $tipo="WHATSAPP";
    $tipo2="whatsapp";
    $nombreT="WHATSAPP";
}  else if ($_POST["tipo"]==="instalacion") {
    $tipo="Instalación";
    $tipo2="instalaciones";
    $nombreT="la instalación";
}   else if ($_POST["tipo"]==="noticia") {
    $tipo="Noticia";
    $tipo2="noticia";
    $nombreT="la noticia";
}   else if ($_POST["tipo"]==="realizados") {
    $tipo="Eventos Realizados";
    $tipo2="realizados";
    $nombreT="la noticia";
}   else if ($_POST["tipo"]==="espacios") {
    $tipo="Espacios";
    $tipo2="espacios";
    $nombreT="la noticia";
} else if ($_POST["tipo"]==="lineas") {
    $tipo="Líneas de acción";
    $tipo2="lineas";
    $nombreT="Líneas de acción";
}  else if ($_POST["tipo"]==="proyectos") {
    $tipo="Proyectos con el Teatro";
    $tipo2="proyectos";
    $nombreT="Proyectos con el Teatro";
}  else if ($_POST["tipo"]==="preguntas") {
    $tipo="Preguntas Frecuentes";
    $tipo2="preguntas";
    $nombreT="Proyectos con el Teatro";
}   else if ($_POST["tipo"]==="ambiental") {
    $tipo="Responsabilidad Ambiental";
    $tipo2="ambiental";
    $nombreT="Responsabilidad Ambiental";
}  else if ($_POST["tipo"]==="amigos") {
    $tipo="Beneficios";
    $tipo2="amigos";
    $nombreT="Beneficios";
}   else if ($_POST["tipo"]==="CafeVino") {
    $tipo="Café Vino Bar- Plazoleta";
    $tipo2="CafeVino";
    $nombreT="Café Vino Bar- Plazoleta";
}      
$var1="";
if (isset($_POST["var1"])) {
    $var1 = $_POST['var1'];
}
?>
<input type="text" name="nombreT" id="nombreT" class="esconder"  value="<?php echo $nombreT; ?>" disabled>  
<input type="text" name="nombreT" id="tipo2" class="esconder"  value="<?php echo $tipo2; ?>" disabled>  
<input type="text"  id="EidObjetivo" class="esconder"  value="<?php echo $var1; ?>" disabled> 

<?php
$transport->close();
?>    