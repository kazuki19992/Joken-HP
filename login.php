<?php

// 必要ファイルを読み込む
require_once('config.php');
require_once('./helpers/db_helper.php');
require_once('./helpers/extra_helper.php');

session_start();    // セッションを開始する

// ログインしていた場合
// 既にログイン済みならapps.phpにリダイレクト
if(!empty($_SESSION['member'])){
    header('Location: '.SITE_URL.'apps.php');
    exit;
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $student_number = get_post('student_number');
    $password = get_post('password');

    $dbh = get_db_connect();    // DB接続
    $errs = array();

    if(!student_number_exists($dbh, $student_number)){
        $errs['student_number'] = 'この学生番号は登録されていません';
    // }elseif(!filter_var($student_number, FILTER_VALIDATE_student_number)){
    //     $errs['student_number'] = 'メールアドレスの形式が正しくありません';
    }elseif(!check_words($student_number, 10)){
        $errs['student_number'] = '学生番号欄は必須、10文字以内で入力してください';
    }

    if(!check_words($password, 50)) {
        $errs['password'] = 'パスワードは必須、50文字以内で入力してください';
    }


    // メールアドレスとパスワードが一致するか検証する
    if(!check_words($password, 50)){
        $errs['password'] = 'パスワードは必須、50文字以内で入力してください';
    }elseif(!$member = select_member($dbh, $student_number, $password)){
        $errs['password'] = 'パスワードと学生番号が正しくありません';
    }
    
    // ログインする
    if(empty($errs)){
        session_regenerate_id(true);        // セッションIDの変更
        // セッションIDが盗まれていた場合
        // なりすましによる不正な操作を防ぐために
        // ログイン直前にセッションIDを切り替える！！

        $_SESSION['member'] = $member;      // ログイン
        header('Location: '.SITE_URL.'apps.php');   // 会員ページへリダイレクト
        exit;
    }
}

include_once('./views/login_view.php');     //ビューファイルの読み込み