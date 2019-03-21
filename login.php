<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<link href="style.css" rel="stylesheet">
		<title>PHP掲示板</title>
	</head>
	<body>
		<h1>掲示板</h1>
		<h2>ログイン</h2>
		<form action="check.php" method="POST">
			<p><span class="label">ユーザー名: </span><input type="text" name="user_name" size="30" pattern="^[0-9A-Za-z]+$" placeholder="半角英数20文字以内" required></p>
			<p><span class="label">パスワード: </span><input type="password" name="password" size="30" pattern="^[0-9A-Za-z]+$" placeholder="半角英数8文字以上" required></p>
			<p><input type="submit" value="ログイン"></p>
		</form>
	</body>
</html>
