<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    // protected $primaryKey = 'id';

    // protected $fillable = [
    //     'username',
    //     'password',
    // ];

    // pake relational ini coba
    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category', 'id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'id_brand', 'id');
    }

    public function spec()
    {
        return $this->hasMany(ProductSpec::class, 'product_id', 'id')
                    ->orderBy('id', 'desc');
    }

    public function externalLink()
    {
        return $this->hasMany(ProductExternalLink::class, 'product_id', 'id');
    }
}
