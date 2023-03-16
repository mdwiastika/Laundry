<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>{{ $title }}</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="{{ asset('/adminpage/assets/css/bootstrap.css') }}" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="{{ asset('/adminpage/assets/css/font-awesome.css') }}" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="{{ asset('/adminpage/assets/css/style.css') }}" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <style>
        .center-input {
            text-align: center;
        }
    </style>
</head>

<body>

    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Invoice</th>
                    <th>Member</th>
                    <th>Status</th>
                    <th>Pembayaran</th>
                    <th>Total Bayar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksis as $key => $transaksi)
                    <tr class="odd gradeX">
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $transaksi->kode_invoice }}</td>
                        <td>{{ $transaksi->member->nama }}</td>
                        <td>{{ $transaksi->status }}</td>
                        <td>{{ $transaksi->dibayar }}</td>
                        @php
                            $diskon_transaksi = ($transaksi->diskon / 100) * ($transaksi->biaya_tambahan + $transaksi->denda);
                            $pajak_transaksi = ($transaksi->pajak / 100) * ($transaksi->biaya_tambahan - $diskon_transaksi);
                            $transaksi_total = $transaksi->biaya_tambahan - $diskon_transaksi + $pajak_transaksi;
                        @endphp
                        <td>
                            Rp {{ number_format($transaksi_total, 0, '.', ',') }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="{{ asset('/adminpage/assets/js/jquery-1.10.2.js') }}"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="{{ asset('/adminpage/assets/js/bootstrap.js') }}"></script>
    <!-- CUSTOM SCRIPTS  -->
    <script src="{{ asset('/adminpage/assets/js/custom.js') }}"></script>
    <script>
        window.onload = () => {
            setTimeout(() => {
                window.print();
            }, 500);
            window.onafterprint = function() {
                setTimeout(() => {
                    window.close();
                }, 500);
            };
        }
    </script>
</body>

</html>
