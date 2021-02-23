<?php
// db_connect.phpの読み込み
require('db_connect.php');

// function.phpの読み込み
require('function.php');

// ログインしていなければ、login.phpにリダイレクト
check_user_logged_in();

// URLの?以降で渡されるidをキャッチ
$id = $_GET['id'];
// もし、$idが空であったらmain.phpにリダイレクト
// 不正なアクセス対策
if (empty($id)) {
	header("Location: main.php");
	exit;
}

// PDOのインスタンスを取得
$pdo = db_connect();

try {
    // SQL文の準備
    $sql = "DELETE FROM books WHERE id = :id";
    // プリペアドステートメントの作成
    $stmt = $pdo->prepare($sql);
    // idのバインド
    $stmt->bindParam(':id', $id);
    // 実行
    $stmt->execute();
    // main.phpにリダイレクト
    header("Location: main.php");
    
} catch (PDOException $e) {
    // エラーメッセージの出力
    echo "本の削除に失敗しました。".$e->getMessage();
    // 終了
    die();
}