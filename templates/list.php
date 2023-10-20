<?php $title = '言霊ログ KOTODAMA log'; ?>

<?php ob_start() ?>
<body id="main">



    <!-- Head[Start] -->
    <header>

<div class="header-logo"><a href="index.php"><img src="img/kotodama_log-LOGO_yoko.png"></a></div>
<div class="header-list">
<ul>
<li><a href="login.php">admin login</a></li>
<li><a href="select.php">simple view</a></li>
</ul>
</div>

</header>
    <!-- Head[End] -->

<div class="title1">言霊ログ KOTODAMA log<br><img src="img/kotodama_log-LOGO.png"></div>

    <!-- Main[Start] -->
    <form method="post" action="insert.php">
        <div class="dialoguefield">
            <fieldset>
                <legend><h2>心を動かした言霊を記録しよう</h2></legend>
                <label>言霊<br><textArea name="dialogue" rows="4" cols="50"></textArea></label><br>
                <!-- <label>セリフの元画像（任意）<br><input type="file" name="img"></label><br> -->
                <label>作品のタイトル<br><input type="text" name="mangatitle" size="54"></label><br>
                <label>作者名<br><input type="text" name="author" size="54"></label><br>
                <label>リンク<br><input type="text" name="source" size="54"></label><br>
                <label>コメント<br><textArea name="comment" rows="2" cols="50"></textArea></label><br>
                <input type="submit" value="送信">
            </fieldset>
        </div>
    </form>
    <!-- Main[End] -->


    <!-- Main[Start] -->
    <div class="container jumbotron">
            <a href="detail.php"></a>
<?= $view ?>
</div>
<!-- Main[End] -->

</body>
<?php $content = ob_get_clean() ?>

<?php require_once 'layout.php' ?>