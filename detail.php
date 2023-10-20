<?php
$id = $_GET['id'];

require_once('model.php');
$pdo = db_conn();
$result = get_posts_by_id($pdo, $id);
require_once('templates/detail.php');