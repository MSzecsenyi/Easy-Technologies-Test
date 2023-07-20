<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function createUser(array $userDetails)
    {
        return User::create($userDetails);
    }
}
