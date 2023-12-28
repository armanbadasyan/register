<?php

namespace App\Http\Interfaces;

interface UserRepositoryInterface
{

    public function registerUser($userInfo);

    public function index($indexId);
}
