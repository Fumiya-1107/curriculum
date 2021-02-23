<?php

// DB情報を定数化
define('DB_DATABASE', 'BookStock');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_DSN', 'mysql:host=localhost;charset=utf8;dbname='.DB_DATABASE);

/**
 * DBの接続設定をしたPDOインスタンスを返却する
 * @return object
 */

function db_connect() { // conenct関数：接続先への接続を作成
    try {
        $pdo = new pdo(DB_DSN, DB_PASSWORD, DB_USERNAME);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo; // 返り値を取得
    } catch(Exception $e) {
        echo "ERROR　".$e->getMessage(); // エラー表記
        die(); // 接続終了
    }
}
?>