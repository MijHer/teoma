<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
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
            'title' => 'required',
            'url'   => [
                        'required',
                        Rule::unique('projects')->ignore( $this->route('project') )
                        ],
            'category_id' => ['required', 'exists:categories,id'],
            'image' =>[
                        $this->route('project') ? '' : 'required', 'mimes:jpeg,png,jpg'
                        ],
            'description' => 'required',
        ];
    }

    public function Messages()
    {
        return [
            'title.required' => 'El Titutlo de proyecto es obligatorio',
            'url.required' => 'La URL del proyecto es obligatorio',
            'image.required' => 'La Imagen del proyecto es obligatorio',
            'category_id.required' => 'La Categoria del proyecto es obligatorio',
            'description.required' => 'La Desripcion del proyecto es obligatorio'
        ];
    }
}
