<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\Outlet;
use App\Models\Paket;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class DashboardController extends Controller
{
    public function index()
    {
        $member_count = Member::count();
        $outlet_count = Outlet::count();
        $paket_count = Paket::count();
        $transaksi_count = Transaksi::count();
        return view('admin.dashboard.dashboard', [
            'title' => 'Laundry | Dashboard',
            'transaksi_count' => $transaksi_count,
            'member_count' => $member_count,
            'outlet_count' => $outlet_count,
            'paket_count' => $paket_count,
        ]);
    }
}
