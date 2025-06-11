<?php

namespace App\Livewire\Projects;

use App\Models\Project;
use App\Models\User;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;

class UnassignEditorModal extends Component
{
    #[Locked]
    public $projectId;
    #[Locked]
    public $userId;

    public $user;
    public $showModal = false;

    // Escucha un evento para abrir el modal y pasar el ID del proyecto
    #[On('openUnassignedEditorModal')]
    public function openModal($projectId, $userId)
    {
        $this->projectId = $projectId;
        $this->userId = $userId;
        $this->user = User::find($this->userId);
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetModalData();
    }

    public function resetModalData()
    {
        $this->user = null;
    }

    public function unassignedUser(){
        $project = Project::find($this->projectId);
        $project->users()->detach($this->userId);
        $this->dispatch('updateProjectId', value: $project->id);
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.projects.unassign-editor-modal');
    }
}
