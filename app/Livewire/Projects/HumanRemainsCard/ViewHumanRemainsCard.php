<?php

namespace App\Livewire\Projects\HumanRemainsCard;

use App\Models\HumanRemainCard;
use Livewire\Component;

class ViewHumanRemainsCard extends Component
{
    public $humanRemainCard;

    protected $listeners = ['viewHumanRemainCardId'];

    public function viewHumanRemainCardId($newId){
        $this->humanRemainCard = HumanRemainCard::find($newId);
    }

    public function mount(string $humanRemainCardId)
    {;
        $this->humanRemainCard = HumanRemainCard::find($humanRemainCardId);
    }

    public function render()
    {
        return view('livewire.projects.human-remains-card.view-human-remains-card');
    }
}
