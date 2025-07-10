<?php

namespace App\Livewire\Projects\InventoryMaterial\MaterialRecount;

use App\Models\CatalogueArchitectual;
use App\Models\MaterialRecount;
use Livewire\Component;

class DeleteMaterialRecount extends Component
{
    public $show = false;
    public $materialRecount;

    protected $listeners = ['openModalDeleteMaterialRecount' => 'openModal', 'closeModalDeleteMaterialRecount' => 'closeModal'];

    public function openModal($materialRecountId)
    {
        $this->materialRecount = MaterialRecount::find($materialRecountId);
        $this->resetErrorBag();
        $this->show = true;
    }

    public function closeModal()
    {
        $this->show = false;
    }

    public function deleteMaterialRecount()
    {
        $this->materialRecount->active = 0;
        $this->materialRecount->save();

        $this->dispatch('reload-list-material-recount');
        session()->flash('mensaje', 'El material se elimino exitosamente.');
        $this->dispatch('show_alert', type: 'success', message: 'El material se elimino exitosamente.');
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.projects.inventory-material.material-recount.delete-material-recount');
    }
}
