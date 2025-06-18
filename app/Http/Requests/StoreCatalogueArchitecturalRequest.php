<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCatalogueArchitecturalRequest extends FormRequest
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
            'proceed_ue' => 'required|integer|min:1',
            'proceed_date_admission' => 'required',
            'proceed_source_admission' => 'nullable|string|max:250',
            'proceed_acronym' => 'nullable|string|max:250',
            'proceed_origin' => 'nullable|string|max:250',
            'c_classification' => 'nullable|string|max:250',
            'c_common_name' => 'nullable|string|max:250',
            'c_specific_name' => 'nullable|string|max:250',
            'c_dating' => 'nullable|string|max:250',
            'c_integrity_status' => 'nullable|string|max:250',
            'a_acronyms' => 'nullable|string|max:250',
            'a_location' => 'nullable|string|max:250',
            'location' => 'nullable|string|max:250',
            'location_date' => 'nullable',
            'location_notes' => 'nullable|string|max:2500',

            'dimension_long' => 'nullable|numeric|min:0',
            'dimension_anch' => 'nullable|numeric|min:0',
            'dimension_alt' => 'nullable|numeric|min:0',
            'dimension_other' => 'nullable|numeric|min:0',
            'subject' => 'nullable|string|max:250',
            'technique' => 'nullable|string|max:250',
            'description' => 'nullable|string|max:2500',
            'conservation_status' => 'nullable|string|max:250',
            'comments' => 'nullable|string|max:2500',
            'author' => 'nullable|string|max:250',
        ];
    }
}
