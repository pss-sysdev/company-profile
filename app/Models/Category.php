<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Category extends Model
{
    protected $table = 'category';
    // protected $primaryKey = 'id';

    // protected $fillable = [
    //     'username',
    //     'password',
    // ];

    public function products()
    {
        return $this->hasMany(Product::class, 'id_category', 'id');
    }
}
