<?php

namespace App\Repositories\Auth;

use App\Http\Requests\AuthRequest\LoginRequest;

interface AuthRepositoryInterface
{
    public function login($platform = 'api', LoginRequest $request);
    public function logout($platform = 'api');
    public function index($platform = 'api');
    public function checkRole($platform = 'api');
}
