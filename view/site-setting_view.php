<!-- サイト設定画面 -->
<?php
require('./view/html_head.php');
?>
<body>
    <?php
    require('./view/header.php');
    ?>
    <div id="contents" >
        <div id="left">
            <h4 class="green-title">サイト設定</h4>

            <!-- URL設定カード -->
            <div class="card grey lighten-3 hoverable">
                <form action="" method="post">
                    <div class="card-content">
                        <span class="card-title">URL設定</span>
                        <p>サイトのルートURLを変更します</p>
                        <p>現在の設定：<strong><?php echo SITE_URL; ?></strong></p>

                        <div class="input-field">
                            <input id="site_url" type="text" class="validate" name="site_url">
                            <label for="site_url">サイトURLを指定</label>
                        </div>

                    </div>
                    <div class="card-action">
                        <button class="btn-flat waves-effect waves-teal" type="submit" name="action">
                            <i class="fas fa-check fa-fw"></i> 変更する
                        </button>
                    </div>
                </form>
            </div>

            <!-- DB_DSN設定カード -->
            <div class="card grey lighten-3 hoverable">
                <form action="" method="post">
                    <div class="card-content">
                        <span class="card-title">データベース設定(DSN)</span>
                        <p>データベースのホスト名とデータベース名を変更します</p>

                        <div class="input-field">
                            <input id="db_host" type="text" class="validate" name="db_host">
                            <label for="db_host">データベースホストを指定</label>
                        </div>
                        <div class="input-field">
                            <input id="db_name" type="text" class="validate" name="db_name">
                            <label for="db_name">データベース名を指定</label>
                        </div>

                    </div>
                    <div class="card-action">
                        <button class="btn-flat waves-effect waves-teal" type="submit" name="action">
                            <i class="fas fa-check fa-fw"></i> 変更する
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div id="right-padding">
            <div class="card grey lighten-3 hoverable">
                <form action="" method="post">
                    <div class="card-content">
                        <span class="card-title">データベース設定(アカウント)</span>
                        <p>データベースにアクセスするユーザー名とパスワードを変更します</p>

                        <div class="input-field">
                            <input id="db_user" type="text" class="validate" name="db_user">
                            <label for="db_user">ユーザー名</label>
                        </div>
                        <div class="input-field">
                            <input id="db_pass" type="password" class="validate" name="db_pass">
                            <label for="db_pass">パスワード</label>
                        </div>

                    </div>
                    <div class="card-action">
                        <button class="btn-flat waves-effect waves-teal" type="submit" name="action">
                            <i class="fas fa-check fa-fw"></i> 変更する
                        </button>
                    </div>
                </form>
            </div>
        </div>