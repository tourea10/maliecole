<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class PersonnelFormRequest extends FormRequest
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
            'sexe' => ['required', 'string'],
            'dateNaissance' => ['nullable', 'date'],
            'lieuNaissance' => ['nullable', 'string'],
            'contact' => ['required', 'string'],
            'photo' => ['nullable', 'image', 'max:1024'],
            'adresse' => ['nullable', 'string'],
            'poste' => ['required', 'string'],
            'groupeSanguin' => ['nullable', 'string'],
            'signeParticulier' => ['nullable', 'string'],
            'user_id' => ['required', 'integer'],
            'ecole_id' => ['required', 'integer'],
        ];
    }
}
