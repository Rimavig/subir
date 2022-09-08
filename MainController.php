<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Firebase\JWT\JWT;


class MainController extends BaseController
{
    const KEY_CONST = "TSATe@troTS@";


    public function signInAdmin($request, $response, $args){
        include("error.php");
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
        include("error.php");
        $response = $response->withHeader('Content-Type', 'application/json');
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
            $out[]["status"] = "ErrorServerCode: $errocode";
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }

        $out[]["status"] = "OK";
        $out[]["token"] = $jwt;

        $response->getBody()->write(json_encode($out));
        return $response;
    }

    public function login($request, $response, $args){
        include("error.php");
        $response = $response->withHeader('Content-Type', 'application/json');
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
            $out["codigo"] = "100";
            $out["mensaje"] = $error_100_mensaje;
            $out["causa"] =  $error_100_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            $out["codigo"] = "101";
            $out["mensaje"] = $error_101_mensaje;
            $out["causa"] = $error_101_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(401);
        }
        // FIN VALIDACION
        $json = $request->getBody();
        $body = json_decode($json, true);
        if (!(isset($body["usuario"]) && isset($body['contrasena']))){
            $out["codigo"] = "201";
            $out["mensaje"] = $error_201_mensaje;
            $out["causa"] =  $error_201_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(400);
        }
        $usuario = trim($body['usuario']);
        $password = trim($body['contrasena']);

        if (strstr($usuario,'@') !== false){
              $sql = "SELECT * FROM tsa_usuario_cliente WHERE correo= :usuario";
        }else{
              $sql = "SELECT * FROM tsa_usuario_cliente WHERE usuario= :usuario";
        }
        $statement = $db->prepare($sql);
        $statement->bindValue(':usuario', $usuario, \PDO::PARAM_STR);
        $band=false;
        try {
            $result = $statement->execute();
        } catch (\PDOException $th) {
            $result = false;
            $out["codigo"] = "102";
            $out["mensaje"] = $error_102_mensaje;
            $out["causa"] =  $error_102_causa;
            $out["error"] = $th->getMessage();
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
         $item = $statement->fetch();
          if ($item){
              if ($item->estado=="P") {
                $out["codigo"] = "223";
                $out["mensaje"] = $error_223_mensaje;
                $out["causa"] =  $error_223_causa;;
                $response->getBody()->write(json_encode($out));
                return $response->withStatus(400);
              }else  if ($item->estado=="B" | $item->estado=="I") {
                $out["codigo"] = "222";
                $out["mensaje"] = $error_222_mensaje;
                $out["causa"] =  $error_222_causa;;
                $response->getBody()->write(json_encode($out));
                return $response->withStatus(400);
              }else{
                if (password_verify($password, $item->contrasena)) {
                  $out = array('id'=> $item->id_usuario_cliente, 'nombres'=> $item->nombres,'apellidos'=> $item->apellidos, 'usuario'=> $item->usuario, 'cedula'=> $item->cedula, 'correo'=> $item->correo, 'sexo'=> $item->sexo, 'celular'=> $item->celular,
                  'fecha_nacimiento'=> $item->fecha_nacimiento, 'direccion'=> $item->direccion, 'estado'=> $item->estado, 'amigo_teatro'=> $item->amigo_teatro );
                  $response->getBody()->write(json_encode($out));
                  return $response;
                }else{
                  $out["codigo"] = "203";
                  $out["mensaje"] = $error_203_mensaje;
                  $out["causa"] =  $error_203_causa;;
                  $response->getBody()->write(json_encode($out));
                  return $response->withStatus(400);
                }
              }

          }else{
            $out["codigo"] = "202";
            $out["mensaje"] = $error_202_mensaje;
            $out["causa"] =  $error_202_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(400);
          }
        return $response;
    }

    public function loginGoogle($request, $response, $args){
        include("error.php");
        $response = $response->withHeader('Content-Type', 'application/json');
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
            $out["codigo"] = "100";
            $out["mensaje"] = $error_100_mensaje;
            $out["causa"] =  $error_100_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }

        if ($result && count($statement->fetchAll())==0){
            $out["codigo"] = "101";
            $out["mensaje"] = $error_101_mensaje;
            $out["causa"] = $error_101_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(401);
        }
        // FIN VALIDACION
        $json = $request->getBody();
        $body = json_decode($json, true);
        if (!(isset($body["email"]) && isset($body['uid']))){
            $out["codigo"] = "201";
            $out["mensaje"] = $error_201_mensaje;
            $out["causa"] =  $error_201_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(400);
        }
        $email = trim($body['email']);
        $uid = trim($body['uid']);

        $sql = "SELECT * FROM tsa_usuario_cliente WHERE correo= :email";

        $statement = $db->prepare($sql);
        $statement->bindValue(':email', $email, \PDO::PARAM_STR);
        $band=false;
        try {
            $result = $statement->execute();
            $item = $statement->fetch();
             if ($item){
               if ($item->estado=="B" | $item->estado=="I") {
                 $out["codigo"] = "222";
                 $out["mensaje"] = $error_222_mensaje;
                 $out["causa"] =  $error_222_causa;;
                 $response->getBody()->write(json_encode($out));
                 return $response->withStatus(400);
               }else{
                 if ($item->estado=="P" ) {
                   $sql = "UPDATE tsa_usuario_cliente SET estado='A' WHERE id_usuario_cliente=:id_usuario";
                   $statement1 = $db->prepare($sql);
                   $statement1->bindValue(':id_usuario',  $item->id_usuario_cliente, \PDO::PARAM_STR);
                   $result = $statement1->execute();
                 }
                 if ($item->uid == $uid) {
                     $out = array('id'=> $item->id_usuario_cliente, 'nombres'=> $item->nombres,'apellidos'=> $item->apellidos, 'usuario'=> $item->usuario, 'cedula'=> $item->cedula, 'correo'=> $item->correo, 'sexo'=> $item->sexo, 'celular'=> $item->celular,
                     'fecha_nacimiento'=> $item->fecha_nacimiento, 'direccion'=> $item->direccion, 'estado'=> $item->estado, 'amigo_teatro'=> $item->amigo_teatro );
                     $response->getBody()->write(json_encode($out));
                     return $response;
                 }else{
                     $sql = "UPDATE tsa_usuario_cliente SET uid=:uid WHERE id_usuario_cliente=:id_usuario";
                     $statement1 = $db->prepare($sql);
                     $statement1->bindValue(':id_usuario',  $item->id_usuario_cliente, \PDO::PARAM_STR);
                     $statement1->bindValue(':uid',  $uid, \PDO::PARAM_STR);
                     $result = $statement1->execute();
                     $out = array('id'=> $item->id_usuario_cliente, 'nombres'=> $item->nombres,'apellidos'=> $item->apellidos, 'usuario'=> $item->usuario, 'cedula'=> $item->cedula, 'correo'=> $item->correo, 'sexo'=> $item->sexo, 'celular'=> $item->celular,
                     'fecha_nacimiento'=> $item->fecha_nacimiento, 'direccion'=> $item->direccion, 'estado'=> $item->estado, 'amigo_teatro'=> $item->amigo_teatro );
                     $response->getBody()->write(json_encode($out));
                     return $response;
                 }
               }

             }else{
               $out["codigo"] = "202";
               $out["mensaje"] = $error_202_mensaje;
               $out["causa"] =  $error_202_causa;
               $response->getBody()->write(json_encode($out));
               return $response->withStatus(400);
             }
        } catch (\PDOException $th) {
            $result = false;
            $out["codigo"] = "102";
            $out["mensaje"] = $error_102_mensaje;
            $out["causa"] =  $error_102_causa;
            $out["error"] = $th->getMessage();
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }

        return $response;
    }

    public function reseteo_usuario($request, $response, $args){
        include("error.php");
        include ("conect.php");
        $response = $response->withHeader('Content-Type', 'application/json');
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
            $out["codigo"] = "100";
            $out["mensaje"] = $error_100_mensaje;
            $out["causa"] =  $error_100_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            $out["codigo"] = "101";
            $out["mensaje"] = $error_101_mensaje;
            $out["causa"] = $error_101_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(401);
        }
        // FIN VALIDACION
        $json = $request->getBody();
        $body = json_decode($json, true);
        if (!(isset($body["usuario"]))){
          $out["codigo"] = "201";
          $out["mensaje"] = $error_201_mensaje;
          $out["causa"] = $error_201_causa;
          $response->getBody()->write(json_encode($out));
          return $response->withStatus(400);
        }
        $usuario = trim($body['usuario']);
       date_default_timezone_set('America/Lima');
        try {
            if (strstr($usuario,'@') !== false){
                  $sql = "SELECT * FROM tsa_usuario_cliente WHERE correo= :usuario";
            }else{
                  $sql = "SELECT * FROM tsa_usuario_cliente WHERE usuario= :usuario";
            }
            $statement = $db->prepare($sql);
            $statement->bindValue(':usuario', $usuario, \PDO::PARAM_STR);
            $band=false;
            $result = $statement->execute();
            $item = $statement->fetch();
           if ($item==false) {
             $out["codigo"] = "202";
             $out["mensaje"] = $error_202_mensaje;
             $out["causa"] = $error_202_causa;
             $response->getBody()->write(json_encode($out));
             return $response->withStatus(400);
           }else{
               if ($item){
                 if ($item->estado=="B" | $item->estado=="I") {
                   $out["codigo"] = "222";
                   $out["mensaje"] = $error_222_mensaje;
                   $out["causa"] =  $error_222_causa;;
                   $response->getBody()->write(json_encode($out));
                   return $response->withStatus(400);
                 }else{
                   $six_digit_random_number = random_int(10000, 99999);
                   $client->sendMail1("1", $item->correo, "",($item->nombres).' '.($item->apellidos), $six_digit_random_number);
                   $sql = "UPDATE tsa_usuario_cliente SET codigo=:codigo, fecha_reseteo=now() WHERE id_usuario_cliente=:id_usuario";
                   $statement1 = $db->prepare($sql);
                   $statement1->bindValue(':id_usuario',  $item->id_usuario_cliente, \PDO::PARAM_STR);
                   $statement1->bindValue(':codigo',  $six_digit_random_number, \PDO::PARAM_STR);
                   $result = $statement1->execute();
                   $out["status"] = $status_reseteo;
                   $response->getBody()->write(json_encode($out));
                   return $response;
                 }

               }
           }
        } catch (\PDOException $th) {
            $result = false;
            $out["codigo"] = "102";
            $out["mensaje"] = $error_102_mensaje;
            $out["causa"] =  $error_102_causa;
            $out["error"] = $th->getMessage();
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }


        return $response;
    }

    public function eliminar_usuario($request, $response, $args){
        include("error.php");
        include ("conect.php");
        $response = $response->withHeader('Content-Type', 'application/json');
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
            $out["codigo"] = "100";
            $out["mensaje"] = $error_100_mensaje;
            $out["causa"] =  $error_100_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            $out["codigo"] = "101";
            $out["mensaje"] = $error_101_mensaje;
            $out["causa"] = $error_101_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(401);
        }
        // FIN VALIDACION
        $json = $request->getBody();
        $body = json_decode($json, true);
        if (!(isset($body["id_usuario"]))){
          $out["codigo"] = "201";
          $out["mensaje"] = $error_201_mensaje;
          $out["causa"] = $error_201_causa;
          $response->getBody()->write(json_encode($out));
          return $response->withStatus(400);
        }
        $usuario = trim($body['id_usuario']);
       date_default_timezone_set('America/Lima');
        try {
            if (strstr($usuario,'@') !== false){
                  $sql = "SELECT * FROM tsa_usuario_cliente WHERE id_usuario_cliente= :usuario";
            }else{
                  $sql = "SELECT * FROM tsa_usuario_cliente WHERE id_usuario_cliente= :usuario";
            }
            $statement = $db->prepare($sql);
            $statement->bindValue(':usuario', $usuario, \PDO::PARAM_STR);
            $band=false;
            $result = $statement->execute();
            $item = $statement->fetch();
           if ($item==false) {
             $out["codigo"] = "202";
             $out["mensaje"] = $error_202_mensaje;
             $out["causa"] = $error_202_causa;
             $response->getBody()->write(json_encode($out));
             return $response->withStatus(400);
           }else{
               if ($item){
                 if ($item->estado=="B" | $item->estado=="I") {
                   $out["codigo"] = "222";
                   $out["mensaje"] = $error_222_mensaje;
                   $out["causa"] =  $error_222_causa;;
                   $response->getBody()->write(json_encode($out));
                   return $response->withStatus(400);
                 }else{

                   $sql = "UPDATE tsa_usuario_cliente SET estado='B' WHERE id_usuario_cliente=:id_usuario";
                   $statement1 = $db->prepare($sql);
                   $statement1->bindValue(':id_usuario',  $item->id_usuario_cliente, \PDO::PARAM_STR);
                   $result = $statement1->execute();
                   $client->sendMail1("8", $item->correo, "",($item->nombres).' '.($item->apellidos), "");
                   $out["status"] = $status_eliminar;
                   $response->getBody()->write(json_encode($out));
                   return $response;
                 }

               }
           }
        } catch (\PDOException $th) {
            $result = false;
            $out["codigo"] = "102";
            $out["mensaje"] = $error_102_mensaje;
            $out["causa"] =  $error_102_causa;
            $out["error"] = $th->getMessage();
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }


        return $response;
    }

    public function validar_reseteo($request, $response, $args){
        include("error.php");
        $response = $response->withHeader('Content-Type', 'application/json');
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
            $out["codigo"] = "100";
            $out["mensaje"] = $error_100_mensaje;
            $out["causa"] =  $error_100_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            $out["codigo"] = "101";
            $out["mensaje"] = $error_101_mensaje;
            $out["causa"] = $error_101_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(401);
        }
        // FIN VALIDACION

        $json = $request->getBody();
        $body = json_decode($json, true);
        if (!(isset($body["usuario"]) and isset($body["codigo"]) and isset($body["contrasena"]))){
          $out["codigo"] = "201";
          $out["mensaje"] = $error_201_mensaje;
          $out["causa"] = $error_201_causa;
          $response->getBody()->write(json_encode($out));
          return $response->withStatus(400);
        }
        $usuario = trim($body['usuario']);
        $codigo = trim($body['codigo']);
        $contrasena = trim($body['contrasena']);
        try {
            if (strstr($usuario,'@') !== false){
                  $sql = "SELECT * FROM tsa_usuario_cliente WHERE correo= :usuario";
            }else{
                  $sql = "SELECT * FROM tsa_usuario_cliente WHERE usuario= :usuario";
            }
            $statement = $db->prepare($sql);
            $statement->bindValue(':usuario', $usuario, \PDO::PARAM_STR);
            $band=false;
            $result = $statement->execute();
            $item = $statement->fetch();
           if ($item==false) {
             $out["codigo"] = "202";
             $out["mensaje"] = $error_202_mensaje;
             $out["causa"] = $error_202_causa;
             $response->getBody()->write(json_encode($out));
             return $response->withStatus(400);
           }else{
               if ($item){
                 if ($item->estado=="B" | $item->estado=="I") {
                   $out["codigo"] = "222";
                   $out["mensaje"] = $error_222_mensaje;
                   $out["causa"] =  $error_222_causa;;
                   $response->getBody()->write(json_encode($out));
                   return $response->withStatus(400);
                 }else{
                   date_default_timezone_set('America/Lima');
                   $datetime = date("Y-m-d H:i:s");
                   if ($item->codigo == $codigo) {
                      $datetime1 = date_create($datetime);
                      $datetime2 = date_create($item->fecha_reseteo);
                      $diff = date_diff($datetime1, $datetime2);
                      $total = $diff->y * 365.25 + $diff->m * 30 + $diff->d * 24 + $diff->h*60 + $diff->i;
                       if ($total<10) {
                           $password=password_hash($contrasena, PASSWORD_DEFAULT);
                           $sql = "UPDATE tsa_usuario_cliente SET contrasena=:contrasena, usuario_modificacion=:usuario_modificacion, fecha_modificacion=now(), estado='A' WHERE id_usuario_cliente=:id_usuario";
                           $statement1 = $db->prepare($sql);
                           $statement1->bindValue(':contrasena',  $password, \PDO::PARAM_STR);
                           $statement1->bindValue(':usuario_modificacion',  $usuario, \PDO::PARAM_STR);
                           $statement1->bindValue(':id_usuario', $item->id_usuario_cliente, \PDO::PARAM_STR);
                           $result = $statement1->execute();
                           $out["status"] = $status_clave;
                           $response->getBody()->write(json_encode($out));
                           return $response;
                        }else{
                            $out["codigo"] = "205";
                            $out["mensaje"] = $error_205_mensaje;
                            $out["causa"] = $error_205_causa;
                           $response->getBody()->write(json_encode($out));
                           return $response->withStatus(400);
                        }
                   }else{
                       $out["codigo"] = "206";
                       $out["mensaje"] = $error_206_mensaje;
                       $out["causa"] = $error_206_causa;
                       $response->getBody()->write(json_encode($out));
                       return $response->withStatus(400);
                   }
                 }
               }
           }
           $response->getBody()->write(json_encode($out));
           return $response;
        } catch (\PDOException $th) {
            $result = false;
            $out["codigo"] = "102";
            $out["mensaje"] = $error_102_mensaje;
            $out["causa"] =  $error_102_causa;
            $out["error"] = $th->getMessage();
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }


        return $response;
    }

    public function registro($request, $response, $args){
        include("error.php");
        include ("conect.php");
        $response = $response->withHeader('Content-Type', 'application/json');
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
            $out["codigo"] = "100";
            $out["mensaje"] = $error_100_mensaje;
            $out["causa"] =  $error_100_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            $out["codigo"] = "101";
            $out["mensaje"] = $error_101_mensaje;
            $out["causa"] = $error_101_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(401);
        }
        // FIN VALIDACION
        $json = $request->getBody();
        $body = json_decode($json, true);
        if (!(isset($body["nombre"]) and isset($body["apellido"]) and isset($body["usuario"])and isset($body["cedula"]) and isset($body["correo"]) and isset($body["sexo"]) and isset($body["celular"])
        and isset($body["contrasena"]) and isset($body["fecha_nacimiento"]) and isset($body["direccion"]) and isset($body["amigo_teatro"]) and isset($body["uid"]))){
            $out["codigo"] = "201";
            $out["mensaje"] = $error_201_mensaje;
            $out["causa"] = $error_201_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(400);
        }
        //Realizo consulta de puertas a DB
        $nombre= trim($body["nombre"]);
        $apellido= trim($body["apellido"]);
        $usuario= trim($body["usuario"]);
        $cedula= trim($body["cedula"]);
        $correo= trim($body["correo"]);
        $sexo= trim($body["sexo"]);
        $celular= trim($body["celular"]);
        $contrasena= trim($body["contrasena"]);
        $fecha_nacimiento= trim($body["fecha_nacimiento"]);
        $direccion= trim($body["direccion"]);
        $amigo_teatro= trim($body["amigo_teatro"]);
        $uid= trim($body["uid"]);
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $codigo=substr(str_shuffle($permitted_chars), 0, 5);

        try {
            $sql = "SELECT usuario,cedula,correo FROM tsa_usuario_cliente WHERE  usuario=:usuario or cedula=:cedula or correo=:correo";
            $statement = $db->prepare($sql);
            $statement->bindValue(':usuario', $usuario, \PDO::PARAM_STR);
            $statement->bindValue(':cedula', $cedula, \PDO::PARAM_STR);
            $statement->bindValue(':correo', $correo, \PDO::PARAM_STR);
            $result = $statement->execute();
            $error="";
            while($item = $statement->fetch()){
              if ($item->cedula==$cedula) {
                if ($item->usuario==$usuario) {
                  if ($item->correo==$correo) {
                    $out["codigo"] = "204";
                    $out["mensaje"] = "El Correo, Usuario y Cédula ya se encuentran registrados";
                    $out["causa"] = $error_204_causa;
                    $response->getBody()->write(json_encode($out));
                    return $response->withStatus(400);
                  }else{
                    $out["codigo"] = "204";
                    $out["mensaje"] = "El Usuario y Cédula ya se encuentra registrado";
                    $out["causa"] = $error_204_causa;
                    $response->getBody()->write(json_encode($out));
                    return $response->withStatus(400);
                  }
                }else{
                  if ($item->correo==$correo) {
                    $out["codigo"] = "204";
                    $out["mensaje"] = "El Correo y Cédula ya se encuentra registrado";
                    $out["causa"] = $error_204_causa;
                    $response->getBody()->write(json_encode($out));
                    return $response->withStatus(400);
                  }else{
                    $out["codigo"] = "204";
                    $out["mensaje"] = "La Cédula ya se encuentra registrada";
                    $out["causa"] = $error_204_causa;
                    $response->getBody()->write(json_encode($out));
                    return $response->withStatus(400);
                  }
                }
              }else{
                if ($item->usuario==$usuario) {
                  if ($item->correo==$correo) {
                    $out["codigo"] = "204";
                    $out["mensaje"] = "El Correo y Usuario ya se encuentran registrados";
                    $out["causa"] = $error_204_causa;
                    $response->getBody()->write(json_encode($out));
                    return $response->withStatus(400);
                  }else{
                    $out["codigo"] = "204";
                    $out["mensaje"] = "El Usuario ya se encuentra registrado";
                    $out["causa"] = $error_204_causa;
                    $response->getBody()->write(json_encode($out));
                    return $response->withStatus(400);
                  }
                }else{
                  if ($item->correo==$correo) {
                    $out["codigo"] = "204";
                    $out["mensaje"] = "El Correo ya se encuentra registrado";
                    $out["causa"] = $error_204_causa;
                    $response->getBody()->write(json_encode($out));
                    return $response->withStatus(400);
                  }
                }
              }
            }
            $band=true;
            while($band){
              $sql = "SELECT codigo_identificador FROM tsa_usuario_cliente WHERE codigo_identificador=:codigo";
              $statement = $db->prepare($sql);
              $statement->bindValue(':codigo', $codigo, \PDO::PARAM_STR);
              $result = $statement->execute();
              $band=true;
              if($statement->fetch()){
                  $codigo=substr(str_shuffle($permitted_chars), 0, 5);
              }else{
                $band=false;
                break;
              }
            }
            $password=password_hash($contrasena, PASSWORD_DEFAULT);
            $sql = "INSERT INTO tsa_usuario_cliente (id_usuario_cliente,nombres,apellidos,uid, usuario,cedula,correo,sexo,celular,contrasena,fecha_nacimiento,direccion,amigo_teatro,usuario_creacion,codigo_identificador)
                   VALUES (NULL,:nombre,:apellido,:uid,:usuario,:cedula,:correo,:sexo,:celular,:contrasena,:fecha_nacimiento,:direccion,:amigo_teatro,:usuario, :codigo)";

            $statement = $db->prepare($sql);
            $statement->bindValue(':nombre', $nombre, \PDO::PARAM_STR);
            $statement->bindValue(':apellido', $apellido, \PDO::PARAM_STR);
            $statement->bindValue(':usuario', $usuario, \PDO::PARAM_STR);
            $statement->bindValue(':cedula', $cedula, \PDO::PARAM_STR);
            $statement->bindValue(':correo', $correo, \PDO::PARAM_STR);
            $statement->bindValue(':sexo', $sexo, \PDO::PARAM_STR);
            $statement->bindValue(':celular', $celular, \PDO::PARAM_STR);
            $statement->bindValue(':contrasena', $password, \PDO::PARAM_STR);
            $statement->bindValue(':fecha_nacimiento', $fecha_nacimiento, \PDO::PARAM_STR);
            $statement->bindValue(':direccion', $direccion, \PDO::PARAM_STR);
            $statement->bindValue(':amigo_teatro', $amigo_teatro, \PDO::PARAM_STR);
            $statement->bindValue(':uid', $uid, \PDO::PARAM_STR);
            $statement->bindValue(':codigo', $codigo, \PDO::PARAM_STR);
            $result = $statement->execute();
            $id_usuario=$db->lastInsertId();
            $client->sendMail1("2", $correo, "",($nombre).' '.($apellido), $id_usuario);
        } catch (\PDOException $th) {
            $result = false;
            $errocode = $th->getCode();

            if ($errocode=="23000") {
                $out["codigo"] = "204";
                $out["mensaje"] = $error_204_mensaje;
                $out["causa"] = $error_204_causa;
                $out["error"] = $th->getMessage();
                $response->getBody()->write(json_encode($out));
                return $response->withStatus(400);
            }else{
                $out["codigo"] = "102";
                $out["mensaje"] = $error_102_mensaje;
                $out["causa"] = $error_102_causa;
                $out["error"] = $th->getMessage();
                $response->getBody()->write(json_encode($out));
                return $response->withStatus(500);
            }
        }

        $out['status'] =$status_registro;
        $response->getBody()->write(json_encode($out));
        return $response;
    }

    public function validar_registro($request, $response, $args){
        include("error.php");
        $response = $response->withHeader('Content-Type', 'application/json');
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
            $out["codigo"] = "100";
            $out["mensaje"] = $error_100_mensaje;
            $out["causa"] =  $error_100_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            $out["codigo"] = "101";
            $out["mensaje"] = $error_101_mensaje;
            $out["causa"] = $error_101_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(401);
        }
        // FIN VALIDACION
        $json = $request->getBody();
        $body = json_decode($json, true);
        if (!(isset($body["usuario"]) and isset($body["correo"]))){
            $out["codigo"] = "201";
            $out["mensaje"] = $error_201_mensaje;
            $out["causa"] = $error_201_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(400);
        }
        //Realizo consulta de puertas a DB
        $usuario= trim($body["usuario"]);
        $correo= trim($body["correo"]);

        try {
            $sql = "SELECT usuario,correo FROM tsa_usuario_cliente WHERE  usuario=:usuario  or correo=:correo";
            $statement = $db->prepare($sql);
            $statement->bindValue(':usuario', $usuario, \PDO::PARAM_STR);
            $statement->bindValue(':correo', $correo, \PDO::PARAM_STR);
            $result = $statement->execute();
            $error="";
            $band=true;
            while($item = $statement->fetch()){
              $band=false;
              if ($item->usuario==$usuario) {
                if ($item->correo==$correo) {
                  $out["codigo"] = "204";
                  $out["mensaje"] = "El Correo y Usuario ya se encuentran registrados";
                  $out["causa"] = $error_204_causa;
                  $response->getBody()->write(json_encode($out));
                  return $response->withStatus(400);
                }else{
                  $out["codigo"] = "204";
                  $out["mensaje"] = "El Usuario ya se encuentra registrado";
                  $out["causa"] = $error_204_causa;
                  $response->getBody()->write(json_encode($out));
                  return $response->withStatus(400);
                }
              }else{
                if ($item->correo==$correo) {
                  $out["codigo"] = "204";
                  $out["mensaje"] = "El Correo ya se encuentra registrado";
                  $out["causa"] = $error_204_causa;
                  $response->getBody()->write(json_encode($out));
                  return $response->withStatus(400);
                }
              }

            }
            if ($band) {
              $out['status'] =$status_registro1;
              $response->getBody()->write(json_encode($out));
              return $response;
            }
        } catch (\PDOException $th) {
            $out["codigo"] = "102";
            $out["mensaje"] = $error_102_mensaje;
            $out["causa"] = $error_102_causa;
            $out["error"] = $th->getMessage();
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
    }

    public function updateUsuario($request, $response, $args){
        include("error.php");
        $response = $response->withHeader('Content-Type', 'application/json');
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
            $out["codigo"] = "100";
            $out["mensaje"] = $error_100_mensaje;
            $out["causa"] =  $error_100_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            $out["codigo"] = "101";
            $out["mensaje"] = $error_101_mensaje;
            $out["causa"] = $error_101_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(401);
        }
        // FIN VALIDACION
        $json = $request->getBody();
        $body = json_decode($json, true);
        if (!(isset($body["nombre"]) and isset($body["apellido"]) and isset($body["cedula"])  and isset($body["sexo"]) and isset($body["celular"])
        and isset($body["id_usuario"]) and isset($body["fecha_nacimiento"]) and isset($body["direccion"]) and isset($body["usuario"]) and isset($body["correo"]))){
            $out["codigo"] = "201";
            $out["mensaje"] = $error_201_mensaje;
            $out["causa"] = $error_201_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(400);
        }
        //Realizo consulta de puertas a DB
        $nombre= trim($body["nombre"]);
        $apellido= trim($body["apellido"]);
        $cedula= trim($body["cedula"]);
        $sexo= trim($body["sexo"]);
        $celular= trim($body["celular"]);
        $id_usuario= trim($body["id_usuario"]);
        $fecha_nacimiento= trim($body["fecha_nacimiento"]);
        $direccion= trim($body["direccion"]);
        $usuario= trim($body["usuario"]);
        $correo= trim($body["correo"]);
        try {
            $sql = "SELECT usuario,cedula,correo FROM tsa_usuario_cliente WHERE  id_usuario_cliente!=:id_usuario_cliente and (usuario=:usuario or cedula=:cedula or correo=:correo)";
            $statement = $db->prepare($sql);
            $statement->bindValue(':usuario', $usuario, \PDO::PARAM_STR);
            $statement->bindValue(':cedula', $cedula, \PDO::PARAM_STR);
            $statement->bindValue(':correo', $correo, \PDO::PARAM_STR);
            $statement->bindValue(':id_usuario_cliente', $id_usuario, \PDO::PARAM_STR);
            $result = $statement->execute();
            $error="";
            while($item = $statement->fetch()){
            if ($item->cedula==$cedula) {
              if ($item->usuario==$usuario) {
                if ($item->correo==$correo) {
                  $out["codigo"] = "204";
                  $out["mensaje"] = "El Correo, Usuario y Cédula ya se encuentran registrados";
                  $out["causa"] = $error_204_causa;
                  $response->getBody()->write(json_encode($out));
                  return $response->withStatus(400);
                }else{
                  $out["codigo"] = "204";
                  $out["mensaje"] = "El Usuario y Cédula ya se encuentra registrado";
                  $out["causa"] = $error_204_causa;
                  $response->getBody()->write(json_encode($out));
                  return $response->withStatus(400);
                }
              }else{
                if ($item->correo==$correo) {
                  $out["codigo"] = "204";
                  $out["mensaje"] = "El Correo y Cédula ya se encuentra registrado";
                  $out["causa"] = $error_204_causa;
                  $response->getBody()->write(json_encode($out));
                  return $response->withStatus(400);
                }
              }
            }else{
              if ($item->usuario==$usuario) {
                if ($item->correo==$correo) {
                  $out["codigo"] = "204";
                  $out["mensaje"] = "El Correo y Usuario ya se encuentran registrados";
                  $out["causa"] = $error_204_causa;
                  $response->getBody()->write(json_encode($out));
                  return $response->withStatus(400);
                }else{
                  $out["codigo"] = "204";
                  $out["mensaje"] = "El Usuario ya se encuentra registrado";
                  $out["causa"] = $error_204_causa;
                  $response->getBody()->write(json_encode($out));
                  return $response->withStatus(400);
                }
              }else{
                if ($item->correo==$correo) {
                  $out["codigo"] = "204";
                  $out["mensaje"] = "El Correo ya se encuentra registrado";
                  $out["causa"] = $error_204_causa;
                  $response->getBody()->write(json_encode($out));
                  return $response->withStatus(400);
                }
              }
            }
          }

            $sql = "UPDATE tsa_usuario_cliente set nombres=:nombre ,apellidos=:apellido, cedula=:cedula,sexo=:sexo,celular=:celular,correo=:correo, usuario=:usuario, fecha_nacimiento=:fecha_nacimiento,direccion=:direccion,usuario_modificacion=:usuario, fecha_modificacion=now() WHERE id_usuario_cliente=:id_usuario";
            $statement = $db->prepare($sql);
            $statement->bindValue(':nombre', $nombre, \PDO::PARAM_STR);
            $statement->bindValue(':apellido', $apellido, \PDO::PARAM_STR);
            $statement->bindValue(':cedula', $cedula, \PDO::PARAM_STR);
            $statement->bindValue(':sexo', $sexo, \PDO::PARAM_STR);
            $statement->bindValue(':celular', $celular, \PDO::PARAM_STR);
            $statement->bindValue(':id_usuario', $id_usuario, \PDO::PARAM_STR);
            $statement->bindValue(':fecha_nacimiento', $fecha_nacimiento, \PDO::PARAM_STR);
            $statement->bindValue(':direccion', $direccion, \PDO::PARAM_STR);
            $statement->bindValue(':usuario', $usuario, \PDO::PARAM_STR);
            $statement->bindValue(':correo', $correo, \PDO::PARAM_STR);
            $result = $statement->execute();

            $sql = "SELECT * FROM tsa_usuario_cliente WHERE id_usuario_cliente=:id_usuario";
            $statement = $db->prepare($sql);
            $statement->bindValue(':id_usuario', $id_usuario, \PDO::PARAM_STR);
            $result = $statement->execute();
            $item = $statement->fetch();
             if ($item){
                   $out = array('id'=> $item->id_usuario_cliente, 'nombres'=> $item->nombres,'apellidos'=> $item->apellidos, 'usuario'=> $item->usuario, 'cedula'=> $item->cedula, 'correo'=> $item->correo, 'sexo'=> $item->sexo, 'celular'=> $item->celular,
                   'fecha_nacimiento'=> $item->fecha_nacimiento, 'direccion'=> $item->direccion, 'estado'=> $item->estado, 'amigo_teatro'=> $item->amigo_teatro );
                   $response->getBody()->write(json_encode($out));
                   return $response;
             }else{
               $out["codigo"] = "202";
               $out["mensaje"] = $error_202_mensaje;
               $out["causa"] =  $error_202_causa;
               $response->getBody()->write(json_encode($out));
               return $response->withStatus(400);
             }
        } catch (\PDOException $th) {
            $result = false;
            $errocode = $th->getCode();
            if ($errocode=="23000") {
                $out["codigo"] = "204";
                $out["mensaje"] = $error_204_mensaje;
                $out["causa"] = $error_204_causa;
                $response->getBody()->write(json_encode($out));
                return $response->withStatus(400);
            }else{
                $out["codigo"] = "102";
                $out["mensaje"] = $error_102_mensaje;
                $out["causa"] = $error_102_causa;
                $out["error"] = $th->getMessage();
                $response->getBody()->write(json_encode($out));
                return $response->withStatus(500);
            }
        }
        return $response;
    }

    public function updateContrasena($request, $response, $args){
        include("error.php");
        $response = $response->withHeader('Content-Type', 'application/json');
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
            $out["codigo"] = "100";
            $out["mensaje"] = $error_100_mensaje;
            $out["causa"] =  $error_100_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            $out["codigo"] = "101";
            $out["mensaje"] = $error_101_mensaje;
            $out["causa"] = $error_101_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(401);
        }
        // FIN VALIDACION
        $json = $request->getBody();
        $body = json_decode($json, true);
        if (!(isset($body["id_usuario"]) && isset($body['contrasena']) && isset($body['nueva_contrasena']))){
            $out["codigo"] = "201";
            $out["mensaje"] = $error_201_mensaje;
            $out["causa"] =  $error_201_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(400);
        }
        $usuario = trim($body['id_usuario']);
        $password = trim($body['contrasena']);
        $new_password = trim($body['nueva_contrasena']);
        $sql = "SELECT * FROM tsa_usuario_cliente WHERE id_usuario_cliente= :usuario";
        $statement = $db->prepare($sql);
        $statement->bindValue(':usuario', $usuario, \PDO::PARAM_STR);
        $band=false;
        try {
            $result = $statement->execute();
            $item = $statement->fetch();
             if ($item==false) {
               $out["codigo"] = "202";
               $out["mensaje"] = $error_202_mensaje;
               $out["causa"] =  $error_202_causa;
               $response->getBody()->write(json_encode($out));
               return $response->withStatus(400);
             }else{
                 if ($item){
                     if (password_verify($password, $item->contrasena)) {
                       $new_password1=password_hash($new_password, PASSWORD_DEFAULT);
                       $sql = "UPDATE tsa_usuario_cliente set contrasena=:contrasena ,usuario_modificacion='usuario', fecha_modificacion=now() WHERE id_usuario_cliente=:id_usuario";
                       $statement = $db->prepare($sql);
                       $statement->bindValue(':contrasena',$new_password1, \PDO::PARAM_STR);
                       $statement->bindValue(':id_usuario', $usuario, \PDO::PARAM_STR);
                       $result = $statement->execute();
                       $out['status'] =$status_clave;
                       $response->getBody()->write(json_encode($out));
                       return $response;
                     }else{
                       $out["codigo"] = "203";
                       $out["mensaje"] = $error_203_mensaje;
                       $out["causa"] =  $error_203_causa;;
                       $response->getBody()->write(json_encode($out));
                       return $response->withStatus(400);
                     }
                 }
             }
        } catch (\PDOException $th) {
            $result = false;
            $out["codigo"] = "102";
            $out["mensaje"] = $error_102_mensaje;
            $out["causa"] =  $error_102_causa;
            $out["error"] = $th->getMessage();
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }

        return $response;
    }

    public function updateAmigo($request, $response, $args){
        include("error.php");
        $response = $response->withHeader('Content-Type', 'application/json');
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
            $out["codigo"] = "100";
            $out["mensaje"] = $error_100_mensaje;
            $out["causa"] =  $error_100_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            $out["codigo"] = "101";
            $out["mensaje"] = $error_101_mensaje;
            $out["causa"] = $error_101_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(401);
        }
        // FIN VALIDACION
        $json = $request->getBody();
        $body = json_decode($json, true);
        if (!(isset($body["id_usuario"]) && isset($body['amigo_teatro']))){
            $out["codigo"] = "201";
            $out["mensaje"] = $error_201_mensaje;
            $out["causa"] =  $error_201_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(400);
        }
        $usuario = trim($body['id_usuario']);
        $amigo_teatro = trim($body['amigo_teatro']);
        $sql = "SELECT * FROM tsa_usuario_cliente WHERE id_usuario_cliente= :usuario";
        $statement = $db->prepare($sql);
        $statement->bindValue(':usuario', $usuario, \PDO::PARAM_STR);
        $band=false;
        try {
            $result = $statement->execute();
            $item = $statement->fetch();
             if ($item==false) {
               $out["codigo"] = "202";
               $out["mensaje"] = $error_202_mensaje;
               $out["causa"] =  $error_202_causa;
               $response->getBody()->write(json_encode($out));
               return $response->withStatus(400);
             }else{
                 if ($item){
                   $sql = "UPDATE tsa_usuario_cliente set amigo_teatro=:amigo_teatro ,usuario_modificacion='usuario', fecha_modificacion=now() WHERE id_usuario_cliente=:id_usuario";
                   $statement = $db->prepare($sql);
                   $statement->bindValue(':amigo_teatro',$amigo_teatro, \PDO::PARAM_STR);
                   $statement->bindValue(':id_usuario', $usuario, \PDO::PARAM_STR);
                   $result = $statement->execute();
                   $out['status'] =$status_usuario;
                   $response->getBody()->write(json_encode($out));
                   return $response;
                 }
             }
        } catch (\PDOException $th) {
            $result = false;
            $out["codigo"] = "102";
            $out["mensaje"] = $error_102_mensaje;
            $out["causa"] =  $error_102_causa;
            $out["error"] = $th->getMessage();
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }

        return $response;
    }

    public function insertEsperaP($request, $response, $args){
        include("error.php");
        $response = $response->withHeader('Content-Type', 'application/json');
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
            $out["codigo"] = "100";
            $out["mensaje"] = $error_100_mensaje;
            $out["causa"] =  $error_100_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            $out["codigo"] = "101";
            $out["mensaje"] = $error_101_mensaje;
            $out["causa"] = $error_101_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(401);
        }
        // FIN VALIDACION
        $json = $request->getBody();
        $body = json_decode($json, true);
        if (!(isset($body["id_usuario"]) && isset($body['id_asiento']))){
            $out["codigo"] = "201";
            $out["mensaje"] = $error_201_mensaje;
            $out["causa"] =  $error_201_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(400);
        }
        try {
            $usuario = trim($body['id_usuario']);
            $asientosT = trim($body['id_asiento']);
            $asientos =explode(',',$asientosT);
            foreach($asientos as $llave => $valores) {
              $sql = "SELECT * FROM tsa_distribucion WHERE id_distribucion=:asiento and estado !='A'";
              $statement = $db->prepare($sql);
              $statement->bindValue(':asiento', $valores, \PDO::PARAM_STR);
              $result = $statement->execute();
              $item = $statement->fetch();
              if ($item){
                $out["codigo"] = "209";
                $out["mensaje"] = $error_209_mensaje;
                $out["causa"] =  $error_209_causa;
                $response->getBody()->write(json_encode($out));
                return $response->withStatus(400);
              }
            }
            foreach($asientos as $llave => $valores) {
              $sql = "INSERT INTO teatro_backup.tsa_bloqueo_asiento (id_usuario_cliente,id_distribucion) VALUES (:id_usuario,:asiento)";
              $statement = $db->prepare($sql);
              $statement->bindValue(':id_usuario', $usuario, \PDO::PARAM_STR);
              $statement->bindValue(':asiento', $valores, \PDO::PARAM_STR);
              $result = $statement->execute();
            }
        } catch (\PDOException $th) {
            $result = false;
            $out["codigo"] = "102";
            $out["mensaje"] = $error_102_mensaje;
            $out["causa"] =  $error_102_causa;
            $out["error"] = $th->getMessage();
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }

        $out['status'] =$status_asiento;
          $out['tiempo'] =600;
        $response->getBody()->write(json_encode($out));
        return $response;
    }

    public function updateEsperaP($request, $response, $args){
        include("error.php");
        $response = $response->withHeader('Content-Type', 'application/json');
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
            $out["codigo"] = "100";
            $out["mensaje"] = $error_100_mensaje;
            $out["causa"] =  $error_100_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            $out["codigo"] = "101";
            $out["mensaje"] = $error_101_mensaje;
            $out["causa"] = $error_101_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(401);
        }
        // FIN VALIDACION
        $json = $request->getBody();
        $body = json_decode($json, true);
        if (!(isset($body["id_usuario"]) && isset($body['id_asiento']))){
            $out["codigo"] = "201";
            $out["mensaje"] = $error_201_mensaje;
            $out["causa"] =  $error_201_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(400);
        }
        try {
            $usuario = trim($body['id_usuario']);
            $asientosT = trim($body['id_asiento']);
            $asientos =explode(',',$asientosT);
            foreach($asientos as $llave => $valores) {
              $sql = "SELECT * FROM tsa_bloqueo_asiento WHERE id_usuario_cliente=:id_usuario and id_distribucion=:asiento";
              $statement = $db->prepare($sql);
              $statement->bindValue(':id_usuario', $usuario, \PDO::PARAM_STR);
              $statement->bindValue(':asiento', $valores, \PDO::PARAM_STR);
              $result = $statement->execute();
              $item = $statement->fetch();
              if (!$item){
                $out["codigo"] = "212";
                $out["mensaje"] = $error_212_mensaje;
                $out["causa"] =  $error_212_causa;
                $response->getBody()->write(json_encode($out));
                return $response->withStatus(400);
              }
            }
            foreach($asientos as $llave => $valores) {
              $sql = "UPDATE teatro_backup.tsa_bloqueo_asiento set fecha_creacion =now() WHERE id_usuario_cliente=:id_usuario and id_distribucion=:asiento";
              $statement = $db->prepare($sql);
              $statement->bindValue(':id_usuario', $usuario, \PDO::PARAM_STR);
              $statement->bindValue(':asiento', $valores, \PDO::PARAM_STR);
              $result = $statement->execute();
            }
        } catch (\PDOException $th) {
            $result = false;
            $out["codigo"] = "102";
            $out["mensaje"] = $error_102_mensaje;
            $out["causa"] =  $error_102_causa;
            $out["error"] = $th->getMessage();
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }

        $out['status'] =$status_asiento;
          $out['tiempo'] =600;
        $response->getBody()->write(json_encode($out));
        return $response;
    }

    public function deleteEsperaP($request, $response, $args){
        include("error.php");
        $response = $response->withHeader('Content-Type', 'application/json');
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
            $out["codigo"] = "100";
            $out["mensaje"] = $error_100_mensaje;
            $out["causa"] =  $error_100_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            $out["codigo"] = "101";
            $out["mensaje"] = $error_101_mensaje;
            $out["causa"] = $error_101_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(401);
        }
        // FIN VALIDACION
        $json = $request->getBody();
        $body = json_decode($json, true);
        if (!(isset($body["id_usuario"]) && isset($body['id_asiento']))){
            $out["codigo"] = "201";
            $out["mensaje"] = $error_201_mensaje;
            $out["causa"] =  $error_201_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(400);
        }
        try {
            $usuario = trim($body['id_usuario']);
            $asientosT = trim($body['id_asiento']);
            $asientos =explode(',',$asientosT);
            foreach($asientos as $llave => $valores) {
              $sql = "DELETE FROM tsa_bloqueo_asiento WHERE id_usuario_cliente=:id_usuario and id_distribucion=:asiento";
              $statement = $db->prepare($sql);
              $statement->bindValue(':id_usuario', $usuario, \PDO::PARAM_STR);
              $statement->bindValue(':asiento', $valores, \PDO::PARAM_STR);
              $result = $statement->execute();
            }
        } catch (\PDOException $th) {
            $result = false;
            $out["codigo"] = "102";
            $out["mensaje"] = $error_102_mensaje;
            $out["causa"] =  $error_102_causa;
            $out["error"] = $th->getMessage();
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }

        $out['status'] =$status_Dasiento;
        $response->getBody()->write(json_encode($out));
        return $response;
    }

    public function insertEsperaS($request, $response, $args){
        include("error.php");
        $response = $response->withHeader('Content-Type', 'application/json');
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
            $out["codigo"] = "100";
            $out["mensaje"] = $error_100_mensaje;
            $out["causa"] =  $error_100_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            $out["codigo"] = "101";
            $out["mensaje"] = $error_101_mensaje;
            $out["causa"] = $error_101_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(401);
        }
        // FIN VALIDACION
        $json = $request->getBody();
        $body = json_decode($json, true);
        if (!(isset($body["id_usuario"]) && isset($body['id_funcion']) && isset($body['asientos']))){
            $out["codigo"] = "201";
            $out["mensaje"] = $error_201_mensaje;
            $out["causa"] =  $error_201_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(400);
        }
        try {
            $usuario = trim($body['id_usuario']);
            $id_funcion = trim($body['id_funcion']);
            $asientosT = trim($body['asientos']);
            $asientos =explode(',',$asientosT);
            $sql = "SELECT * FROM tsa_funcion WHERE id_funcion=:funcion";
            $statement = $db->prepare($sql);
            $statement->bindValue(':funcion', $id_funcion, \PDO::PARAM_STR);
            $result = $statement->execute();
            while($item = $statement->fetch()){
                $band=false;
                $aforo=$item->aforo;
                $cantidad_vendida=$item->cantidad_vendida;
                $cantidad_bloqueado=$item->cantidad_bloqueado;
                $cantidad_cortesia=$item->cantidad_cortesia;
                $cantidad_espera=$item->cantidad_espera;
                $total=$aforo-$cantidad_vendida-$cantidad_bloqueado-$cantidad_cortesia-$cantidad_espera;
                foreach($asientos as $llave => $valores) {
                  $items =explode(':',$valores);
                  $id_platea=$items[0];
                  $cantidad=$items[1];
                  if (!$total>=$cantidad) {
                    $out["codigo"] = "211";
                    $out["mensaje"] = $error_211_mensaje;
                    $out["causa"] =  $error_211_causa;
                    $response->getBody()->write(json_encode($out));
                    return $response->withStatus(400);
                  }
              }
            }

            foreach($asientos as $llave => $valores) {
              $items =explode(':',$valores);
              $id_platea=$items[0];
              $cantidad=$items[1];
              $sql = "SELECT tp.aforo ,tpf.* FROM tsa_platea tp INNER JOIN tsa_platea_funcion tpf ON tp.id_platea = tpf.id_platea and id_funcion=:funcion and tpf.id_platea =:platea";
              $statement = $db->prepare($sql);
              $statement->bindValue(':platea', $id_platea, \PDO::PARAM_STR);
              $statement->bindValue(':funcion', $id_funcion, \PDO::PARAM_STR);
              $result = $statement->execute();
              $id_platea_funcion="";

              while($item = $statement->fetch()){
                  $band=false;
                  $id_platea_funcion = $item->id_platea_funcion;
                  $aforo=$item->aforo;
                  $cantidad_vendida=$item->vendido;
                  $cantidad_bloqueado=$item->cantidad_bloqueado;
                  $cantidad_cortesia=$item->cantidad_cortesia;
                  $cantidad_espera=$item->cantidad_espera;
                  $total=$aforo-$cantidad_vendida-$cantidad_bloqueado-$cantidad_cortesia-$cantidad_espera;
                  if ($total <$cantidad) {
                    $out["codigo"] = "210";
                    $out["mensaje"] = $error_210_mensaje;
                    $out["causa"] =  $error_210_causa;
                    $response->getBody()->write(json_encode($out));
                    return $response->withStatus(400);
                  }
              }

              $sql = "INSERT INTO teatro_backup.tsa_bloqueo_cantidad (id_usuario_cliente,id_platea_funcion,cantidad) VALUES (:id_usuario,:id_platea_funcion, :cantidad)";
              $statement = $db->prepare($sql);
              $statement->bindValue(':id_usuario', $usuario, \PDO::PARAM_STR);
              $statement->bindValue(':id_platea_funcion', $id_platea_funcion, \PDO::PARAM_STR);
              $statement->bindValue(':cantidad',   $cantidad, \PDO::PARAM_STR);

              $result = $statement->execute();
            }

        } catch (\PDOException $th) {
            $result = false;
            $out["codigo"] = "102";
            $out["mensaje"] = $error_102_mensaje;
            $out["causa"] =  $error_102_causa;
            $out["error"] = $th->getMessage();
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }

        $out['status'] =$status_asiento;
        $out['tiempo'] =600;
        $response->getBody()->write(json_encode($out));
        return $response;
    }

    public function updateEsperaS($request, $response, $args){
        include("error.php");
        $response = $response->withHeader('Content-Type', 'application/json');
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
            $out["codigo"] = "100";
            $out["mensaje"] = $error_100_mensaje;
            $out["causa"] =  $error_100_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            $out["codigo"] = "101";
            $out["mensaje"] = $error_101_mensaje;
            $out["causa"] = $error_101_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(401);
        }
        // FIN VALIDACION
        $json = $request->getBody();
        $body = json_decode($json, true);
        if (!(isset($body["id_usuario"]) && isset($body['id_funcion']) && isset($body['asientos']))){
            $out["codigo"] = "201";
            $out["mensaje"] = $error_201_mensaje;
            $out["causa"] =  $error_201_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(400);
        }
        try {
            $usuario = trim($body['id_usuario']);
            $id_funcion = trim($body['id_funcion']);
            $asientosT = trim($body['asientos']);
            $asientos =explode(',',$asientosT);
            foreach($asientos as $llave => $valores) {
              $items =explode(':',$valores);
              $id_platea=$items[0];
              $cantidad=$items[1];
              $sql = "SELECT tp.aforo ,tpf.* FROM tsa_platea tp  INNER JOIN tsa_platea_funcion tpf ON tp.id_platea = tpf.id_platea INNER JOIN tsa_bloqueo_cantidad bc ON bc.id_platea_funcion = tpf.id_platea_funcion and id_funcion=:funcion and tpf.id_platea =:platea";
              $statement = $db->prepare($sql);
              $statement->bindValue(':platea', $id_platea, \PDO::PARAM_STR);
              $statement->bindValue(':funcion', $id_funcion, \PDO::PARAM_STR);
              $result = $statement->execute();
              $item = $statement->fetch();
              if (!$item){
                $out["codigo"] = "212";
                $out["mensaje"] = $error_212_mensaje;
                $out["causa"] =  $error_212_causa;
                $response->getBody()->write(json_encode($out));
                return $response->withStatus(400);
              }else{
                $id_platea_funcion=  $item->id_platea_funcion;
              }
              $sql = "UPDATE teatro_backup.tsa_bloqueo_cantidad set fecha_creacion =now() WHERE id_usuario_cliente=:id_usuario and id_platea_funcion=:id_platea_funcion and cantidad=:cantidad";
              $statement = $db->prepare($sql);
              $statement->bindValue(':id_usuario', $usuario, \PDO::PARAM_STR);
              $statement->bindValue(':id_platea_funcion', $id_platea_funcion, \PDO::PARAM_STR);
              $statement->bindValue(':cantidad',   $cantidad, \PDO::PARAM_STR);
              $result = $statement->execute();
            }
        } catch (\PDOException $th) {
            $result = false;
            $out["codigo"] = "102";
            $out["mensaje"] = $error_102_mensaje;
            $out["causa"] =  $error_102_causa;
            $out["error"] = $th->getMessage();
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }

        $out['status'] =$status_asiento;
        $out['tiempo'] =600;
        $response->getBody()->write(json_encode($out));
        return $response;
    }

    public function deleteEsperaS($request, $response, $args){
        include("error.php");
        $response = $response->withHeader('Content-Type', 'application/json');
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
            $out["codigo"] = "100";
            $out["mensaje"] = $error_100_mensaje;
            $out["causa"] =  $error_100_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            $out["codigo"] = "101";
            $out["mensaje"] = $error_101_mensaje;
            $out["causa"] = $error_101_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(401);
        }
        // FIN VALIDACION
        $json = $request->getBody();
        $body = json_decode($json, true);
        if (!(isset($body["id_usuario"]) && isset($body['id_funcion']) && isset($body['asientos']) )){
            $out["codigo"] = "201";
            $out["mensaje"] = $error_201_mensaje;
            $out["causa"] =  $error_201_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(400);
        }
        try {
            $usuario = trim($body['id_usuario']);
            $id_funcion = trim($body['id_funcion']);
            $asientosT = trim($body['asientos']);
            $asientos =explode(',',$asientosT);
            foreach($asientos as $llave => $valores) {
              $items =explode(':',$valores);
              $id_platea=$items[0];
              $cantidad=$items[1];
              $sql = "SELECT tp.aforo ,tpf.* FROM tsa_platea tp  INNER JOIN tsa_platea_funcion tpf ON tp.id_platea = tpf.id_platea INNER JOIN tsa_bloqueo_cantidad bc ON bc.id_platea_funcion = tpf.id_platea_funcion and id_funcion=:funcion and tpf.id_platea =:platea";
              $statement = $db->prepare($sql);
              $statement->bindValue(':platea', $id_platea, \PDO::PARAM_STR);
              $statement->bindValue(':funcion', $id_funcion, \PDO::PARAM_STR);
              $result = $statement->execute();
              $item = $statement->fetch();
              if (!$item){
                $out["codigo"] = "212";
                $out["mensaje"] = $error_212_mensaje;
                $out["causa"] =  $error_212_causa;
                $response->getBody()->write(json_encode($out));
                return $response->withStatus(400);
              }else{
                $id_platea_funcion=  $item->id_platea_funcion;
              }
              $sql = "DELETE FROM teatro_backup.tsa_bloqueo_cantidad WHERE id_usuario_cliente=:id_usuario and id_platea_funcion=:id_platea_funcion and cantidad=:cantidad";
              $statement = $db->prepare($sql);
              $statement->bindValue(':id_usuario', $usuario, \PDO::PARAM_STR);
              $statement->bindValue(':id_platea_funcion', $id_platea_funcion, \PDO::PARAM_STR);
              $statement->bindValue(':cantidad',   $cantidad, \PDO::PARAM_STR);
              $result = $statement->execute();
            }
        } catch (\PDOException $th) {
            $result = false;
            $out["codigo"] = "102";
            $out["mensaje"] = $error_102_mensaje;
            $out["causa"] =  $error_102_causa;
            $out["error"] = $th->getMessage();
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }

        $out['status'] =$status_Dasiento;
        $response->getBody()->write(json_encode($out));
        return $response;
    }

    public function getCategorias($request, $response, $args){
        include("error.php");
        $response = $response->withHeader('Content-Type', 'application/json');
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
            $out["codigo"] = "100";
            $out["mensaje"] = $error_100_mensaje;
            $out["causa"] =  $error_100_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            $out["codigo"] = "101";
            $out["mensaje"] = $error_101_mensaje;
            $out["causa"] = $error_101_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(401);
        }

        $sql = "SELECT * FROM tsa_categoria WHERE estado='A' ORDER BY  CAST(  descripcion AS DECIMAL) ASC";
        //$sql = "SELECT * FROM categorias where  id_tienda =:tienda";
        $statement = $db->prepare($sql);
        try {
            $result = $statement->execute();
        } catch (\PDOException $th) {
            $result = false;
            $out["codigo"] = "102";
            $out["mensaje"] = $error_102_mensaje;
            $out["causa"] = $error_102_causa;
            $out["error"] = $th->getMessage();
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        $band=true;
        while($item = $statement->fetch()){
          $band=false;
          $categorias[$item->descripcion]=  array('id'=> $item->id_categoria, 'nombre'=> $item->nombre);
        }
        ksort($categorias);
        foreach($categorias as $descripcion=>$categoria) {
             $out[] = $categoria;
        }
       if ($band) {
         $out["codigo"] = "207";
         $out["mensaje"] = $error_207_mensaje;
         $out["causa"] = $error_207_causa;
         $response->getBody()->write(json_encode($out));
         return $response->withStatus(400);
       }else{
           $response->getBody()->write(json_encode($out));
           return $response;
       }
        return $response;
    }

    public function getALLFacturacion($request, $response, $args){
        include("error.php");
        $response = $response->withHeader('Content-Type', 'application/json');
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
            $out["codigo"] = "100";
            $out["mensaje"] = $error_100_mensaje;
            $out["causa"] =  $error_100_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            $out["codigo"] = "101";
            $out["mensaje"] = $error_101_mensaje;
            $out["causa"] = $error_101_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(401);
        }
        // FIN VALIDACION
        $json = $request->getBody();
        $body = json_decode($json, true);
        if (!(isset($body["id_usuario"]))){
            $out["codigo"] = "201";
            $out["mensaje"] = $error_201_mensaje;
            $out["causa"] =  $error_201_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(400);
        }
        $usuario = trim($body['id_usuario']);
        $sql = "SELECT * FROM tsa_facturacion WHERE id_usuario_cliente=:id_usuario and estado='A'";
        //$sql = "SELECT * FROM categorias where  id_tienda =:tienda";
        $statement = $db->prepare($sql);
        $statement->bindValue(':id_usuario', $usuario, \PDO::PARAM_STR);
        try {
            $result = $statement->execute();
        } catch (\PDOException $th) {
            $result = false;
            $out["codigo"] = "102";
            $out["mensaje"] = $error_102_mensaje;
            $out["causa"] = $error_102_causa;
            $out["error"] = $th->getMessage();
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        $band=true;
         $facturacion = [] ;
         $facturacion []=  array('id_facturacion'=> 1, 'nombres'=> "CONSUMIDOR", 'apellidos'=> "FINAL", 'cedula'=> "9999999999", 'razon_social'=> "", 'ruc'=> "9999999999", 'tipo'=> "C",'direccion'=> "",'correo'=> "");
        while($item = $statement->fetch()){
          $band=false;
          $facturacion []=  array('id_facturacion'=> $item->id_facturacion, 'nombres'=> $item->nombres, 'apellidos'=> $item->apellidos, 'cedula'=> $item->cedula, 'razon_social'=> $item->razon_social, 'ruc'=> $item->ruc, 'tipo'=> $item->tipo,'direccion'=> $item->direccion,'correo'=> $item->correo);
        }
        $response->getBody()->write(json_encode($facturacion));
        return $response;
    }

    public function getFacturacion($request, $response, $args){
        include("error.php");
        $response = $response->withHeader('Content-Type', 'application/json');
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
            $out["codigo"] = "100";
            $out["mensaje"] = $error_100_mensaje;
            $out["causa"] =  $error_100_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            $out["codigo"] = "101";
            $out["mensaje"] = $error_101_mensaje;
            $out["causa"] = $error_101_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(401);
        }
        // FIN VALIDACION
        $json = $request->getBody();
        $body = json_decode($json, true);
        if (!(isset($body["id_facturacion"]))){
            $out["codigo"] = "201";
            $out["mensaje"] = $error_201_mensaje;
            $out["causa"] =  $error_201_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(400);
        }
        $usuario = trim($body['id_facturacion']);
        $sql = "SELECT * FROM tsa_facturacion WHERE id_facturacion=:id_facturacion";
        //$sql = "SELECT * FROM categorias where  id_tienda =:tienda";
        $statement = $db->prepare($sql);
        $statement->bindValue(':id_facturacion', $usuario, \PDO::PARAM_STR);
        try {
            $result = $statement->execute();
        } catch (\PDOException $th) {
            $result = false;
            $out["codigo"] = "102";
            $out["mensaje"] = $error_102_mensaje;
            $out["causa"] = $error_102_causa;
            $out["error"] = $th->getMessage();
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        $band=true;
         $facturacion = [] ;
        while($item = $statement->fetch()){
          $band=false;
          $facturacion=  array('id_facturacion'=> $item->id_facturacion, 'nombres'=> $item->nombres, 'apellidos'=> $item->apellidos, 'cedula'=> $item->cedula, 'razon_social'=> $item->razon_social, 'ruc'=> $item->ruc, 'tipo'=> $item->tipo,'direccion'=> $item->direccion,'correo'=> $item->correo);
        }
        $response->getBody()->write(json_encode($facturacion));
        return $response;
    }

    public function updateFacturacion($request, $response, $args){
        include("error.php");
        $response = $response->withHeader('Content-Type', 'application/json');
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
            $out["codigo"] = "100";
            $out["mensaje"] = $error_100_mensaje;
            $out["causa"] =  $error_100_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            $out["codigo"] = "101";
            $out["mensaje"] = $error_101_mensaje;
            $out["causa"] = $error_101_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(401);
        }
        // FIN VALIDACION
        $json = $request->getBody();
        $body = json_decode($json, true);
        if (!(isset($body["nombres"])  && isset($body["id_facturacion"])  && isset($body["apellidos"]) && isset($body["cedula"]) && isset($body["razon_social"]) && isset($body["ruc"]) && isset($body["direccion"]) && isset($body["correo"]) && isset($body["tipo"]))){
            $out["codigo"] = "201";
            $out["mensaje"] = $error_201_mensaje;
            $out["causa"] =  $error_201_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(400);
        }
        $nombres = trim($body['nombres']);
        $id_facturacion = trim($body['id_facturacion']);
        $apellidos = trim($body['apellidos']);
        $cedula = trim($body['cedula']);
        $razon_social = trim($body['razon_social']);
        $direccion = trim($body['direccion']);
        $correo = trim($body['correo']);
        $ruc = trim($body['ruc']);
        $tipo = trim($body['tipo']);
        try {
            $sql = "UPDATE teatro_backup.tsa_facturacion SET nombres=:nombres, apellidos=:apellidos, razon_social=:razon_social, cedula=:cedula, ruc=:ruc, tipo=:tipo, correo=:correo, direccion=:direccion WHERE id_facturacion=:id_facturacion";
            $statement = $db->prepare($sql);
            $statement->bindValue(':nombres', $nombres, \PDO::PARAM_STR);
            $statement->bindValue(':id_facturacion', $id_facturacion, \PDO::PARAM_STR);
            $statement->bindValue(':apellidos', $apellidos, \PDO::PARAM_STR);
            $statement->bindValue(':cedula', $cedula, \PDO::PARAM_STR);
            $statement->bindValue(':razon_social', $razon_social, \PDO::PARAM_STR);
            $statement->bindValue(':ruc', $ruc, \PDO::PARAM_STR);
            $statement->bindValue(':tipo', $tipo, \PDO::PARAM_STR);
            $statement->bindValue(':correo', $correo, \PDO::PARAM_STR);
            $statement->bindValue(':direccion', $direccion, \PDO::PARAM_STR);
            $result = $statement->execute();
        } catch (\PDOException $th) {
            $result = false;
            $out["codigo"] = "102";
            $out["mensaje"] = $error_102_mensaje;
            $out["causa"] = $error_102_causa;
            $out["error"] = $th->getMessage();
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        $out['status'] =$status_Ufacturacion;
        $response->getBody()->write(json_encode($out));
        return $response;
    }

    public function deleteFacturacion($request, $response, $args){
        include("error.php");
        $response = $response->withHeader('Content-Type', 'application/json');
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
            $out["codigo"] = "100";
            $out["mensaje"] = $error_100_mensaje;
            $out["causa"] =  $error_100_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            $out["codigo"] = "101";
            $out["mensaje"] = $error_101_mensaje;
            $out["causa"] = $error_101_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(401);
        }
        // FIN VALIDACION
        $json = $request->getBody();
        $body = json_decode($json, true);
        if (!(isset($body["id_facturacion"]))){
            $out["codigo"] = "201";
            $out["mensaje"] = $error_201_mensaje;
            $out["causa"] =  $error_201_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(400);
        }
        $facturacion = trim($body['id_facturacion']);
        $sql = "DELETE FROM tsa_facturacion WHERE id_facturacion=:id_facturacion";
        //$sql = "SELECT * FROM categorias where  id_tienda =:tienda";
        $statement = $db->prepare($sql);
        $statement->bindValue(':id_facturacion', $facturacion, \PDO::PARAM_STR);
        try {
            $result = $statement->execute();
        } catch (\PDOException $th) {
            $result = false;
            $errocode = $th->getCode();
            if ($errocode=="23000") {
              $sql = "UPDATE tsa_facturacion SET estado='B' WHERE id_facturacion=:id_facturacion";
              //$sql = "SELECT * FROM categorias where  id_tienda =:tienda";
              $statement = $db->prepare($sql);
              $statement->bindValue(':id_facturacion', $facturacion, \PDO::PARAM_STR);
              try {
                  $result = $statement->execute();
              } catch (\PDOException $th) {
                $out["codigo"] = "102";
                $out["mensaje"] = $error_102_mensaje;
                $out["causa"] = $error_102_causa;
                $out["error"] = $th->getMessage();
                $response->getBody()->write(json_encode($out));
                return $response->withStatus(500);
              }
            }else{
                $out["codigo"] = "102";
                $out["mensaje"] = $error_102_mensaje;
                $out["causa"] = $error_102_causa;
                $out["error"] = $th->getMessage();
                $response->getBody()->write(json_encode($out));
                return $response->withStatus(500);
            }
        }
        $out['status'] =$status_delete;
        $response->getBody()->write(json_encode($out));
        return $response;
    }

    public function insertFacturacion($request, $response, $args){
        include("error.php");
        $response = $response->withHeader('Content-Type', 'application/json');
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
            $out["codigo"] = "100";
            $out["mensaje"] = $error_100_mensaje;
            $out["causa"] =  $error_100_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            $out["codigo"] = "101";
            $out["mensaje"] = $error_101_mensaje;
            $out["causa"] = $error_101_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(401);
        }
        // FIN VALIDACION
        $json = $request->getBody();
        $body = json_decode($json, true);
        if (!(isset($body["nombres"])  && isset($body["id_usuario"])  && isset($body["apellidos"]) && isset($body["cedula"]) && isset($body["razon_social"]) && isset($body["direccion"]) && isset($body["correo"]) && isset($body["ruc"]) && isset($body["tipo"]))){
            $out["codigo"] = "201";
            $out["mensaje"] = $error_201_mensaje;
            $out["causa"] =  $error_201_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(400);
        }
        $nombres = trim($body['nombres']);
        $id_usuario = trim($body['id_usuario']);
        $apellidos = trim($body['apellidos']);
        $cedula = trim($body['cedula']);
        $razon_social = trim($body['razon_social']);
        $direccion = trim($body['direccion']);
        $correo = trim($body['correo']);
        $ruc = trim($body['ruc']);
        $tipo = trim($body['tipo']);
        $sql = "INSERT INTO teatro_backup.tsa_facturacion (id_usuario_cliente,nombres,apellidos,cedula,razon_social,ruc,tipo,direccion,correo,usuario_creacion)
	       VALUES (:id_usuario,:nombres,:apellidos,:cedula,:razon_social,:ruc,:tipo,:direccion,:correo,'usuario')";
        //$sql = "SELECT * FROM categorias where  id_tienda =:tienda";
        $statement = $db->prepare($sql);
        $statement->bindValue(':nombres', $nombres, \PDO::PARAM_STR);
        $statement->bindValue(':id_usuario', $id_usuario, \PDO::PARAM_STR);
        $statement->bindValue(':apellidos', $apellidos, \PDO::PARAM_STR);
        $statement->bindValue(':cedula', $cedula, \PDO::PARAM_STR);
        $statement->bindValue(':razon_social', $razon_social, \PDO::PARAM_STR);
        $statement->bindValue(':ruc', $ruc, \PDO::PARAM_STR);
        $statement->bindValue(':tipo', $tipo, \PDO::PARAM_STR);
        $statement->bindValue(':correo', $correo, \PDO::PARAM_STR);
        $statement->bindValue(':direccion', $direccion, \PDO::PARAM_STR);
        try {
            $result = $statement->execute();
        } catch (\PDOException $th) {
            $result = false;
            $out["codigo"] = "102";
            $out["mensaje"] = $error_102_mensaje;
            $out["causa"] = $error_102_causa;
            $out["error"] = $th->getMessage();
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        $out['status'] =$status_facturacion;
        $response->getBody()->write(json_encode($out));
        return $response;
    }

    public function setFacturacion_favorita($request, $response, $args){
        include("error.php");
        $response = $response->withHeader('Content-Type', 'application/json');
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
            $out["codigo"] = "100";
            $out["mensaje"] = $error_100_mensaje;
            $out["causa"] =  $error_100_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            $out["codigo"] = "101";
            $out["mensaje"] = $error_101_mensaje;
            $out["causa"] = $error_101_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(401);
        }
        // FIN VALIDACION
        $json = $request->getBody();
        $body = json_decode($json, true);
        if (!(isset($body["id_usuario"]) && isset($body["id_facturacion"]))){
            $out["codigo"] = "201";
            $out["mensaje"] = $error_201_mensaje;
            $out["causa"] =  $error_201_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(400);
        }
        $id_usuario = trim($body['id_usuario']);
        $id_facturacion = trim($body['id_facturacion']);
        $sql = "SELECT * FROM tsa_facturacion_favorita WHERE id_usuario_cliente=:id_usuario";
        $statement = $db->prepare($sql);
        $statement->bindValue(':id_usuario', $id_usuario, \PDO::PARAM_STR);
        try {
            $result = $statement->execute();
            $band=true;
            while($item = $statement->fetch()){
                $band=false;
                $sql = " UPDATE teatro_backup.tsa_facturacion_favorita SET id_facturacion=:id_facturacion WHERE id_facturacion_favorita=$item->id_facturacion_favorita";
                $statement1 = $db->prepare($sql);
                $statement1->bindValue(':id_facturacion', $id_facturacion, \PDO::PARAM_STR);
                $result = $statement1->execute();
                $out['status'] =$status_UfacturacionF;
                $response->getBody()->write(json_encode($out));
                return $response;
            }
            if($band){
                $sql = "INSERT INTO teatro_backup.tsa_facturacion_favorita (id_usuario_cliente,id_facturacion,usuario_creacion) VALUES (:id_usuario,:id_facturacion,'usuario')";
                $statement = $db->prepare($sql);
                $statement->bindValue(':id_facturacion', $id_facturacion, \PDO::PARAM_STR);
                $statement->bindValue(':id_usuario', $id_usuario, \PDO::PARAM_STR);
                $result = $statement->execute();
                $out['status'] =$status_CfacturacionF;
                $response->getBody()->write(json_encode($out));
                return $response;
            }
        } catch (\PDOException $th) {
            $result = false;
            $out["codigo"] = "102";
            $out["mensaje"] = $error_102_mensaje;
            $out["causa"] = $error_102_causa;
            $out["error"] = $th->getMessage();
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }

    }

    public function getFacturacion_favorita($request, $response, $args){
        include("error.php");
        $response = $response->withHeader('Content-Type', 'application/json');
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
            $out["codigo"] = "100";
            $out["mensaje"] = $error_100_mensaje;
            $out["causa"] =  $error_100_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            $out["codigo"] = "101";
            $out["mensaje"] = $error_101_mensaje;
            $out["causa"] = $error_101_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(401);
        }
        // FIN VALIDACION
        $json = $request->getBody();
        $body = json_decode($json, true);
        if (!(isset($body["id_usuario"]))){
            $out["codigo"] = "201";
            $out["mensaje"] = $error_201_mensaje;
            $out["causa"] =  $error_201_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(400);
        }
        $id_usuario = trim($body['id_usuario']);
        $sql = "SELECT tf.* FROM tsa_facturacion_favorita tff INNER JOIN tsa_facturacion tf ON tf.id_facturacion =tff.id_facturacion AND tf.estado='A' AND  tff.id_usuario_cliente=:id_usuario";
        $statement = $db->prepare($sql);
        $statement->bindValue(':id_usuario', $id_usuario, \PDO::PARAM_STR);
        try {
            $result = $statement->execute();
            $band=true;
            $facturacion = [] ;
            while($item = $statement->fetch()){
                $band=false;
                $facturacion []=  array('id_facturacion'=> $item->id_facturacion, 'nombres'=> $item->nombres, 'apellidos'=> $item->apellidos, 'cedula'=> $item->cedula, 'razon_social'=> $item->razon_social, 'ruc'=> $item->ruc, 'tipo'=> $item->tipo,'direccion'=> $item->direccion,'correo'=> $item->correo);
            }
            $response->getBody()->write(json_encode($facturacion));
            return $response;
        } catch (\PDOException $th) {
            $result = false;
            $out["codigo"] = "102";
            $out["mensaje"] = $error_102_mensaje;
            $out["causa"] = $error_102_causa;
            $out["error"] = $th->getMessage();
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
    }

    public function setTarjeta_favorita($request, $response, $args){
        include("error.php");
        $response = $response->withHeader('Content-Type', 'application/json');
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
            $out["codigo"] = "100";
            $out["mensaje"] = $error_100_mensaje;
            $out["causa"] =  $error_100_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            $out["codigo"] = "101";
            $out["mensaje"] = $error_101_mensaje;
            $out["causa"] = $error_101_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(401);
        }
        // FIN VALIDACION
        $json = $request->getBody();
        $body = json_decode($json, true);
        if (!(isset($body["id_usuario"]) && isset($body["bin"]) && isset($body["status"])  && isset($body["token"])  && isset($body["holder_name"])  && isset($body["expiry_year"])
        && isset($body["expiry_month"]) && isset($body["transaction_reference"]) && isset($body["type"]) && isset($body["number"]) )){
            $out["codigo"] = "201";
            $out["mensaje"] = $error_201_mensaje;
            $out["causa"] =  $error_201_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(400);
        }
        $id_usuario = trim($body['id_usuario']);
        $bin = trim($body['bin']);
        $status= trim($body['status']);
        $token= trim($body['token']);
        $holder_name= trim($body['holder_name']);
        $expiry_year= trim($body['expiry_year']);
        $expiry_month= trim($body['expiry_month']);
        $transaction_reference= trim($body['transaction_reference']);
        $type= trim($body['type']);
        $number= trim($body['number']);

        $sql = "SELECT * FROM tsa_tarjeta_favorita WHERE id_usuario_cliente=:id_usuario";
        $statement = $db->prepare($sql);
        $statement->bindValue(':id_usuario', $id_usuario, \PDO::PARAM_STR);
        try {
            $result = $statement->execute();
            $band=true;
            while($item = $statement->fetch()){
                $band=false;
                $sql = "UPDATE teatro_backup.tsa_tarjeta_favorita SET bin=:bin1 , `status`=:status1, token=:token, holder_name=:holder_name, expiry_year=:expiry_year, expiry_month=:expiry_month, transaction_reference=:transaction_reference, `type`=:type1, `number`=:number1  WHERE id_tarjeta_favorita=$item->id_tarjeta_favorita";
                $statement1 = $db->prepare($sql);
                $statement1->bindValue(':bin1', $bin, \PDO::PARAM_STR);
                $statement1->bindValue(':status1', $status, \PDO::PARAM_STR);
                $statement1->bindValue(':token', $token, \PDO::PARAM_STR);
                $statement1->bindValue(':holder_name', $holder_name, \PDO::PARAM_STR);
                $statement1->bindValue(':expiry_year', $expiry_year, \PDO::PARAM_STR);
                $statement1->bindValue(':expiry_month', $expiry_month, \PDO::PARAM_STR);
                $statement1->bindValue(':transaction_reference', $transaction_reference, \PDO::PARAM_STR);
                $statement1->bindValue(':type1', $type, \PDO::PARAM_STR);
                $statement1->bindValue(':number1', $number, \PDO::PARAM_STR);
                $result = $statement1->execute();
                $out['status'] =$status_UTarjetaF;
                $response->getBody()->write(json_encode($out));
                return $response;
            }
            if($band){
                $sql = "INSERT INTO teatro_backup.tsa_tarjeta_favorita (id_usuario_cliente,bin,`status`,token,holder_name,expiry_year,expiry_month,transaction_reference,`type`,`number`,usuario_creacion)
	            VALUES (:id_usuario,:bin,:status1,:token,:holder_name,:expiry_year,:expiry_month,:transaction_reference,:type1,:number1,'usuario')";
                $statement = $db->prepare($sql);
                $statement->bindValue(':id_usuario', $id_usuario, \PDO::PARAM_STR);
                $statement->bindValue(':bin', $bin, \PDO::PARAM_STR);
                $statement->bindValue(':status1', $status, \PDO::PARAM_STR);
                $statement->bindValue(':token', $token, \PDO::PARAM_STR);
                $statement->bindValue(':holder_name', $holder_name, \PDO::PARAM_STR);
                $statement->bindValue(':expiry_year', $expiry_year, \PDO::PARAM_STR);
                $statement->bindValue(':expiry_month', $expiry_month, \PDO::PARAM_STR);
                $statement->bindValue(':transaction_reference', $transaction_reference, \PDO::PARAM_STR);
                $statement->bindValue(':type1', $type, \PDO::PARAM_STR);
                $statement->bindValue(':number1', $number, \PDO::PARAM_STR);
                $result = $statement->execute();
                $out['status'] =$status_CTarjetaF;
                $response->getBody()->write(json_encode($out));
                return $response;
            }
        } catch (\PDOException $th) {
            $result = false;
            $response->getBody()->write(json_encode($th));
            $out["codigo"] = "102";
            $out["mensaje"] = $error_102_mensaje;
            $out["causa"] = $error_102_causa;
            $out["error"] = $th->getMessage();
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }

    }

    public function getTarjeta_favorita($request, $response, $args){
        include("error.php");
        $response = $response->withHeader('Content-Type', 'application/json');
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
            $out["codigo"] = "100";
            $out["mensaje"] = $error_100_mensaje;
            $out["causa"] =  $error_100_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            $out["codigo"] = "101";
            $out["mensaje"] = $error_101_mensaje;
            $out["causa"] = $error_101_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(401);
        }
        // FIN VALIDACION
        $json = $request->getBody();
        $body = json_decode($json, true);
        if (!(isset($body["id_usuario"]))){
            $out["codigo"] = "201";
            $out["mensaje"] = $error_201_mensaje;
            $out["causa"] =  $error_201_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(400);
        }
        $id_usuario = trim($body['id_usuario']);
        $sql = "SELECT * FROM tsa_tarjeta_favorita tff WHERE  tff.id_usuario_cliente=:id_usuario";
        $statement = $db->prepare($sql);
        $statement->bindValue(':id_usuario', $id_usuario, \PDO::PARAM_STR);

        try {
            $result = $statement->execute();
            $band=true;
            $facturacion = [] ;
            while($item = $statement->fetch()){
                $band=false;
                $facturacion []=  array('id_tarjeta_favorita'=> $item->id_tarjeta_favorita, 'bin'=> $item->bin, 'status'=> $item->status, 'token'=> $item->token, 'holder_name'=> $item->holder_name, 'expiry_year'=> $item->expiry_year, 'expiry_month'=> $item->expiry_month, 'transaction_reference'=> $item->transaction_reference, 'type'=> $item->type, 'number'=> $item->number);
            }
            $response->getBody()->write(json_encode($facturacion));
            return $response;
        } catch (\PDOException $th) {
            $result = false;
            $out["codigo"] = "102";
            $out["mensaje"] = $error_102_mensaje;
            $out["causa"] = $error_102_causa;
            $out["error"] = $th->getMessage();
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
    }

    public function getContacto($request, $response, $args){
        include("error.php");
        $response = $response->withHeader('Content-Type', 'application/json');
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
            $out["codigo"] = "100";
            $out["mensaje"] = $error_100_mensaje;
            $out["causa"] =  $error_100_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            $out["codigo"] = "101";
            $out["mensaje"] = $error_101_mensaje;
            $out["causa"] = $error_101_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(401);
        }

        $sql = "SELECT * FROM tsa_contacto";
        //$sql = "SELECT * FROM categorias where  id_tienda =:tienda";
        $statement = $db->prepare($sql);
        $ruta= "https://teatrosanchezaguilar.org/imagenes/logo/";;
        try {
            $result = $statement->execute();
        } catch (\PDOException $th) {
            $result = false;
            $out["codigo"] = "102";
            $out["mensaje"] = $error_102_mensaje;
            $out["causa"] = $error_102_causa;
            $out["error"] = $th->getMessage();
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }

        $band=true;
        while($item = $statement->fetch()){
          $band=false;
          $out= array('id'=> $item->id_contacto, 'nombre'=> $item->nombre, 'celular'=> $item->celular, 'telefono'=> $item->telefono, 'direccion'=> $item->direccion, 'correo'=> $item->correo, 'pagina'=> $item->pagina,
          'facebook'=> $item->facebook, 'instagram'=> $item->instagram, 'youtube'=> $item->youtube, 'linkedin'=> $item->linkedin, 'whatsapp'=> $item->whatsapp, 'logo_light'=>$ruta_logo.$item->logo_light, 'logo_dark'=> $ruta_logo.$item->logo_dark, 'terminos_condiciones'=>'https://teatrosanchezaguilar.org/terminos.html');
        }
       if ($band) {
         $out["codigo"] = "208";
         $out["mensaje"] = $error_208_mensaje;
         $out["causa"] = $error_208_causa;
         $response->getBody()->write(json_encode($out));
         return $response->withStatus(400);
       }else{
           $response->getBody()->write(json_encode($out));
           return $response;
       }
        return $response;
    }

    //correo verificacion
    public function verificarCuenta($request, $response, $args){
        include("error.php");
        $response = $response->withHeader('Content-Type', 'application/json');
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
            $out["codigo"] = "100";
            $out["mensaje"] = $error_100_mensaje;
            $out["causa"] =  $error_100_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            $out["codigo"] = "101";
            $out["mensaje"] = $error_101_mensaje;
            $out["causa"] = $error_101_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(401);
        }
        // FIN VALIDACION
        $json = $request->getBody();
        $body = json_decode($json, true);
        if (!(isset($body["id_usuario"]))){
            $out["codigo"] = "201";
            $out["mensaje"] = $error_201_mensaje;
            $out["causa"] =  $error_201_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(400);
        }
        $id_usuario = trim($body['id_usuario']);
        $sql = "SELECT * FROM tsa_usuario_cliente WHERE id_usuario_cliente=:id_usuario";
        $statement = $db->prepare($sql);
        $statement->bindValue(':id_usuario', $id_usuario, \PDO::PARAM_STR);
          $out["status"] ="";
        try {
            $result = $statement->execute();
            while($item = $statement->fetch()){
              $sql1 = "UPDATE tsa_usuario_cliente	SET estado='A' WHERE id_usuario_cliente=:id_usuario";
              $statement1 = $db->prepare($sql1);
              $statement1->bindValue(':id_usuario',  $item->id_usuario_cliente, \PDO::PARAM_STR);
              $statement1->execute();
            }
        } catch (\PDOException $th) {
            $result = false;
            $out["codigo"] = "102";
            $out["mensaje"] = $error_102_mensaje;
            $out["causa"] = $error_102_causa;
            $out["error"] = $th->getMessage();
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        $out["status"] =$status_verificar;
        $response->getBody()->write(json_encode($out));
        return $response;
    }

    public function getAmigos_teatro($request, $response, $args){
        include("error.php");
        $response = $response->withHeader('Content-Type', 'application/json');
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
            $out["codigo"] = "100";
            $out["mensaje"] = $error_100_mensaje;
            $out["causa"] =  $error_100_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            $out["codigo"] = "101";
            $out["mensaje"] = $error_101_mensaje;
            $out["causa"] = $error_101_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(401);
        }
        $json = $request->getBody();
        $body = json_decode($json, true);
        if (!(isset($body["id_usuario"]))){
            $out["codigo"] = "201";
            $out["mensaje"] = $error_201_mensaje;
            $out["causa"] =  $error_201_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(400);
        }
        $id_usuario = trim($body['id_usuario']);

        try {
            $sql = "SELECT *  FROM tsa_factor_amigos ts WHERE ts.id_factor_amigos=1";
            $statement = $db->prepare($sql);
            $result = $statement->execute();
            $totalDA=0;
            while($item = $statement->fetch()){
              $factorDA =$item->factor;
              $descuentoDA =$item->descuento;
              $totalDA =$factorDA/$descuentoDA ;
            }

            $sql = "SELECT ts.nombres, ts.apellidos,ts.codigo_identificador, ts.puntos_acumulados, ts.fecha_caducidad, ts.amigo_teatro FROM tsa_usuario_cliente ts WHERE ts.id_usuario_cliente=:id_usuario";
            $statement = $db->prepare($sql);
            $statement->bindValue(':id_usuario', $id_usuario, \PDO::PARAM_STR);
            $result = $statement->execute();
            $usuario = [] ;
            while($item = $statement->fetch()){
                $acm=$item->puntos_acumulados;
                $totalDolares=$acm/$totalDA;
                $usuario= array( 'nombres'=> $item->nombres, 'apellidos'=> $item->apellidos, 'codigo_identificador'=> $item->codigo_identificador, 'puntos_acumulados'=> $item->puntos_acumulados,'puntos_dolares'=>intval($totalDolares), 'fecha_caducidad'=> $item->fecha_caducidad,'amigo_teatro'=> $item->amigo_teatro);
            }
            $sql = "SELECT *  FROM tsa_amigos_puntos ts WHERE ts.id_usuario_cliente=:id_usuario";
            $statement = $db->prepare($sql);
            $statement->bindValue(':id_usuario', $id_usuario, \PDO::PARAM_STR);
            $result = $statement->execute();
            $canjes = [] ;
            while($item = $statement->fetch()){
                $canjes[]= array(  'id'=> $item->id_amigos_puntos, 'evento'=> $item->evento, 'cantidad'=> $item->cantidad, 'fecha_consumo'=> $item->fecha_consumo, 'puntos_consumidos'=> $item->puntos,'puntos_ganados'=> $item->puntos_ganados);
            }
            $sql = "SELECT *  FROM tsa_amigos_beneficios";
            $statement = $db->prepare($sql);
            $result = $statement->execute();
            $beneficios = [] ;
            while($item = $statement->fetch()){
                $beneficios[]= array(  'beneficio'=> $item->beneficio);
            }
            $sql = "SELECT *  FROM tsa_amigos_teatro";
            $statement = $db->prepare($sql);
            $result = $statement->execute();
            $informacion = "";
            while($item = $statement->fetch()){
                $informacion= $item->informacion;
            }
            $sql = "SELECT *  FROM tsa_amigos_preguntas";
            $statement = $db->prepare($sql);
            $result = $statement->execute();
            $preguntas = [] ;
            while($item = $statement->fetch()){
                $preguntas[]= array(  'pregunta'=> $item->pregunta, 'respuesta'=> $item->respuesta );
            }
            $resultado= array('usuario'=> $usuario  , 'canjes'=> $canjes, 'beneficios'=> $beneficios, 'informacion'=> $informacion, 'preguntas'=> $preguntas );
            $response->getBody()->write(json_encode($resultado));
            return $response;
        } catch (\PDOException $th) {
            $result = false;
            $out["codigo"] = "102";
            $out["mensaje"] = $error_102_mensaje;
            $out["causa"] = $error_102_causa;
            $out["error"] = $th->getMessage();
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
    }

    public function getLista_puntos($request, $response, $args){
        include("error.php");
        $response = $response->withHeader('Content-Type', 'application/json');
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
            $out["codigo"] = "100";
            $out["mensaje"] = $error_100_mensaje;
            $out["causa"] =  $error_100_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            $out["codigo"] = "101";
            $out["mensaje"] = $error_101_mensaje;
            $out["causa"] = $error_101_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(401);
        }
        $json = $request->getBody();
        $body = json_decode($json, true);
        if (!(isset($body["id_usuario"]))){
            $out["codigo"] = "201";
            $out["mensaje"] = $error_201_mensaje;
            $out["causa"] =  $error_201_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(400);
        }
        $id_usuario = trim($body['id_usuario']);

        try {
            $sql = "SELECT *  FROM tsa_usuario_cliente ts WHERE ts.id_usuario_cliente=:id_usuario";
            $statement = $db->prepare($sql);
            $statement->bindValue(':id_usuario', $id_usuario, \PDO::PARAM_STR);
            $result = $statement->execute();
            $cantidad =0;
            $factor =0;
            $descuento =0;
            $total =0;
            $puntos =[];
            while($item = $statement->fetch()){
              $cantidad =$item->puntos_acumulados;
            }
            $sql = "SELECT *  FROM tsa_factor_amigos ts WHERE ts.id_factor_amigos=1";
            $statement = $db->prepare($sql);
            $result = $statement->execute();

            while($item = $statement->fetch()){
              $factor =$item->factor;
              $descuento =$item->descuento;
            }
            if ($cantidad !=0) {
              $total =floor($cantidad/$factor);
              for ($i=1; $i <=$total; $i++) {
                 $puntos[] = $i*$descuento;
              }
            }else{
              $puntos[]=0;
            }
            //$resultado= array('usuario'=> $usuario  , 'canjes'=> $canjes, 'beneficios'=> $beneficios, 'informacion'=> $informacion, 'preguntas'=> $preguntas );
            $response->getBody()->write(json_encode($puntos));
            return $response;
        } catch (\PDOException $th) {
            $result = false;
            $out["codigo"] = "102";
            $out["mensaje"] = $error_102_mensaje;
            $out["causa"] = $error_102_causa;
            $out["error"] = $th->getMessage();
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
    }

    public function getfundacion($request, $response, $args){
        include("error.php");
        $response = $response->withHeader('Content-Type', 'application/json');
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
            $out["codigo"] = "100";
            $out["mensaje"] = $error_100_mensaje;
            $out["causa"] =  $error_100_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            $out["codigo"] = "101";
            $out["mensaje"] = $error_101_mensaje;
            $out["causa"] = $error_101_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(401);
        }
        $json = $request->getBody();
        $body = json_decode($json, true);
        if (!(isset($body["id_usuario"]))){
            $out["codigo"] = "201";
            $out["mensaje"] = $error_201_mensaje;
            $out["causa"] =  $error_201_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(400);
        }
        $id_usuario = trim($body['id_usuario']);
        $sql = "SELECT * FROM tsa_fundacion";
        //$sql = "SELECT * FROM categorias where  id_tienda =:tienda";
        $statement = $db->prepare($sql);
        $ruta= "https://teatrosanchezaguilar.org/imagenes/logo/";;
        try {
            $result = $statement->execute();
            $band=true;
            $precio=[];
            while($item = $statement->fetch()){
              $band=false;
              $precio[]=$item->precio1;
              $precio[]=$item->precio2;
              $precio[]=$item->precio3;
              $precio[]=$item->precio4;
              $precio[]=$item->precio5;
              $precio[]=$item->precio6;
              $out= array('id'=> $item->id_fundacion, 'titulo'=> $item->nombre, 'descripcion1'=> $item->descripcion1, 'descripcion2'=> $item->descripcion2, 'imagen'=>$ruta_logo.$item->imagen, 'precio'=>$precio ,  'terminos_condiciones'=>'https://teatrosanchezaguilar.org/terminos.html');
            }
            $sql = "SELECT ts.nombres, ts.apellidos,ts.codigo_identificador, ts.puntos_acumulados, ts.fecha_caducidad FROM tsa_usuario_cliente ts WHERE ts.id_usuario_cliente=:id_usuario";
            $statement = $db->prepare($sql);
            $statement->bindValue(':id_usuario', $id_usuario, \PDO::PARAM_STR);
            $result = $statement->execute();
            $usuario = null ;
            while($item = $statement->fetch()){
                $usuario= array( 'codigo_identificador'=> $item->codigo_identificador, 'puntos_acumulados'=> $item->puntos_acumulados, 'fecha_caducidad'=> $item->fecha_caducidad);

            }
            $out["amigos_teatro"]=$usuario;
            $sql = "SELECT tf.* FROM tsa_facturacion_favorita tff INNER JOIN tsa_facturacion tf ON tf.id_facturacion =tff.id_facturacion AND  tff.id_usuario_cliente=:id_usuario";
            $statement = $db->prepare($sql);
            $statement->bindValue(':id_usuario', $id_usuario, \PDO::PARAM_STR);
            $result = $statement->execute();
            $facturacion = null ;
            while($item = $statement->fetch()){
                $band=false;
                $facturacion=  array('id_facturacion'=> $item->id_facturacion, 'nombres'=> $item->nombres, 'apellidos'=> $item->apellidos, 'cedula'=> $item->cedula, 'razon_social'=> $item->razon_social, 'ruc'=> $item->ruc, 'tipo'=> $item->tipo,'direccion'=> $item->direccion,'correo'=> $item->correo);

            }
            $out["facturacion"]=$facturacion;
            $sql = "SELECT * FROM tsa_tarjeta_favorita tff WHERE  tff.id_usuario_cliente=:id_usuario";
            $statement = $db->prepare($sql);
            $statement->bindValue(':id_usuario', $id_usuario, \PDO::PARAM_STR);
            $result = $statement->execute();
            $tarjeta = null ;
            while($item = $statement->fetch()){
                $tarjeta=  array('id_tarjeta_favorita'=> $item->id_tarjeta_favorita, 'bin'=> $item->bin, 'status'=> $item->status, 'token'=> $item->token, 'holder_name'=> $item->holder_name, 'expiry_year'=> $item->expiry_year, 'expiry_month'=> $item->expiry_month, 'transaction_reference'=> $item->transaction_reference, 'type'=> $item->type, 'number'=> $item->number);
            }
            $out["tarjeta"]=$tarjeta;
        } catch (\PDOException $th) {
            $result = false;
            $out["codigo"] = "102";
            $out["mensaje"] = $error_102_mensaje;
            $out["causa"] = $error_102_causa;
            $out["error"] = $th->getMessage();
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
       if ($band) {
         $out["codigo"] = "208";
         $out["mensaje"] = $error_208_mensaje;
         $out["causa"] = $error_208_causa;
         $response->getBody()->write(json_encode($out));
         return $response->withStatus(400);
       }else{
           $response->getBody()->write(json_encode($out));
           return $response;
       }
        return $response;
    }

    public function getEventos($request, $response, $args){
        include("error.php");
        $response = $response->withHeader('Content-Type', 'application/json');
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
            $out["codigo"] = "100";
            $out["mensaje"] = $error_100_mensaje;
            $out["causa"] =  $error_100_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            $out["codigo"] = "101";
            $out["mensaje"] = $error_101_mensaje;
            $out["causa"] = $error_101_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(401);
        }
        try {
            $sql = "SELECT * FROM tsa_evento_estrella";
            $statement = $db->prepare($sql);
            $result = $statement->execute();
            $band=true;
            $band1=true;
            $band2=true;
            $band3=true;
            $estrella= [];
            $estrellaT= [];
            $destacados=[];
            $destacadosT= [];
            $cartelera= [];
            while($item = $statement->fetch()){
              $band=false;
              $estrella[]=array('id'=>$item->id_evento,'imagen'=>$item->ruta_imagen);
            }
            if ($band) {
                $estrella[]=array();
                $estrellaT[]=array();
            }

            $sql = "SELECT te.*, tc.nombre as categoria, tf.fecha, tf.id_funcion FROM tsa_evento te  INNER JOIN  tsa_categoria tc ON te.id_categoria=tc.id_categoria and te.estado='A' INNER JOIN  tsa_funcion tf ON tf.id_evento =te.id_evento and tf.estado='A' ORDER BY tf.fecha ASC ";
            $statement = $db->prepare($sql);
            $result = $statement->execute();

            $estrellaT= [];
            $estrellaT= [];
            $eventos= [];
            //$ruta1= "C:\Users\rwiva\Downloads\lontanov-qrticket-corpapi-9588f9e8474c";
            $ruta= "https://teatrosanchezaguilar.org/imagenes/evento/";
            date_default_timezone_set('America/Lima');
            $datetime = date("Y-m-d H:i:s");
            while($item = $statement->fetch()){
                $nuevafecha = strtotime ( '+'.$item->duracion." minute" , strtotime ( $datetime) ) ;
                $nuevafecha = date ( "Y-m-d H:i:s" , $nuevafecha );
              if ($item->fecha < $nuevafecha) {
                $sql1 = "UPDATE tsa_funcion	SET estado='I' WHERE id_funcion=:id_funcion";
                $statement1 = $db->prepare($sql1);
                $statement1->bindValue(':id_funcion',  $item->id_funcion, \PDO::PARAM_STR);
                $statement1->execute();
              }else{
                $categoria="";
                if ($item->id_categoria!=1) {
                    $categoria=$item->categoria;
                }
                if ($item->id_evento!=1) {
                    if (!in_array($item->id_evento, $eventos)) {
                        $band2=true;
                        if (!$band) {
                          if (in_array($item->id_evento, $estrella[0])) {

                            $estrellaT[]= array('id'=> $item->id_evento, 'nombre'=> $item->nombre, 'duracion'=> $item->duracion, 'imagen'=> $ruta_evento.$item->id_evento."H.png", 'tipo'=> $item->tipo, 'categoria'=> $categoria, 'sinopsis'=> $item->sinopsis);
                          }
                        }
                        if ($band2) {
                          $band3=false;
                          $cartelera[]= array('id'=> $item->id_evento, 'nombre'=> $item->nombre, 'duracion'=> $item->duracion, 'imagen'=> $ruta_evento.$item->id_evento."C.png", 'tipo'=> $item->tipo, 'categoria'=> $categoria, 'sinopsis'=> $item->sinopsis);
                        }
                          $eventos[]= $item->id_evento;
                      }
                }
              }
            }
            $sql = "SELECT te.*, tc.nombre as categoria FROM tsa_evento te  INNER JOIN  tsa_categoria tc ON te.id_categoria=tc.id_categoria and te.estado='A' and te.tipo ='I'";
            $statement = $db->prepare($sql);
            $result = $statement->execute();
            while($item = $statement->fetch()){
                if (!in_array($item->id_evento, $eventos)) {
                    $categoria="";
                    if ($item->id_categoria!=1) {
                        $categoria=$item->categoria;
                    }
                    $band3=false;
                    $cartelera[]= array('id'=> $item->id_evento, 'nombre'=> $item->nombre, 'duracion'=> $item->duracion, 'imagen'=> $ruta_evento.$item->id_evento."C.png", 'tipo'=> $item->tipo, 'categoria'=> $categoria, 'sinopsis'=> $item->sinopsis);
                    $eventos[]= $item->id_evento;
                }
            }
            if ($band3) {
                $cartelera=array();
            }
        } catch (\PDOException $th) {
            $result = false;
            $out["codigo"] = "102";
            $out["mensaje"] = $error_102_mensaje;
            $out["causa"] = $error_102_causa;
            $out["error"] = $th->getMessage();
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }

        $out['eventos'] = array('estrella'=> $estrellaT, 'cartelera'=>  $cartelera);

        $response->getBody()->write(json_encode($out));
        return $response;
    }

    public function getAllEventos($request, $response, $args){
        include("error.php");
        $response = $response->withHeader('Content-Type', 'application/json');
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
            $out["codigo"] = "100";
            $out["mensaje"] = $error_100_mensaje;
            $out["causa"] =  $error_100_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            $out["codigo"] = "101";
            $out["mensaje"] = $error_101_mensaje;
            $out["causa"] = $error_101_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(401);
        }
        try {

            $band=true;
            $band1=true;
            $band2=true;
            $band3=true;
            $cartelera= [];
            $ruta= "https://teatrosanchezaguilar.org/imagenes/evento/";
            $sql = "SELECT te.*, tc.nombre as categoria FROM tsa_evento te  INNER JOIN  tsa_categoria tc ON te.id_categoria=tc.id_categoria and te.estado='A'";
            $statement = $db->prepare($sql);
            $result = $statement->execute();
            while($item = $statement->fetch()){
              $categoria="";
              if ($item->id_categoria!=1) {
                  $categoria=$item->categoria;
              }
              if ($item->id_evento!=1) {
                $band3=false;
                $cartelera[]= array('id'=> $item->id_evento, 'nombre'=> $item->nombre,'imagen'=> $ruta_evento.$item->id_evento."H.png", 'tipo'=> $item->tipo, 'categoria'=> $categoria, 'sinopsis'=> $item->sinopsis);

            }
                          }
            if ($band3) {
                $cartelera=array();
            }
        } catch (\PDOException $th) {
            $result = false;
            $out["codigo"] = "102";
            $out["mensaje"] = $error_102_mensaje;
            $out["causa"] = $error_102_causa;
            $out["error"] = $th->getMessage();
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }

        $out =$cartelera;

        $response->getBody()->write(json_encode($out));
        return $response;
    }

    public function getEventos_fecha($request, $response, $args){
        include("error.php");
        $response = $response->withHeader('Content-Type', 'application/json');
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
            $out["codigo"] = "100";
            $out["mensaje"] = $error_100_mensaje;
            $out["causa"] =  $error_100_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            $out["codigo"] = "101";
            $out["mensaje"] = $error_101_mensaje;
            $out["causa"] = $error_101_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(401);
        }
        // FIN VALIDACION
        $json = $request->getBody();
        $body = json_decode($json, true);
        if (!(isset($body["fecha"]) )){
          $out["codigo"] = "201";
          $out["mensaje"] = $error_201_mensaje;
          $out["causa"] = $error_201_causa;
          $response->getBody()->write(json_encode($out));
          return $response->withStatus(400);
        }
        //Realizo consulta de puertas a DB
        $fecha_inicio= trim($body["fecha"]);
        $fecha_final=$fecha_inicio."  23:59:59";
        try {
            $sql = "SELECT te.*, tc.nombre as categoria, tf.fecha, tf.id_funcion, ts.nombre as sala ,tc2.nombre as clasificacion FROM tsa_evento te
            INNER JOIN  tsa_clasificacion tc2 ON tc2.id_clasificacion =te.id_clasificacion
            INNER JOIN  tsa_sala_mapa tsm ON tsm.id_sala_mapa =te.id_sala_mapa
            INNER JOIN  tsa_sala ts ON tsm.id_sala =ts.id_sala
            INNER JOIN  tsa_categoria tc ON te.id_categoria=tc.id_categoria
            INNER JOIN  tsa_funcion tf ON tf.id_evento =te.id_evento and tf.fecha between :fecha_inicio and :fecha_final ORDER BY tf.fecha ASC ";
            $statement = $db->prepare($sql);
            $statement->bindValue(':fecha_inicio', $fecha_inicio, \PDO::PARAM_STR);
            $statement->bindValue(':fecha_final', $fecha_final, \PDO::PARAM_STR);
            $result = $statement->execute();
            $eventos= [];
            $cartelera= [];
            $carteleraT= [];
            $horarios= [];
            $ruta= "https://teatrosanchezaguilar.org/imagenes/evento/";
            date_default_timezone_set('America/Lima');
            $datetime = date("Y-m-d H:i:s");
            while($item = $statement->fetch()){
              $categoria="";
              $clasificacion="";
              if ($item->id_categoria!=1) {
                  $categoria=$item->categoria;
              }
              if ($item->id_clasificacion!=1) {
                  $clasificacion=$item->clasificacion;
              }
              $nuevafecha = strtotime ( '+'.$item->duracion." minute" , strtotime ( $datetime) ) ;
              $nuevafecha = date ( "Y-m-d H:i:s" , $nuevafecha );
              if ($item->fecha < $nuevafecha) {
                $sql1 = "UPDATE tsa_funcion	SET estado='I' WHERE id_funcion=:id_funcion";
                $statement1 = $db->prepare($sql1);
                $statement1->bindValue(':id_funcion',  $item->id_funcion, \PDO::PARAM_STR);
                $statement1->execute();
              }
              if (!in_array($item->id_evento, $eventos)) {
                  $cartelera[$item->id_evento]= array('id'=> $item->id_evento, 'nombre'=> $item->nombre, 'duracion'=> $item->duracion, 'imagen'=> $ruta_evento.$item->id_evento."C.png",
                   'tipo'=> $item->tipo, 'categoria'=> $categoria,'sala'=> $item->sala,'clasificacion'=> $clasificacion);
                  $eventos[]= $item->id_evento;
              }
              $horarios[$item->id_evento][]=$item->fecha;
            }
            foreach ($eventos as $clave) {
                $cartelera[$clave]['horarios']=$horarios[$clave];
                  $carteleraT[]=$cartelera[$clave];
            }

        } catch (\PDOException $th) {
            $result = false;
            $out["codigo"] = "102";
            $out["mensaje"] = $error_102_mensaje;
            $out["causa"] = $error_102_causa;
            $out["error"] = $th->getMessage();
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }

        $out =$carteleraT;

        $response->getBody()->write(json_encode($out));
        return $response;
    }

    public function getEventos_categoria($request, $response, $args){
        include("error.php");
        $response = $response->withHeader('Content-Type', 'application/json');
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
            $out["codigo"] = "100";
            $out["mensaje"] = $error_100_mensaje;
            $out["causa"] =  $error_100_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            $out["codigo"] = "101";
            $out["mensaje"] = $error_101_mensaje;
            $out["causa"] = $error_101_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(401);
        }
        // FIN VALIDACION
        $json = $request->getBody();
        $body = json_decode($json, true);
        if (!(isset($body["id_categoria"]) )){
          $out["codigo"] = "201";
          $out["mensaje"] = $error_201_mensaje;
          $out["causa"] = $error_201_causa;
          $response->getBody()->write(json_encode($out));
          return $response->withStatus(400);
        }
        //Realizo consulta de puertas a DB
        $id_categoria= trim($body["id_categoria"]);

        try {
            $sql = "SELECT te.*, tc.nombre as categoria, ts.nombre as sala ,tc2.nombre as clasificacion FROM tsa_evento te
            INNER JOIN  tsa_clasificacion tc2 ON tc2.id_clasificacion =te.id_clasificacion
            INNER JOIN  tsa_sala_mapa tsm ON tsm.id_sala_mapa =te.id_sala_mapa
            INNER JOIN  tsa_sala ts ON tsm.id_sala =ts.id_sala
            INNER JOIN  tsa_categoria tc ON te.id_categoria=tc.id_categoria and tc.id_categoria=:id_categoria and te.estado='A'";
            $statement = $db->prepare($sql);
            $statement->bindValue(':id_categoria', $id_categoria, \PDO::PARAM_STR);
            $result = $statement->execute();
            $eventos= [];
            $cartelera= [];
            $carteleraT= [];
            $horarios= [];
            $ruta= "https://teatrosanchezaguilar.org/imagenes/evento/";;
            date_default_timezone_set('America/Lima');
            $datetime = date("Y-m-d H:i:s");
            while($item = $statement->fetch()){
                $categoria="";
                $clasificacion="";
                if ($item->id_categoria!=1) {
                    $categoria=$item->categoria;
                }
                if ($item->id_clasificacion!=1) {
                    $clasificacion=$item->clasificacion;
                }
                if (!in_array($item->id_evento, $eventos)) {
                    $cartelera[$item->id_evento]= array('id'=> $item->id_evento, 'nombre'=> $item->nombre, 'duracion'=> $item->duracion, 'imagen'=> $ruta_evento.$item->id_evento."C.png",
                     'tipo'=> $item->tipo, 'categoria'=> $categoria,'sala'=> $item->sala,'clasificacion'=> $clasificacion);
                    $eventos[]= $item->id_evento;
                }

            }
            foreach ($eventos as $clave) {
                $carteleraT[]=$cartelera[$clave];
            }
        } catch (\PDOException $th) {
            $result = false;
            $out["codigo"] = "102";
            $out["mensaje"] = $error_102_mensaje;
            $out["causa"] = $error_102_causa;
            $out["error"] = $th->getMessage();
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        $out=$carteleraT;

        $response->getBody()->write(json_encode($out));
        return $response;
    }

    public function getEventos_id($request, $response, $args){
        include("error.php");
        $response = $response->withHeader('Content-Type', 'application/json');
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
            $out["codigo"] = "100";
            $out["mensaje"] = $error_100_mensaje;
            $out["causa"] =  $error_100_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            $out["codigo"] = "101";
            $out["mensaje"] = $error_101_mensaje;
            $out["causa"] = $error_101_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(401);
        }
        // FIN VALIDACION
        $json = $request->getBody();
        $body = json_decode($json, true);
        if (!(isset($body["id_evento"])  )){
          $out["codigo"] = "201";
          $out["mensaje"] = $error_201_mensaje;
          $out["causa"] = $error_201_causa;
          $response->getBody()->write(json_encode($out));
          return $response->withStatus(400);
        }
        //Realizo consulta de puertas a DB
        $id_evento= trim($body["id_evento"]);

        try {
            $sql = "SELECT te.*, tc.nombre as categoria, tc2.nombre as clasificacion,tp.nombre  as procedencia,tp2.nombre as productora1,ts.nombre as sala ,tte.nombre as tipo_espectaculo,
            tte2.nombre as tipo_evento FROM tsa_evento te
            INNER JOIN  tsa_categoria tc ON te.id_categoria=tc.id_categoria
            INNER JOIN  tsa_clasificacion tc2 ON tc2.id_clasificacion =te.id_clasificacion
            INNER JOIN  tsa_procedencia tp  ON tp.id_procedencia =te.id_procedencia
            INNER JOIN  tsa_productora tp2   ON tp2.id_productora=te.id_productora
            INNER JOIN  tsa_sala_mapa tsm ON tsm.id_sala_mapa =te.id_sala_mapa
            INNER JOIN  tsa_sala ts ON tsm.id_sala =ts.id_sala
            INNER JOIN  tsa_tipo_espectaculo tte ON tte.id_tipo_espectaculo =te.id_tipo_espectaculo
            INNER JOIN  tsa_tipo_evento tte2 ON tte2.id_tipo_evento=te.id_tipo_evento and te.id_evento =:id_evento";
            $statement = $db->prepare($sql);
            $statement->bindValue(':id_evento', $id_evento, \PDO::PARAM_STR);
            $result = $statement->execute();
            $eventos= [];
            $cartelera= [];
            $carteleraT= [];
            $horarios= [];
            $ruta= "https://teatrosanchezaguilar.org/imagenes/evento/";
            date_default_timezone_set('America/Lima');
            $datetime = date("Y-m-d H:i:s");
            while($item = $statement->fetch()){
              $categoria="";
              $clasificacion="";
              $procedencia="";
              $productora1="";
              $tipo_espectaculo="";
              if ($item->id_categoria!=1) {
                  $categoria=$item->categoria;
              }
              if ($item->id_clasificacion!=1) {
                  $clasificacion=$item->clasificacion;
              }
              if ($item->id_procedencia!=1) {
                  $procedencia=$item->procedencia;
              }
              if ($item->id_productora!=1) {
                  $productora1=$item->productora1;
              }
              if ($item->id_tipo_espectaculo!=1) {
                  $tipo_espectaculo=$item->tipo_espectaculo;
              }
              if (!in_array($item->id_evento, $eventos)) {
                  $cartelera[$item->id_evento]= array('id'=> $item->id_evento, 'nombre'=> $item->nombre, 'duracion'=> $item->duracion, 'imagen'=> $ruta_evento.$item->id_evento."C.png",
                   'tipo'=> $item->tipo, 'categoria'=> $categoria, 'clasificacion'=> $clasificacion, 'procedencia'=> $procedencia,'cantidad'=> $item->cantidad, 'productora'=> $productora1,'sala'=> $item->sala,'tipo_espectaculo'=> $tipo_espectaculo,
                   'sinopsis'=> $item->sinopsis, 'descripcion2'=> $item->descripcion2, 'ficha'=> [], 'video'=> $item->ruta_video,'link'=> $ruta_compartir.$item->id_evento);
                    $eventos[]= $item->id_evento;
                    $horarios[$item->id_evento]=[] ;
                    $ficha[$item->id_evento]=[];
              }

            }
            $band5=false;
            $sql = "SELECT te.id_evento,te.duracion ,  tf.fecha, tf.aforo , tf.cantidad_vendida, tf.estado as estado_funcion, tf.id_funcion FROM tsa_evento te INNER JOIN  tsa_funcion tf ON tf.id_evento =te.id_evento and tf.estado='A' and te.id_evento =:id_evento ORDER BY tf.fecha ASC";
            $statement = $db->prepare($sql);
            $statement->bindValue(':id_evento', $id_evento, \PDO::PARAM_STR);
            $result = $statement->execute();
            $datetime = date("Y-m-d H:i:s");
            while($item = $statement->fetch()){
                $nuevafecha = strtotime ( '+'.$item->duracion." minute" , strtotime ( $datetime) ) ;
                $nuevafecha = date ( "Y-m-d H:i:s" , $nuevafecha );
                $band5=true;
                if ($item->cantidad_vendida>= $item->aforo) {
                  $estado="B";
                }else{
                  $estado= $item->estado_funcion;
                }
                if ($item->fecha < $nuevafecha) {
                  $estado="I";
                  $sql1 = "UPDATE tsa_funcion	SET estado='I' WHERE id_funcion=:id_funcion";
                  $statement1 = $db->prepare($sql1);
                  $statement1->bindValue(':id_funcion',  $item->id_funcion, \PDO::PARAM_STR);
                  $statement1->execute();
                }
                $horarios[$item->id_evento][]=array('id_funcion'=>$item->id_funcion,'fecha'=>$item->fecha,'estado'=>$estado) ;
            }
            $band5=false;
            $sql = "SELECT te.id_evento , tfa.titulo , tfa.descripcion FROM tsa_evento te INNER JOIN tsa_ficha_artistica tfa ON tfa.id_evento =te.id_evento and te.id_evento =:id_evento";
            $statement = $db->prepare($sql);
            $statement->bindValue(':id_evento', $id_evento, \PDO::PARAM_STR);
            $result = $statement->execute();
            while($item = $statement->fetch()){
                $ficha[$item->id_evento][]=array('titulo'=>$item->titulo,'descripcion'=>$item->descripcion) ;
            }
            foreach ($eventos as $clave) {
                $cartelera[$clave]['horarios']=$horarios[$clave];
                $cartelera[$clave]['ficha']=$ficha[$clave];
                $carteleraT=$cartelera[$clave];
            }
            $sql = "SELECT * FROM tsa_informacion_adicional WHERE estado='A' ORDER BY  CAST(  orden AS DECIMAL) ASC";
            //$sql = "SELECT * FROM categorias where  id_tienda =:tienda";
            $statement = $db->prepare($sql);
            $result = $statement->execute();
            $carteleraT['informacion_adicional']=[];
            while($item = $statement->fetch()){
              $carteleraT['informacion_adicional'][]= $item->nombre;
            }

        } catch (\PDOException $th) {
            $result = false;
            $out["codigo"] = "102";
            $out["mensaje"] = $error_102_mensaje;
            $out["causa"] = $error_102_causa;
            $out["error"] = $th->getMessage();
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }

        $out =$carteleraT;

        $response->getBody()->write(json_encode($out));
        return $response;
    }

    public function getTickets($request, $response, $args){
        include("error.php");
        $response = $response->withHeader('Content-Type', 'application/json');
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
            $out["codigo"] = "100";
            $out["mensaje"] = $error_100_mensaje;
            $out["causa"] =  $error_100_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            $out["codigo"] = "101";
            $out["mensaje"] = $error_101_mensaje;
            $out["causa"] = $error_101_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(401);
        }
        // FIN VALIDACION
        $json = $request->getBody();
        $body = json_decode($json, true);
        if (!(isset($body["id_usuario"]) )){
          $out["codigo"] = "201";
          $out["mensaje"] = $error_201_mensaje;
          $out["causa"] = $error_201_causa;
          $response->getBody()->write(json_encode($out));
          return $response->withStatus(400);
        }
        //Realizo consulta de puertas a DB
        $id_usuario= trim($body["id_usuario"]);

        try {
            $sql = "SELECT tp.nombre as platea, te.*, tt.precio ,tt.sala, tf.fecha, tt.id_ticket, tta.asiento,tt.estado as estado_ticket FROM tsa_ticket tt
            INNER JOIN  tsa_usuario_cliente tuc ON tuc.id_usuario_cliente=tt.id_usuario_cliente
            INNER JOIN  tsa_funcion tf ON tf.id_funcion =tt.id_funcion
            INNER JOIN  tsa_ticket_asiento tta ON tta.id_ticket =tt.id_ticket
            INNER JOIN tsa_platea tp ON tta.id_platea =tp.id_platea
            INNER JOIN  tsa_evento te ON te.id_evento =tf.id_evento and tuc.id_usuario_cliente =:id_usuario  ORDER BY tf.fecha ASC ;";
            $statement = $db->prepare($sql);
            $statement->bindValue(':id_usuario', $id_usuario, \PDO::PARAM_STR);
            $result = $statement->execute();
            $tickets= [];
            $ticket= [];
            $ticketT=[];
            $asientos= [];
            $asientos2= [];
            $asientos3= [];
            $ruta= "https://teatrosanchezaguilar.org/imagenes/evento/";
            date_default_timezone_set('America/Lima');
            $datetime = date("Y-m-d H:i:s");
            while($item = $statement->fetch()){
              if (!in_array($item->id_ticket, $tickets)) {
                  $cad = "000000000000";
                  $miCadena = strval( $item->id_ticket );
                  $cant=strlen($miCadena);
                  $xx=11-$cant;
                  $miCadena=substr($cad, 0, $xx).$miCadena."1";
                  $auth_token = base64_encode($miCadena);
                  $auth_token1 = base64_encode($auth_token);
                  $ticket[$item->id_ticket]= array('id_ticket'=> $item->id_ticket,'id_evento'=> $item->id_evento, 'nombre'=> $item->nombre, 'duracion'=> $item->duracion, 'imagen'=> $ruta_evento.$item->id_evento."H.png",
                   'tipo'=> $item->tipo,'sala'=> $item->sala,'precio'=> $item->precio,'fecha'=> $item->fecha,'estado'=> $item->estado_ticket,'qr'=>$auth_token1);
                  $tickets[]= $item->id_ticket;
              }
              $ban=true;
              $platea="";
              $asiento="";
              $plateas=[];
              $ficha=[];
              $texto=($item->platea).":".$item->asiento;
              if (in_array($item->id_ticket, $asientos3)) {
                if (is_numeric($item->asiento)) {
                      $asientos2[$item->id_ticket]= $asientos2[$item->id_ticket]+ $item->asiento;
                } else {
                    $asientos2[$item->id_ticket]=$asientos2[$item->id_ticket]+1;
                }
              }else{
                if (is_numeric($item->asiento)) {
                      $asientos2[$item->id_ticket]= $item->asiento;
                } else {
                    $asientos2[$item->id_ticket]=1;
                }
                $asientos3[]=$item->id_ticket;
              }

              $asientos[$item->id_ticket][]=$texto;
              $count = count($asientos[$item->id_ticket]);
              for ($i = 0; $i < $count; $i++) {
                  $usuarios= explode(':',$asientos[$item->id_ticket][$i]);
                  if (isset($usuarios[1])) {
                    if (in_array($usuarios[0], $plateas)) {
                      $ficha[$usuarios[0]]=$ficha[$usuarios[0]].",".$usuarios[1];

                    }else{
                        $plateas[]=$usuarios[0];
                        $ficha[$usuarios[0]]=$usuarios[1];
                    }
                  }


              }
              $asientos[$item->id_ticket]=[];
              foreach ($plateas as $clave) {

                $asientos[$item->id_ticket][]=$clave.":".$ficha[$clave];
              }

            }
            foreach ($tickets as $clave) {
                $ticket[$clave]['asientos']= $asientos[$clave] ;
                $ticket[$clave]['cantidad_asientos']= $asientos2[$clave] ;
                $ticketT[]=$ticket[$clave];
            }

            $asitn1=[];

            $sql= "SELECT te.nombre ,te.duracion ,te.id_evento ,te.tipo ,trg.cantidad,trg.estado ,trg.id_registro_gratuito, ts.nombre as sala, tf.fecha FROM tsa_evento te INNER JOIN tsa_funcion tf ON te.id_evento =tf.id_evento INNER JOIN tsa_sala_mapa tsm ON tsm.id_sala_mapa =te.id_sala_mapa
            INNER JOIN tsa_sala ts ON ts.id_sala =tsm.id_sala INNER JOIN tsa_registro_gratuito trg ON trg.id_funcion =tf.id_funcion and trg.id_usuario_cliente =:id_usuario;";
            $statement = $db->prepare($sql);
            $statement->bindValue(':id_usuario', $id_usuario, \PDO::PARAM_STR);
            $result = $statement->execute();
            while($item = $statement->fetch()){
                $cad = "000000000000";
                $miCadena = strval( $item->id_registro_gratuito );
                $cant=strlen($miCadena);
                $xx=11-$cant;
                $miCadena=substr($cad, 0, $xx).$miCadena."2";
                $auth_token = base64_encode($miCadena);
                $auth_token1 = base64_encode($auth_token);
                $asitn1[]=$item->cantidad;
                $ticketT[]= array('id_ticket'=> $item->id_registro_gratuito, 'nombre'=> $item->nombre, 'duracion'=> $item->duracion, 'imagen'=> $ruta_evento.$item->id_evento."H.png",
               'tipo'=> $item->tipo,'sala'=> $item->sala,'precio'=>"",'fecha'=> $item->fecha,'estado'=> $item->estado,'qr'=>$auth_token1,'asientos'=>$asitn1,'cantidad_asientos'=>$item->cantidad );

            }
            usort($ticketT, function ($a, $b) {
                return strcmp($b["fecha"], $a["fecha"]);
            });
        } catch (\PDOException $th) {
            $result = false;
            $out["codigo"] = "102";
            $out["mensaje"] = $error_102_mensaje;
            $out["causa"] = $error_102_causa;
            $out["error"] = $th->getMessage();
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }

        $out =$ticketT;

        $response->getBody()->write(json_encode($out));
        return $response;
    }

    public function getFuncion($request, $response, $args){
        include("error.php");
        $response = $response->withHeader('Content-Type', 'application/json');
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
            $out["codigo"] = "100";
            $out["mensaje"] = $error_100_mensaje;
            $out["causa"] =  $error_100_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            $out["codigo"] = "101";
            $out["mensaje"] = $error_101_mensaje;
            $out["causa"] = $error_101_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(401);
        }
        // FIN VALIDACION
        $json = $request->getBody();
        $body = json_decode($json, true);
        if (!(isset($body["id_funcion"]) and isset($body["id_evento"]) )){
          $out["codigo"] = "201";
          $out["mensaje"] = $error_201_mensaje;
          $out["causa"] = $error_201_causa;
          $response->getBody()->write(json_encode($out));
          return $response->withStatus(400);
        }
        //Realizo consulta de puertas a DB
        $id_funcion= trim($body["id_funcion"]);
        $id_evento= trim($body["id_evento"]);
        try {
            $ruta= "https://teatrosanchezaguilar.org/imagenes/distribucion/";
            date_default_timezone_set('America/Lima');
            $datetime = date("Y-m-d H:i:s");
            $sql = "SELECT tp.*, tpf.vendido as vendido1 FROM tsa_platea tp INNER JOIN tsa_platea_funcion tpf ON tp.id_platea = tpf.id_platea  and tpf.id_funcion=:idFuncion INNER JOIN tsa_evento te ON te.id_evento =tp.id_evento and te.id_evento =:id_evento";
            $statement = $db->prepare($sql);
            $statement->bindValue(':id_evento', $id_evento, \PDO::PARAM_STR);
            $statement->bindValue(':idFuncion', $id_funcion, \PDO::PARAM_STR);
            $result = $statement->execute();
            $platea= [];
            $asientos= [];
            $asientosT= [];
            $bandw= true;

            while($item = $statement->fetch()){
              $bandw= false;
              $platea []= array('id_platea'=> $item->id_platea, 'nombre'=> $item->nombre, 'precio'=> $item->costo, 'aforo_platea'=> $item->aforo,'vendido_platea'=> $item->vendido1);
            }
            if ($bandw) {
              $sql = "SELECT tp.* FROM tsa_platea tp  INNER JOIN tsa_evento te ON te.id_evento =tp.id_evento and te.id_evento =:id_evento";
              $statement = $db->prepare($sql);
              $statement->bindValue(':id_evento', $id_evento, \PDO::PARAM_STR);
              $result = $statement->execute();

              while($item = $statement->fetch()){
                $bandw= false;
                $platea []= array('id_platea'=> $item->id_platea, 'nombre'=> $item->nombre, 'precio'=> $item->costo, 'aforo_platea'=> $item->aforo,'vendido_platea'=> $item->vendido);
              }
            }
            $acm=1;
            $platea1=[];
            foreach ($platea as $clave) {
              if ($acm==1) {
                $color="#8CE1F4";
              }else if ($acm==2) {
                $color="#FFD1A3";
              }else if ($acm==3) {
                $color="#A8DDD2";
              }else if ($acm==4) {
                $color="#F0AAAA";
              }else if ($acm==5) {
                $color="#319DB5";
              }else if ($acm==6) {
                $color="#fc5dfc";
              }else if ($acm==7) {
                $color="#e8efea";
              }else if ($acm==8) {
                $color="#e8efea";
              }
              $acm++;
               $clave['color']=  $color;
               $platea1[]=$clave;
            }
             $platea=$platea1;
            $sql = "SELECT * FROM tsa_distribucion td WHERE  td.id_funcion =:id_funcion";
            $statement = $db->prepare($sql);
            $statement->bindValue(':id_funcion', $id_funcion, \PDO::PARAM_STR);
            $result = $statement->execute();
             $lateral1 ="I";
             $band=false;
            while($item = $statement->fetch()){
               $band=true;
               $lateral =$item->lateral;
               $estado="";
              if ($item->estado=="A") {
                  $estado="0";
              }else if ($item->estado=="V") {
                  $estado="1";
              }else if ($item->estado=="B" | $item->estado=="C") {
                  $estado="2";
              }else if ($item->estado=="E") {
                  $estado="3";
              }
              if ($lateral1==$lateral) {
                $asientos[$item->fila][]= array('id_asiento'=> $item->id_distribucion,'nombre'=> $item->fila.$item->numero,'id_platea'=> $item->id_platea, 'estado'=> $estado);
              }else{
                if ($lateral=="I" && $lateral1=="D") {
                    $asientos[$item->fila][]= array('id_asiento'=> $item->id_distribucion,'nombre'=> $item->fila.$item->numero,'id_platea'=> $item->id_platea, 'estado'=> $estado);
                }else{
                  $asientos[$item->fila][]= array('id_asiento'=> "",'nombre'=> $item->fila,'id_platea'=> "", 'estado'=> "4");
                  $asientos[$item->fila][]= array('id_asiento'=> $item->id_distribucion,'nombre'=> $item->fila.$item->numero,'id_platea'=> $item->id_platea, 'estado'=> $estado);
                }
                $lateral1=$item->lateral;
              }

            }
            $tipo="1";
            if ($band) {
                foreach ($asientos as $key=>$value) {
                    $letra= array('id_asiento'=> "",'nombre'=> $key,'id_platea'=> "", 'estado'=> "4");
                    if($key !="W"){
                        array_unshift($value, $letra);
                    }

                    array_push($value, $letra);
                    $asientosT[]=array('nombre'=>  $key,'butacas'=> $value);
                }
            }else{
                $tipo="2";
            }

            $sql = "SELECT tf.*, tm.ruta_imagen FROM tsa_funcion tf INNER JOIN tsa_evento te2 ON tf.id_evento =te2.id_evento INNER JOIN tsa_sala_mapa tsm ON te2.id_sala_mapa=tsm.id_sala_mapa INNER JOIN tsa_mapa tm ON tm.id_mapa =tsm.id_mapa and tf.id_funcion =:id_funcion";
            $statement = $db->prepare($sql);
            $statement->bindValue(':id_funcion', $id_funcion, \PDO::PARAM_STR);
            $result = $statement->execute();
            $funcion= [];
            while($item = $statement->fetch()){
              $funcion []= array('id_funcion'=> $item->id_funcion,'platea'=> $platea,'asientos'=> $asientosT, 'aforo_funcion'=> $item->aforo, 'vendido_funcion'=> $item->cantidad_vendida, 'tipo'=> $tipo ,'imagen'=> $ruta_distribucion.$item->ruta_imagen);
            }
        } catch (\PDOException $th) {
            $result = false;
            $out["codigo"] = "102";
            $out["mensaje"] = $error_102_mensaje;
            $out["causa"] = $error_102_causa;
            $out["error"] = $th->getMessage();
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }

        $out['tickets'] =$funcion;

        $response->getBody()->write(json_encode($out));
        return $response;
    }

    public function getToken($request, $response, $args){
        include("error.php");
        $response = $response->withHeader('Content-Type', 'application/json');
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
            $out["codigo"] = "100";
            $out["mensaje"] = $error_100_mensaje;
            $out["causa"] =  $error_100_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            $out["codigo"] = "101";
            $out["mensaje"] = $error_101_mensaje;
            $out["causa"] = $error_101_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(401);
        }
        $API_LOGIN_DEV     = "TPP3-EC-SERVER";
        $API_KEY_DEV       = "JdXTDl2d0o0B8ANZ1heJOq7tf62PC6";
        $server_application_code = $API_LOGIN_DEV;
        $server_app_key = $API_KEY_DEV ;
        $date = new \DateTime();
        //$date = date("Y-m-d H:i:s");
        $unix_timestamp = $date->getTimestamp();
        // $unix_timestamp = "1546543146";
        $uniq_token_string = $server_app_key.$unix_timestamp;
        $uniq_token_hash = hash('sha256', $uniq_token_string);
        $auth_token = base64_encode($server_application_code.";".$unix_timestamp.";".$uniq_token_hash);
        $out['TIMESTAMP'] =$unix_timestamp;
        $out['UNIQTOKENST'] =$uniq_token_string;
        $out['UNIQTOHAS'] =$uniq_token_hash;
        $out['AUTHTOKEN'] =$auth_token;
        $response->getBody()->write(json_encode($out));
        return $response;
    }

    public function getToken_client($request, $response, $args){
        include("error.php");
        $response = $response->withHeader('Content-Type', 'application/json');
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
            $out["codigo"] = "100";
            $out["mensaje"] = $error_100_mensaje;
            $out["causa"] =  $error_100_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            $out["codigo"] = "101";
            $out["mensaje"] = $error_101_mensaje;
            $out["causa"] = $error_101_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(401);
        }
        $API_LOGIN_DEV     = "TPP3-EC-CLIENT";
        $API_KEY_DEV       = "ZfapAKOk4QFXheRNvndVib9XU3szzg";
        $server_application_code = $API_LOGIN_DEV;
        $server_app_key = $API_KEY_DEV ;
        $date = new \DateTime();
        //$date = date("Y-m-d H:i:s");
        $unix_timestamp = $date->getTimestamp();
        // $unix_timestamp = "1546543146";
        $uniq_token_string = $server_app_key.$unix_timestamp;
        $uniq_token_hash = hash('sha256', $uniq_token_string);
        $auth_token = base64_encode($server_application_code.";".$unix_timestamp.";".$uniq_token_hash);
        $out['TIMESTAMP'] =$unix_timestamp;
        $out['UNIQTOKENST'] =$uniq_token_string;
        $out['UNIQTOHAS'] =$uniq_token_hash;
        $out['AUTHTOKEN'] =$auth_token;
        $response->getBody()->write(json_encode($out));
        return $response;
    }
    public function getPromociones($request, $response, $args){
        include("error.php");
        $response = $response->withHeader('Content-Type', 'application/json');
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
            $out["codigo"] = "100";
            $out["mensaje"] = $error_100_mensaje;
            $out["causa"] =  $error_100_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            $out["codigo"] = "101";
            $out["mensaje"] = $error_101_mensaje;
            $out["causa"] = $error_101_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(401);
        }
        // FIN VALIDACION
        $json = $request->getBody();
        $body = json_decode($json, true);
        if (!(isset($body["id_usuario"]))){
          $out["codigo"] = "201";
          $out["mensaje"] = $error_201_mensaje;
          $out["causa"] = $error_201_causa;
          $response->getBody()->write(json_encode($out));
          return $response->withStatus(400);
        }
        $tipoA="A";
        if ($request->hasHeader('Canal')) {
            $YB = $request->getHeader('Canal');
            if ($YB[0]==="web") {
              $tipoA="W";
            }
        }
        //Realizo consulta de puertas a DB
        $id_usuario= trim($body["id_usuario"]);
        try {
            $eventos= [];
            $promocion=[];
            $ruta= "https://teatrosanchezaguilar.org/imagenes/evento/";
            $sql = "SELECT te.nombre ,te.id_evento, tfc.cantidad_ticket, tfc.id_factor_compra AS id_promo, tp.tipo_acceso FROM tsa_evento te INNER JOIN tsa_factor_compra tfc ON te.id_evento = tfc.id_evento INNER JOIN tsa_promocion tp ON tp.id_promocion=tfc.id_promocion and te.id_evento=1 and te.estado='A' and tfc.estado='A'";
            $statement = $db->prepare($sql);
            $result = $statement->execute();
            $band=false;
            while($item = $statement->fetch()){
                if ($item->tipo_acceso=="T" | str_contains($item->tipo_acceso, $tipoA)) {
                  $band=true;
                  if ($item->cantidad_ticket==0) {
                    $sql1= "SELECT * FROM tsa_evento WHERE estado='A' and tipo='V'";
                    $statement1 = $db->prepare($sql1);
                    $result1 = $statement1->execute();
                    while($item1 = $statement1->fetch()){
                        if (!in_array($item1->id_evento, $eventos)) {
                          $promocion[]= array('id'=> $item1->id_evento, 'nombre'=> $item1->nombre, 'imagen'=> $ruta_evento.$item1->id_evento."H.png");
                          $eventos[]= $item1->id_evento;
                        }
                    }
                  }else{
                    $sql1= "SELECT COUNT(id_promocion) as total FROM tsa_ticket_promocion_factor_compra WHERE id_promocion =:id_promo and id_usuario_cliente =:id_usuario";
                    $statement1 = $db->prepare($sql1);
                    $statement1->bindValue(':id_promo', $item->id_promo, \PDO::PARAM_STR);
                    $statement1->bindValue(':id_usuario', $id_usuario, \PDO::PARAM_STR);
                    $result1 = $statement1->execute();
                    while($item1 = $statement1->fetch()){
                      if ($item1->total < $item->cantidad_ticket) {
                        $sql2= "SELECT * FROM tsa_evento WHERE estado='A' and tipo='V'";
                        $statement2 = $db->prepare($sql2);
                        $result2 = $statement2->execute();
                        while($item2 = $statement2->fetch()){
                            if (!in_array($item2->id_evento, $eventos)) {
                              $promocion[]= array('id'=> $item2->id_evento, 'nombre'=> $item2->nombre, 'imagen'=> $ruta_evento.$item2->id_evento."H.png");
                              $eventos[]= $item2->id_evento;
                            }
                        }
                      }
                    }
                  }
                }
            }
            $sql = "SELECT te.nombre ,te.id_evento, tfc.cantidad_ticket, tfc.id_factor_pago AS id_promo, tp.tipo_acceso FROM tsa_evento te INNER JOIN tsa_factor_pago tfc ON te.id_evento = tfc.id_evento INNER JOIN tsa_promocion tp ON tp.id_promocion=tfc.id_promocion and te.id_evento =1 and te.estado='A' and tfc.estado='A'";
            $statement = $db->prepare($sql);
            $result = $statement->execute();
            while($item = $statement->fetch()){
                if ($item->tipo_acceso=="T" | str_contains($item->tipo_acceso, $tipoA)) {
                  $band=true;
                  if ($item->cantidad_ticket==0) {
                    $sql1= "SELECT * FROM tsa_evento WHERE estado='A' and tipo='V'";
                    $statement1 = $db->prepare($sql1);
                    $result1 = $statement1->execute();
                    while($item1 = $statement1->fetch()){
                        if (!in_array($item1->id_evento, $eventos)) {
                          $promocion[]= array('id'=> $item1->id_evento, 'nombre'=> $item1->nombre, 'imagen'=> $ruta_evento.$item1->id_evento."H.png");
                          $eventos[]= $item1->id_evento;
                        }
                    }
                  }else{
                    $sql1= "SELECT COUNT(id_promocion) as total FROM tsa_ticket_promocion_factor_pago WHERE id_promocion =:id_promo and id_usuario_cliente =:id_usuario";
                    $statement1 = $db->prepare($sql1);
                    $statement1->bindValue(':id_promo', $item->id_promo, \PDO::PARAM_STR);
                    $statement1->bindValue(':id_usuario', $id_usuario, \PDO::PARAM_STR);
                    $result1 = $statement1->execute();
                    while($item1 = $statement1->fetch()){
                      if ($item1->total < $item->cantidad_ticket) {
                        $sql2= "SELECT * FROM tsa_evento WHERE estado='A' and tipo='V'";
                        $statement2 = $db->prepare($sql2);
                        $result2 = $statement2->execute();
                        while($item2 = $statement2->fetch()){
                            if (!in_array($item2->id_evento, $eventos)) {
                              $promocion[]= array('id'=> $item2->id_evento, 'nombre'=> $item2->nombre, 'imagen'=> $ruta_evento.$item2->id_evento."H.png");
                              $eventos[]= $item2->id_evento;
                            }
                        }
                      }
                    }
                  }
                }
            }
            if ($band) {
              $response->getBody()->write(json_encode($promocion));
                return $response;
            }
            $sql = "SELECT te.nombre ,te.id_evento, tfc.cantidad_ticket, tfc.id_factor_compra AS id_promo, tp.tipo_acceso FROM tsa_evento te INNER JOIN tsa_factor_compra tfc ON te.id_evento = tfc.id_evento INNER JOIN tsa_promocion tp ON tp.id_promocion=tfc.id_promocion and te.id_evento !=1 and te.estado='A' and tfc.estado='A'";
            $statement = $db->prepare($sql);
            $result = $statement->execute();

            while($item = $statement->fetch()){
              if ($item->tipo_acceso=="T" | str_contains($item->tipo_acceso, $tipoA)) {
                if (!in_array($item->id_evento, $eventos)) {
                    if ($item->cantidad_ticket==0) {
                      $promocion[]= array('id'=> $item->id_evento, 'nombre'=> $item->nombre, 'imagen'=> $ruta_evento.$item->id_evento."H.png");
                      $eventos[]= $item->id_evento;
                    }else{
                      $sql1= "SELECT COUNT(id_promocion) as total FROM tsa_ticket_promocion_factor_compra WHERE id_promocion =:id_promo and id_usuario_cliente =:id_usuario";
                      $statement1 = $db->prepare($sql1);
                      $statement1->bindValue(':id_promo', $item->id_promo, \PDO::PARAM_STR);
                      $statement1->bindValue(':id_usuario', $id_usuario, \PDO::PARAM_STR);
                      $result1 = $statement1->execute();
                      while($item1 = $statement1->fetch()){
                        if ($item1->total < $item->cantidad_ticket) {
                          $promocion[]= array('id'=> $item->id_evento, 'nombre'=> $item->nombre, 'imagen'=> $ruta_evento.$item->id_evento."H.png");
                          $eventos[]= $item->id_evento;
                        }
                      }
                    }

                }
              }
            }
            $sql = "SELECT te.nombre ,te.id_evento, tfc.cantidad_ticket, tfc.id_cruzados AS id_promo, tp.tipo_acceso FROM tsa_evento te INNER JOIN tsa_cruzados tfc ON te.id_evento = tfc.id_evento INNER JOIN tsa_promocion tp ON tp.id_promocion=tfc.id_promocion and te.id_evento !=1 and te.estado='A' and tfc.estado='A'";
            $statement = $db->prepare($sql);
            $result = $statement->execute();
            while($item = $statement->fetch()){
              if ($item->tipo_acceso=="T" | str_contains($item->tipo_acceso, $tipoA)) {
                if (!in_array($item->id_evento, $eventos)) {
                    if ($item->cantidad_ticket==0) {
                      $promocion[]= array('id'=> $item->id_evento, 'nombre'=> $item->nombre, 'imagen'=> $ruta_evento.$item->id_evento."H.png");
                      $eventos[]= $item->id_evento;
                    }else{
                      $sql1= "SELECT COUNT(id_promocion) as total FROM tsa_ticket_promocion_cruzados WHERE id_promocion =:id_promo and id_usuario_cliente =:id_usuario";
                      $statement1 = $db->prepare($sql1);
                      $statement1->bindValue(':id_promo', $item->id_promo, \PDO::PARAM_STR);
                      $statement1->bindValue(':id_usuario', $id_usuario, \PDO::PARAM_STR);
                      $result1 = $statement1->execute();
                      while($item1 = $statement1->fetch()){
                        if ($item1->total < $item->cantidad_ticket) {
                          $promocion[]= array('id'=> $item->id_evento, 'nombre'=> $item->nombre, 'imagen'=> $ruta_evento.$item->id_evento."H.png");
                          $eventos[]= $item->id_evento;
                        }
                      }
                    }
                }
              }
            }
            $sql = "SELECT te.nombre ,te.id_evento, tfc.cantidad_ticket, tfc.id_factor_pago AS id_promo, tp.tipo_acceso FROM tsa_evento te INNER JOIN tsa_factor_pago tfc ON te.id_evento = tfc.id_evento INNER JOIN tsa_promocion tp ON tp.id_promocion=tfc.id_promocion  and te.id_evento !=1 and te.estado='A' and tfc.estado='A'";
            $statement = $db->prepare($sql);
            $result = $statement->execute();
            while($item = $statement->fetch()){
              if ($item->tipo_acceso=="T" | str_contains($item->tipo_acceso, $tipoA)) {
                if (!in_array($item->id_evento, $eventos)) {
                    if ($item->cantidad_ticket==0) {
                      $promocion[]= array('id'=> $item->id_evento, 'nombre'=> $item->nombre, 'imagen'=> $ruta_evento.$item->id_evento."H.png");
                      $eventos[]= $item->id_evento;
                    }else{
                      $sql1= "SELECT COUNT(id_promocion) as total FROM tsa_ticket_promocion_factor_pago WHERE id_promocion =:id_promo and id_usuario_cliente =:id_usuario";
                      $statement1 = $db->prepare($sql1);
                      $statement1->bindValue(':id_promo', $item->id_promo, \PDO::PARAM_STR);
                      $statement1->bindValue(':id_usuario', $id_usuario, \PDO::PARAM_STR);
                      $result1 = $statement1->execute();
                      while($item1 = $statement1->fetch()){
                        if ($item1->total < $item->cantidad_ticket) {
                          $promocion[]= array('id'=> $item->id_evento, 'nombre'=> $item->nombre, 'imagen'=> $ruta_evento.$item->id_evento."H.png");
                          $eventos[]= $item->id_evento;
                        }
                      }
                    }

                }
              }
            }

            $response->getBody()->write(json_encode($promocion));
        } catch (\PDOException $th) {
            $result = false;
            $out["codigo"] = "102";
            $out["mensaje"] = $error_102_mensaje;
            $out["causa"] = $error_102_causa;
            $out["error"] = $th->getMessage();
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }


        return $response;
    }

    public function getPromocion($request, $response, $args){
        include("error.php");
        $response = $response->withHeader('Content-Type', 'application/json');
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
            $out["codigo"] = "100";
            $out["mensaje"] = $error_100_mensaje;
            $out["causa"] =  $error_100_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            $out["codigo"] = "101";
            $out["mensaje"] = $error_101_mensaje;
            $out["causa"] = $error_101_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(401);
        }
        // FIN VALIDACION
        $json = $request->getBody();
        $body = json_decode($json, true);
        if (!(isset($body["id_evento"]) && isset($body["id_usuario"]))){
          $out["codigo"] = "201";
          $out["mensaje"] = $error_201_mensaje;
          $out["causa"] = $error_201_causa;
          $response->getBody()->write(json_encode($out));
          return $response->withStatus(400);
        }
        //Realizo consulta de puertas a DB
        $id_evento= trim($body["id_evento"]);
        $id_usuario= trim($body["id_usuario"]);
        try {
            $promocion=[];
            $ruta= "https://teatrosanchezaguilar.org/imagenes/evento/";
            $sql = "SELECT * FROM tsa_promocion tp INNER JOIN tsa_factor_compra tfc ON tp.id_promocion =tfc.id_promocion and tfc.estado ='A' and fecha_inicio <= NOW() and fecha_final >=NOW() and (tfc.id_evento=:id_evento  OR tfc.id_evento=1) ";
            $statement = $db->prepare($sql);
            $statement->bindValue(':id_evento', $id_evento, \PDO::PARAM_STR);
            $result = $statement->execute();
            while($item = $statement->fetch()){
              $cantidad_ticket=$item->cantidad_ticket;
              if ($cantidad_ticket==0) {
                $promocion[]= array('id_promocion'=> $item->id_factor_compra, 'nombre'=> $item->nombre, 'compra'=> $item->compra, 'pago'=> $item->pago, 'descripcion'=> $item->descripcion, 'amigo_teatro'=> $item->amigo_teatro,
                'id_platea'=> $item->id_platea,'id_funcion'=> $item->id_funcion,'cantidad_ticket'=> $cantidad_ticket,'tipo'=>'FC' );
              }else{
                $sql1= "SELECT COUNT(id_promocion) as total FROM tsa_ticket_promocion_factor_compra WHERE id_promocion =:id_promo and id_usuario_cliente =:id_usuario";
                $statement1 = $db->prepare($sql1);
                $statement1->bindValue(':id_promo', $item->id_factor_compra, \PDO::PARAM_STR);
                $statement1->bindValue(':id_usuario', $id_usuario, \PDO::PARAM_STR);
                $result1 = $statement1->execute();
                while($item1 = $statement1->fetch()){
                  if ($item1->total < $cantidad_ticket) {
                    $canti=$cantidad_ticket-$item1->total;
                    $promocion[]= array('id_promocion'=> $item->id_factor_compra, 'nombre'=> $item->nombre, 'compra'=> $item->compra, 'pago'=> $item->pago, 'descripcion'=> $item->descripcion, 'amigo_teatro'=> $item->amigo_teatro,
                    'id_platea'=> $item->id_platea,'id_funcion'=> $item->id_funcion,'cantidad_ticket'=> $canti."",'tipo'=>'FC' );
                  }
                }
              }
            }
            $sql = "SELECT * FROM tsa_promocion tp INNER JOIN tsa_cruzados tfc ON tp.id_promocion =tfc.id_promocion and tfc.estado ='A' and fecha_inicio <= NOW() and fecha_final >=NOW() and (tfc.id_evento=:id_evento  OR tfc.id_evento=1) ";
            $statement = $db->prepare($sql);
            $statement->bindValue(':id_evento', $id_evento, \PDO::PARAM_STR);
            $result = $statement->execute();
            while($item = $statement->fetch()){
              $cantidad_ticket=$item->cantidad_ticket;
              if ($cantidad_ticket==0) {
                $promocion[]= array('id_promocion'=> $item->id_cruzados, 'nombre'=> $item->nombre, 'cantidad'=> $item->cantidad, 'id_evento2'=> $item->id_evento2, 'cantidad2'=> $item->cantidad2, 'descuento'=> $item->descuento, 'descripcion'=> $item->descripcion, 'amigo_teatro'=> $item->amigo_teatro,
                'id_platea'=> $item->id_platea,'id_funcion'=> $item->id_funcion,'cantidad_ticket'=> $item->cantidad_ticket,'tipo'=>'CD');
              }else{
                $sql1= "SELECT COUNT(id_promocion) as total FROM tsa_ticket_promocion_cruzados  WHERE id_promocion =:id_promo and id_usuario_cliente =:id_usuario";
                $statement1 = $db->prepare($sql1);
                $statement1->bindValue(':id_promo', $item->id_cruzados, \PDO::PARAM_STR);
                $statement1->bindValue(':id_usuario', $id_usuario, \PDO::PARAM_STR);
                $result1 = $statement1->execute();
                while($item1 = $statement1->fetch()){
                  if ($item1->total < $cantidad_ticket) {
                    $canti=$cantidad_ticket-$item1->total;
                    $promocion[]= array('id_promocion'=> $item->id_cruzados, 'nombre'=> $item->nombre, 'cantidad'=> $item->cantidad, 'id_evento2'=> $item->id_evento2, 'cantidad2'=> $item->cantidad2, 'descuento'=> $item->descuento, 'descripcion'=> $item->descripcion, 'amigo_teatro'=> $item->amigo_teatro,
                    'id_platea'=> $item->id_platea,'id_funcion'=> $item->id_funcion,'cantidad_ticket'=> $canti."",'tipo'=>'CD');
                  }
                }
              }

            }
            $sql = "SELECT * FROM tsa_promocion tp INNER JOIN tsa_factor_pago tfc ON tp.id_promocion =tfc.id_promocion and tfc.estado ='A' and fecha_inicio <= NOW() and fecha_final >=NOW() and (tfc.id_evento=:id_evento  OR tfc.id_evento=1)";
            $statement = $db->prepare($sql);
            $statement->bindValue(':id_evento', $id_evento, \PDO::PARAM_STR);
            $result = $statement->execute();
            while($item = $statement->fetch()){
              $cantidad_ticket=$item->cantidad_ticket;
              if ($cantidad_ticket==0) {
                $promocion[]= array('id_promocion'=> $item->id_factor_pago, 'nombre'=> $item->nombre, 'desde'=> $item->desde, 'hasta'=> $item->hasta, 'descuento'=> $item->descuento, 'descripcion'=> $item->descripcion, 'amigo_teatro'=> $item->amigo_teatro,
                'id_platea'=> $item->id_platea,'id_funcion'=> $item->id_funcion,'cantidad_ticket'=> $item->cantidad_ticket,'tipo'=>'FP');
              }else{
                $sql1= "SELECT COUNT(id_promocion) as total FROM tsa_ticket_promocion_factor_pago WHERE id_promocion =:id_promo and id_usuario_cliente =:id_usuario";
                $statement1 = $db->prepare($sql1);
                $statement1->bindValue(':id_promo', $item->id_factor_pago, \PDO::PARAM_STR);
                $statement1->bindValue(':id_usuario', $id_usuario, \PDO::PARAM_STR);
                $result1 = $statement1->execute();
                while($item1 = $statement1->fetch()){
                  if ($item1->total < $cantidad_ticket) {
                    $canti=$cantidad_ticket-$item1->total;
                    $promocion[]= array('id_promocion'=> $item->id_factor_pago, 'nombre'=> $item->nombre, 'desde'=> $item->desde, 'hasta'=> $item->hasta, 'descuento'=> $item->descuento, 'descripcion'=> $item->descripcion, 'amigo_teatro'=> $item->amigo_teatro,
                    'id_platea'=> $item->id_platea,'id_funcion'=> $item->id_funcion,'cantidad_ticket'=> $canti."",'tipo'=>'FP');
                  }
                }
              }


            }
            $response->getBody()->write(json_encode($promocion));
        } catch (\PDOException $th) {
            $result = false;
            $out["codigo"] = "102";
            $out["mensaje"] = $error_102_mensaje;
            $out["causa"] = $error_102_causa;
            $out["error"] = $th->getMessage();
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }


        return $response;
    }

    public function getPromocion_tarjeta($request, $response, $args){
        include("error.php");
        $response = $response->withHeader('Content-Type', 'application/json');
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
            $out["codigo"] = "100";
            $out["mensaje"] = $error_100_mensaje;
            $out["causa"] =  $error_100_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            $out["codigo"] = "101";
            $out["mensaje"] = $error_101_mensaje;
            $out["causa"] = $error_101_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(401);
        }
        // FIN VALIDACION
        $json = $request->getBody();
        $body = json_decode($json, true);
        if (!(isset($body["id_usuario"]))){
          $out["codigo"] = "201";
          $out["mensaje"] = $error_201_mensaje;
          $out["causa"] = $error_201_causa;
          $response->getBody()->write(json_encode($out));
          return $response->withStatus(400);
        }
        //Realizo consulta de puertas a DB
        $id_usuario= trim($body["id_usuario"]);
        try {
            $promocion=[];
            $sql = "SELECT tp.*, tt.nombre as nombreT, tt.tipo as tipoT, tfc.id_banco_tarjeta, tfc.nombre , tfc.descuento, tfc.cantidad_ticket, tfc.id_evento FROM tsa_promocion tp INNER JOIN tsa_banco_tarjeta tfc ON tp.id_promocion =tfc.id_promocion INNER JOIN tsa_tarjeta tt ON tt.id_tarjeta = tfc.id_tarjeta  and tfc.estado ='A' and fecha_inicio <= NOW() and fecha_final >=NOW()";
            $statement = $db->prepare($sql);

            $result = $statement->execute();
            while($item = $statement->fetch()){
              $cantidad_ticket=$item->cantidad_ticket;
              if ($cantidad_ticket==0) {
                $promocion[]= array('id_promocion'=> $item->id_banco_tarjeta, 'nombre'=> $item->nombre, 'tarjeta'=> $item->nombreT, 'tipo_tarjeta'=> $item->tipoT, 'descuento'=> $item->descuento, 'descripcion'=> $item->descripcion, 'amigo_teatro'=> $item->amigo_teatro,
                'id_platea'=> $item->id_platea,'id_funcion'=> $item->id_funcion,'cantidad_ticket'=> $item->cantidad_ticket,'tipo'=>'BT','id_evento'=> $item->id_evento);
              }else{
                $sql1= "SELECT COUNT(id_promocion) as total FROM tsa_ticket_promocion_tarjeta WHERE id_promocion =:id_promo and id_usuario_cliente =:id_usuario";
                $statement1 = $db->prepare($sql1);
                $statement1->bindValue(':id_promo', $item->id_banco_tarjeta, \PDO::PARAM_STR);
                $statement1->bindValue(':id_usuario', $id_usuario, \PDO::PARAM_STR);
                $result1 = $statement1->execute();
                while($item1 = $statement1->fetch()){
                  if ($item1->total < $cantidad_ticket) {
                    $canti=$cantidad_ticket-$item1->total;
                    $promocion[]= array('id_promocion'=> $item->id_banco_tarjeta, 'nombre'=> $item->nombre, 'tarjeta'=> $item->nombreT, 'tipo_tarjeta'=> $item->tipoT, 'descuento'=> $item->descuento, 'descripcion'=> $item->descripcion, 'amigo_teatro'=> $item->amigo_teatro,
                    'id_platea'=> $item->id_platea,'id_funcion'=> $item->id_funcion,'cantidad_ticket'=> $canti."",'tipo'=>'BT','id_evento'=> $item->id_evento);
                  }
                }
              }

            }
            $response->getBody()->write(json_encode($promocion));
        } catch (\PDOException $th) {
            $result = false;
            $out["codigo"] = "102";
            $out["mensaje"] = $error_102_mensaje;
            $out["causa"] = $error_102_causa;
            $out["error"] = $th->getMessage();
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }


        return $response;
    }

    public function insertCodigo($request, $response, $args){
        include("error.php");
        $response = $response->withHeader('Content-Type', 'application/json');
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
            $out["codigo"] = "100";
            $out["mensaje"] = $error_100_mensaje;
            $out["causa"] =  $error_100_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            $out["codigo"] = "101";
            $out["mensaje"] = $error_101_mensaje;
            $out["causa"] = $error_101_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(401);
        }

        // FIN VALIDACION
        $json = $request->getBody();
        $body = json_decode($json, true);
        if (!(isset($body["codigo"]) && isset($body["id_evento"]) && isset($body["id_usuario"]))){
          $out["codigo"] = "201";
          $out["mensaje"] = $error_201_mensaje;
          $out["causa"] = $error_201_causa;
          $response->getBody()->write(json_encode($out));
          return $response->withStatus(400);
        }

        //Realizo consulta de puertas a DB
        $codigo= trim($body["codigo"]);
        $id_evento= trim($body["id_evento"]);
        $id_usuario= trim($body["id_usuario"]);
        try {
            $promocion=[];
            $ruta= "https://teatrosanchezaguilar.org/imagenes/evento/";
            $sql = "SELECT * FROM tsa_promocion tp INNER JOIN tsa_codigo_promocional tfc ON tp.id_promocion =tfc.id_promocion and tfc.estado ='A' and fecha_inicio <= NOW() and fecha_final >=NOW() and tfc.codigo=:codigo and ( tfc.id_evento=:id_evento or tfc.id_evento=1)";
            $statement = $db->prepare($sql);
            $statement->bindValue(':codigo', $codigo, \PDO::PARAM_STR);
            $statement->bindValue(':id_evento', $id_evento, \PDO::PARAM_STR);
            $result = $statement->execute();
            while($item = $statement->fetch()){
              $cantidad_ticket=$item->cantidad_ticket;
              if ($cantidad_ticket==0) {
                $promocion[]= array('id_promocion'=> $item->id_codigo_promocional, 'nombre'=> $item->nombre, 'codigo'=> $item->codigo, 'descuento'=> $item->descuento, 'descripcion'=> $item->descripcion, 'amigo_teatro'=> $item->amigo_teatro,
                'id_platea'=> $item->id_platea,'id_funcion'=> $item->id_funcion,'cantidad_ticket'=> $item->cantidad_ticket,'tipo'=>'CP' );
              }else{
                $sql1= "SELECT COUNT(id_promocion) as total FROM tsa_ticket_promocion_codigo WHERE id_promocion =:id_promo and id_usuario_cliente =:id_usuario";
                $statement1 = $db->prepare($sql1);
                $statement1->bindValue(':id_promo', $item->id_codigo_promocional, \PDO::PARAM_STR);
                $statement1->bindValue(':id_usuario', $id_usuario, \PDO::PARAM_STR);
                $result1 = $statement1->execute();
                while($item1 = $statement1->fetch()){
                  if ($item1->total < $cantidad_ticket) {
                    $canti=$cantidad_ticket-$item1->total;
                    $promocion[]= array('id_promocion'=> $item->id_codigo_promocional, 'nombre'=> $item->nombre, 'codigo'=> $item->codigo, 'descuento'=> $item->descuento, 'descripcion'=> $item->descripcion, 'amigo_teatro'=> $item->amigo_teatro,
                    'id_platea'=> $item->id_platea,'id_funcion'=> $item->id_funcion,'cantidad_ticket'=> $canti."",'tipo'=>'CP' );
                  }
                }
              }
            }

            $response->getBody()->write(json_encode($promocion));
        } catch (\PDOException $th) {
            $result = false;
            $out["codigo"] = "102";
            $out["mensaje"] = $error_102_mensaje;
            $out["causa"] = $error_102_causa;
            $out["error"] = $th->getMessage();
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        return $response;
    }

    public function callback($request, $response, $args){
        include("error.php");
        $response = $response->withHeader('Content-Type', 'application/json');
        $db = $this->container->get('db');
        // VALIDACION DE TOKEN
        // FIN VALIDACION
        $json = $request->getBody();
        $body = json_decode($json, true);
        try {
            $status="";
            $order_description="";
            $authorization_code="";
            $status_detail="";
            $date="";
            $message="";
            $id="";
            $dev_reference="";
            $carrier_code="";
            $amount="";
            $paid_date="";
            $installments="";
            $ltp_id="";
            $stoken="";
            $application_code="";
            $userid="";
            $useremail="";
            $bin="";
            $holder_name="";
            $type="";
            $number="";
            $origin="";
            if (!(isset($body["transaction"]["status"]))){
              $out["codigo"] = "201";
              $out["mensaje"] = $error_201_mensaje;
              $out["causa"] = $error_201_causa;
              $response->getBody()->write(json_encode($out));
              return $response->withStatus(203);
            }

            $status=$body["transaction"]["status"];
            $order_description=$body["transaction"]["order_description"];
            $authorization_code=$body["transaction"]["authorization_code"];
            $status_detail=$body["transaction"]["status_detail"];
            $date=$body["transaction"]["date"];
            $message=$body["transaction"]["message"];
            $id=$body["transaction"]["id"];
            $dev_reference=$body["transaction"]["dev_reference"];
            $carrier_code=$body["transaction"]["carrier_code"];
            $amount=$body["transaction"]["amount"];
            $paid_date=$body["transaction"]["paid_date"];
            $installments=$body["transaction"]["installments"];
            $ltp_id=$body["transaction"]["ltp_id"];
            $stoken=$body["transaction"]["stoken"];
            $application_code=$body["transaction"]["application_code"];
            $userid=$body["user"]["id"];
            $useremail=$body["user"]["email"];
            $bin=$body["card"]["bin"];
            $holder_name=$body["card"]["holder_name"];
            $type=$body["card"]["type"];
            $number=$body["card"]["number"];
            $origin=$body["card"]["origin"];
            $id_callback_paymentez=0;
            $band=true;
            $sql = "SELECT * FROM tsa_callback_paymentez Where id=:id_callback_paymentez";
            $statement = $db->prepare($sql);
            $statement->bindValue(':id_callback_paymentez', $id, \PDO::PARAM_STR);
            $result = $statement->execute();

            while($item = $statement->fetch()){
                $band=false;
                  $id_callback_paymentez=$item->id_callback_paymentez;
            }
            if ($band) {
              $sql = "INSERT INTO teatro_backup.tsa_callback_paymentez (status,order_description,authorization_code,status_detail,`date`,message,id,dev_reference,carrier_code,amount,paid_date,installments,ltp_id,stoken,application_code,userid,useremail,bin,holder_name,`type`,`number`,origin)
    	        VALUES (:status,:order_description,:authorization_code,:status_detail,:date1,:message,:id,:dev_reference,:carrier_code,:amount,:paid_date,:installments,:ltp_id,:stoken,:application_code,:userid,:useremail,:bin,:holder_name,:type1,:number1,:origin)";
              $statement = $db->prepare($sql);
              $statement->bindValue(':status', $status, \PDO::PARAM_STR);
              $statement->bindValue(':order_description', $order_description, \PDO::PARAM_STR);
              $statement->bindValue(':authorization_code', $authorization_code, \PDO::PARAM_STR);
              $statement->bindValue(':status_detail', $status_detail, \PDO::PARAM_STR);
              $statement->bindValue(':date1', $date, \PDO::PARAM_STR);
              $statement->bindValue(':message', $message, \PDO::PARAM_STR);
              $statement->bindValue(':id', $id, \PDO::PARAM_STR);
              $statement->bindValue(':dev_reference', $dev_reference, \PDO::PARAM_STR);
              $statement->bindValue(':carrier_code', $carrier_code, \PDO::PARAM_STR);
              $statement->bindValue(':amount', $amount, \PDO::PARAM_STR);
              $statement->bindValue(':paid_date', $paid_date, \PDO::PARAM_STR);
              $statement->bindValue(':installments', $installments, \PDO::PARAM_STR);
              $statement->bindValue(':ltp_id', $ltp_id, \PDO::PARAM_STR);
              $statement->bindValue(':stoken', $stoken, \PDO::PARAM_STR);
              $statement->bindValue(':application_code', $application_code, \PDO::PARAM_STR);
              $statement->bindValue(':userid', $userid, \PDO::PARAM_STR);
              $statement->bindValue(':useremail', $useremail, \PDO::PARAM_STR);
              $statement->bindValue(':bin', $bin, \PDO::PARAM_STR);
              $statement->bindValue(':holder_name', $holder_name, \PDO::PARAM_STR);
              $statement->bindValue(':type1', $type, \PDO::PARAM_STR);
              $statement->bindValue(':number1', $number, \PDO::PARAM_STR);
              $statement->bindValue(':origin', $origin, \PDO::PARAM_STR);
              $statement->execute();
            }else {
              $sql = "UPDATE teatro_backup.tsa_callback_paymentez SET status=:status,order_description=:order_description,authorization_code=:authorization_code,status_detail=:status_detail,
              `date`=:date1,message=:message,id=:id,dev_reference=:dev_reference,carrier_code=:carrier_code,amount=:amount,paid_date=:paid_date,installments=:installments,ltp_id=:ltp_id,stoken=:stoken,
              application_code=:application_code,userid=:userid,useremail=:useremail,bin=:bin,holder_name=:holder_name,`type`=:type1,`number`=:number1,origin=:origin,fecha_modificacion=now()
              WHERE id_callback_paymentez=:id_callback_paymentez";
              $statement = $db->prepare($sql);
              $statement->bindValue(':status', $status, \PDO::PARAM_STR);
              $statement->bindValue(':order_description', $order_description, \PDO::PARAM_STR);
              $statement->bindValue(':authorization_code', $authorization_code, \PDO::PARAM_STR);
              $statement->bindValue(':status_detail', $status_detail, \PDO::PARAM_STR);
              $statement->bindValue(':date1', $date, \PDO::PARAM_STR);
              $statement->bindValue(':message', $message, \PDO::PARAM_STR);
              $statement->bindValue(':id', $id, \PDO::PARAM_STR);
              $statement->bindValue(':dev_reference', $dev_reference, \PDO::PARAM_STR);
              $statement->bindValue(':carrier_code', $carrier_code, \PDO::PARAM_STR);
              $statement->bindValue(':amount', $amount, \PDO::PARAM_STR);
              $statement->bindValue(':paid_date', $paid_date, \PDO::PARAM_STR);
              $statement->bindValue(':installments', $installments, \PDO::PARAM_STR);
              $statement->bindValue(':ltp_id', $ltp_id, \PDO::PARAM_STR);
              $statement->bindValue(':stoken', $stoken, \PDO::PARAM_STR);
              $statement->bindValue(':application_code', $application_code, \PDO::PARAM_STR);
              $statement->bindValue(':userid', $userid, \PDO::PARAM_STR);
              $statement->bindValue(':useremail', $useremail, \PDO::PARAM_STR);
              $statement->bindValue(':bin', $bin, \PDO::PARAM_STR);
              $statement->bindValue(':holder_name', $holder_name, \PDO::PARAM_STR);
              $statement->bindValue(':type1', $type, \PDO::PARAM_STR);
              $statement->bindValue(':number1', $number, \PDO::PARAM_STR);
              $statement->bindValue(':origin', $origin, \PDO::PARAM_STR);
              $statement->bindValue(':id_callback_paymentez', $id_callback_paymentez, \PDO::PARAM_INT);
              $statement->execute();
            }

        } catch (\PDOException $th) {
            $result = false;
            $out["codigo"] = "100";
            $out["mensaje"] = $error_100_mensaje;
            $out["causa"] =  $error_100_causa;
            $out["error"] = $th->getMessage();
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(203);
        }
        //Realizo consulta de puertas a DB
        $response->getBody()->write(json_encode("true"));
        return $response;
    }

    public function insertRegistro_gratuito($request, $response, $args){
        include("error.php");
        include ("conect.php");
        $response = $response->withHeader('Content-Type', 'application/json');
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
            $out["codigo"] = "100";
            $out["mensaje"] = $error_100_mensaje;
            $out["causa"] =  $error_100_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            $out["codigo"] = "101";
            $out["mensaje"] = $error_101_mensaje;
            $out["causa"] = $error_101_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(401);
        }

        // FIN VALIDACION
        $json = $request->getBody();
        $body = json_decode($json, true);
        if (!(isset($body["nombres"]) && isset($body["apellidos"]) && isset($body["cedula"])  && isset($body["correo"])  && isset($body["celular"])
         && isset($body["fecha_nacimiento"]) && isset($body["id_funcion"])  && isset($body["id_usuario"]) && isset($body["cantidad"]))){
          $out["codigo"] = "201";
          $out["mensaje"] = $error_201_mensaje;
          $out["causa"] = $error_201_causa;
          $response->getBody()->write(json_encode($out));
          return $response->withStatus(400);
        }

        //Realizo consulta de puertas a DB
        $nombres= trim($body["nombres"]);
        $apellidos= trim($body["apellidos"]);
        $cedula= trim($body["cedula"]);
        $correo= trim($body["correo"]);
        $celular= trim($body["celular"]);
        $fecha_nacimiento= trim($body["fecha_nacimiento"]);
        $id_funcion= trim($body["id_funcion"]);
        $id_usuario= trim($body["id_usuario"]);
        $cantidad= trim($body["cantidad"]);
        try {
          $tipoA="A";
          if ($request->hasHeader('Canal')) {
              $YB = $request->getHeader('Canal');
              if ($YB[0]==="web") {
                $tipoA="W";
              }
          }
          $sql = "INSERT INTO teatro_backup.tsa_registro_gratuito (nombres,apellidos,cedula,correo,celular,fecha_nacimiento,id_funcion,usuario_creacion,id_usuario_cliente,tipo,cantidad)
          VALUES (:nombres,:apellidos,:cedula,:correo,:celular,:fecha_nacimiento,:id_funcion,:id_usuario,:id_usuario,:tipo,:cantidad)";
          $statement = $db->prepare($sql);
          $statement->bindValue(':nombres', $nombres, \PDO::PARAM_STR);
          $statement->bindValue(':apellidos', $apellidos, \PDO::PARAM_STR);
          $statement->bindValue(':cedula', $cedula, \PDO::PARAM_STR);
          $statement->bindValue(':correo', $correo, \PDO::PARAM_STR);
          $statement->bindValue(':celular', $celular, \PDO::PARAM_STR);
          $statement->bindValue(':fecha_nacimiento', $fecha_nacimiento, \PDO::PARAM_STR);
          $statement->bindValue(':id_funcion', $id_funcion, \PDO::PARAM_STR);
          $statement->bindValue(':id_usuario', $id_usuario, \PDO::PARAM_STR);
          $statement->bindValue(':id_usuario_cliente', $id_usuario, \PDO::PARAM_STR);
          $statement->bindValue(':tipo', $tipoA, \PDO::PARAM_STR);
          $statement->bindValue(':cantidad', $cantidad, \PDO::PARAM_STR);
          $statement->execute();
          $id_ticket=$db->lastInsertId();
          $sql= "  SELECT te.nombre ,te.duracion ,te.id_evento ,te.tipo ,te.estado ,ts.nombre as sala, tf.fecha FROM tsa_evento te INNER JOIN tsa_funcion tf ON te.id_evento =tf.id_evento INNER JOIN tsa_sala_mapa tsm ON tsm.id_sala_mapa =te.id_sala_mapa INNER JOIN tsa_sala ts ON ts.id_sala =tsm.id_sala and tf.id_funcion =:id_funcion";
          $statement = $db->prepare($sql);
          $statement->bindValue(':id_funcion', $id_funcion, \PDO::PARAM_STR);
          $ticket=[];
          $asient=[];
          $result = $statement->execute();
          while($item = $statement->fetch()){
              $cad = "000000000000";
              $miCadena = strval($id_ticket);
              $cant=strlen($miCadena);
              $xx=11-$cant;
              $miCadena=substr($cad, 0, $xx).$miCadena."2";
              $auth_token = base64_encode($miCadena);
              $auth_token1 = base64_encode($auth_token);
              $ticket= array('id_ticket'=> $id_ticket, 'nombre'=> $item->nombre, 'duracion'=> $item->duracion, 'imagen'=> $ruta_evento.$item->id_evento."H.png",
             'tipo'=> $item->tipo,'sala'=> $item->sala,'precio'=>"",'fecha'=> $item->fecha,'estado'=> $item->estado,'qr'=>$auth_token1,'asientos'=>$cantidad);

             $client->sendMail1("9", $correo, $id_ticket,($nombres).' '.($apellidos),$auth_token1);

          }

        } catch (\PDOException $th) {
            $result = false;
            $out["codigo"] = "102";
            $out["mensaje"] = $error_102_mensaje;
            $out["causa"] = $error_102_causa;
            $out["error"] = $th->getMessage();
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        $response->getBody()->write(json_encode($ticket));
        return $response;
    }


    public function refund($request, $response, $args){
        include("error.php");
        $response = $response->withHeader('Content-Type', 'application/json');
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
            $out["codigo"] = "100";
            $out["mensaje"] = $error_100_mensaje;
            $out["causa"] =  $error_100_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            $out["codigo"] = "101";
            $out["mensaje"] = $error_101_mensaje;
            $out["causa"] = $error_101_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(401);
        }

        // FIN VALIDACION
        $json = $request->getBody();
        $body = json_decode($json, true);
        if (!(isset($body["id_transacion"]))){
          $out["codigo"] = "201";
          $out["mensaje"] = $error_201_mensaje;
          $out["causa"] = $error_201_causa;
          $response->getBody()->write(json_encode($out));
          return $response->withStatus(400);
        }

        //Realizo consulta de puertas a DB
        $id_transacion= trim($body["id_transacion"]);
        $transaccion="";
        try {
          $transaccion=$this->rembolso($id_transacion);
        } catch (\PDOException $th) {
          $out["codigo"] = "221";
          $out["mensaje"] = $error_221_mensaje;
          $out["causa"] = $error_221_causa;
          $response->getBody()->write(json_encode($out));
          return $response->withStatus(400);
        }
        $response->getBody()->write($transaccion);
        return $response;
    }

    public function getCredencial($request, $response, $args){
        include("error.php");
        $response = $response->withHeader('Content-Type', 'application/json');
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
            $out["codigo"] = "100";
            $out["mensaje"] = $error_100_mensaje;
            $out["causa"] =  $error_100_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            $out["codigo"] = "101";
            $out["mensaje"] = $error_101_mensaje;
            $out["causa"] = $error_101_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(401);
        }
        $categorias=  array('LOGIN_DEV_SERVER'=> 'TPP3-EC-SERVER', 'KEY_DEV_SERVER'=> 'JdXTDl2d0o0B8ANZ1heJOq7tf62PC6','LOGIN_DEV_CLIENT'=> 'TPP3-EC-CLIENT', 'KEY_DEV_CLIENT'=> 'ZfapAKOk4QFXheRNvndVib9XU3szzg');
        $response->getBody()->write(json_encode($categorias));
        return $response;
    }

    public function rembolso($id_transacion)
    {
          $API_LOGIN_DEV     = "TPP3-EC-SERVER";
          $API_KEY_DEV       = "JdXTDl2d0o0B8ANZ1heJOq7tf62PC6 ";
          $server_application_code = $API_LOGIN_DEV;
          $server_app_key = $API_KEY_DEV ;
          $date = new \DateTime();
          //$date = date("Y-m-d H:i:s");
          $unix_timestamp = $date->getTimestamp();
          // $unix_timestamp = "1546543146";
          $uniq_token_string = $server_app_key.$unix_timestamp;
          $uniq_token_hash = hash('sha256', $uniq_token_string);
          $auth_token = base64_encode($server_application_code.";".$unix_timestamp.";".$uniq_token_hash);
          $transaction["id"]=$id_transacion;
          $data = array();
          $data["transaction"] =$transaction;
          $url="https://ccapi.paymentez.com/v2/transaction/refund/";
          $curl = curl_init($url);
          $headers = array();
          $headers[] = 'Cache-Control: no-cache';
          $headers[] = 'Auth-Token:'.$auth_token;
          $headers[] = 'Content-Type: application/json; charset= utf-8';
          curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($curl, CURLOPT_POST, true);
          curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
          curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
          $result = curl_exec($curl);
          curl_close($curl);
          return $result;
    }

    public function verificacion_diners($request, $response, $args){
        include("error.php");
        $response = $response->withHeader('Content-Type', 'application/json');
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
            $out["codigo"] = "100";
            $out["mensaje"] = $error_100_mensaje;
            $out["causa"] =  $error_100_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            $out["codigo"] = "101";
            $out["mensaje"] = $error_101_mensaje;
            $out["causa"] = $error_101_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(401);
        }

        // FIN VALIDACION
        $json = $request->getBody();
        $body = json_decode($json, true);
        if (!(isset($body["id_facturacion"]) && isset($body["email"])  && isset($body["donacion"]) && isset($body["user_id"]) && isset($body["user_token"]) && isset($body["dolares_canjeados"]) &&
        isset($body["eventos"]) && isset($body["sub_total"]) && isset($body["total_descuento"]) && isset($body["iva"]) && isset($body["total"]))){
          $out["codigo"] = "201";
          $out["mensaje"] = $error_201_mensaje;
          $out["causa"] = $error_201_causa;
          $response->getBody()->write(json_encode($out));
          return $response->withStatus(400);
        }
        $email= trim($body["email"]);
        $id_facturacion= trim($body["id_facturacion"]);
        $donacion= trim($body["donacion"]);
        $user_id= trim($body["user_id"]);
        $user_token= trim($body["user_token"]);
        $dolares_canjeados= trim($body["dolares_canjeados"]);
        $sub_total= trim($body["sub_total"]);
        $total_descuento= trim($body["total_descuento"]);
        $iva= trim($body["iva"]);
        $total= trim($body["total"]);
        $eventos= explode(';',trim($body["eventos"]));
        $total_iva= $sub_total-$dolares_canjeados-$total_descuento;
        $ivaC= number_format($total_iva*0, 3, '.', '');
        $totalC=  number_format($total_iva+$donacion+$ivaC, 2, '.', '');

        if ($total_iva < 0) {
          $out["codigo"] = "218";
          $out["mensaje"] = $error_218_mensaje;
          $out["causa"] = $error_218_causa;
          $out["Valor sin iva"] = $total_iva;
          $response->getBody()->write(json_encode($out));
          return $response->withStatus(400);
        }
        if ($ivaC != $iva) {
          $out["codigo"] = "217";
          $out["mensaje"] = $error_217_mensaje;
          $out["causa"] = $error_217_causa;
          $out["Iva calculado"] = $ivaC;
          $response->getBody()->write(json_encode($out));
          return $response->withStatus(400);
        }
        if ($totalC != $total) {
          $out["codigo"] = "218";
          $out["mensaje"] = $error_218_mensaje;
          $out["causa"] = $error_218_causa;
          $out["total calculado"] = $totalC;
          $response->getBody()->write(json_encode($out));
          return $response->withStatus(400);
        }
        //VALIDACIONES
        $cantidadT=0;

        $descuentoT=0;
        $lista2=[];
        $ban=false;
        $factorDA =0;
        $descuentoDA =0;
        $totalDA =0;
        $sql = "SELECT *  FROM tsa_factor_amigos ts WHERE ts.id_factor_amigos=1";
        $statement = $db->prepare($sql);
        $result = $statement->execute();
        while($item = $statement->fetch()){
          $factorDA =$item->factor;
          $descuentoDA =$item->descuento;
          $totalDA =$factorDA/$descuentoDA ;
        }
        $sql = "SELECT tuc.puntos_acumulados  from tsa_usuario_cliente tuc WHERE id_usuario_cliente=:id_usuario";
        $statement = $db->prepare($sql);
        $statement->bindValue(':id_usuario', $user_id, \PDO::PARAM_STR);
        $result = $statement->execute();
        $item = $statement->fetch();
        if (!$item){
          $out["codigo"] = "202";
          $out["mensaje"] = $error_202_mensaje;
          $out["causa"] =  $error_202_causa;
          $response->getBody()->write(json_encode($out));
          return $response->withStatus(400);
        }else{
          $val=$dolares_canjeados*$totalDA;
          if ($val>$item->puntos_acumulados) {
            $out["codigo"] = "224";
            $out["mensaje"] = $error_224_mensaje;
            $out["causa"] =  $error_224_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(400);
          }

        }

        foreach($eventos as $llave => $valores) {
            if($valores!=""){
              $valor= explode(',',trim($valores));
              if (isset($valor[8])) {
                $tipo=$valor[0];
                $id_evento=$valor[1];
                $id_funcion=$valor[2];
                $asientosT=$valor[3];
                $asientos= explode('-',trim($asientosT));
                $id_promocion=$valor[4];
                $tipo_promocion=$valor[5];
                $totalP=$valor[6];
                $descuentoP=$valor[7];
                $cantidadT=$cantidadT+$totalP;
                $descuentoT=$descuentoT+$descuentoP;
                $cantidadT2=0;
                if ($id_promocion!=0) {
                  if ($tipo_promocion=="FC" | $tipo_promocion=="CD" | $tipo_promocion=="FP" | $tipo_promocion=="BT" | $tipo_promocion=="CP") {
                  }else{
                    $out["codigo"] = "220";
                    $out["mensaje"] = $error_220_mensaje;
                    $out["causa"] = $error_220_causa;
                    $response->getBody()->write(json_encode($out));
                    return $response->withStatus(400);
                  }
                }
                foreach($asientos as $llave => $valores1) {
                  $Pcantidad= explode(':',trim($valores1));
                  if ($tipo==1) {
                      if (isset($Pcantidad[2])) {
                          $id_platea=$Pcantidad[0];
                          $cantidad=$Pcantidad[1];
                          $precio=$Pcantidad[2];
                          $cantidadT2=$cantidadT2+$precio;
                      }else{
                        $out["codigo"] = "213";
                        $out["mensaje"] = $error_213_mensaje;
                        $out["causa"] = $error_213_causa;
                        $response->getBody()->write(json_encode($out));
                        return $response->withStatus(400);
                      }
                      $sql = "SELECT bc.id_bloqueo_cantidad FROM tsa_platea tp  INNER JOIN tsa_platea_funcion tpf ON tp.id_platea = tpf.id_platea INNER JOIN tsa_bloqueo_cantidad bc ON bc.id_platea_funcion = tpf.id_platea_funcion and id_funcion=:funcion and tpf.id_platea =:platea and bc.id_usuario_cliente =:id_usuario and bc.cantidad =:cantidad";
                      $statement = $db->prepare($sql);
                      $statement->bindValue(':platea', $id_platea, \PDO::PARAM_STR);
                      $statement->bindValue(':funcion', $id_funcion, \PDO::PARAM_STR);
                      $statement->bindValue(':id_usuario', $user_id, \PDO::PARAM_STR);
                      $statement->bindValue(':cantidad', $cantidad, \PDO::PARAM_STR);
                      $result = $statement->execute();
                      $item = $statement->fetch();
                      if (!$item){
                        $out["codigo"] = "212";
                        $out["mensaje"] = $error_212_mensaje;
                        $out["causa"] =  $error_212_causa;
                        $out["funcion"] =  $id_funcion;
                        $response->getBody()->write(json_encode($out));
                          return $response->withStatus(400);
                      }else{
                        $lista2[]=["1",$item->id_bloqueo_cantidad];
                      }
                  }else if($tipo==2){
                      if (isset($Pcantidad[3])) {
                        $id_platea=$Pcantidad[0];
                        $id_asiento=$Pcantidad[1];
                        $asiento=$Pcantidad[2];
                        $precio=$Pcantidad[3];
                        $cantidadT2=$cantidadT2+$precio;
                      }else{
                        $out["codigo"] = "213";
                        $out["mensaje"] = $error_213_mensaje;
                        $out["causa"] = $error_213_causa;
                        $response->getBody()->write(json_encode($out));
                        return $response->withStatus(400);
                      }
                      $sql = "SELECT * FROM tsa_bloqueo_asiento WHERE id_usuario_cliente=:id_usuario and id_distribucion=:asiento";
                      $statement = $db->prepare($sql);
                      $statement->bindValue(':id_usuario', $user_id, \PDO::PARAM_STR);
                      $statement->bindValue(':asiento', $id_asiento, \PDO::PARAM_STR);
                      $result = $statement->execute();
                      $item = $statement->fetch();
                      if (!$item){
                        $out["codigo"] = "212";
                        $out["mensaje"] = $error_212_mensaje;
                        $out["causa"] =  $error_212_causa;
                        $out["id_asiento"] =  $id_asiento;
                        $response->getBody()->write(json_encode($out));
                        return $response;
                      }else{
                        $lista2[]=["2",$item->id_bloqueo_asiento];
                      }
                  }else{
                    $out["codigo"] = "214";
                    $out["mensaje"] = $error_214_mensaje;
                    $out["causa"] = $error_214_causa;
                    $response->getBody()->write(json_encode($out));
                    return $response->withStatus(400);
                  }
                }
                if ($cantidadT2 != $totalP) {
                  $out["codigo"] = "215";
                  $out["mensaje"] = $error_215_mensaje;
                  $out["causa"] = $error_215_causa;
                  $out["Total"] = $cantidadT2;
                  $out["evento"] = $id_evento;
                  $response->getBody()->write(json_encode($out));
                  return $response->withStatus(400);
                }
              }else{
                $out["codigo"] = "213";
                $out["mensaje"] = $error_213_mensaje;
                $out["causa"] = $error_213_causa;
                $response->getBody()->write(json_encode($out));
                return $response->withStatus(400);
              }
            }
        }
        if ($sub_total != $cantidadT) {
          $out["codigo"] = "215";
          $out["mensaje"] = $error_215_mensaje;
          $out["causa"] = $error_215_causa;
          $out["Cantidad Total"] = $cantidadT;
          $response->getBody()->write(json_encode($out));
          return $response->withStatus(400);
        }
        if ($total_descuento!=$descuentoT) {
          $out["codigo"] = "216";
          $out["mensaje"] = $error_216_mensaje;
          $out["causa"] = $error_216_causa;
          $out["Descuento Total"] = $total_descuento;
          $response->getBody()->write(json_encode($out));
          return $response->withStatus(400);
        }
        //tipo 1 : cantidad
        //tipo 2 : asientos
        //tipo,id_evento,id_funcion,id_platea:cantidad-id_platea:cantidad,id_promocion,total, descuento;
        //tipo,id_evento,id_funcion,asiento1-asiento2,id_promocion,total, descuento;
        $id_transacion="";
        $authorization_code="";
        $status_transacion="";
        try {
            $API_LOGIN_DEV     = "TPP3-EC-SERVER";
            $API_KEY_DEV       = "JdXTDl2d0o0B8ANZ1heJOq7tf62PC6";
            $server_application_code = $API_LOGIN_DEV;
            $server_app_key = $API_KEY_DEV ;
            $date = new \DateTime();
            //$date = date("Y-m-d H:i:s");
            $unix_timestamp = $date->getTimestamp();
            // $unix_timestamp = "1546543146";
            $uniq_token_string = $server_app_key.$unix_timestamp;
            $uniq_token_hash = hash('sha256', $uniq_token_string);
            $auth_token = base64_encode($server_application_code.";".$unix_timestamp.";".$uniq_token_hash);
            $user["id"]=$user_id;
            $user["email"]=$email;
            $order["amount"]=(float)$totalC;
            $order["description"]="Teatro Sanchez Aguilar-Compra de Ticket App";
            $order["dev_reference"]=$user_id;
            $order["vat"]=0;
            $order["tax_percentage"]=0;
            $order["taxable_amount"]=0;
            $card["token"]= $user_token;
            $data = array();
            $data["user"] =$user;
            $data["order"] = $order;
            $data["card"] = $card;
            $url="https://ccapi.paymentez.com/v2/transaction/debit/";
            $curl = curl_init($url);
            $headers = array();
            $headers[] = 'Cache-Control: no-cache';
            $headers[] = 'Auth-Token:'.$auth_token;
            $headers[] = 'Content-Type: application/json; charset= utf-8';
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            $result = curl_exec($curl);
            curl_close($curl);
            $resultado =json_decode($result, true);
            $response->getBody()->write(json_encode($resultado));
        } catch (\PDOException $th) {
            $result = false;
            $out["codigo"] = "219";
            $out["mensaje"] = $error_219_mensaje;
            $out["causa"] = $error_219_causa;
            $out["error"] = $th->getMessage();
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        return $response;
    }

    public function insertPuntos($request, $response, $args){
        include("error.php");
        $response = $response->withHeader('Content-Type', 'application/json');
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
            $out["codigo"] = "100";
            $out["mensaje"] = $error_100_mensaje;
            $out["causa"] =  $error_100_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            $out["codigo"] = "101";
            $out["mensaje"] = $error_101_mensaje;
            $out["causa"] = $error_101_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(401);
        }

        // FIN VALIDACION
        $json = $request->getBody();
        $body = json_decode($json, true);
        if (!(isset($body["id_compra"]) && isset($body["id_usuario"]))){
          $out["codigo"] = "201";
          $out["mensaje"] = $error_201_mensaje;
          $out["causa"] = $error_201_causa;
          $response->getBody()->write(json_encode($out));
          return $response->withStatus(400);
        }

        //Realizo consulta de puertas a DB
        $id_compra= trim($body["id_compra"]);
        $id_usuario= trim($body["id_usuario"]);
        try {

            $sql = "SELECT te.nombre,tc.total, tc.dolares_canjeados, tta.asiento, tc.id_compra, tta.id_ticket_asiento FROM tsa_ticket tt INNER JOIN  tsa_funcion tf ON tf.id_funcion =tt.id_funcion
                INNER JOIN  tsa_evento te ON te.id_evento =tf.id_evento INNER JOIN tsa_compra tc ON tc.id_compra =tt.id_compra inner join tsa_ticket_asiento tta on tta.id_ticket =tt.id_ticket anD tc.id_compra=:id_compra";
            $statement = $db->prepare($sql);
            $statement->bindValue(':id_compra', $id_compra, \PDO::PARAM_STR);
            $result = $statement->execute();
            $eve= [];
            $eve1= "";
            $cantidadT=0;
            $dolares_canjeados=0;
            $cantidad=0;
            while($item = $statement->fetch()){
              if (!in_array($item->nombre, $eve)) {
                  $eve[]= $item->nombre;
                  $eve1= $eve1.$item->nombre.",";
              }
              if (is_numeric($item->asiento)) {
                  $cantidad=$cantidad+$item->asiento;
              }else{
                  $cantidad=$cantidad+1;
              }
              $cantidadT=$item->total;
              $dolares_canjeados=$item->dolares_canjeados;
            }
              $whole = floor($cantidadT);
            $puntos= $whole-$dolares_canjeados;
            $sql = "UPDATE teatro_backup.tsa_usuario_cliente SET puntos_acumulados=puntos_acumulados+:puntos WHERE id_usuario_cliente=:id_usuario_cliente";
            $statement = $db->prepare($sql);
            $statement->bindValue(':id_usuario_cliente', $id_usuario, \PDO::PARAM_STR);
            $statement->bindValue(':puntos', $puntos, \PDO::PARAM_STR);
            $statement->execute();

            $puntos=0;
            $sql = "INSERT INTO teatro_backup.tsa_amigos_puntos (id_usuario_cliente,id_compra,evento,cantidad,puntos,puntos_ganados,fecha_consumo) VALUES (:id_usuario_cliente,:id_compra,:evento,:cantidad,:puntos,:puntos_ganados,now());";
            $statement = $db->prepare($sql);
            $statement->bindValue(':id_usuario_cliente', $id_usuario, \PDO::PARAM_STR);
            $statement->bindValue(':id_compra', $id_compra, \PDO::PARAM_STR);
            $statement->bindValue(':evento', substr($eve1, 0, -1), \PDO::PARAM_STR);
            $statement->bindValue(':cantidad', $cantidad, \PDO::PARAM_STR);
            $statement->bindValue(':puntos', $puntos, \PDO::PARAM_STR);
            $statement->bindValue(':puntos_ganados', $whole, \PDO::PARAM_STR);
            $statement->execute();
            $response->getBody()->write(json_encode(substr($eve1, 0, -1)));
            $response->getBody()->write(json_encode($cantidad));
            $response->getBody()->write(json_encode($whole));
        } catch (\PDOException $th) {
            $result = false;
            $out["codigo"] = "102";
            $out["mensaje"] = $error_102_mensaje;
            $out["causa"] = $error_102_causa;
            $out["error"] = $th->getMessage();
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        return $response;
    }


    public function compra_diners($request, $response, $args){
        include("error.php");
        include ("conect.php");
        include ("conect0.php");
        $response = $response->withHeader('Content-Type', 'application/json');
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
            $out["codigo"] = "100";
            $out["mensaje"] = $error_100_mensaje;
            $out["causa"] =  $error_100_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            $out["codigo"] = "101";
            $out["mensaje"] = $error_101_mensaje;
            $out["causa"] = $error_101_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(401);
        }

        // FIN VALIDACION
        $json = $request->getBody();
        $body = json_decode($json, true);
        if (!(isset($body["id_facturacion"]) && isset($body["email"])  && isset($body["donacion"]) && isset($body["user_id"]) && isset($body["id_transacion"]) && isset($body["dolares_canjeados"]) &&
        isset($body["eventos"]) && isset($body["sub_total"]) && isset($body["total_descuento"]) && isset($body["iva"]) && isset($body["total"]))){
          $out["codigo"] = "201";
          $out["mensaje"] = $error_201_mensaje;
          $out["causa"] = $error_201_causa;
          $response->getBody()->write(json_encode($out));
          return $response->withStatus(400);
        }
        $email= trim($body["email"]);
        $id_facturacion= trim($body["id_facturacion"]);
        $donacion= trim($body["donacion"]);
        $user_id= trim($body["user_id"]);
        $id_transacion= trim($body["id_transacion"]);
        $dolares_canjeados= trim($body["dolares_canjeados"]);
        $sub_total= trim($body["sub_total"]);
        $total_descuento= trim($body["total_descuento"]);
        $iva= trim($body["iva"]);
        $total= trim($body["total"]);
        $eventos= explode(';',trim($body["eventos"]));
        $total_iva= $sub_total-$dolares_canjeados-$total_descuento;
        $ivaC= number_format($total_iva*0, 3, '.', '');
        $totalC=  number_format($total_iva+$donacion+$ivaC, 2, '.', '');

        if ($total_iva < 0) {
          $out["codigo"] = "218";
          $out["mensaje"] = $error_218_mensaje;
          $out["causa"] = $error_218_causa;
          $out["Valor sin iva"] = $total_iva;
          $response->getBody()->write(json_encode($out));
          return $response->withStatus(400);
        }
        if ($ivaC != $iva) {
          $out["codigo"] = "217";
          $out["mensaje"] = $error_217_mensaje;
          $out["causa"] = $error_217_causa;
          $out["Iva calculado"] = $ivaC;
          $response->getBody()->write(json_encode($out));
          return $response->withStatus(400);
        }
        if ($totalC != $total) {
          $out["codigo"] = "218";
          $out["mensaje"] = $error_218_mensaje;
          $out["causa"] = $error_218_causa;
          $out["total calculado"] = $totalC;
          $response->getBody()->write(json_encode($out));
          return $response->withStatus(400);
        }
        //VALIDACIONES
        $cantidadT=0;

        $descuentoT=0;
        $lista2=[];
        $ban=false;
        $factorDA =0;
        $descuentoDA =0;
        $totalDA =0;
        $sql = "SELECT *  FROM tsa_factor_amigos ts WHERE ts.id_factor_amigos=1";
        $statement = $db->prepare($sql);
        $result = $statement->execute();
        while($item = $statement->fetch()){
          $factorDA =$item->factor;
          $descuentoDA =$item->descuento;
          $totalDA =$factorDA/$descuentoDA ;
        }
        $sql = "SELECT tuc.puntos_acumulados  from tsa_usuario_cliente tuc WHERE id_usuario_cliente=:id_usuario";
        $statement = $db->prepare($sql);
        $statement->bindValue(':id_usuario', $user_id, \PDO::PARAM_STR);
        $result = $statement->execute();
        $item = $statement->fetch();
        if (!$item){
          $out["codigo"] = "202";
          $out["mensaje"] = $error_202_mensaje;
          $out["causa"] =  $error_202_causa;
          $response->getBody()->write(json_encode($out));
          return $response->withStatus(400);
        }else{
          $val=$dolares_canjeados*$totalDA;
          if ($val>$item->puntos_acumulados) {
            $out["codigo"] = "224";
            $out["mensaje"] = $error_224_mensaje;
            $out["causa"] =  $error_224_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(400);
          }

        }

        foreach($eventos as $llave => $valores) {
            if($valores!=""){
              $valor= explode(',',trim($valores));
              if (isset($valor[8])) {
                $tipo=$valor[0];
                $id_evento=$valor[1];
                $id_funcion=$valor[2];
                $asientosT=$valor[3];
                $asientos= explode('-',trim($asientosT));
                $id_promocion=$valor[4];
                $tipo_promocion=$valor[5];
                $totalP=$valor[6];
                $descuentoP=$valor[7];
                $cantidadT=$cantidadT+$totalP;
                $descuentoT=$descuentoT+$descuentoP;
                $cantidadT2=0;
                if ($id_promocion!=0) {
                  if ($tipo_promocion=="FC" | $tipo_promocion=="CD" | $tipo_promocion=="FP" | $tipo_promocion=="BT" | $tipo_promocion=="CP") {
                  }else{
                    $out["codigo"] = "220";
                    $out["mensaje"] = $error_220_mensaje;
                    $out["causa"] = $error_220_causa;
                    $response->getBody()->write(json_encode($out));
                    return $response->withStatus(400);
                  }
                }
                foreach($asientos as $llave => $valores1) {
                  $Pcantidad= explode(':',trim($valores1));
                  if ($tipo==1) {
                      if (isset($Pcantidad[2])) {
                          $id_platea=$Pcantidad[0];
                          $cantidad=$Pcantidad[1];
                          $precio=$Pcantidad[2];
                          $cantidadT2=$cantidadT2+$precio;
                      }else{
                        $out["codigo"] = "213";
                        $out["mensaje"] = $error_213_mensaje;
                        $out["causa"] = $error_213_causa;
                        $response->getBody()->write(json_encode($out));
                        return $response->withStatus(400);
                      }
                      $sql = "SELECT bc.id_bloqueo_cantidad FROM tsa_platea tp  INNER JOIN tsa_platea_funcion tpf ON tp.id_platea = tpf.id_platea INNER JOIN tsa_bloqueo_cantidad bc ON bc.id_platea_funcion = tpf.id_platea_funcion and id_funcion=:funcion and tpf.id_platea =:platea and bc.id_usuario_cliente =:id_usuario and bc.cantidad =:cantidad";
                      $statement = $db->prepare($sql);
                      $statement->bindValue(':platea', $id_platea, \PDO::PARAM_STR);
                      $statement->bindValue(':funcion', $id_funcion, \PDO::PARAM_STR);
                      $statement->bindValue(':id_usuario', $user_id, \PDO::PARAM_STR);
                      $statement->bindValue(':cantidad', $cantidad, \PDO::PARAM_STR);
                      $result = $statement->execute();
                      $item = $statement->fetch();
                      if (!$item){
                        $out["codigo"] = "212";
                        $out["mensaje"] = $error_212_mensaje;
                        $out["causa"] =  $error_212_causa;
                        $out["funcion"] =  $id_funcion;
                        $response->getBody()->write(json_encode($out));
                          return $response->withStatus(400);
                      }else{
                        $lista2[]=["1",$item->id_bloqueo_cantidad];
                      }
                  }else if($tipo==2){
                      if (isset($Pcantidad[3])) {
                        $id_platea=$Pcantidad[0];
                        $id_asiento=$Pcantidad[1];
                        $asiento=$Pcantidad[2];
                        $precio=$Pcantidad[3];
                        $cantidadT2=$cantidadT2+$precio;
                      }else{
                        $out["codigo"] = "213";
                        $out["mensaje"] = $error_213_mensaje;
                        $out["causa"] = $error_213_causa;
                        $response->getBody()->write(json_encode($out));
                        return $response->withStatus(400);
                      }
                      $sql = "SELECT * FROM tsa_bloqueo_asiento WHERE id_usuario_cliente=:id_usuario and id_distribucion=:asiento";
                      $statement = $db->prepare($sql);
                      $statement->bindValue(':id_usuario', $user_id, \PDO::PARAM_STR);
                      $statement->bindValue(':asiento', $id_asiento, \PDO::PARAM_STR);
                      $result = $statement->execute();
                      $item = $statement->fetch();
                      if (!$item){
                        $out["codigo"] = "212";
                        $out["mensaje"] = $error_212_mensaje;
                        $out["causa"] =  $error_212_causa;
                        $out["id_asiento"] =  $id_asiento;
                        $response->getBody()->write(json_encode($out));
                        return $response;
                      }else{
                        $lista2[]=["2",$item->id_bloqueo_asiento];
                      }
                  }else{
                    $out["codigo"] = "214";
                    $out["mensaje"] = $error_214_mensaje;
                    $out["causa"] = $error_214_causa;
                    $response->getBody()->write(json_encode($out));
                    return $response->withStatus(400);
                  }
                }
                if ($cantidadT2 != $totalP) {
                  $out["codigo"] = "215";
                  $out["mensaje"] = $error_215_mensaje;
                  $out["causa"] = $error_215_causa;
                  $out["Total"] = $cantidadT2;
                  $out["evento"] = $id_evento;
                  $response->getBody()->write(json_encode($out));
                  return $response->withStatus(400);
                }
              }else{
                $out["codigo"] = "213";
                $out["mensaje"] = $error_213_mensaje;
                $out["causa"] = $error_213_causa;
                $response->getBody()->write(json_encode($out));
                return $response->withStatus(400);
              }
            }
        }
        if ($sub_total != $cantidadT) {
          $out["codigo"] = "215";
          $out["mensaje"] = $error_215_mensaje;
          $out["causa"] = $error_215_causa;
          $out["Cantidad Total"] = $cantidadT;
          $response->getBody()->write(json_encode($out));
          return $response->withStatus(400);
        }
        if ($total_descuento!=$descuentoT) {
          $out["codigo"] = "216";
          $out["mensaje"] = $error_216_mensaje;
          $out["causa"] = $error_216_causa;
          $out["Descuento Total"] = $total_descuento;
          $response->getBody()->write(json_encode($out));
          return $response->withStatus(400);
        }
        //tipo 1 : cantidad
        //tipo 2 : asientos
        //tipo,id_evento,id_funcion,id_platea:cantidad-id_platea:cantidad,id_promocion,total, descuento;
        //tipo,id_evento,id_funcion,asiento1-asiento2,id_promocion,total, descuento;

        try {
            $API_LOGIN_DEV     = "TPP3-EC-SERVER";
            $API_KEY_DEV       = "JdXTDl2d0o0B8ANZ1heJOq7tf62PC6";
            $server_application_code = $API_LOGIN_DEV;
            $server_app_key = $API_KEY_DEV ;
            $date = new \DateTime();
            //$date = date("Y-m-d H:i:s");
            $unix_timestamp = $date->getTimestamp();
            // $unix_timestamp = "1546543146";
            $uniq_token_string = $server_app_key.$unix_timestamp;
            $uniq_token_hash = hash('sha256', $uniq_token_string);
            $auth_token = base64_encode($server_application_code.";".$unix_timestamp.";".$uniq_token_hash);
            $url="https://ccapi.paymentez.com/v2/transaction/".$id_transacion;
            $curl = curl_init($url);
            $headers = array();
            $headers[] = 'Cache-Control: no-cache';
            $headers[] = 'Auth-Token:'.$auth_token;
            $headers[] = 'Content-Type: application/json; charset= utf-8';
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            $result = curl_exec($curl);
            curl_close($curl);
            $resultado =json_decode($result, true);
            if (isset($resultado['transaction'])) {
              if ($resultado["transaction"]["status"]=="success") {
                  $id_transacion=$resultado["transaction"]["id"];
                  $authorization_code=$resultado["transaction"]["authorization_code"];
                  $status_transacion="S";
                  $ban=true;
              }else{
                $this->rembolso($id_transacion);
                $result = false;
                $out["codigo"] = "221";
                $out["mensaje"] = $error_221_mensaje;
                $out["causa"] = $error_221_causa;
                $response->getBody()->write(json_encode($out));
                return $response->withStatus(400);

              }

            }else{
              $result = false;
              $out["codigo"] = "219";
              $out["mensaje"] = $error_219_mensaje;
              $out["causa"] = $error_219_causa;
              $response->getBody()->write(json_encode($out));
              return $response->withStatus(400);
            }

        } catch (\PDOException $th) {
            $result = false;
            $out["codigo"] = "219";
            $out["mensaje"] = $error_219_mensaje;
            $out["causa"] = $error_219_causa;
            $out["error"] = $th->getMessage();
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        $tipoA="A";
        if ($request->hasHeader('Canal')) {
            $YB = $request->getHeader('Canal');
            if ($YB[0]==="web") {
              $tipoA="W";
            }
        }
        $id_compra=0;
        try {
            if ($ban) {
              try {
                  $sql = "INSERT INTO teatro_backup.tsa_compra (id_facturacion,id_usuario_cliente,dolares_canjeados,donacion,sub_total,descuento,iva,total,usuario_creacion,id_transacion,authorization_code,status_transacion,tipo,email)
                  VALUES (:id_facturacion,:id_usuario_cliente,:dolares_canjeados,:donacion,:sub_total,:descuento,:iva,:total,:usuario_creacion,:id_transacion,:authorization_code,:status_transacion,:tipo,:email)";
                  $statement = $db->prepare($sql);
                  $statement->bindValue(':id_facturacion', $id_facturacion, \PDO::PARAM_STR);
                  $statement->bindValue(':id_usuario_cliente', $user_id, \PDO::PARAM_STR);
                  $statement->bindValue(':dolares_canjeados', $dolares_canjeados, \PDO::PARAM_STR);
                  $statement->bindValue(':donacion', $donacion, \PDO::PARAM_STR);
                  $statement->bindValue(':sub_total', $sub_total, \PDO::PARAM_STR);
                  $statement->bindValue(':descuento', $total_descuento, \PDO::PARAM_STR);
                  $statement->bindValue(':iva', $iva, \PDO::PARAM_STR);
                  $statement->bindValue(':total', $totalC, \PDO::PARAM_STR);
                  $statement->bindValue(':id_transacion', $id_transacion, \PDO::PARAM_STR);
                  $statement->bindValue(':authorization_code', $authorization_code, \PDO::PARAM_STR);
                  $statement->bindValue(':status_transacion', $status_transacion, \PDO::PARAM_STR);
                  $statement->bindValue(':usuario_creacion', $user_id, \PDO::PARAM_STR);
                  $statement->bindValue(':tipo', $tipoA, \PDO::PARAM_STR);
                  $statement->bindValue(':email', $email, \PDO::PARAM_STR);
                  $statement->execute();
                  $id_compra=$db->lastInsertId();
              } catch(\PDOException $th) {
                $this->rembolso($id_transacion);
                $result = false;
                $out["codigo"] = "102";
                $out["mensaje"] = $error_102_mensaje;
                $out["causa"] = $error_102_causa;
                $out["error"] = $th->getMessage();
                $response->getBody()->write(json_encode($out));
                return $response->withStatus(500);
              }
              $lista=[];
              $lista3=[];
              foreach($eventos as $llave => $valores) {
                  if($valores!=""){
                    $valor= explode(',',trim($valores));
                      $tipo=$valor[0];
                      $id_evento=$valor[1];
                      $id_funcion=$valor[2];
                      $asientosT=$valor[3];
                      $asientos= explode('-',trim($asientosT));
                      $id_promocion=$valor[4];
                      $tipo_promocion=$valor[5];
                      $totalP=$valor[6];
                      $descuentoP=$valor[7];
                      $sala=$valor[8];
                      $cantidadT=$cantidadT+$totalP;
                      $descuentoT=$descuentoT+$descuentoP;
                      try {
                          $id_ticket=0;
                          if ($id_compra!=0) {
                            $puntos_canjeadosT=$totalP*$dolares_canjeados/$sub_total;
                            $puntos_canjeadosTK=number_format($puntos_canjeadosT, 2);
                            $sql = "INSERT INTO teatro_backup.tsa_ticket (id_funcion,id_usuario_cliente,id_compra,sala,precio,tipo,usuario_creacion,descuento,puntos_canjeados)
                            VALUES (:id_funcion,:id_usuario_cliente,:id_compra,:sala,:precio,:tipo,:usuario_creacion,:descuento,:puntos_canjeados)";
                            $statement = $db->prepare($sql);
                            $statement->bindValue(':id_funcion', $id_funcion, \PDO::PARAM_STR);
                            $statement->bindValue(':id_usuario_cliente', $user_id, \PDO::PARAM_STR);
                            $statement->bindValue(':id_compra', $id_compra, \PDO::PARAM_STR);
                            $statement->bindValue(':sala', $sala, \PDO::PARAM_STR);
                            $statement->bindValue(':precio', $totalP, \PDO::PARAM_STR);
                            $statement->bindValue(':tipo', $tipo, \PDO::PARAM_STR);
                            $statement->bindValue(':usuario_creacion', $user_id, \PDO::PARAM_STR);
                            $statement->bindValue(':descuento', $descuentoP, \PDO::PARAM_STR);
                            $statement->bindValue(':puntos_canjeados', $puntos_canjeadosTK, \PDO::PARAM_STR);
                            $statement->execute();
                            $id_ticket=$db->lastInsertId();
                            if ($id_promocion!=0) {
                              if ($tipo_promocion=="FC" | $tipo_promocion=="CD" | $tipo_promocion=="FP" | $tipo_promocion=="BT" | $tipo_promocion=="CP") {
                                  if ($tipo_promocion=="FC") {
                                    $sql = "INSERT INTO teatro_backup.tsa_ticket_promocion_factor_compra (id_promocion,id_ticket,descuento,id_usuario_cliente,usuario_creacion)
                                    VALUES (:id_promocion,:id_ticket,:descuento,:id_usuario_cliente,:usuario_creacion)";
                                    $statement = $db->prepare($sql);
                                    $statement->bindValue(':id_promocion', $id_promocion, \PDO::PARAM_STR);
                                    $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                                    $statement->bindValue(':descuento', $descuentoP, \PDO::PARAM_STR);
                                    $statement->bindValue(':id_usuario_cliente', $user_id, \PDO::PARAM_STR);
                                    $statement->bindValue(':usuario_creacion', $user_id, \PDO::PARAM_STR);
                                    $statement->execute();
                                  }else if ($tipo_promocion=="CD") {
                                    $sql = "INSERT INTO teatro_backup.tsa_ticket_promocion_cruzados (id_promocion,id_ticket,descuento,id_usuario_cliente,usuario_creacion)
                                    VALUES (:id_promocion,:id_ticket,:descuento,:id_usuario_cliente,:usuario_creacion)";
                                    $statement = $db->prepare($sql);
                                    $statement->bindValue(':id_promocion', $id_promocion, \PDO::PARAM_STR);
                                    $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                                    $statement->bindValue(':descuento', $descuentoP, \PDO::PARAM_STR);
                                    $statement->bindValue(':id_usuario_cliente', $user_id, \PDO::PARAM_STR);
                                    $statement->bindValue(':usuario_creacion', $user_id, \PDO::PARAM_STR);
                                    $statement->execute();
                                  }else if ( $tipo_promocion=="FP") {
                                    $sql = "INSERT INTO teatro_backup.tsa_ticket_promocion_factor_pago (id_promocion,id_ticket,descuento,id_usuario_cliente,usuario_creacion)
                                    VALUES (:id_promocion,:id_ticket,:descuento,:id_usuario_cliente,:usuario_creacion)";
                                    $statement = $db->prepare($sql);
                                    $statement->bindValue(':id_promocion', $id_promocion, \PDO::PARAM_STR);
                                    $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                                    $statement->bindValue(':descuento', $descuentoP, \PDO::PARAM_STR);
                                    $statement->bindValue(':id_usuario_cliente', $user_id, \PDO::PARAM_STR);
                                    $statement->bindValue(':usuario_creacion', $user_id, \PDO::PARAM_STR);
                                    $statement->execute();
                                  }else if ( $tipo_promocion=="BT") {
                                    $sql = "INSERT INTO teatro_backup.tsa_ticket_promocion_tarjeta (id_promocion,id_ticket,descuento,id_usuario_cliente,usuario_creacion)
                                    VALUES (:id_promocion,:id_ticket,:descuento,:id_usuario_cliente,:usuario_creacion)";
                                    $statement = $db->prepare($sql);
                                    $statement->bindValue(':id_promocion', $id_promocion, \PDO::PARAM_STR);
                                    $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                                    $statement->bindValue(':descuento', $descuentoP, \PDO::PARAM_STR);
                                    $statement->bindValue(':id_usuario_cliente', $user_id, \PDO::PARAM_STR);
                                    $statement->bindValue(':usuario_creacion', $user_id, \PDO::PARAM_STR);
                                    $statement->execute();
                                  }else {
                                    $sql = "INSERT INTO teatro_backup.tsa_ticket_promocion_codigo (id_promocion,id_ticket,descuento,id_usuario_cliente,usuario_creacion)
                                    VALUES (:id_promocion,:id_ticket,:descuento,:id_usuario_cliente,:usuario_creacion)";
                                    $statement = $db->prepare($sql);
                                    $statement->bindValue(':id_promocion', $id_promocion, \PDO::PARAM_STR);
                                    $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                                    $statement->bindValue(':descuento', $descuentoP, \PDO::PARAM_STR);
                                    $statement->bindValue(':id_usuario_cliente', $user_id, \PDO::PARAM_STR);
                                    $statement->bindValue(':usuario_creacion', $user_id, \PDO::PARAM_STR);
                                    $statement->execute();
                                  }
                              }else{
                                $out["codigo"] = "220";
                                $out["mensaje"] = $error_220_mensaje;
                                $out["causa"] = $error_220_causa;
                                $response->getBody()->write(json_encode($out));
                                return $response->withStatus(400);
                              }

                            }

                          }
                      } catch(\PDOException $th) {
                          $this->rembolso($id_transacion);
                          $sql = "DELETE FROM teatro_backup.tsa_ticket_promocion_codigo WHERE id_ticket=:id_ticket";
                          $statement = $db->prepare($sql);
                          $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                          $statement->execute();
                          $sql = "DELETE FROM teatro_backup.tsa_ticket_promocion_cruzados WHERE id_ticket=:id_ticket";
                          $statement = $db->prepare($sql);
                          $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                          $statement->execute();
                          $sql = "DELETE FROM teatro_backup.tsa_ticket_promocion_factor_pago WHERE id_ticket=:id_ticket";
                          $statement = $db->prepare($sql);
                          $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                          $statement->execute();
                          $sql = "DELETE FROM teatro_backup.tsa_ticket_promocion_tarjeta WHERE id_ticket=:id_ticket";
                          $statement = $db->prepare($sql);
                          $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                          $statement->execute();
                          $sql = "DELETE FROM teatro_backup.tsa_ticket_promocion_factor_compra WHERE id_ticket=:id_ticket";
                          $statement = $db->prepare($sql);
                          $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                          $statement->execute();
                          foreach($lista3 as $llave => $valo) {
                            $sql = "DELETE FROM teatro_backup.tsa_ticket_asiento WHERE id_ticket=:id_ticket";
                            $statement = $db->prepare($sql);
                            $statement->bindValue(':id_ticket', $valo, \PDO::PARAM_STR);
                            $statement->execute();
                          }
                          $sql = "DELETE FROM teatro_backup.tsa_ticket WHERE id_compra=:id_compra";
                          $statement = $db->prepare($sql);
                          $statement->bindValue(':id_compra', $id_compra, \PDO::PARAM_STR);
                          $statement->execute();
                          foreach($lista as $llave => $valo) {
                            if ($valo[0]=="1") {
                              $sql = "UPDATE teatro_backup.tsa_platea_funcion SET vendido=vendido-:cantidad WHERE id_platea=:id_platea and id_funcion=:id_funcion;";
                              $statement = $db->prepare($sql);
                              $statement->bindValue(':cantidad', $valo[1], \PDO::PARAM_STR);
                              $statement->bindValue(':id_funcion', $valo[2], \PDO::PARAM_STR);
                              $statement->bindValue(':id_platea',$valo[3], \PDO::PARAM_STR);
                              $statement->execute();
                            }
                            if ($valo[0]=="2") {
                              $sql = "UPDATE teatro_backup.tsa_distribucion SET estado='E' WHERE id_distribucion=:id_distribucion";
                              $statement = $db->prepare($sql);
                              $statement->bindValue(':id_distribucion',  $valo[1], \PDO::PARAM_STR);
                              $statement->execute();
                            }
                          }
                          foreach($lista2 as $llave => $valores) {
                            if ($valores[0]=="1") {
                              $sql = "UPDATE tsa_bloqueo_cantidad set fecha_creacion=now() WHERE id_bloqueo_cantidad=:id_bloqueo_cantidad";
                              $statement = $db->prepare($sql);
                              $statement->bindValue(':id_bloqueo_cantidad', $valores[1], \PDO::PARAM_STR);
                              $result = $statement->execute();
                            }
                            if ($valores[0]=="2") {
                              $sql = "UPDATE tsa_bloqueo_asiento set fecha_creacion=now() WHERE id_bloqueo_asiento=:id_bloqueo_asiento";
                              $statement = $db->prepare($sql);
                              $statement->bindValue(':id_bloqueo_asiento', $valores[1], \PDO::PARAM_STR);
                              $result = $statement->execute();
                            }
                          }
                          $sql = "DELETE FROM teatro_backup.tsa_compra WHERE id_compra=:id_compra";
                          $statement = $db->prepare($sql);
                          $statement->bindValue(':id_compra', $id_compra, \PDO::PARAM_STR);
                          $statement->execute();
                          $result = false;
                          $out["codigo"] = "102";
                          $out["mensaje"] = $error_102_mensaje;
                          $out["causa"] = $error_102_causa;
                          $out["error"] = $th->getMessage();
                          $response->getBody()->write(json_encode($out));
                          return $response->withStatus(500);
                      }
                      foreach($asientos as $llave => $valores1) {
                        $Pcantidad= explode(':',trim($valores1));
                        if ($tipo==1) {
                            $id_platea=$Pcantidad[0];
                            $cantidad=$Pcantidad[1];
                            $precio=$Pcantidad[2];
                            try {
                                if ($id_ticket!=0) {
                                  $sql = "INSERT INTO teatro_backup.tsa_ticket_asiento (id_ticket,asiento,precio,usuario_creacion,id_platea)
                                  VALUES (:id_ticket,:asiento,:precio,:usuario_creacion,:id_platea)";
                                  $statement = $db->prepare($sql);
                                  $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                                  $statement->bindValue(':asiento', $cantidad, \PDO::PARAM_STR);
                                  $statement->bindValue(':precio',   $precio, \PDO::PARAM_STR);
                                  $statement->bindValue(':id_platea', $id_platea, \PDO::PARAM_STR);
                                  $statement->bindValue(':usuario_creacion', $user_id, \PDO::PARAM_STR);
                                  $statement->execute();

                                  $sql = "UPDATE teatro_backup.tsa_platea_funcion SET vendido=vendido+:cantidad WHERE id_platea=:id_platea and id_funcion=:id_funcion;";
                                  $statement = $db->prepare($sql);
                                  $statement->bindValue(':cantidad', $cantidad, \PDO::PARAM_STR);
                                  $statement->bindValue(':id_funcion', $id_funcion, \PDO::PARAM_STR);
                                  $statement->bindValue(':id_platea', $id_platea, \PDO::PARAM_STR);
                                  $statement->execute();
                                  $lista[]= array("1", $cantidad,$id_funcion,$id_platea);
                                  $lista3[]= $id_ticket;
                                }else{
                                  $this->rembolso($id_transacion);
                                  $sql = "DELETE FROM teatro_backup.tsa_ticket_asiento WHERE id_ticket=:id_ticket";
                                  $statement = $db->prepare($sql);
                                  $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                                  $statement->execute();
                                  $sql = "DELETE FROM teatro_backup.tsa_ticket_promocion_codigo WHERE id_ticket=:id_ticket";
                                  $statement = $db->prepare($sql);
                                  $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                                  $statement->execute();
                                  $sql = "DELETE FROM teatro_backup.tsa_ticket_promocion_cruzados WHERE id_ticket=:id_ticket";
                                  $statement = $db->prepare($sql);
                                  $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                                  $statement->execute();
                                  $sql = "DELETE FROM teatro_backup.tsa_ticket_promocion_factor_pago WHERE id_ticket=:id_ticket";
                                  $statement = $db->prepare($sql);
                                  $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                                  $statement->execute();
                                  $sql = "DELETE FROM teatro_backup.tsa_ticket_promocion_tarjeta WHERE id_ticket=:id_ticket";
                                  $statement = $db->prepare($sql);
                                  $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                                  $statement->execute();
                                  $sql = "DELETE FROM teatro_backup.tsa_ticket_promocion_factor_compra WHERE id_ticket=:id_ticket";
                                  $statement = $db->prepare($sql);
                                  $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                                  $statement->execute();
                                  foreach($lista3 as $llave => $valo) {
                                    $sql = "DELETE FROM teatro_backup.tsa_ticket_asiento WHERE id_ticket=:id_ticket";
                                    $statement = $db->prepare($sql);
                                    $statement->bindValue(':id_ticket', $valo, \PDO::PARAM_STR);
                                    $statement->execute();

                                  }
                                  $sql = "DELETE FROM teatro_backup.tsa_ticket WHERE id_compra=:id_compra";
                                  $statement = $db->prepare($sql);
                                  $statement->bindValue(':id_compra', $id_compra, \PDO::PARAM_STR);
                                  $statement->execute();
                                  $sql = "DELETE FROM teatro_backup.tsa_compra WHERE id_compra=:id_compra";
                                  $statement = $db->prepare($sql);
                                  $statement->bindValue(':id_compra', $id_compra, \PDO::PARAM_STR);
                                  $statement->execute();
                                  foreach($lista as $llave => $valo) {
                                    if ($valo[0]=="1") {
                                      $sql = "UPDATE teatro_backup.tsa_platea_funcion SET vendido=vendido-:cantidad WHERE id_platea=:id_platea and id_funcion=:id_funcion;";
                                      $statement = $db->prepare($sql);
                                      $statement->bindValue(':cantidad', $valo[1], \PDO::PARAM_STR);
                                      $statement->bindValue(':id_funcion', $valo[2], \PDO::PARAM_STR);
                                      $statement->bindValue(':id_platea',$valo[3], \PDO::PARAM_STR);
                                      $statement->execute();
                                    }
                                    if ($valo[0]=="2") {
                                      $sql = "UPDATE teatro_backup.tsa_distribucion SET estado='E' WHERE id_distribucion=:id_distribucion";
                                      $statement = $db->prepare($sql);
                                      $statement->bindValue(':id_distribucion',  $valo[1], \PDO::PARAM_STR);
                                      $statement->execute();
                                    }
                                  }
                                  foreach($lista2 as $llave => $valores) {
                                    if ($valores[0]=="1") {
                                      $sql = "UPDATE tsa_bloqueo_cantidad set fecha_creacion=now() WHERE id_bloqueo_cantidad=:id_bloqueo_cantidad";
                                      $statement = $db->prepare($sql);
                                      $statement->bindValue(':id_bloqueo_cantidad', $valores[1], \PDO::PARAM_STR);
                                      $result = $statement->execute();
                                    }
                                    if ($valores[0]=="2") {
                                      $sql = "UPDATE tsa_bloqueo_asiento set fecha_creacion=now() WHERE id_bloqueo_asiento=:id_bloqueo_asiento";
                                      $statement = $db->prepare($sql);
                                      $statement->bindValue(':id_bloqueo_asiento', $valores[1], \PDO::PARAM_STR);
                                      $result = $statement->execute();
                                    }
                                  }
                                  $out["codigo"] = "102";
                                  $out["mensaje"] = $error_102_mensaje;
                                  $out["causa"] = $error_102_causa;
                                  $response->getBody()->write(json_encode($out));
                                  return $response->withStatus(500);
                                }
                            } catch(\PDOException $th) {
                                $this->rembolso($id_transacion);
                                $sql = "DELETE FROM teatro_backup.tsa_ticket_asiento WHERE id_ticket=:id_ticket";
                                $statement = $db->prepare($sql);
                                $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                                $statement->execute();
                                $sql = "DELETE FROM teatro_backup.tsa_ticket_promocion_codigo WHERE id_ticket=:id_ticket";
                                $statement = $db->prepare($sql);
                                $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                                $statement->execute();
                                $sql = "DELETE FROM teatro_backup.tsa_ticket_promocion_cruzados WHERE id_ticket=:id_ticket";
                                $statement = $db->prepare($sql);
                                $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                                $statement->execute();
                                $sql = "DELETE FROM teatro_backup.tsa_ticket_promocion_factor_pago WHERE id_ticket=:id_ticket";
                                $statement = $db->prepare($sql);
                                $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                                $statement->execute();
                                $sql = "DELETE FROM teatro_backup.tsa_ticket_promocion_tarjeta WHERE id_ticket=:id_ticket";
                                $statement = $db->prepare($sql);
                                $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                                $statement->execute();
                                $sql = "DELETE FROM teatro_backup.tsa_ticket_promocion_factor_compra WHERE id_ticket=:id_ticket";
                                $statement = $db->prepare($sql);
                                $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                                $statement->execute();
                                foreach($lista3 as $llave => $valo) {
                                  $sql = "DELETE FROM teatro_backup.tsa_ticket_asiento WHERE id_ticket=:id_ticket";
                                  $statement = $db->prepare($sql);
                                  $statement->bindValue(':id_ticket', $valo, \PDO::PARAM_STR);
                                  $statement->execute();
                                }
                                $sql = "DELETE FROM teatro_backup.tsa_ticket WHERE id_compra=:id_compra";
                                $statement = $db->prepare($sql);
                                $statement->bindValue(':id_compra', $id_compra, \PDO::PARAM_STR);
                                $statement->execute();
                                $sql = "DELETE FROM teatro_backup.tsa_compra WHERE id_compra=:id_compra";
                                $statement = $db->prepare($sql);
                                $statement->bindValue(':id_compra', $id_compra, \PDO::PARAM_STR);
                                $statement->execute();
                                foreach($lista as $llave => $valo) {
                                  if ($valo[0]=="1") {
                                    $sql = "UPDATE teatro_backup.tsa_platea_funcion SET vendido=vendido-:cantidad WHERE id_platea=:id_platea and id_funcion=:id_funcion;";
                                    $statement = $db->prepare($sql);
                                    $statement->bindValue(':cantidad', $valo[1], \PDO::PARAM_STR);
                                    $statement->bindValue(':id_funcion', $valo[2], \PDO::PARAM_STR);
                                    $statement->bindValue(':id_platea',$valo[3], \PDO::PARAM_STR);
                                    $statement->execute();
                                  }
                                  if ($valo[0]=="2") {
                                    $sql = "UPDATE teatro_backup.tsa_distribucion SET estado='E' WHERE id_distribucion=:id_distribucion";
                                    $statement = $db->prepare($sql);
                                    $statement->bindValue(':id_distribucion',  $valo[1], \PDO::PARAM_STR);
                                    $statement->execute();
                                  }
                                }
                                foreach($lista2 as $llave => $valores) {
                                  if ($valores[0]=="1") {
                                    $sql = "UPDATE tsa_bloqueo_cantidad set fecha_creacion=now() WHERE id_bloqueo_cantidad=:id_bloqueo_cantidad";
                                    $statement = $db->prepare($sql);
                                    $statement->bindValue(':id_bloqueo_cantidad', $valores[1], \PDO::PARAM_STR);
                                    $result = $statement->execute();
                                  }
                                  if ($valores[0]=="2") {
                                    $sql = "UPDATE tsa_bloqueo_asiento set fecha_creacion=now() WHERE id_bloqueo_asiento=:id_bloqueo_asiento";
                                    $statement = $db->prepare($sql);
                                    $statement->bindValue(':id_bloqueo_asiento', $valores[1], \PDO::PARAM_STR);
                                    $result = $statement->execute();
                                  }
                                }
                                $result = false;
                                $out["codigo"] = "102";
                                $out["mensaje"] = $error_102_mensaje;
                                $out["causa"] = $error_102_causa;
                                $out["error"] = $th->getMessage();
                                $response->getBody()->write(json_encode($out));
                                return $response->withStatus(500);
                            }
                        }else if($tipo==2){
                          $id_platea=$Pcantidad[0];
                          $id_asiento=$Pcantidad[1];
                          $asiento=$Pcantidad[2];
                          $precio=$Pcantidad[3];
                            try {
                              if ($id_ticket!=0) {
                                $sql = "INSERT INTO teatro_backup.tsa_ticket_asiento (id_ticket,asiento,precio,usuario_creacion,id_platea)
                                VALUES (:id_ticket,:asiento,:precio,:usuario_creacion,:id_platea)";
                                $statement = $db->prepare($sql);
                                $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                                $statement->bindValue(':asiento', $asiento, \PDO::PARAM_STR);
                                $statement->bindValue(':precio',  $precio, \PDO::PARAM_STR);
                                $statement->bindValue(':id_platea', $id_platea, \PDO::PARAM_STR);
                                $statement->bindValue(':usuario_creacion', $user_id, \PDO::PARAM_STR);
                                $statement->execute();
                                $sql = "UPDATE teatro_backup.tsa_distribucion SET estado='V' WHERE id_distribucion=:id_distribucion";
                                $statement = $db->prepare($sql);
                                $statement->bindValue(':id_distribucion', $id_asiento, \PDO::PARAM_STR);
                                $statement->execute();
                                $lista[]= array("2", $id_asiento,$id_funcion,$id_platea);
                                  $lista3[]= $id_ticket;
                              }else{
                                $this->rembolso($id_transacion);
                                $sql = "DELETE FROM teatro_backup.tsa_ticket_asiento WHERE id_ticket=:id_ticket";
                                $statement = $db->prepare($sql);
                                $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                                $statement->execute();
                                $sql = "DELETE FROM teatro_backup.tsa_ticket_promocion_codigo WHERE id_ticket=:id_ticket";
                                $statement = $db->prepare($sql);
                                $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                                $statement->execute();
                                $sql = "DELETE FROM teatro_backup.tsa_ticket_promocion_cruzados WHERE id_ticket=:id_ticket";
                                $statement = $db->prepare($sql);
                                $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                                $statement->execute();
                                $sql = "DELETE FROM teatro_backup.tsa_ticket_promocion_factor_pago WHERE id_ticket=:id_ticket";
                                $statement = $db->prepare($sql);
                                $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                                $statement->execute();
                                $sql = "DELETE FROM teatro_backup.tsa_ticket_promocion_tarjeta WHERE id_ticket=:id_ticket";
                                $statement = $db->prepare($sql);
                                $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                                $statement->execute();
                                $sql = "DELETE FROM teatro_backup.tsa_ticket_promocion_factor_compra WHERE id_ticket=:id_ticket";
                                $statement = $db->prepare($sql);
                                $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                                $statement->execute();
                                foreach($lista3 as $llave => $valo) {
                                  $sql = "DELETE FROM teatro_backup.tsa_ticket_asiento WHERE id_ticket=:id_ticket";
                                  $statement = $db->prepare($sql);
                                  $statement->bindValue(':id_ticket', $valo, \PDO::PARAM_STR);
                                  $statement->execute();

                                }
                                $sql = "DELETE FROM teatro_backup.tsa_ticket WHERE id_compra=:id_compra";
                                $statement = $db->prepare($sql);
                                $statement->bindValue(':id_compra', $id_compra, \PDO::PARAM_STR);
                                $statement->execute();
                                $sql = "DELETE FROM teatro_backup.tsa_compra WHERE id_compra=:id_compra";
                                $statement = $db->prepare($sql);
                                $statement->bindValue(':id_compra', $id_compra, \PDO::PARAM_STR);
                                $statement->execute();
                                foreach($lista as $llave => $valo) {
                                  if ($valo[0]=="1") {
                                    $sql = "UPDATE teatro_backup.tsa_platea_funcion SET vendido=vendido-:cantidad WHERE id_platea=:id_platea and id_funcion=:id_funcion;";
                                    $statement = $db->prepare($sql);
                                    $statement->bindValue(':cantidad', $valo[1], \PDO::PARAM_STR);
                                    $statement->bindValue(':id_funcion', $valo[2], \PDO::PARAM_STR);
                                    $statement->bindValue(':id_platea',$valo[3], \PDO::PARAM_STR);
                                    $statement->execute();
                                  }
                                  if ($valo[0]=="2") {
                                    $sql = "UPDATE teatro_backup.tsa_distribucion SET estado='E' WHERE id_distribucion=:id_distribucion";
                                    $statement = $db->prepare($sql);
                                    $statement->bindValue(':id_distribucion',  $valo[1], \PDO::PARAM_STR);
                                    $statement->execute();
                                  }
                                }
                                foreach($lista2 as $llave => $valores) {
                                  if ($valores[0]=="1") {
                                    $sql = "UPDATE tsa_bloqueo_cantidad set fecha_creacion=now() WHERE id_bloqueo_cantidad=:id_bloqueo_cantidad";
                                    $statement = $db->prepare($sql);
                                    $statement->bindValue(':id_bloqueo_cantidad', $valores[1], \PDO::PARAM_STR);
                                    $result = $statement->execute();
                                  }
                                  if ($valores[0]=="2") {
                                    $sql = "UPDATE tsa_bloqueo_asiento set fecha_creacion=now() WHERE id_bloqueo_asiento=:id_bloqueo_asiento";
                                    $statement = $db->prepare($sql);
                                    $statement->bindValue(':id_bloqueo_asiento', $valores[1], \PDO::PARAM_STR);
                                    $result = $statement->execute();
                                  }
                                }
                                $out["codigo"] = "102";
                                $out["mensaje"] = $error_102_mensaje;
                                $out["causa"] = $error_102_causa;
                                $response->getBody()->write(json_encode($out));
                                return $response->withStatus(500);
                              }
                            } catch(\PDOException $th) {
                                $this->rembolso($id_transacion);
                                $sql = "DELETE FROM teatro_backup.tsa_ticket_asiento WHERE id_ticket=:id_ticket";
                                $statement = $db->prepare($sql);
                                $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                                $statement->execute();
                                $sql = "DELETE FROM teatro_backup.tsa_ticket_promocion_codigo WHERE id_ticket=:id_ticket";
                                $statement = $db->prepare($sql);
                                $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                                $statement->execute();
                                $sql = "DELETE FROM teatro_backup.tsa_ticket_promocion_cruzados WHERE id_ticket=:id_ticket";
                                $statement = $db->prepare($sql);
                                $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                                $statement->execute();
                                $sql = "DELETE FROM teatro_backup.tsa_ticket_promocion_factor_pago WHERE id_ticket=:id_ticket";
                                $statement = $db->prepare($sql);
                                $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                                $statement->execute();
                                $sql = "DELETE FROM teatro_backup.tsa_ticket_promocion_tarjeta WHERE id_ticket=:id_ticket";
                                $statement = $db->prepare($sql);
                                $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                                $statement->execute();
                                $sql = "DELETE FROM teatro_backup.tsa_ticket_promocion_factor_compra WHERE id_ticket=:id_ticket";
                                $statement = $db->prepare($sql);
                                $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                                $statement->execute();
                                foreach($lista3 as $llave => $valo) {
                                  $sql = "DELETE FROM teatro_backup.tsa_ticket_asiento WHERE id_ticket=:id_ticket";
                                  $statement = $db->prepare($sql);
                                  $statement->bindValue(':id_ticket', $valo, \PDO::PARAM_STR);
                                  $statement->execute();

                                }
                                $sql = "DELETE FROM teatro_backup.tsa_ticket WHERE id_compra=:id_compra";
                                $statement = $db->prepare($sql);
                                $statement->bindValue(':id_compra', $id_compra, \PDO::PARAM_STR);
                                $statement->execute();
                                $sql = "DELETE FROM teatro_backup.tsa_compra WHERE id_compra=:id_compra";
                                $statement = $db->prepare($sql);
                                $statement->bindValue(':id_compra', $id_compra, \PDO::PARAM_STR);
                                $statement->execute();
                                foreach($lista as $llave => $valo) {
                                  if ($valo[0]=="1") {
                                    $sql = "UPDATE teatro_backup.tsa_platea_funcion SET vendido=vendido-:cantidad WHERE id_platea=:id_platea and id_funcion=:id_funcion;";
                                    $statement = $db->prepare($sql);
                                    $statement->bindValue(':cantidad', $valo[1], \PDO::PARAM_STR);
                                    $statement->bindValue(':id_funcion', $valo[2], \PDO::PARAM_STR);
                                    $statement->bindValue(':id_platea',$valo[3], \PDO::PARAM_STR);
                                    $statement->execute();
                                  }
                                  if ($valo[0]=="2") {
                                    $sql = "UPDATE teatro_backup.tsa_distribucion SET estado='E' WHERE id_distribucion=:id_distribucion";
                                    $statement = $db->prepare($sql);
                                    $statement->bindValue(':id_distribucion',  $valo[1], \PDO::PARAM_STR);
                                    $statement->execute();
                                  }
                                }
                                foreach($lista2 as $llave => $valores) {
                                  if ($valores[0]=="1") {
                                    $sql = "UPDATE tsa_bloqueo_cantidad set fecha_creacion=now() WHERE id_bloqueo_cantidad=:id_bloqueo_cantidad";
                                    $statement = $db->prepare($sql);
                                    $statement->bindValue(':id_bloqueo_cantidad', $valores[1], \PDO::PARAM_STR);
                                    $result = $statement->execute();
                                  }
                                  if ($valores[0]=="2") {
                                    $sql = "UPDATE tsa_bloqueo_asiento set fecha_creacion=now() WHERE id_bloqueo_asiento=:id_bloqueo_asiento";
                                    $statement = $db->prepare($sql);
                                    $statement->bindValue(':id_bloqueo_asiento', $valores[1], \PDO::PARAM_STR);
                                    $result = $statement->execute();
                                  }
                                }
                                $result = false;
                                $out["codigo"] = "102";
                                $out["mensaje"] = $error_102_mensaje;
                                $out["causa"] = $error_102_causa;
                                $out["error"] = $th->getMessage();
                                $response->getBody()->write(json_encode($out));
                                return $response->withStatus(500);
                            }

                        }else{
                          $this->rembolso($id_transacion);
                          $out["codigo"] = "214";
                          $out["mensaje"] = $error_214_mensaje;
                          $out["causa"] = $error_214_causa;
                          $response->getBody()->write(json_encode($out));
                          return $response->withStatus(400);
                        }
                      }
                  }
              }

              foreach($lista2 as $llave => $valores) {
                if ($valores[0]=="1") {
                  $sql = "DELETE FROM tsa_bloqueo_cantidad WHERE id_bloqueo_cantidad=:id_bloqueo_cantidad";
                  $statement = $db->prepare($sql);
                  $statement->bindValue(':id_bloqueo_cantidad', $valores[1], \PDO::PARAM_STR);
                  $result = $statement->execute();
                }
                if ($valores[0]=="2") {
                  $sql = "DELETE FROM tsa_bloqueo_asiento WHERE id_bloqueo_asiento=:id_bloqueo_asiento";
                  $statement = $db->prepare($sql);
                  $statement->bindValue(':id_bloqueo_asiento', $valores[1], \PDO::PARAM_STR);
                  $result = $statement->execute();
                }
              }
              $ticketT=null;
              $lista4=[];

              //puntos amigos teatro
              $sql = "SELECT te.nombre,tc.total, tta.asiento, tc.id_compra, tta.id_ticket_asiento FROM tsa_ticket tt INNER JOIN  tsa_funcion tf ON tf.id_funcion =tt.id_funcion
                  INNER JOIN  tsa_evento te ON te.id_evento =tf.id_evento INNER JOIN tsa_compra tc ON tc.id_compra =tt.id_compra inner join tsa_ticket_asiento tta on tta.id_ticket =tt.id_ticket anD tc.id_compra=:id_compra";
              $statement = $db->prepare($sql);
              $statement->bindValue(':id_compra', $id_compra, \PDO::PARAM_STR);
              $result = $statement->execute();
              $eve= [];
              $eve1= "";
              $cantidadT=0;
              $cantidad=0;
              while($item = $statement->fetch()){
                if (!in_array($item->nombre, $eve)) {
                    $eve[]= $item->nombre;
                    $eve1= $eve1.$item->nombre.",";
                }
                if (is_numeric($item->asiento)) {
                    $cantidad=$cantidad+$item->asiento;
                }else{
                    $cantidad=$cantidad+1;
                }
                $cantidadT=$item->total;
              }
              $whole = floor($cantidadT);
              $puntos= $whole-$dolares_canjeados;
              $sql = "INSERT INTO teatro_backup.tsa_amigos_puntos (id_usuario_cliente,id_compra,evento,cantidad,puntos,puntos_ganados,fecha_consumo) VALUES (:id_usuario_cliente,:id_compra,:evento,:cantidad,:puntos,:puntos_ganados,now());";
              $statement = $db->prepare($sql);
              $statement->bindValue(':id_usuario_cliente', $user_id, \PDO::PARAM_STR);
              $statement->bindValue(':id_compra', $id_compra, \PDO::PARAM_STR);
              $statement->bindValue(':evento', substr($eve1, 0, -1), \PDO::PARAM_STR);
              $statement->bindValue(':cantidad', $cantidad, \PDO::PARAM_STR);
              $statement->bindValue(':puntos', $dolares_canjeados, \PDO::PARAM_STR);
              $statement->bindValue(':puntos_ganados', $whole, \PDO::PARAM_STR);
              $statement->execute();
              $nombreU="TEATRO";
              $apellidoU="SANCHEZ AGUILAR";
              $client1->compraFactura($id_compra,"C",$user_id);
              foreach($lista3 as $llave => $valores) {
                if (!in_array($valores, $lista4)) {
                  $sql = "SELECT tuc.nombres as nombreU, tuc.apellidos as apellidosU, te.*, tt.precio ,tt.sala, tf.fecha, tt.id_ticket, tta.asiento,tt.estado as estado_ticket FROM tsa_ticket tt
                  INNER JOIN  tsa_usuario_cliente tuc ON tuc.id_usuario_cliente=tt.id_usuario_cliente
                  INNER JOIN  tsa_funcion tf ON tf.id_funcion =tt.id_funcion
                  INNER JOIN  tsa_ticket_asiento tta ON tta.id_ticket =tt.id_ticket
                  INNER JOIN  tsa_evento te ON te.id_evento =tf.id_evento and tt.id_ticket=:id_ticket and tuc.id_usuario_cliente =:id_usuario  ORDER BY tf.fecha ASC ";
                  $statement = $db->prepare($sql);
                  $statement->bindValue(':id_usuario', $user_id, \PDO::PARAM_STR);
                  $statement->bindValue(':id_ticket', $valores, \PDO::PARAM_STR);
                  $result = $statement->execute();
                  $tickets= [];
                  $ticket= [];

                  $asientos= [];
                  $ruta= "https://teatrosanchezaguilar.org/imagenes/evento/";
                  while($item = $statement->fetch()){
                    if (!in_array($item->id_ticket, $tickets)) {
                        $cad = "000000000000";
                        $miCadena = strval($item->id_ticket);
                        $cant=strlen($miCadena);
                        $xx=11-$cant;
                        $miCadena=substr($cad, 0, $xx).$miCadena."1";
                        $auth_token = base64_encode($miCadena);
                        $auth_token1 = base64_encode($auth_token);
                        $nombreU=$item->nombreU;
                        $apellidoU=$item->apellidosU;
                        $client->sendMail1("3", $email,  $item->id_ticket,($nombreU).' '.($apellidoU),$auth_token1);
                        $ticket[$item->id_ticket]= array('id_ticket'=> $item->id_ticket, 'nombre'=> $item->nombre, 'duracion'=> $item->duracion, 'imagen'=> $ruta_evento.$item->id_evento."H.png",
                         'tipo'=> $item->tipo,'sala'=> $item->sala,'precio'=> $item->precio,'fecha'=> $item->fecha,'estado'=> $item->estado_ticket,'qr'=>$auth_token1);
                        $tickets[]= $item->id_ticket;
                    }
                    $asientos[$item->id_ticket][]=$item->asiento;
                  }
                  foreach ($tickets as $clave) {
                      $ticket[$clave]['asientos']=  $asientos[$clave];
                      $ticketT[]=$ticket[$clave];
                  }
                  $lista4[]=$valores;
                }

              }

              if ($donacion!="0") {
                $client->sendMail1("4", $email, "",($nombreU).' '.($apellidoU),"");
              }
              $out =$ticketT;
              $response->getBody()->write(json_encode($out));
            }
        } catch (\PDOException $th) {
            $result = false;
            $out["codigo"] = "102";
            $out["mensaje"] = $error_102_mensaje;
            $out["causa"] = $error_102_causa;
            $out["error"] = $th->getMessage();
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        return $response;
    }

    public function compra($request, $response, $args){
        include("error.php");
        include ("conect.php");
        include ("conect0.php");
        $response = $response->withHeader('Content-Type', 'application/json');
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
            $out["codigo"] = "100";
            $out["mensaje"] = $error_100_mensaje;
            $out["causa"] =  $error_100_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            $out["codigo"] = "101";
            $out["mensaje"] = $error_101_mensaje;
            $out["causa"] = $error_101_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(401);
        }

        // FIN VALIDACION
        $json = $request->getBody();
        $body = json_decode($json, true);
        if (!(isset($body["id_facturacion"]) && isset($body["email"])  && isset($body["donacion"]) && isset($body["user_id"]) && isset($body["user_token"]) && isset($body["dolares_canjeados"]) &&
        isset($body["eventos"]) && isset($body["sub_total"]) && isset($body["total_descuento"]) && isset($body["iva"]) && isset($body["total"]))){
          $out["codigo"] = "201";
          $out["mensaje"] = $error_201_mensaje;
          $out["causa"] = $error_201_causa;
          $response->getBody()->write(json_encode($out));
          return $response->withStatus(400);
        }
        $email= trim($body["email"]);
        $id_facturacion= trim($body["id_facturacion"]);
        $donacion= trim($body["donacion"]);
        $user_id= trim($body["user_id"]);
        $user_token= trim($body["user_token"]);
        $dolares_canjeados= trim($body["dolares_canjeados"]);
        $sub_total= trim($body["sub_total"]);
        $total_descuento= trim($body["total_descuento"]);
        $iva= trim($body["iva"]);
        $total= trim($body["total"]);
        $eventos= explode(';',trim($body["eventos"]));
        $total_iva= $sub_total-$dolares_canjeados-$total_descuento;
        $ivaC= number_format($total_iva*0, 3, '.', '');
        $totalC=  number_format($total_iva+$donacion+$ivaC, 2, '.', '');

        if ($total_iva < 0) {
          $out["codigo"] = "218";
          $out["mensaje"] = $error_218_mensaje;
          $out["causa"] = $error_218_causa;
          $out["Valor sin iva"] = $total_iva;
          $response->getBody()->write(json_encode($out));
          return $response->withStatus(400);
        }
        if ($ivaC != $iva) {
          $out["codigo"] = "217";
          $out["mensaje"] = $error_217_mensaje;
          $out["causa"] = $error_217_causa;
          $out["Iva calculado"] = $ivaC;
          $response->getBody()->write(json_encode($out));
          return $response->withStatus(400);
        }
        if ($totalC != $total) {
          $out["codigo"] = "218";
          $out["mensaje"] = $error_218_mensaje;
          $out["causa"] = $error_218_causa;
          $out["total calculado"] = $totalC;
          $response->getBody()->write(json_encode($out));
          return $response->withStatus(400);
        }
        //VALIDACIONES
        $cantidadT=0;

        $descuentoT=0;
        $lista2=[];
        $ban=false;
        $factorDA =0;
        $descuentoDA =0;
        $totalDA =0;
        $sql = "SELECT *  FROM tsa_factor_amigos ts WHERE ts.id_factor_amigos=1";
        $statement = $db->prepare($sql);
        $result = $statement->execute();
        while($item = $statement->fetch()){
          $factorDA =$item->factor;
          $descuentoDA =$item->descuento;
          $totalDA =$factorDA/$descuentoDA ;
        }
        $sql = "SELECT tuc.puntos_acumulados  from tsa_usuario_cliente tuc WHERE id_usuario_cliente=:id_usuario";
        $statement = $db->prepare($sql);
        $statement->bindValue(':id_usuario', $user_id, \PDO::PARAM_STR);
        $result = $statement->execute();
        $item = $statement->fetch();
        if (!$item){
          $out["codigo"] = "202";
          $out["mensaje"] = $error_202_mensaje;
          $out["causa"] =  $error_202_causa;
          $response->getBody()->write(json_encode($out));
          return $response->withStatus(400);
        }else{
          $val=$dolares_canjeados*$totalDA;
          if ($val>$item->puntos_acumulados) {
            $out["codigo"] = "224";
            $out["mensaje"] = $error_224_mensaje;
            $out["causa"] =  $error_224_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(400);
          }

        }

        foreach($eventos as $llave => $valores) {
            if($valores!=""){
              $valor= explode(',',trim($valores));
              if (isset($valor[8])) {
                $tipo=$valor[0];
                $id_evento=$valor[1];
                $id_funcion=$valor[2];
                $asientosT=$valor[3];
                $asientos= explode('-',trim($asientosT));
                $id_promocion=$valor[4];
                $tipo_promocion=$valor[5];
                $totalP=$valor[6];
                $descuentoP=$valor[7];
                $cantidadT=$cantidadT+$totalP;
                $descuentoT=$descuentoT+$descuentoP;
                $cantidadT2=0;
                if ($id_promocion!=0) {
                  if ($tipo_promocion=="FC" | $tipo_promocion=="CD" | $tipo_promocion=="FP" | $tipo_promocion=="BT" | $tipo_promocion=="CP") {
                  }else{
                    $out["codigo"] = "220";
                    $out["mensaje"] = $error_220_mensaje;
                    $out["causa"] = $error_220_causa;
                    $response->getBody()->write(json_encode($out));
                    return $response->withStatus(400);
                  }
                }
                foreach($asientos as $llave => $valores1) {
                  $Pcantidad= explode(':',trim($valores1));
                  if ($tipo==1) {
                      if (isset($Pcantidad[2])) {
                          $id_platea=$Pcantidad[0];
                          $cantidad=$Pcantidad[1];
                          $precio=$Pcantidad[2];
                          $cantidadT2=$cantidadT2+$precio;
                      }else{
                        $out["codigo"] = "213";
                        $out["mensaje"] = $error_213_mensaje;
                        $out["causa"] = $error_213_causa;
                        $response->getBody()->write(json_encode($out));
                        return $response->withStatus(400);
                      }
                      $sql = "SELECT bc.id_bloqueo_cantidad FROM tsa_platea tp  INNER JOIN tsa_platea_funcion tpf ON tp.id_platea = tpf.id_platea INNER JOIN tsa_bloqueo_cantidad bc ON bc.id_platea_funcion = tpf.id_platea_funcion and id_funcion=:funcion and tpf.id_platea =:platea and bc.id_usuario_cliente =:id_usuario and bc.cantidad =:cantidad";
                      $statement = $db->prepare($sql);
                      $statement->bindValue(':platea', $id_platea, \PDO::PARAM_STR);
                      $statement->bindValue(':funcion', $id_funcion, \PDO::PARAM_STR);
                      $statement->bindValue(':id_usuario', $user_id, \PDO::PARAM_STR);
                      $statement->bindValue(':cantidad', $cantidad, \PDO::PARAM_STR);
                      $result = $statement->execute();
                      $item = $statement->fetch();
                      if (!$item){
                        $out["codigo"] = "212";
                        $out["mensaje"] = $error_212_mensaje;
                        $out["causa"] =  $error_212_causa;
                        $out["funcion"] =  $id_funcion;
                        $response->getBody()->write(json_encode($out));
                          return $response->withStatus(400);
                      }else{
                        $lista2[]=["1",$item->id_bloqueo_cantidad];
                      }
                  }else if($tipo==2){
                      if (isset($Pcantidad[3])) {
                        $id_platea=$Pcantidad[0];
                        $id_asiento=$Pcantidad[1];
                        $asiento=$Pcantidad[2];
                        $precio=$Pcantidad[3];
                        $cantidadT2=$cantidadT2+$precio;
                      }else{
                        $out["codigo"] = "213";
                        $out["mensaje"] = $error_213_mensaje;
                        $out["causa"] = $error_213_causa;
                        $response->getBody()->write(json_encode($out));
                        return $response->withStatus(400);
                      }
                      $sql = "SELECT * FROM tsa_bloqueo_asiento WHERE id_usuario_cliente=:id_usuario and id_distribucion=:asiento";
                      $statement = $db->prepare($sql);
                      $statement->bindValue(':id_usuario', $user_id, \PDO::PARAM_STR);
                      $statement->bindValue(':asiento', $id_asiento, \PDO::PARAM_STR);
                      $result = $statement->execute();
                      $item = $statement->fetch();
                      if (!$item){
                        $out["codigo"] = "212";
                        $out["mensaje"] = $error_212_mensaje;
                        $out["causa"] =  $error_212_causa;
                        $out["id_asiento"] =  $id_asiento;
                        $response->getBody()->write(json_encode($out));
                        return $response;
                      }else{
                        $lista2[]=["2",$item->id_bloqueo_asiento];
                      }
                  }else{
                    $out["codigo"] = "214";
                    $out["mensaje"] = $error_214_mensaje;
                    $out["causa"] = $error_214_causa;
                    $response->getBody()->write(json_encode($out));
                    return $response->withStatus(400);
                  }
                }
                if ($cantidadT2 != $totalP) {
                  $out["codigo"] = "215";
                  $out["mensaje"] = $error_215_mensaje;
                  $out["causa"] = $error_215_causa;
                  $out["Total"] = $cantidadT2;
                  $out["evento"] = $id_evento;
                  $response->getBody()->write(json_encode($out));
                  return $response->withStatus(400);
                }
              }else{
                $out["codigo"] = "213";
                $out["mensaje"] = $error_213_mensaje;
                $out["causa"] = $error_213_causa;
                $response->getBody()->write(json_encode($out));
                return $response->withStatus(400);
              }
            }
        }
        if ($sub_total != $cantidadT) {
          $out["codigo"] = "215";
          $out["mensaje"] = $error_215_mensaje;
          $out["causa"] = $error_215_causa;
          $out["Cantidad Total"] = $cantidadT;
          $response->getBody()->write(json_encode($out));
          return $response->withStatus(400);
        }
        if ($total_descuento!=$descuentoT) {
          $out["codigo"] = "216";
          $out["mensaje"] = $error_216_mensaje;
          $out["causa"] = $error_216_causa;
          $out["Descuento Total"] = $total_descuento;
          $response->getBody()->write(json_encode($out));
          return $response->withStatus(400);
        }
        //tipo 1 : cantidad
        //tipo 2 : asientos
        //tipo,id_evento,id_funcion,id_platea:cantidad-id_platea:cantidad,id_promocion,total, descuento;
        //tipo,id_evento,id_funcion,asiento1-asiento2,id_promocion,total, descuento;
        $id_transacion="";
        $authorization_code="";
        $status_transacion="";
        try {
            $API_LOGIN_DEV     = "TPP3-EC-SERVER";
            $API_KEY_DEV       = "JdXTDl2d0o0B8ANZ1heJOq7tf62PC6";
            $server_application_code = $API_LOGIN_DEV;
            $server_app_key = $API_KEY_DEV ;
            $date = new \DateTime();
            //$date = date("Y-m-d H:i:s");
            $unix_timestamp = $date->getTimestamp();
            // $unix_timestamp = "1546543146";
            $uniq_token_string = $server_app_key.$unix_timestamp;
            $uniq_token_hash = hash('sha256', $uniq_token_string);
            $auth_token = base64_encode($server_application_code.";".$unix_timestamp.";".$uniq_token_hash);
            $user["id"]=$user_id;
            $user["email"]=$email;
            $order["amount"]=(float)$totalC;
            $order["description"]="Teatro Sanchez Aguilar-Compra de Ticket App";
            $order["dev_reference"]=$user_id;
            $order["vat"]=0;
            $order["tax_percentage"]=0;
            $order["taxable_amount"]=0;
            $card["token"]= $user_token;
            $data = array();
            $data["user"] =$user;
            $data["order"] = $order;
            $data["card"] = $card;
            $url="https://ccapi.paymentez.com/v2/transaction/debit/";
            $curl = curl_init($url);
            $headers = array();
            $headers[] = 'Cache-Control: no-cache';
            $headers[] = 'Auth-Token:'.$auth_token;
            $headers[] = 'Content-Type: application/json; charset= utf-8';
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            $result = curl_exec($curl);
            curl_close($curl);
            $resultado =json_decode($result, true);
            if (isset($resultado['transaction'])) {
              if ($resultado["transaction"]["status"]=="success") {
                  $id_transacion=$resultado["transaction"]["id"];
                  $authorization_code=$resultado["transaction"]["authorization_code"];
                  $status_transacion="S";
                  $ban=true;
              }else{
                if ($resultado["transaction"]["status"]=="pending") {
                    $id_transacion=$resultado["transaction"]["id"];
                    $authorization_code="";
                    $status_transacion="P";
                    $ban=true;
                }else{
                    $ban=false;
                }
                $response->getBody()->write(json_encode($resultado["transaction"]["status"]));

              }
            }else{
              $result = false;
              $out["codigo"] = "219";
              $out["mensaje"] = $error_219_mensaje;
              $out["causa"] = $error_219_causa;
              $response->getBody()->write(json_encode($out));
              return $response->withStatus(400);
            }

        } catch (\PDOException $th) {
            $result = false;
            $out["codigo"] = "219";
            $out["mensaje"] = $error_219_mensaje;
            $out["causa"] = $error_219_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        $tipoA="A";
        if ($request->hasHeader('Canal')) {
            $YB = $request->getHeader('Canal');
            if ($YB[0]==="web") {
              $tipoA="W";
            }
        }
          $id_compra=0;
        try {
            if ($ban) {
              try {
                  $sql = "INSERT INTO teatro_backup.tsa_compra (id_facturacion,id_usuario_cliente,dolares_canjeados,donacion,sub_total,descuento,iva,total,usuario_creacion,id_transacion,authorization_code,status_transacion,tipo,email)
                  VALUES (:id_facturacion,:id_usuario_cliente,:dolares_canjeados,:donacion,:sub_total,:descuento,:iva,:total,:usuario_creacion,:id_transacion,:authorization_code,:status_transacion, :tipo,:email)";
                  $statement = $db->prepare($sql);
                  $statement->bindValue(':id_facturacion', $id_facturacion, \PDO::PARAM_STR);
                  $statement->bindValue(':id_usuario_cliente', $user_id, \PDO::PARAM_STR);
                  $statement->bindValue(':dolares_canjeados', $dolares_canjeados, \PDO::PARAM_STR);
                  $statement->bindValue(':donacion', $donacion, \PDO::PARAM_STR);
                  $statement->bindValue(':sub_total', $sub_total, \PDO::PARAM_STR);
                  $statement->bindValue(':descuento', $total_descuento, \PDO::PARAM_STR);
                  $statement->bindValue(':iva', $iva, \PDO::PARAM_STR);
                  $statement->bindValue(':total', $totalC, \PDO::PARAM_STR);
                  $statement->bindValue(':id_transacion', $id_transacion, \PDO::PARAM_STR);
                  $statement->bindValue(':authorization_code', $authorization_code, \PDO::PARAM_STR);
                  $statement->bindValue(':status_transacion', $status_transacion, \PDO::PARAM_STR);
                  $statement->bindValue(':usuario_creacion', $user_id, \PDO::PARAM_STR);
                  $statement->bindValue(':tipo', $tipoA, \PDO::PARAM_STR);
                  $statement->bindValue(':email', $email, \PDO::PARAM_STR);
                  $statement->execute();
                  $id_compra=$db->lastInsertId();
              } catch(\PDOException $th) {
                $this->rembolso($id_transacion);
                $result = false;
                $out["codigo"] = "102";
                $out["mensaje"] = $error_102_mensaje;
                $out["causa"] = $error_102_causa;
                $out["error"] = $th->getMessage();
                $response->getBody()->write(json_encode($out));
                return $response->withStatus(500);
              }
              $lista=[];
              $lista3=[];
              foreach($eventos as $llave => $valores) {
                  if($valores!=""){
                    $valor= explode(',',trim($valores));
                      $tipo=$valor[0];
                      $id_evento=$valor[1];
                      $id_funcion=$valor[2];
                      $asientosT=$valor[3];
                      $asientos= explode('-',trim($asientosT));
                      $id_promocion=$valor[4];
                      $tipo_promocion=$valor[5];
                      $totalP=$valor[6];
                      $descuentoP=$valor[7];
                      $sala=$valor[8];
                      $cantidadT=$cantidadT+$totalP;
                      $descuentoT=$descuentoT+$descuentoP;
                      try {
                          $id_ticket=0;
                          if ($id_compra!=0) {
                            $puntos_canjeadosT=$totalP*$dolares_canjeados/$sub_total;
                            $puntos_canjeadosTK=number_format($puntos_canjeadosT, 2);
                            $sql = "INSERT INTO teatro_backup.tsa_ticket (id_funcion,id_usuario_cliente,id_compra,sala,precio,tipo,usuario_creacion,descuento,puntos_canjeados)
                            VALUES (:id_funcion,:id_usuario_cliente,:id_compra,:sala,:precio,:tipo,:usuario_creacion,:descuento,:puntos_canjeados)";
                            $statement = $db->prepare($sql);
                            $statement->bindValue(':id_funcion', $id_funcion, \PDO::PARAM_STR);
                            $statement->bindValue(':id_usuario_cliente', $user_id, \PDO::PARAM_STR);
                            $statement->bindValue(':id_compra', $id_compra, \PDO::PARAM_STR);
                            $statement->bindValue(':sala', $sala, \PDO::PARAM_STR);
                            $statement->bindValue(':precio', $totalP, \PDO::PARAM_STR);
                            $statement->bindValue(':tipo', $tipo, \PDO::PARAM_STR);
                            $statement->bindValue(':usuario_creacion', $user_id, \PDO::PARAM_STR);
                            $statement->bindValue(':descuento', $descuentoP, \PDO::PARAM_STR);
                            $statement->bindValue(':puntos_canjeados', $puntos_canjeadosTK, \PDO::PARAM_STR);
                            $statement->execute();
                            $id_ticket=$db->lastInsertId();
                            if ($id_promocion!=0) {
                              if ($tipo_promocion=="FC" | $tipo_promocion=="CD" | $tipo_promocion=="FP" | $tipo_promocion=="BT" | $tipo_promocion=="CP") {
                                  if ($tipo_promocion=="FC") {
                                    $sql = "INSERT INTO teatro_backup.tsa_ticket_promocion_factor_compra (id_promocion,id_ticket,descuento,id_usuario_cliente,usuario_creacion)
                                    VALUES (:id_promocion,:id_ticket,:descuento,:id_usuario_cliente,:usuario_creacion)";
                                    $statement = $db->prepare($sql);
                                    $statement->bindValue(':id_promocion', $id_promocion, \PDO::PARAM_STR);
                                    $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                                    $statement->bindValue(':descuento', $descuentoP, \PDO::PARAM_STR);
                                    $statement->bindValue(':id_usuario_cliente', $user_id, \PDO::PARAM_STR);
                                    $statement->bindValue(':usuario_creacion', $user_id, \PDO::PARAM_STR);
                                    $statement->execute();
                                  }else if ($tipo_promocion=="CD") {
                                    $sql = "INSERT INTO teatro_backup.tsa_ticket_promocion_cruzados (id_promocion,id_ticket,descuento,id_usuario_cliente,usuario_creacion)
                                    VALUES (:id_promocion,:id_ticket,:descuento,:id_usuario_cliente,:usuario_creacion)";
                                    $statement = $db->prepare($sql);
                                    $statement->bindValue(':id_promocion', $id_promocion, \PDO::PARAM_STR);
                                    $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                                    $statement->bindValue(':descuento', $descuentoP, \PDO::PARAM_STR);
                                    $statement->bindValue(':id_usuario_cliente', $user_id, \PDO::PARAM_STR);
                                    $statement->bindValue(':usuario_creacion', $user_id, \PDO::PARAM_STR);
                                    $statement->execute();
                                  }else if ( $tipo_promocion=="FP") {
                                    $sql = "INSERT INTO teatro_backup.tsa_ticket_promocion_factor_pago (id_promocion,id_ticket,descuento,id_usuario_cliente,usuario_creacion)
                                    VALUES (:id_promocion,:id_ticket,:descuento,:id_usuario_cliente,:usuario_creacion)";
                                    $statement = $db->prepare($sql);
                                    $statement->bindValue(':id_promocion', $id_promocion, \PDO::PARAM_STR);
                                    $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                                    $statement->bindValue(':descuento', $descuentoP, \PDO::PARAM_STR);
                                    $statement->bindValue(':id_usuario_cliente', $user_id, \PDO::PARAM_STR);
                                    $statement->bindValue(':usuario_creacion', $user_id, \PDO::PARAM_STR);
                                    $statement->execute();
                                  }else if ( $tipo_promocion=="BT") {
                                    $sql = "INSERT INTO teatro_backup.tsa_ticket_promocion_tarjeta (id_promocion,id_ticket,descuento,id_usuario_cliente,usuario_creacion)
                                    VALUES (:id_promocion,:id_ticket,:descuento,:id_usuario_cliente,:usuario_creacion)";
                                    $statement = $db->prepare($sql);
                                    $statement->bindValue(':id_promocion', $id_promocion, \PDO::PARAM_STR);
                                    $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                                    $statement->bindValue(':descuento', $descuentoP, \PDO::PARAM_STR);
                                    $statement->bindValue(':id_usuario_cliente', $user_id, \PDO::PARAM_STR);
                                    $statement->bindValue(':usuario_creacion', $user_id, \PDO::PARAM_STR);
                                    $statement->execute();
                                  }else {
                                    $sql = "INSERT INTO teatro_backup.tsa_ticket_promocion_codigo (id_promocion,id_ticket,descuento,id_usuario_cliente,usuario_creacion)
                                    VALUES (:id_promocion,:id_ticket,:descuento,:id_usuario_cliente,:usuario_creacion)";
                                    $statement = $db->prepare($sql);
                                    $statement->bindValue(':id_promocion', $id_promocion, \PDO::PARAM_STR);
                                    $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                                    $statement->bindValue(':descuento', $descuentoP, \PDO::PARAM_STR);
                                    $statement->bindValue(':id_usuario_cliente', $user_id, \PDO::PARAM_STR);
                                    $statement->bindValue(':usuario_creacion', $user_id, \PDO::PARAM_STR);
                                    $statement->execute();
                                  }
                              }else{
                                $out["codigo"] = "220";
                                $out["mensaje"] = $error_220_mensaje;
                                $out["causa"] = $error_220_causa;
                                $response->getBody()->write(json_encode($out));
                                return $response->withStatus(400);
                              }

                            }

                          }
                      } catch(\PDOException $th) {
                          $this->rembolso($id_transacion);
                          $sql = "DELETE FROM teatro_backup.tsa_ticket_promocion_codigo WHERE id_ticket=:id_ticket";
                          $statement = $db->prepare($sql);
                          $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                          $statement->execute();
                          $sql = "DELETE FROM teatro_backup.tsa_ticket_promocion_cruzados WHERE id_ticket=:id_ticket";
                          $statement = $db->prepare($sql);
                          $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                          $statement->execute();
                          $sql = "DELETE FROM teatro_backup.tsa_ticket_promocion_factor_pago WHERE id_ticket=:id_ticket";
                          $statement = $db->prepare($sql);
                          $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                          $statement->execute();
                          $sql = "DELETE FROM teatro_backup.tsa_ticket_promocion_tarjeta WHERE id_ticket=:id_ticket";
                          $statement = $db->prepare($sql);
                          $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                          $statement->execute();
                          $sql = "DELETE FROM teatro_backup.tsa_ticket_promocion_factor_compra WHERE id_ticket=:id_ticket";
                          $statement = $db->prepare($sql);
                          $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                          $statement->execute();
                          foreach($lista3 as $llave => $valo) {
                            $sql = "DELETE FROM teatro_backup.tsa_ticket_asiento WHERE id_ticket=:id_ticket";
                            $statement = $db->prepare($sql);
                            $statement->bindValue(':id_ticket', $valo, \PDO::PARAM_STR);
                            $statement->execute();

                          }
                          $sql = "DELETE FROM teatro_backup.tsa_ticket WHERE id_compra=:id_compra";
                          $statement = $db->prepare($sql);
                          $statement->bindValue(':id_compra', $id_compra, \PDO::PARAM_STR);
                          $statement->execute();
                          foreach($lista as $llave => $valo) {
                            if ($valo[0]=="1") {
                              $sql = "UPDATE teatro_backup.tsa_platea_funcion SET vendido=vendido-:cantidad WHERE id_platea=:id_platea and id_funcion=:id_funcion;";
                              $statement = $db->prepare($sql);
                              $statement->bindValue(':cantidad', $valo[1], \PDO::PARAM_STR);
                              $statement->bindValue(':id_funcion', $valo[2], \PDO::PARAM_STR);
                              $statement->bindValue(':id_platea',$valo[3], \PDO::PARAM_STR);
                              $statement->execute();
                            }
                            if ($valo[0]=="2") {
                              $sql = "UPDATE teatro_backup.tsa_distribucion SET estado='E' WHERE id_distribucion=:id_distribucion";
                              $statement = $db->prepare($sql);
                              $statement->bindValue(':id_distribucion',  $valo[1], \PDO::PARAM_STR);
                              $statement->execute();
                            }
                          }
                          foreach($lista2 as $llave => $valores) {
                            if ($valores[0]=="1") {
                              $sql = "UPDATE tsa_bloqueo_cantidad set fecha_creacion=now() WHERE id_bloqueo_cantidad=:id_bloqueo_cantidad";
                              $statement = $db->prepare($sql);
                              $statement->bindValue(':id_bloqueo_cantidad', $valores[1], \PDO::PARAM_STR);
                              $result = $statement->execute();
                            }
                            if ($valores[0]=="2") {
                              $sql = "UPDATE tsa_bloqueo_asiento set fecha_creacion=now() WHERE id_bloqueo_asiento=:id_bloqueo_asiento";
                              $statement = $db->prepare($sql);
                              $statement->bindValue(':id_bloqueo_asiento', $valores[1], \PDO::PARAM_STR);
                              $result = $statement->execute();
                            }
                          }
                          $sql = "DELETE FROM teatro_backup.tsa_compra WHERE id_compra=:id_compra";
                          $statement = $db->prepare($sql);
                          $statement->bindValue(':id_compra', $id_compra, \PDO::PARAM_STR);
                          $statement->execute();
                          $result = false;

                          $out["codigo"] = "102";
                          $out["mensaje"] = $error_102_mensaje;
                          $out["causa"] = $error_102_causa;
                          $out["error"] = $th->getMessage();
                          $response->getBody()->write(json_encode($out));
                          return $response->withStatus(500);
                      }
                      foreach($asientos as $llave => $valores1) {
                        $Pcantidad= explode(':',trim($valores1));
                        if ($tipo==1) {
                            $id_platea=$Pcantidad[0];
                            $cantidad=$Pcantidad[1];
                            $precio=$Pcantidad[2];
                            try {
                                if ($id_ticket!=0) {
                                  $sql = "INSERT INTO teatro_backup.tsa_ticket_asiento (id_ticket,asiento,precio,usuario_creacion,id_platea)
                                  VALUES (:id_ticket,:asiento,:precio,:usuario_creacion,:id_platea)";
                                  $statement = $db->prepare($sql);
                                  $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                                  $statement->bindValue(':asiento', $cantidad, \PDO::PARAM_STR);
                                  $statement->bindValue(':precio',   $precio, \PDO::PARAM_STR);
                                  $statement->bindValue(':id_platea', $id_platea, \PDO::PARAM_STR);
                                  $statement->bindValue(':usuario_creacion', $user_id, \PDO::PARAM_STR);
                                  $statement->execute();

                                  $sql = "UPDATE teatro_backup.tsa_platea_funcion SET vendido=vendido+:cantidad WHERE id_platea=:id_platea and id_funcion=:id_funcion;";
                                  $statement = $db->prepare($sql);
                                  $statement->bindValue(':cantidad', $cantidad, \PDO::PARAM_STR);
                                  $statement->bindValue(':id_funcion', $id_funcion, \PDO::PARAM_STR);
                                  $statement->bindValue(':id_platea', $id_platea, \PDO::PARAM_STR);
                                  $statement->execute();
                                  $lista[]= array("1", $cantidad,$id_funcion,$id_platea);
                                  $lista3[]= $id_ticket;
                                }else{
                                  $this->rembolso($id_transacion);
                                  $sql = "DELETE FROM teatro_backup.tsa_ticket_asiento WHERE id_ticket=:id_ticket";
                                  $statement = $db->prepare($sql);
                                  $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                                  $statement->execute();
                                  $sql = "DELETE FROM teatro_backup.tsa_ticket_promocion_codigo WHERE id_ticket=:id_ticket";
                                  $statement = $db->prepare($sql);
                                  $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                                  $statement->execute();
                                  $sql = "DELETE FROM teatro_backup.tsa_ticket_promocion_cruzados WHERE id_ticket=:id_ticket";
                                  $statement = $db->prepare($sql);
                                  $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                                  $statement->execute();
                                  $sql = "DELETE FROM teatro_backup.tsa_ticket_promocion_factor_pago WHERE id_ticket=:id_ticket";
                                  $statement = $db->prepare($sql);
                                  $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                                  $statement->execute();
                                  $sql = "DELETE FROM teatro_backup.tsa_ticket_promocion_tarjeta WHERE id_ticket=:id_ticket";
                                  $statement = $db->prepare($sql);
                                  $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                                  $statement->execute();
                                  $sql = "DELETE FROM teatro_backup.tsa_ticket_promocion_factor_compra WHERE id_ticket=:id_ticket";
                                  $statement = $db->prepare($sql);
                                  $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                                  $statement->execute();
                                  foreach($lista3 as $llave => $valo) {
                                    $sql = "DELETE FROM teatro_backup.tsa_ticket_asiento WHERE id_ticket=:id_ticket";
                                    $statement = $db->prepare($sql);
                                    $statement->bindValue(':id_ticket', $valo, \PDO::PARAM_STR);
                                    $statement->execute();


                                  }
                                  $sql = "DELETE FROM teatro_backup.tsa_ticket WHERE id_compra=:id_compra";
                                  $statement = $db->prepare($sql);
                                  $statement->bindValue(':id_compra', $id_compra, \PDO::PARAM_STR);
                                  $statement->execute();
                                  $sql = "DELETE FROM teatro_backup.tsa_compra WHERE id_compra=:id_compra";
                                  $statement = $db->prepare($sql);
                                  $statement->bindValue(':id_compra', $id_compra, \PDO::PARAM_STR);
                                  $statement->execute();
                                  foreach($lista as $llave => $valo) {
                                    if ($valo[0]=="1") {
                                      $sql = "UPDATE teatro_backup.tsa_platea_funcion SET vendido=vendido-:cantidad WHERE id_platea=:id_platea and id_funcion=:id_funcion;";
                                      $statement = $db->prepare($sql);
                                      $statement->bindValue(':cantidad', $valo[1], \PDO::PARAM_STR);
                                      $statement->bindValue(':id_funcion', $valo[2], \PDO::PARAM_STR);
                                      $statement->bindValue(':id_platea',$valo[3], \PDO::PARAM_STR);
                                      $statement->execute();
                                    }
                                    if ($valo[0]=="2") {
                                      $sql = "UPDATE teatro_backup.tsa_distribucion SET estado='E' WHERE id_distribucion=:id_distribucion";
                                      $statement = $db->prepare($sql);
                                      $statement->bindValue(':id_distribucion',  $valo[1], \PDO::PARAM_STR);
                                      $statement->execute();
                                    }
                                  }
                                  foreach($lista2 as $llave => $valores) {
                                    if ($valores[0]=="1") {
                                      $sql = "UPDATE tsa_bloqueo_cantidad set fecha_creacion=now() WHERE id_bloqueo_cantidad=:id_bloqueo_cantidad";
                                      $statement = $db->prepare($sql);
                                      $statement->bindValue(':id_bloqueo_cantidad', $valores[1], \PDO::PARAM_STR);
                                      $result = $statement->execute();
                                    }
                                    if ($valores[0]=="2") {
                                      $sql = "UPDATE tsa_bloqueo_asiento set fecha_creacion=now() WHERE id_bloqueo_asiento=:id_bloqueo_asiento";
                                      $statement = $db->prepare($sql);
                                      $statement->bindValue(':id_bloqueo_asiento', $valores[1], \PDO::PARAM_STR);
                                      $result = $statement->execute();
                                    }
                                  }
                                  $out["codigo"] = "102";
                                  $out["mensaje"] = $error_102_mensaje;
                                  $out["causa"] = $error_102_causa;
                                  $response->getBody()->write(json_encode($out));
                                  return $response->withStatus(500);
                                }
                            } catch(\PDOException $th) {
                                $this->rembolso($id_transacion);
                                $sql = "DELETE FROM teatro_backup.tsa_ticket_asiento WHERE id_ticket=:id_ticket";
                                $statement = $db->prepare($sql);
                                $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                                $statement->execute();
                                $sql = "DELETE FROM teatro_backup.tsa_ticket_promocion_codigo WHERE id_ticket=:id_ticket";
                                $statement = $db->prepare($sql);
                                $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                                $statement->execute();
                                $sql = "DELETE FROM teatro_backup.tsa_ticket_promocion_cruzados WHERE id_ticket=:id_ticket";
                                $statement = $db->prepare($sql);
                                $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                                $statement->execute();
                                $sql = "DELETE FROM teatro_backup.tsa_ticket_promocion_factor_pago WHERE id_ticket=:id_ticket";
                                $statement = $db->prepare($sql);
                                $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                                $statement->execute();
                                $sql = "DELETE FROM teatro_backup.tsa_ticket_promocion_tarjeta WHERE id_ticket=:id_ticket";
                                $statement = $db->prepare($sql);
                                $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                                $statement->execute();
                                $sql = "DELETE FROM teatro_backup.tsa_ticket_promocion_factor_compra WHERE id_ticket=:id_ticket";
                                $statement = $db->prepare($sql);
                                $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                                $statement->execute();
                                foreach($lista3 as $llave => $valo) {
                                  $sql = "DELETE FROM teatro_backup.tsa_ticket_asiento WHERE id_ticket=:id_ticket";
                                  $statement = $db->prepare($sql);
                                  $statement->bindValue(':id_ticket', $valo, \PDO::PARAM_STR);
                                  $statement->execute();


                                }
                                $sql = "DELETE FROM teatro_backup.tsa_ticket WHERE id_compra=:id_compra";
                                $statement = $db->prepare($sql);
                                $statement->bindValue(':id_compra', $id_compra, \PDO::PARAM_STR);
                                $statement->execute();
                                $sql = "DELETE FROM teatro_backup.tsa_compra WHERE id_compra=:id_compra";
                                $statement = $db->prepare($sql);
                                $statement->bindValue(':id_compra', $id_compra, \PDO::PARAM_STR);
                                $statement->execute();
                                foreach($lista as $llave => $valo) {
                                  if ($valo[0]=="1") {
                                    $sql = "UPDATE teatro_backup.tsa_platea_funcion SET vendido=vendido-:cantidad WHERE id_platea=:id_platea and id_funcion=:id_funcion;";
                                    $statement = $db->prepare($sql);
                                    $statement->bindValue(':cantidad', $valo[1], \PDO::PARAM_STR);
                                    $statement->bindValue(':id_funcion', $valo[2], \PDO::PARAM_STR);
                                    $statement->bindValue(':id_platea',$valo[3], \PDO::PARAM_STR);
                                    $statement->execute();
                                  }
                                  if ($valo[0]=="2") {
                                    $sql = "UPDATE teatro_backup.tsa_distribucion SET estado='E' WHERE id_distribucion=:id_distribucion";
                                    $statement = $db->prepare($sql);
                                    $statement->bindValue(':id_distribucion',  $valo[1], \PDO::PARAM_STR);
                                    $statement->execute();
                                  }
                                }
                                foreach($lista2 as $llave => $valores) {
                                  if ($valores[0]=="1") {
                                    $sql = "UPDATE tsa_bloqueo_cantidad set fecha_creacion=now() WHERE id_bloqueo_cantidad=:id_bloqueo_cantidad";
                                    $statement = $db->prepare($sql);
                                    $statement->bindValue(':id_bloqueo_cantidad', $valores[1], \PDO::PARAM_STR);
                                    $result = $statement->execute();
                                  }
                                  if ($valores[0]=="2") {
                                    $sql = "UPDATE tsa_bloqueo_asiento set fecha_creacion=now() WHERE id_bloqueo_asiento=:id_bloqueo_asiento";
                                    $statement = $db->prepare($sql);
                                    $statement->bindValue(':id_bloqueo_asiento', $valores[1], \PDO::PARAM_STR);
                                    $result = $statement->execute();
                                  }
                                }
                                $result = false;
                                $out["codigo"] = "102";
                                $out["mensaje"] = $error_102_mensaje;
                                $out["causa"] = $error_102_causa;
                                $out["error"] = $th->getMessage();
                                $response->getBody()->write(json_encode($out));
                                return $response->withStatus(500);
                            }
                        }else if($tipo==2){
                          $id_platea=$Pcantidad[0];
                          $id_asiento=$Pcantidad[1];
                          $asiento=$Pcantidad[2];
                          $precio=$Pcantidad[3];
                            try {
                              if ($id_ticket!=0) {
                                $sql = "INSERT INTO teatro_backup.tsa_ticket_asiento (id_ticket,asiento,precio,usuario_creacion,id_platea)
                                VALUES (:id_ticket,:asiento,:precio,:usuario_creacion,:id_platea)";
                                $statement = $db->prepare($sql);
                                $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                                $statement->bindValue(':asiento', $asiento, \PDO::PARAM_STR);
                                $statement->bindValue(':precio',  $precio, \PDO::PARAM_STR);
                                $statement->bindValue(':id_platea', $id_platea, \PDO::PARAM_STR);
                                $statement->bindValue(':usuario_creacion', $user_id, \PDO::PARAM_STR);
                                $statement->execute();
                                $sql = "UPDATE teatro_backup.tsa_distribucion SET estado='V' WHERE id_distribucion=:id_distribucion";
                                $statement = $db->prepare($sql);
                                $statement->bindValue(':id_distribucion', $id_asiento, \PDO::PARAM_STR);
                                $statement->execute();
                                $lista[]= array("2", $id_asiento,$id_funcion,$id_platea);
                                  $lista3[]= $id_ticket;
                              }else{
                                $this->rembolso($id_transacion);
                                $sql = "DELETE FROM teatro_backup.tsa_ticket_asiento WHERE id_ticket=:id_ticket";
                                $statement = $db->prepare($sql);
                                $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                                $statement->execute();
                                $sql = "DELETE FROM teatro_backup.tsa_ticket_promocion_codigo WHERE id_ticket=:id_ticket";
                                $statement = $db->prepare($sql);
                                $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                                $statement->execute();
                                $sql = "DELETE FROM teatro_backup.tsa_ticket_promocion_cruzados WHERE id_ticket=:id_ticket";
                                $statement = $db->prepare($sql);
                                $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                                $statement->execute();
                                $sql = "DELETE FROM teatro_backup.tsa_ticket_promocion_factor_pago WHERE id_ticket=:id_ticket";
                                $statement = $db->prepare($sql);
                                $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                                $statement->execute();
                                $sql = "DELETE FROM teatro_backup.tsa_ticket_promocion_tarjeta WHERE id_ticket=:id_ticket";
                                $statement = $db->prepare($sql);
                                $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                                $statement->execute();
                                $sql = "DELETE FROM teatro_backup.tsa_ticket_promocion_factor_compra WHERE id_ticket=:id_ticket";
                                $statement = $db->prepare($sql);
                                $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                                $statement->execute();
                                foreach($lista3 as $llave => $valo) {
                                  $sql = "DELETE FROM teatro_backup.tsa_ticket_asiento WHERE id_ticket=:id_ticket";
                                  $statement = $db->prepare($sql);
                                  $statement->bindValue(':id_ticket', $valo, \PDO::PARAM_STR);
                                  $statement->execute();

                                }
                                $sql = "DELETE FROM teatro_backup.tsa_ticket WHERE id_compra=:id_compra";
                                $statement = $db->prepare($sql);
                                $statement->bindValue(':id_compra', $id_compra, \PDO::PARAM_STR);
                                $statement->execute();
                                $sql = "DELETE FROM teatro_backup.tsa_compra WHERE id_compra=:id_compra";
                                $statement = $db->prepare($sql);
                                $statement->bindValue(':id_compra', $id_compra, \PDO::PARAM_STR);
                                $statement->execute();
                                foreach($lista as $llave => $valo) {
                                  if ($valo[0]=="1") {
                                    $sql = "UPDATE teatro_backup.tsa_platea_funcion SET vendido=vendido-:cantidad WHERE id_platea=:id_platea and id_funcion=:id_funcion;";
                                    $statement = $db->prepare($sql);
                                    $statement->bindValue(':cantidad', $valo[1], \PDO::PARAM_STR);
                                    $statement->bindValue(':id_funcion', $valo[2], \PDO::PARAM_STR);
                                    $statement->bindValue(':id_platea',$valo[3], \PDO::PARAM_STR);
                                    $statement->execute();
                                  }
                                  if ($valo[0]=="2") {
                                    $sql = "UPDATE teatro_backup.tsa_distribucion SET estado='E' WHERE id_distribucion=:id_distribucion";
                                    $statement = $db->prepare($sql);
                                    $statement->bindValue(':id_distribucion',  $valo[1], \PDO::PARAM_STR);
                                    $statement->execute();
                                  }
                                }
                                foreach($lista2 as $llave => $valores) {
                                  if ($valores[0]=="1") {
                                    $sql = "UPDATE tsa_bloqueo_cantidad set fecha_creacion=now() WHERE id_bloqueo_cantidad=:id_bloqueo_cantidad";
                                    $statement = $db->prepare($sql);
                                    $statement->bindValue(':id_bloqueo_cantidad', $valores[1], \PDO::PARAM_STR);
                                    $result = $statement->execute();
                                  }
                                  if ($valores[0]=="2") {
                                    $sql = "UPDATE tsa_bloqueo_asiento set fecha_creacion=now() WHERE id_bloqueo_asiento=:id_bloqueo_asiento";
                                    $statement = $db->prepare($sql);
                                    $statement->bindValue(':id_bloqueo_asiento', $valores[1], \PDO::PARAM_STR);
                                    $result = $statement->execute();
                                  }
                                }
                                $out["codigo"] = "102";
                                $out["mensaje"] = $error_102_mensaje;
                                $out["causa"] = $error_102_causa;
                                $response->getBody()->write(json_encode($out));
                                return $response->withStatus(500);
                              }
                            } catch(\PDOException $th) {
                                $this->rembolso($id_transacion);
                                $sql = "DELETE FROM teatro_backup.tsa_ticket_asiento WHERE id_ticket=:id_ticket";
                                $statement = $db->prepare($sql);
                                $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                                $statement->execute();
                                $sql = "DELETE FROM teatro_backup.tsa_ticket_promocion_codigo WHERE id_ticket=:id_ticket";
                                $statement = $db->prepare($sql);
                                $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                                $statement->execute();
                                $sql = "DELETE FROM teatro_backup.tsa_ticket_promocion_cruzados WHERE id_ticket=:id_ticket";
                                $statement = $db->prepare($sql);
                                $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                                $statement->execute();
                                $sql = "DELETE FROM teatro_backup.tsa_ticket_promocion_factor_pago WHERE id_ticket=:id_ticket";
                                $statement = $db->prepare($sql);
                                $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                                $statement->execute();
                                $sql = "DELETE FROM teatro_backup.tsa_ticket_promocion_tarjeta WHERE id_ticket=:id_ticket";
                                $statement = $db->prepare($sql);
                                $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                                $statement->execute();
                                $sql = "DELETE FROM teatro_backup.tsa_ticket_promocion_factor_compra WHERE id_ticket=:id_ticket";
                                $statement = $db->prepare($sql);
                                $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                                $statement->execute();
                                foreach($lista3 as $llave => $valo) {
                                  $sql = "DELETE FROM teatro_backup.tsa_ticket_asiento WHERE id_ticket=:id_ticket";
                                  $statement = $db->prepare($sql);
                                  $statement->bindValue(':id_ticket', $valo, \PDO::PARAM_STR);
                                  $statement->execute();


                                }
                                $sql = "DELETE FROM teatro_backup.tsa_ticket WHERE id_compra=:id_compra";
                                $statement = $db->prepare($sql);
                                $statement->bindValue(':id_compra', $id_compra, \PDO::PARAM_STR);
                                $statement->execute();
                                $sql = "DELETE FROM teatro_backup.tsa_compra WHERE id_compra=:id_compra";
                                $statement = $db->prepare($sql);
                                $statement->bindValue(':id_compra', $id_compra, \PDO::PARAM_STR);
                                $statement->execute();

                                foreach($lista as $llave => $valo) {
                                  if ($valo[0]=="1") {
                                    $sql = "UPDATE teatro_backup.tsa_platea_funcion SET vendido=vendido-:cantidad WHERE id_platea=:id_platea and id_funcion=:id_funcion;";
                                    $statement = $db->prepare($sql);
                                    $statement->bindValue(':cantidad', $valo[1], \PDO::PARAM_STR);
                                    $statement->bindValue(':id_funcion', $valo[2], \PDO::PARAM_STR);
                                    $statement->bindValue(':id_platea',$valo[3], \PDO::PARAM_STR);
                                    $statement->execute();
                                  }
                                  if ($valo[0]=="2") {
                                    $sql = "UPDATE teatro_backup.tsa_distribucion SET estado='E' WHERE id_distribucion=:id_distribucion";
                                    $statement = $db->prepare($sql);
                                    $statement->bindValue(':id_distribucion',  $valo[1], \PDO::PARAM_STR);
                                    $statement->execute();
                                  }
                                }
                                foreach($lista2 as $llave => $valores) {
                                  if ($valores[0]=="1") {
                                    $sql = "UPDATE tsa_bloqueo_cantidad set fecha_creacion=now() WHERE id_bloqueo_cantidad=:id_bloqueo_cantidad";
                                    $statement = $db->prepare($sql);
                                    $statement->bindValue(':id_bloqueo_cantidad', $valores[1], \PDO::PARAM_STR);
                                    $result = $statement->execute();
                                  }
                                  if ($valores[0]=="2") {
                                    $sql = "UPDATE tsa_bloqueo_asiento set fecha_creacion=now() WHERE id_bloqueo_asiento=:id_bloqueo_asiento";
                                    $statement = $db->prepare($sql);
                                    $statement->bindValue(':id_bloqueo_asiento', $valores[1], \PDO::PARAM_STR);
                                    $result = $statement->execute();
                                  }
                                }
                                $result = false;
                                $out["codigo"] = "102";
                                $out["mensaje"] = $error_102_mensaje;
                                $out["causa"] = $error_102_causa;
                                $out["error"] = $th->getMessage();
                                $response->getBody()->write(json_encode($out));
                                return $response->withStatus(500);
                            }

                        }else{
                          $this->rembolso($id_transacion);
                          $out["codigo"] = "214";
                          $out["mensaje"] = $error_214_mensaje;
                          $out["causa"] = $error_214_causa;
                          $response->getBody()->write(json_encode($out));
                          return $response->withStatus(400);
                        }
                      }
                  }
              }

              foreach($lista2 as $llave => $valores) {
                if ($valores[0]=="1") {
                  $sql = "DELETE FROM tsa_bloqueo_cantidad WHERE id_bloqueo_cantidad=:id_bloqueo_cantidad";
                  $statement = $db->prepare($sql);
                  $statement->bindValue(':id_bloqueo_cantidad', $valores[1], \PDO::PARAM_STR);
                  $result = $statement->execute();
                }
                if ($valores[0]=="2") {
                  $sql = "DELETE FROM tsa_bloqueo_asiento WHERE id_bloqueo_asiento=:id_bloqueo_asiento";
                  $statement = $db->prepare($sql);
                  $statement->bindValue(':id_bloqueo_asiento', $valores[1], \PDO::PARAM_STR);
                  $result = $statement->execute();
                }
              }
              $sql = "SELECT te.nombre,tc.total, tta.asiento, tc.id_compra, tta.id_ticket_asiento FROM tsa_ticket tt INNER JOIN  tsa_funcion tf ON tf.id_funcion =tt.id_funcion
                  INNER JOIN  tsa_evento te ON te.id_evento =tf.id_evento INNER JOIN tsa_compra tc ON tc.id_compra =tt.id_compra inner join tsa_ticket_asiento tta on tta.id_ticket =tt.id_ticket anD tc.id_compra=:id_compra";
              $statement = $db->prepare($sql);
              $statement->bindValue(':id_compra', $id_compra, \PDO::PARAM_STR);
              $result = $statement->execute();
              $eve= [];
              $eve1= "";
              $cantidadT=0;
              $cantidad=0;
              while($item = $statement->fetch()){
                if (!in_array($item->nombre, $eve)) {
                    $eve[]= $item->nombre;
                    $eve1= $eve1.$item->nombre.",";
                }
                if (is_numeric($item->asiento)) {
                    $cantidad=$cantidad+$item->asiento;
                }else{
                    $cantidad=$cantidad+1;
                }
                $cantidadT=$item->total;
              }
              $whole = floor($cantidadT);
              $puntos= $whole-$dolares_canjeados;
              $sql = "INSERT INTO teatro_backup.tsa_amigos_puntos (id_usuario_cliente,id_compra,evento,cantidad,puntos,puntos_ganados,fecha_consumo) VALUES (:id_usuario_cliente,:id_compra,:evento,:cantidad,:puntos,:puntos_ganados,now());";
              $statement = $db->prepare($sql);
              $statement->bindValue(':id_usuario_cliente', $user_id, \PDO::PARAM_STR);
              $statement->bindValue(':id_compra', $id_compra, \PDO::PARAM_STR);
              $statement->bindValue(':evento', substr($eve1, 0, -1), \PDO::PARAM_STR);
              $statement->bindValue(':cantidad', $cantidad, \PDO::PARAM_STR);
              $statement->bindValue(':puntos', $dolares_canjeados, \PDO::PARAM_STR);
              $statement->bindValue(':puntos_ganados', $whole, \PDO::PARAM_STR);
              $statement->execute();

              $ticketT=null;
              $lista4=[];
              $nombreU="TEATRO";
              $apellidoU="SANCHEZ AGUILAR";
              $auth_token1="";
              foreach($lista3 as $llave => $valores) {
                if (!in_array($valores, $lista4)) {
                  $sql = "SELECT tuc.nombres as nombreU, tuc.apellidos as apellidosU, te.*, tt.precio ,tt.sala, tf.fecha, tt.id_ticket, tta.asiento,tt.estado as estado_ticket FROM tsa_ticket tt
                  INNER JOIN  tsa_usuario_cliente tuc ON tuc.id_usuario_cliente=tt.id_usuario_cliente
                  INNER JOIN  tsa_funcion tf ON tf.id_funcion =tt.id_funcion
                  INNER JOIN  tsa_ticket_asiento tta ON tta.id_ticket =tt.id_ticket
                  INNER JOIN  tsa_evento te ON te.id_evento =tf.id_evento and tt.id_ticket=:id_ticket and tuc.id_usuario_cliente =:id_usuario  ORDER BY tf.fecha ASC ";
                  $statement = $db->prepare($sql);
                  $statement->bindValue(':id_usuario', $user_id, \PDO::PARAM_STR);
                  $statement->bindValue(':id_ticket', $valores, \PDO::PARAM_STR);
                  $result = $statement->execute();
                  $tickets= [];
                  $ticket= [];

                  $asientos= [];
                  $ruta= "https://teatrosanchezaguilar.org/imagenes/evento/";
                  while($item = $statement->fetch()){
                    if (!in_array($item->id_ticket, $tickets)) {
                        $cad = "000000000000";
                        $miCadena = strval($item->id_ticket);
                        $cant=strlen($miCadena);
                        $xx=11-$cant;
                        $miCadena=substr($cad, 0, $xx).$miCadena."1";
                        $auth_token = base64_encode($miCadena);
                        $auth_token1 = base64_encode($auth_token);
                        $nombreU=$item->nombreU;
                        $apellidoU=$item->apellidosU;
                        $client->sendMail1("3", $email,  $item->id_ticket,($nombreU).' '.($apellidoU),$auth_token1);
                        $ticket[$item->id_ticket]= array('id_ticket'=> $item->id_ticket, 'nombre'=> $item->nombre, 'duracion'=> $item->duracion, 'imagen'=> $ruta_evento.$item->id_evento."H.png",
                         'tipo'=> $item->tipo,'sala'=> $item->sala,'precio'=> $item->precio,'fecha'=> $item->fecha,'estado'=> $item->estado_ticket,'qr'=>$auth_token1);
                        $tickets[]= $item->id_ticket;
                    }
                    $asientos[$item->id_ticket][]=$item->asiento;
                  }
                  foreach ($tickets as $clave) {
                      $ticket[$clave]['asientos']=  $asientos[$clave];
                      $ticketT[]=$ticket[$clave];
                  }
                  $lista4[]=$valores;
                }

              }
                $client1->compraFactura($id_compra,"C",$user_id);
              if ($donacion!="0") {
                $client->sendMail1("4", $email, "",($nombreU).' '.($apellidoU),"");
              }

              $out =$ticketT;
              $response->getBody()->write(json_encode($out));
            }
        } catch (\PDOException $th) {
            $result = false;
            $out["codigo"] = "102";
            $out["mensaje"] = $error_102_mensaje;
            $out["causa"] = $error_102_causa;

            $out["error"] = $th->getMessage();
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        return $response;
    }

    //web
    public function getDestacadosPrincipal($request, $response, $args){
        include("error.php");
        $response = $response->withHeader('Content-Type', 'application/json');
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
            $out["codigo"] = "100";
            $out["mensaje"] = $error_100_mensaje;
            $out["causa"] =  $error_100_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            $out["codigo"] = "101";
            $out["mensaje"] = $error_101_mensaje;
            $out["causa"] = $error_101_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(401);
        }

        try {
            $sql = "SELECT * FROM tsa_banner_web WHERE estado='A'";
            //$sql = "SELECT * FROM categorias where  id_tienda =:tienda";
            $statement = $db->prepare($sql);
            $result = $statement->execute();
            $ruta= "https://teatrosanchezaguilar.org/imagenes/banner/";
            $categorias['Destacados']=[];
            $categorias['Publicidad']=[];
            while($item = $statement->fetch()){
              $categorias['Destacados'][]=  array('id'=> $item->id_banner_web, 'titulo'=> $item->titulo, 'descripcion'=> $item->descripcion, 'nombre_boton'=> $item->nombre_boton, 'link'=> $item->link_boton, 'imagen'=> $ruta.($item->id_banner_web).".png");
            }
            $sql = "SELECT * FROM tsa_publicidad_web WHERE estado='A' ORDER BY  CAST(  orden AS DECIMAL) ASC";
            //$sql = "SELECT * FROM categorias where  id_tienda =:tienda";
            $statement = $db->prepare($sql);
            $result = $statement->execute();
            $ruta= "https://teatrosanchezaguilar.org/imagenes/publicidad/";
            while($item = $statement->fetch()){
              $categorias['Publicidad'][]=  array('id'=> $item->id_publicidad_web, 'tipo'=> $item->tipo, 'link'=> $item->link, 'imagen'=> $ruta.($item->id_publicidad_web).".png");
            }
            $response->getBody()->write(json_encode($categorias));
            return $response;
        } catch (\PDOException $th) {
            $result = false;
            $out["codigo"] = "102";
            $out["mensaje"] = $error_102_mensaje;
            $out["causa"] = $error_102_causa;
            $out["error"] = $th->getMessage();
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }

    }

    public function getTeatro($request, $response, $args){
        include("error.php");
        $response = $response->withHeader('Content-Type', 'application/json');
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
            $out["codigo"] = "100";
            $out["mensaje"] = $error_100_mensaje;
            $out["causa"] =  $error_100_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            $out["codigo"] = "101";
            $out["mensaje"] = $error_101_mensaje;
            $out["causa"] = $error_101_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(401);
        }

        try {
            $sql = "SELECT * FROM tsa_imagen_banner WHERE estado='A' and id_imagen=1";
            //$sql = "SELECT * FROM categorias where  id_tienda =:tienda";
            $statement = $db->prepare($sql);
            $result = $statement->execute();
            $ruta= "https://teatrosanchezaguilar.org/imagenes/banner/";
            while($item = $statement->fetch()){
              $categorias['nombre_banner']=  $item->nombre;
              $categorias['imagen_banner']=  $ruta.$item->imagen;
            }
            $sql = "SELECT * FROM tsa_informacion WHERE estado='A' and tipo='teatro'";
            //$sql = "SELECT * FROM categorias where  id_tienda =:tienda";
            $statement = $db->prepare($sql);
            $result = $statement->execute();
            while($item = $statement->fetch()){
              if ($item->id_informacion==1) {
                $categorias['informacion']=  $item->descripcion;
                $categorias['imagen_informacion']=  $ruta.$item->imagen;
              }else if ($item->id_informacion==2) {
                $categorias['mision']=array('titulo'=> $item->titulo, 'descripcion'=> $item->descripcion, 'imagen'=> $ruta.$item->imagen);
              }else if ($item->id_informacion==3) {
                $categorias['vision']=array('titulo'=> $item->titulo, 'descripcion'=> $item->descripcion, 'imagen'=> $ruta.$item->imagen);
              }

            }
            $sql = "SELECT * FROM tsa_informacion_tabla WHERE estado='A' and tipo='objetivos' ORDER BY  CAST(  orden AS DECIMAL) ASC";
            //$sql = "SELECT * FROM categorias where  id_tienda =:tienda";
            $statement = $db->prepare($sql);
            $result = $statement->execute();
            $ruta= "https://teatrosanchezaguilar.org/imagenes/banner/";
            $categorias['objetivos']=[];
            while($item = $statement->fetch()){
              $categorias['objetivos'][]=  $item->descripcion;
            }
            $sql = "SELECT * FROM tsa_informacion_tabla WHERE estado='A' and tipo='instalaciones' ORDER BY  CAST(  orden AS DECIMAL) ASC";
            //$sql = "SELECT * FROM categorias where  id_tienda =:tienda";
            $statement = $db->prepare($sql);
            $result = $statement->execute();
            $ruta= "https://teatrosanchezaguilar.org/imagenes/otras/";
            $categorias['instalaciones']=[];
            while($item = $statement->fetch()){
              $categorias['instalaciones'][]= array('titulo'=> $item->titulo, 'descripcion'=> $item->descripcion, 'imagen'=> $ruta.($item->id_informacion_tabla).".png");
            }
            $sql = "SELECT * FROM tsa_evento WHERE estado!='A' ORDER BY  CAST(  id_evento AS DECIMAL) ASC";
            //$sql = "SELECT * FROM categorias where  id_tienda =:tienda";
            $statement = $db->prepare($sql);
            $result = $statement->execute();
            $ruta= "https://teatrosanchezaguilar.org/imagenes/evento/";
            $categorias['temporadas']=[];
            while($item = $statement->fetch()){
              $categorias['temporadas'][]= array('id_evento'=> $item->id_evento,'titulo'=> $item->nombre,'imagen'=> $ruta.($item->id_evento)."H.png");
            }
            $response->getBody()->write(json_encode($categorias));
            return $response;
        } catch (\PDOException $th) {
            $result = false;
            $out["codigo"] = "102";
            $out["mensaje"] = $error_102_mensaje;
            $out["causa"] = $error_102_causa;
            $out["error"] = $th->getMessage();
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }

    }

    public function getNoticiasTeatro($request, $response, $args){
        include("error.php");
        $response = $response->withHeader('Content-Type', 'application/json');
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
            $out["codigo"] = "100";
            $out["mensaje"] = $error_100_mensaje;
            $out["causa"] =  $error_100_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            $out["codigo"] = "101";
            $out["mensaje"] = $error_101_mensaje;
            $out["causa"] = $error_101_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(401);
        }

        try {
          $sql = "SELECT * FROM tsa_imagen_banner WHERE estado='A' and id_imagen=2";
          //$sql = "SELECT * FROM categorias where  id_tienda =:tienda";
          $statement = $db->prepare($sql);
          $result = $statement->execute();
          $ruta= "https://teatrosanchezaguilar.org/imagenes/banner/";
          while($item = $statement->fetch()){
            $categorias['nombre_banner']=  $item->nombre;
            $categorias['imagen_banner']=  $ruta.$item->imagen;
          }
            $sql = "SELECT * FROM tsa_informacion_tabla WHERE estado='A' and tipo='noticia' ORDER BY  CAST(  orden AS DECIMAL) ASC";
            //$sql = "SELECT * FROM categorias where  id_tienda =:tienda";
            $statement = $db->prepare($sql);
            $result = $statement->execute();
            $ruta= "https://teatrosanchezaguilar.org/imagenes/otras/";
            $categorias['noticias']=[];
            while($item = $statement->fetch()){
              $categorias['noticias'][]=  array('titulo'=> $item->titulo, 'descripcion'=> $item->descripcion, 'imagen'=> $ruta.($item->id_informacion_tabla).".png");;
            }
            $response->getBody()->write(json_encode($categorias));
            return $response;
        } catch (\PDOException $th) {
            $result = false;
            $out["codigo"] = "102";
            $out["mensaje"] = $error_102_mensaje;
            $out["causa"] = $error_102_causa;
            $out["error"] = $th->getMessage();
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }

    }

    public function getAlquiler($request, $response, $args){
        include("error.php");
        $response = $response->withHeader('Content-Type', 'application/json');
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
            $out["codigo"] = "100";
            $out["mensaje"] = $error_100_mensaje;
            $out["causa"] =  $error_100_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            $out["codigo"] = "101";
            $out["mensaje"] = $error_101_mensaje;
            $out["causa"] = $error_101_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(401);
        }

        try {
          $sql = "SELECT * FROM tsa_imagen_banner WHERE estado='A' and id_imagen=3";
          //$sql = "SELECT * FROM categorias where  id_tienda =:tienda";
          $statement = $db->prepare($sql);
          $result = $statement->execute();
          $ruta= "https://teatrosanchezaguilar.org/imagenes/banner/";
          while($item = $statement->fetch()){
            $categorias['nombre_banner']=  $item->nombre;
            $categorias['imagen_banner']=  $ruta.$item->imagen;
          }
            $sql = "SELECT * FROM tsa_informacion_tabla WHERE estado='A' and tipo='espacios' ORDER BY  CAST(  orden AS DECIMAL) ASC";
            //$sql = "SELECT * FROM categorias where  id_tienda =:tienda";
            $statement = $db->prepare($sql);
            $result = $statement->execute();
            $ruta= "https://teatrosanchezaguilar.org/imagenes/otras/";
            $categorias['espacios']=[];
            while($item = $statement->fetch()){
              $categorias['espacios'][]=  array('id_espacios'=> $item->id_informacion_tabla , 'titulo'=> $item->titulo, 'descripcion'=> $item->descripcion, 'imagen'=> $ruta.($item->id_informacion_tabla).".png");;
            }
            $sql = "SELECT * FROM tsa_informacion_tabla WHERE estado='A' and tipo='realizados' ORDER BY  CAST(  orden AS DECIMAL) ASC";
            //$sql = "SELECT * FROM categorias where  id_tienda =:tienda";
            $statement = $db->prepare($sql);
            $result = $statement->execute();
            $ruta= "https://teatrosanchezaguilar.org/imagenes/otras/";
            $categorias['realizados']=[];
            while($item = $statement->fetch()){
              $categorias['realizados'][]=  array('id_realizados'=> $item->id_informacion_tabla , 'titulo'=> $item->titulo, 'descripcion'=> $item->descripcion, 'imagen'=> $ruta.($item->id_informacion_tabla).".png");;
            }
            $response->getBody()->write(json_encode($categorias));
            return $response;
        } catch (\PDOException $th) {
            $result = false;
            $out["codigo"] = "102";
            $out["mensaje"] = $error_102_mensaje;
            $out["causa"] = $error_102_causa;
            $out["error"] = $th->getMessage();
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }

    }

    public function getAlquiler_id($request, $response, $args){
        include("error.php");
        $response = $response->withHeader('Content-Type', 'application/json');
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
            $out["codigo"] = "100";
            $out["mensaje"] = $error_100_mensaje;
            $out["causa"] =  $error_100_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            $out["codigo"] = "101";
            $out["mensaje"] = $error_101_mensaje;
            $out["causa"] = $error_101_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(401);
        }
        // FIN VALIDACION
        $json = $request->getBody();
        $body = json_decode($json, true);
        if (!(isset($body["id_alquiler"]))){
          $out["codigo"] = "201";
          $out["mensaje"] = $error_201_mensaje;
          $out["causa"] = $error_201_causa;
          $response->getBody()->write(json_encode($out));
          return $response->withStatus(400);
        }

        //Realizo consulta de puertas a DB
        $id_realizados= trim($body["id_alquiler"]);
        try {
            $sql = "SELECT * FROM tsa_informacion_tabla WHERE id_informacion_tabla=:id_realizados";
            $statement = $db->prepare($sql);
            $statement->bindValue(':id_realizados', $id_realizados, \PDO::PARAM_STR);
            $result = $statement->execute();
            $ruta= "https://teatrosanchezaguilar.org/imagenes/banner/";
            while($item = $statement->fetch()){
              $categorias['titulo']=  $item->titulo;
              $categorias['descripcion']= $item->descripcion;
            }
            $sql = "SELECT * FROM tsa_informacion_descargable WHERE id_informacion_tabla=:id_realizados ORDER BY  CAST(  orden AS DECIMAL) ASC";
            $statement = $db->prepare($sql);
            $statement->bindValue(':id_realizados', $id_realizados, \PDO::PARAM_STR);
            $result = $statement->execute();
            $ruta= "https://teatrosanchezaguilar.org/imagenes/descargable/";
            $categorias['informacion']=[];
            while($item = $statement->fetch()){
              $categorias['informacion'][]=  array( 'titulo'=> $item->titulo, 'archivo'=> $ruta.($item->id_informacion_descargable).".pdf");;
            }
            $sql = "SELECT * FROM tsa_informacion_galeria WHERE id_informacion_tabla=:id_realizados  ORDER BY  CAST(  orden AS DECIMAL) ASC";
            $statement = $db->prepare($sql);
            $statement->bindValue(':id_realizados', $id_realizados, \PDO::PARAM_STR);
            $result = $statement->execute();
            $ruta= "https://teatrosanchezaguilar.org/imagenes/galeria/";
            $categorias['galeria']=[];
            while($item = $statement->fetch()){
              $categorias['galeria'][]= $ruta.($item->id_informacion_galeria).".png";
            }
            $response->getBody()->write(json_encode($categorias));
            return $response;
        } catch (\PDOException $th) {
            $result = false;
            $out["codigo"] = "102";
            $out["mensaje"] = $error_102_mensaje;
            $out["causa"] = $error_102_causa;
            $out["error"] = $th->getMessage();
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }

    }

    public function getFundacionWeb($request, $response, $args){
        include("error.php");
        $response = $response->withHeader('Content-Type', 'application/json');
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
            $out["codigo"] = "100";
            $out["mensaje"] = $error_100_mensaje;
            $out["causa"] =  $error_100_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            $out["codigo"] = "101";
            $out["mensaje"] = $error_101_mensaje;
            $out["causa"] = $error_101_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(401);
        }

        try {
            $sql = "SELECT * FROM tsa_imagen_banner WHERE estado='A' and id_imagen=4";
            //$sql = "SELECT * FROM categorias where  id_tienda =:tienda";
            $statement = $db->prepare($sql);
            $result = $statement->execute();
            $ruta= "https://teatrosanchezaguilar.org/imagenes/banner/";
            while($item = $statement->fetch()){
              $categorias['nombre_banner']=  $item->nombre;
              $categorias['imagen_banner']=  $ruta.$item->imagen;
            }
            $sql = "SELECT * FROM tsa_informacion WHERE estado='A' and tipo='fundacion'";
            //$sql = "SELECT * FROM categorias where  id_tienda =:tienda";
            $statement = $db->prepare($sql);
            $result = $statement->execute();
            while($item = $statement->fetch()){
              if ($item->id_informacion==4) {
                $categorias['informacion']=  $item->descripcion;
              }else if ($item->id_informacion==5) {
                $categorias['mision']=array('titulo'=> $item->titulo, 'descripcion'=> $item->descripcion, 'imagen'=> $ruta.$item->imagen);
              }else if ($item->id_informacion==6) {
                $categorias['vision']=array('titulo'=> $item->titulo, 'descripcion'=> $item->descripcion, 'imagen'=> $ruta.$item->imagen);
              }

            }
            $sql = "SELECT * FROM tsa_informacion_tabla WHERE estado='A' and tipo='lineas' ORDER BY  CAST(  orden AS DECIMAL) ASC";
            //$sql = "SELECT * FROM categorias where  id_tienda =:tienda";
            $statement = $db->prepare($sql);
            $result = $statement->execute();
            $ruta= "https://teatrosanchezaguilar.org/imagenes/otras/";
            $categorias['lineas']=[];
            while($item = $statement->fetch()){
              $categorias['lineas'][]= array('titulo'=> $item->titulo, 'descripcion'=> $item->descripcion, 'imagen'=> $ruta.($item->id_informacion_tabla).".png");
            }
            $sql = "SELECT * FROM tsa_informacion WHERE estado='A' and tipo='proyectos'";
            //$sql = "SELECT * FROM categorias where  id_tienda =:tienda";
            $statement = $db->prepare($sql);
            $result = $statement->execute();
            while($item = $statement->fetch()){
                $categorias['informacion_proyectos']=  $item->descripcion;
            }
            $sql = "SELECT * FROM tsa_informacion_tabla WHERE estado='A' and tipo='proyectos' ORDER BY  CAST(  orden AS DECIMAL) ASC";
            //$sql = "SELECT * FROM categorias where  id_tienda =:tienda";
            $statement = $db->prepare($sql);
            $result = $statement->execute();
            $ruta= "https://teatrosanchezaguilar.org/imagenes/otras/";
            $categorias['proyectos']=[];
            while($item = $statement->fetch()){
              $categorias['proyectos'][]= array('id_proyectos'=> $item->id_informacion_tabla,'titulo'=> $item->titulo, 'descripcion'=> $item->descripcion, 'imagen'=> $ruta.($item->id_informacion_tabla).".png");
            }
            $response->getBody()->write(json_encode($categorias));
            return $response;
        } catch (\PDOException $th) {
            $result = false;
            $out["codigo"] = "102";
            $out["mensaje"] = $error_102_mensaje;
            $out["causa"] = $error_102_causa;
            $out["error"] = $th->getMessage();
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }

    }

    public function getContactoWeb($request, $response, $args){
        include("error.php");
        $response = $response->withHeader('Content-Type', 'application/json');
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
            $out["codigo"] = "100";
            $out["mensaje"] = $error_100_mensaje;
            $out["causa"] =  $error_100_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            $out["codigo"] = "101";
            $out["mensaje"] = $error_101_mensaje;
            $out["causa"] = $error_101_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(401);
        }

        try {
            $sql = "SELECT * FROM tsa_imagen_banner WHERE estado='A' and id_imagen=6";
            //$sql = "SELECT * FROM categorias where  id_tienda =:tienda";
            $statement = $db->prepare($sql);
            $result = $statement->execute();
            $ruta= "https://teatrosanchezaguilar.org/imagenes/banner/";
            while($item = $statement->fetch()){
              $categorias['nombre_banner']=  $item->nombre;
              $categorias['imagen_banner']=  $ruta.$item->imagen;
            }
            $sql = "SELECT * FROM tsa_informacion_tabla WHERE estado='A' and tipo='boleteria' ORDER BY  CAST(  orden AS DECIMAL) ASC";
            //$sql = "SELECT * FROM categorias where  id_tienda =:tienda";
            $statement = $db->prepare($sql);
            $result = $statement->execute();
            $categorias['boleteria']=[];
            while($item = $statement->fetch()){
              $categorias['boleteria'][]= array('titulo'=> $item->titulo, 'descripcion'=> $item->descripcion);
            }
            $sql = "SELECT * FROM tsa_informacion_tabla WHERE estado='A' and tipo='cafe' ORDER BY  CAST(  orden AS DECIMAL) ASC";
            //$sql = "SELECT * FROM categorias where  id_tienda =:tienda";
            $statement = $db->prepare($sql);
            $result = $statement->execute();
            $categorias['cafe']=[];
            while($item = $statement->fetch()){
              $categorias['cafe'][]= array('titulo'=> $item->titulo, 'descripcion'=> $item->descripcion);
            }
            $sql = "SELECT * FROM tsa_informacion_tabla WHERE estado='A' and tipo='whatsapp' ORDER BY  CAST(  orden AS DECIMAL) ASC";
            //$sql = "SELECT * FROM categorias where  id_tienda =:tienda";
            $statement = $db->prepare($sql);
            $result = $statement->execute();
            $categorias['whatsapp']=[];
            while($item = $statement->fetch()){
              $categorias['whatsapp'][]= array('titulo'=> $item->titulo, 'descripcion'=> $item->descripcion);
            }
            $response->getBody()->write(json_encode($categorias));
            return $response;
        } catch (\PDOException $th) {
            $result = false;
            $out["codigo"] = "102";
            $out["mensaje"] = $error_102_mensaje;
            $out["causa"] = $error_102_causa;
            $out["error"] = $th->getMessage();
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }

    }

    public function getPreguntas($request, $response, $args){
        include("error.php");
        $response = $response->withHeader('Content-Type', 'application/json');
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
            $out["codigo"] = "100";
            $out["mensaje"] = $error_100_mensaje;
            $out["causa"] =  $error_100_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            $out["codigo"] = "101";
            $out["mensaje"] = $error_101_mensaje;
            $out["causa"] = $error_101_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(401);
        }

        try {
            $sql = "SELECT * FROM tsa_imagen_banner WHERE estado='A' and id_imagen=7";
            //$sql = "SELECT * FROM categorias where  id_tienda =:tienda";
            $statement = $db->prepare($sql);
            $result = $statement->execute();
            $ruta= "https://teatrosanchezaguilar.org/imagenes/banner/";
            while($item = $statement->fetch()){
              $categorias['nombre_banner']=  $item->nombre;
              $categorias['imagen_banner']=  $ruta.$item->imagen;
            }
            $sql = "SELECT * FROM tsa_informacion_tabla WHERE estado='A' and tipo='preguntas' ORDER BY  CAST(  orden AS DECIMAL) ASC";
            //$sql = "SELECT * FROM categorias where  id_tienda =:tienda";
            $statement = $db->prepare($sql);
            $result = $statement->execute();
            $categorias['preguntas']=[];
            while($item = $statement->fetch()){
              $categorias['preguntas'][]= array('titulo'=> $item->titulo, 'descripcion'=> $item->descripcion);
            }
            $tipoA="A";
            if ($request->hasHeader('Canal')) {
                $YB = $request->getHeader('Canal');
                if ($YB[0]==="web") {
                  $tipoA="W";
                }
            }
            $response->getBody()->write(json_encode($categorias));
            return $response;
        } catch (\PDOException $th) {
            $result = false;
            $out["codigo"] = "102";
            $out["mensaje"] = $error_102_mensaje;
            $out["causa"] = $error_102_causa;
            $out["error"] = $th->getMessage();
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }

    }

    public function getAmbiental($request, $response, $args){
        include("error.php");
        $response = $response->withHeader('Content-Type', 'application/json');
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
            $out["codigo"] = "100";
            $out["mensaje"] = $error_100_mensaje;
            $out["causa"] =  $error_100_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            $out["codigo"] = "101";
            $out["mensaje"] = $error_101_mensaje;
            $out["causa"] = $error_101_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(401);
        }

        try {
            $sql = "SELECT * FROM tsa_imagen_banner WHERE estado='A' and id_imagen=8";
            //$sql = "SELECT * FROM categorias where  id_tienda =:tienda";
            $statement = $db->prepare($sql);
            $result = $statement->execute();
            $ruta= "https://teatrosanchezaguilar.org/imagenes/banner/";
            while($item = $statement->fetch()){
              $categorias['nombre_banner']=  $item->nombre;
              $categorias['imagen_banner']=  $ruta.$item->imagen;
            }
            $sql = "SELECT * FROM tsa_informacion_tabla WHERE estado='A' and tipo='ambiental' ORDER BY  CAST(  orden AS DECIMAL) ASC";
            //$sql = "SELECT * FROM categorias where  id_tienda =:tienda";
            $statement = $db->prepare($sql);
            $result = $statement->execute();
            $ruta= "https://teatrosanchezaguilar.org/imagenes/otras/";
            $categorias['ambiental']=[];
            while($item = $statement->fetch()){
              $categorias['ambiental'][]= array('titulo'=> $item->titulo, 'descripcion'=> $item->descripcion,'imagen'=> $ruta.($item->id_informacion_tabla).".png");
            }

            $response->getBody()->write(json_encode($categorias));
            return $response;
        } catch (\PDOException $th) {
            $result = false;
            $out["codigo"] = "102";
            $out["mensaje"] = $error_102_mensaje;
            $out["causa"] = $error_102_causa;
            $out["error"] = $th->getMessage();
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }

    }

    public function getAmigosWeb($request, $response, $args){
        include("error.php");
        $response = $response->withHeader('Content-Type', 'application/json');
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
            $out["codigo"] = "100";
            $out["mensaje"] = $error_100_mensaje;
            $out["causa"] =  $error_100_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            $out["codigo"] = "101";
            $out["mensaje"] = $error_101_mensaje;
            $out["causa"] = $error_101_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(401);
        }

        try {
            $sql = "SELECT * FROM tsa_imagen_banner WHERE estado='A' and id_imagen=9";
            //$sql = "SELECT * FROM categorias where  id_tienda =:tienda";
            $statement = $db->prepare($sql);
            $result = $statement->execute();
            $ruta= "https://teatrosanchezaguilar.org/imagenes/banner/";
            while($item = $statement->fetch()){
              $categorias['nombre_banner']=  $item->nombre;
              $categorias['imagen_banner']=  $ruta.$item->imagen;
            }
            $sql = "SELECT * FROM tsa_informacion WHERE estado='A' and tipo='amigos'";
            //$sql = "SELECT * FROM categorias where  id_tienda =:tienda";
            $statement = $db->prepare($sql);
            $result = $statement->execute();
            while($item = $statement->fetch()){
                $categorias['informacion']=  $item->descripcion;
            }
            $sql = "SELECT * FROM tsa_informacion_tabla WHERE estado='A' and tipo='amigos' ORDER BY  CAST(  orden AS DECIMAL) ASC";
            //$sql = "SELECT * FROM categorias where  id_tienda =:tienda";
            $statement = $db->prepare($sql);
            $result = $statement->execute();
            $ruta= "https://teatrosanchezaguilar.org/imagenes/otras/";
            $categorias['beneficios']=[];
            while($item = $statement->fetch()){
              $categorias['beneficios'][]= array('titulo'=> $item->titulo, 'descripcion'=> $item->descripcion,'imagen'=> $ruta.($item->id_informacion_tabla).".png");
            }
            $sql = "SELECT * FROM tsa_informacion_tabla WHERE estado='A' and tipo='amigos_preguntas' ORDER BY  CAST(  orden AS DECIMAL) ASC";
            //$sql = "SELECT * FROM categorias where  id_tienda =:tienda";
            $statement = $db->prepare($sql);
            $result = $statement->execute();
            $categorias['preguntas']=[];
            while($item = $statement->fetch()){
              $categorias['preguntas'][]= array('titulo'=> $item->titulo, 'descripcion'=> $item->descripcion);
            }
            $response->getBody()->write(json_encode($categorias));
            return $response;
        } catch (\PDOException $th) {
            $result = false;
            $out["codigo"] = "102";
            $out["mensaje"] = $error_102_mensaje;
            $out["causa"] = $error_102_causa;
            $out["error"] = $th->getMessage();
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }

    }

    public function getBannerPrincipal($request, $response, $args){
        include("error.php");
        $response = $response->withHeader('Content-Type', 'application/json');
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
            $out["codigo"] = "100";
            $out["mensaje"] = $error_100_mensaje;
            $out["causa"] =  $error_100_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            $out["codigo"] = "101";
            $out["mensaje"] = $error_101_mensaje;
            $out["causa"] = $error_101_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(401);
        }

        try {
            $sql = "SELECT * FROM tsa_imagen_banner WHERE id_imagen=10";
            //$sql = "SELECT * FROM categorias where  id_tienda =:tienda";
            $statement = $db->prepare($sql);
            $result = $statement->execute();
            $ruta= "https://teatrosanchezaguilar.org/imagenes/banner/";
            $categorias=[];
            while($item = $statement->fetch()){
              $categorias= array('titulo'=> $item->nombre, 'link'=> $item->descripcion,'imagen'=> $ruta.($item->imagen),'estado'=> $item->estado);
            }
            $response->getBody()->write(json_encode($categorias));
            return $response;
        } catch (\PDOException $th) {
            $result = false;
            $out["codigo"] = "102";
            $out["mensaje"] = $error_102_mensaje;
            $out["causa"] = $error_102_causa;
            $out["error"] = $th->getMessage();
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }

    }

    public function enviarContactanos($request, $response, $args){
        include("error.php");
        $response = $response->withHeader('Content-Type', 'application/json');
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
            $out["codigo"] = "100";
            $out["mensaje"] = $error_100_mensaje;
            $out["causa"] =  $error_100_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            $out["codigo"] = "101";
            $out["mensaje"] = $error_101_mensaje;
            $out["causa"] = $error_101_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(401);
        }
        $json = $request->getBody();
        $body = json_decode($json, true);
        if (!(isset($body["nombres"]) && isset($body["correo"]) && isset($body["asunto"])  && isset($body["mensaje"]))){
          $out["codigo"] = "201";
          $out["mensaje"] = $error_201_mensaje;
          $out["causa"] = $error_201_causa;
          $response->getBody()->write(json_encode($out));
          return $response->withStatus(400);
        }

          try {
            $nombres = trim($body['nombres']);
            $correo = trim($body['correo']);
            $asunto = trim($body['asunto']);
            $mensaje = trim($body['mensaje']);
            $sql = "INSERT INTO teatro_backup.tsa_contactanos_web (nombre,correo,asunto,mensaje) VALUES (:nombres,:correo,:asunto,:mensaje)";
            $statement = $db->prepare($sql);
            $statement->bindValue(':nombres', $nombres, \PDO::PARAM_STR);
            $statement->bindValue(':correo', $correo, \PDO::PARAM_STR);
            $statement->bindValue(':asunto', $asunto, \PDO::PARAM_STR);
            $statement->bindValue(':mensaje', $mensaje, \PDO::PARAM_STR);
            $result = $statement->execute();

          } catch (\PDOException $th) {
              $result = false;
              $out["codigo"] = "102";
              $out["mensaje"] = $error_102_mensaje;
              $out["causa"] =  $error_102_causa;
              $out["error"] = $th->getMessage();
              $response->getBody()->write(json_encode($out));
              return $response->withStatus(500);
          }
          $out["status"] =$status_enviar;
          $response->getBody()->write(json_encode($out));
          return $response;
    }

    public function enviarContactanosAlquiler($request, $response, $args){
        include("error.php");
        $response = $response->withHeader('Content-Type', 'application/json');
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
            $out["codigo"] = "100";
            $out["mensaje"] = $error_100_mensaje;
            $out["causa"] =  $error_100_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            $out["codigo"] = "101";
            $out["mensaje"] = $error_101_mensaje;
            $out["causa"] = $error_101_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(401);
        }
        $json = $request->getBody();
        $body = json_decode($json, true);
        if (!(isset($body["nombres"]) && isset($body["apellidos"]) && isset($body["celular"]) && isset($body["tipo_evento"]) && isset($body["correo"])
        && isset($body["fecha_inicio"]) && isset($body["fecha_termino"]) && isset($body["total"])  && isset($body["mensaje"]))){
          $out["codigo"] = "201";
          $out["mensaje"] = $error_201_mensaje;
          $out["causa"] = $error_201_causa;
          $response->getBody()->write(json_encode($out));
          return $response->withStatus(400);
        }
        try {
          $nombres = trim($body['nombres']);
          $apellidos = trim($body['apellidos']);
          $celular = trim($body['celular']);
          $tipo_evento = trim($body['tipo_evento']);
          $correo = trim($body['correo']);
          $fecha_inicio = trim($body['fecha_inicio']);
          $fecha_termino = trim($body['fecha_termino']);
          $total = trim($body['total']);
          $mensaje = trim($body['mensaje']);
          $sql = "INSERT INTO teatro_backup.tsa_contactanos_alquiler (nombre,apellido,celular,tipo_evento,correo,fecha_inicio,fecha_termino,total_personas,mensaje)
          VALUES (:nombres,:apellidos,:celular,:tipo_evento,:correo,:fecha_inicio,:fecha_termino,:total,:mensaje)";
          $statement = $db->prepare($sql);
          $statement->bindValue(':nombres', $nombres, \PDO::PARAM_STR);
          $statement->bindValue(':apellidos', $apellidos, \PDO::PARAM_STR);
          $statement->bindValue(':celular', $celular, \PDO::PARAM_STR);
          $statement->bindValue(':tipo_evento', $tipo_evento, \PDO::PARAM_STR);
          $statement->bindValue(':correo', $correo, \PDO::PARAM_STR);
          $statement->bindValue(':fecha_inicio', $fecha_inicio, \PDO::PARAM_STR);
          $statement->bindValue(':fecha_termino', $fecha_termino, \PDO::PARAM_STR);
          $statement->bindValue(':total', $total, \PDO::PARAM_STR);
          $statement->bindValue(':mensaje', $mensaje, \PDO::PARAM_STR);
          $result = $statement->execute();

        } catch (\PDOException $th) {
            $result = false;
            $out["codigo"] = "102";
            $out["mensaje"] = $error_102_mensaje;
            $out["causa"] =  $error_102_causa;
            $out["error"] = $th->getMessage();
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
          $out["status"] =$status_enviar;
          $response->getBody()->write(json_encode($out));
          return $response;
    }

    public function login_lector($request, $response, $args){
        include("error.php");
        $response = $response->withHeader('Content-Type', 'application/json');
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
            $out["codigo"] = "100";
            $out["mensaje"] = $error_100_mensaje;
            $out["causa"] =  $error_100_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            $out["codigo"] = "101";
            $out["mensaje"] = $error_101_mensaje;
            $out["causa"] = $error_101_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(401);
        }
        // FIN VALIDACION
        $json = $request->getBody();
        $body = json_decode($json, true);
        if (!(isset($body["usuario"]) && isset($body['contrasena']))){
            $out["codigo"] = "201";
            $out["mensaje"] = $error_201_mensaje;
            $out["causa"] =  $error_201_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(400);
        }
        $usuario = trim($body['usuario']);
        $password = trim($body['contrasena']);

        if (strstr($usuario,'@') !== false){
              $sql = "SELECT * FROM tsa_usuario WHERE correo= :usuario";
        }else{
              $sql = "SELECT * FROM tsa_usuario WHERE usuario= :usuario";
        }
        $statement = $db->prepare($sql);
        $statement->bindValue(':usuario', $usuario, \PDO::PARAM_STR);
        $band=false;
        try {
            $result = $statement->execute();
        } catch (\PDOException $th) {
            $result = false;
            $out["codigo"] = "102";
            $out["mensaje"] = $error_102_mensaje;
            $out["causa"] =  $error_102_causa;
            $out["error"] = $th->getMessage();
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
         $item = $statement->fetch();
          if ($item){
              if ($item->estado=="P") {
                $out["codigo"] = "223";
                $out["mensaje"] = $error_223_mensaje;
                $out["causa"] =  $error_223_causa;;
                $response->getBody()->write(json_encode($out));
                return $response->withStatus(400);
              }else  if ($item->estado=="B" | $item->estado=="I") {
                $out["codigo"] = "222";
                $out["mensaje"] = $error_222_mensaje;
                $out["causa"] =  $error_222_causa;;
                $response->getBody()->write(json_encode($out));
                return $response->withStatus(400);
              }else{
                if ($password==$item->contrasena) {
                  $out = array('id'=> $item->id_usuario, 'nombres'=> $item->nombres,'apellidos'=> $item->apellidos, 'usuario'=> $item->usuario, 'estado'=> $item->estado );
                  $response->getBody()->write(json_encode($out));
                  return $response;
                }else{
                  $out["codigo"] = "203";
                  $out["mensaje"] = $error_203_mensaje;
                  $out["causa"] =  $error_203_causa;;
                  $response->getBody()->write(json_encode($out));
                  return $response->withStatus(400);
                }
              }

          }else{
            $out["codigo"] = "202";
            $out["mensaje"] = $error_202_mensaje;
            $out["causa"] =  $error_202_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(400);
          }
        return $response;
    }

    public function getAllEventos_lector($request, $response, $args){
        include("error.php");
        $response = $response->withHeader('Content-Type', 'application/json');
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
            $out["codigo"] = "100";
            $out["mensaje"] = $error_100_mensaje;
            $out["causa"] =  $error_100_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            $out["codigo"] = "101";
            $out["mensaje"] = $error_101_mensaje;
            $out["causa"] = $error_101_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(401);
        }
        try {

            $band=true;
            $band1=true;
            $band2=true;
            $band3=true;
            $cartelera= [];
            $ruta= "https://teatrosanchezaguilar.org/imagenes/evento/";
            $sql = "SELECT te.*, tc.nombre as categoria FROM tsa_evento te  INNER JOIN  tsa_categoria tc ON te.id_categoria=tc.id_categoria and te.estado='A' and te.tipo !='I'";
            $statement = $db->prepare($sql);
            $result = $statement->execute();
            while($item = $statement->fetch()){
              $categoria="";
              if ($item->id_categoria!=1) {
                  $categoria=$item->categoria;
              }
              if ($item->id_evento!=1) {
                $band3=false;
                $cartelera[]= array('id'=> $item->id_evento, 'nombre'=> $item->nombre,'imagen'=> $ruta_evento.$item->id_evento."H.png", 'tipo'=> $item->tipo, 'categoria'=> $categoria);

            }
                          }
            if ($band3) {
                $cartelera=array();
            }
        } catch (\PDOException $th) {
            $result = false;
            $out["codigo"] = "102";
            $out["mensaje"] = $error_102_mensaje;
            $out["causa"] = $error_102_causa;
            $out["error"] = $th->getMessage();
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }

        $out =$cartelera;

        $response->getBody()->write(json_encode($out));
        return $response;
    }

    public function getEvento_lector($request, $response, $args){
        include("error.php");
        $response = $response->withHeader('Content-Type', 'application/json');
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
            $out["codigo"] = "100";
            $out["mensaje"] = $error_100_mensaje;
            $out["causa"] =  $error_100_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            $out["codigo"] = "101";
            $out["mensaje"] = $error_101_mensaje;
            $out["causa"] = $error_101_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(401);
        }
        // FIN VALIDACION
        $json = $request->getBody();
        $body = json_decode($json, true);
        if (!(isset($body["id_evento"])  )){
          $out["codigo"] = "201";
          $out["mensaje"] = $error_201_mensaje;
          $out["causa"] = $error_201_causa;
          $response->getBody()->write(json_encode($out));
          return $response->withStatus(400);
        }
        //Realizo consulta de puertas a DB
        $id_evento= trim($body["id_evento"]);
        $horarios= [];
        try {
            date_default_timezone_set('America/Lima');
            $datetime = date("Y-m-d H:i:s");
            $band5=false;
            $sql = "SELECT te.id_evento,te.duracion ,  tf.fecha, tf.aforo , tf.cantidad_vendida, tf.estado as estado_funcion, tf.id_funcion FROM tsa_evento te INNER JOIN  tsa_funcion tf ON tf.id_evento =te.id_evento and tf.estado='A' and te.id_evento =:id_evento ORDER BY tf.fecha ASC";
            $statement = $db->prepare($sql);
            $statement->bindValue(':id_evento', $id_evento, \PDO::PARAM_STR);
            $result = $statement->execute();
            $datetime = date("Y-m-d H:i:s");
            while($item = $statement->fetch()){
              $nuevafecha = strtotime ( '+'.$item->duracion." minute" , strtotime ( $datetime) ) ;
              $nuevafecha = date ( "Y-m-d H:i:s" , $nuevafecha );
              if ($item->fecha < $nuevafecha) {
                $estado="I";
                $sql1 = "UPDATE tsa_funcion	SET estado='I' WHERE id_funcion=:id_funcion";
                $statement1 = $db->prepare($sql1);
                $statement1->bindValue(':id_funcion',  $item->id_funcion, \PDO::PARAM_STR);
                $statement1->execute();
              }
              $horarios[]=array('id_funcion'=>$item->id_funcion,'fecha'=>$item->fecha,'estado'=>$item->estado_funcion) ;
            }
        } catch (\PDOException $th) {
            $result = false;
            $out["codigo"] = "102";
            $out["mensaje"] = $error_102_mensaje;
            $out["causa"] = $error_102_causa;
            $out["error"] = $th->getMessage();
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }

        $out =$horarios;

        $response->getBody()->write(json_encode($out));
        return $response;
    }

    public function getFuncion_lector($request, $response, $args){
        include("error.php");
        $response = $response->withHeader('Content-Type', 'application/json');
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
            $out["codigo"] = "100";
            $out["mensaje"] = $error_100_mensaje;
            $out["causa"] =  $error_100_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            $out["codigo"] = "101";
            $out["mensaje"] = $error_101_mensaje;
            $out["causa"] = $error_101_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(401);
        }
        // FIN VALIDACION
        $json = $request->getBody();
        $body = json_decode($json, true);
        if (!(isset($body["id_funcion"])  )){
          $out["codigo"] = "201";
          $out["mensaje"] = $error_201_mensaje;
          $out["causa"] = $error_201_causa;
          $response->getBody()->write(json_encode($out));
          return $response->withStatus(400);
        }
        //Realizo consulta de puertas a DB
        $id_funcion= trim($body["id_funcion"]);
        $horarios= [];
        try {
            date_default_timezone_set('America/Lima');
            $datetime = date("Y-m-d H:i:s");
            $band5=false;
            $sql = "SELECT tf.*, te.tipo FROM tsa_funcion tf INNER JOIN tsa_evento te ON tf.id_evento=te.id_evento and tf.id_funcion=:id_funcion";
            $statement = $db->prepare($sql);
            $statement->bindValue(':id_funcion', $id_funcion, \PDO::PARAM_STR);
            $result = $statement->execute();
            $aforo=0;
            $funcion="";
            $tipo_sala="";
            $tipo="";
            while($item = $statement->fetch()){
              $aforo=$item->aforo;
              $funcion=$item->fecha;
              $tipo=$item->tipo;
            }
            $cant=0;
            $cant2=0;
            $cant3=0;
            if ($tipo=='G') {
              $sql = "SELECT * FROM tsa_registro_gratuito tt WHERE  tt.id_funcion=:id_funcion";
              $statement = $db->prepare($sql);
              $statement->bindValue(':id_funcion', $id_funcion, \PDO::PARAM_STR);
              $result = $statement->execute();
              while($item = $statement->fetch()){
                if ($item->estado =="I") {
                  $cant2=$cant2+1;
                }
                $cant=$cant+1;
              }// code...
            }else{
              $sql = "SELECT tf.fecha, tf.aforo, tt.id_funcion, tt.tipo, tta.* FROM tsa_ticket tt INNER JOIN tsa_ticket_asiento tta ON tta.id_ticket =tt.id_ticket INNER JOIN tsa_funcion tf ON tt.id_funcion =tf.id_funcion and tt.id_funcion=:id_funcion";
              $statement = $db->prepare($sql);
              $statement->bindValue(':id_funcion', $id_funcion, \PDO::PARAM_STR);
              $result = $statement->execute();
              while($item = $statement->fetch()){
                $tipo_sala=$item->tipo;
                $aforo=$item->aforo;
                $funcion=$item->fecha;
                if ($item->tipo =="2") {
                  $cant=$cant+1;
                }else{
                  $cant=$cant+$item->asiento;
                }
                $cant2=$cant2+$item->cantidad_ingresa;
                $cant3=$cant3+$item->cantidad_espera;

              }
            }

            $horarios[]=array('id_funcion'=>$id_funcion,'fecha'=>$funcion,'aforo'=>$aforo,'cantidad_vendida'=>$cant,'cantidad_ingresada'=>$cant2,'cantidad_retorno'=>$cant3,'tipo'=>$tipo ,'tipo_sala'=>$tipo_sala) ;
        } catch (\PDOException $th) {
            $result = false;
            $out["codigo"] = "102";
            $out["mensaje"] = $error_102_mensaje;
            $out["causa"] = $error_102_causa;
            $out["error"] = $th->getMessage();
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }

        $out =$horarios;

        $response->getBody()->write(json_encode($out));
        return $response;
    }

    public function insert_codigo($request, $response, $args){
        include("error.php");
        $response = $response->withHeader('Content-Type', 'application/json');
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
            $out["codigo"] = "100";
            $out["mensaje"] = $error_100_mensaje;
            $out["causa"] =  $error_100_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            $out["codigo"] = "101";
            $out["mensaje"] = $error_101_mensaje;
            $out["causa"] = $error_101_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(401);
        }
        // FIN VALIDACION
        $json = $request->getBody();
        $body = json_decode($json, true);
        if (!(isset($body["id_funcion"])  && isset($body["codigo"]) )){
          $out["codigo"] = "201";
          $out["mensaje"] = $error_201_mensaje;
          $out["causa"] = $error_201_causa;
          $response->getBody()->write(json_encode($out));
          return $response->withStatus(400);
        }
        //Realizo consulta de puertas a DB
        $id_funcion= trim($body["id_funcion"]);
        $codigo= trim($body["codigo"]);
        $decode = base64_decode($codigo);
        $decode1 = base64_decode($decode);
        if (!is_numeric($decode1)) {
          $out["codigo"] = "225";
          $out["mensaje"] = $error_225_mensaje;
          $out["causa"] = $error_225_causa;
          $response->getBody()->write(json_encode($out));
          return $response->withStatus(400);
        }
        $horarios= [];
        try {
            date_default_timezone_set('America/Lima');

            $tipo = $decode1[-1];
            $decode1 = substr($decode1, 0, -1);
            $id_ticket = (int)$decode1;
            if ($tipo=="1") {
              $sql = "SELECT tp.nombre as platea,tf.id_funcion, te.nombre  ,tt.sala, tf.fecha, tt.id_ticket,tt.tipoPromo, tt.tipo ,tta.id_ticket_asiento ,tta.asiento, tta.cantidad_ingresa,tta.cantidad_espera, tta.precio FROM tsa_ticket tt
              INNER JOIN  tsa_funcion tf ON tf.id_funcion =tt.id_funcion
              INNER JOIN  tsa_ticket_asiento tta ON tta.id_ticket =tt.id_ticket
              INNER JOIN tsa_platea tp ON tta.id_platea =tp.id_platea
              INNER JOIN  tsa_evento te ON te.id_evento =tf.id_evento  and tt.id_ticket =:id_ticket and tf.id_funcion=:id_funcion";
              $statement = $db->prepare($sql);
              $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
              $statement->bindValue(':id_funcion', $id_funcion, \PDO::PARAM_STR);
              $result = $statement->execute();
              $platea="";
              $evento="";
              $sala="";
              $fecha="";
              $tipo="";
              $promocion="";
              $nombre="";
              $tipo_promo="";
              $asientos= [];
              while($item = $statement->fetch()){
                  $tipoP=$item->tipoPromo;
                  $tipoP1="";
                  $text="";
                  if ($tipoP=="N") {
                      $tipoP1="Sin Promoción";
                  }else{
                      if ($tipoP=="CR") {
                          $tipoP1="Cruzados";
                          $text="select tcp.* from tsa_ticket tt INNER JOIN tsa_ticket_promocion_cruzados ttpc on tt.id_ticket =ttpc.id_ticket  INNER JOIN tsa_cruzados tcp ON tcp.id_cruzados =ttpc.id_promocion and tt.id_ticket=:id_ticket";
                      }
                      if ($tipoP=="TJ") {
                          $tipoP1="Forma de Pago";
                          $text="select tcp.* from tsa_ticket tt INNER JOIN tsa_ticket_promocion_tarjeta ttpc on tt.id_ticket =ttpc.id_ticket  INNER JOIN tsa_banco_tarjeta tcp ON tcp.id_banco_tarjeta =ttpc.id_promocion and tt.id_ticket=:id_ticket";
                      }
                      if ($tipoP=="FC") {
                          $tipoP1="Factor de Compra";
                          $text="select tcp.* from tsa_ticket tt INNER JOIN tsa_ticket_promocion_factor_compra ttpc on tt.id_ticket =ttpc.id_ticket  INNER JOIN tsa_factor_compra tcp ON tcp.id_factor_compra =ttpc.id_promocion and tt.id_ticket=:id_ticket";
                      }
                      if ($tipoP=="CG") {
                          $tipoP1="Código Promocional";
                          $text="select tcp.* from tsa_ticket tt INNER JOIN tsa_ticket_promocion_codigo ttpc on tt.id_ticket =ttpc.id_ticket  INNER JOIN tsa_codigo_promocional tcp ON tcp.id_codigo_promocional =ttpc.id_promocion and tt.id_ticket=:id_ticket";
                      }
                      if ($tipoP=="FP") {
                          $tipoP1="Factor de Pago";
                          $text="select tcp.* from tsa_ticket tt INNER JOIN tsa_ticket_promocion_factor_pago ttpc on tt.id_ticket =ttpc.id_ticket  INNER JOIN tsa_factor_pago tcp ON tcp.id_factor_pago =ttpc.id_promocion and tt.id_ticket=:id_ticket";
                      }
                      $statement1 = $db->prepare($text);
                      $statement1->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                      $statement1->execute();

                      while($item1 = $statement1->fetch()){
                            $nombre=$item1->nombre;
                      }
                  }

                    $horarios=array('evento'=>$item->nombre,'sala'=>$item->sala,'fecha'=>$item->fecha, 'tipo_promo'=>$tipoP1,'tipo'=>$item->tipo, 'id_ticket'=>$item->id_ticket, 'nombre_promo'=>$nombre) ;
                    if ($id_funcion!=$item->id_funcion) {
                      $out["codigo"] = "226";
                      $out["mensaje"] = $error_226_mensaje;
                      $out["causa"] = $error_226_causa;
                      $response->getBody()->write(json_encode($out));
                      return $response->withStatus(400);
                    }
                    $asientos[$item->platea] []=array('id_ticket_asiento'=>$item->id_ticket_asiento,'asiento'=>$item->asiento,'cantidad_ingresada'=>$item->cantidad_ingresa,'cantidad_espera'=>$item->cantidad_espera) ;
              }
              $horarios["detalle"]=$asientos;

              $out =$horarios;

              $response->getBody()->write(json_encode($out));
              return $response;
            }else{
              $sql ="SELECT te.nombre ,trg.cantidad ,trg.cantidad_ingresa, trg.cantidad_espera ,trg.estado ,trg.id_registro_gratuito,tf.id_funcion, ts.nombre as sala,
               tf.fecha FROM tsa_evento te INNER JOIN tsa_funcion tf ON te.id_evento =tf.id_evento INNER JOIN tsa_sala_mapa tsm ON tsm.id_sala_mapa =te.id_sala_mapa
               INNER JOIN tsa_sala ts ON ts.id_sala =tsm.id_sala INNER JOIN tsa_registro_gratuito trg ON trg.id_funcion =tf.id_funcion and trg.id_registro_gratuito=:id_ticket";
              $statement = $db->prepare($sql);
              $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
              $result = $statement->execute();
              $evento="";
              $sala="";
              $fecha="";
              $tipo="";
              while($item = $statement->fetch()){
                    $horarios=array('evento'=>$item->nombre,'sala'=>$item->sala,'fecha'=>$item->fecha, 'id_registro_gratuito'=>$item->id_registro_gratuito,'estado'=>$item->estado,'asiento'=>$item->cantidad,'cantidad_ingresada'=>$item->cantidad_ingresa,'cantidad_espera'=>$item->cantidad_espera) ;
                    if ($id_funcion!=$item->id_funcion) {
                      $out["codigo"] = "228";
                      $out["mensaje"] = $error_228_mensaje;
                      $out["causa"] = $error_228_causa;
                      $response->getBody()->write(json_encode($out));
                      return $response->withStatus(400);
                    }
              }
              $out =$horarios;
              $response->getBody()->write(json_encode($out));
              return $response;
            }

        } catch (\PDOException $th) {
            $result = false;
            $out["codigo"] = "102";
            $out["mensaje"] = $error_102_mensaje;
            $out["causa"] = $error_102_causa;
            $out["error"] = $th->getMessage();
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }

        $out =$horarios;

        $response->getBody()->write(json_encode($out));
        return $response;
    }

    public function registrar_ingreso($request, $response, $args){
        include("error.php");
        $response = $response->withHeader('Content-Type', 'application/json');
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
            $out["codigo"] = "100";
            $out["mensaje"] = $error_100_mensaje;
            $out["causa"] =  $error_100_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            $out["codigo"] = "101";
            $out["mensaje"] = $error_101_mensaje;
            $out["causa"] = $error_101_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(401);
        }
        // FIN VALIDACION
        $json = $request->getBody();
        $body = json_decode($json, true);
        if (!(isset($body["asientos"])  && isset($body["tipo"]) && isset($body["id_ticket"]))){
          $out["codigo"] = "201";
          $out["mensaje"] = $error_201_mensaje;
          $out["causa"] = $error_201_causa;
          $response->getBody()->write(json_encode($out));
          return $response->withStatus(400);
        }
        //Realizo consulta de puertas a DB
        $asientos= trim($body["asientos"]);
        $id_ticket= trim($body["id_ticket"]);
        $asientosT1= explode('|',$asientos);
        $tipo= trim($body["tipo"]);
        $horarios= [];
        $tickets= [];
        try {
            date_default_timezone_set('America/Lima');
            $sql ="SELECT tta.* FROM  tsa_ticket_asiento tta WHERE id_ticket=:id_ticket";
            $statement = $db->prepare($sql);
            $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
            $result = $statement->execute();
            while($item = $statement->fetch()){
                  $id_ticket_asiento1= $item->id_ticket_asiento;
                  $tickets[]= $id_ticket_asiento1;
                  $horarios[$id_ticket_asiento1]=array('asiento'=>$item->asiento,'cantidad_ingresa'=>$item->cantidad_ingresa,'cantidad_espera'=>$item->cantidad_espera,'estado'=>$item->estado,'id_ticket_asiento'=>$id_ticket_asiento1) ;
            }
            foreach($asientosT1 as $llave => $valores) {
              $asientosT= explode(':',$valores);
              $id_ticket_asiento= (int)$asientosT[0];
              $cantidad=(int)$asientosT[1];
              if (!in_array($id_ticket_asiento, $tickets)) {
                $out["codigo"] = "226";
                $out["mensaje"] = $error_226_mensaje;
                $out["causa"] = $error_226_causa;
                $response->getBody()->write(json_encode($out));
                return $response->withStatus(400);
              }else{
                $cant=$horarios[$id_ticket_asiento]["cantidad_ingresa"]+$cantidad;
                $cant1=$horarios[$id_ticket_asiento]["cantidad_espera"]+$cantidad;
                $asient1=$horarios[$id_ticket_asiento]["asiento"];
                if ($tipo=="I") {
                    if (is_numeric($asient1)) {
                      if ($cant>$asient1) {
                        $out["codigo"] = "227";
                        $out["mensaje"] = $error_227_mensaje;
                        $out["causa"] = $error_227_causa;
                        $response->getBody()->write(json_encode($out));
                        return $response->withStatus(400);
                      }
                    }else{
                      if ($cant>1) {
                        $out["codigo"] = "227";
                        $out["mensaje"] = $error_227_mensaje;
                        $out["causa"] = $error_227_causa;
                        $response->getBody()->write(json_encode($out));
                        return $response->withStatus(400);
                      }
                    }
                }else{
                  if (is_numeric($asient1)) {
                    if ($cant1>$asient1) {
                      $out["codigo"] = "227";
                      $out["mensaje"] = $error_227_mensaje;
                      $out["causa"] = $error_227_causa;
                      $response->getBody()->write(json_encode($out));
                      return $response->withStatus(400);
                    }
                  }else{
                    if ($cant1>1) {
                      $out["codigo"] = "227";
                      $out["mensaje"] = $error_227_mensaje;
                      $out["causa"] = $error_227_causa;
                      $response->getBody()->write(json_encode($out));
                      return $response->withStatus(400);
                    }
                  }
                }
              }
            }
            foreach($asientosT1 as $llave => $valores) {
              $asientosT= explode(':',$valores);
              $id_ticket_asiento= (int)$asientosT[0];
              $cantidad=(int)$asientosT[1];
              $cant=$horarios[$id_ticket_asiento]["cantidad_ingresa"]+$cantidad;
              $cant1=$cantidad;
              $asient1=$horarios[$id_ticket_asiento]["asiento"];
              if ($tipo=="I") {
                $sql = "UPDATE tsa_ticket_asiento SET estado='I',cantidad_ingresa=:cantidad, fecha_ingreso=now()  WHERE id_ticket_asiento=:id_ticket_asiento";
                $statement1 = $db->prepare($sql);
                $statement1->bindValue(':id_ticket_asiento',  $id_ticket_asiento, \PDO::PARAM_STR);
                $statement1->bindValue(':cantidad',  $cant, \PDO::PARAM_STR);
                $result = $statement1->execute();
              }else{
                $sql = "UPDATE tsa_ticket_asiento SET estado='I',cantidad_espera=:cantidad WHERE id_ticket_asiento=:id_ticket_asiento";
                $statement1 = $db->prepare($sql);
                $statement1->bindValue(':id_ticket_asiento',  $id_ticket_asiento, \PDO::PARAM_STR);
                $statement1->bindValue(':cantidad',  $cant1, \PDO::PARAM_STR);
                $result = $statement1->execute();
              }
              $sql = "UPDATE tsa_ticket SET estado='I' WHERE id_ticket=:id_ticket";
              $statement1 = $db->prepare($sql);
              $statement1->bindValue(':id_ticket',  $id_ticket, \PDO::PARAM_STR);
              $result = $statement1->execute();
            }
        } catch (\PDOException $th) {
            $result = false;
            $out["codigo"] = "102";
            $out["mensaje"] = $error_102_mensaje;
            $out["causa"] = $error_102_causa;
            $out["error"] = $th->getMessage();
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        $out['status'] =$status_asientoE;
        $response->getBody()->write(json_encode($out));
        return $response;
    }

    public function registrar_ingreso_gratuito($request, $response, $args){
        include("error.php");
        $response = $response->withHeader('Content-Type', 'application/json');
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
            $out["codigo"] = "100";
            $out["mensaje"] = $error_100_mensaje;
            $out["causa"] =  $error_100_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        if ($result && count($statement->fetchAll())==0){
            $out["codigo"] = "101";
            $out["mensaje"] = $error_101_mensaje;
            $out["causa"] = $error_101_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(401);
        }
        // FIN VALIDACION
        $json = $request->getBody();
        $body = json_decode($json, true);
        if (!(isset($body["asientos"])  && isset($body["tipo"]) && isset($body["id_registro_gratuito"]))){
          $out["codigo"] = "201";
          $out["mensaje"] = $error_201_mensaje;
          $out["causa"] = $error_201_causa;
          $response->getBody()->write(json_encode($out));
          return $response->withStatus(400);
        }
        //Realizo consulta de puertas a DB
        $asientos= trim($body["asientos"]);
        $id_registro_gratuito= trim($body["id_registro_gratuito"]);
        $tipo= trim($body["tipo"]);
        //Realizo consulta de puertas a DB
        try {
            date_default_timezone_set('America/Lima');
            if ($tipo=="I") {
              $sql = "UPDATE tsa_registro_gratuito SET estado='I',cantidad_ingresa=:cantidad, fecha_ingreso=now()  WHERE id_registro_gratuito=:id_registro_gratuito";
              $statement1 = $db->prepare($sql);
              $statement1->bindValue(':id_registro_gratuito',  $id_registro_gratuito, \PDO::PARAM_STR);
              $statement1->bindValue(':cantidad',  $asientos, \PDO::PARAM_STR);
              $result = $statement1->execute();
            }else{
              $sql = "UPDATE tsa_registro_gratuito SET estado='I',cantidad_espera=:cantidad WHERE id_registro_gratuito=:id_registro_gratuito";
              $statement1 = $db->prepare($sql);
              $statement1->bindValue(':id_registro_gratuito',  $id_registro_gratuito, \PDO::PARAM_STR);
              $statement1->bindValue(':cantidad',  $asientos, \PDO::PARAM_STR);
              $result = $statement1->execute();
            }
        } catch (\PDOException $th) {
            $result = false;
            $out["codigo"] = "102";
            $out["mensaje"] = $error_102_mensaje;
            $out["causa"] = $error_102_causa;
            $out["error"] = $th->getMessage();
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
        $out['status'] =$status_asientoE;
        $response->getBody()->write(json_encode($out));
        return $response;
    }
}
