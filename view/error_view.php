<?php
    require('./view/html_head.php');
?>

<body>
    <div id="contents">
        <h4 id="green-title">エラー</h4>
        <p>ご迷惑をおかけして申し訳ありません。</p>
        <p>エラー：<?php echo $errmsg.'('.$errcode.')'; ?></p>

        <?php
        if ($detail !== false){
            echo '<h5 id="blue-title">詳細</h5>';
            echo '<p>'.$detail.'</p>';
        }
        ?>
        <div id="init_btn">
            <a href="<?php echo $prev; ?>" class="waves-effect waves-light btn" id="init_back"><i class="fas fa-arrow-circle-left fa-fw"></i></i>戻る</a>
            <a href="" class="btn disabled"><i class="fas fa-arrow-circle-right fa-fw"></i>次へ</a>
        </div>
    </div>
</body>
</html>