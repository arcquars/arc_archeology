<?php

namespace App\Livewire\Projects;

use Livewire\Component;

class MenuMaterialsInventory extends Component
{
    public $projectId;
    public $componenteActivo = 'CatalogArchitecturalElements';
    public $catalogueArchitecturalId = 0;
    public $materialMuseableId = 0;

    public bool $showCreateCatalogueArch = false;
    public bool $showUpdateCatalogueArch = false;
    public bool $showViewCatalogueArch = false;

    public bool $showCreateMaterialMuseable = false;
    public bool $showUpdateMaterialMuseable = false;
    public bool $showViewMaterialMuseable = false;

    protected $listeners = [
        'toggleCreateFieldWork' => 'toggleCreateCatArch',
        'closeCreateFieldWork' => 'closeFormCreateCatArch',

        'toggleUpdateCatArch' => 'toggleUpdateCatArch',
        'closeUpdateCatArch' => 'closeFormUpdateCatArch',

        'toggleViewCatArch' => 'toggleViewCatArch',
        'closeViewCatArch' => 'closeViewCatArch',

        'toggleCreateMuseable' => 'toggleCreateMuseable',
        'closeCreateMuseable' => 'closeCreateMuseable',

        'toggleUpdateMuseable' => 'toggleUpdateMuseable',
        'closeUpdateMuseable' => 'closeFormUpdateMuseable',

        'toggleViewMuseable' => 'toggleViewMuseable',
        'closeViewMuseable' => 'closeViewMuseable',
        ];

    public function toggleCreateCatArch(){
        $this->showCreateCatalogueArch = !$this->showCreateCatalogueArch;
        if($this->showCreateCatalogueArch){
            $this->closeFormUpdateCatArch();
            $this->closeViewCatArch();
            $this->closeCreateMuseable();
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
            $this->closeFormCreateCatArch();
            $this->closeViewCatArch();
            $this->closeCreateMuseable();
        }

    }

    public function closeFormUpdateCatArch(){
        $this->showUpdateCatalogueArch = false;
    }

    public function toggleViewCatArch($catalogueArchitecturalId){
        $this->catalogueArchitecturalId = $catalogueArchitecturalId;
        if(!$this->showViewCatalogueArch){
            $this->showViewCatalogueArch = !$this->showViewCatalogueArch;
        }

        if($this->showViewCatalogueArch){
            $newId = $catalogueArchitecturalId;
            $this->dispatch('viewCatalogueArchitecturalId', $newId);
            $this->closeFormCreateCatArch();
            $this->closeFormUpdateCatArch();
            $this->closeCreateMuseable();
        }
    }

    public function closeViewCatArch(){
        $this->showViewCatalogueArch = false;
    }

    public function toggleCreateMuseable(){
        $this->showCreateMaterialMuseable = !$this->showCreateMaterialMuseable;
        if($this->showCreateMaterialMuseable){
            $this->closeFormCreateCatArch();
            $this->closeFormUpdateCatArch();
            $this->closeViewCatArch();
        }

    }

    public function closeCreateMuseable(){
        $this->showCreateMaterialMuseable = false;
    }

    public function toggleUpdateMuseable($materialId){
        $this->materialMuseableId = $materialId;

        if(!$this->showUpdateMaterialMuseable){
            $this->showUpdateMaterialMuseable = !$this->showUpdateMaterialMuseable;
        }

        if($this->showUpdateMaterialMuseable){
            $newId = $materialId;
            $this->dispatch('updateMaterialId', $newId);
            $this->closeFormCreateCatArch();
            $this->closeFormUpdateCatArch();
            $this->closeViewCatArch();
            $this->closeCreateMuseable();
        }

    }

    public function closeFormUpdateMuseable(){
        $this->showUpdateMaterialMuseable = false;
    }

    public function toggleViewMuseable($materialId){
        $this->materialMuseableId = $materialId;
        if(!$this->showViewMaterialMuseable){
            $this->showViewMaterialMuseable = !$this->showViewMaterialMuseable;
        }

        if($this->showViewMaterialMuseable){
            $newId = $materialId;
            $this->dispatch('viewMaterialId', $newId);
            $this->closeFormCreateCatArch();
            $this->closeFormUpdateCatArch();
            $this->closeCreateMuseable();
            $this->closeFormUpdateMuseable();
        }
    }

    public function closeViewMuseable(){
        $this->showViewMaterialMuseable = false;
    }

    public function seleccionarComponente($componente)
    {
        $this->closeAll();
        $this->componenteActivo = $componente;
    }

    public function closeAll(){
        $this->closeFormUpdateCatArch();
        $this->closeFormCreateCatArch();
        $this->closeViewCatArch();

        $this->closeFormUpdateMuseable();
        $this->closeCreateMuseable();
        $this->closeViewMuseable();
//        $this->closeUeCreate();

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
