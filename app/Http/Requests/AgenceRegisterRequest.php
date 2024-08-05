<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use App\Rules\PasswordWithoutTrim;
use Illuminate\Foundation\Http\FormRequest;

class AgenceRegisterRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'num' => [
                'required',
                'string',
                'size:12', // +229 suivi de 8 chiffres donne une taille totale de 12 caractères
                function ($attribute, $value, $fail) {
                    if (!Str::startsWith($value, '+229')) {
                        $fail('Le numéro de téléphone doit commencer par +229.');
                    }
                },
                'regex:/^\+229\d{8}$/', // Vérifie que le numéro correspond au format +229 suivi de 8 chiffres
            ],
            'image'=> 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'email' => 'required|email|unique:agences,email',
            'password' => 'string|min:4|confirmed|no_spaces',
            'password_confirmation' => 'string'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Le nom est requis',
            'name.string' => 'Le nom doit contenir des caracteres',
            'num.required' => "Le champ téléphone est obligatoire.",
            'num.string' => "Le champ téléphone doit être une chaîne de caractères.",
            'num.size' => "Le champ téléphone doit contenir exactement 12 caractères.",
            'num.regex' => "Le champ téléphone doit être au format +229xxxxxxxx.",
            'email.required' => 'Le mail est requis',
            'email.email' => 'Le email n\'est pas correct',
            'email.unique' => 'Ce mail existe déjà dans la table',
            'image.required'=> 'L\'image de l\'agence est requise',
            'password.required' => 'Le mot de passe est requis',
            'password.min' => 'Le mot de passe doit contenir au moins 4 caractères',
            'password.confirmed' => 'Les mots de passe ne correspondent pas',
            'password_confirmation.required' => 'Le mot de passe de confirmation est requis',
        ];
    }
}
