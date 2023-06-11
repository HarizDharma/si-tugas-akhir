<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestEloquentController extends Controller
{
    public function getUser()
    {

        $user = User::with('mahasiswa')->get();

//        $mahasiswa =

         return response()->json($user, 200);
    }
}
