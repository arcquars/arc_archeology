<?php

namespace App\Livewire\Projects;

use Livewire\Component;

class MenuMaterialsInventory extends Component
{
    public $projectId;
    public $componenteActivo = 'CatalogArchitecturalElements';
    public $catalogueArchitecturalId = 0;

    public bool $showCreateCatalogueArch = false;
    public bool $showUpdateCatalogueArch = false;

    protected $listeners = [
        'toggleCreateFieldWork' => 'toggleCreateCatArch',
        'closeCreateFieldWork' => 'closeFormCreateCatArch',

        'toggleUpdateCatArch' => 'toggleUpdateCatArch',
        'closeUpdateCatArch' => 'closeFormUpdateCatArch',
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

    public function toggleUpdateCatArch($catalogueArchitecturalId){
        $this->catalogueArchitecturalId = $catalogueArchitecturalId;

        if(!$this->showUpdateCatalogueArch){
            $this->showUpdateCatalogueArch = !$this->showUpdateCatalogueArch;
        }

        if($this->showUpdateCatalogueArch){
            $newId = $catalogueArchitecturalId;
            $this->dispatch('updateCatalogueArchitecturalId', $newId);
        }

    }

    public function closeFormUpdateCatArch(){
        $this->showUpdateCatalogueArch = false;
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
