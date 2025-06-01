<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use function Symfony\Component\Console\Style\confirm;

class ResetPasswordRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
             'email'=>['required','email', Rule::exists(User::class, 'email')],
             'password'=>'required|min:8|confirmed',
        ];
    }
}
