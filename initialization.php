<?php

// submit有効用フラグ変数(nextボタンを無効化する)
$submit = false;

// back_btn_flg バックボタンのURLの指定方法
// 0: バックボタン非表示, 1: initialization.php 2: 前ページ番号をGETで送信

// ページ番号を取得する
if(isset($_GET['page'])) {
    
    $page = $_GET['page'];
    $next = $page + 1;
    $prev = $page - 1;

    // データベース設定
    if($page === '1'){

        $back_btn_flg = 1;
        $submit = true;
        $HTML = <<< EOD
        <h4 id="green-title">URL設定</h4>
        <p>はじめに、サイトURLの設定を行います。<BR>
        Apacheに設定したドメインと同一のものを入力してください。</p>
        <p>その際、<strong>http://</strong>の入力も必要となります。<BR>
        https:// から、<strong>index.phpの存在するディレクトリまで</strong>を入力してください。</p>
        <h6 id="blue-title">入力例</h6>
        <p>ディレクトリ"Joken-HP"直下にindex.phpが存在する場合</p>
        <p><strong>http://ドメイン名.com/ディレクトリ/Joken-HP/</strong> と入力</p>
        <form action="./init/url_regist.php" method="POST">
            <div class="input-field">
                <input id="site_url" type="text" class="validate" name="site_url">
                <label for="site_url">サイトURLを入力</label>
            </div>
            <button class="btn waves-effect waves-light" type="submit" name="submit">
            <i class="fas fa-check fa-fw"></i>確定
            </button>
        </form>
        EOD;
    }elseif($page === '2'){
        $back_btn_flg = 2;
        $submit = true;
        $HTML = <<< EOD
        <h4 id="green-title">データベース設定</h4>
        <p>次に、データベースの設定を行います。</p>
        <p>JokenはMySQLに対応しています。<BR>
        次のSQLファイルをダウンロードして、データベースに設定してください。</p>
        
        EOD;
    }
}else{
    $back_btn_flg = 0;
    $next = 1;
    $HTML = <<< EOD
        <h4 id="green-title">初期設定</h4>
        <p>はじめまして。これからJokenの初期設定を行います。</p>
        <p>続けるには右下の「次へ」ボタンを押下してください。</p>
    EOD;
    // $HTML .= '<a href="'.SITE_URL.'initialization.php?page='.$next.'" class="waves-effect waves-light btn" id="init_next_btn"><i class="fas fa-arrow-circle-right fa-fw"></i>次へ</a>';

}

$HTML .= '<div id="init_btn">';
if($back_btn_flg === 1){
    $HTML .= '<a href="./initialization.php" class="waves-effect waves-light btn" id="init_back"><i class="fas fa-arrow-circle-left fa-fw"></i></i>戻る</a>';
}elseif($back_btn_flg === 2){
    $HTML .= '<a href="./initialization.php?page='.$prev.'" class="waves-effect waves-light btn" id="init_back"><i class="fas fa-arrow-circle-left fa-fw"></i></i>戻る</a>';
}


if($submit === true){
    $submit = false;
    $HTML .= '<a href="./initialization.php?page='.$next.'" class="btn disabled"><i class="fas fa-arrow-circle-right fa-fw"></i>次へ</a>';
    
}else{
    $HTML .= '<a href="./initialization.php?page='.$next.'" class="waves-effect waves-light btn"><i class="fas fa-arrow-circle-right fa-fw"></i>次へ</a>';
}
    $HTML .= '</div>';

require('./view/initialization_view.php');