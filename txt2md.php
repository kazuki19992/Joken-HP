<?php
require_once('./config.php');
require_once('./helpers/db_helper.php');
require_once('./helpers/extra_helper.php');


if(isset($_GET['mode'])){
    $mode = $_GET['mode'];

    $filename = md5(uniqid(mt_rand(), true)).'.md';

    if(isset($_POST['content'])){
        $content = $_POST['content'];
        if($mode === 'news'){
            $filename = './MD/news/'.$filename;
        }elseif($mode === 'wiki'){
            $filename = './MD/wiki/'.$filename;
        }

        file_put_contents($filename, $content);

        header('Location: '.SITE_URL);
    }
}