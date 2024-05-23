<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserAPI extends Controller
{
    public function profile(Request $request){

        return $request->user();

    }

    public function admin(Request $request){
        // Mengambil data pengguna (user) yang memiliki peran Administrator
        $adminUsers = User::where('role', 'Administrator')->get();
        return $adminUsers;
    }
    
}
