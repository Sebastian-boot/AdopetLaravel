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
        'coat_color',
        'weight',
        'height',
        'breed_or_type',
        'rescue_history',
        'rescue_date',
        'health_condition',
        'rescue_place',
        'is_adoptable',
        'animal_status_id',
    ];

    public function vaccines()
    {
        return $this->belongsToMany(Vaccine::class)
            ->withPivot('apply_date', 'observations', 'administered_by');
    }

    public function status(){
        return $this->belongsTo(AnimalStatus::class, 'animal_status_id');
    }
}
