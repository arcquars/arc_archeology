<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUeRequest extends FormRequest
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
            'code' => 'required|string|min:3|max:120|unique:ues,code',
            'covered_by' => 'required|string|min:3|max:200',
            'covers_to' => 'required|string|min:3|max:200',
            'description' => 'nullable|string|min:3|max:250',
            'interpreting' => 'nullable|string|min:3|max:250',
            'dating' => 'nullable|string|min:3|max:250',
            'project_id' => 'required',
        ];
    }
}
