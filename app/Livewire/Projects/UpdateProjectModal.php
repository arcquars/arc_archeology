<?php

namespace App\Livewire\Projects;

use App\Models\Project;
use Livewire\Component;

class UpdateProjectModal extends Component
{
    public $show = false;
    public $project;

    public $name;
    public $acronym;
    public $expedient;
    public $initial_quota;
    public $final_quota;
    public $utm;
    public $initial_date;


    protected $listeners = ['openUpdateProjectModal' => 'openModal', 'closeModal'];

    public function rules(){
        return (new CreateProjectRequest())->rules();
    }

    public function openModal($project_id)
    {
        $this->project = Project::find($project_id);
        $this->resetErrorBag(); // Limpia los errores de validación al abrir el modal
        $this->reset(['name', 'acronym', 'expedient', 'initial_quota', 'final_quota', 'utm', 'initial_date']);
        $this->show = true;
        $this->name = $this->project->name;
        $this->acronym = $this->project->acronym;
        $this->expedient = $this->project->expedient;
        $this->initial_quota = $this->project->initial_quota;
        $this->final_quota = $this->project->final_quota;
        $this->utm = $this->project->utm;
        $this->initial_date = $this->project->initial_date;
    }

    public function closeModal()
    {
        $this->show = false;
    }

    public function updateProject()
    {
        $this->project->name = $this->name;
        $this->project->acronym = $this->acronym;
        $this->project->expedient = $this->expedient;
        $this->project->initial_quota = $this->initial_quota;
        $this->project->final_quota = $this->final_quota;
        $this->project->utm = $this->utm;
        $this->project->initial_date = $this->initial_date;

        $this->project->save();


        $this->dispatch('show_alert', type: 'success', message: 'Se actualizo el proyecto!');
        $this->closeModal();
        $this->dispatch('reloadPageLi');
    }

    public function render()
    {
        return view('livewire.projects.update-project-modal');
    }
}
