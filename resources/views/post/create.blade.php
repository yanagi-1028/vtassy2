 @extends('layouts.admin')
    
    @section('title', '投稿作成')
    
　　@section('content')
　　<div class="container">
　　    <div class="row">
　　        <div class="col-md-8 mx-auto">
　　            <h2>症例投稿</h2>
　　            <form action="{{ action('PostController@create') }}" method="post" enctype="multipart/form-data">
                    <div class="form-group ">
                        <label class="col-md-2">タイトル</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control"　size="10" name="title" value="{{ old('title') }}">
                        </div>
                        <div class="form-group">
                        <label class="col-md-2">本文</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="content" rows="20">{{ old('content') }}</textarea>
                        </div>
                    </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-success" value="投稿する">
                </form>
               
                </div>
            </div>
        </div>
    </div>
　　        </div>
　　    </div>
　　</div>
　　@endsection
