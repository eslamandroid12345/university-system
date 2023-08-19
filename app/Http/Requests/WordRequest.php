<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WordRequest extends FormRequest
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
            'name.ar' => 'required',
            'name.en' => 'required',
            'name.fr' => 'required',
            'description.ar' => 'required',
            'description.en' => 'required',
            'description.fr' => 'required',
            'role.ar' => 'required',
            'role.en' => 'required',
            'role.fr' => 'required',
            'image' => 'nullable|mimes:png,jpg',
            'category_id' => 'required',
        ];
    }
}
