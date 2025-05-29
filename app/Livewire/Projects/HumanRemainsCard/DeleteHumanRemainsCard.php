<?php

namespace App\Livewire\Projects\HumanRemainsCard;

use App\Models\HumanRemainCard;
use Livewire\Component;

class DeleteHumanRemainsCard extends Component
{
    public $show = false;
    public $humanRemainCard;

    protected $listeners = ['openModalDeleteHumanRemainCard' => 'openModal', 'closeModalDeleteHumanRemainCard' => 'closeModal'];

    public function openModal($humanRemainCardId)
    {
        $this->humanRemainCard = HumanRemainCard::find($humanRemainCardId);
        $this->resetErrorBag();
        $this->show = true;
    }

    public function closeModal()
    {
        $this->show = false;
    }

    public function deleteHumanRemainCard()
    {
        $this->humanRemainCard->active = 0;
        $this->humanRemainCard->save();

        $this->dispatch('reload-list-human-remain');
        session()->flash('mensaje', 'La Ficha de restos humanos se borro exitosamente.');
        $this->dispatch('show_alert', type: 'success', message: 'La Ficha de restos humanos se borro exitosamente.');
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.projects.human-remains-card.delete-human-remains-card');
    }
}
