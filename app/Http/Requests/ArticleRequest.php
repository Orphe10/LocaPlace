<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'libelle' => 'required|string|max:255',
            'type' => 'nullable|string|max:255',
            'qte' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
            'available_from' => 'required|date',
            'available_until' => 'required|date|after_or_equal:available_from',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }
    public function messages()
    {
        return [
            'libelle.required' => 'Le libelle de l\'article est requis',
            'type.required' => 'Le type d\'article est requis',
            'price.required' => 'Le price de l\'article est requis',
            'price.integer' => 'Le price de l\'article est un entier',
            'qte.required' => 'La quantité de l\'article est requis',
            'qte.integer' => 'La quantité de l\'article est un entier',
            'qte.min' => "La quantité doit être au moins 1.",
            'image.required' => 'L\'image de l\'article est requis',
            'description.required' => 'La description de l\'article est requis',
            'available_from.required' => ' Le champ est obligatoire.',
            'available_from.date' => ' Le champ doit être une date valide',
            'available_until.required' => ' Le champ est obligatoire.',
            'available_until.date' => ' Le champ doit être une date valide',
        ];
    }
}
