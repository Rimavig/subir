<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Firebase\JWT\JWT;


class MainController extends BaseController
{
    const KEY_CONST = "RimavigHotm@il003";

//eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJkYXRhIjp7InVzZXJJZCI6InJpbWF2aWcifX0.JthJwA5FaqTSGn3yYurhKOhG8hIiY70QOVhR2d5dwL4

//eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJkYXRhIjp7ImNvcnBOYW1lIjoiUFJJTUFYIn19.dbiT-5Ilr5c4ApLRf7ZOA3IZT_oHqMYtMeWhe1W5-eE
    public function signInAdmin($request, $response, $args){
        $response = $response->withHeader('Content-Type', 'application/json');
        $json = $request->getBody();
        $body = json_decode($json, true);

        if (!(isset($body['id']) && isset($body['password']))) {
            $json = ["error" => "Debe proporcionar identificacion, password y tipo de usuario"];
            $response->getBody()->write(json_encode($json));
            return $response;
        }
        //conectar base y comprobar
        $_id = $body['id'];
        $sql = "SELECT password FROM info_s_usuarios where id=:id";
        $db = $this->container->get('db');
        $statement = $db->prepare($sql);
        $statement->bindValue(':id', $_id, \PDO::PARAM_STR);
        try {
            $result = $statement->execute();
        } catch (\PDOException $th) {
            $result = false;
        }
        if ($result) {
            $found = false;
            $contadorUsuarios = 0;
            $bandError = false;
            $bandConsulta = false;
            while ($row = $statement->fetch(\PDO::FETCH_ASSOC)) {
                $found = true;
                $dbpass = $row["password"];
                if (strcmp($dbpass, $body['password']) === 0 ) {
                    $contadorUsuarios++;
                }
            }
            if (!$found) {
                $user[]["status"] = "EMPTY";
                $response = $response->withStatus(401);
            } else {
                if ($contadorUsuarios > 0) {
                    $user[]["status"] = "OK";
                    //$key = "qr2020l1anM@v1G";
                    $payload = array(
                        "data" => [
                            'userId' => $_id,
                        ]
                    );
                    $jwt = JWT::encode($payload, self::KEY_CONST);
                    $user[]['token'] = $jwt;

                } else {
                    $user[]["status"] = "ERROR";
                    $response = $response->withStatus(401);
                }
            }

        } else {
            $user[]["status"] = "ERRORDB";
            $response = $response->withStatus(500);
        }
        $response->getBody()->write(json_encode($user));
        return $response;
    }

    public function createCorp($request, $response, $args){
        $userId = $request->getAttribute('userId');
        $db = $this->container->get('db');
        // VALIDACION DE TOKEN
        $sql = "SELECT * FROM info_s_usuarios WHERE id=:id";
        $statement = $db->prepare($sql);
        $statement->bindValue(':id', $userId, \PDO::PARAM_STR);
        try {
            $result = $statement->execute();
        } catch (\PDOException $th) {
            $result = false;
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            return $response->withStatus(403);
        }
        // FIN VALIDACION
        // Validacion de Body
        $json = $request->getBody();
        $body = json_decode($json, true);
        if (!isset($body["name"])){
            return $response->withStatus(400);
        }
        // FIN Validacion
        $_name = strtoupper($body["name"]);
        //Generacion Token
        $payload = array(
            "data" => [
                'corpName' => $_name,
            ]
        );
        $jwt = JWT::encode($payload, self::KEY_CONST);
        // Fin Token
        $sql = "INSERT INTO info_corp (`name_corp`,`token`) VALUES (:name_corp, :token)";
        $statement = $db->prepare($sql);
        $statement->bindValue(':name_corp', $_name, \PDO::PARAM_STR);
        $statement->bindValue(':token', $jwt, \PDO::PARAM_STR);
        try {
            $result = $statement->execute();
        } catch (\PDOException $th) {
            $result = false;
            $errocode = $th->getCode();
            $response = $response->withHeader('Content-Type', 'application/json');
            $out[]["status"] = "ErrorServerCode: $errocode";
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }

        $response = $response->withHeader('Content-Type', 'application/json');
        $out[]["status"] = "OK";
        $out[]["token"] = $jwt;

        $response->getBody()->write(json_encode($out));
        return $response;
    }

    public function login($request, $response, $args){
        $corpName = $request->getAttribute('corpName');
        $db = $this->container->get('db');
        // VALIDACION DE TOKEN
        $sql = "SELECT * FROM info_corp WHERE name_corp=:name_corp";
        $statement = $db->prepare($sql);
        $statement->bindValue(':name_corp', $corpName, \PDO::PARAM_STR);
        try {
            $result = $statement->execute();
        } catch (\PDOException $th) {
            $result = false;
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            return $response->withStatus(401);
        }
        // FIN VALIDACION
        $json = $request->getBody();
        $body = json_decode($json, true);
        if (!(isset($body["usuario"]) && isset($body['clave']))){
            return $response->withStatus(400);
        }
        $usuario = trim($body['usuario']);
        $password = trim($body['clave']);

        if (strstr($usuario,'@') !== false){
              $sql = "SELECT * FROM usuarios WHERE correo= :usuario";
        }else{
              $sql = "SELECT * FROM usuarios WHERE usuario= :usuario";
        }
        $statement = $db->prepare($sql);
        $statement->bindValue(':usuario', $usuario, \PDO::PARAM_STR);
        $band=false;
        try {
            $result = $statement->execute();
        } catch (\PDOException $th) {
            $result = false;
            $errocode = $th->getCode();
            $response = $response->withHeader('Content-Type', 'application/json');
            $out["status"] = "ErrorServerCode: $errocode";
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        $response = $response->withHeader('Content-Type', 'application/json');
         $item = $statement->fetch();
        if ($item==false) {
          $out["status"] = "Usuario No existe";
          $response->getBody()->write(json_encode($out));
          return $response;
        }else{
            if ($item){
                if ($item->clave == $password) {
                  $usuarios= array('id'=> $item->id, 'usuario'=> $item->usuario, 'correo'=> $item->correo, 'tipo'=> $item->tipo);
                  $response->getBody()->write(json_encode( $usuarios));
                }else{
                  $out["status"] = "Contraseña Incorrecta";
                  $response->getBody()->write(json_encode($out));
                  return $response;
                }
            }
        }
        return $response;
    }

    public function validacion($request, $response, $args){
        $corpName = $request->getAttribute('corpName');
        $db = $this->container->get('db');
        // VALIDACION DE TOKEN
        $sql = "SELECT * FROM info_corp WHERE name_corp=:name_corp";
        $statement = $db->prepare($sql);
        $statement->bindValue(':name_corp', $corpName, \PDO::PARAM_STR);
        try {
            $result = $statement->execute();
        } catch (\PDOException $th) {
            $result = false;
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            return $response->withStatus(401);
        }
        // FIN VALIDACION
        $json = $request->getBody();
        $body = json_decode($json, true);
        if (!(isset($body["codigo"]))){
            return $response->withStatus(400);
        }
        $codigo = trim($body['codigo']);
        $response = $response->withHeader('Content-Type', 'application/json');
        $decode = base64_decode($codigo);
        date_default_timezone_set("America/Guayaquil");
        if (strlen($decode)==19) {
          $celular = substr($decode, 0,10);
          $tipo = substr($decode, 10,1);
          $fecha = substr($decode, 11,8);
          $fecha2 = date("dHis");
          $val1 =intval( $fecha2);
          $val2 =intval( $fecha);
          $total =$val1-$val2;
          $out["mensaje"]="";
          if ($total<10000000) {
              $servername = "35.225.228.138";
              $database = "qr_app";
              $username = "qradmin";
              $password = "Qr@adm1n2020-";
              // Create connection
              //$conn = new PDO('mysql:host=35.225.228.138;dbname=qr_app', 'qradmin', 'Qr@adm1n2020-');

              $conn = mysqli_connect($servername, $username, $password, $database);
              if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
              }else{
                $usuario="";
                $sql = "SELECT * FROM  info_residentes p WHERE p.id='".$celular."' and p.status ='A'";
                $statement = $conn->prepare($sql);
                //$statement->bindValue(':celular', $celular, \PDO::PARAM_STR);
                try {
                    $result = $statement->execute();
                } catch (\PDOException $th) {
                    $result = false;
                    return $response->withStatus(500);
                }
                $band=false;
                  if ($result) {
                    $result = $statement->get_result();
                    while($item = $result->fetch_assoc()){
                      $usuario=$item['nombres']." ".$item['apellidos'] ;
                      $band=true;
                    }
                    if ($band) {


                        try {
                            $sql = "INSERT INTO residentes (`celular`,`tipo`,`fecha`) VALUES (:celular,:tipo, now())";
                            $statement = $db->prepare($sql);
                            $statement->bindValue(':celular',  $celular, \PDO::PARAM_STR);
                            $statement->bindValue(':tipo',  $tipo, \PDO::PARAM_STR);
                            $result = $statement->execute();
                            $sql = "SELECT p.nombre as padre, h.nombre as hijo, a.nombre as aula, p.* FROM  padres p INNER JOIN hijo h ON h.id=p.id_hijo INNER JOIN aula a ON a.id=h.id_aula WHERE p.celular =:celular";
                            $statement = $db->prepare($sql);
                            $statement->bindValue(':celular', trim($celular), \PDO::PARAM_STR);
                            $result = $statement->execute();
                            $band1=true;

                            while($item = $statement->fetch()){
                                $band1=false;
                                $estudiante[]=array('nombre'=>$item->hijo,'aula'=>$item->aula);;

                            }
                            if ($band1) {
                                $out["mensaje"] = array('mensaje'=>"Código valido",'tipo'=>"A",'Residente'=> $usuario, 'Estudiante'=>"");
                            }else{
                               $out["mensaje"]  = array('mensaje'=>"Código valido",'tipo'=>"A",'Residente'=> $usuario, 'Estudiante'=>$estudiante);
                            }

                        } catch (\PDOException $th) {
                            $result = false;
                            $errocode = $th->getCode();
                            $response = $response->withHeader('Content-Type', 'application/json');
                            $out["status"] = "ErrorServerCode: $errocode";
                            $response->getBody()->write(json_encode($out));
                            return $response->withStatus(500);
                        }

                    }else{
                        $out["mensaje"] = array('mensaje'=>"No Se encuentra registrado",'tipo'=>"E",'Residente'=> $usuario, 'Estudiante'=>"");
                    }
                  }else{

                  }

                mysqli_close($conn);
              }

          }else{
              $out["mensaje"] = array('mensaje'=>"Código Caducado",'tipo'=>"E",'Residente'=> "", 'Estudiante'=>"");
          }
        }else{
            $out["mensaje"] = array('mensaje'=>"Código inválido",'tipo'=>"E",'Residente'=> "", 'Estudiante'=>"");
        }

        // Check connection

        $response->getBody()->write(json_encode($out));
        return $response;
    }

    public function validacion1($request, $response, $args){
        $corpName = $request->getAttribute('corpName');
        $db = $this->container->get('db');
        // VALIDACION DE TOKEN
        $sql = "SELECT * FROM info_corp WHERE name_corp=:name_corp";
        $statement = $db->prepare($sql);
        $statement->bindValue(':name_corp', $corpName, \PDO::PARAM_STR);
        try {
            $result = $statement->execute();
        } catch (\PDOException $th) {
            $result = false;
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            return $response->withStatus(401);
        }
        // FIN VALIDACION
        $json = $request->getBody();
        $body = json_decode($json, true);
        if (!(isset($body["codigo"]) && isset($body["id_area"]))){
            return $response->withStatus(400);
        }
        $codigo = trim($body['codigo']);
        $area = trim($body['id_area']);
        $response = $response->withHeader('Content-Type', 'application/json');
        $decode = base64_decode($codigo);
        date_default_timezone_set("America/Guayaquil");
        if (strlen($decode)==19) {
          $celular = substr($decode, 0,10);
          $tipo = substr($decode, 10,1);
          $fecha = substr($decode, 11,8);
          $fecha2 = date("dHis");
          $val1 =intval( $fecha2);
          $val2 =intval( $fecha);
          $total =$val1-$val2;
          $out["mensaje"]="";
          if ($tipo=='0') {
              $residente="Representante";
              if ($total<60) {
                  $servername = "35.225.228.138";
                  $database = "qr_app";
                  $username = "qradmin";
                  $password = "Qr@adm1n2020-";
                  // Create connection
                  //$conn = new PDO('mysql:host=35.225.228.138;dbname=qr_app', 'qradmin', 'Qr@adm1n2020-');

                  $conn = mysqli_connect($servername, $username, $password, $database);
                  if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                  }else{
                    $usuario="";
                    $sql = "SELECT * FROM  info_residentes p WHERE p.id='".$celular."' and p.status ='A'";
                    $statement = $conn->prepare($sql);
                    //$statement->bindValue(':celular', $celular, \PDO::PARAM_STR);
                    try {
                        $result = $statement->execute();
                    } catch (\PDOException $th) {
                        $result = false;
                        return $response->withStatus(500);
                    }
                    $band=false;
                      if ($result) {
                        $result = $statement->get_result();
                        while($item = $result->fetch_assoc()){
                          $usuario=$item['nombres']." ".$item['apellidos'] ;
                          $band=true;
                        }
                        if ($band) {
                            try {
                                $sql = "SELECT p.nombre as padre, h.nombre as hijo, a.nombre as aula, p.* FROM  padres p INNER JOIN hijo h ON h.id=p.id_hijo INNER JOIN aula a ON a.id=h.id_aula WHERE p.celular =:celular and a.id=:aula and h.estado ='A'";
                                $statement = $db->prepare($sql);
                                $statement->bindValue(':celular', trim($celular), \PDO::PARAM_STR);
                                $statement->bindValue(':aula',  $area, \PDO::PARAM_STR);
                                $result = $statement->execute();
                                $band1=true;

                                while($item = $statement->fetch()){
                                    $band1=false;
                                    $estudiante[]=array('id_hijo'=>$item->id_hijo,'nombre'=>$item->hijo,'area'=>$item->aula);;

                                }
                                if ($band1) {
                                  $estudiante=array();
                                    $out["mensaje"] = array('mensaje'=>"Código valido",'status'=>"A",'tipo'=>$residente,'celular'=>$celular,'Residente'=> $usuario, 'Estudiante'=>$estudiante);
                                }else{
                                   $out["mensaje"]  = array('mensaje'=>"Código valido",'status'=>"A",'tipo'=>$residente,'celular'=>$celular,'Residente'=> $usuario, 'Estudiante'=>$estudiante);
                                }

                            } catch (\PDOException $th) {
                                $result = false;
                                $errocode = $th->getCode();
                                $response = $response->withHeader('Content-Type', 'application/json');
                                $out["status"] = "ErrorServerCode: $errocode";
                                $response->getBody()->write(json_encode($out));
                                return $response->withStatus(500);
                            }

                        }else{
                            $out["mensaje"] = array('mensaje'=>"No Se encuentra registrado",'status'=>"E",'tipo'=>$residente,'celular'=>$celular,'Residente'=> $usuario, 'Estudiante'=>"");
                        }
                      }else{

                      }

                    mysqli_close($conn);
                  }

              }else{
                  $out["mensaje"] = array('mensaje'=>"Código Caducado",'status'=>"E",'tipo'=>$residente,'celular'=>$celular,'Residente'=> "", 'Estudiante'=>"");
              }
            }else{
              $residente="Visitante";
              try {
                  $sql = "SELECT i.personaR as padre, h.nombre as hijo,h.id as id_hijo, a.nombre as aula, i.* FROM  invitacion i INNER JOIN invitacion_hijo ih ON ih.id_invitacion=i.id_invitacion INNER JOIN hijo h on h.id =ih.id_hijo INNER JOIN aula a ON a.id=h.id_aula and h.id_aula=:aula and i.fecha =CURDATE() and h.estado ='A'";
                  $statement = $db->prepare($sql);
                  $statement->bindValue(':aula',  $area, \PDO::PARAM_STR);
                  $result = $statement->execute();
                  $band1=true;

                  while($item = $statement->fetch()){
                      $fecha2 = date( "dHis",strtotime($item->fecha_invitacion));
                      $val1 =intval( $fecha2);
                      $total =$val1-$val2;
                      if ($total==0) {
                          $band1=false;
                          $estudiante[]=array('id_hijo'=>$item->id_hijo,'nombre'=>$item->hijo,'area'=>$item->aula);;
                          $celular=$item->celular;
                          $usuario=$item->personaR;
                      }
                  }
                  if ($band1) {
                    $out["mensaje"] = array('mensaje'=>"No tiene hijos para retirar",'status'=>"E",'tipo'=>"",'celular'=>"",'Residente'=> "", 'Estudiante'=>"");
                  }else{
                     $out["mensaje"]  = array('mensaje'=>"Código valido",'status'=>"A",'tipo'=>$residente,'celular'=>$celular,'Residente'=> $usuario, 'Estudiante'=>$estudiante);
                  }

              } catch (\PDOException $th) {
                  $result = false;
                  $errocode = $th->getCode();
                  $response = $response->withHeader('Content-Type', 'application/json');
                  $out["status"] = "ErrorServerCode: $errocode";
                  $response->getBody()->write(json_encode($out));
                  return $response->withStatus(500);
              }
            }
        }else{
            $out["mensaje"] = array('mensaje'=>"Código inválido",'status'=>"E",'tipo'=>"",'celular'=>"",'Residente'=> "", 'Estudiante'=>"");
        }

        // Check connection

        $response->getBody()->write(json_encode($out));
        return $response;
    }

    public function retirar($request, $response, $args){
        $corpName = $request->getAttribute('corpName');
        $db = $this->container->get('db');
        // VALIDACION DE TOKEN
        $sql = "SELECT * FROM info_corp WHERE name_corp=:name_corp";
        $statement = $db->prepare($sql);
        $statement->bindValue(':name_corp', $corpName, \PDO::PARAM_STR);
        try {
            $result = $statement->execute();
        } catch (\PDOException $th) {
            $result = false;
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            return $response->withStatus(401);
        }
        // FIN VALIDACION
        $json = $request->getBody();
        $body = json_decode($json, true);
        if (!(isset($body["nombre"]) && isset($body["celular"]) && isset($body["tipo"]) && isset($body["id_hijos"]))){
            return $response->withStatus(400);
        }
        $nombre = trim($body['nombre']);
        $celular = trim($body['celular']);
        $tipo = trim($body['tipo']);
        $hijos = trim($body['id_hijos']);
        $historial= explode('|',$hijos);


        date_default_timezone_set("America/Guayaquil");
        try {
          foreach($historial as $llave => $valores) {
            $sql = "INSERT INTO sala_espera (id,nombre,celular,tipo,id_hijo,fecha) VALUES (null, :nombre, :celular,:tipo,:hijo, now())";
            $statement = $db->prepare($sql);
            $statement->bindValue(':nombre',  $nombre, \PDO::PARAM_STR);
            $statement->bindValue(':celular',  $celular, \PDO::PARAM_STR);
            $statement->bindValue(':tipo',  $tipo, \PDO::PARAM_STR);
            $statement->bindValue(':hijo',  $valores, \PDO::PARAM_STR);
            $result = $statement->execute();
            $sql = "UPDATE hijo SET estado='P' WHERE id=:hijo ";
            $statement = $db->prepare($sql);
            $statement->bindValue(':hijo',  $valores, \PDO::PARAM_STR);
            $result = $statement->execute();
            if ($tipo=="Visitante") {
              $sql = "SELECT * FROM  invitacion i WHERE personaR=:personaR and celular=:celular and fecha=CURDATE() ";
              $statement = $db->prepare($sql);
              $statement->bindValue(':personaR',  $nombre, \PDO::PARAM_STR);
              $statement->bindValue(':celular',  $celular, \PDO::PARAM_STR);
              $result = $statement->execute();
              while($item = $statement->fetch()){
                $sql = "UPDATE invitacion SET estado='I' WHERE personaR=:personaR and celular=:celular and fecha=CURDATE() ";
                $statement1 = $db->prepare($sql);
                $statement1->bindValue(':personaR',  $nombre, \PDO::PARAM_STR);
                $statement1->bindValue(':celular',  $celular, \PDO::PARAM_STR);
                $result = $statement1->execute();
                $sql = "UPDATE invitacion_hijo SET estado='I' WHERE id_invitacion=:id_invitacion and id_hijo=:id_hijo";
                $statement1 = $db->prepare($sql);
                $statement1->bindValue(':id_invitacion',  $item->id_invitacion, \PDO::PARAM_STR);
                $statement1->bindValue(':id_hijo',  $valores, \PDO::PARAM_STR);
                $result = $statement1->execute();

              }
            }

          }
        } catch (\PDOException $th) {
            $result = false;
            $errocode = $th->getCode();
            $response = $response->withHeader('Content-Type', 'application/json');
            $out["status"] = "ErrorServerCode: $errocode";
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        $response = $response->withHeader('Content-Type', 'application/json');
        $out["status"] = 'Operación realizada OK';
        $response->getBody()->write(json_encode($out));
        return $response;
    }

    public function areas($request, $response, $args){
        $corpName = $request->getAttribute('corpName');
        $db = $this->container->get('db');
        // VALIDACION DE TOKEN
        $sql = "SELECT * FROM info_corp WHERE name_corp=:name_corp";
        $statement = $db->prepare($sql);
        $statement->bindValue(':name_corp', $corpName, \PDO::PARAM_STR);
        try {
            $result = $statement->execute();
        } catch (\PDOException $th) {
            $result = false;
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            return $response->withStatus(401);
        }
        // FIN VALIDACION
        $json = $request->getBody();
        $body = json_decode($json, true);
        if (!(isset($body["id_usuario"]))){
            return $response->withStatus(400);
        }
        $usuario = trim($body['id_usuario']);

        date_default_timezone_set("America/Guayaquil");
        try {
            $sql = "SELECT * FROM usuarios WHERE id=:usuario";
            $statement = $db->prepare($sql);
            $statement->bindValue(':usuario',  $usuario, \PDO::PARAM_STR);
            $result = $statement->execute();
            $item = $statement->fetch();
            if ($item==false) {
              $out["status"] = "Usuario No existe";
              $response->getBody()->write(json_encode($out));
              return $response;
            }else{
                if ($item){
                    $sql1 = "SELECT * FROM aula";
                    $statement1 = $db->prepare($sql1);
                    $result1 = $statement1->execute();
                    while($item1 = $statement1->fetch()){
                        if ($item->tipo == "Administrador") {
                          $usuarios[]= array('id'=> $item1->id, 'area'=> $item1->nombre);
                        }else{
                          if ($item->tipo==$item1->id) {
                              $usuarios= array('id'=> $item1->id, 'area'=> $item1->nombre);
                          }
                        }
                    }
                    $response = $response->withHeader('Content-Type', 'application/json');
                    $response->getBody()->write(json_encode($usuarios));
                }
            }
        } catch (\PDOException $th) {
            $result = false;
            $errocode = $th->getCode();
            $response = $response->withHeader('Content-Type', 'application/json');
            $out["status"] = "ErrorServerCode: $errocode";
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }

        return $response;
    }

    public function salida($request, $response, $args){
        $corpName = $request->getAttribute('corpName');
        $db = $this->container->get('db');
        // VALIDACION DE TOKEN
        $sql = "SELECT * FROM info_corp WHERE name_corp=:name_corp";
        $statement = $db->prepare($sql);
        $statement->bindValue(':name_corp', $corpName, \PDO::PARAM_STR);
        try {
            $result = $statement->execute();
        } catch (\PDOException $th) {
            $result = false;
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            return $response->withStatus(401);
        }
        // FIN VALIDACION
        $json = $request->getBody();
        $body = json_decode($json, true);
        if (!(isset($body["id_area"]) && isset($body["tipo"]))){
            return $response->withStatus(400);
        }
        $area = trim($body['id_area']);
        $tipo = trim($body['tipo']);
        date_default_timezone_set("America/Guayaquil");
        $response = $response->withHeader('Content-Type', 'application/json');
        $band=true;
        try {
          if ($tipo=="R") {
            $sql = "SELECT h.nombre as hijo, a.id as id_aula, rs.* FROM  registro_salida rs INNER JOIN hijo h ON h.id=rs.id_hijo INNER JOIN aula a ON a.id=h.id_aula and id_aula=:aula and DATE(fecha)=CURDATE() and h.estado='R'";
            $statement = $db->prepare($sql);
            $statement->bindValue(':aula',  $area, \PDO::PARAM_STR);
            $result = $statement->execute();
            $padres[]="";
            while($item = $statement->fetch()){
                $band=false;
                $band1=true;
                if (!in_array($item->padre, $padres)) {
                  $sql1 = "SELECT h.nombre as hijo, a.id as id_aula, rs.* FROM  registro_salida rs INNER JOIN hijo h ON h.id=rs.id_hijo INNER JOIN aula a ON a.id=h.id_aula and id_aula=:aula and DATE(fecha)=CURDATE() and celular=:celular and h.estado='R'";
                  $statement1 = $db->prepare($sql1);
                  $statement1->bindValue(':aula',  $area, \PDO::PARAM_STR);
                  $statement1->bindValue(':celular',  trim($item->celular), \PDO::PARAM_STR);
                  $result1 = $statement1->execute();
                  while($item1 = $statement1->fetch()){
                      $band1=false;
                      $hijos[]=array('id_retiro'=>$item1->id,'hijo'=>$item1->hijo,'id_hijo'=>$item1->id_hijo,'tipo'=>$item1->tipo);
                  }
                  if ($band1==false) {
                    $registro[]=array('padre'=>$item->padre,'celular'=>$item->celular,'id_aula'=>$item->id_aula,'hijos'=>$hijos,'observacion'=>$item->observacion,'fecha'=>$item->fecha);;
                  }else{
                    $hijos=array();
                    $registro[]=array('padre'=>$item->padre,'celular'=>$item->celular,'id_aula'=>$item->id_aula,'hijos'=>$hijos,'observacion'=>$item->observacion,'fecha'=>$item->fecha);;
                  }
                    $padres[]=$item->celular;
                }

            }
          }else{
            $sql = "SELECT se.nombre as padre, h.nombre as hijo, a.id as id_aula, se.* FROM  sala_espera se INNER JOIN hijo h ON h.id=se.id_hijo INNER JOIN aula a ON a.id=h.id_aula and id_aula=:aula and DATE(fecha)=CURDATE() and h.estado='P'";
            $statement = $db->prepare($sql);
            $statement->bindValue(':aula',  $area, \PDO::PARAM_STR);
            $result = $statement->execute();
            $padres[]="";
            while($item = $statement->fetch()){
              $band=false;
              $band1=true;
              if (!in_array($item->padre, $padres)) {
                $sql1 = "SELECT se.nombre as padre, h.nombre as hijo, a.id as id_aula, se.* FROM  sala_espera se INNER JOIN hijo h ON h.id=se.id_hijo INNER JOIN aula a ON a.id=h.id_aula and id_aula=:aula and DATE(fecha)=CURDATE() and celular=:celular and se.nombre=:padre and se.tipo=:tipo and h.estado='P'";
                $statement1 = $db->prepare($sql1);
                $statement1->bindValue(':aula',  $area, \PDO::PARAM_STR);
                $statement1->bindValue(':celular',  trim($item->celular), \PDO::PARAM_STR);
                $statement1->bindValue(':celular',  trim($item->celular), \PDO::PARAM_STR);
                $statement1->bindValue(':padre',  trim($item->padre), \PDO::PARAM_STR);
                $statement1->bindValue(':tipo',  trim($item->tipo), \PDO::PARAM_STR);
                $result1 = $statement1->execute();
                $hijos=[];
                while($item1 = $statement1->fetch()){
                  $band1=false;
                    $hijos[]=array('id_retiro'=>$item1->id,'hijo'=>$item1->hijo,'id_hijo'=>$item1->id_hijo,'tipo'=>$item1->tipo);
                }
                if ($band1==false) {
                  $registro[]=array('padre'=>$item->padre,'celular'=>$item->celular,'id_aula'=>$item->id_aula,'hijos'=>$hijos,'observacion'=>"none",'fecha'=>$item->fecha);
                }else{
                  $registro[]=array('padre'=>$item->padre,'celular'=>$item->celular,'id_aula'=>$item->id_aula,'hijos'=>"",'observacion'=>"none",'fecha'=>$item->fecha);
                }

                $padres[]=$item->padre;
              }
            }
          }
          if ($band==true) {
          $registro["mensaje"]= "No existe registros";
          }
          $response->getBody()->write(json_encode($registro));

        } catch (\PDOException $th) {
            $result = false;
            $errocode = $th->getCode();
            $response = $response->withHeader('Content-Type', 'application/json');
            $out["status"] = "ErrorServerCode: $errocode";
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }

        return $response;
    }

    public function marcar_salida($request, $response, $args){
        $corpName = $request->getAttribute('corpName');
        $db = $this->container->get('db');
        // VALIDACION DE TOKEN
        $sql = "SELECT * FROM info_corp WHERE name_corp=:name_corp";
        $statement = $db->prepare($sql);
        $statement->bindValue(':name_corp', $corpName, \PDO::PARAM_STR);
        try {
            $result = $statement->execute();
        } catch (\PDOException $th) {
            $result = false;
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            return $response->withStatus(401);
        }
        // FIN VALIDACION
        $json = $request->getBody();
        $body = json_decode($json, true);
        if (!(isset($body["nombre"]) && isset($body["celular"]) && isset($body["tipo"]) && isset($body["id_retiro"]) && isset($body["observacion"]))){
            return $response->withStatus(400);
        }
        $nombre = trim($body['nombre']);
        $celular = trim($body['celular']);
        $tipo = trim($body['tipo']);
        $observacion = trim($body['observacion']);
        $hijos = trim($body['id_retiro']);
        $historial= explode('|',$hijos);


        date_default_timezone_set("America/Guayaquil");
        try {
          foreach($historial as $llave => $valores) {
            $historial1= explode(':',$valores);
            if (isset($historial1[1])) {
              $sql = "SELECT * FROM  sala_espera i WHERE id=:id_espera";
              $statement = $db->prepare($sql);
              $statement->bindValue(':id_espera',  $historial1[0], \PDO::PARAM_STR);
              $result = $statement->execute();
              while($item = $statement->fetch()){
                $sql = "INSERT INTO registro_salida (id,padre,celular,id_hijo,observacion,tipo,fecha) VALUES (null, :nombre, :celular,:hijo,:observacion,:tipo, now())";
                $statement1 = $db->prepare($sql);
                $statement1->bindValue(':nombre',  $nombre, \PDO::PARAM_STR);
                $statement1->bindValue(':celular',  $celular, \PDO::PARAM_STR);
                $statement1->bindValue(':tipo',  $item->tipo, \PDO::PARAM_STR);
                $statement1->bindValue(':hijo',  $item->id_hijo, \PDO::PARAM_STR);
                $statement1->bindValue(':observacion',  $observacion, \PDO::PARAM_STR);
                $result = $statement1->execute();
                $sql = "UPDATE hijo SET estado='R' WHERE id=:hijo ";
                $statement1 = $db->prepare($sql);
                $statement1->bindValue(':hijo',  $item->id_hijo, \PDO::PARAM_STR);
                $result = $statement1->execute();
                $sql = "DELETE FROM sala_espera WHERE id=:id_espera ";
                $statement1 = $db->prepare($sql);
                $statement1->bindValue(':id_espera',  $historial1[0], \PDO::PARAM_STR);
                $result = $statement1->execute();
              }


            }
          }
        } catch (\PDOException $th) {
            $result = false;
            $errocode = $th->getCode();
            $response = $response->withHeader('Content-Type', 'application/json');
            $out["status"] = "ErrorServerCode: $errocode";
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        $response = $response->withHeader('Content-Type', 'application/json');
        $out["status"] = 'Operación realizada OK';
        $response->getBody()->write(json_encode($out));
        return $response;
    }
}
