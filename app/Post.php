<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
  protected $gurded = array('id');
  
  protected $fillable = ['title', 'content'];
  
  public static $rules = array(
     'title' => 'required',
     'content' => 'required',
      );
  
  public function user()
  {
      return $this->belongsTo('App\User');
  }
  
  public function comments(){
      return $this->hasMany('App\Comment', 'post_id');
  }
  
}
