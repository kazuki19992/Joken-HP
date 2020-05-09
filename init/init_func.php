<?php

function regist_fwrite($filename, $contents){
    $write_filename = '../helpers/'.$filename;
    if(file_put_contents($write_filename, $contents) !== false){
        return 0;
    }else{
        return 1;
    }
}