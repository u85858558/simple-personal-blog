<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'title'    => 'required',
            'image'    => 'nullable|image',
            'post'     => 'required',
            'category' => 'required|integer|exists:categories,id',
            'tags'     => 'required',
        ];
    }
}
