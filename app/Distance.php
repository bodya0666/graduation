<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Distance extends Model
{
    protected $fillable = [
        'distance'
    ];

    protected $table = 'distance';
}
