<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatalogueArchitectual extends Model
{
    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'proceed_ue',
        'proceed_date_admission',
        'proceed_source_admission',
        'proceed_acronym',
        'proceed_origin',
        'c_classification',
        'c_common_name',
        'c_specific_name',
        'c_dating',
        'c_integrity_status',
        'a_acronyms',
        'a_location',
        'location',
        'location_date',
        'location_notes',
        'dimension_long',
        'dimension_anch',
        'dimension_alt',
        'dimension_other',
        'subject',
        'technique',
        'description',
        'conservation_status',
        'comments',
        'author',
        'project_id',
        'user_id',
    ];

    public function project(){
        return $this->belongsTo(Project::class);
    }

    public function scopeActive($query)
    {
        return $query->where('active', '1');
    }

    public function urlPhotosAttribute(){
        return env('WASABI_DIR', 'default') . "/proyectos/".$this->project_id."/inventario-materiales/catalogo-elementos-arquitectonico/".$this->id."/fotografias";
    }

    public function urlSketchAttribute(){
        return env('WASABI_DIR', 'default') . "/proyectos/".$this->project_id."/inventario-materiales/catalogo-elementos-arquitectonico/".$this->id."/croquis";
    }
}
