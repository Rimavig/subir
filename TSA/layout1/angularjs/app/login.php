<?php
include ("conect.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Teatro Sanchez Aguilar</title>
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
                        <i class="user-img icons-faces-users-03"></i>
                        <form method="post" class="form-signin" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <div class="append-icon">
                                <input type="text" name="username" id="username" class="form-control form-white username"  placeholder="Usuario" required>
                                <i class="icon-user"></i>
                            </div>
                            <div class="append-icon m-b-20">
                                <input type="password" name="password" class="form-control form-white password" placeholder="Contraseña"  required>
                                <i class="icon-lock"></i>
                            </div>
                            <button type="submit" id="submit-form" class="btn btn-lg btn-danger btn-block ladda-button" data-style="expand-left">Ingresar</button>
                            <!--div class="clearfix">
                                <p class="pull-left m-t-20"><a id="password" href="#">¿Olvidó su Contraseña?</a></p>
                                <p class="pull-right m-t-20"><a href="user-signup-v1.html">Registrarse</a></p>
                            </div-->
                        </form>
                        <?php
                        $dato1  =$password=$username= "";
                        $resultado = "";
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $resultado = "true";
                            if(isset($_POST["username"]) && isset($_POST["password"])){
                                $username = $_POST['username'];
                                $password = $_POST['password'];
                            }
                            $re = $client->login($username,$password);
                            $resultado = "";
                            $resultado = "".$re;
                            session_start();
                            if ($resultado!="false"){
                                $usuario =explode(',,,',$resultado);
                                $_SESSION["usuario"]=$usuario[3];
                                $_SESSION["id"]=$usuario[0];
                                $_SESSION["nombres"]=$usuario[1]." ".$usuario[2];
                                $_SESSION["contrasena"]=$_POST['password'];
                                $_SESSION["timeout"] = time();
                                $_SESSION["autenticado"]= "SI";
                                $_SESSION["lockscreen"] = "NO";
                            } else {
                                session_destroy();
                            }
                            
                        }
                        
                      ?>
                        
                        <form class="form-password" role="form">
                            <div class="append-icon m-b-20">
                                <input type="password" name="password" class="form-control form-white password" placeholder="Password" required>
                                <i class="icon-lock"></i>
                            </div>
                            <button type="submit" id="submit-password" class="btn btn-lg btn-danger btn-block ladda-button" data-style="expand-left">Cambiar Contraseña</button>
                            <div class="clearfix">
                                <p class="pull-left m-t-20"><a id="login" href="#">Iniciar Sesión</a></p>
                                <p class="pull-right m-t-20"><a href="user-signup-v1.html">Registrarse</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <p class="account-copyright">
                <span>Copyright © 2021 </span><span> VION IoT Solutions</span>.<span>Todos los derechos reservados.</span>
            </p>
        </div>
        <!-- END LOGIN BOX -->
        <div id="account-builder">
            <form class="form-horizontal" role="form">
                <div class="row">
                    <div class="col-md-12">
                        <i class="fa fa-spin fa-gear"></i> 
                        <h3><strong>Ajustes</strong> Sesión</h3>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-xs-8 control-label">Fondo variable</label>
                            <div class="col-xs-4">
                                <label class="switch m-r-20">
                                <input id="slide-cb" type="checkbox" class="switch-input">
                                <span class="switch-label" data-on="On" data-off="Off"></span>
                                <span class="switch-handle"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-xs-8 control-label">Imagen de Usuario</label>
                            <div class="col-xs-4">
                                <label class="switch m-r-20">
                                <input id="user-cb" type="checkbox" class="switch-input">
                                <span class="switch-label" data-on="On" data-off="Off"></span>
                                <span class="switch-handle"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <script type="text/javascript"> 
           $message="<?php echo $resultado; ?>" ;
            if( $message=="false") {
                alert('Los datos ingresados son incorrectos');
            } else{
                if( $message!="") {
                    window.location.href='index.php'; 
                }
                
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