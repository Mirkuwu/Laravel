<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInfoProfesionalRequest extends FormRequest
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
        'formacion_profesional' => 'required|string|max:255',
        'pais' => 'required|string|max:100',
        'universidad' => 'required|string|max:255',
        'especialidad' => 'required|string|max:255',
        'fecha_inicio' => 'required|date',
        'fecha_final' => 'required|date|after_or_equal:fecha_inicio',
        'grado_obtenido' => 'required|string|max:255',
        'documento_sustentatorio' => 'nullable|string',
        'observacion' => 'nullable|string',
    ];
    }
}
