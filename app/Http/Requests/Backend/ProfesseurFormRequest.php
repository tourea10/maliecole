<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class ProfesseurFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'prenom' => ['required', 'string'],
            'nom' => ['required', 'string'],
            'sexe' => ['required', 'string'],
            'dateNaissance' => ['nullable', 'date'],
            'lieuNaissance' => ['nullable', 'string'],
            'contact' => ['required', 'string'],
            'email' => ['nullable', 'email'],
            'photo' => ['nullable', 'image', 'max:1024'],
            'adresse' => ['nullable', 'string'],
            'groupeSanguin' => ['nullable', 'string'],
            'signeParticulier' => ['nullable', 'string'],
            'discipline_id' => ['required', 'exists:disciplines,id'],
            'ecole_id' => ['required', 'exists:ecoles,id'],
        ];
    }
}
