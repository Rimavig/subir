<!--MUESTRA LAS INVITACIONES ENVIADAS-->
<?php
include ("../menu/autenticacion.php");
include ("../menu/conect.php");
$resultado="";
if (isset($_POST["var1"])) {
  $var1 = $_POST['var1'];
  $re = $client->registro("".$var1);
  $resultado = "".$re;
  $valor_array = explode(';',$resultado);
}
?>
<div class="usuarios table-responsive text-nowrap" >
  <div class="menu_container" >
      <div class="row">
          <div class="col1">
              <img src="..\images\logo.png" alt="Avatar" class="logB">
      </div>
      <div class="col2">
          <h1>Manrique Security</h1>
          <p>Invitaciones Normales enviadas.</p>
      </div>
    </div>
  </div >
  <label  class="tableB" for="filtrar"><b>Filtrar</b></label>
  <input  type="text" class="tableB" id="searchTerm1" autocomplete="off" type="text" onkeyup="doSearch1()" />
  <div class="ventad" >
    <table class="table table-striped"  id="tusuarios"  >
        <thead>
          <tr>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Email</th>
            <th>Celular</th>
            <th>Fecha De Solicitud</th>
            <th>Ciudadela</th>
            <th>Estado</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach($valor_array as $llave => $valores) {
            $noticias =explode(',',$valores);
           ?>
           <tr>
           <td> <?php if (isset($noticias[0])) {echo $noticias[0]; }  ?> </td>
           <td> <?php if (isset($noticias[1])) {echo $noticias[1]; }  ?> </td>
           <td> <?php if (isset($noticias[3])) {echo $noticias[3]; }  ?> </td>
           <td> <?php if (isset($noticias[6])) {echo $noticias[6]; }  ?> </td>
           <td> <?php if (isset($noticias[7])) {echo $noticias[7]; }  ?> </td>
           <td>
             <div class="progress">
                 <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                 </div>
                 <span class="progress-completed">80%</span>
               </div>
           </td>
           </tr>
           <?php
          }
          $transport->close();
          ?>
          <tr class='noSearch hide'>
             <td colspan="5"></td>
         </tr>
          </tbody>
    </table>
  </div >

  <div class="botonA" >
      <button class="tableB" onclick=" editar()"  id="editar"><span class="icon-user-tie"></span>Editar</button>
      <button class="tableB" onclick=" eliminar()"  id="eliminar"><span class="icon-user-minus"></span>Eliminar</button>
      <button class="tableB" onclick=" bloquear()" id="bloquear"><span class="icon-user-tie"></span>Bloquear</button>
      <button class="tableB" onclick=" permisos()" id="permisos"><span class="icon-user-tie"></span>Permisos</button>
  </div >

</div >
<div class=" cont2" ></div >

<div class=" cont4" ></div >
<div class=" cont5" ></div >
