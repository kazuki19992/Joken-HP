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

            return $data;   // 会員データを渡す
        }else{
            return FALSE;
        }
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
        if(isset($data)){
            return $data;
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