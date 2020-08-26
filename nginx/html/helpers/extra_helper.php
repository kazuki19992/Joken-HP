<?php

function html_escape($word){
    return htmlspecialchars($word, ENT_QUOTES, 'UTF-8');
}

function get_post($key){
    if(isset($_POST[$key])){
        $var = trim($_POST[$key]);
        return $var;
    }
}

function check_words($word, $length){
    if(mb_strlen($word) === 0){
        return FALSE;
    }elseif(mb_strlen($word) > $length){
        return FALSE;
    }else{
        return TRUE;
    }
}