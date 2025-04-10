<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brand';
    protected $guarded = [];
    // protected $primaryKey = 'id';

    // protected $fillable = [
    //     'username',
    //     'password',
    // ];
    public function section()
    {
        return $this->hasOne(BrandSection::class, 'brand_id', 'id');
    }
}
