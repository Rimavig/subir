<!DOCTYPE html>
<!--PAGINA DE INICIO DE SESION-->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-status-bar-style" content="black" />
  <title>QR TICKET</title>
  <link rel="stylesheet" type="text/css" href="css\bootstrap.css">
  <link rel="stylesheet" type="text/css" href="Estilos\styles_menu.css"/>
  <link rel="stylesheet" type="text/css" href="Estilos\fonts.css"/>
  <link rel="stylesheet" type="text/css" href="Estilos\estilos.css"/>
  <link rel="stylesheet" type="text/css" href="css\bootstrap-grid.css">
  <link rel = "stylesheet" type="text/css"  href = "Estilos\styles_login.css"/>
  <link rel ="icon" type="text/css"  href = "images\loco.ico"/>
  <link rel ="apple-touch-icon" type="text/css"  href = "images\loco.ico"/>
  <script  src="js\registration.js"></script>
  <script src="js\jquery-3.1.1.min.js"></script>
  <script  src="js\menu.js"></script>
</head>
<body  class="body-fluid" >
  <div class="container-fluid">
    <div class="container-login">
      <div class="Image_container">
          <img src="images\logo.png" alt="Avatar" class="logo">
      </div>
      <label class="label-login" for="username"><b>Identificación</b></label>
      <input class="input-login" type="text" placeholder="Ingrese Cédula" name="username" title="Ingrese Cédula " pattern="[0-9]{10}" id="username" required >
      <label class="label-login" for="password"><b>Contraseña</b></label>
      <input class="input-login" type="Password" placeholder="Ingrese Contraseña" name="password" id="password"  required>
      <button class="button-login" type="submit" onclick="login()" >INGRESAR</button>
      <button  class="button-login"  onclick="tipo1()">REGISTRARSE</button>
   </div>
</body>
</html>
