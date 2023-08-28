<?php

namespace App\Http\Requests\Post\Comment;

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
            'message' => 'required|string',
          
        ];
    }

    public function messages()
    {
        return[
            'message.required' => 'Это поле необходимо для заполнения',
            'message.string' => 'Это поле должно иметь строковый тип',
            
        ];
    }
}
