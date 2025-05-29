<?php

namespace App\Livewire\Projects\StructureTab;

use App\Models\StructureTab;
use Livewire\Component;

class DeleteStructureTab extends Component
{
    public $show = false;
    public $structureTab;

    protected $listeners = ['openModalDeleteStructureTab' => 'openModal', 'closeModalDeleteStructureTab' => 'closeModal'];

    public function openModal($structureTabId)
    {
        $this->structureTab = StructureTab::find($structureTabId);
        $this->resetErrorBag();
        $this->show = true;
    }

    public function closeModal()
    {
        $this->show = false;
    }

    public function deleteStructureTab()
    {
        $this->structureTab->active = 0;
//        $this->structureTab->save();

        $this->dispatch('reload-list-structure-tab');
        session()->flash('mensaje', 'La Ficha de estructure se borro exitosamente.');
        $this->dispatch('show_alert', type: 'success', message: 'La Ficha de estructure se borro exitosamente.');
        $this->closeModal();
    }


    public function render()
    {
        return view('livewire.projects.structure-tab.delete-structure-tab');
    }
}
