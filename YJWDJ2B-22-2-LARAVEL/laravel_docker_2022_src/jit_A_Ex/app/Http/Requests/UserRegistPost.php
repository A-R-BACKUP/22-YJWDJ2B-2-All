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
    public function authorize()
    {  // 인증관련, 요청에 대한 권한 설정 처리, isLoggedIn, isNotLoggedIn
        //return false;
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {  // 유효성 체크 규칙 정의, 반환- 연관배열
        return [
            //'키1'=>[규칙1, 규칙2,...],
            // 'name'=>['required', 'min:8'],
            // 'age'=>'required|min:19',
            'name' => ['required', 'max:20'],
            'email' => ['required', 'email', 'max:255'],

        ];
    }

    public function messages()
    {
        return [
            'name.required' => '이름은 반드시 입력해야 함',
            'name.max' => '이름은 최대 20자까지 가능',
            'email.required' => '메일주소는 반드시 입력해야 함',
            'email.email' => '메일 주소 형식으로 입력해야 함',
            'email.max' => '메일주소는 최대 255자까지 가능',
        ];
    }
}
