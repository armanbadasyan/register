<?php

namespace App\Services\Dto\ProductDto;



use App\Http\Requests\ProductRequest\ProductCreateRequest;
use Spatie\LaravelData\Data;

class ProductCreateDto extends Data
{     public string $title;
    public string $price;
       public int $user_id;
    public static function fromRequest(ProductCreateRequest $request): ProductCreateDto
    {

        return self::from([
                'title' => $request->getTitle(),
                'price' => $request->getPrice(),
           'user_id' => $request->getUser_id(),

            ]
        );
    }
}
