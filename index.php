<?php
    require_once('./config.php');
    // ログイン中か確認する
    if(empty($_SESSION['member'])){
        // 未ログイン
        $ac_card = '<span class="card-title">はじめてですか？</span>';
        $ac_card .= '<p>こんにちは！Jokenをもっと利用する場合はアカウント登録を行ってください！</p>';
        $ac_card .= '<p>おや、はじめてではないですか？失礼しました。ログインをお願いします！</p>';
        $ac_card .= '</div><div class="card-action">';
        $ac_card .= '<a href="./signup.php" class="waves-effect waves-teal btn-flat"><span  class="light-blue-text text-darken-4"><i class="fas fa-user-plus fa-fw"></i> アカウント登録</span></a>';
        $ac_card .= '<a href="./login.php" class="waves-effect waves-teal btn-flat"><span  class="light-blue-text text-darken-4"><i class="fas fa-sign-in-alt fa-fw"></i> ログイン</span></a>';
    }else{
        // ログイン中
        $ac_card = '<span class="card-title">ユーザー名</span>';
        $ac_card .= '<p>アカウント情報の表示</p>';
        $ac_card .= '</div><div class="card-action">';
        $ac_card .= '<a href="#" class="waves-effect waves-teal btn-flat"><span  class="light-blue-text text-darken-4"><i class="fas fa-user-cog fa-fw"></i> アカウント設定</span></a>';

    }

    require('./view/index_view.php');