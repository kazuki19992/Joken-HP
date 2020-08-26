<?php

function regist_fwrite($filename, $contents){
    $write_filename = '../helpers/'.$filename;
    if(file_put_contents($write_filename, $contents) !== false){
        return 0;
    }else{
        return 1;
    }
}

// ファイルの暗号化
function ssl_encryption($contents, $key){
    // 暗号化
    $encrypt = openssl_encrypt($contents, 'aes-256-ecb', $key);
    return $encrypt;
}