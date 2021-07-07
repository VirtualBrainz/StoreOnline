<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name', 'category_id', 'slug',
    ];
    public function products(){
        return $this->belongsToMany(Product::class);
    }

    public function post(){
        return $this->belongsToMany(Post::class);
    }


}
