<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserIndexRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(){return true;}

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'field' => ['in:name,
                email,
                created_at,
                updated_at,
                identificacion,
                sexo,
                fecha_nacimiento,
                esLider,
                area,
                roles,
                agregado'
            ],
            'order' => ['in:asc,desc'],
            'perPage' => ['numeric'],
        ];
    }
}
