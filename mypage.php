<?php


require('./config.php');
require('./helpers/db_helper.php');
require('./helpers/error_helper.php');
require('./helpers/extra_helper.php');
$dbh = get_db_connect();

session_start();
if(!empty($_SESSION['member'])){
    $member = $_SESSION['member'];
}else{
    header('Location: '.SITE_URL.'login.php');
    exit();
}
// var_dump($dbh);

$role = get_role($dbh, $member['role']);

require('./view/mypage_view.php');