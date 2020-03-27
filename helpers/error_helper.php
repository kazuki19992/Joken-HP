<?php

function err_jmp($dir, $message, $prev_Link, $err_code, $detail){
    if(isset($dir, $message, $prev_Link, $err_code)){
        // $dir
        // index.phpと同じ階層: 0, index.phpよりひとつ下の階層: 1, index.phpよりn個下の階層: n
        if($dir === 0){
            $errpg = './';
        }else{
            for($i = 0; $i < $dir; $i++){
                $errpg .= '../';
            }
        }
        // $errpg : error.phpへのフィアル相対パス
        $errpg .= 'error.php';

        $HTML = <<< EOD
        <form action="{$errpg}" method="POST" name="errjmp">
            <input type="hidden" value="{$message}" name="errmsg">
            <input type="hidden" value="{$prev_Link}" name="prev">
            <input type="hidden" value="{$err_code}" name="errcode">
        EOD;

        if(isset($detail)){
            $HTML .= '<input type="hidden" value="'.$detail.'" name="detail">';
        }

        $HTML .= '</form>';

        $HTML .= '<script>
        document.errjmp.submit();
        </script>';

        echo $HTML;


    }else{
        $message = 'パラメータが不足しています';

        $detail = '必要なパラメータが渡されていません。<BR>
        システム管理者へ報告してください。<BR>
        これは関数error_jmpからの報告です';

        $err_code = '001';

        $errpg .= '../error.php';

        $HTML = <<< EOD
        <form action="{$errpg}" method="POST" name="errjmp">
            <input type="hidden" value="{$message}" name="errmsg">
            <input type="hidden" value="./index.html" name="prev">
            <input type="hidden" value="{$err_code}" name="errcode">
        EOD;

        if(isset($detail)){
            $HTML .= '<input type="hidden" value="'.$detail.'" name="detail">';
        }

        $HTML .= '</form>';

        $HTML .= '<script>
        document.errjmp.submit();
        </script>';

        echo $HTML;
    }
}