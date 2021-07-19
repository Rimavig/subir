<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Firebase\JWT\JWT;


class MainController extends BaseController
{
    const KEY_CONST = "qr2020l1anM@v1G";

    public function getPuertas($request, $response, $args){
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
        $sql = "SELECT * FROM info_puertas_principales";
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
            $puertas['puertas'][] = array('item'=> $item->id_puerta, 'descripcion'=> $item->descripcion);
        }
        $response = $response->withHeader('Content-Type', 'application/json');
        $response->getBody()->write(json_encode($puertas));
        return $response;

    }

    public function signInAdmin($request, $response, $args)
    {
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

    public function agregarPaciente($request, $response, $args){
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
        if (!(isset($body["id_cita"]) && isset($body['id']) && isset($body['fecha_cita'])  && isset($body['tarjeta']))){
            return $response->withStatus(400);
        }
        $id_paciente = str_replace(" ", "", $body['id']);
        $id_cita = str_replace(" ", "", $body['id_cita']);
        // FIN Validacion
        $sql = "INSERT INTO acceso_main (`id_cita`, `id_paciente`, `fecha_hora_cita`, `tarjeta`) VALUES (:id_cita, :id_paciente, :fecha_cita , :tarjeta)";
        $statement = $db->prepare($sql);
        $statement->bindValue(':id_cita', $id_cita, \PDO::PARAM_STR);
        $statement->bindValue(':id_paciente', $id_paciente, \PDO::PARAM_STR);
        $statement->bindValue(':fecha_cita', $body["fecha_cita"], \PDO::PARAM_STR);
        $statement->bindValue(':tarjeta', $body["tarjeta"], \PDO::PARAM_STR);
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
        //generar QR Code
        $space = array("/", ":", " ", "-");
        $fecha_cita = str_replace($space, "", $body['fecha_cita']);
        //$code = $id_paciente.'3'.$fecha_cita.$id_cita;
        $code = $id_paciente;
        //doble codificacion -> mejorar a un token JSON quizas
        $response = $response->withHeader('Content-Type', 'application/json');
        $out["qrcode"] = base64_encode(base64_encode($code));
        $response->getBody()->write(json_encode($out));
        // echo (base64_decode(base64_decode($out["qrcode"])));

        return $response;

    }

    public function agregartarjeta($request, $response, $args){
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
        if (!(isset($body["id_cita"]) && isset($body['id']) && isset($body['fecha_cita'])  && isset($body['tarjeta']))){
            return $response->withStatus(400);
        }
        $id_paciente = str_replace(" ", "", $body['id']);
        $id_cita = str_replace(" ", "", $body['id_cita']);
        // FIN Validacion
        $sql = "INSERT INTO acceso_diario (`id_cita`, `id_paciente`, `fecha_hora_cita`, `tarjeta`) VALUES (:id_cita, :id_paciente, :fecha_cita , :tarjeta)";
        $statement = $db->prepare($sql);
        $statement->bindValue(':id_cita', $id_cita, \PDO::PARAM_STR);
        $statement->bindValue(':id_paciente', $id_paciente, \PDO::PARAM_STR);
        $statement->bindValue(':fecha_cita', $body["fecha_cita"], \PDO::PARAM_STR);
        $statement->bindValue(':tarjeta', $body["tarjeta"], \PDO::PARAM_STR);
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
        //generar QR Code
        $space = array("/", ":", " ", "-");
        $fecha_cita = str_replace($space, "", $body['fecha_cita']);
        //$code = $id_paciente.'3'.$fecha_cita.$id_cita;
        $code = $id_paciente;
        //doble codificacion -> mejorar a un token JSON quizas
        $response = $response->withHeader('Content-Type', 'application/json');
        $out["qrcode"] = base64_encode(base64_encode($code));
        $response->getBody()->write(json_encode($out));
        // echo (base64_decode(base64_decode($out["qrcode"])));

        return $response;

    }
    public function updatePaciente1($request, $response, $args){
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
        if (!(isset($body["id_cita"]) && isset($body['id']) && isset($body['fecha_cita']) && isset($body['tarjeta']))){
            return $response->withStatus(400);
        }
        $id_paciente = trim($body['id']);
        $id_cita = trim($body['id_cita']);
        $tarjeta = trim($body['tarjeta']);
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
    public function updatePaciente($request, $response, $args){
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
        if (!(isset($body["id_cita"]) && isset($body['id']) && isset($body['tarjeta']))){
            return $response->withStatus(400);
        }
        $id_paciente = trim($body['id']);
        $id_cita = trim($body['id_cita']);
        $tarjeta = trim($body['tarjeta']);
        //Realizo consulta de puertas a DB
        $sql = "UPDATE acceso_main SET status='A', tarjeta=:tarjeta WHERE id_paciente = :id_paciente and id_cita = :id_cita";
        $statement = $db->prepare($sql);
        $statement->bindValue(':id_cita', $id_cita, \PDO::PARAM_STR);
        $statement->bindValue(':id_paciente', $id_paciente, \PDO::PARAM_STR);
        $statement->bindValue(':tarjeta', $tarjeta, \PDO::PARAM_STR);
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
