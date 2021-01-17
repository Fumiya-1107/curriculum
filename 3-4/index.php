<?php
    //外部ファイル(getdata.php)の取り込み
    require_once('getdata.php');

    //セッション開始
    session_start();

    //インスタンス化
    $userpost = new getData();
    $postuser = new getData();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>第3章チェックテスト</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="wrapper">
        <div class=header>
            <img src="image/Y&I-logo.png" alt="Y&Iロゴ" title="Y&Iロゴ">
            <div class="hayata">
                <p align="right">
                    <!-- usersテーブル(first_name, last_name)取得 -->
                    <?php $userkakunou = $userpost->getUserData();
                    echo "ようこそ ".$userkakunou['last_name'].$userkakunou['first_name']." さん";?>
                </p>
            </div>
            <div class="login">
                <p align="right">
                    <!-- usersテーブル(last_login)取得 -->
                    <?php $users_data = $userpost->getUserData();
                    echo "最終ログイン日：".$users_data['last_login'];?>
                </p>
            </div>
        </div>
        <!-- postsテーブル取得 -->
        <div class="post">
            <div class="kiji">記事ID
                <br>
    <!--        <div class="title">タイトル</div>
                <div class="category">カテゴリ</div>
                <div class="honbun">本文</div>
                <div class="toukou">投稿日</div> -->
                <p align="left">
                    <?php $postkakunou = $postuser->getPostData();
                        // ループ文を使用して、1行ずつ読み込んで$rowに代入する
                        // 読み込むものがなくなったらループ終了
                        while ($row = $postkakunou->fetch(PDO::FETCH_ASSOC)) {
                            echo $row['id'];
                            echo '<br />';
                        } ?></p>
            </div>
            <div class="title">タイトル
                <br>
                <p align="left">
                <?php $postkakunou = $postuser->getPostData();
                    // ループ文を使用して、1行ずつ読み込んで$rowに代入する
                    // 読み込むものがなくなったらループ終了
                    while ($row = $postkakunou->fetch(PDO::FETCH_ASSOC)) {
                        echo $row['title'];
                        echo '<br />';
                    } ?></p>
            </div>
            <div class="category">カテゴリ
                <br>
                <p align="left">
                <?php $postkakunou = $postuser->getPostData();
                    // ループ文を使用して、1行ずつ読み込んで$rowに代入する
                    // 読み込むものがなくなったらループ終了
                    while ($row = $postkakunou->fetch(PDO::FETCH_ASSOC)) {
                        $row['category_no'];
                        if ($row == 1) {
                            echo "食事";
                        } elseif ($row == 2) {
                            echo "旅行";
                        } else {
                            echo "その他";
                        }
                        echo '<br />';
                    } ?></p>
            </div>
            <div class="honbun">本文
                <br>
                <p align="left">
                <?php $postkakunou = $postuser->getPostData();
                    // ループ文を使用して、1行ずつ読み込んで$rowに代入する
                    // 読み込むものがなくなったらループ終了
                    while ($row = $postkakunou->fetch(PDO::FETCH_ASSOC)) {
                        echo $row['comment'];
                        echo '<br />';
                    } ?></p>
            </div>
            <div class="toukou">投稿日
                <br>
                <p align="left">
                <?php $postkakunou = $postuser->getPostData();
                    // ループ文を使用して、1行ずつ読み込んで$rowに代入する
                    // 読み込むものがなくなったらループ終了
                    while ($row = $postkakunou->fetch(PDO::FETCH_ASSOC)) {
                        echo $row['created'];
                        echo '<br />';
                    } ?></p>
            </div>
        </div>
        <div class="hooter">
            <p align="left">Y&I group.inc</p>
        </div>
    </div>
</body>
</html>
