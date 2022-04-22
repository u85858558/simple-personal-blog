<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class EditPostRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return string[]
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
