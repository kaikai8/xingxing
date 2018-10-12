<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'guname' => 'required|regex:/^\w{6,12}$/',
            'gpwd' => 'required|regex:/^\S{6,12}$/',
            'repass' =>'same:gpwd',
            'gphone' =>'regex:/^1[3456789]\d{9}$/',
            

        ];
    }

    /**
     * 获取已定义验证规则的错误消息。
     *
     * @return array
     */
    public function messages()
    {
        return [
            'guname.required'=>'用户名不能为空',
            'gpwd.required'=>'密码不能为空',
            'guname.regex'=>'用户名格式不正确',
            'gpwd.regex'=>'密码格式不正确',
            'repass.same'=>'两次密码不一致',
            'gphone.regex'=>'手机号码格式不正确',
            
        ];
    }
}
