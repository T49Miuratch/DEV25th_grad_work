<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="css/style.css" />
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
    <title>言霊ログ KOTODAMA log | ログイン</title>
</head>

<body>
<header>

<div class="header-logo"><a href="index.php"><img src="img/kotodama_log-LOGO_yoko.png"></a></div>
<div class="header-list">
<ul>
<li><a href="logout.php">log out</a></li>
</ul>
</div>

</header>

    <!-- login_act.php は認証処理用のPHPです。 -->
    <div class="login1">
    <div class="caption">LOGIN</div>
    <form name="form1" action="login_act.php" method="post">
        Login ID:<input type="text" name="lid" />　
        Password:<input type="password" name="lpw" />
        <p><input type="submit" value="LOGIN" /></p>
    </form>
    </div>

    <div class="footer01">
    <ul class="menu">
    <li><a href="index.php"><img src="img/kotodama_log-LOGO_long.png"></a></li>
    <li><a href="https://fujimani.com/" TARGET="_blank">&copy; FUJIMANI PUBLISHING, Inc</a></li>
    </ul>
    </div>

</body>

</html>
