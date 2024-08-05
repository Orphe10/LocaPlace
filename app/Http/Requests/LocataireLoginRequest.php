<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocataireLoginRequest extends FormRequest
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
            'email' => 'required|exists:users,email',
            'password' => 'string|min:4|no_spaces',
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'Le mail est requis',
            'email.email' => 'L\'email n\'est pas correct',
            'email.exists' => 'Cette adresse email n\'est pas reconnu',
            'password.required' => 'Le password est requis',
            'password.min' => 'Le mot de passe doit contenir au moins 4 caractères',
        ];
    }
}
