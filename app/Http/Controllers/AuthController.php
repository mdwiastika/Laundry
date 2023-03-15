<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login', [
            'title' => 'Laundry | Form Login',
        ]);
    }
    public function register()
    {
        return view('auth.register', [
            'title' => 'Laundry | Form Register',
        ]);
    }
    public function checkLogin(Request $request)
    {
        try {
            $credentials = $request->validate([
                'username' => 'required',
                'password' => 'required'
            ]);
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended('dashboard');
            }
            return redirect('/login')->with('error', 'Username atau Password salah');
        } catch (\Throwable $th) {
            return redirect('/login')->with('error', $th->getMessage());
        }
    }
    public function postRegister(Request $request)
    {
        DB::beginTransaction();
        try {
            $validatedData = $request->validate([
                'nama' => 'required',
                'username' => 'required|unique:users,username',
                'email' => 'required|unique:users',
                'password' => 'required',
            ]);
            $validatedData['id_outlet'] = 1;
            $validatedData['password'] = Hash::make($request->password);
            $user_count = User::count();
            if ($user_count == 0) {
                $validatedData['role'] = 'admin';
            } elseif ($user_count == 1) {
                $validatedData['role'] = 'kasir';
            } elseif ($user_count == 2) {
                $validatedData['role'] = 'owner';
            } else {
                $validatedMember = $request->validate([
                    'nama' => 'required',
                    'alamat' => 'required',
                    'jenis_kelamin' => 'required',
                    'tlp' => 'required',
                ]);
                $validatedMember['keterangan'] = 'bronze';
                $validatedData['role'] = 'member';
            }

            $user_create = User::create($validatedData);
            if ($validatedData['role'] == 'member') {
                $validatedMember['id_user'] = $user_create->id;
                Member::create($validatedMember);
            }
            DB::commit();
            Auth::login($user_create);
            return redirect()->intended('dashboard');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect('/register')->with('error', $th->getMessage());
        }
    }
    public function logout(Request $request)
    {
        try {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/login')->with('success', 'Sukses Logout');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
