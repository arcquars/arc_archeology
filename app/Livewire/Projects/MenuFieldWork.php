<?php

namespace App\Livewire\Projects;

use Livewire\Component;

class MenuFieldWork extends Component
{
    public $projectId;
    public $muralId = 0;
    public $componenteActivo = 'muralStratigraphyCard';

    public bool $showCreateFieldWork = false;
    public bool $showViewFieldWork = false;

    protected $listeners = [
        'toggleCreateFieldWork' => 'toggle',
        'closeCreateFieldWork' => 'closeForm',

        'toggleViewFieldWork' => 'toggleView',
        'closeViewFieldWork' => 'closeView'
    ];

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

    public function toggleView($muralId){
        $this->showViewFieldWork = !$this->showViewFieldWork;
        if($this->showViewFieldWork){
            $this->muralId = $muralId;
        }
    }

    public function closeView(){
        $this->showViewFieldWork = false;
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
