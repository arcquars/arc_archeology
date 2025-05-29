<?php

namespace App\Livewire\Projects\StratumTab;

use App\Http\Requests\StoreStratumCardRequest;
use App\Models\StratumCard;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateStratumTab extends Component
{
    public $stratumCard;

    public $project_id;
    public $i_date, $i_n_ue, $i_location_intervention, $i_acronym, $i_fact;

    public function mount(string $projectId)
    {
        $this->project_id = $projectId;
    }

    public function rules(){
        return (new StoreStratumCardRequest())->rules();
    }

    public function saveStratumCard(){
        $this->validate();

        $stratumCard = new StratumCard();
        $stratumCard->i_date = $this->i_date;
        $stratumCard->i_n_ue = $this->i_n_ue;
        $stratumCard->i_location_intervention = $this->i_location_intervention;
        $stratumCard->i_acronym = $this->i_acronym;
        $stratumCard->i_fact = $this->i_fact;

        $stratumCard->project_id = $this->project_id;
        $stratumCard->user_id = Auth::id();

        if($stratumCard->save()){
            $this->dispatch('lscClearSearch');
            $this->dispatch('close-stratum-card-create');
            $this->dispatch('show_alert', type: 'success', message: 'La Ficha de estrato se creo exitosamente.');
        }
    }

    public function render()
    {
        return view('livewire.projects.stratum-tab.create-stratum-tab');
    }
}
