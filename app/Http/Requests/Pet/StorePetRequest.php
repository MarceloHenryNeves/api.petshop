<?php

namespace App\Http\Requests\Pet;

use Illuminate\Foundation\Http\FormRequest;

class StorePetRequest extends FormRequest
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
            "name" => "required|string|max:30",
            "date_of_birth" => "date",
            "age" => "required|integer",
            "weight" => "numeric:6,4|required",
            "is_allergic" => 'boolean',
            "size_id" => "required|int",
            "sex" => "required|in:male,female",
            "specie_id" => "required|int",
            "breed_id" => "required|int",
            "coat_id" => "required|int"
        ];
    }
}
