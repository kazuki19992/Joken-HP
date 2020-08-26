<?php
    require_once('./config.php');
    require_once('./helpers/db_helper.php');
    require_once('./helpers/error_helper.php');
    require_once('./helpers/extra_helper.php');
    session_start();
    $dbh = get_db_connect();    // DB接続

    // ログイン中か確認する
    if(empty($_SESSION['member'])){
        // 未ログイン
        $ac_card = '<span class="card-title">こんにちは！</span>';
        $ac_card .= '<p>サークルの学生やOBでもっとJokenを利用したい方はここから会員登録してください！</p>';
        $ac_card .= '<p>アカウントを持っている方はログインをお願いします！</p>';
        $ac_card .= '</div><div class="card-action">';
        $ac_card .= '<a href="./signup.php" class="waves-effect waves btn-flat"><span  class="light-blue-text text-darken-4"><i class="fas fa-user-plus fa-fw"></i> アカウント登録</span></a>';
        $ac_card .= '<a href="./login.php" class="waves-effect waves btn-flat"><span  class="light-blue-text text-darken-4"><i class="fas fa-sign-in-alt fa-fw"></i> ログイン</span></a>';

        $news_list = get_news_list($dbh, TRUE, 0);
    }else{
        $member = $_SESSION['member'];
        // ログイン中
        $ac_card = '<span class="card-title"><strong>'.html_escape($member['account_name']).'</strong></span>';
        $ac_card .= '<p>アカウント情報の表示</p>';
        $ac_card .= '</div><div class="card-action">';
        $ac_card .= '<a href="./mypage.php" class="waves-effect waves btn-flat"><span  class="light-blue-text text-darken-4"><i class="fas fa-user-cog fa-fw"></i> マイページ</span></a>';

        $news_list = get_news_list($dbh, TRUE, $member['view_level']);
    }

    require('./view/index_view.php');