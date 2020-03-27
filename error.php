<?php

if(isset($_POST['errcode'])){
    $errmsg = $_POST['errmsg'];
    $prev = $_POST['prev'];
    $errcode = $_POST['errcode'];
    if(isset($_POST['detail'])){
        $detail = $_POST['detail'];
    }else{
        $detail = false;
    }

}else{
    $errmsg = 'エラーを取得できません';
    $errcode = '000';
    $prev = './index.php';
    $detail = 'エラーをPOSTで取得できませんでした。<BR>
    これは当ページへ直接URL指定などでアクセスした場合表示されるエラーです。<BR>
    <BR>
    URLからこのページへアクセスしていない場合、システム管理者へ報告してください。';
}

require('./view/error_view.php');