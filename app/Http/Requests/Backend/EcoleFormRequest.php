<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class EcoleFormRequest extends FormRequest
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
            'nom_complet' => ['required', 'min:5', 'string'],
            'sigle' => ['nullable', 'min:2', 'string'],
            'logo' => ['nullable', 'image', 'max:1024'],
            'slogan' => ['nullable', 'min:5', 'string'],
            'adresse' => ['required', 'min:10', 'string'],
            'type_ecole' => ['required', 'min:2', 'string'],
            'telephone' => ['required', 'min:2', 'string'],
            'email' => ['required', 'min:2', 'email'],
            'academie_id' => ['required', 'integer'],
        ];
    }
}
