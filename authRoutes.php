<?php

use Slim\Routing\RouteCollectorProxy;

//MIDDLEWARE
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Psr7\Response;
use Firebase\JWT\JWT;
//
$app->group('/v1', function (RouteCollectorProxy $group) {

    $mw_admin = function (Request $request, RequestHandler $handler) {
        include(__DIR__.'/../Controllers/error.php');
        //error response//////////////////////////
        $e_response = new Response();
        /////////////////////////////////////////
        //$jwt = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJkYXRhIjp7InVzZXJJZCI6IjA5NTg5NDIwMDYifX0.5t7psQM_ZdCmJPTnK-MeR2EgbgvDw42eyZFldCx116k";
        $key = "TSATe@troTS@";
        if (!$request->hasHeader('Authorization')) {
            return $e_response->withStatus(401);
        }
        $auth = $request->getHeader('Authorization');
        $jwt = str_replace("Bearer ", "", $auth[0]);

        try {
            $decoded = (array) ((array) JWT::decode($jwt, $key, array('HS256')))['data']; //{data: {userId: {}}}
        } catch (\Throwable $th) {
          $out["codigo"] = "101";
          $out["mensaje"] =  $error_101_mensaje;
          $out["causa"] = $error_101_causa;
          $e_response = $e_response->withHeader('Content-Type', 'application/json');
          $e_response->getBody()->write(json_encode($out));
            return $e_response->withStatus(401);
        }
        //print_r($decoded['userId']);
        $request = $request->withAttribute('userId', $decoded['userId']);
        $e_response = $e_response->withHeader('Content-Type', 'application/json');
        $response = $handler->handle($request);
        return $response;
    };
    $mw_corp = function (Request $request, RequestHandler $handler) {

        include(__DIR__.'/../Controllers/error.php');
        //error response//////////////////////////
        $e_response = new Response();
        /////////////////////////////////////////
        //$jwt = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJkYXRhIjp7InVzZXJJZCI6IjA5NTg5NDIwMDYifX0.5t7psQM_ZdCmJPTnK-MeR2EgbgvDw42eyZFldCx116k";
        $key = "TSATe@troTS@";
        if (!$request->hasHeader('Authorization')) {
            return $e_response->withStatus(401);
        }
        $auth = $request->getHeader('Authorization');
        $jwt = str_replace("Bearer ", "", $auth[0]);

        try {
            $decoded = (array) ((array) JWT::decode($jwt, $key, array('HS256')))['data']; //{data: {userId: {}}}
        } catch (\Throwable $th) {
          $out["codigo"] = "101";
          $out["mensaje"] =  $error_101_mensaje;
          $out["causa"] = $error_101_causa;
          $e_response = $e_response->withHeader('Content-Type', 'application/json');
          $e_response->getBody()->write(json_encode($out));
          return $e_response->withStatus(401);
        }
        //print_r($decoded['userId']);
        if (!isset($decoded['corpName'])){
            return $e_response->withStatus(403);
        }
        $request = $request->withAttribute('corpName', $decoded['corpName']);
        $e_response = $e_response->withHeader('Content-Type', 'application/json');
        $response = $handler->handle($request);
        return $response;
    };

    $group->get('/getCategorias', 'App\Controllers\MainController:getCategorias')->add($mw_corp);
    $group->get('/getContacto', 'App\Controllers\MainController:getContacto')->add($mw_corp);
    $group->get('/getEventos', 'App\Controllers\MainController:getEventos')->add($mw_corp);
    $group->post('/getEventos_fecha', 'App\Controllers\MainController:getEventos_fecha')->add($mw_corp);
    $group->post('/getEventos_categoria', 'App\Controllers\MainController:getEventos_categoria')->add($mw_corp);
    $group->post('/getEventos_id', 'App\Controllers\MainController:getEventos_id')->add($mw_corp);
    $group->post('/getTickets', 'App\Controllers\MainController:getTickets')->add($mw_corp);
    $group->post('/registro', 'App\Controllers\MainController:registro')->add($mw_corp);
    $group->post('/login', 'App\Controllers\MainController:login')->add($mw_corp);
    $group->post('/reseteo_usuario', 'App\Controllers\MainController:reseteo_usuario')->add($mw_corp);
    $group->post('/validar_reseteo', 'App\Controllers\MainController:validar_reseteo')->add($mw_corp);

    $group->get('/getUsuarios', 'App\Controllers\MainController:getUsuarios')->add($mw_corp);

    header('Access-Control-Allow-Origin: *');
    header( 'Access-Control-Allow-Headers: Authorization, Content-Type' );
});
