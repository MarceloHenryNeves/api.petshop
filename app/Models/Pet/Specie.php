<?php

namespace App\Models\Pet;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specie extends Model
{
    use HasFactory;

    protected $table = 'species';
    protected $primaryKey = 'id';

    protected $fillable = [
        'specie'
    ];
}
