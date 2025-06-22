<?php

namespace App\Livewire\Projects\InventoryMaterial\CatalogueArchitectural;

use App\Models\CatalogueArchitectual;
use Livewire\Component;

class DeleteCatalogueArchitectural extends Component
{
    public $show = false;
    public $catalogueArchitectural;

    protected $listeners = ['openModalDeleteCatalogueArchitectural' => 'openModal', 'closeModalDeleteCatalogueArchitectural' => 'closeModal'];

    public function openModal($catalogueArchitecturalId)
    {
        $this->catalogueArchitectural = CatalogueArchitectual::find($catalogueArchitecturalId);
        $this->resetErrorBag();
        $this->show = true;
    }

    public function closeModal()
    {
        $this->show = false;
    }

    public function deleteCatalogueArchitectural()
    {
        $this->catalogueArchitectural->active = 0;
        $this->catalogueArchitectural->save();

        $this->dispatch('reload-list-catalogue-archi');
        session()->flash('mensaje', 'El elemento arquitectonico se elimino exitosamente.');
        $this->dispatch('show_alert', type: 'success', message: 'El elemento arquitectonico se elimino exitosamente.');
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.projects.inventory-material.catalogue-architectural.delete-catalogue-architectural');
    }
}
