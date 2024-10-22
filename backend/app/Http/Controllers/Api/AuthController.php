<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // $registerdData = 
        $request->validate([
            'name' => 'required|max:55',
            'email' => 'email|required|unique:users',
            'password' => 'required|confirmed'
        ]);
    
        // $user = User::create($registerdData);
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'role_id' => 1,
            'nic_no' => $request->nic_no,
            'email' => $request->email,
            'first_name' => $request->first_name,
            'first_name' => $request->first_name,
            'password' => Hash::make($request->password),
            'mobile_number' => $request->mobile_number,
            'district' => $request->district,
            'nic_no' => $request->nic_no,

            $table->bigInteger('role_id');
        ]);
    
        $accessToken = $user->createToken('authToken')->accessToken;
    
        return response(['user' => $user, 'access_token' => $accessToken], 201);
        
    }

    public function login(Request $request)
    {
        $loginData = $request->validate([
            'email' => 'required|string|email',
            'mobile_no' => 'required|string|mobile_no',
            'password' => 'required|string',
        ]);
    
        if (!auth()->attempt($loginData)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }
    
        $user = auth()->user();
        $accessToken = $user->createToken('authToken')->accessToken;
    
        return response()->json([
            'user' => $user,
            'access_token' => $accessToken,
        ]);
    }
}