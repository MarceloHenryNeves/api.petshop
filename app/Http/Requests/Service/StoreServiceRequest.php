<?php

namespace App\Http\Requests\Service;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'string|required',
            'observation' => 'string',
            'prize' => 'numeric|between:0.01,9999999.99',

            'subservices_id' => 'required|array',
            'subservices.*' => 'exists:subservices,id',

            'species' => 'required|array',
            'species.*' => 'exists:species,id',

            'coats_id' => 'required|array',
            'coats.*' => 'existis:coats,id',

            'sizes_id' => 'required|array',
            'sizes.*' => 'exists:sizes,id'
        ];
    }
}
