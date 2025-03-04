<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CoursRequest extends FormRequest
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
            'nom' => 'required|unique:cours,nom',
            'description' => 'required:cours,description',
            'heure_debut' => 'required:cours,heure_debut',
            'heure_fin' => 'required:cours,heure_fin',
            'salle_id' => 'required|exists:salles,id',
        ];
    }

    public function messages(): array
    {
        return [
            'nom.required' => 'Le nom du cours est obligatoire.',
            'nom.unique' => 'Ce nom de cours existe déjà.',

            'description.required' => 'La description du cours est obligatoire.',

            'heure_debut.required' => 'L\'heure de début est obligatoire.',
            'heure_fin.required' => 'L\'heure de fin est obligatoire.',

            'salle_id.required' => 'Veuillez sélectionner une salle.',
            'salle_id.exists' => 'La salle sélectionnée n\'existe pas.',
        ];
    }
}
