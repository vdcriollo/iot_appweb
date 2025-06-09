<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUsuarioRequest extends FormRequest
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
    public function rules()
    {
        $usuarioId = $this->route('usuario')->id;

        return [
            'name' => ['required', 'string', 'max:255'],

            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('user')->ignore($usuarioId),
            ],

            'password' => [
                'nullable',       // Puede estar vacío
                'string',
                'min:6',
                'confirmed'       // Para validación de password_confirmed si usas confirmación
            ],

            'roles' => ['required', 'array', 'min:1'],
            'roles.*' => ['string', 'exists:roles,name'],
        ];
    }

    public function messages()
    {
        return [
            'roles.required' => 'Debe seleccionar al menos un rol.',
            'roles.array' => 'Formato inválido para roles.',
            'roles.min' => 'Debe seleccionar al menos un rol.',
            'roles.*.exists' => 'Rol seleccionado inválido.',
            // Puedes agregar más mensajes personalizados si quieres
        ];
    }
}
