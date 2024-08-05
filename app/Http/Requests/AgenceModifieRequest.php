<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;

class AgenceModifieRequest extends FormRequest
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
            'email' => 'required|email|max:255',
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Le nom de l\'agence est obligatoire.',
            'name.string' => 'Le nom de l\'agence doit être une chaîne de caractères.',
            'name.max' => 'Le nom de l\'agence ne doit pas dépasser 255 caractères.',
            'email.required' => 'L\'adresse email est obligatoire.',
            'email.email' => 'L\'adresse email doit être valide.',
            'email.max' => 'L\'adresse email ne doit pas dépasser 255 caractères.',
            'num.required' => "Le champ téléphone est obligatoire.",
            'num.string' => "Le champ téléphone doit être une chaîne de caractères.",
            'num.size' => "Le champ téléphone doit contenir exactement 12 caractères.",
            'num.regex' => "Le champ téléphone doit être au format +229xxxxxxxx.",
            'image.image' => 'Le fichier doit être une image.',
            'image.mimes' => 'L\'image doit être au format jpeg, png, jpg ou gif.',
            'image.max' => 'L\'image ne doit pas dépasser 2 Mo.',
        ];
    }
}