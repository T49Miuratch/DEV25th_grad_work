<?php
// 0. SESSION開始！！

session_start();

// 1. ログインチェック処理！
// 以下、セッションID持ってたら、ok
// 持ってなければ、閲覧できない処理にする。

//１．関数群の読み込み
require_once('model.php');
loginCheck();

//２．データ登録SQL作成
$pdo = db_conn();
$stmt = $pdo->prepare('SELECT * FROM manga_an_table2');
$status = $stmt->execute();

//３．データ表示
$view = '';
if ($status == false) {
    sql_error($stmt);
} else {
    while ($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $view .= '<p>';
        $view .= h($r['dialogue']) . " " . h($r['author']) .  " " . h($r['source']) . " " . h($r['comment']) . " " . h($r['mangatitle']);
        $view .= "　";

        if ($_SESSION['kanri_flg'] === 1) {
            $view .= '<a href="detail.php?id=' . $r["id"] . '">';
            $view .= '<i class="glyphicon glyphicon-remove"></i><button> 編　集 </button>';
            $view .= '</a>';
            $view .= '<a class="btn btn-danger" href="delete.php?id=' . $r['id'] . '">';
            $view .= '<i class="glyphicon glyphicon-remove"></i><button> 削　除 </button>';
            $view .= '</a>';
        }

        $view .= '</p>';
    }
}
?>


<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>言霊ログ KOTODAMA log | ログ編集ページ</title>
<link href="css/style.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Shippori+Mincho+B1:wght@600&display=swap" rel="stylesheet">

</head>

<body id="main">
    <!-- Head[Start] -->
    <header>

<div class="header-logo"><a href="index.php"><img src="img/kotodama_log-LOGO_yoko.png"></a></div>
<div class="header-list">
<ul>
<li><a href="logout.php">log out</a></li>
</ul>
</div>

</header>
    
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <div class="title1"><p>言霊ログ KOTODAMA log</p><img src="img/kotodama_log-LOGO_yokoblack.png"></div>
    <div>
        <div class="container jumbotron"><?= $view ?></div>
    </div>
    <!-- Main[End] -->

    <div class="footer01">
    <ul class="menu">
    <li><a href="index.php"><img src="img/kotodama_log-LOGO_long.png"></a></li>
    <li><a href="https://fujimani.com/" TARGET="_blank">&copy; FUJIMANI PUBLISHING, Inc</a></li>
    </ul>
    </div>
</body>

</html>
