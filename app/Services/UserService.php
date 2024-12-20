<?php

namespace App\Services;

use App\Http\Resources\UserResource;
use App\Models\User;

class UserService
{
    public function userWithProfile()
    {
        $users = User::query()
            ->select('id', 'name', 'email')
            ->with('profile:id,user_id,name,phone')
            ->cursor()
            ->each(function ($user) {
                echo $user->profile?->name;
            });
//        $userCollect = UserResource::collection($users); // for API
    }
}
