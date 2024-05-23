<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthAPI extends Controller
{
    public function login(Request $request) {
        $data = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        // check email
        $user = User::where('email', $data['email'])->first();

        // check password
        if (!$user || !Hash::check($data['password'], $user->password)) {
            return response([
                'message' => 'Opppss... Login Gagal'
            ], 401);
        }

        $token = $user->createToken('Myapp')->plainTextToken;

        $response =[
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function registrasi(Request $request) {
        $data = $request->validate([
            'email' => 'required|string',
            'password' => 'required|min:8|string',
            'username' => 'required|string',
            'name' => 'required|string',
            'no_telp' => 'required|string',
            'alamat' => 'required|string',

        ]);

        $user = User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'username' => $data['username'],
            'name' => $data['name'],
            'no_telp' => $data['no_telp'],
            'alamat' => $data['alamat'],
            'role' => "pelanggan"
        ]);

        // $token = $user->createToken('Myapp')->plainTextToken;

        $response =[
            'user' => $user,
            // 'token' => $token
        ];

        return response($response, 201);
    }
}
