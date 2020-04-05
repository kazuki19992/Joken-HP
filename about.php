<?php

require_once('./config.php');
session_start();
if(!empty($_SESSION['member'])){
    $member = $_SESSION['member'];
}

require('./view/about_view.php');