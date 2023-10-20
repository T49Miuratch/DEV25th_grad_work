<?php
//1. POSTデータ取得
$dialogue = $_POST['dialogue'];
$mangatitle = $_POST['mangatitle'];
$img = $_POST['img'];
$author = $_POST['author'];
$comment = $_POST['comment'];
$source = $_POST['source'];

//2. DB接続します
require_once('model.php');
$pdo = db_conn();

$stmt = $pdo->prepare("INSERT INTO
manga_an_table2(
  id,dialogue,mangatitle,img,comment,date,source,author
  )VALUES(
NULL, :dialogue, :mangatitle, :img, :comment, sysdate(), :source, :author
)");

//  2. バインド変数を用意
// Integer 数値の場合 PDO::PARAM_INT
// String文字列の場合 PDO::PARAM_STR

$stmt->bindValue(':dialogue', $dialogue, PDO::PARAM_STR);
$stmt->bindValue(':mangatitle', $mangatitle, PDO::PARAM_STR);
$stmt->bindValue(':author', $author, PDO::PARAM_STR);
$stmt->bindValue(':img', $img, PDO::PARAM_STR);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
$stmt->bindValue(':source', $source, PDO::PARAM_STR);

//  3. 実行
$status = $stmt->execute();

//４．データ登録処理後
if($status === false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit('ErrorMessage:'.$error[2]);
}else{
  //５．登録に成功した場合の処理｜index.phpへリダイレクト

  header('Location: index.php');

}
?>
