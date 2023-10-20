<?php

/**
 * [ここでやりたいこと]
 * 1. クエリパラメータの確認 = GETで取得している内容を確認する
 * 2. select.phpのPHP<?php ?>の中身をコピー、貼り付け
 * 3. SQL部分にwhereを追加
 * 4. データ取得の箇所を修正。
 */

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

// 3.データ登録SQL作成
$stmt = $pdo->prepare('SELECT * FROM manga_an_table2 WHERE id = :id;');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute(); //実行

$result = '';
if ($status === false) {
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    $result = $stmt->fetch();
}

// var_dump($result);

?>
<!--
２．HTML
以下にindex.phpのHTMLをまるっと貼り付ける！
(入力項目は「登録/更新」はほぼ同じになるから)
※form要素 input type="hidden" name="id" を１項目追加（非表示項目）
※form要素 action="update.php"に変更
※input要素 value="ここに変数埋め込み"
-->

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>詳細2画面</title>
    <link href="css/style.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="select.php">元のページに戻る</a></div>
            </div>
        </nav>
    </header>

    <!-- method, action, 各inputのnameを確認してください。  -->
    <form method="POST" action="update.php">
        <div class="dialoguefield">
        <fieldset>
                <legend><h2>魂を震わせるセリフを編集する</h2></legend>
                <label>セリフ<br><textArea name="dialogue" rows="4" cols="50"><?= $result['dialogue']?></textArea></label><br>
                <!-- <label>セリフの元画像（任意）<br><input type="file" name="img"></label><br> -->
                <label>マンガのタイトル<br><input type="text" name="mangatitle" size="54" value="<?= $result['mangatitle']?>"></label><br>
                <label>作者名<br><input type="text" name="author" value="<?= $result['author']?>"></label><br>
                <label>出典・巻数<br><input type="text" name="source" size="24" value="<?= $result['source']?>"></label><br>
                <label>コメント<br><textArea name="comment" rows="2" cols="50"><?= $result['comment']?></textArea></label><br>
                <input type="submit" value="送信">
            </fieldset>
        </div>
    </form>
</body>

</html>