<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\M_User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class OwnerAuthController extends Controller
{
    public function index()
    {
        return view('owner.login.index');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');
        $validation  = M_User::where('username', $credentials['username'])->first();

        if (empty($validation)) {
            return back()->withErrors(['message' => 'Username tidak ditemukan.']);
        } else if (!password_verify($credentials['password'], $validation->password)) {
            return back()->withErrors(['message' => 'Password anda salah.']);
        } else {
            Auth::login($validation);
            return redirect()->route('owner.dashboard');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/owner/login');
    }
}
