<?php

namespace App\Livewire\Projects\InventoryMaterial\Museable;

use App\Models\Material;
use Livewire\Component;

class ViewMuseable extends Component
{
    public $material;

    protected $listeners = ['viewMaterialId'];

    public function viewMaterialId($materialId){
        $this->material = Material::find($materialId);
    }

    public function mount($materialId)
    {
        $this->material = Material::find($materialId);
    }

    public function render()
    {
        return view('livewire.projects.inventory-material.museable.view-museable');
    }
}
