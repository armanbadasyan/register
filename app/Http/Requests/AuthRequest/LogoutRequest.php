<?php

namespace App\Http\Requests\AuthRequest;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class LogoutRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {

        return [
         //
        ];
    }

    public function getAuthUser(): User
    {
        return $this->user();
    }

}
