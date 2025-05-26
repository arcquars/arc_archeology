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
                $croquisUrls[] = Storage::disk('wasabi')->url($file);
            }
        }
        Log::info("eeee:: " . $dirCroquis);
        Log::info("eeee:: " . json_encode($files));
        Log::info("eeee:: " . json_encode($croquisUrls));
        return view('livewire.projects.field-work.view-field-work', compact('croquisUrls'));
    }
}
