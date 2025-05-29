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
            'ue' => 'required',
            'fact' => 'required',
            'type_inhumation' => 'nullable',
            'type_cremation' => 'nullable',
        ];
    }
}
