<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDireccionRequest extends FormRequest
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
        'pais' => 'required|string|max:100',
        'departamento' => 'required|string|max:100',
        'provincia' => 'required|string|max:100',
        'distrito' => 'required|string|max:100',
        'tipo_via' => 'required|string|max:50',
        'nombre_via' => 'required|string|max:150',
        'tipo' => 'required|string|max:50',
        'numero' => 'nullable|string|max:20',
    ];
    }
}
