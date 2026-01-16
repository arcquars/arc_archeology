<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStructureTabRequest extends FormRequest
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
            'i_location_intervention' => 'required',
            'i_acronym' => 'required',
            'i_fact' => 'nullable|string|max:250',
            'i_provisional_dating' => 'nullable|string|max:200',
            'i_stratigraphic_reliability' => 'nullable|string|max:200',
            'i_type' => 'nullable|string|max:200',
            'conservation' => 'nullable|array',
            'interpretation_description' => 'nullable|string|max:2500',
            'aparejo' => 'nullable|max:200',
            'largo' => 'nullable|numeric|max:200',
            'anchura' => 'nullable|numeric|max:200',
            'alto_grueso' => 'nullable|numeric|max:200',
            'orientacion_1' => 'nullable|max:200',
            'orientacion_2' => 'nullable|max:200',
            'stratigraphy_equals' => 'nullable|string|max:200',
            'stratigraphy_support_provided' => 'nullable|string|max:200',
            'stratigraphy_covered_by' => 'nullable|string|max:200',
            'stratigraphy_filling_by' => 'nullable|string|max:200',
            'stratigraphy_cut_by' => 'nullable|string|max:200',
            'stratigraphy_equivale' => 'nullable|string|max:200',
            'stratigraphy_supported_by' => 'nullable|string|max:200',
            'stratigraphy_overlaps_or_covers' => 'nullable|string|max:200',
            'stratigraphy_fill_in' => 'nullable|string|max:200',
            'stratigraphy_cut_to' => 'nullable|string|max:200',

            'quotes.*.surface' => 'required|numeric|min:0|max:2500',
            'quotes.*.information' => 'nullable|numeric|min:0|max:2500',

            'bricks.*.long' => 'required|numeric|min:0|max:2500',
            'bricks.*.width' => 'required|numeric|min:0|max:2500',
            'bricks.*.thick' => 'required|numeric|min:0|max:2500',

            'formworks.*.formwork' => 'required|numeric|min:0|max:2500',

            'sketch' => 'nullable|file|mimes:jpeg,png|max:4096',
            'photo' => 'nullable|file|mimes:jpeg,png|max:4096',
        ];
    }
}
