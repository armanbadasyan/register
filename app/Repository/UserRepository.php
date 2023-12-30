<?php

namespace App\Repository;

use App\Http\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class UserRepository implements UserRepositoryInterface
{
    private function query(): Builder
    {
        return User::query();
    }

    public function registerUser($userInfo): Model|Builder
    {
        return $this->query()->create($userInfo);
    }

}
