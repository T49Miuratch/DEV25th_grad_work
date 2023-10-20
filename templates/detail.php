<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>言霊ログ KOTODAMA log | データ更新</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>

    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a href="index.php">言霊ログ KOTODAMA log</a></div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <form method="POST" action="update.php">
        <div class="jumbotron">
            <fieldset>
                <legend>[編集]</legend>
                <label>言霊 KOTODAMA<br><textArea name="dialogue" rows="4" cols="50"><?= $result['dialogue'] ?></textArea></label><br>
                <!-- <label>セリフの元画像（任意）<br><input type="file" name="img"></label><br> -->
                <label>作品のタイトル<br><input type="text" name="mangatitle" size="54" value="<?= $result['mangatitle'] ?>"></label><br>
                <label>作者名<br><input type="text" name="author" size="54" value="<?= $result['author'] ?>"></label><br>
                <label>リンク<br><input type="text" name="source" size="54" value="<?= $result['source'] ?>"></label><br>
                <label>コメント<br><textArea name="comment" rows="2" cols="50"><?= $result['comment'] ?></textArea></label><br>
                <input type="submit" value="送信">
                <input type="hidden" name="id" value="<?= $id ?>">
            </fieldset>
        </div>
    </form>

    <!-- Main[End] -->


</body>

</html>