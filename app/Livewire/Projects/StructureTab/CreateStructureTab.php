<?php

namespace App\Livewire\Projects\StructureTab;

use App\Http\Requests\StoreStructureTabRequest;
use App\Models\StructureTab;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateStructureTab extends Component
{
    public $project_id;
    public $i_date, $i_n_ue, $i_location_intervention, $i_acronym, $i_fact;

    public function mount(string $projectId)
    {
        $this->project_id = $projectId;
    }

    public function rules(){
        return (new StoreStructureTabRequest())->rules();
    }

    public function saveStructureTab(){
        $this->validate();

        $structureTab = new StructureTab();
        $structureTab->i_date = $this->i_date;
        $structureTab->i_n_ue = $this->i_n_ue;
        $structureTab->i_location_intervention = $this->i_location_intervention;
        $structureTab->i_acronym = $this->i_acronym;
        $structureTab->i_fact = $this->i_fact;

        $structureTab->project_id = $this->project_id;
        $structureTab->user_id = Auth::id();

        if($structureTab->save()){
            $this->dispatch('clear-structure-tab-clear-search');
            $this->dispatch('close-structure-tab-create');
        }
    }
    public function render()
    {
        return view('livewire.projects.structure-tab.create-structure-tab');
    }
}
