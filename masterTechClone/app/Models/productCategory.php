<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $table = 'productCategory';

    protected $fillable = [
        'name',
        'description',
        'image',
    ];

    public function product()
    {
        return $this->hasMany(Product::class, 'productCategory');
    }
}
