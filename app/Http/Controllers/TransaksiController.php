<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Models\Member;
use App\Models\Paket;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $transaksis = Transaksi::latest()->get();
        return view('admin.transaksi.transaksi', [
            'title' => 'Laundry | Table Transaksi',
            'active' => 'table',
            'transaksis' => $transaksis,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $members = Member::latest()->get();
        return view('admin.transaksi.create-transaksi', [
            'title' => 'Laundry | Form Create Transaksi',
            'active' => 'form',
            'members' => $members,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $validatedTransaksi = $request->validate([
                'id_member' => 'required',
                'tgl' => 'required',
                'status' => 'required',
            ]);
            $validatedTransaksiDetail = $request->validate([
                'qty' => 'required',
            ]);
            $biaya_paket = 0;
            foreach ($request->qty as $id_paket => $qty_paket) {
                $paket = Paket::where('id', $id_paket)->first();
                $biaya_paket = $biaya_paket + ($paket->harga * $qty_paket);
            }
            // if ($biaya_paket <= 10000) {
            //     $validatedTransaksi['pajak'] = 0;
            // } elseif ($biaya_paket <= 25000) {
            //     $validatedTransaksi['pajak'] = 4;
            // } elseif ($biaya_paket > 25000) {
            //     $validatedTransaksi['pajak'] = 2;
            // }
            $validatedTransaksi['biaya_tambahan'] = $biaya_paket;
            $member = Member::where('id', $request->id_member)->first();
            // diskon pembelian dengan satuan persen
            if ($member->keterangan == 'bronze') {
                $validatedTransaksi['diskon'] = 0;
            } elseif ($member->keterangan == 'silver') {
                $validatedTransaksi['diskon'] = 3;
            } elseif ($member->keterangan == 'gold') {
                $validatedTransaksi['diskon'] = 5;
            }
            $validatedTransaksi['id_outlet'] = $member->user->id_outlet;
            $validatedTransaksi['batas_waktu'] = Carbon::parse($request->tgl)->addDays(3);
            if ($request->tgl_bayar) {
                $validatedTransaksi['tgl_bayar'] = $request->tgl_bayar;
                $validatedTransaksi['dibayar'] = 'dibayar';
                $tgl_bayar_carbon = Carbon::parse($request->tgl_bayar);
                $tgl_transaksi_carbon = Carbon::parse($request->tgl);
                $jangka_bayar = $tgl_bayar_carbon->diffInDays($tgl_transaksi_carbon);
                if ($jangka_bayar > 3) {
                    $validatedTransaksi['denda'] = 5000 * ($jangka_bayar - 3);
                }
            } else {
                $validatedTransaksi['dibayar'] = 'belum_dibayar';
            }
            $validatedTransaksi['id_user'] = auth()->user()->id;
            $new_transaksi = Transaksi::create($validatedTransaksi);
            if ($new_transaksi) {
                $kode_invoice = 'KI-' . str_pad($new_transaksi->id, 6, '0', STR_PAD_LEFT);
                $new_transaksi->update(['kode_invoice' => $kode_invoice]);
                foreach ($request->qty as $id_pak => $qty_pak) {
                    if ($qty_pak > 0) {
                        DetailTransaksi::create([
                            'id_transaksi' => $new_transaksi->id,
                            'id_paket' => $id_pak,
                            'qty' => $qty_pak,
                            'keterangan' => 'Sukses Create Transaksi',
                        ]);
                    }
                }
            }
            DB::commit();
            return redirect()->route('transaksi.index')->with('success', 'Sukses Create Transaksi');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi): View
    {
        return view('admin.transaksi.show-transaksi', [
            'title' => 'Laundry | Show Transaksi',
            'active' => 'form',
            'transaksi' => $transaksi,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        return view('admin.transaksi.edit-transaksi', [
            'title' => 'Laundry | Form Edit Transaksi',
            'active' => 'form',
            'transaksi' => $transaksi,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaksi $transaksi): RedirectResponse
    {
        try {
            $validatedData = $request->validate([
                'status' => 'required',
            ]);
            if ($request->tgl_bayar) {
                $validatedData['tgl_bayar'] = $request->tgl_bayar;
                $validatedData['dibayar'] = 'dibayar';
            }
            $transaksi->update($validatedData);
            return redirect()->route('transaksi.index')->with('success', 'Sukses Update Pembayaraan');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi): RedirectResponse
    {
        try {
            // $transaksi->delete();
            DB::select('CALL delete_transaksi(?)', array($transaksi->id));
            return redirect()->route('transaksi.index')->with('success', 'Sukses Destroy Transaksi');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
    public function getPaket($id_member): JsonResponse
    {
        try {
            $member = Member::where('id', $id_member)->first();
            if ($member->user->id_outlet == 1) {
                $pakets = Paket::all();
            } else {
                $pakets = Paket::whereIn('id_outlet', [$member->user->id_outlet, 1])->get();
            }
            return response()->json([
                'message' => 'Sukses Get Data',
                'data' => $pakets,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
            ]);
        }
    }
}
