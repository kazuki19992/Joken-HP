<?php


if(isset($_POST['site_url'])){
    $url = $_POST['site_url'];
    if(file_put_contents('../helpers/SITE_URL', $url, LOCK_EX) !== false){
        header('Location: ../initialization.php?page=2');
        exit();
    }else{
        $message = '登録処理に失敗しました。URL設定画面へ戻ります。';
    }
}else{
    $message = 'URLの取得に失敗しました。\nこのページにはURL設定画面からアクセスしてください。\nそれでも失敗する場合はシステム管理者へご連絡ください。';
}

var_dump($_POST['site_url']);

$alert = '<script type = text/javascript>alert("'.$message.'");</script>';
echo $alert;
header('Location: ../initialization.php?page=1');
