<?php

namespace App\Http\Controllers\Core\Auth;
use App\Http\Requests\Core\Auth\UserRequest;
use App\Http\Requests\Core\Auth\LoginRequest;
use App\Services\Core\Auth\UserService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function login(LoginRequest $request)
    {
        try {
            $user = $this->service->login();
            $token = auth()->user()->createToken('trade')->accessToken;
            return login_responses('user', ['status' => 200, 'token' => $token]);
        } catch (\Throwable $th) {
            return failed_responses(['status' => 500, 'description' => $th->getMessage()]);
        } 
    }
    
    public function register(UserRequest $request)
    {
        try {
            $user = $this->service->create($request->only('name', 'email', 'password'));
            $token = $user->createToken('trade')->accessToken;
            return created_responses('user', ['status' => 200, 'token' => $token]);
        } catch (\Throwable $th) {
            return failed_responses(['status' => 500, 'description' => $th->getMessage()]);
        } 
    }

    
}
