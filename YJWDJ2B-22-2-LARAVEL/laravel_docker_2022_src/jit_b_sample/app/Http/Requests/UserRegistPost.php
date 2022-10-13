<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegistPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        //return false;  // 요청에 대한 권한 설정, true 변경해 둠
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            // validation rules : 유효성 체크(검사)의 규칙을 작성
            'name' => ['required','max:20'],
            'email' => ['required', 'email', 'max:255'],
            //'age' =>'integer|min:19'
        ];
    }
    public function messages(){
        return [
            'name.required' => '이름입력 필수',
            'name.max' => '이름 최대길이 20',
            'email.required' => '이메일 입력 필수',
            'email.email' => '이메일 형식을 입력',
            'email.max' => '최대 255길이까지 입력가능',
        ];
    }
}
