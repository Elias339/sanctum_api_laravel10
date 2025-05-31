<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
             'name'=>'required|max:255|string|unique:users,name',
             'email'=>['required','email','string',Rule::unique(User::class, 'email')],
             'password'=> 'required|string|min:8|confirmed'
        ];
    }
}
