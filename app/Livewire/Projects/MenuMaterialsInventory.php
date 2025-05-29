<?php

namespace App\Livewire\Projects;

use Livewire\Component;

class MenuMaterialsInventory extends Component
{
    public $projectId;
    public $componenteActivo = 'CatalogArchitecturalElements';

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
