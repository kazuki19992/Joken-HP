<?php

// 必要ファイルを読み込む
require_once('config.php');
require_once('./helpers/db_helper.php');
require_once('./helpers/extra_helper.php');
require_once('./helpers/error_helper.php');



if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name = get_post('name');
    $role = get_post('role');

    // 役職によってデータを変える
    if($role === '5'){
        $std_num = 'NODATA';
        $address = 'NODATA';
    }elseif($role === '7'){
        $std_num = get_post('std_num');
        $address = get_post('address');
    }else{

        // 不正なパラメータが渡された場合はエラーページに飛ばす
        $back_btn_flg = 2;
        $message = 'システムエラーです';
        $err_code = '200';
        $detail = 'システムエラーが発生しました<BR>
        故意にシステムエラーを発生させた場合をのぞき、システム管理者へ報告してください。';

        err_jmp(0, $message, './signup.php', $err_code,$detail);
        exit();
    }

    $password = get_post('pass');
    $ac_id = get_post('ac_id');
    $ac_name = get_post('ac_name');
    $dbh = get_db_connect();    // DB接続
    $errs = array();

    // 入力値のバリデーション
    if(!check_words($name, 20)){
        $errs['name'] = '名前入力欄は必須';
    }
    if(!check_words($std_num, 6)){
        $errs['std_num'] = '学生番号欄は必須';
    }
    if(!check_words($address, 100)){
        $errs['address'] = '住所入力欄は必須';
    }
    if(!check_words($ac_id, 10)){
        $errs['ac_id'] = 'アカウントIDは必須、10文字以内です';
    }
    if(!check_words($ac_name, 20)){
        $errs['ac_name'] = 'ユーザーネーム欄は必須、20文字以内です';
    }
    if($password === ""){
        $errs['pass'] = 'パスワードを入力してください';
    }
    
    if(acId_exists($dbh, $ac_id)){
        $errs['ac_id'] = '入力されたID('.$ac_id.')は既に登録されています';
    }



    // エラーがなければデータを挿入
    if(empty($errs)){
        if(insert_member_student($dbh, $ac_id, $ac_name, $password, $role, $std_num, $name, $address)){
            // データの挿入
            // header($location);  //ログイン画面へ遷移
            header('Location: '.SITE_URL.'login.php');
            exit;
        }
        $errs['password'] = '登録に失敗しました';
    }
}

include_once('./view/signup_view.php');    //ビューファイルの読み込み