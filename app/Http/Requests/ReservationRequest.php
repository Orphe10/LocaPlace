<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
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
            'Tel' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    if (!Str::startsWith($value, '+229')) {
                        $fail('Le numéro de téléphone doit commencer par +229.');
                    }
                },
                'regex:/^\+229\d{8}$/',
            ],
            'Qte' => 'required|integer|min:1',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
        ];
    }

    public function messages()
    {
        return [
            'Tel.required' => "Le champ téléphone est obligatoire.",
            'Tel.string' => "Le champ téléphone doit être une chaîne de caractères.",
            'Tel.regex' => "Le champ téléphone doit être au format +229xxxxxxxx.",
            'Qte.required' => "La quantité est requise.",
            'Qte.integer' => "La quantité doit être un entier.",
            'Qte.min' => "La quantité doit être au moins 1.",
            'start_date.required' => "La date de début est requise.",
            'end_date.required' => "La date de fin est requise.",
            'start_date.after_or_equal' => 'La date de début doit être aujourd\'hui ou une date future.',
            'end_date.after' => 'La date de fin doit être après la date de début.',
        ];
    }
}
