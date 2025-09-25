<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';

    protected $fillable = [
        'name',
        'gender',
        'image',
        'email',
        'phoneNumber',
        'dob',
        'address',
    ];

    public function sale()
    {
        return $this->hasMany(Sale::class, 'customer_id');
    }
}
