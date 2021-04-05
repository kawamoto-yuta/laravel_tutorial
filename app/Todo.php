<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = ['title', 'content', 'status'];

    public function user(){
        return $this->belongsTo('App\User','id');
        // 第二引数にforeign_keyを設定する。
    }
}
