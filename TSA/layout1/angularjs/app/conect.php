<!--MENU PRINCIPAL-->
<?php
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
$GLOBALS['THRIFT_ROOT'] = '/var/www/html/qrticket/TSA-Backend/thrift-0.11.0/thrift-0.11.0/lib/php/lib';
//$GLOBALS['THRIFT_ROOT'] = 'C:\xampp\htdocs\qrticket\thrift-0.11.0\thrift-0.11.0\lib\php\lib';
require_once $GLOBALS['THRIFT_ROOT'].'/Types.php';
require_once $GLOBALS['THRIFT_ROOT'].'/CRUDServer.php';
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


$host = 'localhost';
$port = 7933;
$socket = new Thrift\Transport\TSocket($host,$port);
$transport = new TBufferedTransport($socket);
$socket->setRecvTimeout("100000");
$protocol = new TBinaryProtocol($transport);
$client = new CRUDServerClient($protocol);
$transport->open();
?>
