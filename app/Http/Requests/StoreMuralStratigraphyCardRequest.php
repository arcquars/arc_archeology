<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMuralStratigraphyCardRequest extends FormRequest
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
            'msc_date' => 'required',
            'floor' => 'required',
            'stay' => 'required',
            'quadrant' => 'required',
            'acronym' => 'nullable',
            'fact' => 'nullable',
            'n_ue' => 'required|integer|min:1',
            'provisional_dating' => 'nullable',
            'preservation' => 'nullable',
            'description' => 'nullable',
            'component_stone_type' => 'nullable',
            'component_stone_characteristics' => 'nullable',
            'component_stone_size' => 'nullable',
            'component_brick_type' => 'nullable',
            'component_brick_characteristics' => 'nullable',
            'component_brick_measures' => 'nullable',
            'component_binder_type' => 'nullable',
            'component_binder_characteristics' => 'nullable',
            'component_binder_joints' => 'nullable',
            'component_tapial_box' => 'nullable',
            'component_tapial_height' => 'nullable',
            'stratigraphy_equals_to' => 'nullable',
            'stratigraphy_equivalent' => 'nullable',
            'stratigraphy_it_is_supported' => 'nullable',
            'stratigraphy_rests_on' => 'nullable',
            'stratigraphy_covered_by' => 'nullable',
            'stratigraphy_covers_to' => 'nullable',
            'stratigraphy_filled_by' => 'nullable',
            'stratigraphy_fills_to' => 'nullable',
            'stratigraphy_cut_by' => 'nullable',
            'stratigraphy_cut_to' => 'nullable',
            'comments' => 'nullable',
            'num_flat' => 'nullable',
            'num_photography' => 'nullable',

//            'sketches' => 'nullable|array|max:4',
//            'sketches.*' => 'nullable|file|mimes:jpeg,png,pdf|max:4096',
            'sketches' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:4096',

            'photos' => 'nullable|array|max:4',
            'photos.*' => 'nullable|file|mimes:jpeg,png,pdf|max:4096',

        ];
    }
}
