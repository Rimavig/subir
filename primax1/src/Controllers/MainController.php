<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Firebase\JWT\JWT;


class MainController extends BaseController
{
    const KEY_CONST = "RimavigHotm@il003";

//eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJkYXRhIjp7InVzZXJJZCI6InJpbWF2aWcifX0.JthJwA5FaqTSGn3yYurhKOhG8hIiY70QOVhR2d5dwL4
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

    public function getTanquesEco($request, $response, $args){
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
          $response = $response->withHeader('Content-Type', 'application/json');
        // FIN VALIDACION
        //Realizo consulta de puertas a DB
        $sql = "SELECT * FROM primax.tanque_eco where id_tanque ='1'";
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
          $sql1 = "SELECT i.*,s.Nombres as sucursal ,p.nombre as provincia,ba.nombre FROM ingreso_tanque_diario_eco i INNER JOIN  tanque_eco ba ON i.id_tanque=ba.id INNER JOIN tanque_eco_total e ON ba.id_tanque =e.id INNER JOIN sucursal s ON e.id_sucursal =s.id INNER JOIN  Provincia p ON s.id_provincia =p.id and s.id ='1' and i.id_tanque =:tanque";
          $statement1 = $db->prepare($sql1);
          $statement1->bindValue(':tanque', $item->id, \PDO::PARAM_STR);

          try {
              $result = $statement1->execute();
          } catch (\PDOException $th) {
              $result = false;
              $errocode = $th->getCode();
              $response = $response->withHeader('Content-Type', 'application/json');
              $out["status"] = "ErrorServerCode: $errocode";
              $response->getBody()->write(json_encode($out));
              return $response->withStatus(500);
          }
          while($item1 = $statement1->fetch()){
              //$response->getBody()->write(json_encode($item1));
              $puertas[$item->nombre][] = array('id'=> $item1->id, 'fecha'=> $item1->fecha, 'capacidad'=> $item1->capacidad, 'sucursal'=> $item1->sucursal, 'provincia'=> $item1->provincia, 'nombre'=> $item1->nombre);
          }
        }

        $response->getBody()->write(json_encode($puertas));
        return $response;
    }

    public function getTanquesSuper($request, $response, $args){
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
          $response = $response->withHeader('Content-Type', 'application/json');
        // FIN VALIDACION
        //Realizo consulta de puertas a DB
        $sql = "SELECT * FROM primax.tanque_super where id_tanque ='1'";
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
          $sql1 = "SELECT i.*,s.Nombres as sucursal ,p.nombre as provincia,ba.nombre FROM ingreso_tanque_diario_super i INNER JOIN  tanque_super ba ON i.id_tanque=ba.id INNER JOIN tanque_super_total e ON ba.id_tanque =e.id INNER JOIN sucursal s ON e.id_sucursal =s.id INNER JOIN  Provincia p ON s.id_provincia =p.id and s.id ='1' and i.id_tanque =:tanque";
          $statement1 = $db->prepare($sql1);
          $statement1->bindValue(':tanque', $item->id, \PDO::PARAM_STR);

          try {
              $result = $statement1->execute();
          } catch (\PDOException $th) {
              $result = false;
              $errocode = $th->getCode();
              $response = $response->withHeader('Content-Type', 'application/json');
              $out["status"] = "ErrorServerCode: $errocode";
              $response->getBody()->write(json_encode($out));
              return $response->withStatus(500);
          }
          while($item1 = $statement1->fetch()){
              //$response->getBody()->write(json_encode($item1));
              $puertas[$item->nombre][] = array('id'=> $item1->id, 'fecha'=> $item1->fecha, 'capacidad'=> $item1->capacidad, 'sucursal'=> $item1->sucursal, 'provincia'=> $item1->provincia, 'nombre'=> $item1->nombre);
          }
        }

        $response->getBody()->write(json_encode($puertas));
        return $response;
    }

    public function getTanquesDiesel($request, $response, $args){
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
          $response = $response->withHeader('Content-Type', 'application/json');
        // FIN VALIDACION
        //Realizo consulta de puertas a DB
        $sql = "SELECT * FROM primax.tanque_diesel where id_tanque ='1'";
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
          $sql1 = "SELECT i.*,s.Nombres as sucursal ,p.nombre as provincia,ba.nombre FROM ingreso_tanque_diario_diesel i INNER JOIN  tanque_diesel ba ON i.id_tanque=ba.id INNER JOIN tanque_diesel_total e ON ba.id_tanque =e.id INNER JOIN sucursal s ON e.id_sucursal =s.id INNER JOIN  Provincia p ON s.id_provincia =p.id and s.id ='1' and i.id_tanque =:tanque";
          $statement1 = $db->prepare($sql1);
          $statement1->bindValue(':tanque', $item->id, \PDO::PARAM_STR);

          try {
              $result = $statement1->execute();
          } catch (\PDOException $th) {
              $result = false;
              $errocode = $th->getCode();
              $response = $response->withHeader('Content-Type', 'application/json');
              $out["status"] = "ErrorServerCode: $errocode";
              $response->getBody()->write(json_encode($out));
              return $response->withStatus(500);
          }
          while($item1 = $statement1->fetch()){
              //$response->getBody()->write(json_encode($item1));
              $puertas[$item->nombre][] = array('id'=> $item1->id, 'fecha'=> $item1->fecha, 'capacidad'=> $item1->capacidad, 'sucursal'=> $item1->sucursal, 'provincia'=> $item1->provincia, 'nombre'=> $item1->nombre);
          }
        }

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
          return $response;
        }else{
            if ($item){
                if ($item->password == $password) {
                    $response->getBody()->write(json_encode($item));
                }else{
                  $out["status"] = "Contraseña Incorrecta";
                  $response->getBody()->write(json_encode($out));
                  return $response;
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
      $band=false;
      $json = $request->getBody();
      $body = json_decode($json, true);
      if (!(isset($body['ciudad']))){
          return $response->withStatus(400);
      }
      $ciudad = trim($body['ciudad']);
      $sql = "SELECT *, c2.id  AS id_tienda FROM tiendas c2 INNER JOIN  ofertas_tienda t2 ON c2.id_ofertas_tienda =t2.id and ciudad=:ciudad";
      $statement = $db->prepare($sql);
      $statement->bindValue(':ciudad', $body["ciudad"], \PDO::PARAM_STR);
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
          $band=true;
          $puertas['tiendas'][] = array('id'=> $item->id_tienda, 'nombre'=> $item->nombre, 'descripcion'=> $item->descripcion, 'width'=> $item->image_width, 'height'=> $item->image_height, 'latitud'=> $item->latitud, 'longitud'=> $item->longitud,
           'cantidad_ventas'=> $item->cantidad_ventas, 'calificacion'=> $item->calificacion ,  'rute'=> 'http://35.192.70.196/subir/imagen/Tiendas/'.$item->rute, 'estado'=> $item->estado,
        'descuento'=> $item->descuento,'tipo'=> $item->tipo);
      }
        $response = $response->withHeader('Content-Type', 'application/json');
      if ($band) {
        $response->getBody()->write(json_encode($puertas));
      }else{
        $out["status"] = "No existe tiendas en esa ciudad";
        $response->getBody()->write(json_encode($out));
      }

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
          return $response;
        }else{
          $response->getBody()->write(json_encode($item));
        }
        return $response;
    }

    public function getCategorias($request, $response, $args){
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
        $sql = "SELECT *, c2.id  AS id_categoria FROM categorias c2 INNER JOIN  ofertas_categoria t2 ON id_ofertas_categoria =t2.id AND c2.id_tienda=:tienda";
        //$sql = "SELECT * FROM categorias where  id_tienda =:tienda";
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
          $puertas['categorias'][] = array('id'=> $item->id_categoria, 'nombre'=> $item->nombre, 'tienda'=> $body['id_tienda'], 'width'=> $item->image_width, 'height'=> $item->image_height, 'rute'=> 'http://35.192.70.196/subir/imagen/iconosCategorias/'.$item->rute, 'estado'=> $item->estado,
           'descuento'=> $item->descuento,'tipo'=> $item->tipo);
        }


       if ($band) {
         $out["status"] = "Tienda No existe";
         $response->getBody()->write(json_encode($out));
         return $response;
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
        $sql = "SELECT * FROM ofertas_productos";
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
            $puertas['Ofertas'][] = array('id'=> $item->id, 'id_producto'=> $item ->id_producto, 'precio_oferta'=> $item->precio_oferta, 'descuento'=> $item->descuento,'tipo'=> $item->tipo, 'estado'=> $item->estado, 'ruta'=> $item->ruta);
        }
        $response = $response->withHeader('Content-Type', 'application/json');
        $response->getBody()->write(json_encode($puertas));
        return $response;

    }

    public function getTop10($request, $response, $args){
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
        $sql = "SELECT * FROM productos p2 ORDER BY calificacion DESC  LIMIT 10";
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
          $puertas['top10'][] = array( 'id'=> $item->id, 'nombre'=> $item->nombre, 'descripcion'=> $item->descripcion, 'peso'=> $item->peso,'precio_oficial'=> $item->precio_oficial,'cantidad'=> $item->cantidad, 'width'=> $item->image_width,
          'height'=> $item->image_height,'calificacion'=> $item->calificacion,'productos_vendidos'=> $item->productos_vendidos, 'rute'=> 'http://35.192.70.196/subir/imagen/Productos/'.$item->rute, 'calificacion'=> $item->calificacion);
        }
        $response = $response->withHeader('Content-Type', 'application/json');
        $response->getBody()->write(json_encode($puertas));
        return $response;

    }

    public function getTop10_vendidos($request, $response, $args){
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
        $sql = "SELECT * FROM productos p2 ORDER BY productos_vendidos DESC  LIMIT 10";
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
          $puertas['top10'][] = array('id'=> $item->id, 'nombre'=> $item->nombre, 'descripcion'=> $item->descripcion, 'peso'=> $item->peso,'precio_oficial'=> $item->precio_oficial,'cantidad'=> $item->cantidad, 'width'=> $item->image_width,
          'height'=> $item->image_height,'calificacion'=> $item->calificacion,'productos_vendidos'=> $item->productos_vendidos, 'rute'=> 'http://35.192.70.196/subir/imagen/Productos/'.$item->rute, 'calificacion'=> $item->calificacion);
        }
        $response = $response->withHeader('Content-Type', 'application/json');
        $response->getBody()->write(json_encode($puertas));
        return $response;

    }

    public function getTop10_tiendas($request, $response, $args){
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
        $sql = "SELECT *, c2.id  AS id_tienda FROM tiendas c2 INNER JOIN  ofertas_tienda t2 ON c2.id_ofertas_tienda =t2.id ORDER BY calificacion DESC  LIMIT 10";
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
          $puertas['tiendas'][] = array('id'=> $item->id_tienda, 'nombre'=> $item->nombre, 'descripcion'=> $item->descripcion, 'width'=> $item->image_width, 'height'=> $item->image_height, 'latitud'=> $item->latitud, 'longitud'=> $item->longitud,
           'cantidad_ventas'=> $item->cantidad_ventas, 'calificacion'=> $item->calificacion ,  'rute'=> 'http://35.192.70.196/subir/imagen/Tiendas/'.$item->rute, 'estado'=> $item->estado,
             'descuento'=> $item->descuento,'tipo'=> $item->tipo);
            }
        $response = $response->withHeader('Content-Type', 'application/json');
        $response->getBody()->write(json_encode($puertas));
        return $response;

    }

    public function getTop10_vendidos_tiendas($request, $response, $args){
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
        $sql = "SELECT *, c2.id  AS id_tienda FROM tiendas c2 INNER JOIN  ofertas_tienda t2 ON c2.id_ofertas_tienda =t2.id ORDER BY cantidad_ventas DESC  LIMIT 10";
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
          $puertas['tiendas'][] = array('id'=> $item->id_tienda, 'nombre'=> $item->nombre, 'descripcion'=> $item->descripcion, 'width'=> $item->image_width, 'height'=> $item->image_height, 'latitud'=> $item->latitud, 'longitud'=> $item->longitud,
           'cantidad_ventas'=> $item->cantidad_ventas, 'calificacion'=> $item->calificacion ,  'rute'=> 'http://35.192.70.196/subir/imagen/Tiendas/'.$item->rute, 'estado'=> $item->estado,
             'descuento'=> $item->descuento,'tipo'=> $item->tipo);
            }
        $response = $response->withHeader('Content-Type', 'application/json');
        $response->getBody()->write(json_encode($puertas));
        return $response;

    }

    public function getFavoritos($request, $response, $args){
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
        if (!(isset($body["id_usuario"]) )){
            return $response->withStatus(400);
        }
        //Realizo consulta de puertas a DB
        $id_usuario= trim($body['id_usuario']);
        $sql = "SELECT * FROM favoritos where id_usuario =:id_usuario";
        $statement = $db->prepare($sql);
        $statement->bindValue(':id_usuario', $id_usuario, \PDO::PARAM_STR);
          //Realizo consulta de puertas a DB
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
            $puertas['favoritos'][] = array('id'=> $item->id, 'id_producto'=> $item->id_producto);
          }
         if ($band) {
           $out["status"] = "Tienda No existe";
           $response->getBody()->write(json_encode($out));
           return $response;
         }else{
             $response->getBody()->write(json_encode($puertas));
         }
          return $response;

    }

    public function getFavoritos_tienda($request, $response, $args){
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
        if (!(isset($body["id_tienda"]) && isset($body['id_usuario']) )){
            return $response->withStatus(400);
        }

        $tienda = trim($body['id_tienda']);
        $usuario = trim($body['id_usuario']);

        $sql = "SELECT * FROM favoritos where id_usuario=:id_usuario ";
        $statement = $db->prepare($sql);
        $statement->bindValue(':id_usuario', $usuario, \PDO::PARAM_STR);
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
        $band1=true;
        $favoritos = array();
        while($item = $statement->fetch()){
          $band1=false;
          $favoritos[] = $item->id_producto;
        }
        $sql = "SELECT p2.*,t2.*, p2.id  AS id_producto FROM productos p2 INNER JOIN  ofertas_productos t2 ON id_oferta =t2.id INNER JOIN  categorias c2 ON c2.id =p2.id_categoria
               and c2.id_tienda=:tienda and id_oferta != '1'" ;
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
          $puertas['productos'][]="";
        while($item = $statement->fetch()){

          if ($band1) {

          }else{
            if (in_array($item->id_producto,$favoritos )) {
              $band=false;
              $puertas['productos'][] = array('id'=> $item->id_producto, 'nombre'=> $item->nombre, 'descripcion'=> $item->descripcion, 'peso'=> $item->peso,'precio_oficial'=> $item->precio_oficial,'cantidad'=> $item->cantidad, 'width'=> $item->image_width,
              'height'=> $item->image_height,'productos_vendidos'=> $item->productos_vendidos, 'rute'=> 'http://35.192.70.196/subir/imagen/Productos/'.$item->rute, 'calificacion'=> $item->calificacion,'favorito'=> 'true',  'precio_oferta'=> $item->precio_oferta
             , 'descuento'=> $item->descuento, 'tipo'=> $item->tipo);
           }
          }

        }
       if ($band) {
         $out["status"] = "No existen productos favoritos en la tienda ingresada";
         $response->getBody()->write(json_encode($out));
         return $response;
       }else{
           $response->getBody()->write(json_encode($puertas));
       }

        return $response;
    }

    public function getOfertas_producto($request, $response, $args){
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
        if (!(isset($body["id_oferta"]) )){
            return $response->withStatus(400);
        }
        //Realizo consulta de puertas a DB
        $id_oferta= trim($body['id_oferta']);
        $sql = "SELECT * FROM ofertas_productos where id =:id_oferta";
        $statement = $db->prepare($sql);
        $statement->bindValue(':id_oferta', $id_oferta, \PDO::PARAM_STR);
          //Realizo consulta de puertas a DB
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
            $puertas['Oferta'][] = array('id'=> $item->id, 'precio_oferta'=> $item->precio_oferta,'descuento'=> $item->descuento,'tipo'=> $item->tipo,'ruta'=> $item->ruta,'estado'=> $item->estado);
          }
         if ($band) {
           $out["status"] = "Tienda No existe";
           $response->getBody()->write(json_encode($out));
           return $response;
         }else{
             $response->getBody()->write(json_encode($puertas));
         }
          return $response;

    }

    public function getOfertas_categoria($request, $response, $args){
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
        if (!(isset($body["id_tienda"]) )){
            return $response->withStatus(400);
        }

        $categoria = trim($body['id_tienda']);
        $sql = "SELECT t2.*  FROM categorias c2 INNER JOIN  ofertas_categoria t2 ON c2.id =t2.id_categoria and c2.id_tienda =:categoria";
        $statement = $db->prepare($sql);
        $statement->bindValue(':categoria', $categoria, \PDO::PARAM_STR);

        //Realizo consulta de puertas a DB
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
         $puertas['Ofertas'][] = array('id'=> $item->id, 'id_categoria'=> $item->id_categoria,'descuento'=> $item->descuento,'ruta'=> $item->ruta,'tipo'=> $item->tipo,'estado'=> $item->estado);

       }
      if ($band) {
        $out["status"] = "Ninguna categoria tiene ofertas";
        $response->getBody()->write(json_encode($out));
        return $response;
      }else{
          $response->getBody()->write(json_encode($puertas));
      }
        return $response;

    }

    public function getOfertas_tienda($request, $response, $args){
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
        if (!(isset($body["id_tienda"]) )){
            return $response->withStatus(400);
        }

        $categoria = trim($body['id_tienda']);
        $sql = "SELECT *  FROM ofertas_tienda where id_tienda =:categoria";
        $statement = $db->prepare($sql);
        $statement->bindValue(':categoria', $categoria, \PDO::PARAM_STR);

        //Realizo consulta de puertas a DB
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
          $puertas['Ofertas'][] = array('id'=> $item->id, 'id_tienda'=> $item->id_tienda,'descuento'=> $item->descuento,'ruta'=> $item->ruta,'tipo'=> $item->tipo,'estado'=> $item->estado);

        }
       if ($band) {
         $out["status"] = "la tienda no tiene ofertas";
         $response->getBody()->write(json_encode($out));
         return $response;
       }else{
           $response->getBody()->write(json_encode($puertas));
       }
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
        if (!(isset($body["id_categoria"]) && isset($body['id_usuario']) )){
            return $response->withStatus(400);
        }

        $categoria = trim($body['id_categoria']);
        $usuario = trim($body['id_usuario']);

        $sql = "SELECT * FROM favoritos where id_usuario=:id_usuario ";
        $statement = $db->prepare($sql);
        $statement->bindValue(':id_usuario', $usuario, \PDO::PARAM_STR);
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
        $band1=true;
        $favoritos = array();
        while($item = $statement->fetch()){
          $band1=false;
          $favoritos[] = $item->id_producto;
        }
        $sql = "SELECT *, p2.id  AS id_producto FROM productos p2 INNER JOIN  ofertas_productos t2 ON id_oferta =t2.id and id_categoria=:categoria ";
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
          if ($band1) {
            $puertas['productos'][] = array('id'=> $item->id_producto, 'nombre'=> $item->nombre, 'descripcion'=> $item->descripcion, 'peso'=> $item->peso,'precio_oficial'=> $item->precio_oficial,'cantidad'=> $item->cantidad, 'width'=> $item->image_width,
            'height'=> $item->image_height,'productos_vendidos'=> $item->productos_vendidos, 'rute'=> 'http://35.192.70.196/subir/imagen/Productos/'.$item->rute, 'calificacion'=> $item->calificacion,'favorito'=> 'false',  'precio_oferta'=> $item->precio_oferta
          , 'descuento'=> $item->descuento, 'tipo'=> $item->tipo);
          }else{
            if (in_array($item->id_producto,$favoritos )) {
              $puertas['productos'][] = array('id'=> $item->id_producto, 'nombre'=> $item->nombre, 'descripcion'=> $item->descripcion, 'peso'=> $item->peso,'precio_oficial'=> $item->precio_oficial,'cantidad'=> $item->cantidad, 'width'=> $item->image_width,
              'height'=> $item->image_height,'productos_vendidos'=> $item->productos_vendidos, 'rute'=> 'http://35.192.70.196/subir/imagen/Productos/'.$item->rute, 'calificacion'=> $item->calificacion,'favorito'=> 'true',  'precio_oferta'=> $item->precio_oferta
             , 'descuento'=> $item->descuento, 'tipo'=> $item->tipo);
           }else{
             $puertas['productos'][] = array('id'=> $item->id_producto, 'nombre'=> $item->nombre, 'descripcion'=> $item->descripcion, 'peso'=> $item->peso,'precio_oficial'=> $item->precio_oficial,'cantidad'=> $item->cantidad, 'width'=> $item->image_width,
             'height'=> $item->image_height,'productos_vendidos'=> $item->productos_vendidos, 'rute'=> 'http://35.192.70.196/subir/imagen/Productos/'.$item->rute, 'calificacion'=> $item->calificacion,'favorito'=> 'false',  'precio_oferta'=> $item->precio_oferta
           , 'descuento'=> $item->descuento, 'tipo'=> $item->tipo);
           }
          }

        }
       if ($band) {
         $out["status"] = "No existen productos en la categoria ingresada";
         $response->getBody()->write(json_encode($out));
         return $response;
       }else{
           $response->getBody()->write(json_encode($puertas));
       }

        return $response;
    }

    public function getProductos_oferta($request, $response, $args){
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
        if (!(isset($body["id_tienda"]) && isset($body['id_usuario']) )){
            return $response->withStatus(400);
        }

        $tienda = trim($body['id_tienda']);
        $usuario = trim($body['id_usuario']);

        $sql = "SELECT * FROM favoritos where id_usuario=:id_usuario ";
        $statement = $db->prepare($sql);
        $statement->bindValue(':id_usuario', $usuario, \PDO::PARAM_STR);
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
        $band1=true;
        $favoritos = array();
        while($item = $statement->fetch()){
          $band1=false;
          $favoritos[] = $item->id_producto;
        }
        $sql = "SELECT p2.*,t2.*, p2.id  AS id_producto FROM productos p2 INNER JOIN  ofertas_productos t2 ON id_oferta =t2.id INNER JOIN  categorias c2 ON c2.id =p2.id_categoria
               and c2.id_tienda=:tienda and id_oferta != '1'" ;
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
          if ($band1) {
            $puertas['productos'][] = array('id'=> $item->id_producto, 'nombre'=> $item->nombre, 'descripcion'=> $item->descripcion, 'peso'=> $item->peso,'precio_oficial'=> $item->precio_oficial,'cantidad'=> $item->cantidad, 'width'=> $item->image_width,
            'height'=> $item->image_height,'productos_vendidos'=> $item->productos_vendidos, 'rute'=> 'http://35.192.70.196/subir/imagen/Productos/'.$item->rute, 'calificacion'=> $item->calificacion,'favorito'=> 'false',  'precio_oferta'=> $item->precio_oferta
          , 'descuento'=> $item->descuento, 'tipo'=> $item->tipo);
          }else{
            if (in_array($item->id_producto,$favoritos )) {
              $puertas['productos'][] = array('id'=> $item->id_producto, 'nombre'=> $item->nombre, 'descripcion'=> $item->descripcion, 'peso'=> $item->peso,'precio_oficial'=> $item->precio_oficial,'cantidad'=> $item->cantidad, 'width'=> $item->image_width,
              'height'=> $item->image_height,'productos_vendidos'=> $item->productos_vendidos, 'rute'=> 'http://35.192.70.196/subir/imagen/Productos/'.$item->rute, 'calificacion'=> $item->calificacion,'favorito'=> 'true',  'precio_oferta'=> $item->precio_oferta
             , 'descuento'=> $item->descuento, 'tipo'=> $item->tipo);
           }else{
             $puertas['productos'][] = array('id'=> $item->id_producto, 'nombre'=> $item->nombre, 'descripcion'=> $item->descripcion, 'peso'=> $item->peso,'precio_oficial'=> $item->precio_oficial,'cantidad'=> $item->cantidad, 'width'=> $item->image_width,
             'height'=> $item->image_height,'productos_vendidos'=> $item->productos_vendidos, 'rute'=> 'http://35.192.70.196/subir/imagen/Productos/'.$item->rute, 'calificacion'=> $item->calificacion,'favorito'=> 'false',  'precio_oferta'=> $item->precio_oferta
           , 'descuento'=> $item->descuento, 'tipo'=> $item->tipo);
           }
          }

        }
       if ($band) {
         $out["status"] = "No existen productos en oferta en la tienda ingresada";
         $response->getBody()->write(json_encode($out));
         return $response;
       }else{
           $response->getBody()->write(json_encode($puertas));
       }

        return $response;
    }

    public function getPrecio_envio($request, $response, $args){
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
        if (!(isset($body["id_tienda"])) && isset($body['distancia'])){
            return $response->withStatus(400);
        }
        $tienda = trim($body['id_tienda']);
        $distancia = trim($body['distancia']);

        $sql = "SELECT t3.id  AS id_tienda, t2.* FROM tiendas t3 INNER JOIN  tarifario t2 ON t3.id_tarifario =t2.id where t3.id =:id_tienda";
        $statement = $db->prepare($sql);
        $statement->bindValue(':id_tienda', $tienda, \PDO::PARAM_STR);
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
         return $response;
       }else{
           if ($item){
               $precio_minimo=(float) $item->precio_minimo;
               $x=(float) $item->distancia;
               $precio=(float) $item->precio;
               $total=$precio_minimo+($distancia*$precio)/$x;
               $tiempo_minimo=(float) $item->tiempo_minimo;
               $tiempo=(float) $item->tiempo;
               $total1=$tiempo_minimo+($distancia*$tiempo)/$x;
               $puertas['precio'][] = array('precio'=> $total, 'tiempo'=> $total1);
               $response->getBody()->write(json_encode($puertas));
           }
       }

        return $response;
    }

    public function getPrecio($request, $response, $args){
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
        if (!(isset($body['distancia']))){
            return $response->withStatus(400);
        }
        $distancia = trim($body['distancia']);

        $sql = "SELECT * FROM tarifario t2 where t2.id ='1'";
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
      $response = $response->withHeader('Content-Type', 'application/json');
       $item = $statement->fetch();
       if ($item){
         $precio_minimo=(float) $item->precio_minimo;
         $x=(float) $item->distancia;
         $precio=(float) $item->precio;
         $total=$precio_minimo+($distancia*$precio)/$x;
         $tiempo_minimo=(float) $item->tiempo_minimo;
         $tiempo=(float) $item->tiempo;
         $total1=$tiempo_minimo+($distancia*$tiempo)/$x;
         $puertas['precio'][] = array('precio'=> $total, 'tiempo'=> $total1);
         $response->getBody()->write(json_encode($puertas));
       }
        return $response;
    }

    public function getConcidencias_producto($request, $response, $args){
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
        if (!(isset($body["palabra"]) && isset($body['id_usuario']) )){
            return $response->withStatus(400);
        }

        $palabra = trim($body['palabra']);
        $usuario = trim($body['id_usuario']);

        $sql = "SELECT * FROM favoritos where id_usuario=:id_usuario ";
        $statement = $db->prepare($sql);
        $statement->bindValue(':id_usuario', $usuario, \PDO::PARAM_STR);
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
        $band1=true;
        $favoritos = array();
        while($item = $statement->fetch()){
          $band1=false;
          $favoritos[] = $item->id_producto;
        }
        $sql = "SELECT *, p2.id  AS id_producto FROM productos p2 INNER JOIN  ofertas_productos t2 ON id_oferta =t2.id ";
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
        $response = $response->withHeader('Content-Type', 'application/json');
        $band=true;
        while($item = $statement->fetch()){
          $band=false;
          if (strlen(stristr($item->nombre, $palabra ))>0) {
            if ($band1) {
              $puertas['productos'][] = array('id'=> $item->id_producto, 'nombre'=> $item->nombre, 'descripcion'=> $item->descripcion, 'peso'=> $item->peso,'precio_oficial'=> $item->precio_oficial,'cantidad'=> $item->cantidad, 'width'=> $item->image_width,
              'height'=> $item->image_height,'productos_vendidos'=> $item->productos_vendidos, 'rute'=> 'http://35.192.70.196/subir/imagen/Productos/'.$item->rute, 'calificacion'=> $item->calificacion,'favorito'=> 'false',  'precio_oferta'=> $item->precio_oferta
            , 'descuento'=> $item->descuento, 'tipo'=> $item->tipo);
            }else{
              if (in_array($item->id_producto,$favoritos )) {
                $puertas['productos'][] = array('id'=> $item->id_producto, 'nombre'=> $item->nombre, 'descripcion'=> $item->descripcion, 'peso'=> $item->peso,'precio_oficial'=> $item->precio_oficial,'cantidad'=> $item->cantidad, 'width'=> $item->image_width,
                'height'=> $item->image_height,'productos_vendidos'=> $item->productos_vendidos, 'rute'=> 'http://35.192.70.196/subir/imagen/Productos/'.$item->rute, 'calificacion'=> $item->calificacion,'favorito'=> 'true',  'precio_oferta'=> $item->precio_oferta
               , 'descuento'=> $item->descuento, 'tipo'=> $item->tipo);
             }else{
               $puertas['productos'][] = array('id'=> $item->id_producto, 'nombre'=> $item->nombre, 'descripcion'=> $item->descripcion, 'peso'=> $item->peso,'precio_oficial'=> $item->precio_oficial,'cantidad'=> $item->cantidad, 'width'=> $item->image_width,
               'height'=> $item->image_height,'productos_vendidos'=> $item->productos_vendidos, 'rute'=> 'http://35.192.70.196/subir/imagen/Productos/'.$item->rute, 'calificacion'=> $item->calificacion,'favorito'=> 'false',  'precio_oferta'=> $item->precio_oferta
             , 'descuento'=> $item->descuento, 'tipo'=> $item->tipo);
             }
            }
          }
        }
       if ($band) {
         $out["status"] = "No existen Concidencias de productos";
         $response->getBody()->write(json_encode($out));
         return $response;
       }else{
           $response->getBody()->write(json_encode($puertas));
       }

        return $response;
    }

    public function getConcidencias_tienda($request, $response, $args){
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
        if (!(isset($body["palabra"]))){
            return $response->withStatus(400);
        }
        $palabra = trim($body['palabra']);
        $sql = "SELECT *, t2.id  AS id_tienda FROM tiendas t2 INNER JOIN  ofertas_tienda c2 ON id_ofertas_tienda =c2.id ";
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
        $response = $response->withHeader('Content-Type', 'application/json');
        $band=true;

        while($item = $statement->fetch()){

          if (strlen(stristr($item->nombre, $palabra ))>0) {
            $band=false;
              $puertas['tiendas'][] = array('id'=> $item->id_tienda, 'nombre'=> $item->nombre, 'descripcion'=> $item->descripcion, 'width'=> $item->image_width, 'height'=> $item->image_height, 'rute'=> 'http://35.192.70.196/subir/imagen/Tiendas/'.$item->rute, 'estado'=> $item->estado,
              'descuento'=> $item->descuento,'tipo'=> $item->tipo);
          }
        }
       if ($band) {
         $out["status"] = "No existen Concidencias de tiendas";
         $response->getBody()->write(json_encode($out));
         return $response;
       }else{
           $response->getBody()->write(json_encode($puertas));
       }

        return $response;
    }

    public function getConcidencias($request, $response, $args){
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
        if (!(isset($body["palabra"]) && isset($body['id_usuario']) && isset($body['id_tienda']) )){
            return $response->withStatus(400);
        }

        $palabra = trim($body['palabra']);
        $usuario = trim($body['id_usuario']);
        $tienda = trim($body['id_tienda']);
        $sql = "SELECT * FROM favoritos where id_usuario=:id_usuario ";
        $statement = $db->prepare($sql);
        $statement->bindValue(':id_usuario', $usuario, \PDO::PARAM_STR);
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
        $band1=true;
        $favoritos = array();
        while($item = $statement->fetch()){
          $band1=false;
          $favoritos[] = $item->id_producto;
        }
        $sql = "SELECT p2.*,t2.*, p2.id  AS id_producto FROM productos p2 INNER JOIN  ofertas_productos t2 ON id_oferta =t2.id INNER JOIN  categorias c2 ON c2.id =p2.id_categoria
               and c2.id_tienda=:tienda ";
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
          if (strlen(stristr($item->nombre, $palabra ))>0) {
            if ($band1) {
              $puertas['productos'][] = array('id'=> $item->id_producto, 'nombre'=> $item->nombre, 'descripcion'=> $item->descripcion, 'peso'=> $item->peso,'precio_oficial'=> $item->precio_oficial,'cantidad'=> $item->cantidad, 'width'=> $item->image_width,
              'height'=> $item->image_height,'productos_vendidos'=> $item->productos_vendidos, 'rute'=> 'http://35.192.70.196/subir/imagen/Productos/'.$item->rute, 'calificacion'=> $item->calificacion,'favorito'=> 'false',  'precio_oferta'=> $item->precio_oferta
            , 'descuento'=> $item->descuento, 'tipo'=> $item->tipo);
            }else{
              if (in_array($item->id_producto,$favoritos )) {
                $puertas['productos'][] = array('id'=> $item->id_producto, 'nombre'=> $item->nombre, 'descripcion'=> $item->descripcion, 'peso'=> $item->peso,'precio_oficial'=> $item->precio_oficial,'cantidad'=> $item->cantidad, 'width'=> $item->image_width,
                'height'=> $item->image_height,'productos_vendidos'=> $item->productos_vendidos, 'rute'=> 'http://35.192.70.196/subir/imagen/Productos/'.$item->rute, 'calificacion'=> $item->calificacion,'favorito'=> 'true',  'precio_oferta'=> $item->precio_oferta
               , 'descuento'=> $item->descuento, 'tipo'=> $item->tipo);
             }else{
               $puertas['productos'][] = array('id'=> $item->id_producto, 'nombre'=> $item->nombre, 'descripcion'=> $item->descripcion, 'peso'=> $item->peso,'precio_oficial'=> $item->precio_oficial,'cantidad'=> $item->cantidad, 'width'=> $item->image_width,
               'height'=> $item->image_height,'productos_vendidos'=> $item->productos_vendidos, 'rute'=> 'http://35.192.70.196/subir/imagen/Productos/'.$item->rute, 'calificacion'=> $item->calificacion,'favorito'=> 'false',  'precio_oferta'=> $item->precio_oferta
             , 'descuento'=> $item->descuento, 'tipo'=> $item->tipo);
             }
            }
          }
        }
       if ($band) {
         $out["status"] = "No existen Concidencias de productos";
         $response->getBody()->write(json_encode($out));
         return $response;
       }else{
           $response->getBody()->write(json_encode($puertas));
       }

        return $response;
    }

    public function getCompra($request, $response, $args){
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
        if (!(isset($body["id_compra"]))){
            return $response->withStatus(400);
        }
        $compra= trim($body['id_compra']);
        $sql = "SELECT v2.*,t2.*, v2.id, p2.*,t2.cantidad  AS cant  FROM vendidos v2 INNER JOIN  productos_vendidos t2 ON id_vendidos =v2.id INNER JOIN  productos p2 ON id_producto =p2.id  and v2.id=:id_compra ";
        $statement = $db->prepare($sql);
        $statement->bindValue(':id_compra', $compra, \PDO::PARAM_STR);
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
            $puertas['productos'][] = array('fecha'=> $item->fecha_compra, 'precio_total'=> $item->precio_total, 'calificacion'=> $item->calificacion,'id_factura'=> $item->id_factura,  'id_tienda'=> $item->id_tienda
          , 'estado'=> $item->estado, 'id_producto'=> $item->id_producto, 'nombre'=> $item->nombre, 'descripcion'=> $item->descripcion, 'peso'=> $item->peso,'precio_total_producto'=> $item->precio,'cantidad_compra'=> $item->cant, 'width'=> $item->image_width,
          'height'=> $item->image_height, 'rute'=> 'http://35.192.70.196/subir/imagen/Productos/'.$item->rute, 'calificacion'=> $item->calificacion);

        }
       if ($band) {
         $out["status"] = "No existe Compra";
         $response->getBody()->write(json_encode($out));
         return $response;
       }else{
           $response->getBody()->write(json_encode($puertas));
       }

        return $response;
    }

    public function getCompras($request, $response, $args){
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
        $usuario= trim($body['id_usuario']);
        $sql = "SELECT v2.* ,p2.nombre,p2.rute ,mt2.descripcion FROM vendidos v2 INNER JOIN  tiendas p2 ON p2.id=v2.id_tienda INNER JOIN  metodo_pago mt2 ON mt2.id=v2.id_pago and v2.id_usuario=:id_usuario";
        $statement = $db->prepare($sql);
        $statement->bindValue(':id_usuario', $usuario, \PDO::PARAM_STR);
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
            $puertas['productos'][] = array('id'=> $item->id, 'fecha'=> $item->fecha_compra, 'precio_total'=> $item->precio_total, 'calificacion'=> $item->calificacion,'id_factura'=> $item->id_factura,  'nombre'=> $item->nombre
          , 'imagen'=> 'http://35.192.70.196/subir/imagen/Tiendas/'.$item->rute, 'latitud'=> $item->latitud, 'longitud'=> $item->longitud, 'metodo_pago'=> $item->descripcion,'cupon'=> $item->cupon,'estado'=> $item->estado);
        }
       if ($band) {
         $out["status"] = "No existe Compra";
         $response->getBody()->write(json_encode($out));
         return $response;
       }else{
           $response->getBody()->write(json_encode($puertas));
       }
        return $response;
    }

    public function getCompras_activas($request, $response, $args){
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

        $usuario= trim($body['id_usuario']);
        $sql = "SELECT v2.*,p2.nombre,p2.rute ,mt2.descripcion FROM vendidos v2
        INNER JOIN  tiendas p2 ON p2.id=v2.id_tienda INNER JOIN  metodo_pago mt2 ON mt2.id=v2.id_pago and v2.id_usuario=:id_usuario and v2.estado !='F'";
        $statement = $db->prepare($sql);
        $statement->bindValue(':id_usuario', $usuario, \PDO::PARAM_STR);
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
            $puertas['productos'][] = array('id'=> $item->id, 'fecha'=> $item->fecha_compra, 'precio_total'=> $item->precio_total, 'calificacion'=> $item->calificacion,'id_factura'=> $item->id_factura,  'nombre'=> $item->nombre
          , 'imagen'=> 'http://35.192.70.196/subir/imagen/Tiendas/'.$item->rute, 'latitud'=> $item->latitud, 'longitud'=> $item->longitud, 'metodo_pago'=> $item->descripcion,'cupon'=> $item->cupon,'estado'=> $item->estado);

        }
       if ($band) {
         $out["status"] = "No existe Compra";
         $response->getBody()->write(json_encode($out));
         return $response;
       }else{
           $response->getBody()->write(json_encode($puertas));
       }

        return $response;
    }

    public function getCompras_empacando($request, $response, $args){
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

        $usuario= trim($body['id_usuario']);
        $sql = "SELECT v2.*, p2.nombre,p2.rute ,mt2.descripcion FROM vendidos v2
        INNER JOIN  tiendas p2 ON p2.id=v2.id_tienda INNER JOIN  metodo_pago mt2 ON mt2.id=v2.id_pago and v2.id_usuario=:id_usuario and v2.estado ='P'";
        $statement = $db->prepare($sql);
        $statement->bindValue(':id_usuario', $usuario, \PDO::PARAM_STR);
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
            $puertas['productos'][] = array('id'=> $item->id, 'fecha'=> $item->fecha_compra, 'precio_total'=> $item->precio_total, 'calificacion'=> $item->calificacion,'id_factura'=> $item->id_factura,  'nombre'=> $item->nombre
          , 'imagen'=> 'http://35.192.70.196/subir/imagen/Tiendas/'.$item->rute, 'latitud'=> $item->latitud, 'longitud'=> $item->longitud, 'metodo_pago'=> $item->descripcion,'cupon'=> $item->cupon,'estado'=> $item->estado);

        }
       if ($band) {
         $out["status"] = "No existe Compra";
         $response->getBody()->write(json_encode($out));
         return $response;
       }else{
           $response->getBody()->write(json_encode($puertas));
       }

        return $response;
    }

    public function getCompras_enviando($request, $response, $args){
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

        $usuario= trim($body['id_usuario']);
        $sql = "SELECT v2.* ,p2.nombre,p2.rute ,mt2.descripcion FROM vendidos v2
        INNER JOIN  tiendas p2 ON p2.id=v2.id_tienda INNER JOIN  metodo_pago mt2 ON mt2.id=v2.id_pago and v2.id_usuario=:id_usuario and v2.estado ='D'";
        $statement = $db->prepare($sql);
        $statement->bindValue(':id_usuario', $usuario, \PDO::PARAM_STR);
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
            $puertas['productos'][] = array('id'=> $item->id, 'fecha'=> $item->fecha_compra, 'precio_total'=> $item->precio_total, 'calificacion'=> $item->calificacion,'id_factura'=> $item->id_factura,  'nombre'=> $item->nombre
          , 'imagen'=> 'http://35.192.70.196/subir/imagen/Tiendas/'.$item->rute, 'latitud'=> $item->latitud, 'longitud'=> $item->longitud, 'metodo_pago'=> $item->descripcion,'cupon'=> $item->cupon,'estado'=> $item->estado);

        }
       if ($band) {
         $out["status"] = "No existe Compra";
         $response->getBody()->write(json_encode($out));
         return $response;
       }else{
           $response->getBody()->write(json_encode($puertas));
       }

        return $response;
    }

    public function getCompras_entregado($request, $response, $args){
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

        $usuario= trim($body['id_usuario']);
        $sql = "SELECT v2.* ,p2.nombre,p2.rute ,mt2.descripcion FROM vendidos v2
        INNER JOIN  tiendas p2 ON p2.id=v2.id_tienda INNER JOIN  metodo_pago mt2 ON mt2.id=v2.id_pago and v2.id_usuario=:id_usuario and v2.estado !='F'";
        $statement = $db->prepare($sql);
        $statement->bindValue(':id_usuario', $usuario, \PDO::PARAM_STR);
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
            $puertas['productos'][] = array('id'=> $item->id, 'fecha'=> $item->fecha_compra, 'precio_total'=> $item->precio_total, 'calificacion'=> $item->calificacion,'id_factura'=> $item->id_factura,  'nombre'=> $item->nombre
          , 'imagen'=> 'http://35.192.70.196/subir/imagen/Tiendas/'.$item->rute, 'latitud'=> $item->latitud, 'longitud'=> $item->longitud, 'metodo_pago'=> $item->descripcion,'cupon'=> $item->cupon,'estado'=> $item->estado);

        }
       if ($band) {
         $out["status"] = "No existe Compra";
         $response->getBody()->write(json_encode($out));
         return $response;
       }else{
           $response->getBody()->write(json_encode($puertas));
       }

        return $response;
    }

    public function getCupones($request, $response, $args){
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
        if (!(isset($body["cupon"]) && isset($body['tipo']) )){
            return $response->withStatus(400);
        }
        $cupon = trim($body['cupon']);
        $tipo = trim($body['tipo']);

        if ($tipo=='1') {
          $sql = "SELECT * , cp.id  AS id_cupon FROM cupones_producto cp INNER JOIN  ofertas_productos c2 ON id_ofertas_producto =c2.id where nombre=:nombre and estado='A'";
        }else if ($tipo=='2'){
            $sql = "SELECT * , cp.id  AS id_cupon FROM cupones_categoria cp INNER JOIN  ofertas_categoria c2 ON id_ofertas_categoria =c2.id where nombre=:nombre  and estado='A'";
        }else{
          $sql = "SELECT * , cp.id  AS id_cupon FROM cupones_tienda cp INNER JOIN  ofertas_tienda c2 ON id_ofertas_tienda =c2.id  where nombre=:nombre and estado='A'";
        }
        $statement = $db->prepare($sql);
        $statement->bindValue(':nombre', $cupon, \PDO::PARAM_STR);
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
        $band1=true;
        $item = $statement->fetch();
       if ($item==false) {
         $out["status"] = "Cupón no válido";
         $response->getBody()->write(json_encode($out));
         return $response;
       }else{
         $response->getBody()->write(json_encode($item));
       }
        return $response;
    }

    public function getUbicaciones($request, $response, $args){
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
        if (!(isset($body['id_usuario']) )){
            return $response->withStatus(400);
        }
        $usuario = trim($body['id_usuario']);
        $sql = "SELECT * FROM ubicaciones  where id_usuario=:usuario";
        $statement = $db->prepare($sql);
        $statement->bindValue(':usuario', $usuario, \PDO::PARAM_STR);
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
          $puertas['ubicaciones'][] = array('id'=> $item->id, 'nombre'=> $item->nombre, 'latitud'=> $item->latitud, 'longitud'=> $item->longitud, 'direccion'=> $item->direccion);
        }
       if ($band) {
         $out["status"] = "No tiene ubicaciones el usuario";
         $response->getBody()->write(json_encode($out));
         return $response;
       }else{
         $response->getBody()->write(json_encode($puertas));
       }
        return $response;
    }

    public function getfacturacion($request, $response, $args){
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
        if (!(isset($body['id_usuario']) )){
            return $response->withStatus(400);
        }
        $usuario = trim($body['id_usuario']);
        $sql = "SELECT * FROM factura  where id_usuario=:usuario or id='1'";
        $statement = $db->prepare($sql);
        $statement->bindValue(':usuario', $usuario, \PDO::PARAM_STR);
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
          $puertas['facturas'][] = array('id'=> $item->id, 'nombre'=> $item->nombre, 'cedula'=> $item->cedula, 'telefono'=> $item->telefono, 'direccion'=> $item->direccion, 'correo'=> $item->correo);
        }
       if ($band) {
         $out["status"] = "No tiene datos de facturacion";
         $response->getBody()->write(json_encode($out));
         return $response;
       }else{
         $response->getBody()->write(json_encode($puertas));
       }
        return $response;
    }

    public function agregarUbicacion($request, $response, $args){
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
        if (!(isset($body["id_usuario"]) && isset($body['nombre']) && isset($body['latitud']) && isset($body['longitud']) && isset($body['direccion']))){
            return $response->withStatus(400);
        }
        // FIN Validacion
        $sql = "INSERT INTO ubicaciones (`id_usuario`, `nombre`, `latitud`, `longitud`,`direccion`) VALUES (:id_usuario, :nombre, :latitud, :longitud, :direccion)";
        $statement = $db->prepare($sql);
        $statement->bindValue(':id_usuario',  $body["id_usuario"], \PDO::PARAM_STR);
        $statement->bindValue(':nombre',  $body["nombre"], \PDO::PARAM_STR);
        $statement->bindValue(':latitud',  $body["latitud"], \PDO::PARAM_STR);
        $statement->bindValue(':longitud',  $body["longitud"], \PDO::PARAM_STR);
        $statement->bindValue(':direccion',  $body["direccion"], \PDO::PARAM_STR);
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

    public function agregarFacturacion($request, $response, $args){
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
        if (!(isset($body["id_usuario"]) && isset($body['nombre']) && isset($body['cedula']) && isset($body['telefono']) && isset($body['direccion']) && isset($body['correo']))){
            return $response->withStatus(400);
        }
        // FIN Validacion
        $sql = "INSERT INTO factura (`id_usuario`, `nombre`, `cedula`, `telefono`,`direccion`,`correo`) VALUES (:id_usuario, :nombre, :cedula, :telefono, :direccion, :correo)";
        $statement = $db->prepare($sql);
        $statement->bindValue(':id_usuario',  $body["id_usuario"], \PDO::PARAM_STR);
        $statement->bindValue(':nombre',  $body["nombre"], \PDO::PARAM_STR);
        $statement->bindValue(':cedula',  $body["cedula"], \PDO::PARAM_STR);
        $statement->bindValue(':telefono',  $body["telefono"], \PDO::PARAM_STR);
        $statement->bindValue(':direccion',  $body["direccion"], \PDO::PARAM_STR);
        $statement->bindValue(':correo',  $body["correo"], \PDO::PARAM_STR);
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
          return $response;
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
          return $response;
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
          return $response;
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
        if (!(isset($body["nombre"]) && isset($body['descripcion']) && isset($body['cantidad']) && isset($body['peso']) && isset($body['precio_oficial']) && isset($body['width']) && isset($body['height']) && isset($body['id_categoria']) && isset($body['id_oferta']))){
            return $response->withStatus(400);
        }

        $sql = "INSERT INTO productos (`nombre`,`descripcion`,`cantidad`,`peso`,`precio_oficial`,`image_width`,`image_height`,`id_categoria`,`id_oferta`) VALUES (:nombre, :descripcion, :cantidad, :precio, :precio_oficial, :width, :height, :id_categoria, :id_oferta)";
        $statement = $db->prepare($sql);
        $statement->bindValue(':nombre',  $body["nombre"], \PDO::PARAM_STR);
        $statement->bindValue(':descripcion',  $body["descripcion"], \PDO::PARAM_STR);
        $statement->bindValue(':cantidad',  $body["cantidad"], \PDO::PARAM_STR);
        $statement->bindValue(':peso',  $body["peso"], \PDO::PARAM_STR);
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

    public function agregarCompra1($request, $response, $args){
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
        if (!(isset($body["id_usuario"]) && isset($body['calificacion']) && isset($body['precio']) && isset($body['id_tienda']) && isset($body['productos']))){
            return $response->withStatus(400);
        }
        $id_tienda=$body['id_tienda'];
        $calificacion=$body['calificacion'];
        $band=true;
        $array = explode(":", $body['productos']);
        $longitud = count($array);
        for($i=0; $i<$longitud; $i++){
          $parts = explode(",", $array[$i]);
          $sql = "SELECT * FROM productos where id=:id_producto";
          $statement = $db->prepare($sql);
          $statement->bindValue(':id_producto',  $parts[0], \PDO::PARAM_STR);
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
          $cantidad_productos=$item->cantidad;
          if ($cantidad_productos <$parts[1]) {
            $band=false;
            $response = $response->withHeader('Content-Type', 'application/json');
            $out["status"][] = array('mensaje'=>'No existe stock de producto '.$item->nombre,'id'=> $item->id);
          }
        }

        if ($band) {
            $sql = "SELECT * FROM tiendas where id=:id_tienda";
            $statement = $db->prepare($sql);
            $statement->bindValue(':id_tienda',  $id_tienda, \PDO::PARAM_STR);
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
            $calificacion_total=(float) $item->calificacion;
            $cantidad_ventas=(float) $item->cantidad_ventas;
            $x=$calificacion_total*$cantidad_ventas+$calificacion;
            $y=$cantidad_ventas+1;
            $total1=$x/($y);
            $total=number_format((float)$total1, 1, '.', '');;
            $sql = "UPDATE tiendas	SET calificacion=:calificacion, cantidad_ventas=:cantidad_ventas WHERE id=:id_tienda";
            $statement = $db->prepare($sql);
            $statement->bindValue(':calificacion', $total, \PDO::PARAM_STR);
            $statement->bindValue(':cantidad_ventas', $y, \PDO::PARAM_STR);
            $statement->bindValue(':id_tienda',  $id_tienda, \PDO::PARAM_STR);

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
            // FIN Validacion
            date_default_timezone_set('America/Lima');
            $hoy = (string) date("Y-m-d H:i:s");
            $sql = "INSERT INTO vendidos (`id_usuario`, `calificacion`, `precio_total`, `fecha_compra`) VALUES (:id_usuario, :calificacion, :precio, :fecha)";
            $statement = $db->prepare($sql);
            $statement->bindValue(':id_usuario',  $body["id_usuario"], \PDO::PARAM_STR);
            $statement->bindValue(':calificacion',  $body["calificacion"], \PDO::PARAM_STR);
            $statement->bindValue(':precio',  $body["precio"], \PDO::PARAM_STR);
            $statement->bindValue(':fecha',  $hoy, \PDO::PARAM_STR);
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

            $sql = "SELECT * FROM vendidos t2 where id_usuario=:id_usuario and fecha_compra=:fecha";
            $statement = $db->prepare($sql);
            $statement->bindValue(':fecha', $hoy, \PDO::PARAM_STR);
            $statement->bindValue(':id_usuario',  $body["id_usuario"], \PDO::PARAM_STR);

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
            //update_calificacion_tienda($body["id_tienda"], $body["calificacion"]) ;
            $item = $statement->fetch();
             for($i=0; $i<$longitud; $i++){
               $parts = explode(",", $array[$i]);
               $sql = "INSERT INTO productos_vendidos (`id_producto`, `id_vendidos`, `calificacion`, `cantidad`,`precio`,`id_tienda`) VALUES (:id_producto, :id_vendido, :calificacion, :cantidad, :precio, :id_tienda)";
               $statement = $db->prepare($sql);
               $statement->bindValue(':id_producto', $parts[0], \PDO::PARAM_STR);
               $statement->bindValue(':id_vendido',  $item->id, \PDO::PARAM_STR);
               $statement->bindValue(':calificacion',  $body["calificacion"], \PDO::PARAM_STR);
               $statement->bindValue(':cantidad',  $parts[1], \PDO::PARAM_STR);
               $statement->bindValue(':precio',   $parts[2], \PDO::PARAM_STR);
               $statement->bindValue(':id_tienda', $body['id_tienda'], \PDO::PARAM_STR);
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

               $sql = "SELECT * FROM productos where id=:id_producto";
               $statement = $db->prepare($sql);
               $statement->bindValue(':id_producto',  $parts[0], \PDO::PARAM_STR);
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
               $calificacion_total=(float) $item->calificacion;
               $cantidad_ventas=(float) $item->productos_vendidos;
               $cantidad_productos=$item->cantidad;
               $x=$calificacion_total*$cantidad_ventas+$calificacion;
               $y=$cantidad_ventas+1;
               $z=$cantidad_productos- $parts[1];
               $total1=$x/($y);
               $total=number_format((float)$total1, 1, '.', '');
               $sql = "UPDATE productos	SET productos_vendidos=:productos_vendidos, calificacion=:calificacion, cantidad=:cantidad WHERE id=:id_producto";
               $statement = $db->prepare($sql);
               $statement->bindValue(':calificacion', $total, \PDO::PARAM_STR);
               $statement->bindValue(':cantidad', $z, \PDO::PARAM_STR);
                $statement->bindValue(':productos_vendidos', $y, \PDO::PARAM_STR);
               $statement->bindValue(':id_producto',  $parts[0], \PDO::PARAM_STR);

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
             }

             $response = $response->withHeader('Content-Type', 'application/json');
             $out["status"] = 'Operación realizada OK';
             $response->getBody()->write(json_encode($out));
        }else{
          $response->getBody()->write(json_encode($out));
        }

        return $response;

    }

    public function agregarCompra($request, $response, $args){
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
        if (!(isset($body["id_usuario"]) && isset($body['id_factura']) && isset($body['precio']) && isset($body['id_tienda']) && isset($body['productos'])
        && isset($body['latitud']) && isset($body['longitud']) && isset($body['id_metodo']) && isset($body['cupon']) && isset($body['direccion']))){
            return $response->withStatus(400);
        }
        try {
          $id_tienda=$body['id_tienda'];
          $band=true;
          $array = explode(":", $body['productos']);
          $longitud = count($array);
          for($i=0; $i<$longitud; $i++){
            $parts = explode(",", $array[$i]);
            $sql = "SELECT * FROM productos where id=:id_producto";
            $statement = $db->prepare($sql);
            $statement->bindValue(':id_producto',  $parts[0], \PDO::PARAM_STR);
            $result = $statement->execute();
            $item = $statement->fetch();
            $cantidad_productos=$item->cantidad;
            if ($cantidad_productos <$parts[1]) {
              $band=false;
              $response = $response->withHeader('Content-Type', 'application/json');
              $out["status"][] = array('mensaje'=>'No existe stock de producto '.$item->nombre,'id'=> $item->id);
            }
          }

          if ($band) {
              date_default_timezone_set('America/Lima');
              $hoy = (string) date("Y-m-d H:i:s");

              $sql = "SELECT * FROM tiendas where id=:id_tienda";
              $statement = $db->prepare($sql);
              $statement->bindValue(':id_tienda',  $id_tienda, \PDO::PARAM_STR);
              $result = $statement->execute();
              $cantidad_ventas=(float) $item->productos_vendidos;
              $cantidad_productos=$item->cantidad;
              $y=$cantidad_ventas+1;
              $item = $statement->fetch();

              $sql = "UPDATE tiendas	SET cantidad_ventas=:cantidad_ventas WHERE id=:id_tienda";
              $statement = $db->prepare($sql);
              $statement->bindValue(':cantidad_ventas', $y, \PDO::PARAM_STR);
              $statement->bindValue(':id_tienda',  $id_tienda, \PDO::PARAM_STR);
              $result = $statement->execute();

              $sql = "INSERT INTO vendidos (`id_usuario`,`id_factura`, `precio_total`, `fecha_compra` ,`id_tienda`, `latitud`, `longitud`, `id_pago`,`cupon`,`direccion`) VALUES (:id_usuario, :id_factura,  :precio, :fecha, :id_tienda, :latitud, :longitud, :id_pago, :cupon, :direccion )";
              $statement = $db->prepare($sql);
              $statement->bindValue(':id_usuario',  $body["id_usuario"], \PDO::PARAM_STR);
              $statement->bindValue(':precio',  $body["precio"], \PDO::PARAM_STR);
              $statement->bindValue(':id_factura',  $body["id_factura"], \PDO::PARAM_STR);
              $statement->bindValue(':fecha',  $hoy, \PDO::PARAM_STR);
              $statement->bindValue(':id_tienda', $body['id_tienda'], \PDO::PARAM_STR);
              $statement->bindValue(':latitud', $body['latitud'], \PDO::PARAM_STR);
              $statement->bindValue(':longitud', $body['longitud'], \PDO::PARAM_STR);
              $statement->bindValue(':id_pago', $body['id_metodo'], \PDO::PARAM_STR);
              $statement->bindValue(':cupon', $body['cupon'], \PDO::PARAM_STR);
              $statement->bindValue(':direccion', $body['direccion'], \PDO::PARAM_STR);
              $result = $statement->execute();
              $sql = "SELECT * FROM vendidos t2 where id_usuario=:id_usuario and fecha_compra=:fecha";
              $statement = $db->prepare($sql);
              $statement->bindValue(':fecha', $hoy, \PDO::PARAM_STR);
              $statement->bindValue(':id_usuario',  $body["id_usuario"], \PDO::PARAM_STR);
              $result = $statement->execute();
              //update_calificacion_tienda($body["id_tienda"], $body["calificacion"]) ;
              $item = $statement->fetch();
              $id_Vendido=$item;
               for($i=0; $i<$longitud; $i++){
                 $parts = explode(",", $array[$i]);

                 $sql = "INSERT INTO productos_vendidos (`id_producto`, `id_vendidos`, `cantidad`,`precio`) VALUES (:id_producto, :id_vendido, :cantidad, :precio)";
                 $statement = $db->prepare($sql);
                 $statement->bindValue(':id_producto', $parts[0], \PDO::PARAM_STR);
                 $statement->bindValue(':id_vendido',  $id_Vendido->id, \PDO::PARAM_STR);
                 $statement->bindValue(':cantidad',  $parts[1], \PDO::PARAM_STR);
                 $statement->bindValue(':precio',   $parts[2], \PDO::PARAM_STR);
                 $result = $statement->execute();

                 $sql = "SELECT * FROM productos where id=:id_producto";
                 $statement = $db->prepare($sql);
                 $statement->bindValue(':id_producto',  $parts[0], \PDO::PARAM_STR);
                 $result = $statement->execute();
                 $item = $statement->fetch();
                 $cantidad_ventas=(float) $item->productos_vendidos;
                 $cantidad_productos=$item->cantidad;
                 $z=$cantidad_productos- $parts[1];
                 $m=$cantidad_ventas+$parts[1];

                 $sql = "UPDATE productos	SET productos_vendidos=:productos_vendidos, cantidad=:cantidad WHERE id=:id_producto";
                 $statement = $db->prepare($sql);
                 $statement->bindValue(':cantidad', $z, \PDO::PARAM_STR);
                 $statement->bindValue(':productos_vendidos', $m, \PDO::PARAM_STR);
                 $statement->bindValue(':id_producto',  $parts[0], \PDO::PARAM_STR);
                 $result = $statement->execute();

               }

               $sql = "SELECT v2.* ,p2.nombre,p2.rute ,mt2.descripcion FROM vendidos v2 INNER JOIN  tiendas p2 ON p2.id=v2.id_tienda INNER JOIN  metodo_pago mt2 ON mt2.id=v2.id_pago and v2.id =:id_vendido";
               $statement = $db->prepare($sql);
               $statement->bindValue(':id_vendido', $id_Vendido->id, \PDO::PARAM_STR);
               $result = $statement->execute();
               $band=true;
               while($item = $statement->fetch()){
                   $band=false;
                   $puertas['productos'][] = array('id'=> $item->id, 'fecha'=> $item->fecha_compra, 'precio_total'=> $item->precio_total, 'calificacion'=> $item->calificacion,'id_factura'=> $item->id_factura,  'nombre'=> $item->nombre
                 , 'imagen'=> 'http://35.192.70.196/subir/imagen/Tiendas/'.$item->rute, 'latitud'=> $item->latitud, 'longitud'=> $item->longitud,  'direccion'=> $item->direccion, 'metodo_pago'=> $item->descripcion,'cupon'=> $item->cupon,'estado'=> $item->estado);

               }
              $response = $response->withHeader('Content-Type', 'application/json');
              if ($band) {
                $out["status"] = "No existe Compra";
                $response->getBody()->write(json_encode($out));
                return $response;
              }else{
                $response->getBody()->write(json_encode($puertas));
              }
          }else{
            $response->getBody()->write(json_encode($out));
          }
          return $response;
      } catch (\PDOException $th) {
          $result = false;
          $errocode = $th->getCode();
          $response = $response->withHeader('Content-Type', 'application/json');
          $out["status"] = "ErrorServerCode: $errocode";
          $response->getBody()->write(json_encode($out));
          return $response->withStatus(500);
      }
    }

    public function updateCompra($request, $response, $args){
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
        if (!(isset($body["id_compra"]) && isset($body['calificacion']))){
            return $response->withStatus(400);
        }
        $id_compra=$body['id_compra'];
        $calificacion=$body['calificacion'];
        $band=true;

        $sql = "SELECT * FROM vendidos where id=:id_compra";
        $statement = $db->prepare($sql);
        $statement->bindValue(':id_compra', $id_compra, \PDO::PARAM_STR);
        try {
            $result = $statement->execute();
            $item = $statement->fetch();
            if($item==false){
              $response = $response->withHeader('Content-Type', 'application/json');
              $out["status"] = 'La compra no existe';
              $response->getBody()->write(json_encode($out));
            }else{
              $id_tienda= $item->id_tienda;
              $sql = "UPDATE vendidos	SET calificacion=:calificacion WHERE id=:id_compra";
              $statement = $db->prepare($sql);
              $statement->bindValue(':calificacion', $calificacion, \PDO::PARAM_STR);
              $statement->bindValue(':id_compra',  $id_compra, \PDO::PARAM_STR);
              $result = $statement->execute();

              $sql = "SELECT * FROM productos_vendidos where id_vendidos=:id_compra";
              $statement = $db->prepare($sql);
              $statement->bindValue(':id_compra',  $id_compra, \PDO::PARAM_STR);
              $result = $statement->execute();
              while($item = $statement->fetch()){
                  $ids[]= $item->id_producto;
                  $cantidades[]= $item->cantidad;
              }
              $sql = "SELECT * FROM productos";
              $statement = $db->prepare($sql);
              $result = $statement->execute();
              while($item = $statement->fetch()){
                if (in_array($item->id,$ids)) {
                  $calificacion_total=(float) $item->calificacion;
                  $cantidad_ventas=(float) $item->productos_vendidos;
                  $cantidad_productos=$cantidades[array_search($item->id,$ids,false)];
                  $x=$calificacion_total*($cantidad_ventas-$cantidad_productos)+$calificacion*$cantidad_productos;
                  $y=$cantidad_ventas;
                  $total1=$x/($y);
                  $total=number_format((float)$total1, 1, '.', '');
                  $sql = "UPDATE productos	SET calificacion=:calificacion WHERE id=:id_producto";
                  $statement1 = $db->prepare($sql);
                  $statement1->bindValue(':calificacion', $total, \PDO::PARAM_STR);
                  $statement1->bindValue(':id_producto',  $item->id, \PDO::PARAM_STR);
                  $result1 = $statement1->execute();
               }
              }
              $sql = "SELECT * FROM tiendas WHERE id=:id_tienda ";
              $statement = $db->prepare($sql);
              $statement->bindValue(':id_tienda', $id_tienda, \PDO::PARAM_STR);
              $result = $statement->execute();
              $item = $statement->fetch();
              $calificacion_total=(float) $item->calificacion;
              $cantidad_ventas=(float) $item->cantidad_ventas;
              $x=$calificacion_total*($cantidad_ventas-1)+$calificacion;
              $y=$cantidad_ventas;
              $total1=$x/($y);
              $total=number_format((float)$total1, 1, '.', '');;
              $sql = "UPDATE tiendas	SET calificacion=:calificacion WHERE id=:id_tienda";
              $statement = $db->prepare($sql);
              $statement->bindValue(':calificacion', $total, \PDO::PARAM_STR);
              $statement->bindValue(':id_tienda', $id_tienda, \PDO::PARAM_STR);
              $result = $statement->execute();
              $response = $response->withHeader('Content-Type', 'application/json');
              $out["status"] = 'Operación realizada OK';
              $response->getBody()->write(json_encode($out));
            }

            return $response;
      } catch (\PDOException $th) {
          $result = false;
          $errocode = $th->getCode();
          $response = $response->withHeader('Content-Type', 'application/json');
          $out["status"] = "ErrorServerCode: $errocode";
          $response->getBody()->write(json_encode($out));
          return $response->withStatus(500);
      }
    }

    public function updateFavorito($request, $response, $args){
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
        if (!(isset($body["id_producto"]) && isset($body['id_usuario']) && isset($body['tipo']) )){
            return $response->withStatus(400);
        }

        $producto = trim($body['id_producto']);
        $tipo = trim($body['tipo']);
        $usuario = trim($body['id_usuario']);

        $sql = "SELECT * FROM favoritos where id_usuario=:id_usuario ";
        $statement = $db->prepare($sql);
        $statement->bindValue(':id_usuario', $usuario, \PDO::PARAM_STR);
        try {
            $result = $statement->execute();
            $band1=true;
            $favoritos = array();
            while($item = $statement->fetch()){
              $band1=false;
              $favoritos[]= ["producto"=> $item->id_producto, "id" => $item->id];
            }
            $productos = array_column($favoritos, 'producto');
            $key = array_column($favoritos, 'id');
            // FIN Validacion
            $band=true;
            if ($tipo=="true") {
              if (in_array($producto,$productos )) {
                $out["status"] = "El producto ya es favorito";
                $response->getBody()->write(json_encode($out));
                $band=false;
              }else{

                $sql = "INSERT INTO favoritos (id_usuario,id_producto) VALUES (:usuario, :producto);";
                $statement = $db->prepare($sql);
                $statement->bindValue(':usuario', $usuario, \PDO::PARAM_STR);
                $statement->bindValue(':producto', $producto, \PDO::PARAM_STR);
                $result = $statement->execute();
              }
            }else{
              if (in_array($producto,$productos )) {
                $indice=array_search($producto,$productos,false);
                $sql = "DELETE FROM favoritos WHERE id=:id";
                $statement = $db->prepare($sql);
                $statement->bindValue(':id',$key[$indice], \PDO::PARAM_STR);
                $result = $statement->execute();
              }else{
                $out["status"] = "El producto no es favorito";
                $response->getBody()->write(json_encode($out));
                $band=false;
              }
            }
            $response = $response->withHeader('Content-Type', 'application/json');
            if ($band) {
              $out["status"] = 'Operación realizada OK';
              $response->getBody()->write(json_encode($out));
            }
            return $response;
        } catch (\PDOException $th) {
            $result = false;
            $errocode = $th->getCode();
            $response = $response->withHeader('Content-Type', 'application/json');
            $out["status"] = "ErrorServerCode: $errocode";
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
    }

    public function updateEstado_compra($request, $response, $args){
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
        if (!(isset($body["id_compra"]) && isset($body['estado'])  )){
            return $response->withStatus(400);
        }
        $compra = trim($body['id_compra']);
        $tipo = trim($body['estado']);

        try {
          $sql = "UPDATE vendidos	SET estado=:estado WHERE id=:id_compra";
          $statement = $db->prepare($sql);
          $statement->bindValue(':estado', $tipo, \PDO::PARAM_STR);
          $statement->bindValue(':id_compra', $compra, \PDO::PARAM_STR);
          $result = $statement->execute();
          $response = $response->withHeader('Content-Type', 'application/json');
          $out["status"] = 'Operación realizada OK';
          $response->getBody()->write(json_encode($out));
          return $response;
        } catch (\PDOException $th) {
            $result = false;
            $errocode = $th->getCode();
            $response = $response->withHeader('Content-Type', 'application/json');
            $out["status"] = "ErrorServerCode: $errocode";
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
    }

    public function updateClave($request, $response, $args){
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
        if (!(isset($body["id_usuario"]) && isset($body['clave'])  )){
            return $response->withStatus(400);
        }

        try {
          $sql = "UPDATE usuarios	SET password=:clave WHERE id=:id_usuario";
          $statement = $db->prepare($sql);
          $statement->bindValue(':clave', $body["clave"], \PDO::PARAM_STR);
          $statement->bindValue(':id_usuario', $body["id_usuario"], \PDO::PARAM_STR);
          $result = $statement->execute();
          $response = $response->withHeader('Content-Type', 'application/json');
          $out["status"] = 'Operación realizada OK';
          $response->getBody()->write(json_encode($out));
          return $response;
        } catch (\PDOException $th) {
            $result = false;
            $errocode = $th->getCode();
            $response = $response->withHeader('Content-Type', 'application/json');
            $out["status"] = "ErrorServerCode: $errocode";
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }
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
        if (!(isset($body['id_usuario']) && isset($body['nombres']) && isset($body['email']) && isset($body['celular']) && isset($body['cedula']) )){
            return $response->withStatus(400);
        }
        try {
          $sql = "UPDATE usuarios	SET nombres=:nombres, email=:email, celular=:celular, cedula=:cedula WHERE id=:id_usuario";
          $statement = $db->prepare($sql);
          $statement->bindValue(':nombres', $body["nombres"], \PDO::PARAM_STR);
          $statement->bindValue(':email', $body["email"], \PDO::PARAM_STR);
          $statement->bindValue(':celular', $body["celular"], \PDO::PARAM_STR);
          $statement->bindValue(':cedula', $body["cedula"], \PDO::PARAM_STR);
          $statement->bindValue(':id_usuario', $body["id_usuario"], \PDO::PARAM_STR);
          $result = $statement->execute();
          $response = $response->withHeader('Content-Type', 'application/json');
          $out["status"] = 'Operación realizada OK';
          $response->getBody()->write(json_encode($out));
          return $response;
        } catch (\PDOException $th) {
            $result = false;
            $errocode = $th->getCode();
            $response = $response->withHeader('Content-Type', 'application/json');
            $out["status"] = "ErrorServerCode: $errocode";
            $response->getBody()->write(json_encode($out));
            return $response->withStatus(500);
        }

    }

    public function updateUsuario1($request, $response, $args){
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
        $json = $request->getParsedBody();
        $body = json_decode($json, true);
        if (!(isset($body['1']))){
            return $response->withStatus(400);
        }
        $response = $response->withHeader('Content-Type', 'application/json');
        $response->getBody()->write(json_encode($json));
          return $response;

    }
    public function deleteUbicacion($request, $response, $args){
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
        if (!(isset($body['id_ubicacion']))){
            return $response->withStatus(400);
        }
        // FIN Validacion
        $sql = "DELETE FROM ubicaciones WHERE id=:id_ubicacion";
        $statement = $db->prepare($sql);
        $statement->bindValue(':id_ubicacion',  $body["id_ubicacion"], \PDO::PARAM_STR);
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

    public function deleteFacturacion($request, $response, $args){
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
        if (!(isset($body["id_factura"]))){
            return $response->withStatus(400);
        }
        // FIN Validacion
        $sql = "DELETE FROM factura WHERE id=:id_factura";
        $statement = $db->prepare($sql);
        $statement->bindValue(':id_factura',  $body["id_factura"], \PDO::PARAM_STR);
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
