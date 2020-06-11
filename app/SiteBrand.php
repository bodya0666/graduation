<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteBrand extends Model
{
    protected $fillable = [
        'name',
        'brand_id'
    ];

    protected $table = 'site_brand';
}
