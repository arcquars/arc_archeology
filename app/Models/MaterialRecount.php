<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Services\FileCheckerService;
use Illuminate\Support\Facades\Storage;

class MaterialRecount extends Model
{
    use HasFactory;

    protected $fillable = [
        'ue',
        'chronology',
        'project_id',
        'user_id',
    ];

    public function project(){
        return $this->belongsTo(Project::class);
    }

    public function urlPhotosAttribute(){
        return env('WASABI_DIR', 'default') . "/proyectos/".$this->project_id."/inventario-materiales/recuento/".$this->id."/fotografias";
    }

    public function urlPhotosPublicAttribute(){
        $dirPhotos = $this->urlPhotosAttribute();
        $photoFiles = Storage::disk('wasabi')->allFiles($dirPhotos);
        $photoUrls = [];
        $fileChecker = new FileCheckerService();
        if (!empty($photoFiles)) {
            foreach ($photoFiles as $photoFile) {
                $photoUrls[$photoFile] = [
                    'url' => env('WASABI_BUNNY'). DIRECTORY_SEPARATOR . $photoFile,
                    'type' =>$fileChecker->isType(env('WASABI_BUNNY'). DIRECTORY_SEPARATOR . $photoFile)
                ];

            }
        }
        return $photoUrls;
    }
}
