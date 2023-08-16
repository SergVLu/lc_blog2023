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
            'content' => 'required|string|min:16',
            'category_id' => 'required|integer|exists:categories,id',
            'preview_image' => 'required|file',
            'main_image' => 'required|file',
            'tag_ids' => 'array|nullable',
            'tag_ids.*' => 'integer|nullable|exists:tags,id',
        ];
    }

    public function messages()
    {
        return[
            'title.required' => 'Это поле необходимо для заполнения',
            'title.string' => 'Это поле должно иметь строковый тип',
            'title.unique' => 'Такое название уже существует, придумайте другое',
            'content.required' => 'Это поле необходимо для заполнения',
            'content.string' => 'Это поле должно иметь строковый тип',
            'content.min' => 'Содержимое должно быть не менее 16 символов',
            'preview_image.required' => 'Это поле необходимо для заполнения',
            'preview_image.file' => 'Это должно быть файлом',
            'main_image.required' => 'Это поле необходимо для заполнения',
            'main_image.file' => 'Это должно быть файлом',
            'tag_ids.array' => 'Теги должны отправляться массивом',

        ];
    }
}
