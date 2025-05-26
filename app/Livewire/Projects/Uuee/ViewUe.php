<?php

namespace App\Livewire\Projects\Uuee;

use App\Models\Ue;
use Livewire\Component;

class ViewUe extends Component
{
    public $ue;

    protected $listeners = ['updateViewUeId'];

    public function updateViewUeId($newId){
        $this->ue = Ue::find($newId);
    }

    public function mount(string $ueId)
    {
        $this->ue = Ue::find($ueId);

    }

    public function render()
    {
        return view('livewire.projects.uuee.view-ue');
    }
}
