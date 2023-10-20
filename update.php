<?php
//1. POSTデータ取得
$id      = $_POST['id'];
$dialogue = $_POST['dialogue'];
$mangatitle = $_POST['mangatitle'];
// $img = $_POST['img'];
$author = $_POST['author'];
$comment = $_POST['comment'];
$source = $_POST['source'];

//2. DB接続します
require_once('model.php');
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare('UPDATE manga_an_table2
            SET dialogue=:dialogue,
                mangatitle=:mangatitle,
                author=:author,
                comment=:comment,
                source=:source
            WHERE id=:id;');

$stmt->bindValue(':dialogue',   $dialogue,   PDO::PARAM_STR);
$stmt->bindValue(':mangatitle',  $mangatitle,  PDO::PARAM_STR);
// $stmt->bindValue(':img',     $img,     PDO::PARAM_STR);
$stmt->bindValue(':author',    $author,    PDO::PARAM_STR);

$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
$stmt->bindValue(':source', $source, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);//イント「数字」

$status = $stmt->execute(); //実行

$result = '';

//４．データ登録処理後
if ($status === false) {
    sql_error($stmt);
} else {
    redirect('index.php');
}
