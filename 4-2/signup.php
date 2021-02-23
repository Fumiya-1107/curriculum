<?php
// 外部ファイル取り込み
require('db_connect.php');

//セッション開始
session_start();

$errorMessage = "";
$signUpMessage = "";

// 新規登録ボタンが押された場合のみ、下記の処理を実行する
if (isset($_POST['signUp'])) {
    // ユーザー名・パスワードのチェック
    if (empty($_POST['name'])) {
        $errorMessage = "ユーザー名が末入力です。";
    } else if (empty($_POST['password'])) {
        $errorMessage = "パスワードが末入力です。";
    }
    // 両方入力があった場合、入力されたユーザー名・パスワードを格納
    if (!empty($_POST['name']) && !empty($_POST['password'])) {
        $name = $_POST['name'];
        $password = $_POST['password'];
        // PDOのインスタンスを取得
        $pdo = db_connect();

        try {
            // SQL文の準備：usersテーブルへ書き込み
            $sql = "INSERT INTO users (name, password) VALUES (:name, :password)";
            // パスワードをハッシュ化
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            // プリペアードステートメント：引数で渡された指示（SQL文）をMySQLに分かる形に変換
            $stmt = $pdo->prepare($sql);
            // :passwordに$password_hashをバインド
            $stmt->bindParam(':password', $password_hash);
            // 挿入する値を配列に格納する
            $param = array(':name' => $name , ':password' => $password_hash);
            $stmt->execute($param);
            //挿入する値が入った変数をexecuteにセットしてSQLを実行
            $signUpMessage = "登録が完了しました。　ユーザー名：".$name."　パスワード：".$password;
        } catch(PDOException $e) {
            echo "データベースに接続できませんでした。" .$e->getMesseage();
            die();
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>新規ユーザー登録</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="css/signUp.css">
</head>
<body>
    <header class="header">
    <h1 class="title"><a href="#"></a></h1>
    <nav>
        <ul class="nav-list">
            <li class="nav-item"><a href="signup.php">新規ユーザー登録</a></li>
            <li class="nav-item"><a href="login.php">ログインページ</a></li>
        </ul>
    </nav>
    </header>
    <h2>ユーザー登録画面</h2>
    <div class="wrapper">
        <div><font color="#ff0000"><?php echo htmlspecialchars($errorMessage, ENT_QUOTES); ?></font></div>
        <div><font color="#0000ff"><?php echo htmlspecialchars($signUpMessage, ENT_QUOTES); ?></font></div>
        <form method="POST" action="">
            <font class="username">ユーザー名 ※</font><br>
            <input class="textbox1" type="text" name="name" id="name" placeholder="例) 佐藤　太郎">
            <br>
            <font class="password">パスワード ※</font><br>
            <input class="textbox2" type="password" name="password" id="password" placeholder="英数字10桁"><br>
            <input class="registration" type="submit" value="新規登録" id="signUp" name="signUp">
            <br>
        </form>
    </div>
</body>
</html>