
<?php

session_start();

// funcs.phpを読み込む
require_once('model.php');
loginCheck();


require_once 'templates/list.php';