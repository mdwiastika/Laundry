<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Outlet;
use App\Models\Paket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PaketController extends Controller
{
    public function index(): View
    {
        if (auth()->user()->id_outlet == 1) {
            $pakets = Paket::all();
        } else {
            $pakets = Paket::whereIn('id_outlet', [auth()->user()->id_outlet, 1])->latest()->get();
        }
        return view('user.paket', [
            'title' => 'Laundry | List Paket',
            'linkref' => 'All Paket',
            'pakets' => $pakets
        ]);
    }
}
