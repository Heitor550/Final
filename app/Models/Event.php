<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['equipamento_id', 'title', 'description', 'type', 'date', 'items'];

    public function equipamento()
    {
        return $this->belongsTo(Equipamento::class);
    }

    public function user() {
        return $this->belongsTo("App/Models/User");
    }
}