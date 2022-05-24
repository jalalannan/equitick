<?php

namespace App\Http\Controllers\Core\Auth;
use App\Http\Requests\Core\Auth\UserRequest;
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
    public function register(UserRequest $request)
    {
        try {
            $this->service->create($request->only('name', 'email', 'password'));
        } catch (\Throwable $th) {
            return 1;
        } 
    }

    public function login()
    {

    }
}
