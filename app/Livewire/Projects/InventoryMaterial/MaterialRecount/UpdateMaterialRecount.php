<?php

namespace App\Livewire\Projects\InventoryMaterial\MaterialRecount;

use App\Http\Requests\StoreMaterialRecountRequest;
use App\Models\MaterialRecount;
use Livewire\Component;

class UpdateMaterialRecount extends Component
{
    public $project_id;
    public $materialRecount;

    public $ue, $chronology;

    public function rules(){
        return (new StoreMaterialRecountRequest())->rules();
    }

    protected $listeners = ['updateMaterialRecountId'];

    public function updateMaterialId($newId){
        $this->load($newId);
    }

    public function load(string $materialRecountId)
    {
        $this->materialRecount = MaterialRecount::find($materialRecountId);

        $this->ue = $this->materialRecount->ue;
        $this->chronology = $this->materialRecount->chronology;

    }

    public function mount(string $materialRecountId)
    {
        $this->load($materialRecountId);
    }

    public function updateMaterialRecount()
    {
        $validatedData = $this->validate();
        $this->materialRecount->update($validatedData);

        $this->dispatch('material-recount-clear-search');
        $this->dispatch('closeUpdateMaterialRecount');

        $this->dispatch('show_alert', type: 'success', message: 'Se actualizo el material recuento');
    }

    public function render()
    {
        return view('livewire.projects.inventory-material.material-recount.update-material-recount');
    }
}
