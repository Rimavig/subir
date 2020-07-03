<!--MENU RESIDENTE-->
<?php
include ("autenticacion.php");
include ("conect.php");

$resultado=$resultado1= "";
$resultado2= "";


$_SESSION["nombres"]= "";
$_SESSION["apellidos"]= "";
$_SESSION["genero"]= "";
$_SESSION["correo"]= "";
$_SESSION["telefono"]= "";
$_SESSION["fecha_nacimiento"]= "";
$_SESSION["status"]= "";
$_SESSION["ciudadelas"]= "";
$resultado=$resultado1= "";
$resultado2= "";

if (isset($_POST["tipo"]) ) {
  $resultado2= $_POST["tipo"];
}
if (isset($_POST["ciudadela"]) ) {
    $var1 = $_POST['ciudadela'];
    $_SESSION["ciudadela"]= $var1;
    $re = $client->registro("usuario, ".$_SESSION["usuario"].", ".$_SESSION["ciudadela"]);
    $resultado = "".$re;
    $dato = explode(',',$resultado);
    $cont = count($dato);
    if ($cont>6) {
      if (isset($dato[0])) {$_SESSION["id"]= $dato[0]; }
      if (isset($dato[1])) {$_SESSION["nombres"]= $dato[1]; }
      if (isset($dato[2])) {$_SESSION["apellidos"]= $dato[2]; }
      if (isset($dato[3])) {$_SESSION["genero"]= $dato[3]; }
      if (isset($dato[4])) {$_SESSION["correo"]= $dato[4]; }
      if (isset($dato[5])) {$_SESSION["telefono"]= $dato[5]; }
      if (isset($dato[6])) {$_SESSION["fecha_nacimiento"]= $dato[6]; }
      if (isset($dato[7])) {
        $_SESSION["status"]= $dato[7];
        if ($dato[7]!="A") {
          $resultado1="disable";
        }
      }
      if (isset($dato[8])) {
        $_SESSION["invitacion"]= $dato[8];
      }
      if (isset($dato[9])) {$_SESSION["ciudadelas"]= $dato[9]; }
    }else{
      if (isset($dato[0])) {$_SESSION["id"]= $dato[0]; }
      if (isset($dato[1])) {$_SESSION["nombres"]= $dato[1]; }
      if (isset($dato[2])) {$_SESSION["apellidos"]= $dato[2]; }
      if (isset($dato[3])) {$_SESSION["status"]= $dato[3]; }
      if (isset($dato[4])) {$_SESSION["ciudadelas"]= $dato[4]; }
    }

}
  $transport->close();
?>
<header>
  <div class="menu_bar">
    <a class="bt-menu" href="#" style="font-size: 27px" onclick="menu_bar()"><span class="icon-menu"></span>QR TICKET</a>
  </div>
  <nav class="nav_bar">
    <ul  >
      <li class=" menu_P">
        <a   href="#" id="menu" onclick="menu('<?php echo $_SESSION["ciudadelas"];?>')"><span class="icon-home" ></span>Inicio</a>
      </li>
      <li>
        <div class="menu1_bar menu_P">
           <a class="bt1-menu" href="#" id="codigo" onclick="intervalo('<?php echo $_SESSION["status"];?>')"><span class="icon-list2"></span>Código De Acceso</a>
        </div>
      </li>
      <li>
        <div class="menu2_bar">
           <a class="bt2-menu" href="#" onclick="menu2_bar()"><span class="icon-users"></span>Enviar Invitación</a>
        </div>
      </li>
      <li>
        <div class="menu4_bar menu_P">
           <a class="bt4-menu" href="#"  id="perfil" onclick="perfil('<?php echo $_SESSION["ciudadelas"];?>')"><span class="icon-user-tie"></span>Perfil</a>
        </div>
      </li>
      <li><a href="?link=1" name="link1" id="link1" onclick="limpiar()"><span class="icon-exit"></span>Cerrar Sesión</a></li>
    </ul>
  </nav>
  <nav class="nav2_bar">
    <ul class=" menu_P">
      <li><a  href="#" id="enviados" onclick="invitacionN('<?php echo $_SESSION["invitacion"];?>')" ><span class="icon-upload2"></span>Normal</a></li>
      <li><a href="#" id="recibidos" onclick="invitacionR('<?php echo $_SESSION["invitacion"];?>')" ><span class="icon-upload2"></span>Recurrente</a></li>
    </ul>
  </nav>
</li>
</header>
<div class="prueba"  onclick="menu_P()">
  <div class="container-fluid">
  <!--MENU PRINCIPAL-->
    <div class="prueba menu_P">
          <span class="error">
            <div class="container1" id="container1" >
              <div class="Image_container">
                  <img src="images\logo.png" alt="Avatar" class="logoB">
              </div>
          </div>
        </span>
      </div>
  </div>
</div>
