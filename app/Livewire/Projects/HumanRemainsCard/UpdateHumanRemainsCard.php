<?php

namespace App\Livewire\Projects\HumanRemainsCard;

use App\Http\Requests\StoreHumanRemainRequest;
use App\Models\HumanRemainCard;
use Livewire\Component;

class UpdateHumanRemainsCard extends Component
{
    public $humanRemainCard;

    public $project_id;
    public $intervention, $location, $ue, $fact, $type_inhumation, $type_cremation;

    protected $listeners = ['updateHumanRemainCardId'];

    public function updateHumanRemainCardId($newId){
        $this->load($newId);
    }

    public function rules(){
        return (new StoreHumanRemainRequest())->rules();
    }

    public function load(string $humanRemainCardId){
        $this->humanRemainCard = HumanRemainCard::find($humanRemainCardId);

        $this->project_id = $this->humanRemainCard->project_id;
        $this->intervention = $this->humanRemainCard->intervention;
        $this->location = $this->humanRemainCard->location;
        $this->ue = $this->humanRemainCard->ue;
        $this->fact = $this->humanRemainCard->fact;
        $this->type_inhumation = $this->humanRemainCard->type_inhumation;
        $this->type_cremation = $this->humanRemainCard->type_cremation;
    }

    public function mount(string $humanRemainCardId)
    {
        $this->load($humanRemainCardId);
    }

    public function updateHumanRemainCard()
    {
        $this->validate();
        $this->humanRemainCard->project_id = $this->project_id;
        $this->humanRemainCard->intervention = $this->intervention;
        $this->humanRemainCard->location = $this->location;
        $this->humanRemainCard->ue = $this->ue;
        $this->humanRemainCard->fact = $this->fact;
        $this->humanRemainCard->type_inhumation = $this->type_inhumation;
        $this->humanRemainCard->type_cremation = $this->type_cremation;

        if($this->humanRemainCard->save()){
            $this->dispatch('human-remain-clear-search');
            $this->dispatch('close-human-remain-card-update');

            $this->dispatch('show_alert', type: 'success', message: 'Se actualizo la ficha de restos humanos');
        }
    }

    public function render()
    {
        return view('livewire.projects.human-remains-card.update-human-remains-card');
    }
}
