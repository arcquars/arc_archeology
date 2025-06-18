<?php

namespace App\Livewire\Projects;

use Livewire\Component;

class MenuMaterialsInventory extends Component
{
    public $projectId;
    public $componenteActivo = 'CatalogArchitecturalElements';

    public bool $showCreateCatalogueArch = false;

    protected $listeners = [
        'toggleCreateFieldWork' => 'toggleCreateCatArch',
        'closeCreateFieldWork' => 'closeFormCreateCatArch',
        ];

    public function toggleCreateCatArch(){
        $this->showCreateCatalogueArch = !$this->showCreateCatalogueArch;
        if($this->showCreateCatalogueArch){
//            $this->closeView();
//            $this->closeUpdate();
//            $this->closeUeView();
        }

    }

    public function closeFormCreateCatArch(){
        $this->showCreateCatalogueArch = false;
    }

    public function seleccionarComponente($componente)
    {
//        $this->closeAll();
        $this->componenteActivo = $componente;
    }

    public function mount(string $projectId)
    {
        $this->projectId = $projectId;
    }

    public function render()
    {
        return view('livewire.projects.menu-materials-inventory');
    }
}
