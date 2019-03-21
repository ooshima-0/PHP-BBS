<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<link href="style.css" rel="stylesheet">
		<title>PHP掲示板</title>
	</head>
	<body>
		<h1>新規登録</h1>
		<form action="add_user.php" method="POST">
			<p><span class="label">ユーザー名: </span><input type="text" name="user_name" size="30" maxlength="20" minlength="1" pattern="^[0-9A-Za-z]+$" placeholder="半角英数20文字以内" required></p>
			<p><span class="label">パスワード: </span><input type="password" name="password" size="30" minlength="8" pattern="^[0-9A-Za-z]+$" placeholder="半角英数8文字以上" required></p>
			<p><input type="submit" value="登録"></p>
		</form>
	</body>
</html>
