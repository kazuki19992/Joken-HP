<?php
    require('./view/html_head.php');
?>

<body id="login_body">
    <div id="contents">
        <h4 id="green-title">おかえりなさい</h4>
        <div id="login-left">
            <br>
            <h5 id="blue-title">アカウントを持っていない場合は？</h5>
            <p>はじめまして。アカウントを持っていない方は<a href="./signin.php">こちら</a>でアカウント登録が可能です。<BR>
            アカウント登録を行うとJokenの各機能にアクセスすることが可能です。</p>
            <a class="waves-effect waves-green btn-flat">
                <i class="fas fa-user-plus fa-fw"></i> 新規会員登録(一般)を行う
            </a>
        </div>
        <div id="right">
            
            <form action="" method="POST">
                <p>IDとパスワードを入力してログインしてください。</p>
                <div class="input-field">
                    <input id="account_id" type="text" class="validate" name="ac_id">
                    <label for="account_id">ID</label>
                    <?php
                        if(isset($errs['ac_id'])){
                            $errmsg['ac_id'] = '<p><i class="fas fa-exclamation-triangle fa-fw"></i>'.$errs['ac_id'].'</p>';
                            echo $errmsg['ac_id'];
                        }
                    ?>
                </div>
                <div class="input-field">
                    <input id="password" type="password" class="validate" name="password">
                    <label for="password">パスワード</label>
                    <?php
                        if(isset($errs['password'])){
                            $errmsg['password'] = '<p><i class="fas fa-exclamation-triangle fa-fw"></i>'.$errs['password'].'</p>';
                            echo $errmsg['password'];
                        }
                    ?>
                </div>
                <button class="btn waves-effect waves-light" id="login_btn" type="submit" name="submit">
                    <i class="fas fa-sign-in-alt fa-fw"></i> ログイン
                </button>
                
            </form>
        </div>
    </div>
</body>
</html>