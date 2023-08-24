<?php

namespace App\Http\Requests\Personal\Comment;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'message' => 'string|nullable|min:6|max:255'
        ];
    }

    public function messages()
    {
        return[
            'message.string' => 'Это поле должно иметь строковый тип',
            'message.min' => 'Содержимое должно быть не менее 6 символов',
            'message.max' => 'Содержимое должно быть не более 256 символов',
        ];
    }
}
