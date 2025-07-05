<?php

namespace App\Livewire\Projects\InventoryMaterial\CatalogueArchitectural;

use App\Models\CatalogueArchitectual;
use Livewire\Component;

class ViewCatalogueArchitectural extends Component
{
    public $catalogueArchitectural;

    protected $listeners = ['viewCatalogueArchitecturalId'];

    public function viewCatalogueArchitecturalId($catalogueArchitecturalId){
        $this->catalogueArchitectural = CatalogueArchitectual::find($catalogueArchitecturalId);
    }

    public function mount($catalogueArchitectualId)
    {
        $this->catalogueArchitectural = CatalogueArchitectual::find($catalogueArchitectualId);
    }
    public function render()
    {
        return view('livewire.projects.inventory-material.catalogue-architectural.view-catalogue-architectural');
    }
}
