var ele  = document.getElementById('selfile'); // input要素オブジェクトの取得
 
// ファイルが選択されたら引数の関数を実行
ele.addEventListener("change", function(ev){
    var file = ev.target.files;    // 選択されたファイルはFileListオブジェクトに入り、配列のように扱える
    var reader = new FileReader(); // FileReaderオブジェクトの生成
    reader.readAsText(file[0]);    // 選択されたファイル(fileの先頭要素）を文字列として読み込む
	
    // 読み込みが完了した際に実行される処理
    reader.onload = function(e){
        document.getElementById('markdown_editor_textarea').innerHTML = reader.result;
    }
}, false);