<?php
include ("conect.php");
include ("autenticacion.php");
$_SESSION["lockscreen_eventos"]= "SI";
if(isset($_GET['link'])){
    $link=$_GET['link'];
    if ($link == '1'){
        session_destroy();
        header("Location: login.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <!-- BEGIN META SECTION -->
        <meta charset="utf-8">
        <title>Teatro Sanchez Aguilar</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta content="" name="description" />
        <meta content="themes-lab" name="author" />
        <link rel="shortcut icon" href="../../../assets/global/images/favicon.png">
        <!-- END META SECTION -->
        <!-- BEGIN MANDATORY STYLE -->
        <link href="../../../assets/global/css/style.css" rel="stylesheet">
        <link href="../../../assets/global/css/ui.css" rel="stylesheet">
        <link href="../../../assets/global/plugins/bootstrap-loading/lada.min.css" rel="stylesheet">
        <!-- END  MANDATORY STYLE -->
    </head>
    <body class="account" data-page="lockscreen">
        <!-- BEGIN LOGIN BOX -->
        <div class="container" id="lockscreen-block">
            <div class="row">
                <div class="col-md-8 col-md-offset-1">
                    <div class="account-wall">
                        <div class="user-image">
                            <img src="../../../../../../imagenes/logo/logo-white.png" class="img-responsive " alt="friend 8">
                        </div>
                        <form method="post" class="form-signin" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" role="form">
                            <h2>Bienvenido, <strong><?php echo $_SESSION["nombres_eventos"]; ?></strong>!</h2>
                            <p>Ingrese su contraseña para desbloquear.</p>
                            <div class="input-group"> 
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password"> 
                                <span class="input-group-btn"> 
                                <button type="submit" id="submit-form" class="btn btn-primary">Ingresar</button>
                                </span> 
                            </div>
                            <a href="?link=1" name="link1" id="link1" data-target="#"><i class="icon-logout"></i><span>Salir</span></a>
                        </form>
                        <?php
                        $dato1  =$password=$username= "";
                        $resultado = "false";
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $resultado = "true";
                            if(isset($_POST["password"])){
                                $password = $_POST['password'];
                                $re = $client->login($_SESSION["usuario_eventos"],$password,"evento");
                                $resultado = "";
                                $resultado = "".$re;
                                if ($resultado!="false"){
                                    $_SESSION["lockscreen_eventos"]= "NO";
                                } else {
                
                                }
                            }
                        }
                      ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="loader-overlay loaded">
            <div class="loader-inner">
                <div class="loader2"></div>
            </div>
        </div>
        <script type="text/javascript"> 
           $message="<?php echo $resultado; ?>" ;
           console.log( $message)
            if( $message!="false") {
                window.location.href='index.php';  
            } else if ( $message=="false" ) {
                alert('Los datos ingresados son incorrectos');
            }
        </script>
        <script src="../../../assets/global/plugins/jquery/jquery-3.1.0.min.js"></script>
        <script src="../../../assets/global/plugins/jquery/jquery-migrate-3.0.0.min.js"></script>
        <script src="../../../assets/global/plugins/gsap/main-gsap.min.js"></script>
        <script src="../../../assets/global/plugins/tether/js/tether.min.js"></script>
        <script src="../../../assets/global/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="../../../assets/global/plugins/backstretch/backstretch.min.js"></script>
        <script src="../../../assets/global/plugins/bootstrap-loading/lada.min.js"></script>
        <script src="../../../assets/global/plugins/progressbar/progressbar.min.js"></script>
        <script src="../../../assets/global/plugins/jquery-validation/jquery.validate.min.js"></script>
        <script src="../../../assets/global/js/pages/lockscreen.js"></script>
        <script src="../../../assets/admin/layout1/js/layout.js"></script>
  </body>
</html>
