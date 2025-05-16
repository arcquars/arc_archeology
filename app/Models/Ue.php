<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ue extends Model
{
    /** @use HasFactory<\Database\Factories\UeFactory> */
    use HasFactory;

    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'code',
        'covered_by',
        'covers_to',
        'description',
        'interpreting',
        'dating',
        'project_id',
        'user_id'
    ];

    public function project(){
        return $this->belongsTo(Project::class);
    }

    // Scope para Ue's activos
    public function scopeActive($query)
    {
        return $query->where('active', '1');
    }
}
