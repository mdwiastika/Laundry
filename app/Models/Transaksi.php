<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['outlet', 'member', 'user'];
    public function outlet()
    {
        return $this->belongsTo(Outlet::class, 'id_outlet', 'id');
    }
    public function member()
    {
        return $this->belongsTo(Member::class, 'id_member', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
    public function detail_transaksi()
    {
        return $this->hasMany(DetailTransaksi::class, 'id_transaksi', 'id');
    }
}
