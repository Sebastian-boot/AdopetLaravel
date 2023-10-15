<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fundaciones extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'introduction',
        'history',
        'email',
        'phone',
        'website',
        'nit',
        'employeeCount',
        'foundationFoundingDate',
        'animalsAssitedCount',
        'currentAnimalAssitedCount',
        'limitAnimalAssitedCount',
        'foundationrating',
    ];

    protected $table = "fundaciones";

}
