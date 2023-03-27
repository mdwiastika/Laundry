<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Outlet;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $outlet = Outlet::query();
        if ($request->ajax()) {
            return DataTables::of($outlet)->toJson();
        }
        return view('admin.outlet.outlet', [
            'title' => 'Laundry | Table Outlet',
            'active' => 'table',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.outlet.create-outlet', [
            'title' => 'Laundry | Form Create Outlet',
            'active' => 'form',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'nama' => 'required|unique:outlets,nama',
                'alamat' => 'required',
                'tlp' => 'required',
            ]);
            Outlet::create($validatedData);
            return redirect()->route('outlet.index')->with('success', 'Sukses Create Outlet');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Outlet $outlet)
    {
        return view('admin.outlet.show-outlet', [
            'title' => 'Laundry | Show Outlet',
            'active' => 'form',
            'outlet' => $outlet,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Outlet $outlet)
    {
        return view('admin.outlet.edit-outlet', [
            'title' => 'Laundry | Form Edit Outlet',
            'active' => 'form',
            'outlet' => $outlet,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Outlet $outlet)
    {
        try {
            $validatedData = $request->validate([
                'nama' => $request->nama == $outlet->nama ? 'required' : 'required|unique:outlets,nama',
                'alamat' => 'required',
                'tlp' => 'required',
            ]);
            $outlet->update($validatedData);
            return redirect()->route('outlet.index')->with('success', 'Sukses Update Outlet');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Outlet $outlet)
    {
        try {
            $outlet->delete();
            return redirect()->route('outlet.index')->with('success', 'Sukses Delete Outlet');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
