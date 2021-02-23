<?php
// db_connect.phpの読み込み
require('db_connect.php');
// function.phpの読み込み
require('function.php');
// ログインしていなければ、login.phpにリダイレクト(強制的にページ移動)
check_user_logged_in();
// PDOのインスタンスを取得
$pdo = db_connect();

try {
    // SQL文の準備
    $sql = "SELECT * FROM books ORDER BY id DESC";
    // プリペアドステートメントの作成
    $stmt = $pdo->prepare($sql);
    // 実行
    $stmt->execute();
} catch (PDOException $e) {
    // エラーメッセージの出力
    echo "Error:".$e->getMesseage();
    // 終了
    die();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>在庫一覧</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
    <h2>在庫一覧画面</h2>
    <div class="wrapper">
        <form method="POST" action="">
            <input class="new-book" type="button" onclick="location.href='create_post.php'" value="新規登録">
            <input class="logout" type="button" onclick="location.href='logout.php'" value="ログアウト" ><br>
            <br>
        </form>
        <table class="all-list">
            <tr>
            <td class="item-list">タイトル</td>
            <td class="item-list-s">発売日</td>
            <td class="item-list-s">在庫数</td>
            <td class="item-list-s"></td>
            </tr>
        <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td class="item"><?php echo $row['title'] ?></td>
                <td class="item-s"><?php echo $row['date'] ?></td>
                <td class="item-s"><?php echo $row['stock'] ?></td>
                <td class="item-s"><a class="delete_item" href="delete_book.php?id=<?php echo $row['id']; ?>">削除</a></td>
            </tr>
        <?php } ?>
        </table>
    </div>
</body>
</html>