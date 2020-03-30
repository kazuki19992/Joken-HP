<!-- ニュース投稿画面 -->
<?php
require('./view/html_head.php');
?>
<!-- マークダウン関係 -->
<script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>

<!-- マークダウンコードハイライト -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.10/styles/github.min.css"> -->
<link rel="stylesheet" href="./CSS/github.css">
<script src="//cdn.jsdelivr.net/gh/highlightjs/cdn-release@9.16.2/build/highlight.min.js"></script>
<script src="./JS/text_md.js"></script>
<link rel="stylesheet" href="./CSS/md2html.css">


<body>
    <?php
    require('./view/header.php');
    ?>
    <div id="contents" >
        <div id="left">
            <h4 class="green-title">お知らせ投稿</h4>
            <form action="./init/db_regist.php?mode=account" method="POST" name="contentspost">
                <div id="post_op" class="row">
                    <div class="input-field col s10">
                        <input id="news_title" type="text" class="validate" name="news_title">
                        <label for="news_title">タイトルを入力(50字以内)</label>
                    </div>
                    <button class="btn-large waves-effect waves-light col s2" type="submit" name="action">投稿
                        <i class="material-icons left">send</i>
                    </button>
                    <div class="file-field input-field col s3">
                        <div class="row">
                            <div class="waves-effect waves-light btn-large orange darken-4 waves-light tooltipped col s12" 
                            data-position="bottom" 
                            data-html="true" 
                            data-tooltip="読込可能ファイル: <i class='fab fa-markdown'></i> .txt .html<BR>※読み込み前にリロードを行ってください<BR>※読み込み後はテキストエリア上でカーソル移動を行うとプレビューされます">
                                <span><i class="fab fa-markdown fa-fw"></i> 原稿を開く</span>
                                <input type="file" id="selfile" accept="text/plain, .md">
                            </div>
                        </div>
                    </div>
                    <div class="input-field col s8">
                        <select>
                            <option value="" disabled selected>選択してください</option>
                            <option value="0">外部</option>
                            <option value="1">Jokenアカウント保持者</option>
                            <option value="2">サークル内(OB含む)</option>
                            <option value="3">サークル内(OB含めず)</option>
                            <option value="4">幹部陣, 指導教員のみ</option>
                        </select>
                        <label>公開範囲</label>
                    </div>
                    <a class="waves-effect waves-light btn-large modal-trigger col s1" href="#modal1"><i class="far fa-question-circle fa-fw"></i></a>
                </div>
                <!-- <i class="fas fa-info-circle fa-fw"></i> Markdown(マークダウン)記法がわからない方は<a href="https://qiita.com/Minalinsky_1911/items/b684cfabe0f2fde0c67b" target="_blank">こちら！[Qiita]<i class="fas fa-external-link-alt fa-fw"></i></a> -->
                <?php
                require('./view/modal_howto_md.php');
                ?>
                <hr class="post" />
                <!-- 以下、テキストエリア -->
                <div class="input-field">
                    <textarea id="markdown_editor_textarea" class="materialize-textarea" name="content"></textarea>
                    <label for="markdown_editor_textarea">マークダウンで内容を記述</label>
                </div>
            </form>
        </div>

        <div id="right">
            <h4 class="blue-title">プレビュー</h4>
            <div id="markdown_preview"></div>
        </div>
    </div>
    <!-- ファイルを開く -->
    <script src="./JS/text_import.js"></script>
</body>
                
