<?php

namespace App\Livewire\Projects\InventoryMaterial\MaterialRecount;

use App\Http\Requests\StoreMaterialRecountRequest;
use App\Models\MaterialRecount;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class CreateMaterialRecount extends Component
{
    public $enableUe = true;

    public $project_id;
    public $ue, $chronology;

    public function rules(){
        return (new StoreMaterialRecountRequest())->rules();
    }

    public function mount(string $projectId)
    {
        $this->project_id = $projectId;
        $ueNext = Project::find($projectId)->ueNext();
        if($ueNext){
            $this->enableUe = false;
            $this->ue = $ueNext;
        }
    }

    public function saveMaterialRecount()
    {
        $validateData = $this->validate();
        $ueNext = Project::find($this->project_id)->ueNext();
        if($ueNext > 0){
            $validateData['ue'] = $ueNext;
        }

        try{
            $materialRecount = MaterialRecount::create(array_merge($validateData, [
                'project_id' => $this->project_id,
                'user_id' => Auth::id()
            ]));

            DB::commit();
            $this->dispatch('material-recount-clear-search');
            $this->dispatch('closeCreateMaterialRecount');
            $this->dispatch('show_alert', type: 'success', message: 'Se creo el material recuento');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("Error al crear material recuento: " . $e->getMessage());
            $this->dispatch('show_alert', type: 'error', message: $e->getMessage());
        }

    }

    public function render()
    {
        return view('livewire.projects.inventory-material.material-recount.create-material-recount');
    }
}
