<?php
namespace App\Services;

use App\Http\Resources\UserResource;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\ValidationException;

class AuthService {
    protected $userRepository;

    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }
    public function register(array $data){
        $user = $this->userRepository->create($data);
        $device_name = $data['device_name'] ?? Request::userAgent();
        $token = $user->createToken($device_name)->plainTextToken;
        return [
            'user' => new UserResource($user),
            'access_token' => $token,
            'token_type' => 'Bearer',
        ];
        }

    public function login(array $data){
        $user = $this->userRepository->getUser($data['email']);
        if (!$user || !Hash::check($data['password'], $user->password)) {
            return response()->json([
                'status' => 'error',
                'message' => 'The provided credentials are incorrect.',
            ], 401);
        }
        $device_name = $data['device_name'] ?? Request::userAgent();
        $token = $user->createToken($device_name)->plainTextToken;
        return [
            'user' => new UserResource($user),
            'access_token' => $token,
            'token_type' => 'Bearer',
        ];
     }
     public function logout($user)
     {
        $this->userRepository->deleteToken($user);
     }
}
