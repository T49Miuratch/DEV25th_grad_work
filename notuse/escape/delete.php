<?php

$id = $_GET['id'];

try {
    $db_name = 'gs_db2';    //データベース名
    $db_id   = 'root';      //アカウント名
    $db_pw   = '';      //パスワード：MAMPは'root'
    $db_host = 'localhost'; //DBホスト
    $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
} catch (PDOException $e) {
    exit('DB Connection Error:' . $e->getMessage());
}

//３．データ登録SQL作成

// UPDATEテーブル名SETカラム1=1にいれたいもの

$stmt = $pdo->prepare('DELETE FROM manga_an_table2 WHERE id = :id');

$stmt->bindValue(':id', $id, PDO::PARAM_INT);//イント「数字」

$status = $stmt->execute(); //実行

$result = '';

//４．データ登録処理後
    //*** function化する！******\
if ($status === false) {
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    header('Location: select.php');
    exit();
}
    //*** function化する！*****************

