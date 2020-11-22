<!--BUSCA CIUDADELAS-->
<?php
include ("../menu/autenticacion.php");
include ("../menu/conect.php");

$resultado= "";
$var1 = $_SESSION["usuario"];
$re = $client->registro("ciudadela,".$var1);
$resultado = "".$re;
$valor_array = explode(';',$resultado);
?>
<span class="error">
  <div class="container1" id="container1" >
      <div class="menu_container">
          <label for="ciudadela" class="tableA"><b>Ciudadelas</b></label>
           <button  class="tableA " onclick="aprobacion()" id="buscar"><span class="icon-search"></span>  Buscar</button>
      </div >
      <div class="buscar table-responsive text-nowrap" >
        <label  class="tableB" for="filtrar"><b>Filtrar</b></label>
        <input  class="tableB" id="searchTerm" type="text" onkeyup="doSearch()" />
        <div class="ventad" >
          <table class="table table-striped"   id="tciudadela">
              <thead>
                <tr>
                  <th>Ciudadela </th>
                </tr>
              </thead>
              <tbody >
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
                      ?>
                      <tr>
                      <td> <?php echo $valores; ?> </td>
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
            <button  class="tableB " onclick="usuarios('0')" id="usuarios" ><span class="icon-users"></span>Usuarios</button>
          </div >
      </div >
      <div class=" cont1" ></div >
      <div class="cont3" >
        <label class="tableC" id="texto"><b>Ciudadelas</b></label>
        <label class="tableC"><img src="..\images\aceptar.png" alt="Avatar" class="logoA" ></label>
        <div class="botonA" >
            <button class="tableB" onclick=" cargar('aprobacion')"  id="cargar"><span class="icon-point-up"></span>Aceptar</button>
        </div >
      </div >
  </div >
</span>
