<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        $usuario = $this->route('usuario');

        $emailUnico = 'unique:App\Models\User,email';

        if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            $id = $usuario instanceof \App\Models\User ? $usuario->id : $usuario;
            $emailUnico .= ',' . $id;
        }

        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', $emailUnico],
            'password' => [
                $this->isMethod('POST') ? 'required' : 'nullable',
                'string',
                'min:8',
                'confirmed',
            ],
            'role' => ['required', 'in:comum,administrador'],
        ];
    }
}
