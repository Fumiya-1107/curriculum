<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;

class NewsController extends Controller
{
  public function add()
  {
      // admin/newsディレクトリ配下のcreate.blade.phpを呼び出す
      return view('admin.news.create');
  }

  public function create(Request $request)
  {
      // Varidationを行う
      $this->validate($request, News::$rules);
      $news = new News;
      $form = $request->all();

      unset($form['_token']);
      unset($form['image']);
      // データベースに保存する
      $news->fill($form);
      $news->save();

      return redirect('admin/news/create');
  }

  public function index()
  {
    $posts = News::all();
      return view('admin.news.create', compact('posts'));
  }

    public function Delete(Request $request)
  {
      $destroy = News::find($request->id);
      $destroy->delete();
      return redirect('admin/news/create');
  }

}