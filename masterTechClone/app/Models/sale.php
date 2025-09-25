<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $table = 'sale';

    protected $fillable = [
        'product_id',
        'customer_id',
        'employee_id',
        'sale_number',
        'sale_date',
        'quantity',
        'subtotal',
        'discount',
        'tax',
        'total_amount',
        'status',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function customers()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function employees()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function detail()
    {
        return $this->hasMany(SaleDetail::class, 'sale_id');
    }

    public function payment()
    {
        return $this->hasMany(Payment::class, 'sale_id');
    }

    public function invoice()
    {
        return $this->hasMany(Invoice::class, 'sale_id');
    }
}
