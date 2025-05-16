<?php

namespace App\Livewire\Projects;

use Livewire\Component;

class MenuFieldWork extends Component
{
    public $projectId;
    public $componenteActivo = 'muralStratigraphyCard';
//showCreateFieldWork

    public bool $showCreateFieldWork = false;

    protected $listeners = ['toggleCreateFieldWork' => 'toggle', 'closeCreateFieldWork' => 'closeForm'];

    public function toggle(){
        $this->showCreateFieldWork = !$this->showCreateFieldWork;
        if($this->showCreateFieldWork){
            $this->dispatch('show-notificacion');
        }
    }

    public function seleccionarComponente($componente)
    {
        $this->componenteActivo = $componente;
    }

    public function closeForm(){
        $this->showCreateFieldWork = false;
    }

    public function mount(string $projectId)
    {
        $this->projectId = $projectId;
    }

    public function render()
    {
        return view('livewire.projects.menu-field-work');
    }
}
