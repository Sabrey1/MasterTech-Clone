<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';

    protected $fillable = [
        'name',
        'gender',
        'image',
        'dob',
        'email',
        'phoneNumber',
        'address',
        'hireDate',
        'position',
        'salary',
    ];

    public function sale()
    {
        return $this->hasMany(Sale::class, 'employee_id');
    }
}
