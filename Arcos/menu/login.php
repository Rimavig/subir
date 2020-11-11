<!--PAGINA DE INICIO DE SESION-->
<?php
include ("../menu/conect.php");
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, user-scalable=yes" target-densityDpi="dpi" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <title>QR TICKET</title>
    <link rel ="icon" type="text/css"  href = "..\images\loco.ico"/>
    <link rel ="apple-touch-icon" type="text/css"  href = "..\images\loco.ico"/>
    <script  src="..\js\registration.js"></script>
    <link rel = "stylesheet" type="text/css"  href = "..\Estilos\styles_login.css"/>
</head>
<body >
		<div class="container">
        <form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
            <div class="Image_container">
                <img src="..\images\logo.png" alt="Avatar" class="logo">
            </div>
            <label for="username"><b>Usuario o Email</b></label>
            <input type="text" placeholder="Ingrese Usuario o Email" name="username"  id="username" required>
            <label for="password"><b>Contraseña</b></label>
            <input type="Password" placeholder="Ingrese Contraseña" name="password" id="password"  required>
            <button type="submit" >INGRESAR</button>

        </form>
        <?php
          $dato1  =$password=$username= "";
          if(isset($_POST["username"]) && isset($_POST["password"])){
            $username = $_POST['username'];
            $password = $_POST['password'];
          }
          if ($_SERVER["REQUEST_METHOD"] == "POST") {
              $re = $client->login($username,$password);
              $resultado = "";
              $resultado = "".$re;
        ?>
          <script type="text/javascript"> function_alert( "<?php echo $resultado; ?>" )  </script>

        <?php
              session_start();
              if ($resultado=="true"){
                $_SESSION["timeout"] = time();
                $_SESSION["autenticado"]= "SI";
                $_SESSION["usuario"]= $username;
              } else {
                session_destroy();
              }
          }
        ?>
		</div>
</body>
