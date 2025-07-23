<?php

namespace App\Models;

use App\Services\FileCheckerService;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class MuralStratigraphyCard extends Model
{
    use Auditable;

    /**

     * The attributes that are mass assignable.

     *

     * @var array<int, string>

     */

    protected $fillable = [
        'msc_date',
        'floor',
        'stay',
        'quadrant',
        'acronym',
        'fact',
        'n_ue',
        'provisional_dating',
        'stratigraphic_reliability',
        'identification_type',
        'preservation',
        'description',
        'component_stone_type',
        'component_stone_characteristics',
        'component_stone_size',
        'component_brick_type',
        'component_brick_characteristics',
        'component_brick_measures',
        'component_binder_type',
        'component_binder_characteristics',
        'component_binder_joints',
        'component_tapial_box',
        'component_tapial_height',
        'stratigraphy_equals_to',
        'stratigraphy_equivalent',
        'stratigraphy_it_is_supported',
        'stratigraphy_rests_on',
        'stratigraphy_covered_by',
        'stratigraphy_covers_to',
        'stratigraphy_filled_by',
        'stratigraphy_fills_to',
        'stratigraphy_cut_by',
        'stratigraphy_cut_to',
        'comments',
        'num_flat',
        'num_photography',
    ];

    public function project(){
        return $this->belongsTo(Project::class);
    }

    public function urlCroquisAttribute(){
        return env('WASABI_DIR', 'default') . "/proyectos/".$this->project_id."/trabajo-de-campo/ficha-estratigrafia-mural/".$this->id."/croquis";
    }

    public function urlPhotosAttribute(){
        return env('WASABI_DIR', 'default') . "/proyectos/".$this->project_id."/trabajo-de-campo/ficha-estratigrafia-mural/".$this->id."/fotografias";
    }

    public function urlCroquisPublicAttribute(){
        $dirCroquis = $this->urlCroquisAttribute();
        $fileChecker = new FileCheckerService();
        $files = Storage::disk('wasabi')->allFiles($dirCroquis);
        $croquisUrls = [];
        if (!empty($files)) {
            foreach ($files as $file) {
                $croquisUrls[$file] = [
                    'url' => env('WASABI_BUNNY'). DIRECTORY_SEPARATOR . $file,
                    'type' =>$fileChecker->isType(env('WASABI_BUNNY'). DIRECTORY_SEPARATOR . $file)
                ];
            }
        }

        return $croquisUrls;
    }

    public function urlPhotosPublicAttribute(){
        $dirPhotos = $this->urlPhotosAttribute();
        $photoFiles = Storage::disk('wasabi')->allFiles($dirPhotos);
        $photoUrls = [];
        $fileChecker = new FileCheckerService();
        if (!empty($photoFiles)) {
            foreach ($photoFiles as $photoFile) {
                // $photoUrls[$photoFile] = env('WASABI_BUNNY'). DIRECTORY_SEPARATOR . $photoFile;
                $photoUrls[$photoFile] = [
                    'url' => env('WASABI_BUNNY'). DIRECTORY_SEPARATOR . $photoFile,
                    'type' =>$fileChecker->isType(env('WASABI_BUNNY'). DIRECTORY_SEPARATOR . $photoFile)
                ];

            }
        }

        return $photoUrls;
    }
}
