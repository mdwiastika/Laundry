<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::where('id_member', auth()->user()->member->id_member)->latest()->get();
        return view('user.history', [
            'title' => 'Laundry | History',
            'transaksis' => $transaksis,
        ]);
    }
}
