<?php

namespace App\Livewire\Projects;

use Livewire\Component;

class MenuFieldWork extends Component
{
    public $projectId;
    public $muralId = 0;
    public $ueId = 0;
    public $stratumCardId = 0;
    public $structureTabId = 0;
    public $humanRemainCardId = 0;
    public $componenteActivo = 'muralStratigraphyCard';

    public bool $showCreateFieldWork = false;
    public bool $showUpdateFieldWork = false;
    public bool $showViewFieldWork = false;

    public bool $showCreateUe = false;
    public bool $showUpdateUe = false;
    public bool $showViewUe = false;

    public bool $showCreateStratumCard = false;
    public bool $showUpdateStratumCard = false;
    public bool $showViewStratumCard = false;

    public bool $showCreateStructureTab = false;
    public bool $showUpdateStructureTab = false;
    public bool $showViewStructureTab = false;

    public bool $showCreateHumanRemainCard = false;
    public bool $showUpdateHumanRemainCard = false;
    public bool $showViewHumanRemainCard = false;

    protected $listeners = [
        'toggleCreateFieldWork' => 'toggle',
        'closeCreateFieldWork' => 'closeForm',

        'toggleUpdateFieldWork' => 'toggleUpdate',
        'closeUpdateFieldWork' => 'closeUpdate',

        'toggleViewFieldWork' => 'toggleView',
        'closeViewFieldWork' => 'closeView',

        'toggle-ue-create' => 'toggleUeCreate',
        'close-ue-create' => 'closeUeCreate',

        'toggle-ue-update' => 'toggleUeUpdate',
        'close-ue-update' => 'closeUeUpdate',

        'toggle-view-ue' => 'toggleUeView',
        'close-view-ue' => 'closeUeView',

        'toggle-stratum-card-create' => 'toggleStratumCardCreate',
        'close-stratum-card-create' => 'closeStratumCardCreate',

        'toggle-stratum-card-update' => 'toggleStratumCardUpdate',
        'close-stratum-card-update' => 'closeStratumCardUpdate',

        'toggle-stratum-card-view' => 'toggleStratumCardView',
        'close-stratum-card-view' => 'closeStratumCardView',

        'toggle-structure-tab-create' => 'toggleStructureTabCreate',
        'close-structure-tab-create' => 'closeStructureTabCreate',

        'toggle-structure-tab-update' => 'toggleStructureTabUpdate',
        'close-structure-tab-update' => 'closeStructureTabUpdate',

        'toggle-structure-tab-view' => 'toggleStructureTabView',
        'close-structure-tab-view' => 'closeStructureTabView',

        'toggle-human-remain-card-create' => 'toggleHumanRemainCardCreate',
        'close-human-remain-card-create' => 'closeHumanRemainCardCreate',

        'toggle-human-remain-card-update' => 'toggleHumanRemainCardUpdate',
        'close-human-remain-card-update' => 'closeHumanRemainCardUpdate',

        'toggle-human-remain-card-view' => 'toggleHumanRemainCardView',
        'close-human-remain-card-view' => 'closeHumanRemainCardView',

        'close-all' => 'closeAll',
    ];

    public function toggle(){
        $this->showCreateFieldWork = !$this->showCreateFieldWork;
        if($this->showCreateFieldWork){
            $this->closeView();
            $this->closeUpdate();
            $this->closeUeView();
        }

    }

    public function seleccionarComponente($componente)
    {
        $this->closeAll();
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
            $this->closeUpdate();
            $this->closeUeView();
        }

    }

    public function closeView(){
        $this->showViewFieldWork = false;
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

        if($this->showUpdateFieldWork){
            $this->closeView();
            $this->closeForm();
            $this->closeUeView();
        }
    }

    public function closeUpdate(){
        $this->showUpdateFieldWork = false;
    }

    public function toggleUeCreate(){
        if(!$this->showCreateUe){
            $this->showCreateUe = !$this->showCreateUe;
        }

        if($this->showCreateUe){
            $this->closeView();
            $this->closeForm();
            $this->closeUpdate();
            $this->closeUeView();
        }
    }

    public function closeUeCreate(){
        $this->showCreateUe = false;
    }

    public function toggleUeUpdate($ueId){
        $this->ueId = $ueId;
        if(!$this->showUpdateUe){
            $this->showUpdateUe = !$this->showUpdateUe;
        }

        if($this->showUpdateUe){
            $newId = $ueId;
            $this->dispatch('updateUeId', $newId);
            $this->closeView();
            $this->closeForm();
            $this->closeUpdate();
            $this->closeUeView();
        }
    }

    public function closeUeUpdate(){
        $this->showUpdateUe = false;
    }

    public function toggleUeView($ueId){
        $this->ueId = $ueId;
        if(!$this->showViewUe){
            $this->showViewUe = !$this->showViewUe;
        }

        if($this->showViewUe){
            $newId = $ueId;
            $this->dispatch('updateViewUeId', $newId);
            $this->closeView();
            $this->closeForm();
            $this->closeUpdate();
            $this->closeUeUpdate();
        }
    }

    public function closeUeView(){
        $this->showViewUe = false;
    }

    public function toggleStratumCardUpdate($stratumCardId){
        $this->stratumCardId = $stratumCardId;
        if(!$this->showUpdateStratumCard){
            $this->showUpdateStratumCard = !$this->showUpdateStratumCard;
        }

        if($this->showUpdateStratumCard){
            $newId = $stratumCardId;
            $this->dispatch('updateStratumCardId', $newId);
            $this->closeView();
            $this->closeForm();
            $this->closeUpdate();
            $this->closeUeView();
            $this->closeUeCreate();
            $this->closeStratumCardCreate();
            $this->closeStratumCardView();
        }
    }

    public function closeStratumCardUpdate(){
        $this->showUpdateStratumCard = false;
    }

    public function toggleStratumCardView($stratumCardId){
        $this->stratumCardId = $stratumCardId;
        if(!$this->showViewStratumCard){
            $this->showViewStratumCard = !$this->showViewStratumCard;
        }

        if($this->showViewStratumCard){
            $newId = $stratumCardId;
            $this->dispatch('viewStratumCardId', $newId);
            $this->closeView();
            $this->closeForm();
            $this->closeUpdate();
            $this->closeUeView();
            $this->closeUeCreate();
            $this->closeStratumCardCreate();
            $this->closeStratumCardUpdate();
        }
    }

    public function closeStratumCardView(){
        $this->showViewStratumCard = false;
    }

    public function toggleStratumCardCreate(){
        if(!$this->showCreateStratumCard){
            $this->showCreateStratumCard = !$this->showCreateStratumCard;
        }

        if($this->showCreateStratumCard){
            $this->closeView();
            $this->closeForm();
            $this->closeUpdate();
            $this->closeUeCreate();
            $this->closeUeView();
        }
    }

    public function toggleStructureTabCreate(){
        if(!$this->showCreateStructureTab){
            $this->showCreateStructureTab = !$this->showCreateStructureTab;
        }

        if($this->showCreateStructureTab){
            $this->closeView();
            $this->closeForm();
            $this->closeUpdate();
            $this->closeUeCreate();
            $this->closeUeView();
            $this->closeStratumCardCreate();
        }
    }

    public function closeStructureTabCreate(){
        $this->showCreateStructureTab = false;
    }

    public function toggleStructureTabUpdate($structureTabId){
        $this->structureTabId = $structureTabId;
        if(!$this->showUpdateStructureTab){
            $this->showUpdateStructureTab = !$this->showUpdateStructureTab;
        }

        if($this->showUpdateStructureTab){
            $newId = $structureTabId;
            $this->dispatch('updateStructureTabId', $newId);
            $this->closeView();
            $this->closeForm();
            $this->closeUpdate();
            $this->closeUeCreate();
            $this->closeUeView();
            $this->closeStratumCardCreate();
            $this->closeStructureTabCreate();
        }
    }

    public function closeStructureTabUpdate(){
        $this->showUpdateStructureTab = false;
    }

    public function toggleStructureTabView($structureTabId){
        $this->structureTabId = $structureTabId;
        if(!$this->showViewStructureTab){
            $this->showViewStructureTab = !$this->showViewStructureTab;
        }

        if($this->showViewStructureTab){
            $newId = $structureTabId;
            $this->dispatch('viewStructureTabId', $newId);
            $this->closeView();
            $this->closeForm();
            $this->closeUpdate();
            $this->closeUeView();
            $this->closeUeCreate();
            $this->closeStratumCardCreate();
            $this->closeStratumCardUpdate();

            $this->closeStructureTabCreate();
            $this->closeStructureTabUpdate();

        }
    }

    public function closeStructureTabView(){
        $this->showViewStructureTab = false;
    }

    public function toggleHumanRemainCardCreate(){
        if(!$this->showCreateHumanRemainCard){
            $this->showCreateHumanRemainCard = !$this->showCreateHumanRemainCard;
        }

        if($this->showCreateHumanRemainCard){
            $this->closeView();
            $this->closeForm();
            $this->closeUpdate();
            $this->closeUeCreate();
            $this->closeUeView();
            $this->closeStratumCardCreate();
        }
    }

    public function closeHumanRemainCardCreate(){
        $this->showCreateHumanRemainCard = false;
    }

    public function closeStratumCardCreate(){
        $this->showCreateStratumCard = false;
    }

    public function toggleHumanRemainCardUpdate($humanRemainCardId){
        $this->humanRemainCardId = $humanRemainCardId;
        if(!$this->showUpdateHumanRemainCard){
            $this->showUpdateHumanRemainCard = !$this->showUpdateHumanRemainCard;
        }

        if($this->showUpdateHumanRemainCard){
            $newId = $humanRemainCardId;
            $this->dispatch('updateHumanRemainCardId', $newId);
            $this->closeView();
            $this->closeForm();
            $this->closeUpdate();
            $this->closeUeCreate();
            $this->closeUeView();
            $this->closeStratumCardCreate();
            $this->closeStructureTabCreate();
            $this->closeHumanRemainCardCreate();
        }
    }

    public function closeHumanRemainCardUpdate(){
        $this->showUpdateHumanRemainCard = false;
    }

    public function toggleHumanRemainCardView($humanRemainCardId){
        $this->humanRemainCardId = $humanRemainCardId;
        if(!$this->showViewHumanRemainCard){
            $this->showViewHumanRemainCard = !$this->showViewHumanRemainCard;
        }

        if($this->showViewHumanRemainCard){
            $newId = $humanRemainCardId;
            $this->dispatch('viewHumanRemainCardId', $newId);
            $this->closeView();
            $this->closeForm();
            $this->closeUpdate();
            $this->closeUeCreate();
            $this->closeUeView();
            $this->closeStratumCardCreate();
            $this->closeStructureTabCreate();
            $this->closeHumanRemainCardCreate();
            $this->closeHumanRemainCardUpdate();
        }
    }

    public function closeHumanRemainCardView(){
        $this->showViewHumanRemainCard = false;
    }

    public function closeAll(){
        $this->closeView();
        $this->closeForm();
        $this->closeUpdate();

        $this->closeUeUpdate();
        $this->closeUeView();
        $this->closeUeCreate();

        $this->closeStratumCardCreate();
        $this->closeStratumCardUpdate();
        $this->closeStratumCardView();

        $this->closeStructureTabCreate();
        $this->closeStructureTabUpdate();
        $this->closeStructureTabView();
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
