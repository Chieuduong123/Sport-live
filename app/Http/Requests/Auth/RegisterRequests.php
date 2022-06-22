<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequests extends FormRequest
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
            'name' => 'required|unique:users,name',
            'email' => 'required|unique:users,email',
            'password' => ['required','min:6','regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/'],
            'password_confirmation' => 'required|same:password',
        ];
    }

    /**
     * Determine message.
     *
     * @return array
     */
    public function messages()
    {

        return [
            'name.required' => 'Name là trường bắt buộc',
            'name.unique' => 'Name này đã tồn tại',
            'email.required' => 'Email là trường bắt buộc',
            'email.unique' => 'Email này đã tồn tại',
            'password.required' => 'Mật khẩu là trường bắt buộc',
            'password.min' => 'Mật khẩu phải chứa ít nhất 6 ký tự',
            'password.regex' => 'Mật khẩu phải chứa ít nhất 1 chữ Hoa, chữ số và kí tự đặc biệt',
            'password_confirmation.required' => 'Password Confirm là trường bắt buộc',
            'password_confirmation.same' => 'Password không trùng khớp',
        ];
    }
}
