<?php

// 変数の初期化
$user_name = null;
$password = null;
$user_name = $_POST["user_name"];
$password = $_POST["password"];
$res = null;

// データベースに接続
$db = new PDO('sqlite:bbs_db.sqlite3');

// パスワードのハッシュ化
$res = password_hash($password, PASSWORD_DEFAULT);

// 確認
if(!empty($user_name) && !empty($password)) {
	$sql = "SELECT name FROM users WHERE name = ?";
	$stmt = $db->prepare($sql);
	$stmt->bindParam(1, $user_name);
	$stmt->execute();
	$check = $stmt->fetch();

	// 登録
	if(!empty($check)) {
		header('Location: error\registration_error.html');
	} else {
		$sql = "INSERT INTO users(name, password) VALUES(?, ?)";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(1, $user_name);
		$stmt->bindParam(2, $res);
		$stmt->execute();
		header('Location: index.php');
	}
} else {
	header('Location: registration.php');
}

// データベースから切断
$db = null;
