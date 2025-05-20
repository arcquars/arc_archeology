<?php

namespace App\Livewire\Projects;

use Livewire\Component;

class MenuFieldWork extends Component
{
    public $projectId;
    public $muralId = 0;
    public $componenteActivo = 'muralStratigraphyCard';

    public bool $showCreateFieldWork = false;
    public bool $showUpdateFieldWork = false;
    public bool $showViewFieldWork = false;

    protected $listeners = [
        'toggleCreateFieldWork' => 'toggle',
        'closeCreateFieldWork' => 'closeForm',

        'toggleUpdateFieldWork' => 'toggleUpdate',
        'closeUpdateFieldWork' => 'closeUpdate',

        'toggleViewFieldWork' => 'toggleView',
        'closeViewFieldWork' => 'closeView'
    ];

    public function toggle(){
        $this->showCreateFieldWork = !$this->showCreateFieldWork;
        if($this->showCreateFieldWork){
            $this->closeView();
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
        if(!$this->showViewFieldWork){
            $this->showViewFieldWork = !$this->showViewFieldWork;
            if($this->showViewFieldWork){
                $this->muralId = $muralId;
            }
        } else {
            $newId = $muralId;
            $this->dispatch('updateMuralId', $newId);
        }

        if($this->showViewFieldWork){
            $this->closeForm();
        }

    }

    public function closeView(){
        $this->showUpdateFieldWork = false;
    }

    public function toggleUpdate($muralId){
        if(!$this->showUpdateFieldWork){
            $this->showUpdateFieldWork = !$this->showUpdateFieldWork;
            if($this->showUpdateFieldWork){
                $this->muralId = $muralId;
            }
        } else {
            $newId = $muralId;
            $this->dispatch('updateFieldWorkMuralId', $newId);
        }

        if(!$this->showUpdateFieldWork){
            $this->closeUpdate();
        }
    }

    public function closeUpdate(){
        $this->showUpdateFieldWork = false;
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
