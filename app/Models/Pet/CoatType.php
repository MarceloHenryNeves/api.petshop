<?php

namespace App\Models\Pet;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoatType extends Model
{
    use HasFactory;

    protected $table = 'coat_types';
    protected $primaryKey = 'id';

    protected $fillable = [
      'coat_type'
    ];
}
