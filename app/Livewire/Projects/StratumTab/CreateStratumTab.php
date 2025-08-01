<?php

namespace App\Livewire\Projects\StratumTab;

use App\Http\Requests\StoreStratumCardRequest;
use App\Models\Project;
use App\Models\StratumCard;
use App\Models\StratumCardMeta;
use App\Models\StratumQuotes;
use App\Models\StructureQuote;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateStratumTab extends Component
{
    use WithFileUploads;

    public $enableUe = true;

    public $stratumCard;

    public $project_id;
    public $i_date, $i_n_ue, $i_location_intervention, $i_acronym, $i_fact;

    public $i_provisional_dating, $i_stratigraphic_reliability, $i_type, $preservation, $interpretation;
    public $fine_fraction, $coarse_fraction, $interpretation_description;
    public $organic_composition, $inorganic_composition;

    public $stratigraphy_equals, $stratigraphy_support_provided, $stratigraphy_covered_by, $stratigraphy_filling_by;
    public $stratigraphy_cut_by, $stratigraphy_equivale, $stratigraphy_supported_by, $stratigraphy_overlaps_or_covers;
    public $stratigraphy_fill_in, $stratigraphy_cut_to, $comment, $description;
    public $volume_material, $material_romano_iberico, $material_romano_campaniense_a;
    public $material_romano_campaniense_b, $material_romano_beoboide, $material_romano_barniz_negro_g;
    public $material_romano_lucernas, $material_romano_paredes_finas, $material_romano_anfora_italica;
    public $material_romano_anforas_genericas, $material_romano_ceramica_gris, $material_romano_ceramica_cocina_g;
    public $material_romano_ceramica_comun_a, $material_romano_ceramica_comun_m;

    public $material_islamico_verde_manganeso, $material_islamico_cuerda_seca_total, $material_islamico_ceramica_dorada,
        $material_islamico_cuerda_seca_parcial, $material_islamico_bicromas, $material_islamico_esgrafiada;
    public $material_islamico_monocromas, $material_islamico_ceramica_comun, $material_islamico_ceramica_cocina,
        $material_islamico_cantaros_tinajas, $material_islamico_candiles, $material_islamico_arcaduces, $material_islamico_azulejos_alicatados;

    public $material_contem_pisa, $material_contem_porcelana, $material_contem_ceramica_cocina, $material_contem_ceramica_comun_g,
        $material_contem_azulejos_g, $material_contem_pavimento_hidra;

    public $recovered_romano_i_terra_sa, $recovered_romano_i_terra_ss, $recovered_romano_i_terra_sh, $recovered_romano_i_terra_sca,
        $recovered_romano_i_terra_scb, $recovered_romano_i_lucernas, $recovered_romano_i_paredes_finas;

    public $recovered_romano_i_anfora_hispanica, $recovered_romano_i_anfora_africana, $recovered_romano_i_anfora_genericas,
        $recovered_romano_i_ceramica_cocina, $recovered_romano_i_ceramica_comun_afr, $recovered_romano_i_ceramica_comun_mesa_g;

    public $recovered_bajomedieval_ceramica_gris, $recovered_bajomedieval_verde_manganeso, $recovered_bajomedieval_ceramica_azul,
        $recovered_bajomedieval_ceramica_dorada, $recovered_bajomedieval_monocroma, $recovered_bajomedieval_ceramica_comun_g;

    public $recovered_bajomedieval_azul_dorada, $recovered_bajomedieval_ceramica_cocina, $recovered_bajomedieval_candiles,
        $recovered_bajomedieval_cantaros_tinajas, $recovered_bajomedieval_arcaduces, $recovered_bajomedieval_azulejos_alicatados;

    public $recovered_om_vidrio, $recovered_om_hueso_trabajado, $recovered_om_material_const, $recovered_om_pinturas_murales,
        $recovered_om_yeserias, $recovered_om_metales, $recovered_om_monedas, $recovered_om_conducciones_hidra, $recovered_om_piedra_trabajada;

    public $stratum_romano_t_sigilata_clara_c, $stratum_romano_t_sigilata_clara_b, $stratum_romano_t_derivada_sigilata_p, $stratum_romano_t_otras_ceramicas_f,
        $stratum_romano_t_lucernas, $stratum_romano_t_anfora_africana, $stratum_romano_t_anfora_oriental, $stratum_romano_t_anfora_genericas,
        $stratum_romano_t_ceramica_cocina_a, $stratum_romano_t_ceramica_comun_imp;

    public $stratum_modern_ceramica_azul, $stratum_modern_ceramica_alcora, $stratum_modern_ceramica_dorada, $stratum_modern_ceramica_cocina,
        $stratum_modern_ceramica_comun, $stratum_modern_azulejos_alica;

    public $sketch;
    public $interpretation_file;
    public $quotes = [];
    public $maxQuotes = 5;
    public array $photos = [];

    public function addQuote()
    {
        if (count($this->quotes) < $this->maxQuotes) {
            $this->quotes[] = [
                'surface' => '',
                'information' => '',
            ];
        } else {
            session()->flash('error', 'Se ha alcanzado el límite máximo de ' . $this->maxQuotes . ' quotes.');
        }
    }

    public function removeQuote($index)
    {
        unset($this->quotes[$index]);
        $this->quotes = array_values($this->quotes); // Reindexar el array para evitar problemas con Livewire
    }

    public function mount(string $projectId)
    {
        $this->project_id = $projectId;
        $ueNext = Project::find($projectId)->ueNext();
        if($ueNext){
            $this->enableUe = false;
            $this->i_n_ue = $ueNext;
        }
    }

    public function rules(){
        return (new StoreStratumCardRequest())->rules();
    }

    public function saveStratumCard(){
        $this->validate();

        $stratumCard = new StratumCard();
        $stratumCard->i_date = $this->i_date;
        $ueNext = Project::find($this->project_id)->ueNext();
        if($ueNext > 0){
            $stratumCard->i_n_ue = $ueNext;
        } else {
            $stratumCard->i_n_ue = $this->i_n_ue;
        }

        $stratumCard->i_location_intervention = $this->i_location_intervention;
        $stratumCard->i_acronym = $this->i_acronym;
        $stratumCard->i_fact = $this->i_fact;
        $stratumCard->i_provisional_dating = $this->i_provisional_dating;
        $stratumCard->i_stratigraphic_reliability = $this->i_stratigraphic_reliability;
        $stratumCard->i_type = $this->i_type;
        $stratumCard->conservation = $this->preservation;
        $stratumCard->interpretation = $this->interpretation;
        $stratumCard->fine_fraction = $this->fine_fraction;
        $stratumCard->coarse_fraction = $this->coarse_fraction;
        $stratumCard->interpretation_description = $this->interpretation_description;
        $stratumCard->organic_composition = $this->organic_composition;
        $stratumCard->inorganic_composition = $this->inorganic_composition;
        $stratumCard->stratigraphy_equals = $this->stratigraphy_equals;
        $stratumCard->stratigraphy_support_provided = $this->stratigraphy_support_provided;
        $stratumCard->stratigraphy_covered_by = $this->stratigraphy_covered_by;
        $stratumCard->stratigraphy_filling_by = $this->stratigraphy_filling_by;
        $stratumCard->stratigraphy_cut_by = $this->stratigraphy_cut_by;
        $stratumCard->stratigraphy_equivale = $this->stratigraphy_equivale;
        $stratumCard->stratigraphy_supported_by = $this->stratigraphy_supported_by;
        $stratumCard->stratigraphy_overlaps_or_covers = $this->stratigraphy_overlaps_or_covers;
        $stratumCard->stratigraphy_fill_in = $this->stratigraphy_fill_in;
        $stratumCard->stratigraphy_cut_to = $this->stratigraphy_cut_to;
        $stratumCard->comment = $this->comment;
        $stratumCard->volume_of_material = $this->volume_material;
        $stratumCard->description = $this->description;


        $stratumCard->project_id = $this->project_id;
        $stratumCard->user_id = Auth::id();

        if($stratumCard->save()){
            $this->createMeta($stratumCard);

            foreach ($this->quotes as $quote){
                $q = StratumQuotes::create([
                    'surface' => $quote['surface'],
                    'information' => $quote['information'],
                    'stratum_card_id' => $stratumCard->id,
                ]);
            }

            if($this->interpretation_file){
                $dirInterpretacion = $stratumCard->urlInterpretacionFileAttribute();
                $interpretacionExists = Storage::disk("wasabi")->exists($dirInterpretacion);
                if (!$interpretacionExists) {
                    Storage::disk('wasabi')->makeDirectory($dirInterpretacion);
                } else {
                    Storage::disk('wasabi')->deleteDirectory($dirInterpretacion);
                    Storage::disk('wasabi')->makeDirectory($dirInterpretacion);
                }

                $nombreOriginal = $this->sketch->getClientOriginalName();
                $extension = $this->sketch->getClientOriginalExtension();
                $nombreSanitizado = Str::slug(pathinfo($nombreOriginal, PATHINFO_FILENAME)) . '.' . $extension;
                $path = $this->sketch->storeAs($dirInterpretacion, $nombreSanitizado, 'wasabi');
                Log::info('Wasabi archivo subido interpretacion::: ' . $path);
            }

            if($this->sketch){
                $dirCroquis = $stratumCard->urlCroquisAttribute();
                $sketcheExists = Storage::disk("wasabi")->exists($dirCroquis);
                if (!$sketcheExists) {
                    Storage::disk('wasabi')->makeDirectory($dirCroquis);
                } else {
                    Storage::disk('wasabi')->deleteDirectory($dirCroquis);
                    Storage::disk('wasabi')->makeDirectory($dirCroquis);
                }

                $nombreOriginal = $this->sketch->getClientOriginalName();
                $extension = $this->sketch->getClientOriginalExtension();
                $nombreSanitizado = Str::slug(pathinfo($nombreOriginal, PATHINFO_FILENAME)) . '.' . $extension;
                $path = $this->sketch->storeAs($dirCroquis, $nombreSanitizado, 'wasabi');
                Log::info('Wasabi archivo subido croquis::: ' . $path);
            }

            $dirPhotos = $stratumCard->urlPhotosAttribute();
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

            $this->dispatch('lscClearSearch');
            $this->dispatch('close-stratum-card-create');
            $this->dispatch('show_alert', type: 'success', message: 'La Ficha de estrato se creo exitosamente.');
        }
    }

    private function createMeta(StratumCard $stratumCard){
        $stratumCardExtra = new StratumCardMeta();
        $stratumCardExtra->stratum_card_id = $stratumCard->id;
        $stratumCardExtra->material_romano_iberico = $this->material_romano_iberico;
        $stratumCardExtra->material_romano_campaniense_a = $this->material_romano_campaniense_a;
        $stratumCardExtra->material_romano_campaniense_b = $this->material_romano_campaniense_b;
        $stratumCardExtra->material_romano_beoboide = $this->material_romano_beoboide;
        $stratumCardExtra->material_romano_barniz_negro_g = $this->material_romano_barniz_negro_g;
        $stratumCardExtra->material_romano_lucernas = $this->material_romano_lucernas;
        $stratumCardExtra->material_romano_paredes_finas = $this->material_romano_paredes_finas;
        $stratumCardExtra->material_romano_anfora_italica = $this->material_romano_anfora_italica;
        $stratumCardExtra->material_romano_anforas_genericas = $this->material_romano_anforas_genericas;
        $stratumCardExtra->material_romano_ceramica_gris = $this->material_romano_ceramica_gris;
        $stratumCardExtra->material_romano_ceramica_cocina_g = $this->material_romano_ceramica_cocina_g;
        $stratumCardExtra->material_romano_ceramica_comun_a = $this->material_romano_ceramica_comun_a;
        $stratumCardExtra->material_romano_ceramica_comun_m = $this->material_romano_ceramica_comun_m;

        $stratumCardExtra->material_islamico_verde_manganeso = $this->material_islamico_verde_manganeso;
        $stratumCardExtra->material_islamico_cuerda_seca_total = $this->material_islamico_cuerda_seca_total;
        $stratumCardExtra->material_islamico_ceramica_dorada = $this->material_islamico_ceramica_dorada;
        $stratumCardExtra->material_islamico_bicromas = $this->material_islamico_bicromas;
        $stratumCardExtra->material_islamico_cuerda_seca_parcial = $this->material_islamico_cuerda_seca_parcial;
        $stratumCardExtra->material_islamico_esgrafiada = $this->material_islamico_esgrafiada;
        $stratumCardExtra->material_islamico_monocromas = $this->material_islamico_monocromas;
        $stratumCardExtra->material_islamico_ceramica_comun = $this->material_islamico_ceramica_comun;
        $stratumCardExtra->material_islamico_ceramica_cocina = $this->material_islamico_ceramica_cocina;
        $stratumCardExtra->material_islamico_candiles = $this->material_islamico_candiles;
        $stratumCardExtra->material_islamico_cantaros_tinajas = $this->material_islamico_cantaros_tinajas;
        $stratumCardExtra->material_islamico_arcaduces = $this->material_islamico_arcaduces;
        $stratumCardExtra->material_islamico_azulejos_alicatados = $this->material_islamico_azulejos_alicatados;

        $stratumCardExtra->material_contem_pisa = $this->material_contem_pisa;
        $stratumCardExtra->material_contem_porcelana = $this->material_contem_porcelana;
        $stratumCardExtra->material_contem_ceramica_cocina = $this->material_contem_ceramica_cocina;
        $stratumCardExtra->material_contem_ceramica_comun_g = $this->material_contem_ceramica_comun_g;
        $stratumCardExtra->material_contem_azulejos_g = $this->material_contem_azulejos_g;
        $stratumCardExtra->material_contem_pavimento_hidra = $this->material_contem_pavimento_hidra;

        $stratumCardExtra->recovered_romano_i_terra_sa = $this->recovered_romano_i_terra_sa;
        $stratumCardExtra->recovered_romano_i_terra_ss = $this->recovered_romano_i_terra_ss;
        $stratumCardExtra->recovered_romano_i_terra_sh = $this->recovered_romano_i_terra_sh;
        $stratumCardExtra->recovered_romano_i_terra_sca = $this->recovered_romano_i_terra_sca;
        $stratumCardExtra->recovered_romano_i_terra_scb = $this->recovered_romano_i_terra_scb;
        $stratumCardExtra->recovered_romano_i_lucernas = $this->recovered_romano_i_lucernas;
        $stratumCardExtra->recovered_romano_i_paredes_finas = $this->recovered_romano_i_paredes_finas;
        $stratumCardExtra->recovered_romano_i_anfora_hispanica = $this->recovered_romano_i_anfora_hispanica;
        $stratumCardExtra->recovered_romano_i_anfora_africana = $this->recovered_romano_i_anfora_africana;
        $stratumCardExtra->recovered_romano_i_anfora_genericas = $this->recovered_romano_i_anfora_genericas;
        $stratumCardExtra->recovered_romano_i_ceramica_cocina = $this->recovered_romano_i_ceramica_cocina;
        $stratumCardExtra->recovered_romano_i_ceramica_comun_afr = $this->recovered_romano_i_ceramica_comun_afr;
        $stratumCardExtra->recovered_romano_i_ceramica_comun_mesa_g = $this->recovered_romano_i_ceramica_comun_mesa_g;

        $stratumCardExtra->recovered_bajomedieval_ceramica_gris = $this->recovered_bajomedieval_ceramica_gris;
        $stratumCardExtra->recovered_bajomedieval_verde_manganeso = $this->recovered_bajomedieval_verde_manganeso;
        $stratumCardExtra->recovered_bajomedieval_ceramica_azul = $this->recovered_bajomedieval_ceramica_azul;
        $stratumCardExtra->recovered_bajomedieval_ceramica_dorada = $this->recovered_bajomedieval_ceramica_dorada;
        $stratumCardExtra->recovered_bajomedieval_azul_dorada = $this->recovered_bajomedieval_azul_dorada;
        $stratumCardExtra->recovered_bajomedieval_monocroma = $this->recovered_bajomedieval_monocroma;
        $stratumCardExtra->recovered_bajomedieval_ceramica_comun_g = $this->recovered_bajomedieval_ceramica_comun_g;
        $stratumCardExtra->recovered_bajomedieval_ceramica_cocina = $this->recovered_bajomedieval_ceramica_cocina;
        $stratumCardExtra->recovered_bajomedieval_candiles = $this->recovered_bajomedieval_candiles;
        $stratumCardExtra->recovered_bajomedieval_cantaros_tinajas = $this->recovered_bajomedieval_cantaros_tinajas;
        $stratumCardExtra->recovered_bajomedieval_arcaduces = $this->recovered_bajomedieval_arcaduces;
        $stratumCardExtra->recovered_bajomedieval_azulejos_alicatados = $this->recovered_bajomedieval_azulejos_alicatados;

        $stratumCardExtra->recovered_om_vidrio = $this->recovered_om_vidrio;
        $stratumCardExtra->recovered_om_hueso_trabajado = $this->recovered_om_hueso_trabajado;
        $stratumCardExtra->recovered_om_material_const = $this->recovered_om_material_const;
        $stratumCardExtra->recovered_om_pinturas_murales = $this->recovered_om_pinturas_murales;
        $stratumCardExtra->recovered_om_yeserias = $this->recovered_om_yeserias;
        $stratumCardExtra->recovered_om_metales = $this->recovered_om_metales;
        $stratumCardExtra->recovered_om_monedas = $this->recovered_om_monedas;
        $stratumCardExtra->recovered_om_conducciones_hidra = $this->recovered_om_conducciones_hidra;
        $stratumCardExtra->recovered_om_piedra_trabajada = $this->recovered_om_piedra_trabajada;

        $stratumCardExtra->stratum_romano_t_sigilata_clara_b = $this->stratum_romano_t_sigilata_clara_b;
        $stratumCardExtra->stratum_romano_t_sigilata_clara_c = $this->stratum_romano_t_sigilata_clara_c;
        $stratumCardExtra->stratum_romano_t_derivada_sigilata_p = $this->stratum_romano_t_derivada_sigilata_p;
        $stratumCardExtra->stratum_romano_t_otras_ceramicas_f = $this->stratum_romano_t_otras_ceramicas_f;
        $stratumCardExtra->stratum_romano_t_lucernas = $this->stratum_romano_t_lucernas;
        $stratumCardExtra->stratum_romano_t_anfora_africana = $this->stratum_romano_t_anfora_africana;
        $stratumCardExtra->stratum_romano_t_anfora_oriental = $this->stratum_romano_t_anfora_oriental;
        $stratumCardExtra->stratum_romano_t_anfora_genericas = $this->stratum_romano_t_anfora_genericas;
        $stratumCardExtra->stratum_romano_t_ceramica_cocina_a = $this->stratum_romano_t_ceramica_cocina_a;
        $stratumCardExtra->stratum_romano_t_ceramica_comun_imp = $this->stratum_romano_t_ceramica_comun_imp;

        $stratumCardExtra->stratum_modern_ceramica_azul = $this->stratum_modern_ceramica_azul;
        $stratumCardExtra->stratum_modern_ceramica_dorada = $this->stratum_modern_ceramica_dorada;
        $stratumCardExtra->stratum_modern_ceramica_alcora = $this->stratum_modern_ceramica_alcora;
        $stratumCardExtra->stratum_modern_ceramica_cocina = $this->stratum_modern_ceramica_cocina;
        $stratumCardExtra->stratum_modern_ceramica_comun = $this->stratum_modern_ceramica_comun;
        $stratumCardExtra->stratum_modern_azulejos_alica = $this->stratum_modern_azulejos_alica;
        $stratumCardExtra->save();

    }
    public function render()
    {
        return view('livewire.projects.stratum-tab.create-stratum-tab');
    }
}
