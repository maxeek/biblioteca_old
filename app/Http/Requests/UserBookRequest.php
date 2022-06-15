<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserBookRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [


           'dni' => 'max:10|min:7|required|unique:user_books,dni,',

            'surname' => 'max:25|min:3|required|unique:user_books,surname',
            'name' => 'max:25|min:3|required|unique:user_books,name',



        ];

         }

   public function messages()
    {
        return [
            'dni.required' => 'El DNI del usuario es requerido',
             'dni.unique' => 'Este DNI está ingresado',
             'surname.unique' => 'El apellido del usuario ya está en uso',

            'surname.max' => 'Ingresar menos de 25 caracteres',
            'surname.min' => 'Ingresar más de 3 caracteres',

            'name.max' => 'Ingresar menos de 25 caracteres',
            'name.min' => 'Ingresar más de 3 caracteres',


            'dni.max' => 'Ingresar menos de 10 dígitos para el DNI',
            'dni.min' => 'Ingresar más de 7 dígitos para el DNI',
        ];
    }

}
