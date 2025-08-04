<?php

namespace App\Livewire\Projects\StratumTab;

use App\Http\Requests\StoreStratumCardRequest;
use App\Models\StratumCard;
use App\Models\StratumCardMeta;
use App\Models\StratumQuotes;
use App\Models\StructureQuote;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateStratumTab extends Component
{
    use WithFileUploads;

    public $stratumCard;

    public $croquisUrls = [];
    public $photoUrls = [];

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

    protected $listeners = ['updateStratumCardId'];

    public function updateStratumCardId($newId){
        $this->load($newId);
    }

    public function rules(){
        return (new StoreStratumCardRequest())->rules();
    }

    public function load(string $stratumCardId){
        $this->stratumCard = StratumCard::find($stratumCardId);

        $this->project_id = $this->stratumCard->project_id;
        $this->i_date = $this->stratumCard->i_date;
        $this->i_n_ue = $this->stratumCard->i_n_ue;
        $this->i_location_intervention = $this->stratumCard->i_location_intervention;
        $this->i_acronym = $this->stratumCard->i_acronym;
        $this->i_fact = $this->stratumCard->i_fact;
        $this->i_provisional_dating = $this->stratumCard->i_provisional_dating;
        $this->i_stratigraphic_reliability = $this->stratumCard->i_stratigraphic_reliability;
        $this->i_type = $this->stratumCard->i_type;
        $this->preservation = $this->stratumCard->conservation;
        $this->interpretation = $this->stratumCard->interpretation;
        $this->fine_fraction = $this->stratumCard->fine_fraction;
        $this->coarse_fraction = $this->stratumCard->coarse_fraction;
        $this->interpretation_description = $this->stratumCard->interpretation_description;
        $this->organic_composition = $this->stratumCard->organic_composition;
        $this->inorganic_composition = $this->stratumCard->inorganic_composition;
        $this->stratigraphy_equals = $this->stratumCard->stratigraphy_equals;
        $this->stratigraphy_support_provided = $this->stratumCard->stratigraphy_support_provided;
        $this->stratigraphy_covered_by = $this->stratumCard->stratigraphy_covered_by;
        $this->stratigraphy_filling_by = $this->stratumCard->stratigraphy_filling_by;
        $this->stratigraphy_cut_by = $this->stratumCard->stratigraphy_cut_by;
        $this->stratigraphy_equivale = $this->stratumCard->stratigraphy_equivale;
        $this->stratigraphy_supported_by = $this->stratumCard->stratigraphy_supported_by;
        $this->stratigraphy_overlaps_or_covers = $this->stratumCard->stratigraphy_overlaps_or_covers;
        $this->stratigraphy_fill_in = $this->stratumCard->stratigraphy_fill_in;
        $this->stratigraphy_cut_to = $this->stratumCard->stratigraphy_cut_to;
        $this->comment = $this->stratumCard->comment;
        $this->volume_material = $this->stratumCard->volume_material;
        $this->description = $this->stratumCard->description;

        $quotes = $this->stratumCard->quotes;
        foreach ($quotes as $quote){
            $this->addQuote($quote->id, $quote->surface, $quote->information, );
        }

        if($this->stratumCard->meta){
            $this->material_romano_iberico = $this->stratumCard->meta->material_romano_iberico;
            $this->material_romano_campaniense_a = $this->stratumCard->meta->material_romano_campaniense_a;
            $this->material_romano_campaniense_b = $this->stratumCard->meta->material_romano_campaniense_b;
            $this->material_romano_beoboide = $this->stratumCard->meta->material_romano_beoboide;
            $this->material_romano_barniz_negro_g = $this->stratumCard->meta->material_romano_barniz_negro_g;
            $this->material_romano_lucernas = $this->stratumCard->meta->material_romano_lucernas;
            $this->material_romano_paredes_finas = $this->stratumCard->meta->material_romano_paredes_finas;
            $this->material_romano_anfora_italica = $this->stratumCard->meta->material_romano_anfora_italica;
            $this->material_romano_anforas_genericas = $this->stratumCard->meta->material_romano_anforas_genericas;
            $this->material_romano_ceramica_gris = $this->stratumCard->meta->material_romano_ceramica_gris;
            $this->material_romano_ceramica_cocina_g = $this->stratumCard->meta->material_romano_ceramica_cocina_g;
            $this->material_romano_ceramica_comun_a = $this->stratumCard->meta->material_romano_ceramica_comun_a;
            $this->material_romano_ceramica_comun_m = $this->stratumCard->meta->material_romano_ceramica_comun_m;

            $this->material_islamico_verde_manganeso = $this->stratumCard->meta->material_islamico_verde_manganeso;
            $this->material_islamico_cuerda_seca_total = $this->stratumCard->meta->material_islamico_cuerda_seca_total;
            $this->material_islamico_ceramica_dorada = $this->stratumCard->meta->material_islamico_ceramica_dorada;
            $this->material_islamico_bicromas = $this->stratumCard->meta->material_islamico_bicromas;
            $this->material_islamico_cuerda_seca_parcial = $this->stratumCard->meta->material_islamico_cuerda_seca_parcial;
            $this->material_islamico_esgrafiada = $this->stratumCard->meta->material_islamico_esgrafiada;
            $this->material_islamico_monocromas = $this->stratumCard->meta->material_islamico_monocromas;
            $this->material_islamico_ceramica_comun = $this->stratumCard->meta->material_islamico_ceramica_comun;
            $this->material_islamico_ceramica_cocina = $this->stratumCard->meta->material_islamico_ceramica_cocina;
            $this->material_islamico_candiles = $this->stratumCard->meta->material_islamico_candiles;
            $this->material_islamico_cantaros_tinajas = $this->stratumCard->meta->material_islamico_cantaros_tinajas;
            $this->material_islamico_arcaduces = $this->stratumCard->meta->material_islamico_arcaduces;
            $this->material_islamico_azulejos_alicatados = $this->stratumCard->meta->material_islamico_azulejos_alicatados;

            $this->material_contem_pisa = $this->stratumCard->meta->material_contem_pisa;
            $this->material_contem_porcelana = $this->stratumCard->meta->material_contem_porcelana;
            $this->material_contem_ceramica_cocina = $this->stratumCard->meta->material_contem_ceramica_cocina;
            $this->material_contem_ceramica_comun_g = $this->stratumCard->meta->material_contem_ceramica_comun_g;
            $this->material_contem_azulejos_g = $this->stratumCard->meta->material_contem_azulejos_g;
            $this->material_contem_pavimento_hidra = $this->stratumCard->meta->material_contem_pavimento_hidra;

            $this->recovered_romano_i_terra_sa = $this->stratumCard->meta->recovered_romano_i_terra_sa;
            $this->recovered_romano_i_terra_ss = $this->stratumCard->meta->recovered_romano_i_terra_ss;
            $this->recovered_romano_i_terra_sh = $this->stratumCard->meta->recovered_romano_i_terra_sh;
            $this->recovered_romano_i_terra_sca = $this->stratumCard->meta->recovered_romano_i_terra_sca;
            $this->recovered_romano_i_terra_scb = $this->stratumCard->meta->recovered_romano_i_terra_scb;
            $this->recovered_romano_i_lucernas = $this->stratumCard->meta->recovered_romano_i_lucernas;
            $this->recovered_romano_i_paredes_finas = $this->stratumCard->meta->recovered_romano_i_paredes_finas;
            $this->recovered_romano_i_anfora_hispanica = $this->stratumCard->meta->recovered_romano_i_anfora_hispanica;
            $this->recovered_romano_i_anfora_africana = $this->stratumCard->meta->recovered_romano_i_anfora_africana;
            $this->recovered_romano_i_anfora_genericas = $this->stratumCard->meta->recovered_romano_i_anfora_genericas;
            $this->recovered_romano_i_ceramica_cocina = $this->stratumCard->meta->recovered_romano_i_ceramica_cocina;
            $this->recovered_romano_i_ceramica_comun_afr = $this->stratumCard->meta->recovered_romano_i_ceramica_comun_afr;
            $this->recovered_romano_i_ceramica_comun_mesa_g = $this->stratumCard->meta->recovered_romano_i_ceramica_comun_mesa_g;

            $this->recovered_bajomedieval_ceramica_gris = $this->stratumCard->meta->recovered_bajomedieval_ceramica_gris;
            $this->recovered_bajomedieval_verde_manganeso = $this->stratumCard->meta->recovered_bajomedieval_verde_manganeso;
            $this->recovered_bajomedieval_ceramica_azul = $this->stratumCard->meta->recovered_bajomedieval_ceramica_azul;
            $this->recovered_bajomedieval_ceramica_dorada = $this->stratumCard->meta->recovered_bajomedieval_ceramica_dorada;
            $this->recovered_bajomedieval_azul_dorada = $this->stratumCard->meta->recovered_bajomedieval_azul_dorada;
            $this->recovered_bajomedieval_monocroma = $this->stratumCard->meta->recovered_bajomedieval_monocroma;
            $this->recovered_bajomedieval_ceramica_comun_g = $this->stratumCard->meta->recovered_bajomedieval_ceramica_comun_g;
            $this->recovered_bajomedieval_ceramica_cocina = $this->stratumCard->meta->recovered_bajomedieval_ceramica_cocina;
            $this->recovered_bajomedieval_candiles = $this->stratumCard->meta->recovered_bajomedieval_candiles;
            $this->recovered_bajomedieval_cantaros_tinajas = $this->stratumCard->meta->recovered_bajomedieval_cantaros_tinajas;
            $this->recovered_bajomedieval_arcaduces = $this->stratumCard->meta->recovered_bajomedieval_arcaduces;
            $this->recovered_bajomedieval_azulejos_alicatados = $this->stratumCard->meta->recovered_bajomedieval_azulejos_alicatados;

            $this->recovered_om_vidrio = $this->stratumCard->meta->recovered_om_vidrio;
            $this->recovered_om_hueso_trabajado = $this->stratumCard->meta->recovered_om_hueso_trabajado;
            $this->recovered_om_material_const = $this->stratumCard->meta->recovered_om_material_const;
            $this->recovered_om_pinturas_murales = $this->stratumCard->meta->recovered_om_pinturas_murales;
            $this->recovered_om_yeserias = $this->stratumCard->meta->recovered_om_yeserias;
            $this->recovered_om_metales = $this->stratumCard->meta->recovered_om_metales;
            $this->recovered_om_monedas = $this->stratumCard->meta->recovered_om_monedas;
            $this->recovered_om_conducciones_hidra = $this->stratumCard->meta->recovered_om_conducciones_hidra;
            $this->recovered_om_piedra_trabajada = $this->stratumCard->meta->recovered_om_piedra_trabajada;

            $this->stratum_romano_t_sigilata_clara_b = $this->stratumCard->meta->stratum_romano_t_sigilata_clara_b;
            $this->stratum_romano_t_sigilata_clara_c = $this->stratumCard->meta->stratum_romano_t_sigilata_clara_c;
            $this->stratum_romano_t_derivada_sigilata_p = $this->stratumCard->meta->stratum_romano_t_derivada_sigilata_p;
            $this->stratum_romano_t_otras_ceramicas_f = $this->stratumCard->meta->stratum_romano_t_otras_ceramicas_f;
            $this->stratum_romano_t_lucernas = $this->stratumCard->meta->stratum_romano_t_lucernas;
            $this->stratum_romano_t_anfora_africana = $this->stratumCard->meta->stratum_romano_t_anfora_africana;
            $this->stratum_romano_t_anfora_oriental = $this->stratumCard->meta->stratum_romano_t_anfora_oriental;
            $this->stratum_romano_t_anfora_genericas = $this->stratumCard->meta->stratum_romano_t_anfora_genericas;
            $this->stratum_romano_t_ceramica_cocina_a = $this->stratumCard->meta->stratum_romano_t_ceramica_cocina_a;
            $this->stratum_romano_t_ceramica_comun_imp = $this->stratumCard->meta->stratum_romano_t_ceramica_comun_imp;

            $this->stratum_modern_ceramica_azul = $this->stratumCard->meta->stratum_modern_ceramica_azul;
            $this->stratum_modern_ceramica_dorada = $this->stratumCard->meta->stratum_modern_ceramica_dorada;
            $this->stratum_modern_ceramica_alcora = $this->stratumCard->meta->stratum_modern_ceramica_alcora;
            $this->stratum_modern_ceramica_cocina = $this->stratumCard->meta->stratum_modern_ceramica_cocina;
            $this->stratum_modern_ceramica_comun = $this->stratumCard->meta->stratum_modern_ceramica_comun;
            $this->stratum_modern_azulejos_alica = $this->stratumCard->meta->stratum_modern_azulejos_alica;
        }
    }

    public function addQuote($id, $surface, $information)
    {
        if (count($this->quotes) < $this->maxQuotes) {
            $this->quotes[] = [
                'id' => $id,
                'surface' => $surface,
                'information' => $information,
                'stratum_card_id' => $this->stratumCard->id
            ];
        }
    }

    public function removeQuote($index)
    {
        if(isset($this->quotes[$index]['id'])){
            $deleteRows = StratumQuotes::destroy($this->quotes[$index]['id']);
            if($deleteRows > 0){
                unset($this->quotes[$index]);
                $this->quotes = array_values($this->quotes); // Reindexar el array para evitar problemas con Livewire
            }
        } else {
            unset($this->quotes[$index]);
            $this->quotes = array_values($this->quotes); // Reindexar el array para evitar problemas con Livewire
        }
    }

    public function removeSketch(){
        $dirCroquis = $this->stratumCard->urlCroquisAttribute();
        Storage::disk('wasabi')->deleteDirectory($dirCroquis);
    }

    public function removeInterpretacionFile(){
        $dirInterpretacion = $this->stratumCard->urlInterpretacionFileAttribute();
        Storage::disk('wasabi')->deleteDirectory($dirInterpretacion);
    }

    public function removePhoto($url){
        Storage::disk('wasabi')->delete($url);
        $this->photoUrls = $this->stratumCard->urlPhotosPublicAttribute();
    }

    public function saveStratumCard(){
        if($this->stratumCard->meta){
            $this->stratumCard->meta->material_romano_iberico = $this->material_romano_iberico;
            $this->stratumCard->meta->material_romano_campaniense_a = $this->material_romano_campaniense_a;
            $this->stratumCard->meta->material_romano_campaniense_b = $this->material_romano_campaniense_b;
            $this->stratumCard->meta->material_romano_beoboide = $this->material_romano_beoboide;
            $this->stratumCard->meta->material_romano_barniz_negro_g = $this->material_romano_barniz_negro_g;
            $this->stratumCard->meta->material_romano_lucernas = $this->material_romano_lucernas;
            $this->stratumCard->meta->material_romano_paredes_finas = $this->material_romano_paredes_finas;
            $this->stratumCard->meta->material_romano_anfora_italica = $this->material_romano_anfora_italica;
            $this->stratumCard->meta->material_romano_anforas_genericas = $this->material_romano_anforas_genericas;
            $this->stratumCard->meta->material_romano_ceramica_gris = $this->material_romano_ceramica_gris;
            $this->stratumCard->meta->material_romano_ceramica_cocina_g = $this->material_romano_ceramica_cocina_g;
            $this->stratumCard->meta->material_romano_ceramica_comun_a = $this->material_romano_ceramica_comun_a;
            $this->stratumCard->meta->material_romano_ceramica_comun_m = $this->material_romano_ceramica_comun_m;

            $this->stratumCard->meta->material_islamico_verde_manganeso = $this->material_islamico_verde_manganeso;
            $this->stratumCard->meta->material_islamico_cuerda_seca_total = $this->material_islamico_cuerda_seca_total;
            $this->stratumCard->meta->material_islamico_ceramica_dorada = $this->material_islamico_ceramica_dorada;
            $this->stratumCard->meta->material_islamico_bicromas = $this->material_islamico_bicromas;
            $this->stratumCard->meta->material_islamico_cuerda_seca_parcial = $this->material_islamico_cuerda_seca_parcial;
            $this->stratumCard->meta->material_islamico_esgrafiada = $this->material_islamico_esgrafiada;
            $this->stratumCard->meta->material_islamico_monocromas = $this->material_islamico_monocromas;
            $this->stratumCard->meta->material_islamico_ceramica_comun = $this->material_islamico_ceramica_comun;
            $this->stratumCard->meta->material_islamico_ceramica_cocina = $this->material_islamico_ceramica_cocina;
            $this->stratumCard->meta->material_islamico_candiles = $this->material_islamico_candiles;
            $this->stratumCard->meta->material_islamico_cantaros_tinajas = $this->material_islamico_cantaros_tinajas;
            $this->stratumCard->meta->material_islamico_arcaduces = $this->material_islamico_arcaduces;
            $this->stratumCard->meta->material_islamico_azulejos_alicatados = $this->material_islamico_azulejos_alicatados;

            $this->stratumCard->meta->material_contem_pisa = $this->material_contem_pisa;
            $this->stratumCard->meta->material_contem_porcelana = $this->material_contem_porcelana;
            $this->stratumCard->meta->material_contem_ceramica_cocina = $this->material_contem_ceramica_cocina;
            $this->stratumCard->meta->material_contem_ceramica_comun_g = $this->material_contem_ceramica_comun_g;
            $this->stratumCard->meta->material_contem_azulejos_g = $this->material_contem_azulejos_g;
            $this->stratumCard->meta->material_contem_pavimento_hidra = $this->material_contem_pavimento_hidra;

            $this->stratumCard->meta->recovered_romano_i_terra_sa = $this->recovered_romano_i_terra_sa;
            $this->stratumCard->meta->recovered_romano_i_terra_ss = $this->recovered_romano_i_terra_ss;
            $this->stratumCard->meta->recovered_romano_i_terra_sh = $this->recovered_romano_i_terra_sh;
            $this->stratumCard->meta->recovered_romano_i_terra_sca = $this->recovered_romano_i_terra_sca;
            $this->stratumCard->meta->recovered_romano_i_terra_scb = $this->recovered_romano_i_terra_scb;
            $this->stratumCard->meta->recovered_romano_i_lucernas = $this->recovered_romano_i_lucernas;
            $this->stratumCard->meta->recovered_romano_i_paredes_finas = $this->recovered_romano_i_paredes_finas;
            $this->stratumCard->meta->recovered_romano_i_anfora_hispanica = $this->recovered_romano_i_anfora_hispanica;
            $this->stratumCard->meta->recovered_romano_i_anfora_africana = $this->recovered_romano_i_anfora_africana;
            $this->stratumCard->meta->recovered_romano_i_anfora_genericas = $this->recovered_romano_i_anfora_genericas;
            $this->stratumCard->meta->recovered_romano_i_ceramica_cocina = $this->recovered_romano_i_ceramica_cocina;
            $this->stratumCard->meta->recovered_romano_i_ceramica_comun_afr = $this->recovered_romano_i_ceramica_comun_afr;
            $this->stratumCard->meta->recovered_romano_i_ceramica_comun_mesa_g = $this->recovered_romano_i_ceramica_comun_mesa_g;

            $this->stratumCard->meta->recovered_bajomedieval_ceramica_gris = $this->recovered_bajomedieval_ceramica_gris;
            $this->stratumCard->meta->recovered_bajomedieval_verde_manganeso = $this->recovered_bajomedieval_verde_manganeso;
            $this->stratumCard->meta->recovered_bajomedieval_ceramica_azul = $this->recovered_bajomedieval_ceramica_azul;
            $this->stratumCard->meta->recovered_bajomedieval_ceramica_dorada = $this->recovered_bajomedieval_ceramica_dorada;
            $this->stratumCard->meta->recovered_bajomedieval_azul_dorada = $this->recovered_bajomedieval_azul_dorada;
            $this->stratumCard->meta->recovered_bajomedieval_monocroma = $this->recovered_bajomedieval_monocroma;
            $this->stratumCard->meta->recovered_bajomedieval_ceramica_comun_g = $this->recovered_bajomedieval_ceramica_comun_g;
            $this->stratumCard->meta->recovered_bajomedieval_ceramica_cocina = $this->recovered_bajomedieval_ceramica_cocina;
            $this->stratumCard->meta->recovered_bajomedieval_candiles = $this->recovered_bajomedieval_candiles;
            $this->stratumCard->meta->recovered_bajomedieval_cantaros_tinajas = $this->recovered_bajomedieval_cantaros_tinajas;
            $this->stratumCard->meta->recovered_bajomedieval_arcaduces = $this->recovered_bajomedieval_arcaduces;
            $this->stratumCard->meta->recovered_bajomedieval_azulejos_alicatados = $this->recovered_bajomedieval_azulejos_alicatados;

            $this->stratumCard->meta->recovered_om_vidrio = $this->recovered_om_vidrio;
            $this->stratumCard->meta->recovered_om_hueso_trabajado = $this->recovered_om_hueso_trabajado;
            $this->stratumCard->meta->recovered_om_material_const = $this->recovered_om_material_const;
            $this->stratumCard->meta->recovered_om_pinturas_murales = $this->recovered_om_pinturas_murales;
            $this->stratumCard->meta->recovered_om_yeserias = $this->recovered_om_yeserias;
            $this->stratumCard->meta->recovered_om_metales = $this->recovered_om_metales;
            $this->stratumCard->meta->recovered_om_monedas = $this->recovered_om_monedas;
            $this->stratumCard->meta->recovered_om_conducciones_hidra = $this->recovered_om_conducciones_hidra;
            $this->stratumCard->meta->recovered_om_piedra_trabajada = $this->recovered_om_piedra_trabajada;

            $this->stratumCard->meta->stratum_romano_t_sigilata_clara_b = $this->stratum_romano_t_sigilata_clara_b;
            $this->stratumCard->meta->stratum_romano_t_sigilata_clara_c = $this->stratum_romano_t_sigilata_clara_c;
            $this->stratumCard->meta->stratum_romano_t_derivada_sigilata_p = $this->stratum_romano_t_derivada_sigilata_p;
            $this->stratumCard->meta->stratum_romano_t_otras_ceramicas_f = $this->stratum_romano_t_otras_ceramicas_f;
            $this->stratumCard->meta->stratum_romano_t_lucernas = $this->stratum_romano_t_lucernas;
            $this->stratumCard->meta->stratum_romano_t_anfora_africana = $this->stratum_romano_t_anfora_africana;
            $this->stratumCard->meta->stratum_romano_t_anfora_oriental = $this->stratum_romano_t_anfora_oriental;
            $this->stratumCard->meta->stratum_romano_t_anfora_genericas = $this->stratum_romano_t_anfora_genericas;
            $this->stratumCard->meta->stratum_romano_t_ceramica_cocina_a = $this->stratum_romano_t_ceramica_cocina_a;
            $this->stratumCard->meta->stratum_romano_t_ceramica_comun_imp = $this->stratum_romano_t_ceramica_comun_imp;

            $this->stratumCard->meta->stratum_modern_ceramica_azul = $this->stratum_modern_ceramica_azul;
            $this->stratumCard->meta->stratum_modern_ceramica_dorada = $this->stratum_modern_ceramica_dorada;
            $this->stratumCard->meta->stratum_modern_ceramica_alcora = $this->stratum_modern_ceramica_alcora;
            $this->stratumCard->meta->stratum_modern_ceramica_cocina = $this->stratum_modern_ceramica_cocina;
            $this->stratumCard->meta->stratum_modern_ceramica_comun = $this->stratum_modern_ceramica_comun;
            $this->stratumCard->meta->stratum_modern_azulejos_alica = $this->stratum_modern_azulejos_alica;

            $this->stratumCard->meta->save();
        } else {
            $meta = new StratumCardMeta();

            $meta->stratum_card_id = $this->stratumCard->id;
            $meta->material_romano_iberico = $this->material_romano_iberico;
            $meta->material_romano_campaniense_a = $this->material_romano_campaniense_a;
            $meta->material_romano_campaniense_b = $this->material_romano_campaniense_b;
            $meta->material_romano_beoboide = $this->material_romano_beoboide;
            $meta->material_romano_barniz_negro_g = $this->material_romano_barniz_negro_g;
            $meta->material_romano_lucernas = $this->material_romano_lucernas;
            $meta->material_romano_paredes_finas = $this->material_romano_paredes_finas;
            $meta->material_romano_anfora_italica = $this->material_romano_anfora_italica;
            $meta->material_romano_anforas_genericas = $this->material_romano_anforas_genericas;
            $meta->material_romano_ceramica_gris = $this->material_romano_ceramica_gris;
            $meta->material_romano_ceramica_cocina_g = $this->material_romano_ceramica_cocina_g;
            $meta->material_romano_ceramica_comun_a = $this->material_romano_ceramica_comun_a;
            $meta->material_romano_ceramica_comun_m = $this->material_romano_ceramica_comun_m;

            $meta->material_islamico_verde_manganeso = $this->material_islamico_verde_manganeso;
            $meta->material_islamico_cuerda_seca_total = $this->material_islamico_cuerda_seca_total;
            $meta->material_islamico_ceramica_dorada = $this->material_islamico_ceramica_dorada;
            $meta->material_islamico_bicromas = $this->material_islamico_bicromas;
            $meta->material_islamico_cuerda_seca_parcial = $this->material_islamico_cuerda_seca_parcial;
            $meta->material_islamico_esgrafiada = $this->material_islamico_esgrafiada;
            $meta->material_islamico_monocromas = $this->material_islamico_monocromas;
            $meta->material_islamico_ceramica_comun = $this->material_islamico_ceramica_comun;
            $meta->material_islamico_ceramica_cocina = $this->material_islamico_ceramica_cocina;
            $meta->material_islamico_candiles = $this->material_islamico_candiles;
            $meta->material_islamico_cantaros_tinajas = $this->material_islamico_cantaros_tinajas;
            $meta->material_islamico_arcaduces = $this->material_islamico_arcaduces;
            $meta->material_islamico_azulejos_alicatados = $this->material_islamico_azulejos_alicatados;

            $meta->material_contem_pisa = $this->material_contem_pisa;
            $meta->material_contem_porcelana = $this->material_contem_porcelana;
            $meta->material_contem_ceramica_cocina = $this->material_contem_ceramica_cocina;
            $meta->material_contem_ceramica_comun_g = $this->material_contem_ceramica_comun_g;
            $meta->material_contem_azulejos_g = $this->material_contem_azulejos_g;
            $meta->material_contem_pavimento_hidra = $this->material_contem_pavimento_hidra;

            $meta->recovered_romano_i_terra_sa = $this->recovered_romano_i_terra_sa;
            $meta->recovered_romano_i_terra_ss = $this->recovered_romano_i_terra_ss;
            $meta->recovered_romano_i_terra_sh = $this->recovered_romano_i_terra_sh;
            $meta->recovered_romano_i_terra_sca = $this->recovered_romano_i_terra_sca;
            $meta->recovered_romano_i_terra_scb = $this->recovered_romano_i_terra_scb;
            $meta->recovered_romano_i_lucernas = $this->recovered_romano_i_lucernas;
            $meta->recovered_romano_i_paredes_finas = $this->recovered_romano_i_paredes_finas;
            $meta->recovered_romano_i_anfora_hispanica = $this->recovered_romano_i_anfora_hispanica;
            $meta->recovered_romano_i_anfora_africana = $this->recovered_romano_i_anfora_africana;
            $meta->recovered_romano_i_anfora_genericas = $this->recovered_romano_i_anfora_genericas;
            $meta->recovered_romano_i_ceramica_cocina = $this->recovered_romano_i_ceramica_cocina;
            $meta->recovered_romano_i_ceramica_comun_afr = $this->recovered_romano_i_ceramica_comun_afr;
            $meta->recovered_romano_i_ceramica_comun_mesa_g = $this->recovered_romano_i_ceramica_comun_mesa_g;

            $meta->recovered_bajomedieval_ceramica_gris = $this->recovered_bajomedieval_ceramica_gris;
            $meta->recovered_bajomedieval_verde_manganeso = $this->recovered_bajomedieval_verde_manganeso;
            $meta->recovered_bajomedieval_ceramica_azul = $this->recovered_bajomedieval_ceramica_azul;
            $meta->recovered_bajomedieval_ceramica_dorada = $this->recovered_bajomedieval_ceramica_dorada;
            $meta->recovered_bajomedieval_azul_dorada = $this->recovered_bajomedieval_azul_dorada;
            $meta->recovered_bajomedieval_monocroma = $this->recovered_bajomedieval_monocroma;
            $meta->recovered_bajomedieval_ceramica_comun_g = $this->recovered_bajomedieval_ceramica_comun_g;
            $meta->recovered_bajomedieval_ceramica_cocina = $this->recovered_bajomedieval_ceramica_cocina;
            $meta->recovered_bajomedieval_candiles = $this->recovered_bajomedieval_candiles;
            $meta->recovered_bajomedieval_cantaros_tinajas = $this->recovered_bajomedieval_cantaros_tinajas;
            $meta->recovered_bajomedieval_arcaduces = $this->recovered_bajomedieval_arcaduces;
            $meta->recovered_bajomedieval_azulejos_alicatados = $this->recovered_bajomedieval_azulejos_alicatados;

            $meta->recovered_om_vidrio = $this->recovered_om_vidrio;
            $meta->recovered_om_hueso_trabajado = $this->recovered_om_hueso_trabajado;
            $meta->recovered_om_material_const = $this->recovered_om_material_const;
            $meta->recovered_om_pinturas_murales = $this->recovered_om_pinturas_murales;
            $meta->recovered_om_yeserias = $this->recovered_om_yeserias;
            $meta->recovered_om_metales = $this->recovered_om_metales;
            $meta->recovered_om_monedas = $this->recovered_om_monedas;
            $meta->recovered_om_conducciones_hidra = $this->recovered_om_conducciones_hidra;
            $meta->recovered_om_piedra_trabajada = $this->recovered_om_piedra_trabajada;

            $meta->stratum_romano_t_sigilata_clara_b = $this->stratum_romano_t_sigilata_clara_b;
            $meta->stratum_romano_t_sigilata_clara_c = $this->stratum_romano_t_sigilata_clara_c;
            $meta->stratum_romano_t_derivada_sigilata_p = $this->stratum_romano_t_derivada_sigilata_p;
            $meta->stratum_romano_t_otras_ceramicas_f = $this->stratum_romano_t_otras_ceramicas_f;
            $meta->stratum_romano_t_lucernas = $this->stratum_romano_t_lucernas;
            $meta->stratum_romano_t_anfora_africana = $this->stratum_romano_t_anfora_africana;
            $meta->stratum_romano_t_anfora_oriental = $this->stratum_romano_t_anfora_oriental;
            $meta->stratum_romano_t_anfora_genericas = $this->stratum_romano_t_anfora_genericas;
            $meta->stratum_romano_t_ceramica_cocina_a = $this->stratum_romano_t_ceramica_cocina_a;
            $meta->stratum_romano_t_ceramica_comun_imp = $this->stratum_romano_t_ceramica_comun_imp;

            $meta->stratum_modern_ceramica_azul = $this->stratum_modern_ceramica_azul;
            $meta->stratum_modern_ceramica_dorada = $this->stratum_modern_ceramica_dorada;
            $meta->stratum_modern_ceramica_alcora = $this->stratum_modern_ceramica_alcora;
            $meta->stratum_modern_ceramica_cocina = $this->stratum_modern_ceramica_cocina;
            $meta->stratum_modern_ceramica_comun = $this->stratum_modern_ceramica_comun;
            $meta->stratum_modern_azulejos_alica = $this->stratum_modern_azulejos_alica;

            $meta->save();
        }
    }

    public function mount(string $stratumCardId)
    {
        $this->load($stratumCardId);
    }

    public function updateStratumCard()
    {
        $this->validate();
        $this->stratumCard->project_id = $this->project_id;
        $this->stratumCard->i_date = $this->i_date;
        $this->stratumCard->i_n_ue = $this->i_n_ue;
        $this->stratumCard->i_location_intervention = $this->i_location_intervention;
        $this->stratumCard->i_acronym = $this->i_acronym;
        $this->stratumCard->i_fact = $this->i_fact;
        $this->stratumCard->i_provisional_dating = $this->i_provisional_dating;
        $this->stratumCard->i_stratigraphic_reliability = $this->i_stratigraphic_reliability;
        $this->stratumCard->i_type = $this->i_type;
        $this->stratumCard->conservation = $this->preservation;
        $this->stratumCard->interpretation = $this->interpretation;
        $this->stratumCard->fine_fraction = $this->fine_fraction;
        $this->stratumCard->coarse_fraction = $this->coarse_fraction;
        $this->stratumCard->interpretation_description = $this->interpretation_description;
        $this->stratumCard->organic_composition = $this->organic_composition;
        $this->stratumCard->inorganic_composition = $this->inorganic_composition;
        $this->stratumCard->stratigraphy_equals = $this->stratigraphy_equals;
        $this->stratumCard->stratigraphy_support_provided = $this->stratigraphy_support_provided;
        $this->stratumCard->stratigraphy_covered_by = $this->stratigraphy_covered_by;
        $this->stratumCard->stratigraphy_filling_by = $this->stratigraphy_filling_by;
        $this->stratumCard->stratigraphy_cut_by = $this->stratigraphy_cut_by;
        $this->stratumCard->stratigraphy_equivale = $this->stratigraphy_equivale;
        $this->stratumCard->stratigraphy_supported_by = $this->stratigraphy_supported_by;
        $this->stratumCard->stratigraphy_overlaps_or_covers = $this->stratigraphy_overlaps_or_covers;
        $this->stratumCard->stratigraphy_fill_in = $this->stratigraphy_fill_in;
        $this->stratumCard->stratigraphy_cut_to = $this->stratigraphy_cut_to;
        $this->stratumCard->comment = $this->comment;
        $this->stratumCard->volume_material = $this->volume_material;
        $this->stratumCard->description = $this->description;

        if($this->stratumCard->save()){
            $this->saveStratumCard();

            if($this->interpretation_file){
                $dirInter = $this->stratumCard->urlInterpretacionFileAttribute();
                $interExists = Storage::disk("wasabi")->exists($dirInter);
                if (!$interExists) {
                    Storage::disk('wasabi')->makeDirectory($dirInter);
                } else {
                    Storage::disk('wasabi')->deleteDirectory($dirInter);
                    Storage::disk('wasabi')->makeDirectory($dirInter);
                }

                $nombreOriginal = $this->interpretation_file->getClientOriginalName();
                $extension = $this->interpretation_file->getClientOriginalExtension();
                $nombreSanitizado = Str::slug(pathinfo($nombreOriginal, PATHINFO_FILENAME)) . '.' . $extension;
                $path = $this->interpretation_file->storeAs($dirInter, $nombreSanitizado, 'wasabi');
                Log::info('Wasabi archivo subido interpretacion::: ' . $path);
            }

            if($this->sketch){
                $dirCroquis = $this->stratumCard->urlCroquisAttribute();
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

            foreach ($this->quotes as $quote){
                if(!isset($quote['id'])){
                    $q = StratumQuotes::create([
                        'surface' => $quote['surface'],
                        'information' => $quote['information'],
                        'stratum_card_id' => $quote['stratum_card_id'],
                    ]);
                } else {
                    $sQuote = StratumQuotes::find($quote['id']);
                    $q = $sQuote->update([
                        'surface' => $quote['surface'],
                        'information' => $quote['information'],
                    ]);
                }
            }

            $dirPhotos = $this->stratumCard->urlPhotosAttribute();
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
            $this->dispatch('close-stratum-card-update');
            $this->dispatch('show_alert', type: 'success', message: 'La Ficha de estrato se actualizo exitosamente.');
        }
    }

    public function render()
    {
        $this->croquisUrls = $this->stratumCard->urlCroquisPublicAttribute();
        $this->photoUrls = $this->stratumCard->urlPhotosPublicAttribute();
        return view('livewire.projects.stratum-tab.update-stratum-tab');
    }
}
