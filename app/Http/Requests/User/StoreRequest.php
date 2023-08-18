<?php

namespace App\Http\Requests\User;

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
            'name' => 'required|string|min:3|max:63',
            'id' => '',
            'email' => 'required|string|unique:users|email',
            'password' => 'required|string',
            'role' => 'required|integer',
        ];
    }
    public function messages()
    {
        return[
            'name.required' => 'Это поле необходимо для заполнения',
            'name.string' => 'Это поле должно иметь строковый тип',
            'name.unique' => 'Такое название уже существует, придумайте другое',
            'name.min' => 'Имя должно быть не менее 3 символов, придумайте другое',
            'name.max' => 'Имя должно быть не ,более 63 символов, придумайте другое',
            'email.required' => 'Это поле необходимо для заполнения',
            'email.string' => 'Это поле должно иметь строковый тип',
            'email.unique' => 'Такая почта уже зарегистрирована, придумайте другую',
            'password.required' => 'Это поле необходимо для заполнения',
            'password.string' => 'Это поле должно иметь строковый тип',
            
        ];
    }
}
