function validacion() {
    var contraseña,contraseña1;

    contraseña = document.getElementById("contraseña").value;
    contraseña1 = document.getElementById("contraseña1").value;

    //validar caracteres
    if( contraseña==contraseña1 ) {
      return true;
    } else{
      alert('Las contraseñas No coinciden');
      return false;
    }
  return true;
}
function validacion1() {
    var contraseña,contraseña1;

    inicio = document.getElementById("inicio").value;
    termino = document.getElementById("termino").value;
    //validar caracteres
    if( inicio < termino ) {
      return true;
    } else{
      alert('Error-Tiempo de permiso');
      return false;
    }
  return true;
}

function function_alert($message) {
  if( $message=="true") {
    window.location.href='../menu/base.php';
    alert('Bienvenido');
    return true;
  } else if ( $message=="" ) {
    alert('Los datos ingresados son incorrectos');
    return false;
  }
return false;
}

function function_alert1($message) {
  if( $message=="true" ) {
    console.log($message);
    alert('Se registro correctamente');
    return true;
  } else if ( $message=="false" ) {
    alert('Error-El Registro ya existe');
    return false;
  }
return false;
}
function function_alert2($message) {
  if( $message=="true" ) {
    console.log($message);
    alert('Por favor compartir la imagen (Valido 1 persona)');
    window.location.href='../menu/test.png';
    return true;
  } else if ( $message=="false" ) {
    alert('Error-El Registro ya existe');
    return false;
  }
return false;
}
function function_alert3($message) {
  if( $message=="true" ) {
    console.log($message);
    alert('Se envio correctamente la invitacion');
    return true;
  } else if ( $message=="false" ) {
    alert('Error-Ingrese correctamente los datos');
    return false;
  }
return false;
}
