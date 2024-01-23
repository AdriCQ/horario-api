<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\LoginRequest;
use App\Http\Resources\UserResponse;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    /**
     * login
     */
    public function login(LoginRequest $request): UserResponse|JsonResponse
    {
        $validated = $request->validated();

        if (auth()->attempt($validated)) {
            $user = auth()->user();
            $token = $request->user()->createToken('auth_token');

            return (new UserResponse($user))
                ->additional(['auth_token' => $token->plainTextToken]);
        } else {
            return response()->json(['message' => 'Credenciales incorrectas'], Response::HTTP_UNAUTHORIZED);
        }
    }

    /**
     * me
     */
    public function me(): UserResponse
    {
        $user = auth()->user();

        return new UserResponse($user);
    }
}
