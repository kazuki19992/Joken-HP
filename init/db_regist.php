<?php
require_once('./init_func.php');
require_once('../helpers/error_helper.php');

if(isset($_GET['mode'])){
    $mode = $_GET['mode'];

    // データベースのホスト, データベース名をDB_DSNに保存
    if($mode === 'name_host'){
        if(isset($_POST['db_host']) && isset($_POST['db_name'])){
            $dbhost = $_POST['db_host'];
            $dbname = $_POST['db_name'];
            if($dbhost === "" || $dbname === ""){
                // 空文字チェック
                $message = 'データベースホストかデータベース名が入力されていません';
                $err_code = '200';
                $detail = 'データベース名かデータベースのホストが入力されていません。';
                err_jmp(1, $message, './initialization.php?page=2', $err_code,$detail);
                exit();
            }

            $dsn = 'mysql:dbname='.$dbname.';host='.$dbhost.';charset=utf8';
            if(regist_fwrite('../helpers/DB_DSN', $dsn) === 0){
                header('Location: ../initialization.php?page=4');
                exit();
            }else{
                $message = '登録処理に失敗しました';
                $err_code = '100';
                $detail = 'ファイルオープンに失敗しました。<BR>時間を空けてリトライしてください。';
                err_jmp(1, $message, './initialization.php?page=2', $err_code,$detail);
            }
        }else{
            $message = 'ホスト名もしくはデータベース名の取得に失敗しました';
            $err_code = '003';
            $detail = 'ホスト名もしくはデータベース名の取得に失敗しました。<BR>このページにはデータベース設定画面からアクセスしてください。<BR>それでも失敗する場合はシステム管理者へご連絡ください。';
            err_jmp(1, $message, './initialization.php?page=2', $err_code,$detail);
        }
    }elseif($mode === 'account'){
        // アカウント名とパスワードをDB_ACCOUNTに保存
        if($_POST['ac_name']){
            $ac_name = $_POST['ac_name'];
            $password = $_POST['password'];
            $data = $ac_name."\n".$password;
            if(file_put_contents('../helpers/DB_ACCOUNT', $data, LOCK_EX) !== false){
                header('Location: ../initialization.php?page=5');
                exit();
            }else{
                $message = '登録処理に失敗しました';
                $err_code = '100';
                $detail = 'ファイルオープンに失敗しました。<BR>時間を空けてリトライしてください。';
                err_jmp(1, $message, './initialization.php?page=4', $err_code,$detail);
            }
        }else{
            $message = 'アカウント名の取得に失敗しました';
            $err_code = '004';
            $detail = 'アカウント名の取得に失敗しました。<BR>このページにはデータベースアカウント設定画面からアクセスしてください。<BR>それでも失敗する場合はシステム管理者へご連絡ください。';
            err_jmp(1, $message, './initialization.php?page=4', $err_code,$detail);
        }
    }else{
        $message = '異常なパラメータが渡されました';
        $err_code = '200';
        $detail = 'このページへのアクセスに必要なGETパラメータに異常な値が渡されました。<BR>詳しくはシステム管理者へお問い合わせください。';
        err_jmp(1, $message, './index.php', $err_code,$detail);
    }
}else{
    $message = 'パラメータが不足しています';
    $err_code = '001';
    $detail = 'このページへのアクセスに必要なGETパラメータが不足しています。<BR>詳しくはシステム管理者へお問い合わせください。';
    err_jmp(1, $message, './index.php', $err_code,$detail);
}

