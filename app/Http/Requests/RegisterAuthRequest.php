<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterAuthRequest extends FormRequest
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
        return array_merge([
            'codUsuario' => 'required|string|max:10',
            'password' => 'required|string',
            'apePaterno' => 'required|string|max:50',
            'apeMaterno' => 'required|string|max:50',
            'nombres' => 'required|string|max:50',
            'cargo' => 'nullable|string|max:45',
        ], $this->cargo === 'alumno' ? $this->alumnoRules() : $this->docenteRules());
    }

    private function alumnoRules(): array
    {
        return [
            'especialidad' => 'required|string|max:2',
            'perIngreso' => 'required|integer',
            'usuSistema' => 'required|string|max:45',
        ];
    }
    private function docenteRules(): array
    {
        return [
            'codUni' => 'nullable|string|max:9',
            'depAcademico' => 'nullable|string|max:5',
            'dedicacion' => 'nullable|string|max:10',
            'observacion' => 'nullable|string',
            'condicion' => 'nullable|string|max:100',
        ];
    }
}
