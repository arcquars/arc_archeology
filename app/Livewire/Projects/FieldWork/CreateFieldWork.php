<?php

namespace App\Livewire\Projects\FieldWork;

use App\Http\Requests\StoreMuralStratigraphyCardRequest;
use App\Models\MuralStratigraphyCard;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateFieldWork extends Component
{
    use WithFileUploads;

    public $projectId;
    public $msc_date;
    public $floor;
    public $stay;
    public $quadrant;
    public $acronym;
    public $fact;
    public $n_ue;
    public $provisional_dating;
    public $stratigraphic_reliability;
    public $identification_type;
    public $preservation;
    public $description;
    public $component_stone_type;
    public $component_stone_characteristics;
    public $component_stone_size;
    public $component_brick_type;
    public $component_brick_characteristics;
    public $component_brick_measures;
    public $component_binder_type;
    public $component_binder_characteristics;
    public $component_binder_joints;
    public $component_tapial_box;
    public $component_tapial_height;
    public $stratigraphy_equals_to;
    public $stratigraphy_equivalent;
    public $stratigraphy_it_is_supported;
    public $stratigraphy_rests_on;
    public $stratigraphy_covered_by;
    public $stratigraphy_covers_to;
    public $stratigraphy_filled_by;
    public $stratigraphy_fills_to;
    public $stratigraphy_cut_by;
    public $stratigraphy_cut_to;
    public $comments;
    public $num_flat;
    public $num_photography;

    public array $sketches = [];
    public array $photos = [];


    public function mount(string $projectId)
    {
        $this->projectId = $projectId;
    }

    public function rules(){
        return (new StoreMuralStratigraphyCardRequest())->rules();
    }

    public function saveFieldWork(){
        $this->validate();

        $mural = new MuralStratigraphyCard();
        $mural->project_id = $this->projectId;
        $mural->msc_date = $this->msc_date;
        $mural->floor = $this->floor;
        $mural->quadrant = $this->quadrant;
        $mural->stay = $this->stay;
        $mural->acronym = $this->acronym;
        $mural->fact = $this->fact;
        $mural->n_ue = $this->n_ue;
        $mural->provisional_dating = $this->provisional_dating;
        $mural->stratigraphic_reliability = $this->stratigraphic_reliability;
        $mural->identification_type = $this->identification_type;
        $mural->preservation = $this->preservation;
        $mural->description = $this->description;
        $mural->component_stone_type = $this->component_stone_type;
        $mural->component_stone_characteristics = $this->component_stone_characteristics;
        $mural->component_stone_size = $this->component_stone_size;
        $mural->component_brick_type = $this->component_brick_type;
        $mural->component_brick_characteristics = $this->component_brick_characteristics;
        $mural->component_brick_measures = $this->component_brick_measures;
        $mural->component_binder_type = $this->component_binder_type;
        $mural->component_binder_characteristics = $this->component_binder_characteristics;
        $mural->component_binder_joints = $this->component_binder_joints;
        $mural->component_tapial_box = $this->component_tapial_box;
        $mural->component_tapial_height = $this->component_tapial_height;
        $mural->stratigraphy_equals_to = $this->stratigraphy_equals_to;
        $mural->stratigraphy_equivalent = $this->stratigraphy_equivalent;
        $mural->stratigraphy_it_is_supported = $this->stratigraphy_it_is_supported;
        $mural->stratigraphy_rests_on = $this->stratigraphy_rests_on;
        $mural->stratigraphy_covered_by = $this->stratigraphy_covered_by;
        $mural->stratigraphy_covers_to = $this->stratigraphy_covers_to;
        $mural->stratigraphy_filled_by = $this->stratigraphy_filled_by;
        $mural->stratigraphy_fills_to = $this->stratigraphy_fills_to;
        $mural->stratigraphy_cut_by = $this->stratigraphy_cut_by;
        $mural->stratigraphy_cut_to = $this->stratigraphy_cut_to;
        $mural->comments = $this->comments;
        $mural->num_flat = $this->num_flat;
        $mural->num_photography = $this->num_photography;

        if($mural->save()){
            Log::info('Mural id::: ' . $mural->id);

//            $dirCroquis = "/proyectos/".$this->projectId."/trabajo-de-campo/ficha-estratigrafia-mural/".$mural->id."/croquis";
            $dirCroquis = $mural->urlCroquisAttribute();
            $exists = Storage::disk("wasabi")->exists($dirCroquis);
            if (!$exists) {
                Storage::disk('wasabi')->makeDirectory($dirCroquis);
            }

            foreach ($this->sketches as $file) {
                if ($file) {
                    $nombreOriginal = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $nombreSanitizado = Str::slug(pathinfo($nombreOriginal, PATHINFO_FILENAME)) . '.' . $extension;
                    $path = $file->storeAs($dirCroquis, $nombreSanitizado, 'wasabi');
                    Log::info('Wasabi archivo subido croquis::: ' . $path);
                }
            }

//            $dirPhotos = "/proyectos/".$this->projectId."/trabajo-de-campo/ficha-estratigrafia-mural/".$mural->id."/fotografias";
            $dirPhotos = $mural->urlPhotosAttribute();
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

            $this->dispatch('mscClearSearch');
            $this->dispatch('closeCreateFieldWork');
            $this->dispatch('show_alert', type: 'success', message: 'La Ficha estratigrafia mural se creo exitosamente.');
        }
    }

    public function render()
    {
        return view('livewire.projects.field-work.create-field-work');
    }
}
