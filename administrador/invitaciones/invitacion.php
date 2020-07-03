<div class="container1" >
  <form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"  onsubmit="return validacion()" >
      <div class="Image_container">
          <img src="..\images\logo.png" alt="Avatar" class="logoB">
      </div>
      <label for="nombres"><b>Nombres</b></label>
      <input type="text" placeholder="Ingrese su nombre" name="nombres" pattern="[A-Za-z ]{2,25}"  id="nombres" title="Ingrese sus 2 nombres" required>
      <label for="apellidos"><b>Apellidos</b></label>
      <input type="text" placeholder="Ingrese sus apellidos" name="apellidos" pattern="[A-Za-z ]{2,25}"  id="apellidos" title="Ingrese sus 2 apellidos" required>
      <label for="email"><b>Email</b></label>
      <input type="email" placeholder="Ingrese su email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Ingrese email correcto" id="email"  autocomplete="email" required>
      <span class="error" aria-live="polite"></span>
      <label for="celular"><b>Celular</b></label>
      <input type="text" placeholder="Ingrese su celular" name="celular" title="Ingrese celular(09########) "  pattern="[0-9]{10}" id="celular" required >
      <div>
        <label for="ciudadela" id="ciudadela" ><b>Ciudadela</b></label>
        <select name="ciudadela" title="Seleccione Ciudadela" >
          <option value="1">1</option>
          <option value="Visitante">Visitante</option>
        </select>
      </div>

      <button type="submit">Invitar</button>
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
