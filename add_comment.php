<?php

// 変数の初期化
$name = null;
$comment = null;
$name = $_POST["name"];
$comment = $_POST["comment"];

// データベースに接続
$db = new PDO('sqlite:bbs_db.sqlite3');

// 書き込み
if(!empty($name) && !empty($comment)) {
	$sql = "INSERT INTO text(name, comment) VALUES(?, ?)";
	$stmt = $db->prepare($sql);
	$stmt->bindParam(1, $name);
	$stmt->bindParam(2, $comment);
	$stmt->execute();
	header('Location: index.php');
} else {
	header('Location: error\add_comment_error.html');
}

// データベースから切断
$db = null;
