<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<link href="style.css" rel="stylesheet">
	<title>PHP掲示板</title>
</head>

<?php

// 変数の初期化
$name = null;
$password = null;
$name = $_POST["user_name"];
$password = $_POST["password"];

// データベースに接続
$db = new PDO('sqlite:bbs_db.sqlite3');

// ログイン
if(!empty($name) && !empty($password)) {
	$sql = "SELECT name FROM users WHERE name = ?";
	$stmt = $db->prepare($sql);
	$stmt->bindParam(1, $name);
	$stmt->execute();
	$check_name = $stmt->fetch();

	if($check_name == true) {
		$sql = "SELECT password FROM users WHERE name = ?";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(1, $name);
		$stmt->execute();
		$hashpass = $stmt->fetch();

		$hashpass = $hashpass[0];		// ["password"] でもOK

		if(password_verify($password, $hashpass)) {
			header('Location: index.php');
		} else {
			?>
			<html>
				<h1>Error</h1>
				<p>パスワードに誤りがあります</p>
				<a href=login.php>戻る</a>
			</html>
			<?php
		}
	} else {
		?>
		<html>
			<h1>Error</h1>
			<p>ユーザー名に誤りがあります</p>
			<a href=login.php>戻る</a>
		</html>
		<?php
	}
} else {
	?>
	<html>
		<h1>Error</h1>
		<p>項目を入力してください</p>
		<a href=login.php>戻る</a>
	</html>
	<?php
}

$db = null;
