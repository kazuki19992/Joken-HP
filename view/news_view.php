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
                <a href="#!" class="collection-item">
                    広報7<BR>
                    <span class="top-news-info">2099/12/31 カズ之助</span>
                </a>
                <a href="#!" class="collection-item">
                    広報6<BR>
                    <span class="top-news-info">2088/12/31 カズ之助</span>
                </a>
                <a href="#!" class="collection-item">
                    広報5<BR>
                    <span class="top-news-info">2077/12/31 カズ之助</span>
                </a>
                <a href="#!" class="collection-item">
                    広報4<BR>
                    <span class="top-news-info">2066/12/31 カズ之助</span>
                </a>
                <a href="#!" class="collection-item">
                    広報3<BR>
                    <span class="top-news-info">2055/12/31 カズ之助</span>
                </a>
                <a href="#!" class="collection-item">
                    広報2<BR>
                    <span class="top-news-info">2044/12/31 カズ之助</span>
                </a>
                <a href="#!" class="collection-item">
                    広報1<BR>
                    <span class="top-news-info">2033/12/31 カズ之助</span>
                </a>
                <a href="#!" class="collection-item">
                    サイトリニューアル！<BR>
                    <span class="top-news-info">2020/03/20 カズ之助</span>
                </a>
            </div>
        </div>

        <div id="wiki-right">
            <h4 id="blue-title">サイトリニューアル！</h4>
            <p id="news-info">2020/03/20 カズ之助</p>
            <hr>
            ここに内容が表示されます
        </div>
    </div>
</body>
</html>