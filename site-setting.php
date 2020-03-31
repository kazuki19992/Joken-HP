<?php

require('./config.php');
require('./helpers/db_helper.php');
require('./helpers/error_helper.php');
require('./helpers/extra_helper.php');

if(isset($_GET['mode'])){
    $mode = $_GET['mode'];
    if($mode === 'site_url'){

        // サイトURL設定
        if(isset($_POST['site_url'])){
            $url = $_POST['site_url'];
            if($url === ""){
                // URL未入力時
                $message = 'URLが入力されていません';
                $err_code = '200';
                $detail = 'URLが入力されていません。URLを入力してください。';
                err_jmp(1, $message, './site-setting.php', $err_code,$detail);
                exit();
            }
            if(file_put_contents('./helpers/SITE_URL', $url, LOCK_EX) !== false){
                header('Location: ./site-setting.php');
                exit();
            }else{
                $message = '登録処理に失敗しました';
                $err_code = '100';
                $detail = 'ファイルオープンに失敗しました。<BR>時間を空けてリトライしてください。';
                err_jmp(1, $message, './site-setting.php', $err_code,$detail);
        
            }
        }else{
            $message = 'URLの取得に失敗しました';
            $err_code = '002';
            $detail = 'URLの取得に失敗しました。<BR>このページにはURL設定画面からアクセスしてください。<BR>それでも失敗する場合はシステム管理者へご連絡ください。';
            err_jmp(1, $message, './site-setting.php', $err_code,$detail);
        }

    }elseif($mode === 'dsn'){

        // DSN設定
        
    }elseif($mode === 'account'){

    }else{
        $message = '不正なパラメータが渡されました';
        $errcode = '200';
        $detail = '不正なパラメータが渡されました。URLからの直接入力でアクセスした場合に表示されるエラーです。<BR>
        それ以外の場合でエラーが表示された場合はシステム管理者へ報告してください。';
        $prev = './site-setting.php';
        err_jmp(0, $message, $prev, $errcode, $detail);
        exit();
    }
}else{
    require('./view/site-setting_view.php');
}

