<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductExternalLink extends Model
{
    protected $table = 'product_external_link';
    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
