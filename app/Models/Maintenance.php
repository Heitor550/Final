<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    use HasFactory;

    protected $fillable = [
        'equipamento_id',
        'title',
        'description',
        'type',
        'date',
        'items',
    ];

    protected $casts = [
        'date' => 'date',
        'items' => 'array',
    ];

    /**
     * Get the equipamento that owns the maintenance.
     */
    public function equipamento()
    {
        return $this->belongsTo(Equipamento::class);
    }

    /**
     * Scope a query to only include maintenances of a given type.
     */
    public function scopeOfType($query, $type)
    {
        return $query->where('type', $type);
    }

    /**
     * Scope a query to only include maintenances for a specific date range.
     */
    public function scopeDateBetween($query, $start, $end)
    {
        return $query->whereBetween('date', [$start, $end]);
    }
}