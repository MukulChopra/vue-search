<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class search extends Model
{
    protected $table = 'ref_firstnames';
    protected $fillable = [
        'name'
    ];
}
