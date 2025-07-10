<?php

namespace App\Livewire\Projects\InventoryMaterial\MaterialRecount;

use App\Models\MaterialRecount;
use Livewire\Component;

class ViewMaterialRecount extends Component
{
    public $materialRecount;

    protected $listeners = ['viewMaterialRecountId'];

    public function viewMaterialRecountId($materialRecountId){
        $this->materialRecount = MaterialRecount::find($materialRecountId);
    }

    public function mount($materialRecountId)
    {
        $this->materialRecount = MaterialRecount::find($materialRecountId);
    }

    public function render()
    {
        return view('livewire.projects.inventory-material.material-recount.view-material-recount');
    }
}
