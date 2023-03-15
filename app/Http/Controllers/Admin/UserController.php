<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Outlet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::whereIn('role', ['admin', 'kasir', 'owner'])->latest()->get();
        return view('admin.user.user', [
            'title' => 'Laundry | Table User',
            'users' => $users,
            'active' => 'table',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $outlets = Outlet::all();
        return view('admin.user.create-user', [
            'title' => 'Laundry | Form Create User',
            'active' => 'form',
            'outlets' => $outlets
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'nama' => 'required',
                'username' => 'required|unique:users,username',
                'email' => 'required|unique:users',
                'password' => 'required',
                'id_outlet' => 'required',
                'role' => 'required',
            ]);
            $validatedData['password'] = Hash::make($request->password);
            User::create($validatedData);
            return redirect()->route('user.index')->with('success', 'Sukses Create User');
        } catch (\Throwable $th) {
            return redirect()->route('user.index')->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $outlets = Outlet::all();
        return view('admin.user.show-user', [
            'title' => 'Laundry | Show User',
            'active' => 'form',
            'outlets' => $outlets,
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $outlets = Outlet::all();
        return view('admin.user.edit-user', [
            'title' => 'Laundry | Form Edit User',
            'active' => 'form',
            'outlets' => $outlets,
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        try {
            $validatedData = $request->validate([
                'nama' => 'required',
                'username' => $user->username == $request->username ? 'required' : 'required|unique:users,username',
                'email' => $user->email == $request->email ? 'required' : 'required|unique:users',
                'id_outlet' => 'required',
                'role' => 'required',
            ]);
            if ($request->password) {
                $validatedData['password'] = Hash::make($request->password);
            }
            $user->update($validatedData);
            return redirect()->route('user.index')->with('success', 'Sukses Update User');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
            return redirect()->route('user.index')->with('success', 'Sukses Delete User');
        } catch (\Throwable $th) {
            return redirect()->route('user.index')->with('error', $th->getMessage());
        }
    }
}
