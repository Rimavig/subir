<!--LUGAR DE  INICIO DE SESION-->
<?php
include ("conect.php");

  $dato1 =$password=$username=$resultado= "";
if (isset($_POST["var2"]) ) {
  $var1 = $_POST['var1'];
  $var2 = $_POST['var2'];
  $re = $client->login($var1,$var2);

  $resultado = "".$re;
}
 $transport->close();
 $texto =$texto=$texto2=  "";
if ($resultado=="") {
  $texto= 'ERROR';
  $texto1= 'Los datos ingresados son incorrectos';
  $dato1="0";
  $texto2= 'style="visibility:hidden"';
}else {
  $dato1="1";
  $texto= 'Bienvenido';
  $texto1= 'Escoga donde desea Ingresar';
}
session_start();
if ($dato1=="1"){
  $_SESSION["timeout"] = time();
  $_SESSION["autenticado"]= "SI";
  $_SESSION["usuario"]= $var1;
  $_SESSION["ciudadelas"]="";
  $_SESSION["invitacion"]="N";
  $_SESSION["ingreso"]="I";
} else {
  session_destroy();
}
?>
  <div class="container-tipo">
    <div class="col2">
        <h1><?php echo  $texto; ?></h1>
        <p class ="login"><?php echo  $texto1; ?></p>
    </div>
        <span class="error">
          <select class="select-login" id="ciudadela" name="ciudadela" title="Seleccione" <?php echo  $texto2; ?> >
            <?php
              $valor_array = explode(';',$resultado);
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
                   <option value='<?php echo $noticias[2]; ?>'><?php if (isset($noticias[2])) {echo $noticias[2]; }  ?></option>
                    <?php
                  }
              }
            $transport->close();
            ?>
            </select>
            <div class="botonA" >
              <button  class="tableB " onclick="inicio('<?php echo $var1; ?>','<?php echo $dato1; ?>')" id="usuarios" >Aceptar</button>
            </div >

        </span>
  </div>
