<?php

namespace App\Models;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class StructureTab extends Model
{
    use Auditable;

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

    public function bricks(){
        return $this->hasMany(StructureBrick::class);
    }

    public function formWorks(){
        return $this->hasMany(StructureFormworks::class);
    }

    // Scope para Ue's activos
    public function scopeActive($query)
    {
        return $query->where('active', '1');
    }

    public function urlSketchAttribute(){
        return env('WASABI_DIR', 'default') . "/proyectos/".$this->project_id."/trabajo-de-campo/ficha-de-estructura/".$this->id."/croquis";
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

    public function urlPhotoAttribute(){
        return env('WASABI_DIR', 'default') . "/proyectos/".$this->project_id."/trabajo-de-campo/ficha-de-estructura/".$this->id."/interpretacion";
    }

    public function urlPhotoPublicAttribute(){
        $dirPhoto = $this->urlPhotoAttribute();
        $files = Storage::disk('wasabi')->allFiles($dirPhoto);
        $photosUrls = [];
        if (!empty($files)) {
            foreach ($files as $file) {
                $photosUrls[$file] = env('WASABI_BUNNY'). DIRECTORY_SEPARATOR . $file;
            }
        }
        return $photosUrls;
    }
}
