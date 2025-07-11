<?php

namespace App\Livewire\Projects\FieldWork;

use App\Models\MuralStratigraphyCard;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class ViewFieldWork extends Component
{
    public $muralStratigraphy;

    protected $listeners = ['updateMuralId'];

    public function updateMuralId($newId){
        $this->muralStratigraphy = MuralStratigraphyCard::find($newId);
    }

    public function mount(string $muralId)
    {
        $this->muralStratigraphy = MuralStratigraphyCard::find($muralId);

    }

    public function render()
    {
        $dirCroquis = $this->muralStratigraphy->urlCroquisAttribute();
        $files = Storage::disk('wasabi')->allFiles($dirCroquis);
        $croquisUrls = [];
        if (!empty($files)) {
            foreach ($files as $file) {
//                $croquisUrls[] = Storage::disk('wasabi')->url($file);
                $croquisUrls[] = env('WASABI_BUNNY'). DIRECTORY_SEPARATOR . $file;
            }
        }

        $dirPhotos = $this->muralStratigraphy->urlPhotosAttribute();
        $photoFiles = Storage::disk('wasabi')->allFiles($dirPhotos);
        $photoUrls = [];
        if (!empty($photoFiles)) {
            foreach ($photoFiles as $photoFile) {
//                $photoUrls[] = Storage::disk('wasabi')->url($photoFile);
                $photoUrls[] = env('WASABI_BUNNY'). DIRECTORY_SEPARATOR . $photoFile;

            }
        }
        Log::info("eeee dirCroquis:: " . $dirCroquis);
        Log::info("eeee dirPhotos:: " . $dirPhotos);
        Log::info("eeee:: " . json_encode($croquisUrls));
        Log::info("eeee:: " . json_encode($photoUrls));
        return view('livewire.projects.field-work.view-field-work', compact('croquisUrls', 'photoUrls'));
    }
}
