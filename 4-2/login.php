<?php
// 外部ファイル取り込み
require('db_connect.php');
// セッション開始(HTTP通信はステートレスなプロトコルなため、サーバーに状態を保持しておくため必要)
session_start();

// ログインボタンが押された場合のみ、下記の処理を実行する
if (isset($_POST['login'])) {
    // ユーザー名・パスワードのチェック
    if (empty($_POST['name'])) {
        echo "ユーザー名が未入力です。";
    } else if (empty($_POST['password'])) {
        echo "パスワードが未入力です。";
    }
    // 両方共入力されている場合
    if (!empty($_POST['name']) && !empty($_POST['password'])) {
        //ログイン名とパスワードのエスケープ処理(ビューの表示を変えないようにする)
        $name = htmlspecialchars($_POST['name'], ENT_QUOTES);
        $password = htmlspecialchars($_POST['password'], ENT_QUOTES);

        // ログイン処理開始(PDOのインスタンスを取得)
        $pdo = db_connect();

        try {
            // SQLの準備：usersテーブルから情報取得
            $sql = "SELECT * FROM users WHERE name = :name";
            // プリペアードステートメント：引数で渡された指示（SQL文）をMySQLに分かる形に変換
            $stmt = $pdo->prepare($sql);
            // nameの値をバインド
            $stmt->bindParam(':name', $name);
            // 実行
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error:".$e->getMessage();// エラー表示
            die();//接続終了
        }

        // 結果が1行取得できたら
        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // ハッシュ化されたパスワードを判定する定形関数のpassword_verify
            // 入力された値と引っ張ってきた値が同じか判定しています。
            if (password_verify($password, $row['password'])) {
                // セッションに値を保存
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['user_name'] = $row['name'];
                // main.phpにリダイレクト
                header("Location: main.php");
                exit;
            } else {
                // パスワードが違った場合
                echo "パスワードに謝りがあります。";
            } 
        } else {
            // ユーザー名がなかった時の処理
            echo "ユーザー名かパスワードに謝りがあります。";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>ログイン</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
    <header class="header">
    <h1 class="title"><a href="#"></a></h1>
    <nav>
        <ul class="nav-list">
            <li class="nav-item"><a href="signup.php">新規ユーザー登録</a></li>
            <li class="nav-item"><a href="login.php">ログインページ</a></li>
            <!-- <li class="nav-item"><a href="create_post.php">本登録</a></li> -->
            <!-- <li class="nav-item"><a href="#"></a></li> -->
        </ul>
    </nav>
    </header>
    <h2>ログイン画面</h2>
    <div class="wrapper">
        <form method="POST" action="">
            <input class="textbox1" type="text" name="name" placeholder="ユーザー名">
            <br>
            <input class="textbox2" type="password" name="password" placeholder="パスワード"><br>
            <input class="registration" type="submit" value="ログイン" name="login">
            <br>
        </form>
    </div>
</body>
</html>