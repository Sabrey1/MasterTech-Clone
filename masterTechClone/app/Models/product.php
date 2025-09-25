<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';

    protected $fillable = [
        'productCategory',
        'name',
        'description',
        'image',
        'price',
        'stock',
    ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'productCategory');
    }

    public function sale()
    {
        return $this->hasMany(Sale::class, 'product_id');
    }

    public function saleDetail()
    {
        return $this->hasMany(SaleDetail::class, 'product_id');
    }
}
