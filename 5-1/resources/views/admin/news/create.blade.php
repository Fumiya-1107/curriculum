@extends('layouts.admin')
@section('title', 'Twitter')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>Twitter</h2>
                <form action="{{ action('Admin\NewsController@create') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="body"></label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="body" value="{{ old('body') }}" placeholder="今どうしてる？">
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-dark" value="つぶやく">
                </form>
            </div>
            <div class="wrapper">
                <div class="block-text">
                    @foreach($posts as $news)
                            <div class="name"><?php $user = Auth::user(); ?>{{ $user->name }}</div>
                            <div class="date">{{ str_limit($news->created_at, 250) }}</div>
                            <div class="body">{{ str_limit($news->body, 250) }}</div>
                            <div class="delete"><a href="{{ action('Admin\NewsController@delete', ['id' => $news->id]) }}">削除</a></div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection