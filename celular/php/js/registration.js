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
    window.location.href='base.php';
    alert('Bienvenido');
    return true;
  } else if ( $message=="" ) {
    alert('Los datos ingresados son incorrectos');
    return false;
  }
return false;
}

function function_alert1($message) {
    console.log($message);
  if( $message=="true" ) {
    alert('Se registro correctamente');
    window.location.href='login.php';
    return true;
  }
  return false;
}
function function_alert2($message) {
  if( $message=="true" ) {
    console.log($message);
    alert('Por favor compartir la imagen (Valido 1 persona)');
    window.location.href='test.png';
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
    window.location.href='compartir.php';
    return true;
  } else if ( $message=="false" ) {
    alert('Error-El usuario ya tiene una invitacion');
    return false;
  }
return false;
}
