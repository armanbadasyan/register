<?php

namespace App\Http\Requests\AuthRequest;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }


    public const PASSWORD = 'password';
    public const EMAIL = 'email';

    public function rules(): array
    {
        return [
            self::PASSWORD => [
                'required',
                'string',
            ],
            self::EMAIL => [
                'required',
                'string',
            ],

        ];
    }
}
