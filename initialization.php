<?php
require_once('./helpers/error_helper.php');
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
        <p>次に、データベースの設定を行います。(1/2)<BR>
        JokenはMySQLに対応しています。</p>
        <p>MySQLのホスト名を入力してください。<BR>
        同じマシン上でMySQLが動作している場合は<strong>localhost</strong>と入力してください。<BR>
        別なマシンで動作している場合、<strong>http://から始まるURL</strong>を入力してください</p>
        
        <form action="./initialization.php?page=3" method="POST">
            <div class="input-field">
                <input id="site_url" type="text" class="validate" name="db_host">
                <label for="site_url">データベースのホスト名を入力</label>
            </div>
            <button class="btn waves-effect waves-light" type="submit" name="submit">
            <i class="fas fa-check fa-fw"></i>確定
            </button>
        </form>
        
        EOD;
    }elseif($page === '3'){
        if(isset($_POST['db_host'])){
            $dbhost = $_POST['db_host'];

            $back_btn_flg = 2;
            $submit = true;
            $HTML = <<< EOD
            <h4 id="green-title">データベース設定</h4>
            <p>次に、データベースの設定を行います。(2/2)<BR>
            JokenはMySQLに対応しています。</p>
            <p>MySQLに設定したデータベース名を入力してください。</p>
            
            <form action="./init/db_regist.php?mode=name_host" method="POST">
                <input type="hidden" value="{$dbhost}" name="db_host">
                <div class="input-field">
                    <input id="site_url" type="text" class="validate" name="db_name">
                    <label for="site_url">データベース名を入力</label>
                </div>
                <button class="btn waves-effect waves-light" type="submit" name="submit">
                <i class="fas fa-check fa-fw"></i>確定
                </button>
            </form>
            
            EOD;
        }else{

            $back_btn_flg = 2;
            $submit = true;
            $message = 'ホスト名の取得に失敗しました。もう一度入力してください。繰り返し発生する場合はシステム管理者へ報告してください。';
            $err_code = '003';
            $detail = 'POST通信でホスト名の取得に失敗しました。システム管理者へ報告してください。';

            err_jmp(0, $message, './initialization.php?page='.$prev, $err_code,$detail);
            exit();
        }
    }elseif($page === '4'){
        // DBアカウント設定
        $prev--;
        $back_btn_flg = 2;
        $submit = true;
        $HTML = <<< EOD
        <h4 id="green-title">データベースアカウント設定</h4>
        <p>次に、データベースアカウントの設定を行います。<BR>
        MySQLに設定してあるアカウントを入力してください。</p>
        
        <form action="./init/db_regist.php?mode=account" method="POST">
            <div class="input-field">
                <input id="site_url" type="text" class="validate" name="ac_name">
                <label for="site_url">アカウント名</label>
            </div>
            <div class="input-field">
                <input id="password" type="text" class="validate" name="password">
                <label for="password">パスワード</label>
            </div>
            <button class="btn waves-effect waves-light" type="submit" name="submit">
            <i class="fas fa-check fa-fw"></i>確定
            </button>
        </form>
        
        EOD;
    }elseif($page === '5'){
        // 管理者設定
        $back_btn_flg = 2;
        $submit = true;
        $HTML = <<< EOD
        
        <script>
        $(document).ready(function() {
            // initialize
            $('input#input_text, textarea#textarea1').characterCounter();
            
            // need this!!
            $('div.input-field span:last-child').remove();
        });
        $(document).ready(function(){
            $('select').formSelect();
        });
        </script>
        <h4 id="green-title">管理者設定</h4>
        <p>管理者アカウントの設定を行います。(1/2)</p>
        <p>個人情報はサークル運営にのみ使用するものとします。</p>
        
        <form action="./initialization.php?page=6" method="POST">
        <h5 class="blue-title">個人情報設定</h4>
            <div class="row">
                <div class="input-field col s6">
                    <input id="name" type="text" class="validate" name="name">
                    <label for="name">名前</label>
                </div>
                <div class="input-field col s6">
                    <input id="std_num" type="text" class="validate" name="std_num" data-length="6">
                    <label for="std_num">学生番号(学部生:6桁, 院生:5桁)</label>
                </div>
                <div class="input-field col s12">
                    <input id="address" type="text" class="validate" name="address">
                    <label for="address">現住所</label>
                </div>
                <div class="input-field col s12">
                    <select name="role">
                        <option value="" disabled selected>選択してください</option>
                        <option value="1">会長</option>
                        <option value="2">副会長</option>
                        <option value="3">会計</option>
                        <option value="4">その他幹部陣(各班長含む)</option>
                        <option value="5">指導教員</option>
                    </select>
                    <label>あなたの役職</label>
                </div>

            </div>
            <button class="btn waves-effect waves-light" type="submit" name="submit">
            <i class="fas fa-check fa-fw"></i>確定
            </button>
        </form>
        
        EOD;
    }elseif($page === '6'){
        if(isset($_POST['name'], $_POST['std_num'], $_POST['address'], $_POST['role'])){
            $name = $_POST['name'];
            $std_num = $_POST['std_num'];
            $address = $_POST['address'];
            $role = $_POST['role'];

            // 異常値検出時にtrue
            $errflg200 = FALSE;
            
            // バリデーション(空文字)
            if($name === "" || $std_num === "" || $address === ""){
                $errflg200 = TRUE;
            }
            
            // バリデーション(文字数)
            if(mb_strlen($std_num, 'UTF-8') > 6 || mb_strlen($std_num, 'UTF-8') < 5){
                $errflg200 = TRUE;
            }

            // バリデーション(role)
            if($role !== '1' && $role !== '2' && $role !== '3' && $role !== '4' && $role !== '5'){
                $errflg200 = TRUE;
            }

            // エラー有効時にエラー画面表示
            if($errflg200){
                $back_btn_flg = 2;
                $submit = true;
                $message = 'パラメータに異常値が含まれています';
                $err_code = '200';
                $detail = 'パラメータに異常値が含まれています。<BR>
                空欄のまま確定ボタンを押した場合や、文字数が規定値外の場合、データが改竄されている場合に表示されます。<BR>
                それ以外でこの画面が表示された場合はシステム管理者へ報告してください。';

                err_jmp(0, $message, './initialization.php?page='.$prev, $err_code,$detail);
                exit();
            }

            // 管理者アカウント設定
            $back_btn_flg = 2;
            $submit = true;
            $HTML = <<< EOD
            
            <script>
            $(document).ready(function() {
                // initialize
                $('input#input_text, textarea#textarea1').characterCounter();
                
                // need this!!
                $('div.input-field span:last-child').remove();
            });
            $(document).ready(function(){
                $('select').formSelect();
            });
            </script>
            <h4 id="green-title">管理者設定</h4>
            <p>管理者アカウントの設定を行います。(2/2)</p>
            <p>このページでは管理者のJokenアカウントの設定を行います</p>
            
            <form action="./init/account_regist.php" method="POST">
                <input type="hidden" value="{$name}" name="name">
                <input type="hidden" value="{$std_num}" name="std_num">
                <input type="hidden" value="{$address}" name="address">
                <input type="hidden" value="{$role}" name="role">

                <h5 class="blue-title">管理者アカウント設定</h4>
                <div class="row">
                    <div class="input-field col s6">
                        <input id="name" type="text" class="validate" name="ac_name" data-length="20">
                        <label for="name">アカウント名(20字以内)</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="id" type="text" class="validate" name="ac_id" data-length="10">
                        <label for="id">アカウントID(10字以内)</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="address" type="password" class="validate" name="password">
                        <label for="password">パスワード</label>
                    </div>
                    <div class="input-field col s12">
                        <select name="role">
                            <option value="" disabled selected>選択してください</option>
                            <option value="1">会長</option>
                            <option value="2">副会長</option>
                            <option value="3">会計</option>
                            <option value="4">その他幹部陣(各班長含む)</option>
                            <option value="5">指導教員</option>
                        </select>
                        <label>あなたの役職</label>
                    </div>

                </div>
                <button class="btn waves-effect waves-light" type="submit" name="submit">
                <i class="fas fa-check fa-fw"></i>確定
                </button>
            </form>
            
            EOD;

        }else{

            $back_btn_flg = 2;
            $submit = true;
            $message = 'パラメータが不足しています。';
            $err_code = '005';
            $detail = 'POST通信で個人情報の取得に失敗しました。<BR>
            URLから直接アクセスした場合にこの画面が表示されます。<BR>
            それ以外でこの画面が表示された場合はシステム管理者へ報告してください。';

            err_jmp(0, $message, './initialization.php?page='.$prev, $err_code,$detail);
            exit();
        }

    }elseif($page === '7'){
        // 完了
        $back_btn_flg = 0;
        $submit = true;
        $HTML = <<< EOD
        <h4 id="green-title">セットアップ完了！</h4>
        <p>セットアップが完了しました！お疲れ様でした！早速はじめましょう！</p>
        <a href="./index.php" class="waves-effect waves-light btn"><i class="fas fa-arrow-circle-right fa-fw"></i>はじめる</a>
        EOD;
    }
}else{
    $back_btn_flg = 0;
    $next = 1;
    $HTML = <<< EOD
        <h4 id="green-title">Jokenセットアップウィザード</h4>
        <p>はじめまして。これからJokenの初期設定を行います。<BR>
        以下の項目のセットアップを行います</p>
        <ol>
            <li>サイトURL設定</li>
            <li>データベースホスト設定</li>
            <li>データベース名設定</li>
            <li>データベースアカウント設定</li>
            <li>Joken管理者設定</li>
        </ol>
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