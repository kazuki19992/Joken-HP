<span id="nav-drawer">
    <input id="nav-input" type="checkbox" class="nav-unshown">
    <label id="nav-open" for="nav-input"><span></span></label>
    <label class="nav-unshown" id="nav-close" for="nav-input"></label>
    <div id="nav-content">
        <div id="UserInfo">
            <div style="color:#ffffff;">
                <center>
                    <div id="browser">
                        <br><br><br><br><br><br>
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
                </center>
            </div>
        </div>

        <p class="nv_cts0"><i class="fas fa-utensils"></i> 食べる</p>
        <a class="nv_Link" href="./search.php"> <i class="fas fa-newspaper"></i> What's new </a>
        <a class="nv_Link" href="./submit.php"> <i class="fas fa-microchip"></i> Tech Dojo </a>
        <a class="nv_Link" href="./apps.php"> <i class="fas fa-database"></i> オープンデータ </a>
        <BR>
        <p class="nv_cts1"><i class="fas fa-user-circle"></i> アカウント</p>
        <?php
            // ログイン中か確認する
            if(empty($_SESSION['member'])){
                // ログインしていない
                echo('<a class="nv_Link1" href="./settings.php"> <i class="fas fa-user-plus"></i> アカウント作成 </a>');
                echo('<a class="nv_Link1" href="./logout.php"> <i class="fas fa-sign-in-alt"></i> ログイン </a>');
            }else{
                echo('<a class="nv_Link1" href="./settings.php"> <i class="fas fa-user-cog"></i> アカウント設定 </a>');
                echo('<a class="nv_Link1" href="./logout.php"> <i class="fas fa-sign-out-alt"></i> ログアウト </a>');
            }
        ?>
        <BR>
        
    </div>
</span>