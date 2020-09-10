<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{

    protected $fillable = [
        'name',
    ];

    // Obtiene la info del autor
    public function autor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function paginas()
    {
        return $this->hasMany(Pagina::class);
    }
}
