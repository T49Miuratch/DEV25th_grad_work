
<?php

//XSS対応（ echoする場所で使用！それ以外はNG ）
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}
function db_conn()
{
    try {
        $db_name = 'gs_db2';    //データベース名
        $db_id   = 'root';      //アカウント名
        $db_pw   = '';      //パスワード：XAMPPはパスワード無しに修正してください。
        $db_host = 'localhost'; //DBホスト
        $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
        return $pdo;
    } catch (PDOException $e) {
        exit('DB Connection Error:' . $e->getMessage());
    }
}
function get_posts_by_id($pdo, $id)
{

$stmt = $pdo->prepare('SELECT * FROM manga_an_table2 WHERE id = :id;');
$stmt->bindValue(':id', $id, PDO::PARAM_INT); //PARAM_INTなので注意
$status = $stmt->execute(); //実行

$result = '';
if ($status === false) {
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    $result = $stmt->fetch();
    return $result;
}
}

//２．DB接続とデータ取得SQL作成
$pdo = db_conn();
$stmt = $pdo->prepare("SELECT * FROM manga_an_table2");
$status = $stmt->execute();

//SQLエラー
function sql_error($stmt)
{
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit('SQLError:' . $error[2]);
}

//リダイレクト
function redirect($file_name)
{
    header('Location: ' . $file_name);
    exit();
}


// ログインチェク処理 loginCheck()

function loginCheck()
{
    if(!isset($_SESSION['chk_ssid'])  || $_SESSION['chk_ssid']!== session_id()) {
    // exit('ログインできませんでした！');
    
    } else {
    session_regenerate_id(true);
    $_SESSION['chk_ssid'] = session_id();
    }
}


//３．データ表示
$view = '';
if ($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= "<p class='line'>";

    $view .= "<h1>" . h($result['dialogue']) . "</h1>";//メインコンテンツの「言霊」

    $view .= "<h3>" . "『" . h($result['mangatitle']) . "（" . h($result['author']) ."）". "』". h($result['source']) .  "</h3>";//出典の作品＋作者

    $view .= "<h4>" . h($result['comment']) . "</h4>";//登録者のコメント

    $view .= "<h4>" . h($result['date']) . "</h4>";//日付を小さく表示する

    if ($_SESSION['kanri_flg'] === 1) {

    $view .= '<a href="detail.php?id='. $result['id'] .'">';
    $view .= '<button> 編 集 </button>';
    $view .= '</a>';

    $view .= " ";//間のスペース

    $view .= '<a href="delete.php?id='. $result['id'] .'">';
    $view .= '<button> 削 除 </button>';
    $view .= '</a>';

  }

    $view .= "</p>";

  }

}