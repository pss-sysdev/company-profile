<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductDetailPicture extends Model
{
    protected $table = 'product_detail';

    public $timestamps = false;

    protected $fillable = [
        'product_id',
        'sort_number',
        'detail_picture_url',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}