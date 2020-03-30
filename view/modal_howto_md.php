<!-- モーダルウインドウ -->
<div id="modal1" class="modal">
    <div class="modal-content">
        <h4 class="green-title">Markdownの書き方</h4>
        <h5 class="blue-title">Markdownとは？</h5>
        <p>HTMLより簡単に記述できる軽量マークアップ言語です！詳しくはggってね！拡張子は<code>.md</code>です！</p>
        <h5 class="blue-title">タイトル</h5>
        <pre>
# h1
## h2
### h3
#### h4
##### h5
###### h6
        </pre>
        <hr>
        <h1>h1</h1>
        <h2>h2</h2>
        <h3>h3</h3>
        <h4>h4</h4>
        <h5>h5</h5>
        <h6>h6</h6>
        <br>

        <h5 class="blue-title">改行</h5>
        改行は文末に<code>  </code>(半角スペース2個)、もしくは入力欄で2回改行すると改行されます
        <pre>
文末に
スペース2つ入れてない

文末に  
スペース2つ入れてある
        </pre>
        <hr>
        文末にスペース2つ入れてない<br>
        <br>
        文末に<br>
        スペース2つ入れてある
        <br>

        <h5 class="blue-title">リスト</h5>
        <pre>
- リスト項目1
- リスト項目2
- リスト項目3

1. リスト項目1
2. リスト項目2
3. リスト項目3
        </pre>
        <hr>
        <ul>
            <li>リスト項目1</li>
            <li>リスト項目2</li>
            <li>リスト項目3</li>
        </ul>
        <ol>
            <li>リスト項目1</li>
            <li>リスト項目2</li>
            <li>リスト項目3</li>
        </ol>
        <br>

        <h5 class="blue-title">テキストの強調, 装飾</h5>
        <pre>
*斜体*

**太字**

***太字斜体***

~~打ち消し線~~
        </pre>
        <hr>
        <i>斜体</i><br>
        <br>
        <strong>太字</strong><br>
        <br>
        <strong><i>太字斜体</i></strong><br>
        <br>
        <del>打ち消し線</del>
        <br>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat"><i class="far fa-window-close fa-fw"></i> 閉じる</a>
    </div>
</div>