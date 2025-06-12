<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Festival extends Model
{
    protected $fillable = [
        'name_mk',
        'name_en',
        'name_sr',
        'slug',
        'start_date',
        'end_date',
        'location',
        'year',
    ];
    
}
