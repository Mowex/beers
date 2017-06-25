<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class LugarCreateRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'Nombre'        => ['required', 'regex:/^[áéíóúÁÉÍÓÚ\pL\s]+$/u'],
            'Calle'         => ['required', 'regex:/^[áéíóúÁÉÍÓÚ\pL\s]+$/u'],
            'Numero_ext'    => 'required|Numeric',
            'Numero_int'    => 'Numeric',  
            'CP'            => 'required|Numeric',
            'Comentarios'   => ['regex:/^[0-9#,.;!¡¿?áéíóúÁÉÍÓÚ\pL\s]+$/u'], 
        ];
    }
}
