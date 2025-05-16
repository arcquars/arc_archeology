<?php

namespace App\Livewire\Projects\FieldWork;

use App\Http\Requests\StoreMuralStratigraphyCardRequest;
use App\Models\MuralStratigraphyCard;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateFieldWork extends Component
{
    use WithFileUploads;

    public $projectId;
    public $msc_date;
    public $floor;
    public $stay;
    public $quadrant;
    public $crokis;

    public function mount(string $projectId)
    {
        $this->projectId = $projectId;
    }

    public function rules(){
        return (new StoreMuralStratigraphyCardRequest())->rules();
    }

    public function saveFieldWork(){
        $this->validate();

        $mural = new MuralStratigraphyCard();
        $mural->project_id = $this->projectId;
        $mural->msc_date = $this->msc_date;
        $mural->floor = $this->floor;
        $mural->quadrant = $this->quadrant;
        $mural->stay = $this->stay;

        if($mural->save()){
            $this->dispatch('closeCreateFieldWork');
        }
    }

    public function render()
    {
        return view('livewire.projects.field-work.create-field-work');
    }
}
