<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\InvalidLogin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Requests\Api\RegisterRequest;
use App\Http\Resources\LoginResource;
use App\Http\Resources\RegisterResource;
use App\Repositories\Interfaces\User\UserCommandRepositoryInterface;
use App\Repositories\Interfaces\User\UserQueryRepositoryInterface;

class AuthController extends Controller
{
    private UserCommandRepositoryInterface $command;
    private UserQueryRepositoryInterface $query;

    public function __construct(UserCommandRepositoryInterface $command, UserQueryRepositoryInterface $query)
    {
        $this->command = $command;
        $this->query = $query;
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

        $user = $this->query->getByPhone($request->input("phone"));
        $token = $user->createToken("auth_token")->plainTextToken;

        return new LoginResource($user, $token);
    }

    public function logout()
    {

    }
}
