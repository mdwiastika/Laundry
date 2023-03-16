<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\DetailTransaksi;
use App\Models\Member;
use App\Models\Paket;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $validatedTransaksiDetail = $request->validate([
                'qty' => 'required',
            ]);
            $biaya_paket = 0;
            foreach ($request->qty as $id_paket => $qty_paket) {
                $paket = Paket::where('id', $id_paket)->first();
                $biaya_paket = $biaya_paket + ($paket->harga * $qty_paket);
            }
            if ($biaya_paket <= 10000) {
                $validatedTransaksi['pajak'] = 0;
            } elseif ($biaya_paket <= 25000) {
                $validatedTransaksi['pajak'] = 4;
            } elseif ($biaya_paket > 25000) {
                $validatedTransaksi['pajak'] = 2;
            }
            $validatedTransaksi['biaya_tambahan'] = $biaya_paket;
            $member = Member::where('id_user', auth()->user()->id)->first();
            // diskon pembelian dengan satuan persen
            if ($member->keterangan == 'bronze') {
                $validatedTransaksi['diskon'] = 0;
            } elseif ($member->keterangan == 'silver') {
                $validatedTransaksi['diskon'] = 3;
            } elseif ($member->keterangan == 'gold') {
                $validatedTransaksi['diskon'] = 5;
            }
            $validatedTransaksi['id_member'] = $member->id;
            $validatedTransaksi['tgl'] = Carbon::now();
            $validatedTransaksi['id_outlet'] = $member->user->id_outlet;
            $validatedTransaksi['batas_waktu'] = Carbon::parse($validatedTransaksi['tgl'])->addDays(3);
            $validatedTransaksi['tgl_bayar'] = $validatedTransaksi['tgl'];
            $validatedTransaksi['dibayar'] = 'dibayar';
            $validatedTransaksi['denda'] = 0;
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
            return redirect()->route('paket-user')->with('success', 'Sukses Create Transaksi');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', $th->getMessage());
        }
    }
}
