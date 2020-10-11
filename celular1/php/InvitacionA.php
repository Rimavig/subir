<!--MUESTRA TODAS LAS INVITACIONES RECURRENTES-->
<?php
include ("conect.php");
include ("autenticacion.php");

$dato1 =$password=$username=$resultado= "";
$var1 = $_SESSION["id"];
$var2 = $_SESSION["ciudadelas"];
$re = $client->login($var1,$var2);
$resultado = "".$re;
$valor_array = explode(';',$resultado);
$texto =$texto=$texto2=  "";
?>
<span class="error">
    <br>
    <div class="table-responsive text-nowrap" >
        <label  class="tableB" for="filtrar"><b>Filtrar</b></label>
        <input  class="tableB" id="searchTerm" type="text" onkeyup="doSearch()" />
        <table  class="table table-striped"  id="tciudadela">
          <tbody>
            <?php
            //Leo cuantos elementos hay en el array
            $cont = count($valor_array);
            //Consulto las keys del array
            $keys = array_keys($valor_array);
            //Busco la ultima
            $ultima_key = $keys[$cont-1];
            foreach($valor_array as $llave => $valores) {
                if($llave != $ultima_key){
                  $noticias =explode(',',$valores);
                  $_SESSION["recurrente"]=$noticias[4];
                 ?>
                 <tr>
                   <td>
                     <button  onclick="codigo('<?php echo $noticias[3];?>')" class="option " >
                       <div class="col4" style="margin-right: 10px;" >
                           <div class="col5">
                               <h3> <?php if (isset($noticias[0])) {echo $noticias[0]; }  ?> </h3>
                               <?php
                               if (($noticias[3])=="Activa"){
                                 $estilo='style="color: #06070e; font-weight: 700;"';
                               }else {
                                 $estilo='style="color: #f40606; font-weight: 700;"';
                               }
                               ?>
                               <h4 <?php echo $estilo ?>> <?php if (isset($noticias[3])) {echo $noticias[3]; }  ?> </h4>
                            </div>
                            <div class="col5">
                              <p class="invit"> <?php if (isset($noticias[1])) {echo $noticias[1]; }  ?> </p>
                              <h5 <span class="icon-arrow-right2"> </h5>
                             </div>

                           <p class="hora"> <?php if (isset($noticias[2])) {echo $noticias[2]; }  ?> </p>

                       </div>
                     </button>
                   </td>
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
</span>
