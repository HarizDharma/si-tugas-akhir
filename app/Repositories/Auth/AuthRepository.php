<?php

namespace App\Repositories\Auth;

use App\Http\Requests\AuthRequest\LoginRequest;
use App\Http\Resources\LoginResources;
use App\Http\Resources\MahasiswaResources;
use App\Models\File;
use App\Models\HasilSidang;
use App\Models\Mahasiswa;
use App\Models\Status;
use App\Models\TahapSidang;
use App\Models\Verifikasi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;

class AuthRepository implements AuthRepositoryInterface
{

    public function index($platform = 'api')
    {
        // TODO: Implement index() method.
        if (Auth::check()) {
            // Auth berhasil
            $user = Auth::user();

            // Generate token JWT
            $token = $this->generateSanctumToken($user);
            $user->token = $token;

            $data = [];

            if ($platform == 'web') {
                $data = [
                    'token' => $token,
                    'user' => formatLoginResource($user),
                ];
            }

            if ($platform == 'api') {
                $data = [
                    'token' => $token,
                    'user' => LoginResources::make($user),
                ];
            }
            return $data ;

        } else {
            // Pengguna belum login, redirect ke halaman login
            return false;
        }
    }

    public function login($platform = 'api', LoginRequest $request)
    {
        if (Auth::check()) { // Cek Sudah Login
            return response()->json(['message' => 'Anda sudah login'], 200);
        }

        // Cek apakah ada terlalu banyak percobaan login yang gagal dari alamat IP ini
        if ($this->hasTooManyLoginAttempts($request)) {
            return $this->sendLockoutResponse($request);
        }

        // Coba melakukan autentikasi
        if (Auth::attempt($request->only('username', 'password'))) {
            // Auth berhasil
            $user = Auth::user();

            // Reset percobaan login gagal
            $this->clearLoginAttempts($request);
            // Generate token JWT
            $token = $this->generateSanctumToken($user);
            $user->token = $token;

            $data = [];
            if ($platform == 'web') {
                $data = [
                    'token' => $token,
                    'user' => formatLoginResource($user),
                ];
            }

            if ($platform == 'api') {
                $data = [
                    'token' => $token,
                    'user' => LoginResources::make($user),
                ];
            }
            return $data ;
        }
        else {
            // Auth gagal
            $this->incrementLoginAttempts($request);
            return false;
        }

    }

    public function logout($platform = 'api')
    {
        if (Auth::check()) {
            // Lakukan logout pengguna
            Auth::user()->tokens()->delete();

            return true;
        }
        else return false;

    }


    protected function hasTooManyLoginAttempts(LoginRequest $request)
    {
        $maxAttempts = 5;
        $lockoutMinutes = 5;

        return RateLimiter::tooManyAttempts(
            $this->throttleKey($request),
            $maxAttempts,
            $lockoutMinutes
        );
    }

    protected function incrementLoginAttempts(LoginRequest $request)
    {
        RateLimiter::hit($this->throttleKey($request));
    }

    protected function clearLoginAttempts(LoginRequest $request)
    {
        RateLimiter::clear($this->throttleKey($request));
    }

    protected function sendLockoutResponse(LoginRequest $request)
    {
        $lockoutMinutes = 5;
        $seconds = RateLimiter::availableIn($this->throttleKey($request));

        return response()->json([
            'message' => 'Too many login attempts. Please try again after ' . $seconds . ' seconds.',
        ], 429);
    }

    protected function throttleKey(LoginRequest $request) // SAMAKAN THROTTLE KEY DI PROVIDER ROUTE
    {
        return Str::lower($request->input('username')) . '|' . $request->ip();
    }

    protected function generateJwtToken($user)
    {
        $token = $user->createToken('MyApp')->plainTextToken;
        return $token;
    }

    protected function generateSanctumToken($user)
    {
        $token = $user->createToken('api-token')->plainTextToken;
        return $token;
    }

    public function checkRole($platform = 'api') {

    }


 }
