<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrandSection extends Model
{
    protected $table = 'brand_section';
    // protected $primaryKey = 'id';

    // protected $fillable = [
    //     'username',
    //     'password',
    // ];

    protected $guarded = [];
    public $timestamps = false;

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
        // return $this->hasOne(Brand::class, 'id', 'brand_id');
    }
}
