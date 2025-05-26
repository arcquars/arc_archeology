<?php

namespace App\Livewire\Projects\StratumTab;

use App\Models\StratumCard;
use Livewire\Component;

class ViewStratumTab extends Component
{
    public $stratumCard;

    protected $listeners = ['viewStratumCardId'];

    public function viewStratumCardId($newId){
        $this->stratumCard = StratumCard::find($newId);
    }

    public function mount(string $stratumCardId)
    {
        $this->stratumCard = StratumCard::find($stratumCardId);

    }

    public function render()
    {
        return view('livewire.projects.stratum-tab.view-stratum-tab');
    }
}
