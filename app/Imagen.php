<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    protected $table = 'imagens';

    protected $fillable = [
        'url', 'albun_id'
    ];

    public function getAlbum(){
        return $this->belongsTo('App\Albun', 'albun_id');
    }
}
