<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTypeRequest extends FormRequest
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
        $typeId = $this->type->id;
        return [
            'name' => [
                'required',
                'string',
                Rule::unique('types', 'name')->ignore($typeId),
            ],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Il campo "Nome" è obbligatorio',
            'name.max' => 'Il campo "Nome" non può superare i :max carateri',
            'name.unique' => 'Questo nome è già assegnato a un\'altro tipo'
        ];
    }
}
