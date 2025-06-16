<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStratumCardRequest extends FormRequest
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
            'i_date' => 'required',
            'i_n_ue' => 'required|integer|min:1',
            'i_location_intervention' => 'required|string|max:250',
            'i_acronym' => 'required|string|max:250',
            'i_fact' => 'required|string|max:250',
            'i_provisional_dating' => 'nullable|string|max:250',
            'i_stratigraphic_reliability' => 'nullable|string|max:250',
            'i_type' => 'nullable|string|max:250',
            'preservation' => 'nullable',
            'interpretation' => 'nullable',
            'fine_fraction' => 'nullable',
            'interpretation_description' => 'nullable|string|max:500',
            'organic_composition' => 'nullable|string|max:250',
            'inorganic_composition' => 'nullable|string|max:250',
            'stratigraphy_equals' => 'nullable|string|max:250',
            'stratigraphy_support_provided' => 'nullable|string|max:250',
            'stratigraphy_covered_by' => 'nullable|string|max:250',
            'stratigraphy_filling_by' => 'nullable|string|max:250',
            'stratigraphy_cut_by' => 'nullable|string|max:250',
            'stratigraphy_equivale' => 'nullable|string|max:250',
            'stratigraphy_supported_by' => 'nullable|string|max:250',
            'stratigraphy_overlaps_or_covers' => 'nullable|string|max:250',
            'stratigraphy_fill_in' => 'nullable|string|max:250',
            'stratigraphy_cut_to' => 'nullable|string|max:250',
            'comment' => 'nullable|string|max:1500',
            'description' => 'nullable|string|max:1500',
            'volume_material' => 'nullable|string|max:250',

            'photos' => 'nullable|array|max:4',
            'photos.*' => 'nullable|file|mimes:jpeg,png,pdf|max:4096',
//            '' => '',
//            '' => '',
//            '' => '',
//            '' => '',
        ];
    }
}
