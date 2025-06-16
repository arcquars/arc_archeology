<?php

namespace App\Livewire\Projects\StructureTab;

use App\Http\Requests\StoreStructureTabRequest;
use App\Models\Project;
use App\Models\StructureBrick;
use App\Models\StructureFormworks;
use App\Models\StructureQuote;
use App\Models\StructureTab;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class CreateStructureTab extends Component
{
    public $enableUe = true;

    public $project_id;
    public $i_date, $i_n_ue, $i_location_intervention, $i_acronym, $i_fact;

    public $i_provisional_dating, $i_stratigraphic_reliability, $i_type, $conservation;
    public $interpretation_description, $aparejo, $largo, $anchura, $alto_grueso, $orientacion_1, $orientacion_2;
    public $stratigraphy_equals, $stratigraphy_support_provided, $stratigraphy_covered_by, $stratigraphy_filling_by;
    public $stratigraphy_cut_by, $stratigraphy_equivale, $stratigraphy_supported_by, $stratigraphy_overlaps_or_covers;
    public $stratigraphy_fill_in, $stratigraphy_cut_to;

    public $quotes = []; // Array para almacenar las "quotes"
    public $maxQuotes = 5; // Límite máximo de quotes

    public $bricks = [];
    public $maxBricks = 5;

    public $formworks = [];
    public $maxFormworks = 5;

    public function addQuote()
    {
        if (count($this->quotes) < $this->maxQuotes) {
            $this->quotes[] = [
                'surface' => '',
                'information' => '',
            ];
        } else {
            session()->flash('error', 'Se ha alcanzado el límite máximo de ' . $this->maxQuotes . ' quotes.');
        }
    }

    public function removeQuote($index)
    {
        unset($this->quotes[$index]);
        $this->quotes = array_values($this->quotes); // Reindexar el array para evitar problemas con Livewire
    }

    public function addBrick()
    {
        if (count($this->bricks) < $this->maxBricks) {
            $this->bricks[] = [
                'long' => '',
                'width' => '',
                'thick' => '',
            ];
        } else {
            session()->flash('error', 'Se ha alcanzado el límite máximo de ' . $this->maxBricks . ' ladrillos.');
        }
    }

    public function removeBrick($index)
    {
        unset($this->bricks[$index]);
        $this->bricks = array_values($this->bricks);
    }

    public function addFormwork()
    {
        if (count($this->formworks) < $this->maxFormworks) {
            $this->formworks[] = [
                'formwork' => '',
            ];
        } else {
            session()->flash('error', 'Se ha alcanzado el límite máximo de ' . $this->maxFormworks . ' encofrado.');
        }
    }

    public function removeFormwork($index)
    {
        unset($this->formworks[$index]);
        $this->formworks = array_values($this->formworks);
    }

    public function mount(string $projectId)
    {
        $this->project_id = $projectId;
        $ueNext = Project::find($projectId)->ueNext();
        if($ueNext){
            $this->enableUe = false;
            $this->i_n_ue = $ueNext;
        }
    }

    public function rules(){
        return (new StoreStructureTabRequest())->rules();
    }

    public function saveStructureTab(){
        $this->validate();

        $structureTab = new StructureTab();
        $structureTab->i_date = $this->i_date;
        $ueNext = Project::find($this->project_id)->ueNext();
        if($ueNext > 0){
            $structureTab->i_n_ue = $ueNext;
        } else {
            $structureTab->i_n_ue = $this->i_n_ue;
        }

        $structureTab->i_location_intervention = $this->i_location_intervention;
        $structureTab->i_acronym = $this->i_acronym;
        $structureTab->i_fact = $this->i_fact;

        $structureTab->i_provisional_dating = $this->i_provisional_dating;
        $structureTab->i_stratigraphic_reliability = $this->i_stratigraphic_reliability;
        $structureTab->i_type = $this->i_type;
        $structureTab->conservation = $this->conservation;
        $structureTab->interpretation_description = $this->interpretation_description;
        $structureTab->di_rigging = $this->aparejo;
        $structureTab->di_length = $this->largo;
        $structureTab->di_width = $this->anchura;
        $structureTab->di_thick_height = $this->alto_grueso;
        $structureTab->di_orientation_degrees_1 = $this->orientacion_1;
        $structureTab->di_orientation_degrees_2 = $this->orientacion_2;

        $structureTab->stratigraphy_equals = $this->stratigraphy_equals;
        $structureTab->stratigraphy_support_provided = $this->stratigraphy_support_provided;
        $structureTab->stratigraphy_covered_by = $this->stratigraphy_covered_by;
        $structureTab->stratigraphy_filling_by = $this->stratigraphy_filling_by;
        $structureTab->stratigraphy_cut_by = $this->stratigraphy_cut_by;
        $structureTab->stratigraphy_equivale = $this->stratigraphy_equivale;
        $structureTab->stratigraphy_supported_by = $this->stratigraphy_supported_by;
        $structureTab->stratigraphy_overlaps_or_covers = $this->stratigraphy_overlaps_or_covers;
        $structureTab->stratigraphy_fill_in = $this->stratigraphy_fill_in;
        $structureTab->stratigraphy_cut_to = $this->stratigraphy_cut_to;

        $structureTab->project_id = $this->project_id;
        $structureTab->user_id = Auth::id();

        if($structureTab->save()){
            foreach ($this->quotes as $quote){
                $q = StructureQuote::create([
                    'surface' => $quote['surface'],
                    'information' => $quote['information'],
                    'structure_tab_id' => $structureTab->id,
                ]);
                Log::info("se creo Cota:: " . $q->id);
            }
            foreach ($this->bricks as $brick){
                $q = StructureBrick::create([
                    'long' => $brick['long'],
                    'width' => $brick['width'],
                    'thick' => $brick['thick'],
                    'structure_tab_id' => $structureTab->id,
                ]);
                Log::info("se creo Ladrillo:: " . $q->id);
            }
            foreach ($this->formworks as $formwork){
                $q = StructureFormworks::create([
                    'formwork' => $formwork['formwork'],
                    'structure_tab_id' => $structureTab->id,
                ]);
                Log::info("se creo Encofrado:: " . $q->id);
            }

            $this->dispatch('clear-structure-tab-clear-search');
            $this->dispatch('close-structure-tab-create');
            $this->dispatch('show_alert', type: 'success', message: 'La Ficha de estructura se creo exitosamente.');
        }
    }
    public function render()
    {
        return view('livewire.projects.structure-tab.create-structure-tab');
    }
}
