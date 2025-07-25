<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProjectRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:250',
            'acronym' => 'required|string|min:3|max:120|unique:projects,acronym',
            'expedient' => 'required|string|min:3|max:120',
            'initial_quota' => 'required|numeric',
            'final_quota' => 'required|numeric',
            'utm' => 'required|string|min:3|max:250',
            'initial_date' => 'required|date'
        ];
    }
}
