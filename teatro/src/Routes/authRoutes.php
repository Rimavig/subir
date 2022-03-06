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
        $key = "TSATe@troTS@";
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
        $key = "TSATe@troTS@";
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
    $group->get('/getTanquesEco', 'App\Controllers\MainController:getTanquesEco')->add($mw_corp);
    $group->get('/getTanquesSuper', 'App\Controllers\MainController:getTanquesSuper')->add($mw_corp);
    $group->get('/getTanquesDiesel', 'App\Controllers\MainController:getTanquesDiesel')->add($mw_corp);

    $group->post('/getTiendas', 'App\Controllers\MainController:getTiendas')->add($mw_corp);
    $group->get('/getOfertas', 'App\Controllers\MainController:getOfertas')->add($mw_corp);
    $group->get('/getTop10', 'App\Controllers\MainController:getTop10')->add($mw_corp);
    $group->get('/getTop10_vendidos', 'App\Controllers\MainController:getTop10_vendidos')->add($mw_corp);
    $group->get('/getTop10_tiendas', 'App\Controllers\MainController:getTop10_tiendas')->add($mw_corp);
    $group->get('/getTop10_vendidos_tiendas', 'App\Controllers\MainController:getTop10_vendidos_tiendas')->add($mw_corp);

    $group->patch('/updatetoken', 'App\Controllers\MainController:getUsuarios')->add($mw_admin);
    $group->post('/createcorp', 'App\Controllers\MainController:createCorp')->add($mw_admin);
    $group->post('/adminsignin', 'App\Controllers\MainController:signInAdmin'); //->add($mw);

    $group->post('/getUsuario', 'App\Controllers\MainController:getUsuario')->add($mw_corp);
    $group->post('/getTienda', 'App\Controllers\MainController:getTienda')->add($mw_corp);

    $group->post('/getProductos', 'App\Controllers\MainController:getProductos')->add($mw_corp);
    $group->post('/getProductos_oferta', 'App\Controllers\MainController:getProductos_oferta')->add($mw_corp);
    $group->post('/getOfertas_categoria', 'App\Controllers\MainController:getOfertas_categoria')->add($mw_corp);
    $group->post('/getOfertas_tienda', 'App\Controllers\MainController:getOfertas_tienda')->add($mw_corp);
    $group->post('/getFavoritos', 'App\Controllers\MainController:getFavoritos')->add($mw_corp);
    $group->post('/getOfertas_producto', 'App\Controllers\MainController:getOfertas_producto')->add($mw_corp);
    $group->post('/getFavoritos_tienda', 'App\Controllers\MainController:getFavoritos_tienda')->add($mw_corp);
    $group->post('/getPrecio_envio', 'App\Controllers\MainController:getPrecio_envio')->add($mw_corp);
    $group->post('/getPrecio', 'App\Controllers\MainController:getPrecio')->add($mw_corp);
    $group->post('/getConcidencias_producto', 'App\Controllers\MainController:getConcidencias_producto')->add($mw_corp);
    $group->post('/getConcidencias_tienda', 'App\Controllers\MainController:getConcidencias_tienda')->add($mw_corp);
    $group->post('/getConcidencias', 'App\Controllers\MainController:getConcidencias')->add($mw_corp);
    $group->post('/getCupones', 'App\Controllers\MainController:getCupones')->add($mw_corp);
    $group->post('/getUbicaciones', 'App\Controllers\MainController:getUbicaciones')->add($mw_corp);
    $group->post('/getFacturacion', 'App\Controllers\MainController:getfacturacion')->add($mw_corp);
    $group->post('/getCompra', 'App\Controllers\MainController:getCompra')->add($mw_corp);
    $group->post('/getCompras', 'App\Controllers\MainController:getCompras')->add($mw_corp);
    $group->post('/getCompras_activas', 'App\Controllers\MainController:getCompras_activas')->add($mw_corp);
    $group->post('/getCompras_empacando', 'App\Controllers\MainController:getCompras_empacando')->add($mw_corp);
    $group->post('/getCompras_enviando', 'App\Controllers\MainController:getCompras_enviando')->add($mw_corp);
    $group->post('/getCompras_entregado', 'App\Controllers\MainController:getCompras_entregado')->add($mw_corp);

    $group->post('/addUsuario', 'App\Controllers\MainController:agregarUsuario')->add($mw_corp);
    $group->post('/addTienda', 'App\Controllers\MainController:agregarTienda')->add($mw_corp);
    $group->post('/addCategoria', 'App\Controllers\MainController:agregarCategoria')->add($mw_corp);
    $group->post('/addOfertas', 'App\Controllers\MainController:agregarOfertas')->add($mw_corp);
    $group->post('/addProducto', 'App\Controllers\MainController:agregarProducto')->add($mw_corp);
    $group->post('/addUbicacion', 'App\Controllers\MainController:agregarUbicacion')->add($mw_corp);
    $group->post('/addFactura', 'App\Controllers\MainController:agregarFacturacion')->add($mw_corp);
    $group->post('/addCompra', 'App\Controllers\MainController:agregarCompra')->add($mw_corp);

    $group->post('/updateCompra', 'App\Controllers\MainController:updateCompra')->add($mw_corp);
    $group->post('/updateEstado_compra', 'App\Controllers\MainController:updateEstado_compra')->add($mw_corp);
    $group->post('/updateFavorito', 'App\Controllers\MainController:updateFavorito')->add($mw_corp);
    $group->post('/updatePaciente', 'App\Controllers\MainController:updatePaciente')->add($mw_corp);
    $group->post('/updateClave', 'App\Controllers\MainController:updateClave')->add($mw_corp);
    $group->post('/updateUsuario', 'App\Controllers\MainController:updateUsuario')->add($mw_corp);
    $group->post('/updateUsuario1', 'App\Controllers\MainController:updateUsuario1')->add($mw_corp);

    $group->post('/deleteUbicacion', 'App\Controllers\MainController:deleteUbicacion')->add($mw_corp);
    $group->post('/deleteFactura', 'App\Controllers\MainController:deleteFacturacion')->add($mw_corp);
    // $group->post('/signup', 'App\Controllers\MainController:signUp');
    // $group->post('/invResidente', 'App\Controllers\MainController:checkInvitacionesResidente')->add($mw);
    // $group->post('/invInvitado', 'App\Controllers\MainController:checkInvitacionesInvitado')->add($mw);
    // $group->get('/checkciudadela', 'App\Controllers\MainController:checkCiudadela');
    // $group->get('/anuncios','App\Controllers\MainController:getAnuncios')->add($mw);
    // $group->post('/insertinv/normal', 'App\Controllers\MainController:insertInvNormal')->add($mw);
    // $group->delete('/deleteinv/{id}', 'App\Controllers\MainController:deleteInvitacion')->add($mw);
    // $group->post('/insertinv/recurrente', 'App\Controllers\MainController:insertInvRecurrente')->add($mw);
    // $group->get('/updateusuario/{tipo}','App\Controllers\MainController:updateUsuario')->add($mw);
    header('Access-Control-Allow-Origin: *');
    header( 'Access-Control-Allow-Headers: Authorization, Content-Type' );
});
