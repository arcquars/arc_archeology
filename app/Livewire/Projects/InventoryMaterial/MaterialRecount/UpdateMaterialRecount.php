<?php

namespace App\Livewire\Projects\InventoryMaterial\MaterialRecount;

use App\Http\Requests\StoreMaterialRecountRequest;
use App\Models\MaterialRecount;
use App\Models\Project;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class UpdateMaterialRecount extends Component
{
    use WithFileUploads;
    public $project_id;
    public $materialRecount;

    public $ue, $chronology;

    public array $photos = [];

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
        $this->project_id = $this->materialRecount->project_id;

    }

    public function mount(string $materialRecountId)
    {
        $this->load($materialRecountId);
    }

    public function updateMaterialRecount()
    {
        $validatedData = $this->validate();
        $this->materialRecount->update($validatedData);

        $dirPhotos = $this->materialRecount->urlPhotosAttribute();
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

        $this->dispatch('material-recount-clear-search');
        $this->dispatch('closeUpdateMaterialRecount');

        $this->dispatch('show_alert', type: 'success', message: 'Se actualizo el material recuento');
    }

    public function render()
    {
        $ues = Project::find($this->project_id)->allUes();
        return view(
            'livewire.projects.inventory-material.material-recount.update-material-recount',
            compact('ues')
        );
    }
}
