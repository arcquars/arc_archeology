<?php

namespace App\Livewire\Projects\HumanRemainsCard;

use App\Http\Requests\StoreHumanRemainRequest;
use App\Models\HumanRemainCard;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateHumanRemainsCard extends Component
{
    public $humanRemainCard;

    public $project_id;
    public $intervention, $location, $ue, $fact, $type_inhumation, $type_cremation;

    public function mount(string $projectId)
    {
        $this->project_id = $projectId;
    }

    public function rules(){
        return (new StoreHumanRemainRequest())->rules();
    }

    public function saveHumanRemain(){
        $this->validate();

        $humanRemainCard = new HumanRemainCard();
        $humanRemainCard->intervention = $this->intervention;
        $humanRemainCard->location = $this->location;
        $humanRemainCard->ue = $this->ue;
        $humanRemainCard->fact = $this->fact;
        $humanRemainCard->type_inhumation = $this->type_inhumation ?? 0;
        $humanRemainCard->type_cremation = $this->type_cremation ?? 0;

        $humanRemainCard->project_id = $this->project_id;
        $humanRemainCard->user_id = Auth::id();

        if($humanRemainCard->save()){
            $this->dispatch('human-remain-clear-search');
            $this->dispatch('close-human-remain-card-create');
        }
    }

    public function render()
    {
        return view('livewire.projects.human-remains-card.create-human-remains-card');
    }
}
