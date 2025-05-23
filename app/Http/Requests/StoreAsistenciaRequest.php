<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAsistenciaRequest extends FormRequest
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
            'horario_id' => 'required|exists:horarios,id',
            'fecha' => 'required|date',
            'estado' => 'required|string|in:p,a,t',
            'hora_entrada' => 'nullable|date_format:H:i',
            'hora_salida' => 'nullable|date_format:H:i',
        ];
    }
}
