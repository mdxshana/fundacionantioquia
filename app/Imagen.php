<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    protected $table = 'imagens';

    protected $fillable = [
        'url', 'albun_id'
    ];
}
