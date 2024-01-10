<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $user = User::paginate(8);

        $user = User::where('role', 2)->paginate(8);
        return view("dashboard.user", compact('user'))->with('title', 'User');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("dashboard.user-create")->with('title', 'Add User');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        

        $request->validate([
            'username' => 'required',
            'email' => 'required',
        ],
        [
            'username.required' => 'Username is required',
            'email.required' => 'Email is required'
        ]    
    );

        $request = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role,
        ]);

        return redirect('user')->with('status', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findorfail($id);
        return view('dashboard.user-edit', compact('user'))->with('title', 'Edit User');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required',
        ],
        [
            'username.required' => 'Username is required',
            'email.required' => 'Email is required'
        ]);

        $request = User::where('id', $id)->update([
            'username' => $request->username,
            'email' => $request->email,
        ]);

        return redirect('user')->with('status', 'Data berhasil diupdate');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
