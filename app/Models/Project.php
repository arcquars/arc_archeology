<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Project extends Model
{
    use HasFactory;

    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'acronym',
        'expedient',
        'initial_quota',
        'final_quota',
        'utm',
        'initial_date',
    ];

    /**
     * Los atributos que deben ser convertidos a instancias de Carbon.
     *
     * @var array<string>
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * Get the users that belong to the project.
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    // Scope para proyectos activos
    public function scopeActive($query)
    {
        return $query->where('active', '1');
    }
}
