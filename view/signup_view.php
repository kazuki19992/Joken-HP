<?php
    require('./view/html_head.php');
?>

<body>
    <div id="contents">
        <h4 class="green-title">アカウント登録</h4>
        <p>はじめまして。このページでアカウント登録が可能です。</p>
        <p>入力された個人情報はサークル運営にのみ使用いたします</p>
        <form action="" method="POST">
            <div class="row">
                <h5 class="blue-title">個人情報設定</h5>
                <div class="input-field col s6">
                    <input id="name" type="text" class="validate" name="name">
                    <label for="name">名前</label>
                    <?php
                        if(isset($errs['name'])){
                            $errmsg['name'] = '<p><i class="fas fa-exclamation-triangle fa-fw"></i>'.$errs['name'].'</p>';
                            echo $errmsg['name'];
                        }
                    ?>
                </div>

                <div class="col s6">
                    <label>あなたの属性</label>
                    <select name="role" class="browser-default" id="role">
                        <option value="" disabled selected>選択してください</option>
                        <option value="7" onclick="setDisabled(false)">学生</option>
                        <option value="5" onclick="setDisabled(true)">卒業生</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6" id="std_num_input">
                    <input id="std_num" type="text" class="validate" name="std_num" data-length="6">
                    <label for="std_num">学生番号(学部生:6桁, 院生:5桁)</label>
                    <?php
                        if(isset($errs['std_num'])){
                            $errmsg['std_num'] = '<p><i class="fas fa-exclamation-triangle fa-fw"></i>'.$errs['std_num'].'</p>';
                            echo $errmsg['std_num'];
                        }
                    ?>
                </div>


                <div class="input-field col s6" id="address_input">
                    <input id="address" type="text" class="validate" name="address">
                    <label for="address">現住所</label>
                    <?php
                        if(isset($errs['address'])){
                            $errmsg['address'] = '<p><i class="fas fa-exclamation-triangle fa-fw"></i>'.$errs['address'].'</p>';
                            echo $errmsg['address'];
                        }
                    ?>
                </div>
            </div>
            <div class="row">
                <h5 class="blue-title">アカウント設定</h5>
                <div class="input-field col s6">
                    <input id="ac_id" type="text" class="validate" name="ac_id">
                    <label for="ac_id">アカウントID(10字以内)</label>
                    <?php
                        if(isset($errs['ac_id'])){
                            $errmsg['ac_id'] = '<p><i class="fas fa-exclamation-triangle fa-fw"></i>'.$errs['ac_id'].'</p>';
                            echo $errmsg['ac_id'];
                        }
                    ?>
                </div>
                <div class="input-field col s6">
                    <input id="ac_name" type="text" class="validate" name="ac_name">
                    <label for="ac_name">アカウント名(20字以内)</label>
                    <?php
                        if(isset($errs['ac_name'])){
                            $errmsg['ac_name'] = '<p><i class="fas fa-exclamation-triangle fa-fw"></i>'.$errs['ac_name'].'</p>';
                            echo $errmsg['ac_name'];
                        }
                    ?>
                </div>
                <div class="input-field col s12">
                    <input id="pass" type="password" class="validate" name="pass">
                    <label for="pass">ログインパスワード</label>
                    <?php
                        if(isset($errs['pass'])){
                            $errmsg['pass'] = '<p><i class="fas fa-exclamation-triangle fa-fw"></i>'.$errs['pass'].'</p>';
                            echo $errmsg['pass'];
                        }
                    ?>
                </div>
            </div>
            <button class="btn waves-effect waves-light" type="submit" name="submit">
            <i class="fas fa-check fa-fw"></i>確定
            </button>
        </form>
    </div>
    <script src="./JS/signup_functions.js"></script>
</body>
</html>