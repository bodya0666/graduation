<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'name',
        'price',
        'url',
        'distance',
        'gear',
        'fuel',
        'engine',
        'location',
        'equipment',
        'description',
        'year',
        'site_id',
        'site_brand_id',
        'site_model_id'
    ];

    protected $table = 'car';

    public function mainImage()
    {
        return $this->hasOne('App\CarImage')->where('is_main', 1);
    }
}
