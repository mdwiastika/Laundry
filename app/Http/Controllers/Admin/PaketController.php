<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Outlet;
use App\Models\Paket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pakets = Paket::latest()->get();
        return view('admin.paket.paket', [
            'title' => 'Laundry | Table Outlet',
            'active' => 'table',
            'pakets' => $pakets,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $outlets = Outlet::all();
        return view('admin.paket.create-paket', [
            'title' => 'Laundry | Form Create Paket',
            'active' => 'form',
            'outlets' => $outlets,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'nama_paket' => 'required|unique:pakets,nama_paket',
                'harga' => 'required',
                'id_outlet' => 'required',
                'jenis' => 'required',
                'gambar' => 'required',
            ]);
            if ($request->has('gambar')) {
                $validatedData['gambar'] = $request->file('gambar')->store('gambar-paket');
            }
            Paket::create($validatedData);
            return redirect()->route('paket.index')->with('success', 'Sukses Create Paket');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Paket $paket)
    {
        $outlets = Outlet::all();
        return view('admin.paket.show-paket', [
            'title' => 'Laundry | Show Paket',
            'active' => 'form',
            'outlets' => $outlets,
            'paket' => $paket,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paket $paket)
    {
        $outlets = Outlet::all();
        return view('admin.paket.edit-paket', [
            'title' => 'Laundry | Form Edit Paket',
            'active' => 'form',
            'outlets' => $outlets,
            'paket' => $paket,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Paket $paket)
    {
        try {
            $validatedData = $request->validate([
                'nama_paket' => $request->nama_paket == $paket->nama_paket ? 'required' : 'required|unique:pakets,nama_paket',
                'harga' => 'required',
                'id_outlet' => 'required',
                'jenis' => 'required',
            ]);
            if ($request->has('gambar')) {
                Storage::delete($request->old_image);
                $validatedData['gambar'] = $request->file('gambar')->store('gambar-paket');
            }
            $paket->update($validatedData);
            return redirect()->route('paket.index')->with('success', 'Sukses Update Paket');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paket $paket)
    {
        try {
            Storage::delete($paket->gambar);
            $paket->delete();
            return redirect()->route('paket.index')->with('success', 'Sukses Delete Paket');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
