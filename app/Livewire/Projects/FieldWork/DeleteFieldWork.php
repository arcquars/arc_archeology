<?php

namespace App\Livewire\Projects\FieldWork;

use App\Models\MuralStratigraphyCard;
use Livewire\Component;

class DeleteFieldWork extends Component
{
    public $show = false;
    public $muralStratigraphyCard;

    protected $listeners = ['openModalDeleteFw' => 'openModal', 'closeModalDeleteFw' => 'closeModal'];

    public function openModal($muralId)
    {
        $this->muralStratigraphyCard = MuralStratigraphyCard::find($muralId);
        $this->resetErrorBag();
        $this->show = true;
    }

    public function closeModal()
    {
        $this->show = false;
    }

    public function deleteMuralStratigraphyCard()
    {
        $this->muralStratigraphyCard->active = 0;
        $this->muralStratigraphyCard->save();

        $this->dispatch('reload-mural-stratigraphy-card');
        session()->flash('mensaje', 'La Ficha se borro exitosamente.');
        $this->closeModal();
//        $this->dispatch('reloadPageLi');
    }
    public function render()
    {
        return view('livewire.projects.field-work.delete-field-work');
    }
}
