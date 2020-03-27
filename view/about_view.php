<?php
require('./view/html_head.php');
?>
<body>
    <?php
    require('./view/header.php');
    ?>
    <div id="contents">
        <div id="left">
            <h4 id="green-title">当サイトについて</h4>
            <div class="card grey lighten-3 hoverable">
                <div class="card-content">
                    <span class="card-title">ブラウザ環境について</span>
                    <p class="card_p">当サイトは以下の環境でご覧いただくことを推奨いたします。</p>
                    <ul>
                        <li>Google Chrome 最新版 (Windows 10以上, Android 8以上, iOS 12以上)</li>
                        <li>Microsoft Edge 最新版</li>
                        <li>Mozilla Firefox 最新版</li>
                        <li>Apple Safari 最新版 (MacOS, iOS, iPad OS)</li>
                        <li>Opera Software ASA Opera 最新版</li>
                        <li>その他Chromiumブラウザ最新版</li>
                    </ul>
                    <p class="card_p">推奨環境以外で利用された場合や、推奨環境下でもご利用のブラウザの設定等によっては、正しく表示されない場合がありますのでご了承ください。</p>
                </div>
            </div>

            <div class="card grey lighten-3 hoverable">
                <div class="card-content">
                    <span class="card-title">クッキー(Cookie)について</span>
                    <p class="card_p">当サイトでは、一部の機能にクッキーを使用しております。<BR>クッキーとは、Webコンテンツからの要求でユーザーの端末に一時的に保存されるデータのことで、当サイトでは利用状況の把握のためにクッキーを使用する場合があります。</p>
                    <p class="card_p">ブラウザをご自身で設定することでクッキーを無効化することが可能ですが、その場合、当サイトが正常に動作しない場合がございます。</p>
                </div>
            </div>

        </div>
        <div id="right-padding">

            <div class="card grey lighten-3 hoverable">
                <div class="card-content">
                    <span class="card-title">免責事項</span>
                    <p class="card_p">当サイトに記載されている情報の正確性には万全を期しておりますが、弊サークルではユーザーが当サイトの情報を用いて行う一切の行為に対して責任を負うものではございません。<BR></p>
                    <p class="card_p">また、ユーザーが当サイトの利用したことにより発生した何らかの損害、ユーザーが当サイトを利用したことにより発生した第三者への損害に対して、弊サークルはいかなる責任も負うものではございません<BR></p>
                    <p class="card_p">サイトに記載されている情報やサイトの仕様については予告なく変更する場合がございます</p>
                </div>
            </div>

            <div class="card grey lighten-3 hoverable">
                <div class="card-content">
                    <span class="card-title">ソースコードについて</span>
                    <p class="card_p">当サイトのソースコードはGitHubにて公開されており、誰でも自由に使用することが可能です。詳しくは下のリンクよりGitHubリポジトリをご確認ください。</p>
                </div>
                <div class="card-action">
                <a href="https://github.com/kazuki19992/Joken-HP" class="waves-effect waves-teal btn-flat" target="_blank" rel="noopener noreferrer"><span  class="light-blue-text text-darken-4"><i class="fab fa-github fa-fw"></i> GitHubリポジトリ <i class="fas fa-external-link-alt fa-fw"></i></span></a>
                </div>
            </div>

            <div class="card grey lighten-3 hoverable">
                <div class="card-content">
                    <span class="card-title">クレジット</span>
                    <p class="card_p">製作：櫛田一樹(2020年度 情報研究会 会長)</p>
                    <p class="card_p">日本大学工学部 情報研究会</p>
                </div>
            </div>
        </div>
    </div>
</body>