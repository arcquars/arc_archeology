<?php

namespace App\Livewire\Projects\InventoryMaterial\Museable;

use App\Http\Requests\StoreMaterialRequest;
use App\Http\Requests\StoreStructureTabRequest;
use App\Models\Ceramic;
use App\Models\Material;
use App\Models\Project;
use App\Models\Tile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CreateMuseable extends Component
{
    public $enableUe = true;

    public $project_id;
    public $ue, $object, $century, $class, $fragments, $form, $piece_percentage, $thickness;
    public $pasta, $decoration, $material_type;

    public $side_max, $side_min, $notes;
    public $height, $diameter_base, $diameter_mouth, $diameter_max, $description;
    public $changeType = '';

    public function rules(){
        return (new StoreMaterialRequest())->rules($this->material_type);
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

    public function saveMaterial()
    {
        $validateData = $this->validate();
        $ueNext = Project::find($this->project_id)->ueNext();
        if($ueNext > 0){
            $validateData['ue'] = $ueNext;
        }

        try{
            $material = Material::create(array_merge($validateData, [
                'project_id' => $this->project_id,
                'user_id' => Auth::id()
            ]));

            if(strcmp($this->material_type, \App\Models\Material::MATERIAL_TYPE_CERAMIC) == 0){
                Ceramic::create([
                    'material_id' => $material->id,
                    'height' => $this->height,
                    'diameter_base' => $this->diameter_base,
                    'diameter_mouth' => $this->diameter_mouth,
                    'diameter_max' => $this->diameter_max,
                    'description' => $this->description,
                ]);
            } else {
                Tile::create([
                    'material_id' => $material->id,
                    'side_max' => $this->side_max,
                    'side_min' => $this->side_min,
                    'notes' => $this->notes,
                ]);
            }
            DB::commit();
            $this->dispatch('museable-remain-clear-search');
            $this->dispatch('closeCreateMuseable');
            $this->dispatch('show_alert', type: 'success', message: 'Se creo el material');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("Error al crear material o vincular ceramica o tile: " . $e->getMessage());
            $this->dispatch('show_alert', type: 'error', message: $e->getMessage());
        }

    }

    public function showType($type){
        $this->changeType = $type;
    }

    public function render()
    {
        return view('livewire.projects.inventory-material.museable.create-museable');
    }
}
