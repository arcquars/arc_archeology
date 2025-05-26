<?php

namespace App\Livewire\Projects\Uuee;

use App\Http\Requests\StoreUeRequest;
use App\Models\Ue;
use Livewire\Component;

class UpdateUe extends Component
{
    public $ue;

    public $project_id;
    public $code;
    public $covered_by;
    public $covers_to;
    public $description;
    public $interpreting;
    public $dating;

    protected $listeners = ['updateUeId'];

    public function updateUeId($newId){
        $this->load($newId);
    }

    public function rules(){
        return (new StoreUeRequest())->rules();
    }

    public function load(string $ueId){
        $this->ue = Ue::find($ueId);

//        dd("www: " . $this->ue->project_id);
        $this->project_id = $this->ue->project_id;
        $this->code = $this->ue->code;
        $this->covered_by = $this->ue->covered_by;
        $this->covers_to = $this->ue->covers_to;
        $this->description = $this->ue->description;
        $this->interpreting = $this->ue->interpreting;
        $this->dating = $this->ue->dating;
    }

    public function mount(string $ueId)
    {
        $this->load($ueId);
    }

    public function updateUe()
    {
        $this->validate();
        $this->ue->project_id = $this->project_id;
        $this->ue->code = $this->code;
        $this->ue->covered_by = $this->covered_by;
        $this->ue->covers_to = $this->covers_to;
        $this->ue->description = $this->description;
        $this->ue->interpreting = $this->interpreting;
        $this->ue->dating = $this->dating;

        if($this->ue->save()){
            $this->dispatch('lueClearSearch');
            $this->dispatch('close-ue-update');
        }

    }


    public function render()
    {
        return view('livewire.projects.uuee.update-ue');
    }
}
