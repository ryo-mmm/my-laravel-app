<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'description' => 'required|string|max:255'
        ];
    }

    public function messages() // カスタムメッセージをここで定義
    {
        return [
            // name属性.ルール名 => '表示したいエラーメッセージ'
            'description.required' => 'タスク内容は必須入力です。',
            'description.string' => 'タスク内容は有効な文字列で入力してください。',
            'description.max' => 'タスク内容は255文字以内で入力してください。',
        ];
    }
}
