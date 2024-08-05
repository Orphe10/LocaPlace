<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
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
            'nom' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
        ];
    }

    public function messages(){
        return [
            'nom.required' => 'Le nom est requis',
            'nom.string' => 'Le nom est un caractère',
            'email.required' => 'Le mail est requis',
            'email.email' => 'Le email n\'est pas correct',
            'message.required' => 'Le message est requis',
            'message.string' => 'Le message est un caractère',
        ];
    }
}
