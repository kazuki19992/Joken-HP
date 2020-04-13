<?php


require('./config.php');
require('./helpers/db_helper.php');
require('./helpers/error_helper.php');
require('./helpers/extra_helper.php');

session_start();
if(!empty($_SESSION['member'])){
    $member = $_SESSION['member'];
}else{
    header('Location: '.SITE_URL.'login.php');
}

require('./view/mypage_view.php');