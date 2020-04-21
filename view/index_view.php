<?php
    require('./view/html_head.php');
?>
<body>
    <?php
    require('./view/header.php');
    ?>
    <div id="contents">

        <!-- お知らせ -->
        <div id="left">
            <h4 id="green-title">お知らせ</h4>
            <div class="collection hoverable">
                <?php
                if(count($news_list) > 8){
                    for($i = 0; $i <= 8; $i++){
                        if($news_list[$i]['color'] === NULL){
                            $news_list[$i]['color'] = '';
                        }
                ?>

                    <a href="<?php echo SITE_URL.'news.php?id='.$news_list[$i]['id']; ?>" class="collection-item">
                        <?php echo $news_list[$i]['title']; ?><span class="new badge" data-badge-caption="広報"></span><BR>
                        <span class="top-news-info"><?php echo $news_list[$i]['posted_at'].' '.uid2ac_name($dbh, $news_list[$i]['contributor_id']); ?></span>
                    </a>

                <?php
                    }
                }elseif(count($news_list) !== 0){
                    foreach($news_list as $columm){ 
                        if($columm['color'] === NULL){
                            $columm['color'] = '';
                        }
                ?>

                    <a href="<?php echo SITE_URL.'news.php?id='.$columm['id']; ?>" class="collection-item">
                        <?php echo $columm['title']; ?><span class="new badge <?php echo $columm['color']; ?>" data-badge-caption="<?php echo $columm['short']; ?>"></span><BR>
                        <span class="top-news-info"><?php echo $columm['posted_at'].' '.uid2ac_name($dbh, $columm['contributor_id']); ?></span>
                    </a>

                <?php
                    }
                }else{ ?>
                    <p class="none">まだお知らせが投稿されていません</p>
                <?php } ?>
            </div>

            <!-- 右寄せのdivを作って中にaタグを入れるっぽい -->
            <div class="top-jump">
                <a href="./news.php" class="news-jump"><i class="fas fa-newspaper fa-fw"></i> もっと読む</a>
            </div>
        </div>

        <!-- アカウント情報-->
        <div id="right">
            <div id="right-up">
                <h4 id="blue-title">アカウント情報</h4>
                <div class="card grey lighten-3 hoverable">
                    <div class="card-content">
                        <?php
                        echo($ac_card);
                        ?>
                    </div>
                </div>
            </div>

            <!-- 何か入れる -->
            <div id="right-down">
                <h4 id="orange-title">ここに何かほしいよね</h4>
                <p class="none">ここになにかいれたい</p>
            </div>
        </div>
    </div> 
</body>
</html>