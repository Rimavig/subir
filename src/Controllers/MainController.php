<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Firebase\JWT\JWT;


class MainController extends BaseController
{
    const KEY_CONST = "RimavigHotm@il003";



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

    public function getUsuarios($request, $response, $args){
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
        //Realizo consulta de puertas a DB
        $sql = "SELECT * FROM usuarios";
        $statement = $db->prepare($sql);
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
        while($item = $statement->fetch()){
            $puertas['usuarios'][] = array('nombres'=> $item->nombres, 'usuario'=> $item->usuario, 'email'=> $item->email, 'clave'=> $item->password, 'celular'=> $item->celular, 'cedula'=> $item->cedula, 'estado'=> $item->estado);
        }
        $response = $response->withHeader('Content-Type', 'application/json');
        $response->getBody()->write(json_encode($puertas));
        return $response;

    }

    public function getUsuario($request, $response, $args){
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
        if (!(isset($body["usuario"]) && isset($body['password']))){
            return $response->withStatus(400);
        }
        $usuario = trim($body['usuario']);
        $password = trim($body['password']);

        if (strstr($usuario,'@') !== false){
              $sql = "SELECT * FROM usuarios WHERE email= :usuario";
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
          return $response->withStatus(500);
        }else{
            if ($item){
                if ($item->password == $password) {
                    $response->getBody()->write(json_encode($item));
                }else{
                  $out["status"] = "Contraseña Incorrecta";
                  $response->getBody()->write(json_encode($out));
                  return $response->withStatus(500);
                }
            }
        }
        return $response;
    }

    public function getTiendas($request, $response, $args){
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
        //Realizo consulta de puertas a DB
        $sql = "SELECT * FROM tiendas";
        $statement = $db->prepare($sql);
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
        while($item = $statement->fetch()){
            $puertas['tiendas'][] = array('nombre'=> $item->nombre, 'descripcion'=> $item->descripcion, 'width'=> $item->image_width, 'height'=> $item->image_height, 'rute'=> 'http://35.192.70.196/subir/imagen/Tiendas/'.$item->rute, 'estado'=> $item->estado);
        }
        $response = $response->withHeader('Content-Type', 'application/json');
        $response->getBody()->write(json_encode($puertas));
        return $response;

    }

    public function getTienda($request, $response, $args){
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
        if (!(isset($body["tienda"]))){
            return $response->withStatus(400);
        }
        $tienda = trim($body['tienda']);
        $sql = "SELECT * FROM tiendas WHERE nombre= :tienda";
        $statement = $db->prepare($sql);
        $statement->bindValue(':tienda', $tienda, \PDO::PARAM_STR);
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
          $out["status"] = "Tienda No existe";
          $response->getBody()->write(json_encode($out));
          return $response->withStatus(500);
        }else{
          $response->getBody()->write(json_encode($item));
        }
        return $response;
    }

    public function getCategoria($request, $response, $args){
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
        if (!(isset($body["id_tienda"]))){
            return $response->withStatus(400);
        }
        $tienda = trim($body['id_tienda']);
        //$sql = "SELECT c2.* FROM categorias c2 INNER JOIN  tiendas t2 ON c2.id_tienda =t2.id and t2.nombre =:tienda";
        $sql = "SELECT * FROM categorias where  id_tienda =:tienda";
        $statement = $db->prepare($sql);
        $statement->bindValue(':tienda', $tienda, \PDO::PARAM_STR);
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
        $band=true;
        while($item = $statement->fetch()){
          $band=false;
          $puertas['categorias'][] = array('nombre'=> $item->nombre, 'tienda'=> $body['id_tienda'], 'width'=> $item->image_width, 'height'=> $item->image_height, 'rute'=> 'http://35.192.70.196/subir/imagen/iconosCategorias/'.$item->rute, 'estado'=> $item->estado);
        }


       if ($band) {
         $out["status"] = "Tienda No existe";
         $response->getBody()->write(json_encode($out));
         return $response->withStatus(500);
       }else{
           $response->getBody()->write(json_encode($puertas));
       }

        return $response;
    }

    public function getOfertas($request, $response, $args){
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
        //Realizo consulta de puertas a DB
        $sql = "SELECT * FROM ofertas";
        $statement = $db->prepare($sql);
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
        while($item = $statement->fetch()){
            $puertas['Ofertas'][] = array( 'id_categoria'=> $item->id_categoria, 'estado'=> $item->estado);
        }
        $response = $response->withHeader('Content-Type', 'application/json');
        $response->getBody()->write(json_encode($puertas));
        return $response;

    }

    public function getProductos($request, $response, $args){
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
        if (!(isset($body["id_categoria"]) )){
            return $response->withStatus(400);
        }

        $categoria = trim($body['id_categoria']);
        $sql = "SELECT * FROM  productos where id_categoria=:categoria";
        $statement = $db->prepare($sql);
        $statement->bindValue(':categoria', $categoria, \PDO::PARAM_STR);
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
        $band=true;
        while($item = $statement->fetch()){
          $band=false;
          $puertas['productos'][] = array('nombre'=> $item->nombre, 'descripcion'=> $item->descripcion, 'peso'=> $item->peso,'precio_oficial'=> $item->precio_oficial,'precio_oferta'=> $item->precio_oferta, 'width'=> $item->image_width,
          'height'=> $item->image_height,'descuento'=> $item->descuento, 'rute'=> 'http://35.192.70.196/subir/imagen/Productos/'.$item->rute, 'calificacion'=> $item->calificacion);
        }
       if ($band) {
         $out["status"] = "No existen productos en la categoria ingresada";
         $response->getBody()->write(json_encode($out));
         return $response->withStatus(500);
       }else{
           $response->getBody()->write(json_encode($puertas));
       }

        return $response;
    }

    public function agregarUsuario($request, $response, $args){
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
        // Validacion de Body
        $json = $request->getBody();
        $body = json_decode($json, true);
        if (!(isset($body["nombres"]) && isset($body['usuario']) && isset($body['email']) && isset($body['password']))){
            return $response->withStatus(400);
        }

        //Realizo consulta de tiendas a DB
        $sql = "SELECT * FROM usuarios WHERE usuario= :usuario OR email =:email" ;
        $statement = $db->prepare($sql);
        $statement->bindValue(':usuario', $body["usuario"], \PDO::PARAM_STR);
        $statement->bindValue(':email', $body["email"], \PDO::PARAM_STR);
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
        $item = $statement->fetch();
        if($item !=false){
          $response = $response->withHeader('Content-Type', 'application/json');
          if ($item->usuario==$body["usuario"] && $item->email==$body["email"] ) {
            $out["status"] = 'El usuario y correo ya estan registrados';
          }else if ($item->usuario==$body["usuario"]) {
            $out["status"] = 'El usuario ya esta registrado';
          }else{
            $out["status"] = 'El correo ya esta registrado';
          }
          $response->getBody()->write(json_encode($out));
          return $response->withStatus(500);
        }


        // FIN Validacion
        $sql = "INSERT INTO usuarios (`nombres`, `usuario`, `email`, `password`,`fecha_creacion`) VALUES (:nombres, :usuario, :email, :password, now())";
        $statement = $db->prepare($sql);
        $statement->bindValue(':nombres',  $body["nombres"], \PDO::PARAM_STR);
        $statement->bindValue(':usuario',  $body["usuario"], \PDO::PARAM_STR);
        $statement->bindValue(':email',  $body["email"], \PDO::PARAM_STR);
        $statement->bindValue(':password',  $body["password"], \PDO::PARAM_STR);
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
        $out["status"] = 'Operación realizada OK';
        $response->getBody()->write(json_encode($out));

        return $response;

    }

    public function agregarTienda($request, $response, $args){
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
        // Validacion de Body
        $json = $request->getBody();
        $body = json_decode($json, true);
        if (!(isset($body["nombre"]) && isset($body['descripcion']) && isset($body['width']) && isset($body['height']))){
            return $response->withStatus(400);
        }
        // FIN Validacion
        //Realizo consulta de tiendas a DB
        $sql = "SELECT * FROM tiendas WHERE nombre=:nombre" ;
        $statement = $db->prepare($sql);
        $statement->bindValue(':nombre', $body["nombre"], \PDO::PARAM_STR);
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
        $item = $statement->fetch();
        if($item !=false){
          $response = $response->withHeader('Content-Type', 'application/json');
          $out["status"] = 'La Tienda ya existe';
          $response->getBody()->write(json_encode($out));
          return $response->withStatus(500);
        }


        $sql = "INSERT INTO tiendas (`nombre`, `descripcion`, `image_width`, `image_height`,`fecha_creacion`) VALUES (:nombre, :descripcion, :width, :height, now())";
        $statement = $db->prepare($sql);
        $statement->bindValue(':nombre',  $body["nombre"], \PDO::PARAM_STR);
        $statement->bindValue(':descripcion',  $body["descripcion"], \PDO::PARAM_STR);
        $statement->bindValue(':width',  $body["width"], \PDO::PARAM_STR);
        $statement->bindValue(':height',  $body["height"], \PDO::PARAM_STR);
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
        $out["status"] = 'Operación realizada OK';
        $response->getBody()->write(json_encode($out));

        return $response;

    }

    public function agregarCategoria($request, $response, $args){
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
        // Validacion de Body
        $json = $request->getBody();
        $body = json_decode($json, true);
        if (!(isset($body["nombre"]) && isset($body['tienda']) && isset($body['width']) && isset($body['height']))){
            return $response->withStatus(400);
        }
        // FIN Validacion
        $id_tienda = "";
        //Realizo consulta de tiendas a DB
        $sql = "SELECT * FROM tiendas WHERE nombre= :nombre";
        $statement = $db->prepare($sql);
        $statement->bindValue(':nombre', $body["tienda"], \PDO::PARAM_STR);
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
        $item = $statement->fetch();
        if($item==false){
          $response = $response->withHeader('Content-Type', 'application/json');
          $out["status"] = 'Tienda No existe';
          $response->getBody()->write(json_encode($out));
          return $response->withStatus(500);
        }else{
          if ($item->nombre===$body["tienda"]) {
            $id_tienda = $item->id;
          }
        }
        $sql = "INSERT INTO categorias (`nombre`, `id_tienda`, `image_width`, `image_height`,`fecha_creacion`) VALUES (:nombre, :id_tienda, :width, :height, now())";
        $statement = $db->prepare($sql);
        $statement->bindValue(':nombre',  $body["nombre"], \PDO::PARAM_STR);
        $statement->bindValue(':id_tienda', $id_tienda, \PDO::PARAM_STR);
        $statement->bindValue(':width',  $body["width"], \PDO::PARAM_STR);
        $statement->bindValue(':height',  $body["height"], \PDO::PARAM_STR);
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
        $out["status"] = 'Operación realizada OK';
        $response->getBody()->write(json_encode($out));

        return $response;

    }

    public function agregarOfertas($request, $response, $args){
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
        // Validacion de Body
        $json = $request->getBody();
        $body = json_decode($json, true);
        if (!(isset($body["id_categoria"]))){
            return $response->withStatus(400);
        }

        $sql = "INSERT INTO ofertas (`id_categoria`,`fecha_creacion`) VALUES (:id_categoria, now())";
        $statement = $db->prepare($sql);
        $statement->bindValue(':id_categoria',  $body["id_categoria"], \PDO::PARAM_STR);

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
        $out["status"] = 'Operación realizada OK';
        $response->getBody()->write(json_encode($out));

        return $response;

    }

    public function agregarProducto($request, $response, $args){
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
        // Validacion de Body
        $json = $request->getBody();
        $body = json_decode($json, true);
        if (!(isset($body["nombre"]) && isset($body['descripcion']) && isset($body['precio_oficial']) && isset($body['width']) && isset($body['height']) && isset($body['id_categoria']) && isset($body['id_oferta']))){
            return $response->withStatus(400);
        }

        $sql = "INSERT INTO productos (`nombre`,`descripcion`,`precio_oficial`,`image_width`,`image_height`,`id_categoria`,`id_oferta`) VALUES (:nombre, :descripcion, :precio_oficial, :width, :height, :id_categoria, :id_oferta)";
        $statement = $db->prepare($sql);
        $statement->bindValue(':nombre',  $body["nombre"], \PDO::PARAM_STR);
        $statement->bindValue(':descripcion',  $body["descripcion"], \PDO::PARAM_STR);
        $statement->bindValue(':precio_oficial',  $body["precio_oficial"], \PDO::PARAM_STR);
        $statement->bindValue(':width',  $body["width"], \PDO::PARAM_STR);
        $statement->bindValue(':height',  $body["height"], \PDO::PARAM_STR);
        $statement->bindValue(':id_categoria',  $body["id_categoria"], \PDO::PARAM_STR);
        $statement->bindValue(':id_oferta',  $body["id_oferta"], \PDO::PARAM_STR);

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
        $out["status"] = 'Operación realizada OK';
        $response->getBody()->write(json_encode($out));

        return $response;

    }

    public function updateUsuario($request, $response, $args){
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
        // Validacion de Body
        $json = $request->getBody();
        $body = json_decode($json, true);
        if (!(isset($body["id_cita"]) && isset($body['id']) && isset($body['fecha_cita']) && isset($body['id_puerta']))){
            return $response->withStatus(400);
        }
        $id_paciente = trim($body['id']);
        $id_cita = trim($body['id_cita']);
        $id_puerta = trim($body['id_puerta']);
        //Realizo consulta de puertas a DB
        $sql = "SELECT * FROM info_puertas_principales WHERE id_puerta= :id_puerta";
        $statement = $db->prepare($sql);
        $statement->bindValue(':id_puerta', $id_puerta, \PDO::PARAM_STR);
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
        if(count($statement->fetchAll())==0){
            //puerta invalida
            return $response->withStatus(400);
        }
        // FIN Validacion
        $sql = "UPDATE acceso_main SET status='A', id_puerta=:id_puerta WHERE id_paciente = :id_paciente and id_cita = :id_cita";
        $statement = $db->prepare($sql);
        $statement->bindValue(':id_cita', $id_cita, \PDO::PARAM_STR);
        $statement->bindValue(':id_paciente', $id_paciente, \PDO::PARAM_STR);
        $statement->bindValue(':id_puerta', $id_puerta, \PDO::PARAM_STR);
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
        $out["status"] = 'Operación realizada OK';
        $response->getBody()->write(json_encode($out));
        return $response;

    }

    public function deleteCita($request, $response, $args){
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
        // Validacion de Body
        $json = $request->getBody();
        $body = json_decode($json, true);
        if (!(isset($body["id_cita"]))){
            return $response->withStatus(400);
        }
        $id_cita = trim($body['id_cita']);
        //Realizo consulta de cita a DB
        $sql = "SELECT * FROM acceso_main WHERE id_cita= :id_cita AND status in ('A', 'P')"; // solo se puede eliminar citas no atendidas
        $statement = $db->prepare($sql);
        $statement->bindValue(':id_cita', $id_cita, \PDO::PARAM_STR);
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
        if(count($statement->fetchAll())==0){
            //puerta invalida
            return $response->withStatus(400);
        }
        // FIN Validacion
        $sql = "DELETE FROM acceso_main WHERE id_cita = :id_cita";
        $statement = $db->prepare($sql);
        $statement->bindValue(':id_cita', $id_cita, \PDO::PARAM_STR);
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
        $out["status"] = 'Operación realizada OK';
        $response->getBody()->write(json_encode($out));
        return $response;

    }


}
