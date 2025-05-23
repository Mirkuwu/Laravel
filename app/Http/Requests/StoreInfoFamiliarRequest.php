<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInfoFamiliarRequest extends FormRequest
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
        'codUsuario' => 'required|string|max:10',
        'nombres' => 'required|string|max:50',
        'apellidos' => 'required|string|max:50',
        'parentesco' => 'required|string|max:10',
        'estado' => 'required|string|max:10',
        'estudios' => 'required|string|max:15',
        'ocupacion' => 'nullable|string|max:100',
        'celular' => 'required|string|max:10',
        'depenEco' => 'required|in:S,N',
    ];
    }
}
