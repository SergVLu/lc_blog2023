<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|unique:posts',
            'content' => 'required|string|min:6',
            'category_id' => 'required|integer|exists:categories,id',
            'preview_image' => 'required|file',
            'main_image' => 'required|file',
            'tag_ids' => 'array|nullable',
            'tag_ids.*' => 'integer|nullable|exists:tags,id',
        ];
    }
}
