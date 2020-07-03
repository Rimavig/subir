<!--MUESTRA USUARIOS-->
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
  <label  class="tableB" for="filtrar"><b>Filtrar</b></label>
  <input  type="text" class="tableB" id="searchTerm1" autocomplete="off" type="text" onkeyup="doSearch1()" />
  <div class="ventad" >
    <table class="table table-striped"  id="tusuarios"  >
        <thead>
          <tr>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Email</th>
            <th>Cedula</th>
            <th>Celular</th>
            <th>Fecha</th>
            <th>Sexo</th>
            <th>Ciudadela</th>
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
               <td> <?php if (isset($noticias[1])) {echo $noticias[1]; }  ?> </td>
               <td> <?php if (isset($noticias[3])) {echo $noticias[3]; }  ?> </td>
               <td> <?php if (isset($noticias[5])) {echo $noticias[5]; }  ?> </td>
               <td> <?php if (isset($noticias[6])) {echo $noticias[6]; }  ?> </td>
               <td> <?php if (isset($noticias[7])) {echo $noticias[7]; }  ?> </td>
               <td> <?php if (isset($noticias[8])) {echo $noticias[8]; }  ?> </td>
               <td> <?php if (isset($noticias[9])) {echo $noticias[9]; }  ?> </td>
               </tr>
                <?php
              }
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
      <button class="tableB" onclick=" editar('0')"  id="editar"><span class="icon-user-tie"></span>Editar</button>
      <!--button class="tableB" onclick=" eliminar('0')"  id="eliminar"><span class="icon-user-minus"></span>Eliminar</button-->
      <button class="tableB" onclick=" bloquear()" id="bloquear"><span class="icon-user-tie"></span>Bloquear</button>
      <button class="tableB" onclick=" permisos()" id="permisos"><span class="icon-user-tie"></span>Permisos</button>
  </div >

</div >
<div class=" cont2" ></div >

<div class=" cont4" ></div >
<div class=" cont5" ></div >
