<?php

namespace App\Livewire\Projects\StratumTab;

use App\Models\StratumCard;
use Livewire\Component;

class DeleteStratumTab extends Component
{
    public $show = false;
    public $stratumCard;

    protected $listeners = ['openModalDeleteStratumCard' => 'openModal', 'closeModalDeleteStratumCard' => 'closeModal'];

    public function openModal($stratumCardId)
    {
        $this->stratumCard = StratumCard::find($stratumCardId);
        $this->resetErrorBag();
        $this->show = true;
    }

    public function closeModal()
    {
        $this->show = false;
    }

    public function deleteStratumCard()
    {
        $this->stratumCard->active = 0;
        $this->stratumCard->save();

        $this->dispatch('reload-list-stratum-tab');
        session()->flash('mensaje', 'La Ficha de estrato se borro exitosamente.');
        $this->dispatch('show_alert', type: 'success', message: 'La Ficha de estrato se borro exitosamente.');
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.projects.stratum-tab.delete-stratum-tab');
    }
}
