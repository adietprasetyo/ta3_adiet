<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produk extends Model
{
    //
    protected $guarded = [];
    use SoftDeletes;

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
