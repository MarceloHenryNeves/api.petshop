<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "name" => "required|string|max:50",
            "email" => "email|string|required",
            "cpf" => "cpf|required",
            "date_of_birth" => "date",
            "password" => "required|min:5|max:20",
            "phone" => "celular_com_ddd|required",
            "type" => "required|in:ADMIN,CLIENT",
        ];
    }
}
