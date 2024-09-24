<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\PersonalAccessToken;

class UserRepository implements UserRepositoryInterface{
    public function create(array $data){
        $user =User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
        ]);
        return $user;

    }
    public function getUser(string $email){
        $user = User::where('email', $email)->first();
        return $user;
    }
    public function deleteToken($user){
        $user->tokens()->delete();

    }

}
