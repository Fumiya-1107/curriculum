<?php
//データベース情報を定数化

// DB名
define('DB_DATABASE', 'YIGroupBlog');
// MySQLのユーザー名
define('DB_USERNAME', 'root');
// MySQLのログインパスワード
define('DB_PASSWORD', 'root');
// DSN
define('PDO_DSN', 'mysql:host=localhost;charset=utf8;dbname='.DB_DATABASE);

/**
 * DBの接続設定をしたPDOインスタンスを返却する
 * @return object
 */
function db_connect() { //conenct関数：接続先への接続を作成
    try { //tryの括弧内の処理を実行。失敗した場合キャッチして例外を発生させる。

        // PDO(PHP Date Objects：PHPからデータベースへ接続するためのクラス)のインスタンス作成
        $pdo = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
        
        // アロー演算子「->」：左辺"クラスとインスタンスを取る"　右辺"左辺のクラスが持つプロパティやメソッドを指定しプロパティへのアクセス・メソッドの呼び出しを実行"
        // PDOの例外エラーを詳細にするオプション(デバッグ時に役立つオプション)
        // PDO::ATTR_ERRMODE「属性」　PDO::ERRMODE_EXCEPTION「PDOExceptionの例外を投げる」
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo; //返り値を取得
    } catch(PDOException $e) { //実行
        echo 'Error: ' . $e->getMessage(); //失敗した理由が$eに入る
        die(); //接続終了
    }
}