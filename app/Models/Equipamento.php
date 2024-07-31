<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipamento extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'tipo', 'fabricante', 'data_aquisicao', 'imagem'];

    public function eventos()
    {
        return $this->hasMany(Event::class);
    }
}