<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StructureTab extends Model
{
    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        '',
    ];

    public function project(){
        return $this->belongsTo(Project::class);
    }

    public function quotes(){
        return $this->hasMany(StructureQuote::class);
    }

    // Scope para Ue's activos
    public function scopeActive($query)
    {
        return $query->where('active', '1');
    }
}
