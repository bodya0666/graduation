<?php

namespace App;

use Illuminate\Database\Eloquent\Model as ModelClass;

class Model extends ModelClass
{
    protected $fillable = [
        'name',
        'brand_id',
    ];

    protected $table = 'model';
}
