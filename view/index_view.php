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
                <a href="#!" class="collection-item">
                    広報7<span class="new badge" data-badge-caption="広報"></span><BR>
                    <span class="top-news-info">2099/12/31 カズ之助</span>
                </a>
                <a href="#!" class="collection-item">
                    広報6<span class="new badge red" data-badge-caption="コロナ"></span><BR>
                    <span class="top-news-info">2088/12/31 カズ之助</span>
                </a>
                <a href="#!" class="collection-item">
                    広報5<span class="new badge blue" data-badge-caption="新機能"></span><BR>
                    <span class="top-news-info">2077/12/31 カズ之助</span>
                </a>
                <a href="#!" class="collection-item">
                    広報4<span class="new badge orange" data-badge-caption="不具合"></span><BR>
                    <span class="top-news-info">2066/12/31 カズ之助</span>
                </a>
                <a href="#!" class="collection-item">
                    広報3<span class="new badge red" data-badge-caption="コロナ"></span><BR>
                    <span class="top-news-info">2055/12/31 カズ之助</span>
                </a>
                <a href="#!" class="collection-item">
                    広報2<span class="new badge" data-badge-caption="講習会"></span><BR>
                    <span class="top-news-info">2044/12/31 カズ之助</span>
                </a>
                <a href="#!" class="collection-item">
                    広報1<span class="new badge orange" data-badge-caption="メンテ"></span><BR>
                    <span class="top-news-info">2033/12/31 カズ之助</span>
                </a>
                <a href="#!" class="collection-item">
                    サイトリニューアル！<BR>
                    <span class="top-news-info">2020/03/20 カズ之助</span>
                </a>
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