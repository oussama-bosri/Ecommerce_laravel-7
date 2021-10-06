<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $filable = ["title", "slug"];
    public function getRouteKeyName()
    {
        return "slug";
    }
    public function products(){
        return $this->hasMany(Product::class);
    }
}
