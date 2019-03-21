<?php
// データベースに接続
$db = new SQLite3("bbs_db.sqlite3");

// データの取得
$res_text = $db->query("SELECT * FROM text");
?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <link href="style.css" rel="stylesheet">
    <title>PHP掲示板</title>
  </head>
  <body>
    <h1>掲示板</h1>

    <section>
      <h2>新規投稿</h2>
      <form action="add_comment.php" method="POST">
				<p><span class="label">名前: </span><input type="text" name="name" size="30" maxlength="15" minlength="1" pattern="^[0-9A-Za-z]+$" placeholder="半角15文字以内" required></p>
        <p><span class="label">コメント: </span><textarea name="comment" cols="40" rows="5" maxlength="80" minlength="1" placeholder="全角半角80文字以内" wrap="hard" required></textarea></p>
        <p><input type="submit" value="投稿"></p>
      </form>
    </section>
    <hr>
    <section>
      <h2>投稿一覧</h2>
    <?php if (!empty($res_text)): ?>
      <ul>
        <?php while($row = $res_text->fetchArray()) { ?>
          <li><?php echo($row["name"] . ": " . $row["comment"] . "\n"); ?></li>
        <?php } ?>
      </ul>
    <?php else: ?>
      <p>投稿はまだありません</p>
    <?php endif; ?>
    </section>
  </body>
</html>
