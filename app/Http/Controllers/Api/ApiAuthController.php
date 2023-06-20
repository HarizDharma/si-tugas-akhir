<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\LoginResources;
use App\Repositories\Auth\AuthRepositoryInterface;
use App\Http\Requests\AuthRequest\LoginRequest;
use App\Http\Controllers\Controller;

class ApiAuthController extends Controller
{
    private $authRepo;
    public function __construct(AuthRepositoryInterface $authRepo)
    {
        $this->authRepo = $authRepo;
    }
    //index plus pengecekan login
    public function index()
    {
        $auth = $this->authRepo->index();
        if (!$auth) {
            return response()->json(['message' => 'Anda sudah login'], 200);
        }
    }
    public function login(LoginRequest $request)
    {
        $auth = $this->authRepo->login($request);
        if (!$auth) {
            return response()->json(['message' => 'Username atau password salah.'], 401);
        }
        $user = $auth['user'];
        return response()->json(new LoginResources($user), 200);

    }
    public function logout()
    {
        $auth = $this->authRepo->logout();
        if (!$auth) {
            return response()->json(['message' => 'Failed to Logout'], 401);
        }
        return response()->json(['message' => 'Logged out successfully'], 200);
    }

}
