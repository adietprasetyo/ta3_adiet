<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $guarded = [];

    public function produk(){
        return $this->hasMany(Produk::class, 'category_id', 'id');
    }
}
