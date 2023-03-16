<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LaporanController extends Controller
{
    public function index(Request $request): View
    {
        if ($request->start_date && $request->end_date) {
            $transaksis = Transaksi::whereBetween('tgl', [$request->start_date, $request->end_date])->latest()->get();
        } else {

            $transaksis = Transaksi::latest()->get();
        }
        return view('admin.laporan.laporan', [
            'title' => 'Laundry | Laporan Transaksi',
            'active' => 'laporan',
            'transaksis' => $transaksis,
        ]);
    }
    public function print(Request $request)
    {
        if ($request->start_date && $request->end_date) {
            $transaksis = Transaksi::whereBetween('tgl', [$request->start_date, $request->end_date])->latest()->get();
        } else {

            $transaksis = Transaksi::latest()->get();
        }
        return view('admin.laporan.print-laporan', [
            'title' => 'Laundry | Print Laporan Transaksi',
            'active' => 'laporan',
            'transaksis' => $transaksis,
        ]);
    }
}
