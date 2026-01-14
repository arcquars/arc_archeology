<?php

namespace App\Livewire\Projects\StructureTab;

use App\Http\Requests\StoreStructureTabRequest;
use App\Models\StructureBrick;
use App\Models\StructureFormworks;
use App\Models\StructureQuote;
use App\Models\StructureTab;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateStructureTab extends Component
{
    use WithFileUploads;

    /** @var StructureTab */
    public $structureTab;

    public $project_id;
    public $i_date, $i_n_ue, $i_location_intervention, $i_acronym, $i_fact;

    public $i_provisional_dating, $i_stratigraphic_reliability, $i_type, $conservation;
    public $interpretation_description, $aparejo, $largo, $anchura, $alto_grueso, $orientacion_1, $orientacion_2;
    public $stratigraphy_equals, $stratigraphy_support_provided, $stratigraphy_covered_by, $stratigraphy_filling_by;
    public $stratigraphy_cut_by, $stratigraphy_equivale, $stratigraphy_supported_by, $stratigraphy_overlaps_or_covers;
    public $stratigraphy_fill_in, $stratigraphy_cut_to;

    public $quotes = []; // Array para almacenar las "quotes"
    public $maxQuotes = 10; // Límite máximo de quotes

    public $bricks = [];
    public $maxBricks = 5;

    public $formworks = [];
    public $maxFormworks = 5;

    public ?UploadedFile $sketch = null, $photo = null;

    protected $listeners = ['updateStructureTabId'];

    public function updateStructureTabId($newId){
        $this->load($newId);
    }

    public function rules(){
        return (new StoreStructureTabRequest())->rules();
    }

    public function load(string $structureTabId){
        $this->quotes = [];
        $this->bricks = [];
        $this->formworks = [];

        $this->structureTab = StructureTab::find($structureTabId);

        $this->project_id = $this->structureTab->project_id;
        $this->i_date = $this->structureTab->i_date;
        $this->i_n_ue = $this->structureTab->i_n_ue;
        $this->i_location_intervention = $this->structureTab->i_location_intervention;
        $this->i_acronym = $this->structureTab->i_acronym;
        $this->i_fact = $this->structureTab->i_fact;

        $this->i_provisional_dating = $this->structureTab->i_provisional_dating;
        $this->i_stratigraphic_reliability = $this->structureTab->i_stratigraphic_reliability;
        $this->i_type = $this->structureTab->i_type;
        $this->conservation = $this->structureTab->conservation;
        $this->interpretation_description = $this->structureTab->interpretation_description;
        $this->aparejo = $this->structureTab->di_rigging;
        $this->largo = $this->structureTab->di_length;
        $this->anchura = $this->structureTab->di_width;
        $this->alto_grueso = $this->structureTab->di_thick_height;
        $this->orientacion_1 = $this->structureTab->di_orientation_degrees_1;
        $this->orientacion_2 = $this->structureTab->di_orientation_degrees_2;
        $this->stratigraphy_equals = $this->structureTab->stratigraphy_equals;
        $this->stratigraphy_support_provided = $this->structureTab->stratigraphy_support_provided;
        $this->stratigraphy_covered_by = $this->structureTab->stratigraphy_covered_by;
        $this->stratigraphy_filling_by = $this->structureTab->stratigraphy_filling_by;
        $this->stratigraphy_cut_by = $this->structureTab->stratigraphy_cut_by;
        $this->stratigraphy_equivale = $this->structureTab->stratigraphy_equivale;
        $this->stratigraphy_supported_by = $this->structureTab->stratigraphy_supported_by;
        $this->stratigraphy_overlaps_or_covers = $this->structureTab->stratigraphy_overlaps_or_covers;
        $this->stratigraphy_fill_in = $this->structureTab->stratigraphy_fill_in;
        $this->stratigraphy_cut_to = $this->structureTab->stratigraphy_cut_to;

        $quotes = $this->structureTab->quotes;
        foreach ($quotes as $quote){
            $this->addQuote($quote->id, $quote->surface, $quote->information, );
        }
        $bricks = $this->structureTab->bricks;
        foreach ($bricks as $brick){
            $this->addBrick($brick->id, $brick->long, $brick->width, $brick->thick);
        }
        $formWorks = $this->structureTab->formWorks;
        foreach ($formWorks as $formWork){
            $this->addFormwork($formWork->id, $formWork->formwork);
        }
    }

    public function addQuote($id, $surface, $information)
    {
        if (count($this->quotes) < $this->maxQuotes) {
            $this->quotes[] = [
                'id' => $id,
                'surface' => $surface,
                'information' => $information,
                'structure_tab_id' => $this->structureTab->id
            ];
        }
    }

    public function removeQuote($index)
    {
        if(isset($this->quotes[$index]['id'])){
            $deleteRows = StructureQuote::destroy($this->quotes[$index]['id']);
            if($deleteRows > 0){
                unset($this->quotes[$index]);
                $this->quotes = array_values($this->quotes); // Reindexar el array para evitar problemas con Livewire
            }
        } else {
            unset($this->quotes[$index]);
            $this->quotes = array_values($this->quotes); // Reindexar el array para evitar problemas con Livewire
        }
    }

    public function addBrick($id, $long, $width, $thick)
    {
        if (count($this->bricks) < $this->maxBricks) {
            $this->bricks[] = [
                'id' => $id,
                'long' => $long,
                'width' => $width,
                'thick' => $thick,
                'structure_tab_id' => $this->structureTab->id
            ];
        }
    }

    public function removeBrick($index)
    {
        if(isset($this->bricks[$index]['id'])){
            $deleteRows = StructureBrick::destroy($this->bricks[$index]['id']);
            if($deleteRows > 0){
                unset($this->bricks[$index]);
                $this->bricks = array_values($this->bricks);
            }
        } else {
            unset($this->bricks[$index]);
            $this->bricks = array_values($this->bricks);
        }
    }

    public function addFormwork($id, $formWork)
    {
        if (count($this->formworks) < $this->maxFormworks) {
            $this->formworks[] = [
                'id' => $id,
                'formwork' => $formWork,
                'structure_tab_id' => $this->structureTab->id
            ];
        }
    }

    public function removeFormwork($index)
    {
        if(isset($this->formworks[$index]['id'])){
            $deleteRows = StructureFormworks::destroy($this->formworks[$index]['id']);
            if($deleteRows > 0){
                unset($this->formworks[$index]);
                $this->formworks = array_values($this->formworks);
            }
        } else {
            unset($this->formworks[$index]);
            $this->formworks = array_values($this->formworks);
        }
    }

    public function removeSketch(){
        $dirCroquis = $this->structureTab->urlSketchAttribute();
        Storage::disk('wasabi')->deleteDirectory($dirCroquis);
    }

    public function removePhoto($url){
        Storage::disk('wasabi')->delete($url);
        $this->photoUrls = $this->structureTab->urlPhotoAttribute();
    }

    public function mount(string $structureTabId)
    {
        $this->load($structureTabId);
    }

    public function updateStructureTab()
    {
        $this->validate();
        $this->structureTab->project_id = $this->project_id;
        $this->structureTab->i_date = $this->i_date;
        $this->structureTab->i_n_ue = $this->i_n_ue;
        $this->structureTab->i_location_intervention = $this->i_location_intervention;
        $this->structureTab->i_acronym = $this->i_acronym;

        $this->structureTab->i_fact = $this->i_fact;

        $this->structureTab->i_provisional_dating = $this->i_provisional_dating;
        $this->structureTab->i_stratigraphic_reliability = $this->i_stratigraphic_reliability;
        $this->structureTab->i_type = $this->i_type;
        $this->structureTab->conservation = $this->conservation;
        $this->structureTab->interpretation_description = $this->interpretation_description;
        $this->structureTab->di_rigging = $this->aparejo;
        $this->structureTab->di_length = $this->largo;
        $this->structureTab->di_width = $this->anchura;
        $this->structureTab->di_thick_height = $this->alto_grueso;
        $this->structureTab->di_orientation_degrees_1 = $this->orientacion_1;
        $this->structureTab->di_orientation_degrees_2 = $this->orientacion_2;
        $this->structureTab->stratigraphy_equals = $this->stratigraphy_equals;
        $this->structureTab->stratigraphy_support_provided = $this->stratigraphy_support_provided;
        $this->structureTab->stratigraphy_covered_by = $this->stratigraphy_covered_by;
        $this->structureTab->stratigraphy_filling_by = $this->stratigraphy_filling_by;
        $this->structureTab->stratigraphy_cut_by = $this->stratigraphy_cut_by;
        $this->structureTab->stratigraphy_equivale = $this->stratigraphy_equivale;
        $this->structureTab->stratigraphy_supported_by = $this->stratigraphy_supported_by;
        $this->structureTab->stratigraphy_overlaps_or_covers = $this->stratigraphy_overlaps_or_covers;
        $this->structureTab->stratigraphy_fill_in = $this->stratigraphy_fill_in;
        $this->structureTab->stratigraphy_cut_to = $this->stratigraphy_cut_to;

        if($this->structureTab->save()){

            if($this->sketch){
                $dirCroquis = $this->structureTab->urlSketchAttribute();
                $sketcheExists = Storage::disk("wasabi")->exists($dirCroquis);
                if (!$sketcheExists) {
                    Storage::disk('wasabi')->makeDirectory($dirCroquis);
                } else {
                    Storage::disk('wasabi')->deleteDirectory($dirCroquis);
                    Storage::disk('wasabi')->makeDirectory($dirCroquis);
                }

                $nombreOriginal = $this->sketch->getClientOriginalName();
                $extension = $this->sketch->getClientOriginalExtension();
                $nombreSanitizado = Str::slug(pathinfo($nombreOriginal, PATHINFO_FILENAME)) . '.' . $extension;
                $path = $this->sketch->storeAs($dirCroquis, $nombreSanitizado, 'wasabi');
            }

            if($this->photo !== null){
                $dirPhoto = $this->structureTab->urlPhotoAttribute();
                $photoExists = Storage::disk("wasabi")->exists($dirPhoto);
                if (!$photoExists) {
                    Storage::disk('wasabi')->makeDirectory($dirPhoto);
                } else {
                    Storage::disk('wasabi')->deleteDirectory($dirPhoto);
                    Storage::disk('wasabi')->makeDirectory($dirPhoto);
                }

                $nombreOriginal = $this->photo->getClientOriginalName();
                $extension = $this->photo->getClientOriginalExtension();
                $nombreSanitizado = Str::slug(pathinfo($nombreOriginal, PATHINFO_FILENAME)) . '.' . $extension;
                $path = $this->photo->storeAs($dirPhoto, $nombreSanitizado, 'wasabi');
            }

            foreach ($this->quotes as $quote){
                if(!isset($quote['id'])){
                    $q = StructureQuote::create([
                        'surface' => $quote['surface'],
                        'information' => $quote['information'],
                        'structure_tab_id' => $quote['structure_tab_id'],
                    ]);
                } else {
                    $sQuote = StructureQuote::find($quote['id']);
                    $q = $sQuote->update([
                        'surface' => $quote['surface'],
                        'information' => $quote['information'],
                    ]);
                }
            }
            foreach ($this->bricks as $brick){
                if(!isset($brick['id'])){
                    $q = StructureBrick::create([
                        'long' => $brick['long'],
                        'width' => $brick['width'],
                        'thick' => $brick['thick'],
                        'structure_tab_id' => $brick['structure_tab_id'],
                    ]);
                } else {
                    $sBrick = StructureBrick::find($brick['id']);
                    $q = $sBrick->update([
                        'long' => $brick['long'],
                        'width' => $brick['width'],
                        'thick' => $brick['thick'],
                    ]);
                }
            }
            foreach ($this->formworks as $formwork){
                if(!isset($formwork['id'])){
                    $q = StructureFormworks::create([
                        'formwork' => $formwork['formwork'],
                        'structure_tab_id' => $formwork['structure_tab_id'],
                    ]);
                } else {
                    $sFormwork = StructureFormworks::find($formwork['id']);
                    $q = $sFormwork->update([
                        'formwork' => $formwork['formwork'],
                    ]);
                }
            }

            $this->dispatch('clear-structure-tab-clear-search');
            $this->dispatch('close-structure-tab-update');

            $this->dispatch('show_alert', type: 'success', message: 'La Ficha de estructura se actualizo exitosamente.');
        }
    }

    public function render()
    {
        return view('livewire.projects.structure-tab.update-structure-tab');
    }
}
