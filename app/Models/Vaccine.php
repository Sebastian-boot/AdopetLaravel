<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'price'
    ];

    public function animals()
    {
        return $this->belongsToMany(Animal::class)
            ->withPivot('apply_date', 'observations', 'administered_by');
    }

}
