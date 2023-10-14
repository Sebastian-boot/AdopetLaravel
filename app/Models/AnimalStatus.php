<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimalStatus extends Model
{
    use HasFactory;

     protected $table = 'animal_states';

    protected $fillable = [
        'name'
    ];

    public function animal(){
        return $this->hasOne(Animal::class);
    }

}
