<!--MUESTRA LAS INVITACIONES RECIBIDAS-->
<?php
include ("../menu/autenticacion.php");
include ("../menu/conect.php");

$resultado="";
if (isset($_POST["var1"])) {
  $var1 = $_POST['var1'];
  $re = $client->login("IngresoR",$var1);
  $resultado = "".$re;
  $valor_array = explode(';',$resultado);
}
?>
<div class="usuarios table-responsive text-nowrap" >
  <div class="menu_container" >
      <div class="row">
          <div class="col1">
              <img src="..\images\logo.png" alt="Avatar" class="logoB">
      </div>
      <div class="col2">
          <h1>Manrique Security</h1>
          <p>Invitaciones Recurrentes que Ingresaron.</p>
      </div>
    </div>
  </div >
  <label  class="tableB" for="filtrar"><b>Filtrar</b></label>
  <input  type="text" class="tableB" id="searchTerm1" autocomplete="off" type="text" onkeyup="doSearch1()" />
  <div class="ventad" >
    <table class="table table-striped"  id="tusuarios"  >
        <thead>
          <tr>
            <th>Celular Residente</th>
            <th>Nombres invitado</th>
            <th>Apellidos Invitado</th>
            <th>Celular Invitado</th>
            <th>Fecha de ingreso</th>
            <th>Ciudadela</th>
            <th>Puerta</th>
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
             <td> <?php if (isset($noticias[2])) {echo $noticias[2]; }  ?> </td>
             <td> <?php if (isset($noticias[3])) {echo $noticias[3]; }  ?> </td>
             <td> <?php if (isset($noticias[4])) {echo $noticias[4]; }  ?> </td>
             <td> <?php if (isset($noticias[5])) {echo $noticias[5]; }  ?> </td>
             <td> <?php if (isset($noticias[6])) {echo $noticias[6]; }  ?> </td>
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


</div >
<div class=" cont2" ></div >
