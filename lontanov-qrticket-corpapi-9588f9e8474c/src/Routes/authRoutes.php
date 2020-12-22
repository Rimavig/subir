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
        //error response//////////////////////////
        $e_response = new Response();
        /////////////////////////////////////////
        //$jwt = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJkYXRhIjp7InVzZXJJZCI6IjA5NTg5NDIwMDYifX0.5t7psQM_ZdCmJPTnK-MeR2EgbgvDw42eyZFldCx116k";
        $key = "qr2020l1anM@v1G";
        if (!$request->hasHeader('Authorization')) {
            return $e_response->withStatus(401);
        }
        $auth = $request->getHeader('Authorization');
        $jwt = str_replace("Bearer ", "", $auth[0]);

        try {
            $decoded = (array) ((array) JWT::decode($jwt, $key, array('HS256')))['data']; //{data: {userId: {}}}
        } catch (\Throwable $th) {
            return $e_response->withStatus(401);
        }
        //print_r($decoded['userId']);
        $request = $request->withAttribute('userId', $decoded['userId']);
        $e_response = $e_response->withHeader('Content-Type', 'application/json');
        $response = $handler->handle($request);
        return $response;
    };
    $mw_corp = function (Request $request, RequestHandler $handler) {
        //error response//////////////////////////
        $e_response = new Response();
        /////////////////////////////////////////
        //$jwt = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJkYXRhIjp7InVzZXJJZCI6IjA5NTg5NDIwMDYifX0.5t7psQM_ZdCmJPTnK-MeR2EgbgvDw42eyZFldCx116k";
        $key = "qr2020l1anM@v1G";
        if (!$request->hasHeader('Authorization')) {
            return $e_response->withStatus(401);
        }
        $auth = $request->getHeader('Authorization');
        $jwt = str_replace("Bearer ", "", $auth[0]);

        try {
            $decoded = (array) ((array) JWT::decode($jwt, $key, array('HS256')))['data']; //{data: {userId: {}}}
        } catch (\Throwable $th) {
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
    $group->get('/getpuertas', 'App\Controllers\MainController:getPuertas')->add($mw_corp);
    $group->patch('/updatetoken', 'App\Controllers\MainController:getPuertas')->add($mw_admin);
    $group->post('/createcorp', 'App\Controllers\MainController:createCorp')->add($mw_admin);
    $group->post('/adminsignin', 'App\Controllers\MainController:signInAdmin'); //->add($mw);
    $group->post('/addpaciente', 'App\Controllers\MainController:agregarPaciente')->add($mw_corp);
    $group->post('/updatepaciente', 'App\Controllers\MainController:updatePaciente')->add($mw_corp);
    $group->post('/deletecita', 'App\Controllers\MainController:deleteCita')->add($mw_corp);

    // $group->post('/signup', 'App\Controllers\MainController:signUp');
    // $group->post('/invResidente', 'App\Controllers\MainController:checkInvitacionesResidente')->add($mw);
    // $group->post('/invInvitado', 'App\Controllers\MainController:checkInvitacionesInvitado')->add($mw);
    // $group->get('/checkciudadela', 'App\Controllers\MainController:checkCiudadela');
    // $group->get('/anuncios','App\Controllers\MainController:getAnuncios')->add($mw);
    // $group->post('/insertinv/normal', 'App\Controllers\MainController:insertInvNormal')->add($mw);
    // $group->delete('/deleteinv/{id}', 'App\Controllers\MainController:deleteInvitacion')->add($mw);
    // $group->post('/insertinv/recurrente', 'App\Controllers\MainController:insertInvRecurrente')->add($mw);
    // $group->get('/updateusuario/{tipo}','App\Controllers\MainController:updateUsuario')->add($mw);
});
