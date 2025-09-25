<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payment';

    protected $fillable = [
        'sale_id',
        'payment_date',
        'amount',
        'payment_type',
        'note',
    ];

    public function sale()
    {
        return $this->belongsTo(Sale::class, 'sale_id');
    }

    public function invoice()
    {
        return $this->hasMany(Invoice::class, 'payment_id');
    }
}
