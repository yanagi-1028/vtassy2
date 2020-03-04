@extends('layouts.admin')
@section('title', 'ユーザー投稿一覧')

@section('content')
@section('content')

    <div class="container mt-4">

        <div class="mb-4">
        <p>{{ $user_name }}さんの投稿一覧</p>
        </div>

        @foreach ($posts as $post)
            <div class="card mb-4">
                <div class="card-header">
                    タイトル: {{ $post->title }}
                
                <div class="card-body">
                    <p class="card-text">
                    <li> {{ Str::limit($post->content, 140) }}
                    </p>
                    
                </div>
                
                <div class="card-footer">
                    <span class="mr-2">
                        投稿日時 {{ $post->created_at->format('Y.m.d') }}
                    </span>
                </div>
                @can('update', $post)
                <div>
                     <a href="{{ action('PostController@edit', ['id' => $post->id]) }}">編集</a>
                     <a href="{{ action('PostController@delete', ['id' => $post->id]) }}">削除</a>
                </div>
                @endcan
            </div>
            
        @endforeach
        <div class="d-flex justify-content-center mb-5">
            {{ $posts->links() }}
        </div>

    </div>
@endsection