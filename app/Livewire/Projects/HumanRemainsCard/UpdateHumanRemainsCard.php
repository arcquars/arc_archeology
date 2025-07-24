<?php

namespace App\Livewire\Projects\HumanRemainsCard;

use App\Http\Requests\StoreHumanRemainRequest;
use App\Models\HumanRemainCard;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateHumanRemainsCard extends Component
{
    use WithFileUploads;

    public HumanRemainCard $humanRemainCard;

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

    public ?UploadedFile $file_topographic = null, $file_photographic = null, $sketch = null, $preserved_part = null;

    protected $listeners = ['updateHumanRemainCardId'];

    public function updateHumanRemainCardId($newId){
        $this->load($newId);
    }

    public function rules(){
        return (new StoreHumanRemainRequest())->rules();
    }

    public function load(string $humanRemainCardId){
        $this->humanRemainCard = HumanRemainCard::find($humanRemainCardId);

        $this->project_id = $this->humanRemainCard->project_id;
        $this->intervention = $this->humanRemainCard->intervention;
        $this->location = $this->humanRemainCard->location;
        $this->ue = $this->humanRemainCard->ue;
        $this->fact = $this->humanRemainCard->fact;
        $this->type_inhumation = $this->humanRemainCard->type_inhumation;
        $this->type_cremation = $this->humanRemainCard->type_cremation;

        $this->type_inhumation = $this->humanRemainCard->type_inhumation;
        $this->type_cremation = $this->humanRemainCard->type_cremation;
        $this->associated_with = $this->humanRemainCard->associated_with;
        $this->description = $this->humanRemainCard->description;
        $this->deposition_primary = $this->humanRemainCard->deposition_primary;
        $this->deposition_secondary = $this->humanRemainCard->deposition_secondary;
        $this->deposition_ossuary = $this->humanRemainCard->deposition_ossuary;
        $this->context_undertaker = $this->humanRemainCard->context_undertaker;
        $this->context_secondary = $this->humanRemainCard->context_secondary;
        $this->conservation_good = $this->humanRemainCard->conservation_good;
        $this->conservation_partial_alterations = $this->humanRemainCard->conservation_partial_alterations;
        $this->conservation_totally_altered = $this->humanRemainCard->conservation_totally_altered;
        $this->burial_single_grave = $this->humanRemainCard->burial_single_grave;
        $this->burial_communal_grave = $this->humanRemainCard->burial_communal_grave;

        $this->relationship_equals = $this->humanRemainCard->relationship_equals;
        $this->relationship_attached = $this->humanRemainCard->relationship_attached;
        $this->relationship_covered_by = $this->humanRemainCard->relationship_covered_by;
        $this->relationship_filling_by = $this->humanRemainCard->relationship_filling_by;
        $this->relationship_cut_by = $this->humanRemainCard->relationship_cut_by;
        $this->relationship_equivalent_to = $this->humanRemainCard->relationship_equivalent_to;
        $this->relationship_attached_to = $this->humanRemainCard->relationship_attached_to;
        $this->relationship_covers_to = $this->humanRemainCard->relationship_covers_to;
        $this->relationship_fill_to = $this->humanRemainCard->relationship_fill_to;
        $this->relationship_cut_to = $this->humanRemainCard->relationship_cut_to;
        $this->interpretation = $this->humanRemainCard->interpretation;
        $this->periodization = $this->humanRemainCard->periodization;
        $this->provisional_dating = $this->humanRemainCard->provisional_dating;
        $this->dates = $this->humanRemainCard->dates;
        $this->author = $this->humanRemainCard->author;
        $this->description = $this->humanRemainCard->description;
        $this->disposition_decubito_supino = $this->humanRemainCard->disposition_decubito_supino;
        $this->disposition_decubito_lateral_der = $this->humanRemainCard->disposition_decubito_lateral_der;
        $this->disposition_decubito_lateral_izq = $this->humanRemainCard->disposition_decubito_lateral_izq;
        $this->deposito_adorno_per = $this->humanRemainCard->deposito_adorno_per;
        $this->deposito_ceramica = $this->humanRemainCard->deposito_ceramica;
        $this->deposito_armamento = $this->humanRemainCard->deposito_armamento;
        $this->deposito_fauna = $this->humanRemainCard->deposito_fauna;
        $this->deposito_semillas = $this->humanRemainCard->deposito_semillas;
        $this->brazos_ext_largo_cuerpo_izq = $this->humanRemainCard->brazos_ext_largo_cuerpo_izq;
        $this->brazos_ext_largo_cuerpo_der = $this->humanRemainCard->brazos_ext_largo_cuerpo_der;
        $this->brazos_sobre_pelvis_izq = $this->humanRemainCard->brazos_sobre_pelvis_izq;
        $this->brazos_sobre_pelvis_der = $this->humanRemainCard->brazos_sobre_pelvis_der;
        $this->brazos_sobre_pecho_izq = $this->humanRemainCard->brazos_sobre_pecho_izq;
        $this->brazos_sobre_pecho_der = $this->humanRemainCard->brazos_sobre_pecho_der;
        $this->piernas_ext_izq = $this->humanRemainCard->piernas_ext_izq;
        $this->piernas_ext_der = $this->humanRemainCard->piernas_ext_der;
        $this->piernas_semi_flex_izq = $this->humanRemainCard->piernas_semi_flex_izq;
        $this->piernas_semi_flex_der = $this->humanRemainCard->piernas_semi_flex_der;
        $this->piernas_flexionada_izq = $this->humanRemainCard->piernas_flexionada_izq;
        $this->piernas_flexionada_der = $this->humanRemainCard->piernas_flexionada_der;
        $this->obs_antropologicas = $this->humanRemainCard->obs_antropologicas;
        $this->specify = $this->humanRemainCard->specify;
        $this->observations = $this->humanRemainCard->observations;


    }

    public function mount(string $humanRemainCardId)
    {
        $this->load($humanRemainCardId);
    }

    public function updateHumanRemainCard()
    {
        $validatedData = $this->validate();
        $this->humanRemainCard->update($validatedData);

        if($this->humanRemainCard->save()){
            if ($this->file_topographic) {
                $dirTopographic = $this->humanRemainCard->urlFileTopographicAttribute();
                $exists = Storage::disk("wasabi")->exists($dirTopographic);
                if ($exists) {
                    $this->removeTopographies();
                }
                Storage::disk('wasabi')->makeDirectory($dirTopographic);

                $nombreOriginal = $this->file_topographic->getClientOriginalName();
                $extension = $this->file_topographic->getClientOriginalExtension();
                $nombreSanitizado = Str::slug(pathinfo($nombreOriginal, PATHINFO_FILENAME)) . '.' . $extension;
                $path = $this->file_topographic->storeAs($dirTopographic, $nombreSanitizado, 'wasabi');
                Log::info('Wasabi archivo subido fotografia::: ' . $path);
            }

            if ($this->file_photographic) {
                $dirPhotographic = $this->humanRemainCard->urlFilePhotographicAttribute();
                $exists = Storage::disk("wasabi")->exists($dirPhotographic);
                if ($exists) {
                    $this->removePhotographs();
                }
                Storage::disk('wasabi')->makeDirectory($dirPhotographic);

                $nombreOriginal = $this->file_photographic->getClientOriginalName();
                $extension = $this->file_photographic->getClientOriginalExtension();
                $nombreSanitizado = Str::slug(pathinfo($nombreOriginal, PATHINFO_FILENAME)) . '.' . $extension;
                $path = $this->file_photographic->storeAs($dirPhotographic, $nombreSanitizado, 'wasabi');
                Log::info('Wasabi archivo subido fotografia::: ' . $path);
            }

            if ($this->sketch) {
                $dirSketch = $this->humanRemainCard->urlSketchAttribute();
                $exists = Storage::disk("wasabi")->exists($dirSketch);
                if ($exists) {
                    $this->removeSketch();
                }
                Storage::disk('wasabi')->makeDirectory($dirSketch);

                $nombreOriginal = $this->sketch->getClientOriginalName();
                $extension = $this->sketch->getClientOriginalExtension();
                $nombreSanitizado = Str::slug(pathinfo($nombreOriginal, PATHINFO_FILENAME)) . '.' . $extension;
                $path = $this->sketch->storeAs($dirSketch, $nombreSanitizado, 'wasabi');
                Log::info('Wasabi archivo subido fotografia::: ' . $path);
            }

            if ($this->preserved_part) {
                $dirPreservedPart = $this->humanRemainCard->urlPreservedPartAttribute();
                $exists = Storage::disk("wasabi")->exists($dirPreservedPart);
                if ($exists) {
                    $this->removePreservedPart();
                }
                Storage::disk('wasabi')->makeDirectory($dirPreservedPart);
                $nombreOriginal = $this->preserved_part->getClientOriginalName();
                $extension = $this->preserved_part->getClientOriginalExtension();
                $nombreSanitizado = Str::slug(pathinfo($nombreOriginal, PATHINFO_FILENAME)) . '.' . $extension;
                $path = $this->preserved_part->storeAs($dirPreservedPart, $nombreSanitizado, 'wasabi');
                Log::info('Wasabi archivo subido fotografia::: ' . $path);
            }

            $this->dispatch('human-remain-clear-search');
            $this->dispatch('close-human-remain-card-update');

            $this->dispatch('show_alert', type: 'success', message: 'Se actualizo la ficha de restos humanos');
        }
    }

    public function removeTopographies(){
        $dirTopographies = $this->humanRemainCard->urlFileTopographicAttribute();
        Storage::disk('wasabi')->deleteDirectory($dirTopographies);
    }

    public function removePhotographs(){
        $dirPhotographs = $this->humanRemainCard->urlFilePhotographicAttribute();
        Storage::disk('wasabi')->deleteDirectory($dirPhotographs);
    }

    public function removeSketch(){
        $dirSketch = $this->humanRemainCard->urlSketchAttribute();
        Storage::disk('wasabi')->deleteDirectory($dirSketch);
    }

    public function removePreservedPart(){
        $dirPreserved = $this->humanRemainCard->urlPreservedPartAttribute();
        Storage::disk('wasabi')->deleteDirectory($dirPreserved);
    }

    public function render()
    {
        return view('livewire.projects.human-remains-card.update-human-remains-card');
    }
}
