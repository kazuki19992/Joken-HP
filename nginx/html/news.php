<?php

require_once('./config.php');
require_once('./helpers/db_helper.php');
require_once('./helpers/error_helper.php');
require_once('./helpers/extra_helper.php');

// mdをphpにパースするライブラリ
require_once("lib/Michelf/Markdown.inc.php");
use Michelf\Markdown;

session_start();
$dbh = get_db_connect();    // DB接続



if(!empty($_SESSION['member'])){
    $member = $_SESSION['member'];
    $news_list = get_news_list($dbh, TRUE, $member['view_level']);
}else{
    $news_list = get_news_list($dbh, TRUE, 0);
}

// if(isset($data['view_level'])){

if(isset($_GET['id'])){
    $news_id = $_GET['id'];
    $news_data = get_news($dbh, $news_id);

    $news_md = file_get_contents('./'.$news_data['md_pass']);
    $news_html = Markdown::defaultTransform($news_md);
}else{
    $news_id = NULL;
}

require('./view/news_view.php');