<?php
$container->set('db_settings', function(){
    return (object)[
        "DB_HOST" => "104.154.225.61",//localhost PROD
        "DB_USER" => "qrticket-admin",
        "DB_PASS" => "qrt1ck3t@dm1n",
        "DB_NAME" => "qr_corp",
        "DB_CHARSET" => "utf8",
    ];
});
