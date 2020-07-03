<!--LUGAR DE  INICIO DE SESION-->
<?php
include ("conect.php");
$registration[]=null;
$resultado = "awe";
$texto =$texto1=$texto2=  "";
$band = true;
if (isset($_POST["tipo"])) {
  if ($_POST['tipo']=="visitante") {
    if(isset($_POST["nombres"]) && isset($_POST["apellidos"])&& isset($_POST["contraseña"])
    && isset($_POST["contraseña1"]) && isset($_POST["cedula"])){
      if($_POST['contraseña']=="" || $_POST['contraseña1']==""  || $_POST['nombres']==""
      || $_POST['apellidos']==""  || $_POST['cedula']==""){
        $texto= 'ERROR';
        $texto1= 'Ingrese correctamente el registro';
        $band=false;
      }else{
        $registration[0]=$_POST['nombres'];
        $registration[1]=$_POST['apellidos'];

        if (strlen($_POST['cedula'])==10 && is_numeric($_POST['cedula'])) {
          $registration[2]=$_POST['cedula'];
        }else{
          $texto= 'ERROR';
          $texto1= 'Cedula Incorrecta-Ingrese correctamente el registro';
          $band=false;
        }
        if($_POST['contraseña']==$_POST['contraseña1']){
          $encryptPass = password_hash($_POST['contraseña'],PASSWORD_DEFAULT);
          $registration[3]=$encryptPass;
        }else{
          $texto= 'ERROR';
          $texto1= 'Las contraseñas no coinciden';
          $band=false;
        }
        if ($band) {
          $re = $client->registro("registroV,".implode(",", $registration));
          $resultado = "".$re;
          if ($resultado=="false") {
            $texto= 'ERROR';
            $texto1= 'El registro ya existe';
          }else{
            $texto= 'Felicidades';
            $texto1= 'Se registro Correctamente';
          }
        }
      }
    }
  }else{
    if(isset($_POST["nombres"]) && isset($_POST["apellidos"])
    && isset($_POST["contraseña"]) && isset($_POST["contraseña1"]) && isset($_POST["cedula"])
    && isset($_POST["celular"]) && isset($_POST["sexo"])
    && isset($_POST["ciudadela"])){
      if($_POST['contraseña']=="" || $_POST['contraseña1']==""  || $_POST['nombres']==""
      || $_POST['apellidos']==""  || $_POST['cedula']=="" || $_POST['celular']==""){
        $texto= 'ERROR';
        $texto1= 'Ingrese correctamente el registro';
        $band=false;
      }else{
        $registration[0]=$_POST['nombres'];
        $registration[1]=$_POST['apellidos'];
        if ($_POST["email"]!="") {
          if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
              $registration[2]=$_POST['email'];
          }else{
            $texto= 'ERROR';
            $texto1= 'Email Incorrecto-Ingrese correctamente el registro';
            $band=false;
          }
        }else{
          $registration[2]="none";
        }
        if($_POST['contraseña']==$_POST['contraseña1']){
          $encryptPass = password_hash($_POST['contraseña'],PASSWORD_DEFAULT);
          $registration[3]=$encryptPass;
        }else{
          $texto= 'ERROR';
          $texto1= 'Las contraseñas no coinciden';
          $band=false;
        }
        if (strlen($_POST['cedula'])==10 && is_numeric($_POST['cedula'])) {
          $registration[4]=$_POST['cedula'];
        }else{
          $texto= 'ERROR';
          $texto1= 'Cedula Incorrecta-Ingrese correctamente el registro';
          $band=false;
        }
        if (strlen($_POST['celular'])==10 && is_numeric($_POST['celular'])) {
          $registration[5]=$_POST['celular'];
        }else{
          $texto= 'ERROR';
          $texto1= 'Celular Incorrecto-Ingrese correctamente el registro';
          $band=false;
        }
        $registration[6]=$_POST['nacimiento'];
        $registration[7]=$_POST['sexo'];
        $registration[8]= $_POST['ciudadela'];
        if ($band) {
          $re = $client->registro("registro,".implode(",", $registration));
          $resultado = "".$re;
          if ($resultado=="false") {
            $texto= 'ERROR';
            $texto1= 'El registro ya existe';
          }else{
            $texto= 'Felicidades';
            $texto1= 'Se registro Correctamente';
          }
        }
      }

    }
  }
}
 $transport->close();

?>
<div class="container-tipo">
  <div class="col2">
      <h1><?php echo  $texto; ?></h1>
      <p class ="login"><?php echo  $texto1; ?></p>
  </div>
    <button onclick="aceptar('<?php echo $resultado; ?>')">Aceptar</button>
</div>
