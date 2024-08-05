<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RéinitialisationRequest extends FormRequest
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
            'code' => 'required|exists:reinitialisation_models,code',
            'password' => 'required|same:confirm_password',
            'confirm_password' => 'required|same:password',
        ];
    }
    public function messages()
    {
        return [
            'code.required' => 'Le code est requis',
            'code.exists' => 'Le code spécifié n\'existe pas',
            'password.required' => 'Le mot de passe est requis',
            'password.same' => 'Le mot de passe ne correspond pas',
            'confirm_password.required' => 'La confirmation du mot de passe est requise',
            'confirm_password.same' => 'La confirmation du mot de passe ne correspond pas',
        ];
    }
}
