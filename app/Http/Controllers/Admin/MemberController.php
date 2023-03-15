<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\Outlet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Member::latest()->get();
        return view('admin.member.member', [
            'title' => 'Laundry | Table Member',
            'active' => 'table',
            'members' => $members,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $outlets = Outlet::all();
        return view('admin.member.create-member', [
            'title' => 'Laundry | Form Create Member',
            'active' => 'form',
            'outlets' => $outlets,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $validatedUser = $request->validate([
                'nama' => 'required',
                'username' => 'required|unique:users,username',
                'email' => 'required|unique:users',
                'password' => 'required',
                'id_outlet' => 'required',
            ]);
            $validatedUser['role'] = 'member';
            $validatedUser['password'] = Hash::make($request->password);
            $validatedMember = $request->validate([
                'nama' => 'required',
                'alamat' => 'required',
                'jenis_kelamin' => 'required',
                'tlp' => 'required',
                'keterangan' => 'required',
            ]);
            $user_created = User::create($validatedUser);
            $validatedMember['id_user'] = $user_created->id;
            Member::create($validatedMember);
            DB::commit();
            return redirect()->route('member.index')->with('success', 'Sukses Create Member');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        return view('admin.member.show-member', [
            'title' => 'Laundry | Show Member',
            'active' => 'form',
            'member' => $member,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        try {
            $user = User::where('id', $member->id_user)->first();
            $user->delete();
            $member->delete();
            return redirect()->back()->with('success', 'Sukses Delete User');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
