<?php

// ログインチェックの関数化
// セッション変数に値がない（ログインしていない）場合は、ログインページに戻す
// function.php
/**
 * $_SESSION["user_name"]が空だった場合、ログインページにリダイレクトする
 * @return void
 */
function check_user_logged_in() {
    // セッション開始
    session_start();
    // セッションにuser_nameの値がなければlogin.phpにリダイレクト
    if (empty($_SESSION["user_name"])) {
        header("Location: login.php");
        exit;
    }
}

function redirect_main_unless_parameter($param) {
	if (empty($param)) {
		header("Location: main.php");
		exit;
	}
}
