<?php

 namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface UserRepositoryInterface
{
    public function create(array $data);
    public function getUser(string $email);
    public function deleteToken($user);

}
