<?php

namespace App\Models;

use App\Models\Pet\Pet;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scheduling extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'pet_id',
        'service_id',
        'observation'
    ];

    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }
}
