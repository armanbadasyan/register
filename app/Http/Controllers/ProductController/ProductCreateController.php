<?php

namespace App\Http\Controllers\ProductController;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest\ProductCreateRequest;
use App\Http\Resources\ProductResource\ProductCreateResource;
use App\Services\Actions\ProductAction\ProductCreateAction;
use App\Services\Dto\ProductDto\ProductCreateDto;

class ProductCreateController extends Controller
{
    public function create(

        ProductCreateRequest $request,
        ProductCreateAction $createAction
    ): ProductCreateResource {
        $dto = ProductCreateDto::fromRequest($request);
        $user = $createAction->run($dto);
        return new ProductCreateResource($user);
    }
}
