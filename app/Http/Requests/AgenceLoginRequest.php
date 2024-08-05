<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgenceLoginRequest extends FormRequest
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
            'email' => 'required|exists:agences,email',
            'password' => 'string||min:4',
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'Le mail est requis',
            'email.email' => 'Le email n\'est pas correct',
            'email.exists' => 'Cette adresse email n\'est pas reconnu',
            'password.required' => 'Le password est requis',
            'password.min' => 'Le mot de passe doit contenir au moins 4 caracteres',
            'password.string' => 'Le mot de passe doit être un string',
        ];
    }
}
