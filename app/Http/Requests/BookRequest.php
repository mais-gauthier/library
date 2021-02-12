<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'title' => 'required|max:255',
            'author_id' => 'numeric',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Введите имя книги',
            'title.max' => 'Имя книги не должно превышать 255 символов',
            'author_id.numeric' => 'Выберите автора книги',
        ];
    }
}
