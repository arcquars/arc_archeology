<?php

namespace App\Livewire\Projects;

use App\Http\Requests\CreateProjectRequest;
use App\Models\Project;
use Livewire\Component;

class CreateProjectModal extends Component
{
    public $show = false;

    public $name;
    public $acronym;
    public $expedient;
    public $initial_quota;
    public $final_quota;
    public $utm;
    public $initial_date;


    protected $listeners = ['openModal', 'closeModal'];

    public function rules(){
        return (new CreateProjectRequest())->rules();
    }

    public function openModal()
    {
        $this->resetErrorBag(); // Limpia los errores de validación al abrir el modal
        $this->reset(['name', 'acronym', 'expedient', 'initial_quota', 'final_quota', 'utm', 'initial_date']);
        $this->show = true;
    }

    public function closeModal()
    {
        $this->show = false;
    }

    public function saveProject()
    {
        $project = Project::create(array_merge($this->validate(), ['user_id' => auth()->id()]));

        session()->flash('mensaje', 'Proyecto creado exitosamente.');
        $this->closeModal();
        $this->dispatch('reloadPageLi');
    }

    public function render()
    {
        return view('livewire.projects.create-project-modal');
    }
}
