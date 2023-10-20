<?php

// funcs.phpを読み込む
require_once('funcs.php');

//1.  DB接続します
try {
  //Password:MAMP='root',XAMPP=''
  $pdo = new PDO('mysql:dbname=gs_db2;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DBConnectError'.$e->getMessage());
}

//２．データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM manga_an_table2");
$status = $stmt->execute();

//３．データ表示
$view="";
if ($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= "<p class='line'>";

    $view .= "<h1>" . h($result['dialogue']) . "</h1>";//メインコンテンツの「セリフ」

    $view .= "<h3>" . "『" . h($result['mangatitle']) . "（" . h($result['author']) ."）". "』". h($result['source']) .  "</h3>";//出典のマンガ＋作者

    $view .= "<h4>" . h($result['comment']) . "</h4>";//登録者のコメント

    $view .= "<h5>" . h($result['date']) . "</h5>";//日付を小さく表示する

    $view .= '<a href="detail.php?id='. $result['id'] .'">';
    $view .= '<button> 編 集 </button>';
    $view .= '</a>';

    $view .= " ";//間のスペース

    $view .= '<a href="delete.php?id='. $result['id'] .'">';
    $view .= '<button> 削 除 </button>';
    $view .= '</a>';

    $view .= "</p>";

  }

}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>あの魂の震えるセリフを二度三度 ver.3</title>
<link href="css/style.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@300&display=swap&family=Darumadrop+One&family=Dela+Gothic+One&family=Kaisei+Decol:wght@700&family=Potta+One&family=RocknRoll+One&family=Shippori+Antique+B1&family=VT323&family=Zen+Kaku+Gothic+New:wght@400;500&display=swap" rel="stylesheet">

</head>
<body>

<h3>Manga Dialogue Archive</h3>
<div class="title1">『あの魂の<br>
    　震えるセリフを<br>
    　　　二度三度』ver.3</div>


    <!-- Main[Start] -->
    <form method="post" action="insert.php">
        <div class="dialoguefield">
            <fieldset>
                <legend><h2>あなたの魂を震わせたセリフを入れてみよう！</h2></legend>
                <img src="img/anzai.png"><br>
                <label>セリフ<br><textArea name="dialogue" rows="4" cols="50"></textArea></label><br>
                <label>セリフの元画像（任意）<br><input type="file" name="img"></label><br>
                <label>マンガのタイトル<br><input type="text" name="mangatitle" size="54"></label><br>
                <label>作者名<br><input type="text" name="author"></label><br>
                <label>出典・巻数<br><input type="text" name="source" size="24"></label><br>
                <label>コメント<br><textArea name="comment" rows="2" cols="50"></textArea></label><br>
                <input type="submit" value="送信">
            </fieldset>
        </div>
    </form>
    <!-- Main[End] -->



<!-- Head[Start] -->
<!-- <header>
<div class="title1">
      <a class="navbar-brand" href="index.php">データ登録</a>
</div>
</header> -->
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
<?= $view ?>
</div>
<!-- Main[End] -->

</body>
</html>
