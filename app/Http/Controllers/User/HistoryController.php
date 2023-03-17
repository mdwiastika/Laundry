<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HistoryController extends Controller
{
    public function index(): View
    {
        $member = Member::where('id_user', auth()->user()->id)->first();
        $transaksis = Transaksi::where('id_member', $member->id)->latest()->get();
        return view('user.history', [
            'title' => 'Laundry | History',
            'transaksis' => $transaksis,
            'linkref' => 'History Transaksi',
        ]);
    }
    public function show($id_transaksi): View
    {
        $transaksi = Transaksi::where('id', $id_transaksi)->first();
        return view('user.history-detail', [
            'title' => 'Laundry | Detail Transaksi',
            'transaksi' => $transaksi,
            'linkref' => 'Detail History Transaksi',
        ]);
    }
}
