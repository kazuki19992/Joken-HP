<span id="nav-drawer">
    <input id="nav-input" type="checkbox" class="nav-unshown">
    <label id="nav-open" for="nav-input"><!--<span></span>--><i class="fas fa-bars fa-fw fa-3x"></i></label>
    <label class="nav-unshown" id="nav-close" for="nav-input"></label>
    <div id="nav-content">
        <!-- <div id="UserInfo"> -->
            <div style="color:#ffffff;">
                <center>
                    <div id="login_user">
                        <?php
                            // ログイン中か確認する
                            if(empty($_SESSION['member'])){
                                // ログインしていない
                                echo('はじめまして！<BR>');
                                echo('<a href="signup.php">新規会員登録</a> <a href="login.php">ログイン</a>');
                            }else{
                                $name = html_escape($member['name']);
                                echo('ようこそ。'.$name.'さん。<BR>');
                            }
                        ?>
                    </div>
                    <hr>
                </center>
            <!-- </div> -->
        </div>

        <p class="nv_cts0"><i class="fas fa-laptop-code fa-fw"></i> サークル</p>
        <a class="nv_Link tooltipped waves-effect waves-light" href="./news.php" data-position="right" data-tooltip="情報研究会の公式情報をお知らせします"> <i class="fas fa-newspaper fa-fw"></i> お知らせ </a>
        <a class="nv_Link tooltipped waves-effect waves-light" href="" onclick="alert('この機能は今後解放予定です。\nお楽しみに！')" data-position="right" data-tooltip="情報研究会のWikiページです(現在工事中)">
            <i class="fas fa-database fa-fw"></i> Knowledge Space 
        </a>
        <BR>
        <p class="nv_cts1"><i class="fas fa-user-circle fa-fw"></i> アカウント</p>
        <?php
            // ログイン中か確認する
            if(empty($_SESSION['member'])){
                // ログインしていない
                echo('<a class="nv_Link1 tooltipped waves-effect waves-light" href="./signin.php" data-position="right" data-tooltip="ここからアカウント登録が可能です(サークル所属の学生/OBのみ)"> <i class="fas fa-user-plus fa-fw"></i> アカウント登録 </a>');
                echo('<a class="nv_Link1 tooltipped waves-effect waves-light" href="./login.php" data-position="right" data-tooltip="ログインはこちら！"> <i class="fas fa-sign-in-alt fa-fw"></i> ログイン </a>');
            }else{
                echo('<a class="nv_Link1 tooltipped waves-effect waves-light"" href="./settings.php" data-position="right" data-tooltip="アカウント設定などもこのページから行えます"> <i class="fas fa-user-cog fa-fw"></i> マイページ </a>');
                echo('<a class="nv_Link1 tooltipped waves-effect waves-light"" href="./logout.php"> <i class="fas fa-sign-out-alt fa-fw" data-position="right" data-tooltip="ここからログアウトできます"></i> ログアウト </a>');
            }
        ?>
        <BR>
        <p class="nv_cts2"><i class="fas fa-meteor fa-fw"></i> その他</p>
        <a class="nv_Link2 tooltipped waves-effect waves-light" href="./about.php" data-position="right" data-tooltip="サイトについての情報を掲載しています"> <i class="fas fa-info-circle fa-fw"></i> 当サイトについて </a>
        <a class="nv_Link2 tooltipped waves-effect waves-light" href="https://github.com/kazuki19992/Joken-HP" target="_blank" rel="noopener noreferrer" data-position="right" data-tooltip="ここから開発に携われます"> <i class="fab fa-github fa-fw"></i> 当サイトのリポジトリ <i class="fas fa-external-link-alt fa-fw"></i></a>
        <BR>
        <p class="nv_cts3"><i class="fas fa-tools fa-fw"></i> 管理ツール</p>
        <a class="nv_Link3 tooltipped waves-effect waves-light" href="" data-position="right" data-tooltip="ユーザー権限の変更や強制退会などを行うことが可能です"> <i class="fas fa-user-circle fa-fw"></i> ユーザーの編集 </a>
        <a class="nv_Link3 tooltipped waves-effect waves-light" href="newspost.php" data-position="right" data-tooltip="お知らせの投稿が可能です"> <i class="fas fa-newspaper fa-fw"></i> お知らせの投稿 </a>
        <a class="nv_Link3 tooltipped waves-effect waves-light" href="" data-position="right" data-tooltip="アンケートを開始することができます(機能実装予定)"> <i class="fas fa-clipboard-list fa-fw"></i> アンケートの投稿 </a>
        <a class="nv_Link3 tooltipped waves-effect waves-light" href="./site-setting.php" data-position="right" data-tooltip="サイトURLの変更やデータベースの設定などサイトの設定が可能です"> <i class="fas fa-sliders-h fa-fw"></i> その他のサイト設定 </a>
        <a class="nv_Link3 tooltipped waves-effect waves-light" href="./initialization.php" data-position="right" data-tooltip="デバッグ用(本番環境では表示しない)"> <i class="fas fa-power-off fa-fw"></i> 初期設定 </a>
        
    </div>
</span>