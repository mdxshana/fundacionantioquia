<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Texto extends Model
{
    protected $table = 'textos';

    protected $fillable = [
        'titulo', 'texto'
    ];
}
