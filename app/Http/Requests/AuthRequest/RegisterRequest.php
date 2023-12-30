<?php

namespace App\Http\Requests\AuthRequest;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{

    public const NAME = 'name';
    public const EMAIL = 'email';
    public const PASSWORD = 'password';
    public const SURNAME = 'surname';


    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
                self::NAME => [
                    'required',
                    'string',
                ],

                self::EMAIL => [
                    'required',
                    'string',
                    'unique:users',
                ],

                self::PASSWORD => [
                    'required',
                    'string',
                    'min:8',
                ],
                self::SURNAME => [
                    'required',
                    'string',

                ],

        ];
    }

    public function getName(): string
    {
        return $this->get(self::NAME);
    }

    public function getEmail(): string
    {
        return $this->get(self::EMAIL);
    }

    public function getPassword(): string
    {
        return $this->get(self::PASSWORD);
    }

    public function getSurname(): string
    {
        return $this->get(self::SURNAME);
    }
}
