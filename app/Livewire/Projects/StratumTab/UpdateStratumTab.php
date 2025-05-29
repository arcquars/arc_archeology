<?php

namespace App\Livewire\Projects\StratumTab;

use App\Http\Requests\StoreStratumCardRequest;
use App\Models\StratumCard;
use Livewire\Component;

class UpdateStratumTab extends Component
{
    public $stratumCard;

    public $project_id;
    public $i_date, $i_n_ue, $i_location_intervention, $i_acronym, $i_fact;

    protected $listeners = ['updateStratumCardId'];

    public function updateStratumCardId($newId){
        $this->load($newId);
    }

    public function rules(){
        return (new StoreStratumCardRequest())->rules();
    }

    public function load(string $stratumCardId){
        $this->stratumCard = StratumCard::find($stratumCardId);

        $this->project_id = $this->stratumCard->project_id;
        $this->i_date = $this->stratumCard->i_date;
        $this->i_n_ue = $this->stratumCard->i_n_ue;
        $this->i_location_intervention = $this->stratumCard->i_location_intervention;
        $this->i_acronym = $this->stratumCard->i_acronym;
        $this->i_fact = $this->stratumCard->i_fact;
    }

    public function mount(string $stratumCardId)
    {
        $this->load($stratumCardId);
    }

    public function updateStratumCard()
    {
        $this->validate();
        $this->stratumCard->project_id = $this->project_id;
        $this->stratumCard->i_date = $this->i_date;
        $this->stratumCard->i_n_ue = $this->i_n_ue;
        $this->stratumCard->i_location_intervention = $this->i_location_intervention;
        $this->stratumCard->i_acronym = $this->i_acronym;

        if($this->stratumCard->save()){
            $this->dispatch('lscClearSearch');
            $this->dispatch('close-stratum-card-update');
            $this->dispatch('show_alert', type: 'success', message: 'La Ficha de estrato se actualizo exitosamente.');
        }
    }

    public function render()
    {
        return view('livewire.projects.stratum-tab.update-stratum-tab');
    }
}
