<?php
require_once('../helpers/error_helper.php');

if(isset($_POST['site_url'])){
    $url = $_POST['site_url'];
    if($url === ""){
        // URL未入力時
        $message = 'URLが入力されていません';
        $err_code = '200';
        $detail = 'URLが入力されていません。URLを入力してください。';
        err_jmp(1, $message, './initialization.php?page=1', $err_code,$detail);
        exit();
    }
    if(file_put_contents('../helpers/SITE_URL', $url, LOCK_EX) !== false){
        header('Location: ../initialization.php?page=2');
        exit();
    }else{
        $message = '登録処理に失敗しました';
        $err_code = '100';
        $detail = 'ファイルオープンに失敗しました。<BR>時間を空けてリトライしてください。';
        err_jmp(1, $message, './initialization.php?page=1', $err_code,$detail);

    }
}else{
    $message = 'URLの取得に失敗しました';
    $err_code = '002';
    $detail = 'URLの取得に失敗しました。<BR>このページにはURL設定画面からアクセスしてください。<BR>それでも失敗する場合はシステム管理者へご連絡ください。';
    err_jmp(1, $message, './initialization.php?page=1', $err_code,$detail);
}

// $alert = '<script type = text/javascript>alert("'.$message.'");</script>';
// echo $alert;
// header('Location: ../initialization.php?page=1');
