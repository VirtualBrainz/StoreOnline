<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'user_id','subcategory_id','name','slug','stock','quantity','actualPrice','previousPrice','discountRate','shortDescription','longDescription','state','status',
    ];


    public function images(){
        return $this->morphMany('App\Image', 'imageable');
    }

    public function subcategory(){
        return $this->belongsTo(Subcategory::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comments(){
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id')->orderBy('id','DESC');

    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    
}
