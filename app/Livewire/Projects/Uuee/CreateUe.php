<?php

namespace App\Livewire\Projects\Uuee;

use App\Http\Requests\StoreUeRequest;
use App\Models\Ue;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateUe extends Component
{
    public $ue;

    public $project_id;
    public $code;
    public $covered_by;
    public $covers_to;
    public $description;
    public $interpreting;
    public $dating;

    public function mount(string $projectId)
    {
        $this->project_id = $projectId;
    }

    public function rules(){
        return (new StoreUeRequest())->rules();
    }

    public function saveUe(){
        $this->validate();

        $ue = new Ue();
        $ue->code = $this->code;
        $ue->covered_by = $this->covered_by;
        $ue->covers_to = $this->covers_to;
        $ue->description = $this->description;
        $ue->interpreting = $this->interpreting;
        $ue->dating = $this->dating;
        $ue->project_id = $this->project_id;
        $ue->user_id = Auth::id();

        if($ue->save()){
            $this->dispatch('lueClearSearch');
            $this->dispatch('close-ue-create');
            $this->dispatch('show_alert', type: 'success', message: 'La UUEE se creo exitosamente.');
        }
    }

    public function render()
    {
        return view('livewire.projects.uuee.create-ue');
    }
}
