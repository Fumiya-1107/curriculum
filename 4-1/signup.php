<?php

require("db_connect.php");

//セッション開始
session_start();

$errorMessage = "";
$signUpMessage = "";

// 送信ボタンが押された場合
if (isset($_POST["signUp"])) {
    // ユーザー名・パスワードのチェック
    if (empty($_POST['name'])) { 
        $errorMessage = "ユーザー名が未入力です。";
    } else if (empty($_POST['password'])) {
        $errorMessage = "パスワードが未入力です。";
    }

    // 入力されたユーザー名・パスワードを格納
    if (!empty($_POST['name']) && !empty($_POST['password'])) {
        $name = $_POST['name'];
        $password = $_POST['password'];

        // PDOのインスタンスを取得
        $pdo = db_connect();

        try {
            // SQL文の準備：usersテーブルへ書き込み
            $sql = "INSERT INTO users (name, password) VALUES (:name, :password)";// INSERT文を変数に格納
            // パスワードをハッシュ化
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            // プリペアードステートメント：引数で渡された指示（SQL文）をMySQLに分かる形に変換
            $stmt = $pdo->prepare($sql);
            // :passwordに$password_hashをバインド
            $stmt->bindParam(':password',$password_hash);
            // 挿入する値を配列に格納する
            $params = array(':name' => $name, ':password' => $password_hash);
            //挿入する値が入った変数をexecuteにセットしてSQLを実行
            $stmt->execute($params);
            $signUpMessage = "登録が完了しました。名前：".$name."　パスワード：".$password;
        } catch (PDOException $e) {
            echo "データベースに接続できませんでした。" . $e->getMessage();
            die();
        }

    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
    <h1>新規登録</h1>
    <div><font color="#ff0000"><?php echo htmlspecialchars($errorMessage, ENT_QUOTES); ?></font></div>
    <div><font color="#0000ff"><?php echo htmlspecialchars($signUpMessage, ENT_QUOTES); ?></font></div>
    <form method="POST" action="">
        user:<br>
        <input type="text" name="name" id="name">
        <br>
        password:<br>
        <input type="password" name="password" id="password"><br>
        <input type="submit" value="submit" id="signUp" name="signUp">
        <br>
        <a href="login.php">ログイン画面へ移動</a>
    </form>
</body>
</html>