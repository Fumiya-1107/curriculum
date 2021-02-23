<?php
// db_connect.phpの読み込み
require('db_connect.php');

// function.phpの読み込み
require('function.php');

// ログインしていなければ、login.phpにリダイレクト
check_user_logged_in();

$errorMessage = "";

// 登録ボタンが押された場合
if (isset($_POST['registration'])) {
    // title・date・stockの入力チェック
    if (empty($_POST['title'])) {
        $errorMessage = "タイトルが未入力です。";
    } else if (empty($_POST['date'])) {
        $errorMessage = "発売日が未入力です。";
    } else if (empty($_POST['stock'])) {
        $errorMessage = "在庫数が未入力です。";
    }
    // 全て入力がある場合
    if (!empty($_POST['title']) && !empty($_POST['date']) && !empty($_POST['stock'])) {
        // 入力したtitle・date・stockを格納
        $title = $_POST['title'];
        $date = $_POST['date'];
        $stock = $_POST['stock'];

        // PDOのインスタンスを取得
        $pdo = db_connect();

        try {
            // SQL文の準備：booksテーブルへ書き込み
            $sql = "INSERT INTO books (title, date, stock) VALUES (:title, :date, :stock)";
            // プリペアドステートメントの準備
            $stmt = $pdo->prepare($sql);
            // タイトルをバインド
            $stmt->bindParam('title', $title);
            // 発売日をバインド
            $stmt->bindParam('date', $date);
            // 在庫数をバインド
            $stmt->bindParam('stock', $stock);
            // 実行
            $stmt->execute();
            // main.phpにリダイレクト
            header("Location: main.php");
            exit;
        } catch (PDOException $e) {
            // エラーメッセージの出力
            echo "本の登録に失敗しました。".$e->getMessage();
            // 終了
            die();
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>本登録</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="css/create_post.css">
</head>
<body>
    <header class="header">
    <h1 class="title"><a href="#"></a></h1>
    <nav>
        <ul class="nav-list">
            <li class="nav-item"><a href="main.php">在庫一覧へ戻る</a></li>
            <!-- <li class="nav-item"><a href="create_post">本の新規登録</a></li> -->
            <!-- <li class="nav-item"><a href="#"></a></li> -->
            <!-- <li class="nav-item"><a href="#"></a></li> -->
        </ul>
    </nav>
    </header>
    <h2>本 登録画面</h2>
    <div class="wrapper">
        <div><font color="#ff0000"><?php echo htmlspecialchars($errorMessage, ENT_QUOTES) ?></font></div>
        <br>
        <form method="POST" action="">
            <input class="textbox1" type="text" name="title" id="title" placeholder="タイトル">
            <br>
            <input class="textbox2" type="date" name="date" id="date"><br>
            <div class="stock-quantity">
                <font>在庫数</font><br>
            </div>
            <div>
                <select class="stock-list" name="stock" id="stock">
                    <option value="">選択してください</option>
                <?php
                $number = 1;
                while ( $number <= 50 ) {
                    echo '<option value="', $number, '">', $number, '</option>';
                    $number = $number + 1;
                }
                ?>
                </select>
            </div>
                <input class="registration" type="submit" value="登録" id="registration" name="registration">
            <br>
        </form>
    </div>
</body>
</html>