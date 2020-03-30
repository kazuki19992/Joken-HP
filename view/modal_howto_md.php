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
        スペース2つ入れてある<br>
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
            <ol>
                <li>リスト項目3</li>
            </ol>
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
        <del>打ち消し線</del><br>
        <br>

        <h5 class="blue-title">インライン表示</h5>
        <code>`</code>(バッククォート)で囲むとインライン表示が可能です<BR>
        バッククォートは日本語キーボードでは<code>Shift + @</code>, USキーボードでは<code>Tabの上</code>にあります
        <pre>
たとえば `int i = 0;` ←こんな感じ
        </pre>
        <hr>
        たとえば <code>int i = 0;</code> ←こんな感じ<br>
        <br>

        <h5 class="blue-title">コードの挿入</h5>
        コードの挿入は<code>```</code>でコードを囲みます。<br>
        その際、最初の<code>```</code>の後に言語タイプを書きましょう。
        <pre>
```c
&#35;include &lt;stdio.h&gt;
int main(void){
    printf(&quot;Hello World&quot;);
    return 0;
}
```
        </pre>
        <hr>
        <pre>
&#35;include &lt;stdio.h&gt;
int main(void){
    printf(&quot;Hello World&quot;);
    return 0;
}
        </pre><br>

        <h5 class="blue-title">リンクの挿入</h5>
        リンクは<code>[タイトル](URL)</code>と入力します
        <pre>
[Twitter](https://twitter.com)
        </pre>
        <hr>
        <a href="https://twitter.com">Twitter</a><br>
        <br>

        <h5 class="blue-title">画像の挿入</h5>
        画像は<code>![代替テキスト](URL "タイトル")</code>と入力します<BR>
        ※代替テキストは空、タイトルは入力しなくても大丈夫です
        <pre>
![サークルのアイコン](https://github.com/kazuki19992/Joken-HP/blob/master/IMG/favicon.png?raw=true)
        </pre>
        <hr>
        <img src="https://github.com/kazuki19992/Joken-HP/blob/master/IMG/favicon.png?raw=true" alt="サークルのアイコン">
        <br>

        <h5 class="blue-title">水平線</h5>
        水平線は<code>***</code>または<code>---</code>と入力します<BR>
        <pre>
---

***
        </pre>
        <hr><BR>

        <hr>
        <hr>
        <br>

        <h5 class="blue-title">引用</h5>
        引用は<code>&gt;</code>で行います。<BR>
        改行したら必ず先頭に<code>&gt;</code>を忘れずにつけましょう。
        <pre>
&gt; 先日近所のＴＳＵＴＡＹＡで俺がトイレに入ったときの話だ。 個室で用をたしていた俺の隣に誰かが入ってきた。  
&gt; 普通個室ごしに話しかけたりなんて絶対ないんだがいきなり  
&gt; 「おぅ、こんちは」  
&gt; と来た。正直俺は「は？」と思ったがしょうがないので  
&gt; 「こんちはっす」  
&gt; と答えたさ。そしたら  
&gt; 「最近どう？」  
&gt; とたわいのない話してきやがった。しょうがないので  
&gt; 「まぁ普通だよ。忙しいのかい？」  
&gt; と適当にお茶を濁した。  
&gt; そしたら急に相手は声色が低くなり小さな声で  
&gt; 「ちょっとかけなおすよ、何かとなりにいちいち返事する変なのがいる」

**二重引用**  
&gt; 132：本当にあった怖い名無し：2009/12/03(木) 03:48:38 ID:i8XtSQs10
&gt;
&gt; 初カキコ…ども…
&gt;
&gt; 俺みたいな中3でグロ見てる腐れ野郎、他に、いますかっていねーか、はは
&gt;
&gt; 今日のクラスの会話  
&gt; あの流行りの曲かっこいい　とか　あの服ほしい　とか  
&gt; ま、それが普通ですわな
&gt;
&gt; かたや俺は電子の砂漠で死体を見て、呟くんすわ  
&gt; &gt;it’a true wolrd．
&gt; 狂ってる？それ、誉め言葉ね。

        </pre>
        <blockquote>
        先日近所のＴＳＵＴＡＹＡで俺がトイレに入ったときの話だ。 個室で用をたしていた俺の隣に誰かが入ってきた。<br>
        普通個室ごしに話しかけたりなんて絶対ないんだがいきなり<br>
        「おぅ、こんちは」<br>
        と来た。正直俺は「は？」と思ったがしょうがないので<br>
        「こんちはっす」<br>
        と答えたさ。そしたら<br>
        「最近どう？」<br>
        とたわいのない話してきやがった。しょうがないので<br>
        「まぁ普通だよ。忙しいのかい？」<br>
        と適当にお茶を濁した。<br>
        そしたら急に相手は声色が低くなり小さな声で<br>
        「ちょっとかけなおすよ、何かとなりにいちいち返事する変なのがいる」
        </blockquote><br>
        <strong>二重引用</strong>
        <blockquote>
            132：本当にあった怖い名無し：2009/12/03(木) 03:48:38 ID:i8XtSQs10<br>
            <br>
            初カキコ…ども…<br>
            <br>
            俺みたいな中3でグロ見てる腐れ野郎、他に、いますかっていねーか、はは<br>
            <br>
            今日のクラスの会話<br>
            あの流行りの曲かっこいい　とか　あの服ほしい　とか<br>
            ま、それが普通ですわな<br>
            <br>
            かたや俺は電子の砂漠で死体を見て、呟くんすわ<br>
            <blockquote>
                it’a true wolrd．
            </blockquote>
            狂ってる？それ、誉め言葉ね。
        </blockquote>


    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat"><i class="far fa-window-close fa-fw"></i> 閉じる</a>
    </div>
</div>