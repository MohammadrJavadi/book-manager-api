<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\InvalidLogin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Requests\Api\RegisterRequest;
use App\Http\Resources\RegisterResource;
use App\Repositories\Interfaces\User\UserCommandRepositoryInterface;

class AuthController extends Controller
{
    private UserCommandRepositoryInterface $command;

    public function __construct(UserCommandRepositoryInterface $command)
    {
        $this->command = $command;
    }

    public function register(RegisterRequest $request)
    {
        $user = $this->command->create($request->validated());
        $token = $user->createToken("auth_token")->plainTextToken;
        return new RegisterResource($user, $token);
    }

    public function login(LoginRequest $request)
    {
        if (!\Auth::attempt($request->validated()))
            throw new InvalidLogin();

        return [];
    }

    public function logout()
    {

    }
}
