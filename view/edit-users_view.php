<?php
require('./view/html_head.php');
?>

<body>
    <?php
    require('./view/header.php');
    ?>
    <div id="contents" >
        <h4 class="green-title">ユーザー設定</h4>
        <form action="" method="post">

            <div class="row">
                <div class="input-field col s6">
                    <select>
                        <option value="" disabled selected>選択してください</option>
                        <option value="1">全メンバー</option>
                        <option value="2">サークル所属の学部生, 院生</option>
                        <option value="3">幹部陣, 指導教員</option>
                    </select>
                    <label>検索条件</label>
                </div>
            </div>
            <a class="waves-effect waves-light btn modal-trigger" href="#modal1"><i class="fas fa-file-csv fa-fw"></i> CSV出力</a>
        </form>

        <!-- モーダルウインドウ -->
        <div id="modal1" class="modal">
            <div class="modal-content">
                <h4 class="blue-title">CSV出力</h4>
                <p>出力するCSVを選択してください</p>
                <center>
                    <a class="waves-effect waves-light btn col s6" href=""><i class="fas fa-file-csv fa-fw"></i> 新会員のみ(年度初め学生課提出)</a>
                    <a class="waves-effect waves-light btn col s6" href=""><i class="fas fa-file-csv fa-fw"></i> サークルメンバー全員(年度末学生課提出) </a>
                </center>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect waves-green btn-flat"><i class="far fa-window-close fa-fw"></i> 閉じる</a>
            </div>
        </div>

        <table>
            <tr>
                <th>No.</th>
                <th>本名</th>
                <th>ユーザー名(ID)</th>
                <th>権限</th>
                <th>削除</th>
            </tr>
            <tr>
                <td>1</td>
                <td>櫛田一樹</td>
                <td>カズ之助 (kazuki19992)</td>
                <td>会長</td>
            </tr>
        </table>