<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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

            // タイトル: 必須, 文字列であること, 最大255文字
            'title' => ['required', 'string', 'max:255'],

            // タイトル: 必須, 文字列であること, 最大255文字
            'content' => ['required', 'string'],
        ];
    }

    /**
     * カスタムエラーメッセージの定義
     */
    public function messages(): array
    {
        return [
            'title.required' => 'タイトルは必ず入力してください。',
            'title.max'      => 'タイトルは255文字以内で入力してください。',
            'content.required' => '本文は必ず入力してください。',
        ];
    }
}
