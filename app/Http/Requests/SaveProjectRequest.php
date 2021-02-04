<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SaveProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // retornamos verdadero para que se pueda crear el proyecto
        // el usuario está autorizado para crear el proyecto
        // asi pasa a la validacion de reglas rules()
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
            'title'=>'required',
            'url'=>[
                'required',
                Rule::unique('projects')->ignore($this->route('project'))
            ],
            'image'=>[
                'required',
                'mimes:jpeg,png'
            ], //jpeg, png. bmp, gif, svg, webp
            'description'=>'required',
        ];
    }

    // Para poner mensajes de error
    public function messages(){

        return [
             'title.required' => 'El proyecto necesita un titulo'
        ];
     
    }

}
