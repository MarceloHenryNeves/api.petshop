<?php

namespace App\Models\Services;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceSubservice extends Model
{
    use HasFactory;

    protected $table = "services_subservices";
    protected $primaryKey = "id";

    protected $fillable = [
      "service_id",
      "subservice_id",
      "subservice_description",
    ];
}
