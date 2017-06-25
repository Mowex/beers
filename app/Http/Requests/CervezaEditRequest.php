<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CervezaEditRequest extends Request
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
     * @return array
     */
    public function rules()
    {
        return [
            'Nombre'            => ['required', 'regex:/^[.áéíóúÁÉÍÓÚ\pL\s]|-+$/u'],
            'Origen'            => ['required', 'regex:/^[.áéíóúÁÉÍÓÚ\pL\s]|-+$/u'],
            'Presentacion'      => ['required', 'regex:/^[0-9\pL\s]+$/u'],
            'Color'             => ['regex:/^[áéíóúÁÉÍÓÚ\pL\s]+$/u'],
            'Sabor'             => ['regex:/^[,.;!¡¿?áéíóúÁÉÍÓÚ\pL\s]+$/u'],
            'Maridaje'          => ['regex:/^[0-9#,.;!¡¿?áéíóúÁÉÍÓÚ\pL\s]+$/u'],
            'Estilo'            => ['regex:/^[áéíóúÁÉÍÓÚ\pL\s]+$/u'],
            'Temperatura'       => ['regex:/^[0-9\pL\s]|-+$/u'],
            'Volumen_alcohol'   => 'Numeric',
            'Precio'            => 'Numeric',
            'Imagen'            => 'image',
            'Cantidad'          => 'required',
        ];
    }
}
