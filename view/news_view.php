<!-- ニュース画面 -->
<?php
require('./view/html_head.php');
?>
<body>
    <?php
    require('./view/header.php');
    ?>
    <div id="contents" class="flexbox">

        <div id="wiki-left">
            <h4 id="green-title">過去の投稿記事</h4>
            <div class="collection hoverable">
                <?php foreach($news_list as $columm){?>
                <a href="<?php echo SITE_URL.'news.php?id='.$columm['id']; ?>" class="collection-item">
                    <?php echo $columm['title']; ?><span class="new badge <?php echo $columm['color']; ?>" data-badge-caption="<?php echo $columm['short']; ?>"></span><BR>
                    <span class="top-news-info"><?php echo $columm['posted_at'].' / '.uid2ac_name($dbh, $columm['contributor_id']); ?></span>
                </a>
                <?php } ?>
            </div>
        </div>

        <div id="wiki-right">
            <h4 id="blue-title">
                <?php
                if(isset($news_id)){
                    $news_title = $news_data['title'];
                    $news_title .= '<span class="new badge '. $news_data['color'].'" data-badge-caption="'.$news_data['genre_text'].'">';
                    echo $news_title;
                }else{
                    echo '記事を選択してください';
                }
                ?>
            </h4>
            <p id="news-info">
                <?php
                if(isset($news_id)){
                    $tags = $news_data['posted_at'].' / '.uid2ac_name($dbh, $columm['contributor_id']);
                    echo $tags;
                }
                ?>
            </p>
            <hr>
            <?php
            if(isset($news_id)){
                $md2html = 'ここにパースしたマークダウンが入る';
                echo $md2html;
            }else{
                echo 'ここに内容が表示されます';
            }
            ?>
        </div>
    </div>
</body>
</html>