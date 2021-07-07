<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $fillable = [
        'name', 'category_id', 'slug',
    ];
    public function category(){
        return $this->belongsto(Category::class);
    }

    public function products(){
        return $this->hasMany(products::class);
    }
}
