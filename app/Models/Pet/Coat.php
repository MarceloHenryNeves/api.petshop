<?php

namespace App\Models\Pet;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coat extends Model
{
    use HasFactory;

    protected $table = 'coats';
    protected $primaryKey = 'id';

    protected $fillable = [
        'coat'
    ];
}
