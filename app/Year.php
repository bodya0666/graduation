<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    protected $fillable = [
        'year'
    ];

    protected $table = 'year';
}
