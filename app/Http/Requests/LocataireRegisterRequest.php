<?php
namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;

class LocataireRegisterRequest extends FormRequest
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
            'prenom' => 'required|string|max:255',
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
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:4|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Le nom est requis',
            'prenom.required' => 'Le prénom est requis',
            'num.required' => "Le champ téléphone est obligatoire.",
            'num.string' => "Le champ téléphone doit être une chaîne de caractères.",
            'num.size' => "Le champ téléphone doit contenir exactement 12 caractères.",
            'num.regex' => "Le champ téléphone doit être au format +229xxxxxxxx.",
            'email.required' => 'Le mail est requis',
            'email.email' => 'Le email n\'est pas correct',
            'email.unique' => 'Ce mail existe déjà dans la table',
            'password.required' => 'Le mot de passe est requis',
            'password.min' => 'Le mot de passe doit contenir au moins 4 caractères',
            'password.confirmed' => 'Les mots de passe ne correspondent pas',
        ];
    }
}