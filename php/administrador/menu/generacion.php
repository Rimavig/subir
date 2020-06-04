<!--GENERA CODIGO QR ESTATICO-->
<div class="container1" >
  <form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"  onsubmit="return validacion()" >
      <div class="Image_container">
          <a><img src="..\images\<?php echo rand(1, 8);?>.png" alt="Avatar" ></a>
      </div>
      <label for="nombres"><b>Nombres</b></label>
      <input type="text" placeholder="Ingrese su nombre" name="nombres" pattern="[A-Za-z ]{2,25}"  id="nombres" title="<?php echo rand(1, 8);?>" required>

      <button type="submit">Generar</button>
  </form>
  <?php
  $dato1=$resultado="";

  $registration[]=null;
  if(isset($_POST["nombres"]) && isset($_POST["apellidos"])&& isset($_POST["username"])
  && isset($_POST["email"])&& isset($_POST["inicio"])&& isset($_POST["fin"])
  && isset($_POST["celular"])&& isset($_POST["ciudadela"])){

    $registration[0]=$_POST['nombres'];
    $registration[1]=$_POST['apellidos'];
    $registration[2]=$_POST['username'];
    $registration[3]=$_POST['email'];
    $registration[6]=$_POST['celular'];
    $registration[7]=$_POST['inicio'];
    $registration[8]=$_POST['fin'];
    $registration[9]= $_POST['ciudadela'];
  }
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $re = $client->registro(implode(",", $registration));
    $resultado = "".$re;
  }
  ?>
</div>
