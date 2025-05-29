<?php

namespace App\Livewire\Projects\StructureTab;

use App\Http\Requests\StoreStructureTabRequest;
use App\Models\StructureTab;
use Livewire\Component;

class UpdateStructureTab extends Component
{
    public $structureTab;

    public $project_id;
    public $i_date, $i_n_ue, $i_location_intervention, $i_acronym, $i_fact;

    protected $listeners = ['updateStructureTabId'];

    public function updateStructureTabId($newId){
        $this->load($newId);
    }

    public function rules(){
        return (new StoreStructureTabRequest())->rules();
    }

    public function load(string $structureTabId){
        $this->structureTab = StructureTab::find($structureTabId);

        $this->project_id = $this->structureTab->project_id;
        $this->i_date = $this->structureTab->i_date;
        $this->i_n_ue = $this->structureTab->i_n_ue;
        $this->i_location_intervention = $this->structureTab->i_location_intervention;
        $this->i_acronym = $this->structureTab->i_acronym;
        $this->i_fact = $this->structureTab->i_fact;
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

        if($this->structureTab->save()){
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
