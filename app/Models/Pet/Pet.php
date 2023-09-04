<?php

namespace App\Models\Pet;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    protected $table = 'pets';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'date_of_birth',
        'age',
        'weight',
        'sex',
        'is_allergic',
        'specie_id',
        'breed_id',
        'size_id',
        'coat_id',
    ];
}
