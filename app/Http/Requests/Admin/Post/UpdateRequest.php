<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'title' => 'required|string',
            'content' => 'required|string',
            'preview_img' => 'nullable|file',
            'main_img' => 'nullable|file',
            'category_id' => 'required|integer|exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|integer|exists:tags,id'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Это поле ноебходимо заполнить',
            'title.string' => 'Данные должны соответствовать строчному типу',

            'preview_img.required' => 'Необходимо выбрать файл',
            'preview_img.file' => 'Данные должны соответствовать файловому типу',

            'main_img.required' => 'Необходимо выбрать файл',
            'main_img.file' => 'Данные должны соответствовать файловому типу',

            'category_id.required' => 'Это поле необходимо заполнить',
            'category_id.integer' => 'ID категории должен быть числом',
            'category_id.exists' => 'Такой категории нет в бд',

            'tags_ids.array' => 'Необходимо отправить массив данных'
        ];
    }
}
