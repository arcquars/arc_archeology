<?php

namespace App\Livewire\Projects\FieldWork;

use Livewire\Component;

class ViewFieldWork extends Component
{
    public $muralId;

    protected $listeners = ['updateMuralId'];

    public function updateMuralId($newId){
        dd("ss");
        $this->muralId = $newId;
    }

    public function mount(string $muralId)
    {
//        dd($muralId);
        $this->muralId = $muralId;
    }

    public function render()
    {
        return view('livewire.projects.field-work.view-field-work');
    }
}
