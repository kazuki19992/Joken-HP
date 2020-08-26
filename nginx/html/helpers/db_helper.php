<?php

function get_db_connect(){

    try{
        $dsn = DSN;
        $user = DB_USER;
        $password = DB_PASSWORD;

        $dbh = new PDO($dsn, $user, $password);

    }catch(PDOException $e){
        echo($e->getMessage());
        die();
    }
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $dbh;
}

function acId_exists($dbh, $ac_id){

    $sql = "SELECT COUNT(id) FROM Account where account_id = :account_id";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':account_id', $ac_id, PDO::PARAM_STR);
    $stmt->execute();
    $count = $stmt->fetch(PDO::FETCH_ASSOC);    // 結果を配列で取得する
    if($count['COUNT(id)'] > 0){
        //件数を判定
        return TRUE;
    }else{
        return FALSE;
    }
}

function insert_member_student($dbh, $ac_id, $ac_name, $password, $role, $std_num, $std_name, $address){

    //初期アイコン
    $icon = 'IMG/user_icon/init_icon.png';

    $password = password_hash($password, PASSWORD_DEFAULT);
    $date = date('Y-m-d H:i:s');
    $sql = "INSERT INTO Account (account_id, account_name, password, icon, role, std_num, std_name, address, created_at) ";
    $sql .= "VALUE (:account_id, :account_name, :password, :icon, :role, :std_num, :std_name, :address, '{$date}')";

    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':account_id', $ac_id, PDO::PARAM_STR);
    $stmt->bindValue(':account_name', $ac_name, PDO::PARAM_STR);
    $stmt->bindValue(':password', $password, PDO::PARAM_STR);
    $stmt->bindValue(':icon', $icon, PDO::PARAM_STR);
    $stmt->bindValue(':role', $role, PDO::PARAM_STR);
    $stmt->bindValue(':std_num', $std_num, PDO::PARAM_STR);
    $stmt->bindValue(':std_name', $std_name, PDO::PARAM_STR);
    $stmt->bindValue(':address', $address, PDO::PARAM_STR);
    if($stmt->execute()){
        return TRUE;
    }else{
        return FALSE;
    }
}

function update_member_name($dbh, $name, $id){
    $sql = "UPDATE members SET name='{$name}' WHERE id={$id}";
    $stmt = $dbh->prepare($sql);

    if($stmt->execute()){
        return TRUE;
    } else {
        return FALSE;
    }
}
// IDとパスワードが一致するか調べる
function select_member_acId($dbh, $account_id, $password){

    $sql = 'SELECT * FROM Account WHERE account_id = :account_id LIMIT 1'; // アカウントのIDが一致するレコードをさがす
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':account_id', $account_id, PDO::PARAM_STR);
    $stmt->execute();
    if($stmt->rowCount() > 0){
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if(password_verify($password, $data['password'])){
            // パスワードを検証する

            // 役職を文字列で取得
            $role_id = $data['role'];
            $data['role'] = get_role($dbh, $role_id);
            // 役職から記事閲覧レベルを取得
            $data['view_level'] = role_to_view_range($dbh, $role_id);
            login_time($dbh, $data['id']);
            return $data;   // 会員データを渡す
        }else{
            return FALSE;
        }
        return FALSE;
    }
}

// 最終ログイン時間を変更
function login_time($dbh, $id){
    $date = date('Y-m-d H:i:s');
    $sql = "UPDATE Account SET last_login='{$date}' WHERE id='{$id}'";
    $stmt = $dbh->prepare($sql);
    if($stmt->execute()){
        return TRUE;
    }else{
        return FALSE;
    }
}

// 役職(属性)IDから属性名を取得
function get_role($dbh, $role_id){
    $sql = 'SELECT role FROM role WHERE role_id = :role_id LIMIT 1';
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':role_id', $role_id, PDO::PARAM_STR);
    $stmt->execute();
    if($stmt->rowCount() > 0){
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if(isset($data['role'])){
            return $data['role'];
        }else{
            return FALSE;
        }
    }
}

// 役職(属性)IDからnews_wikiの閲覧レベルを取得
function role_to_view_range($dbh, $role_id){
    $sql = "SELECT view_level FROM role WHERE role_id = :role_id LIMIT 1";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':role_id', $role_id, PDO::PARAM_STR);
    $stmt->execute();
    if($stmt->rowCount() > 0){
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if(isset($data['view_level'])){
            return $data['view_level'];
        }else{
            return FALSE;
        }
    }
}

// news投稿
function post_news_wiki($dbh, $filename, $post_user, $title, $view_range, $mode, $genre){
    $date = date('Y-m-d H:i:s');

    if($mode === 'news' || $mode === 'wiki'){
        $sql = "INSERT INTO {$mode} (title, contributor_id, posted_at, md_pass, view_range, genre)";
        $sql .= " VALUES (:title, :contributor_id, '{$date}', :md_pass, :view_range, :genre)";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':title', $title, PDO::PARAM_STR);
        $stmt->bindValue(':contributor_id', $post_user, PDO::PARAM_INT);
        $stmt->bindValue(':md_pass', $filename, PDO::PARAM_STR);
        $stmt->bindValue(':view_range', $view_range, PDO::PARAM_INT);
        $stmt->bindValue(':genre', $genre, PDO::PARAM_INT);

        if($stmt->execute()){
            return TRUE;
        }else{
            return FALSE;
        }
    }else{
        return FALSE;
    }
}

// newsのジャンルを全件取得
function get_news_genre($dbh){
    $sql='SELECT * FROM news_genre';
    $stmt = $dbh->prepare($sql);
    if($stmt->execute()){
        $data = $stmt->fetchAll();
        return $data;
    }
}

// 公開範囲を全件取得
function get_view_range($dbh){
    $sql = "SELECT * FROM view_range";
    $stmt = $dbh->prepare($sql);
    if($stmt->execute()){
        $data = $stmt->fetchAll();
        return $data;
    }
}

// ニュースをid順に全件取得する
function get_news_list($dbh, $desc, $view_range){
    if($desc){
        $desc = 'DESC';
    }else{
        $desc = '';
    }

    $sql = "SELECT 
    news.id as id,
    news.title as title,
    news.contributor_id as contributor_id,
    news.posted_at as posted_at,
    news.md_pass as md_pass,
    news.view_range as view_range,
    news.genre as genre,
    news.deleted_at as deleted_at,
    news_genre.id as genre_id,
    news_genre.genre as genre_text,
    news_genre.short as short,
    news_genre.color as color,
    news_genre.dead as genre_dead
    FROM news INNER JOIN news_genre ON news.genre = news_genre.id WHERE news.view_range <= :view_range AND news.deleted_at IS NULL ORDER BY news.id {$desc}";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':view_range', $view_range, PDO::PARAM_INT);

    if($stmt->execute()){
        $data = $stmt->fetchAll();
        return $data;
    }
}

function get_news($dbh, $news_id){
    $sql = "SELECT * FROM news WHERE id = :news_id LIMIT 1";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':news_id', $news_id, PDO::PARAM_INT);
    $stmt->execute();
    if($stmt->rowCount() > 0){
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        $data += get_news_data_genre_and_color($dbh, $data['genre']);
        return $data;
    }
}

function get_news_data_genre_and_color($dbh, $genre_id){
    $sql = "SELECT genre as genre_text, color FROM news_genre WHERE id = :genre_id LIMIT 1";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':genre_id', $genre_id, PDO::PARAM_INT);
    $stmt->execute();
    if($stmt->rowCount() > 0){
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }
}

// ユーザーidからアカウント名を取得
function uid2ac_name($dbh, $user_id){
    $sql = "SELECT account_name FROM Account WHERE id = :user_id LIMIT 1";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
    $stmt->execute();
    if($stmt->rowCount() > 0){
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if(isset($data['account_name'])){
            return $data['account_name'];
        }else{
            return FALSE;
        }
    }
}

function post_store($dbh){
    if(isset($_FILES['img'])){
        $img = $_FILES['img'];
        $err = array();
        $type =exif_imagetype($img['tmp_name']);
        if($type !== IMAGETYPE_JPEG && $type !== IMAGETYPE_PNG){
            $err['pic'] = '対象ファイルはjpgまたはpngのみです。';

        }elseif($img['size'] > 10240000){
            $err['pic'] = 'ファイルサイズは10MB以下にしてください！';

        }else{
            $extension = pathinfo($img['name'], PATHINFO_EXTENSION);
            $new_img = md5(uniqid(mt_rand(), true)).'.'.$extension;
            move_uploaded_file($img['tmp_name'], './IMG/'.$new_img);
        }
        $img_path = "./IMG/".$new_img;
    }
    
    $date = date('Y-m-d H:i:s');
    if($_POST['is_koriyama_true'] === "on"){
        $is_koriyama = TRUE;
    }else{
        $is_koriyama = FALSE;
    }

    $store_name = $_POST['store_name'];

    $discription = "私は、".$_POST['cuisine']."を食べました。<BR>".$_POST['kanso'];
    $sql = "INSERT INTO data (img_path, store_name, contributor, date, genre, is_koriyama, discription) VALUE ('{$img_path}', '{$store_name}', '{$_SESSION['member']['id']}', '{$date}', '{$_POST['genre']}', '{$is_koriyama}', '{$discription}')";
    $dbh -> query($sql);
}