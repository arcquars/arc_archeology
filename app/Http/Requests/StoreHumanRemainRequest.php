<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHumanRemainRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'intervention' => 'required',
            'location' => 'required',
            'ue' => 'required|integer|min:1',
            'fact' => 'required',
            'type_inhumation' => 'nullable',
            'type_cremation' => 'nullable',
            'associated_with' => 'nullable|string|max:250',
            'description' => 'nullable|string|max:2500',
            'deposition_primary' => 'nullable',
            'deposition_secondary' => 'nullable',
            'deposition_ossuary' => 'nullable',
            'context_undertaker' => 'nullable',
            'context_secondary' => 'nullable',
            'conservation_good' => ' nullable',
            'conservation_partial_alterations' => 'nullable',
            'conservation_totally_altered' => 'nullable',
            'burial_single_grave' => 'nullable',
            'burial_communal_grave' => 'nullable',
            'relationship_equals' => 'nullable|string|max:250',
            'relationship_attached' => 'nullable|string|max:250',
            'relationship_covered_by' => 'nullable|string|max:250',
            'relationship_filling_by' => 'nullable|string|max:250',
            'relationship_cut_by' => 'nullable|string|max:250',
            'relationship_equivalent_to' => 'nullable|string|max:250',
            'relationship_attached_to' => 'nullable|string|max:250',
            'relationship_covers_to' => 'nullable|string|max:250',
            'relationship_fill_to' => 'nullable|string|max:250',
            'relationship_cut_to' => 'nullable|string|max:250',
            'periodization' => 'nullable|string|max:250',
            'provisional_dating' => 'nullable|string|max:250',
            'interpretation' => 'nullable|string|max:2500',
            'dates' => 'nullable|string|max:250',
            'author' => 'nullable|string|max:250',
            'description' => 'nullable|string|max:2500',
            'disposition_decubito_supino' => 'nullable',
            'disposition_decubito_lateral_der' => 'nullable',
            'disposition_decubito_lateral_izq' => 'nullable',
            'deposito_adorno_per' => 'nullable',
            'deposito_ceramica' => 'nullable',
            'deposito_armamento' => 'nullable',
            'deposito_fauna' => 'nullable',
            'deposito_semillas' => 'nullable',
            'brazos_ext_largo_cuerpo_izq' => 'nullable',
            'brazos_ext_largo_cuerpo_der' => 'nullable',
            'brazos_sobre_pelvis_izq' => 'nullable',
            'brazos_sobre_pelvis_der' => 'nullable',
            'brazos_sobre_pecho_izq' => 'nullable',
            'brazos_sobre_pecho_der' => 'nullable',
            'piernas_ext_izq' => 'nullable',
            'piernas_ext_der' => 'nullable',
            'piernas_semi_flex_izq' => 'nullable',
            'piernas_semi_flex_der' => 'nullable',
            'piernas_flexionada_izq' => 'nullable',
            'piernas_flexionada_der' => 'nullable',
            'obs_antropologicas' => 'nullable|string|max:2500',
            'specify' => 'nullable|string|max:2500',
            'observations' => 'nullable|string|max:2500',

            'file_topographic' => 'nullable|file|mimes:jpeg,png|max:4096',
            'file_photographic' => 'nullable|file|mimes:jpeg,png|max:4096',
            'sketch' => 'nullable|file|mimes:jpeg,png|max:4096',
            'preserved_part' => 'nullable|file|mimes:jpeg,png|max:4096',

        ];
    }
}
