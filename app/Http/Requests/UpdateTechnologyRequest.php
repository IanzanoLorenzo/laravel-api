<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTechnologyRequest extends FormRequest
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
        $technologyId = $this->technology->id;
        return [
            'name' => [
                'required',
                'string',
                Rule::unique('technologies', 'name')->ignore($technologyId),
            ],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Il campo "Nome" è obbligatorio',
            'name.max' => 'Il campo "Nome" non può superare i :max carateri',
            'name.unique' => 'Questo nome è già assegnato a un\'altra tecnologia'
        ];
    }
}
