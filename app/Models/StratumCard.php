<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class StratumCard extends Model
{
    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        '',
    ];

    public function meta(){
        return $this->hasOne(StratumCardMeta::class);
    }

    public function project(){
        return $this->belongsTo(Project::class);
    }

    public function quotes(){
        return $this->hasMany(StratumQuotes::class);
    }

    // Scope para Ue's activos
    public function scopeActive($query)
    {
        return $query->where('active', '1');
    }

    public function urlCroquisAttribute(){
        return env('WASABI_DIR', 'default') . "/proyectos/".$this->project_id."/trabajo-de-campo/ficha-de-estrato/".$this->id."/croquis";
    }

    public function urlPhotosAttribute(){
        return env('WASABI_DIR', 'default') . "/proyectos/".$this->project_id."/trabajo-de-campo/ficha-de-estrato/".$this->id."/fotografias";
    }

    public function urlCroquisPublicAttribute(){
        $dirCroquis = $this->urlCroquisAttribute();
        $files = Storage::disk('wasabi')->allFiles($dirCroquis);
        $croquisUrls = [];
        if (!empty($files)) {
            foreach ($files as $file) {
//                $croquisUrls[] = Storage::disk('wasabi')->url($file);
                $croquisUrls[] = env('WASABI_BUNNY'). DIRECTORY_SEPARATOR . $file;
            }
        }

        return $croquisUrls;
    }

    public function urlPhotosPublicAttribute(){
        $dirPhotos = $this->urlPhotosAttribute();
        $photoFiles = Storage::disk('wasabi')->allFiles($dirPhotos);
        $photoUrls = [];
        if (!empty($photoFiles)) {
            foreach ($photoFiles as $photoFile) {
//                $photoUrls[] = Storage::disk('wasabi')->url($photoFile);
                $photoUrls[$photoFile] = env('WASABI_BUNNY'). DIRECTORY_SEPARATOR . $photoFile;

            }
        }

        return $photoUrls;
    }
}
