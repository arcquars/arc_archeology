<?php

namespace App\Livewire\Projects\Uuee;

use App\Models\Ue;
use Livewire\Component;

class DeleteUe extends Component
{
    public $show = false;
    public $ue;

    protected $listeners = ['openModalDeleteUe' => 'openModal', 'closeModalDeleteUe' => 'closeModal'];

    public function openModal($ueId)
    {
        $this->ue = Ue::find($ueId);
        $this->resetErrorBag();
        $this->show = true;
    }

    public function closeModal()
    {
        $this->show = false;
    }

    public function deleteUe()
    {
        $this->ue->active = 0;
        $this->ue->save();

        $this->dispatch('reload-list-ue');
        session()->flash('mensaje', 'La UE se borro exitosamente.');
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.projects.uuee.delete-ue');
    }
}
