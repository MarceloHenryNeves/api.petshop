<?php

namespace App\Http\Repositories;

use App\Models\User;

class UserRepository extends AbstractRepository
{
    public $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function pets()
    {
        return $this->model->select(
            'pets.name',
            'pets.date_of_birth',
            'pets.age',
            'pets.weight',
            'pets.sex',
            'pets.is_allergic',
            'species.specie as specie',
            'breeds.breed as breed'
        )->join('pets', 'pets.owner_id', '=', 'users.id')
            ->join('species', 'species.id', '=', 'pets.specie_id')
            ->join('breeds', 'breeds.id', 'pets.breed_id')
            ->where("owner_id", auth()->user()->id)->get();
    }
}
