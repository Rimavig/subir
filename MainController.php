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
              if ($item->contrasena == $password) {
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
                   $sql = "UPDATE tsa_usuario_cliente SET codigo='12345', fecha_reseteo=now() WHERE id_usuario_cliente=:id_usuario";
                   $statement1 = $db->prepare($sql);
                   $statement1->bindValue(':id_usuario',  $item->id_usuario_cliente, \PDO::PARAM_STR);
                   $result = $statement1->execute();
                   $out["status"] = $status_reseteo;
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
                  date_default_timezone_set('America/Lima');
                 $datetime = date("Y-m-d H:i:s");
                 if ($item->codigo == $codigo) {
                    $datetime1 = date_create($datetime);
                    $datetime2 = date_create($item->fecha_reseteo);
                    $diff = date_diff($datetime1, $datetime2);
                    $total = $diff->y * 365.25 + $diff->m * 30 + $diff->d * 24 + $diff->h*60 + $diff->i;
                     if ($total<10) {
                         $sql = "UPDATE tsa_usuario_cliente SET contrasena=:contrasena, usuario_modificacion=:usuario_modificacion, fecha_modificacion=now() WHERE id_usuario_cliente=:id_usuario";
                         $statement1 = $db->prepare($sql);
                         $statement1->bindValue(':contrasena',  $contrasena, \PDO::PARAM_STR);
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
        try {
            $sql = "INSERT INTO tsa_usuario_cliente (id_usuario_cliente,nombres,apellidos,uid, usuario,cedula,correo,sexo,celular,contrasena,fecha_nacimiento,direccion,amigo_teatro,usuario_creacion)
                   VALUES (NULL,:nombre,:apellido,:uid,:usuario,:cedula,:correo,:sexo,:celular,:contrasena,:fecha_nacimiento,:direccion,:amigo_teatro,:usuario)";

            $statement = $db->prepare($sql);
            $statement->bindValue(':nombre', $nombre, \PDO::PARAM_STR);
            $statement->bindValue(':apellido', $apellido, \PDO::PARAM_STR);
            $statement->bindValue(':usuario', $usuario, \PDO::PARAM_STR);
            $statement->bindValue(':cedula', $cedula, \PDO::PARAM_STR);
            $statement->bindValue(':correo', $correo, \PDO::PARAM_STR);
            $statement->bindValue(':sexo', $sexo, \PDO::PARAM_STR);
            $statement->bindValue(':celular', $celular, \PDO::PARAM_STR);
            $statement->bindValue(':contrasena', $contrasena, \PDO::PARAM_STR);
            $statement->bindValue(':fecha_nacimiento', $fecha_nacimiento, \PDO::PARAM_STR);
            $statement->bindValue(':direccion', $direccion, \PDO::PARAM_STR);
            $statement->bindValue(':amigo_teatro', $amigo_teatro, \PDO::PARAM_STR);
            $statement->bindValue(':uid', $uid, \PDO::PARAM_STR);
            $result = $statement->execute();
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
        and isset($body["id_usuario"]) and isset($body["fecha_nacimiento"]) and isset($body["direccion"]))){
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

        try {
            $sql = "UPDATE tsa_usuario_cliente set nombres=:nombre ,apellidos=:apellido, cedula=:cedula,sexo=:sexo,celular=:celular,fecha_nacimiento=:fecha_nacimiento,direccion=:direccion,usuario_modificacion='usuario', fecha_modificacion=now() WHERE id_usuario_cliente=:id_usuario";

            $statement = $db->prepare($sql);
            $statement->bindValue(':nombre', $nombre, \PDO::PARAM_STR);
            $statement->bindValue(':apellido', $apellido, \PDO::PARAM_STR);
            $statement->bindValue(':cedula', $cedula, \PDO::PARAM_STR);
            $statement->bindValue(':sexo', $sexo, \PDO::PARAM_STR);
            $statement->bindValue(':celular', $celular, \PDO::PARAM_STR);
            $statement->bindValue(':id_usuario', $id_usuario, \PDO::PARAM_STR);
            $statement->bindValue(':fecha_nacimiento', $fecha_nacimiento, \PDO::PARAM_STR);
            $statement->bindValue(':direccion', $direccion, \PDO::PARAM_STR);
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
                     if ($item->contrasena == $password) {
                       $sql = "UPDATE tsa_usuario_cliente set contrasena=:contrasena ,usuario_modificacion='usuario', fecha_modificacion=now() WHERE id_usuario_cliente=:id_usuario";
                       $statement = $db->prepare($sql);
                       $statement->bindValue(':contrasena',$new_password, \PDO::PARAM_STR);
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
              $sql = "INSERT INTO teatro.tsa_bloqueo_asiento (id_usuario_cliente,id_distribucion) VALUES (:id_usuario,:asiento)";
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
              $sql = "UPDATE teatro.tsa_bloqueo_asiento set fecha_creacion =now() WHERE id_usuario_cliente=:id_usuario and id_distribucion=:asiento";
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
                  if (!$total>=$cantidad) {
                    $out["codigo"] = "210";
                    $out["mensaje"] = $error_210_mensaje;
                    $out["causa"] =  $error_210_causa;
                    $response->getBody()->write(json_encode($out));
                    return $response->withStatus(400);
                  }
              }

              $sql = "INSERT INTO teatro.tsa_bloqueo_cantidad (id_usuario_cliente,id_platea_funcion,cantidad) VALUES (:id_usuario,:id_platea_funcion, :cantidad)";
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
              $sql = "UPDATE teatro.tsa_bloqueo_cantidad set fecha_creacion =now() WHERE id_usuario_cliente=:id_usuario and id_platea_funcion=:id_platea_funcion and cantidad=:cantidad";
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
              $sql = "DELETE FROM teatro.tsa_bloqueo_cantidad WHERE id_usuario_cliente=:id_usuario and id_platea_funcion=:id_platea_funcion and cantidad=:cantidad";
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
         $facturacion []=  array('id_facturacion'=> 1, 'nombres'=> "CONSUMIDOR", 'apellidos'=> "FINAL", 'cedula'=> "9999999999", 'razon_social'=> "", 'ruc'=> "9999999999", 'tipo'=> "C");
        while($item = $statement->fetch()){
          $band=false;
          $facturacion []=  array('id_facturacion'=> $item->id_facturacion, 'nombres'=> $item->nombres, 'apellidos'=> $item->apellidos, 'cedula'=> $item->cedula, 'razon_social'=> $item->razon_social, 'ruc'=> $item->ruc, 'tipo'=> $item->tipo);
        }
        $response->getBody()->write(json_encode($facturacion));
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
            $out["codigo"] = "102";
            $out["mensaje"] = $error_102_mensaje;
            $out["causa"] = $error_102_causa;
            $out["error"] = $th->getMessage();
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
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
        if (!(isset($body["nombres"])  && isset($body["id_usuario"])  && isset($body["apellidos"]) && isset($body["cedula"]) && isset($body["razon_social"]) && isset($body["ruc"]) && isset($body["tipo"]))){
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
        $ruc = trim($body['ruc']);
        $tipo = trim($body['tipo']);
        $sql = "INSERT INTO teatro.tsa_facturacion (id_usuario_cliente,nombres,apellidos,cedula,razon_social,ruc,tipo,usuario_creacion)
	       VALUES (:id_usuario,:nombres,:apellidos,:cedula,:razon_social,:ruc,:tipo,'usuario')";
        //$sql = "SELECT * FROM categorias where  id_tienda =:tienda";
        $statement = $db->prepare($sql);
        $statement->bindValue(':nombres', $nombres, \PDO::PARAM_STR);
        $statement->bindValue(':id_usuario', $id_usuario, \PDO::PARAM_STR);
        $statement->bindValue(':apellidos', $apellidos, \PDO::PARAM_STR);
        $statement->bindValue(':cedula', $cedula, \PDO::PARAM_STR);
        $statement->bindValue(':razon_social', $razon_social, \PDO::PARAM_STR);
        $statement->bindValue(':ruc', $ruc, \PDO::PARAM_STR);
        $statement->bindValue(':tipo', $tipo, \PDO::PARAM_STR);
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
                $sql = " UPDATE teatro.tsa_facturacion_favorita SET id_facturacion=:id_facturacion WHERE id_facturacion_favorita=$item->id_facturacion_favorita";
                $statement1 = $db->prepare($sql);
                $statement1->bindValue(':id_facturacion', $id_facturacion, \PDO::PARAM_STR);
                $result = $statement1->execute();
                $out['status'] =$status_UfacturacionF;
                $response->getBody()->write(json_encode($out));
                return $response;
            }
            if($band){
                $sql = "INSERT INTO teatro.tsa_facturacion_favorita (id_usuario_cliente,id_facturacion,usuario_creacion) VALUES (:id_usuario,:id_facturacion,'usuario')";
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
        $sql = "SELECT tf.* FROM tsa_facturacion_favorita tff INNER JOIN tsa_facturacion tf ON tf.id_facturacion =tff.id_facturacion AND  tff.id_usuario_cliente=:id_usuario";
        $statement = $db->prepare($sql);
        $statement->bindValue(':id_usuario', $id_usuario, \PDO::PARAM_STR);
        try {
            $result = $statement->execute();
            $band=true;
            $facturacion = [] ;
            while($item = $statement->fetch()){
                $band=false;
                $facturacion []=  array('id_facturacion'=> $item->id_facturacion, 'nombres'=> $item->nombres, 'apellidos'=> $item->apellidos, 'cedula'=> $item->cedula, 'razon_social'=> $item->razon_social, 'ruc'=> $item->ruc, 'tipo'=> $item->tipo);
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
                $sql = "UPDATE teatro.tsa_tarjeta_favorita SET bin=:bin1 , `status`=:status1, token=:token, holder_name=:holder_name, expiry_year=:expiry_year, expiry_month=:expiry_month, transaction_reference=:transaction_reference, `type`=:type1, `number`=:number1  WHERE id_tarjeta_favorita=$item->id_tarjeta_favorita";
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
                $sql = "INSERT INTO teatro.tsa_tarjeta_favorita (id_usuario_cliente,bin,`status`,token,holder_name,expiry_year,expiry_month,transaction_reference,`type`,`number`,usuario_creacion)
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
        $ruta= "http://104.198.222.134/imagenes/logo/";;
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
          'facebook'=> $item->facebook, 'instagram'=> $item->instagram, 'twitter'=> $item->twitter, 'logo_light'=>$ruta_logo.$item->logo_light, 'logo_dark'=> $ruta_logo.$item->logo_dark);
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
        if (!(isset($body["email"]))){
            $out["codigo"] = "201";
            $out["mensaje"] = $error_201_mensaje;
            $out["causa"] =  $error_201_causa;
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(400);
        }
        $email = trim($body['email']);
        $sql = "SELECT * FROM tsa_usuario_cliente WHERE correo=:correo";
        $statement = $db->prepare($sql);
        $statement->bindValue(':correo', $email, \PDO::PARAM_STR);
        $out="";
        try {
            $result = $statement->execute();
            while($item = $statement->fetch()){
              $sql1 = "UPDATE tsa_usuario_cliente	SET estado='A' WHERE id_usuario_cliente=:id_usuario";
              $statement1 = $db->prepare($sql1);
              $statement1->bindValue(':id_usuario',  $item->id_usuario_cliente, \PDO::PARAM_STR);
              $statement1->execute();
              $out="www.teatrosanchezaguilar.org";
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
            $sql = "SELECT ts.nombres, ts.apellidos,ts.codigo_identificador, ts.puntos_acumulados, ts.fecha_caducidad FROM tsa_usuario_cliente ts WHERE ts.id_usuario_cliente=:id_usuario";
            $statement = $db->prepare($sql);
            $statement->bindValue(':id_usuario', $id_usuario, \PDO::PARAM_STR);
            $result = $statement->execute();
            $usuario = [] ;
            while($item = $statement->fetch()){
                $usuario= array( 'nombres'=> $item->nombres, 'apellidos'=> $item->apellidos, 'codigo_identificador'=> $item->codigo_identificador, 'puntos_acumulados'=> $item->puntos_acumulados, 'fecha_caducidad'=> $item->fecha_caducidad);
            }
            $sql = "SELECT *  FROM tsa_amigos_puntos ts WHERE ts.id_usuario_cliente=:id_usuario";
            $statement = $db->prepare($sql);
            $statement->bindValue(':id_usuario', $id_usuario, \PDO::PARAM_STR);
            $result = $statement->execute();
            $canjes = [] ;
            while($item = $statement->fetch()){
                $canjes[]= array(  'id'=> $item->id_amigos_puntos, 'evento'=> $item->evento, 'cantidad'=> $item->cantidad, 'fecha_consumo'=> $item->fecha_consumo, 'puntos'=> $item->puntos);
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
        $ruta= "http://104.198.222.134/imagenes/logo/";;
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
              $out= array('id'=> $item->id_fundacion, 'titulo'=> $item->nombre, 'descripcion1'=> $item->descripcion1, 'descripcion2'=> $item->descripcion2, 'imagen'=>$ruta_logo.$item->imagen, 'precio'=>$precio ,  'terminos_condiciones'=>'https://qr-ticket.app/privacy.html');
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
                $facturacion=  array('id_facturacion'=> $item->id_facturacion, 'nombres'=> $item->nombres, 'apellidos'=> $item->apellidos, 'cedula'=> $item->cedula, 'razon_social'=> $item->razon_social, 'ruc'=> $item->ruc, 'tipo'=> $item->tipo);

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
            $ruta= "http://104.198.222.134/imagenes/evento/";
            date_default_timezone_set('America/Lima');
            $datetime = date("Y-m-d H:i:s");
            while($item = $statement->fetch()){
              if ($item->fecha<$datetime) {
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
                            $band2=false;
                            $estrellaT[]= array('id'=> $item->id_evento, 'nombre'=> $item->nombre, 'duracion'=> $item->duracion, 'imagen'=> $ruta_evento.$item->id_evento."H.png", 'tipo'=> $item->tipo, 'categoria'=> $categoria);
                          }
                        }
                        if ($band2) {
                          $band3=false;
                          $cartelera[]= array('id'=> $item->id_evento, 'nombre'=> $item->nombre, 'duracion'=> $item->duracion, 'imagen'=> $ruta_evento.$item->id_evento."C.png", 'tipo'=> $item->tipo, 'categoria'=> $categoria);
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
              $categoria="";
              if ($item->id_categoria!=1) {
                  $categoria=$item->categoria;
              }
              $band3=false;
              $cartelera[]= array('id'=> $item->id_evento, 'nombre'=> $item->nombre, 'duracion'=> $item->duracion, 'imagen'=> $ruta_evento.$item->id_evento."C.png", 'tipo'=> $item->tipo, 'categoria'=> $categoria);
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
            $ruta= "http://104.198.222.134/imagenes/evento/";
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
            $ruta= "http://104.198.222.134/imagenes/evento/";
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
              if ($item->fecha<$datetime) {
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
            $ruta= "http://104.198.222.134/imagenes/evento/";;
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
            $ruta= "http://104.198.222.134/imagenes/evento/";
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
                   'tipo'=> $item->tipo, 'categoria'=> $categoria, 'clasificacion'=> $clasificacion, 'procedencia'=> $procedencia, 'productora'=> $productora1,'sala'=> $item->sala,'tipo_espectaculo'=> $tipo_espectaculo,
                   'sinopsis'=> $item->sinopsis, 'descripcion2'=> $item->descripcion2, 'ficha'=> [], 'video'=> $item->ruta_video);
                    $eventos[]= $item->id_evento;
                    $horarios[$item->id_evento]=[] ;
                    $ficha[$item->id_evento]=[];
              }

            }
            $band5=false;
            $sql = "SELECT te.id_evento ,  tf.fecha, tf.aforo , tf.cantidad_vendida, tf.estado as estado_funcion, tf.id_funcion FROM tsa_evento te INNER JOIN  tsa_funcion tf ON tf.id_evento =te.id_evento and te.id_evento =:id_evento ORDER BY tf.fecha ASC";
            $statement = $db->prepare($sql);
            $statement->bindValue(':id_evento', $id_evento, \PDO::PARAM_STR);
            $result = $statement->execute();
            while($item = $statement->fetch()){
                $band5=true;
                if ($item->cantidad_vendida>= $item->aforo) {
                  $estado="B";
                }else{
                  $estado= $item->estado_funcion;
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
            $sql = "SELECT te.*, tt.precio ,tt.sala, tf.fecha, tt.id_ticket, tta.asiento,tt.estado as estado_ticket FROM tsa_ticket tt
            INNER JOIN  tsa_usuario_cliente tuc ON tuc.id_usuario_cliente=tt.id_usuario_cliente
            INNER JOIN  tsa_funcion tf ON tf.id_funcion =tt.id_funcion
            INNER JOIN  tsa_ticket_asiento tta ON tta.id_ticket =tt.id_ticket
            INNER JOIN  tsa_evento te ON te.id_evento =tf.id_evento and tuc.id_usuario_cliente =:id_usuario  ORDER BY tf.fecha ASC ";
            $statement = $db->prepare($sql);
            $statement->bindValue(':id_usuario', $id_usuario, \PDO::PARAM_STR);
            $result = $statement->execute();
            $tickets= [];
            $ticket= [];
            $ticketT=[];
            $asientos= [];
            $ruta= "http://104.198.222.134/imagenes/evento/";
            date_default_timezone_set('America/Lima');
            $datetime = date("Y-m-d H:i:s");
            while($item = $statement->fetch()){
              if (!in_array($item->id_ticket, $tickets)) {
                  $ticket[$item->id_ticket]= array('id_ticket'=> $item->id_ticket, 'nombre'=> $item->nombre, 'duracion'=> $item->duracion, 'imagen'=> $ruta_evento.$item->id_evento."V.png",
                   'tipo'=> $item->tipo,'sala'=> $item->sala,'precio'=> $item->precio,'fecha'=> $item->fecha,'estado'=> $item->estado_ticket,'qr'=>"codigo_graficar");
                  $tickets[]= $item->id_ticket;
              }
              $asientos[$item->id_ticket][]=$item->asiento;
            }
            foreach ($tickets as $clave) {
                $ticket[$clave]['asientos']=  $asientos[$clave];
                $ticketT[]=$ticket[$clave];
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
            $ruta= "http://104.198.222.134/imagenes/distribucion/";
            date_default_timezone_set('America/Lima');
            $datetime = date("Y-m-d H:i:s");
            $sql = "SELECT tp.* FROM tsa_platea tp INNER JOIN tsa_evento te ON te.id_evento =tp.id_evento and te.id_evento =:id_evento";
            $statement = $db->prepare($sql);
            $statement->bindValue(':id_evento', $id_evento, \PDO::PARAM_STR);
            $result = $statement->execute();
            $platea= [];
            $asientos= [];
            $asientosT= [];
            while($item = $statement->fetch()){
              $platea []= array('id_platea'=> $item->id_platea, 'nombre'=> $item->nombre, 'precio'=> $item->costo, 'aforo_platea'=> $item->aforo,'vendido_platea'=> $item->vendido,'color'=> "#e8efea");
            }
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
                $lateral1=$item->lateral;
                $asientos[$item->fila][]= array('id_asiento'=> "",'nombre'=> $item->fila,'id_platea'=> "", 'estado'=> "4");
                $asientos[$item->fila][]= array('id_asiento'=> $item->id_distribucion,'nombre'=> $item->fila.$item->numero,'id_platea'=> $item->id_platea, 'estado'=> $estado);
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

            $sql = "SELECT * FROM tsa_funcion tf WHERE  tf.id_funcion =:id_funcion";
            $statement = $db->prepare($sql);
            $statement->bindValue(':id_funcion', $id_funcion, \PDO::PARAM_STR);
            $result = $statement->execute();
            $funcion= [];
            while($item = $statement->fetch()){
              $funcion []= array('id_funcion'=> $item->id_funcion,'platea'=> $platea,'asientos'=> $asientosT, 'aforo_funcion'=> $item->aforo, 'vendido_funcion'=> $item->cantidad_vendida, 'tipo'=> $tipo ,'imagen'=> $ruta_evento.$item->ruta_imagen);
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
        try {
            $eventos= [];
            $promocion=[];
            $ruta= "http://104.198.222.134/imagenes/evento/";
            $sql = "SELECT te.nombre ,te.id_evento FROM tsa_evento te INNER JOIN tsa_factor_compra tfc ON te.id_evento = tfc.id_evento ";
            $statement = $db->prepare($sql);
            $result = $statement->execute();
            while($item = $statement->fetch()){
              if (!in_array($item->id_evento, $eventos)) {
                  $promocion[]= array('id'=> $item->id_evento, 'nombre'=> $item->nombre, 'imagen'=> $ruta_evento.$item->id_evento."H.png");
                  $eventos[]= $item->id_evento;
              }
            }
            $sql = "SELECT te.nombre ,te.id_evento FROM tsa_evento te INNER JOIN tsa_cruzados tfc ON te.id_evento = tfc.id_evento ";
            $statement = $db->prepare($sql);
            $result = $statement->execute();
            while($item = $statement->fetch()){
              if (!in_array($item->id_evento, $eventos)) {
                  $promocion[]= array('id'=> $item->id_evento, 'nombre'=> $item->nombre, 'imagen'=> $ruta_evento.$item->id_evento."H.png");
                  $eventos[]= $item->id_evento;
              }
            }
            $sql = "SELECT te.nombre ,te.id_evento FROM tsa_evento te INNER JOIN tsa_factor_pago tfc ON te.id_evento = tfc.id_evento ";
            $statement = $db->prepare($sql);
            $result = $statement->execute();
            while($item = $statement->fetch()){
              if (!in_array($item->id_evento, $eventos)) {
                  $promocion[]= array('id'=> $item->id_evento, 'nombre'=> $item->nombre, 'imagen'=> $ruta_evento.$item->id_evento."H.png");
                  $eventos[]= $item->id_evento;
              }
            }
            $sql = "SELECT te.nombre ,te.id_evento FROM tsa_evento te INNER JOIN tsa_banco_tarjeta tfc ON te.id_evento = tfc.id_evento ";
            $statement = $db->prepare($sql);
            $result = $statement->execute();
            while($item = $statement->fetch()){
              if (!in_array($item->id_evento, $eventos)) {
                  $promocion[]


                  = array('id'=> $item->id_evento, 'nombre'=> $item->nombre, 'imagen'=> $ruta_evento.$item->id_evento."H.png");
                  $eventos[]= $item->id_evento;
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
        if (!(isset($body["id_evento"]))){
          $out["codigo"] = "201";
          $out["mensaje"] = $error_201_mensaje;
          $out["causa"] = $error_201_causa;
          $response->getBody()->write(json_encode($out));
          return $response->withStatus(400);
        }
        //Realizo consulta de puertas a DB
        $id_evento= trim($body["id_evento"]);
        try {
            $promocion=[];
            $ruta= "http://104.198.222.134/imagenes/evento/";
            $sql = "SELECT * FROM tsa_promocion tp INNER JOIN tsa_factor_compra tfc ON tp.id_promocion =tfc.id_promocion and tfc.estado ='A' and fecha_inicio <= NOW() and fecha_final >=NOW() and (tfc.id_evento=:id_evento  OR tfc.id_evento=1) ";
            $statement = $db->prepare($sql);
            $statement->bindValue(':id_evento', $id_evento, \PDO::PARAM_STR);
            $result = $statement->execute();
            while($item = $statement->fetch()){
                $promocion[]= array('id_promocion'=> $item->id_factor_compra, 'nombre'=> $item->nombre, 'compra'=> $item->compra, 'pago'=> $item->pago, 'descripcion'=> $item->descripcion, 'amigo_teatro'=> $item->amigo_teatro,
                'id_platea'=> $item->id_platea,'tipo'=>'FC' );
            }
            $sql = "SELECT * FROM tsa_promocion tp INNER JOIN tsa_cruzados tfc ON tp.id_promocion =tfc.id_promocion and tfc.estado ='A' and fecha_inicio <= NOW() and fecha_final >=NOW() and (tfc.id_evento=:id_evento  OR tfc.id_evento=1) ";
            $statement = $db->prepare($sql);
            $statement->bindValue(':id_evento', $id_evento, \PDO::PARAM_STR);
            $result = $statement->execute();
            while($item = $statement->fetch()){
              $promocion[]= array('id_promocion'=> $item->id_cruzados, 'nombre'=> $item->nombre, 'cantidad'=> $item->cantidad, 'id_evento2'=> $item->id_evento2, 'cantidad2'=> $item->cantidad2, 'descripcion'=> $item->descripcion, 'amigo_teatro'=> $item->amigo_teatro,
              'id_platea'=> $item->id_platea,'tipo'=>'CD');
            }
            $sql = "SELECT * FROM tsa_promocion tp INNER JOIN tsa_factor_pago tfc ON tp.id_promocion =tfc.id_promocion and tfc.estado ='A' and fecha_inicio <= NOW() and fecha_final >=NOW() and (tfc.id_evento=:id_evento  OR tfc.id_evento=1)";
            $statement = $db->prepare($sql);
            $statement->bindValue(':id_evento', $id_evento, \PDO::PARAM_STR);
            $result = $statement->execute();
            while($item = $statement->fetch()){
              $promocion[]= array('id_promocion'=> $item->id_factor_pago, 'nombre'=> $item->nombre, 'desde'=> $item->desde, 'hasta'=> $item->hasta, 'descuento'=> $item->descuento, 'descripcion'=> $item->descripcion, 'amigo_teatro'=> $item->amigo_teatro,
              'id_platea'=> $item->id_platea,'tipo'=>'FP');
            }
            $sql = "SELECT tp.*, tt.nombre as nombreT, tt.tipo as tipoT, tfc.id_banco_tarjeta, tfc.nombre , tfc.descuento FROM tsa_promocion tp INNER JOIN tsa_banco_tarjeta tfc ON tp.id_promocion =tfc.id_promocion INNER JOIN tsa_tarjeta tt ON tt.id_tarjeta = tfc.id_tarjeta  and tfc.estado ='A' and fecha_inicio <= NOW() and fecha_final >=NOW() and (tfc.id_evento=:id_evento  OR tfc.id_evento=1)";
            $statement = $db->prepare($sql);
            $statement->bindValue(':id_evento', $id_evento, \PDO::PARAM_STR);
            $result = $statement->execute();
            while($item = $statement->fetch()){
              $promocion[]= array('id_promocion'=> $item->id_banco_tarjeta, 'nombre'=> $item->nombre, 'tarjeta'=> $item->nombreT, 'tipo_tarjeta'=> $item->tipoT, 'descuento'=> $item->descuento, 'descripcion'=> $item->descripcion, 'amigo_teatro'=> $item->amigo_teatro,
              'id_platea'=> $item->id_platea,'tipo'=>'BT');
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
        if (!(isset($body["codigo"]) && isset($body["id_evento"]))){
          $out["codigo"] = "201";
          $out["mensaje"] = $error_201_mensaje;
          $out["causa"] = $error_201_causa;
          $response->getBody()->write(json_encode($out));
          return $response->withStatus(400);
        }

        //Realizo consulta de puertas a DB
        $codigo= trim($body["codigo"]);
        $id_evento= trim($body["id_evento"]);
        try {
            $promocion=[];
            $ruta= "http://104.198.222.134/imagenes/evento/";
            $sql = "SELECT * FROM tsa_promocion tp INNER JOIN tsa_codigo_promocional tfc ON tp.id_promocion =tfc.id_promocion and tfc.estado ='A' and fecha_inicio <= NOW() and fecha_final >=NOW() and tfc.codigo=:codigo and ( tfc.id_evento=:id_evento or tfc.id_evento=1)";
            $statement = $db->prepare($sql);
            $statement->bindValue(':codigo', $codigo, \PDO::PARAM_STR);
            $statement->bindValue(':id_evento', $id_evento, \PDO::PARAM_STR);
            $result = $statement->execute();

            while($item = $statement->fetch()){
                $promocion[]= array('id_promocion'=> $item->id_codigo_promocional, 'nombre'=> $item->nombre, 'codigo'=> $item->codigo, 'descuento'=> $item->descuento, 'descripcion'=> $item->descripcion, 'amigo_teatro'=> $item->amigo_teatro,
                'id_platea'=> $item->id_platea,'tipo'=>'CP' );
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
    public function rembolso($id_transacion)
    {
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
          $transaction["id"]=$id_transacion;
          $data = array();
          $data["transaction"] =$transaction;
          $url="https://ccapi-stg.paymentez.com/v2/transaction/refund/";
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
    public function compra($request, $response, $args){
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


        foreach($eventos as $llave => $valores) {
            if($valores!=""){
              $valor= explode(',',trim($valores));
              if (isset($valor[7])) {
                $tipo=$valor[0];
                $id_evento=$valor[1];
                $id_funcion=$valor[2];
                $asientosT=$valor[3];
                $asientos= explode('-',trim($asientosT));
                $id_promocion=$valor[4];
                $totalP=$valor[5];
                $descuentoP=$valor[6];
                $cantidadT=$cantidadT+$totalP;
                $descuentoT=$descuentoT+$descuentoP;
                $cantidadT2=0;
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
            $user["email"]="rwivanco95@hotmail.com";
            $order["amount"]=(float)$totalC;
            $order["description"]="alguna descripcion";
            $order["dev_reference"]="Nombre de la obra";
            $order["vat"]=0;
            $order["tax_percentage"]=0;
            $order["taxable_amount"]=0;
            $card["token"]= $user_token;
            $data = array();
            $data["user"] =$user;
            $data["order"] = $order;
            $data["card"] = $card;
            $url="https://ccapi-stg.paymentez.com/v2/transaction/debit/";
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
                    $authorization_code=$resultado["transaction"]["authorization_code"];
                    $status_transacion="P";
                    $ban=true;
                }else{
                    $ban=false;
                }
                $response->getBody()->write(json_encode($resultado["transaction"]["status"]));

              }
            }else{
              $result = false;
              $out["codigo"] = "102";
              $out["mensaje"] = $error_102_mensaje;
              $out["causa"] = $error_102_causa;
              $response->getBody()->write(json_encode($out));
              return $response->withStatus(400);
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
        try {
            if ($ban) {
          try {
              $id_compra=0;
              $sql = "INSERT INTO teatro.tsa_compra (id_facturacion,id_usuario_cliente,dolares_canjeados,donacion,sub_total,descuento,iva,total,usuario_creacion,id_transacion,authorization_code,status_transacion)
              VALUES (:id_facturacion,:id_usuario_cliente,:dolares_canjeados,:donacion,:sub_total,:descuento,:iva,:total,:usuario_creacion,:id_transacion,:authorization_code,:status_transacion)";
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
                  $totalP=$valor[5];
                  $descuentoP=$valor[6];
                  $sala=$valor[7];
                  $cantidadT=$cantidadT+$totalP;
                  $descuentoT=$descuentoT+$descuentoP;
                  try {
                      $id_ticket=0;
                      if ($id_compra!=0) {
                        $sql = "INSERT INTO teatro.tsa_ticket (id_funcion,id_usuario_cliente,id_compra,sala,precio,tipo,usuario_creacion)
                        VALUES (:id_funcion,:id_usuario_cliente,:id_compra,:sala,:precio,:tipo,:usuario_creacion)";
                        $statement = $db->prepare($sql);
                        $statement->bindValue(':id_funcion', $id_funcion, \PDO::PARAM_STR);
                        $statement->bindValue(':id_usuario_cliente', $user_id, \PDO::PARAM_STR);
                        $statement->bindValue(':id_compra', $id_compra, \PDO::PARAM_STR);
                        $statement->bindValue(':sala', $sala, \PDO::PARAM_STR);
                        $statement->bindValue(':precio', $totalP, \PDO::PARAM_STR);
                        $statement->bindValue(':tipo', $tipo, \PDO::PARAM_STR);
                        $statement->bindValue(':usuario_creacion', $user_id, \PDO::PARAM_STR);
                        $statement->execute();
                        $id_ticket=$db->lastInsertId();
                        if ($id_promocion!=0) {
                          $sql = "INSERT INTO teatro.tsa_ticket_promocion (id_promocion,id_ticket,descuento,usuario_creacion)
                          VALUES (:id_promocion,:id_ticket,:descuento,:usuario_creacion)";
                          $statement = $db->prepare($sql);
                          $statement->bindValue(':id_promocion', $id_promocion, \PDO::PARAM_STR);
                          $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                          $statement->bindValue(':descuento', $descuentoP, \PDO::PARAM_STR);
                          $statement->bindValue(':usuario_creacion', $user_id, \PDO::PARAM_STR);
                          $statement->execute();
                        }

                      }
                  } catch(\PDOException $th) {
                      $this->rembolso($id_transacion);
                      $sql = "DELETE FROM teatro.tsa_ticket_promocion WHERE id_ticket=:id_ticket";
                      $statement = $db->prepare($sql);
                      $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                      $statement->execute();
                      $sql = "DELETE FROM teatro.tsa_ticket WHERE id_ticket=:id_ticket";
                      $statement = $db->prepare($sql);
                      $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                      $statement->execute();
                      foreach($lista3 as $llave => $valo) {
                        $sql = "DELETE FROM teatro.tsa_ticket_asiento WHERE id_ticket=:id_ticket";
                        $statement = $db->prepare($sql);
                        $statement->bindValue(':id_ticket', $valo, \PDO::PARAM_STR);
                        $statement->execute();
                        $sql = "DELETE FROM teatro.tsa_ticket_promocion WHERE id_ticket=:id_ticket";
                        $statement = $db->prepare($sql);
                        $statement->bindValue(':id_ticket', $valo, \PDO::PARAM_STR);
                        $statement->execute();
                        $sql = "DELETE FROM teatro.tsa_ticket WHERE id_ticket=:id_ticket";
                        $statement = $db->prepare($sql);
                        $statement->bindValue(':id_ticket', $valo, \PDO::PARAM_STR);
                        $statement->execute();
                      }
                      foreach($lista as $llave => $valo) {
                        if ($valo[0]=="1") {
                          $sql = "UPDATE teatro.tsa_platea_funcion SET vendido=vendido-:cantidad WHERE id_platea=:id_platea and id_funcion=:id_funcion;";
                          $statement = $db->prepare($sql);
                          $statement->bindValue(':cantidad', $valo[1], \PDO::PARAM_STR);
                          $statement->bindValue(':id_funcion', $valo[2], \PDO::PARAM_STR);
                          $statement->bindValue(':id_platea',$valo[3], \PDO::PARAM_STR);
                          $statement->execute();
                        }
                        if ($valo[0]=="2") {
                          $sql = "UPDATE teatro.tsa_distribucion SET estado='E' WHERE id_distribucion=:id_distribucion";
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
                      $sql = "DELETE FROM teatro.tsa_compra WHERE id_compra=:id_compra";
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
                              $sql = "INSERT INTO teatro.tsa_ticket_asiento (id_ticket,asiento,precio,usuario_creacion,id_platea)
                              VALUES (:id_ticket,:asiento,:precio,:usuario_creacion,:id_platea)";
                              $statement = $db->prepare($sql);
                              $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                              $statement->bindValue(':asiento', $cantidad, \PDO::PARAM_STR);
                              $statement->bindValue(':precio',   $precio, \PDO::PARAM_STR);
                              $statement->bindValue(':id_platea', $id_platea, \PDO::PARAM_STR);
                              $statement->bindValue(':usuario_creacion', $user_id, \PDO::PARAM_STR);
                              $statement->execute();

                              $sql = "UPDATE teatro.tsa_platea_funcion SET vendido=vendido+:cantidad WHERE id_platea=:id_platea and id_funcion=:id_funcion;";
                              $statement = $db->prepare($sql);
                              $statement->bindValue(':cantidad', $cantidad, \PDO::PARAM_STR);
                              $statement->bindValue(':id_funcion', $id_funcion, \PDO::PARAM_STR);
                              $statement->bindValue(':id_platea', $id_platea, \PDO::PARAM_STR);
                              $statement->execute();
                              $lista[]= array("1", $cantidad,$id_funcion,$id_platea);
                              $lista3[]= $id_ticket;
                            }else{
                              $this->rembolso($id_transacion);
                              $sql = "DELETE FROM teatro.tsa_ticket_asiento WHERE id_ticket=:id_ticket";
                              $statement = $db->prepare($sql);
                              $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                              $statement->execute();
                              $sql = "DELETE FROM teatro.tsa_ticket_promocion WHERE id_ticket=:id_ticket";
                              $statement = $db->prepare($sql);
                              $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                              $statement->execute();
                              $sql = "DELETE FROM teatro.tsa_ticket WHERE id_ticket=:id_ticket";
                              $statement = $db->prepare($sql);
                              $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                              $statement->execute();
                              $sql = "DELETE FROM teatro.tsa_compra WHERE id_compra=:id_compra";
                              $statement = $db->prepare($sql);
                              $statement->bindValue(':id_compra', $id_compra, \PDO::PARAM_STR);
                              $statement->execute();
                              foreach($lista as $llave => $valo) {
                                if ($valo[0]=="1") {
                                  $sql = "UPDATE teatro.tsa_platea_funcion SET vendido=vendido-:cantidad WHERE id_platea=:id_platea and id_funcion=:id_funcion;";
                                  $statement = $db->prepare($sql);
                                  $statement->bindValue(':cantidad', $valo[1], \PDO::PARAM_STR);
                                  $statement->bindValue(':id_funcion', $valo[2], \PDO::PARAM_STR);
                                  $statement->bindValue(':id_platea',$valo[3], \PDO::PARAM_STR);
                                  $statement->execute();
                                }
                                if ($valo[0]=="2") {
                                  $sql = "UPDATE teatro.tsa_distribucion SET estado='E' WHERE id_distribucion=:id_distribucion";
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
                                  $sql = "UPDATE tsa_bloqueo_cantidad set fecha_creacion=now() WHERE id_bloqueo_asiento=:id_bloqueo_asiento";
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
                            $sql = "DELETE FROM teatro.tsa_ticket_asiento WHERE id_ticket=:id_ticket";
                            $statement = $db->prepare($sql);
                            $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                            $statement->execute();
                            $sql = "DELETE FROM teatro.tsa_ticket_promocion WHERE id_ticket=:id_ticket";
                            $statement = $db->prepare($sql);
                            $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                            $statement->execute();
                            $sql = "DELETE FROM teatro.tsa_ticket WHERE id_ticket=:id_ticket";
                            $statement = $db->prepare($sql);
                            $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                            $statement->execute();
                            $sql = "DELETE FROM teatro.tsa_compra WHERE id_compra=:id_compra";
                            $statement = $db->prepare($sql);
                            $statement->bindValue(':id_compra', $id_compra, \PDO::PARAM_STR);
                            $statement->execute();
                            foreach($lista as $llave => $valo) {
                              if ($valo[0]=="1") {
                                $sql = "UPDATE teatro.tsa_platea_funcion SET vendido=vendido-:cantidad WHERE id_platea=:id_platea and id_funcion=:id_funcion;";
                                $statement = $db->prepare($sql);
                                $statement->bindValue(':cantidad', $valo[1], \PDO::PARAM_STR);
                                $statement->bindValue(':id_funcion', $valo[2], \PDO::PARAM_STR);
                                $statement->bindValue(':id_platea',$valo[3], \PDO::PARAM_STR);
                                $statement->execute();
                              }
                              if ($valo[0]=="2") {
                                $sql = "UPDATE teatro.tsa_distribucion SET estado='E' WHERE id_distribucion=:id_distribucion";
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
                                $sql = "UPDATE tsa_bloqueo_cantidad set fecha_creacion=now() WHERE id_bloqueo_asiento=:id_bloqueo_asiento";
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
                            $sql = "INSERT INTO teatro.tsa_ticket_asiento (id_ticket,asiento,precio,usuario_creacion,id_platea)
                            VALUES (:id_ticket,:asiento,:precio,:usuario_creacion,:id_platea)";
                            $statement = $db->prepare($sql);
                            $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                            $statement->bindValue(':asiento', $asiento, \PDO::PARAM_STR);
                            $statement->bindValue(':precio',  $precio, \PDO::PARAM_STR);
                            $statement->bindValue(':id_platea', $id_platea, \PDO::PARAM_STR);
                            $statement->bindValue(':usuario_creacion', $user_id, \PDO::PARAM_STR);
                            $statement->execute();
                            $sql = "UPDATE teatro.tsa_distribucion SET estado='V' WHERE id_distribucion=:id_distribucion";
                            $statement = $db->prepare($sql);
                            $statement->bindValue(':id_distribucion', $id_asiento, \PDO::PARAM_STR);
                            $statement->execute();
                            $lista[]= array("2", $id_asiento,$id_funcion,$id_platea);
                              $lista3[]= $id_ticket;
                          }else{
                            $this->rembolso($id_transacion);
                            $sql = "DELETE FROM teatro.tsa_ticket_asiento WHERE id_ticket=:id_ticket";
                            $statement = $db->prepare($sql);
                            $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                            $statement->execute();
                            $sql = "DELETE FROM teatro.tsa_ticket_promocion WHERE id_ticket=:id_ticket";
                            $statement = $db->prepare($sql);
                            $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                            $statement->execute();
                            $sql = "DELETE FROM teatro.tsa_ticket WHERE id_ticket=:id_ticket";
                            $statement = $db->prepare($sql);
                            $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                            $statement->execute();
                            $sql = "DELETE FROM teatro.tsa_compra WHERE id_compra=:id_compra";
                            $statement = $db->prepare($sql);
                            $statement->bindValue(':id_compra', $id_compra, \PDO::PARAM_STR);
                            $statement->execute();
                            foreach($lista as $llave => $valo) {
                              if ($valo[0]=="1") {
                                $sql = "UPDATE teatro.tsa_platea_funcion SET vendido=vendido-:cantidad WHERE id_platea=:id_platea and id_funcion=:id_funcion;";
                                $statement = $db->prepare($sql);
                                $statement->bindValue(':cantidad', $valo[1], \PDO::PARAM_STR);
                                $statement->bindValue(':id_funcion', $valo[2], \PDO::PARAM_STR);
                                $statement->bindValue(':id_platea',$valo[3], \PDO::PARAM_STR);
                                $statement->execute();
                              }
                              if ($valo[0]=="2") {
                                $sql = "UPDATE teatro.tsa_distribucion SET estado='E' WHERE id_distribucion=:id_distribucion";
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
                                $sql = "UPDATE tsa_bloqueo_cantidad set fecha_creacion=now() WHERE id_bloqueo_asiento=:id_bloqueo_asiento";
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
                            $sql = "DELETE FROM teatro.tsa_ticket_asiento WHERE id_ticket=:id_ticket";
                            $statement = $db->prepare($sql);
                            $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                            $statement->execute();
                            $sql = "DELETE FROM teatro.tsa_ticket_promocion WHERE id_ticket=:id_ticket";
                            $statement = $db->prepare($sql);
                            $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                            $statement->execute();
                            $sql = "DELETE FROM teatro.tsa_ticket WHERE id_ticket=:id_ticket";
                            $statement = $db->prepare($sql);
                            $statement->bindValue(':id_ticket', $id_ticket, \PDO::PARAM_STR);
                            $statement->execute();
                            $sql = "DELETE FROM teatro.tsa_compra WHERE id_compra=:id_compra";
                            $statement = $db->prepare($sql);
                            $statement->bindValue(':id_compra', $id_compra, \PDO::PARAM_STR);
                            $statement->execute();
                            foreach($lista as $llave => $valo) {
                              if ($valo[0]=="1") {
                                $sql = "UPDATE teatro.tsa_platea_funcion SET vendido=vendido-:cantidad WHERE id_platea=:id_platea and id_funcion=:id_funcion;";
                                $statement = $db->prepare($sql);
                                $statement->bindValue(':cantidad', $valo[1], \PDO::PARAM_STR);
                                $statement->bindValue(':id_funcion', $valo[2], \PDO::PARAM_STR);
                                $statement->bindValue(':id_platea',$valo[3], \PDO::PARAM_STR);
                                $statement->execute();
                              }
                              if ($valo[0]=="2") {
                                $sql = "UPDATE teatro.tsa_distribucion SET estado='E' WHERE id_distribucion=:id_distribucion";
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
                                $sql = "UPDATE tsa_bloqueo_cantidad set fecha_creacion=now() WHERE id_bloqueo_asiento=:id_bloqueo_asiento";
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
          foreach($lista3 as $llave => $valores) {
            if (!in_array($valores, $lista4)) {
              $sql = "SELECT te.*, tt.precio ,tt.sala, tf.fecha, tt.id_ticket, tta.asiento,tt.estado as estado_ticket FROM tsa_ticket tt
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
              $ruta= "http://104.198.222.134/imagenes/evento/";
              while($item = $statement->fetch()){
                if (!in_array($item->id_ticket, $tickets)) {
                    $ticket[$item->id_ticket]= array('id_ticket'=> $item->id_ticket, 'nombre'=> $item->nombre, 'duracion'=> $item->duracion, 'imagen'=> $ruta_evento.$item->id_evento."V.png",
                     'tipo'=> $item->tipo,'sala'=> $item->sala,'precio'=> $item->precio,'fecha'=> $item->fecha,'estado'=> $item->estado_ticket,'qr'=>"codigo_graficar");
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

}
