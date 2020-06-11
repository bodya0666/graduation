<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarImage extends Model
{
    protected $fillable = [
        'name',
        'is_main',
        'car_id',
    ];

    protected $table = 'car_image';
}
