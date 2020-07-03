
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
