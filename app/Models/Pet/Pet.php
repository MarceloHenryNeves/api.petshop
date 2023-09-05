<?php

namespace App\Models\Pet;

use App\Models\User;
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
        'coat_type_id',
        'owner_id'
    ];

    public function specie()
    {
        return $this->hasOne(Specie::class, 'id', 'specie_id');
    }

    public function breed()
    {
        return $this->hasOne(Breed::class, 'id', 'breed_id');
    }

    public function coat()
    {
        return $this->hasOne(Coat::class, 'id', 'coat_id');
    }

    public function size()
    {
        return $this->hasOne(Size::class, 'id', 'size_id');
    }

    public function owner()
    {
        return $this->hasOne(User::class, 'id', 'owner_id');
    }

    public function coatType()
    {
        return $this->hasOne(CoatType::class, 'id', 'coat_type_id');
    }
}
