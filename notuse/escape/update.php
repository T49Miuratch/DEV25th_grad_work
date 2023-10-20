<?php
//1. POSTデータ取得
$id      = $_POST['id'];
$dialogue = $_POST['dialogue'];
$mangatitle = $_POST['mangatitle'];
$author = $_POST['author'];
$source = $_POST['source'];
$comment = $_POST['comment'];

//2. DB接続します
try {
    //ID:'root', Password: xamppは 空白 ''
    $pdo = new PDO('mysql:dbname=gs_db2;charset=utf8;host=localhost','root','');
  } catch (PDOException $e) {
    exit('DBConnectError:'.$e->getMessage());
  }


//３．データ登録SQL作成
$stmt = $pdo->prepare('UPDATE gs_an_table SET dialogue=:dialogue,mangatitle=:mangatitle,author=:author,source=:source,comment=:comment WHERE id=:id;');
$stmt->bindValue(':id',   $id,   PDO::PARAM_STR);
$stmt->bindValue(':dialogue',  $dialogue,  PDO::PARAM_STR);
$stmt->bindValue(':mangatitle',    $mangatitle,    PDO::PARAM_INT);
$stmt->bindValue(':author', $author, PDO::PARAM_STR);
$stmt->bindValue(':source',     $source,     PDO::PARAM_INT);
$stmt->bindValue(':comment',     $comment,     PDO::PARAM_INT);
$status = $stmt->execute(); //実行

// UPDATEテーブル名SETカラム1=1にいれたいもの

$stmt = $pdo->prepare('UPDATE manga_an_table2
                        SET dialogue = :dialogue,
                            mangatitle = :mangatitle,
                            author = :author,
                            comment = :comment,
                            source = :source,
                            indate = sysdate()
                        WHERE id = :id;');

// 数値の場合 PDO::PARAM_INT
// 文字の場合 PDO::PARAM_STR
$stmt->bindValue(':dialogue', $dialogue, PDO::PARAM_STR);//ストリングス「文字」
$stmt->bindValue(':mangatitle', $mangatitle, PDO::PARAM_STR);//ストリングス「文字」
$stmt->bindValue(':author', $author, PDO::PARAM_STR);//ストリングス「文字」
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);//ストリングス「文字」
$stmt->bindValue(':mangatitle', $mangatitle, PDO::PARAM_STR);//ストリングス「文字」
$stmt->bindValue(':source', $source, PDO::PARAM_STR);//ストリングス「文字」
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