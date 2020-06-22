<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteModel extends Model
{
    public $fillable = [
        'name',
        'model_id',
    ];

    protected $table = 'site_model';
}
