<?php
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
//$GLOBALS['THRIFT_ROOT'] = '/var/www/html/thrift-0.11.0/thrift-0.11.0/lib/php/lib';
$GLOBALS['THRIFT_ROOT'] = 'C:\xampp\htdocs\teatro-copia\thrift-0.11.0\thrift-0.11.0\lib\php\lib';
require_once $GLOBALS['THRIFT_ROOT'].'/Types.php';
require_once $GLOBALS['THRIFT_ROOT'].'/MailerServer.php';
require_once $GLOBALS['THRIFT_ROOT'].'/Thrift/Transport/TTransport.php';
require_once $GLOBALS['THRIFT_ROOT'].'/Thrift/Transport/TSocket.php';
require_once $GLOBALS['THRIFT_ROOT'].'/Thrift/Protocol/TProtocol.php';
require_once $GLOBALS['THRIFT_ROOT'].'/Thrift/Protocol/TBinaryProtocol.php';
require_once $GLOBALS['THRIFT_ROOT'].'/Thrift/Transport/TBufferedTransport.php';
require_once $GLOBALS['THRIFT_ROOT'].'/Thrift/Type/TMessageType.php';
require_once $GLOBALS['THRIFT_ROOT'].'/Thrift/Factory/TStringFuncFactory.php';
require_once $GLOBALS['THRIFT_ROOT'].'/Thrift/StringFunc/TStringFunc.php';
require_once $GLOBALS['THRIFT_ROOT'].'/Thrift/StringFunc/Core.php';
require_once $GLOBALS['THRIFT_ROOT'].'/Thrift/Type/TType.php';
use Thrift\Protocol\TBinaryProtocol;
use Thrift\Transport\TSocket;
use Thrift\Transport\TSocketPool;
use Thrift\Transport\TFramedTransport;
use Thrift\Transport\TBufferedTransport;


$host1 = 'localhost';
$port1 = 7912;
$socket1 = new Thrift\Transport\TSocket($host1,$port1);
$transport1 = new TBufferedTransport($socket1);
$socket1->setRecvTimeout("100000");
$protocol1 = new TBinaryProtocol($transport1);
$client1 = new MailerServerClient($protocol1);
$transport1->open();
?>
