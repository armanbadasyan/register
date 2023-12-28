<?php

namespace App\Services\Actions\Auth;

use App\Http\Interfaces\UserRepositoryInterface;
use App\Services\Dto\RegisterDto;

class RegisterAction
{
    public function __construct(
        protected UserRepositoryInterface $userRepository
    ) {
    }

    public function run(RegisterDto $dto)
    {
        return $this->userRepository->registerUser($dto->toArray());
    }
}
