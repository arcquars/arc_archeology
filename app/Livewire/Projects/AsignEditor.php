<?php

namespace App\Livewire\Projects;

use App\Models\Project;
use Livewire\Component;

class AsignEditor extends Component
{
    public $projectId = 0;
    public $project;

    public $selectedUser = null;
    public $users;

    protected $listeners = ['updateProjectId'];


//    #[On('updateProjectId')]
    public function updateProjectId($value){
        $this->projectId = $value;
        $this->loadProject();
    }

    // Se ejecuta al montar el componente por primera vez
    public function mount()
    {
        $this->loadProject();
    }

    public function updatedSelectedUser($value)
    {
        $this->dispatch('user-selected', userId: $value); // Opcional: disparar un evento
        session()->flash('message', 'Usuario seleccionado: ' . ($value ? User::find($value)->name : 'Ninguno'));
    }

    private function loadProject()
    {
        if ($this->projectId) {
            $this->project = Project::find($this->projectId);
        } else {
            $this->project = null;
        }
    }

    public function render()
    {
        return view('livewire.projects.asign-editor');
    }
}
