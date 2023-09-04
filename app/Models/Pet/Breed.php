<?php

namespace App\Models\Pet;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
    use HasFactory;

    protected $table = 'breeds';
    protected $primaryKey = 'id';

    protected $fillable = [
        'breed',
        'specie_id'
    ];
}
