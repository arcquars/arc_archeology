<?php

namespace App\Livewire\Projects\InventoryMaterial\MaterialRecount;

use App\Http\Requests\StoreMaterialRecountRequest;
use App\Models\MaterialRecount;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class CreateMaterialRecount extends Component
{
    use WithFileUploads;
    public $enableUe = true;

    public $project_id;
    public $ue, $chronology;

    public array $photos = [];

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
        
        // $ueNext = Project::find($this->project_id)->ueNext();
        // if($ueNext > 0){
        //     $validateData['ue'] = $ueNext;
        // }

        try{
            $materialRecount = MaterialRecount::create(array_merge($validateData, [
                'project_id' => $this->project_id,
                'user_id' => Auth::id()
            ]));

            $dirPhotos = $materialRecount->urlPhotosAttribute();
            $exists = Storage::disk("wasabi")->exists($dirPhotos);
            if (!$exists) {
                Storage::disk('wasabi')->makeDirectory($dirPhotos);
            }
            foreach ($this->photos as $file) {
                if ($file) {
                    $nombreOriginal = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $nombreSanitizado = Str::slug(pathinfo($nombreOriginal, PATHINFO_FILENAME)) . '.' . $extension;
                    $path = $file->storeAs($dirPhotos, $nombreSanitizado, 'wasabi');
                    Log::info('Wasabi archivo subido fotografia::: ' . $path);
                }
            }
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
        $ues = Project::find($this->project_id)->allUes();
        return view(
            'livewire.projects.inventory-material.material-recount.create-material-recount',
            compact('ues')
        );
    }
}
