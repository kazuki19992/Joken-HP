<?php

$filename = './helpers/DB_DSN';
$fp = fopen($filename, 'r');
if($fp === FALSE){
    header('Location: ./initialization.php');
    exit();
}
$dsn = fgets($fp);
define('DSN', $dsn);
fclose($fp);

$filename = './helpers/DB_ACCOUNT';
$fp = fopen($filename, 'r');
if($fp === FALSE){
    header('Location: ./initialization.php');
    exit();
}
$db_user = fgets($fp);
$db_password = fgets($fp);
define('DB_USER', $db_user);
define('DB_PASSWORD', $db_password);
fclose($fp);

$filename = './helpers/SITE_URL';
$fp = fopen($filename, 'r');
if($fp === FALSE){
    header('Location: ./initialization.php');
    exit();
}
$site_url = fgets($fp);
define('SITE_URL', $site_url);

error_reporting(E_ALL & ~E_NOTICE);     // E_NOTICE以外のエラーをすべて出力する
// 開発時はerror_reporting(E_ALL & ~E_NOTICE)としてE_NOTICE以外のエラーをすべて出力し、
// 公開時はerror_reporting(0)としてエラーを出力しないようにする

session_set_cookie_params(1440, '/');   // セッションの設定をする
// 第一引数がセッションの有効期限
// 第二引数が有効範囲('/'と記述すれば全範囲でセッションが有効になる)
