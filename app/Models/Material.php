<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    const MATERIAL_TYPE_CERAMIC = 'Cerámica';
    const MATERIAL_TYPE_TILE = 'Azulejo';
    protected $fillable = [
        'ue',
        'object',
        'century',
        'class',
        'fragments',
        'form',
        'piece_percentage',
        'thickness',
        'pasta',
        'decoration',
        'material_type',
        'project_id',
        'user_id',
    ];

    public function project(){
        return $this->belongsTo(Project::class);
    }

    // Relación One-to-One con Cerámica
    public function ceramic()
    {
        // Un material puede tener una cerámica asociada (si es de tipo 'Ceramica')
        return $this->hasOne(Ceramic::class, 'material_id');
    }

    // Relación One-to-One con Azulejo
    public function tile()
    {
        // Un material puede tener un azulejo asociado (si es de tipo 'Azulejo')
        return $this->hasOne(Tile::class, 'material_id');
    }

    // ----- Helpers para acceder al tipo específico de material (Opcional, pero muy útil) -----
    public function getSpecificMaterialAttribute()
    {
        switch ($this->material_type) {
            case self::MATERIAL_TYPE_CERAMIC:
                return $this->ceramic;
            case self::MATERIAL_TYPE_TILE:
                return $this->tile;
            default:
                return null; // O lanzar una excepción si el tipo es desconocido
        }
    }

    // Alcance (Scope) para filtrar por tipo de material (Opcional)
    public function scopeCeramics($query)
    {
        return $query->where('material_type', self::MATERIAL_TYPE_CERAMIC);
    }

    public function scopeTiles($query)
    {
        return $query->where('material_type', self::MATERIAL_TYPE_TILE);
    }
}
