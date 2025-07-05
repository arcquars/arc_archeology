<?php

namespace App\Livewire\Projects\InventoryMaterial\CatalogueArchitectural;

use App\Http\Requests\StoreCatalogueArchitecturalRequest;
use App\Models\CatalogueArchitectual;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateCatalogueArchitectural extends Component
{
    use WithFileUploads;

    public $enableUe = true;
    public $project_id;

    public $proceed_date_admission, $proceed_source_admission, $proceed_origin, $proceed_acronym, $proceed_ue;
    public $c_classification, $c_specific_name, $c_common_name, $c_dating, $c_integrity_status, $a_acronyms, $a_location;
    public $location_date, $location, $location_notes, $dimension_long, $dimension_anch, $dimension_alt, $dimension_other;
    public $subject, $technique, $description, $conservation_status, $author, $comments, $sketch;

    public array $photos = [];

    public function mount(string $projectId)
    {
        $this->project_id = $projectId;
        $ueNext = Project::find($projectId)->ueNext();
        if($ueNext){
            $this->enableUe = false;
            $this->proceed_ue = $ueNext;
        }
    }

    public function rules(){
        return (new StoreCatalogueArchitecturalRequest())->rules();
    }

    public function saveCatalogueArchitectural(){
        $validateData = $this->validate();

        $ueNext = Project::find($this->project_id)->ueNext();
        if($ueNext > 0){
            $validateData['proceed_ue'] = $ueNext;
        }
        /** @var CatalogueArchitectual $catalogueArchitectural */
        $catalogueArchitectural = CatalogueArchitectual::create(array_merge($validateData, [
            'project_id' => $this->project_id,
            'user_id' => Auth::id()
        ]));

        $dirPhotos = $catalogueArchitectural->urlPhotosAttribute();
        $exists = Storage::disk("wasabi")->exists($dirPhotos);
        if (!$exists) {
            Storage::disk('wasabi')->makeDirectory($dirPhotos);
        }
        foreach ($this->photos as $file) {
            if ($file) {
                $nombreOriginal = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $nombreSanitizado = Str::slug(pathinfo($nombreOriginal, PATHINFO_FILENAME)) . '.' . $extension;
                $path = $file->storeAs($dirPhotos, $nombreSanitizado, 'wasabi');
                Log::info('Wasabi archivo subido fotografia::: ' . $path);
            }
        }

        if($this->sketch){
            $dirSketch = $catalogueArchitectural->urlSketchAttribute();
            $exists = Storage::disk("wasabi")->exists($dirSketch);
            if (!$exists) {
                Storage::disk('wasabi')->makeDirectory($dirSketch);
            }
            $nombreOriginal = $this->sketch->getClientOriginalName();
            $extension = $this->sketch->getClientOriginalExtension();
            $nombreSanitizado = Str::slug(pathinfo($nombreOriginal, PATHINFO_FILENAME)) . '.' . $extension;
            $path = $file->storeAs($dirPhotos, $nombreSanitizado, 'wasabi');
            Log::info('Wasabi archivo subido croquis::: ' . $path);
        }

        $this->dispatch('catalogue-architectural-clear-search');
        $this->dispatch('closeCreateFieldWork');

        $this->dispatch('show_alert', type: 'success', message: 'Se creo el elemento arquitectonico');
    }

    public function render()
    {
        return view('livewire.projects.inventory-material.catalogue-architectural.create-catalogue-architectural');
    }
}
