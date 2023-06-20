<?php

namespace App\Repositories\Auth;

use App\Http\Requests\AuthRequest\LoginRequest;

interface AuthRepositoryInterface
{
    public function login(LoginRequest $request);
    public function logout();
    public function index();
    public function checkRole();
}
