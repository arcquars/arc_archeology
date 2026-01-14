<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMaterialRequest extends FormRequest
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
    public function rules(?string $materialType): array
    {
        $ruleMaterial = [
            'ue' => 'required',
            'object' => 'required',
            'century' => 'nullable',
            'class' => 'nullable|string|max:200',
            'form' => 'nullable|string|max:100',
            'pasta' => 'nullable|string|max:200',
            'decoration' => 'nullable|string|max:2000',
            'fragments' => 'nullable|integer|min:1',
            'piece_percentage' => 'nullable',
            'thickness' => 'nullable',
            'material_type' => 'required',

            'photos' => 'nullable|array|max:4',
            'photos.*' => 'nullable|file|mimes:jpeg,png|max:4096',
        ];

        $ruleType = [];

        if(strcmp($materialType, \App\Models\Material::MATERIAL_TYPE_CERAMIC) == 0){
            $ruleType = [
                'height' => 'required',
                'diameter_base' => 'nullable',
                'diameter_mouth' => 'nullable',
                'diameter_max' => 'nullable',
                'description' => 'nullable|string|max:2000',
            ];
        } else {
            $ruleType = [
                'side_max' => 'required',
                'side_min' => 'nullable',
                'notes' => 'nullable',
            ];
        }
        return array_merge($ruleType, $ruleMaterial);
    }
}
