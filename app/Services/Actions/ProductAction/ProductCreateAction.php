<?php

namespace App\Services\Actions\ProductAction;

use App\Models\Product;
use App\Services\Dto\ProductDto\ProductCreateDto;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;

class ProductCreateAction
{
public function run(ProductCreateDto $dto): Builder|Model
{
    return Product::query()->create($dto->toArray());
}
}
