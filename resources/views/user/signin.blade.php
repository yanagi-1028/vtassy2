@extends('layouts.admin')

@section('content')
  <div class="row">
   <div class="col-md-4 col-md-offset-4">
     <h1>Sign In</h1>
       @if(count($errors) >0)
          <div class="alert alert-danger">
           @foreach($errors->all() as $error)
             <p>{{ $error }}</p>
           @endforeach
          </div>
       @endif
       <form action="{{ route('user.signin') }}" method="post">
           <div class="form-group">
             <label for="mailaddress">メールアドレス</label>
             <input type="text" id="mailaddress" name="mailaddress" class="form-control">
           </div>
           <div class="form-group">
               <label for="password">パスワード</label>
               <input type="password" id="password" name="password" class="form-control">
           </div>
         <button type="submit" class="btn btn-success">ログイン</button>
         {{ csrf_field() }}
       </form>
    </div>
  </div>
@endsection
 