<?php

namespace App\Http\Requests\ProductRequest;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */

    public const TITLE='title';
    public const PRICE='price';
    public const USER_ID='user_id';
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
            self::TITLE => [
                'required',
                'string',
            ],

            self::PRICE => [
                'required',
                'int',
            ],

            self::USER_ID=> [
                'required',
                'int',

        ]
            ];
    }

    public function getTitle(): string
    {
        return $this->get(self::TITLE);
    }
    public function getPrice(): string
    {
        return $this->get(self::PRICE);
    }
    public function getUser_id(): string
    {
        return $this->get(self::USER_ID);
    }
}
