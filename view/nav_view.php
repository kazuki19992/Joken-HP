
<span id="nav-drawer">
    <input id="nav-input" type="checkbox" class="nav-unshown">
    <label id="nav-open" for="nav-input"><!--<span></span>--><i class="fas fa-bars fa-fw fa-3x"></i></label>
    <label class="nav-unshown" id="nav-close" for="nav-input"></label>
    <div id="nav-content">
        <div id="top-margin">
            <!-- <div style="color:#ffffff;">
                <center>
                    <div id="login_user"> -->
                        <?php
                            // ログイン中か確認する
                            // if(empty($_SESSION['member'])){
                            //     // ログインしていない
                            //     echo('はじめまして！<BR>');
                            //     echo('<a href="signup.php">新規会員登録</a> <a href="login.php">ログイン</a>');
                            // }else{
                            //     $name = html_escape($member['account_name']);
                            //     echo('ようこそ。'.$name.'さん。<BR>');
                            // }
                        ?>
                    <!-- </div> -->
                    <!-- <hr> -->
                <!-- </center> 
            </div> -->
        </div>
        <p class="nv_cts_extra" onclick="menu_display_toggle('nv_Link_extra', 'extra_budge')"><i class="fas fa-exclamation fa-fw"></i> 緊急速報<span class="badge" id="extra_budge"></span></p>
        <a class="nv_Link_extra tooltipped waves-effect waves-light" href="./news.php" data-position="right" data-tooltip="COVID-19(新型コロナウイルス感染症)による弊学、及び弊サークルの運営についてお知らせします"> <i class="fas fa-viruses fa-fw"></i> 新型コロナウイルス関連情報 </a>
        <!-- <a class="nv_Link_extra tooltipped waves-effect waves-light" href="./news.php" data-position="right" data-tooltip="福島県版のCOVID-19対策サイトです(別タブ)"> <i class="fas fa-info-circle fa-fw"></i> COVID-19対策サイト <i class="fas fa-external-link-alt fa-fw"></i></a>
        <a class="nv_Link_extra tooltipped waves-effect waves-light" href="./news.php" data-position="right" data-tooltip="大雨による避難情報をまとめています"> <i class="fas fa-cloud-showers-heavy"></i> 大雨情報</a> -->
        <BR>
        <p class="nv_cts0" onclick="menu_display_toggle('nv_Link', 'link_budge')"><i class="fas fa-laptop-code fa-fw"></i> サークル<span class="badge" id="link_budge"></span></p>
        <a class="nv_Link tooltipped waves-effect waves-light" href="./news.php" data-position="right" data-tooltip="情報研究会の公式情報をお知らせします"> <i class="fas fa-newspaper fa-fw"></i> お知らせ </a>
        <?php
            // ログイン中か確認する
            if(!empty($_SESSION['member'])){
                echo '<a class="nv_Link tooltipped waves-effect waves-light" href="https://nu-joken.slack.com/" target="_blank" data-position="right" data-tooltip="情報研究会の公式Slackです"> <i class="fab fa-slack fa-fw"></i> Joken公式Slack <i class="fas fa-external-link-alt fa-fw"></i></a>';
                echo '<a class="nv_Link tooltipped waves-effect waves-light" href="https://discord.gg/memPTpG" target="_blank" data-position="right" data-tooltip="情報研究会の公式Discord"> <i class="fab fa-discord fa-fw"></i> Jokenオンラインサーバー <i class="fas fa-external-link-alt fa-fw"></i></a>';
            }
        ?>
        <!-- <a class="nv_Link tooltipped waves-effect waves-light" href="" onclick="alert('この機能は今後解放予定です。\nお楽しみに！')" data-position="right" data-tooltip="情報研究会のWikiページです(現在工事中)">
            <i class="fas fa-database fa-fw"></i> Knowledge Space 
        </a> -->
        <BR>
        <p class="nv_cts1" onclick="menu_display_toggle('nv_Link1', 'link1_budge')"><i class="fas fa-user-circle fa-fw"></i> アカウント<span class="badge" id="link1_budge"></span></p>
        <?php
            // ログイン中か確認する
            if(empty($_SESSION['member'])){
                // ログインしていない
                echo('<a class="nv_Link1 tooltipped waves-effect waves-light" href="./signup.php" data-position="right" data-tooltip="ここからアカウント登録が可能です(サークル所属の学生/OBのみ)"> <i class="fas fa-user-plus fa-fw"></i> アカウント登録 </a>');
                echo('<a class="nv_Link1 tooltipped waves-effect waves-light" href="./login.php" data-position="right" data-tooltip="ログインはこちら！"> <i class="fas fa-sign-in-alt fa-fw"></i> ログイン </a>');
            }else{
                echo('<a class="nv_Link1 tooltipped waves-effect waves-light"" href="./mypage.php" data-position="right" data-tooltip="アカウント設定などもこのページから行えます"> <i class="fas fa-user-cog fa-fw"></i> マイページ </a>');
                echo('<a class="nv_Link1 tooltipped waves-effect waves-light"" href="./logout.php" data-position="right" data-tooltip="ここからログアウトが可能です"> <i class="fas fa-sign-out-alt fa-fw" data-position="right" data-tooltip="ここからログアウトできます"></i> ログアウト </a>');
            }
        ?>
        <BR>
        <p class="nv_cts2" onclick="menu_display_toggle('nv_Link2', 'link2_budge')"><i class="fas fa-meteor fa-fw"></i> その他<span class="badge" id="link2_budge"></span></p>
        <?php
            // ログイン中か確認する
            if(empty($_SESSION['member'])){
                // ログインしていない
                echo('<a class="nv_Link2 tooltipped waves-effect waves-light" href="https://www.ce.nihon-u.ac.jp/" target="_blank" data-position="right" data-tooltip="大学からの広報はこちら"> <i class="fas fa-graduation-cap fa-fw"></i> 日本大学工学部HP <i class="fas fa-external-link-alt fa-fw"></i></a>');
            }else{
                echo('<a class="nv_Link2 tooltipped waves-effect waves-light" href="" data-position="right" data-tooltip="オリジナルのWebアプリケーションを公開できます"> <i class="fas fa-laptop-code fa-fw"></i> WebAppsを公開する </a>');
            }
        ?>
        
        <a class="nv_Link2 tooltipped waves-effect waves-light" href="./about.php" data-position="right" data-tooltip="サイトについての情報を掲載しています"> <i class="fas fa-info-circle fa-fw"></i> 当サイトについて </a>
        <a class="nv_Link2 tooltipped waves-effect waves-light" href="https://github.com/kazuki19992/Joken-HP" target="_blank" rel="noopener noreferrer" data-position="right" data-tooltip="ここから開発に携われます"> <i class="fab fa-github fa-fw"></i> 当サイトのリポジトリ <i class="fas fa-external-link-alt fa-fw"></i></a>
        <BR>
        <?php
            if(!empty($_SESSION['member'])){
                if($member['role'] >= 1 || $member['role'] <= 6){
                    $nav_opt = '<p class="nv_cts3" onclick="menu_display_toggle(\'nv_Link3\', \'link3_budge\')"><i class="fas fa-tools fa-fw"></i> 管理ツール<span class="badge" id="link3_budge"></span></p>';
                    $nav_opt .= '<a class="nv_Link3 tooltipped waves-effect waves-light" href="newspost.php" data-position="right" data-tooltip="お知らせの投稿が可能です"> <i class="fas fa-newspaper fa-fw"></i> お知らせの投稿 </a>';
                    // $nav_opt .= '<a class="nv_Link3 tooltipped waves-effect waves-light" href="" data-position="right" data-tooltip="アンケートを開始することができます(機能実装予定)"> <i class="fas fa-clipboard-list fa-fw"></i> アンケートの投稿 </a>';
                    if($member['role'] !== '5'){
                        // $nav_opt .= '<a class="nv_Link3 tooltipped waves-effect waves-light" href="./edit-users.php" data-position="right" data-tooltip="ユーザー権限の変更や強制退会などを行うことが可能です"> <i class="fas fa-user-circle fa-fw"></i> ユーザーの編集 </a>';
                        $nav_opt .= '<a class="nv_Link3 tooltipped waves-effect waves-light" href="./site-setting.php" data-position="right" data-tooltip="サイトURLの変更やデータベースの設定などサイトの設定が可能です"> <i class="fas fa-sliders-h fa-fw"></i> その他のサイト設定 </a>';
                    }
                    echo $nav_opt;
                }
            }
        ?>
        
        
        
        
        <!-- <a class="nv_Link3 tooltipped waves-effect waves-light" href="./initialization.php" data-position="right" data-tooltip="デバッグ用(本番環境では表示しない)"> <i class="fas fa-power-off fa-fw"></i> 初期設定 </a> -->
        
    </div>
</span>


<script src="./JS/nav_menu_display.js"></script>
