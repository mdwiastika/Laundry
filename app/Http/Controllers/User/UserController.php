<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Outlet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserController extends Controller
{
    public function edit(): View
    {
        $outlets = Outlet::all();
        return view('user.edit-account', [
            'title' => 'Laundry | Edit Account',
            'linkref' => 'Edit Acoount',
            'outlets' => $outlets,
        ]);
    }
    public function update(Request $request)
    {
        try {
            $user = User::where('id', auth()->user()->id)->first();
            $validatedData = $request->validate([
                'nama' => 'required',
                'username' => $user->username == $request->username ? 'required' : 'required|unique:users,username',
                'id_outlet' => 'required',
            ]);
            if ($request->password) {
                $validatedData['password'] = Hash::make($request->password);
            }
            $user->update($validatedData);
            return redirect()->route('user-edit-account')->with('success', 'Sukses Edit Account');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
