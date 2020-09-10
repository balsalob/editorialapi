<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagina extends Model
{

    // Campos que se agregaran
    protected $fillable = [
        'url',
    ];

    // relación 1:1 de Página con comic
    public function comic()
    {
        return $this->belongsTo(Comic::class, 'comic_id');
    }
}
