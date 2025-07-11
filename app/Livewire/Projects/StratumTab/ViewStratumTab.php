<?php

namespace App\Livewire\Projects\StratumTab;

use App\Models\StratumCard;
use Livewire\Component;

class ViewStratumTab extends Component
{
    public $stratumCard;

    public $croquisUrls = [];
    public $photoUrls = [];
    public $quotes = [];

    protected $listeners = ['viewStratumCardId'];

    public function viewStratumCardId($newId){
        $this->stratumCard = StratumCard::find($newId);
        $this->croquisUrls = $this->stratumCard->urlCroquisPublicAttribute();
        $this->photoUrls = $this->stratumCard->urlPhotosPublicAttribute();
        $this->quotes = $this->stratumCard->quotes;
    }

    public function mount(string $stratumCardId)
    {
        $this->stratumCard = StratumCard::find($stratumCardId);
        $this->croquisUrls = $this->stratumCard->urlCroquisPublicAttribute();
        $this->photoUrls = $this->stratumCard->urlPhotosPublicAttribute();
        $this->quotes = $this->stratumCard->quotes;

    }

    public function render()
    {
        return view('livewire.projects.stratum-tab.view-stratum-tab');
    }
}
