<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Routing：アクセスしたアドレスに応じて対応するControllerのActionを呼び出す仕組み

Auth::routes(); //ログインしたか否か判定
// Route::group　Routingの設定をgroup化する役割。→無名関数function(){}の中の全てのRoutingの設定に適用させるため
// [‘prefix’ => ‘admin’]　 http://XXXXXX.jp/admin/ から始まるURLにしてる
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
	// http://XXXXXX.jp/admin/news/create にアクセスが来たら、Admin\NewsControllerのAction addに渡す

	// middleware('auth')　リダイレクトされる
    Route::get('news/create', 'Admin\NewsController@add')->middleware('auth');
    Route::post('news/create', 'Admin\NewsController@create')->middleware('auth');
    Route::get('news/create', 'Admin\NewsController@index')->middleware('auth');
    Route::get('news/delete', 'Admin\NewsController@delete')->middleware('auth');
});
