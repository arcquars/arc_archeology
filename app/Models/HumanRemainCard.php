<?php

namespace App\Models;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class HumanRemainCard extends Model
{
    use Auditable;

    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'intervention',
        'location',
        'ue',
        'fact',
        'type_inhumation',
        'type_cremation',
        'associated_with',
        'description',

        'deposition_primary',
        'deposition_secondary',
        'deposition_ossuary',
        'context_undertaker',
        'context_secondary',
        'conservation_good',
        'conservation_partial_alterations',
        'conservation_totally_altered',
        'burial_single_grave',
        'burial_communal_grave',
        'relationship_equals',
        'relationship_attached',
        'relationship_covered_by',
        'relationship_filling_by',
        'relationship_cut_by',
        'relationship_equivalent_to',
        'relationship_attached_to',
        'relationship_covers_to',
        'relationship_fill_to',
        'relationship_cut_to',
        'periodization',
        'provisional_dating',
        'interpretation',
        'dates',
        'author',
        'disposition_decubito_supino',
        'disposition_decubito_lateral_der',
        'disposition_decubito_lateral_izq',
        'deposito_adorno_per',
        'deposito_ceramica',
        'deposito_armamento',
        'deposito_fauna',
        'deposito_semillas',
        'brazos_ext_largo_cuerpo_izq',
        'brazos_ext_largo_cuerpo_der',
        'brazos_sobre_pelvis_izq',
        'brazos_sobre_pelvis_der',
        'brazos_sobre_pecho_izq',
        'brazos_sobre_pecho_der',
        'piernas_ext_izq',
        'piernas_ext_der',
        'piernas_semi_flex_izq',
        'piernas_semi_flex_der',
        'piernas_flexionada_izq',
        'piernas_flexionada_der',
        'obs_antropologicas',
        'specify',
        'observations',

        'project_id',
        'user_id',
//        '',
    ];

    public function project(){
        return $this->belongsTo(Project::class);
    }

    // Scope para Human remain cards activos
    public function scopeActive($query)
    {
        return $query->where('active', '1');
    }

    public function urlFileTopographicAttribute(){
        return env('WASABI_DIR', 'default') . "/proyectos/".$this->project_id."/trabajo-de-campo/ficha-restos-humanos/".$this->id."/archivo_topografico";
    }

    public function urlFilePhotographicAttribute(){
        return env('WASABI_DIR', 'default') . "/proyectos/".$this->project_id."/trabajo-de-campo/ficha-restos-humanos/".$this->id."/archivo_fotografico";
    }

    public function urlSketchAttribute(){
        return env('WASABI_DIR', 'default') . "/proyectos/".$this->project_id."/trabajo-de-campo/ficha-restos-humanos/".$this->id."/croquis";
    }

    public function urlPreservedPartAttribute(){
        return env('WASABI_DIR', 'default') . "/proyectos/".$this->project_id."/trabajo-de-campo/ficha-restos-humanos/".$this->id."/parte_reservada";
    }

    public function urlFileTopographicPublicAttribute(){
        $dirFileTopographic = $this->urlFileTopographicAttribute();
        $files = Storage::disk('wasabi')->allFiles($dirFileTopographic);
        $fileTopographicUrls = [];
        if (!empty($files)) {
            foreach ($files as $file) {
                $fileTopographicUrls[$file] = env('WASABI_BUNNY'). DIRECTORY_SEPARATOR . $file;
            }
        }
        return $fileTopographicUrls;
    }

    public function urlFilePhotographicPublicAttribute(){
        $dirFilePhotographic = $this->urlFilePhotographicAttribute();
        $files = Storage::disk('wasabi')->allFiles($dirFilePhotographic);
        $filePhotographicUrls = [];
        if (!empty($files)) {
            foreach ($files as $file) {
                $filePhotographicUrls[$file] = env('WASABI_BUNNY'). DIRECTORY_SEPARATOR . $file;
            }
        }
        return $filePhotographicUrls;
    }

    public function urlSketchPublicAttribute(){
        $dirSketch = $this->urlSketchAttribute();
        $files = Storage::disk('wasabi')->allFiles($dirSketch);
        $sketchUrls = [];
        if (!empty($files)) {
            foreach ($files as $file) {
                $sketchUrls[$file] = env('WASABI_BUNNY'). DIRECTORY_SEPARATOR . $file;
            }
        }
        return $sketchUrls;
    }

    public function urlPreservedPartPublicAttribute(){
        $dirPreservedPart = $this->urlPreservedPartAttribute();
        $files = Storage::disk('wasabi')->allFiles($dirPreservedPart);
        $preservedPartUrls = [];
        if (!empty($files)) {
            foreach ($files as $file) {
                $preservedPartUrls[$file] = env('WASABI_BUNNY'). DIRECTORY_SEPARATOR . $file;
            }
        }
        return $preservedPartUrls;
    }
}
