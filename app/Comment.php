<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];
    protected $dates = ['deleted_at'];
   
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function replies(){
        return $this->hasmany(Comment::class, 'parent_id');
    }

    
}
