<?php

namespace App\Livewire\Projects;

use App\Models\Project;
use Livewire\Component;

class DeleteProjectModal extends Component
{
    public $show = false;
    public $project;

    protected $listeners = ['openModalDelete' => 'openModal', 'closeModalDelete' => 'closeModal'];

    public function openModal($project_id)
    {
        $this->project = Project::find($project_id);
        $this->resetErrorBag();
        $this->show = true;
    }

    public function closeModal()
    {
        $this->show = false;
    }

    public function deleteProject()
    {
        $this->project->active = 0;
        $this->project->save();

        session()->flash('mensaje', 'El Proyecto se borro exitosamente.');
        $this->closeModal();
        $this->dispatch('reloadPageLi');
    }

    public function render()
    {
        return view('livewire.projects.delete-project-modal');
    }
}
