<?php

namespace App\Livewire\Projects\InventoryMaterial\CatalogueArchitectural;

use App\Http\Requests\StoreCatalogueArchitecturalRequest;
use App\Models\CatalogueArchitectual;
use App\Models\HumanRemainCard;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateCatalogueArchitectural extends Component
{
    use WithFileUploads;

    public $catalogueArchitectural;

    public $project_id;

    public $proceed_date_admission, $proceed_source_admission, $proceed_origin, $proceed_acronym, $proceed_ue;
    public $c_classification, $c_specific_name, $c_common_name, $c_dating, $c_integrity_status, $a_acronyms, $a_location;
    public $location_date, $location, $location_notes, $dimension_long, $dimension_anch, $dimension_alt, $dimension_other;
    public $subject, $technique, $description, $conservation_status, $author, $comments;

    public array $photos = [];
    public array $sketches = [];

    protected $listeners = ['updateCatalogueArchitecturalId'];

    public function updateCatalogueArchitecturalId($newId){
        $this->load($newId);
    }

    public function load(string $catalogueArchitecturalId)
    {
        $this->catalogueArchitectural = CatalogueArchitectual::find($catalogueArchitecturalId);

        $this->proceed_date_admission = $this->catalogueArchitectural->proceed_date_admission;
        $this->proceed_source_admission = $this->catalogueArchitectural->proceed_source_admission;
        $this->proceed_origin = $this->catalogueArchitectural->proceed_origin;
        $this->proceed_acronym = $this->catalogueArchitectural->proceed_acronym;
        $this->proceed_ue = $this->catalogueArchitectural->proceed_ue;
        $this->c_classification = $this->catalogueArchitectural->c_classification;
        $this->c_specific_name = $this->catalogueArchitectural->c_specific_name;
        $this->c_common_name = $this->catalogueArchitectural->c_common_name;
        $this->c_dating = $this->catalogueArchitectural->c_dating;
        $this->c_integrity_status = $this->catalogueArchitectural->c_integrity_status;
        $this->a_acronyms = $this->catalogueArchitectural->a_acronyms;
        $this->a_location = $this->catalogueArchitectural->a_location;
        $this->location_date = $this->catalogueArchitectural->location_date;
        $this->location = $this->catalogueArchitectural->location;
        $this->location_notes = $this->catalogueArchitectural->location_notes;
        $this->dimension_long = $this->catalogueArchitectural->dimension_long;
        $this->dimension_anch = $this->catalogueArchitectural->dimension_anch;
        $this->dimension_alt = $this->catalogueArchitectural->dimension_alt;
        $this->dimension_other = $this->catalogueArchitectural->dimension_other;
        $this->subject = $this->catalogueArchitectural->subject;
        $this->technique = $this->catalogueArchitectural->technique;
        $this->description = $this->catalogueArchitectural->description;
        $this->conservation_status = $this->catalogueArchitectural->conservation_status;
        $this->author = $this->catalogueArchitectural->author;
        $this->comments = $this->catalogueArchitectural->comments;
    }

    public function rules(){
        return (new StoreCatalogueArchitecturalRequest())->rules();
    }

    public function mount(string $catalogueArchitecturalId)
    {
        $this->load($catalogueArchitecturalId);
    }

    public function removePhoto($url){
        Storage::disk('wasabi')->delete($url);
    }

    public function updateCatalogueArquitectural()
    {
        $validatedData = $this->validate();
        $this->catalogueArchitectural->update($validatedData);

        $dirPhotos = $this->catalogueArchitectural->urlPhotosAttribute();
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

        $dirSketches = $this->catalogueArchitectural->urlSketchAttribute();
        $exists = Storage::disk("wasabi")->exists($dirSketches);
        if (!$exists) {
            Storage::disk('wasabi')->makeDirectory($dirSketches);
        }

        foreach ($this->sketches as $file) {
            if ($file) {
                $nombreOriginal = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $nombreSanitizado = Str::slug(pathinfo($nombreOriginal, PATHINFO_FILENAME)) . '.' . $extension;
                $path = $file->storeAs($dirSketches, $nombreSanitizado, 'wasabi');
                Log::info('Wasabi archivo subido fotografiappp::: ' . $path);
            }
        }

        $this->dispatch('catalogue-architectural-clear-search');
        $this->dispatch('closeUpdateCatArch');

        $this->dispatch('show_alert', type: 'success', message: 'Se actualizo el catalogo de elementos arquitectonicos');
    }

    public function render()
    {
        return view('livewire.projects.inventory-material.catalogue-architectural.update-catalogue-architectural');
    }
}
