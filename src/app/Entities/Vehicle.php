<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $fillable = [
        'id',
        'name',
        'fipe_code',
        'price',
    ];

    protected $keyType = 'string';

    public static function create(array $attributes = []): Vehicle
    {
        $vehicle = new Vehicle();
        $vehicle->fill($attributes);
        return $vehicle;
    }
}
