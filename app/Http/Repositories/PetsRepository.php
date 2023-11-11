<?php

namespace App\Http\Repositories;

use App\Models\Pet\Pet;
use Illuminate\Database\Eloquent\Model;

class PetsRepository extends AbstractRepository
{
    public $model;

    public function __construct(Pet $model)
    {
        $this->model = $model;
    }

    public function selectAll()
    {
        return $this->model->select(
            'pets.name',
            'pets.date_of_birth',
            'pets.age',
            'pets.weight',
            'pets.sex',
            'pets.is_allergic',
        )->get();
    }

    public function selectFind(int $id)
    {
        return $this->model->select(
            'pets.name',
            'pets.date_of_birth',
            'pets.age',
            'pets.weight',
            'pets.sex',
            'pets.is_allergic',
            'species.specie as specie',
            'breeds.breed as breed',
            'coats.coat as coat',
            'coat_types.coat_type as coat_type',
            'sizes.size as size'
        )->join('species', 'pets.specie_id', '=', 'species.id')
            ->join('coats', 'pets.coat_id', '=', 'coats.id')
            ->join('coat_types', 'pets.coat_type_id', '=', 'coat_types.id')
            ->join('breeds', 'pets.breed_id', '=', 'breeds.id')
            ->join('sizes', 'pets.size_id', '=', 'sizes.id')
            ->find($id);
    }
}
