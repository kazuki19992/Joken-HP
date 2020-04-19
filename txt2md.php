<?php
require_once('./config.php');
require_once('./helpers/db_helper.php');
require_once('./helpers/extra_helper.php');
require_once('./helpers/error_helper.php');
session_start();
if(!empty($_SESSION['member'])){
    $member = $_SESSION['member'];
}else{
    header('Location: ./index.php');
    exit();
}
$dbh = get_db_connect();    // DB接続


if(isset($_GET['mode'])){
    $mode = $_GET['mode'];

    $filename = md5(uniqid(mt_rand(), true)).'.md';
    if(isset($_POST['content'], $_POST['title'], $_POST['view_range'])){
        $content = $_POST['content'];
        $title = $_POST['title'];
        $view_range = $_POST['view_range'];
        $genre = $_POST['news_genre'];

        if($mode === 'news'){
            if(!post_news_wiki($dbh, 'MD/news/'.$filename, $member['id'], $title, $view_range, $mode, $genre)){
                $message = 'システムエラーが発生しました';
                $detail = 'システムエラーが発生しました。管理者に報告してください';
                err_jmp(0, $message, './newspost.php', '200', $detail);
            }
        }elseif($mode === 'wiki'){
            if(!post_news_wiki($dbh, 'MD/wiki/'.$filename, $member['id'], $title, $view_range, $mode, $genre)){
                $message = 'システムエラーが発生しました';
                $detail = 'システムエラーが発生しました。管理者に報告してください';
                err_jmp(0, $message, './newspost.php', '200', $detail);
            }
        }

        file_put_contents($filename, $content);

        header('Location: '.SITE_URL);
    }
}