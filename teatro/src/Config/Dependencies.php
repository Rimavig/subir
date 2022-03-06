<?php
use Psr\Container\ContainerInterface;

$container->set('db',function(ContainerInterface $ci){
    $config = $ci->get('db_settings');
    $dbHost = $config->DB_HOST;
    $dbPass = $config->DB_PASS;
    $dbUser = $config->DB_USER;
    $dbCharset = $config->DB_CHARSET;
    $dbName = $config->DB_NAME;

    $opt = [
        PDO::ATTR_TIMEOUT => 10,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
    ];
    $dsn = "mysql:host=$dbHost;dbname=$dbName;charset=$dbCharset";

    try {
        $db = new PDO($dsn, $dbUser, $dbPass, $opt);
    } catch (PDOException $e) {
        header("HTTP/1.1 500 Error DB");
        header('Content-Type: application/json');
        $json["error"]=$e->getMessage();
        $error = json_encode($json);
        echo $error;
        exit();
    }
    
    return $db;

});