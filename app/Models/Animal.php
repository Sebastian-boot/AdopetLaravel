<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'age',
        'gender',
        'coatColor',
        'weight',
        'height',
        'breed_or_type',
        'rescue_story',
        'rescue_date',
        'health_condition',
        'rescue_place',
        'is_adoptable',
        'status'
    ];

    public function vaccines()
    {
        return $this->belongsToMany(Vaccine::class)
            ->withPivot('apply_date', 'observations', 'administered_by');
    }

}
