<?php

namespace App\Http\Controllers\Backend;

use id;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.users.index', [
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('dashboard.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'password' => 'required',
            'name' => 'required',
            'email' => 'required|unique:users',
            'no_telp' => 'required',
            'alamat' => 'required',
            'username' => 'required',
            'role' => 'required',

        ]);
        $validatedData['password'] = Hash::make($validatedData['password']);
        // $validatedData['role'] = 'pelanggan';
        User::create($validatedData);
        return redirect ('/dashboard/users')->with('success', 'New Data User added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('dashboard.users.show', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('dashboard.users.edit', compact(['user']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $rules = ([
            'username' => 'required',
            'name' => 'required',
            'email' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required'
        ]);


        $validatedData = $request->validate($rules);


        User::where('id', $user->id)
            ->update($validatedData);

        
        return redirect ('/dashboard/users')->with('success', 'Data User has been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        User::destroy($id);

        return redirect ('/dashboard/users')->with('success', 'User has been deleted!');
    }
}
