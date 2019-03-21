<?php

/*
データベースに接続↓
フォームから変数に格納↓
ifで確認↓
パスワードをハッシュ化↓
データベースに書き込み
*/

// 変数
$password_text = 'ooshima0212';
$name = "administrator";
$res = null;
$sql = null;
$db = null;

// 接続
$db = new SQLite3("bbs_db.sqlite3");

// 生成
$res = password_hash($password_text, PASSWORD_DEFAULT);

// 書き込み
$sql = "INSERT INTO users VALUES (0, '$name', '$res')";
$db->query($sql);
?>
