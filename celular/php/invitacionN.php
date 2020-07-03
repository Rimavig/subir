  <div class="container1">
      <div class="Image_container">
        <img src="images\logo.png" alt="Avatar" class="logo">
      </div>
      <label class="registro" for="nombres"><b>Nombres*</b></label>
      <input class="registro" type="text" placeholder="Ingrese su nombre" name="nombres" pattern="[A-Za-z ]{2,25}"  id="nombres" title="Ingrese sus 2 nombres" required>
      <label class="registro" for="apellidos"><b>Apellidos*</b></label>
      <input class="registro" type="text" placeholder="Ingrese sus apellidos" name="apellidos" pattern="[A-Za-z ]{2,25}"  id="apellidos" title="Ingrese sus 2 apellidos" required>
      <label class="registro" for="email"><b>Correo</b></label>
      <input class="registro" type="email" placeholder="Ingrese su email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Ingrese email correcto" id="email"  autocomplete="email">
      <label class="campos" ><b> Campos con * son obligadorios</b></label>
      <button class="tableB" onclick="enviarN()">Enviar</button>
      </div >
    </div>
<div class="invitacion-enviar">
</div>
