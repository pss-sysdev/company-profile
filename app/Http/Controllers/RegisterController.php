<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\M_User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index_register()
    {
        return view('owner.register.index');
    }

    public function register(Request $request)
    {
        $validation = M_User::where('username', $request->username)->first();

        if (!empty($validation)) {
            return response()->json(['message' => 'username_exist']);
        } else if ($request->username == null) {
            return response()->json(['message' => 'username']);
        } else if ($request->password == null) {
            return response()->json(['message' => 'password']);
        } else if ($request->password_confirmation == null) {
            return response()->json(['message' => 'password_confirmation']);
        } else if ($request->full_name == null) {
            return response()->json(['message' => 'full_name']);
        } else if ($request->password != $request->password_confirmation) {
            return response()->json(['message' => 'password_doesnt_same']);
        } else {
            DB::table('tbl_user')->insert([
                'username'   => $request->username,
                'password'   => Hash::make($request->password),
                'full_name'  => $request->full_name,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            return response()->json(['message' => 'success']);
        }
    }
}
