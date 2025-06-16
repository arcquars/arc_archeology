<?php

namespace App\Livewire\Projects\HumanRemainsCard;

use App\Http\Requests\StoreHumanRemainRequest;
use App\Models\HumanRemainCard;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateHumanRemainsCard extends Component
{
    use WithFileUploads;

    public $enableUe = true;

    public $humanRemainCard;

    public $project_id;
    public $intervention, $location, $ue, $fact, $type_inhumation, $type_cremation;

    public $associated_with, $description, $deposition_primary = false, $deposition_secondary = false, $deposition_ossuary = false, $conservation_partial_alterations = false,
        $conservation_good = false, $conservation_totally_altered = false, $context_undertaker = false, $context_secondary = false, $burial_single_grave = false, $burial_communal_grave = false;

    public $relationship_equals, $relationship_attached, $relationship_covered_by, $relationship_filling_by, $relationship_cut_by,
        $relationship_equivalent_to, $relationship_attached_to, $relationship_covers_to, $relationship_fill_to, $relationship_cut_to;

    public $periodization, $provisional_dating, $interpretation, $dates, $author;

    public $disposition_decubito_supino = false, $disposition_decubito_lateral_der = false, $disposition_decubito_lateral_izq = false;
    public $brazos_ext_largo_cuerpo_izq = false, $brazos_ext_largo_cuerpo_der = false, $brazos_sobre_pelvis_izq = false, $brazos_sobre_pelvis_der = false;
    public $brazos_sobre_pecho_izq = false, $brazos_sobre_pecho_der = false, $piernas_ext_izq = false, $piernas_ext_der = false, $piernas_semi_flex_izq = false, $piernas_semi_flex_der = false;
    public $piernas_flexionada_izq = false, $piernas_flexionada_der = false;
    public $deposito_adorno_per = false, $deposito_ceramica = false, $deposito_fauna = false, $deposito_semillas = false, $deposito_armamento = false;
    public $obs_antropologicas, $specify, $observations;

    public array $photos = [];

    public function mount(string $projectId)
    {
        $this->project_id = $projectId;
        $ueNext = Project::find($projectId)->ueNext();
        if($ueNext){
            $this->enableUe = false;
            $this->ue = $ueNext;
        }
    }

    public function rules(){
        return (new StoreHumanRemainRequest())->rules();
    }

    public function saveHumanRemain(){
        $validateData = $this->validate();

        $validateData['type_inhumation'] = $validateData['type_inhumation'] ?? false;
        $validateData['type_cremation'] = $validateData['type_cremation'] ?? false;

        $ueNext = Project::find($this->project_id)->ueNext();
        if($ueNext > 0){
            $validateData['ue'] = $ueNext;
        }

        $humanRemainCard = HumanRemainCard::create(array_merge($validateData, [
            'project_id' => $this->project_id,
            'user_id' => Auth::id()
        ]));

        $dirPhotos = $humanRemainCard->urlPhotosAttribute();
        $exists = Storage::disk("wasabi")->exists($dirPhotos);
        if (!$exists) {
            Storage::disk('wasabi')->makeDirectory($dirPhotos);
        }

        foreach ($this->photos as $file) {
            if ($file) {
                $nombreOriginal = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $nombreSanitizado = Str::slug(pathinfo($nombreOriginal, PATHINFO_FILENAME)) . '.' . $extension;
                $path = $file->storeAs($dirPhotos, $nombreSanitizado, 'wasabi');
                Log::info('Wasabi archivo subido fotografia::: ' . $path);
            }
        }

        $this->dispatch('human-remain-clear-search');
        $this->dispatch('close-human-remain-card-create');

        $this->dispatch('show_alert', type: 'success', message: 'Se creo la ficha de restos humanos');
    }

    public function render()
    {
        return view('livewire.projects.human-remains-card.create-human-remains-card');
    }
}
