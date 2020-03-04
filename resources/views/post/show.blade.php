@extends('layouts.admin')

@section('title', '症例詳細')

@section('content')

　<div calss="container-fluid">
　    <div class='row'> 
　       <div class="border p-4">
　          <div class="h5 mb-4">
　            {{ $post->title}}
　          </div>
　          <div class="md-5">
　            {{ $post->content }}
　          </div>
　          <div class="image col-md-2 text-right mt-4">
              @if ($post->image_path)
                <img src="{{ asset('storage/image/' . $post->image_path) }}">
            @endif
             </div>
　    </div>
　</div>
        <hr />
        <h2>コメント一覧</h2>
        @forelse($post->comments as $comment)
          <div class="border-top p-4">
              <li>{{ $comment->body }}</li>
             
          </div>
        @empty
          <p>コメントはまだありません</p>
        @endforelse
  
  
   <hr />
   <form class="mb-4" method="post" action="{{action('CommentController@store', $post->id)}}">
       {{csrf_field()}}
       <input name="post_id" type="hidden" value="{{ $post->id}}">
       <div class="form-group">
           <label for="body">
               コメントを書く
           </label>
           <textarea id="body" name="body" class="form-control" rows="4">
               {{ old('body') }}
           </textarea>
       </div>
       <input type="submit" value="送信"/>
   </form>
@endsection