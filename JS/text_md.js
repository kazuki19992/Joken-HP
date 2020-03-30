// マークダウンをプレビュー画面に表示する
$(function () {
    marked.setOptions({
        // code要素にdefaultで付くlangage-を削除
        langPrefix: '',
        // highlightjsを使用したハイライト処理を追加
        highlight: function (code, lang) {
            return hljs.highlightAuto(code, [lang]).value
        }
    });
    $('#markdown_editor_textarea').keyup(function () {
        var html = marked($(this).val());
        $('#markdown_preview').html(html);
    });
});