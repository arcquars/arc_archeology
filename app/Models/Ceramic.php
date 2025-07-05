<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ceramic extends Model
{
    use HasFactory;

    // Indicamos a Eloquent que la clave primaria no es 'id' sino 'material_id'
    protected $primaryKey = 'material_id';

    // Desactivamos el auto-incremento para la clave primaria, ya que es una FK
    public $incrementing = false;

    // Indicamos el tipo de la clave primaria
    protected $keyType = 'int';

    protected $fillable = [
        'material_id',
        'height',
        'diameter_base',
        'diameter_mouth',
        'diameter_max',
        'description',
    ];

    // Relación One-to-One inversa (Una cerámica pertenece a un Material)
    public function material()
    {
        return $this->belongsTo(Material::class, 'material_id');
    }
}
