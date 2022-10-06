<?php

namespace App\Http\Requests\Main;

use Illuminate\Foundation\Http\FormRequest;

class MaterialRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'preview' => 'required|file|mimes:png,jpeg,jpg',
            'content' => 'required|file|mimetypes:audio/*,video/*',
            'category_id' => 'required'
        ];
    }
}
