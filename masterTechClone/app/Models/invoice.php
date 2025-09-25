<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $table = 'invoice';

    protected $fillable = [
        'sale_id',
        'payment_id',
        'invoice_number',
        'invoice_date',
        'amount_due',
        'amount_paid',
        'status',
    ];

    public function sale()
    {
        return $this->belongsTo(Sale::class, 'sale_id');
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'payment_id');
    }
}
