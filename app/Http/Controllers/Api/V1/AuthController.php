<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Auth\LoginRequest;
use App\Http\Requests\V1\Auth\RegisterRequest;
use App\Services\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService){
        $this->authService = $authService;
    }
    public function register(RegisterRequest $request): JsonResponse{
        $user = $this->authService->register($request->all());
        return response()->json($user, 201);
    }
    public function login(LoginRequest $request): JsonResponse{
        $user = $this->authService->login($request->all());
        return response()->json($user);
    }
    public function logout()
    {
        $this->authService->logout(auth()->user());
        return response()->json(['message' => 'Logged out successfully']);
    }

}




