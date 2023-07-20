<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;

class UserService
{

    public function __construct(private UserRepository $userRepository)
    {
    }

    public function store(array $userData): User
    {
        $user = $this->userRepository->createUser($userData);

        return $user;
    }
}
