<?php


require('./config.php');
require('./helpers/db_helper.php');
require('./helpers/error_helper.php');
require('./helpers/extra_helper.php');
session_start();
if(!empty($_SESSION['member'])){
    $member = $_SESSION['member'];
}

require('./view/edit-users_view.php');