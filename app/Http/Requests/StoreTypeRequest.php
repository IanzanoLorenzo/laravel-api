<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTypeRequest extends FormRequest
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
            'name' => 'required|max:50|unique:types'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Il campo "Nome" è obbligatorio',
            'name.max' => 'il campo "Nome" non può superare i :max carateri',
            'name.unique' => 'Questo tipo è già presente'
        ];
    }
}
