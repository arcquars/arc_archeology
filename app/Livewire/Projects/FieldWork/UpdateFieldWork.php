<?php

namespace App\Livewire\Projects\FieldWork;

use App\Http\Requests\StoreMuralStratigraphyCardRequest;
use App\Models\MuralStratigraphyCard;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateFieldWork extends Component
{
    use WithFileUploads;

    public $muralStratigraphyCard;

    public $project_id;
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

    public $sketches;
    public array $photos = [];


    protected $listeners = ['updateFieldWorkMuralId'];

    public function updateFieldWorkMuralId($newId){
        $this->load($newId);
    }

    public function rules(){
        return (new StoreMuralStratigraphyCardRequest())->rules();
    }

    public function load(string $muralId){
//        dd("ddd");
        $this->muralStratigraphyCard = MuralStratigraphyCard::find($muralId);

        $this->project_id = $this->muralStratigraphyCard->project_id;
        $this->msc_date = $this->muralStratigraphyCard->msc_date;
        $this->floor = $this->muralStratigraphyCard->floor;
        $this->quadrant = $this->muralStratigraphyCard->quadrant;
        $this->stay = $this->muralStratigraphyCard->stay;
        $this->acronym = $this->muralStratigraphyCard->acronym;
        $this->fact = $this->muralStratigraphyCard->fact;
        $this->n_ue = $this->muralStratigraphyCard->n_ue;
        $this->provisional_dating = $this->muralStratigraphyCard->provisional_dating;
        $this->stratigraphic_reliability = $this->muralStratigraphyCard->stratigraphic_reliability;
        $this->identification_type = $this->muralStratigraphyCard->identification_type;
        $this->preservation = $this->muralStratigraphyCard->preservation;
        $this->description = $this->muralStratigraphyCard->description;
        $this->component_stone_type = $this->muralStratigraphyCard->component_stone_type;
        $this->component_stone_characteristics = $this->muralStratigraphyCard->component_stone_characteristics;
        $this->component_stone_size = $this->muralStratigraphyCard->component_stone_size;
        $this->component_brick_type = $this->muralStratigraphyCard->component_brick_type;
        $this->component_brick_characteristics = $this->muralStratigraphyCard->component_brick_characteristics;
        $this->component_brick_measures = $this->muralStratigraphyCard->component_brick_measures;
        $this->component_binder_type = $this->muralStratigraphyCard->component_binder_type;
        $this->component_binder_characteristics = $this->muralStratigraphyCard->component_binder_characteristics;
        $this->component_binder_joints= $this->muralStratigraphyCard->component_binder_joints;
        $this->component_tapial_box = $this->muralStratigraphyCard->component_tapial_box;
        $this->component_tapial_height = $this->muralStratigraphyCard->component_tapial_height;
        $this->stratigraphy_equals_to = $this->muralStratigraphyCard->stratigraphy_equals_to;
        $this->stratigraphy_equivalent = $this->muralStratigraphyCard->stratigraphy_equivalent;
        $this->stratigraphy_it_is_supported = $this->muralStratigraphyCard->stratigraphy_it_is_supported;
        $this->stratigraphy_rests_on = $this->muralStratigraphyCard->stratigraphy_rests_on;
        $this->stratigraphy_covered_by = $this->muralStratigraphyCard->stratigraphy_covered_by;
        $this->stratigraphy_covers_to = $this->muralStratigraphyCard->stratigraphy_covers_to;
        $this->stratigraphy_filled_by = $this->muralStratigraphyCard->stratigraphy_filled_by;
        $this->stratigraphy_fills_to = $this->muralStratigraphyCard->stratigraphy_fills_to;
        $this->stratigraphy_cut_by = $this->muralStratigraphyCard->stratigraphy_cut_by;
        $this->stratigraphy_cut_to = $this->muralStratigraphyCard->stratigraphy_cut_to;
        $this->comments = $this->muralStratigraphyCard->comments;
        $this->num_flat = $this->muralStratigraphyCard->num_flat;
        $this->num_photography =$this->muralStratigraphyCard->num_photography;
    }

    public function removeSketch(){
        $dirCroquis = $this->muralStratigraphyCard->urlCroquisAttribute();
        Storage::disk('wasabi')->deleteDirectory($dirCroquis);
    }

    public function removePhoto($url){
        Storage::disk('wasabi')->delete($url);
        $this->photoUrls = $this->muralStratigraphyCard->urlPhotosPublicAttribute();
    }

    public function mount(string $muralId)
    {
        $this->load($muralId);
    }

    public function updateFieldWork(){
        $this->validate();

        $this->muralStratigraphyCard->project_id = $this->project_id;
        $this->muralStratigraphyCard->msc_date = $this->msc_date;
        $this->muralStratigraphyCard->floor = $this->floor;
        $this->muralStratigraphyCard->quadrant = $this->quadrant;
        $this->muralStratigraphyCard->stay = $this->stay;
        $this->muralStratigraphyCard->acronym = $this->acronym;
        $this->muralStratigraphyCard->fact = $this->fact;
        $this->muralStratigraphyCard->n_ue = $this->n_ue;
        $this->muralStratigraphyCard->provisional_dating = $this->provisional_dating;
        $this->muralStratigraphyCard->stratigraphic_reliability = $this->stratigraphic_reliability;
        $this->muralStratigraphyCard->identification_type = $this->identification_type;
        $this->muralStratigraphyCard->preservation = $this->preservation;
        $this->muralStratigraphyCard->description = $this->description;
        $this->muralStratigraphyCard->component_stone_type = $this->component_stone_type;
        $this->muralStratigraphyCard->component_stone_characteristics = $this->component_stone_characteristics;
        $this->muralStratigraphyCard->component_stone_size = $this->component_stone_size;
        $this->muralStratigraphyCard->component_brick_type = $this->component_brick_type;
        $this->muralStratigraphyCard->component_brick_characteristics = $this->component_brick_characteristics;
        $this->muralStratigraphyCard->component_brick_measures = $this->component_brick_measures;
        $this->muralStratigraphyCard->component_binder_type = $this->component_binder_type;
        $this->muralStratigraphyCard->component_binder_characteristics = $this->component_binder_characteristics;
        $this->muralStratigraphyCard->component_binder_joints = $this->component_binder_joints;
        $this->muralStratigraphyCard->component_tapial_box = $this->component_tapial_box;
        $this->muralStratigraphyCard->component_tapial_height = $this->component_tapial_height;
        $this->muralStratigraphyCard->stratigraphy_equals_to = $this->stratigraphy_equals_to;
        $this->muralStratigraphyCard->stratigraphy_equivalent = $this->stratigraphy_equivalent;
        $this->muralStratigraphyCard->stratigraphy_it_is_supported = $this->stratigraphy_it_is_supported;
        $this->muralStratigraphyCard->stratigraphy_rests_on = $this->stratigraphy_rests_on;
        $this->muralStratigraphyCard->stratigraphy_covered_by = $this->stratigraphy_covered_by;
        $this->muralStratigraphyCard->stratigraphy_covers_to = $this->stratigraphy_covers_to;
        $this->muralStratigraphyCard->stratigraphy_filled_by = $this->stratigraphy_filled_by;
        $this->muralStratigraphyCard->stratigraphy_fills_to = $this->stratigraphy_fills_to;
        $this->muralStratigraphyCard->stratigraphy_cut_by = $this->stratigraphy_cut_by;
        $this->muralStratigraphyCard->stratigraphy_cut_to = $this->stratigraphy_cut_to;
        $this->muralStratigraphyCard->comments = $this->comments;
        $this->muralStratigraphyCard->num_flat = $this->num_flat;
        $this->muralStratigraphyCard->num_photography = $this->num_photography;

        if($this->muralStratigraphyCard->save()){
            Log::info('Mural id::: ' . $this->muralStratigraphyCard->id);

            if($this->sketches){
                $dirCroquis = $this->muralStratigraphyCard->urlCroquisAttribute();
                $sketcheExists = Storage::disk("wasabi")->exists($dirCroquis);
                if (!$sketcheExists) {
                    Storage::disk('wasabi')->makeDirectory($dirCroquis);
                } else {
                    Storage::disk('wasabi')->deleteDirectory($dirCroquis);
                    Storage::disk('wasabi')->makeDirectory($dirCroquis);
                }

                $nombreOriginal = $this->sketches->getClientOriginalName();
                $extension = $this->sketches->getClientOriginalExtension();
                $nombreSanitizado = Str::slug(pathinfo($nombreOriginal, PATHINFO_FILENAME)) . '.' . $extension;
                $path = $this->sketches->storeAs($dirCroquis, $nombreSanitizado, 'wasabi');
                Log::info('Wasabi archivo subido croquis::: ' . $path);
            }

            $dirPhotos = $this->muralStratigraphyCard->urlPhotosAttribute();
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
            $this->dispatch('closeUpdateFieldWork');
            $this->dispatch('show_alert', type: 'success', message: 'La Ficha estratigrafia mural se actualizo exitosamente.');
        }
    }

    public function render()
    {
        $croquisUrls = $this->muralStratigraphyCard->urlCroquisPublicAttribute();
        $photoUrls = $this->muralStratigraphyCard->urlPhotosPublicAttribute();
        return view('livewire.projects.field-work.update-field-work', compact('croquisUrls', 'photoUrls'));
    }
}
