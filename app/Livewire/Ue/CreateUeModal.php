<?php

namespace App\Livewire\Ue;

use App\Http\Requests\CreateProjectRequest;
use App\Http\Requests\StoreUeRequest;
use App\Models\Ue;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class CreateUeModal extends Component
{
    public $show = false;

    public $project_id;
    public $code;
    public $covered_by;
    public $covers_to;
    public $description;
    public $interpreting;
    public $dating;

    protected $listeners = ['openModalUe' => 'openModal', 'closeModalUe' => 'closeModal'];

    public function rules(){
        return (new StoreUeRequest())->rules();
    }

    public function openModal($projectId)
    {
        Log::info("sssss:: " . $projectId);
        $this->project_id = $projectId;
        $this->resetErrorBag(); // Limpia los errores de validación al abrir el modal
        $this->reset(['code', 'covered_by', 'covers_to', 'description', 'interpreting', 'dating']);
        $this->show = true;
    }

    public function closeModal()
    {
        $this->show = false;
    }

    public function saveUe(){
        $ue = Ue::create(array_merge($this->validate(), ['user_id' => auth()->id()]));
        session()->flash('mensaje', 'Ue creado exitosamente.');
        $this->closeModal();
        $this->dispatch('reloadPageLi');
    }

    public function render()
    {
        return view('livewire.ue.create-ue-modal');
    }
}
