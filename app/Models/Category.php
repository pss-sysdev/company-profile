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

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_cat_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_cat_id')->where('parent_id', '!=', 0);
    }


    public function products()
    {
        return $this->hasMany(Product::class, 'id_category', 'id');
    }
}
