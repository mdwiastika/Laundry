@extends('admin.layouts.app')
@section('content')
    <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">ADMIN DASHBOARD</h4>

            </div>

        </div>

        <div class="row">

            <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="alert alert-info back-widget-set text-center">
                    <i class="fa fa-home fa-5x"></i>
                    <h3>{{ $outlet_count }} Tempat</h3>
                    Jumlah Outlet
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="alert alert-success back-widget-set text-center">
                    <i class="fa fa-child fa-5x"></i>
                    <h3>{{ $member_count }} User</h3>
                    Jumlah Member
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="alert alert-warning back-widget-set text-center">
                    <i class="fa fa-inbox fa-5x"></i>
                    <h3>{{ $paket_count }} paket</h3>
                    Jumlah Paket
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="alert alert-danger back-widget-set text-center">
                    <i class="fa fa-refresh fa-5x"></i>
                    <h3>{{ $transaksi_count }} transaksi </h3>
                    Jumlah Transaksi
                </div>
            </div>

        </div>

    </div>
@endsection
