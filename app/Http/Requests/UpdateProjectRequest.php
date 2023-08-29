<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'type_id' => 'required|exists:types,id',
            'project_name' => 'required|max:50',
            'description' => 'required|max:255',
            'creator_name' => 'required|max:50',
            'image' =>  'image'
        ];
    }

    public function messages()
    {
        return [
            'type_id.required' => 'Il campo "Tipo" è obbligatorio',
            'type_id.exists' => 'Il campo selezionato non esiste',
            'project_name.required' => 'Il campo "Nome Progetto" è obbligatorio',
            'project_name.max' => 'Il campo "Nome Progetto" non può superare i :max caratteri',
            'description.required' => 'Il campo "Descrizione" è obbligatorio',
            'description.max' => 'Il campo "Descrizione" non può superare i :max caratteri',
            'creator_name.required' => 'Il campo "Autore" è obbligatorio',
            'creator_name.max' => 'Il campo "Autore" non può superare i :max caratteri',
            'image.image' => 'Il file dev\'essere un\'immagine (.jpeg, .png ...)'
        ];
    }
}
