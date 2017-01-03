<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Albun extends Model
{
    protected $table = 'albuns';

    protected $fillable = [
        'nombre', 'tipo'
    ];
}
