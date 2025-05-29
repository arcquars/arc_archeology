<?php

namespace App\Livewire\Projects\StructureTab;

use App\Models\StratumCard;
use App\Models\StructureTab;
use Livewire\Component;

class ViewStructureTab extends Component
{
    public $structureTab;

    protected $listeners = ['viewStructureTabId'];

    public function viewStructureTabId($newId){
        $this->structureTab = StructureTab::find($newId);
    }

    public function mount(string $structureTabId)
    {
        $this->structureTab = StructureTab::find($structureTabId);
    }

    public function render()
    {
        return view('livewire.projects.structure-tab.view-structure-tab');
    }
}
