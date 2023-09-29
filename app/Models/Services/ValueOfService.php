<?php

namespace App\Models\Services;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ValueOfService extends Model
{
    use HasFactory;

    protected $table = 'value_of_services';
    protected $primaryKey = 'id';

    protected $fillable = [
      'serive_id',
        'size_id',
        'coat_id',
        'prize',
        'extra_value_if_allergic'
    ];
}
