<?php

namespace App\Livewire\Projects\InventoryMaterial\Museable;

use App\Models\Material;
use Livewire\Component;

class DeleteMuseable extends Component
{
    public $show = false;
    public $material;

    protected $listeners = ['openModalDeleteMaterial' => 'openModal', 'closeModalDeleteMaterial' => 'closeModal'];

    public function openModal($materialId)
    {
        $this->material = Material::find($materialId);
        $this->resetErrorBag();
        $this->show = true;
    }

    public function closeModal()
    {
        $this->show = false;
    }

    public function deleteMaterial()
    {
        $this->material->active = 0;
        $this->material->save();

        $this->dispatch('reload-list-museable-remain');
        session()->flash('mensaje', 'El Material se elimino exitosamente.');
        $this->dispatch('show_alert', type: 'success', message: 'El Material se elimino exitosamente.');
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.projects.inventory-material.museable.delete-museable');
    }
}
