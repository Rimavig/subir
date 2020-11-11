<!--MUESTRA LISTA DE RESITENTES QUE INGRESARON A LA CIUDADELA -->
<?php
include ("../menu/autenticacion.php");
include ("../menu/conect.php");
$resultado="";
if (isset($_POST["var1"])) {
  $var1 = $_POST['var1'];
  $re = $client->login("aprobar",$var1);
  $resultado = "".$re;
  $valor_array = explode(';',$resultado);
}

?>
<div class="usuarios table-responsive text-nowrap" >
  <div class="menu_container" >
      <div class="row">
          <div class="col1">
              <img src="..\images\logo.png" alt="Avatar" class="logo">
      </div>
      <div class="col2">
          <h1>Manrique Security</h1>
          <p>Aprobaciones para Ingreso de Visitantes.</p>
      </div>
    </div>
  </div >
  <label  class="tableB" for="filtrar"><b>Filtrar</b></label>
  <input  type="text" class="tableB" id="searchTerm1" autocomplete="off" type="text" onkeyup="doSearch1()" />
  <div class="ventad" >
    <table class="table table-striped"  id="tusuarios"  >
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombres</th>
            <th>Cédula</th>
            <th>Número de Personas</th>
            <th>Actividad a Realizar</th>
            <th>Observaciones</th>
            <th>Fecha</th>
            <th>Estado</th>
          </tr>
        </thead>
        <tbody>
          <?php
          //Leo cuantos elementos hay en el array
          $cont = count($valor_array);
          //Consulto las keys del array
          $keys = array_keys($valor_array);
          //Busco la ultima
          $ultima_key = $keys[$cont-1];

          foreach($valor_array as $llave => $valores) {
              if($llave == $ultima_key){

              }else{
                $noticias =explode(',',$valores);
               ?>
               <tr>
               <td> <?php if (isset($noticias[0])) {echo $noticias[0]; }  ?> </td>
               <td> <?php if (isset($noticias[0])) {echo $noticias[1]; }  ?> </td>
               <td> <?php if (isset($noticias[1])) {echo $noticias[2]; }  ?> </td>
               <td> <?php if (isset($noticias[2])) {echo $noticias[3]; }  ?> </td>
               <td> <?php if (isset($noticias[3])) {echo $noticias[5]; }  ?> </td>
               <td> <?php if (isset($noticias[4])) {echo $noticias[6]; }  ?> </td>
               <td> <?php if (isset($noticias[5])) {echo $noticias[4]; }  ?> </td>
               <td> <?php if (isset($noticias[6])) {echo $noticias[7]; }  ?> </td>
               </tr>
               <?php

              }
          }
          $transport->close();
          ?>
          <tr class='noSearch hide'>
             <td colspan="7"></td>
         </tr>
          </tbody>
    </table>
    </div >
    <div class="botonA" >
        <button class="tableB" onclick=" editar('0')"  id="editar"><span class="icon-user-tie"></span>Seleccionar</button>
    </div >
</div >
<div class=" cont2" ></div >
