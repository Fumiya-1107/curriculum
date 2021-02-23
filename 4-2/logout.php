<?php
// セッション開始
session_start();
// セッション変数のクリア
$_SESSION = array();
// セッションクリア
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
    <title>ログアウト</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="css/logout.css">
</head>
<body>
    <header class="header">
    </header>
    <h2>正常にログアウトしました。</h2>
    <div class="wrapper">
    	<p>ご利用ありがとうございました。またのご利用をお待ちしております。</p>
    </div>
    <input class="back" type="button" onclick="location.href='login.php'" value="ログインページに戻る">
</body>
</html>