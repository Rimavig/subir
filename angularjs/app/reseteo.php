<?php
include ("conect.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>QR TICKET</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta content="" name="description" />
        <meta content="themes-lab" name="author" />
        <link rel="shortcut icon" href="../../../assets/global/images/favicon.png">
        <link href="../../../assets/global/css/style.css" rel="stylesheet">
        <link href="../../../assets/global/css/ui.css" rel="stylesheet">
        <link href="../../../assets/global/plugins/bootstrap-loading/lada.min.css" rel="stylesheet">
    </head>
    <body class="account separate-inputs" data-page="login">
        <!-- BEGIN LOGIN BOX -->
        <div class="container" id="login-block">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-md-offset-4">
                    <div class="account-wall">
                        <div class="user-image">
                            <img src="../../../../../../imagenes/logo/logo-white.png" class="img-responsive " alt="friend 8">
                        </div>
                        <form method="post" class="form-signin" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
                            <div class="append-icon">
                                <input type="text" name="usuario" id="usuario" class="form-control form-white username"  placeholder="Usuario" required>
                                <i class="icon-user"></i>
                            </div>
                            <div class="append-icon  m-b-20">
                                <input type="email" name="email" id="email" class="form-control form-white username"  placeholder="Email" required>
                                <i class="icon-envelope"></i>
                            </div>
                            <div class="clearfix">
                                <p class="pull-left"><a  href="login.php">Iniciar Sesión</a></p>
                                <p class="pull-right"><a href="codigo.php">Ya tienes un código?</a></p>
                            </div>
                            <button type="submit" id="submit-form" class="btn btn-lg btn-danger btn-block ladda-button" data-style="expand-left">Generar Código</button>
                            <!--div class="clearfix">
                                <p class="pull-left m-t-20"><a id="password" href="#">¿Olvidó su Contraseña?</a></p>
                                <p class="pull-right m-t-20"><a href="user-signup-v1.html">Registrarse</a></p>
                            </div-->
                        </form>
                        <?php
                        $dato1  =$password=$username= "";
                  
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $resultado = "true";
                            if(isset($_POST["usuario"]) && isset($_POST["email"])){
                                $celular = $_POST['usuario'];
                                $email = $_POST['email'];
                                $re = $client->generarCodigo($celular,$email,"1");
                                $resultado = "";
                                $resultado = "".$re;
                            }
                           
                        }
                        
                      ?>
                        
                    </div>
                </div>
            </div>
            <p class="account-copyright">
            <span>Copyright © 2022 </span><span> Teatro Sanchez Aguilar</span><span>Powered by Vion IoT Solutions. All rights reserved.</span>
        </p>
        </div>
        <!-- END LOGIN BOX -->
        <script type="text/javascript"> 
           $message="<?php echo $resultado; ?>" ;
           if( $message=="true") {
                alert('Se reseteo la clave correctamente'); 
                window.location='codigo.php';
            } else{
                alert($message);
            }
        </script>
        <script src="../../../assets/global/plugins/jquery/jquery-3.1.0.min.js"></script>
        <script src="../../../assets/global/plugins/gsap/main-gsap.min.js"></script>
        <script src="../../../assets/global/plugins/tether/js/tether.min.js"></script>
        <script src="../../../assets/global/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="../../../assets/global/plugins/backstretch/backstretch.min.js"></script>
        <script src="../../../assets/global/plugins/bootstrap-loading/lada.min.js"></script>
        <script src="../../../assets/global/plugins/jquery-validation/jquery.validate.min.js"></script>
        <script src="../../../assets/global/plugins/jquery-validation/additional-methods.min.js"></script>
        <script src="../../../assets/global/js/pages/login-v1.js"></script>
    </body>
</html>